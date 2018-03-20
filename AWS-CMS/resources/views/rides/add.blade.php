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
                            New Ride
                        </h3>
                    </div>
                </div>
            </div>
            <!--begin::Add-Member-Form-->
            <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" action="{{route('ride_store')}}" method="POST">
            {{ csrf_field() }}
                <div class="m-portlet__body">
                    <div class="form-group m-form__group row">
                        <div class="col-lg-2">
                            <label>
                                Select Vehicle:
                            </label>
                            <div class="m-input-icon m-input-icon--right">
                                <input type="text" class="form-control m-input m-input--solid" id="vehicle_id" required/>
                                <input type="hidden" name="vehicle" value="" id="vehicle">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <label>
                                Select Driver:
                            </label>
                            <div class="m-input-icon m-input-icon--right">
                                <input type="text" class="form-control m-input m-input--solid" id="driver_id" required/>
                                <input type="hidden" name="driver" value="" id="driver">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <label>
                                Select Customer:
                            </label>
                            <div class="m-input-icon m-input-icon--right">
                                <input type="text" class="form-control m-input m-input--solid" id="customer_id" required/>
                                <input type="hidden" name="customer" value="" id="customer">
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <label>
                                Price / Km:
                            </label>
                            <div class="m-input-icon m-input-icon--right">
                                <input type="number" class="form-control m-input m-input--solid" step="0.01" name="price_km" id="price_km" value="{{ old('price_km') }}" placeholder="0.0" required/>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <label>
                                Price / Hr:
                            </label>
                            <div class="m-input-icon m-input-icon--right">
                                <input type="text" class="form-control m-input m-input--solid" step="0.01" name="price_hr" id="price_hr" value="{{ old('price_hr') }}" placeholder="0.0" required/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <div class="col-lg-3">
                            <label>
                                Source:
                            </label>
                            <div class="m-input-icon m-input-icon--right">
                                <input type="text" class="form-control m-input m-input--solid" name="source" id="source" value="{{ old('source') }}" />
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <label>
                                Destination:
                            </label>
                            <div class="m-input-icon m-input-icon--right">
                                <input type="text" class="form-control m-input m-input--solid" name="destination" id="destination" value="{{ old('destination') }}" />
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <label class="">
                                From:
                            </label>
                            <div class="m-input-icon m-input-icon--right">
                            <input type='text' class="form-control m-input m-input--solid" id="m_datetimepicker_1_1" name="from" value="{{ old('from') }}"  readonly/>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <label class="">
                                Till:
                            </label>
                            <div class="m-input-icon m-input-icon--right">
                            <input type='text' class="form-control m-input m-input--solid" id="m_datetimepicker_1_2" name="till" value="{{ old('from') }}"  readonly/>
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
                                    Book Ride
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

<style type="text/css">
    
    .twitter-typeahead, .tt-hint, .tt-input, .tt-menu { width: 100%; }
</style>

@endsection

@section('extra_js')
{{-- <script src="{{asset('assets/default/demo/default/custom/components/datatables/base/customer-table.js')}}" type="text/javascript"></script> --}}
{{-- <script src="{{asset('assets/default/demo/default/custom/components/forms/widgets/bootstrap-datepicker.js')}}" type="text/javascript"></script> --}}
<script src="{{asset('assets/default/demo/default/custom/components/forms/widgets/bootstrap-datetimepicker.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/default/demo/default/custom/components/forms/widgets/typeahead.js')}}" type="text/javascript"></script>


<script type="text/javascript">
           // $.noConflict();
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
