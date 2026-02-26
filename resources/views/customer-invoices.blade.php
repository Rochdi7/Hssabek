<?php $page = 'customer-invoices'; ?>
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
					<h6>Invoices</h6>
				</div>
				<div class="d-flex my-xl-auto right-content align-items-center flex-wrap gap-2">
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
				</div>
			</div>
			<!-- End Page Header -->

			<!-- start row -->
			<div class="row">
				<div class="col-xl-3 col-lg-4 col-md-6">
					<div class="card position-relative">
						<div class="card-body">
							<div class="d-flex align-items-center justify-content-between mb-2 pb-2 border-bottom">
								<div>
									<p class="mb-1">Total Invoices</p>
									<h6 class="fs-16 fw-semibold">$25,000</h6>
								</div>
								<div>
									<span class="avatar bg-primary rounded-circle">
										<i class="isax isax-receipt-item"></i>
									</span>
								</div>
							</div>
							<p class="fs-13 mb-0"><span class="text-success"><i class="isax isax-send text-success me-1"></i>5.62%</span> from last month</p>
							<span class="position-absolute end-0 bottom-0">
								<img src="{{URL::asset('build/img/bg/card-overlay-01.svg')}}" alt="User Img">
							</span>
						</div>
					</div>
					<!-- end card -->
				</div><!-- end col -->
				<div class="col-xl-3 col-lg-4 col-md-6">
					<div class="card position-relative">
						<div class="card-body">
							<div class="d-flex align-items-center justify-content-between mb-2 pb-2 border-bottom">
								<div>
									<p class="mb-1">Paid Invoices</p>
									<h6 class="fs-16 fw-semibold">$18,500</h6>
								</div>
								<div>
									<span class="avatar bg-success rounded-circle">
										<i class="isax isax-tick-circle"></i>
									</span>
								</div>
							</div>
							<p class="fs-13 mb-0"><span class="text-success"><i class="isax isax-send text-success me-1"></i>11.4%</span> from last month</p>
							<span class="position-absolute end-0 bottom-0">
								<img src="{{URL::asset('build/img/bg/card-overlay-02.svg')}}" alt="User Img">
							</span>
						</div>
					</div>
					<!-- end card -->
				</div><!-- end col -->
				<div class="col-xl-3 col-lg-4 col-md-6">
					<div class="card position-relative">
						<div class="card-body">
							<div class="d-flex align-items-center justify-content-between mb-2 pb-2 border-bottom">
								<div>
									<p class="mb-1">Pending Invoices</p>
									<h6 class="fs-16 fw-semibold">$6,500</h6>
								</div>
								<div>
									<span class="avatar bg-warning rounded-circle">
										<i class="isax isax-timer"></i>
									</span>
								</div>
							</div>
							<p class="fs-13 mb-0"><span class="text-success"><i class="isax isax-send text-success me-1"></i>8.52%</span> from last month</p>
							<span class="position-absolute end-0 bottom-0">
								<img src="{{URL::asset('build/img/bg/card-overlay-03.svg')}}" alt="User Img">
							</span>
						</div>
					</div>
					<!-- end card -->
				</div><!-- end col -->
				<div class="col-xl-3 col-lg-4 col-md-6">
					<div class="card position-relative">
						<div class="card-body">
							<div class="d-flex align-items-center justify-content-between mb-2 pb-2 border-bottom">
								<div>
									<p class="mb-1">Overdue Invoices</p>
									<h6 class="fs-16 fw-semibold">$2,000</h6>
								</div>
								<div>
									<span class="avatar bg-danger rounded-circle">
										<i class="isax isax-information"></i>
									</span>
								</div>
							</div>
							<p class="fs-13 mb-0"><span class="text-danger"><i class="isax isax-received text-danger me-1"></i>7.45%</span> from last month</p>
							<span class="position-absolute end-0 bottom-0">
								<img src="{{URL::asset('build/img/bg/card-overlay-04.svg')}}" alt="User Img">
							</span>
						</div>
						<!-- end card body -->
					</div>
					<!-- end card -->
				</div><!-- end col -->
			</div>
			<!-- end row -->

			<ul class="nav nav-tabs nav-tabs-bottom border-bottom mb-3">
				<li class="nav-item"><a class="nav-link active" href="#">All</a></li>
				<li class="nav-item"><a class="nav-link" href="#">Paid</a></li>
				<li class="nav-item"><a class="nav-link" href="#">Overdue</a></li>
				<li class="nav-item"><a class="nav-link" href="#">Upcoming</a></li>
				<li class="nav-item"><a class="nav-link" href="#">Cancelled</a></li>
				<li class="nav-item"><a class="nav-link" href="#">Partially Paid</a></li>
				<li class="nav-item"><a class="nav-link" href="#">Unpaid</a></li>
				<li class="nav-item"><a class="nav-link" href="#">Refunded</a></li>
				<li class="nav-item"><a class="nav-link" href="#">Draft</a></li>
			</ul>

			<!-- Table Search Start -->
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
						<div class="dropdown">
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
							<ul class="dropdown-menu  dropdown-menu-lg">
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
										<span>Created On</span>
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
										<input class="form-check-input m-0 me-2" type="checkbox" checked>
										<span>Paid</span>
									</label>
								</li>
								<li>
									<label class="dropdown-item d-flex align-items-center form-switch">
										<i class="fa-solid fa-grip-vertical me-3 text-default"></i>
										<input class="form-check-input m-0 me-2" type="checkbox" checked>
										<span>Status</span>
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
										<input class="form-check-input m-0 me-2" type="checkbox">
										<span>Due Date</span>
									</label>
								</li>
							</ul>
						</div>
					</div>
				</div>

				<!-- Filter Info -->
				<div class="align-items-center gap-2 flex-wrap filter-info mt-3">
					<h6 class="fs-13 fw-semibold">Filters</h6>
					<span class="tag bg-light border rounded-1 fs-12 text-dark badge"><span class="num-count d-inline-flex align-items-center justify-content-center bg-success fs-10 me-1">1</span>$10,000 - $25,500<span class="ms-1 tag-close"><i class="fa-solid fa-x fs-10"></i></span></span>
					<span class="tag bg-light border rounded-1 fs-12 text-dark badge"><span class="num-count d-inline-flex align-items-center justify-content-center bg-success fs-10 me-1">2</span>Status Selected<span class="ms-1 tag-close"><i class="fa-solid fa-x fs-10"></i></span></span>
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
							<th class="no-sort">ID</th>
							<th>Created On</th>
							<th>Amount</th>
							<th>Paid</th>
							<th class="no-sort">Status</th>
							<th class="no-sort">Payment Mode</th>
							<th>Due Date</th>
							<th class="no-sort"></th>
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
								<a href="{{url('customer-invoice-details')}}" class="link-default">INV00025</a>
							</td>
							<td>22 Feb 2025</td>
							<td class="text-dark">$10,000</td>
							<td>$5,000</td>
							<td>
								<span class="badge badge-soft-success d-inline-flex align-items-center">Paid <i class="isax isax-tick-circle ms-1"></i></span>
							</td>
							<td class="text-dark">Cash</td>
							<td>04 Mar 2025</td>
							<td>
								<button type="button" class="btn btn-light btn-sm" disabled>Pay Now</button>
							</td>
							<td class="action-item">
								<a href="javascript:void(0);" data-bs-toggle="dropdown">
									<i class="isax isax-more"></i>
								</a>
								<ul class="dropdown-menu">
									<li>
										<a href="{{url('customer-invoice-details')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-eye me-2"></i>View</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-document-download me-2"></i>Download Invoices as PDF</a>
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
								<a href="{{url('customer-invoice-details')}}" class="link-default">INV00024</a>
							</td>
							<td>07 Feb 2025</td>
							<td class="text-dark">$25,750</td>
							<td>$10,750</td>
							<td>
								<span class="badge badge-soft-warning d-inline-flex align-items-center">Unpaid<i class="isax isax-slash ms-1"></i></span>
							</td>
							<td class="text-dark">Check</td>
							<td>20 Feb 2025</td>
							<td>
								<button type="button" class="btn btn-primary btn-sm" data-bs-toggle="offcanvas" data-bs-target="#customcanvas2">Pay Now</button>
							</td>
							<td class="action-item">
								<a href="javascript:void(0);" data-bs-toggle="dropdown">
									<i class="isax isax-more"></i>
								</a>
								<ul class="dropdown-menu">
									<li>
										<a href="{{url('customer-invoice-details')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-eye me-2"></i>View</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-document-download me-2"></i>Download Invoices as PDF</a>
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
								<a href="{{url('customer-invoice-details')}}" class="link-default">INV00023</a>
							</td>
							<td>30 Jan 2025</td>
							<td class="text-dark">$50,125</td>
							<td>$20,000</td>
							<td>
								<span class="badge badge-soft-danger d-inline-flex align-items-center">Cancelled<i class="isax isax-close-circle ms-1"></i></span>
							</td>
							<td class="text-dark">Cash</td>
							<td>13 Feb 2025</td>
							<td>
								<button type="button" class="btn btn-primary btn-sm" data-bs-toggle="offcanvas" data-bs-target="#customcanvas2">Pay Now</button>
							</td>
							<td class="action-item">
								<a href="javascript:void(0);" data-bs-toggle="dropdown">
									<i class="isax isax-more"></i>
								</a>
								<ul class="dropdown-menu">
									<li>
										<a href="{{url('customer-invoice-details')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-eye me-2"></i>View</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-document-download me-2"></i>Download Invoices as PDF</a>
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
								<a href="{{url('customer-invoice-details')}}" class="link-default">INV00022</a>
							</td>
							<td>17 Jan 2025</td>
							<td class="text-dark">$75,900</td>
							<td>$50,000</td>
							<td>
								<span class="badge badge-soft-info d-inline-flex align-items-center">Partially Paid
									<i class="isax isax-timer ms-1"></i>
								</span>
							</td>
							<td class="text-dark">Check</td>
							<td>30 Jan 2025</td>
							<td>
								<button type="button" class="btn btn-primary btn-sm" data-bs-toggle="offcanvas" data-bs-target="#customcanvas2">Pay Now</button>
							</td>
							<td class="action-item">
								<a href="javascript:void(0);" data-bs-toggle="dropdown">
									<i class="isax isax-more"></i>
								</a>
								<ul class="dropdown-menu">
									<li>
										<a href="{{url('customer-invoice-details')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-eye me-2"></i>View</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-document-download me-2"></i>Download Invoices as PDF</a>
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
								<a href="{{url('customer-invoice-details')}}" class="link-default">INV00021</a>
							</td>
							<td>04 Jan 2025</td>
							<td class="text-dark">$99,999</td>
							<td>$80,000</td>
							<td>
								<span class="badge badge-soft-danger d-inline-flex align-items-center">Overdue
									<i class="isax isax-danger ms-1"></i>
								</span>
							</td>
							<td class="text-dark">Check</td>
							<td>17 Jan 2025</td>
							<td>
								<button type="button" class="btn btn-primary btn-sm" data-bs-toggle="offcanvas" data-bs-target="#customcanvas2">Pay Now</button>
							</td>
							<td class="action-item">
								<a href="javascript:void(0);" data-bs-toggle="dropdown">
									<i class="isax isax-more"></i>
								</a>
								<ul class="dropdown-menu">
									<li>
										<a href="{{url('customer-invoice-details')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-eye me-2"></i>View</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-document-download me-2"></i>Download Invoices as PDF</a>
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
								<a href="{{url('customer-invoice-details')}}" class="link-default">INV00020</a>
							</td>
							<td>09 Dec 2024</td>
							<td class="text-dark">$1,20,500</td>
							<td>$60,000</td>
							<td>
								<span class="badge badge-soft-success d-inline-flex align-items-center">Paid
									<i class="isax isax-tick-circle ms-1"></i>
								</span>
							</td>
							<td class="text-dark">Cash</td>
							<td>22 Dec 2024</td>
							<td>
								<button type="button" class="btn btn-light btn-sm" disabled>Pay Now</button>
							</td>
							<td class="action-item">
								<a href="javascript:void(0);" data-bs-toggle="dropdown">
									<i class="isax isax-more"></i>
								</a>
								<ul class="dropdown-menu">
									<li>
										<a href="{{url('customer-invoice-details')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-eye me-2"></i>View</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-document-download me-2"></i>Download Invoices as PDF</a>
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
								<a href="{{url('customer-invoice-details')}}" class="link-default">INV00019</a>
							</td>
							<td>02 Dec 2024</td>
							<td class="text-dark">$2,50,000</td>
							<td>$1,25,000</td>
							<td>
								<span class="badge badge-soft-warning d-inline-flex align-items-center">Unpaid
									<i class="isax isax-slash ms-1"></i>
								</span>
							</td>
							<td class="text-dark">Cash</td>
							<td>15 Dec 2024</td>
							<td>
								<button type="button" class="btn btn-primary btn-sm" data-bs-toggle="offcanvas" data-bs-target="#customcanvas2">Pay Now</button>
							</td>
							<td class="action-item">
								<a href="javascript:void(0);" data-bs-toggle="dropdown">
									<i class="isax isax-more"></i>
								</a>
								<ul class="dropdown-menu">
									<li>
										<a href="{{url('customer-invoice-details')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-eye me-2"></i>View</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-document-download me-2"></i>Download Invoices as PDF</a>
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
								<a href="{{url('customer-invoice-details')}}" class="link-default">INV00018</a>
							</td>
							<td>15 Nov 2024</td>
							<td class="text-dark">$5,00,750</td>
							<td>$5,00,000</td>
							<td>
								<span class="badge badge-soft-danger d-inline-flex align-items-center">Cancelled
									<i class="isax isax-close-circle ms-1"></i>
								</span>
							</td>
							<td class="text-dark">Check</td>
							<td>28 Nov 2024</td>
							<td>
								<button type="button" class="btn btn-primary btn-sm" data-bs-toggle="offcanvas" data-bs-target="#customcanvas2">Pay Now</button>
							</td>
							<td class="action-item">
								<a href="javascript:void(0);" data-bs-toggle="dropdown">
									<i class="isax isax-more"></i>
								</a>
								<ul class="dropdown-menu">
									<li>
										<a href="{{url('customer-invoice-details')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-eye me-2"></i>View</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-document-download me-2"></i>Download Invoices as PDF</a>
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
								<a href="{{url('customer-invoice-details')}}" class="link-default">INV00017</a>
							</td>
							<td>30 Nov 2024</td>
							<td class="text-dark">$7,50,300</td>
							<td>$2,50,500</td>
							<td>
								<span class="badge badge-soft-info d-inline-flex align-items-center">Partially Paid
									<i class="isax isax-timer ms-1"></i>
								</span>
							</td>
							<td class="text-dark">Check</td>
							<td>12 Nov 2024</td>
							<td>
								<button type="button" class="btn btn-primary btn-sm" data-bs-toggle="offcanvas" data-bs-target="#customcanvas2">Pay Now</button>
							</td>
							<td class="action-item">
								<a href="javascript:void(0);" data-bs-toggle="dropdown">
									<i class="isax isax-more"></i>
								</a>
								<ul class="dropdown-menu">
									<li>
										<a href="{{url('customer-invoice-details')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-eye me-2"></i>View</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-document-download me-2"></i>Download Invoices as PDF</a>
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
								<a href="{{url('customer-invoice-details')}}" class="link-default">INV00016</a>
							</td>
							<td>12 Oct 2024</td>
							<td class="text-dark">$9,99,999</td>
							<td>$4,00,000</td>
							<td>
								<span class="badge badge-soft-danger d-inline-flex align-items-center">Overdue
									<i class="isax isax-danger ms-1"></i>
								</span>
							</td>
							<td class="text-dark">Cash</td>
							<td>25 Oct 2024</td>
							<td>
								<button type="button" class="btn btn-primary btn-sm" data-bs-toggle="offcanvas" data-bs-target="#customcanvas2">Pay Now</button>
							</td>
							<td class="action-item">
								<a href="javascript:void(0);" data-bs-toggle="dropdown">
									<i class="isax isax-more"></i>
								</a>
								<ul class="dropdown-menu">
									<li>
										<a href="{{url('customer-invoice-details')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-eye me-2"></i>View</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-document-download me-2"></i>Download Invoices as PDF</a>
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
								<a href="{{url('customer-invoice-details')}}" class="link-default">INV00015</a>
							</td>
							<td>05 Oct 2024</td>
							<td class="text-dark">$87,650</td>
							<td>$40,000</td>
							<td>
								<span class="badge badge-soft-success d-inline-flex align-items-center">Paid
									<i class="isax isax-tick-circle ms-1"></i>
								</span>
							</td>
							<td class="text-dark">Check</td>
							<td>18 Oct 2024</td>
							<td>
								<button type="button" class="btn btn-light btn-sm" disabled>Pay Now</button>
							</td>
							<td class="action-item">
								<a href="javascript:void(0);" data-bs-toggle="dropdown">
									<i class="isax isax-more"></i>
								</a>
								<ul class="dropdown-menu">
									<li>
										<a href="{{url('customer-invoice-details')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-eye me-2"></i>View</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-document-download me-2"></i>Download Invoices as PDF</a>
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
								<a href="{{url('customer-invoice-details')}}" class="link-default">INV00014</a>
							</td>
							<td>05 Oct 2024</td>
							<td class="text-dark">$87,650</td>
							<td>$40,000</td>
							<td>
								<span class="badge badge-soft-warning d-inline-flex align-items-center">Unpaid
									<i class="isax isax-slash ms-1"></i>
								</span>
							</td>
							<td class="text-dark">Cash</td>
							<td>18 Oct 2024</td>
							<td>
								<button type="button" class="btn btn-primary btn-sm" data-bs-toggle="offcanvas" data-bs-target="#customcanvas2">Pay Now</button>
							</td>
							<td class="action-item">
								<a href="javascript:void(0);" data-bs-toggle="dropdown">
									<i class="isax isax-more"></i>
								</a>
								<ul class="dropdown-menu">
									<li>
										<a href="{{url('customer-invoice-details')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-eye me-2"></i>View</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-document-download me-2"></i>Download Invoices as PDF</a>
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
								<a href="{{url('customer-invoice-details')}}" class="link-default">INV00013</a>
							</td>
							<td>02 Sep 2024</td>
							<td class="text-dark">$33,210</td>
							<td>$15,000</td>
							<td>
								<span class="badge badge-soft-danger d-inline-flex align-items-center">Cancelled
									<i class="isax isax-close-circle ms-1"></i>
								</span>
							</td>
							<td class="text-dark">Check</td>
							<td>15 Sep 2024</td>
							<td>
								<button type="button" class="btn btn-primary btn-sm" data-bs-toggle="offcanvas" data-bs-target="#customcanvas2">Pay Now</button>
							</td>
							<td class="action-item">
								<a href="javascript:void(0);" data-bs-toggle="dropdown">
									<i class="isax isax-more"></i>
								</a>
								<ul class="dropdown-menu">
									<li>
										<a href="{{url('customer-invoice-details')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-eye me-2"></i>View</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-document-download me-2"></i>Download Invoices as PDF</a>
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
								<a href="{{url('customer-invoice-details')}}" class="link-default">INV00012</a>
							</td>
							<td>07 Aug 2024</td>
							<td class="text-dark">$2,10,000</td>
							<td>$1,50,000</td>
							<td>
								<span class="badge badge-soft-info d-inline-flex align-items-center">Partially Paid
									<i class="isax isax-timer ms-1"></i>
								</span>
							</td>
							<td class="text-dark">Check</td>
							<td>20 Aug 2024</td>
							<td>
								<button type="button" class="btn btn-primary btn-sm" data-bs-toggle="offcanvas" data-bs-target="#customcanvas2">Pay Now</button>
							</td>
							<td class="action-item">
								<a href="javascript:void(0);" data-bs-toggle="dropdown">
									<i class="isax isax-more"></i>
								</a>
								<ul class="dropdown-menu">
									<li>
										<a href="{{url('customer-invoice-details')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-eye me-2"></i>View</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-document-download me-2"></i>Download Invoices as PDF</a>
									</li>
								</ul>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<!-- /Table List End -->

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
							<div class="mb-3">
								<div class="input-icon-start position-relative">
									<span class="input-icon-addon fs-12">
										<i class="isax isax-search-normal"></i>
									</span>
									<input type="text" class="form-control form-control-sm" placeholder="Search">
								</div>
							</div>
							<ul class="mb-3">
								<li>
									<label class="dropdown-item px-2 d-flex align-items-center text-dark">
										<input class="form-check-input m-0 me-2" type="checkbox"> $10,000
									</label>
								</li>
								<li>
									<label class="dropdown-item px-2 d-flex align-items-center text-dark">
										<input class="form-check-input m-0 me-2" type="checkbox"> $25,750
									</label>
								</li>
								<li>
									<label class="dropdown-item px-2 d-flex align-items-center text-dark">
										<input class="form-check-input m-0 me-2" type="checkbox"> $50,125
									</label>
								</li>
								<li>
									<label class="dropdown-item px-2 d-flex align-items-center text-dark">
										<input class="form-check-input m-0 me-2" type="checkbox"> $75,900
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
										<i class="fa-solid fa-circle fs-6 text-warning me-1"></i>Unpaid
									</label>
								</li>
								<li>
									<label class="dropdown-item px-2 d-flex align-items-center text-dark">
										<input class="form-check-input m-0 me-2" type="checkbox">
										<i class="fa-solid fa-circle fs-6 text-danger me-1"></i>Cancelled
									</label>
								</li>
								<li>
									<label class="dropdown-item px-2 d-flex align-items-center text-dark">
										<input class="form-check-input m-0 me-2" type="checkbox">
										<i class="fa-solid fa-circle fs-6 text-purple me-1"></i>Partially Paid
									</label>
								</li>
								<li>
									<label class="dropdown-item px-2 d-flex align-items-center text-dark">
										<input class="form-check-input m-0 me-2" type="checkbox">
										<i class="fa-solid fa-circle fs-6 text-orange me-1"></i>Overdue
									</label>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div>
					<label class="form-label">Payment Mode</label>
					<div class="dropdown">
						<a href="javascript:void(0);" class="dropdown-toggle btn btn-lg bg-light  d-flex align-items-center justify-content-start fs-13 fw-normal border" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="true">
							Select
						</a>
						<div class="dropdown-menu shadow-lg w-100 dropdown-info">
							<ul class="mb-3">
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