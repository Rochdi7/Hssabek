<?php $page = 'expense-report'; ?>
@extends('layout.mainlayout')
@section('content')
    <!-- ========================
        Start Page Content
    ========================= -->
    <div class="page-wrapper">	
        <!-- Start Content -->
        <div class="content content-two">

            <!-- Breadcrumb -->
            <div class="d-flex d-block align-items-center justify-content-between flex-wrap gap-3 mb-3">
                <div>
                    <h6 class="mb-0">Expense Report</h6>
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
            <!-- /Breadcrumb -->

            <div class="row">
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="card position-relative">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <div>
                                    <p class="mb-1">Total Expense</p>
                                    <h6 class="fs-16 fw-semibold mb-0">$750,000</h6>
                                </div>
                                <div>
                                    <div class="chart-set" id="radial-chart10"></div>
                                </div>
                            </div>
                            <div class="bg-light py-2 px-3 rounded">
                                <p class="fs-13 mb-0">
                                    <span class="text-success"><i class="isax isax-send text-success me-1"></i>5.62%</span> from last month
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="card position-relative">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <div>
                                    <p class="mb-1">Approved Expense</p>
                                    <h6 class="fs-16 fw-semibold mb-0">$550,000</h6>
                                </div>
                                <div>
                                    <div class="chart-set" id="radial-chart7"></div>
                                </div>
                            </div>
                            <div class="bg-light py-2 px-3 rounded">
                                <p class="fs-13 mb-0">
                                    <span class="text-success"><i class="isax isax-send text-success me-1"></i>11.4%</span> from last month
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="card position-relative">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <div>
                                    <p class="mb-1">Pending Expense</p>
                                    <h6 class="fs-16 fw-semibold mb-0">$150,000</h6>
                                </div>
                                <div>
                                    <div class="chart-set" id="radial-chart8"></div>
                                </div>
                            </div>
                            <div class="bg-light py-2 px-3 rounded">
                                <p class="fs-13 mb-0">
                                    <span class="text-success"><i class="isax isax-send text-success me-1"></i>8.12%</span> from last month
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="card position-relative">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <div>
                                    <p class="mb-1">Rejected Expense</p>
                                    <h6 class="fs-16 fw-semibold mb-0">$50,000</h6>
                                </div>
                                <div>
                                    <div class="chart-set" id="radial-chart9"></div>
                                </div>
                            </div>
                            <div class="bg-light py-2 px-3 rounded">
                                <p class="fs-13 mb-0">
                                    <span class="text-success"><i class="isax isax-send text-success me-1"></i>7.45%</span> from last month
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Table Search -->
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
                                        <input class="form-check-input m-0 me-2" type="checkbox" checked>
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
                                <li>
                                    <label class="dropdown-item d-flex align-items-center form-switch">
                                        <i class="fa-solid fa-grip-vertical me-3 text-default"></i>
                                        <input class="form-check-input m-0 me-2" type="checkbox" checked>
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
                    <span class="tag bg-light border rounded-1 fs-12 text-dark badge"><span class="num-count d-inline-flex align-items-center justify-content-center bg-success fs-10 me-1">2</span>Status Selected<span class="ms-1 tag-close"><i class="fa-solid fa-x fs-10"></i></span></span>											
                    <a href="#" class="link-danger fw-medium text-decoration-underline ms-md-1">Clear All</a>
                </div>
                <!-- /Filter Info -->			
            </div>
            <!-- /Table Search -->
            
            
            <!-- Table List -->
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
                            <th class="no-sort">Attachment</th>
                            <th>Amount</th>
                            <th class="no-sort">Payment Mode</th>
                            <th class="no-sort">Status</th>
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
                                <a href="javascript:void(0);" class="link-default">EXP00025</a>
                            </td>
                            <td>22 Feb 2025</td>
                            <td>PO-202402-012</td>
                            <td>Payment for raw materials</td>
                            <td>
                                <span class="badge badge-soft-light d-inline-flex align-items-center text-dark"><i class="isax isax-document-text5"></i></span>
                            </td>
                            <td class="text-dark">$10,000</td>
                            <td class="text-dark">Cash</td>
                            <td>
                                <span class="badge badge-soft-success d-inline-flex align-items-center">Paid <i class="isax isax-tick-circle ms-1"></i></span>
                            </td>						
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check form-check-md">
                                    <input class="form-check-input" type="checkbox">
                                </div>
                            </td>
                            <td>
                                <a href="javascript:void(0);" class="link-default">EXP00024</a>
                            </td>
                            <td>07 Feb 2025</td>
                            <td>INV00025</td>
                            <td>Purchase of packaging materials</td>
                            <td>
                                <span class="badge badge-soft-light d-inline-flex align-items-center text-dark"><i class="isax isax-document-text5"></i></span>
                            </td>
                            <td class="text-dark">$25,750</td>
                            <td class="text-dark fw-medium">Cheque</td>
                            <td>
                                <span class="badge badge-soft-warning d-inline-flex align-items-center">Pending <i class="isax isax-timer ms-1"></i></span>
                            </td>						
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check form-check-md">
                                    <input class="form-check-input" type="checkbox">
                                </div>
                            </td>
                            <td>
                                <a href="javascript:void(0);" class="link-default">EXP00023</a>
                            </td>
                            <td>30 Jan 2025</td>
                            <td>PO-202401-011</td>
                            <td>Payment for electronic components</td>
                            <td>
                                <span class="badge badge-soft-light d-inline-flex align-items-center text-dark"><i class="isax isax-document-text5"></i></span>
                            </td>
                            <td class="text-dark">$50,125</td>
                            <td class="text-dark">Cash</td>
                            <td>
                                <span class="badge badge-soft-danger d-inline-flex align-items-center">Cancelled <i class="isax isax-close-circle ms-1"></i></span>
                            </td>						
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check form-check-md">
                                    <input class="form-check-input" type="checkbox">
                                </div>
                            </td>
                            <td>
                                <a href="javascript:void(0);" class="link-default">EXP00022</a>
                            </td>
                            <td>17 Jan 2025</td>
                            <td>REF12345</td>
                            <td>Social media ad campaign</td>
                            <td>
                                <span class="badge badge-soft-light d-inline-flex align-items-center text-dark"><i class="isax isax-document-text5"></i></span>
                            </td>
                            <td class="text-dark">$75,900</td>
                            <td class="text-dark fw-medium">Cheque</td>
                            <td>
                                <span class="badge badge-soft-success d-inline-flex align-items-center">Paid <i class="isax isax-tick-circle ms-1"></i></span>
                            </td>						
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check form-check-md">
                                    <input class="form-check-input" type="checkbox">
                                </div>
                            </td>
                            <td>
                                <a href="javascript:void(0);" class="link-default">EXP00021</a>
                            </td>
                            <td>04 Jan 2025</td>
                            <td>REF18294</td>
                            <td>Business trip for sales meeting</td>
                            <td>
                                <span class="badge badge-soft-light d-inline-flex align-items-center text-dark"><i class="isax isax-document-text5"></i></span>
                            </td>
                            <td class="text-dark">$99,999</td>
                            <td class="text-dark fw-medium">Cheque</td>	
                            <td>
                                <span class="badge badge-soft-warning d-inline-flex align-items-center">Pending <i class="isax isax-timer ms-1"></i></span>
                            </td>											
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check form-check-md">
                                    <input class="form-check-input" type="checkbox">
                                </div>
                            </td>
                            <td>
                                <a href="javascript:void(0);" class="link-default">EXP00020</a>
                            </td>
                            <td>09 Dec 2025</td>
                            <td>PO-202412-010</td>
                            <td>Wholesale purchase of inventory</td>
                            <td>
                                <span class="badge badge-soft-light d-inline-flex align-items-center text-dark"><i class="isax isax-document-text5"></i></span>
                            </td>
                            <td class="text-dark">$1,20,500</td>
                            <td class="text-dark">Cash</td>
                            <td>
                                <span class="badge badge-soft-danger d-inline-flex align-items-center">Cancelled <i class="isax isax-close-circle ms-1"></i></span>
                            </td>						
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check form-check-md">
                                    <input class="form-check-input" type="checkbox">
                                </div>
                            </td>
                            <td>
                                <a href="javascript:void(0);" class="link-default">EXP00019</a>
                            </td>
                            <td>02 Dec 2024</td>
                            <td>UTI20241219</td>
                            <td>Electricity bill</td>
                            <td>
                                <span class="badge badge-soft-light d-inline-flex align-items-center text-dark"><i class="isax isax-document-text5"></i></span>
                            </td>
                            <td class="text-dark">$2,50,000</td>
                            <td class="text-dark">Cash</td>	
                            <td>
                                <span class="badge badge-soft-success d-inline-flex align-items-center">Paid <i class="isax isax-tick-circle ms-1"></i></span>
                            </td>					
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check form-check-md">
                                    <input class="form-check-input" type="checkbox">
                                </div>
                            </td>
                            <td>
                                <a href="javascript:void(0);" class="link-default">EXP00018</a>
                            </td>
                            <td>15 Nov 2024</td>
                            <td>PO-202411-008</td>
                            <td>Purchase of office furniture</td>
                            <td>
                                <span class="badge badge-soft-light d-inline-flex align-items-center text-dark"><i class="isax isax-document-text5"></i></span>
                            </td>
                            <td class="text-dark">$5,00,750</td>
                            <td class="text-dark fw-medium">Cheque</td>
                            <td>
                                <span class="badge badge-soft-warning d-inline-flex align-items-center">Pending <i class="isax isax-timer ms-1"></i></span>
                            </td>						
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check form-check-md">
                                    <input class="form-check-input" type="checkbox">
                                </div>
                            </td>
                            <td>
                                <a href="javascript:void(0);" class="link-default">EXP00017</a>
                            </td>
                            <td>30 Nov 2024</td>
                            <td>PO-202411-007</td>
                            <td>Purchase of manufacturing tools</td>
                            <td>
                                <span class="badge badge-soft-light d-inline-flex align-items-center text-dark"><i class="isax isax-document-text5"></i></span>
                            </td>
                            <td class="text-dark">$7,50,300</td>
                            <td class="text-dark fw-medium">Cheque</td>	
                            <td>
                                <span class="badge badge-soft-danger d-inline-flex align-items-center">Cancelled <i class="isax isax-close-circle ms-1"></i></span>
                            </td>											
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check form-check-md">
                                    <input class="form-check-input" type="checkbox">
                                </div>
                            </td>
                            <td>
                                <a href="javascript:void(0);" class="link-default">EXP00016</a>
                            </td>
                            <td>12 Oct 2024</td>
                            <td>REF17420</td>
                            <td>Server maintenance costs</td>
                            <td>
                                <span class="badge badge-soft-light d-inline-flex align-items-center text-dark"><i class="isax isax-document-text5"></i></span>
                            </td>
                            <td class="text-dark">$9,99,999</td>
                            <td class="text-dark">cash</td>	
                            <td>
                                <span class="badge badge-soft-success d-inline-flex align-items-center">Paid <i class="isax isax-tick-circle ms-1"></i></span>
                            </td>						
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check form-check-md">
                                    <input class="form-check-input" type="checkbox">
                                </div>
                            </td>
                            <td>
                                <a href="javascript:void(0);" class="link-default">EXP00015</a>
                            </td>
                            <td>05 Oct 2024</td>
                            <td>REF16302</td>
                            <td>Digital marketing campaign</td>
                            <td>
                                <span class="badge badge-soft-light d-inline-flex align-items-center text-dark"><i class="isax isax-document-text5"></i></span>
                            </td>
                            <td class="text-dark">$87,650</td>
                            <td class="text-dark fw-medium">Cheque</td>
                            <td>
                                <span class="badge badge-soft-warning d-inline-flex align-items-center">Pending <i class="isax isax-timer ms-1"></i></span>
                            </td>							
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check form-check-md">
                                    <input class="form-check-input" type="checkbox">
                                </div>
                            </td>
                            <td>
                                <a href="javascript:void(0);" class="link-default">EXP00014</a>
                            </td>
                            <td>09 Sep 2024</td>
                            <td>REF15035</td>
                            <td>Equipment repairs and servicing</td>
                            <td>
                                <span class="badge badge-soft-light d-inline-flex align-items-center text-dark"><i class="isax isax-document-text5"></i></span>
                            </td>
                            <td class="text-dark">$69,420</td>
                            <td class="text-dark">Cash</td>
                            <td>
                                <span class="badge badge-soft-danger d-inline-flex align-items-center">Cancelled <i class="isax isax-close-circle ms-1"></i></span>
                            </td>						
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check form-check-md">
                                    <input class="form-check-input" type="checkbox">
                                </div>
                            </td>
                            <td>
                                <a href="javascript:void(0);" class="link-default">EXP00013</a>
                            </td>
                            <td>02 Sep 2024</td>
                            <td>REF14710</td>
                            <td>Renovation of office workspace</td>
                            <td>
                                <span class="badge badge-soft-light d-inline-flex align-items-center text-dark"><i class="isax isax-document-text5"></i></span>
                            </td>
                            <td class="text-dark">$33,210</td>
                            <td class="text-dark fw-medium">Cheque</td>	
                            <td>
                                <span class="badge badge-soft-success d-inline-flex align-items-center">Paid <i class="isax isax-tick-circle ms-1"></i></span>
                            </td>					
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check form-check-md">
                                    <input class="form-check-input" type="checkbox">
                                </div>
                            </td>
                            <td>
                                <a href="javascript:void(0);" class="link-default">EXP00012</a>
                            </td>
                            <td>07 Aug 2024</td>
                            <td>INV00020</td>
                            <td>Bulk order freight costs</td>
                            <td>
                                <span class="badge badge-soft-light d-inline-flex align-items-center text-dark"><i class="isax isax-document-text5"></i></span>
                            </td>
                            <td class="text-dark">$2,10,000</td>
                            <td class="text-dark fw-medium">Cheque</td>
                            <td>
                                <span class="badge badge-soft-warning d-inline-flex align-items-center">Pending <i class="isax isax-timer ms-1"></i></span>
                            </td>							
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- /Table List -->

        </div>
        <!-- End container -->

        <!-- Start Footer-->
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
                                        <i class="fa-solid fa-circle fs-6 text-warning me-1"></i>Pending
                                    </label>
                                </li>
                                <li>
                                    <label class="dropdown-item px-2 d-flex align-items-center text-dark">
                                        <input class="form-check-input m-0 me-2" type="checkbox">
                                        <i class="fa-solid fa-circle fs-6 text-danger me-1"></i>Cancelled
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