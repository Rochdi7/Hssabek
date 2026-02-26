<?php $page = 'customer-details'; ?>
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
                    <h6><a href="{{url('customers')}}"><i class="isax isax-arrow-left fs-16 me-2"></i>Customers</a></h6>
                </div>
                <div class="d-flex my-xl-auto right-content align-items-center flex-wrap gap-2">
                    <div class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle btn btn-primary d-flex align-items-center fs-14 fw-semibold" data-bs-toggle="dropdown">
                           Add New
                        </a>
                        <ul class="dropdown-menu  dropdown-menu-end">
                            <li>
                                <a href="javascript:void(0);" class="dropdown-item"> <i class="isax isax-document-text fs-14 me-2"></i>Invoice </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="dropdown-item"> <i class="isax isax-money-send fs-14 me-2"></i> Expense</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="dropdown-item"> <i class="isax isax-money-add fs-14 me-2"></i> Credit Notes</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="dropdown-item"> <i class="isax isax-money-recive fs-14 me-2"></i> Debit Notes</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="dropdown-item"> <i class="isax isax-document fs-14 me-2"></i> Purchase Order</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="dropdown-item"> <i class="isax isax-document-download fs-14 me-2"></i> Quotation</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="dropdown-item"> <i class="isax isax-document-forward fs-14 me-2"></i> Delivery Challan</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- End Page Header -->

            <!-- start row -->
            <div class="row">
                <div class="col-xl-8">

                    <!-- Start User -->
                    <div class="card bg-light customer-details-info position-relative overflow-hidden">
                        <div class="card-body position-relative z-1">
                            <div class="d-flex align-items-center justify-content-between mb-3 flex-wrap gap-3">
                                <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                                    <div class="avatar avatar-xxl rounded-circle flex-shrink-0">
                                        <img src="{{URL::asset('build/img/users/user-08.jpg')}}" alt="user-01" class="img-fluid rounded-circle border border-white border-2">
                                    </div>
                                    <div class="">
                                        <p class="text-primary fs-14 fw-medium mb-1">Cl-12345</p>
                                        <h6 class="mb-2"> Robert George <img src="{{URL::asset('build/img/icons/confirme.svg')}}" alt="confirme" class="ms-1">  </h6>
                                        <p class="fs-14 fw-regular"><i class="isax isax-location fs-14 me-1 text-gray-9"></i> 4712 Cherry Ridge Drive Rochester, NY 14620.</p>
                                    </div>
                                </div>
                                <a href="#" class="btn btn-outline-white border border-1 border-grey border-sm bg-white"><i class="isax isax-edit-2 fs-13 fw-semibold text-dark me-1"></i> Edit Profile </a>
                            </div>

                            <div class="card border-0 shadow shadow-none mb-0 bg-white">
                                <div class="card-body border-0 shadow shadow-none">
                                    <ul class="d-flex justify-content-between align-items-center flex-wrap gap-2 p-0 m-0 list-unstyled">
                                        <li>
                                            <h6 class="mb-1 fs-14 fw-semibold"> <i class="isax isax-sms fs-14 me-2"></i>Email Address</h6>
                                            <p> john@example.com </p>
                                        </li>
                                        <li>
                                            <h6 class="mb-1 fs-14 fw-semibold"> <i class="isax isax-call fs-14 me-2"></i>Phone</h6>
                                            <p> +158578 54840 </p>
                                        </li>
                                        <li>
                                            <h6 class="mb-1 fs-14 fw-semibold"> <i class="isax isax-building fs-14 me-2"></i>Company </h6>
                                            <p> TrueAI Technologies</p>
                                        </li>
                                        <li>
                                            <h6 class="mb-1 fs-14 fw-semibold"> <i class="isax isax-global fs-14 me-2"></i>Website</h6>
                                            <p class="d-flex align-items-center"> www.example.com <i class="isax isax-link fs-14 ms-1 text-primary"></i></p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div><!-- end card body -->
                        <img src="{{URL::asset('build/img/icons/elements-01.svg')}}" alt="elements-01" class="img-fluid customer-details-bg">
                    </div><!-- end card -->
                    <!-- End User -->

                    <!-- Start Statistics -->
                    <div class="card">
                        <div class="card-body">
                            <h6 class="pb-3 mb-3 border-1 border-bottom border-gray"> Invoice Statistics </h6>
                            <ul class="d-flex align-items-center justify-content-between flex-wrap gap-2 p-0 m-0 list-unstyled">
                                <li>
                                    <p class="mb-2"> <i class="fa-solid fa-circle fs-10 text-primary me-2"></i> Total Invoice </p>
                                    <h6 class="fs-16 fw-600"> $56900.54</h6>
                                </li>
                                <li>
                                    <p class="mb-2"> <i class="fa-solid fa-circle fs-10 text-info me-2"></i> Outstanding </p>
                                    <h6 class="fs-16 fw-600"> $56900.54</h6>
                                </li>
                                <li>
                                    <p class="mb-2"> <i class="fa-solid fa-circle fs-10 text-danger me-2"></i> Overdue </p>
                                    <h6 class="fs-16 fw-600"> $56900.54</h6>
                                </li>
                                <li>
                                    <p class="mb-2"> <i class="fa-solid fa-circle fs-10 text-purple me-2"></i> Draft </p>
                                    <h6 class="fs-16 fw-600"> $56900.54</h6>
                                </li>
                                <li>
                                    <p class="mb-2"> <i class="fa-solid fa-circle fs-10 text-error me-2"></i> Cancelled </p>
                                    <h6 class="fs-16 fw-600"> $56900.54</h6>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- End Statistics -->

                    <!-- Start Tablelist -->
                    <div class="card table-info">
                        <div class="card-body">
                            <h6 class="pb-3 mb-3 border-1 border-bottom border-gray"> Invoice </h6>
                            <div class="table-responsive table-nowrap">
                                <table class="table border  m-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th class="no-sort">ID</th>
                                            <th>Created On</th>
                                            <th>Amount</th>
                                            <th>Paid</th>
                                            <th class="no-sort">Status</th>
                                            <th>Due Date</th>
                                            <th class="no-sort"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <a href="{{url('invoice-details')}}" class="link-default">INV00025</a>
                                            </td>
                                            <td>22 Feb 2025</td>
                                            <td class="text-dark">$10,000</td>

                                            <td class="">$5,000</td>
                                            <td>
                                                <span class="badge badge-soft-success badge-sm d-inline-flex align-items-center">Paid<i class="isax isax-tick-circle ms-1"></i></span>
                                            </td>
                                            <td>04 Mar 2025</td>
                                            <td class="action-item">
                                                <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                                    <i class="fa-solid fa-ellipsis"></i>
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a href="{{url('invoice-details')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-eye me-2"></i>View</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{url('edit-invoice')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-edit me-2"></i>Edit</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-archive-2 me-2"></i>Archive</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="{{url('invoice-details')}}" class="link-default">INV00024</a>
                                            </td>
                                            <td>07 Feb 2025</td>
                                            <td class="text-dark">$25,750</td>

                                            <td class="">$10,750</td>
                                            <td>
                                                <span class="badge badge-soft-warning badge-sm d-inline-flex align-items-center">Unpaid<i class="isax isax-slash ms-1"></i></span>
                                            </td>
                                            <td>04 Mar 2025</td>
                                            <td class="action-item">
                                                <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                                    <i class="fa-solid fa-ellipsis"></i>
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a href="{{url('invoice-details')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-eye me-2"></i>View</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{url('edit-invoice')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-edit me-2"></i>Edit</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-archive-2 me-2"></i>Archive</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="{{url('invoice-details')}}" class="link-default">INV00023</a>
                                            </td>
                                            <td>30 Jan 2025</td>
                                            <td class="text-dark">$50,125</td>

                                            <td class="">$20,000</td>
                                            <td>
                                                <span class="badge badge-soft-danger badge-sm d-inline-flex align-items-center">Cancelled<i class="isax isax-close-circle ms-1"></i></span>
                                            </td>
                                            <td>13 Feb 2025</td>
                                            <td class="action-item">
                                                <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                                    <i class="fa-solid fa-ellipsis"></i>
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a href="{{url('invoice-details')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-eye me-2"></i>View</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{url('edit-invoice')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-edit me-2"></i>Edit</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-archive-2 me-2"></i>Archive</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="{{url('invoice-details')}}" class="link-default">INV00022</a>
                                            </td>
                                            <td>17 Jan 2025</td>
                                            <td class="text-dark">$75,900</td>

                                            <td class="">$50,000</td>
                                            <td>
                                                <span class="badge badge-soft-primary badge-sm d-inline-flex align-items-center">Partially Paid<i class="isax isax-timer ms-1"></i></span>
                                            </td>
                                            <td>30 Jan 2025</td>
                                            <td class="action-item">
                                                <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                                    <i class="fa-solid fa-ellipsis"></i>
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a href="{{url('invoice-details')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-eye me-2"></i>View</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{url('edit-invoice')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-edit me-2"></i>Edit</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-archive-2 me-2"></i>Archive</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="{{url('invoice-details')}}" class="link-default">INV00019</a>
                                            </td>
                                            <td>02 Dec 2024</td>
                                            <td class="text-dark">$2,50,000</td>

                                            <td class="">$1,25,000</td>
                                            <td>
                                                <span class="badge badge-soft-warning badge-sm d-inline-flex align-items-center">Unpaid<i class="isax isax-slash ms-1"></i></span>
                                            </td>
                                            <td>15 Dec 2024</td>
                                            <td class="action-item">
                                                <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                                    <i class="fa-solid fa-ellipsis"></i>
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a href="{{url('invoice-details')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-eye me-2"></i>View</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{url('edit-invoice')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-edit me-2"></i>Edit</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-archive-2 me-2"></i>Archive</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="{{url('invoice-details')}}" class="link-default">INV00017</a>
                                            </td>
                                            <td>30 Nov 2024</td>
                                            <td class="text-dark">$7,50,300</td>

                                            <td class="">$2,50,500</td>
                                            <td>
                                                <span class="badge badge-soft-primary badge-sm d-inline-flex align-items-center">Partially Paid<i class="isax isax-timer ms-1"></i></span>
                                            </td>
                                            <td>12 Nov 2024</td>
                                            <td class="action-item">
                                                <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                                    <i class="fa-solid fa-ellipsis"></i>
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a href="{{url('invoice-details')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-eye me-2"></i>View</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{url('edit-invoice')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-edit me-2"></i>Edit</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-archive-2 me-2"></i>Archive</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="{{url('invoice-details')}}" class="link-default">INV00016</a>
                                            </td>
                                            <td>12 Oct 2024</td>
                                            <td class="text-dark">$9,99,999</td>

                                            <td class="">$4,00,000</td>
                                            <td>
                                                <span class="badge badge-soft-danger badge-sm d-inline-flex align-items-center">Uncollectable<i class="isax isax-danger ms-1"></i></span>
                                            </td>
                                            <td>25 Oct 2024</td>
                                            <td class="action-item">
                                                <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                                    <i class="fa-solid fa-ellipsis"></i>
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a href="{{url('invoice-details')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-eye me-2"></i>View</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{url('edit-invoice')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-edit me-2"></i>Edit</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-archive-2 me-2"></i>Archive</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="{{url('invoice-details')}}" class="link-default">INV00014</a>
                                            </td>
                                            <td>09 Sep 2024</td>
                                            <td class="text-dark">$10,000</td>

                                            <td class="">$5,000</td>
                                            <td>
                                                <span class="badge badge-soft-success badge-sm d-inline-flex align-items-center">Paid<i class="isax isax-tick-circle ms-1"></i></span>
                                            </td>
                                            <td>04 Mar 2025</td>
                                            <td class="action-item">
                                                <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                                    <i class="fa-solid fa-ellipsis"></i>
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a href="{{url('invoice-details')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-eye me-2"></i>View</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{url('edit-invoice')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-edit me-2"></i>Edit</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-archive-2 me-2"></i>Archive</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="{{url('invoice-details')}}" class="link-default">INV00013</a>
                                            </td>
                                            <td>13 Sep 2025</td>
                                            <td class="text-dark">$10,000</td>

                                            <td class="">$5,000</td>
                                            <td>
                                                <span class="badge badge-soft-success badge-sm d-inline-flex align-items-center">Paid<i class="isax isax-tick-circle ms-1"></i></span>
                                            </td>
                                            <td>04 Mar 2025</td>
                                            <td class="action-item">
                                                <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                                    <i class="fa-solid fa-ellipsis"></i>
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a href="{{url('invoice-details')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-eye me-2"></i>View</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{url('edit-invoice')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-edit me-2"></i>Edit</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-archive-2 me-2"></i>Archive</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="{{url('invoice-details')}}" class="link-default">INV00012</a>
                                            </td>
                                            <td>12 Sep 2025</td>
                                            <td class="text-dark">$10,000</td>

                                            <td class="">$5,000</td>
                                            <td>
                                                <span class="badge badge-soft-success badge-sm d-inline-flex align-items-center">Paid<i class="isax isax-tick-circle ms-1"></i></span>
                                            </td>
                                            <td>04 Mar 2025</td>
                                            <td class="action-item">
                                                <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                                    <i class="fa-solid fa-ellipsis"></i>
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a href="{{url('invoice-details')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-eye me-2"></i>View</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{url('edit-invoice')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-edit me-2"></i>Edit</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-archive-2 me-2"></i>Archive</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="{{url('invoice-details')}}" class="link-default">INV00011</a>
                                            </td>
                                            <td>10 Aug 2025</td>
                                            <td class="text-dark">$10,000</td>

                                            <td class="">$5,000</td>
                                            <td>
                                                <span class="badge badge-soft-primary badge-sm d-inline-flex align-items-center">Partially Paid<i class="isax isax-timer ms-1"></i></span>
                                            </td>
                                            <td>04 Mar 2025</td>
                                            <td class="action-item">
                                                <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                                    <i class="fa-solid fa-ellipsis"></i>
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a href="{{url('invoice-details')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-eye me-2"></i>View</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{url('edit-invoice')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-edit me-2"></i>Edit</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-archive-2 me-2"></i>Archive</a>
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
                        </div>
                    </div>
                    <!-- End Tablelist -->

                </div><!-- end col -->
                <div class="col-xl-4">
                    <!-- Start Notes -->
                    <div class="card">
                        <div class="card-body">
                            <h6 class="pb-3 mb-3 border-1 border-bottom border-gray"> Notes </h6>
                            <p class="text-truncate line-clamb-3"> Keep in mind that in order to be deductible, your employees’ pay must be reasonable and necessary for conducting business to qualify for </p>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                    <!-- End Notes -->

                    <!-- Start Payment -->
                    <div class="card">
                        <div class="card-body">
                            <h6 class="pb-3 mb-3 border-1 border-bottom border-gray"> Payments History </h6>
                            <!-- Pay1 -->
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <div class="d-flex align-items-center">
                                    <a href="javascript:void(0);" class="avatar avatar-md flex-shrink-0 me-2">
                                        <img src="{{URL::asset('build/img/icons/transaction-01.svg')}}" class="rounded-circle" alt="img">
                                    </a>
                                    <div>
                                        <h6 class="fs-14 fw-semibold mb-1"><a href="javascript:void(0);">Andrew James</a></h6>
                                        <p class="fs-13"><a href="{{url('invoice-details')}}" class="link-default">#INV45478</a></p>
                                    </div>
                                </div>
                                <div>
                                    <p class="mb-0 fs-13"> Amount </p>
                                    <p class="mb-0 fs-14 fw-semibold text-gray-9"> $417 </p>
                                </div>
                                <div class="text-end">
                                    <span class="badge badge-sm badge-soft-success"> Paid <i class="isax isax-tick-circle fs-10 fw-semibold ms-1"></i></span>
                                </div>
                            </div>
                            <!-- Pay2 -->
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <div class="d-flex align-items-center">
                                    <a href="javascript:void(0);" class="avatar avatar-md flex-shrink-0 me-2">
                                        <img src="{{URL::asset('build/img/icons/transaction-02.svg')}}" class="rounded-circle" alt="img">
                                    </a>
                                    <div>
                                        <h6 class="fs-14 fw-semibold mb-1"><a href="javascript:void(0);">Andrew James</a></h6>
                                        <p class="fs-13"><a href="{{url('invoice-details')}}" class="link-default">#INV45478</a></p>
                                    </div>
                                </div>
                                <div>
                                    <p class="mb-0 fs-13"> Amount </p>
                                    <p class="mb-0 fs-14 fw-semibold text-gray-9"> $417 </p>
                                </div>
                                <div class="text-end">
                                    <span class="badge badge-sm badge-soft-success"> Paid <i class="isax isax-tick-circle fs-10 fw-semibold ms-1"></i></span>
                                </div>
                            </div>
                            <!-- Pay3 -->
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <div class="d-flex align-items-center">
                                    <a href="javascript:void(0);" class="avatar avatar-md flex-shrink-0 me-2">
                                        <img src="{{URL::asset('build/img/icons/transaction-01.svg')}}" class="rounded-circle" alt="img">
                                    </a>
                                    <div>
                                        <h6 class="fs-14 fw-semibold mb-1"><a href="javascript:void(0);">Andrew James</a></h6>
                                        <p class="fs-13"><a href="{{url('invoice-details')}}" class="link-default">#INV45478</a></p>
                                    </div>
                                </div>
                                <div>
                                    <p class="mb-0 fs-13"> Amount </p>
                                    <p class="mb-0 fs-14 fw-semibold text-gray-9"> $417 </p>
                                </div>
                                <div class="text-end">
                                    <span class="badge badge-sm badge-soft-success"> Paid <i class="isax isax-tick-circle fs-10 fw-semibold ms-1"></i></span>
                                </div>
                            </div>
                            <!-- Pay4 -->
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <div class="d-flex align-items-center">
                                    <a href="javascript:void(0);" class="avatar avatar-md flex-shrink-0 me-2">
                                        <img src="{{URL::asset('build/img/icons/transaction-02.svg')}}" class="rounded-circle" alt="img">
                                    </a>
                                    <div>
                                        <h6 class="fs-14 fw-semibold mb-1"><a href="javascript:void(0);">Andrew James</a></h6>
                                        <p class="fs-13"><a href="{{url('invoice-details')}}" class="link-default">#INV45478</a></p>
                                    </div>
                                </div>
                                <div>
                                    <p class="mb-0 fs-13"> Amount </p>
                                    <p class="mb-0 fs-14 fw-semibold text-gray-9"> $417 </p>
                                </div>
                                <div class="text-end">
                                    <span class="badge badge-sm badge-soft-success"> Paid <i class="isax isax-tick-circle fs-10 fw-semibold ms-1"></i></span>
                                </div>
                            </div>
                            <!-- Pay5 -->
                            <div class="d-flex align-items-center justify-content-between mb-0">
                                <div class="d-flex align-items-center">
                                    <a href="javascript:void(0);" class="avatar avatar-md flex-shrink-0 me-2">
                                        <img src="{{URL::asset('build/img/icons/transaction-01.svg')}}" class="rounded-circle" alt="img">
                                    </a>
                                    <div>
                                        <h6 class="fs-14 fw-semibold mb-1"><a href="javascript:void(0);">Andrew James</a></h6>
                                        <p class="fs-13"><a href="{{url('invoice-details')}}" class="link-default">#INV45478</a></p>
                                    </div>
                                </div>
                                <div>
                                    <p class="mb-0 fs-13"> Amount </p>
                                    <p class="mb-0 fs-14 fw-semibold text-gray-9"> $417 </p>
                                </div>
                                <div class="text-end">
                                    <span class="badge badge-sm badge-soft-success"> Paid <i class="isax isax-tick-circle fs-10 fw-semibold ms-1"></i></span>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                    <!-- End Payment -->

                    <!-- Start Recent Activities -->
                    <div class="card flex-fill overflow-hidden">
                        <div class="card-body pb-0">
                            <div class="mb-0">
                                <h6 class="mb-1 pb-3 mb-3 border-bottom">Recent Activities</h6>
                                <div class="recent-activities recent-activities-two">
                                    <div class="d-flex align-items-center pb-3">
                                        <span class="border z-1 border-primary rounded-circle flex-shrink-0 d-flex align-items-center justify-content-center bg-white p-1"><i class="fa fa-circle fs-8 text-primary"></i></span>
                                        <div class="recent-activities-flow">
                                            <p class="mb-1">Status Changed to <span class="text-gray-9 fw-semibold">Partially Paid</span></p>
                                            <p class="mb-0 d-inline-flex align-items-center fs-13"><i class="isax isax-calendar-25 me-1"></i>19 Jan 2025</p>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center pb-3">
                                        <span class="border z-1 border-primary rounded-circle flex-shrink-0 d-flex align-items-center justify-content-center bg-white p-1"><i class="fa fa-circle fs-8 text-primary"></i></span>
                                        <div class="recent-activities-flow">
                                            <p class="mb-1"><span class="text-gray-9 fw-semibold">$300</span> Partial Amount Paid on <span class="text-gray-9 fw-semibold">Paypal</span></p>
                                            <p class="mb-0 d-inline-flex align-items-center fs-13"><i class="isax isax-calendar-25 me-1"></i>18 Jan 2025</p>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center pb-3">
                                        <span class="border z-1 border-primary rounded-circle flex-shrink-0 d-flex align-items-center justify-content-center bg-white p-1"><i class="fa fa-circle fs-8 text-primary"></i></span>
                                        <div class="recent-activities-flow">
                                            <p class="mb-1">New Expenses added <span class="text-gray-9 fw-semibold">#TR018756</span></p>
                                            <p class="mb-0 d-inline-flex align-items-center fs-13"><i class="isax isax-calendar-25 me-1"></i>18 Jan 2025</p>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center pb-3">
                                        <span class="border z-1 border-primary rounded-circle flex-shrink-0 d-flex align-items-center justify-content-center bg-white p-1"><i class="fa fa-circle fs-8 text-primary"></i></span>
                                        <div class="recent-activities-flow">
                                            <p class="mb-1">Estimate Created <span class="text-gray-9 fw-semibold">#ES458789</span></p>
                                            <p class="mb-0 d-inline-flex align-items-center fs-13"><i class="isax isax-calendar-25 me-1"></i>17 Jan 2025</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end card body -->
                        <a href="javascript:void(0);" class="btn w-100 fs-14 py-2 shadow-lg fw-medium">View All</a>
                    </div><!-- end card -->
                    <!-- End Recent Activities -->
                </div>
            </div>
            <!-- end row -->

            @component('components.footer')
            @endcomponent
        </div>
        <!-- End Content -->

    </div>

    <!-- ========================
        End Page Content
    ========================= -->
@endsection