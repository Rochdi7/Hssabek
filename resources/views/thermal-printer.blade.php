<?php $page = 'thermal-printer'; ?>
@extends('layout.mainlayout')
@section('content')
    <!-- ========================
        Start Page Content
    ========================= -->

    <div class="page-wrapper">
        <div class="content">
            <!-- row start -->
            <div class="row justify-content-center">
                <div class="col-xl-12">
                    <!-- row start -->
                    <div class=" row settings-wrapper d-flex">
                        <!-- Start settings sidebar -->
                        @component('components.settings-sidebar')
                        @endcomponent                        
                        <!-- End settings sidebar -->
                        <div class="col-xl-9 col-lg-8">
                            <div class="mb-3">
                                <div class="pb-3 border-bottom mb-3">
                                    <h6 class="mb-0">Thermal Printer</h6>
                                </div>
                                <form action="{{url('thermal-printer')}}">
                                    <div class="">
                                        <!-- row start -->
                                        <div class="row align-items-center">
                                            <div class="col-9">
                                                <label class="form-label fw-medium mb-3">Show Terms on ThermalPrint </label>
                                            </div>
                                            <div class="col-3 mb-3">
                                                <div class="form-check form-switch d-flex justify-content-end">
                                                    <input class="form-check-input" type="checkbox" role="switch" checked>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- row end -->
                                        <!-- row start -->
                                        <div class="row align-items-center">
                                            <div class="col-9">
                                                <label class="form-label fw-medium mb-3">Show Google Reviews QR </label>
                                            </div>
                                            <div class="col-3 mb-3">
                                                <div class="form-check form-switch d-flex justify-content-end">
                                                    <input class="form-check-input" type="checkbox" role="switch" checked>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- row end -->
                                        <!-- row start -->
                                        <div class="row align-items-center">
                                            <div class="col-9">
                                                <label class="form-label fw-medium mb-3">Show Taxable Amount </label>
                                            </div>
                                            <div class="col-3 mb-3">
                                                <div class="form-check form-switch d-flex justify-content-end">
                                                    <input class="form-check-input" type="checkbox" role="switch" checked>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- row end -->
                                        <!-- row start -->
                                        <div class="row align-items-center">
                                            <div class="col-9">
                                                <label class="form-label fw-medium mb-3">Show Company Details </label>
                                            </div>
                                            <div class="col-3 mb-3">
                                                <div class="form-check form-switch d-flex justify-content-end">
                                                    <input class="form-check-input" type="checkbox" role="switch" checked>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- row end -->
                                        <!-- row start -->
                                        <div class="row align-items-center">
                                            <div class="col-9">
                                                <label class="form-label fw-medium mb-3">Show Item Description </label>
                                            </div>
                                            <div class="col-3 mb-3">
                                                <div class="form-check form-switch d-flex justify-content-end">
                                                    <input class="form-check-input" type="checkbox" role="switch" checked>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- row end -->
                                        <!-- row start -->
                                        <div class="row align-items-center">
                                            <div class="col-md-8 col-sm-12">
                                                <label class="form-label fw-medium">Organization Name Font Size </label>
                                            </div>
                                            <div class="col-md-4 col-sm-12">
                                                <div>
                                                    <div class="mb-3">
                                                        <input type="text" class="form-control" value="24">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- row end -->
                                        <!-- row start -->
                                        <div class="row align-items-center">
                                            <div class="col-md-8 col-sm-12">
                                                <label class="form-label fw-medium">Company Name Font Size </label>
                                            </div>
                                            <div class="col-md-4 col-sm-12">
                                                <div>
                                                    <div class="mb-3">
                                                        <input type="text" class="form-control" value="24">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- row end -->
                                        <!-- row start -->
                                        <div class="row align-items-center mb-3">
                                            <div class="col-md-8 col-sm-12">
                                                <label class="form-label fw-medium">Select Printer </label>
                                            </div>
                                            <div class="col-md-4 col-sm-12">
                                                <select class="select">
                                                    <option>Thermal Printer 80 mm</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- row end -->
                                        <!-- row start -->
                                        <div class="row align-items-center">
                                            <div class="col-md-6 col-sm-12">
                                                <label class="form-label fw-medium">Notes </label>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <textarea class="form-control" placeholder=""></textarea>
                                            </div>
                                        </div>
                                        <!-- row end -->
                                    </div>
                                </form>
                            </div>
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