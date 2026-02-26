<?php $page = 'voice-call'; ?>
@extends('layout.mainlayout')
@section('content')
    <!-- ========================
        Start Page Content
    ========================= -->

    <div class="page-wrapper">	

        <!-- Start Content -->
        <div class="content content-two">
            <div class="col-xxl-12">
                <div class="card incoming-call mb-0 shadow-none">
                    <div class="card-header">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <span class="avatar avatar-lg avatar-rounded me-2">
                                    <img src="{{URL::asset('build/img/users/user-01.jpg')}}" class="img-fluid rounded-circle" alt="img">
                                </span>
                                <div>
                                    <h6 class="mb-1"><a href="#">Anthony Lewis</a></h6>
                                    <span class="d-block">Online</span>
                                </div>
                            </div>
                            <a href="#" class="avatar avatar-md rounded-circle bg-light text-dark">
                                <i class="ti ti-user-plus fs-20"></i>
                            </a>
                        </div>
                    </div> <!-- end card-header -->
                    <div class="card-body position-relative text-center d-flex flex-column justify-content-center">
                        <div class="voice-call-img mb-3">
                            <img src="{{URL::asset('build/img/users/user-01.jpg')}}" class="img-fluid rounded-circle" alt="img">
                        </div>
                        <h5>Anthony Lewis</h5>
                        <p>00:24</p>
                        <a href="#" class="avatar avatar-xl position-absolute end-0 bottom-0 m-3"><img src="{{URL::asset('build/img/users/user-05.jpg')}}" alt="Img"></a>
                    </div> <!-- end card-body -->
                    <div class="card-footer bg-white">
                        <div class="d-flex align-items-center justify-content-center">
                            <a href="#" class="btn btn-light call-item p-0 d-flex align-items-center justify-content-center me-3"><i class="ti ti-video fs-20"></i></a>
                            <a href="#" class="btn btn-danger call-item p-0 d-flex align-items-center justify-content-center me-3"><i class="ti ti-phone fs-20"></i></a>
                            <a href="#" class="btn btn-light call-item p-0 d-flex align-items-center justify-content-center"><i class="ti ti-microphone fs-20"></i></a>
                        </div>
                    </div> <!-- end card-footer -->
                </div> <!-- end card -->
            </div><!-- end col -->
        </div>
        <!-- container-->

        <!-- Start Footer -->
        <div class="footer d-sm-flex align-items-center justify-content-between bg-white py-2 px-4 border-top">
            <p class="text-dark mb-0">&copy; 2025 <a href="javascript:void(0);" class="link-primary">Kanakku</a>, All Rights Reserved</p>
            <p class="text-dark">Version : 1.3.8</p>
        </div>
        <!-- End Footer-->
    </div>

    <!-- ========================
        Start Page Content
    ========================= -->
@endsection