<?php $page = 'cash-flow'; ?>
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
                    <h6 class="mb-0">Cash Flow Report</h6>
                </div>
                <div class="my-xl-auto">
                    <div class="dropdown">
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
            <!-- End Breadcrumb -->

            <div class="border-bottom mb-3">

                <!-- start row -->
                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="card shadow-lg position-relative border-0 border-start border-3 border-primary">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="mb-0 me-2">
                                        <h6 class="fs-16 fw-semibold me-2 mb-1">$5,000,000</h6>
                                        <p class="mb-1 text-truncate">Opening Cash Balance</p>
                                        <p class="fs-13 mb-0 text-truncate">
                                            <span class="text-success"><i class="isax isax-send text-success me-1"></i>5.62%</span> from last month
                                        </p>
                                    </div>
                                    <span class="p-2 bg-primary d-flex align-items-center justify-content-center rounded text-white">
                                        <i class="isax isax-dollar-circle fs-24"></i>
                                    </span>
                                </div>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div><!-- end col -->
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="card shadow-lg position-relative border-0 border-start border-3 border-success">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="mb-0 me-2">
                                        <h6 class="fs-16 fw-semibold mb-1">$7,500,000</h6>
                                        <p class="mb-1 text-truncate">Closing Cash Balance</p>
                                        <p class="fs-13 mb-0 text-truncate">
                                            <span class="text-success"><i class="isax isax-send text-success me-1"></i>11.42%</span> from last month
                                        </p>
                                    </div>
                                    <span class="p-2 bg-success d-flex align-items-center justify-content-center rounded text-white">
                                        <i class="isax isax-money-2 fs-24"></i>
                                    </span>
                                </div>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div><!-- end col -->
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="card shadow-lg position-relative border-0 border-start border-3 border-warning">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="mb-0 me-2">
                                        <h6 class="fs-16 fw-semibold mb-1">+$2,500,000</h6>
                                        <p class="mb-1 text-truncate"> Net Cash Flow</p>
                                        <p class="fs-13 mb-0 text-truncate">
                                            <span class="text-success"><i class="isax isax-send text-success me-1"></i>8.12%</span> from last month
                                        </p>
                                    </div>
                                    <span class="p-2 bg-warning d-flex align-items-center justify-content-center rounded text-white">
                                        <i class="isax isax-wallet-3 fs-24"></i>
                                    </span>
                                </div>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div><!-- end col -->
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="card shadow-lg position-relative border-0 border-start border-3 border-danger">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="mb-0 me-2">
                                        <h6 class="fs-16 fw-semibold me-2 mb-1">60%</h6>
                                        <p class="mb-1 text-truncate">Cash Inflows</p>
                                        <p class="fs-13 mb-0 text-truncate">
                                            <span class="text-success"><i class="isax isax-send text-success me-1"></i>7.45%</span> from last month
                                        </p>
                                    </div>
                                    <span class="p-2 bg-danger d-flex align-items-center justify-content-center rounded text-white">
                                        <i class="isax isax-wallet-money fs-24"></i>
                                    </span>
                                </div>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div><!-- end col -->
                </div>
                <!-- end row -->

            </div>

            <!-- Table Search Start -->
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
                                        <span>Account Holder Name</span>
                                    </label>
                                </li>
                                <li>
                                    <label class="dropdown-item d-flex align-items-center form-switch">
                                        <i class="fa-solid fa-grip-vertical me-3 text-default"></i>
                                        <input class="form-check-input m-0 me-2" type="checkbox" checked>
                                        <span>Bank & Account No</span>
                                    </label>
                                </li>
                                <li>
                                    <label class="dropdown-item d-flex align-items-center form-switch">
                                        <i class="fa-solid fa-grip-vertical me-3 text-default"></i>
                                        <input class="form-check-input m-0 me-2" type="checkbox" checked>
                                        <span>Credit</span>
                                    </label>
                                </li>
                                <li>
                                    <label class="dropdown-item d-flex align-items-center form-switch">
                                        <i class="fa-solid fa-grip-vertical me-3 text-default"></i>
                                        <input class="form-check-input m-0 me-2" type="checkbox">
                                        <span>Debit</span>
                                    </label>
                                </li>
                                <li>
                                    <label class="dropdown-item d-flex align-items-center form-switch">
                                        <i class="fa-solid fa-grip-vertical me-3 text-default"></i>
                                        <input class="form-check-input m-0 me-2" type="checkbox" checked>
                                        <span>Balance</span>
                                    </label>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Filter Info -->
                <div class="align-items-center gap-2 flex-wrap filter-info mt-3">
                    <h6 class="fs-13 fw-semibold">Filters</h6>
                    <span class="tag bg-light border rounded-1 fs-12 text-dark badge"><span class="num-count d-inline-flex align-items-center justify-content-center bg-success fs-10 me-1">6</span>Account Holders Selected<span class="ms-1 tag-close"><i class="fa-solid fa-x fs-10"></i></span></span>
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
                            <th>Date</th>
                            <th>Bank & Account No</th>
                            <th>Description</th>
                            <th>Credit</th>
                            <th>Debit</th>
                            <th><span class="d-flex align-items-center">Account Balance<i class="isax isax-info-circle5 ms-1"></i></span></th>
                            <th><span class="d-flex align-items-center">Total Balance<i class="isax isax-info-circle5 ms-1"></i></span></th>
                            <th>Payment Mode</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="form-check form-check-md">
                                    <input class="form-check-input" type="checkbox">
                                </div>
                            </td>
                            <td>22 Feb 2025</td>
                            <td>GTB - 3298784309485</td>
                            <td>Sale of laptops</td>
                            <td>$15,000</td>
                            <td>$5,000</td>
                            <td>$10,000</td>
                            <td>$10,000</td>
                            <td>Cash</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check form-check-md">
                                    <input class="form-check-input" type="checkbox">
                                </div>
                            </td>
                            <td>07 Feb 2025</td>
                            <td>PNB - 5475878970090</td>
                            <td>Customer Refund</td>
                            <td>$22,500</td>
                            <td>$7,500</td>
                            <td>$15,000</td>
                            <td>$25,750</td>
                            <td>Cheque</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check form-check-md">
                                    <input class="form-check-input" type="checkbox">
                                </div>
                            </td>
                            <td>30 Jan 2025</td>
                            <td>SFB - 3255465758698</td>
                            <td>Office Supplies Bought</td>
                            <td>$30,000</td>
                            <td>$10,000</td>
                            <td>$20,000</td>
                            <td>$50,125</td>
                            <td>Cash</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check form-check-md">
                                    <input class="form-check-input" type="checkbox">
                                </div>
                            </td>
                            <td>17 Jan 2025</td>
                            <td>HSB - 4353689870544</td>
                            <td>Salary Received</td>
                            <td>$12,000</td>
                            <td>$3,000</td>
                            <td>$9,000</td>
                            <td>$75,900</td>
                            <td>Cheque</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check form-check-md">
                                    <input class="form-check-input" type="checkbox">
                                </div>
                            </td>
                            <td>04 Jan 2025</td>
                            <td>ETB - 4324356677889</td>
                            <td>Electricity Bill Paid</td>
                            <td>$18,000</td>
                            <td>$6,000</td>
                            <td>$12,000</td>
                            <td>$99,999</td>
                            <td>Cash</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check form-check-md">
                                    <input class="form-check-input" type="checkbox">
                                </div>
                            </td>
                            <td>09 Dec 2024</td>
                            <td>NPB - 2343547586900</td>
                            <td>Service Fee Collected</td>
                            <td>$25,000</td>
                            <td>$8,000</td>
                            <td>$17,000</td>
                            <td>$1,20,500</td>
                            <td>Cheque</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check form-check-md">
                                    <input class="form-check-input" type="checkbox">
                                </div>
                            </td>
                            <td>02 Dec 2024</td>
                            <td>SDB - 3354456565687</td>
                            <td>Customer Refund</td>
                            <td>$35,000</td>
                            <td>$12,000</td>
                            <td>$23,000</td>
                            <td>$2,50,000</td>
                            <td>Cash</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check form-check-md">
                                    <input class="form-check-input" type="checkbox">
                                </div>
                            </td>
                            <td>15 Nov 2024</td>
                            <td>FEB - 3453647664889</td>
                            <td>Equipment Purchase</td>
                            <td>$40,000</td>
                            <td>$15,000</td>
                            <td>$25,000</td>
                            <td>$5,00,750</td>
                            <td>Cheque</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check form-check-md">
                                    <input class="form-check-input" type="checkbox">
                                </div>
                            </td>
                            <td>30 Nov 2024</td>
                            <td>CCB - 9876543210123</td>
                            <td>Freelance Payment</td>
                            <td>$27,500</td>
                            <td>$15,000</td>
                            <td>$18,000</td>
                            <td>$7,50,300</td>
                            <td>Cash</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check form-check-md">
                                    <input class="form-check-input" type="checkbox">
                                </div>
                            </td>
                            <td>12 Oct 2024</td>
                            <td>PWB - 4567891234567</td>
                            <td>Office Rent Paid</td>
                            <td>$20,000</td>
                            <td>$9,500</td>
                            <td>$13,000</td>
                            <td>$9,99,999</td>
                            <td>Cheque</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check form-check-md">
                                    <input class="form-check-input" type="checkbox">
                                </div>
                            </td>
                            <td>05 Oct 2024</td>
                            <td>ICB - 6543217896543</td>
                            <td>Subscription Sale</td>
                            <td>$45,000</td>
                            <td>$7,000</td>
                            <td>$27,000</td>
                            <td>$87,650</td>
                            <td>Cash</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check form-check-md">
                                    <input class="form-check-input" type="checkbox">
                                </div>
                            </td>
                            <td>09 Sep 2024</td>
                            <td>ECB - 3692581473692</td>
                            <td>Refund Issued</td>
                            <td>$37,500</td>
                            <td>$18,000</td>
                            <td>$23,500</td>
                            <td>$69,420</td>
                            <td>Cheque</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check form-check-md">
                                    <input class="form-check-input" type="checkbox">
                                </div>
                            </td>
                            <td>02 Sep 2024</td>
                            <td>RFB - 3214569873214</td>
                            <td>Inventory Restock</td>
                            <td>$38,000</td>
                            <td>$14,000</td>
                            <td>$24,000</td>
                            <td>$33,210</td>
                            <td>Cash</td>
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
                    <label class="form-label">Date Range</label>
                    <div class="input-group position-relative">
                        <input type="text" class="form-control date-range bookingrange rounded-end h-auto py-1 bg-white">
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
                <div class="offcanvas-footer">
                    <div class="row g-2">
                        <div class="col-6">
                            <a href="#" class="btn btn-outline-white w-100">Reset</a>
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