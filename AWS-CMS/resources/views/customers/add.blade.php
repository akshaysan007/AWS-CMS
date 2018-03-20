@extends('layouts.admin')

@section('extra_assets')
@endsection

@section('content')

<div class="row">
    <div class="col-lg-12">
        <!--begin::Add-Member-Portlet-->
        <div class="m-portlet">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <span class="m-portlet__head-icon m--hide">
                            <i class="la la-gear"></i>
                        </span>
                        <h3 class="m-portlet__head-text">
                            Add New Customer
                        </h3>
                    </div>
                </div>
            </div>
            <!--begin::Add-Member-Form-->
            <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" action="{{route('customer_store')}}" method="POST">
            {{ csrf_field() }}
                <div class="m-portlet__body">
                    <div class="form-group m-form__group row">
                        <div class="col-lg-4">
                            <label>
                                First Name:
                            </label>
                            <div class="m-input-icon m-input-icon--right">
                                <input type="text" class="form-control m-input m-input--solid" name="f_name" id="f_name" value="{{ old('f_name') }}" />
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <label>
                                Middle Name:
                            </label>
                            <div class="m-input-icon m-input-icon--right">
                                <input type="text" class="form-control m-input m-input--solid" name="m_name" id="m_name" value="{{ old('m_name') }}" />
                            </div>
                        </div><div class="col-lg-4">
                            <label>
                                Last Name:
                            </label>
                            <div class="m-input-icon m-input-icon--right">
                                <input type="text" class="form-control m-input m-input--solid" name="l_name" id="l_name" value="{{ old('l_name') }}" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <div class="col-lg-4">
                            <label class="">
                                Date of Birth:
                            </label>
                            <div class="m-input-icon m-input-icon--right">
                            <input type='text' class="form-control m-input m-input--solid" id="m_datepicker_1" name="dob" value="{{ old('dob') }}"  readonly/>
                        </div>
                        </div>
                        <div class="col-lg-4">
                            <label>
                                Mobile Number:
                            </label>
                            <div class="m-input-icon m-input-icon--right">
                                <input type="text" class="form-control m-input m-input--solid" name="phone" id="phone" value="{{ old('phone') }}" />
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <label>
                                Email:
                            </label>
                            <div class="m-input-icon m-input-icon--right">
                                <input type="email" class="form-control m-input m-input--solid" name="email" id="email" value="{{ old('email') }}" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <div class="col-lg-4">
                            <label>
                                Address Line 1:
                            </label>
                            <div class="m-input-icon m-input-icon--right">
                                <input type="text" class="form-control m-input m-input--solid" name="street1" id="street1" value="{{ old('street1') }}" />
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <label>
                                Address Line 2:
                            </label>
                            <div class="m-input-icon m-input-icon--right">
                                <input type="text" class="form-control m-input m-input--solid" name="street2" id="street2" value="{{ old('street2') }}" />
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <label>
                                City:
                            </label>
                            <div class="m-input-icon m-input-icon--right">
                                <input type="text" class="form-control m-input m-input--solid" name="city" id="city" value="{{ old('city') }}" />
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
                                    <input type="text" class="form-control m-input m-input--solid" id="m_typeahead_1" name="state" value="{{ old('pincode') }}" />
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <label>
                                Pin Code:
                            </label>
                            <div class="m-input-icon m-input-icon--right">
                                <input type="text" class="form-control m-input m-input--solid" name="pincode" id="pincode" value="{{ old('pincode') }}" />
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <label>
                                Country:
                            </label>
                            <div class="m-input-icon m-input-icon--right">
                                <input type="text" class="form-control m-input m-input--solid" name="country" id="city" value="INDIA" readonly/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                    <div class="m-form__actions m-form__actions--solid">
                        <div class="row">
                            <div class="col-lg-6"></div>
                            <div class="col-lg-6 m--align-right">
                                <a class="btn btn-secondary m-btn--pill" href="{{ route('customer_index') }}" title="Return To Customer List">Cancel</a>
                                
                                <button type="submit" class="btn btn-primary m-btn--pill">
                                    Add Customer
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!--end::Add-Member-Form-->
        </div>
        <!--end::Add-Member-Portlet-->
    </div>
</div>

@endsection

@section('extra_js')
{{-- <script src="{{asset('assets/default/demo/default/custom/components/datatables/base/customer-table.js')}}" type="text/javascript"></script> --}}
<script src="{{asset('assets/default/demo/default/custom/components/forms/widgets/bootstrap-datepicker.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/default/demo/default/custom/components/forms/widgets/typeahead.js')}}" type="text/javascript"></script>
@endsection
