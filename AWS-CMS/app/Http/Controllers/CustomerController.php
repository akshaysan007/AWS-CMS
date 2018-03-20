<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use View;
use Carbon\Carbon;
use App\Mail\CustomerRegistered;
use Illuminate\Support\Facades\Mail;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $customer_list = customer::all();

        return View::make('customers.index', compact('customer_list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return View('customers.add');
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
            'f_name' => 'required|max:50',
            'l_name' => 'required|max:50',
            'm_name' => 'required|max:50',
            'pincode' => 'required|max:10|min:6',
            'street1' => 'required',
            'street2' => 'required',
            'state' => 'required',
            'email' => 'email',
            'dob' => 'required|date',
            'country' => 'required',
            'city' => 'required',
            'phone' => 'required|max:10|min:10|unique:customers'
        ]);

        $customer = new Customer;
        $customer->f_name = $request->f_name;
        $customer->l_name = $request->l_name;
        $customer->m_name = $request->m_name;
        $customer->dob = Carbon::createFromFormat('Y/m/d', $request->dob)->format('Y-m-d');
        $customer->email = $request->email;
        $customer->street1 = $request->street1;
        $customer->street2 = $request->street2;
        $customer->city = $request->city;
        $customer->state = $request->state;
        $customer->country = $request->country;
        $customer->phone = $request->phone;
        $customer->pincode = $request->pincode;
        $customer->created_at = Carbon::today();
        $customer->save();

	try{
		Mail::to($customer->email)->send(new CustomerRegistered($customer));
	}catch (\Exception $e) {
 	       // return $e->getMessage();
	}
        return \Redirect::route('customer_index');

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
        return View::make('customers.profile', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        //
        $this->validate($request, [
            'f_name' => 'sometimes|required|max:50',
            'l_name' => 'sometimes|required|max:50',
            'm_name' => 'sometimes|required|max:50',
            'email' => 'sometimes|required|email|max:255',
            'dob' => 'sometimes|required|date',
            'street1' => 'sometimes|required',
            'street2' => 'sometimes|required',
            'city' => 'sometimes|required',
            'state' => 'sometimes|required',
            'pincode' => 'sometimes|required|max:10|min:6',
            'gstNo' => 'sometimes|required',
            'phone' => 'sometimes|required|max:10|min:10|unique:customers,phone,'.$customer->id
    
        ]);

        if($request->f_name){ $customer->f_name = $request->f_name; }
        if($request->m_name){ $customer->m_name = $request->m_name; }
        if($request->l_name){ $customer->l_name = $request->l_name; }
        if($request->dob){ $customer->dob = (Carbon::createFromFormat('Y/m/d', $request->dob)->format('Y-m-d')); }
        if($request->phone){ $customer->phone = $request->phone; }
        if($request->email){ $customer->email = $request->email; }
        if($request->street1){ $customer->street1 = $request->street1; }
        if($request->street2){ $customer->street2 = $request->street2; }
        if($request->city){ $customer->city = $request->city; }
        if($request->state){ $customer->state = $request->state; }
        if($request->country){ $customer->country = $request->country; }
        if($request->pincode){ $customer->pincode = $request->pincode; }
        if($request->gstNo){ $customer->gst_no = $request->gstNo; }
        if($request->bankName){ $customer->bank_name = $request->bankName; }
        if($request->accNo){ $customer->acc_no = $request->accNo; }
        if($request->ifscCode){ $customer->ifsc_code = $request->ifscCode; }
        $customer->save();

        return \Redirect::route('customer_profile', array('customer' => $customer));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }

    public function find(Request $request)
    {
        return customer::search($request->get('q'))->get();
    }    



}
