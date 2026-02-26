<?php $page = 'invoices'; ?>
@extends('layout.mainlayout')
@section('content')
    <!-- ========================
        Start Page Content
    ========================= -->

    <div class="page-wrapper">

        <!-- Start Content -->
        <div class="content content-two">

            <!-- Start Breadcrumb -->
            <div class="d-flex d-block align-items-center justify-content-between flex-wrap gap-3 mb-3">
                <div>
                    <h6>Invoices</h6>
                </div>
                <div class="d-flex my-xl-auto right-content align-items-center flex-wrap gap-2">
                    <div class="avatar-list-stacked me-1">
                        <span class="avatar avatar-rounded avatar-sm">
                            <img src="{{URL::asset('build/img/profiles/avatar-05.jpg')}}" alt="img">
                        </span>
                        <span class="avatar avatar-rounded avatar-sm">
                            <img src="{{URL::asset('build/img/profiles/avatar-12.jpg')}}" alt="img">
                        </span>
                        <span class="avatar avatar-rounded avatar-sm">
                            <img src="{{URL::asset('build/img/profiles/avatar-06.jpg')}}" alt="img">
                        </span>
                        <span class="avatar avatar-rounded avatar-sm">
                            <img src="{{URL::asset('build/img/profiles/avatar-18.jpg')}}" alt="img">
                        </span>
                        <span class="avatar avatar-rounded avatar-sm">
                            <img src="{{URL::asset('build/img/profiles/avatar-16.jpg')}}" alt="img">
                        </span>
                    </div>
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
                    <div>
                        <a href="{{url('add-invoice')}}" class="btn btn-primary d-flex align-items-center">
                            <i class="isax isax-add-circle5 me-1"></i>New Invoice
                        </a>
                    </div>
                </div>
            </div>
            <!-- End Breadcrumb -->

            <!-- start row -->
            <div class="row">
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="card position-relative">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-2 pb-2 border-bottom">
                                <div>
                                    <p class="mb-1">Total Invoices</p>
                                    <h6 class="fs-16 fw-semibold">$25,000</h6>
                                </div>
                                <div>
                                    <span class="avatar bg-primary rounded-circle">
                                        <i class="isax isax-receipt-item"></i>
                                    </span>
                                </div>
                            </div>
                            <p class="fs-13 mb-0"><span class="text-success"><i class="isax isax-send text-success me-1"></i>5.62%</span> from last month</p>
                            <span class="position-absolute end-0 bottom-0">
                                <img src="{{URL::asset('build/img/bg/card-overlay-01.svg')}}" alt="User Img">
                            </span>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="card position-relative">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-2 pb-2 border-bottom">
                                <div>
                                    <p class="mb-1">Paid Invoices</p>
                                    <h6 class="fs-16 fw-semibold">$18,500</h6>
                                </div>
                                <div>
                                    <span class="avatar bg-success rounded-circle">
                                        <i class="isax isax-tick-circle"></i>
                                    </span>
                                </div>
                            </div>
                            <p class="fs-13 mb-0"><span class="text-success"><i class="isax isax-send text-success me-1"></i>11.4%</span> from last month</p>
                            <span class="position-absolute end-0 bottom-0">
                                <img src="{{URL::asset('build/img/bg/card-overlay-02.svg')}}" alt="User Img">
                            </span>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="card position-relative">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-2 pb-2 border-bottom">
                                <div>
                                    <p class="mb-1">Pending Invoices</p>
                                    <h6 class="fs-16 fw-semibold">$6,500</h6>
                                </div>
                                <div>
                                    <span class="avatar bg-warning rounded-circle">
                                        <i class="isax isax-timer"></i>
                                    </span>
                                </div>
                            </div>
                            <p class="fs-13 mb-0"><span class="text-success"><i class="isax isax-send text-success me-1"></i>8.52%</span> from last month</p>
                            <span class="position-absolute end-0 bottom-0">
                                <img src="{{URL::asset('build/img/bg/card-overlay-03.svg')}}" alt="User Img">
                            </span>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="card position-relative">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-2 pb-2 border-bottom">
                                <div>
                                    <p class="mb-1">Overdue Invoices</p>
                                    <h6 class="fs-16 fw-semibold">$2,000</h6>
                                </div>
                                <div>
                                    <span class="avatar bg-danger rounded-circle">
                                        <i class="isax isax-information"></i>
                                    </span>
                                </div>
                            </div>
                            <p class="fs-13 mb-0"><span class="text-danger"><i class="isax isax-received text-danger me-1"></i>7.45%</span> from last month</p>
                            <span class="position-absolute end-0 bottom-0">
                                <img src="{{URL::asset('build/img/bg/card-overlay-04.svg')}}" alt="User Img">
                            </span>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->
            </div>
            <!-- end row -->
                
            <ul class="nav nav-tabs nav-bordered mb-3">
                <li class="nav-item"><a class="nav-link active" href="javascript:void(0);" data-bs-toggle="tab" data-bs-target="#tab1">All</a></li>
                <li class="nav-item"><a class="nav-link" href="javascript:void(0);" data-bs-toggle="tab" data-bs-target="#tab2">Paid</a></li>
                <li class="nav-item"><a class="nav-link" href="javascript:void(0);" data-bs-toggle="tab" data-bs-target="#tab3">Overdue</a></li>
                <li class="nav-item"><a class="nav-link" href="javascript:void(0);" data-bs-toggle="tab" data-bs-target="#tab4">Upcoming</a></li>
                <li class="nav-item"><a class="nav-link" href="javascript:void(0);" data-bs-toggle="tab" data-bs-target="#tab5">Cancelled</a></li>
                <li class="nav-item"><a class="nav-link" href="javascript:void(0);" data-bs-toggle="tab" data-bs-target="#tab6">Partially Paid</a></li>
                <li class="nav-item"><a class="nav-link" href="javascript:void(0);" data-bs-toggle="tab" data-bs-target="#tab7">Unpaid</a></li>
                <li class="nav-item"><a class="nav-link" href="javascript:void(0);" data-bs-toggle="tab" data-bs-target="#tab8">Refunded</a></li>
                <li class="nav-item"><a class="nav-link" href="javascript:void(0);" data-bs-toggle="tab" data-bs-target="#tab9">Draft</a></li>
            </ul>

            <!-- Table Search Start -->
            <div class="mb-3">
                <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                    <div class="d-flex align-items-center flex-wrap gap-2">
                        <div class="table-search d-flex align-items-center mb-0">
                            <div class="search-input">
                                <a href="javascript:void(0);" class="btn-searchset"><i class="isax isax-search-normal fs-12"></i></a>
                            </div>
                        </div>
                        <a class="btn btn-outline-white fw-normal d-inline-flex align-items-center" href="javascript:void(0);" data-bs-toggle="offcanvas" data-bs-target="#customcanvas">
                            <i class="isax isax-filter me-1"></i>Filter
                        </a>
                    </div>
                    <div class="d-flex align-items-center flex-wrap gap-2">
                        <div class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle btn btn-outline-white d-inline-flex align-items-center" data-bs-toggle="dropdown">
                                <i class="isax isax-sort me-1"></i>Sort By : <span class="fw-normal ms-1">Latest</span>
                            </a>
                            <ul class="dropdown-menu  dropdown-menu-end">
                                <li>
                                    <a href="javascript:void(0);" class="dropdown-item">Latest</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" class="dropdown-item">Oldest</a>
                                </li>
                            </ul>
                        </div>
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
                                        <span>Customer</span>
                                    </label>
                                </li>
                                <li>
                                    <label class="dropdown-item d-flex align-items-center form-switch">
                                        <i class="fa-solid fa-grip-vertical me-3 text-default"></i>
                                        <input class="form-check-input m-0 me-2" type="checkbox" checked>
                                        <span>Created On</span>
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
                                        <input class="form-check-input m-0 me-2" type="checkbox" checked>
                                        <span>Paid</span>
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
                                        <input class="form-check-input m-0 me-2" type="checkbox">
                                        <span>Payment Mode</span>
                                    </label>
                                </li>
                                <li>
                                    <label class="dropdown-item d-flex align-items-center form-switch">
                                        <i class="fa-solid fa-grip-vertical me-3 text-default"></i>
                                        <input class="form-check-input m-0 me-2" type="checkbox">
                                        <span>Due Date</span>
                                    </label>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Table Search End -->

            <!-- Table List Start -->
            <div class="tab-content">
                <div class="tab-pane active show" id="tab1">
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
                                    <th>Customer</th>
                                    <th>Created On</th>
                                    <th>Amount</th>
                                    <th>Paid</th>
                                    <th class="no-sort">Status</th>
                                    <th class="no-sort">Payment Mode</th>
                                    <th>Due Date</th>
                                    <th class="no-sort"></th>
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
                                        <a href="{{url('invoice-details')}}" class="link-default">INV00025</a>
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
                                    <td>22 Feb 2025</td>
                                    <td class="text-dark">$10,000</td>
                                    <td>$5,000</td>
                                    <td>
                                        <span class="badge badge-soft-success d-inline-flex align-items-center">Paid <i class="isax isax-tick-circle ms-1"></i></span>
                                    </td>
                                    <td class="text-dark">Cash</td>
                                    <td>04 Mar 2025</td>
                                    <td class="action-item">
                                        <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                            <i class="isax isax-more"></i>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="{{url('edit-invoice')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-edit me-2"></i>Edit</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-send-2 me-2"></i>Resend</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-document-download me-2"></i>Download Invoices as PDF</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-convert me-2"></i>Convert to Sales Return</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-copy me-2"></i>Clone as Invoice</a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check form-check-md">
                                            <input class="form-check-input" type="checkbox">
                                        </div>
                                    </td>
                                    <td>
                                        <a href="{{url('invoice-details')}}" class="link-default">INV00024</a>
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
                                    <td>07 Feb 2025</td>
                                    <td class="text-dark">$25,750</td>
                                    <td>$10,750</td>
                                    <td>
                                        <span class="badge badge-soft-success d-inline-flex align-items-center">Refunded<i class="isax isax-money-3 ms-1"></i></span>
                                    </td>
                                    <td class="text-dark">Check</td>
                                    <td>20 Feb 2025</td>
                                    <td class="action-item">
                                        <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                            <i class="isax isax-more"></i>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="{{url('edit-invoice')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-edit me-2"></i>Edit</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-send-2 me-2"></i>Resend</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-document-download me-2"></i>Download Invoices as PDF</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-convert me-2"></i>Convert to Sales Return</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-copy me-2"></i>Clone as Invoice</a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check form-check-md">
                                            <input class="form-check-input" type="checkbox">
                                        </div>
                                    </td>
                                    <td>
                                        <a href="{{url('invoice-details')}}" class="link-default">INV00023</a>
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
                                    <td>30 Jan 2025</td>
                                    <td class="text-dark">$50,125</td>
                                    <td>$20,000</td>
                                    <td>
                                        <span class="badge badge-soft-danger d-inline-flex align-items-center">Cancelled<i class="isax isax-close-circle ms-1"></i></span>
                                    </td>
                                    <td class="text-dark">Cash</td>
                                    <td>13 Feb 2025</td>
                                    <td class="action-item">
                                        <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                            <i class="isax isax-more"></i>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="{{url('edit-invoice')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-edit me-2"></i>Edit</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-send-2 me-2"></i>Resend</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-document-download me-2"></i>Download Invoices as PDF</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-convert me-2"></i>Convert to Sales Return</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-copy me-2"></i>Clone as Invoice</a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check form-check-md">
                                            <input class="form-check-input" type="checkbox">
                                        </div>
                                    </td>
                                    <td>
                                        <a href="{{url('invoice-details')}}" class="link-default">INV00022</a>
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
                                    <td>17 Jan 2025</td>
                                    <td class="text-dark">$75,900</td>
                                    <td>$50,000</td>
                                    <td>
                                        <span class="badge badge-soft-info d-inline-flex align-items-center">Partially Paid
                                            <i class="isax isax-timer ms-1"></i>
                                        </span>
                                    </td>
                                    <td class="text-dark">Check</td>
                                    <td>30 Jan 2025</td>
                                    <td class="action-item">
                                        <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                            <i class="isax isax-more"></i>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="{{url('edit-invoice')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-edit me-2"></i>Edit</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-send-2 me-2"></i>Resend</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-document-download me-2"></i>Download Invoices as PDF</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-convert me-2"></i>Convert to Sales Return</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-copy me-2"></i>Clone as Invoice</a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check form-check-md">
                                            <input class="form-check-input" type="checkbox">
                                        </div>
                                    </td>
                                    <td>
                                        <a href="{{url('invoice-details')}}" class="link-default">INV00021</a>
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
                                    <td>04 Jan 2025</td>
                                    <td class="text-dark">$99,999</td>
                                    <td>$80,000</td>
                                    <td>
                                        <span class="badge badge-soft-danger d-inline-flex align-items-center">Overdue
                                            <i class="isax isax-danger ms-1"></i>
                                        </span>
                                    </td>
                                    <td class="text-dark">Check</td>
                                    <td>17 Jan 2025</td>
                                    <td class="action-item">
                                        <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                            <i class="isax isax-more"></i>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="{{url('edit-invoice')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-edit me-2"></i>Edit</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-send-2 me-2"></i>Resend</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-document-download me-2"></i>Download Invoices as PDF</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-convert me-2"></i>Convert to Sales Return</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-copy me-2"></i>Clone as Invoice</a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check form-check-md">
                                            <input class="form-check-input" type="checkbox">
                                        </div>
                                    </td>
                                    <td>
                                        <a href="{{url('invoice-details')}}" class="link-default">INV00020</a>
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
                                    <td>09 Dec 2024</td>
                                    <td class="text-dark">$1,20,500</td>
                                    <td>$60,000</td>
                                    <td>
                                        <span class="badge badge-soft-success d-inline-flex align-items-center">Paid
                                            <i class="isax isax-tick-circle ms-1"></i>
                                        </span>
                                    </td>
                                    <td class="text-dark">Cash</td>
                                    <td>22 Dec 2024</td>
                                    <td class="action-item">
                                        <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                            <i class="isax isax-more"></i>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="{{url('edit-invoice')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-edit me-2"></i>Edit</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-send-2 me-2"></i>Resend</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-document-download me-2"></i>Download Invoices as PDF</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-convert me-2"></i>Convert to Sales Return</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-copy me-2"></i>Clone as Invoice</a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check form-check-md">
                                            <input class="form-check-input" type="checkbox">
                                        </div>
                                    </td>
                                    <td>
                                        <a href="{{url('invoice-details')}}" class="link-default">INV00019</a>
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
                                    <td>02 Dec 2024</td>
                                    <td class="text-dark">$2,50,000</td>
                                    <td>$1,25,000</td>
                                    <td>
                                        <span class="badge badge-soft-warning d-inline-flex align-items-center">Unpaid
                                            <i class="isax isax-slash ms-1"></i>
                                        </span>
                                    </td>
                                    <td class="text-dark">Cash</td>
                                    <td>15 Dec 2024</td>
                                    <td class="action-item">
                                        <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                            <i class="isax isax-more"></i>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="{{url('edit-invoice')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-edit me-2"></i>Edit</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-send-2 me-2"></i>Resend</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-document-download me-2"></i>Download Invoices as PDF</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-convert me-2"></i>Convert to Sales Return</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-copy me-2"></i>Clone as Invoice</a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check form-check-md">
                                            <input class="form-check-input" type="checkbox">
                                        </div>
                                    </td>
                                    <td>
                                        <a href="{{url('invoice-details')}}" class="link-default">INV00018</a>
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
                                    <td>15 Nov 2024</td>
                                    <td class="text-dark">$5,00,750</td>
                                    <td>$5,00,000</td>
                                    <td>
                                        <span class="badge badge-soft-info d-inline-flex align-items-center">Draft
                                            <i class="isax isax-note ms-1"></i>
                                        </span>
                                    </td>
                                    <td class="text-dark">Check</td>
                                    <td>28 Nov 2024</td>
                                    <td class="action-item">
                                        <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                            <i class="isax isax-more"></i>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="{{url('edit-invoice')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-edit me-2"></i>Edit</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-send-2 me-2"></i>Resend</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-document-download me-2"></i>Download Invoices as PDF</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-convert me-2"></i>Convert to Sales Return</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-copy me-2"></i>Clone as Invoice</a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check form-check-md">
                                            <input class="form-check-input" type="checkbox">
                                        </div>
                                    </td>
                                    <td>
                                        <a href="{{url('invoice-details')}}" class="link-default">INV00017</a>
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
                                    <td>30 Nov 2024</td>
                                    <td class="text-dark">$7,50,300</td>
                                    <td>$2,50,500</td>
                                    <td>
                                        <span class="badge badge-soft-info d-inline-flex align-items-center">Partially Paid
                                            <i class="isax isax-timer ms-1"></i>
                                        </span>
                                    </td>
                                    <td class="text-dark">Check</td>
                                    <td>12 Nov 2024</td>
                                    <td class="action-item">
                                        <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                            <i class="isax isax-more"></i>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="{{url('edit-invoice')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-edit me-2"></i>Edit</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-send-2 me-2"></i>Resend</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-document-download me-2"></i>Download Invoices as PDF</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-convert me-2"></i>Convert to Sales Return</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-copy me-2"></i>Clone as Invoice</a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check form-check-md">
                                            <input class="form-check-input" type="checkbox">
                                        </div>
                                    </td>
                                    <td>
                                        <a href="{{url('invoice-details')}}" class="link-default">INV00016</a>
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
                                    <td>12 Oct 2024</td>
                                    <td class="text-dark">$9,99,999</td>
                                    <td>$4,00,000</td>
                                    <td>
                                        <span class="badge badge-soft-danger d-inline-flex align-items-center">Overdue
                                            <i class="isax isax-danger ms-1"></i>
                                        </span>
                                    </td>
                                    <td class="text-dark">Cash</td>
                                    <td>25 Oct 2024</td>
                                    <td class="action-item">
                                        <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                            <i class="isax isax-more"></i>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="{{url('edit-invoice')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-edit me-2"></i>Edit</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-send-2 me-2"></i>Resend</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-document-download me-2"></i>Download Invoices as PDF</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-convert me-2"></i>Convert to Sales Return</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-copy me-2"></i>Clone as Invoice</a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check form-check-md">
                                            <input class="form-check-input" type="checkbox">
                                        </div>
                                    </td>
                                    <td>
                                        <a href="{{url('invoice-details')}}" class="link-default">INV00015</a>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <a href="{{url('customer-details')}}" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
                                                <img src="{{URL::asset('build/img/profiles/avatar-08.jpg')}}" class="rounded-circle" alt="img">
                                            </a>
                                            <div>
                                                <h6 class="fs-14 fw-medium mb-0"><a href="{{url('customer-details')}}">Charlotte Brown</a></h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>05 Oct 2024</td>
                                    <td class="text-dark">$87,650</td>
                                    <td>$40,000</td>
                                    <td>
                                        <span class="badge badge-soft-success d-inline-flex align-items-center">Paid
                                            <i class="isax isax-tick-circle ms-1"></i>
                                        </span>
                                    </td>
                                    <td class="text-dark">Check</td>
                                    <td>18 Oct 2024</td>
                                    <td class="action-item">
                                        <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                            <i class="isax isax-more"></i>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="{{url('edit-invoice')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-edit me-2"></i>Edit</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-send-2 me-2"></i>Resend</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-document-download me-2"></i>Download Invoices as PDF</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-convert me-2"></i>Convert to Sales Return</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-copy me-2"></i>Clone as Invoice</a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check form-check-md">
                                            <input class="form-check-input" type="checkbox">
                                        </div>
                                    </td>
                                    <td>
                                        <a href="{{url('invoice-details')}}" class="link-default">INV00014</a>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <a href="{{url('customer-details')}}" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
                                                <img src="{{URL::asset('build/img/profiles/avatar-10.jpg')}}" class="rounded-circle" alt="img">
                                            </a>
                                            <div>
                                                <h6 class="fs-14 fw-medium mb-0"><a href="{{url('customer-details')}}">William Parker</a></h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>05 Oct 2024</td>
                                    <td class="text-dark">$87,650</td>
                                    <td>$40,000</td>
                                    <td>
                                        <span class="badge badge-soft-warning d-inline-flex align-items-center">Unpaid
                                            <i class="isax isax-slash ms-1"></i>
                                        </span>
                                    </td>
                                    <td class="text-dark">Cash</td>
                                    <td>18 Oct 2024</td>
                                    <td class="action-item">
                                        <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                            <i class="isax isax-more"></i>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="{{url('edit-invoice')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-edit me-2"></i>Edit</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-send-2 me-2"></i>Resend</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-document-download me-2"></i>Download Invoices as PDF</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-convert me-2"></i>Convert to Sales Return</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-copy me-2"></i>Clone as Invoice</a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check form-check-md">
                                            <input class="form-check-input" type="checkbox">
                                        </div>
                                    </td>
                                    <td>
                                        <a href="{{url('invoice-details')}}" class="link-default">INV00013</a>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <a href="{{url('customer-details')}}" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
                                                <img src="{{URL::asset('build/img/profiles/avatar-18.jpg')}}" class="rounded-circle" alt="img">
                                            </a>
                                            <div>
                                                <h6 class="fs-14 fw-medium mb-0"><a href="{{url('customer-details')}}">Mia Thompson</a></h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>02 Sep 2024</td>
                                    <td class="text-dark">$33,210</td>
                                    <td>$15,000</td>
                                    <td>
                                        <span class="badge badge-soft-danger d-inline-flex align-items-center">Cancelled
                                            <i class="isax isax-close-circle ms-1"></i>
                                        </span>
                                    </td>
                                    <td class="text-dark">Check</td>
                                    <td>15 Sep 2024</td>
                                    <td class="action-item">
                                        <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                            <i class="isax isax-more"></i>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="{{url('edit-invoice')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-edit me-2"></i>Edit</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-send-2 me-2"></i>Resend</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-document-download me-2"></i>Download Invoices as PDF</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-convert me-2"></i>Convert to Sales Return</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-copy me-2"></i>Clone as Invoice</a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check form-check-md">
                                            <input class="form-check-input" type="checkbox">
                                        </div>
                                    </td>
                                    <td>
                                        <a href="{{url('invoice-details')}}" class="link-default">INV00012</a>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <a href="{{url('customer-details')}}" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
                                                <img src="{{URL::asset('build/img/profiles/avatar-26.jpg')}}" class="rounded-circle" alt="img">
                                            </a>
                                            <div>
                                                <h6 class="fs-14 fw-medium mb-0"><a href="{{url('customer-details')}}">Amelia Robinson</a></h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>07 Aug 2024</td>
                                    <td class="text-dark">$2,10,000</td>
                                    <td>$1,50,000</td>
                                    <td>
                                        <span class="badge badge-soft-info d-inline-flex align-items-center">Partially Paid
                                            <i class="isax isax-timer ms-1"></i>
                                        </span>
                                    </td>
                                    <td class="text-dark">Check</td>
                                    <td>20 Aug 2024</td>
                                    <td class="action-item">
                                        <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                            <i class="isax isax-more"></i>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="{{url('edit-invoice')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-edit me-2"></i>Edit</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-send-2 me-2"></i>Resend</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-document-download me-2"></i>Download Invoices as PDF</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-convert me-2"></i>Convert to Sales Return</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-copy me-2"></i>Clone as Invoice</a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane" id="tab2">
                    <div class="table-responsive">
                        <table class="table table-nowrap datatable">
                            <thead class="thead-light">
                                <tr>
                                    <th class="no-sort">
                                        <div class="form-check form-check-md">
                                            <input class="form-check-input" type="checkbox" id="select-all2">
                                        </div>
                                    </th>
                                    <th class="no-sort">ID</th>
                                    <th>Customer</th>
                                    <th>Created On</th>
                                    <th>Amount</th>
                                    <th>Paid</th>
                                    <th class="no-sort">Status</th>
                                    <th class="no-sort">Payment Mode</th>
                                    <th>Due Date</th>
                                    <th class="no-sort"></th>
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
                                        <a href="{{url('invoice-details')}}" class="link-default">INV00025</a>
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
                                    <td>22 Feb 2025</td>
                                    <td class="text-dark">$10,000</td>
                                    <td>$5,000</td>
                                    <td>
                                        <span class="badge badge-soft-success d-inline-flex align-items-center">Paid <i class="isax isax-tick-circle ms-1"></i></span>
                                    </td>
                                    <td class="text-dark">Cash</td>
                                    <td>04 Mar 2025</td>
                                    <td class="action-item">
                                        <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                            <i class="isax isax-more"></i>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="{{url('edit-invoice')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-edit me-2"></i>Edit</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-send-2 me-2"></i>Resend</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-document-download me-2"></i>Download Invoices as PDF</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-convert me-2"></i>Convert to Sales Return</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-copy me-2"></i>Clone as Invoice</a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check form-check-md">
                                            <input class="form-check-input" type="checkbox">
                                        </div>
                                    </td>
                                    <td>
                                        <a href="{{url('invoice-details')}}" class="link-default">INV00020</a>
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
                                    <td>09 Dec 2024</td>
                                    <td class="text-dark">$1,20,500</td>
                                    <td>$60,000</td>
                                    <td>
                                        <span class="badge badge-soft-success d-inline-flex align-items-center">Paid
                                            <i class="isax isax-tick-circle ms-1"></i>
                                        </span>
                                    </td>
                                    <td class="text-dark">Cash</td>
                                    <td>22 Dec 2024</td>
                                    <td class="action-item">
                                        <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                            <i class="isax isax-more"></i>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="{{url('edit-invoice')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-edit me-2"></i>Edit</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-send-2 me-2"></i>Resend</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-document-download me-2"></i>Download Invoices as PDF</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-convert me-2"></i>Convert to Sales Return</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-copy me-2"></i>Clone as Invoice</a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check form-check-md">
                                            <input class="form-check-input" type="checkbox">
                                        </div>
                                    </td>
                                    <td>
                                        <a href="{{url('invoice-details')}}" class="link-default">INV00015</a>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <a href="{{url('customer-details')}}" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
                                                <img src="{{URL::asset('build/img/profiles/avatar-08.jpg')}}" class="rounded-circle" alt="img">
                                            </a>
                                            <div>
                                                <h6 class="fs-14 fw-medium mb-0"><a href="{{url('customer-details')}}">Charlotte Brown</a></h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>05 Oct 2024</td>
                                    <td class="text-dark">$87,650</td>
                                    <td>$40,000</td>
                                    <td>
                                        <span class="badge badge-soft-success d-inline-flex align-items-center">Paid
                                            <i class="isax isax-tick-circle ms-1"></i>
                                        </span>
                                    </td>
                                    <td class="text-dark">Check</td>
                                    <td>18 Oct 2024</td>
                                    <td class="action-item">
                                        <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                            <i class="isax isax-more"></i>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="{{url('edit-invoice')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-edit me-2"></i>Edit</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-send-2 me-2"></i>Resend</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-document-download me-2"></i>Download Invoices as PDF</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-convert me-2"></i>Convert to Sales Return</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-copy me-2"></i>Clone as Invoice</a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane" id="tab3">
                    <div class="table-responsive">
                        <table class="table table-nowrap datatable">
                            <thead class="thead-light">
                                <tr>
                                    <th class="no-sort">
                                        <div class="form-check form-check-md">
                                            <input class="form-check-input" type="checkbox" id="select-all3">
                                        </div>
                                    </th>
                                    <th class="no-sort">ID</th>
                                    <th>Customer</th>
                                    <th>Created On</th>
                                    <th>Amount</th>
                                    <th>Paid</th>
                                    <th class="no-sort">Status</th>
                                    <th class="no-sort">Payment Mode</th>
                                    <th>Due Date</th>
                                    <th class="no-sort"></th>
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
                                        <a href="{{url('invoice-details')}}" class="link-default">INV00021</a>
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
                                    <td>04 Jan 2025</td>
                                    <td class="text-dark">$99,999</td>
                                    <td>$80,000</td>
                                    <td>
                                        <span class="badge badge-soft-danger d-inline-flex align-items-center">Overdue
                                            <i class="isax isax-danger ms-1"></i>
                                        </span>
                                    </td>
                                    <td class="text-dark">Check</td>
                                    <td>17 Jan 2025</td>
                                    <td class="action-item">
                                        <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                            <i class="isax isax-more"></i>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="{{url('edit-invoice')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-edit me-2"></i>Edit</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-send-2 me-2"></i>Resend</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-document-download me-2"></i>Download Invoices as PDF</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-convert me-2"></i>Convert to Sales Return</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-copy me-2"></i>Clone as Invoice</a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check form-check-md">
                                            <input class="form-check-input" type="checkbox">
                                        </div>
                                    </td>
                                    <td>
                                        <a href="{{url('invoice-details')}}" class="link-default">INV00016</a>
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
                                    <td>12 Oct 2024</td>
                                    <td class="text-dark">$9,99,999</td>
                                    <td>$4,00,000</td>
                                    <td>
                                        <span class="badge badge-soft-danger d-inline-flex align-items-center">Overdue
                                            <i class="isax isax-danger ms-1"></i>
                                        </span>
                                    </td>
                                    <td class="text-dark">Cash</td>
                                    <td>25 Oct 2024</td>
                                    <td class="action-item">
                                        <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                            <i class="isax isax-more"></i>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="{{url('edit-invoice')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-edit me-2"></i>Edit</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-send-2 me-2"></i>Resend</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-document-download me-2"></i>Download Invoices as PDF</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-convert me-2"></i>Convert to Sales Return</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-copy me-2"></i>Clone as Invoice</a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane" id="tab4">
                    <div class="table-responsive">
                        <table class="table table-nowrap datatable">
                            <thead class="thead-light">
                                <tr>
                                    <th class="no-sort">
                                        <div class="form-check form-check-md">
                                            <input class="form-check-input" type="checkbox" id="select-all4">
                                        </div>
                                    </th>
                                    <th class="no-sort">ID</th>
                                    <th>Customer</th>
                                    <th>Created On</th>
                                    <th>Amount</th>
                                    <th>Paid</th>
                                    <th class="no-sort">Status</th>
                                    <th class="no-sort">Payment Mode</th>
                                    <th>Due Date</th>
                                    <th class="no-sort"></th>
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
                                        <a href="{{url('invoice-details')}}" class="link-default">INV00016</a>
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
                                    <td>12 Oct 2024</td>
                                    <td class="text-dark">$9,99,999</td>
                                    <td>$4,00,000</td>
                                    <td>
                                        <span class="badge badge-soft-info d-inline-flex align-items-center">Upcoming
                                            <i class="isax isax-arrow-square-up ms-1"></i>
                                        </span>
                                    </td>
                                    <td class="text-dark">Cash</td>
                                    <td>25 Oct 2024</td>
                                    <td class="action-item">
                                        <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                            <i class="isax isax-more"></i>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="{{url('edit-invoice')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-edit me-2"></i>Edit</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-send-2 me-2"></i>Resend</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-document-download me-2"></i>Download Invoices as PDF</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-convert me-2"></i>Convert to Sales Return</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-copy me-2"></i>Clone as Invoice</a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane" id="tab5">
                    <div class="table-responsive">
                        <table class="table table-nowrap datatable">
                            <thead class="thead-light">
                                <tr>
                                    <th class="no-sort">
                                        <div class="form-check form-check-md">
                                            <input class="form-check-input" type="checkbox" id="select-all5">
                                        </div>
                                    </th>
                                    <th class="no-sort">ID</th>
                                    <th>Customer</th>
                                    <th>Created On</th>
                                    <th>Amount</th>
                                    <th>Paid</th>
                                    <th class="no-sort">Status</th>
                                    <th class="no-sort">Payment Mode</th>
                                    <th>Due Date</th>
                                    <th class="no-sort"></th>
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
                                        <a href="{{url('invoice-details')}}" class="link-default">INV00023</a>
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
                                    <td>30 Jan 2025</td>
                                    <td class="text-dark">$50,125</td>
                                    <td>$20,000</td>
                                    <td>
                                        <span class="badge badge-soft-danger d-inline-flex align-items-center">Cancelled<i class="isax isax-close-circle ms-1"></i></span>
                                    </td>
                                    <td class="text-dark">Cash</td>
                                    <td>13 Feb 2025</td>
                                    <td class="action-item">
                                        <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                            <i class="isax isax-more"></i>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="{{url('edit-invoice')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-edit me-2"></i>Edit</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-send-2 me-2"></i>Resend</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-document-download me-2"></i>Download Invoices as PDF</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-convert me-2"></i>Convert to Sales Return</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-copy me-2"></i>Clone as Invoice</a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check form-check-md">
                                            <input class="form-check-input" type="checkbox">
                                        </div>
                                    </td>
                                    <td>
                                        <a href="{{url('invoice-details')}}" class="link-default">INV00018</a>
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
                                    <td>15 Nov 2024</td>
                                    <td class="text-dark">$5,00,750</td>
                                    <td>$5,00,000</td>
                                    <td>
                                        <span class="badge badge-soft-danger d-inline-flex align-items-center">Cancelled
                                            <i class="isax isax-close-circle ms-1"></i>
                                        </span>
                                    </td>
                                    <td class="text-dark">Check</td>
                                    <td>28 Nov 2024</td>
                                    <td class="action-item">
                                        <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                            <i class="isax isax-more"></i>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="{{url('edit-invoice')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-edit me-2"></i>Edit</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-send-2 me-2"></i>Resend</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-document-download me-2"></i>Download Invoices as PDF</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-convert me-2"></i>Convert to Sales Return</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-copy me-2"></i>Clone as Invoice</a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check form-check-md">
                                            <input class="form-check-input" type="checkbox">
                                        </div>
                                    </td>
                                    <td>
                                        <a href="{{url('invoice-details')}}" class="link-default">INV00013</a>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <a href="{{url('customer-details')}}" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
                                                <img src="{{URL::asset('build/img/profiles/avatar-18.jpg')}}" class="rounded-circle" alt="img">
                                            </a>
                                            <div>
                                                <h6 class="fs-14 fw-medium mb-0"><a href="{{url('customer-details')}}">Mia Thompson</a></h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>02 Sep 2024</td>
                                    <td class="text-dark">$33,210</td>
                                    <td>$15,000</td>
                                    <td>
                                        <span class="badge badge-soft-danger d-inline-flex align-items-center">Cancelled
                                            <i class="isax isax-close-circle ms-1"></i>
                                        </span>
                                    </td>
                                    <td class="text-dark">Check</td>
                                    <td>15 Sep 2024</td>
                                    <td class="action-item">
                                        <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                            <i class="isax isax-more"></i>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="{{url('edit-invoice')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-edit me-2"></i>Edit</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-send-2 me-2"></i>Resend</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-document-download me-2"></i>Download Invoices as PDF</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-convert me-2"></i>Convert to Sales Return</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-copy me-2"></i>Clone as Invoice</a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane" id="tab6">
                    <div class="table-responsive">
                        <table class="table table-nowrap datatable">
                            <thead class="thead-light">
                                <tr>
                                    <th class="no-sort">
                                        <div class="form-check form-check-md">
                                            <input class="form-check-input" type="checkbox" id="select-all6">
                                        </div>
                                    </th>
                                    <th class="no-sort">ID</th>
                                    <th>Customer</th>
                                    <th>Created On</th>
                                    <th>Amount</th>
                                    <th>Paid</th>
                                    <th class="no-sort">Status</th>
                                    <th class="no-sort">Payment Mode</th>
                                    <th>Due Date</th>
                                    <th class="no-sort"></th>
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
                                        <a href="{{url('invoice-details')}}" class="link-default">INV00022</a>
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
                                    <td>17 Jan 2025</td>
                                    <td class="text-dark">$75,900</td>
                                    <td>$50,000</td>
                                    <td>
                                        <span class="badge badge-soft-info d-inline-flex align-items-center">Partially Paid
                                            <i class="isax isax-timer ms-1"></i>
                                        </span>
                                    </td>
                                    <td class="text-dark">Check</td>
                                    <td>30 Jan 2025</td>
                                    <td class="action-item">
                                        <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                            <i class="isax isax-more"></i>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="{{url('edit-invoice')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-edit me-2"></i>Edit</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-send-2 me-2"></i>Resend</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-document-download me-2"></i>Download Invoices as PDF</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-convert me-2"></i>Convert to Sales Return</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-copy me-2"></i>Clone as Invoice</a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check form-check-md">
                                            <input class="form-check-input" type="checkbox">
                                        </div>
                                    </td>
                                    <td>
                                        <a href="{{url('invoice-details')}}" class="link-default">INV00017</a>
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
                                    <td>30 Nov 2024</td>
                                    <td class="text-dark">$7,50,300</td>
                                    <td>$2,50,500</td>
                                    <td>
                                        <span class="badge badge-soft-info d-inline-flex align-items-center">Partially Paid
                                            <i class="isax isax-timer ms-1"></i>
                                        </span>
                                    </td>
                                    <td class="text-dark">Check</td>
                                    <td>12 Nov 2024</td>
                                    <td class="action-item">
                                        <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                            <i class="isax isax-more"></i>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="{{url('edit-invoice')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-edit me-2"></i>Edit</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-send-2 me-2"></i>Resend</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-document-download me-2"></i>Download Invoices as PDF</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-convert me-2"></i>Convert to Sales Return</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-copy me-2"></i>Clone as Invoice</a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check form-check-md">
                                            <input class="form-check-input" type="checkbox">
                                        </div>
                                    </td>
                                    <td>
                                        <a href="{{url('invoice-details')}}" class="link-default">INV00012</a>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <a href="{{url('customer-details')}}" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
                                                <img src="{{URL::asset('build/img/profiles/avatar-26.jpg')}}" class="rounded-circle" alt="img">
                                            </a>
                                            <div>
                                                <h6 class="fs-14 fw-medium mb-0"><a href="{{url('customer-details')}}">Amelia Robinson</a></h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>07 Aug 2024</td>
                                    <td class="text-dark">$2,10,000</td>
                                    <td>$1,50,000</td>
                                    <td>
                                        <span class="badge badge-soft-info d-inline-flex align-items-center">Partially Paid
                                            <i class="isax isax-timer ms-1"></i>
                                        </span>
                                    </td>
                                    <td class="text-dark">Check</td>
                                    <td>20 Aug 2024</td>
                                    <td class="action-item">
                                        <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                            <i class="isax isax-more"></i>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="{{url('edit-invoice')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-edit me-2"></i>Edit</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-send-2 me-2"></i>Resend</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-document-download me-2"></i>Download Invoices as PDF</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-convert me-2"></i>Convert to Sales Return</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-copy me-2"></i>Clone as Invoice</a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane" id="tab7">
                    <div class="table-responsive">
                        <table class="table table-nowrap datatable">
                            <thead class="thead-light">
                                <tr>
                                    <th class="no-sort">
                                        <div class="form-check form-check-md">
                                            <input class="form-check-input" type="checkbox" id="select-all7">
                                        </div>
                                    </th>
                                    <th class="no-sort">ID</th>
                                    <th>Customer</th>
                                    <th>Created On</th>
                                    <th>Amount</th>
                                    <th>Paid</th>
                                    <th class="no-sort">Status</th>
                                    <th class="no-sort">Payment Mode</th>
                                    <th>Due Date</th>
                                    <th class="no-sort"></th>
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
                                        <a href="{{url('invoice-details')}}" class="link-default">INV00024</a>
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
                                    <td>07 Feb 2025</td>
                                    <td class="text-dark">$25,750</td>
                                    <td>$10,750</td>
                                    <td>
                                        <span class="badge badge-soft-warning d-inline-flex align-items-center">Unpaid<i class="isax isax-slash ms-1"></i></span>
                                    </td>
                                    <td class="text-dark">Check</td>
                                    <td>20 Feb 2025</td>
                                    <td class="action-item">
                                        <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                            <i class="isax isax-more"></i>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="{{url('edit-invoice')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-edit me-2"></i>Edit</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-send-2 me-2"></i>Resend</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-document-download me-2"></i>Download Invoices as PDF</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-convert me-2"></i>Convert to Sales Return</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-copy me-2"></i>Clone as Invoice</a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check form-check-md">
                                            <input class="form-check-input" type="checkbox">
                                        </div>
                                    </td>
                                    <td>
                                        <a href="{{url('invoice-details')}}" class="link-default">INV00019</a>
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
                                    <td>02 Dec 2024</td>
                                    <td class="text-dark">$2,50,000</td>
                                    <td>$1,25,000</td>
                                    <td>
                                        <span class="badge badge-soft-warning d-inline-flex align-items-center">Unpaid
                                            <i class="isax isax-slash ms-1"></i>
                                        </span>
                                    </td>
                                    <td class="text-dark">Cash</td>
                                    <td>15 Dec 2024</td>
                                    <td class="action-item">
                                        <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                            <i class="isax isax-more"></i>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="{{url('edit-invoice')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-edit me-2"></i>Edit</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-send-2 me-2"></i>Resend</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-document-download me-2"></i>Download Invoices as PDF</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-convert me-2"></i>Convert to Sales Return</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-copy me-2"></i>Clone as Invoice</a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check form-check-md">
                                            <input class="form-check-input" type="checkbox">
                                        </div>
                                    </td>
                                    <td>
                                        <a href="{{url('invoice-details')}}" class="link-default">INV00014</a>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <a href="{{url('customer-details')}}" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
                                                <img src="{{URL::asset('build/img/profiles/avatar-10.jpg')}}" class="rounded-circle" alt="img">
                                            </a>
                                            <div>
                                                <h6 class="fs-14 fw-medium mb-0"><a href="{{url('customer-details')}}">William Parker</a></h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>05 Oct 2024</td>
                                    <td class="text-dark">$87,650</td>
                                    <td>$40,000</td>
                                    <td>
                                        <span class="badge badge-soft-warning d-inline-flex align-items-center">Unpaid
                                            <i class="isax isax-slash ms-1"></i>
                                        </span>
                                    </td>
                                    <td class="text-dark">Cash</td>
                                    <td>18 Oct 2024</td>
                                    <td class="action-item">
                                        <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                            <i class="isax isax-more"></i>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="{{url('edit-invoice')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-edit me-2"></i>Edit</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-send-2 me-2"></i>Resend</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-document-download me-2"></i>Download Invoices as PDF</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-convert me-2"></i>Convert to Sales Return</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-copy me-2"></i>Clone as Invoice</a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane" id="tab8">
                    <div class="table-responsive">
                        <table class="table table-nowrap datatable">
                            <thead class="thead-light">
                                <tr>
                                    <th class="no-sort">
                                        <div class="form-check form-check-md">
                                            <input class="form-check-input" type="checkbox" id="select-all8">
                                        </div>
                                    </th>
                                    <th class="no-sort">ID</th>
                                    <th>Customer</th>
                                    <th>Created On</th>
                                    <th>Amount</th>
                                    <th>Paid</th>
                                    <th class="no-sort">Status</th>
                                    <th class="no-sort">Payment Mode</th>
                                    <th>Due Date</th>
                                    <th class="no-sort"></th>
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
                                        <a href="{{url('invoice-details')}}" class="link-default">INV00024</a>
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
                                    <td>07 Feb 2025</td>
                                    <td class="text-dark">$25,750</td>
                                    <td>$10,750</td>
                                    <td>
                                        <span class="badge badge-soft-success d-inline-flex align-items-center">Refunded<i class="isax isax-money-3 ms-1"></i></span>
                                    </td>
                                    <td class="text-dark">Check</td>
                                    <td>20 Feb 2025</td>
                                    <td class="action-item">
                                        <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                            <i class="isax isax-more"></i>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="{{url('edit-invoice')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-edit me-2"></i>Edit</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-send-2 me-2"></i>Resend</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-document-download me-2"></i>Download Invoices as PDF</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-convert me-2"></i>Convert to Sales Return</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-copy me-2"></i>Clone as Invoice</a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane" id="tab9">
                    <div class="table-responsive">
                        <table class="table table-nowrap datatable">
                            <thead class="thead-light">
                                <tr>
                                    <th class="no-sort">
                                        <div class="form-check form-check-md">
                                            <input class="form-check-input" type="checkbox" id="select-all9">
                                        </div>
                                    </th>
                                    <th class="no-sort">ID</th>
                                    <th>Customer</th>
                                    <th>Created On</th>
                                    <th>Amount</th>
                                    <th>Paid</th>
                                    <th class="no-sort">Status</th>
                                    <th class="no-sort">Payment Mode</th>
                                    <th>Due Date</th>
                                    <th class="no-sort"></th>
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
                                        <a href="{{url('invoice-details')}}" class="link-default">INV00018</a>
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
                                    <td>15 Nov 2024</td>
                                    <td class="text-dark">$5,00,750</td>
                                    <td>$5,00,000</td>
                                    <td>
                                        <span class="badge badge-soft-info d-inline-flex align-items-center">Draft
                                            <i class="isax isax-note ms-1"></i>
                                        </span>
                                    </td>
                                    <td class="text-dark">Check</td>
                                    <td>28 Nov 2024</td>
                                    <td class="action-item">
                                        <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                            <i class="isax isax-more"></i>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="{{url('edit-invoice')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-edit me-2"></i>Edit</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-send-2 me-2"></i>Resend</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-document-download me-2"></i>Download Invoices as PDF</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-convert me-2"></i>Convert to Sales Return</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-copy me-2"></i>Clone as Invoice</a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /Table List End -->

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
                    <label class="form-label">Customers</label>
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
                                        <input class="form-check-input select-all m-0 me-2" type="checkbox"> Select All
                                    </label>
                                    <a href="javascript:void(0);" class="link-danger fw-medium text-decoration-underline">Reset</a>
                                </li>
                                <li>
                                    <label class="dropdown-item px-2 d-flex align-items-center text-dark">
                                        <input class="form-check-input m-0 me-2" type="checkbox">
                                        <span class="avatar avatar-sm rounded-circle me-2"><img src="{{URL::asset('build/img/profiles/avatar-28.jpg')}}" class="flex-shrink-0 rounded-circle" alt="img"></span>Emily Clark
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
                                        <span class="avatar avatar-sm rounded-circle me-2"><img src="{{URL::asset('build/img/profiles/avatar-06.jpg')}}" class="flex-shrink-0 rounded-circle" alt="img"></span>Sophia White
                                    </label>
                                </li>
                            </ul>
                            <div class="row g-2">
                                <div class="col-6">
                                    <a href="javascript:void(0);" class="btn btn-outline-white w-100 close-filter">Cancel</a>
                                </div>
                                <div class="col-6">
                                    <a href="javascript:void(0);" class="btn btn-primary w-100">Select</a>
                                </div>
                            </div>
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
                    <label class="form-label">Amount</label>
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
                                <li>
                                    <label class="dropdown-item px-2 d-flex align-items-center text-dark">
                                        <input class="form-check-input m-0 me-2" type="checkbox"> $10,000
                                    </label>
                                </li>
                                <li>
                                    <label class="dropdown-item px-2 d-flex align-items-center text-dark">
                                        <input class="form-check-input m-0 me-2" type="checkbox"> $25,750
                                    </label>
                                </li>
                                <li>
                                    <label class="dropdown-item px-2 d-flex align-items-center text-dark">
                                        <input class="form-check-input m-0 me-2" type="checkbox"> $50,125
                                    </label>
                                </li>
                                <li>
                                    <label class="dropdown-item px-2 d-flex align-items-center text-dark">
                                        <input class="form-check-input m-0 me-2" type="checkbox"> $75,900
                                    </label>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <div class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle btn btn-lg bg-light  d-flex align-items-center justify-content-start fs-13 fw-normal border" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="true">
                            Select
                        </a>
                        <div class="dropdown-menu shadow-lg w-100 dropdown-info">
                            <ul class="mb-3">
                                <li>
                                    <label class="dropdown-item px-2 d-flex align-items-center text-dark">
                                        <input class="form-check-input m-0 me-2" type="checkbox">
                                        <i class="fa-solid fa-circle fs-6 text-success me-1"></i>Paid
                                    </label>
                                </li>
                                <li>
                                    <label class="dropdown-item px-2 d-flex align-items-center text-dark">
                                        <input class="form-check-input m-0 me-2" type="checkbox">
                                        <i class="fa-solid fa-circle fs-6 text-warning me-1"></i>Unpaid
                                    </label>
                                </li>
                                <li>
                                    <label class="dropdown-item px-2 d-flex align-items-center text-dark">
                                        <input class="form-check-input m-0 me-2" type="checkbox">
                                        <i class="fa-solid fa-circle fs-6 text-danger me-1"></i>Cancelled
                                    </label>
                                </li>
                                <li>
                                    <label class="dropdown-item px-2 d-flex align-items-center text-dark">
                                        <input class="form-check-input m-0 me-2" type="checkbox">
                                        <i class="fa-solid fa-circle fs-6 text-purple me-1"></i>Partially Paid
                                    </label>
                                </li>
                                <li>
                                    <label class="dropdown-item px-2 d-flex align-items-center text-dark">
                                        <input class="form-check-input m-0 me-2" type="checkbox">
                                        <i class="fa-solid fa-circle fs-6 text-orange me-1"></i>Uncollectable
                                    </label>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div>
                    <label class="form-label">Payment Mode</label>
                    <div class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle btn btn-lg bg-light  d-flex align-items-center justify-content-start fs-13 fw-normal border" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="true">
                            Select
                        </a>
                        <div class="dropdown-menu shadow-lg w-100 dropdown-info">
                            <ul class="mb-3">
                                <li>
                                    <label class="dropdown-item px-2 d-flex align-items-center text-dark">
                                        <input class="form-check-input m-0 me-2" type="checkbox"> Cash
                                    </label>
                                </li>
                                <li>
                                    <label class="dropdown-item px-2 d-flex align-items-center text-dark">
                                        <input class="form-check-input m-0 me-2" type="checkbox"> Check
                                    </label>
                                </li>
                                <li>
                                    <label class="dropdown-item px-2 d-flex align-items-center text-dark">
                                        <input class="form-check-input m-0 me-2" type="checkbox"> Bank Transfer
                                    </label>
                                </li>
                                <li>
                                    <label class="dropdown-item px-2 d-flex align-items-center text-dark">
                                        <input class="form-check-input m-0 me-2" type="checkbox"> Paypal
                                    </label>
                                </li>
                                <li>
                                    <label class="dropdown-item px-2 d-flex align-items-center text-dark">
                                        <input class="form-check-input m-0 me-2" type="checkbox"> Stripe
                                    </label>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="offcanvas-footer">
                    <div class="row g-2">
                        <div class="col-6">
                            <a href="javascript:void(0);" class="btn btn-outline-white w-100">Reset</a>
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