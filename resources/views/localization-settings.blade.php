<?php $page = 'localization-settings'; ?>
@extends('layout.mainlayout')
@section('content')
    <!-- ========================
        Start Page Content
    ========================= -->

    <div class="page-wrapper">

        <!-- Start container -->
        <div class="content mb-3">

            <!-- Start row -->
            <div class="row justify-content-center">
                <div class="col-xl-12">
                    <div class="row settings-wrapper d-flex">

                        <!-- Start settings sidebar -->
                        @component('components.settings-sidebar')
                        @endcomponent                        
                        <!-- End settings sidebar -->

                        <div class="col-xl-9 col-lg-8">
                            <div class="mb-3 pb-3 border-bottom">
                                <h6 class="fw-bold mb-0">Localization</h6>
                            </div>
                            <div class="d-flex align-items-center mb-3">
                                <span class="p-1 rounded-2 bg-dark text-white d-inline-flex align-items-center justify-content-center me-2"><i class="isax isax-info-circle"></i></span>
                                <h6 class="fw-semibold fs-16 mb-0 d-inline-flex align-items-center">Basic Information</h6>
                            </div>
                            <div class="row align-items-center row-gap-3 mb-3">
                                <div class="col-xl-9 col-sm-7">
                                    <div class="setting-info">
                                        <h6 class="fs-14 fw-medium mb-0">Time Zone<span class="text-danger ms-1">*</span></h6>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-sm-5 float-sm-end">
                                    <div>
                                        <select class="select">
                                            <option>(+5:30) GMT</option>
                                            <option>(GMT -10:00) Hawaii</option>
                                            <option>(GMT -9:30) Taiohae</option>
                                            <option>(GMT -9:00) Alaska </option>
                                            <option>(GMT -8:00) Pacific Time, Canada</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-9 col-sm-7">
                                    <div class="setting-info">
                                        <h6 class="fs-14 fw-medium mb-0">Start Week On<span class="text-danger ms-1">*</span></h6>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-sm-5 float-sm-end">
                                    <div>
                                        <select class="select">
                                            <option>Monday</option>
                                            <option>Tuesday</option>
                                            <option>Wednesday</option>
                                            <option>Thursday</option>
                                            <option>Friday</option>
                                            <option>Saturday</option>
                                            <option>Sunday</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-9 col-sm-7">
                                    <div class="setting-info">
                                        <h6 class="fs-14 fw-medium mb-0">Date Format<span class="text-danger ms-1">*</span></h6>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-sm-5 float-sm-end">
                                    <div>
                                        <select class="select">
                                            <option>18 Mar 2025</option>
                                            <option>Mar 18 2025</option>
                                            <option>2025 Mar 18</option>
                                        </select>
                                    </div>

                                </div>
                                <div class="col-xl-9 col-sm-7">
                                    <div class="setting-info">
                                        <h6 class="fs-14 fw-medium mb-0">Time Format<span class="text-danger ms-1">*</span></h6>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-sm-5 float-sm-end">
                                    <div>
                                        <select class="select">
                                            <option>12 hrs</option>
                                            <option>24hrs</option>
                                        </select>
                                    </div>

                                </div>
                                <div class="col-xl-9 col-sm-7">
                                    <div class="setting-info">
                                        <h6 class="fs-14 fw-medium mb-0">Default Language<span class="text-danger ms-1">*</span></h6>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-sm-5 float-sm-end">
                                    <div>
                                        <select class="select">
                                            <option>English</option>
                                            <option>German</option>
                                            <option>Arabic</option>
                                            <option>French</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-9 col-sm-7">
                                    <div class="setting-info">
                                        <h6 class="fs-14 fw-medium mb-0">Language Switcher<span class="text-danger ms-1">*</span></h6>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-sm-5 float-sm-end">
                                    <div>
                                        <div class="form-check form-switch ps-0">
                                            <input class="form-check-input m-0" type="checkbox" checked="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="border-top mt-2 pt-4">
                                        <div class="d-flex align-items-center mb-3">
                                            <span class="p-1 rounded-2 bg-dark text-white d-inline-flex align-items-center justify-content-center me-2"><i class="isax isax-dollar-square"></i></span>
                                            <h5 class="fw-semibold fs-16 mb-0 d-inline-flex align-items-center">Currency Information</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-9 col-sm-7">
                                    <div class="setting-info">
                                        <h6 class="fs-14 fw-medium mb-0">Currency<span class="text-danger ms-1">*</span></h6>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-sm-5 float-sm-end">
                                    <div>
                                        <select class="select">
                                            <option>USD</option>
                                            <option>Dollar</option>
                                            <option>Euro</option>
                                            <option>Pound</option>
                                            <option>Rupee</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-9 col-sm-7">
                                    <div class="setting-info">
                                        <h6 class="fs-14 fw-medium mb-0">Currency Symbol <span class="text-danger ms-1">*</span></h6>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-sm-5 float-sm-end">
                                    <div>
                                        <select class="select">
                                            <option>$</option>
                                            <option>₹</option>
                                            <option>£</option>
                                            <option>€</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-9 col-sm-7">
                                    <div class="setting-info">
                                        <h6 class="fs-14 fw-medium mb-0">Currency Position<span class="text-danger ms-1">*</span></h6>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-sm-5 float-sm-end">
                                    <div>
                                        <select class="select">
                                            <option>$100</option>
                                            <option>100$</option>
                                            <option>$ 100</option>
                                            <option>100 $</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-9 col-sm-7">
                                    <div class="setting-info">
                                        <h6 class="fs-14 fw-medium mb-0">Decimal Separator<span class="text-danger ms-1">*</span></h6>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-sm-5 float-sm-end">
                                    <div>
                                        <select class="select">
                                            <option>.</option>
                                            <option>,</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xl-9 col-sm-7">
                                    <div class="setting-info">
                                        <h6 class="fs-14 fw-medium mb-0">Thousand Separator<span class="text-danger ms-1">*</span></h6>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-sm-5 float-sm-end">
                                    <div>
                                        <select class="select lh-2">
                                            <option>.</option>
                                            <option>,</option>
                                            <option>'</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between settings-bottom-btn mt-0 border-top pt-3">
                                <button type="button" class="btn btn-outline-white btn-md me-2">Cancel</button>
                                <button type="submit" class="btn btn-primary btn-md">Save Changes</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- End row -->

        </div>
        <!-- End container -->

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