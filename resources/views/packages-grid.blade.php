<?php $page = 'packages-grid'; ?>
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
                                <a href="{{url('packages')}}" class="btn btn-icon btn-sm border rounded me-1"><i class="isax isax-menu-1"></i></a>
                                <a href="{{url('packages-grid')}}" class="btn btn-icon border rounded btn-sm active bg-primary text-white"><i class="isax isax-grid-2"></i></a>
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
                                        <p class="fs-12 fw-medium mb-1 text-truncate">Total Plans</p>
                                        <h4>08</h4>
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
                                        <p class="fs-12 fw-medium mb-1 text-truncate">Active Plans</p>
                                        <h4>07</h4>
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


                    <!-- Start Inactive Plans -->
                    <div class="col-lg-3 col-md-6 d-flex">
                        <div class="card flex-fill">
                            <div class="card-body d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center overflow-hidden">
                                    <div>
                                        <p class="fs-12 fw-medium mb-1 text-truncate">Inactive Plans</p>
                                        <h4>0</h4>
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
                    <!-- End Inactive Companies -->

                    <!-- Start No of Plans  -->
                    <div class="col-lg-3 col-md-6 d-flex">
                        <div class="card flex-fill">
                            <div class="card-body d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center overflow-hidden">
                                    <div>
                                        <p class="fs-12 fw-medium mb-1 text-truncate">No of Plan Types</p>
                                        <h4>04</h4>
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
                    <!-- End No of Plans -->

                </div>
                <!-- end row -->

                <!-- Start Pricing -->
                <div>
                    <div class="d-flex justify-content-center align-items-center mb-3">
                        <p class="mb-0 me-2">Monthly</p>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" checked>
                        </div>
                        <p>Yearly</p>
                    </div>
                    <!-- start row -->
                    <div class="row justify-content-center">
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 px-0">
                            <div class="card border rounded mb-3">
                                <div class="card-body">
                                    <div class="pricing-content mb-3">
                                        <div class="mb-3">
                                            <h6 class="fs-14">Basic</h6>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mb-2">
                                            <h3>$99<span class="fs-14 fw-normal text-gray me-2">/month</span></h3>
                                            <span class="p-1 bg-info rounded text-white">Only 10 Users</span>
                                        </div>
                                        <p class="mb-2">Best for Freelancers & small businesses needs simple invoicing.</p>
                                        <a href="javascript:void(0);" class="btn btn-white border w-100 mb-3"><i class="isax isax-shopping-cart me-1"></i> Buy Plan</a>
                                        <div class="price-hdr">
                                            <h6 class="fs-14 fw-medium text-gray me-2 ms-2">FEATURES</h6>
                                        </div>
                                    </div>
                                    <div class="border-bottom mt-3 mb-3">
                                        <div>
                                            <span class="text-dark d-flex align-items-center mb-3">
												<i class="isax isax-tick-circle text-success me-2"></i>
												1 Business Account + 1 User
											</span>
                                            <span class="text-dark d-flex align-items-center mb-3">
												<i class="isax isax-tick-circle text-success me-2"></i>
												14+ Invoice templates
											</span>
                                            <span class="text-dark d-flex align-items-center mb-3">
												<i class="isax isax-tick-circle text-success me-2"></i>
												Collect Online Payments
											</span>
                                            <span class="text-dark d-flex align-items-center mb-3">
												<i class="isax isax-tick-circle text-success me-2"></i>
												40+ Reports & Insights
											</span>
                                            <span class="text-dark d-flex align-items-center mb-3">
												<i class="isax isax-tick-circle text-success me-2"></i>
												Variants
											</span>
                                            <span class="text-dark d-flex align-items-center mb-3">
												<i class="isax isax-tick-circle text-success me-2"></i>
												Add custom fields & charges
											</span>
                                            <span class="text-dark d-flex align-items-center mb-3">
												<i class="isax isax-tick-circle text-success me-2"></i>
												Convert documents
											</span>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <a href="javascript:void(0);" class="btn btn-sm btn-light d-inline-flex align-items-center justify-content-center p-1 me-2" data-bs-toggle="modal" data-bs-target="#edit_plans"><i class="isax isax-edit"></i></a>
                                        <a href="javascript:void(0);" class="btn btn-sm btn-light d-inline-flex align-items-center justify-content-center p-1" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash"></i></a>
                                    </div>
                                </div>
                                <!-- end card body -->
                            </div>
                            <!-- end card -->
                        </div>
                        <!-- end col -->

                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 px-1">
                            <div class="card border rounded mb-3">
                                <div class="card-body">
                                    <div class="pricing-content mb-3">
                                        <div class="mb-3">
                                            <h6 class="fs-14">Standard</h6>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mb-2">
                                            <h3>$199<span class="fs-14 fw-normal text-gray me-2">/month</span></h3>
                                            <span class="p-1 bg-info rounded text-white">Only 50 Users</span>
                                        </div>
                                        <p class="mb-2">Growing businesses managing recurring invoices & reports.</p>
                                        <a href="javascript:void(0);" class="btn btn-white border w-100 mb-3"><i class="isax isax-shopping-cart me-1"></i> Buy Plan</a>
                                        <div class="price-hdr">
                                            <h6 class="fs-14 fw-medium text-gray me-2 ms-2">FEATURES</h6>
                                        </div>
                                    </div>
                                    <div class="border-bottom mt-3 mb-3">
                                        <div>
                                            <span class="text-dark d-flex align-items-center mb-3">
												<i class="isax isax-tick-circle text-success me-2"></i>
												1 Business Account + 1 User
											</span>
                                            <span class="text-dark d-flex align-items-center mb-3">
												<i class="isax isax-tick-circle text-success me-2"></i>
												Bulk downloads
											</span>
                                            <span class="text-dark d-flex align-items-center mb-3">
												<i class="isax isax-tick-circle text-success me-2"></i>
												Multiple Price lists
											</span>
                                            <span class="text-dark d-flex align-items-center mb-3">
												<i class="isax isax-tick-circle text-success me-2"></i>
												User Activity
											</span>
                                            <span class="text-dark d-flex align-items-center mb-3">
												<i class="isax isax-tick-circle text-success me-2"></i>
												Bulk edits
											</span>
                                            <span class="text-dark d-flex align-items-center mb-3">
												<i class="isax isax-tick-circle text-success me-2"></i>
												Multiple Warehouses
											</span>
                                            <span class="text-dark d-flex align-items-center mb-3">
												<i class="isax isax-tick-circle text-success me-2"></i>
												Online Store
											</span>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <a href="javascript:void(0);" class="btn btn-sm btn-light d-inline-flex align-items-center justify-content-center p-1 me-2" data-bs-toggle="modal" data-bs-target="#edit_plans"><i class="isax isax-edit"></i></a>
                                        <a href="javascript:void(0);" class="btn btn-sm btn-light d-inline-flex align-items-center justify-content-center p-1" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash"></i></a>
                                    </div>
                                </div>
                                <!-- end card body -->
                            </div>
                            <!-- end card -->
                        </div>
                        <!-- end col -->

                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 px-0">
                            <div class="card border rounded mb-3">
                                <div class="card-body">
                                    <div class="pricing-content mb-3">
                                        <div class="mb-3">
                                            <h6 class="fs-14">Business</h6>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mb-2">
                                            <h3>$299<span class="fs-14 fw-normal text-gray me-2">/month</span></h3>
                                            <span class="p-1 bg-info rounded text-white">Only 75 Users</span>
                                        </div>
                                        <p class="mb-2">Best for Large sales teams requiring automation & integrations.</p>
                                        <a href="javascript:void(0);" class="btn btn-white border w-100 mb-3"><i class="isax isax-shopping-cart me-1"></i> Buy Plan</a>
                                        <div class="price-hdr">
                                            <h6 class="fs-14 fw-medium text-gray me-2 ms-2">FEATURES</h6>
                                        </div>
                                    </div>
                                    <div class="border-bottom mt-3 mb-3">
                                        <div>
                                            <span class="text-dark d-flex align-items-center mb-3">
												<i class="isax isax-tick-circle text-success me-2"></i>
												POS Billing
											</span>
                                            <span class="text-dark d-flex align-items-center mb-3">
												<i class="isax isax-tick-circle text-success me-2"></i>
												Batch & Expiry
											</span>
                                            <span class="text-dark d-flex align-items-center mb-3">
												<i class="isax isax-tick-circle text-success me-2"></i>
												Serial Number/ IMEI Tracking
											</span>
                                            <span class="text-dark d-flex align-items-center mb-3">
												<i class="isax isax-tick-circle text-success me-2"></i>
												Subscription/ Recurring
											</span>
                                            <span class="text-dark d-flex align-items-center mb-3">
												<i class="isax isax-tick-circle text-success me-2"></i>
												Product Grouping
											</span>
                                            <span class="text-dark d-flex align-items-center mb-3">
												<i class="isax isax-tick-circle text-success me-2"></i>
												Additional CESS
											</span>
                                            <span class="text-dark d-flex align-items-center mb-3">
												<i class="isax isax-tick-circle text-success me-2"></i>
												Bank Reconciliation
											</span>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <a href="javascript:void(0);" class="btn btn-sm btn-light d-inline-flex align-items-center justify-content-center p-1 me-2" data-bs-toggle="modal" data-bs-target="#edit_plans"><i class="isax isax-edit"></i></a>
                                        <a href="javascript:void(0);" class="btn btn-sm btn-light d-inline-flex align-items-center justify-content-center p-1" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash"></i></a>
                                    </div>
                                </div>
                                <!-- end card body -->
                            </div>
                            <!-- end card -->
                        </div>
                        <!-- end col -->

                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 px-1">
                            <div class="card border rounded mb-3">
                                <div class="card-body">
                                    <div class="pricing-content mb-3">
                                        <div class="mb-3">
                                            <h6 class="fs-14">Enterprice</h6>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mb-2">
                                            <h3>$399<span class="fs-14 fw-normal text-gray me-2">/month</span></h3>
                                            <span class="p-1 bg-info rounded text-white">Unlimited</span>
                                        </div>
                                        <p class="mb-2">Enterprises with AI insights & advanced workflows.</p>
                                        <a href="javascript:void(0);" class="btn btn-white border w-100 mb-3"><i class="isax isax-shopping-cart me-1"></i> Buy Plan</a>
                                        <div class="price-hdr">
                                            <h6 class="fs-14 fw-medium text-gray me-2 ms-2">FEATURES</h6>
                                        </div>
                                    </div>
                                    <div class="border-bottom mt-3 mb-3">
                                        <div>
                                            <span class="text-dark d-flex align-items-center mb-3">
												<i class="isax isax-tick-circle text-success me-2"></i>
												Add Custom Features
											</span>
                                            <span class="text-dark d-flex align-items-center mb-3">
												<i class="isax isax-tick-circle text-success me-2"></i>
												Custom Column Linking
											</span>
                                            <span class="text-dark d-flex align-items-center mb-3">
												<i class="isax isax-tick-circle text-success me-2"></i>
												Multi Businesses / Branches
											</span>
                                            <span class="text-dark d-flex align-items-center mb-3">
												<i class="isax isax-tick-circle text-success me-2"></i>
												Online Store
											</span>
                                            <span class="text-dark d-flex align-items-center mb-3">
												<i class="isax isax-tick-circle text-success me-2"></i>
												Shiprocket Integration
											</span>
                                            <span class="text-dark d-flex align-items-center mb-3">
												<i class="isax isax-tick-circle text-success me-2"></i>
												Multiple Users
											</span>
                                            <span class="text-dark d-flex align-items-center mb-3">
												<i class="isax isax-tick-circle text-success me-2"></i>
												Multiple Warehouses
											</span>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <a href="javascript:void(0);" class="btn btn-sm btn-light d-inline-flex align-items-center justify-content-center p-1 me-2" data-bs-toggle="modal" data-bs-target="#edit_plans"><i class="isax isax-edit"></i></a>
                                        <a href="javascript:void(0);" class="btn btn-sm btn-light d-inline-flex align-items-center justify-content-center p-1" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash"></i></a>
                                    </div>
                                </div>
                                <!-- end card body -->
                            </div>
                            <!-- end card -->
                        </div>
                        <!-- end col -->

                    </div>
                    <!-- end row -->
                </div>
                <!-- End Pricing -->

            </div>
            <!-- End Content -->

            @component('components.footer')
            @endcomponent


        </div>

        <!-- ========================
			End Page Content
		========================= -->
@endsection