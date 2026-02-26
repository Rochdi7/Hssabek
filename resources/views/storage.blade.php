<?php $page = 'storage'; ?>
@extends('layout.mainlayout')
@section('content')
    <!-- ========================
        Start Page Content
    ========================= -->

    <div class="page-wrapper">
        <div class="content">
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
                                <div class="pb-3 border-bottom mb-3">
                                    <h6 class="mb-0">Storage</h6>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <!-- start card -->
                                        <div class="card shadow-none">
                                            <!-- start card body -->
                                            <div class="card-body">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <div class="d-flex align-items-center">
                                                        <span class="avatar avatar-md bg-light rounded p-2 me-2">
                                                            <img src="{{URL::asset('build/img/icons/storage-icon-01.svg')}}" class="img-fluid" alt="Img">
                                                        </span>
                                                        <p class="fw-medium text-dark">Local Storage</p>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <div class="form-check form-switch">
                                                            <input type="checkbox" id="user1" class="form-check-input" role="switch" checked>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end card body -->
                                        </div>
                                        <!-- end card -->
                                    </div>
                                    <div class="col-md-6">
                                        <!-- start card -->
                                        <div class="card shadow-none">
                                            <!-- start card body -->
                                            <div class="card-body">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <div class="d-flex align-items-center">
                                                        <span class="avatar avatar-md bg-light rounded p-2 me-2">
                                                            <img src="{{URL::asset('build/img/icons/storage-icon-02.svg')}}" class="img-fluid" alt="Img">
                                                        </span>
                                                        <p class="fw-medium text-dark">AWS</p>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <a href="javascript:void(0);" class="btn btn-sm btn-light rounded-2 d-inline-flex align-items-center justify-content-center p-1 me-2" data-bs-toggle="modal" data-bs-target="#aws_modal"><i class="isax isax-setting-2 fs-14"></i></a>
                                                        <div class="form-check form-switch">
                                                            <input type="checkbox" id="user2" class="form-check-input" role="switch" checked>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end card body -->
                                        </div>
                                        <!-- end card -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                </div>
            </div>
        </div>

        <!--Start Footer-->
        <div class="footer d-sm-flex align-items-center justify-content-between bg-white py-2 px-4 border-top">
            <p class="text-dark mb-0">&copy; 2025 <a href="javascript:void(0);" class="link-primary">Kanakku</a>, All Rights Reserved</p>
            <p class="text-dark">Version : 1.3.8</p>
        </div>
        <!-- End Footer-->
    </div>

    <!-- ========================
        End Page Content
    ========================= -->
@endsection