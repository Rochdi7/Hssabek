<?php $page = 'incoming-call'; ?>
@extends('layout.mainlayout')
@section('content')
    <!-- ========================
        Start Page Content
    ========================= -->

    <div class="page-wrapper">	
        <div class="content content-two">
            
            <!-- start row -->
            <div class="row">
                <div class="col-xxl-12">
                    <div class="card incoming-call mb-0 shadow-none">
                        <div class="card-body text-center d-flex flex-column justify-content-center">
                            <div class="voice-call-img mb-3">
                                <img src="{{URL::asset('build/img/users/user-01.jpg')}}" class="img-fluid rounded-circle" alt="img">
                            </div>
                            <h5>Anthony Lewis</h5>
                            <p>Calling...</p>
                            <div class="d-flex align-items-center justify-content-center">
                                <a href="#" class="btn btn-success call-item p-0 d-flex align-items-center justify-content-center me-3"><i class="ti ti-phone fs-20"></i></a>
                                <a href="#" class="btn btn-danger call-item p-0 d-flex align-items-center justify-content-center"><i class="ti ti-phone-off fs-20"></i></a>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->
            </div>
            <!-- end row -->

        </div>

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