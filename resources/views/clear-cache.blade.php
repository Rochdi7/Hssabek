<?php $page = 'clear-cache'; ?>
@extends('layout.mainlayout')
@section('content')
    <!-- ========================
        Start Page Content
    ========================= -->

    <div class="page-wrapper">
        <div class="content">
            <!-- start row -->
            <div class="row">
                <div class="col-lg-12 mx-auto">
                    <div class="row">
                        <!-- Start settings sidebar -->
                        @component('components.settings-sidebar')
                        @endcomponent                        
                        <!-- End settings sidebar -->
                        <div class="col-xl-9 col-lg-8">
                            <div>
                                <div class="pb-3 border-bottom mb-3">
                                    <h6 class="mb-0">Clear Cache</h6>
                                </div>
                                <div class="mb-3">
                                    <p class="fw-medium text-gray-5">Clearing the cache may improve performance but will remove temporary files, stored preferences, and cached data from websites and applications.</p>
                                </div>
                                <a href="javascript:void(0);" class="btn btn-primary">Clear Cache</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
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