<?php $page = 'language-setting3'; ?>
@extends('layout.mainlayout')
@section('content')
    <!-- ========================
        Start Page Content
    ========================= -->

    <div class="page-wrapper">

        <!-- Start container -->
        <div class="content">

            <!-- Start row -->
            <div class="row justify-content-center">
                <div class="col-xl-12">
                    <div class="row settings-wrapper d-flex">

                        <!-- Start settings sidebar -->
                        @component('components.settings-sidebar')
                        @endcomponent                        
                        <!-- End settings sidebar -->

                        <div class="col-xl-9 col-lg-8">
                            <div class="mb-3 pb-3 border-bottom flex-wrap gap-3 d-flex align-items-center justify-content-between">
                                <h6 class="fw-bold mb-0">Language</h6>
                                <div class="d-flex align-items-center">
                                    <div class="dropdown me-2">
                                        <a href="javascript:void(0);" class="dropdown-toggle btn btn-outline-white d-inline-flex align-items-center" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                            <i class="isax isax-language-square me-1"></i>Language
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-lg p-2">
                                            <li>
                                                <label class="dropdown-item d-flex align-items-center rounded-1">
                                                    English
                                                </label>
                                            </li>
                                            <li>
                                                <label class="dropdown-item d-flex align-items-center rounded-1">
                                                    German
                                                </label>
                                            </li>
                                            <li>
                                                <label class="dropdown-item d-flex align-items-center rounded-1">
                                                    Arabic
                                                </label>
                                            </li>
                                            <li>
                                                <label class="dropdown-item d-flex align-items-center rounded-1">
                                                    French
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                    <a href="javascript:void(0);" class="btn btn-primary d-inline-flex align-items-center"><i class="isax isax-add-circle5 me-1"></i>New Language</a>
                                </div>
                            </div>

                            <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-3">
                                <div class="top-search me-2">
                                    <div class="input-icon-start position-relative me-2">
                                        <span class="input-icon-addon">
                                            <i class="isax isax-search-normal"></i>
                                        </span>
                                        <input type="text" class="form-control form-control-sm bg-white" placeholder="Search">                             
                                    </div>
                                </div>
                                <div class="d-flex align-items-center flex-wrap gap-2">
                                    <a href="javascript:void(0);" class="btn btn-outline-white d-inline-flex align-items-center me-2 fw-normal"><i class="isax isax-arrow-left me-1"></i>Back to Translations</a>
                                    <a href="javascript:void(0);" class="btn btn-sm btn-outline-white me-2 fw-normal d-inline-flex align-items-center">
                                        <img src="{{URL::asset('build/img/flags/ae.svg')}}" alt="img" class="avatar avatar-xs rounded-circle me-1"> Arabic
                                    </a>
                                    <div class="progress-percent">
                                        <span class="text-gray-9 fs-10">Progress</span>
                                        <div class="d-flex align-items-center">
                                            <div class="progress progress-xs" style="width: 120px;">
                                                <div class="progress-bar bg-pink rounded" role="progressbar" style="width: 70%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <span class="d-inline-flex fs-12 ms-2">70%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Custom Data Table -->
                            <div class="custom-datatable-filter table-responsive border rounded mb-3">
                                <table class="table mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th>English</th>
                                            <th>Arabic</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-gray-9">
                                                Invoices
                                            </td>
                                            <td>
                                                <input type="text" dir="rtl" class="form-control text-end" value="الفواتير">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-gray-9">
                                                Recurring Invoices
                                            </td>
                                            <td>
                                                <input type="text" dir="rtl" class="form-control text-end" value="الفواتير المتكررة">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-gray-9">
                                                Credit Notes
                                            </td>
                                            <td>
                                                <input type="text" dir="rtl" class="form-control text-end" value="ملاحظات الائتمان">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-gray-9">
                                                Quotations
                                            </td>
                                            <td>
                                                <input type="text" dir="rtl" class="form-control text-end" value="الاقتباسات">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-gray-9">
                                                Delivery Challans
                                            </td>
                                            <td>
                                                <input type="text" dir="rtl" class="form-control text-end" value="تسليم تشالان">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-gray-9">
                                                Customers
                                            </td>
                                            <td>
                                                <input type="text" dir="rtl" class="form-control text-end" value="عملاء">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- Custom Data Table -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- End row -->
                
        </div>
        <!-- End container -->

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