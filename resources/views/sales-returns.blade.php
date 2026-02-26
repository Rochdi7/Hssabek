<?php $page = 'sales-returns'; ?>
@extends('layout.mainlayout')
@section('content')
    <!-- ========================
        Start Page Content
    ========================= -->

    <div class="page-wrapper">	

        <!-- Start Content -->
        <div class="content content-two">

            <!-- Start Page Header -->
            <div class="d-flex d-block align-items-center justify-content-between flex-wrap gap-3 mb-3">
                <div>
                    <h6 class="mb-0">Sales Return Report</h6>
                </div>
                <div class="my-xl-auto">
                    <div class="dropdown">
                        <a href="javascript:void(0);" class="btn btn-outline-white d-inline-flex align-items-center"  data-bs-toggle="dropdown">
                            <i class="isax isax-export-1 me-1"></i>Export
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="javascript:void(0);">Download as PDF</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="javascript:void(0);">Download as Excel</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- End Page Header -->

            <div class="border-bottom mb-3">
                <!-- start row -->
                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="card position-relative">
                            <div class="card-body">
                                <div>
                                    <p class="mb-2">Total Returns</p>
                                    <div class="d-flex align-items-end justify-content-between  mt-1">
                                        <div>
                                            <h6 class="fs-16 fw-semibold mb-1">$50,000 <span class="text-success fw-normal fs-13 ms-2"><i class="isax isax-send fs-10"></i>5.62%</span></h6>
                                            <p class="fs-13 text-truncate">Compare to last month</p>
                                        </div>
                                        <div id="report_chart"></div>
                                    </div>
                                </div>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div><!-- end col -->
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="card position-relative">
                            <div class="card-body">
                                <div>
                                    <p class="mb-2">Returned Invoices</p>
                                    <div class="d-flex align-items-end justify-content-between  mt-1">
                                        <div>
                                            <h6 class="fs-16 fw-semibold mb-1">154<span class="text-success fw-normal fs-13 ms-2"><i class="isax isax-send fs-10"></i>11.4%</span></h6>
                                            <p class="fs-13 text-truncate">Compare to last month</p>
                                        </div>
                                        <div id="report_chart_2"></div>
                                    </div>
                                </div>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div><!-- end col -->
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="card position-relative">
                            <div class="card-body">
                                <div>
                                    <p class="mb-2 text-truncate">Total Sales Loss Due to Returns</p>
                                    <div class="d-flex align-items-end justify-content-between  mt-1">
                                        <div>
                                            <h6 class="fs-16 fw-semibold mb-1 d-flex flex-wrap">$25,000<span class="text-success fw-normal fs-13 ms-2"><i class="isax isax-send fs-10"></i>8.52%</span></h6>
                                            <p class="fs-13 text-truncate">Compare to last month</p>
                                        </div>
                                        <div id="report_chart_3"></div>
                                    </div>
                                </div>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div><!-- end col -->
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="card position-relative">
                            <div class="card-body">
                                <div>
                                    <p class="mb-2">Total Returns</p>
                                    <div class="d-flex align-items-end justify-content-between  mt-1">
                                        <div>
                                            <h6 class="fs-16 fw-semibold mb-1">$50,000 <span class="text-success fw-normal fs-13 ms-2"><i class="isax isax-send fs-10"></i>5.62%</span></h6>
                                            <p class="fs-13 text-truncate">Compare to last month</p>
                                        </div>
                                        <div id="report_chart_4"></div>
                                    </div>
                                </div>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div><!-- end col -->
                </div>
                <!-- end row -->
            </div>
            
            <!-- Table Search -->
            <div class="mb-3">

                <div class="d-flex align-items-center justify-content-between gap-3 flex-wrap">
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
                                        <span>Quotation ID</span>
                                    </label>
                                </li>
                                <li>
                                    <label class="dropdown-item d-flex align-items-center form-switch">
                                        <i class="fa-solid fa-grip-vertical me-3 text-default"></i>
                                        <input class="form-check-input m-0 me-2" type="checkbox" checked>
                                        <span>Customer</span>
                                    </label>
                                </li>
                                <li>
                                    <label class="dropdown-item d-flex align-items-center form-switch">
                                        <i class="fa-solid fa-grip-vertical me-3 text-default"></i>
                                        <input class="form-check-input m-0 me-2" type="checkbox" checked>
                                        <span>Status</span>
                                    </label>
                                </li>
                                <li>
                                    <label class="dropdown-item d-flex align-items-center form-switch">
                                        <i class="fa-solid fa-grip-vertical me-3 text-default"></i>
                                        <input class="form-check-input m-0 me-2" type="checkbox" checked>
                                        <span>Created On</span>
                                    </label>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>				

            </div>
            <!-- /Table Search -->
            
            <!-- Table List -->
            <div class="table-responsive">
                <table class="table table-nowrap datatable">
                    <thead>
                        <tr>
                            <th class="no-sort">
                                <div class="form-check form-check-md">
                                    <input class="form-check-input" type="checkbox" id="select-all">
                                </div>
                            </th>
                            <th class="no-sort">Credit Note ID</th>
                            <th>Customer</th>
                            <th>Amount</th>
                            <th class="no-sort">Related To</th>
                            <th class="no-sort">Payment Mode</th>
                            <th>Created On</th>
                            <th>Status</th>
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
                                <a href="javascript:void(0);" class="link-default">CN0014</a>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <a href="javascript:void(0);" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
                                        <img src="{{URL::asset('build/img/profiles/avatar-28.jpg')}}" class="rounded-circle" alt="img">
                                    </a>
                                    <div>
                                        <h6 class="fs-14 fw-medium mb-0"><a href="javascript:void(0);">Emily Clark</a></h6>
                                    </div>
                                </div>
                            </td>
                            <td class="text-dark">
                                $10,000
                            </td>
                            <td><a href="javascript:void(0);" class="link-default">INV00025</a></td>
                            <td class="text-dark">
                                Cash
                            </td>
                            <td>
                                22 Feb 2025
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <a href="#" class="badge badge-soft-success badge-sm d-inline-flex align-items-center">
                                        Paid <i class="isax isax-tick-circle4 ms-1"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check form-check-md">
                                    <input class="form-check-input" type="checkbox">
                                </div>
                            </td>
                            <td>
                                <a href="javascript:void(0);" class="link-default">CN0013</a>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <a href="javascript:void(0);" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
                                        <img src="{{URL::asset('build/img/profiles/avatar-29.jpg')}}" class="rounded-circle" alt="img">
                                    </a>
                                    <div>
                                        <h6 class="fs-14 fw-medium mb-0"><a href="javascript:void(0);">John Carter</a></h6>
                                    </div>
                                </div>
                            </td>
                            <td class="text-dark">$25,750</td>
                            <td><a href="javascript:void(0);" class="link-default">INV00024</a></td>
                            <td class="text-dark">Cheque</td>
                            <td >07 Feb 2025</td>
                            
                            <td>
                                <div class="d-flex align-items-center">
                                    <a href="#" class="badge badge-soft-warning badge-sm d-inline-flex align-items-center">
                                        Pending <i class="isax isax-timer ms-1"></i>
                                    </a>
                                </div>
                            </td>
                            
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check form-check-md">
                                    <input class="form-check-input" type="checkbox">
                                </div>
                            </td>
                            <td>
                                <a href="javascript:void(0);" class="link-default">CN0012</a>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <a href="javascript:void(0);" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
                                        <img src="{{URL::asset('build/img/profiles/avatar-12.jpg')}}" class="rounded-circle" alt="img">
                                    </a>
                                    <div>
                                        <h6 class="fs-14 fw-medium mb-0"><a href="javascript:void(0);">Sophia White</a></h6>
                                    </div>
                                </div>
                            </td>
                            <td class="text-dark">$50,125</td>
                            <td><a href="javascript:void(0);" class="link-default">INV00023</a></td>
                            <td class="text-dark">Cash</td>
                            <td >30 Jan 2025</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <a href="#" class="badge badge-soft-danger badge-sm d-inline-flex align-items-center">
                                        Cancelled <i class="isax isax-close-circle4 ms-1"></i>
                                    </a>
                                </div>
                            </td>
                            
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check form-check-md">
                                    <input class="form-check-input" type="checkbox">
                                </div>
                            </td>
                            <td>
                                <a href="javascript:void(0);" class="link-default">CN0011</a>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <a href="javascript:void(0);" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
                                        <img src="{{URL::asset('build/img/profiles/avatar-06.jpg')}}" class="rounded-circle" alt="img">
                                    </a>
                                    <div>
                                        <h6 class="fs-14 fw-medium mb-0"><a href="javascript:void(0);">Michael Johnson</a></h6>
                                    </div>
                                </div>
                            </td>
                            <td class="text-dark">$75,900</td>
                            <td>
                                <a href="javascript:void(0);" class="link-default">INV00022</a>
                            </td>
                            <td class="text-dark">Cheque</td>
                            <td >17 Jan 2025</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <a href="#" class="badge badge-soft-success badge-sm d-inline-flex align-items-center">
                                        Paid <i class="isax isax-tick-circle4 ms-1"></i>
                                    </a>
                                </div>
                            </td>
                        
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check form-check-md">
                                    <input class="form-check-input" type="checkbox">
                                </div>
                            </td>
                            <td>
                                <a href="javascript:void(0);" class="link-default">CN0010</a>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <a href="javascript:void(0);" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
                                        <img src="{{URL::asset('build/img/profiles/avatar-30.jpg')}}" class="rounded-circle" alt="img">
                                    </a>
                                    <div>
                                        <h6 class="fs-14 fw-medium mb-0"><a href="javascript:void(0);">Olivia Harris</a></h6>
                                    </div>
                                </div>
                            </td>
                            <td class="text-dark">$99,999</td>
                            <td>
                                <a href="javascript:void(0);" class="link-default">INV00021</a>
                            </td>
                            <td class="text-dark">Cheque</td>
                            <td >04 Jan 2025</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <a href="#" class="badge badge-soft-warning badge-sm d-inline-flex align-items-center">
                                        Pending <i class="isax isax-timer ms-1"></i>
                                    </a>
                                </div>
                            </td>
                            
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check form-check-md">
                                    <input class="form-check-input" type="checkbox">
                                </div>
                            </td>
                            <td>
                                <a href="javascript:void(0);" class="link-default">CN0009</a>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <a href="javascript:void(0);" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
                                        <img src="{{URL::asset('build/img/profiles/avatar-16.jpg')}}" class="rounded-circle" alt="img">
                                    </a>
                                    <div>
                                        <h6 class="fs-14 fw-medium mb-0"><a href="javascript:void(0);">David Anderson</a></h6>
                                    </div>
                                </div>
                            </td>
                            <td class="text-dark">$1,20,500</td>
                            <td>
                                <a href="javascript:void(0);" class="link-default">INV00020	</a>
                            </td>
                            <td class="text-dark">Cash</td>
                            <td >09 Dec 2024</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <a href="#" class="badge badge-soft-danger badge-sm d-inline-flex align-items-center">
                                        Cancelled <i class="isax isax-close-circle4 ms-1"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check form-check-md">
                                    <input class="form-check-input" type="checkbox">
                                </div>
                            </td>
                            <td>
                                <a href="javascript:void(0);" class="link-default">CN0008</a>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <a href="javascript:void(0);" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
                                        <img src="{{URL::asset('build/img/profiles/avatar-16.jpg')}}" class="rounded-circle" alt="img">
                                    </a>
                                    <div>
                                        <h6 class="fs-14 fw-medium mb-0"><a href="javascript:void(0);">Emma Lewis</a></h6>
                                    </div>
                                </div>
                            </td>
                            <td class="text-dark">$2,50,000</td>
                            <td>
                                <a href="javascript:void(0);" class="link-default">INV00019</a>
                            </td>
                            <td class="text-dark">Cash</td>
                            <td >02 Dec 2024</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <a href="#" class="badge badge-soft-success badge-sm d-inline-flex align-items-center">
                                        Paid <i class="isax isax-tick-circle4 ms-1"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check form-check-md">
                                    <input class="form-check-input" type="checkbox">
                                </div>
                            </td>
                            <td>
                                <a href="javascript:void(0);" class="link-default">CN0007</a>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <a href="javascript:void(0);" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
                                        <img src="{{URL::asset('build/img/profiles/avatar-23.jpg')}}" class="rounded-circle" alt="img">
                                    </a>
                                    <div>
                                        <h6 class="fs-14 fw-medium mb-0"><a href="javascript:void(0);">Robert Thomas</a></h6>
                                    </div>
                                </div>
                            </td>
                            <td class="text-dark">$5,00,750</td>
                            <td>
                                <a href="javascript:void(0);" class="link-default">INV00018</a>
                            </td>
                            <td class="text-dark">Cheque</td>
                            <td >15 Nov 2024</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <a href="#" class="badge badge-soft-warning badge-sm d-inline-flex align-items-center">
                                        Pending <i class="isax isax-timer ms-1"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        
                        <tr>
                            <td>
                                <div class="form-check form-check-md">
                                    <input class="form-check-input" type="checkbox">
                                </div>
                            </td>
                            <td>
                                <a href="javascript:void(0);" class="link-default">CN0006</a>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <a href="javascript:void(0);" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
                                        <img src="{{URL::asset('build/img/profiles/avatar-07.jpg')}}" class="rounded-circle" alt="img">
                                    </a>
                                    <div>
                                        <h6 class="fs-14 fw-medium mb-0"><a href="javascript:void(0);">Isabella Scott</a></h6>
                                    </div>
                                </div>
                            </td>
                            <td class="text-dark">$7,50,300</td>
                            <td>
                                <a href="javascript:void(0);" class="link-default">INV00017</a>
                            </td>
                            <td class="text-dark">Cheque</td>
                            <td >30 Nov 2024</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <a href="#" class="badge badge-soft-danger badge-sm d-inline-flex align-items-center">
                                        Cancelled <i class="isax isax-close-circle4 ms-1"></i>
                                    </a>
                                </div>
                            </td>
                            
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check form-check-md">
                                    <input class="form-check-input" type="checkbox">
                                </div>
                            </td>
                            <td>
                                <a href="javascript:void(0);" class="link-default">CN0005</a>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <a href="javascript:void(0);" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
                                        <img src="{{URL::asset('build/img/profiles/avatar-31.jpg')}}" class="rounded-circle" alt="img">
                                    </a>
                                    <div>
                                        <h6 class="fs-14 fw-medium mb-0"><a href="javascript:void(0);">Daniel Martinez</a></h6>
                                    </div>
                                </div>
                            </td>
                            <td class="text-dark">$9,99,999</td>
                            <td>
                                <a href="javascript:void(0);" class="link-default">INV00016</a>
                            </td>
                            <td class="text-dark">Cash</td>
                            <td >12 Oct 2024</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <a href="#" class="badge badge-soft-success badge-sm d-inline-flex align-items-center">
                                        Paid <i class="isax isax-tick-circle4 ms-1"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check form-check-md">
                                    <input class="form-check-input" type="checkbox">
                                </div>
                            </td>
                            <td>
                                <a href="javascript:void(0);" class="link-default">CN0004</a>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <a href="javascript:void(0);" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
                                        <img src="{{URL::asset('build/img/profiles/avatar-37.jpg')}}" class="rounded-circle" alt="img">
                                    </a>
                                    <div>
                                        <h6 class="fs-14 fw-medium mb-0"><a href="javascript:void(0);">Charlotte Brown</a></h6>
                                    </div>
                                </div>
                            </td>
                            <td class="text-dark">$87,650</td>
                            <td>
                                <a href="javascript:void(0);" class="link-default">INV00015</a>
                            </td>
                            <td class="text-dark">Cheque</td>
                            <td >05 Oct 2024</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <a href="#" class="badge badge-soft-warning badge-sm d-inline-flex align-items-center">
                                        Pending <i class="isax isax-timer ms-1"></i>
                                    </a>
                                </div>
                            </td>
                            
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check form-check-md">
                                    <input class="form-check-input" type="checkbox">
                                </div>
                            </td>
                            <td>
                                <a href="javascript:void(0);" class="link-default">CN0003</a>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <a href="javascript:void(0);" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
                                        <img src="{{URL::asset('build/img/profiles/avatar-21.jpg')}}" class="rounded-circle" alt="img">
                                    </a>
                                    <div>
                                        <h6 class="fs-14 fw-medium mb-0"><a href="javascript:void(0);">William Parker</a></h6>
                                    </div>
                                </div>
                            </td>
                            <td class="text-dark">$69,420</td>
                            <td>
                                <a href="javascript:void(0);" class="link-default">INV00014</a>
                            </td>
                            <td class="text-dark">Cash</td>
                            <td >09 Sep 2024</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <a href="#" class="badge badge-soft-danger badge-sm d-inline-flex align-items-center">
                                        Cancelled <i class="isax isax-close-circle4 ms-1"></i>
                                    </a>
                                </div>
                            </td>
                            
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check form-check-md">
                                    <input class="form-check-input" type="checkbox">
                                </div>
                            </td>
                            <td>
                                <a href="javascript:void(0);" class="link-default">CN0002</a>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <a href="javascript:void(0);" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
                                        <img src="{{URL::asset('build/img/profiles/avatar-17.jpg')}}" class="rounded-circle" alt="img">
                                    </a>
                                    <div>
                                        <h6 class="fs-14 fw-medium mb-0"><a href="javascript:void(0);">Mia Thompson</a></h6>
                                    </div>
                                </div>
                            </td>
                            <td class="text-dark">$33,210</td>
                            <td>
                                <a href="javascript:void(0);" class="link-default">INV00013</a>
                            </td>
                            <td class="text-dark">Cheque</td>
                            <td >02 Sep 2024</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <a href="#" class="btn btn-sm btn-success-light d-inline-flex align-items-center me-1">
                                        Paid <i class="isax isax-tick-circle4 ms-1"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check form-check-md">
                                    <input class="form-check-input" type="checkbox">
                                </div>
                            </td>
                            <td>
                                <a href="javascript:void(0);" class="link-default">CN0001</a>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <a href="javascript:void(0);" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
                                        <img src="{{URL::asset('build/img/profiles/avatar-07.jpg')}}" class="rounded-circle" alt="img">
                                    </a>
                                    <div>
                                        <h6 class="fs-14 fw-medium mb-0"><a href="javascript:void(0);">Amelia Robinson</a></h6>
                                    </div>
                                </div>
                            </td>
                            <td class="text-dark">$2,10,000</td>
                            <td>
                                <a href="javascript:void(0);" class="link-default">INV00012</a>
                            </td>
                            <td class="text-dark">Cheque</td>
                            <td >07 Aug 2024</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <a href="#" class="badge badge-soft-warning badge-sm d-inline-flex align-items-center">
                                        Pending <i class="isax isax-timer ms-1"></i>
                                    </a>
                                </div>
                            </td>
                        
                        </tr>
                        
                    </tbody>
                </table>
            </div>
            <!-- /Table List -->

        </div>
        <!-- End Content -->
        
        <!-- Start Footer-->
        <div class="footer d-sm-flex align-items-center justify-content-between bg-white py-2 px-4 border-top">
            <p class="text-dark mb-0">&copy; 2025 <a href="javascript:void(0);" class="link-primary">Kanakku</a>, All Rights Reserved</p>
            <p class="text-dark">Version : 1.3.8</p>
        </div>
        <!-- / End Footer-->

    </div>
    
    <!-- ========================
        End Page Content
    ========================= -->

    <!-- Filter -->
    <div class="offcanvas offcanvas-offset offcanvas-end" tabindex="-1" id="customcanvas">                                      
        <div class="offcanvas-header d-block pb-0">
            <div class="border-bottom d-flex align-items-center justify-content-between pb-3">
                <h6 class="offcanvas-title">Filter</h6>
                <button type="button" class="btn-close btn-close-modal custom-btn-close" data-bs-dismiss="offcanvas" aria-label="Close"><i class="fa-solid fa-x"></i></button>
            </div>
        </div>			
        <div class="offcanvas-body pt-3">  
            <form action="#">
                <div class="mb-3">
                    <label class="form-label">Customer</label>
                    <div class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle btn btn-lg bg-light  d-flex align-items-center justify-content-start fs-13 fw-normal border" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="true">
                            Select
                        </a>
                        <div class="dropdown-menu shadow-lg w-100 dropdown-info">							
                            <div class="mb-3">
                                <div class="input-icon-start position-relative">
                                    <span class="input-icon-addon fs-12">
                                        <i class="isax isax-search-normal"></i>
                                    </span>
                                    <input type="text" class="form-control form-control-sm" placeholder="Search">
                                </div>
                            </div>
                            <ul class="mb-3">
                                <li class="d-flex align-items-center justify-content-between mb-3">
                                    <label class="d-inline-flex align-items-center text-gray-9">
                                        <input class="form-check-input select-all m-0 me-2" type="checkbox">
                                        Select All
                                    </label>
                                    <a href="javascript:void(0);" class="link-danger fw-medium text-decoration-underline">Reset</a>
                                </li>
                                <li>
                                    <label class="dropdown-item px-2 d-flex align-items-center text-dark">
                                        <input class="form-check-input m-0 me-2" type="checkbox">
                                        <span class="avatar avatar-sm rounded-circle me-2"><img src="{{URL::asset('build/img/profiles/avatar-18.jpg')}}" class="flex-shrink-0 rounded-circle" alt="img"></span>Emily Clark
                                    </label>
                                </li>
                                <li>
                                    <label class="dropdown-item px-2 d-flex align-items-center text-dark">
                                        <input class="form-check-input m-0 me-2" type="checkbox">
                                        <span class="avatar avatar-sm rounded-circle me-2"><img src="{{URL::asset('build/img/profiles/avatar-29.jpg')}}" class="flex-shrink-0 rounded-circle" alt="img"></span>John Carter
                                    </label>
                                </li>
                                <li>
                                    <label class="dropdown-item px-2 d-flex align-items-center text-dark">
                                        <input class="form-check-input m-0 me-2" type="checkbox">
                                        <span class="avatar avatar-sm rounded-circle me-2"><img src="{{URL::asset('build/img/profiles/avatar-12.jpg')}}" class="flex-shrink-0 rounded-circle" alt="img"></span>Sophia White
                                    </label>
                                </li>
                                <li>
                                    <label class="dropdown-item px-2 d-flex align-items-center text-dark">
                                        <input class="form-check-input m-0 me-2" type="checkbox">
                                        <span class="avatar avatar-sm rounded-circle me-2"><img src="{{URL::asset('build/img/profiles/avatar-06.jpg')}}" class="flex-shrink-0 rounded-circle" alt="img"></span>Michael Johnson
                                    </label>
                                </li>
                                <li>
                                    <label class="dropdown-item px-2 d-flex align-items-center text-dark">
                                        <input class="form-check-input m-0 me-2" type="checkbox">
                                        <span class="avatar avatar-sm rounded-circle me-2"><img src="{{URL::asset('build/img/profiles/avatar-30.jpg')}}" class="flex-shrink-0 rounded-circle" alt="img"></span>Olivia Harris
                                    </label>
                                </li>
                                <li>
                                    <label class="dropdown-item px-2 d-flex align-items-center text-dark">
                                        <input class="form-check-input m-0 me-2" type="checkbox">
                                        <span class="avatar avatar-sm rounded-circle me-2"><img src="{{URL::asset('build/img/profiles/avatar-16.jpg')}}" class="flex-shrink-0 rounded-circle" alt="img"></span>David Anderson
                                    </label>
                                </li>
                            </ul>
                            <div class="row g-2">
                                <div class="col-6">
                                    <a href="#" class="btn btn-outline-white w-100 close-filter">Cancel</a>
                                </div>
                                <div class="col-6">
                                    <a href="#" class="btn btn-primary w-100">Select</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Amount</label>
                    <div class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle btn btn-lg bg-light  d-flex align-items-center justify-content-start fs-13 fw-normal border" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="true">
                            Select
                        </a>
                        <div class="dropdown-menu shadow-lg w-100 dropdown-info">							
                            <div class="filter-range">
                                <input type="text" id="range_03">
                                <p>Range : <span class="text-gray-9">Range : $200 - $5695</span></p>
                            </div>
                        </div>
                    </div>
                </div>	
                <div class="mb-3">
                    <label class="form-label">Payment Mode</label>
                    <div class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle btn btn-lg bg-light  d-flex align-items-center justify-content-start fs-13 fw-normal border" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="true">
                            Select
                        </a>
                        <div class="dropdown-menu shadow-lg w-100 dropdown-info">	
                            <ul class="mb-0">
                                <li>
                                    <label class="dropdown-item px-2 d-flex align-items-center text-dark">
                                        <input class="form-check-input m-0 me-2" type="checkbox">
                                        Cash
                                    </label>
                                </li>
                                <li>
                                    <label class="dropdown-item px-2 d-flex align-items-center text-dark">
                                        <input class="form-check-input m-0 me-2" type="checkbox">
                                        Check
                                    </label>
                                </li>
                                <li>
                                    <label class="dropdown-item px-2 d-flex align-items-center text-dark">
                                        <input class="form-check-input m-0 me-2" type="checkbox">
                                        Bank Transfer
                                    </label>
                                </li>
                                <li>
                                    <label class="dropdown-item px-2 d-flex align-items-center text-dark">
                                        <input class="form-check-input m-0 me-2" type="checkbox">
                                        Paypal
                                    </label>
                                </li>
                                <li>
                                    <label class="dropdown-item px-2 d-flex align-items-center text-dark">
                                        <input class="form-check-input m-0 me-2" type="checkbox">
                                        Stripe
                                    </label>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Date Range</label>
                    <div class="input-group position-relative">
                        <input type="text" class="form-control date-range bookingrange rounded-end">
                        <span class="input-icon-addon fs-16 text-gray-9">
                            <i class="isax isax-calendar-2"></i>
                        </span>
                    </div>
                </div>	
                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <div class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle btn btn-lg bg-light  d-flex align-items-center justify-content-start fs-13 fw-normal border" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="true">
                            Select
                        </a>
                        <div class="dropdown-menu shadow-lg w-100 dropdown-info">	
                            <ul class="mb-0">
                                <li>
                                    <label class="dropdown-item px-2 d-flex align-items-center text-dark">
                                        <input class="form-check-input m-0 me-2" type="checkbox">
                                        <i class="fa-solid fa-circle fs-6 text-success me-1"></i>Paid
                                    </label>
                                </li>
                                <li>
                                    <label class="dropdown-item px-2 d-flex align-items-center text-dark">
                                        <input class="form-check-input m-0 me-2" type="checkbox">
                                        <i class="fa-solid fa-circle fs-6 text-warning me-1"></i>Pending
                                    </label>
                                </li>
                                <li>
                                    <label class="dropdown-item px-2 d-flex align-items-center text-dark">
                                        <input class="form-check-input m-0 me-2" type="checkbox">
                                        <i class="fa-solid fa-circle fs-6 text-danger me-1"></i>Cancelled
                                    </label>
                                </li>							
                            </ul>
                        </div>
                    </div>
                </div>
                        
                <div class="offcanvas-footer">
                    <div class="row g-2">
                        <div class="col-6">
                            <a href="#"  class="btn btn-outline-white w-100">Reset</a>
                        </div>
                        <div class="col-6">
                            <button data-bs-dismiss="offcanvas" class="btn btn-primary w-100" id="filter-submit">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- /Filter -->
@endsection