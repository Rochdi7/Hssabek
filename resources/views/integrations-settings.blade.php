<?php $page = 'integrations-settings'; ?>
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
                <div class="col-lg-12">

                    <!-- start row -->
                    <div class=" row settings-wrapper d-flex">
                        <!-- Start settings sidebar -->
                        @component('components.settings-sidebar')
                        @endcomponent                        
                        <!-- End settings sidebar -->                            
                        <div class="col-xl-9 col-lg-8">
                            <div class="mb-3 pb-3 border-bottom">
                                <h6 class="fw-bold mb-0">Integrations</h6>
                            </div>

                            <!-- start row -->
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="card shadow-none">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center border-0 mb-3 pb-0">
                                                <div class="d-flex align-items-center">
                                                    <span class="avatar avatar-lg p-2 bg-light rounded flex-shrink-0 me-2"><img src="{{URL::asset('build/img/icons/mail-icon.svg')}}" alt="Img"></span>
                                                    <p class="fw-medium text-gray-9">Gmail</p>
                                                </div>
                                            </div>
                                            <p>Send invoices, payment reminders and customer communication directly </p>
                                        </div> <!-- end card body -->
                                        <div class="card-footer bg-light d-flex align-items-center justify-content-between ">
                                            <a class="btn btn-sm btn-dark rounded-2 p-1" href="#" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash"></i></a>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input m-0" type="checkbox" checked="">
                                            </div>
                                        </div> <!-- end card footer -->
                                    </div> <!-- end card -->
                                </div> <!-- end col -->

                                <div class="col-md-6">
                                    <div class="card shadow-none">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center border-0 mb-3 pb-0">
                                                <div class="d-flex align-items-center">
                                                    <span class="avatar avatar-lg p-2 bg-light rounded flex-shrink-0 me-2"><img src="{{URL::asset('build/img/icons/calender-icon.svg')}}" alt="Img"></span>
                                                    <p class="fw-medium text-gray-9">Google Calendar</p>
                                                </div>
                                            </div>
                                            <p>Automatically schedule invoice due dates and set up payment follow-up.</p>
                                        </div> <!-- end card body -->
                                        <div class="card-footer bg-light d-flex align-items-center justify-content-between ">
                                            <a class="btn btn-sm btn-dark rounded-2 p-1" href="#" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash"></i></a>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input m-0" type="checkbox" checked="">
                                            </div>
                                        </div> <!-- end card footer -->
                                    </div> <!-- end card -->
                                </div> <!-- end col -->
                            </div>
                            <!-- end row -->
                                
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