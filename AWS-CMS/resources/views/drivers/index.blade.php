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
                        Drivers List
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
                                        <input type="text" class="form-control m-input m-input--solid" placeholder="Search..." id="driverSearch">
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
                            <a href="{{ route('driver_create') }}" class="btn btn-accent m-btn m-btn--pill m-btn--custom m-btn--icon m-btn--air">
                                <span>
                                    <i class="la la-user-plus"></i>
                                    <span>
                                        New Driver
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
                                        Driver Name
                                    </th>
                                    <th title="Field #2">
                                        License No.
                                    </th>
                                    <th title="Field #3">
                                        Mobile No.
                                    </th>
                                    <th title="Field #4">
                                        Email
                                    </th>
                                    <th title="Field #5">
                                        Address
                                    </th>
                                    <th title="Field #6">
                                        Action
                                    </th>
                                </tr>

                    </thead>
                    <tbody>
                        @if(!empty($driver_list))
                            @foreach($driver_list as $driver)
                        <tr>
                            <td>
                             <b>{{ $driver->id }}. &nbsp; </b> <a href="{{ route('driver_profile', ['driver'=>$driver->id]) }}">{{ ucfirst($driver->f_name) }} {{ ucfirst($driver->m_name) }} {{ ucfirst($driver->l_name) }}</a>
                            </td>
                            <td>
                                {{ $driver->license_no }}
                            </td>
                            
                            <td>
                                {{ $driver->phone }}
                            </td>

                            <td>
                                {{ $driver->email}}
                            </td>

                            <td>
                              {{ $driver->street1 }}, {{ $driver->street2 }}, {{ $driver->city }}, {{ $driver->state }}, {{ $driver->country }}, {{ $driver->pincode }}.
                            </td>
                            <td>
                                <a class="btn btn-primary m-btn m-btn--icon m-btn--icon-only m-btn--pill" href="{{ route('driver_profile', ['driver'=>$driver->id]) }}">
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
<script src="{{asset('assets/default/demo/default/custom/components/datatables/base/driver-table.js')}}" type="text/javascript"></script>
@endsection
