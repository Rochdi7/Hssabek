<?php $page = 'profit-loss-report'; ?>
@extends('layout.mainlayout')
@section('content')
  
<!-- ========================
			Start Page Content
		========================= -->

        <div class="page-wrapper">
            <!-- Start Container  -->
            <div class="content content-two">

                <!-- Start Breadcrumb -->
                <div class="d-flex d-block align-items-center justify-content-between flex-wrap gap-3 mb-3">
                    <div>
                        <h6 class="mb-0">Profit & Loss Report</h6>
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
                                    <div class="d-flex bg-body-tertiary p-2 rounded-2 align-items-center justify-content-between mb-2">
                                        <div>
                                            <p class="mb-1">Total Revenue</p>
                                            <h6 class="fs-16 fw-semibold mb-0">$250,000</h6>
                                        </div>
                                        <div>
                                            <span class="badge badge-outline-primary p-2 rounded-circle">
												<i class="isax isax-dollar-circle fs-16"></i>
											</span>
                                        </div>
                                    </div>
                                    <p class="fs-13 mb-0">
                                        <span class="text-success"><i class="isax isax-send text-success me-1"></i>5.62%</span> from last month
                                    </p>
                                </div>
                                <!-- end card body -->
                            </div>
                            <!-- end card -->
                        </div>
                        <!-- end col -->
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="card position-relative shadow-lg">
                                <div class="card-body">
                                    <div class="d-flex bg-body-tertiary p-2 rounded-2 align-items-center justify-content-between mb-2">
                                        <div>
                                            <p class="mb-1">Total Expenses</p>
                                            <h6 class="fs-16 fw-semibold mb-0">$100,000</h6>
                                        </div>
                                        <div>
                                            <span class="badge badge-outline-success p-2 rounded-circle">
												<i class="isax isax-bag-2 fs-16"></i>
											</span>
                                        </div>
                                    </div>
                                    <p class="fs-13 mb-0">
                                        <span class="text-success"><i class="isax isax-send text-success me-1"></i>11.4%</span> from last month
                                    </p>
                                </div>
                                <!-- end card body -->
                            </div>
                            <!-- end card -->
                        </div>
                        <!-- end col -->
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="card position-relative shadow-lg">
                                <div class="card-body">
                                    <div class="d-flex bg-body-tertiary p-2 rounded-2 align-items-center justify-content-between mb-2">
                                        <div>
                                            <p class="mb-1">Net Profit</p>
                                            <h6 class="fs-16 fw-semibold mb-0">$400,000</h6>
                                        </div>
                                        <div>
                                            <span class="badge badge-outline-warning rounded-circle p-2">
												<i class="isax isax-wallet-3 fs-16"></i>
											</span>
                                        </div>
                                    </div>
                                    <p class="fs-13 mb-0">
                                        <span class="text-success"><i class="isax isax-send text-success me-1"></i>8.12%</span> from last month
                                    </p>
                                </div>
                                <!-- end card body -->
                            </div>
                            <!-- end card -->
                        </div>
                        <!-- end col -->
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="card position-relative shadow-lg">
                                <div class="card-body">
                                    <div class="d-flex bg-body-tertiary p-2 rounded-2 align-items-center justify-content-between mb-2">
                                        <div>
                                            <p class="mb-1">Profit Margin</p>
                                            <h6 class="fs-16 fw-semibold mb-0">80%</h6>
                                        </div>
                                        <div>
                                            <span class="badge badge-outline-danger p-2 rounded-circle">
												<i class="isax isax-wallet-money fs-16"></i>
											</span>
                                        </div>
                                    </div>
                                    <p class="fs-13 mb-0">
                                        <span class="text-success"><i class="isax isax-send text-success me-1"></i>7.45%</span> from last month
                                    </p>
                                </div>
                                <!-- end card body -->
                            </div>
                            <!-- end card -->
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
                </div>

                <!-- Start Table Search -->
                <div class="mb-3">

                    <div class="d-flex align-items-center gap-2 flex-wrap">
                        <div class="input-icon-start position-relative">
                            <span class="input-icon-addon">
								<i class="isax isax-search-normal"></i>
							</span>
                            <input type="text" class="form-control form-control-sm bg-white" placeholder="Search">
                        </div>
                        <div id="reportrange" class="reportrange-picker d-flex align-items-center">
                            <i class="isax isax-calendar text-gray-5 fs-14 me-1"></i><span class="reportrange-picker-field">19 Apr 25 - 19 Apr 25</span>
                        </div>
                    </div>

                </div>
                <!-- End Table Search -->

                <!-- Start Table List -->
                <div class="table-responsive table-nowrap">
                    <table class="table border mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="no-sort"></th>
                                <th class="no-sort">Jan 2025</th>
                                <th class="no-sort">Feb 2025</th>
                                <th class="no-sort">Mar 2025</th>
                                <th class="no-sort">Apr 2025</th>
                                <th class="no-sort">May 2025</th>
                                <th class="no-sort">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="border-end">
                                    <p class="text-dark fw-semibold">Income</p>
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="border-end">Stripe Sales</td>
                                <td>$25,750</td>
                                <td>$25,750</td>
                                <td>$25,750</td>
                                <td>$25,750</td>
                                <td>$25,750</td>
                                <td>$25,750</td>
                            </tr>
                            <tr>
                                <td class="border-end">Service</td>
                                <td>$50,125</td>
                                <td>$50,125</td>
                                <td>$50,125</td>
                                <td>$50,125</td>
                                <td>$50,125</td>
                                <td>$50,125</td>
                            </tr>
                            <tr>
                                <td class="border-end">Purchase Return</td>
                                <td>$75,900</td>
                                <td>$75,900</td>
                                <td>$75,900</td>
                                <td>$75,900</td>
                                <td>$75,900</td>
                                <td>$75,900</td>
                            </tr>
                            <tr>
                                <td class="bg-light border-end">
                                    <p class="text-dark fw-semibold">Gross Profit</p>
                                </td>
                                <td class="bg-light">
                                    <p class="text-dark fw-semibold">$151,775</p>
                                </td>
                                <td class="bg-light">
                                    <p class="text-dark fw-semibold">$151,775</p>
                                </td>
                                <td class="bg-light">
                                    <p class="text-dark fw-semibold">$151,775</p>
                                </td>
                                <td class="bg-light">
                                    <p class="text-dark fw-semibold">$151,775</p>
                                </td>
                                <td class="bg-light">
                                    <p class="text-dark fw-semibold">$151,775</p>
                                </td>
                                <td class="bg-light">
                                    <p class="text-dark fw-semibold">$151,775</p>
                                </td>
                            </tr>
                            <tr>
                                <td class="border-end">
                                    <p class="text-dark fw-semibold">Expense</p>
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="border-end">Exchange Gain or Losse</td>
                                <td>$25,750</td>
                                <td>$25,750</td>
                                <td>$25,750</td>
                                <td>$25,750</td>
                                <td>$25,750</td>
                                <td>$25,750</td>
                            </tr>
                            <tr>
                                <td class="border-end">Stripe Fees</td>
                                <td>$50,125</td>
                                <td>$50,125</td>
                                <td>$50,125</td>
                                <td>$50,125</td>
                                <td>$50,125</td>
                                <td>$50,125</td>
                            </tr>
                            <tr>
                                <td class="border-end">Purchase Return</td>
                                <td>$75,900</td>
                                <td>$75,900</td>
                                <td>$75,900</td>
                                <td>$75,900</td>
                                <td>$75,900</td>
                                <td>$75,900</td>
                            </tr>
                            <tr>
                                <td class="bg-light border-end">
                                    <p class="text-dark fw-semibold">Total Expense</p>
                                </td>
                                <td class="bg-light">
                                    <p class="text-dark fw-semibold">$99,999</p>
                                </td>
                                <td class="bg-light">
                                    <p class="text-dark fw-semibold">$99,999</p>
                                </td>
                                <td class="bg-light">
                                    <p class="text-dark fw-semibold">$99,999</p>
                                </td>
                                <td class="bg-light">
                                    <p class="text-dark fw-semibold">$99,999</p>
                                </td>
                                <td class="bg-light">
                                    <p class="text-dark fw-semibold">$99,999</p>
                                </td>
                                <td class="bg-light">
                                    <p class="text-dark fw-semibold">$99,999</p>
                                </td>
                            </tr>
                            <tr>
                                <td class="bg-light border-end">
                                    <p class="text-dark fw-semibold">Net Income</p>
                                </td>
                                <td class="bg-light">
                                    <p class="text-dark fw-semibold">$2,69,276</p>
                                </td>
                                <td class="bg-light">
                                    <p class="text-dark fw-semibold">$2,75,638</p>
                                </td>
                                <td class="bg-light">
                                    <p class="text-dark fw-semibold">$2,51,629</p>
                                </td>
                                <td class="bg-light">
                                    <p class="text-dark fw-semibold">$7,96,543</p>
                                </td>
                                <td class="bg-light">
                                    <p class="text-dark fw-semibold">$2,69,276</p>
                                </td>
                                <td class="bg-light">
                                    <p class="text-dark fw-semibold">$2,75,638</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- End Table List -->

            </div>
            <!-- End Container  -->

            @component('components.footer')
            @endcomponent


        </div>
        <!-- ========================
			End Page Content
		========================= -->
@endsection