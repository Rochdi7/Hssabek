<?php $page = 'sass-settings'; ?>
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
                                    <h6 class="mb-0">Saas Settings</h6>
                                </div>
                                <form action="{{url('sass-settings')}}">
                                    <div class="card-body vh-100 border-bottom mb-3">
                                        <div class="row align-items-center mb-3">
                                            <div class="col-md-8 col-sm-12">
                                                <label class="form-label fw-medium">Default Currency</label>
                                            </div>
                                            <div class="col-md-4 col-sm-12">
                                                <select class="select form-control">
                                                    <option>Dollar</option>
                                                    <option>USD</option>
                                                    <option>Euro</option>
                                                    <option>Pound</option>
                                                    <option>Rupee</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row align-items-center mb-3">
                                            <div class="col-md-8 col-sm-12">
                                                <label class="form-label fw-medium">Days between initial warning and subscription ends</label>
                                            </div>
                                            <div class="col-md-4 col-sm-12">
                                                <input type="text" class="form-control">
                                            </div>
                                        </div> 
                                        <div class="row align-items-center mb-3">
                                            <div class="col-md-8 col-sm-12">
                                                <label class="form-label fw-medium">Interval days between warnings</label>
                                            </div>
                                            <div class="col-md-4 col-sm-12">
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row align-items-center mb-3">
                                            <div class="col-md-8 col-sm-12">
                                                <label class="form-label fw-medium">Maximum Free Domain A Subscriber Can Create</label>
                                            </div>
                                            <div class="col-md-4 col-sm-12">
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row align-items-center mb-3">
                                            <div class="col-9">
                                                <label class="form-label fw-medium">Email Verification</label>
                                            </div>
                                            <div class="col-3 d-flex justify-content-end">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" role="switch" checked>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row align-items-center">
                                            <div class="col-9">
                                                <label class="form-label fw-medium">Auto approve Domain creation request</label>
                                            </div>
                                            <div class="col-3 d-flex justify-content-end">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" role="switch" checked />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="modal-footer justify-content-between">
                                        <a href="javascript:void(0);" data-bs-dismiss="modal" class="btn btn-back me-2 border">Cancel</a>
                                        <a href="javascript:void(0);" data-bs-dismiss="modal" class="btn btn-primary">Save Changes</a>
                                    </div>
                                </form>
                            </div>
                        </div><!-- end col -->
                    </div>
                    <!-- end row -->
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- Start Content -->
        
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