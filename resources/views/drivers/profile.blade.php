@extends('layouts.admin')

@section('extra_assets')
@endsection


@section('content')
                   
            
                    
                                           <div class="row">
                            <div class="col-xl-3 col-lg-4">
                                <div class="m-portlet m-portlet--full-height  ">
                                    <div class="m-portlet__body">
                                        <div class="m-card-profile">
                                            <div class="m-card-profile__details">
                                                <span class="m-card-profile__name">
                                                    {{ $driver->f_name }} {{ $driver->m_name }} {{ $driver->l_name }}
                                                </span>
                                                <a href="#" class="m-card-profile__email m-link">
                                                    License No: {{ $driver->license_no }}
                                                </a>
                                                <a href="#" class="m-card-profile__email m-link">
                                                    Mobile: +91 {{ $driver->phone }}
                                                </a>
                                            </div>
                                        </div>
                                        <div class="m-portlet__body-separator"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-9 col-lg-8">
                                <div class="m-portlet m-portlet--tabs  ">
                                    <div class="m-portlet__head">
                                        <div class="m-portlet__head-tools">
                                            <ul class="nav nav-tabs m-tabs m-tabs-line   m-tabs-line--left m-tabs-line--primary" role="tablist">
                                                <li class="nav-item m-tabs__item">
                                                    <a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_user_profile_tab_1" role="tab">
                                                        <i class="flaticon-share m--hide"></i>
                                                        Personal Details
                                                    </a>
                                                </li>
                                                <li class="nav-item m-tabs__item">
                                                    <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_user_profile_tab_2" role="tab">
                                                        Contact Details
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>

                                    </div>
        <div class="tab-content">
            <div class="tab-pane active" id="m_user_profile_tab_1">
                <form class="m-form" action="{{ route('driver_update', ['driver'=>$driver->id]) }}" method="POST">
                    {{ csrf_field() }}
                    <div class="m-portlet__body">
                    <div class="form-group m-form__group row">
                        <div class="col-lg-4">
                            <label>
                                First Name:
                            </label>
                            <div class="m-input-icon m-input-icon--right">
                                <input type="text" class="form-control m-input" name="f_name" id="f_name" value="{{ $driver->f_name }}" />
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <label>
                                Middle Name:
                            </label>
                            <div class="m-input-icon m-input-icon--right">
                                <input type="text" class="form-control m-input" name="m_name" id="m_name" value="{{ $driver->m_name }}" />
                            </div>
                        </div><div class="col-lg-4">
                            <label>
                                Last Name:
                            </label>
                            <div class="m-input-icon m-input-icon--right">
                                <input type="text" class="form-control m-input" name="l_name" id="l_name" value="{{ $driver->l_name }}" />
                            </div>
                        </div>
                    </div>

                    <div class="form-group m-form__group row">
                        <div class="col-lg-4">
                            <label class="">
                                Date of Birth:
                            </label>
                            <div class="m-input-icon m-input-icon--right">
                            <input type='text' class="form-control" id="m_datepicker_1" name="dob" value="@if($driver->dob){{ $driver->dob->format('Y/m/d')}}@endif"  readonly/>
                        </div>
                        </div>
                    </div>


                                                </div>
                                                <div class="m-portlet__foot m-portlet__foot--fit">
                                                    <div class="m-form__actions">
                                                        <div class="row">
                                                            <div class="col-8"></div>
                                                            <div class="col-4">
                                                                <button type="submit" class="btn btn-accent m-btn m-btn--air m-btn--custom">
                                                                    Save changes
                                                                </button>
                                                                &nbsp;&nbsp;
                                                               <a class="btn btn-secondary m-btn m-btn--air m-btn--custom" href="{{ route('driver_index') }}" title="Return To Customer List">Cancel</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                <div class="tab-pane" id="m_user_profile_tab_2">
                    <form class="m-form" action="{{ route('driver_update', ['driver'=>$driver->id]) }}" method="POST">
                    {{ csrf_field() }}
                    <div class="m-portlet__body">
                    <div class="form-group m-form__group row">
                        <div class="col-lg-4">
                            <label>
                                Mobile Number:
                            </label>
                            <div class="m-input-icon m-input-icon--right">
                                <input type="text" class="form-control m-input" name="phone" id="phone" value="{{ $driver->phone }}" />
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <label>
                                Email:
                            </label>
                            <div class="m-input-icon m-input-icon--right">
                                <input type="email" class="form-control m-input" name="email" id="email" value="{{ $driver->email }}" />
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <label>
                                License Number:
                            </label>
                            <div class="m-input-icon m-input-icon--right">
                                <input type="text" class="form-control m-input" name="license_no" id="license_no" value="{{ $driver->license_no }}" />
                            </div>
                        </div>
                    </div>

           <div class="form-group m-form__group row">
                        <div class="col-lg-4">
                            <label>
                                Address Line 1:
                            </label>
                            <div class="m-input-icon m-input-icon--right">
                                <input type="text" class="form-control m-input" name="street1" id="street1" value="{{ $driver->street1 }}" />
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <label>
                                Address Line 2:
                            </label>
                            <div class="m-input-icon m-input-icon--right">
                                <input type="text" class="form-control m-input" name="street2" id="street2" value="{{ $driver->street2 }}" />
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <label>
                                City:
                            </label>
                            <div class="m-input-icon m-input-icon--right">
                                <input type="text" class="form-control m-input" name="city" id="city" value="{{ $driver->city }}" />
                            </div>
                        </div>
                    </div>

                    <div class="form-group m-form__group row">
                        <div class="col-lg-4">
                            <label>
                                State:
                            </label>
                            <div class="m-input-icon m-input-icon--right">
                                <div class="m-typeahead">
                                    <input class="form-control m-input" id="m_typeahead_1" name="state" type="text" value="{{ $driver->state }}" />
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <label>
                                Pin Code:
                            </label>
                            <div class="m-input-icon m-input-icon--right">
                                <input type="text" class="form-control m-input" name="pincode" id="pincode" value="{{ $driver->pincode }}" />
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <label>
                                Country:
                            </label>
                            <div class="m-input-icon m-input-icon--right">
                                <input type="text" class="form-control m-input" name="country" id="pincode" value="INDIA" readonly/>
                            </div>
                        </div>
                    </div>

                                                </div>
                                                <div class="m-portlet__foot m-portlet__foot--fit">
                                                    <div class="m-form__actions">
                                                        <div class="row">
                                                            <div class="col-8"></div>
                                                            <div class="col-4">
                                                                <button type="submit" class="btn btn-accent m-btn m-btn--air m-btn--custom">
                                                                    Save changes
                                                                </button>
                                                                &nbsp;&nbsp;
                                                               <a class="btn btn-secondary m-btn m-btn--air m-btn--custom" href="{{ route('driver_index') }}" title="Return To Customer List">Cancel</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                   
               
@endsection

@section('extra_js')
<script src="{{asset('assets/default/demo/default/custom/components/forms/widgets/bootstrap-datepicker.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/default/demo/default/custom/components/forms/widgets/typeahead.js')}}" type="text/javascript"></script>
@endsection
