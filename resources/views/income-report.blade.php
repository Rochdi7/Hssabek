<?php $page = 'income-report'; ?>
@extends('layout.mainlayout')
@section('content')
    <!-- ========================
        Start Page Content
    ========================= -->

    <div class="page-wrapper">	

        <!-- Start Content -->
        <div class="content content-two">

            <!-- Page Header -->
            <div class="d-flex d-block align-items-center justify-content-between flex-wrap gap-3 mb-3">
                <div>
                    <h6 class="mb-0">Income Report</h6>
                </div>
                <div class="d-flex my-xl-auto right-content align-items-center flex-wrap gap-2">
                    <div class="dropdown me-1">
                        <a href="javascript:void(0);" class="btn btn-outline-white d-inline-flex align-items-center"  data-bs-toggle="dropdown">
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
            <!-- End Page Header -->

            <!-- start row -->
            <div class="row">
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="card position-relative">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <div>
                                    <p class="mb-1">Total Income</p>
                                    <h6 class="fs-16 fw-semibold mb-0">$250,000</h6>
                                </div>
                                <div>
                                    <span class="badge badge-soft-primary border border-primary rounded-circle p-2 d-inline-flex align-items-center justify-content-center">
                                        <i class="isax isax-dollar-circle fs-16"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="">
                                <p class="fs-13 mb-0">
                                    <span class="text-success"><i class="isax isax-send text-success me-1"></i>5.62%</span> from last month
                                </p>
                            </div>
                            <span class="position-absolute start-0 bottom-0">
                                <img src="{{URL::asset('build/img/bg/income-report-1.svg')}}" alt="User Img">
                            </span>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="card position-relative">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <div>
                                    <p class="mb-1">Product Sales</p>
                                    <h6 class="fs-16 fw-semibold mb-0">$100,000</h6>
                                </div>
                                <div>
                                    <span class="badge badge-soft-success border border-success rounded-circle p-2 d-inline-flex align-items-center justify-content-center">
                                        <i class="isax isax-bag-2 fs-16"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="">
                                <p class="fs-13 mb-0">
                                    <span class="text-success"><i class="isax isax-send text-success me-1"></i>11.4%</span> from last month
                                </p>
                            </div>
                            <span class="position-absolute start-0 bottom-0">
                                <img src="{{URL::asset('build/img/bg/income-report-2.svg')}}" alt="User Img">
                            </span>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="card position-relative">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <div>
                                    <p class="mb-1">Service Revenue</p>
                                    <h6 class="fs-16 fw-semibold mb-0">$400,000</h6>
                                </div>
                                <div>
                                    <span class="badge badge-soft-warning border border-warning rounded-circle p-2 d-inline-flex align-items-center justify-content-center">
                                        <i class="isax isax-wallet-3 fs-16"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="">
                                <p class="fs-13 mb-0">
                                    <span class="text-success"><i class="isax isax-send text-success me-1"></i>8.12%</span> from last month
                                </p>
                            </div>
                            <span class="position-absolute start-0 bottom-0">
                                <img src="{{URL::asset('build/img/bg/income-report-3.svg')}}" alt="User Img">
                            </span>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="card position-relative">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <div>
                                    <p class="mb-1">Other Income</p>
                                    <h6 class="fs-16 fw-semibold mb-0">$300,000</h6>
                                </div>
                                <div>
                                    <span class="badge badge-soft-danger border border-danger rounded-circle p-2 d-inline-flex align-items-center justify-content-center">
                                        <i class="isax isax-wallet-money fs-16"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="">
                                <p class="fs-13 mb-0">
                                    <span class="text-success"><i class="isax isax-send text-success me-1"></i>7.45%</span> from last month
                                </p>
                            </div>
                            <span class="position-absolute start-0 bottom-0">
                                <img src="{{URL::asset('build/img/bg/income-report-4.svg')}}" alt="User Img">
                            </span>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->
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
                                        <span>Date</span>
                                    </label>
                                </li>
                                <li>
                                    <label class="dropdown-item d-flex align-items-center form-switch">
                                        <i class="fa-solid fa-grip-vertical me-3 text-default"></i>
                                        <input class="form-check-input m-0 me-2" type="checkbox" checked>
                                        <span>Reference Number</span>
                                    </label>
                                </li>
                                <li>
                                    <label class="dropdown-item d-flex align-items-center form-switch">
                                        <i class="fa-solid fa-grip-vertical me-3 text-default"></i>
                                        <input class="form-check-input m-0 me-2" type="checkbox">
                                        <span>Description</span>
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
                            </ul>
                        </div>
                    </div>
                </div>	

                <!-- Filter Info -->
                <div class="align-items-center gap-2 flex-wrap filter-info mt-3">
                    <h6 class="fs-13 fw-semibold">Filters</h6>
                    <span class="tag bg-light border rounded-1 fs-12 text-dark badge"><span class="num-count d-inline-flex align-items-center justify-content-center bg-success fs-10 me-1">2</span>Payment Mode Selected<span class="ms-1 tag-close"><i class="fa-solid fa-x fs-10"></i></span></span>											
                    <a href="#" class="link-danger fw-medium text-decoration-underline ms-md-1">Clear All</a>
                </div>
                <!-- /Filter Info -->			
            </div>
            <!-- End Table Search -->
            
            <!-- Table List Start -->
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
                            <th class="no-sort">Reference Number</th>
                            <th class="no-sort">Description</th>
                            <th>Amount</th>
                            <th class="no-sort">Payment Mode</th>
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
                                <a href="javascript:void(0);" class="link-default">INC00025</a>
                            </td>
                            <td>22 Feb 2025</td>
                            <td>REF17420</td>
                            <td>Sale of laptops</td>
                            <td class="text-dark">$10,000</td>
                            <td class="text-dark">Cash</td>						
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check form-check-md">
                                    <input class="form-check-input" type="checkbox">
                                </div>
                            </td>
                            <td>
                                <a href="javascript:void(0);" class="link-default">INC00024</a>
                            </td>
                            <td>07 Feb 2025</td>
                            <td>REF16512</td>
                            <td>Website development</td>
                            <td class="text-dark">$25,750</td>
                            <td class="text-dark fw-medium">Cheque</td>						
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check form-check-md">
                                    <input class="form-check-input" type="checkbox">
                                </div>
                            </td>
                            <td>
                                <a href="javascript:void(0);" class="link-default">INC00023</a>
                            </td>
                            <td>30 Jan 2025</td>
                            <td>REF16418</td>
                            <td>Cloud migration service</td>
                            <td class="text-dark">$50,125</td>
                            <td class="text-dark">Cash</td>						
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check form-check-md">
                                    <input class="form-check-input" type="checkbox">
                                </div>
                            </td>
                            <td>
                                <a href="javascript:void(0);" class="link-default">INC00022</a>
                            </td>
                            <td>17 Jan 2025</td>
                            <td>REF16317</td>
                            <td>Sale of smartphones</td>
                            <td class="text-dark">$75,900</td>
                            <td class="text-dark fw-medium">Cheque</td>						
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check form-check-md">
                                    <input class="form-check-input" type="checkbox">
                                </div>
                            </td>
                            <td>
                                <a href="javascript:void(0);" class="link-default">INC00021</a>
                            </td>
                            <td>04 Jan 2025</td>
                            <td>REF15294</td>
                            <td>Monthly premium plan</td>
                            <td class="text-dark">$99,999</td>
                            <td class="text-dark fw-medium">Cheque</td>						
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check form-check-md">
                                    <input class="form-check-input" type="checkbox">
                                </div>
                            </td>
                            <td>
                                <a href="javascript:void(0);" class="link-default">INC00020</a>
                            </td>
                            <td>09 Dec 2025</td>
                            <td>REF15420</td>
                            <td>IT consulting services</td>
                            <td class="text-dark">$1,20,500</td>
                            <td class="text-dark">Cash</td>						
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check form-check-md">
                                    <input class="form-check-input" type="checkbox">
                                </div>
                            </td>
                            <td>
                                <a href="javascript:void(0);" class="link-default">INC00019</a>
                            </td>
                            <td>02 Dec 2024</td>
                            <td>REF15420</td>
                            <td>Sale of office equipment</td>
                            <td class="text-dark">$2,50,000</td>
                            <td class="text-dark">Cash</td>						
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check form-check-md">
                                    <input class="form-check-input" type="checkbox">
                                </div>
                            </td>
                            <td>
                                <a href="javascript:void(0);" class="link-default">INC00018</a>
                            </td>
                            <td>15 Nov 2024</td>
                            <td>REF15405</td>
                            <td>Online training session</td>
                            <td class="text-dark">$5,00,750</td>
                            <td class="text-dark fw-medium">Cheque</td>						
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check form-check-md">
                                    <input class="form-check-input" type="checkbox">
                                </div>
                            </td>
                            <td>
                                <a href="javascript:void(0);" class="link-default">INC00017</a>
                            </td>
                            <td>30 Nov 2024</td>
                            <td>REF15754</td>
                            <td>Software maintenance</td>
                            <td class="text-dark">$7,50,300</td>
                            <td class="text-dark fw-medium">Cheque</td>						
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check form-check-md">
                                    <input class="form-check-input" type="checkbox">
                                </div>
                            </td>
                            <td>
                                <a href="javascript:void(0);" class="link-default">INC00016</a>
                            </td>
                            <td>12 Oct 2024</td>
                            <td>REF14947</td>
                            <td>Cloud storage solutions</td>
                            <td class="text-dark">$9,99,999</td>
                            <td class="text-dark">cash</td>						
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check form-check-md">
                                    <input class="form-check-input" type="checkbox">
                                </div>
                            </td>
                            <td>
                                <a href="javascript:void(0);" class="link-default">INC00015</a>
                            </td>
                            <td>05 Oct 2024</td>
                            <td>REF13302</td>
                            <td>Sale of smart devices</td>
                            <td class="text-dark">$87,650</td>
                            <td class="text-dark fw-medium">Cheque</td>						
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check form-check-md">
                                    <input class="form-check-input" type="checkbox">
                                </div>
                            </td>
                            <td>
                                <a href="javascript:void(0);" class="link-default">INC00014</a>
                            </td>
                            <td>09 Sep 2024</td>
                            <td>REF13035</td>
                            <td>Software Maintenance</td>
                            <td class="text-dark">$69,420</td>
                            <td class="text-dark">Cash</td>						
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check form-check-md">
                                    <input class="form-check-input" type="checkbox">
                                </div>
                            </td>
                            <td>
                                <a href="javascript:void(0);" class="link-default">INC00013</a>
                            </td>
                            <td>02 Sep 2024</td>
                            <td>REF12710</td>
                            <td>Server Maintenance</td>
                            <td class="text-dark">$33,210</td>
                            <td class="text-dark fw-medium">Cheque</td>						
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check form-check-md">
                                    <input class="form-check-input" type="checkbox">
                                </div>
                            </td>
                            <td>
                                <a href="javascript:void(0);" class="link-default">INC00012</a>
                            </td>
                            <td>07 Aug 2024</td>
                            <td>REF12831</td>
                            <td>Bulk order freight costs</td>
                            <td class="text-dark">$2,10,000</td>
                            <td class="text-dark fw-medium">Cheque</td>						
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- Table List End -->

        </div>
        <!-- End Content -->
        
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

    <!-- Start Filter -->
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
                    <label for="dateRangePicker" class="form-label">Date Range</label>
                    <div class="input-group position-relative">
                        <input type="text" class="form-control date-range bookingrange rounded-end">
                        <span class="input-icon-addon fs-16 text-gray-9">
                            <i class="isax isax-calendar-2"></i>
                        </span>
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
                                <p>Range : <span class="text-gray-9">$200 - $5695</span></p>
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
                                        Cash
                                    </label>
                                </li>
                                <li>
                                    <label class="dropdown-item px-2 d-flex align-items-center text-dark">
                                        <input class="form-check-input m-0 me-2" type="checkbox">
                                        Cheque
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
    <!-- End Filter -->
@endsection