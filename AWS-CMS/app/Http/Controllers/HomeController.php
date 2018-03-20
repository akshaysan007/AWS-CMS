<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Driver;
use App\Vehicle;
use App\Ride;
use View;
use Storage;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $driverCount = Driver::count();
        $customerCount = Customer::count();
        $vehicleCount = Vehicle::count();
        $rideCount = Ride::count();

        return View::make('home', compact('driverCount', 'customerCount', 'vehicleCount', 'rideCount'));
    }
}
