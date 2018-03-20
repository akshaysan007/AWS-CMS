<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index')->name('root');

// generate login routes
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//logout route
Route::get('/flush', function () {

    Session::flush();
    return redirect('/login');
})->name('flush');



/*
|--------------------------------------------------------------------------
| Customer Controller Routes
|--------------------------------------------------------------------------
*/

Route::get('/customer', 'CustomerController@index')->name('customer_index')->middleware('auth');
Route::post('customer/list', 'CustomerController@customerData')->name('customer_list')->middleware('auth');
Route::get('/customer/add', 'CustomerController@create')->name('customer_create')->middleware('auth');
Route::post('/customer/add', 'CustomerController@store')->name('customer_store')->middleware('auth');
Route::get('/customer/find', 'CustomerController@find')->name('customer_find')->middleware('auth');
Route::get('/customer/profile/{customer}', 'CustomerController@show')->name('customer_profile')->middleware('auth');
Route::get('/customer/email', 'CustomerController@email')->name('nail')->middleware('auth');
Route::post('/customer/profile/{customer}', 'CustomerController@update')->name('customer_update')->middleware('auth');




/*
|--------------------------------------------------------------------------
| Vehicle Controller Routes
|--------------------------------------------------------------------------
*/
Route::get('/vehicle', 'VehicleController@index')->name('vehicle_index')->middleware('auth');
Route::get('/vehicle/add', 'VehicleController@create')->name('vehicle_create')->middleware('auth');
Route::post('/vehicle/add', 'VehicleController@store')->name('vehicle_store')->middleware('auth');
Route::get('/vehicle/profile/{vehicle}', 'VehicleController@show')->name('vehicle_profile')->middleware('auth');
Route::post('/vehicle/profile/{vehicle}', 'VehicleController@update')->name('vehicle_update')->middleware('auth');
Route::get('/vehicle/find', 'VehicleController@find')->name('customer_find')->middleware('auth');
Route::post('/vehicle/expenditure/{vehicle}', 'VehicleController@addExpenditure')->name('add_expenditure')->middleware('auth');
/*
|--------------------------------------------------------------------------
| Driver Controller Routes
|--------------------------------------------------------------------------
*/
Route::get('/driver', 'DriverController@index')->name('driver_index')->middleware('auth');
Route::get('/driver/add', 'DriverController@create')->name('driver_create')->middleware('auth');
Route::post('/driver/add', 'DriverController@store')->name('driver_store')->middleware('auth');
Route::get('/driver/find', 'DriverController@find')->name('driver_find')->middleware('auth');
Route::get('/driver/profile/{driver}', 'DriverController@show')->name('driver_profile')->middleware('auth');
Route::post('/driver/profile/{driver}', 'DriverController@update')->name('driver_update')->middleware('auth');


/*
|--------------------------------------------------------------------------
| Ride Controller Routes
|--------------------------------------------------------------------------
*/
Route::get('/ride/add', 'RideController@create')->name('ride_create')->middleware('auth');
Route::post('/ride/add', 'RideController@store')->name('ride_store')->middleware('auth');
Route::get('/ride', 'RideController@index')->name('ride_index')->middleware('auth');
Route::post('/ride/{ride}/set_status', 'RideController@set_status')->name('ride_status_set')->middleware('auth');
Route::get('/ride/profile/{ride}', 'RideController@show')->name('ride_profile')->middleware('auth');
Route::post('/ride/profile/{ride}', 'RideController@update')->name('ride_update')->middleware('auth');
Route::post('/ride/{ride}/update_run_details', 'RideController@updateRunDetails')->middleware('auth')->name('updateRunDetails');
