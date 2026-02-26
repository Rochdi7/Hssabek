<?php $page = 'customer-security-settings'; ?>
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
                <div class="col-xl-11">

                    <!-- start row -->
                    <div class=" row settings-wrapper d-flex">
                        <div class="col-xl-3 col-lg-4">
                            <div class="card settings-card">
                                <div class="card-header">
                                    <h6 class="mb-0">Settings</h6>
                                </div>
                                <div class="card-body">
                                    <div class="sidebars settings-sidebar">
                                        <div class="sidebar-inner">
                                            <div class="sidebar-menu p-0">
                                                <ul>
                                                    <li>
                                                        <a href="{{url('customer-account-settings')}}" class="fs-14 fw-medium d-flex align-items-center"><i class="isax isax-user-octagon fs-18 me-1"></i>Account Settings</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{url('customer-security-settings')}}" class="fs-14 fw-medium d-flex align-items-center active"><i class="isax isax-security-safe fs-18 me-1"></i>Security</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{url('customer-plans-settings')}}" class="fs-14 fw-medium d-flex align-items-center"><i class="isax isax-transaction-minus fs-18 me-1"></i>Plans & Billings</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{url('customer-notification-settings')}}" class="fs-14 fw-medium d-flex align-items-center"><i class="isax isax-notification fs-18 me-1"></i>Notifications</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end col -->
                        <div class="col-xl-9 col-lg-8">
                            <div class="mb-3">
                                <div class="pb-3 border-bottom mb-3">
                                    <h6 class="mb-0">Security</h6>
                                </div>
                                <div class="d-flex align-items-center justify-content-between flex-wrap row-gap-3 border-bottom mb-3 pb-3">
                                    <div>
                                        <div class="d-flex align-items-center mb-2">
                                            <span class="p-1 bg-dark rounded text-white d-inline-flex align-items-center justify-content-center me-2">
                                                <i class="isax isax-eye fs-16"></i>
                                            </span>
                                            <h5 class="fs-16 fw-semibold">Password</h5>
                                        </div>
                                        <p class="fs-14">Set a unique password to secure the account</p>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <span class="badge badge-md badge-soft-danger me-3">Last Changed, Jan 16, 2025</span>
                                        <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#change_password"><span class="badge badge-soft-light text-dark d-inline-flex align-items-center"><i class="isax isax-edit"></i></span></a>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-between flex-wrap row-gap-3 border-bottom mb-3 pb-3">
                                    <div>
                                        <div class="d-flex align-items-center mb-2">
                                            <span class="p-1 bg-dark rounded text-white d-inline-flex align-items-center justify-content-center me-2">
                                                <i class="isax isax-security-safe fs-16"></i>
                                            </span>
                                            <h5 class="fs-16 fw-semibold">Two Factor Authentication</h5>
                                        </div>
                                        <p class="fs-14">Use your mobile phone to receive security PIN.</p>
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
                                    <div>
                                        <div class="d-flex align-items-center mb-2">
                                            <span class="p-1 bg-dark rounded text-white d-inline-flex align-items-center justify-content-center me-2">
                                                <i class="isax isax-lock fs-16"></i>
                                            </span>
                                            <h5 class="fs-16 fw-semibold mb-1">Google Authentication</h5>
                                        </div>
                                        <p class="fs-14">Connect to Google</p>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <span class="badge badge-outline-light text-dark border d-flex align-items-center"><i class="fa fa-circle text-success fs-8 me-1"></i>Connected</span>
                                        <label class="d-flex align-items-center form-switch ps-3">
                                            <input class="form-check-input m-0 me-2" type="checkbox" checked>
                                        </label>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-between flex-wrap row-gap-3 border-bottom mb-3 pb-3">
                                    <div>
                                        <div class="d-flex align-items-center mb-2">
                                            <span class="p-1 bg-dark rounded text-white d-inline-flex align-items-center justify-content-center me-2">
                                                <i class="isax isax-call fs-16"></i>
                                            </span>
                                            <h5 class="fs-16 fw-semibold">Phone Number Verification</h5>
                                        </div>
                                        <p class="fs-14">Phone Number associated with the account</p>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <span class="badge badge-md badge-soft-success me-3">Verified<i class="isax isax-tick-circle ms-1"></i></span>
                                        <a href="javascript:void(0);" class="me-3" data-bs-toggle="modal" data-bs-target="#phone_verification"><span class="badge badge-soft-light text-dark d-inline-flex align-items-center"><i class="isax isax-edit"></i></span></a>
                                        <a href="javascript:void(0);"><span class="badge badge-soft-light text-dark d-inline-flex align-items-center"><i class="isax isax-trash"></i></span></a>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-between flex-wrap row-gap-3 border-bottom mb-3 pb-3">
                                    <div>
                                        <div class="d-flex align-items-center mb-2">
                                            <span class="p-1 bg-dark rounded text-white d-inline-flex align-items-center justify-content-center me-2">
                                                <i class="isax isax-sms-tracking fs-16"></i>
                                            </span>
                                            <h5 class="fs-16 fw-semibold">Email Verification</h5>
                                        </div>
                                        <p class="fs-14">Email Address associated with the account</p>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <span class="badge badge-md badge-soft-success me-3">Verified<i class="isax isax-tick-circle ms-1"></i></span>
                                        <a href="javascript:void(0);" class="me-3" data-bs-toggle="modal" data-bs-target="#email_verification"><span class="badge badge-soft-light text-dark d-inline-flex align-items-center"><i class="isax isax-edit"></i></span></a>
                                        <a href="javascript:void(0);"><span class="badge badge-soft-light text-dark d-inline-flex align-items-center"><i class="isax isax-trash"></i></span></a>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-between flex-wrap row-gap-3 border-bottom mb-3 pb-3">
                                    <div>
                                        <div class="d-flex align-items-center mb-2">
                                            <span class="p-1 bg-dark rounded text-white d-inline-flex align-items-center justify-content-center me-2">
                                                <i class="isax isax-device-message fs-16"></i>
                                            </span>
                                            <h5 class="fs-16 fw-semibold">Browsers & Devices</h5>
                                        </div>
                                        <p class="fs-14">The browsers & devices associated with the account</p>
                                    </div>
                                    <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#view_device"><span class="badge badge-soft-light text-dark d-inline-flex align-items-center"><i class="isax isax-eye"></i></span></a>
                                </div>
                                <div class="d-flex align-items-center justify-content-between flex-wrap row-gap-3 border-bottom mb-3 pb-3">
                                    <div>
                                        <div class="d-flex align-items-center mb-2">
                                            <span class="p-1 bg-dark rounded text-white d-inline-flex align-items-center justify-content-center me-2">
                                                <i class="isax isax-close-circle fs-16"></i>
                                            </span>
                                            <h5 class="fs-16 fw-semibold">Deactivate Account</h5>
                                        </div>
                                        <p class="fs-14">This will shutdown your account. Your account will be reactive when you sign in again</p>
                                    </div>
                                    <a href="javascript:void(0);"><span class="badge badge-soft-light text-dark d-inline-flex align-items-center"><i class="isax isax-slash"></i></span></a>
                                </div>
                                <div class="d-flex align-items-center justify-content-between flex-wrap row-gap-3">
                                    <div>
                                        <div class="d-flex align-items-center mb-2">
                                            <span class="p-1 bg-dark rounded text-white d-inline-flex align-items-center justify-content-center me-2">
                                                <i class="isax isax-info-circle fs-16"></i>
                                            </span>
                                            <h5 class="fs-16 fw-semibold">Delete Account</h5>
                                        </div>
                                        <p class="fs-14">Your account will be permanently deleted</p>
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

        <!-- Start Footer-->
        <div class="footer d-sm-flex align-items-center justify-content-between bg-white py-2 px-4">
            <p class="text-dark mb-0">&copy; 2025 <a href="javascript:void(0);" class="link-primary">Kanakku</a>, All Rights Reserved</p>
            <p class="text-dark">Version : 1.3.8</p>
        </div>
        <!-- End Footer-->
    </div>

    <!-- ========================
        End Page Content
    ========================= -->
@endsection