<?php $page = 'admin-dashboard'; ?>
@extends('layout.mainlayout')
@section('content')
    <!-- ========================
        Start Page Content
    ========================= -->

    <div class="page-wrapper">
        <div class="content">

            <!-- Start Breadcrumb -->
            <div class="d-flex d-block align-items-center justify-content-between flex-wrap gap-3 mb-3">
                <div>
                    <h6>Dashboard</h6>
                </div>
                <div class="d-flex my-xl-auto right-content align-items-center flex-wrap gap-2">
                    <div class="dropdown me-1">
                        <a class="btn btn-primary d-flex align-items-center justify-content-center dropdown-toggle" data-bs-toggle="dropdown" href="javascript:void(0);" role="button">
                            Create New
                        </a>
                        <ul class="dropdown-menu dropdown-menu-start">
                            <li>
                                <a href="{{url('add-invoice')}}" class="dropdown-item d-flex align-items-center">
                                    <i class="isax isax-document-text-1 me-2"></i>Invoice
                                </a>
                            </li>
                            <li>
                                <a href="{{url('expenses')}}" class="dropdown-item d-flex align-items-center">
                                    <i class="isax isax-money-send me-2"></i>Expense
                                </a>
                            </li>
                            <li>
                                <a href="{{url('add-credit-notes')}}" class="dropdown-item d-flex align-items-center">
                                    <i class="isax isax-money-add me-2"></i>Credit Notes
                                </a>
                            </li>
                            <li>
                                <a href="{{url('add-debit-notes')}}" class="dropdown-item d-flex align-items-center">
                                    <i class="isax isax-money-recive me-2"></i>Debit Notes
                                </a>
                            </li>
                            <li>
                                <a href="{{url('add-purchases-orders')}}" class="dropdown-item d-flex align-items-center">
                                    <i class="isax isax-document me-2"></i>Purchase Order
                                </a>
                            </li>
                            <li>
                                <a href="{{url('add-quotation')}}" class="dropdown-item d-flex align-items-center">
                                    <i class="isax isax-document-download me-2"></i>Quotation
                                </a>
                            </li>
                            <li>
                                <a href="{{url('add-delivery-challan')}}" class="dropdown-item d-flex align-items-center">
                                    <i class="isax isax-document-forward me-2"></i>Delivery Challan
                                </a>
                            </li>
                        </ul>
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
                    <div id="reportrange" class="reportrange-picker d-flex align-items-center">
                        <i class="isax isax-calendar text-gray-5 fs-14 me-1"></i><span class="reportrange-picker-field">16 Apr 25 - 16 Apr 25</span>
                    </div>
                </div>
            </div>
            <!-- End Breadcrumb -->

            <!-- start row -->
            <div class="row">

                <!-- Start Amount -->
                <div class="col-sm-6 col-xl-3 d-flex">
                    <div class="card overflow-hidden z-1 flex-fill">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between border-bottom mb-2 pb-2">
                                <div>
                                    <p class="mb-1">Amount Due</p>
                                    <h6 class="fs-16 fw-semibold">$25,000</h6>
                                </div>
                                <span class="avatar avatar-lg bg-primary text-white avatar-rounded">
                                    <i class="isax isax-receipt-item fs-16"></i>
                                </span>
                            </div>
                            <p class="fs-13"><span class="text-success d-inline-flex align-items-center"><i class="isax isax-send me-1"></i>5.62%</span> from last month</p>
                        </div> <!-- end card body -->
                        <div class="position-absolute end-0 bottom-0 z-n1">
                            <img src="{{URL::asset('build/img/bg/card-bg-04.svg')}}" alt="img">
                        </div>
                    </div><!-- end card -->
                </div><!-- end col -->
                <!-- End Amount -->

                <!-- Start Customers -->
                <div class="col-sm-6 col-xl-3 d-flex">
                    <div class="card overflow-hidden z-1 flex-fill">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between border-bottom mb-2 pb-2">
                                <div>
                                    <p class="mb-1">Customers</p>
                                    <h6 class="fs-16 fw-semibold">18,500</h6>
                                </div>
                                <span class="avatar avatar-lg bg-success text-white avatar-rounded">
                                    <i class="isax isax-tick-circle fs-16"></i>
                                </span>
                            </div>
                            <p class="fs-13"><span class="text-success d-inline-flex align-items-center"><i class="isax isax-send me-1"></i>11.4%</span> from last month</p>
                        </div><!-- end card body -->
                        <div class="position-absolute end-0 bottom-0 z-n1">
                            <img src="{{URL::asset('build/img/bg/card-bg-05.svg')}}" alt="img">
                        </div>
                    </div><!-- end card -->
                </div><!-- end col -->
                <!-- End Customers -->

                <!-- Start Invoices -->
                <div class="col-sm-6 col-xl-3 d-flex">
                    <div class="card overflow-hidden z-1 flex-fill">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between border-bottom mb-2 pb-2">
                                <div>
                                    <p class="mb-1">Invoices</p>
                                    <h6 class="fs-16 fw-semibold">6,500</h6>
                                </div>
                                <span class="avatar avatar-lg bg-warning text-white avatar-rounded">
                                    <i class="isax isax-timer fs-16"></i>
                                </span>
                            </div>
                            <p class="fs-13"><span class="text-success d-inline-flex align-items-center"><i class="isax isax-send me-1"></i>8.52%</span> from last month</p>
                        </div><!-- end card body -->
                        <div class="position-absolute end-0 bottom-0 z-n1">
                            <img src="{{URL::asset('build/img/bg/card-bg-06.svg')}}" alt="img">
                        </div>
                    </div><!-- end card -->
                </div><!-- end col -->
                <!-- End Invoices -->

                <!-- Start Estimates -->
                <div class="col-sm-6 col-xl-3 d-flex">
                    <div class="card overflow-hidden z-1 flex-fill">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between border-bottom mb-2 pb-2">
                                <div>
                                    <p class="mb-1">Estimates</p>
                                    <h6 class="fs-16 fw-semibold">2,000</h6>
                                </div>
                                <span class="avatar avatar-lg bg-danger text-white avatar-rounded">
                                    <i class="isax isax-information fs-16"></i>
                                </span>
                            </div>
                            <p class="fs-13"><span class="text-danger d-inline-flex align-items-center"><i class="isax isax-received me-1"></i>7.45%</span> from last month</p>
                        </div> <!-- end card body -->
                        <div class="position-absolute end-0 bottom-0 z-n1">
                            <img src="{{URL::asset('build/img/bg/card-bg-07.svg')}}" alt="img">
                        </div>
                    </div><!-- end card -->
                </div><!-- end col -->
                <!-- End Estimates -->

            </div>
            <!-- end row -->

            <!-- start row -->
            <div class="row">

                <!-- Start Sales Analytics -->
                <div class="col-xl-8 d-flex">
                    <div class="card flex-fill">
                        <div class="card-body pb-0">
                            <div class="mb-3 d-flex align-items-center justify-content-between">
                                <h6 class="mb-1">Sales Analytics</h6>
                                <div class="select-sm mb-1">
                                    <select class="select">
                                        <option>Monthly</option>
                                        <option>Weekly</option>
                                        <option>Yearly</option>
                                    </select>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                                <div>
                                    <div class="d-flex align-items-center flex-wrap gap-3">
                                        <div>
                                            <p class="fs-13 mb-1">Total Sales</p>
                                            <h6 class="fs-16 fw-semibold text-primary">$1000</h6>
                                        </div>
                                        <div>
                                            <p class="fs-13 mb-1">Receipts</p>
                                            <h6 class="fs-16 fw-semibold text-success">$2100</h6>
                                        </div>
                                        <div>
                                            <p class="fs-13 mb-1">Expenses</p>
                                            <h6 class="fs-16 fw-semibold text-danger">$300</h6>
                                        </div>
                                        <div>
                                            <p class="fs-13 mb-1">Earnings</p>
                                            <h6 class="fs-16 fw-semibold">$700</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center gap-2">
                                    <p class="fs-13 text-dark d-flex align-items-center mb-0"><i class="fa-solid fa-circle text-info fs-12 me-1"></i>Received </p>
                                    <p class="fs-13 text-dark d-flex align-items-center mb-0"><i class="fa-solid fa-circle text-warning fs-12 me-1"></i>Pending</p>
                                </div>
                            </div>
                            <div id="sales_analytics"></div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->
                <!-- End Sales Analytics -->

                <!-- Start Invoice Analytics -->
                <div class="col-xl-4 d-flex">
                    <div class="card flex-fill">
                        <div class="card-body">
                            <div class="mb-3 d-flex align-items-center justify-content-between">
                                <h6 class="mb-1">Invoice Analytics</h6>
                                <div class="select-sm mb-1">
                                    <select class="select">
                                        <option>Monthly</option>
                                        <option>Weekly</option>
                                        <option>Yearly</option>
                                    </select>
                                </div>
                            </div>
                            <div id="invoice_analytics"></div>
                            <div class="d-flex align-items-center justify-content-around gap-3 mb-3">
                                <p class="fs-13 text-dark d-flex align-items-center mb-0"><i class="fa-solid fa-square text-primary fs-12 me-1"></i>Invoiced </p>
                                <p class="fs-13 text-dark d-flex align-items-center mb-0"><i class="fa-solid fa-square text-success fs-12 me-1"></i>Received</p>
                                <p class="fs-13 text-dark d-flex align-items-center mb-0"><i class="fa-solid fa-square text-warning fs-12 me-1"></i>Pending</p>
                            </div>
                            <div class="border rounded p-2">
                                <div class="row g-2">
                                    <div class="col d-flex border-end ">
                                        <div class="text-center flex-fill">
                                            <p class="fs-13 mb-1">Invoiced</p>
                                            <h6 class="fs-16 fw-semibold">$9965</h6>
                                        </div>
                                    </div>
                                    <div class="col d-flex border-end ">
                                        <div class="text-center flex-fill">
                                            <p class="fs-13 mb-1">Received</p>
                                            <h6 class="fs-16 fw-semibold">$996</h6>
                                        </div>
                                    </div>
                                    <div class="col d-flex">
                                        <div class="text-center flex-fill">
                                            <p class="fs-13 mb-1">Pending</p>
                                            <h6 class="fs-16 fw-semibold">$478</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->
                <!-- End Invoice Analytics -->

            </div>
            <!-- end row -->

            <!-- start row -->
            <div class="row">

                <!-- Start Recent Invoices -->
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between gap-2 flex-wrap mb-3">
                                <h6 class="mb-1">Recent Invoices</h6>
                                <a href="{{url('invoices')}}" class="btn btn-sm btn-dark mb-1">View all</a>
                            </div>
                            <div class="table-responsive border table-nowrap">
                                <table class="table m-0">
                                    <thead>
                                        <tr>
                                            <th>Customer</th>
                                            <th>Amount</th>
                                            <th>Due Date</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <a href="javascript:void(0);" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
                                                        <img src="{{URL::asset('build/img/users/user-25.jpg')}}" class="rounded-circle" alt="img">
                                                    </a>
                                                    <div>
                                                        <h6 class="fs-14 fw-medium mb-0"><a href="javascript:void(0);">Emily Clark</a></h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-dark">$10,000</td>
                                            <td>04 Mar 2025</td>
                                            <td>
                                                <span class="badge badge-soft-success badge-sm d-inline-flex align-items-center">Paid<i class="isax isax-tick-circle ms-1"></i></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <a href="javascript:void(0);" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
                                                        <img src="{{URL::asset('build/img/users/user-19.jpg')}}" class="rounded-circle" alt="img">
                                                    </a>
                                                    <div>
                                                        <h6 class="fs-14 fw-medium mb-0"><a href="javascript:void(0);">John Carter</a></h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-dark">$25,750</td>
                                            <td>20 Feb 2025</td>
                                            <td>
                                                <span class="badge badge-soft-warning badge-sm d-inline-flex align-items-center">Partially Paid<i class="isax isax-slash ms-1"></i></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <a href="javascript:void(0);" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
                                                        <img src="{{URL::asset('build/img/users/user-16.jpg')}}" class="rounded-circle" alt="img">
                                                    </a>
                                                    <div>
                                                        <h6 class="fs-14 fw-medium mb-0"><a href="javascript:void(0);">Sophia White</a></h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-dark">$1,20,500</td>
                                            <td>12 Nov 2024</td>
                                            <td>
                                                <span class="badge badge-soft-danger badge-sm d-inline-flex align-items-center">Overdue<i class="isax isax-close-circle ms-1"></i></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <a href="javascript:void(0);" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
                                                        <img src="{{URL::asset('build/img/users/user-08.jpg')}}" class="rounded-circle" alt="img">
                                                    </a>
                                                    <div>
                                                        <h6 class="fs-14 fw-medium mb-0"><a href="javascript:void(0);">Michael Johnson</a></h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-dark">$7,50,300</td>
                                            <td>25 Oct 2024</td>
                                            <td>
                                                <span class="badge badge-soft-info badge-sm d-inline-flex align-items-center">Sent<i class="isax isax-timer ms-1"></i></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <a href="javascript:void(0);" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
                                                        <img src="{{URL::asset('build/img/users/user-15.jpg')}}" class="rounded-circle" alt="img">
                                                    </a>
                                                    <div>
                                                        <h6 class="fs-14 fw-medium mb-0"><a href="javascript:void(0);">Daniel Martinez</a></h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-dark">$9,99,999</td>
                                            <td>18 Oct 2024</td>
                                            <td>
                                                <span class="badge badge-soft-info badge-sm d-inline-flex align-items-center">Sent<i class="isax isax-timer ms-1"></i></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <a href="javascript:void(0);" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
                                                        <img src="{{URL::asset('build/img/users/user-39.jpg')}}" class="rounded-circle" alt="img">
                                                    </a>
                                                    <div>
                                                        <h6 class="fs-14 fw-medium mb-0"><a href="javascript:void(0);">Charlotte Brown</a></h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-dark">$87,650</td>
                                            <td>22 Sep 2024</td>
                                            <td>
                                                <span class="badge badge-soft-success badge-sm d-inline-flex align-items-center">Paid<i class="isax isax-tick-circle ms-1"></i></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <a href="javascript:void(0);" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
                                                        <img src="{{URL::asset('build/img/users/user-21.jpg')}}" class="rounded-circle" alt="img">
                                                    </a>
                                                    <div>
                                                        <h6 class="fs-14 fw-medium mb-0"><a href="javascript:void(0);">William Parker</a></h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-dark">$69,420</td>
                                            <td>15 Sep 2024</td>
                                            <td>
                                                <span class="badge badge-soft-info badge-sm d-inline-flex align-items-center">Sent<i class="isax isax-timer ms-1"></i></span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->
                <!-- End Recent Invoices -->

                <!-- Start Recent Estimates -->
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between gap-2 flex-wrap mb-3">
                                <h6 class="mb-1">Recent Estimates</h6>
                                <a href="{{url('quotations')}}" class="btn btn-sm btn-dark mb-1">View all</a>
                            </div>
                            <div class="table-responsive border table-nowrap">
                                <table class="table m-0">
                                    <thead>
                                        <tr>
                                            <th>Customer</th>
                                            <th>Expiry Date</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <a href="javascript:void(0);" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
                                                        <img src="{{URL::asset('build/img/users/user-22.jpg')}}" class="rounded-circle" alt="img">
                                                    </a>
                                                    <div>
                                                        <h6 class="fs-14 fw-medium mb-0"><a href="javascript:void(0);">Olivia Harris</a></h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>10 Mar 2020</td>
                                            <td class="text-dark">$24,050</td>
                                            <td>
                                                <span class="badge badge-soft-success badge-sm d-inline-flex align-items-center">Accepted<i class="isax isax-tick-circle ms-1"></i></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <a href="javascript:void(0);" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
                                                        <img src="{{URL::asset('build/img/users/user-05.jpg')}}" class="rounded-circle" alt="img">
                                                    </a>
                                                    <div>
                                                        <h6 class="fs-14 fw-medium mb-0"><a href="javascript:void(0);">David Anderson</a></h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>26 Feb 2025</td>
                                            <td class="text-dark">$16,362</td>
                                            <td>
                                                <span class="badge badge-soft-warning badge-sm d-inline-flex align-items-center">Expired<i class="isax isax-slash ms-1"></i></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <a href="javascript:void(0);" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
                                                        <img src="{{URL::asset('build/img/users/user-38.jpg')}}" class="rounded-circle" alt="img">
                                                    </a>
                                                    <div>
                                                        <h6 class="fs-14 fw-medium mb-0"><a href="javascript:void(0);">Emma Lewis</a></h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>18 Nov 2024</td>
                                            <td class="text-dark">$1,45,355</td>
                                            <td>
                                                <span class="badge badge-soft-info badge-sm d-inline-flex align-items-center">Sent<i class="isax isax-timer ms-1"></i></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <a href="javascript:void(0);" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
                                                        <img src="{{URL::asset('build/img/users/user-03.jpg')}}" class="rounded-circle" alt="img">
                                                    </a>
                                                    <div>
                                                        <h6 class="fs-14 fw-medium mb-0"><a href="javascript:void(0);">Robert Thomas</a></h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>31 Oct 2024</td>
                                            <td class="text-dark">$35,000</td>
                                            <td>
                                                <span class="badge badge-soft-success badge-sm d-inline-flex align-items-center">Accepted<i class="isax isax-tick-circle ms-1"></i></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <a href="javascript:void(0);" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
                                                        <img src="{{URL::asset('build/img/users/user-24.jpg')}}" class="rounded-circle" alt="img">
                                                    </a>
                                                    <div>
                                                        <h6 class="fs-14 fw-medium mb-0"><a href="javascript:void(0);">Isabella Scott</a></h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>24 Oct 2024</td>
                                            <td class="text-dark">$99,999</td>
                                            <td>
                                                <span class="badge badge-soft-warning badge-sm d-inline-flex align-items-center">Expired<i class="isax isax-slash ms-1"></i></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <a href="javascript:void(0);" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
                                                        <img src="{{URL::asset('build/img/users/user-22.jpg')}}" class="rounded-circle" alt="img">
                                                    </a>
                                                    <div>
                                                        <h6 class="fs-14 fw-medium mb-0"><a href="javascript:void(0);">Mia Thompson</a></h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>28 Sep 2024</td>
                                            <td class="text-dark">$1,27,900</td>
                                            <td>
                                                <span class="badge badge-soft-info badge-sm d-inline-flex align-items-center">Sent<i class="isax isax-timer ms-1"></i></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <a href="javascript:void(0);" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
                                                        <img src="{{URL::asset('build/img/users/user-06.jpg')}}" class="rounded-circle" alt="img">
                                                    </a>
                                                    <div>
                                                        <h6 class="fs-14 fw-medium mb-0"><a href="javascript:void(0);">Amelia Robinson</a></h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>21 Sep 2024</td>
                                            <td class="text-dark">$39,280</td>
                                            <td>
                                                <span class="badge badge-soft-success badge-sm d-inline-flex align-items-center">Accepted<i class="isax isax-tick-circle ms-1"></i></span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->
                <!-- End Recent Estimates -->

            </div>
            <!-- end row -->
        </div>


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
@endsection