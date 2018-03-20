<?php

namespace App\Http\Controllers;

use App\Ride;
use Illuminate\Http\Request;
use View;
use Carbon\Carbon;
use App\Driver;
use App\Vehicle;
use Redirect;
use Artisan;
use AWS;
use Mail;
use App\Mail\CustomerRideBooked;

class RideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public $ride;
    public function index()
    {
        $rides_list = ride::all();
        foreach ($rides_list as $ride) {
            if ($ride->bill) {
                $ride->generated = true;
            } else {
                $ride->generated = false;
            }
        }

        return View::make('rides.index', compact('rides_list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('rides.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'vehicle' => 'required|max:50|exists:vehicles,id',
            'driver' => 'required|max:50|exists:drivers,id',
            'customer' => 'required|max:50|exists:customers,id',
            'price_km' => 'required|max:19',
            'price_hr' => 'required|max:19',
            'source' => 'required',
            'destination' => 'required',
            'from' => 'required',
            'till' => 'required'
        ]);
      
        $ride_no = substr(sha1(time()), 32);

        $ride = new ride;
        $ride->ride_no = $ride_no;
        $ride->from = Carbon::createFromFormat('Y/m/d H:i', $request->from)->toDateTimeString();
        $ride->till = Carbon::createFromFormat('Y/m/d H:i', $request->till)->toDateTimeString();


        if ($ride->from->gt($ride->till)) {
            return Redirect::back()->withErrors(['Start Date(From) must be a date before End(Till) Date']);
        }

                                $ride->vehicle_id = $request->vehicle;
                                $ride->driver_id = $request->driver;
                                $ride->customer_id = $request->customer;

                                $ride->source = $request->source;
                                $ride->destination = $request->destination;
                                $ride->price_hr = $request->price_hr;
                                $ride->price_km = $request->price_km;
                                $ride->status = "Scheduled";
                                $ride->save();

                                $s3 = AWS::createClient('sns');

                                $s3->publish([
                                        'Message' => 'Dear '.$ride->customer->f_name.', Your ride has been booked on '.$ride->from.' from '.$ride->source.' to '.$ride->destination.' - AWS Demo.',
                                        'PhoneNumber' => '+91'.$ride->customer->phone,
                                        'MessageAttributes' => [
                                             'AWS.SNS.SMS.SMSType' => [
                                             'DataType' => 'String',
                                             'StringValue' => 'Transactional',
                                              ],
                                         ]
                                ]);

                                $s3->publish([
                                        'Message' => 'Dear '.$ride->driver->f_name.', Your ride has been booked on '.$ride->from.' from '.$ride->source.' to '.$ride->destination.' Vehicle Number - '.$ride->vehicle->vehicle_no.' - AWS Demo',
                                        'PhoneNumber' => '+91'.$ride->driver->phone,
                                        'MessageAttributes' => [
                                             'AWS.SNS.SMS.SMSType' => [
                                             'DataType' => 'String',
                                             'StringValue' => 'Transactional',
                                              ],
                                         ]
         ]);


	try{
		Mail::to($ride->customer->email)->send(new CustomerRideBooked($ride));
	}catch (\Exception $e) {
 	       // return $e->getMessage();
	}
        

            return \Redirect::route('ride_index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ride  $ride
     * @return \Illuminate\Http\Response
     */
    public function show(Ride $ride)
    {
        return View::make('rides.profile', compact('ride'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ride  $ride
     * @return \Illuminate\Http\Response
     */
    public function edit(Ride $ride)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ride  $ride
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ride $ride)
    {
        $request->validate([
            'vehicle' => 'sometimes|max:50|exists:vehicles,id',
            'driver' => 'sometimes|max:50|exists:drivers,id',
            'customer' => 'sometimes|max:50|exists:customers,id',
            'price_km' => 'sometimes|max:19',
            'price_hr' => 'sometimes|max:19',
            'source' => 'sometimes',
            'destination' => 'sometimes',
            'from' => 'sometimes',
            'till' => 'sometimes'
        ]);


        if ($ride->driver->id != $request->driver) {
            $old_driver= Driver::find($ride->driver->id);
            $old_driver->status = "Available";
            $old_driver->save();
            $new_driver= Driver::find($request->driver);
            $new_driver->status = "Occupied";
            $new_driver->save();
        }


        if ($ride->vehicle->id != $request->vehicle) {
            $old_vehicle= Vehicle::find($ride->vehicle->id);
            $old_vehicle->status = "Available";
            $old_vehicle->save();
            $old_vehicle= Vehicle::find($request->vehicle);
            $old_vehicle->status = "Occupied";
            $old_vehicle->save();
        }
        $ride->vehicle_id = $request->vehicle;
        $ride->driver_id = $request->driver;
        $ride->customer_id = $request->customer;
        $ride->from = Carbon::createFromFormat('d M Y - H:i', $request->from)->toDateTimeString();
        $ride->till = Carbon::createFromFormat('d M Y - H:i', $request->till)->toDateTimeString();
        $ride->source = $request->source;
        $ride->destination = $request->destination;
        $ride->price_hr = $request->price_hr;
        $ride->price_km = $request->price_km;

        if ($ride->from->gt(Carbon::now()) && $ride->till->gt(Carbon::now())) {
            $ride->status = "Scheduled";
        }

        $ride->save();
        return \Redirect::route('ride_profile', array('ride' => $ride));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ride  $ride
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ride $ride)
    {
    }


    public function set_status(Request $request, Ride $ride)
    {
      $oldStatus = $ride->status;
      $ride->status = $request->status;
      $ride->save();
      $s3  = AWS::createClient('sns');
            $s3->publish([
                     'Message' => 'Dear '.$ride->customer->f_name.', Your ride (No. '.$ride->ride_no. ')  status has been changed from '.$oldStatus. ' to '.$request->status.' - AWS Demo.',
                     'PhoneNumber' => '+91'.$ride->customer->phone,
                     'MessageAttributes' => [
                       'AWS.SNS.SMS.SMSType' => [
                        'DataType' => 'String',
                                  'StringValue' => 'Transactional',
                              ],
                           ]
                     ]);

            $s3->publish([
                        'Message' => 'Dear '.$ride->driver->f_name.', Your ride (No. '.$ride->ride_no. ')  status has been changed from '.$oldStatus. ' to '.$request->status.' - AWS Demo.',

                        'PhoneNumber' => '+91'.$ride->driver->phone,
                        'MessageAttributes' => [
                                             'AWS.SNS.SMS.SMSType' => [
                                             'DataType' => 'String',
                                             'StringValue' => 'Transactional',
                                              ],
                                         ]
                                ]);

      return $ride->status;
    }


    public function newRide($request, $ride)
    {


        $ride->vehicle_id = $request->vehicle;
        $ride->driver_id = $request->driver;
        $ride->customer_id = $request->customer;

        $ride->source = $request->source;
        $ride->destination = $request->destination;
        $ride->price_hr = $request->price_hr;
        $ride->price_km = $request->price_km;

        if ($ride->from->gte(Carbon::now()) && $ride->till->gte(Carbon::now())) {
            $ride->status = "Scheduled";
        }

        if ($ride->save()) {
            $driver = Driver::find($ride->driver_id);
            $vehicle = Vehicle::find($ride->vehicle_id);

            $driver->status = "Available";
            $vehicle->status = "Available";

            $driver->save();
            $vehicle->save();
        }
    }


    public function updateRunDetails(Request $request, Ride $ride)
    {

        if (empty($request->HR)) {
            if (!empty($request->KM)) {
                $ride->km_run = $request->KM;
                $ride->hr_run = null;
                $ride->save();
                return 0;
            }
        }

        if (empty($request->KM)) {
            if (!empty($request->HR)) {
                $ride->hr_run = $request->HR;
                $ride->km_run = null;
                $ride->save();
                return 0;
            }
        }

        return -1;
    }

}
