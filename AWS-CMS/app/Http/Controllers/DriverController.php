<?php

namespace App\Http\Controllers;

use App\Driver;
use Illuminate\Http\Request;
use Carbon\Carbon;
use View;
use Cache;
use Artisan;
use Mail;
use App\Mail\DriverRegistered;

class DriverController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $driver_list = driver::all();

        return View::make('drivers.index', compact('driver_list'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return View('drivers.add');

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
            'f_name' => 'required|max:50',
            'l_name' => 'required|max:50',
            'm_name' => 'required|max:50',
            'pincode' => 'required|max:10|min:6',
            'street1' => 'required',
            'street2' => 'required',
            'state' => 'required',
            'dob' => 'required|date',
            'license_no' => 'required|unique:drivers',
            'country' => 'required',
            'city' => 'required',
            'email' => 'email',
            'phone' => 'required|max:10|min:10|unique:drivers'
    ]);

        $driver = new Driver;

        $driver->f_name = $request->f_name;
        $driver->l_name = $request->l_name;
        $driver->m_name = $request->m_name;
        $driver->city = $request->city;
        $driver->dob =  Carbon::createFromFormat('Y/m/d', $request->dob)->format('Y-m-d');
        $driver->license_no = $request->license_no;
        $driver->state = $request->state;
        $driver->email = $request->email;
        $driver->street1 = $request->street1;
        $driver->street2 = $request->street2;
        $driver->country = $request->country;
        $driver->phone = $request->phone;
        $driver->pincode = $request->pincode;

        $driver->save();
	
	try{
		Mail::to($driver->email)->send(new DriverRegistered($driver));
	}catch (\Exception $e) {
 	       // return $e->getMessage();
	}

        return \Redirect::route('driver_index');
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function show(Driver $driver)
    {
        //
        return View::make('drivers.profile', compact('driver'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function edit(Driver $driver)
    {
        //
    }

    public function find(Request $request)
    {
        return Driver::where('status','!=','Occupied')->search($request->get('q'))->get();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Driver $driver)
    {
        //
        $this->validate($request, [
            'f_name' => 'sometimes|required|max:50',
            'l_name' => 'sometimes|required|max:50',
            'm_name' => 'sometimes|required|max:50',
            'pincode' => 'sometimes|required|max:10|min:6',
            'street1' => 'sometimes|required',
            'street2' => 'sometimes|required',
            'state' => 'sometimes|required',
            'license_no' => 'sometimes|required|unique:drivers,license_no,'.$driver->id,
            'email' => 'sometimes|email',
            'dob' => 'sometimes|required|date',
            'city' => 'sometimes|required',
            'phone' => 'sometimes|required|max:10|min:10|unique:drivers,phone,'.$driver->id
        ]);

        if($request->f_name){ $driver->f_name = $request->f_name; }
        if($request->m_name){ $driver->m_name = $request->m_name; }
        if($request->l_name){ $driver->l_name = $request->l_name; }
        if($request->dob){ $driver->dob = (Carbon::createFromFormat('Y/m/d', $request->dob)->format('Y-m-d')); }
        if($request->phone){ $driver->phone = $request->phone; }
        if($request->email){ $driver->email = $request->email; }
        if($request->license_no){ $driver->license_no = $request->license_no; }
        if($request->street1){ $driver->street1 = $request->street1; }
        if($request->street2){ $driver->street2 = $request->street2; }
        if($request->city){ $driver->city = $request->city; }
        if($request->state){ $driver->state = $request->state; }
        if($request->country){ $driver->country = $request->country; }
        if($request->pincode){ $driver->pincode = $request->pincode; }
        $driver->save();

        return \Redirect::route('driver_profile', array('driver' => $driver));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function destroy(Driver $driver)
    {
        //
    }

}
