<?php $page = 'login'; ?>
@extends('layout.mainlayout')
@section('content')
    <!-- ========================
        Start Page Content
    ========================= -->

    <div class="page-wrapper">

        <!-- Start Content -->
        <div class="content content-two pb-0">

            <!-- Start Breadcrumb -->
            <div class="d-flex d-block align-items-center justify-content-between flex-wrap gap-3 mb-3">
                <div>
                    <h6>Membership</h6>
                </div>
            </div>
            <!-- End Breadcrumb -->

            <ul class="nav nav-tabs nav-bordered mb-3">
                <li class="nav-item"><a class="nav-link active" href="{{url('membership-plans')}}">Membership Plans</a></li>
                <li class="nav-item"><a class="nav-link" href="{{url('membership-addons')}}">Membership Add-ons</a></li>
            </ul>

            <div class="mb-3">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <h6 class="mb-1">Streamline your teamwork. Start free.</h6>
                        <p>Choose the perfect plan for your business needs</p>
                    </div>
                    <div class="d-flex my-xl-auto right-content align-items-center flex-wrap gap-2">
                        <div>
                            <a href="javascript:void(0);" class="btn btn-primary d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#add_modal">
                                <i class="isax isax-add-circle5 me-1"></i>New Plan
                            </a>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Start Pricing -->
            <div class="mb-0">
                <div class="d-flex align-center justify-content-center">
                    <ul class="nav nav-tabs nav-solid-success nav-tabs-rounded mb-3 p-1 rounded-pill bg-light" role="tablist">
                        <li class="nav-item" data-bs-toggle="tooltip" data-placement="top" title="Save 20%"><a class="nav-link active" href="#solid-rounded-tab1" data-bs-toggle="tab">Monthly</a></li>
                        <li class="nav-item"><a class="nav-link" href="#solid-rounded-tab2" data-bs-toggle="tab">Yearly</a></li>
                    </ul>
                </div>
                <!-- Start Tab -->
                <div class="tab-content">
                    <!-- Items-->
                    <div class="tab-pane show active" id="solid-rounded-tab1">
                        <!-- start row -->
                        <div class="row">
                            <div class="col-lg-3 col-md-6 col-sm-12 d-flex">
                                <div class="card pricing-starter flex-fill">
                                    <div class="card-body">
                                        <div class="border-bottom">
                                            <div class="mb-3">
                                                <div class="d-flex align-items-center justify-content-between position-relative">
                                                    <h5 class="mb-1">Free</h5>
                                                </div>
                                                <p>Best for personal use</p>
                                            </div>
                                            <div class="mb-3">
                                                <h3 class="d-flex align-items-center mb-1">$99<span class="fs-14 fw-normal text-gray-9 ms-1">/month</span></h3>
                                                <p>For Only 1 User</p>
                                            </div>
                                        </div>
                                        <div class="mt-3 mb-3">
                                            <div class="mb-1">
                                                <h6 class="fs-16 mb-2">What you get:</h6>
                                            </div>
                                            <div>
                                                <p class="text-dark d-flex align-items-center mb-2 text-truncate"><i class="isax isax-tick-circle me-2"></i>1 Business Account + 1 User</p>
                                                <p class="text-dark d-flex align-items-center mb-2"><i class="isax isax-tick-circle me-2"></i>14+ Invoice templates</p>
                                                <p class="text-dark d-flex align-items-center mb-2 text-truncate"><i class="isax isax-tick-circle me-2"></i>Collect Online Payments</p>
                                                <p class="text-dark d-flex align-items-center mb-2 text-truncate"><i class="isax isax-tick-circle me-2"></i>40+ Reports & Insights</p>
                                                <p class="text-dark d-flex align-items-center mb-2"><i class="isax isax-tick-circle me-2"></i>Variants</p>
                                                <p class="text-dark d-flex align-items-center mb-2 text-truncate"><i class="isax isax-tick-circle me-2"></i>Add custom fields & charges</p>
                                                <p class="text-dark d-flex align-items-center mb-2"><i class="isax isax-tick-circle me-2"></i>Convert documents</p>
                                            </div>
                                        </div>
                                        <a href="javascript:void(0);" class="d-flex align-items-center justify-content-center btn border">
                                            <i class="isax isax-shopping-cart me-1"></i> Buy Plan
                                        </a>
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end col -->

                            <div class="col-lg-3 col-md-6 col-sm-12 d-flex">
                                <div class="card pricing-starter flex-fill">
                                    <div class="card-body">
                                        <div class="border-bottom">
                                            <div class="mb-3">
                                                <div class="d-flex align-items-center justify-content-between position-relative">
                                                    <h5 class="mb-1">Starter</h5>
                                                    <span class="badge bg-success position-absolute top-0 end-0">Most Popular</span>
                                                </div>
                                                <p>Best for personal use</p>
                                            </div>
                                            <div class="mb-3">
                                                <h3 class="d-flex align-items-center mb-1">$199<span class="fs-14 fw-normal text-gray-9 ms-1">/month</span></h3>
                                                <p>Upto 10 User</p>
                                            </div>
                                        </div>
                                        <div class="mt-3 mb-3">
                                            <div class="mb-1">
                                                <h6 class="fs-16 mb-2">What you get:</h6>
                                            </div>
                                            <div>
                                                <p class="text-dark d-flex align-items-center mb-2 text-truncate"><i class="isax isax-tick-circle me-2"></i>1 Business Account + 2 User</p>
                                                <p class="text-dark d-flex align-items-center mb-2"><i class="isax isax-tick-circle me-2"></i>Bulk downloads</p>
                                                <p class="text-dark d-flex align-items-center mb-2 text-truncate"><i class="isax isax-tick-circle me-2"></i>Multiple Price lists</p>
                                                <p class="text-dark d-flex align-items-center mb-2"><i class="isax isax-tick-circle me-2"></i>User Activity</p>
                                                <p class="text-dark d-flex align-items-center mb-2"><i class="isax isax-tick-circle me-2"></i>Bulk edits</p>
                                                <p class="text-dark d-flex align-items-center mb-2 text-truncate"><i class="isax isax-tick-circle me-2"></i>Multiple Warehouses</p>
                                                <p class="text-dark d-flex align-items-center mb-2"><i class="isax isax-tick-circle me-2"></i>Online Store</p>
                                            </div>
                                        </div>
                                        <a href="javascript:void(0);" class="d-flex align-items-center justify-content-center btn border">
                                            <i class="isax isax-bill me-1"></i> Current Plan
                                        </a>
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end col -->

                            <div class="col-lg-3 col-md-6 col-sm-12 d-flex">
                                <div class="card pricing-starter flex-fill">
                                    <div class="card-body">
                                        <div class="border-bottom">
                                            <div class="mb-3">
                                                <div class="d-flex align-items-center justify-content-between position-relative">
                                                    <h5 class="mb-1">Business</h5>
                                                </div>
                                                <p>Best for personal use</p>
                                            </div>
                                            <div class="mb-3">
                                                <h3 class="d-flex align-items-center mb-1">$399<span class="fs-14 fw-normal text-gray-9 ms-1">/month</span></h3>
                                                <p>Upto 75 User</p>
                                            </div>
                                        </div>
                                        <div class="mt-3 mb-3">
                                            <div class="mb-1">
                                                <h6 class="fs-16 mb-2">What you get:</h6>
                                            </div>
                                            <div>
                                                <p class="text-dark d-flex align-items-center mb-2"><i class="isax isax-tick-circle me-2"></i>POS Billing</p>
                                                <p class="text-dark d-flex align-items-center mb-2"><i class="isax isax-tick-circle me-2"></i>Batch & Expiry</p>
                                                <p class="text-dark d-flex align-items-center mb-2 text-truncate"><i class="isax isax-tick-circle me-2"></i>Serial Number/ IMEI Tracking</p>
                                                <p class="text-dark d-flex align-items-center mb-2 text-truncate"><i class="isax isax-tick-circle me-2"></i>Subscription/ Recurring</p>
                                                <p class="text-dark d-flex align-items-center mb-2"><i class="isax isax-tick-circle me-2"></i>Product Grouping</p>
                                                <p class="text-dark d-flex align-items-center mb-2"><i class="isax isax-tick-circle me-2"></i>Additional CESS</p>
                                                <p class="text-dark d-flex align-items-center mb-2"><i class="isax isax-tick-circle me-2"></i>Bank Reconciliation</p>
                                            </div>
                                        </div>
                                        <a href="javascript:void(0);" class="d-flex align-items-center justify-content-center btn border">
                                            <i class="isax isax-shopping-cart me-1"></i> Buy Plan
                                        </a>
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end col -->

                            <div class="col-lg-3 col-md-6 col-sm-12 d-flex">
                                <div class="card pricing-starter flex-fill">
                                    <div class="card-body">
                                        <div class="border-bottom">
                                            <div class="mb-3">
                                                <div class="d-flex align-items-center justify-content-between position-relative">
                                                    <h5 class="mb-1">Enterprise</h5>
                                                </div>
                                                <p>Best for personal use</p>
                                            </div>
                                            <div class="mb-3">
                                                <h3 class="d-flex align-items-center mb-1">$599<span class="fs-14 fw-normal text-gray-9 ms-1">/month</span></h3>
                                                <p>Unlimited Users</p>
                                            </div>
                                        </div>
                                        <div class="mt-3 mb-3">
                                            <div class="mb-1">
                                                <h6 class="fs-16 mb-2">What you get:</h6>
                                            </div>
                                            <div>
                                                <p class="text-dark d-flex align-items-center mb-2"><i class="isax isax-tick-circle me-2"></i>Add Custom Features</p>
                                                <p class="text-dark d-flex align-items-center mb-2"><i class="isax isax-tick-circle me-2"></i>Custom Column Linking</p>
                                                <p class="text-dark d-flex align-items-center mb-2 text-truncate"><i class="isax isax-tick-circle me-2"></i>Multiple Businesses</p>
                                                <p class="text-dark d-flex align-items-center mb-2"><i class="isax isax-tick-circle me-2"></i>Online Store</p>
                                                <p class="text-dark d-flex align-items-center mb-2"><i class="isax isax-tick-circle me-2"></i>Shiprocket Integration</p>
                                                <p class="text-dark d-flex align-items-center mb-2"><i class="isax isax-tick-circle me-2"></i>Multiple Users</p>
                                                <p class="text-dark d-flex align-items-center mb-2"><i class="isax isax-tick-circle me-2"></i>Multiple Warehouses</p>
                                            </div>
                                        </div>
                                        <a href="javascript:void(0);" class="d-flex align-items-center justify-content-center btn border">
                                            <i class="isax isax-shopping-cart me-1"></i> Buy Plan
                                        </a>
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end col -->

                        </div>
                        <!-- End row -->
                    </div>

                    <!-- Items-->
                    <div class="tab-pane" id="solid-rounded-tab2">
                        <!-- start row -->
                        <div class="row">
                            <div class="col-lg-3 col-md-6 col-sm-12 d-flex">
                                <div class="card pricing-starter flex-fill">
                                    <div class="card-body">
                                        <div class="border-bottom">
                                            <div class="mb-3">
                                                <div class="d-flex align-items-center justify-content-between position-relative">
                                                    <h5 class="mb-1">Free</h5>
                                                </div>
                                                <p>Best for personal use</p>
                                            </div>
                                            <div class="mb-3">
                                                <h3 class="d-flex align-items-center mb-1">$699<span class="fs-14 fw-normal text-gray-9 ms-1">/year</span></h3>
                                                <p>For Only 1 User</p>
                                            </div>
                                        </div>
                                        <div class="mt-3 mb-3">
                                            <div class="mb-1">
                                                <h6 class="fs-16 mb-2">What you get:</h6>
                                            </div>
                                            <div>
                                                <p class="text-dark d-flex align-items-center mb-2"><i class="isax isax-tick-circle me-2"></i>1 Business Account + 1 User</p>
                                                <p class="text-dark d-flex align-items-center mb-2"><i class="isax isax-tick-circle me-2"></i>14+ Invoice templates</p>
                                                <p class="text-dark d-flex align-items-center mb-2 text-truncate"><i class="isax isax-tick-circle me-2"></i>Collect Online Payments</p>
                                                <p class="text-dark d-flex align-items-center mb-2"><i class="isax isax-tick-circle me-2"></i>40+ Reports & Insights</p>
                                                <p class="text-dark d-flex align-items-center mb-2"><i class="isax isax-tick-circle me-2"></i>Variants</p>
                                                <p class="text-dark d-flex align-items-center mb-2 text-truncate"><i class="isax isax-tick-circle me-2"></i>Add custom fields & charges</p>
                                                <p class="text-dark d-flex align-items-center mb-2"><i class="isax isax-tick-circle me-2"></i>Convert documents</p>
                                            </div>
                                        </div>
                                        <a href="javascript:void(0);" class="d-flex align-items-center justify-content-center btn border">
                                            <i class="isax isax-shopping-cart me-1"></i> Buy Plan
                                        </a>
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end col -->

                            <div class="col-lg-3 col-md-6 col-sm-12 d-flex">
                                <div class="card pricing-starter flex-fill">
                                    <div class="card-body">
                                        <div class="border-bottom">
                                            <div class="mb-3">
                                                <div class="d-flex align-items-center justify-content-between position-relative">
                                                    <h5 class="mb-1">Starter</h5>
                                                    <span class="badge badge-success position-absolute top-0 end-0">Most Popular</span>
                                                </div>
                                                <p>Best for personal use</p>
                                            </div>
                                            <div class="mb-3">
                                                <h3 class="d-flex align-items-center mb-1">$799<span class="fs-14 fw-normal text-gray-9 ms-1">/year</span></h3>
                                                <p>Upto 10 User</p>
                                            </div>
                                        </div>
                                        <div class="mt-3 mb-3">
                                            <div class="mb-1">
                                                <h6 class="fs-16 mb-2">What you get:</h6>
                                            </div>
                                            <div>
                                                <p class="text-dark d-flex align-items-center mb-2"><i class="isax isax-tick-circle me-2"></i>1 Business Account + 2 User</p>
                                                <p class="text-dark d-flex align-items-center mb-2"><i class="isax isax-tick-circle me-2"></i>Bulk downloads</p>
                                                <p class="text-dark d-flex align-items-center mb-2"><i class="isax isax-tick-circle me-2"></i>Multiple Price lists</p>
                                                <p class="text-dark d-flex align-items-center mb-2"><i class="isax isax-tick-circle me-2"></i>User Activity</p>
                                                <p class="text-dark d-flex align-items-center mb-2"><i class="isax isax-tick-circle me-2"></i>Bulk edits</p>
                                                <p class="text-dark d-flex align-items-center mb-2"><i class="isax isax-tick-circle me-2"></i>Multiple Warehouses</p>
                                                <p class="text-dark d-flex align-items-center mb-2"><i class="isax isax-tick-circle me-2"></i>Online Store</p>
                                            </div>
                                        </div>
                                        <a href="javascript:void(0);" class="d-flex align-items-center justify-content-center btn border">
                                            <i class="isax isax-bill me-1"></i> Current Plan
                                        </a>
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end col -->

                            <div class="col-lg-3 col-md-6 col-sm-12 d-flex">
                                <div class="card pricing-starter flex-fill">
                                    <div class="card-body">
                                        <div class="border-bottom">
                                            <div class="mb-3">
                                                <div class="d-flex align-items-center justify-content-between position-relative">
                                                    <h5 class="mb-1">Business</h5>
                                                </div>
                                                <p>Best for personal use</p>
                                            </div>
                                            <div class="mb-3">
                                                <h3 class="d-flex align-items-center mb-1">$899<span class="fs-14 fw-normal text-gray-9 ms-1">/year</span></h3>
                                                <p>Upto 75 User</p>
                                            </div>
                                        </div>
                                        <div class="mt-3 mb-3">
                                            <div class="mb-1">
                                                <h6 class="fs-16 mb-2">What you get:</h6>
                                            </div>
                                            <div>
                                                <p class="text-dark d-flex align-items-center mb-2"><i class="isax isax-tick-circle me-2"></i>POS Billing</p>
                                                <p class="text-dark d-flex align-items-center mb-2"><i class="isax isax-tick-circle me-2"></i>Batch & Expiry</p>
                                                <p class="text-dark d-flex align-items-center mb-2 text-truncate"><i class="isax isax-tick-circle me-2"></i>Serial Number/ IMEI Tracking</p>
                                                <p class="text-dark d-flex align-items-center mb-2"><i class="isax isax-tick-circle me-2"></i>Subscription/ Recurring</p>
                                                <p class="text-dark d-flex align-items-center mb-2"><i class="isax isax-tick-circle me-2"></i>Product Grouping</p>
                                                <p class="text-dark d-flex align-items-center mb-2"><i class="isax isax-tick-circle me-2"></i>Additional CESS</p>
                                                <p class="text-dark d-flex align-items-center mb-2"><i class="isax isax-tick-circle me-2"></i>Bank Reconciliation</p>
                                            </div>
                                        </div>
                                        <a href="javascript:void(0);" class="d-flex align-items-center justify-content-center btn border">
                                            <i class="isax isax-shopping-cart me-1"></i> Buy Plan
                                        </a>
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end col -->

                            <div class="col-lg-3 col-md-6 col-sm-12 d-flex">
                                <div class="card pricing-starter flex-fill">
                                    <div class="card-body">
                                        <div class="border-bottom">
                                            <div class="mb-3">
                                                <div class="d-flex align-items-center justify-content-between position-relative">
                                                    <h5 class="mb-1">Enterprise</h5>
                                                </div>
                                                <p>Best for personal use</p>
                                            </div>
                                            <div class="mb-3">
                                                <h3 class="d-flex align-items-center mb-1">$999<span class="fs-14 fw-normal text-gray-9 ms-1">/year</span></h3>
                                                <p>Unlimited Users</p>
                                            </div>
                                        </div>
                                        <div class="mt-3 mb-3">
                                            <div class="mb-1">
                                                <h6 class="fs-16 mb-2">What you get:</h6>
                                            </div>
                                            <div>
                                                <p class="text-dark d-flex align-items-center mb-2"><i class="isax isax-tick-circle me-2"></i>Add Custom Features</p>
                                                <p class="text-dark d-flex align-items-center mb-2"><i class="isax isax-tick-circle me-2"></i>Custom Column Linking</p>
                                                <p class="text-dark d-flex align-items-center mb-2 text-truncate"><i class="isax isax-tick-circle me-2"></i>Multiple Businesses</p>
                                                <p class="text-dark d-flex align-items-center mb-2"><i class="isax isax-tick-circle me-2"></i>Online Store</p>
                                                <p class="text-dark d-flex align-items-center mb-2"><i class="isax isax-tick-circle me-2"></i>Shiprocket Integration</p>
                                                <p class="text-dark d-flex align-items-center mb-2"><i class="isax isax-tick-circle me-2"></i>Multiple Users</p>
                                                <p class="text-dark d-flex align-items-center mb-2"><i class="isax isax-tick-circle me-2"></i>Multiple Warehouses</p>
                                            </div>
                                        </div>
                                        <a href="javascript:void(0);" class="d-flex align-items-center justify-content-center btn border">
                                            <i class="isax isax-shopping-cart me-1"></i> Buy Plan
                                        </a>
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end col -->

                        </div>
                        <!-- End row -->
                    </div>
                </div>
            </div>
            <!-- /Pricing -->

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