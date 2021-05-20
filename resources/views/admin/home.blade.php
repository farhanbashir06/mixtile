@extends('layout.admin')

@section('subheader')
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <!--begin::Page Title-->
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Dashboard</h5>
                <!--end::Page Title-->
                <!--begin::Actions-->
                <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
                <span class="text-muted font-weight-bold mr-4"></span>

                <!--end::Actions-->
            </div>
            <!--end::Info-->
            <!--begin::Toolbar-->
           
        </div>
    </div>
    <!--end::Subheader-->
@endsection
@section('dashboard')
    <!--begine::Dashboard-->
    <div class="container-fluid">
        <div class="row">
            <div class=" col-md-4">
                <div class="card">
                    <div class="card-header">
                    </div>
                    <div class="card-body">
                        <span class="fa fa-user-friends text-center mx-auto d-block text-dark" style="font-size:32px"></span>
                        <p class="text-center text-dark mt-3" style="font-size:16px; font-weight:500; "><a href="{{url('/')}}" class="text-decoration-none text-dark">Orders</a></p>
                    </div>
                    <div class="card-footer">
                    </div>
                </div>
            </div>
            <div class=" col-md-4">
                <div class="card">
                    <div class="card-header">
                    </div>
                    <div class="card-body">
                        <span class="fa fa-briefcase text-center mx-auto d-block text-dark" style="font-size:32px"></span>
                        <p class="text-center text-dark mt-3" style="font-size:16px; font-weight:500; "><a href="{{url('/')}}" class="text-decoration-none text-dark">Profile</a></p>
                    </div>
                    <div class="card-footer">
                    </div>
                </div>
            </div>
            <div class=" col-md-4">
                <div class="card">
                    <div class="card-header">
                    </div>
                    <div class="card-body">
                        <span class="fa fa-wrench text-center mx-auto d-block text-dark" style="font-size:32px"></span>
                        <p class="text-center text-dark mt-3" style="font-size:16px; font-weight:500; "><a href="#" class="text-decoration-none text-dark">etc</a></p>
                    </div>
                    <div class="card-footer">
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class=" col-md-4">
                <div class="card">
                    <div class="card-header">
                    </div>
                    <div class="card-body">
                        <span class="fa fa-paperclip text-center mx-auto d-block text-dark" style="font-size:32px"></span>
                        <p class="text-center text-dark mt-3" style="font-size:16px; font-weight:500; "><a href="{{url('/')}}" class="text-decoration-none text-dark">etc</a></p>
                    </div>
                    <div class="card-footer">
                    </div>
                </div>
            </div>
            <div class=" col-md-4">
                    <div class="card">
                        <div class="card-header">
                        </div>
                        <div class="card-body">
                            <span class="fa fa-chart-bar text-center mx-auto d-block text-dark" style="font-size:32px"></span>
                            <p class="text-center text-dark mt-3" style="font-size:16px; font-weight:500; "><a href="{{url('/')}}" class="text-decoration-none text-dark">etc</a></p>
                        </div>
                        <div class="card-footer">
                        </div>
                    </div>
            </div>
            <div class=" col-md-4">
                        <div class="card">
                            <div class="card-header">
                            </div>
                            <div class="card-body">
                                <span class="fa fa-question-circle text-center mx-auto d-block text-dark" style="font-size:32px"></span>
                                <p class="text-center text-dark mt-3" style="font-size:16px; font-weight:500; "><a href="#" class="text-decoration-none text-dark">etc?</a></p>
                            </div>
                            <div class="card-footer">
                            </div>
                        </div>
            </div>
        </div>
    </div>
    <!--end::Dashboard-->
@endsection
