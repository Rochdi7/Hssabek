<?php $page = 'ui-avatar'; ?>
@extends('layout.mainlayout')
@section('content')
    <!-- ========================
        Start Page Content
    ========================= -->
    
    <div class="page-wrapper">

        <!-- Start Content -->
        <div class="content">

            <!-- Page Header -->
            <div class="d-flex align-items-sm-center flex-sm-row flex-column gap-2 pb-3">
                <div class="flex-grow-1">
                    <h4 class="fs-18 fw-semibold mb-0">Avatars</h4>
                </div>

                <div class="text-end">
                    <ol class="breadcrumb m-0 py-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                        
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Base UI</a></li>
                        
                        <li class="breadcrumb-item active">Avatars</li>
                    </ol>
                </div>
            </div>
            <!-- End Page Header -->
            
            <!-- start row -->
            <div class="row">
                <div class="col-xl-6">
                    <div class="card card-h-100">
                        <div class="card-header">
                            <h5 class="card-title">Avatars</h5>
                        </div>
                        <div class="card-body">
                            <div class="d-flex align flex-wrap gap-2">
                                <span class="avatar avatar-xl me-2 avatar-rounded">
                                    <img src="{{URL::asset('build/img/profiles/avatar-02.jpg')}}" alt="img">
                                </span>
                                <span class="avatar avatar-xl me-2 avatar-radius-0">
                                    <img src="{{URL::asset('build/img/profiles/avatar-02.jpg')}}" alt="img">
                                </span>
                                <span class="avatar avatar-xl me-2">
                                    <img src="{{URL::asset('build/img/profiles/avatar-02.jpg')}}" alt="img">
                                </span>
                                <span class="avatar avatar-xl bg-primary avatar-rounded">
                                    <span class="avatar-title">SR</span>
                                </span>
                                <span class="avatar avatar-xl bg-success avatar-radius-0">
                                    <span class="avatar-title">SR</span>
                                </span>
                                <span class="avatar avatar-xl bg-danger">
                                    <span class="avatar-title">SR</span>
                                </span>
                            </div>
                        </div> <!-- end card body -->
                    </div> <!-- end card -->
                </div> <!-- end col -->

                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Avatar Sizes</h5>
                        </div>
                        <div class="card-body">
                            <span class="avatar avatar-xss me-2">
                                <img src="{{URL::asset('build/img/profiles/avatar-02.jpg')}}" alt="img">
                            </span>
                            <span class="avatar avatar-xs me-2">
                                <img src="{{URL::asset('build/img/profiles/avatar-02.jpg')}}" alt="img">
                            </span>
                            <span class="avatar avatar-sm me-2">
                                <img src="{{URL::asset('build/img/profiles/avatar-02.jpg')}}" alt="img">
                            </span>
                            <span class="avatar avatar-md me-2">
                                <img src="{{URL::asset('build/img/profiles/avatar-02.jpg')}}" alt="img">
                            </span>
                            <span class="avatar avatar-lg me-2">
                                <img src="{{URL::asset('build/img/profiles/avatar-02.jpg')}}" alt="img">
                            </span>
                            <span class="avatar avatar-xl me-2">
                                <img src="{{URL::asset('build/img/profiles/avatar-02.jpg')}}" alt="img">
                            </span>
                            <span class="avatar avatar-xxl me-2">
                                <img src="{{URL::asset('build/img/profiles/avatar-02.jpg')}}" alt="img">
                            </span>
                            <span class="avatar avatar-xxxl me-2">
                                <img src="{{URL::asset('build/img/profiles/avatar-02.jpg')}}" alt="img">
                            </span>
                        </div> <!-- end card body -->
                    </div> <!-- end card -->
                </div> <!-- end col -->
            </div>
            <!-- end row -->
                
            <!-- start row -->
            <div class="row">
            
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Avatar with Status</h5>
                        </div>
                        <div class="card-body">
                        
                            <span class="avatar avatar-xs me-2 online avatar-rounded">
                                <img src="{{URL::asset('build/img/profiles/avatar-03.jpg')}}" alt="img">
                            </span>
                            <span class="avatar avatar-sm online me-2 avatar-rounded">
                                <img src="{{URL::asset('build/img/profiles/avatar-03.jpg')}}" alt="img">
                            </span>
                            <span class="avatar avatar-md me-2 online avatar-rounded">
                                <img src="{{URL::asset('build/img/profiles/avatar-03.jpg')}}" alt="img">
                            </span>
                            <span class="avatar avatar-lg me-2 away avatar-rounded">
                                <img src="{{URL::asset('build/img/profiles/avatar-03.jpg')}}" alt="img">
                            </span>
                            <span class="avatar avatar-xl me-2 online avatar-rounded">
                                <img src="{{URL::asset('build/img/profiles/avatar-03.jpg')}}" alt="img">
                            </span>
                            <span class="avatar avatar-xxl me-2 offline avatar-rounded">
                                <img src="{{URL::asset('build/img/profiles/avatar-03.jpg')}}" alt="img">
                            </span>
                            
                        </div> <!-- end card body -->
                    </div> <!-- end card -->
                </div> <!-- end col -->

                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Avatar with Badge</h5>
                        </div>
                        <div class="card-body">
                            <span class="avatar avatar-xs me-2 avatar-rounded">
                                <img src="{{URL::asset('build/img/profiles/avatar-02.jpg')}}" alt="img">
                                <span class="badge rounded-pill bg-primary avatar-badge">2</span>
                            </span>
                            <span class="avatar avatar-sm me-2 avatar-rounded">
                                <img src="{{URL::asset('build/img/profiles/avatar-02.jpg')}}" alt="img">
                                <span class="badge rounded-pill bg-secondary avatar-badge">5</span>
                            </span>
                            <span class="avatar avatar-md me-2 avatar-rounded">
                                <img src="{{URL::asset('build/img/profiles/avatar-02.jpg')}}" alt="img">
                                <span class="badge rounded-pill bg-warning avatar-badge">1</span>
                            </span>
                            <span class="avatar avatar-lg me-2 avatar-rounded">
                                <img src="{{URL::asset('build/img/profiles/avatar-02.jpg')}}" alt="img">
                                <span class="badge rounded-pill bg-info avatar-badge">7</span>
                            </span>
                            <span class="avatar avatar-xl me-2 avatar-rounded">
                                <img src="{{URL::asset('build/img/profiles/avatar-02.jpg')}}" alt="img">
                                <span class="badge rounded-pill bg-success avatar-badge">3</span>
                            </span>
                            <span class="avatar avatar-xxl me-2 avatar-rounded">
                                <img src="{{URL::asset('build/img/profiles/avatar-02.jpg')}}" alt="img">
                                <span class="badge rounded-pill bg-danger avatar-badge">9</span>
                            </span>
                        </div> <!-- end card body -->
                    </div> <!-- end card -->
                </div> <!-- end col -->

                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Solid Background Color</h5>
                        </div>
                        <div class="card-body">
                            <span class="avatar bg-primary avatar-rounded">
                                <span class="avatar-title">JD</span>
                            </span>
                            <span class="avatar bg-secondary avatar-rounded">
                                <span class="avatar-title">SR</span>
                            </span>
                            <span class="avatar bg-success avatar-rounded">
                                <span class="avatar-title">BJ</span>
                            </span>
                            <span class="avatar bg-info avatar-rounded">
                                <span class="avatar-title">AD</span>
                            </span>
                            <span class="avatar bg-warning avatar-rounded">
                                <span class="avatar-title">CB</span>
                            </span>
                            <span class="avatar bg-danger avatar-rounded">
                                <span class="avatar-title">KL</span>
                            </span>
                        </div> <!-- end card body -->
                    </div> <!-- end card -->
                </div> <!-- end col -->

                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Soft Background Color</h5>
                        </div>
                        <div class="card-body">
                            <span class="avatar bg-primary-subtle rounded">
                                <span class="avatar-title text-primary">JD</span>
                            </span>
                            <span class="avatar bg-secondary-subtle rounded">
                                <span class="avatar-title text-secondary">SR</span>
                            </span>
                            <span class="avatar bg-success-subtle rounded">
                                <span class="avatar-title text-success">BJ</span>
                            </span>
                            <span class="avatar bg-info-subtle rounded">
                                <span class="avatar-title text-info">AD</span>
                            </span>
                            <span class="avatar bg-warning-subtle rounded">
                                <span class="avatar-title text-warning">CB</span>
                            </span>
                            <span class="avatar bg-danger-subtle rounded">
                                <span class="avatar-title text-danger">KL</span>
                            </span>
                        </div> <!-- end card body -->
                    </div> <!-- end card -->
                </div> <!-- end col -->

                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Avatar Group - Square</h5>
                        </div>
                        <div class="card-body">
                            <div class="avatar-list-stacked avatar-group-lg mb-3">
                                <span class="avatar">
                                    <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-04.jpg')}}" alt="img">
                                </span>
                                <span class="avatar">
                                    <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-04.jpg')}}" alt="img">
                                </span>
                                <span class="avatar">
                                    <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-04.jpg')}}" alt="img">
                                </span>
                                <a class="avatar bg-primary" href="javascript:void(0);">
                                    +8
                                </a>
                            </div>
                            <div class="avatar-list-stacked mb-3">
                                <span class="avatar">
                                    <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-04.jpg')}}" alt="img">
                                </span>
                                <span class="avatar">
                                    <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-04.jpg')}}" alt="img">
                                </span>
                                <span class="avatar">
                                    <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-04.jpg')}}" alt="img">
                                </span>
                                <a class="avatar bg-primary" href="javascript:void(0);">
                                    +8
                                </a>
                            </div>
                            <div class="avatar-list-stacked avatar-group-sm">
                                <span class="avatar">
                                    <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-04.jpg')}}" alt="img">
                                </span>
                                <span class="avatar">
                                    <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-04.jpg')}}" alt="img">
                                </span>
                                <span class="avatar">
                                    <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-04.jpg')}}" alt="img">
                                </span>
                                <a class="avatar bg-primary" href="javascript:void(0);">
                                    +8
                                </a>
                            </div>
                        </div> <!-- end card body -->
                    </div> <!-- end card -->
                </div> <!-- end col -->

                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Avatar Group - Rounded</h5>
                        </div>
                        <div class="card-body">
                            <div class="avatar-list-stacked avatar-group-lg mb-3">
                                <span class="avatar avatar-rounded">
                                    <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-05.jpg')}}" alt="img">
                                </span>
                                <span class="avatar avatar-rounded">
                                    <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-05.jpg')}}" alt="img">
                                </span>
                                <span class="avatar avatar-rounded">
                                    <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-05.jpg')}}" alt="img">
                                </span>
                                <a class="avatar bg-primary avatar-rounded" href="javascript:void(0);">
                                    +8
                                </a>
                            </div>
                            <div class="avatar-list-stacked mb-3">
                                <span class="avatar avatar-rounded">
                                    <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-05.jpg')}}" alt="img">
                                </span>
                                <span class="avatar avatar-rounded">
                                    <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-05.jpg')}}" alt="img">
                                </span>
                                <span class="avatar avatar-rounded">
                                    <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-05.jpg')}}" alt="img">
                                </span>
                                <a class="avatar bg-primary avatar-rounded" href="javascript:void(0);">
                                    +8
                                </a>
                            </div>
                            <div class="avatar-list-stacked avatar-group-sm">
                                <span class="avatar avatar-rounded">
                                    <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-05.jpg')}}" alt="img">
                                </span>
                                <span class="avatar avatar-rounded">
                                    <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-05.jpg')}}" alt="img">
                                </span>
                                <span class="avatar avatar-rounded">
                                    <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-05.jpg')}}" alt="img">
                                </span>
                                <a class="avatar bg-primary avatar-rounded" href="javascript:void(0);">
                                    +8
                                </a>
                            </div>
                        </div> <!-- end card body -->
                    </div> <!-- end card -->
                </div> <!-- end col -->

            </div>
            <!-- end row -->
            
        </div>
        <!-- End Content -->

        <!-- Start Footer -->
        <div class="footer d-sm-flex align-items-center justify-content-between bg-white py-2 px-4 border-top">
            <p class="text-dark mb-0">&copy; <script>document.write(new Date().getFullYear())</script> <a href="javascript:void(0);" class="link-primary">Kanakku</a>, All Rights Reserved</p>
            <p class="text-dark">Version : 1.3.8</p>
        </div>
        <!-- End Footer -->

    </div>
    
    <!-- ========================
        End Page Content
    ========================= -->
@endsection
