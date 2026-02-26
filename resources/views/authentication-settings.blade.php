<?php $page = 'authentication-settings'; ?>
@extends('layout.mainlayout')
@section('content')
    <!-- ========================
        Start Page Content
    ========================= -->

    <div class="page-wrapper">

        <!-- Start Content -->
        <div class="content">

            <!-- start row-->
            <div class="row justify-content-center">
                <div class="col-lg-12">

                    <!-- start row -->
                    <div class=" row settings-wrapper d-flex">
                        
                        @component('components.settings-sidebar')
                        @endcomponent   

                        <div class="col-xl-9 col-lg-8">
                            <div class="mb-3 pb-3 border-bottom">
                                <h6 class="fw-bold mb-0">Authentication</h6>
                            </div>
                            
                            <!-- start row -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card shadow-none">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center border-0 mb-3 pb-0">
                                                <div class="d-flex align-items-center">
                                                    <span class="avatar avatar-lg p-2 bg-light rounded flex-shrink-0 me-2"><img src="{{URL::asset('build/img/icons/google.svg')}}" alt="Img"></span>
                                                    <p class="fw-medium text-gray-9">Google</p>
                                                </div>
                                            </div>
                                            <p class="text-truncate line-clamb-2">Streamline your access using your Google account for secure and efficient login to your account.</p>
                                        </div>
                                        <!-- end card body -->
                                        <div class="card-footer bg-light d-flex align-items-center justify-content-between ">
                                            <div class="d-flex align-items-center">
                                                <a class="btn btn-sm btn-dark rounded-2 d-inline-flex align-items-center justify-content-center p-1 me-2" href="javascript:void(0);"><i class="isax isax-trash" data-bs-toggle="modal" data-bs-target="#delete_modal"></i></a>
                                                <a class="btn btn-sm btn-dark rounded-2 d-inline-flex align-items-center justify-content-center p-1" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#google_login"><i class="isax isax-setting-2"></i></a>
                                            </div>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input m-0" type="checkbox" checked="">
                                            </div>
                                        </div>
                                        <!-- end card footer -->
                                    </div>
                                    <!-- end card -->
                                </div><!-- end col -->
                                <div class="col-md-6">
                                    <div class="card shadow-none">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center border-0 mb-3 pb-0">
                                                <div class="d-flex align-items-center">
                                                    <span class="avatar avatar-lg p-2 bg-light rounded flex-shrink-0 me-2"><img src="{{URL::asset('build/img/icons/facebook.svg')}}" alt="Img"></span>
                                                    <p class="fw-medium text-gray-9">Facebook</p>
                                                </div>
                                            </div>
                                            <p class="text-truncate line-clamb-2">Quickly log in or register using your Facebook account, easy to manage operations.</p>
                                        </div>
                                        <!-- end card body -->
                                        <div class="card-footer bg-light d-flex align-items-center justify-content-between ">
                                            <div class="d-flex align-items-center">
                                                <a class="btn btn-sm btn-dark rounded-2 d-inline-flex align-items-center justify-content-center p-1 me-2" href="javascript:void(0);"><i class="isax isax-trash" data-bs-toggle="modal" data-bs-target="#delete_modal"></i></a>
                                                <a class="btn btn-sm btn-dark rounded-2 d-inline-flex align-items-center justify-content-center p-1" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#facebook_login"><i class="isax isax-setting-2"></i></a>
                                            </div>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input m-0" type="checkbox" checked="">
                                            </div>
                                        </div>
                                        <!-- end card footer -->
                                    </div>
                                    <!-- end card -->
                                </div><!-- end col -->
                                <div class="col-md-6">
                                    <div class="card shadow-none">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center border-0 mb-3 pb-0">
                                                <div class="d-flex align-items-center">
                                                    <span class="avatar avatar-lg p-2 bg-light rounded flex-shrink-0 me-2"><img src="{{URL::asset('build/img/icons/apple.svg')}}" alt="Img"></span>
                                                    <p class="fw-medium text-gray-9">Apple</p>
                                                </div>
                                            </div>
                                            <p class="text-truncate line-clamb-2">Allows users to sign in using their Apple ID, offering secure and privacy-focused access to account.</p>
                                        </div>
                                        <!-- end card body -->
                                        <div class="card-footer bg-light d-flex align-items-center justify-content-between ">
                                            <div class="d-flex align-items-center">
                                                <a class="btn btn-sm btn-dark rounded-2 d-inline-flex align-items-center justify-content-center p-1 me-2" href="javascript:void(0);"><i class="isax isax-trash" data-bs-toggle="modal" data-bs-target="#delete_modal"></i></a>
                                                <a class="btn btn-sm btn-dark rounded-2 d-inline-flex align-items-center justify-content-center p-1" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#apple_login"><i class="isax isax-setting-2"></i></a>
                                            </div>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input m-0" type="checkbox" checked="">
                                            </div>
                                        </div>
                                        <!-- end card footer -->
                                    </div>
                                    <!-- end card -->
                                </div><!-- end col -->
                                <div class="col-md-6">
                                    <div class="card shadow-none">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center border-0 mb-3 pb-0">
                                                <div class="d-flex align-items-center">
                                                    <span class="avatar avatar-lg p-2 bg-light rounded flex-shrink-0 me-2"><img src="{{URL::asset('build/img/icons/sso.svg')}}" alt="Img"></span>
                                                    <p class="fw-medium text-gray-9">SSO</p>
                                                </div>
                                            </div>
                                            <p class="text-truncate line-clamb-2">Enables users to access multiple applications or systems with one set of login credentials</p>
                                        </div>
                                        <!-- end card body -->
                                        <div class="card-footer bg-light d-flex align-items-center justify-content-between ">
                                            <div class="d-flex align-items-center">
                                                <a class="btn btn-sm btn-dark rounded-2 d-inline-flex align-items-center justify-content-center p-1 me-2" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash"></i></a>
                                                <a class="btn btn-sm btn-dark rounded-2 d-inline-flex align-items-center justify-content-center p-1" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#sso_login"><i class="isax isax-setting-2"></i></a>
                                            </div>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input m-0" type="checkbox" checked="">
                                            </div>
                                        </div>
                                        <!-- end card footer -->
                                    </div>
                                    <!-- end card -->
                                </div><!-- end col -->
                            </div>
                            <!-- end row -->

                        </div><!-- end col -->


                    </div>
                    <!-- end row -->

                </div><!-- end col -->
            </div>
            <!-- end row-->

        </div>
        <!-- End Content -->

        @component('components.footer')
        @endcomponent

    </div>


    <!-- ========================
        End Page Content
    ========================= -->
@endsection