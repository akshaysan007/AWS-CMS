@extends('layouts.admin')


@section('content')

<!--begin:: Widgets/Stats-->
                        <div class="m-portlet ">
                            <div class="m-portlet__body  m-portlet__body--no-padding">
                                <div class="row m-row--no-padding m-row--col-separator-xl">
                                    <div class="col-md-12 col-lg-6 col-xl-3">
                                        <!--begin::Total Profit-->
                                        <div class="m-widget24">
                                            <div class="m-widget24__item">
                                                <h4 class="m-widget24__title">
                                                    Rides
                                                </h4>
                                                <br>
                                                <span class="m-widget24__desc">
                                                    Total Rides Booked
                                                </span>
                                                <span class="m-widget24__stats m--font-brand">
                                                    {{$rideCount}}
                                                </span>
                                                <div class="m--space-10"></div>
                                                <div class="progress m-progress--sm">
                                                    <div class="progress-bar m--bg-brand" role="progressbar" style="width: 100%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <span class="m-widget24__change">
                                                </span>
                                                <span class="m-widget24__number">
                                                </span>
                                            </div>
                                        </div>
                                        <!--end::Total Profit-->
                                    </div>
                                    <div class="col-md-12 col-lg-6 col-xl-3">
                                        <!--begin::New Feedbacks-->
                                        <div class="m-widget24">
                                            <div class="m-widget24__item">
                                                <h4 class="m-widget24__title">
                                                    Vehicles
                                                </h4>
                                                <br>
                                                <span class="m-widget24__desc">
                                                    Total Vehicles
                                                </span>
                                                <span class="m-widget24__stats m--font-info">
                                                    {{$vehicleCount}}
                                                </span>
                                                <div class="m--space-10"></div>
                                                <div class="progress m-progress--sm">
                                                    <div class="progress-bar m--bg-info" role="progressbar" style="width: 100%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end::New Feedbacks-->
                                    </div>
                                    <div class="col-md-12 col-lg-6 col-xl-3">
                                        <!--begin::New Orders-->
                                        <div class="m-widget24">
                                            <div class="m-widget24__item">
                                                <h4 class="m-widget24__title">
                                                    Customers
                                                </h4>
                                                <br>
                                                <span class="m-widget24__desc">
                                                    Total Customers
                                                </span>
                                                <span class="m-widget24__stats m--font-danger">
                                                    {{$customerCount}}
                                                </span>
                                                <div class="m--space-10"></div>
                                                <div class="progress m-progress--sm">
                                                    <div class="progress-bar m--bg-danger" role="progressbar" style="width: 100%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end::New Orders-->
                                    </div>
                                    <div class="col-md-12 col-lg-6 col-xl-3">
                                        <!--begin::New Users-->
                                        <div class="m-widget24">
                                            <div class="m-widget24__item">
                                                <h4 class="m-widget24__title">
                                                    Drivers
                                                </h4>
                                                <br>
                                                <span class="m-widget24__desc">
                                                    Total Drivers
                                                </span>
                                                <span class="m-widget24__stats m--font-success">
                                                    {{$driverCount}}
                                                </span>
                                                <div class="m--space-10"></div>
                                                <div class="progress m-progress--sm">
                                                    <div class="progress-bar m--bg-success" role="progressbar" style="width: 100%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end::New Users-->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end:: Widgets/Stats--> 

                        <!--Begin::Main Portlet-->
                        <div class="m-portlet">
                            <div class="m-portlet__body m-portlet__body--no-padding">
                                <div class="row m-row--no-padding m-row--col-separator-xl">
                                    <div class="col-md-12 col-lg-12 col-xl-4">
                                        <!--begin:: Widgets/Stats2-1 -->
                                        <div class="m-widget1">
                                            <div class="m-widget1__item">
                                                <div class="row m-row--no-padding align-items-center">
                                                    <div class="col">
                                                        <h3 class="m-widget1__title">
                                                            Laravel Framework
                                                        </h3>
                                                        <span class="m-widget1__desc">
                                                            Application Back-end 
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="m-widget1__item">
                                                <div class="row m-row--no-padding align-items-center">
                                                    <div class="col">
                                                        <h3 class="m-widget1__title">
                                                            Bootstrap / jQuery / Ajax
                                                        </h3>
                                                        <span class="m-widget1__desc">
                                                            Application Front-end
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <!--end:: Widgets/Stats2-1 -->
                                    </div>
                                    <div class="col-md-12 col-lg-12 col-xl-4">
                                        <!--begin:: Widgets/Stats2-2 -->
                                        <div class="m-widget1">
                                            <div class="m-widget1__item">
                                                <div class="row m-row--no-padding align-items-center">
                                                    <div class="col">
                                                        <h3 class="m-widget1__title">
                                                            AWS SNS
                                                        </h3>
                                                        <span class="m-widget1__desc">
                                                            Simple Notification Service (SMS)
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="m-widget1__item">
                                                <div class="row m-row--no-padding align-items-center">
                                                    <div class="col">
                                                        <h3 class="m-widget1__title">
                                                            AWS SES
                                                        </h3>
                                                        <span class="m-widget1__desc">
                                                            Simple Email Service (Email)
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--begin:: Widgets/Stats2-2 -->
                                    </div>

                                    <div class="col-md-12 col-lg-12 col-xl-4">
                                        <!--begin:: Widgets/Stats2-2 -->
                                        <div class="m-widget1">
                                            <div class="m-widget1__item">
                                                <div class="row m-row--no-padding align-items-center">
                                                    <div class="col">
                                                        <h3 class="m-widget1__title">
                                                            AWS EC2
                                                        </h3>
                                                        <span class="m-widget1__desc">
                                                            Elastic Cloud For Application Hosting
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="m-widget1__item">
                                                <div class="row m-row--no-padding align-items-center">
                                                    <div class="col">
                                                        <h3 class="m-widget1__title">
                                                            AWS S3
                                                        </h3>
                                                        <span class="m-widget1__desc">
                                                            Storage Service (For Vehicle Expenditure Docs)
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                          
                                        </div>
                                        <!--begin:: Widgets/Stats2-2 -->
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                        <!--End::Main Portlet-->

@endsection
