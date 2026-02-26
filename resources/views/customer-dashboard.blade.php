<?php $page = 'customer-dashboard'; ?>
@extends('layout.mainlayout')
@section('content')
    <!-- ========================
        Start Page Content
    ========================= -->

    <div class="page-wrapper">

        <!-- Start Content -->
        <div class="content">

            <!-- Page Header -->
            <div class="d-flex d-block align-items-center justify-content-between flex-wrap gap-3 mb-3">
                <div>
                    <h6>Dashboard</h6>
                </div>
                <div class="d-flex my-xl-auto right-content align-items-center flex-wrap gap-2">
                    <div id="reportrange" class="reportrange-picker d-flex align-items-center">
                        <i class="isax isax-calendar text-gray-5 fs-14 me-1"></i><span class="reportrange-picker-field">16 Apr 25 - 16 Apr 25</span>
                    </div>
                </div>
            </div>
            <!-- End Page Header -->

            <!-- start row -->
            <div class="row">
                <div class="col-sm-6 col-xl-3 d-flex">
                    <div class="card overflow-hidden z-1 flex-fill">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <div>
                                    <p class="mb-1">Total Invoice</p>
                                    <h6 class="fs-16 fw-semibold"> ₹250,000</h6>
                                </div>
                                <span class="avatar avatar-lg bg-primary text-white avatar-rounded">
                                    <i class="isax isax-dollar-circle fs-24"></i>
                                </span>
                            </div>
                            <p class="fs-13"><span class="text-success d-inline-flex align-items-center"><i class="isax isax-send me-1"></i>5.62%</span> from last month</p>
                        </div><!-- end card body -->
                        <div class="position-absolute start-0 bottom-0 z-n1">
                            <img src="{{URL::asset('build/img/bg/income-report-1.svg')}}" alt="img">
                        </div>
                    </div><!-- end card -->
                </div><!-- end col -->

                <!-- Outstanding -->
                <div class="col-sm-6 col-xl-3 d-flex">
                    <div class="card overflow-hidden z-1 flex-fill">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <div>
                                    <p class="mb-1">Outstanding</p>
                                    <h6 class="fs-16 fw-semibold">₹100,000</h6>
                                </div>
                                <span class="avatar avatar-lg bg-success text-white avatar-rounded">
                                    <i class="isax isax-bag-2 fs-24"></i>
                                </span>
                            </div>
                            <p class="fs-13"><span class="text-success d-inline-flex align-items-center"><i class="isax isax-send me-1"></i>11.4%</span> from last month</p>
                        </div><!-- end card body -->
                        <div class="position-absolute start-0 bottom-0 z-n1">
                            <img src="{{URL::asset('build/img/bg/income-report-2.svg')}}" alt="img">
                        </div>
                    </div><!-- end card -->
                </div>
                <!-- /Outstanding -->

                <!-- Overdue -->
                <div class="col-sm-6 col-xl-3 d-flex">
                    <div class="card overflow-hidden z-1 flex-fill">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <div>
                                    <p class="mb-1">Overdue</p>
                                    <h6 class="fs-16 fw-semibold">₹400,000</h6>
                                </div>
                                <span class="avatar avatar-lg bg-warning text-white avatar-rounded">
                                    <i class="isax isax-wallet-3 fs-24"></i>
                                </span>
                            </div>
                            <p class="fs-13"><span class="text-success d-inline-flex align-items-center"><i class="isax isax-send me-1"></i>8.12%</span> from last month</p>
                        </div><!-- end card body -->
                        <div class="position-absolute start-0 bottom-0 z-n1">
                            <img src="{{URL::asset('build/img/bg/income-report-3.svg')}}" alt="img">
                        </div>
                    </div><!-- end card -->
                </div>
                <!-- /Overdue -->

                <!-- Cancelled -->
                <div class="col-sm-6 col-xl-3 d-flex">
                    <div class="card overflow-hidden z-1 flex-fill">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <div>
                                    <p class="mb-1">Cancelled</p>
                                    <h6 class="fs-16 fw-semibold">₹300,000</h6>
                                </div>
                                <span class="avatar avatar-lg bg-danger text-white avatar-rounded">
                                    <i class="isax isax-wallet-money fs-24"></i>
                                </span>
                            </div>
                            <p class="fs-13"><span class="text-success d-inline-flex align-items-center"><i class="isax isax-send me-1"></i>7.45%</span> from last month</p>
                        </div><!-- end card body -->
                        <div class="position-absolute start-0 bottom-0 z-n1">
                            <img src="{{URL::asset('build/img/bg/income-report-4.svg')}}" alt="img">
                        </div>
                    </div><!-- end card -->
                </div>
                <!-- /Cancelled -->

            </div>
            <!-- end row -->

            <div class="row">

                <!-- Start Sales Analytics -->
                <div class="col-xl-4 d-flex">
                    <div class="card flex-fill">
                        <div class="card-body">
                            <div class="mb-3">
                                <h6 class="mb-1">Invoice Detail</h6>
                            </div>
                            <div class="bg-dark-gradient  p-3 rounded mb-2">
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <h6 class="fs-16 fw-semibold  text-white">#INV215654</h6>
                                    <span class="badge badge-sm badge-danger bg-danger">Due in 8 days</span>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div>
                                            <p class="fs-13 text-light mb-1">Issued On</p>
                                            <h6 class="fs-14 text-white fw-semibold text-truncate">25 Jan 2025</h6>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div>
                                            <p class="fs-13 text-light mb-1">Due Date</p>
                                            <h6 class="fs-14 text-white fw-semibold text-truncate">31 Jan 2025</h6>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div>
                                            <p class="fs-13 text-light mb-1">Recurring</p>
                                            <h6 class="fs-14 text-white fw-semibold text-truncate">Monthly</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card border-0 bg-light mb-3 shadow-none">
                                <div class="card-body">
                                    <div class="mb-3 pb-2 border-bottom">
                                        <p class="text-dark mb-1">Amount <span class="float-end">$565</span></p>
                                        <p class="text-dark mb-1">GST (9%) <span class="float-end">$18</span></p>
                                        <p class="text-dark mb-1">Amount <span class="text-danger float-end">- $18</span></p>
                                    </div>
                                    <h6>Total (USD) <span class="float-end">$596</span></h6>
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="col pt-1">
                                    <a href="javascript:void(0);" class="btn btn-primary w-100 d-flex align-items-center justify-content-center"><i class="isax isax-money-send5 me-1"></i>Pay</a>
                                </div>
                                <div class="col pt-1">
                                    <a href="javascript:void(0);" class="btn btn-dark w-100 d-flex align-items-center justify-content-center"><i class="isax isax-document-download5 me-1"></i>Download</a>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div>
                <!-- End Sales Analytics -->

                <!-- Start Invoice Analytics -->
                <div class="col-xl-4 col-lg-6 d-flex">
                    <div class="card flex-fill">
                        <div class="card-body">
                            <div class="mb-3">
                                <h6 class="mb-1">Payment Statistics</h6>
                            </div>
                            <div class="mb-2">
                                <div id="radial-chart2" class="chart-set"></div>
                            </div>
                            <div class="d-flex align-items-center flex-wrap justify-content-center gap-2 mb-3">
                                <p class="fs-13 text-dark d-flex align-items-center mb-0"><i class="fa-solid fa-square text-success fs-11 me-1"></i>Paid</p>
                                <p class="fs-13 text-dark d-flex align-items-center mb-0"><i class="fa-solid fa-square text-primary fs-11 me-1"></i>Partially</p>
                                <p class="fs-13 text-dark d-flex align-items-center mb-0"><i class="fa-solid fa-square text-warning fs-11 me-1"></i>Unpaid</p>
                                <p class="fs-13 text-dark d-flex align-items-center mb-0"><i class="fa-solid fa-square text-pink fs-11 me-1"></i>Overdue</p>
                            </div>
                            <div class="border rounded p-2 mb-3">
                                <div class="row g-2">
                                    <div class="col d-flex border-end">
                                        <div class="text-center flex-fill">
                                            <p class="fs-13 mb-1">Invoiced</p>
                                            <h6 class="fs-16 fw-semibold">$9965</h6>
                                        </div>
                                    </div>
                                    <div class="col d-flex border-end">
                                        <div class="text-center flex-fill">
                                            <p class="fs-13 mb-1">Paid</p>
                                            <h6 class="fs-16 fw-semibold">$996</h6>
                                        </div>
                                    </div>
                                    <div class="col d-flex border-end">
                                        <div class="text-center flex-fill">
                                            <p class="fs-13 mb-1">Partial</p>
                                            <h6 class="fs-16 fw-semibold">$6562</h6>
                                        </div>
                                    </div>
                                    <div class="col d-flex">
                                        <div class="text-center flex-fill">
                                            <p class="fs-13 mb-1">Unpaid</p>
                                            <h6 class="fs-16 fw-semibold">$478</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between pt-1 gap-3">
                                <p class="mb-0">Updated from the last transaction on Sunday, 24 Mar 2025</p>
                                <a href="javascript:void(0);" class="btn btn-md rounded-2 bg-light flex-shrink-0 fs-16 text-gray-9 border"><i class="isax isax-refresh fs-16"></i></a>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div>
                <!-- End Invoice Analytics -->

                <!-- Start Recent Activities -->
                <div class="col-xl-4 col-lg-6 d-flex">
                    <div class="card flex-fill overflow-hidden">
                        <div class="card-body pb-0">
                            <div class="mb-0">
                                <h6 class="mb-1 pb-3 mb-3 border-bottom">Recent Activities</h6>
                                <div class="recent-activities">
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
                                    <div class="d-flex align-items-center pb-0">
                                        <span class="border z-1 border-primary rounded-circle flex-shrink-0 d-flex align-items-center justify-content-center bg-white p-1"><i class="fa fa-circle fs-8 text-primary"></i></span>
                                        <div class="recent-activities-flow">
                                            <p class="mb-1"><span class="text-gray-9 fw-semibold">$147</span> Partial Amount Paid on <span class="text-gray-9 fw-semibold">Stripe</span></p>
                                            <p class="mb-0 d-inline-flex align-items-center fs-13"><i class="isax isax-calendar-25 me-1"></i>17 Jan 2025</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end card body -->
                        <a href="javascript:void(0);" class="btn w-100 fs-14 py-2 shadow-lg fw-medium">View All</a>
                    </div><!-- end card -->
                </div>
                <!-- End Recent Activities -->

            </div>

            <div class="row">

                <!-- Start Recent Invoices -->
                <div class="col-xl-8 d-flex">
                    <div class="card flex-fill w-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between gap-2 flex-wrap mb-3">
                                <h6 class="mb-1">Recent Invoices</h6>
                                <a href="{{url('customer-invoices')}}" class="btn btn-sm btn-dark mb-1">View all Invoices</a>
                            </div>
                            <div class="table-responsive border recent-invoice-table table-nowrap">
                                <table class="table m-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th>ID</th>
                                            <th>Amount</th>
                                            <th>Paid</th>
                                            <th>Status</th>
                                            <th>Payment Mode</th>
                                            <th>Due Date</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <a href="{{url('customer-invoice-details')}}" class="link-default">INV00025</a>
                                            </td>
                                            <td class="text-dark">$10,000</td>
                                            <td>$5,000</td>
                                            <td>
                                                <span class="badge badge-soft-success badge-sm d-inline-flex align-items-center">Paid<i class="isax isax-tick-circle ms-1"></i></span>
                                            </td>
                                            <td class="text-dark">Cash</td>
                                            <td>04 Mar 2025</td>
                                            <td>
                                                <a href="javascript:void(0);" class="btn btn-sm btn-primary d-inline-flex align-items-center"><i class="isax isax-money-send5 me-1"></i>Pay</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="{{url('customer-invoice-details')}}" class="link-default">INV00024</a>
                                            </td>
                                            <td class="text-dark">$25,750</td>
                                            <td>$10,750</td>
                                            <td>
                                                <span class="badge badge-soft-warning badge-sm d-inline-flex align-items-center">Unpaid<i class="isax isax-slash ms-1"></i></span>
                                            </td>
                                            <td class="text-dark">Check</td>
                                            <td>20 Feb 2025</td>
                                            <td>
                                                <a href="javascript:void(0);" class="btn btn-sm btn-soft-info d-inline-flex align-items-center border-0 text-gray-3"><i class="isax isax-money-send5 me-1"></i>Pay</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="{{url('customer-invoice-details')}}" class="link-default">INV00023</a>
                                            </td>
                                            <td class="text-dark">$1,20,500</td>
                                            <td>$60,000</td>
                                            <td>
                                                <span class="badge badge-soft-danger badge-sm d-inline-flex align-items-center">Cancelled<i class="isax isax-close-circle ms-1"></i></span>
                                            </td>
                                            <td class="text-dark">Check</td>
                                            <td>12 Nov 2024</td>
                                            <td>
                                                <a href="javascript:void(0);" class="btn btn-sm btn-primary d-inline-flex align-items-center"><i class="isax isax-money-send5 me-1"></i>Pay</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="{{url('customer-invoice-details')}}" class="link-default">INV00022</a>
                                            </td>
                                            <td class="text-dark">$7,50,300</td>
                                            <td>$60,000</td>
                                            <td>
                                                <span class="badge badge-soft-info badge-sm d-inline-flex align-items-center">Partially Paid<i class="isax isax-timer ms-1"></i></span>
                                            </td>
                                            <td class="text-dark">Check</td>
                                            <td>25 Oct 2024</td>
                                            <td>
                                                <a href="javascript:void(0);" class="btn btn-sm btn-primary d-inline-flex align-items-center"><i class="isax isax-money-send5 me-1"></i>Pay</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="{{url('customer-invoice-details')}}" class="link-default">INV00016</a>
                                            </td>
                                            <td class="text-dark">$9,99,999</td>
                                            <td>$4,00,000</td>
                                            <td>
                                                <span class="badge badge-soft-info badge-sm d-inline-flex align-items-center">Partially Paid<i class="isax isax-timer ms-1"></i></span>
                                            </td>
                                            <td class="text-dark">Cash</td>
                                            <td>18 Oct 2024</td>
                                            <td>
                                                <a href="javascript:void(0);" class="btn btn-sm btn-primary d-inline-flex align-items-center"><i class="isax isax-money-send5 me-1"></i>Pay</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="{{url('customer-invoice-details')}}" class="link-default">INV00015</a>
                                            </td>
                                            <td class="text-dark">$87,650</td>
                                            <td>$40,000</td>
                                            <td>
                                                <span class="badge badge-soft-success badge-sm d-inline-flex align-items-center">Paid<i class="isax isax-tick-circle ms-1"></i></span>
                                            </td>
                                            <td class="text-dark">Check</td>
                                            <td>22 Sep 2024</td>
                                            <td>
                                                <a href="javascript:void(0);" class="btn btn-sm btn-soft-info d-inline-flex align-items-center border-0 text-gray-3"><i class="isax isax-money-send5 me-1"></i>Pay</a>
                                            </td>
                                        </tr>
                                        <tr class="border-white">
                                            <td>
                                                <a href="{{url('customer-invoice-details')}}" class="link-default">INV00014</a>
                                            </td>
                                            <td class="text-dark">$69,420</td>
                                            <td>$30,000</td>
                                            <td>
                                                <span class="badge badge-soft-info badge-sm d-inline-flex align-items-center">Partially Paid<i class="isax isax-timer ms-1"></i></span>
                                            </td>
                                            <td class="text-dark">Cash</td>
                                            <td>15 Sep 2024</td>
                                            <td>
                                                <a href="javascript:void(0);" class="btn btn-sm btn-primary d-inline-flex align-items-center"><i class="isax isax-money-send5 me-1"></i>Pay</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div>
                <!-- End Recent Invoices -->

                <!-- Start Recent Transactions -->
                <div class="col-xl-4 d-flex">
                    <div class="card flex-fill w-100">
                        <div class="card-body">
                            <div class="mb-0">
                                <h6 class="mb-3">Recent Transactions</h6>
                                <h6 class="fs-14 fw-semibold mb-3">Today</h6>
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <div class="d-flex align-items-center">
                                        <span class="avatar avatar-lg rounded-pill border bg-light p-2 flex-shrink-0"><img src="{{URL::asset('build/img/icons/paypal-icon.svg')}}" alt="img" class="img-fluid"></span>
                                        <div class="ms-2">
                                            <h6 class="fs-14 fw-semibold mb-1">Andrew James</h6>
                                            <p>#INV45478</p>
                                        </div>
                                    </div>
                                    <span class="badge badge-soft-success badge-lg d-inline-flex align-items-center">+ $989.15</span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb-3 border-bottom pb-3">
                                    <div class="d-flex align-items-center">
                                        <span class="avatar avatar-lg rounded-pill border bg-light p-2 flex-shrink-0"><img src="{{URL::asset('build/img/icons/card-icon.svg')}}" alt="img" class="img-fluid"></span>
                                        <div class="ms-2">
                                            <h6 class="fs-14 fw-semibold mb-1">John Carter</h6>
                                            <p>#INV45477</p>
                                        </div>
                                    </div>
                                    <span class="badge badge-soft-danger badge-lg d-inline-flex align-items-center">- $300.12</span>
                                </div>
                                <h6 class="fs-14 fw-semibold mb-3">Yesterday</h6>
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <div class="d-flex align-items-center">
                                        <span class="avatar avatar-lg rounded-pill border bg-light p-2 flex-shrink-0"><img src="{{URL::asset('build/img/icons/card-icon.svg')}}" alt="img" class="img-fluid"></span>
                                        <div class="ms-2">
                                            <h6 class="fs-14 fw-semibold mb-1">Sophia White</h6>
                                            <p>#INV45476</p>
                                        </div>
                                    </div>
                                    <span class="badge badge-soft-success badge-lg d-inline-flex align-items-center">+ $669</span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <span class="avatar avatar-lg rounded-pill border bg-light p-2 flex-shrink-0"><img src="{{URL::asset('build/img/icons/card-icon.svg')}}" alt="img" class="img-fluid"></span>
                                        <div class="ms-2">
                                            <h6 class="fs-14 fw-semibold mb-1">Daniel Martinez</h6>
                                            <p>#INV45475</p>
                                        </div>
                                    </div>
                                    <span class="badge badge-soft-success badge-lg d-inline-flex align-items-center">+ $474.22</span>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div>
                <!-- End Recent Transactions -->

            </div>
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
@endsection