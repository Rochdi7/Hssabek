<?php $page = 'payment-summary'; ?>
@extends('layout.mainlayout')
@section('content')
  <!-- ========================
			Start Page Content
		========================= -->

        <div class="page-wrapper">
			
			<!-- Start conatiner -->
            <div class="content content-two">

                <!-- Page Header -->
                <div class="d-flex d-block align-items-center justify-content-between flex-wrap gap-3 mb-3">
                    <div>
                        <h6 class="mb-0">Payment Summary Report</h6>
                    </div>
                    <div class="d-flex my-xl-auto right-content align-items-center flex-wrap gap-2">
                        <div class="dropdown me-1">
                            <a href="javascript:void(0);" class="btn btn-outline-white d-inline-flex align-items-center" data-bs-toggle="dropdown">
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

				<!-- start row -->
                <div class="row">
                    <div class="col-xl-12 d-flex">

						<!-- start row -->
                        <div class="row flex-fill">
                            <div class="col-xl-3 col-lg-6 col-md-6 d-flex">
                                <div class="card invoice-report  flex-fill">
                                    <div class="card-body">
                                        <div class=" d-flex align-items-center justify-content-between">
                                            <div class="d-flex align-items-center flex-column overflow-hidden">
                                                <div>
                                                    <div>
                                                        <span class="fs-14 fw-normal text-truncate mb-1">Total Payments</span>
                                                        <div>
                                                            <h5 class="fs-16 fw-semibold me-2 text-truncate mb-1">$60,000</h5>
                                                            <span class="badge badge-sm badge-soft-success me-3">+5.62% <i class="isax isax-arrow-up-15"></i></span>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center flex-wrap">
                                                <span class="avatar avatar-md br-5  bg-transparent-primary border border-primary">
													<span class="text-primary"><i class=" isax isax-dollar-circle fs-16 custom-icons"></i></span>
                                                </span>
                                            </div>
                                        </div>
                                        <div>
                                            <div id="payment_report_chart"></div>
                                        </div>
                                    </div> <!-- end card body -->
                                </div> <!-- end card -->
                            </div> <!-- end col -->

                            <div class="col-xl-3 col-lg-6 col-md-6 d-flex">
                                <div class="card invoice-report flex-fill">
                                    <div class="card-body ">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="d-flex align-items-center flex-column overflow-hidden">
                                                <div>
                                                    <div>
                                                        <span class="fs-14 fw-normal text-truncate mb-1">Bank Transfer</span>
                                                        <div>
                                                            <h5 class="fs-16 fw-semibold me-2 mb-1">$120,000</h5>
                                                            <span class="badge badge-sm badge-soft-success me-3">+11.4%<i class="isax isax-arrow-up-15"></i></span>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center flex-wrap">
                                                <span class="avatar avatar-md br-5  bg-transparent-success border border-success">
													<span class="text-success"><i class=" isax isax-bank fs-16"></i></span>
                                                </span>
                                            </div>

                                        </div>
                                        <div id="payment_report_chart_2"></div>
                                    </div> <!-- end card body -->
                                </div> <!-- card col -->
                            </div> <!-- end col -->

                            <div class="col-xl-3 col-lg-6 col-md-6 d-flex">
                                <div class="card invoice-report flex-fill">
                                    <div class="card-body">
                                        <div class=" d-flex align-items-center justify-content-between">
                                            <div class="d-flex align-items-center flex-column overflow-hidden">
                                                <div>
                                                    <div>
                                                        <span class="fs-14 fw-normal text-truncate mb-1">UPI & Digital Wallets</span>
                                                        <div>
                                                            <h5 class="fs-16 fw-semibold me-2 mb-1">$500,000</h5>
                                                            <span class="badge badge-sm badge-soft-success me-3">+8.12%<i class="isax isax-arrow-up-15"></i></span>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center flex-wrap">
                                                <span class="avatar avatar-md br-5  border border-warning">
													<span class="text-warning"><i class="isax isax-empty-wallet"></i></span>
                                                </span>
                                            </div>
                                        </div>
                                        <div>
                                            <div id="payment_report_chart_3"></div>
                                        </div>
                                    </div> <!-- end card body -->
                                </div> <!-- end card -->
                            </div>  <!-- end col -->

                            <div class="col-xl-3 col-lg-6 col-md-6 d-flex">
                                <div class="card invoice-report  flex-fill">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="d-flex align-items-center flex-column overflow-hidden">
                                                <div>
                                                    <div>
                                                        <span class="fs-14 fw-normal text-truncate mb-1">Cash & Cheque</span>
                                                        <div>
                                                            <h5 class="fs-16 fw-semibold me-2 mb-1">$300,000</h5>
                                                            <span class="badge badge-sm badge-soft-success me-3">+7.45<i class="isax isax-arrow-up-15"></i></span>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center flex-wrap">
                                                <span class="avatar avatar-md br-5 bg-transparent-danger border border-danger">
													<span class="text-danger"><i class="isax isax-money"></i></span>
                                                </span>
                                            </div>
                                        </div>
                                        <div>
                                            <div id="payment_report_chart_4"></div>
                                        </div>
                                    </div> <!-- end card body -->
                                </div> <!-- end card -->
                            </div> <!-- end col -->
                        </div>
						<!-- end row -->

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

                <!-- End tartTable List -->
                <div class="table-responsive">
                    <table class="table table-nowrap datatable">
                        <thead>
                            <tr>
                                <th class="no-sort">
                                    <div class="form-check form-check-md">
                                        <input class="form-check-input" type="checkbox" id="select-all">
                                    </div>
                                </th>
                                <th>Customer</th>
                                <th>Payment ID</th>
                                <th>Paid Date</th>
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
                                    <div class="d-flex align-items-center">
                                        <a href="{{url('customer-details')}}" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
                                            <img src="{{URL::asset('build/img/profiles/avatar-28.jpg')}}" class="rounded-circle" alt="img">
                                        </a>
                                        <div>
                                            <h6 class="fs-14 fw-medium mb-0"><a href="{{url('customer-details')}}">Emily Clark</a></h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <a href="javascript:void(0);" class="link-default">PAY00025</a>
                                </td>
                                <td>
                                    22 Feb 2025
                                </td>
                                <td class="text-dark">
                                    $10,000
                                </td>
                                <td class="text-dark">Cash</td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check form-check-md">
                                        <input class="form-check-input" type="checkbox">
                                    </div>
                                </td>

                                <td>
                                    <div class="d-flex align-items-center">
                                        <a href="{{url('customer-details')}}" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
                                            <img src="{{URL::asset('build/img/profiles/avatar-29.jpg')}}" class="rounded-circle" alt="img">
                                        </a>
                                        <div>
                                            <h6 class="fs-14 fw-medium mb-0"><a href="{{url('customer-details')}}">John Carter</a></h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <a href="javascript:void(0);" class="link-default">PAY00024</a>
                                </td>
                                <td>
                                    07 Feb 2025
                                </td>
                                <td class="text-dark">$25,750</td>
                                <td class="text-dark">Cheque</td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check form-check-md">
                                        <input class="form-check-input" type="checkbox">
                                    </div>
                                </td>

                                <td>
                                    <div class="d-flex align-items-center">
                                        <a href="{{url('customer-details')}}" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
                                            <img src="{{URL::asset('build/img/profiles/avatar-12.jpg')}}" class="rounded-circle" alt="img">
                                        </a>
                                        <div>
                                            <h6 class="fs-14 fw-medium mb-0"><a href="{{url('customer-details')}}">Sophia White</a></h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <a href="javascript:void(0);" class="link-default">PAY00023</a>
                                </td>
                                <td>
                                    30 Jan 2025
                                </td>
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
                                    <div class="d-flex align-items-center">
                                        <a href="{{url('customer-details')}}" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
                                            <img src="{{URL::asset('build/img/profiles/avatar-06.jpg')}}" class="rounded-circle" alt="img">
                                        </a>
                                        <div>
                                            <h6 class="fs-14 fw-medium mb-0"><a href="{{url('customer-details')}}">Michael Johnson</a></h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <a href="javascript:void(0);" class="link-default">PAY00022</a>
                                </td>
                                <td>
                                    17 Jan 2025
                                </td>
                                <td class="text-dark">$75,900</td>
                                <td class="text-dark">Cheque</td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check form-check-md">
                                        <input class="form-check-input" type="checkbox">
                                    </div>
                                </td>

                                <td>
                                    <div class="d-flex align-items-center">
                                        <a href="{{url('customer-details')}}" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
                                            <img src="{{URL::asset('build/img/profiles/avatar-30.jpg')}}" class="rounded-circle" alt="img">
                                        </a>
                                        <div>
                                            <h6 class="fs-14 fw-medium mb-0"><a href="{{url('customer-details')}}">Olivia Harris</a></h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <a href="javascript:void(0);" class="link-default">PAY00021</a>
                                </td>
                                <td>
                                    04 Jan 2025
                                </td>
                                <td class="text-dark">$99,999</td>
                                <td class="text-dark">Cheque</td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check form-check-md">
                                        <input class="form-check-input" type="checkbox">
                                    </div>
                                </td>

                                <td>
                                    <div class="d-flex align-items-center">
                                        <a href="{{url('customer-details')}}" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
                                            <img src="{{URL::asset('build/img/profiles/avatar-16.jpg')}}" class="rounded-circle" alt="img">
                                        </a>
                                        <div>
                                            <h6 class="fs-14 fw-medium mb-0"><a href="{{url('customer-details')}}">David Anderson</a></h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <a href="javascript:void(0);" class="link-default">PAY00020</a>
                                </td>
                                <td>
                                    09 Dec 2024
                                </td>
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
                                    <div class="d-flex align-items-center">
                                        <a href="{{url('customer-details')}}" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
                                            <img src="{{URL::asset('build/img/profiles/avatar-17.jpg')}}" class="rounded-circle" alt="img">
                                        </a>
                                        <div>
                                            <h6 class="fs-14 fw-medium mb-0"><a href="{{url('customer-details')}}">Emma Lewis</a></h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <a href="javascript:void(0);" class="link-default">PAY00019</a>
                                </td>
                                <td>
                                    02 Dec 2024
                                </td>
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
                                    <div class="d-flex align-items-center">
                                        <a href="{{url('customer-details')}}" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
                                            <img src="{{URL::asset('build/img/profiles/avatar-23.jpg')}}" class="rounded-circle" alt="img">
                                        </a>
                                        <div>
                                            <h6 class="fs-14 fw-medium mb-0"><a href="{{url('customer-details')}}">Robert Thomas</a></h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <a href="javascript:void(0);" class="link-default">PAY00018</a>
                                </td>
                                <td>
                                    15 Nov 2024
                                </td>
                                <td class="text-dark">$5,00,750</td>
                                <td class="text-dark">Cheque</td>
                            </tr>

                            <tr>
                                <td>
                                    <div class="form-check form-check-md">
                                        <input class="form-check-input" type="checkbox">
                                    </div>
                                </td>

                                <td>
                                    <div class="d-flex align-items-center">
                                        <a href="{{url('customer-details')}}" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
                                            <img src="{{URL::asset('build/img/profiles/avatar-07.jpg')}}" class="rounded-circle" alt="img">
                                        </a>
                                        <div>
                                            <h6 class="fs-14 fw-medium mb-0"><a href="{{url('customer-details')}}">Isabella Scott</a></h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <a href="javascript:void(0);" class="link-default">PAY00017</a>
                                </td>
                                <td>
                                    30 Nov 2024
                                </td>
                                <td class="text-dark">$7,50,300</td>
                                <td class="text-dark">Cheque</td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check form-check-md">
                                        <input class="form-check-input" type="checkbox">
                                    </div>
                                </td>

                                <td>
                                    <div class="d-flex align-items-center">
                                        <a href="{{url('customer-details')}}" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
                                            <img src="{{URL::asset('build/img/profiles/avatar-31.jpg')}}" class="rounded-circle" alt="img">
                                        </a>
                                        <div>
                                            <h6 class="fs-14 fw-medium mb-0"><a href="{{url('customer-details')}}">Daniel Martinez</a></h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <a href="javascript:void(0);" class="link-default">PAY00016</a>
                                </td>
                                <td>
                                    12 Oct 2024
                                </td>
                                <td class="text-dark">$9,99,999</td>
                                <td class="text-dark">Cash</td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check form-check-md">
                                        <input class="form-check-input" type="checkbox">
                                    </div>
                                </td>

                                <td>
                                    <div class="d-flex align-items-center">
                                        <a href="{{url('customer-details')}}" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
                                            <img src="{{URL::asset('build/img/profiles/avatar-37.jpg')}}" class="rounded-circle" alt="img">
                                        </a>
                                        <div>
                                            <h6 class="fs-14 fw-medium mb-0"><a href="{{url('customer-details')}}">Charlotte Brown</a></h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <a href="javascript:void(0);" class="link-default">PAY00015</a>
                                </td>
                                <td>
                                    05 Oct 2024
                                </td>
                                <td class="text-dark">$87,650</td>
                                <td class="text-dark">Cheque</td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check form-check-md">
                                        <input class="form-check-input" type="checkbox">
                                    </div>
                                </td>

                                <td>
                                    <div class="d-flex align-items-center">
                                        <a href="{{url('customer-details')}}" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
                                            <img src="{{URL::asset('build/img/profiles/avatar-21.jpg')}}" class="rounded-circle" alt="img">
                                        </a>
                                        <div>
                                            <h6 class="fs-14 fw-medium mb-0"><a href="{{url('customer-details')}}">William Parker</a></h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <a href="javascript:void(0);" class="link-default">PAY00014</a>
                                </td>
                                <td>
                                    09 Sep 2024
                                </td>
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
                                    <div class="d-flex align-items-center">
                                        <a href="{{url('customer-details')}}" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
                                            <img src="{{URL::asset('build/img/profiles/avatar-17.jpg')}}" class="rounded-circle" alt="img">
                                        </a>
                                        <div>
                                            <h6 class="fs-14 fw-medium mb-0"><a href="{{url('customer-details')}}">Mia Thompson</a></h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <a href="javascript:void(0);" class="link-default">PAY00013</a>
                                </td>
                                <td>
                                    02 Sep 2024
                                </td>
                                <td class="text-dark">$33,210</td>
                                <td class="text-dark">Cheque</td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check form-check-md">
                                        <input class="form-check-input" type="checkbox">
                                    </div>
                                </td>

                                <td>
                                    <div class="d-flex align-items-center">
                                        <a href="{{url('customer-details')}}" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
                                            <img src="{{URL::asset('build/img/profiles/avatar-07.jpg')}}" class="rounded-circle" alt="img">
                                        </a>
                                        <div>
                                            <h6 class="fs-14 fw-medium mb-0"><a href="{{url('customer-details')}}">Amelia Robinson</a></h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <a href="javascript:void(0);" class="link-default">PAY00012</a>
                                </td>
                                <td>
                                    07 Aug 2024
                                </td>
                                <td class="text-dark">$2,10,000</td>
                                <td class="text-dark">Cheque</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                <!-- End Table List -->

            </div>
			<!-- End Content -->

            @component('components.footer')
            @endcomponent

        </div>
		<!-- ========================
			End Page Content
		========================= -->
  
@endsection