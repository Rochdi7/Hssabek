<?php $page = 'recurring-invoices'; ?>
@extends('layout.mainlayout')
@section('content')
  
<!-- ========================
			Start Page Content
		========================= -->

		<div class="page-wrapper">	

			<!-- Start Content -->
			<div class="content content-two">

				<!-- Page Header -->
				<div class="d-flex d-block align-items-center justify-content-between flex-wrap gap-3 mb-3">
					<div>
						<h6>Recurring Invoices</h6>
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
                        <div>
							<a href="{{url('add-invoice')}}" class="btn btn-primary d-flex align-items-center">
								<i class="isax isax-add-circle5 me-1"></i>New Invoice
							</a>
						</div>
					</div>
				</div>
				<!-- End Page Header -->

				<!-- start row -->
                <div class="row">
					<div class="col-xl-3 col-lg-4 col-md-6">
						<div class="card position-relative shadow-sm">
							<div class="card-body">
								<div class="d-flex align-items-center justify-content-between mb-2 pb-2">
									<div class="text-truncate">
										<p class="mb-1 text-truncate">Total Recurring Invoices</p>
										<h6 class="fs-16 fw-semibold">950</h6>
									</div>
									<div>
										<span class="avatar avatar-lg bg-primary-subtle rounded-circle">
											<i class="isax isax-maximize-circle fs-24 text-primary"></i>
										</span>
									</div>
								</div>
                                <div class="progress progress-xs mb-2 progress-animate" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                    <div class="progress-bar bg-primary" style="width: 80%">
                                    </div>
                                </div>
								<p class="fs-13 mb-0"><span class="text-success"><i class="isax isax-send text-success me-1"></i>5.62%</span> from last month</p>
							</div><!-- end card body -->
						</div><!-- end card -->
					</div><!-- end col -->
                    <div class="col-xl-3 col-lg-4 col-md-6">
						<div class="card position-relative shadow-sm">
							<div class="card-body">
								<div class="d-flex align-items-center justify-content-between mb-2 pb-2">
									<div>
										<p class="mb-1">Paid Invoices</p>
										<h6 class="fs-16 fw-semibold">800</h6>
									</div>
									<div>
										<span class="avatar avatar-lg bg-success-subtle rounded-circle">
											<i class="isax isax-tick-circle fs-24 text-success"></i>
										</span>
									</div>
								</div>
                                <div class="progress progress-xs mb-2 progress-animate" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                    <div class="progress-bar bg-success" style="width: 80%">
                                    </div>
                                </div>
                                <p class="fs-13 mb-0"><span class="text-success"><i class="isax isax-send text-success me-1"></i>11.4%</span> from last month</p>	
							</div><!-- end card body -->
						</div><!-- end card -->
					</div><!-- end col -->
                    <div class="col-xl-3 col-lg-4 col-md-6">
						<div class="card position-relative shadow-sm">
							<div class="card-body">
								<div class="d-flex align-items-center justify-content-between mb-2 pb-2">
									<div>
										<p class="mb-1">Expired Invoices</p>
										<h6 class="fs-16 fw-semibold">150</h6>
									</div>
									<div>
										<span class="avatar avatar-lg bg-warning-subtle rounded-circle">
											<i class="isax isax-info-circle fs-24 text-warning"></i>
										</span>
									</div>
								</div>
                                <div class="progress progress-xs mb-2 progress-animate" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                    <div class="progress-bar bg-warning" style="width: 80%">
                                    </div>
                                </div>
                                <p class="fs-13 mb-0"><span class="text-success"><i class="isax isax-send text-success me-1"></i>8.52%</span> from last month</p>
                            </div><!-- end card body -->
						</div><!-- end card -->
					</div><!-- end col -->
                    <div class="col-xl-3 col-lg-4 col-md-6">
						<div class="card position-relative shadow-sm">
							<div class="card-body">
								<div class="d-flex align-items-center justify-content-between mb-2 pb-2">
									<div>
										<p class="mb-1">Total Revenue</p>
										<h6 class="fs-16 fw-semibold">₹500,000</h6>
									</div>
									<div>
										<span class="avatar avatar-lg bg-danger-subtle rounded-circle">
											<i class="isax isax-dollar-circle fs-24 text-danger"></i>
										</span>
									</div>
								</div>
                                <div class="progress progress-xs mb-2 progress-animate" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                    <div class="progress-bar bg-danger" style="width: 30%">
                                    </div>
                                </div>
                                <p class="fs-13 mb-0"><span class="text-danger"><i class="isax isax-received text-danger me-1"></i>7.45%</span> from last month</p>
                            </div><!-- end card body -->
						</div><!-- end card -->
					</div><!-- end col -->
				</div>
				<!-- end row -->
				
				<!-- Table Search -->
				<div class="mb-3">
					<div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
						<div class="d-flex align-items-center flex-wrap gap-2">
							<div class="table-search d-flex align-items-center mb-0">
								<div class="search-input">
									<a href="javascript:void(0);" class="btn-searchset"><i class="isax isax-search-normal fs-12"></i></a>
								</div>
							</div>
							<a class="btn btn-outline-white fw-normal d-inline-flex align-items-center" href="javascript:void(0);" data-bs-toggle="offcanvas" data-bs-target="#customcanvas">
								<i class="isax isax-filter me-1"></i>Filter
							</a>
						</div>
						<div class="d-flex align-items-center flex-wrap gap-2">
							<div class="dropdown me-2">
								<a href="javascript:void(0);" class="dropdown-toggle btn btn-outline-white d-inline-flex align-items-center" data-bs-toggle="dropdown">
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
                            <div class="dropdown">
								<a href="javascript:void(0);" class="dropdown-toggle btn btn-outline-white d-inline-flex align-items-center" data-bs-toggle="dropdown" data-bs-auto-close="outside">
									<i class="isax isax-grid-3 me-1"></i>Column
								</a>
								<ul class="dropdown-menu  dropdown-menu">
									<li>
										<label class="dropdown-item d-flex align-items-center form-switch">
											<i class="fa-solid fa-grip-vertical me-3 text-default"></i>
											<input class="form-check-input m-0 me-2" type="checkbox" checked>
											<span>ID</span>
										</label>
									</li>
									<li>
										<label class="dropdown-item d-flex align-items-center form-switch">
											<i class="fa-solid fa-grip-vertical me-3 text-default"></i>
											<input class="form-check-input m-0 me-2" type="checkbox" checked>
											<span>Customer</span>
										</label>
									</li>
									<li>
										<label class="dropdown-item d-flex align-items-center form-switch">
											<i class="fa-solid fa-grip-vertical me-3 text-default"></i>
											<input class="form-check-input m-0 me-2" type="checkbox" checked>
											<span>Created On</span>
										</label>
									</li>
									<li>
										<label class="dropdown-item d-flex align-items-center form-switch">
											<i class="fa-solid fa-grip-vertical me-3 text-default"></i>
											<input class="form-check-input m-0 me-2" type="checkbox">
											<span>Recurring Cycle</span>
										</label>
									</li>
									<li>
										<label class="dropdown-item d-flex align-items-center form-switch">
											<i class="fa-solid fa-grip-vertical me-3 text-default"></i>
											<input class="form-check-input m-0 me-2" type="checkbox">
											<span>Issue Date</span>
										</label>
									</li>
									<li>
										<label class="dropdown-item d-flex align-items-center form-switch">
											<i class="fa-solid fa-grip-vertical me-3 text-default"></i>
											<input class="form-check-input m-0 me-2" type="checkbox">
											<span>Due Date</span>
										</label>
									</li>
                                    <li>
										<label class="dropdown-item d-flex align-items-center form-switch">
											<i class="fa-solid fa-grip-vertical me-3 text-default"></i>
											<input class="form-check-input m-0 me-2" type="checkbox" checked>
											<span>Paid ($)</span>
										</label>
									</li>
                                    <li>
										<label class="dropdown-item d-flex align-items-center form-switch">
											<i class="fa-solid fa-grip-vertical me-3 text-default"></i>
											<input class="form-check-input m-0 me-2" type="checkbox" checked>
											<span>Due Amount ($)</span>
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
						<span class="tag bg-light border rounded-1 fs-12 text-dark badge"><span class="num-count d-inline-flex align-items-center justify-content-center bg-success fs-10 me-1">5</span>Customers Selected<span class="ms-1 tag-close"><i class="fa-solid fa-x fs-10"></i></span></span>					
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
                                <th>Customer</th>
								<th>Created On</th>
								<th class="no-sort">Recurring Cycle</th>
                                <th>Issue Date</th>
                                <th>Due Date</th>
                                <th>Paid</th>
                                <th>Due Amount</th>
								<th class="no-sort"	>Status</th>
								<th class="no-sort"></th>
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
									<a href="javascript:void(0);" class="link-default" data-bs-toggle="modal" data-bs-target="#view_invoice">INV00025</a>
								</td>
								<td>
                                    <div class="d-flex align-items-center">
										<a href="{{url('customer-details')}}" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
											<img src="{{URL::asset('build/img/profiles/avatar-28.jpg')}}" class="rounded-circle" alt="img">
										</a>
										<div>
											<h6 class="fs-14 fw-medium mb-0"><a href="{{url('customer-details')}}">Emily Clark</a></h6>
										</div>
									</div>
                                </td>
								<td>22 Feb 2025</td>
                                <td class="text-gray-9">6 Months</td>
                                <td>25 Feb 2025</td>
                                <td>04 Mar 2025</td>
                                <td>$5,000</td>
                                <td class="text-gray-9">$10,000</td>
								<td>
                                    <span class="badge badge-soft-success d-inline-flex align-items-center">Paid <i class="isax isax-tick-circle ms-1"></i></span>								
                                </td>
								<td class="action-item">
                                    <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                        <i class="isax isax-more"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#view_invoice"><i class="isax isax-eye me-2"></i>View</a>
                                        </li>
                                        <li>
                                            <a href="{{url('edit-invoice')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-edit me-2"></i>Edit</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                        </li>                                      
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-send-2 me-2"></i>Send</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-document-download me-2"></i>Download</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-stop-circle me-2"></i>Stop Recurring</a>
                                        </li>
                                    </ul>
                                </td>
							</tr>   
                            <tr>
								<td>
                                    <div class="form-check form-check-md">
                                        <input class="form-check-input" type="checkbox">
                                    </div>
                                </td>
								<td>
									<a href="javascript:void(0);" class="link-default" data-bs-toggle="modal" data-bs-target="#view_invoice">INV00024</a>
								</td>
								<td>
                                    <div class="d-flex align-items-center">
										<a href="{{url('customer-details')}}" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
											<img src="{{URL::asset('build/img/profiles/avatar-29.jpg')}}" class="rounded-circle" alt="img">
										</a>
										<div>
											<h6 class="fs-14 fw-medium mb-0"><a href="{{url('customer-details')}}">John Carter</a></h6>
										</div>
									</div>
                                </td>
								<td>07 Feb 2025</td>
                                <td class="text-gray-9">1 Year</td>
                                <td>10 Feb 2025</td>
                                <td>20 Feb 2025</td>
                                <td>$10,750</td>
                                <td class="text-gray-9">$25,750</td>
								<td>
                                    <span class="badge badge-soft-warning d-inline-flex align-items-center">Unpaid<i class="isax isax-slash ms-1"></i></span>							
                                </td>
								<td class="action-item">
                                    <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                        <i class="isax isax-more"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#view_invoice"><i class="isax isax-eye me-2"></i>View</a>
                                        </li>
                                        <li>
                                            <a href="{{url('edit-invoice')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-edit me-2"></i>Edit</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                        </li>                                      
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-send-2 me-2"></i>Send</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-document-download me-2"></i>Download</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-stop-circle me-2"></i>Stop Recurring</a>
                                        </li>
                                    </ul>
                                </td>
							</tr> 
                            <tr>
								<td>
                                    <div class="form-check form-check-md">
                                        <input class="form-check-input" type="checkbox">
                                    </div>
                                </td>
								<td>
									<a href="javascript:void(0);" class="link-default" data-bs-toggle="modal" data-bs-target="#view_invoice">INV00023</a>
								</td>
								<td>
                                    <div class="d-flex align-items-center">
										<a href="{{url('customer-details')}}" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
											<img src="{{URL::asset('build/img/profiles/avatar-12.jpg')}}" class="rounded-circle" alt="img">
										</a>
										<div>
											<h6 class="fs-14 fw-medium mb-0"><a href="{{url('customer-details')}}">Sophia White</a></h6>
										</div>
									</div>
                                </td>
								<td>30 Jan 2025</td>
                                <td class="text-gray-9">9 Months</td>
                                <td>03 Feb 2025</td>
                                <td>13 Feb 2025</td>
                                <td>$20,000</td>
                                <td class="text-gray-9">$50,125</td>
								<td>
                                    <span class="badge badge-soft-danger d-inline-flex align-items-center">Cancelled<i class="isax isax-close-circle ms-1"></i></span>							
                                </td>
								<td class="action-item">
                                    <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                        <i class="isax isax-more"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#view_invoice"><i class="isax isax-eye me-2"></i>View</a>
                                        </li>
                                        <li>
                                            <a href="{{url('edit-invoice')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-edit me-2"></i>Edit</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                        </li>                                      
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-send-2 me-2"></i>Send</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-document-download me-2"></i>Download</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-stop-circle me-2"></i>Stop Recurring</a>
                                        </li>
                                    </ul>
                                </td>
							</tr> 
                            <tr>
								<td>
                                    <div class="form-check form-check-md">
                                        <input class="form-check-input" type="checkbox">
                                    </div>
                                </td>
								<td>
									<a href="javascript:void(0);" class="link-default" data-bs-toggle="modal" data-bs-target="#view_invoice">INV00022</a>
								</td>
								<td>
                                    <div class="d-flex align-items-center">
										<a href="{{url('customer-details')}}" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
											<img src="{{URL::asset('build/img/profiles/avatar-06.jpg')}}" class="rounded-circle" alt="img">
										</a>
										<div>
											<h6 class="fs-14 fw-medium mb-0"><a href="{{url('customer-details')}}">Michael Johnson</a></h6>
										</div>
									</div>
                                </td>
								<td>17 Jan 2025</td>
                                <td class="text-gray-9">2 Years</td>
                                <td>20 Jan 2025</td>
                                <td>30 Jan 2025</td>
                                <td>$50,000</td>
                                <td class="text-gray-9">$75,900</td>
								<td>
                                    <span class="badge badge-soft-info d-inline-flex align-items-center">Partially Paid<i class="isax isax-timer ms-1"></i></span>							
                                </td>
								<td class="action-item">
                                    <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                        <i class="isax isax-more"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#view_invoice"><i class="isax isax-eye me-2"></i>View</a>
                                        </li>
                                        <li>
                                            <a href="{{url('edit-invoice')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-edit me-2"></i>Edit</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                        </li>                                      
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-send-2 me-2"></i>Send</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-document-download me-2"></i>Download</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-stop-circle me-2"></i>Stop Recurring</a>
                                        </li>
                                    </ul>
                                </td>
							</tr> 
                            <tr>
								<td>
                                    <div class="form-check form-check-md">
                                        <input class="form-check-input" type="checkbox">
                                    </div>
                                </td>
								<td>
									<a href="javascript:void(0);" class="link-default" data-bs-toggle="modal" data-bs-target="#view_invoice">INV00021</a>
								</td>
								<td>
                                    <div class="d-flex align-items-center">
										<a href="{{url('customer-details')}}" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
											<img src="{{URL::asset('build/img/profiles/avatar-30.jpg')}}" class="rounded-circle" alt="img">
										</a>
										<div>
											<h6 class="fs-14 fw-medium mb-0"><a href="{{url('customer-details')}}">Olivia Harris</a></h6>
										</div>
									</div>
                                </td>
								<td>04 Jan 2025</td>
                                <td class="text-gray-9">3 Months</td>
                                <td>07 Jan 2025</td>
                                <td>17 Jan 2025</td>
                                <td>$80,000</td>
                                <td class="text-gray-9">$99,999</td>
								<td>
                                    <span class="badge badge-soft-danger d-inline-flex align-items-center">Uncollectable <i class="isax isax-danger ms-1"></i></span>						
                                </td>
								<td class="action-item">
                                    <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                        <i class="isax isax-more"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#view_invoice"><i class="isax isax-eye me-2"></i>View</a>
                                        </li>
                                        <li>
                                            <a href="{{url('edit-invoice')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-edit me-2"></i>Edit</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                        </li>                                      
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-send-2 me-2"></i>Send</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-document-download me-2"></i>Download</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-stop-circle me-2"></i>Stop Recurring</a>
                                        </li>
                                    </ul>
                                </td>
							</tr> 
                            <tr>
								<td>
                                    <div class="form-check form-check-md">
                                        <input class="form-check-input" type="checkbox">
                                    </div>
                                </td>
								<td>
									<a href="javascript:void(0);" class="link-default" data-bs-toggle="modal" data-bs-target="#view_invoice">INV00020</a>
								</td>
								<td>
                                    <div class="d-flex align-items-center">
										<a href="{{url('customer-details')}}" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
											<img src="{{URL::asset('build/img/profiles/avatar-16.jpg')}}" class="rounded-circle" alt="img">
										</a>
										<div>
											<h6 class="fs-14 fw-medium mb-0"><a href="{{url('customer-details')}}">David Anderson</a></h6>
										</div>
									</div>
                                </td>
								<td>09 Dec 2024</td>
                                <td class="text-gray-9">3 Years</td>
                                <td>12 Dec 2024</td>
                                <td>22 Dec 2024</td>
                                <td>$60,000</td>
                                <td class="text-gray-9">$1,20,500</td>
								<td>
                                    <span class="badge badge-soft-success d-inline-flex align-items-center">Paid <i class="isax isax-tick-circle ms-1"></i></span>                               
                                </td>
								<td class="action-item">
                                    <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                        <i class="isax isax-more"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#view_invoice"><i class="isax isax-eye me-2"></i>View</a>
                                        </li>
                                        <li>
                                            <a href="{{url('edit-invoice')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-edit me-2"></i>Edit</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                        </li>                                      
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-send-2 me-2"></i>Send</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-document-download me-2"></i>Download</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-stop-circle me-2"></i>Stop Recurring</a>
                                        </li>
                                    </ul>
                                </td>
							</tr> 
                            <tr>
								<td>
                                    <div class="form-check form-check-md">
                                        <input class="form-check-input" type="checkbox">
                                    </div>
                                </td>
								<td>
									<a href="javascript:void(0);" class="link-default" data-bs-toggle="modal" data-bs-target="#view_invoice">INV00019</a>
								</td>
								<td>
                                    <div class="d-flex align-items-center">
										<a href="{{url('customer-details')}}" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
											<img src="{{URL::asset('build/img/profiles/avatar-17.jpg')}}" class="rounded-circle" alt="img">
										</a>
										<div>
											<h6 class="fs-14 fw-medium mb-0"><a href="{{url('customer-details')}}">Emma Lewis</a></h6>
										</div>
									</div>
                                </td>
								<td>02 Dec 2024</td>
                                <td class="text-gray-9">6 Months</td>
                                <td>05 Dec 2024</td>
                                <td>15 Dec 2024</td>
                                <td>$1,25,000</td>
                                <td class="text-gray-9">$2,50,000</td>
								<td>
                                    <span class="badge badge-soft-warning d-inline-flex align-items-center">Unpaid<i class="isax isax-slash ms-1"></i></span>                              
                                </td>
								<td class="action-item">
                                    <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                        <i class="isax isax-more"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#view_invoice"><i class="isax isax-eye me-2"></i>View</a>
                                        </li>
                                        <li>
                                            <a href="{{url('edit-invoice')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-edit me-2"></i>Edit</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                        </li>                                      
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-send-2 me-2"></i>Send</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-document-download me-2"></i>Download</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-stop-circle me-2"></i>Stop Recurring</a>
                                        </li>
                                    </ul>
                                </td>
							</tr> 
                            <tr>
								<td>
                                    <div class="form-check form-check-md">
                                        <input class="form-check-input" type="checkbox">
                                    </div>
                                </td>
								<td>
									<a href="javascript:void(0);" class="link-default" data-bs-toggle="modal" data-bs-target="#view_invoice">INV00018</a>
								</td>
								<td>
                                    <div class="d-flex align-items-center">
										<a href="{{url('customer-details')}}" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
											<img src="{{URL::asset('build/img/profiles/avatar-23.jpg')}}" class="rounded-circle" alt="img">
										</a>
										<div>
											<h6 class="fs-14 fw-medium mb-0"><a href="{{url('customer-details')}}">Robert Thomas</a></h6>
										</div>
									</div>
                                </td>
								<td>15 Nov 2024</td>
                                <td class="text-gray-9">1 Year</td>
                                <td>18 Nov 2024</td>
                                <td>28 Nov 2024</td>
                                <td>$5,00,000</td>
                                <td class="text-gray-9">$5,00,750</td>
								<td>
                                    <span class="badge badge-soft-danger d-inline-flex align-items-center">Cancelled<i class="isax isax-close-circle ms-1"></i></span>                              
                                </td>
								<td class="action-item">
                                    <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                        <i class="isax isax-more"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#view_invoice"><i class="isax isax-eye me-2"></i>View</a>
                                        </li>
                                        <li>
                                            <a href="{{url('edit-invoice')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-edit me-2"></i>Edit</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                        </li>                                      
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-send-2 me-2"></i>Send</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-document-download me-2"></i>Download</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-stop-circle me-2"></i>Stop Recurring</a>
                                        </li>
                                    </ul>
                                </td>
							</tr> 
                            <tr>
								<td>
                                    <div class="form-check form-check-md">
                                        <input class="form-check-input" type="checkbox">
                                    </div>
                                </td>
								<td>
									<a href="javascript:void(0);" class="link-default" data-bs-toggle="modal" data-bs-target="#view_invoice">INV00017</a>
								</td>
								<td>
                                    <div class="d-flex align-items-center">
										<a href="{{url('customer-details')}}" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
											<img src="{{URL::asset('build/img/profiles/avatar-07.jpg')}}" class="rounded-circle" alt="img">
										</a>
										<div>
											<h6 class="fs-14 fw-medium mb-0"><a href="{{url('customer-details')}}">Isabella Scott</a></h6>
										</div>
									</div>
                                </td>
								<td>30 Nov 2024</td>
                                <td class="text-gray-9">2 Years</td>
                                <td>02 Nov 2024</td>
                                <td>12 Nov 2024</td>
                                <td>$2,50,500</td>
                                <td class="text-gray-9">$7,50,300</td>
								<td>
                                    <span class="badge badge-soft-info d-inline-flex align-items-center">Partially Paid<i class="isax isax-timer ms-1"></i></span>                              
                                </td>
								<td class="action-item">
                                    <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                        <i class="isax isax-more"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#view_invoice"><i class="isax isax-eye me-2"></i>View</a>
                                        </li>
                                        <li>
                                            <a href="{{url('edit-invoice')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-edit me-2"></i>Edit</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                        </li>                                      
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-send-2 me-2"></i>Send</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-document-download me-2"></i>Download</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-stop-circle me-2"></i>Stop Recurring</a>
                                        </li>
                                    </ul>
                                </td>
							</tr> 
                            <tr>
								<td>
                                    <div class="form-check form-check-md">
                                        <input class="form-check-input" type="checkbox">
                                    </div>
                                </td>
								<td>
									<a href="javascript:void(0);" class="link-default" data-bs-toggle="modal" data-bs-target="#view_invoice">INV00016</a>
								</td>
								<td>
                                    <div class="d-flex align-items-center">
										<a href="{{url('customer-details')}}" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
											<img src="{{URL::asset('build/img/profiles/avatar-31.jpg')}}" class="rounded-circle" alt="img">
										</a>
										<div>
											<h6 class="fs-14 fw-medium mb-0"><a href="{{url('customer-details')}}">Daniel Martinez</a></h6>
										</div>
									</div>
                                </td>
								<td>12 Oct 2024</td>
                                <td class="text-gray-9">6 Months</td>
                                <td>15 Oct 2024</td>
                                <td>25 Oct 2024</td>
                                <td>$4,00,000</td>
                                <td class="text-gray-9">$9,99,999</td>
								<td>
                                    <span class="badge badge-soft-danger d-inline-flex align-items-center">Uncollectable <i class="isax isax-danger ms-1"></i></span>                             
                                </td>
								<td class="action-item">
                                    <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                        <i class="isax isax-more"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#view_invoice"><i class="isax isax-eye me-2"></i>View</a>
                                        </li>
                                        <li>
                                            <a href="{{url('edit-invoice')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-edit me-2"></i>Edit</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                        </li>                                      
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-send-2 me-2"></i>Send</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-document-download me-2"></i>Download</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-stop-circle me-2"></i>Stop Recurring</a>
                                        </li>
                                    </ul>
                                </td>
							</tr> 
                            <tr>
								<td>
                                    <div class="form-check form-check-md">
                                        <input class="form-check-input" type="checkbox">
                                    </div>
                                </td>
								<td>
									<a href="javascript:void(0);" class="link-default" data-bs-toggle="modal" data-bs-target="#view_invoice">INV00015</a>
								</td>
								<td>
                                    <div class="d-flex align-items-center">
										<a href="{{url('customer-details')}}" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
											<img src="{{URL::asset('build/img/profiles/avatar-41.jpg')}}" class="rounded-circle" alt="img">
										</a>
										<div>
											<h6 class="fs-14 fw-medium mb-0"><a href="{{url('customer-details')}}">Charlotte Brown</a></h6>
										</div>
									</div>
                                </td>
								<td>05 Oct 2024</td>
                                <td class="text-gray-9">3 Years</td>
                                <td>08 Oct 2024</td>
                                <td>18 Oct 2024</td>
                                <td>$40,000</td>
                                <td class="text-gray-9">$87,650</td>
								<td>
                                    <span class="badge badge-soft-success d-inline-flex align-items-center">Paid <i class="isax isax-tick-circle ms-1"></i></span>                            
                                </td>
								<td class="action-item">
                                    <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                        <i class="isax isax-more"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#view_invoice"><i class="isax isax-eye me-2"></i>View</a>
                                        </li>
                                        <li>
                                            <a href="{{url('edit-invoice')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-edit me-2"></i>Edit</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                        </li>                                      
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-send-2 me-2"></i>Send</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-document-download me-2"></i>Download</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-stop-circle me-2"></i>Stop Recurring</a>
                                        </li>
                                    </ul>
                                </td>
							</tr> 
                            <tr>
								<td>
                                    <div class="form-check form-check-md">
                                        <input class="form-check-input" type="checkbox">
                                    </div>
                                </td>
								<td>
									<a href="javascript:void(0);" class="link-default" data-bs-toggle="modal" data-bs-target="#view_invoice">INV00014</a>
								</td>
								<td>
                                    <div class="d-flex align-items-center">
										<a href="{{url('customer-details')}}" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
											<img src="{{URL::asset('build/img/profiles/avatar-42.jpg')}}" class="rounded-circle" alt="img">
										</a>
										<div>
											<h6 class="fs-14 fw-medium mb-0"><a href="{{url('customer-details')}}">William Parker</a></h6>
										</div>
									</div>
                                </td>
								<td>09 Sep 2024</td>
                                <td class="text-gray-9">1 Year</td>
                                <td>12 Sep 2024</td>
                                <td>22 Sep 2024</td>
                                <td>$30,000</td>
                                <td class="text-gray-9">$69,420</td>
								<td>
                                    <span class="badge badge-soft-warning d-inline-flex align-items-center">Unpaid<i class="isax isax-slash ms-1"></i></span>                           
                                </td>
								<td class="action-item">
                                    <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                        <i class="isax isax-more"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#view_invoice"><i class="isax isax-eye me-2"></i>View</a>
                                        </li>
                                        <li>
                                            <a href="{{url('edit-invoice')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-edit me-2"></i>Edit</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                        </li>                                      
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-send-2 me-2"></i>Send</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-document-download me-2"></i>Download</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-stop-circle me-2"></i>Stop Recurring</a>
                                        </li>
                                    </ul>
                                </td>
							</tr>  
                            <tr>
								<td>
                                    <div class="form-check form-check-md">
                                        <input class="form-check-input" type="checkbox">
                                    </div>
                                </td>
								<td>
									<a href="javascript:void(0);" class="link-default" data-bs-toggle="modal" data-bs-target="#view_invoice">INV00013</a>
								</td>
								<td>
                                    <div class="d-flex align-items-center">
										<a href="{{url('customer-details')}}" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
											<img src="{{URL::asset('build/img/profiles/avatar-43.jpg')}}" class="rounded-circle" alt="img">
										</a>
										<div>
											<h6 class="fs-14 fw-medium mb-0"><a href="{{url('customer-details')}}">Mia Thompson</a></h6>
										</div>
									</div>
                                </td>
								<td>02 Sep 2024</td>
                                <td class="text-gray-9">2 Years</td>
                                <td>05 Sep 2024</td>
                                <td>15 Sep 2024</td>
                                <td>$15,000</td>
                                <td class="text-gray-9">$33,210</td>
								<td>
                                    <span class="badge badge-soft-danger d-inline-flex align-items-center">Cancelled<i class="isax isax-close-circle ms-1"></i></span>                           
                                </td>
								<td class="action-item">
                                    <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                        <i class="isax isax-more"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#view_invoice"><i class="isax isax-eye me-2"></i>View</a>
                                        </li>
                                        <li>
                                            <a href="{{url('edit-invoice')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-edit me-2"></i>Edit</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                        </li>                                      
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-send-2 me-2"></i>Send</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-document-download me-2"></i>Download</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-stop-circle me-2"></i>Stop Recurring</a>
                                        </li>
                                    </ul>
                                </td>
							</tr>
                            <tr>
								<td>
                                    <div class="form-check form-check-md">
                                        <input class="form-check-input" type="checkbox">
                                    </div>
                                </td>
								<td>
									<a href="javascript:void(0);" class="link-default" data-bs-toggle="modal" data-bs-target="#view_invoice">INV00012</a>
								</td>
								<td>
                                    <div class="d-flex align-items-center">
										<a href="{{url('customer-details')}}" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
											<img src="{{URL::asset('build/img/profiles/avatar-44.jpg')}}" class="rounded-circle" alt="img">
										</a>
										<div>
											<h6 class="fs-14 fw-medium mb-0"><a href="{{url('customer-details')}}">Amelia Robinson</a></h6>
										</div>
									</div>
                                </td>
								<td>07 Aug 2024</td>
                                <td class="text-gray-9">6 Months</td>
                                <td>10 Aug 2024</td>
                                <td>20 Aug 2024</td>
                                <td>$1,50,000</td>
                                <td class="text-gray-9">$2,10,000</td>
								<td>
                                    <span class="badge badge-soft-info d-inline-flex align-items-center">Partially Paid<i class="isax isax-timer ms-1"></i></span>                          
                                </td>
								<td class="action-item">
                                    <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                        <i class="isax isax-more"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#view_invoice"><i class="isax isax-eye me-2"></i>View</a>
                                        </li>
                                        <li>
                                            <a href="{{url('edit-invoice')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-edit me-2"></i>Edit</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                        </li>                                      
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-send-2 me-2"></i>Send</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-document-download me-2"></i>Download</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-stop-circle me-2"></i>Stop Recurring</a>
                                        </li>
                                    </ul>
                                </td>
							</tr>
						</tbody>
					</table>
				</div>
				<!-- /Table List -->

			</div>
			<!-- End Content -->
			
            @component('components.footer')
            @endcomponent


		</div>
		
		<!-- ========================
			Start Page Content
		========================= -->
@endsection