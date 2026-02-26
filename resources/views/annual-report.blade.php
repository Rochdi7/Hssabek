<?php $page = 'annual-report'; ?>
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
                    <h6 class="mb-0">Annual Report</h6>
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
                        <div class="card position-relative shadow-lg">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between mb-2 pb-1">
                                    <div>
                                        <p class="mb-1">Total Revenue</p>
                                        <h6 class="fs-16 fw-semibold mb-0">$30,000,000</h6>
                                    </div>
                                    <div>
                                        <span class="badge badge-soft-primary p-2 rounded-circle">
                                            <i class="isax isax-maximize-circle fs-24"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="progress mb-2" role="progressbar" aria-label="Basic example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 100%;height: 5px;">
                                    <div class="progress-bar bg-success" style="width: 80%"></div>
                                </div>
                                <p class="fs-13 mb-0">
                                    <span class="text-success"><i class="isax isax-send text-success me-1"></i>5.62%</span> from last month
                                </p>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div><!-- end col -->
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="card position-relative shadow-lg">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between mb-2 pb-1">
                                    <div>
                                        <p class="mb-1">Total Expenses</p>
                                        <h6 class="fs-16 fw-semibold mb-0">$9,000,000</h6>
                                    </div>
                                    <div>
                                        <span class="badge badge-soft-success p-2 rounded-circle">
                                            <i class="isax isax-tick-circle fs-24"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="progress mb-2" role="progressbar" aria-label="Basic example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 100%;height: 5px;">
                                    <div class="progress-bar bg-success" style="width: 80%"></div>
                                </div>
                                <p class="fs-13 mb-0">
                                    <span class="text-success"><i class="isax isax-send text-success me-1"></i>11.4%</span> from last month
                                </p>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div><!-- end col -->
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="card position-relative shadow-lg">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between mb-2 pb-1">
                                    <div>
                                        <p class="mb-1">Net Profit</p>
                                        <h6 class="fs-16 fw-semibold mb-0">$21,000,000</h6>
                                    </div>
                                    <div>
                                        <span class="badge badge-soft-warning p-2 rounded-circle">
                                            <i class="isax isax-info-circle fs-24"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="progress mb-2" role="progressbar" aria-label="Basic example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 100%;height: 5px;">
                                    <div class="progress-bar bg-success" style="width: 80%"></div>
                                </div>
                                <p class="fs-13 mb-0">
                                    <span class="text-success"><i class="isax isax-send text-success me-1"></i>8.52%</span> from last month
                                </p>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div><!-- end col -->
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="card position-relative shadow-lg">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between mb-2 pb-1">
                                    <div>
                                        <p class="mb-1">Profit Margin</p>
                                        <h6 class="fs-16 fw-semibold mb-0">75%</h6>
                                    </div>
                                    <div>
                                        <span class="badge badge-soft-danger p-2 rounded-circle">
                                            <i class="isax isax-dollar-circle fs-24"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="progress mb-2" role="progressbar" aria-label="Basic example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 100%;height: 5px;">
                                    <div class="progress-bar bg-success" style="width: 80%"></div>
                                </div>
                                <p class="fs-13 mb-0">
                                    <span class="text-danger"><i class="isax isax-received me-1"></i>7.45%</span> from last month
                                </p>
                            </div><!-- end card body -->
                        </div>
                        <!-- end card  -->
                    </div><!-- end col -->
                </div>
                <!-- end row -->

            </div>

            <!-- Start Table Search -->
            <div class="mb-3">

                <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                    <div class="d-flex align-items-center gap-2 flex-wrap">
                        <div class="input-icon-start position-relative">
                            <span class="input-icon-addon">
                                <i class="isax isax-search-normal"></i>
                            </span>
                            <input type="text" class="form-control form-control-sm bg-white" placeholder="Search">
                        </div>
                        <div id="reportrange" class="reportrange-picker d-flex align-items-center">
                            <i class="isax isax-calendar text-gray-5 fs-14 me-1"></i><span class="reportrange-picker-field">16 Apr 25 - 16 Apr 25</span>
                        </div>
                    </div>
                </div>

            </div>
            <!-- End Table Search -->

            <!-- Table List Start -->
            <div class="table-responsive table-nowrap">
                <table class="table border mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="no-sort"></th>
                            <th class="no-sort">2019</th>
                            <th class="no-sort">2020</th>
                            <th class="no-sort">2021</th>
                            <th class="no-sort">2022</th>
                            <th class="no-sort">2023</th>
                            <th class="no-sort">2024</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="border-end">January</td>
                            <td>$25,750</td>
                            <td>$25,750</td>
                            <td>$25,750</td>
                            <td>$25,750</td>
                            <td>$25,750</td>
                            <td>$25,750</td>
                        </tr>
                        <tr>
                            <td class="border-end">February</td>
                            <td>$25,750</td>
                            <td>$25,750</td>
                            <td>$25,750</td>
                            <td>$25,750</td>
                            <td>$25,750</td>
                            <td>$25,750</td>
                        </tr>
                        <tr>
                            <td class="border-end">March</td>
                            <td>$50,125</td>
                            <td>$50,125</td>
                            <td>$50,125</td>
                            <td>$50,125</td>
                            <td>$50,125</td>
                            <td>$50,125</td>
                        </tr>
                        <tr>
                            <td class="border-end">April</td>
                            <td>$50,125</td>
                            <td>$50,125</td>
                            <td>$50,125</td>
                            <td>$50,125</td>
                            <td>$50,125</td>
                            <td>$50,125</td>
                        </tr>
                        <tr>
                            <td class="border-end">May</td>
                            <td>$75,900</td>
                            <td>$75,900</td>
                            <td>$75,900</td>
                            <td>$75,900</td>
                            <td>$75,900</td>
                            <td>$75,900</td>
                        </tr>
                        <tr>
                            <td class="border-end">June</td>
                            <td>$75,900</td>
                            <td>$75,900</td>
                            <td>$75,900</td>
                            <td>$75,900</td>
                            <td>$75,900</td>
                            <td>$75,900</td>
                        </tr>
                        <tr>
                            <td class="border-end">July</td>
                            <td>$25,750</td>
                            <td>$25,750</td>
                            <td>$25,750</td>
                            <td>$25,750</td>
                            <td>$25,750</td>
                            <td>$25,750</td>
                        </tr>
                        <tr>
                            <td class="border-end">August</td>
                            <td>$25,750</td>
                            <td>$25,750</td>
                            <td>$25,750</td>
                            <td>$25,750</td>
                            <td>$25,750</td>
                            <td>$25,750</td>
                        </tr>
                        <tr>
                            <td class="border-end">September</td>
                            <td>$50,125</td>
                            <td>$50,125</td>
                            <td>$50,125</td>
                            <td>$50,125</td>
                            <td>$50,125</td>
                            <td>$50,125</td>
                        </tr>
                        <tr>
                            <td class="border-end">October</td>
                            <td>$50,125</td>
                            <td>$50,125</td>
                            <td>$50,125</td>
                            <td>$50,125</td>
                            <td>$50,125</td>
                            <td>$50,125</td>
                        </tr>
                        <tr>
                            <td class="border-end">November</td>
                            <td>$75,900</td>
                            <td>$75,900</td>
                            <td>$75,900</td>
                            <td>$75,900</td>
                            <td>$75,900</td>
                            <td>$75,900</td>
                        </tr>
                        <tr>
                            <td class="border-end">December</td>
                            <td>$75,900</td>
                            <td>$75,900</td>
                            <td>$75,900</td>
                            <td>$75,900</td>
                            <td>$75,900</td>
                            <td>$75,900</td>
                        </tr>
                        <tr>
                            <td class="bg-light border-end">
                                <p class="text-dark fw-semibold">Total</p>
                            </td>
                            <td class="bg-light">
                                <p class="text-dark fw-semibold">$8,75,900</p>
                            </td>
                            <td class="bg-light">
                                <p class="text-dark fw-semibold">$8,29,900</p>
                            </td>
                            <td class="bg-light">
                                <p class="text-dark fw-semibold">$79,19,912</p>
                            </td>
                            <td class="bg-light">
                                <p class="text-dark fw-semibold">$12,75,900</p>
                            </td>
                            <td class="bg-light">
                                <p class="text-dark fw-semibold">$2,19,900</p>
                            </td>
                            <td class="bg-light">
                                <p class="text-dark fw-semibold">$81,97,650</p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- Table List End -->

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