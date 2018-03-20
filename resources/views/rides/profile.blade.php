@extends('layouts.admin')

@section('extra_assets')
@endsection


@section('content')
                   
            
                    
                                           <div class="row">
                            <div class="col-xl-3 col-lg-4">
                                <div class="m-portlet m-portlet">
                                    <div class="m-portlet__body">
                                        <div class="m-card-profile">
                                            <div class="m-card-profile__details">
                                                <span class="m-card-profile__name">
                                                    Ride No. {{ $ride->ride_no }}
                                                </span>
                                                <a href="#" class="m-card-profile__email m-link">
                                                    {{ $ride->from->format('d M Y') }} - {{ $ride->till->format('d M Y') }}
                                                </a>
                                            </div>
                                        </div>
                                        
                                        <ul class="m-nav m-nav--hover-bg m-portlet-fit--sides">
                                            <li class="m-nav__separator m-nav__separator--fit"></li>
                                            <li class="m-nav__item">
                                                <a href="#" class="m-nav__link">
                                                    <i class="m-nav__link-icon flaticon-user"></i>
                                                    <span class="m-nav__link-title">
                                                        <span class="m-nav__link-wrap">
                                                            <span class="m-nav__link-text">
                                                                <b>Customer:</b> {{ $ride->customer->f_name }} {{ $ride->customer->l_name }}
                                                            </span>
                                                        </span>
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="m-nav__item">
                                                <a href="#" class="m-nav__link">
                                                    <i class="m-nav__link-icon flaticon-profile-1"></i>
                                                    <span class="m-nav__link-title">
                                                        <span class="m-nav__link-wrap">
                                                            <span class="m-nav__link-text">
                                                                <b>Driver:</b> {{ $ride->driver->f_name }} {{ $ride->driver->l_name }}
                                                            </span>
                                                        </span>
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="m-nav__item">
                                                <a href="#" class="m-nav__link">
                                                    <i class="m-nav__link-icon flaticon-car"></i>
                                                    <span class="m-nav__link-title">
                                                        <span class="m-nav__link-wrap">
                                                            <span class="m-nav__link-text">
                                                                <b>Vehicle No:</b> {{ $ride->vehicle->vehicle_no }}
                                                            </span>
                                                        </span>
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="m-nav__item">
                                                <a href="#" class="m-nav__link">
                                                    <i class="m-nav__link-icon flaticon-map-location"></i>
                                                    <span class="m-nav__link-title">
                                                        <span class="m-nav__link-wrap">
                                                            <span class="m-nav__link-text">
                                                                <b>Source:</b> {{ $ride->source }}
                                                            </span>
                                                        </span>
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="m-nav__item">
                                                <a href="#" class="m-nav__link">
                                                    <i class="m-nav__link-icon flaticon-map-location"></i>
                                                    <span class="m-nav__link-title">
                                                        <span class="m-nav__link-wrap">
                                                            <span class="m-nav__link-text">
                                                                <b>Destination:</b> {{ $ride->destination }}
                                                            </span>
                                                        </span>
                                                    </span>
                                                </a>
                                            </li>
                                            
                                        </ul>
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
                                                        Update Ride
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>

                                    </div>
        <div class="tab-content">
            <div class="tab-pane active" id="m_user_profile_tab_1">
                <!--begin::Add-Member-Form-->
            <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" action="{{ route('ride_update', ['ride'=>$ride->id]) }}" method="POST">
                    {{ csrf_field() }}
                <div class="m-portlet__body">
                    <div class="form-group m-form__group row">
                        <div class="col-lg-2">
                            <label>
                                Vehicle:
                            </label>
                            <div class="m-input-icon m-input-icon--right">
                                <input type="text" class="form-control m-input" id="vehicle_id" value="{{$ride->vehicle->vehicle_no}} - {{$ride->vehicle->make}} {{$ride->vehicle->model}}" required/>
                                <input type="hidden" name="vehicle" value="{{$ride->vehicle->id}}" id="vehicle">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <label>
                                Driver:
                            </label>
                            <div class="m-input-icon m-input-icon--right">
                                <input type="text" class="form-control m-input" id="driver_id" value="{{$ride->driver->f_name}} {{$ride->driver->m_name}} {{$ride->driver->l_name}}" required/>
                                <input type="hidden" name="driver" value="{{$ride->driver->id}}" id="driver">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <label>
                                Customer:
                            </label>
                            <div class="m-input-icon m-input-icon--right">
                                <input type="text" class="form-control m-input" id="customer_id" value="{{$ride->customer->f_name}} {{$ride->customer->m_name}} {{$ride->customer->l_name}}" required/>
                                <input type="hidden" name="customer" value="{{$ride->customer->id}}" id="customer">
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <label>
                                Price / Km:
                            </label>
                            <div class="m-input-icon m-input-icon--right">
                                <input type="number" class="form-control m-input" step="0.01" name="price_km" id="price_km" value="{{$ride->price_km}}" placeholder="0.0" required/>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <label>
                                Price / Hr:
                            </label>
                            <div class="m-input-icon m-input-icon--right">
                                <input type="text" class="form-control m-input" step="0.01" name="price_hr" id="price_hr" value="{{$ride->price_hr}}" placeholder="0.0" required/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <div class="col-lg-3">
                            <label>
                                Source:
                            </label>
                            <div class="m-input-icon m-input-icon--right">
                                <input type="text" class="form-control m-input" name="source" id="source" value="{{$ride->source}}" />
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <label>
                                Destination:
                            </label>
                            <div class="m-input-icon m-input-icon--right">
                                <input type="text" class="form-control m-input" name="destination" id="destination" value="{{$ride->destination}}" />
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <label class="">
                                From:
                            </label>
                            <div class="m-input-icon m-input-icon--right">
                            <input type='text' class="form-control" id="m_datetimepicker_1_1" name="from" value="{{$ride->from->format('d M Y - H:i')}}"  readonly/>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <label class="">
                                Till:
                            </label>
                            <div class="m-input-icon m-input-icon--right">
                            <input type='text' class="form-control" id="m_datetimepicker_1_2" name="till" value="{{$ride->till->format('d M Y - H:i')}}"  readonly/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                    <div class="m-form__actions m-form__actions--solid">
                        <div class="row">
                            <div class="col-lg-6"></div>
                            <div class="col-lg-6 m--align-right">
                                <button type="reset" class="btn btn-secondary m-btn--pill">
                                    Cancel
                                </button>
                                <button type="submit" class="btn btn-primary m-btn--pill">
                                 Update Ride
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!--end::Add-Member-Form-->

            </div>                           
        </div>
        </div>
    </div>
</div>

<style type="text/css">
    
    .twitter-typeahead, .tt-hint, .tt-input, .tt-menu { width: 100%; }
</style>
                   
               
@endsection

@section('extra_js')
<script src="{{asset('assets/default/demo/default/custom/components/forms/widgets/bootstrap-datetimepicker-rideupdate.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/default/demo/default/custom/components/forms/widgets/typeahead.js')}}" type="text/javascript"></script>

<script type="text/javascript">
           
            jQuery(document).ready(function($) {
    

                    // console.log('hey');


                var customerSearch = new Bloodhound({
                    remote: {
                        url: '/customer/find?q=%QUERY%',
                        wildcard: '%QUERY%'
                    },
                    datumTokenizer: Bloodhound.tokenizers.whitespace('q'),
                    queryTokenizer: Bloodhound.tokenizers.whitespace,
                });
            

                $("#customer_id").typeahead({
                    hint: true,
                    highlight: true,
                    minLength: 1
                }, { 

                    source: customerSearch.ttAdapter(),

                    name: 'userList',
                    display: function(data){ return data.f_name+' '+data.m_name+' '+data.l_name},
                    // updater: function(item) {
                    //         // do what you want with the item here
                    //         return item;
                    //                             console.log('hey');
                    //                             $("#vehicle").val("Dolly Duck");


                    //     },

                            // the key from the array we want to display (name,id,email,etc...)
                    templates: {
                         empty: [
                        '<div class="list-group search-results-dropdown"><div class="list-group-item">Nothing found.</div></div>'
                    ],
                    header: [
                        '<div class="list-group search-results-dropdown">'
                    ],
                    suggestion: function (data) {
                        // return '<a href="' + data.f_name + '" class="list-group-item">'+ data.f_name +' ' + data.m_name + ' ' + data.l_name + '</a>' 
                        return '<div class="list-group-item">'+ data.f_name +' ' + data.m_name + ' ' + data.l_name + '</div>'
              }
                    }
                });
//

$('#customer_id').bind('typeahead:selected', function(obj, datum, name) {      

        $("#customer").val(datum.id);

});
$('#vehicle_id').bind('typeahead:selected', function(obj, datum, name) {      

        $("#vehicle").val(datum.id);

});
$('#driver_id').bind('typeahead:selected', function(obj, datum, name) {      

        $("#driver").val(datum.id);

});

var driverSearch = new Bloodhound({
                    remote: {
                        url: '/driver/find?q=%QUERY%',
                        wildcard: '%QUERY%'
                    },
                    datumTokenizer: Bloodhound.tokenizers.whitespace('q'),
                    queryTokenizer: Bloodhound.tokenizers.whitespace,
                });
            

                $("#driver_id").typeahead({
                    hint: true,
                    highlight: true,
                    minLength: 1
                }, { 

                    source: driverSearch.ttAdapter(),


                    name: 'userList',
                    display: function(data){ return data.f_name+' '+data.m_name+' '+data.l_name},

                            // the key from the array we want to display (name,id,email,etc...)
                    templates: {
                         empty: [
                        '<div class="list-group search-results-dropdown"><div class="list-group-item">Nothing found.</div></div>'
                    ],
                    header: [
                        '<div class="list-group search-results-dropdown">'
                    ],
                    suggestion: function (data) {
                        // return '<a href="' + data.f_name + '" class="list-group-item">'+ data.f_name +' ' + data.m_name + ' ' + data.l_name + '</a>' 
                        return '<div class="list-group-item">'+ data.f_name +' ' + data.m_name + ' ' + data.l_name + '</div>'
              }
                    }
                });

//

var vehicleSearch = new Bloodhound({
                    remote: {
                        url: '/vehicle/find?q=%QUERY%',
                        wildcard: '%QUERY%'
                    },
                    datumTokenizer: Bloodhound.tokenizers.whitespace('q'),
                    queryTokenizer: Bloodhound.tokenizers.whitespace,
                });
            

                $("#vehicle_id").typeahead({
                    hint: true,
                    highlight: true,
                    minLength: 1
                }, { 

                    source: vehicleSearch.ttAdapter(),


                    name: 'userList',
                    display: function(data){ return data.vehicle_no+' - '+data.make+' '+data.model},

                            // the key from the array we want to display (name,id,email,etc...)
                    templates: {
                         empty: [
                        '<div class="list-group search-results-dropdown"><div class="list-group-item">Nothing found.</div></div>'
                    ],
                    header: [
                        '<div class="list-group search-results-dropdown">'
                    ],
                    suggestion: function (data) {
                        // return '<a href="' + data.f_name + '" class="list-group-item">'+ data.f_name +' ' + data.m_name + ' ' + data.l_name + '</a>' 
                        return '<div class="list-group-item">'+ data.vehicle_no +' - ' + data.make + ' ' + data.model + '</div>'
              }
                    }
                });

                });
            </script>


@endsection
