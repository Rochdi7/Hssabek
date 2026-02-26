<?php $page = 'system-update'; ?>
@extends('layout.mainlayout')
@section('content')
    <!-- ========================
        Start Page Content
    ========================= -->

    <div class="page-wrapper">
        <div class="content">
            <!-- row start -->
            <div class="row">
                <div class="col-lg-12 mx-auto">
                    <!-- row start -->
                    <div class="row">

                        <!-- Start settings sidebar -->
                        @component('components.settings-sidebar')
                        @endcomponent                        
                        <!-- End settings sidebar -->

                        <div class="col-xl-9 col-lg-8">
                            <form action="{{url('system-update')}}">
                                <div class="d-flex justify-content-between align-items-center pb-3 border-bottom mb-3">
                                    <h6 class="mb-0">System Update</h6>
                                    <a href="javascript:void(0);" class="btn btn-primary">Check for Updates</a>
                                </div>
                                <div class="d-flex align-items-center mb-3 pb-1">
                                    <span class="avatar avatar-md bg-light rounded-circle me-2"><i class="isax isax-tick-circle5 text-primary fs-24"></i></span>
                                    <div>
                                        <p class="text-dark fw-medium mb-1">You are up to date <span class="ms-2 badge badge-soft-primary badge-sm">Current Version : 8.0</span></p>
                                        <p class="fs-13">Last Checked : Today 10:30 AM</p>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="alert alert-dismissible d-flex align-items-center fade show bg-light border mb-1" role="alert">
                                        <i class="isax isax-info-circle text-info me-2"></i>Before updating, it's best to back up your files and database and review the changelog.
                                    </div>
                                </div>
                                <!-- row start -->
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <div>
                                            <label class="form-label">Purchase Key <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div>
                                            <label class="form-label">User Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <!-- row end -->
                            </form>
                        </div>
                    </div>
                    <!-- row end -->
                </div>
            </div>
            <!-- row end -->
        </div>
        <!-- Start Footer-->
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