<?php $page = 'pricing'; ?>
@extends('layout.mainlayout')
@section('content')
   <!-- ========================
			Start Page Content
		========================= -->

		<div class="page-wrapper">
			<!-- End Content -->	
			<div class="content content-two">
				<!-- start row-->
                <div class="row justify-content-center">
                    <div class="col-lg-12">   
                        <div class="mb-3 border-bottom pb-3">
                            <h6 class="mb-0">Pricing</h6>
                        </div>              
                        <div class="card mb-0">
                            <div class="card-body pb-0">
                                <!-- Start Pricing -->
                                <div>
                                    <div class="text-center">
                                        <div class="d-inline-flex py-2 px-3 rounded-pill bg-light justify-content-center align-items-center mb-3">
                                            <p class="mb-0 me-2">Monthly</p>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" checked>
                                            </div>
                                            <p>Yearly</p>
                                        </div>
                                    </div>
									<!-- start row -->
                                    <div class="row justify-content-center">
                                        <div class="col-xl-3 col-lg-6 col-sm-12">
                                            <div class="card border rounded mb-3">
                                                <div class="card-body">
                                                    <div class="pricing-content mb-3">
                                                        <div class="mb-3">
                                                            <h6 class="fs-14 mb-0">Basic</h6>
                                                        </div>
                                                        <div class="d-flex align-items-center mb-2 flex-wrap gap-2">
                                                            <h3 class="d-flex align-items-center mb-0">$99<span class="fs-14 fw-normal text-gray-9 me-2">/month</span></h3>
                                                            <span class="badge badge-sm bg-info text-white border px-1 rounded text-truncate">10 Users</span>
                                                        </div>
                                                        <p class="mb-3 text-truncate line-clamb-2">Best for Freelancers & small businesses needs simple invoicing.</p>
                                                        <a href="#" class="d-flex align-items-center justify-content-center btn border taxt-gray-100 rounded w-100 mb-3" data-bs-toggle="modal" data-bs-target="#checkout">
                                                            <i class="isax isax-shopping-cart me-1"></i> Buy Plan
                                                        </a>
                                                        <div class="price-hdr">
                                                            <h6 class="fs-10 fw-semibold text-gray-9 me-2 ms-2 mb-0">FEATURES</h6>
                                                        </div>
                                                    </div>									
                                                    <div class="mt-3">
                                                        <div>
                                                            <span class="text-dark d-flex align-items-center mb-2">
                                                                <i class="isax isax-tick-circle5 text-success me-2"></i>
                                                                1 Business Account + 1 User
                                                            </span>
                                                            <span class="text-dark d-flex align-items-center mb-2">
                                                                <i class="isax isax-tick-circle5 text-success me-2"></i>
                                                                14+ Invoice templates
                                                            </span>
                                                            <span class="text-dark d-flex align-items-center mb-2">
                                                                <i class="isax isax-tick-circle5 text-success me-2"></i>
                                                                Collect Online Payments
                                                            </span>
                                                            <span class="text-dark d-flex align-items-center mb-2">
                                                                <i class="isax isax-tick-circle5 text-success me-2"></i>
                                                                40+ Reports & Insights
                                                            </span>
                                                            <span class="text-dark d-flex align-items-center mb-2">
                                                                <i class="isax isax-tick-circle5 text-success me-2"></i>
                                                                Variants
                                                            </span>
                                                            <span class="text-dark d-flex align-items-center mb-2">
                                                                <i class="isax isax-tick-circle5 text-success me-2"></i>
                                                                Add custom fields
                                                            </span>
                                                            <span class="text-dark d-flex align-items-center">
                                                                <i class="isax isax-tick-circle5 text-success me-2"></i>
                                                                Convert documents
                                                            </span>
                                                        </div>
                                                    </div>							
                                                </div>
                                            </div>
                                        </div> <!-- end col -->
                                        <div class="col-xl-3 col-lg-6 col-sm-12">
                                            <div class="card border rounded mb-3">
                                                <div class="card-body">
                                                    <div class="pricing-content mb-3">
                                                        <div class="d-flex align-items-center justify-content-between mb-3">
                                                            <h6 class="fs-14 mb-0">Standard</h6>
                                                            <span class="badge badge-sm bg-pink text-white">Most Popular</span>
                                                        </div>
                                                        <div class="d-flex align-items-center mb-2 flex-wrap gap-2">
                                                            <h3 class="d-inline-flex align-items-center mb-0">$199<span class="fs-14 fw-normal text-gray-9 me-2">/month</span></h3>
                                                            <span class="badge badge-sm bg-info px-1 text-white border rounded text-truncate">50 Users</span>
                                                        </div>
                                                        <p class="mb-3 text-truncate line-clamb-2">Growing businesses managing recurring invoices & reports.</p>
                                                        <a href="#" class="d-flex align-items-center justify-content-center btn bg-primary border text-white rounded w-100 mb-3">
                                                            <i class="isax isax-bill me-1"></i> Current Plan
                                                        </a>
                                                        <div class="price-hdr">
                                                            <h6 class="fs-10 fw-semibold text-gray-9 me-2 ms-2 mb-0">FEATURES</h6>
                                                        </div>
                                                    </div>									
                                                    <div class="mt-3">
                                                        <div>
                                                            <span class="text-dark d-flex align-items-center mb-2">
                                                                <i class="isax isax-tick-circle5 text-success me-2"></i>
                                                                1 Business Account + 1 User
                                                            </span>
                                                            <span class="text-dark d-flex align-items-center mb-2">
                                                                <i class="isax isax-tick-circle5 text-success me-2"></i>
                                                                Bulk downloads
                                                            </span>
                                                            <span class="text-dark d-flex align-items-center mb-2">
                                                                <i class="isax isax-tick-circle5 text-success me-2"></i>
                                                                Multiple Price lists
                                                            </span>
                                                            <span class="text-dark d-flex align-items-center mb-2">
                                                                <i class="isax isax-tick-circle5 text-success me-2"></i>
                                                                User Activity
                                                            </span>
                                                            <span class="text-dark d-flex align-items-center mb-2">
                                                                <i class="isax isax-tick-circle5 text-success me-2"></i>
                                                                Bulk edits
                                                            </span>
                                                            <span class="text-dark d-flex align-items-center mb-2">
                                                                <i class="isax isax-tick-circle5 text-success me-2"></i>
                                                                Multiple Warehouses
                                                            </span>
                                                            <span class="text-dark d-flex align-items-center">
                                                                <i class="isax isax-tick-circle5 text-success me-2"></i>
                                                                Online Store
                                                            </span>
                                                        </div>
                                                    </div>								
                                                </div>
                                            </div>
                                        </div> <!-- end col -->
                                        <div class="col-xl-3 col-lg-6 col-sm-12">
                                            <div class="card border rounded mb-3">
                                                <div class="card-body">
                                                    <div class="pricing-content mb-3">
                                                        <div class="mb-3">
                                                            <h6 class="fs-14 mb-0">Business</h6>
                                                        </div>
                                                        <div class="d-flex align-items-center mb-2 flex-wrap gap-2">
                                                            <h3 class="d-inline-flex align-items-center text-nowrap mb-0">$299<span class="fs-14 fw-normal text-gray-9 me-2">/month</span></h3>
                                                            <span class="badge badge-sm px-1 bg-info text-white border rounded">75 Users</span>
                                                        </div>
                                                        <p class="mb-3 text-truncate line-clamb-2">Best for Large sales teams requiring automation & integrations.</p>
                                                        <a href="#" class="d-flex align-items-center justify-content-center btn border taxt-gray-100 rounded w-100 mb-3" data-bs-toggle="modal" data-bs-target="#checkout">
                                                            <i class="isax isax-shopping-cart me-1"></i> Buy Plan</a>
                                                        <div class="price-hdr">
                                                            <h6 class="fs-10 fw-semibold text-gray-9 me-2 ms-2 mb-0">FEATURES</h6>
                                                        </div>
                                                    </div>									
                                                    <div class="mt-3">
                                                        <div>
                                                            <span class="text-dark d-flex align-items-center mb-2">
                                                                <i class="isax isax-tick-circle5 text-success me-2"></i>
                                                                POS Billing
                                                            </span>
                                                            <span class="text-dark d-flex align-items-center mb-2">
                                                                <i class="isax isax-tick-circle5 text-success me-2"></i>
                                                                Batch & Expiry
                                                            </span>
                                                            <span class="text-dark d-flex align-items-center mb-2">
                                                                <i class="isax isax-tick-circle5 text-success me-2"></i>
                                                                Serial No/ IMEI Tracking
                                                            </span>
                                                            <span class="text-dark d-flex align-items-center mb-2">
                                                                <i class="isax isax-tick-circle5 text-success me-2"></i>
                                                                Subscription/ Recurring
                                                            </span>
                                                            <span class="text-dark d-flex align-items-center mb-2">
                                                                <i class="isax isax-tick-circle5 text-success me-2"></i>
                                                                Product Grouping
                                                            </span>
                                                            <span class="text-dark d-flex align-items-center mb-2">
                                                                <i class="isax isax-tick-circle5 text-success me-2"></i>
                                                                Additional CESS
                                                            </span>
                                                            <span class="text-dark d-flex align-items-center">
                                                                <i class="isax isax-tick-circle5 text-success me-2"></i>
                                                                Bank Reconciliation
                                                            </span>
                                                        </div>
                                                    </div>								
                                                </div>
                                            </div>
                                        </div> <!-- end col -->
                                        <div class="col-xl-3 col-lg-6 col-sm-12">
                                            <div class="card border rounded mb-3">
                                                <div class="card-body">
                                                    <div class="pricing-content mb-3">
                                                        <div class="mb-3">
                                                            <h6 class="fs-14 mb-0">Enterprice</h6>
                                                        </div>
                                                        <div class="d-flex align-items-center mb-2 flex-wrap gap-2">
                                                            <h3 class="d-inline-flex align-items-center mb-0">$399<span class="fs-14 fw-normal text-gray-9 me-2">/month</span></h3>
                                                            <span class="badge badge-sm px-1 bg-info text-white border rounded">Unlimited</span>
                                                        </div>
                                                        <p class="mb-3 text-truncate line-clamb-2">Enterprises with AI insights & advanced workflows.</p>
                                                        <a href="#" class="d-flex align-items-center justify-content-center btn border taxt-gray-100 rounded w-100 mb-3" data-bs-toggle="modal" data-bs-target="#checkout">
                                                            <i class="isax isax-shopping-cart me-1"></i> Buy Plan</a>
                                                        <div class="price-hdr">
                                                            <h6 class="fs-10 fw-semibold text-gray-9 me-2 ms-2 mb-0">FEATURES</h6>
                                                        </div>
                                                    </div>									
                                                    <div class="mt-3">
                                                        <div>
                                                            <span class="text-dark d-flex align-items-center mb-2">
                                                                <i class="isax isax-tick-circle5 text-success me-2"></i>
                                                                Add Custom Features
                                                            </span>
                                                            <span class="text-dark d-flex align-items-center mb-2">
                                                                <i class="isax isax-tick-circle5 text-success me-2"></i>
                                                                Custom Column Linking
                                                            </span>
                                                            <span class="text-dark d-flex align-items-center mb-2">
                                                                <i class="isax isax-tick-circle5 text-success me-2"></i>
                                                                Multi Businesses / Branches
                                                            </span>
                                                            <span class="text-dark d-flex align-items-center mb-2">
                                                                <i class="isax isax-tick-circle5 text-success me-2"></i>
                                                                Online Store
                                                            </span>
                                                            <span class="text-dark d-flex align-items-center mb-2">
                                                                <i class="isax isax-tick-circle5 text-success me-2"></i>
                                                                Shiprocket Integration
                                                            </span>
                                                            <span class="text-dark d-flex align-items-center mb-2">
                                                                <i class="isax isax-tick-circle5 text-success me-2"></i>
                                                                Multiple Users
                                                            </span>
                                                            <span class="text-dark d-flex align-items-center">
                                                                <i class="isax isax-tick-circle5 text-success me-2"></i>
                                                                Multiple Warehouses
                                                            </span>
                                                        </div>
                                                    </div>								
                                                </div>
                                            </div>
                                        </div> <!-- end col -->
                                    </div>
									<!-- end row -->
                                </div>
                                <!-- End Pricing -->
                            </div> <!-- end card body--> 
                        </div>  <!-- end card--> 
                    </div> <!-- end row--> 
                </div>  
				<!-- end row-->       
			</div>
			<!-- End Container-->

            @component('components.footer')
            @endcomponent
		</div>

		<!-- ========================
			End Page Content
		========================= -->
@endsection