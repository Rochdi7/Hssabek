<?php $page = 'security-settings'; ?>
@extends('layout.mainlayout')
@section('content')
    <!-- ========================
        Start Page Content
    ========================= -->

    <div class="page-wrapper">	

        <!-- Start Content -->
        <div class="content">
            <!-- start row -->
            <div class="row justify-content-center">
                <div class="col-xl-12">
                    <!-- start row -->
                    <div class=" row settings-wrapper d-flex">
                        <!-- Start settings sidebar -->
                        @component('components.settings-sidebar')
                        @endcomponent                        
                        <!-- End settings sidebar -->
                            
                        <div class="col-xl-9 col-lg-8">
                            <div class="mb-3">
                                <div class="pb-3 border-bottom mb-3">
                                    <h6 class="mb-0">Security</h6>
                                </div>
                                <div class="d-flex align-items-center justify-content-between flex-wrap row-gap-3 border-bottom mb-3 pb-3">
                                    <div class="d-flex align-items-center">
                                        <span class="avatar avatar-lg border bg-light me-2">
                                            <i class="isax isax-lock-circle text-dark fs-24"></i>
                                        </span>
                                        <div>
                                            <h5 class="fs-16 fw-semibold mb-1">Password</h5>
                                            <p class="fs-14">Set a unique password to secure the account</p>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <span class="badge badge-md badge-soft-danger me-3">Last Changed, Jan 16, 2025</span>                                            
                                        <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#change_password"><span class="badge badge-soft-light text-dark d-inline-flex align-items-center"><i class="isax isax-edit"></i></span></a>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-between flex-wrap row-gap-3 border-bottom mb-3 pb-3">
                                    <div class="d-flex align-items-center">
                                        <span class="avatar avatar-lg border bg-light me-2">
                                            <i class="isax isax-security-safe text-dark fs-24"></i>
                                        </span>
                                        <div>
                                            <h5 class="fs-16 fw-semibold mb-1">Two Factor Authentication</h5>
                                            <p class="fs-14">Use your mobile phone to receive security PIN.</p>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <span class="badge badge-md badge-soft-danger">Enabled, Jan 16, 2025</span>
                                        <label class="d-flex align-items-center form-switch ps-3">
                                            <input class="form-check-input m-0 me-2" type="checkbox" checked>
                                        </label>
                                        <a href="javascript:void(0);"><span class="badge badge-soft-light text-dark d-inline-flex align-items-center" data-bs-toggle="modal" data-bs-target="#two-factor"><i class="isax isax-setting-2"></i></span></a>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-between flex-wrap row-gap-3 border-bottom mb-3 pb-3">										
                                    <div class="d-flex align-items-center">
                                        <span class="avatar avatar-lg border bg-light me-2">
                                            <img src="{{URL::asset('build/img/icons/google-icon.svg')}}" class="w-75" alt="icon">
                                        </span>
                                        <div>
                                            <h5 class="fs-16 fw-semibold mb-1">Google Authentication</h5>
                                            <p class="fs-14">Connect to Google</p>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <span class="badge badge-outline-light text-dark border d-flex align-items-center"><i class="fa fa-circle text-success fs-8 me-1"></i>Connected</span>
                                        <label class="d-flex align-items-center form-switch ps-3">
                                            <input class="form-check-input m-0 me-2" type="checkbox" checked>
                                        </label>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-between flex-wrap row-gap-3 border-bottom mb-3 pb-3">
                                    <div class="d-flex align-items-center">
                                        <span class="avatar avatar-lg border bg-light me-2">
                                            <i class="isax isax-call text-dark fs-24"></i>
                                        </span>
                                        <div>
                                            <h5 class="fs-16 fw-semibold mb-1">Phone Number Verification</h5>
                                            <p class="fs-14">Phone Number associated with the account</p>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <span class="badge badge-md badge-soft-success me-3">Verified<i class="isax isax-tick-circle ms-1"></i></span>
                                        <a href="javascript:void(0);" class="me-3" data-bs-toggle="modal" data-bs-target="#phone_verification"><span class="badge badge-soft-light text-dark d-inline-flex align-items-center"><i class="isax isax-edit"></i></span></a>
                                        <a href="javascript:void(0);"><span class="badge badge-soft-light text-dark d-inline-flex align-items-center"><i class="isax isax-trash"></i></span></a>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-between flex-wrap row-gap-3 border-bottom mb-3 pb-3">
                                    <div class="d-flex align-items-center">
                                        <span class="avatar avatar-lg border bg-light me-2">
                                            <i class="isax isax-sms-tracking text-dark fs-24"></i>
                                        </span>
                                        <div>
                                            <h5 class="fs-16 fw-semibold mb-1">Email Verification</h5>
                                            <p class="fs-14">Email Address associated with the account</p>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <span class="badge badge-md badge-soft-success me-3">Verified<i class="isax isax-tick-circle ms-1"></i></span>
                                        <a href="javascript:void(0);" class="me-3" data-bs-toggle="modal" data-bs-target="#email_verification"><span class="badge badge-soft-light text-dark d-inline-flex align-items-center"><i class="isax isax-edit"></i></span></a>
                                        <a href="javascript:void(0);"><span class="badge badge-soft-light text-dark d-inline-flex align-items-center"><i class="isax isax-trash"></i></span></a>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-between flex-wrap row-gap-3 border-bottom mb-3 pb-3">
                                    <div class="d-flex align-items-center">
                                        <span class="avatar avatar-lg border bg-light me-2">
                                            <i class="isax isax-device-message text-dark fs-24"></i>
                                        </span>
                                        <div>
                                            <h5 class="fs-16 fw-semibold mb-1">Browsers & Devices</h5>
                                            <p class="fs-14">The browsers & devices associated with the account</p>
                                        </div>
                                    </div>
                                    <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#view_device"><span class="badge badge-soft-light text-dark d-inline-flex align-items-center"><i class="isax isax-eye"></i></span></a>
                                </div>
                                <div class="d-flex align-items-center justify-content-between flex-wrap row-gap-3 border-bottom mb-3 pb-3">
                                    <div class="d-flex align-items-center">
                                        <span class="avatar avatar-lg border bg-light me-2">
                                            <i class="isax isax-close-circle text-dark fs-24"></i>
                                        </span>
                                        <div>
                                            <h5 class="fs-16 fw-semibold mb-1">Deactivate Account</h5>
                                            <p class="fs-14">This will shutdown your account. Your account will be reactive when you sign in again</p>
                                        </div>
                                    </div>
                                    <a href="javascript:void(0);"><span class="badge badge-soft-light text-dark d-inline-flex align-items-center"><i class="isax isax-slash"></i></span></a>
                                </div>
                                <div class="d-flex align-items-center justify-content-between flex-wrap row-gap-3">
                                    <div class="d-flex align-items-center">
                                        <span class="avatar avatar-lg border bg-light me-2">
                                            <i class="isax isax-info-circle text-dark fs-24"></i>
                                        </span>
                                        <div>
                                            <h5 class="fs-16 fw-semibold mb-1">Delete Account</h5>
                                            <p class="fs-14">Your account will be permanently deleted</p>
                                        </div>
                                    </div>
                                    <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#delete_modal"><span class="badge badge-soft-light text-dark d-inline-flex align-items-center"><i class="isax isax-trash"></i></span></a>
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
        <div class="footer d-sm-flex align-items-center justify-content-between bg-white py-2 px-4">
            <p class="text-dark mb-0">&copy; 2025 <a href="javascript:void(0);" class="link-primary">Kanakku</a>, All Rights Reserved</p>
            <p class="text-dark">Version : 1.3.8</p>
        </div>
        <!-- End Footer -->
    </div>

    <!-- ========================
        End Page Content
    ========================= -->
@endsection