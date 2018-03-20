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
                        Vehicles List
                        </h3>
                    </div>
                </div>
            </div>
            <div class="m-portlet__body">
                <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                    <div class="row align-items-center">
                        <div class="col-xl-8 order-2 order-xl-1">
                            <div class="form-group m-form__group row align-items-center">
                                <div class="col-md-4">
                                    <div class="m-input-icon m-input-icon--left">
                                        <input type="text" class="form-control m-input m-input--solid" placeholder="Search..." id="vehicleSearch">
                                        <span class="m-input-icon__icon m-input-icon__icon--left">
                                            <span>
                                                <i class="la la-search"></i>
                                            </span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 order-1 order-xl-2 m--align-right">
                            <a href="{{ route('vehicle_create') }}" class="btn btn-accent m-btn m-btn--pill m-btn--custom m-btn--icon m-btn--air">
                                <span>
                                    <i class="la la-cab"></i>
                                    <span>
                                        New Vehicle
                                    </span>
                                </span>
                            </a>
                            <div class="m-separator m-separator--dashed d-xl-none"></div>
                        </div>
                    </div>
                </div>
                <table class="m-datatable" id="html_table" width="100%">
                    <thead>
                                <tr>
                                    <th title="Field #1">
                                        Vehicle
                                    </th>
                                    <th title="Field #2">
                                        Registration No.
                                    </th>
                                    <th title="Field #6">
                                        Action
                                    </th>
                                </tr>

                    </thead>
                    <tbody>
                        @if(!empty($vehicles))
                            @foreach($vehicles as $vehicle)
                        <tr>
                            <td>
                             <b>{{ $vehicle->id }}. &nbsp; </b> {{ ucfirst($vehicle->make) }} - {{ ucfirst($vehicle->model) }} ( {{ ucfirst($vehicle->color) }} )
                            </td>
                            <td>
                                {{ $vehicle->vehicle_no }}
                            </td>
                            <td>
                                <a class="btn btn-primary m-btn m-btn--icon m-btn--icon-only m-btn--pill" href="{{ route('vehicle_profile', ['vehicle'=>$vehicle->id]) }}">
                                    <i class="la la-edit"></i>
                                </a>
                            </td>
                        </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

@section('extra_js')
<script src="{{asset('assets/default/demo/default/custom/components/datatables/base/vehicle-table.js')}}" type="text/javascript"></script>
@endsection
