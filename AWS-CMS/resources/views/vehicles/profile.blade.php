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
                            {{ $vehicle->make }} - {{ $vehicle->model }}
                        </span>
                        <a href="#" class="m-card-profile__email m-link">
                            Reg No: {{ $vehicle->vehicle_no }}
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
                    <ul class="nav nav-tabs m-tabs m-tabs-line m-tabs-line--left m-tabs-line--primary" role="tablist">
                        <li class="nav-item m-tabs__item">
                            <a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_user_profile_tab_1" role="tab">
                                <i class="flaticon-share m--hide"></i>
                                Update Profile
                            </a>
                        </li>
                        <li class="nav-item m-tabs__item">
                            <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_user_profile_tab_2" role="tab">
                                Expenditure
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="tab-content">
                <div class="tab-pane active" id="m_user_profile_tab_1">
                    <form class="m-form" action="{{ route('vehicle_update', ['vehicle'=>$vehicle->id]) }}" method="POST">
                        {{ csrf_field() }}
                        <div class="m-portlet__body">
                            <div class="form-group m-form__group row">
                                <div class="col-lg-3">
                                    <label>
                                        Registration No:
                                    </label>
                                    <div class="m-input-icon m-input-icon--right">
                                        <input type="text" class="form-control m-input" name="vehicle_no" id="vehicle_no" value="{{ $vehicle->vehicle_no }}" required/>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <label>
                                        Make:
                                    </label>
                                    <div class="m-input-icon m-input-icon--right">
                                        <input type="text" class="form-control m-input" name="make" id="make" value="{{ $vehicle->make }}" required/>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <label>
                                        Model:
                                    </label>
                                    <div class="m-input-icon m-input-icon--right">
                                        <input type="text" class="form-control m-input" name="model" id="model" value="{{ $vehicle->model }}" required/>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <label>
                                        Color:
                                    </label>
                                    <div class="m-input-icon m-input-icon--right">
                                        <input type="text" class="form-control m-input" name="color" id="color" value="{{ $vehicle->color }}" required/>
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
                                        <button type="reset" class="btn btn-secondary m-btn m-btn--air m-btn--custom">
                                        Cancel
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane" id="m_user_profile_tab_2">
                    <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" action="{{route('add_expenditure', ['vehicle' => $vehicle->id])}}" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                            
                            <div class="form-group m-form__group row">
                                <div class="col-lg-3">
                                    <label>
                                        Expenditure Date:
                                    </label>
                                    <div class="m-input-icon m-input-icon--right">
                                        <input type='text' class="form-control" id="m_datepicker_1" name="edate"  readonly required/>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <label>
                                        Expenditure Description:
                                    </label>
                                    <div class="m-input-icon m-input-icon--right">
                                        <input type="text" class="form-control m-input" name="expenditure" id="expenditure" required/>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <label>
                                        Cost:
                                    </label>
                                    <div class="m-input-icon m-input-icon--right">
                                        <input type="text" class="form-control m-input" name="cost" id="cost" required/>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <label>
                                        Upload File:
                                    </label>
                                    <div></div>
                                    <label class="custom-file">
                                        <input type="file" id="file2" name="attachment" value="Insurance" class="custom-file-input" required>
                                        <span class="custom-file-control"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                
                                <div class="col-lg-3" style="padding-top: 5px;">
                                            <br>
                                            <button type="submit" class="btn btn-primary m-btn">
                                            Add Expenditure
                                            </button>
                                        </div>
                            </div>                      
            </form>
                                
                                <!--begin::Preview-->
                                <div class="m-demo" data-code-preview="true" data-code-html="true" data-code-js="false">
                                    <div class="m-demo__preview">
                                        <div class="m-list-search">
                                            <div class="m-list-search__results">
                                                <span class="m-list-search__result-category m-list-search__result-category--first">
                                                    Expenditure List
                                                </span>
                                                <div class="m-list-timeline">
                                                    <div class="m-list-timeline__items">
                                                        @foreach($vehicle->expenditure as $expenditure)
                                                        <div class="m-list-timeline__item">
                                                            <span class="m-list-timeline__badge"></span>
                                                            <span class="m-list-timeline__text">
                                                                <b>{{ $expenditure->edate}}  - {{$expenditure->expenditure }} ( Cost: {{ $expenditure->cost }})</b> -
                                                                <a href="{{ $expenditure->attachment}}" class="m-link">
                                                                    Download
                                                                </a>
                                                            </span>
                                                            {{-- <span class="m-list-timeline__time">
                                                                Just now
                                                            </span> --}}
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Preview-->
                      
                </div>
        </div>
        </div>
    </div>
</div>


@endsection
@section('extra_js')
<script src="{{asset('assets/default/demo/default/custom/components/forms/widgets/vehicleJsfile.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/default/demo/default/custom/components/forms/widgets/typeahead.js')}}" type="text/javascript"></script>
@endsection