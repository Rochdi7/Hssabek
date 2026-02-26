<?php $page = 'appearance-settings'; ?>
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

                        <!-- Start settings sidebar -->
                        @component('components.settings-sidebar')
                        @endcomponent                        
                        <!-- End settings sidebar -->

                        <div class="col-xl-9 col-lg-8">
                            <div class="mb-3 pb-3 border-bottom">
                                <h6 class="fw-bold mb-0">Appearance</h6>
                            </div>
                            <form action="{{url('appearance-settings')}}">
                                <div class="mb-3">

                                    <!-- start row -->
                                    <div class="row align-items-center">
                                        <div class="col-xl-4 col-md-4">
                                            <div class="setting-info mb-3">
                                                <h6 class="fs-14 mb-1 fw-semibold">Select Theme</h6>
                                                <span>Choose theme of website</span>
                                            </div>
                                        </div><!-- end col -->
                                        <div class="col-xl-8 col-md-8">
                                            <div class="row theme-type-images d-flex align-items-center">
                                                <div class="col-md-4">
                                                    <div class="card theme-image">
                                                        <div class="card-body p-2">
                                                            <a href="javascript:void(0);">
                                                                <div class="border rounded border-gray mb-2">
                                                                    <img src="{{URL::asset('build/img/theme/light.jpg')}}" class="img-fluid rounded" alt="theme">
                                                                </div>
                                                                <p class="text-center fw-medium text-truncate">Light</p>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="card theme-image">
                                                        <div class="card-body p-2">
                                                            <a href="javascript:void(0);">
                                                                <div class="border rounded border-gray mb-2">
                                                                    <img src="{{URL::asset('build/img/theme/dark.jpg')}}" class="img-fluid rounded" alt="theme">
                                                                </div>
                                                                <p class="text-center fw-medium text-truncate">Dark</p>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="card theme-image">
                                                        <div class="card-body p-2">
                                                            <a href="javascript:void(0);">
                                                                <div class="border rounded border-gray mb-2">
                                                                    <img src="{{URL::asset('build/img/theme/automatic.jpg')}}" class="img-fluid rounded" alt="theme">
                                                                </div>
                                                                <p class="text-center fw-medium text-truncate">Automatic</p>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- end col -->
                                    </div>
                                    <!-- end row -->

                                    <!-- start row -->
                                    <div class="row align-items-center">
                                        <div class="col-xl-4 col-md-4">
                                            <div class="setting-info mb-3">
                                                <h6 class="fs-14 mb-1 fw-semibold">Accent Color</h6>
                                                <span>Choose accent colour of website</span>
                                            </div>
                                        </div><!-- end col -->
                                        <div class="col-xl-8 col-md-8">
                                            <div class="theme-colors d-flex align-items-center justify-content-end mb-3">
                                                <ul class="d-flex align-items-center gap-2 flex-wrap list-unstyled">
                                                    <li>
                                                        <span class="themecolorset">
                                                            <span class="primecolor bg-primary">
                                                                <span class="colorcheck text-white"><i class="ti ti-check text-primary fs-10"></i></span>
                                                        </span>
                                                        </span>
                                                    </li>
                                                    <li>
                                                        <span class="themecolorset">
                                                            <span class="primecolor bg-secondary">
                                                                <span class="colorcheck text-white"><i class="ti ti-check text-primary fs-10"></i></span>
                                                        </span>
                                                        </span>
                                                    </li>
                                                    <li>
                                                        <span class="themecolorset">
                                                            <span class="primecolor bg-info">
                                                                <span class="colorcheck text-white"><i class="ti ti-check text-primary fs-10"></i></span>
                                                        </span>
                                                        </span>
                                                    </li>
                                                    <li>
                                                        <span class="themecolorset active">
                                                            <span class="primecolor bg-danger">
                                                                <span class="colorcheck text-white"><i class="ti ti-check text-primary fs-10"></i></span>
                                                        </span>
                                                        </span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div><!-- end col -->
                                    </div>
                                    <!-- end row -->

                                    <!-- start row -->
                                    <div class="row align-items-center justify-content-between mb-3">
                                        <div class="col-xl-4 col-md-4">
                                            <div class="">
                                                <h6 class="fs-14 mb-1 fw-semibold">Expand Sidebar</h6>
                                                <span>Choose expand sidebar</span>
                                            </div>
                                        </div><!-- end col -->
                                        <div class="col-xl-3 col-md-4">
                                            <div class="d-flex align-items-center justify-content-end">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input m-0" type="checkbox" checked="">
                                                </div>
                                            </div>
                                        </div><!-- end col -->
                                    </div>
                                    <!-- end row -->

                                    <!-- start row -->
                                    <div class="row align-items-center justify-content-between mb-3">
                                        <div class="col-xl-4 col-md-4">
                                            <div class="">
                                                <h6 class="fs-14 mb-1 fw-semibold">Sidebar Size</h6>
                                                <span>Select size of the sidebar to display</span>
                                            </div>
                                        </div><!-- end col -->
                                        <div class="col-xl-3 col-md-4">
                                            <div class="d-flex align-items-center justify-content-end mt-2 mt-md-0">
                                                <select class="select">
                                                    <option>Small - 200px </option>
                                                    <option selected>Medium - 250px</option>
                                                    <option>Large - 300px</option>
                                                </select>
                                            </div>
                                        </div><!-- end col -->
                                    </div>
                                    <!-- end row -->

                                    <!-- start row -->
                                    <div class="row align-items-center justify-content-between mb-3">
                                        <div class="col-xl-4 col-md-4">
                                            <div class="">
                                                <h6 class="fs-14 mb-1 fw-semibold">Font Family</h6>
                                                <span>Select font family of website</span>
                                            </div>
                                        </div><!-- end col -->
                                        <div class="col-xl-3 col-md-4">
                                            <div class="d-flex align-items-center justify-content-end mt-2 mt-md-0">
                                                <select class="select">
                                                    <option>Instrument Sans</option>
                                                    <option>Nunito</option>
                                                    <option>Poppins</option>
                                                </select>
                                            </div>
                                        </div><!-- end col -->
                                    </div>
                                    <!-- end row -->

                                </div>

                                <div class="text-end settings-bottom-btn mt-0 border-top d-flex align-items-center justify-content-between pt-4 mb-3">
                                    <button type="button" class="btn btn-outline-white btn-md me-2">Cancel</button>
                                    <button type="submit" class="btn btn-primary btn-md">Save Changes</button>
                                </div>

                            </form>
                        </div><!-- end col -->
                    </div>
                    <!-- end row -->

                </div><!-- end col -->
            </div>
            <!-- end row-->
        </div>
        <!-- End Content -->

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