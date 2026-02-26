<?php $page = 'packages'; ?>
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
                        <h6>Packages</h6>
                    </div>
                    <div class="d-flex my-xl-auto right-content align-items-center flex-wrap gap-2">
                        <div class="me-2">
                            <div class="d-flex align-items-center">
                                <a href="{{url('packages')}}" class="btn btn-icon btn-sm active border rounded bg-primary text-white me-1"><i class="isax isax-menu-1"></i></a>
                                <a href="{{url('packages-grid')}}" class="btn btn-icon border rounded btn-sm"><i class="isax isax-grid-2"></i></a>
                            </div>
                        </div>
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
                            <a href="javascript:void(0);" class="btn btn-primary d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#add_plans"><i class="isax isax-add-circle5 me-1"></i>New Plan</a>
                        </div>
                    </div>
                </div>
                <!-- End Breadcrumb -->

                <!-- start row -->
                <div class="row">
                    <div class="col-lg-3 col-md-6 d-flex">
                        <div class="card flex-fill">
                            <div class="card-body d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center overflow-hidden">
                                    <div>
                                        <p class="fs-14 mb-1 text-truncate">Total Plans</p>
                                        <h4 class="fs-16 fw-semibold">08</h4>
                                    </div>
                                </div>
                                <div>
                                    <span class="avatar avatar-lg bg-warning flex-shrink-0">
										<i class="isax isax-box5 fs-32"></i>
									</span>
                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->

                    <div class="col-lg-3 col-md-6 d-flex">
                        <div class="card flex-fill">
                            <div class="card-body d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center overflow-hidden">
                                    <div>
                                        <p class="fs-14 mb-1 text-truncate">Active Plans</p>
                                        <h4 class="fs-16 fw-semibold">07</h4>
                                    </div>
                                </div>
                                <div>
                                    <span class="avatar avatar-lg bg-success flex-shrink-0">
										<i class="isax isax-box-tick5 fs-32"></i>
									</span>
                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->

                    <div class="col-lg-3 col-md-6 d-flex">
                        <div class="card flex-fill">
                            <div class="card-body d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center overflow-hidden">
                                    <div>
                                        <p class="fs-14 mb-1 text-truncate">Inactive Plans</p>
                                        <h4 class="fs-16 fw-semibold">0</h4>
                                    </div>
                                </div>
                                <div>
                                    <span class="avatar avatar-lg bg-danger flex-shrink-0">
										<i class="isax isax-box-remove5 fs-32"></i>
									</span>
                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->

                    <div class="col-lg-3 col-md-6 d-flex">
                        <div class="card flex-fill">
                            <div class="card-body d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center overflow-hidden">
                                    <div>
                                        <p class="fs-14 mb-1 text-truncate">No Of Plan Types</p>
                                        <h4 class="fs-16 fw-semibold">04</h4>
                                    </div>
                                </div>
                                <div>
                                    <span class="avatar avatar-lg bg-info flex-shrink-0">
										<i class="isax isax-box-25 fs-32"></i>
									</span>
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
                        <div class="d-flex align-items-center flex-wrap gap-2">
                            <div class="table-search d-flex align-items-center mb-0">
                                <div class="search-input">
                                    <a href="javascript:void(0);" class="btn-searchset"><i class="isax isax-search-normal fs-12"></i></a>
                                </div>
                            </div>
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
                        </div>
                    </div>
                </div>
                <!-- End Table Search -->

                <!-- Start Table List -->
                <div class="table-responsive no-pagination">
                    <table class="table table-nowrap datatable">
                        <thead class="thead-light">
                            <tr>
                                <th>Plan</th>
                                <th>Plan Type</th>
                                <th>Total Subscribers</th>
                                <th>Amount</th>
                                <th>Created On</th>
                                <th>Status</th>
                                <th class="no-sort"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <a href="javascript:void(0);" class="text-dark">
                                        Basic
                                    </a>
                                </td>
                                <td>
                                    Monthly
                                </td>
                                <td>56</td>
                                <td>$50</td>
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
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#edit_plans"><i class="isax isax-edit me-2"></i>View</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="javascript:void(0);" class="text-dark">
                                        Advance
                                    </a>
                                </td>
                                <td>
                                    Monthly
                                </td>
                                <td>99</td>
                                <td>$200</td>
                                <td>07 Feb 2025</td>
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
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#edit_plans"><i class="isax isax-edit me-2"></i>View</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="javascript:void(0);" class="text-dark">
                                        Premium
                                    </a>
                                </td>
                                <td>
                                    Monthly
                                </td>
                                <td>58</td>
                                <td>$300</td>
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
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#edit_plans"><i class="isax isax-edit me-2"></i>View</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="javascript:void(0);" class="text-dark">
                                        Enterprise
                                    </a>
                                </td>
                                <td>
                                    Monthly
                                </td>
                                <td>67</td>
                                <td>$400</td>
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
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#edit_plans"><i class="isax isax-edit me-2"></i>View</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="javascript:void(0);" class="text-dark">
                                        Basic
                                    </a>
                                </td>
                                <td>
                                    Yearly
                                </td>
                                <td>78</td>
                                <td>$600</td>
                                <td>04 Jan 2025</td>
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
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#edit_plans"><i class="isax isax-edit me-2"></i>View</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="javascript:void(0);" class="text-dark">
                                        Advance
                                    </a>
                                </td>
                                <td>
                                    Yearly
                                </td>
                                <td>52</td>
                                <td>$2400</td>
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
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#edit_plans"><i class="isax isax-edit me-2"></i>View</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="javascript:void(0);" class="text-dark">
                                        Premium
                                    </a>
                                </td>
                                <td>
                                    Yearly
                                </td>
                                <td>60</td>
                                <td>$3600</td>
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
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#edit_plans"><i class="isax isax-edit me-2"></i>View</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="javascript:void(0);" class="text-dark">
                                        Enterprise
                                    </a>
                                </td>
                                <td>
                                    Yearly
                                </td>
                                <td>45</td>
                                <td>$4800</td>
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
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#edit_plans"><i class="isax isax-edit me-2"></i>View</a>
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