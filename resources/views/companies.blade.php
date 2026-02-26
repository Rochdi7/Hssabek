<?php $page = 'companies'; ?>
@extends('layout.mainlayout')
@section('content')
    <!-- ========================
        Start Page Content
    ========================= --> 

    <div class="page-wrapper">
        <div class="content content-two">
            <!-- Start Breadcrumb -->
            <div class="d-flex d-block align-items-center justify-content-between flex-wrap gap-3 mb-4">
                <div>
                    <h6>Companies</h6>
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
                    <div>
                        <a href="#" class="btn btn-primary d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#add_companies">
                            <i class="isax isax-add-circle5 me-1"></i>New Company
                        </a>
                    </div>
                </div>
            </div>
            <!-- End Breadcrumb -->

            <!-- Start Row -->
            <div class="row">
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="card position-relative">
                        <div class="card-body">
                            <div class="d-flex align-items-center pb-0">
                                <div class="me-2">
                                    <span class="avatar avatar-lg bg-soft-info">
                                        <i class="isax isax-buildings-25 text-info fs-28"></i>
                                    </span>
                                </div>
                                <div>
                                    <p class="mb-1">Total Companies</p>
                                    <h6 class="fs-16 fw-semibold">987</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="card position-relative">
                        <div class="card-body">
                            <div class="d-flex align-items-center pb-0">
                                <div class="me-2">
                                    <span class="avatar avatar-lg bg-success-subtle">
                                        <i class="isax isax-menu-board5 text-success fs-28"></i>
                                    </span>
                                </div>
                                <div>
                                    <p class="mb-1">Active Companies</p>
                                    <h6 class="fs-16 fw-semibold">920</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="card position-relative">
                        <div class="card-body">
                            <div class="d-flex align-items-center pb-0">
                                <div class="me-2">
                                    <span class="avatar avatar-lg bg-danger-subtle">
                                        <i class="isax isax-flash-slash5 text-danger fs-28"></i>
                                    </span>
                                </div>
                                <div>
                                    <p class="mb-1">Inactive Company</p>
                                    <h6 class="fs-16 fw-semibold">92</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="card position-relative">
                        <div class="card-body">
                            <div class="d-flex align-items-center pb-0">
                                <div class="me-2">
                                    <span class="avatar avatar-lg bg-primary-subtle">
                                        <i class="isax isax-map5 text-primary fs-28"></i>
                                    </span>
                                </div>
                                <div>
                                    <p class="mb-1">Company Locations</p>
                                    <h6 class="fs-16 fw-semibold">200</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Row -->

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
                        <div class="dropdown me-2">
                            <a href="javascript:void(0);" class="dropdown-toggle btn btn-outline-white d-inline-flex align-items-center fw-medium" data-bs-toggle="dropdown">
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
                            <ul class="dropdown-menu  dropdown-menu-lg">
                                <li>
                                    <label class="dropdown-item d-flex align-items-center form-switch">
                                        <i class="fa-solid fa-grip-vertical me-3 text-default"></i>
                                        <input class="form-check-input m-0 me-2" type="checkbox" checked>
                                        <span>Company</span>
                                    </label>
                                </li>
                                <li>
                                    <label class="dropdown-item d-flex align-items-center form-switch">
                                        <i class="fa-solid fa-grip-vertical me-3 text-default"></i>
                                        <input class="form-check-input m-0 me-2" type="checkbox" checked>
                                        <span>Domain URL</span>
                                    </label>
                                </li>
                                <li>
                                    <label class="dropdown-item d-flex align-items-center form-switch">
                                        <i class="fa-solid fa-grip-vertical me-3 text-default"></i>
                                        <input class="form-check-input m-0 me-2" type="checkbox" checked>
                                        <span>Plan</span>
                                    </label>
                                </li>
                                <li>
                                    <label class="dropdown-item d-flex align-items-center form-switch">
                                        <i class="fa-solid fa-grip-vertical me-3 text-default"></i>
                                        <input class="form-check-input m-0 me-2" type="checkbox">
                                        <span>Created On</span>
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
                    <span class="tag bg-light border rounded-1 fs-12 text-dark badge"><span class="num-count d-inline-flex align-items-center justify-content-center bg-success fs-10 me-1">5</span>Companies Selected<span class="ms-1 tag-close"><i class="fa-solid fa-x fs-10"></i></span></span>
                    <span class="tag bg-light border rounded-1 fs-12 text-dark badge"><span class="num-count d-inline-flex align-items-center justify-content-center bg-success fs-10 me-1">2</span>Plans Selected<span class="ms-1 tag-close"><i class="fa-solid fa-x fs-10"></i></span></span>
                    <a href="#" class="link-danger fw-medium text-decoration-underline ms-md-1">Clear All</a>
                </div>
                <!-- /Filter Info -->
            </div>
            <!-- Table Search End -->

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
                            <th class="no-sort">Company</th>
                            <th class="no-sort">Email</th>
                            <th class="no-sort">Account URL</th>
                            <th>Plan</th>
                            <th>Created On</th>
                            <th class="no-sort">Status</th>
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
                                <div class="d-flex align-items-center">
                                    <a href="javascript:void(0);" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0" data-bs-toggle="modal" data-bs-target="#companies_details">
                                        <img src="{{URL::asset('build/img/icons/company-01.svg')}}" class="rounded-circle" alt="img">
                                    </a>
                                    <div>
                                        <h6 class="fs-14 fw-medium mb-0"><a href="javascript:void(0);">Trend Hive</a></h6>
                                    </div>
                                </div>
                            </td>
                            <td>trendhive@example.com</td>
                            <td>th.example.com</td>
                            <td>
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class="mb-0">Advanced (Monthly)</p>
                                    <a href="javascript:void(0);" class="ms-3"><span class="btn btn-sm btn-light p-1 d-inline-flex align-items-center"><i class="isax isax-candle"></i></span></a>
                                </div>
                            </td>
                            <td>22 Feb 2025</td>
                            <td>
                                <span class="badge badge-soft-success d-inline-flex align-items-center">Active
                                    <i class="isax isax-tick-circle ms-1"></i>
                                </span>
                            </td>
                            <td class="action-item">
                                <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                    <i class="fa-solid fa-ellipsis"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#view_companies"><i class="isax isax-eye me-2"></i>View</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#edit_companies"><i class="isax isax-edit me-2"></i>Edit</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
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
                                <div class="d-flex align-items-center">
                                    <a href="javascript:void(0);" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0" data-bs-toggle="modal" data-bs-target="#companies_details">
                                        <img src="{{URL::asset('build/img/icons/company-02.svg')}}" class="rounded-circle" alt="img">
                                    </a>
                                    <div>
                                        <h6 class="fs-14 fw-medium mb-0"><a href="javascript:void(0);">Quick Cart</a></h6>
                                    </div>
                                </div>
                            </td>
                            <td>quickcart@example.com</td>
                            <td>qc.example.com</td>
                            <td>
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class="mb-0">Basic (Yearly)</p>
                                    <a href="javascript:void(0);" class="ms-3"><span class="btn btn-sm btn-light p-1 d-inline-flex align-items-center"><i class="isax isax-candle"></i></span></a>
                                </div>
                            </td>
                            <td>07 Feb 2025</td>
                            <td>
                                <span class="badge badge-soft-danger d-inline-flex align-items-center">Inactive
                                    <i class="isax isax-close-circle ms-1"></i>
                                </span>
                            </td>
                            <td class="action-item">
                                <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                    <i class="fa-solid fa-ellipsis"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#view_companies"><i class="isax isax-eye me-2"></i>View</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#edit_companies"><i class="isax isax-edit me-2"></i>Edit</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
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
                                <div class="d-flex align-items-center">
                                    <a href="javascript:void(0);" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0" data-bs-toggle="modal" data-bs-target="#companies_details">
                                        <img src="{{URL::asset('build/img/icons/company-03.svg')}}" class="rounded-circle" alt="img">
                                    </a>
                                    <div>
                                        <h6 class="fs-14 fw-medium mb-0"><a href="javascript:void(0);">Tech Bazaar</a></h6>
                                    </div>
                                </div>
                            </td>
                            <td>techbazaar@example.com</td>
                            <td>tb.example.com</td>
                            <td>
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class="mb-0">Advanced (Monthly)</p>
                                    <a href="javascript:void(0);" class="ms-3"><span class="btn btn-sm btn-light p-1 d-inline-flex align-items-center"><i class="isax isax-candle"></i></span></a>
                                </div>
                            </td>
                            <td>30 Jan 2025</td>
                            <td>
                                <span class="badge badge-soft-success d-inline-flex align-items-center">Active
                                    <i class="isax isax-tick-circle ms-1"></i>
                                </span>
                            </td>
                            <td class="action-item">
                                <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                    <i class="fa-solid fa-ellipsis"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#view_companies"><i class="isax isax-eye me-2"></i>View</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#edit_companies"><i class="isax isax-edit me-2"></i>Edit</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
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
                                <div class="d-flex align-items-center">
                                    <a href="javascript:void(0);" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0" data-bs-toggle="modal" data-bs-target="#companies_details">
                                        <img src="{{URL::asset('build/img/icons/company-04.svg')}}" class="rounded-circle" alt="img">
                                    </a>
                                    <div>
                                        <h6 class="fs-14 fw-medium mb-0"><a href="javascript:void(0);">Harvest Basket</a></h6>
                                    </div>
                                </div>
                            </td>
                            <td>haervestbasket@example.com</td>
                            <td>hb.example.com</td>
                            <td>
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class="mb-0">Advanced (Monthly)</p>
                                    <a href="javascript:void(0);" class="ms-3"><span class="btn btn-sm btn-light p-1 d-inline-flex align-items-center"><i class="isax isax-candle"></i></span></a>
                                </div>
                            </td>
                            <td>17 Jan 2025</td>
                            <td>
                                <span class="badge badge-soft-success d-inline-flex align-items-center">Active
                                    <i class="isax isax-tick-circle ms-1"></i>
                                </span>
                            </td>
                            <td class="action-item">
                                <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                    <i class="fa-solid fa-ellipsis"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#view_companies"><i class="isax isax-eye me-2"></i>View</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#edit_companies"><i class="isax isax-edit me-2"></i>Edit</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
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
                                <div class="d-flex align-items-center">
                                    <a href="javascript:void(0);" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0" data-bs-toggle="modal" data-bs-target="#companies_details">
                                        <img src="{{URL::asset('build/img/icons/company-05.svg')}}" class="rounded-circle" alt="img">
                                    </a>
                                    <div>
                                        <h6 class="fs-14 fw-medium mb-0"><a href="javascript:void(0);">Elite Mart</a></h6>
                                    </div>
                                </div>
                            </td>
                            <td>elitemart@example.com</td>
                            <td>em.example.com</td>
                            <td>
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class="mb-0">Enterprise (Monthly)</p>
                                    <a href="javascript:void(0);" class="ms-3"><span class="btn btn-sm btn-light p-1 d-inline-flex align-items-center"><i class="isax isax-candle"></i></span></a>
                                </div>
                            </td>
                            <td>04 Jan 2025</td>
                            <td>
                                <span class="badge badge-soft-danger d-inline-flex align-items-center">Inactive
                                    <i class="isax isax-close-circle ms-1"></i>
                                </span>
                            </td>
                            <td class="action-item">
                                <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                    <i class="fa-solid fa-ellipsis"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#view_companies"><i class="isax isax-eye me-2"></i>View</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#edit_companies"><i class="isax isax-edit me-2"></i>Edit</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
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
                                <div class="d-flex align-items-center">
                                    <a href="javascript:void(0);" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0" data-bs-toggle="modal" data-bs-target="#companies_details">
                                        <img src="{{URL::asset('build/img/icons/company-06.svg')}}" class="rounded-circle" alt="img">
                                    </a>
                                    <div>
                                        <h6 class="fs-14 fw-medium mb-0"><a href="javascript:void(0);">Prime Mart</a></h6>
                                    </div>
                                </div>
                            </td>
                            <td>primemart@example.com</td>
                            <td>pm.example.com</td>
                            <td>
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class="mb-0">Advanced (Monthly)</p>
                                    <a href="javascript:void(0);" class="ms-3"><span class="btn btn-sm btn-light p-1 d-inline-flex align-items-center"><i class="isax isax-candle"></i></span></a>
                                </div>
                            </td>
                            <td>09 Dec 2024</td>
                            <td>
                                <span class="badge badge-soft-success d-inline-flex align-items-center">Active
                                    <i class="isax isax-tick-circle ms-1"></i>
                                </span>
                            </td>
                            <td class="action-item">
                                <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                    <i class="fa-solid fa-ellipsis"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#view_companies"><i class="isax isax-eye me-2"></i>View</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#edit_companies"><i class="isax isax-edit me-2"></i>Edit</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
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
                                <div class="d-flex align-items-center">
                                    <a href="javascript:void(0);" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0" data-bs-toggle="modal" data-bs-target="#companies_details">
                                        <img src="{{URL::asset('build/img/icons/company-07.svg')}}" class="rounded-circle" alt="img">
                                    </a>
                                    <div>
                                        <h6 class="fs-14 fw-medium mb-0"><a href="javascript:void(0);">Trend Crafters</a></h6>
                                    </div>
                                </div>
                            </td>
                            <td>trendcreafters@example.com</td>
                            <td>tc.example.com</td>
                            <td>
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class="mb-0">Enterprise (Yearly)</p>
                                    <a href="javascript:void(0);" class="ms-3"><span class="btn btn-sm btn-light p-1 d-inline-flex align-items-center"><i class="isax isax-candle"></i></span></a>
                                </div>
                            </td>
                            <td>02 Dec 2024</td>
                            <td>
                                <span class="badge badge-soft-success d-inline-flex align-items-center">Active
                                    <i class="isax isax-tick-circle ms-1"></i>
                                </span>
                            </td>
                            <td class="action-item">
                                <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                    <i class="fa-solid fa-ellipsis"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#view_companies"><i class="isax isax-eye me-2"></i>View</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#edit_companies"><i class="isax isax-edit me-2"></i>Edit</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
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
                                <div class="d-flex align-items-center">
                                    <a href="javascript:void(0);" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0" data-bs-toggle="modal" data-bs-target="#companies_details">
                                        <img src="{{URL::asset('build/img/icons/company-08.svg')}}" class="rounded-circle" alt="img">
                                    </a>
                                    <div>
                                        <h6 class="fs-14 fw-medium mb-0"><a href="javascript:void(0);">Fresh Nest</a></h6>
                                    </div>
                                </div>
                            </td>
                            <td>freshnest@example.com</td>
                            <td>fn.example.com</td>
                            <td>
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class="mb-0">Basic (Monthly)</p>
                                    <a href="javascript:void(0);" class="ms-3"><span class="btn btn-sm btn-light p-1 d-inline-flex align-items-center"><i class="isax isax-candle"></i></span></a>
                                </div>
                            </td>
                            <td>30 Nov 2024</td>
                            <td>
                                <span class="badge badge-soft-success d-inline-flex align-items-center">Active
                                    <i class="isax isax-tick-circle ms-1"></i>
                                </span>
                            </td>
                            <td class="action-item">
                                <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                    <i class="fa-solid fa-ellipsis"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#view_companies"><i class="isax isax-eye me-2"></i>View</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#edit_companies"><i class="isax isax-edit me-2"></i>Edit</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
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
                                <div class="d-flex align-items-center">
                                    <a href="javascript:void(0);" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0" data-bs-toggle="modal" data-bs-target="#companies_details">
                                        <img src="{{URL::asset('build/img/icons/company-09.svg')}}" class="rounded-circle" alt="img">
                                    </a>
                                    <div>
                                        <h6 class="fs-14 fw-medium mb-0"><a href="javascript:void(0);">Gizmo Mart</a></h6>
                                    </div>
                                </div>
                            </td>
                            <td>gizmomart@example.com</td>
                            <td>gm.@example.com</td>
                            <td>
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class="mb-0">Basic (Yearly)</p>
                                    <a href="javascript:void(0);" class="ms-3"><span class="btn btn-sm btn-light p-1 d-inline-flex align-items-center"><i class="isax isax-candle"></i></span></a>
                                </div>
                            </td>
                            <td>15 Nov 2024</td>
                            <td>
                                <span class="badge badge-soft-success d-inline-flex align-items-center">Active
                                    <i class="isax isax-tick-circle ms-1"></i>
                                </span>
                            </td>
                            <td class="action-item">
                                <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                    <i class="fa-solid fa-ellipsis"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#view_companies"><i class="isax isax-eye me-2"></i>View</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#edit_companies"><i class="isax isax-edit me-2"></i>Edit</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
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
                                <div class="d-flex align-items-center">
                                    <a href="javascript:void(0);" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0" data-bs-toggle="modal" data-bs-target="#companies_details">
                                        <img src="{{URL::asset('build/img/icons/company-10.svg')}}" class="rounded-circle" alt="img">
                                    </a>
                                    <div>
                                        <h6 class="fs-14 fw-medium mb-0"><a href="javascript:void(0);">Dream Space</a></h6>
                                    </div>
                                </div>
                            </td>
                            <td>dreamspace@example.com</td>
                            <td>ds.@example.com</td>
                            <td>
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class="mb-0">Enterprise (Monthly)</p>
                                    <a href="javascript:void(0);" class="ms-3"><span class="btn btn-sm btn-light p-1 d-inline-flex align-items-center"><i class="isax isax-candle"></i></span></a>
                                </div>
                            </td>
                            <td>12 Oct 2024</td>
                            <td>
                                <span class="badge badge-soft-danger d-inline-flex align-items-center">Inactive
                                    <i class="isax isax-close-circle ms-1"></i>
                                </span>
                            </td>
                            <td class="action-item">
                                <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                    <i class="fa-solid fa-ellipsis"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#view_companies"><i class="isax isax-eye me-2"></i>View</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#edit_companies"><i class="isax isax-edit me-2"></i>Edit</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
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
                                <div class="d-flex align-items-center">
                                    <a href="javascript:void(0);" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0" data-bs-toggle="modal" data-bs-target="#companies_details">
                                        <img src="{{URL::asset('build/img/icons/company-11.svg')}}" class="rounded-circle" alt="img">
                                    </a>
                                    <div>
                                        <h6 class="fs-14 fw-medium mb-0"><a href="javascript:void(0);">Mega Mart</a></h6>
                                    </div>
                                </div>
                            </td>
                            <td>megamart@example.com</td>
                            <td>mm.@example.com</td>
                            <td>
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class="mb-0">Advanced (Monthly)</p>
                                    <a href="javascript:void(0);" class="ms-3"><span class="btn btn-sm btn-light p-1 d-inline-flex align-items-center"><i class="isax isax-candle"></i></span></a>
                                </div>
                            </td>
                            <td>05 Oct 2024</td>
                            <td>
                                <span class="badge badge-soft-success d-inline-flex align-items-center">Active
                                    <i class="isax isax-tick-circle ms-1"></i>
                                </span>
                            </td>
                            <td class="action-item">
                                <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                    <i class="fa-solid fa-ellipsis"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#view_companies"><i class="isax isax-eye me-2"></i>View</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#edit_companies"><i class="isax isax-edit me-2"></i>Edit</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
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
                                <div class="d-flex align-items-center">
                                    <a href="javascript:void(0);" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0" data-bs-toggle="modal" data-bs-target="#companies_details">
                                        <img src="{{URL::asset('build/img/icons/company-12.svg')}}" class="rounded-circle" alt="img">
                                    </a>
                                    <div>
                                        <h6 class="fs-14 fw-medium mb-0"><a href="javascript:void(0);">Decor Ease</a></h6>
                                    </div>
                                </div>
                            </td>
                            <td>decorease@example.com</td>
                            <td>de.@example.com</td>
                            <td>
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class="mb-0">Basic (Yearly)</p>
                                    <a href="javascript:void(0);" class="ms-3"><span class="btn btn-sm btn-light p-1 d-inline-flex align-items-center"><i class="isax isax-candle"></i></span></a>
                                </div>
                            </td>
                            <td>09 Sep 2024</td>
                            <td>
                                <span class="badge badge-soft-danger d-inline-flex align-items-center">Inactive
                                    <i class="isax isax-close-circle ms-1"></i>
                                </span>
                            </td>
                            <td class="action-item">
                                <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                    <i class="fa-solid fa-ellipsis"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#view_companies"><i class="isax isax-eye me-2"></i>View</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#edit_companies"><i class="isax isax-edit me-2"></i>Edit</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
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
                                <div class="d-flex align-items-center">
                                    <a href="javascript:void(0);" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0" data-bs-toggle="modal" data-bs-target="#companies_details">
                                        <img src="{{URL::asset('build/img/icons/company-13.svg')}}" class="rounded-circle" alt="img">
                                    </a>
                                    <div>
                                        <h6 class="fs-14 fw-medium mb-0"><a href="javascript:void(0);">Electro World</a></h6>
                                    </div>
                                </div>
                            </td>
                            <td>electroworld@example.com</td>
                            <td>ew.@example.com</td>
                            <td>
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class="mb-0">Advanced (Monthly)</p>
                                    <a href="javascript:void(0);" class="ms-3"><span class="btn btn-sm btn-light p-1 d-inline-flex align-items-center"><i class="isax isax-candle"></i></span></a>
                                </div>
                            </td>
                            <td>02 Sep 2024</td>
                            <td>
                                <span class="badge badge-soft-success d-inline-flex align-items-center">Active
                                    <i class="isax isax-tick-circle ms-1"></i>
                                </span>
                            </td>
                            <td class="action-item">
                                <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                    <i class="fa-solid fa-ellipsis"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#view_companies"><i class="isax isax-eye me-2"></i>View</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#edit_companies"><i class="isax isax-edit me-2"></i>Edit</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
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
                                <div class="d-flex align-items-center">
                                    <a href="javascript:void(0);" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0" data-bs-toggle="modal" data-bs-target="#companies_details">
                                        <img src="{{URL::asset('build/img/icons/company-14.svg')}}" class="rounded-circle" alt="img">
                                    </a>
                                    <div>
                                        <h6 class="fs-14 fw-medium mb-0"><a href="javascript:void(0);">Urban Home</a></h6>
                                    </div>
                                </div>
                            </td>
                            <td>urbanhome@example.com</td>
                            <td>uh.@example.com</td>
                            <td>
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class="mb-0">Enterprise (Monthly)</p>
                                    <a href="javascript:void(0);" class="ms-3"><span class="btn btn-sm btn-light p-1 d-inline-flex align-items-center"><i class="isax isax-candle"></i></span></a>
                                </div>
                            </td>
                            <td>07 Aug 2024</td>
                            <td>
                                <span class="badge badge-soft-success d-inline-flex align-items-center">Active
                                    <i class="isax isax-tick-circle ms-1"></i>
                                </span>
                            </td>
                            <td class="action-item">
                                <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                    <i class="fa-solid fa-ellipsis"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#view_companies"><i class="isax isax-eye me-2"></i>View</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#edit_companies"><i class="isax isax-edit me-2"></i>Edit</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- Table List End -->

        </div>

        @component('components.footer')
        @endcomponent
    </div>

    <!-- ========================
        End Page Content
    ========================= -->
@endsection