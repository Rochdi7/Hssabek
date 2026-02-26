<?php $page = 'tickets'; ?>
@extends('layout.mainlayout')
@section('content')
    <!-- ========================
        Start Page Content
    ========================= -->

    <div class="page-wrapper">

        <div class="content content-two">

            <!-- Breadcrumb Start -->
            <div class="d-flex d-block align-items-center justify-content-between flex-wrap gap-3 mb-3">
                <div>
                    <h6>Tickets</h6>
                </div>
                <div class="d-flex my-xl-auto right-content align-items-center flex-wrap gap-2">
                    <div class="d-flex align-items-center">
                        <a href="{{url('tickets-list')}}" class="btn btn-outline-white p-2 d-inline-flex align-items-center justify-content-center me-2"><i class="isax isax-menu-1"></i></a>
                        <a href="{{url('tickets')}}" class="btn btn-primary p-2 d-inline-flex align-items-center justify-content-center me-2"><i class="isax isax-grid-25"></i></a>
                        <a href="{{url('ticket-kanban')}}" class="btn btn-outline-white p-2 d-inline-flex align-items-center justify-content-center me-2"><i class="isax isax-kanban"></i></a>
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
                            <i class="isax isax-add-circle5 me-1"></i>New Ticket
                        </a>
                    </div>
                </div>
            </div>
            <!-- Breadcrumb End -->

            <!-- row start -->
            <div class="row">
                <div class="col-xl-3 col-lg-6 col-md-6">
                    <div class="card position-relative">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-2 pb-2 border-bottom">
                                <div>
                                    <p class="mb-1">Total Tickets</p>
                                    <h6 class="fs-16 fw-semibold">298</h6>
                                </div>
                                <div>
                                    <span class="avatar bg-primary rounded-circle">
                                        <i class="isax isax-receipt-item"></i>
                                    </span>
                                </div>
                            </div>
                            <p class="fs-13 mb-0"><span class="text-success"><i class="isax isax-send text-success me-1"></i>5.62%</span>from last month</p>
                            <span class="position-absolute end-0 bottom-0">
                                <img src="{{URL::asset('build/img/bg/card-overlay-01.svg')}}" alt="">
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6">
                    <div class="card position-relative">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-2 pb-2 border-bottom">
                                <div>
                                    <p class="mb-1">Completed Tickets</p>
                                    <h6 class="fs-16 fw-semibold">185</h6>
                                </div>
                                <div>
                                    <span class="avatar bg-success rounded-circle">
                                        <i class="isax isax-tick-circle"></i>
                                    </span>
                                </div>
                            </div>
                            <p class="fs-13 mb-0"><span class="text-success"><i class="isax isax-send text-success me-1"></i>11.4%</span> from last month</p>
                            <span class="position-absolute end-0 bottom-0">
                                <img src="{{URL::asset('build/img/bg/card-overlay-02.svg')}}" alt="">
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6">
                    <div class="card position-relative">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-2 pb-2 border-bottom">
                                <div>
                                    <p class="mb-1">In Progress Tickets</p>
                                    <h6 class="fs-16 fw-semibold">32</h6>
                                </div>
                                <div>
                                    <span class="avatar bg-warning rounded-circle">
                                        <i class="isax isax-timer"></i>
                                    </span>
                                </div>
                            </div>
                            <p class="fs-13 mb-0"><span class="text-success"><i class="isax isax-send text-success me-1"></i>8.52%</span> from last month</p>
                            <span class="position-absolute end-0 bottom-0">
                                <img src="{{URL::asset('build/img/bg/card-overlay-03.svg')}}" alt="">
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6">
                    <div class="card position-relative">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-2 pb-2 border-bottom">
                                <div>
                                    <p class="mb-1">Closed Tickets</p>
                                    <h6 class="fs-16 fw-semibold">24</h6>
                                </div>
                                <div>
                                    <span class="avatar bg-danger rounded-circle">
                                        <i class="isax isax-information"></i>
                                    </span>
                                </div>
                            </div>
                            <p class="fs-13 mb-0"><span class="text-danger"><i class="isax isax-received text-danger me-1"></i>7.45%</span> from last month</p>
                            <span class="position-absolute end-0 bottom-0">
                                <img src="{{URL::asset('build/img/bg/card-overlay-04.svg')}}" alt="">
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- row end -->

            <ul class="nav nav-tabs nav-bordered mb-3 ticket-list-tab">
                <li class="nav-item"><a class="nav-link active" href="javascript:void(0);" data-bs-toggle="tab" data-bs-target="#tab-1">All</a></li>
                <li class="nav-item"><a class="nav-link" href="javascript:void(0);" data-bs-toggle="tab" data-bs-target="#tab-2">Open</a></li>
                <li class="nav-item"><a class="nav-link" href="javascript:void(0);" data-bs-toggle="tab" data-bs-target="#tab-3">Resolved</a></li>
                <li class="nav-item"><a class="nav-link" href="javascript:void(0);" data-bs-toggle="tab" data-bs-target="#tab-4">Pending</a></li>
                <li class="nav-item"><a class="nav-link" href="javascript:void(0);" data-bs-toggle="tab" data-bs-target="#tab-5">Closed</a></li>
            </ul>

            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="tab-1" role="tabpanel">
                    <div class="d-flex align-items-start overflow-auto project-status">
                        <div class="rounded w-100">
                            <div class="kanban-drag-wrap">
                                <div class="card kanban-card mb-3">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center justify-content-between mb-3 flex-wrap">
                                            <div class="d-flex align-items-center">
                                                <h6 class="fs-14 me-2 fw-semibold">Support For Theme</h6>
                                                <span class="badge badge-soft-success badge-sm d-inline-flex align-items-center"><span class="badge-dot bg-success me-2"></span>Resolved</span>
                                            </div>
                                            <span class="d-flex align-items-center text-gray-9 fs-12"><i class="isax isax-clock me-1"></i>Just Now</span>
                                        </div>
                                        <p>Our support ticket system ensures quick resolution for your queries. Easily submit tickets for technical issues, billing inquiries, or feature requests. Track your ticket status in real-time and receive prompt
                                            assistance from our support team. Stay organized and get the help you need efficiently.</p>
                                        <div class="d-flex align-items-center">
                                            <span class="badge badge-soft-danger badge-sm d-flex align-items-center justify-content-center me-3">Medium</span>
                                            <span class="badge badge-soft-light text-dark badge-sm d-flex align-items-center justify-content-center me-3">#1234</span>
                                            <span class="fs-12 text-gray-9"><i class="isax isax-message-text me-1 text-gray-9"></i>14</span>
                                        </div>
                                    </div>
                                    <!-- card body end -->
                                </div>
                                <!-- card end -->
                                <div class="card kanban-card mb-3">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center justify-content-between mb-3 flex-wrap">
                                            <div class="d-flex align-items-center">
                                                <h6 class="fs-14 me-2 fw-semibold text-capitalize">Verify your email</h6>
                                                <span class="badge badge-soft-warning badge-sm d-inline-flex align-items-center"><span class="badge-dot bg-warning me-2"></span>Pending</span>
                                            </div>
                                            <span class="d-flex align-items-center text-gray-9 fs-12"><i class="isax isax-clock me-1"></i>Just Now</span>
                                        </div>
                                        <p>Please verify your email to activate your account and access all features. Click the verification link sent to your inbox. If you haven’t received it, check your spam folder or request a new link. Secure your
                                            account and start managing your finances effortlessly!</p>
                                        <div class="d-flex align-items-center">
                                            <span class="badge badge-soft-danger badge-sm d-flex align-items-center justify-content-center me-3">High</span>
                                            <span class="badge badge-soft-light text-dark badge-sm d-flex align-items-center justify-content-center me-3">#1234</span>
                                            <span class="fs-12 text-gray-9"><i class="isax isax-message-text me-1 text-gray-9"></i>14</span>
                                        </div>
                                    </div>
                                    <!-- card body end -->
                                </div>
                                <!-- card end -->
                                <div class="card kanban-card mb-3">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center justify-content-between mb-3 flex-wrap">
                                            <div class="d-flex align-items-center">
                                                <h6 class="fs-14 me-2 fw-semibold text-capitalize">Calling for help</h6>
                                                <span class="badge badge-soft-success badge-sm d-inline-flex align-items-center"><span class="badge-dot bg-success me-2"></span>Open</span>
                                            </div>
                                            <span class="d-flex align-items-center text-gray-9 fs-12"><i class="isax isax-clock me-1"></i>Just Now</span>
                                        </div>
                                        <p>If you require immediate support, don't hesitate to call our help center. Our dedicated team is available to assist with technical issues, billing inquiries, and general questions. Contact us for quick and reliable
                                            support to keep your accounting operations running smoothly!</p>
                                        <div class="d-flex align-items-center">
                                            <span class="badge badge-soft-primary badge-sm d-flex align-items-center justify-content-center me-3">low</span>
                                            <span class="badge badge-soft-light text-dark badge-sm d-flex align-items-center justify-content-center me-3">#1234</span>
                                            <span class="fs-12 text-gray-9"><i class="isax isax-message-text me-1 text-gray-9"></i>14</span>
                                        </div>
                                    </div>
                                    <!-- card body end -->
                                </div>
                                <!-- card end -->
                                <div class="card kanban-card mb-0">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center justify-content-between mb-3 flex-wrap gap-2">
                                            <div class="d-flex align-items-center">
                                                <h6 class="fs-14 me-2 fw-semibold text-capitalize">Management</h6>
                                                <span class="badge badge-soft-light text-dark badge-sm d-inline-flex align-items-center"><span class="badge-dot bg-dark me-2"></span>Closed</span>
                                            </div>
                                            <span class="d-flex align-items-center text-gray-9 fs-12"><i class="isax isax-clock me-1"></i>Just Now</span>
                                        </div>
                                        <p>Streamline your business operations with smart financial management tools. Automate invoicing, track expenses, generate reports, and stay tax-compliant with ease. Manage everything from one centralized platform,
                                            ensuring efficiency, accuracy, and growth. Take control of your finances and focus on what truly matters—your business success!</p>
                                        <div class="d-flex align-items-center">
                                            <span class="badge badge-soft-danger badge-sm d-flex align-items-center justify-content-center me-3">Medium</span>
                                            <span class="badge badge-soft-light text-dark badge-sm d-flex align-items-center justify-content-center me-3">#1234</span>
                                            <span class="fs-12 text-gray-9"><i class="isax isax-message-text me-1 text-gray-9"></i>14</span>
                                        </div>
                                    </div>
                                    <!-- card body end -->
                                </div>
                                <!-- card end -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="tab-2" role="tabpanel">
                    <div class="d-flex align-items-start overflow-auto project-status">
                        <div class="p-3 rounded w-100 me-3">
                            <div class="kanban-drag-wrap">
                                <div class="card kanban-card mb-3">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center justify-content-between mb-3 gap-2 flex-wrap">
                                            <div class="d-flex align-items-center">
                                                <h6 class="fs-14 me-2 fw-semibold text-capitalize">Calling for help</h6>
                                                <span class="badge badge-soft-success badge-sm d-inline-flex align-items-center"><span class="badge-dot bg-success me-2"></span>Open</span>
                                            </div>
                                            <span class="d-flex align-items-center text-gray-9 fs-12"><i class="isax isax-clock me-1"></i>Just Now</span>
                                        </div>
                                        <p>If you require immediate support, don't hesitate to call our help center. Our dedicated team is available to assist with technical issues, billing inquiries, and general questions. Contact us for quick and reliable
                                            support to keep your accounting operations running smoothly!</p>
                                        <div class="d-flex align-items-center">
                                            <span class="badge badge-soft-primary badge-sm d-flex align-items-center justify-content-center me-3">low</span>
                                            <span class="badge badge-soft-light text-dark badge-sm d-flex align-items-center justify-content-center me-3">#1234</span>
                                            <span class="fs-12 text-gray-9"><i class="isax isax-message-text me-1 "></i>14</span>
                                        </div>
                                    </div>
                                    <!-- card body end -->
                                </div>
                                <!-- card end -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="tab-3" role="tabpanel">
                    <div class="d-flex align-items-start overflow-auto project-status">
                        <div class="p-3 rounded w-100 me-3">
                            <div class="kanban-drag-wrap">
                                <div class="card kanban-card mb-3">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center justify-content-between mb-3 gap-2 flex-wrap">
                                            <div class="d-flex align-items-center">
                                                <h6 class="fs-14 me-2 fw-semibold text-capitalize">Support For Theme</h6>
                                                <span class="badge badge-soft-success badge-sm d-inline-flex align-items-center"><span class="badge-dot bg-success me-2"></span>Resolved</span>
                                            </div>
                                            <span class="d-flex align-items-center text-gray-9 fs-12"><i class="isax isax-clock me-1"></i>Just Now</span>
                                        </div>
                                        <p>Our support ticket system ensures quick resolution for your queries. Easily submit tickets for technical issues, billing inquiries, or feature requests. Track your ticket status in real-time and receive prompt
                                            assistance from our support team. Stay organized and get the help you need efficiently.</p>
                                        <div class="d-flex align-items-center">
                                            <span class="badge badge-soft-danger badge-sm d-flex align-items-center justify-content-center me-3">Medium</span>
                                            <span class="badge badge-soft-light text-dark badge-sm d-flex align-items-center justify-content-center me-3">#1234</span>
                                            <span class="fs-12 text-gray-9"><i class="isax isax-message-text me-1"></i>14</span>
                                        </div>
                                    </div>
                                    <!-- card body end -->
                                </div>
                                <!-- card end -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="tab-4" role="tabpanel">
                    <div class="d-flex align-items-start overflow-auto project-status">
                        <div class="p-3 rounded w-100 me-3">
                            <div class="kanban-drag-wrap">
                                <div class="card kanban-card mb-3">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center justify-content-between mb-3 gap-2 flex-wrap">
                                            <div class="d-flex align-items-center">
                                                <h6 class="fs-14 me-2 fw-semibold text-capitalize">Verify your email</h6>
                                                <span class="badge badge-soft-warning badge-sm d-inline-flex align-items-center"><span class="badge-dot bg-warning me-2"></span>Pending</span>
                                            </div>
                                            <span class="d-flex align-items-center text-gray-9 fs-12"><i class="isax isax-clock me-1"></i>Just Now</span>
                                        </div>
                                        <p>Please verify your email to activate your account and access all features. Click the verification link sent to your inbox. If you haven’t received it, check your spam folder or request a new link. Secure your
                                            account and start managing your finances effortlessly!</p>
                                        <div class="d-flex align-items-center">
                                            <span class="badge badge-soft-danger badge-sm d-flex align-items-center justify-content-center me-3">High</span>
                                            <span class="badge badge-soft-light text-dark badge-sm d-flex align-items-center justify-content-center me-3">#1234</span>
                                            <span class="fs-12 text-gray-9"><i class="isax isax-message-text me-1"></i>14</span>
                                        </div>
                                    </div>
                                    <!-- card body end -->
                                </div>
                                <!-- card end -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="tab-5" role="tabpanel">
                    <div class="d-flex align-items-start overflow-auto project-status">
                        <div class="p-3 rounded w-100 me-3">
                            <div class="kanban-drag-wrap">
                                <div class="card kanban-card mb-0">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center justify-content-between mb-3 gap-2 flex-wrap">
                                            <div class="d-flex align-items-center">
                                                <h6 class="fs-14 me-2 fw-semibold">Management</h6>
                                                <span class="badge badge-soft-light text-dark badge-sm d-inline-flex align-items-center"><span class="badge-dot bg-dark me-2"></span>Closed</span>
                                            </div>
                                            <span class="d-flex align-items-center text-gray-9 fs-12"><i class="isax isax-clock me-1"></i>Just Now</span>
                                        </div>
                                        <p>Streamline your business operations with smart financial management tools. Automate invoicing, track expenses, generate reports, and stay tax-compliant with ease. Manage everything from one centralized platform,
                                            ensuring efficiency, accuracy, and growth. Take control of your finances and focus on what truly matters—your business success!</p>
                                        <div class="d-flex align-items-center">
                                            <span class="badge badge-soft-danger badge-xs d-flex align-items-center justify-content-center me-3">Medium</span>
                                            <span class="badge badge-soft-light text-dark badge-xs d-flex align-items-center justify-content-center me-3">#1234</span>
                                            <span><i class="isax isax-message-text me-1"></i>14</span>
                                        </div>
                                    </div>
                                    <!-- card body end -->
                                </div>
                                <!-- card end -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Start Footer-->
        <div class="footer d-sm-flex align-items-center justify-content-between bg-white py-2 px-4 border-top">
            <p class="text-dark mb-0">&copy; 2025 <a href="javascript:void(0);" class="link-primary">Kanakku</a>, All Rights Reserved</p>
            <p class="text-dark">Version : 1.3.8</p>
        </div>
        <!-- End Footer-->

    </div>

    <!-- ========================
        Start Page Content
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
                    <label id="dateRangePicker" class="form-label">Date Range</label>
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
                    <!-- row start -->
                    <div class="row g-2">
                        <div class="col-6">
                            <a href="javascript:void(0);" class="btn btn-outline-white w-100">Reset</a>
                        </div>
                        <div class="col-6">
                            <button data-bs-dismiss="offcanvas" class="btn btn-primary w-100" id="filter-submit">Submit</button>
                        </div>
                    </div>
                    <!-- row end -->
                </div>
            </form>
        </div>
    </div>
    <!-- End Filter -->
@endsection