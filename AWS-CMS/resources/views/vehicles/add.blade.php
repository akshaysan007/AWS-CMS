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
                            Add New Vehicle
                        </h3>
                    </div>
                </div>
            </div>
            <!--begin::Add-Member-Form-->
            <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" action="{{route('vehicle_store')}}" method="POST">
            {{ csrf_field() }}
                <div class="m-portlet__body">
                    <div class="form-group m-form__group row">
                        <div class="col-lg-3">
                            <label>
                                Vehicle Registration Number:
                            </label>
                            <div class="m-input-icon m-input-icon--right">
                                <input type="text" class="form-control m-input m-input--solid" name="vehicle_no" id="vehicle_no" value="{{ old('vehicle_no') }}" />
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <label>
                                Make:
                            </label>
                            <div class="m-input-icon m-input-icon--right">
                                <input type="text" class="form-control m-input m-input--solid" name="make" id="make" value="{{ old('make') }}" />
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <label>
                                Model:
                            </label>
                            <div class="m-input-icon m-input-icon--right">
                                <input type="text" class="form-control m-input m-input--solid" name="model" id="model" value="{{ old('model') }}" />
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <label>
                                Color:
                            </label>
                            <div class="m-input-icon m-input-icon--right">
                                <input type="text" class="form-control m-input m-input--solid" name="color" id="color" value="{{ old('color') }}" />
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" class="form-control" name="country" value="India">
                <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                    <div class="m-form__actions m-form__actions--solid">
                        <div class="row">
                            <div class="col-lg-6"></div>
                            <div class="col-lg-6 m--align-right">
                                <button type="reset" class="btn btn-secondary m-btn--pill">
                                    Cancel
                                </button>
                                <button type="submit" class="btn btn-primary m-btn--pill">
                                    Add Vehicle
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
<script src="{{asset('assets/default/demo/default/custom/components/forms/widgets/typeahead.js')}}" type="text/javascript"></script>
@endsection
