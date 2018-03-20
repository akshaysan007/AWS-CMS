<?php

namespace App\Http\Controllers;

use App\Vehicle;
use Illuminate\Http\Request;
use View;
use Carbon\Carbon;
use App\VehicleExpenditure;
use File;
use Illuminate\Support\Facades\Input;
use Cache;
use Artisan;
use Illuminate\Contracts\Filesystem\Filesystem;
use AWS;
use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $vehicles = Vehicle::all();

        return View::make('vehicles.index', compact('vehicles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return View('vehicles.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'make' => 'required|max:50',
            'model' => 'required|max:50',
            'color' => 'required|max:50',
            'vehicle_no' => 'required|max:10|min:6|unique:vehicles',
        ]);

        $vehicle = new Vehicle;
        $vehicle->make = $request->make;
        $vehicle->model = $request->model;
        $vehicle->color = $request->color;
        $vehicle->vehicle_no = $request->vehicle_no;
        $vehicle->save();
        
        return \Redirect::route('vehicle_index')->with('status', 'New vehicle added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function show(Vehicle $vehicle)
    {
        //
        return View::make('vehicles.profile', compact('vehicle'));
    }

    public function find(Request $request)
    {
        return Vehicle::where('status', '!=', 'Occupied')->search($request->get('q'))->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function edit(vehicle $vehicle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, vehicle $vehicle)
    {
        //
        $this->validate($request, [
        'make' => 'required|max:50',
        'model' => 'required|max:50',
        'color' => 'required|max:50',
        'vehicle_no' => 'required|max:10|min:6|unique:vehicles,vehicle_no,'.$vehicle->id
        ]);

        if ($request->vehicle_no) {
            $vehicle->vehicle_no = $request->vehicle_no;
        }
        if ($request->make) {
            $vehicle->make = $request->make;
        }
        if ($request->model) {
            $vehicle->model = $request->model;
        }
        if ($request->color) {
            $vehicle->color = $request->color;
        }

        $vehicle->save();

        return \Redirect::route('vehicle_profile', array('vehicle' => $vehicle))->with('status', 'Vehicle details updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function destroy(vehicle $vehicle)
    {
        //
        Artisan::call('gotaxi:cache-vehicle');
    }

    public function addExpenditure(Request $request, vehicle $vehicle)
    {
        $docName = substr(sha1(time()), 32);

        $vehicleExpenditure = new VehicleExpenditure;
        $vehicleExpenditure->vehicle_id = $vehicle->id;
        $vehicleExpenditure->edate = Carbon::createFromFormat('d/m/Y', $request->edate)->format('Y-m-d');
        $vehicleExpenditure->expenditure = $request->expenditure;
        $vehicleExpenditure->cost = $request->cost;

        // $s3 = \Storage::disk('s3');

        $s3 = S3Client::factory([
                'version'     => 'latest',
                'region'      => 'us-east-1',
                'credentials' => [
                    'key'    => "AKIAI2FNRF7MM6S6EV3A",
                    'secret' => "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",
                ]
            ]);

            $file = Input::file('attachment');
            $name = $docName.".".$file->getClientOriginalExtension();

            $result = $s3->putObject(array(
                'Bucket'     => "cabdemostorage",
                 'Key'        => $name,
                 'SourceFile' => $file,
                'ACL'        => 'public-read', //for making the public url
            ));

            $vehicleExpenditure->attachment = $result['ObjectURL'];
        //Uploading Files
        // if($request->hasFile('doc')) {
            // $file = Input::file('attachment');
            // $name = $docName.".".$file->getClientOriginalExtension();
            // $vehicleExpenditure->attachment = $name;
            // $filePath = '/app/public/VehicleExpenditure/' . $name;
            // $s3->put($filePath, file_get_contents($file), 'public');
            //$file->move(storage_path().'/app/public/VehicleExpenditure/', $name);
        // }

        $vehicleExpenditure->save();

        return \Redirect::route('vehicle_profile', ['vehicle' => $vehicle->id])->with('status', 'Vehicle Expenditure Updated!');

    }
}
