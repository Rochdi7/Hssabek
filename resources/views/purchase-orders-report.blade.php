<?php $page = 'purchase-orders-report'; ?>
@extends('layout.mainlayout')
@section('content')
    <!-- ========================
			Start Page Content
		========================= -->

        <div class="page-wrapper">
            <!-- Start Container  -->
            <div class="content content-two">

                <!-- Start Breadcrumb -->
                <div class="d-flex d-block align-items-center justify-content-between flex-wrap gap-3 mb-3">
                    <div>
                        <h6 class="mb-0">Purchase Orders Report</h6>
                    </div>
                    <div class="d-flex my-xl-auto right-content align-items-center flex-wrap gap-2">
                        <div class="dropdown me-1">
                            <a href="javascript:void(0);" class="btn btn-outline-white d-inline-flex align-items-center" data-bs-toggle="dropdown">
                                <i class="isax isax-export-1 me-1"></i>Export
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="#">Download as PDF</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">Download as Excel</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End Breadcrumb -->

                <!-- start row -->
                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="card position-relative">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        <p class="mb-1 text-truncate">Total Purchase Orders</p>
                                        <h6 class="fs-16 fw-semibold mb-0">280</h6>
                                    </div>
                                    <div>
                                        <div class="chart-set" id="radial-chart3"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->

                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="card position-relative">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        <p class="mb-1 text-truncate"> Completed Orders</p>
                                        <h6 class="fs-16 fw-semibold mb-0">240</h6>
                                    </div>
                                    <div>
                                        <div class="chart-set" id="radial-chart4"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->

                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="card position-relative">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        <p class="mb-1 text-truncate"> Pending Orders</p>
                                        <h6 class="fs-16 fw-semibold mb-0">30</h6>
                                    </div>
                                    <div>
                                        <div class="chart-set" id="radial-chart5"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->

                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="card position-relative">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        <p class="mb-1 text-truncate">Cancelled Orders</p>
                                        <h6 class="fs-16 fw-semibold mb-0">10</h6>
                                    </div>
                                    <div>
                                        <div class="chart-set" id="radial-chart6"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->

                <!-- Start Table Search -->
                <div class="mb-3">

                    <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                        <div class="d-flex align-items-center gap-2 flex-wrap">
                            <div class="table-search d-flex align-items-center mb-0">
                                <div class="search-input">
                                    <a href="javascript:void(0);" class="btn-searchset"><i class="isax isax-search-normal fs-12"></i></a>
                                </div>
                            </div>
                            <div id="reportrange" class="reportrange-picker d-flex align-items-center">
                                <i class="isax isax-calendar text-gray-5 fs-14 me-1"></i><span class="reportrange-picker-field">16 Apr 25 - 16 Apr 25</span>
                            </div>
                            <a class="btn btn-outline-white fw-normal d-inline-flex align-items-center" href="javascript:void(0);" data-bs-toggle="offcanvas" data-bs-target="#customcanvas">
                                <i class="isax isax-filter me-1"></i>Filter
                            </a>
                        </div>
                        <div class="d-flex align-items-center flex-wrap gap-2">
                            <div class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle btn btn-outline-white d-inline-flex align-items-center" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                    <i class="isax isax-grid-3 me-1"></i>Column
                                </a>
                                <ul class="dropdown-menu  dropdown-menu">
                                    <li>
                                        <label class="dropdown-item d-flex align-items-center form-switch">
                                            <i class="fa-solid fa-grip-vertical me-3 text-default"></i>
                                            <input class="form-check-input m-0 me-2" type="checkbox" checked>
                                            <span>ID</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="dropdown-item d-flex align-items-center form-switch">
                                            <i class="fa-solid fa-grip-vertical me-3 text-default"></i>
                                            <input class="form-check-input m-0 me-2" type="checkbox" checked>
                                            <span>Date</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="dropdown-item d-flex align-items-center form-switch">
                                            <i class="fa-solid fa-grip-vertical me-3 text-default"></i>
                                            <input class="form-check-input m-0 me-2" type="checkbox" checked>
                                            <span>Vendor</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="dropdown-item d-flex align-items-center form-switch">
                                            <i class="fa-solid fa-grip-vertical me-3 text-default"></i>
                                            <input class="form-check-input m-0 me-2" type="checkbox" checked>
                                            <span>Amount</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="dropdown-item d-flex align-items-center form-switch">
                                            <i class="fa-solid fa-grip-vertical me-3 text-default"></i>
                                            <input class="form-check-input m-0 me-2" type="checkbox">
                                            <span>Payment Mode</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="dropdown-item d-flex align-items-center form-switch">
                                            <i class="fa-solid fa-grip-vertical me-3 text-default"></i>
                                            <input class="form-check-input m-0 me-2" type="checkbox">
                                            <span>Status</span>
                                        </label>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Filter Info -->
                    <div class="align-items-center gap-2 flex-wrap filter-info mt-3">
                        <h6 class="fs-13 fw-semibold">Filters</h6>
                        <span class="tag bg-light border rounded-1 fs-12 text-dark badge"><span class="num-count d-inline-flex align-items-center justify-content-center bg-success fs-10 me-1">5</span>Vendors Selected<span class="ms-1 tag-close"><i class="fa-solid fa-x fs-10"></i></span></span>
                        <span class="tag bg-light border rounded-1 fs-12 text-dark badge"><span class="num-count d-inline-flex align-items-center justify-content-center bg-success fs-10 me-1">1</span>Status Selected<span class="ms-1 tag-close"><i class="fa-solid fa-x fs-10"></i></span></span>
                        <a href="#" class="link-danger fw-medium text-decoration-underline ms-md-1">Clear All</a>
                    </div>
                    <!-- /Filter Info -->
                </div>
                <!-- End Table Search -->

                <!-- Start Table List -->
                <div class="table-responsive">
                    <table class="table table-nowrap datatable">
                        <thead class="thead-light">
                            <tr>
                                <th class="no-sort">
                                    <div class="form-check form-check-md">
                                        <input class="form-check-input" type="checkbox" id="select-all">
                                    </div>
                                </th>
                                <th class="no-sort">ID</th>
                                <th>Date</th>
                                <th>Vendor</th>
                                <th>Amount</th>
                                <th class="no-sort">Payment Mode</th>
                                <th class="no-sort">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="form-check form-check-md">
                                        <input class="form-check-input" type="checkbox">
                                    </div>
                                </td>
                                <td>
                                    <a href="javascript:void(0);" class="link-default">PUR00025</a>
                                </td>
                                <td>22 Feb 2025</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <a href="javascript:void(0);" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
                                            <img src="{{URL::asset('build/img/reports/avatar-01.jpg')}}" class="rounded-circle" alt="img">
                                        </a>
                                        <div>
                                            <h6 class="fs-14 fw-medium mb-0"><a href="javascript:void(0);">Emma Rose</a></h6>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-dark">$10,000</td>
                                <td class="text-dark">Cash</td>
                                <td>
                                    <span class="badge badge-soft-success d-inline-flex align-items-center">Paid <i class="isax isax-tick-circle ms-1"></i></span>
                                </td>

                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check form-check-md">
                                        <input class="form-check-input" type="checkbox">
                                    </div>
                                </td>
                                <td>
                                    <a href="javascript:void(0);" class="link-default">PUR00024</a>
                                </td>
                                <td>07 Feb 2025</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <a href="javascript:void(0);" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
                                            <img src="{{URL::asset('build/img/reports/avatar-02.jpg')}}" class="rounded-circle" alt="img">
                                        </a>
                                        <div>
                                            <h6 class="fs-14 fw-medium mb-0"><a href="javascript:void(0);">Ethan James</a></h6>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-dark">$25,750</td>
                                <td class="text-dark">Cheque</td>
                                <td>
                                    <span class="badge badge-soft-warning d-inline-flex align-items-center">Pending <i class="isax isax-timer ms-1"></i></span>
                                </td>

                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check form-check-md">
                                        <input class="form-check-input" type="checkbox">
                                    </div>
                                </td>
                                <td>
                                    <a href="javascript:void(0);" class="link-default">PUR00023</a>
                                </td>
                                <td>30 Jan 2025</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <a href="javascript:void(0);" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
                                            <img src="{{URL::asset('build/img/reports/avatar-03.jpg')}}" class="rounded-circle" alt="img">
                                        </a>
                                        <div>
                                            <h6 class="fs-14 fw-medium mb-0"><a href="javascript:void(0);">Olivia Grace</a></h6>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-dark">$50,125</td>
                                <td class="text-dark">Cash</td>
                                <td>
                                    <span class="badge badge-soft-danger d-inline-flex align-items-center">Cancelled <i class="isax isax-close-circle ms-1"></i></span>
                                </td>

                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check form-check-md">
                                        <input class="form-check-input" type="checkbox">
                                    </div>
                                </td>
                                <td>
                                    <a href="javascript:void(0);" class="link-default">PUR00022</a>
                                </td>
                                <td>17 Jan 2025</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <a href="javascript:void(0);" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
                                            <img src="{{URL::asset('build/img/reports/avatar-04.jpg')}}" class="rounded-circle" alt="img">
                                        </a>
                                        <div>
                                            <h6 class="fs-14 fw-medium mb-0"><a href="javascript:void(0);">Liam Michael</a></h6>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-dark">$75,900</td>
                                <td class="text-dark">Cheque</td>
                                <td>
                                    <span class="badge badge-soft-success d-inline-flex align-items-center">Paid <i class="isax isax-tick-circle ms-1"></i></span>
                                </td>

                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check form-check-md">
                                        <input class="form-check-input" type="checkbox">
                                    </div>
                                </td>
                                <td>
                                    <a href="javascript:void(0);" class="link-default">PUR00021</a>
                                </td>
                                <td>04 Jan 2025</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <a href="javascript:void(0);" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
                                            <img src="{{URL::asset('build/img/reports/avatar-05.jpg')}}" class="rounded-circle" alt="img">
                                        </a>
                                        <div>
                                            <h6 class="fs-14 fw-medium mb-0"><a href="javascript:void(0);">Sophia Marie</a></h6>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-dark">$99,999</td>
                                <td class="text-dark">Cheque</td>
                                <td>
                                    <span class="badge badge-soft-warning d-inline-flex align-items-center">Pending <i class="isax isax-timer ms-1"></i></span>
                                </td>

                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check form-check-md">
                                        <input class="form-check-input" type="checkbox">
                                    </div>
                                </td>
                                <td>
                                    <a href="javascript:void(0);" class="link-default">PUR00020</a>
                                </td>
                                <td>09 Dec 2024</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <a href="javascript:void(0);" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
                                            <img src="{{URL::asset('build/img/reports/avatar-06.jpg')}}" class="rounded-circle" alt="img">
                                        </a>
                                        <div>
                                            <h6 class="fs-14 fw-medium mb-0"><a href="javascript:void(0);">Noah Daniel</a></h6>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-dark">$1,20,500</td>
                                <td class="text-dark">Cash</td>
                                <td>
                                    <span class="badge badge-soft-danger d-inline-flex align-items-center">Cancelled <i class="isax isax-close-circle ms-1"></i></span>
                                </td>

                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check form-check-md">
                                        <input class="form-check-input" type="checkbox">
                                    </div>
                                </td>
                                <td>
                                    <a href="javascript:void(0);" class="badge-primary">PUR00019</a>
                                </td>
                                <td>15 Nov 2024</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <a href="javascript:void(0);" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
                                            <img src="{{URL::asset('build/img/reports/avatar-07.jpg')}}" class="rounded-circle" alt="img">
                                        </a>
                                        <div>
                                            <h6 class="fs-14 fw-medium mb-0"><a href="javascript:void(0);">Isabella Faith</a></h6>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-dark">$2,50,000</td>
                                <td class="text-dark">Cash</td>
                                <td>
                                    <span class="badge badge-soft-success d-inline-flex align-items-center">Paid <i class="isax isax-tick-circle ms-1"></i></span>
                                </td>

                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check form-check-md">
                                        <input class="form-check-input" type="checkbox">
                                    </div>
                                </td>
                                <td>
                                    <a href="javascript:void(0);" class="badge-primary">PUR00018</a>
                                </td>
                                <td>02 Dec 2024</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <a href="javascript:void(0);" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
                                            <img src="{{URL::asset('build/img/reports/avatar-08.jpg')}}" class="rounded-circle" alt="img">
                                        </a>
                                        <div>
                                            <h6 class="fs-14 fw-medium mb-0"><a href="javascript:void(0);">Oliver Scott</a></h6>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-dark">$5,00,750 </td>
                                <td class="text-dark">Cheque</td>
                                <td>
                                    <span class="badge badge-soft-warning d-inline-flex align-items-center">Pending <i class="isax isax-timer ms-1"></i></span>
                                </td>

                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check form-check-md">
                                        <input class="form-check-input" type="checkbox">
                                    </div>
                                </td>
                                <td>
                                    <a href="javascript:void(0);" class="badge-primary">PUR00017</a>
                                </td>
                                <td>30 Nov 2024</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <a href="javascript:void(0);" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
                                            <img src="{{URL::asset('build/img/reports/avatar-09.jpg')}}" class="rounded-circle" alt="img">
                                        </a>
                                        <div>
                                            <h6 class="fs-14 fw-medium mb-0"><a href="javascript:void(0);">Ava Louise</a></h6>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-dark">$7,50,300 </td>
                                <td class="text-dark">Cheque</td>
                                <td>
                                    <span class="badge badge-soft-danger d-inline-flex align-items-center">Cancelled <i class="isax isax-close-circle ms-1"></i></span>
                                </td>

                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check form-check-md">
                                        <input class="form-check-input" type="checkbox">
                                    </div>
                                </td>
                                <td>
                                    <a href="javascript:void(0);" class="badge-primary">PUR00016</a>
                                </td>
                                <td>12 Oct 2024</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <a href="javascript:void(0);" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
                                            <img src="{{URL::asset('build/img/reports/avatar-10.jpg')}}" class="rounded-circle" alt="img">
                                        </a>
                                        <div>
                                            <h6 class="fs-14 fw-medium mb-0"><a href="javascript:void(0);">James Robert</a></h6>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-dark">$9,99,999 </td>
                                <td class="text-dark">Cash</td>
                                <td>
                                    <span class="badge badge-soft-success d-inline-flex align-items-center">Paid <i class="isax isax-tick-circle ms-1"></i></span>
                                </td>

                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check form-check-md">
                                        <input class="form-check-input" type="checkbox">
                                    </div>
                                </td>
                                <td>
                                    <a href="javascript:void(0);" class="badge-primary">PUR00015</a>
                                </td>
                                <td>05 Oct 2024</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <a href="javascript:void(0);" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
                                            <img src="{{URL::asset('build/img/reports/avatar-11.jpg')}}" class="rounded-circle" alt="img">
                                        </a>
                                        <div>
                                            <h6 class="fs-14 fw-medium mb-0"><a href="javascript:void(0);">Charlotte Anne</a></h6>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-dark">$87,650</td>
                                <td class="text-dark">Cheque</td>
                                <td>
                                    <span class="badge badge-soft-warning d-inline-flex align-items-center">Pending <i class="isax isax-timer ms-1"></i></span>
                                </td>

                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check form-check-md">
                                        <input class="form-check-input" type="checkbox">
                                    </div>
                                </td>
                                <td>
                                    <a href="javascript:void(0);" class="badge-primary">PUR00014</a>
                                </td>
                                <td>09 Sep 2024</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <a href="javascript:void(0);" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
                                            <img src="{{URL::asset('build/img/reports/avatar-12.jpg')}}" class="rounded-circle" alt="img">
                                        </a>
                                        <div>
                                            <h6 class="fs-14 fw-medium mb-0"><a href="javascript:void(0);">Benjamin Thomas</a></h6>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-dark">$69,420</td>
                                <td class="text-dark">Cash</td>
                                <td>
                                    <span class="badge badge-soft-danger d-inline-flex align-items-center">Cancelled <i class="isax isax-close-circle ms-1"></i></span>
                                </td>

                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check form-check-md">
                                        <input class="form-check-input" type="checkbox">
                                    </div>
                                </td>
                                <td>
                                    <a href="javascript:void(0);" class="badge-primary">PUR00013</a>
                                </td>
                                <td>02 Sep 2024</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <a href="javascript:void(0);" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
                                            <img src="{{URL::asset('build/img/reports/avatar-13.jpg')}}" class="rounded-circle" alt="img">
                                        </a>
                                        <div>
                                            <h6 class="fs-14 fw-medium mb-0"><a href="javascript:void(0);">Amelia Jane</a></h6>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-dark">$33,210</td>
                                <td class="text-dark">Cheque</td>
                                <td>
                                    <span class="badge badge-soft-success d-inline-flex align-items-center">Paid <i class="isax isax-tick-circle ms-1"></i></span>
                                </td>

                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check form-check-md">
                                        <input class="form-check-input" type="checkbox">
                                    </div>
                                </td>
                                <td>
                                    <a href="javascript:void(0);" class="badge-primary">PUR00012</a>
                                </td>
                                <td>07 Aug 2024</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <a href="javascript:void(0);" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
                                            <img src="{{URL::asset('build/img/reports/avatar-14.jpg')}}" class="rounded-circle" alt="img">
                                        </a>
                                        <div>
                                            <h6 class="fs-14 fw-medium mb-0"><a href="javascript:void(0);">Mia Elizabeth</a></h6>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-dark">$2,10,000</td>
                                <td class="text-dark">Cheque</td>
                                <td>
                                    <span class="badge badge-soft-warning d-inline-flex align-items-center">Pending <i class="isax isax-timer ms-1"></i></span>
                                </td>

                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- End Table List -->

            </div>
            <!-- End Container  -->

            @component('components.footer')
            @endcomponent


        </div>
        <!-- ========================
			End Page Content
		========================= -->


@endsection