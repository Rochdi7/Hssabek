<?php $page = 'barcode-settings'; ?>
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
                                    <h6 class="mb-0">Barcode</h6>
                                </div>
                                <form action="{{url('barcode-settings')}}">
                                    <div class="vh-100 border-bottom mb-3">

                                        <!-- start row -->
                                        <div class="row align-items-center">
                                            <div class="col-8">
                                                <label class="form-label fw-medium mb-3">Show Package Date </label>
                                            </div><!-- end col -->
                                            <div class="col-4 mb-3">
                                                <div class="form-check form-switch d-flex justify-content-end">
                                                    <input class="form-check-input" type="checkbox" role="switch" checked>
                                                </div>
                                            </div><!-- end col -->
                                        </div>
                                        <!-- end row -->

                                        <!-- start row -->
                                        <div class="row align-items-center">
                                            <div class="col-md-8 col-sm-12">
                                                <label class="form-label fw-medium mb-3">MRP Label </label>
                                            </div><!-- end col -->
                                            <div class="col-md-4 col-sm-12">
                                                <div>
                                                    <div class="mb-3">
                                                        <input type="text" class="form-control" value="MRP">
                                                    </div>
                                                </div>
                                            </div><!-- end col -->
                                        </div>
                                        <!-- end row -->

                                        <!-- start row -->
                                        <div class="row align-items-center">
                                            <div class="col-8">
                                                <label class="form-label fw-medium mb-3">Show Package Date </label>
                                            </div><!-- end col -->
                                            <div class="col-4 mb-3">
                                                <div class="form-check form-switch d-flex justify-content-end">
                                                    <input class="form-check-input" type="checkbox" role="switch" checked>
                                                </div>
                                            </div><!-- end col -->
                                        </div>
                                        <!-- end row -->

                                        <!-- start row -->
                                        <div class="row align-items-center">
                                            <div class="col-md-8 col-sm-12">
                                                <label class="form-label fw-medium mb-3">Product Name Font Size </label>
                                            </div><!-- end col -->
                                            <div class="col-md-4 col-sm-12">
                                                <div>
                                                    <div class="mb-3">
                                                        <input type="text" class="form-control" value="16">
                                                    </div>
                                                </div>
                                            </div><!-- end col -->
                                        </div>
                                        <!-- end row -->

                                        <!-- start row -->
                                        <div class="row align-items-center">
                                            <div class="col-md-8 col-sm-12">
                                                <label class="form-label fw-medium mb-3">MRP Font Size </label>
                                            </div><!-- end col -->
                                            <div class="col-md-4 col-sm-12">
                                                <div>
                                                    <div class="mb-3">
                                                        <input type="text" class="form-control" value="16">
                                                    </div>
                                                </div>
                                            </div><!-- end col -->
                                        </div>
                                        <!-- end row -->

                                        <!-- start row -->
                                        <div class="row align-items-center">
                                            <div class="col-md-8 col-sm-12">
                                                <label class="form-label fw-medium mb-3">Barcode Size </label>
                                            </div><!-- end col -->
                                            <div class="col-md-4 col-sm-12">
                                                <div>
                                                    <div class="mb-3">
                                                        <input type="text" class="form-control" value="10">
                                                    </div>
                                                </div>
                                            </div><!-- end col -->
                                        </div>
                                        <!-- end row -->

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