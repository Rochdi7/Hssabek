<?php $page = 'sms-gateways'; ?>
@extends('layout.mainlayout')
@section('content')
    <!-- ========================
        Start Page Content
    ========================= -->

    <div class="page-wrapper">

        <!-- Start Content -->
        <div class="content">
            <!-- start row -->
            <div class="row">
                <div class="col-lg-12 mx-auto">
                    <!-- start row -->
                    <div class="row">
                        <!-- Start settings sidebar -->
                        @component('components.settings-sidebar')
                        @endcomponent                        
                        <!-- End settings sidebar -->
                        <div class="col-xl-9 col-lg-8">
                            <div>
                                <div class="pb-3 d-flex align-items-center justify-content-between border-bottom mb-3">
                                    <h6 class="mb-0">SMS Gateways</h6>
                                </div>
                                <div class="mb-0">
                                    <!-- start row -->
                                    <div class="row">
                                        <div class="col-md-6 d-flex">
                                            <div class="card flex-fill">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center justify-content-between mb-3 gap-2 flex-wrap">
                                                        <div class="d-flex align-items-center">
                                                            <span>
                                                                <img src="{{URL::asset('build/img/icons/nexmo-logo-icon.svg')}}" class="img-fluid" alt="img">
                                                            </span>
                                                        </div>
                                                        <span class="badge badge-soft-success d-flex align-items-center">
                                                            <span class="badge-dot bg-success me-1"></span>
                                                            Connected
                                                        </span>
                                                    </div>
                                                    <p class="fs-13">Enables seamless communication through SMS, voice, and APIs.</p>
                                                </div><!-- end card body -->
                                                <div class="card-footer">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <a href="javascript:void(0);" class="btn btn-sm btn-dark rounded-2 d-inline-flex align-items-center justify-content-center p-1 me-2" data-bs-toggle="modal" data-bs-target="#delete_modal">
                                                                <i class="isax isax-trash fs-14"></i>
                                                            </a>
                                                            <a href="javascript:void(0);" class="btn btn-sm btn-dark rounded-2 d-inline-flex align-items-center justify-content-center p-1 me-2" data-bs-toggle="modal" data-bs-target="#add_nexmo">
                                                                <i class="isax isax-setting-2 fs-14"></i>
                                                            </a>
                                                        </div>
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox" role="switch" checked>
                                                        </div>
                                                </div>
                                                </div><!-- end card footer -->
                                            </div><!-- end card -->
                                        </div><!-- end col -->
                                        <div class="col-md-6 d-flex">
                                            <div class="card flex-fill">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center justify-content-between mb-3 gap-2 flex-wrap">
                                                        <div class="d-flex align-items-center">
                                                            <span>
                                                                <img src="{{URL::asset('build/img/icons/two-factor-icon.svg')}}" class="img-fluid" alt="img">
                                                            </span>
                                                        </div>
                                                        <span class="badge badge-soft-success d-flex align-items-center">
                                                            <span class="badge-dot bg-success me-1"></span>
                                                            Connected
                                                        </span>
                                                    </div>
                                                    <p class="fs-13">2Factor offers simple sms integration API and sample code to send SMS</p>
                                                </div><!-- end card body -->
                                                <div class="card-footer">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <a href="javascript:void(0);" class="btn btn-sm btn-dark rounded-2 d-inline-flex align-items-center justify-content-center p-1 me-2" data-bs-toggle="modal" data-bs-target="#delete_modal">
                                                                <i class="isax isax-trash fs-14"></i>
                                                            </a>
                                                            <a href="javascript:void(0);" class="btn btn-sm btn-dark rounded-2 d-inline-flex align-items-center justify-content-center p-1 me-2" >
                                                                <i class="isax isax-setting-2 fs-14"></i>
                                                            </a>
                                                        </div>
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox" role="switch" checked>
                                                        </div>
                                                </div>
                                                </div><!-- end card footer -->
                                            </div><!-- end card -->
                                        </div><!-- end col -->
                                        <div class="col-md-6 d-flex">
                                            <div class="card flex-fill">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center justify-content-between mb-3 gap-2 flex-wrap">
                                                        <div class="d-flex align-items-center">
                                                            <span>
                                                                <img src="{{URL::asset('build/img/icons/twilio-icon.svg')}}" class="img-fluid" alt="img">
                                                            </span>
                                                        </div>
                                                        <span class="badge badge-soft-primary d-flex align-items-center text-gray-9">
                                                            <span class="badge-dot bg-dark me-1"></span>
                                                            Not Connected
                                                        </span>
                                                    </div>
                                                    <p class="fs-13">Twilio provides APIs for messaging, voice, and video integration.</p>
                                                </div>
                                                <div class="card-footer">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <a href="javascript:void(0);" class="btn btn-sm btn-dark rounded-2 d-inline-flex align-items-center justify-content-center p-1 me-2" data-bs-toggle="modal" data-bs-target="#delete_modal">
                                                                <i class="isax isax-trash fs-14"></i>
                                                            </a>
                                                            <a href="javascript:void(0);" class="btn btn-sm btn-dark rounded-2 d-inline-flex align-items-center justify-content-center p-1 me-2" >
                                                                <i class="isax isax-setting-2 fs-14"></i>
                                                            </a>
                                                        </div>
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox" role="switch" checked>
                                                        </div>
                                                </div>
                                                </div><!-- end card footer -->
                                            </div><!-- end card -->
                                        </div><!-- end col -->
                                    </div>
                                    <!-- end row -->
                                </div>
                            </div>
                        </div><!-- end col -->
                    </div>
                    <!-- end row -->
                </div><!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- End Content -->

        <!-- Start Footer -->
        <div class="footer d-sm-flex align-items-center justify-content-between bg-white py-2 px-4 border-top">
            <p class="text-dark mb-0">&copy; 2025 <a href="javascript:void(0);" class="link-primary">Kanakku</a>, All Rights Reserved</p>
            <p class="text-dark">Version : 1.3.8</p>
        </div>
        <!-- End Footer -->
    </div>
    
    <!-- ========================
        End Page Content
    ========================= -->
@endsection