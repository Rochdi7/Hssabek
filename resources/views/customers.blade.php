<?php $page = 'customers'; ?>
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
					<h6>Customers</h6>
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
					<div>
						<a href="{{url('add-customer')}}" class="btn btn-primary d-flex align-items-center">
							<i class="isax isax-add-circle5 me-1"></i>New Customer
						</a>
					</div>
				</div>
			</div>
			<!-- End Page Header -->

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
							<ul class="dropdown-menu  dropdown-menu">
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
										<span>Phone</span>
									</label>
								</li>
								<li>
									<label class="dropdown-item d-flex align-items-center form-switch">
										<i class="fa-solid fa-grip-vertical me-3 text-default"></i>
										<input class="form-check-input m-0 me-2" type="checkbox" checked>
										<span>Counrty</span>
									</label>
								</li>
								<li>
									<label class="dropdown-item d-flex align-items-center form-switch">
										<i class="fa-solid fa-grip-vertical me-3 text-default"></i>
										<input class="form-check-input m-0 me-2" type="checkbox">
										<span>Balance</span>
									</label>
								</li>
								<li>
									<label class="dropdown-item d-flex align-items-center form-switch">
										<i class="fa-solid fa-grip-vertical me-3 text-default"></i>
										<input class="form-check-input m-0 me-2" type="checkbox" checked>
										<span>Total Invoice</span>
									</label>
								</li>
								<li>
									<label class="dropdown-item d-flex align-items-center form-switch">
										<i class="fa-solid fa-grip-vertical me-3 text-default"></i>
										<input class="form-check-input m-0 me-2" type="checkbox">
										<span>Created On</span>
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
					<span class="tag bg-light border rounded-1 fs-12 text-dark badge"><span class="num-count d-inline-flex align-items-center justify-content-center bg-success fs-10 me-1">1</span>$10,000 - $25,000<span class="ms-1 tag-close"><i class="fa-solid fa-x fs-10"></i></span></span>
					<span class="tag bg-light border rounded-1 fs-12 text-dark badge"><span class="num-count d-inline-flex align-items-center justify-content-center bg-success fs-10 me-1">2</span>Status Selected<span class="ms-1 tag-close"><i class="fa-solid fa-x fs-10"></i></span></span>
					<a href="#" class="link-danger fw-medium text-decoration-underline ms-md-1">Clear All</a>
				</div>
				<!-- /Filter Info -->
			</div>
			<!-- Table Search End -->

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
							<th>Customer</th>
							<th>Phone</th>
							<th>Country</th>
							<th>Balance</th>
							<th class="no-sort">Total Invoice</th>
							<th>Created On</th>
							<th class="no-sort">Status</th>
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
								<div class="d-flex align-items-center">
									<a href="{{url('customer-details')}}" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
										<img src="{{URL::asset('build/img/profiles/avatar-28.jpg')}}" class="rounded-circle" alt="img">
									</a>
									<div>
										<h6 class="fs-14 fw-medium mb-0"><a href="{{url('customer-details')}}">Emily Clark</a></h6>
									</div>
								</div>
							</td>
							<td>
								+1 202-555-0198
							</td>
							<td>
								<div class="d-flex align-items-center">
									<a href="javascript:void(0);" class=" me-2 flex-shrink-0">
										<img src="{{URL::asset('build/img/icons/flag-1.svg')}}" alt="img">
									</a>
									<div>
										<h6 class="fs-14 fw-medium mb-0"><a href="javascript:void(0);">USA</a></h6>
									</div>
								</div>
							</td>
							<td>$10,000</td>
							<td>12</td>
							<td>22 Feb 2025</td>
							<td>
								<span class="badge badge-soft-success d-inline-flex align-items-center">Active <i class="isax isax-tick-circle ms-1"></i></span>
							</td>
							<td>
								<div class="d-flex align-items-center">
									<a href="{{url('add-invoice')}}" class="btn btn-sm btn-outline-white d-inline-flex align-items-center me-1">
										<i class="isax isax-add-circle me-1"></i> Invoice
									</a>
									<a href="#" class="btn btn-sm btn-outline-white d-inline-flex align-items-center me-1" data-bs-toggle="modal" data-bs-target="#view-ledger">
										<i class="isax isax-document-text-1 me-1"></i> Ledger
									</a>
								</div>
							</td>
							<td class="action-item">
								<a href="javascript:void(0);" data-bs-toggle="dropdown">
									<i class="isax isax-more"></i>
								</a>
								<ul class="dropdown-menu">
									<li>
										<a href="{{url('customer-details')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-eye me-2"></i>View</a>
									</li>
									<li>
										<a href="{{url('edit-customer')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-edit me-2"></i>Edit</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-archive-2 me-2"></i>Archive</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
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
								<div class="d-flex align-items-center">
									<a href="{{url('customer-details')}}" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
										<img src="{{URL::asset('build/img/profiles/avatar-29.jpg')}}" class="rounded-circle" alt="img">
									</a>
									<div>
										<h6 class="fs-14 fw-medium mb-0"><a href="{{url('customer-details')}}">John Carter</a></h6>
									</div>
								</div>
							</td>
							<td>+1 305-456-7821</td>
							<td>
								<div class="d-flex align-items-center">
									<a href="javascript:void(0);" class=" me-2 flex-shrink-0">
										<img src="{{URL::asset('build/img/icons/flag-2.svg')}}" alt="img">
									</a>
									<div>
										<h6 class="fs-14 fw-medium mb-0"><a href="javascript:void(0);">Canada</a></h6>
									</div>
								</div>
							</td>
							<td>$25,750</td>
							<td>6</td>
							<td>07 Feb 2025</td>
							<td>
								<span class="badge badge-soft-danger d-inline-flex align-items-center">Inactive<i class="isax isax-close-circle ms-1"></i></span>
							</td>
							<td>
								<div class="d-flex align-items-center">
									<a href="{{url('add-invoice')}}" class="btn btn-sm btn-outline-white d-inline-flex align-items-center me-1">
										<i class="isax isax-add-circle me-1"></i> Invoice
									</a>
									<a href="#" class="btn btn-sm btn-outline-white d-inline-flex align-items-center me-1" data-bs-toggle="modal" data-bs-target="#view-ledger">
										<i class="isax isax-document-text-1 me-1"></i> Ledger
									</a>
								</div>
							</td>
							<td class="action-item">
								<a href="javascript:void(0);" data-bs-toggle="dropdown">
									<i class="isax isax-more"></i>
								</a>
								<ul class="dropdown-menu">
									<li>
										<a href="{{url('customer-details')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-eye me-2"></i>View</a>
									</li>
									<li>
										<a href="{{url('edit-customer')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-edit me-2"></i>Edit</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-archive-2 me-2"></i>Archive</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
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
								<div class="d-flex align-items-center">
									<a href="{{url('customer-details')}}" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
										<img src="{{URL::asset('build/img/profiles/avatar-12.jpg')}}" class="rounded-circle" alt="img">
									</a>
									<div>
										<h6 class="fs-14 fw-medium mb-0"><a href="{{url('customer-details')}}">Sophia White</a></h6>
									</div>
								</div>
							</td>
							<td>+1 415-678-1234</td>
							<td>
								<div class="d-flex align-items-center">
									<a href="javascript:void(0);" class=" me-2 flex-shrink-0">
										<img src="{{URL::asset('build/img/icons/flag-3.svg')}}" alt="img">
									</a>
									<div>
										<h6 class="fs-14 fw-medium mb-0"><a href="javascript:void(0);">UK</a></h6>
									</div>
								</div>
							</td>
							<td>$50,125</td>
							<td>3</td>
							<td>30 Jan 2025</td>
							<td>
								<span class="badge badge-soft-success d-inline-flex align-items-center">Active <i class="isax isax-tick-circle ms-1"></i></span>
							</td>
							<td>
								<div class="d-flex align-items-center">
									<a href="{{url('add-invoice')}}" class="btn btn-sm btn-outline-white d-inline-flex align-items-center me-1">
										<i class="isax isax-add-circle me-1"></i> Invoice
									</a>
									<a href="#" class="btn btn-sm btn-outline-white d-inline-flex align-items-center me-1" data-bs-toggle="modal" data-bs-target="#view-ledger">
										<i class="isax isax-document-text-1 me-1"></i> Ledger
									</a>
								</div>
							</td>
							<td class="action-item">
								<a href="javascript:void(0);" data-bs-toggle="dropdown">
									<i class="isax isax-more"></i>
								</a>
								<ul class="dropdown-menu">
									<li>
										<a href="{{url('customer-details')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-eye me-2"></i>View</a>
									</li>
									<li>
										<a href="{{url('edit-customer')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-edit me-2"></i>Edit</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-archive-2 me-2"></i>Archive</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
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
								<div class="d-flex align-items-center">
									<a href="{{url('customer-details')}}" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
										<img src="{{URL::asset('build/img/profiles/avatar-06.jpg')}}" class="rounded-circle" alt="img">
									</a>
									<div>
										<h6 class="fs-14 fw-medium mb-0"><a href="{{url('customer-details')}}">Michael Johnson</a></h6>
									</div>
								</div>
							</td>
							<td>+1 718-987-6543</td>
							<td>
								<div class="d-flex align-items-center">
									<a href="javascript:void(0);" class=" me-2 flex-shrink-0">
										<img src="{{URL::asset('build/img/icons/flag-4.svg')}}" alt="img">
									</a>
									<div>
										<h6 class="fs-14 fw-medium mb-0"><a href="javascript:void(0);">Germany</a></h6>
									</div>
								</div>
							</td>
							<td>$75,900</td>
							<td>10</td>
							<td>17 Jan 2025</td>
							<td>
								<span class="badge badge-soft-danger d-inline-flex align-items-center">Inactive<i class="isax isax-close-circle ms-1"></i></span>
							</td>
							<td>
								<div class="d-flex align-items-center">
									<a href="{{url('add-invoice')}}" class="btn btn-sm btn-outline-white d-inline-flex align-items-center me-1">
										<i class="isax isax-add-circle me-1"></i> Invoice
									</a>
									<a href="#" class="btn btn-sm btn-outline-white d-inline-flex align-items-center me-1" data-bs-toggle="modal" data-bs-target="#view-ledger">
										<i class="isax isax-document-text-1 me-1"></i> Ledger
									</a>
								</div>
							</td>
							<td class="action-item">
								<a href="javascript:void(0);" data-bs-toggle="dropdown">
									<i class="isax isax-more"></i>
								</a>
								<ul class="dropdown-menu">
									<li>
										<a href="{{url('customer-details')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-eye me-2"></i>View</a>
									</li>
									<li>
										<a href="{{url('edit-customer')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-edit me-2"></i>Edit</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-archive-2 me-2"></i>Archive</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
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
								<div class="d-flex align-items-center">
									<a href="{{url('customer-details')}}" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
										<img src="{{URL::asset('build/img/profiles/avatar-30.jpg')}}" class="rounded-circle" alt="img">
									</a>
									<div>
										<h6 class="fs-14 fw-medium mb-0"><a href="{{url('customer-details')}}">Olivia Harris</a></h6>
									</div>
								</div>
							</td>
							<td>+1 909-234-5678</td>
							<td>
								<div class="d-flex align-items-center">
									<a href="javascript:void(0);" class=" me-2 flex-shrink-0">
										<img src="{{URL::asset('build/img/icons/flag-5.svg')}}" alt="img">
									</a>
									<div>
										<h6 class="fs-14 fw-medium mb-0"><a href="javascript:void(0);">France</a></h6>
									</div>
								</div>
							</td>
							<td>$99,999</td>
							<td>9</td>
							<td>04 Jan 2025</td>
							<td>
								<span class="badge badge-soft-success d-inline-flex align-items-center">Active <i class="isax isax-tick-circle ms-1"></i></span>
							</td>
							<td>
								<div class="d-flex align-items-center">
									<a href="{{url('add-invoice')}}" class="btn btn-sm btn-outline-white d-inline-flex align-items-center me-1">
										<i class="isax isax-add-circle me-1"></i> Invoice
									</a>
									<a href="#" class="btn btn-sm btn-outline-white d-inline-flex align-items-center me-1" data-bs-toggle="modal" data-bs-target="#view-ledger">
										<i class="isax isax-document-text-1 me-1"></i> Ledger
									</a>
								</div>
							</td>
							<td class="action-item">
								<a href="javascript:void(0);" data-bs-toggle="dropdown">
									<i class="isax isax-more"></i>
								</a>
								<ul class="dropdown-menu">
									<li>
										<a href="{{url('customer-details')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-eye me-2"></i>View</a>
									</li>
									<li>
										<a href="{{url('edit-customer')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-edit me-2"></i>Edit</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-archive-2 me-2"></i>Archive</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
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
								<div class="d-flex align-items-center">
									<a href="{{url('customer-details')}}" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
										<img src="{{URL::asset('build/img/profiles/avatar-16.jpg')}}" class="rounded-circle" alt="img">
									</a>
									<div>
										<h6 class="fs-14 fw-medium mb-0"><a href="{{url('customer-details')}}">David Anderson</a></h6>
									</div>
								</div>
							</td>
							<td>+1 602-789-3456</td>
							<td>
								<div class="d-flex align-items-center">
									<a href="javascript:void(0);" class=" me-2 flex-shrink-0">
										<img src="{{URL::asset('build/img/icons/flag-6.svg')}}" alt="img">
									</a>
									<div>
										<h6 class="fs-14 fw-medium mb-0"><a href="javascript:void(0);">Argentina</a></h6>
									</div>
								</div>
							</td>
							<td>$1,20,500</td>
							<td>12</td>
							<td>09 Dec 2024</td>
							<td>
								<span class="badge badge-soft-danger d-inline-flex align-items-center">Inactive<i class="isax isax-close-circle ms-1"></i></span>
							</td>
							<td>
								<div class="d-flex align-items-center">
									<a href="{{url('add-invoice')}}" class="btn btn-sm btn-outline-white d-inline-flex align-items-center me-1">
										<i class="isax isax-add-circle me-1"></i> Invoice
									</a>
									<a href="#" class="btn btn-sm btn-outline-white d-inline-flex align-items-center me-1" data-bs-toggle="modal" data-bs-target="#view-ledger">
										<i class="isax isax-document-text-1 me-1"></i> Ledger
									</a>
								</div>
							</td>
							<td class="action-item">
								<a href="javascript:void(0);" data-bs-toggle="dropdown">
									<i class="isax isax-more"></i>
								</a>
								<ul class="dropdown-menu">
									<li>
										<a href="{{url('customer-details')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-eye me-2"></i>View</a>
									</li>
									<li>
										<a href="{{url('edit-customer')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-edit me-2"></i>Edit</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-archive-2 me-2"></i>Archive</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
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
								<div class="d-flex align-items-center">
									<a href="{{url('customer-details')}}" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
										<img src="{{URL::asset('build/img/profiles/avatar-17.jpg')}}" class="rounded-circle" alt="img">
									</a>
									<div>
										<h6 class="fs-14 fw-medium mb-0"><a href="{{url('customer-details')}}">Emma Lewis</a></h6>
									</div>
								</div>
							</td>
							<td>+1 812-456-9087</td>
							<td>
								<div class="d-flex align-items-center">
									<a href="javascript:void(0);" class=" me-2 flex-shrink-0">
										<img src="{{URL::asset('build/img/icons/flag-7.svg')}}" alt="img">
									</a>
									<div>
										<h6 class="fs-14 fw-medium mb-0"><a href="javascript:void(0);">India</a></h6>
									</div>
								</div>
							</td>
							<td>$2,50,000</td>
							<td>8</td>
							<td>02 Dec 2024</td>
							<td>
								<span class="badge badge-soft-success d-inline-flex align-items-center">Active <i class="isax isax-tick-circle ms-1"></i></span>
							</td>
							<td>
								<div class="d-flex align-items-center">
									<a href="{{url('add-invoice')}}" class="btn btn-sm btn-outline-white d-inline-flex align-items-center me-1">
										<i class="isax isax-add-circle me-1"></i> Invoice
									</a>
									<a href="#" class="btn btn-sm btn-outline-white d-inline-flex align-items-center me-1" data-bs-toggle="modal" data-bs-target="#view-ledger">
										<i class="isax isax-document-text-1 me-1"></i> Ledger
									</a>
								</div>
							</td>
							<td class="action-item">
								<a href="javascript:void(0);" data-bs-toggle="dropdown">
									<i class="isax isax-more"></i>
								</a>
								<ul class="dropdown-menu">
									<li>
										<a href="{{url('customer-details')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-eye me-2"></i>View</a>
									</li>
									<li>
										<a href="{{url('edit-customer')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-edit me-2"></i>Edit</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-archive-2 me-2"></i>Archive</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
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
								<div class="d-flex align-items-center">
									<a href="{{url('customer-details')}}" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
										<img src="{{URL::asset('build/img/profiles/avatar-23.jpg')}}" class="rounded-circle" alt="img">
									</a>
									<div>
										<h6 class="fs-14 fw-medium mb-0"><a href="{{url('customer-details')}}">Robert Thomas</a></h6>
									</div>
								</div>
							</td>
							<td>+1 214-123-4567</td>
							<td>
								<div class="d-flex align-items-center">
									<a href="javascript:void(0);" class=" me-2 flex-shrink-0">
										<img src="{{URL::asset('build/img/icons/flag-8.svg')}}" alt="img">
									</a>
									<div>
										<h6 class="fs-14 fw-medium mb-0"><a href="javascript:void(0);">Italy</a></h6>
									</div>
								</div>
							</td>
							<td>$5,00,750</td>
							<td>15</td>
							<td>15 Nov 2024</td>
							<td>
								<span class="badge badge-soft-danger d-inline-flex align-items-center">Inactive<i class="isax isax-close-circle ms-1"></i></span>
							</td>
							<td>
								<div class="d-flex align-items-center">
									<a href="{{url('add-invoice')}}" class="btn btn-sm btn-outline-white d-inline-flex align-items-center me-1">
										<i class="isax isax-add-circle me-1"></i> Invoice
									</a>
									<a href="#" class="btn btn-sm btn-outline-white d-inline-flex align-items-center me-1" data-bs-toggle="modal" data-bs-target="#view-ledger">
										<i class="isax isax-document-text-1 me-1"></i> Ledger
									</a>
								</div>
							</td>
							<td class="action-item">
								<a href="javascript:void(0);" data-bs-toggle="dropdown">
									<i class="isax isax-more"></i>
								</a>
								<ul class="dropdown-menu">
									<li>
										<a href="{{url('customer-details')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-eye me-2"></i>View</a>
									</li>
									<li>
										<a href="{{url('edit-customer')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-edit me-2"></i>Edit</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-archive-2 me-2"></i>Archive</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
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
								<div class="d-flex align-items-center">
									<a href="{{url('customer-details')}}" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
										<img src="{{URL::asset('build/img/profiles/avatar-07.jpg')}}" class="rounded-circle" alt="img">
									</a>
									<div>
										<h6 class="fs-14 fw-medium mb-0"><a href="{{url('customer-details')}}">Isabella Scott</a></h6>
									</div>
								</div>
							</td>
							<td>+1 646-789-1230</td>
							<td>
								<div class="d-flex align-items-center">
									<a href="javascript:void(0);" class=" me-2 flex-shrink-0">
										<img src="{{URL::asset('build/img/icons/flag-9.svg')}}" alt="img">
									</a>
									<div>
										<h6 class="fs-14 fw-medium mb-0"><a href="javascript:void(0);">New Zealand</a></h6>
									</div>
								</div>
							</td>
							<td>$7,50,300</td>
							<td>21</td>
							<td>30 Nov 2024</td>
							<td>
								<span class="badge badge-soft-success d-inline-flex align-items-center">Active <i class="isax isax-tick-circle ms-1"></i></span>
							</td>
							<td>
								<div class="d-flex align-items-center">
									<a href="{{url('add-invoice')}}" class="btn btn-sm btn-outline-white d-inline-flex align-items-center me-1">
										<i class="isax isax-add-circle me-1"></i> Invoice
									</a>
									<a href="#" class="btn btn-sm btn-outline-white d-inline-flex align-items-center me-1" data-bs-toggle="modal" data-bs-target="#view-ledger">
										<i class="isax isax-document-text-1 me-1"></i> Ledger
									</a>
								</div>
							</td>
							<td class="action-item">
								<a href="javascript:void(0);" data-bs-toggle="dropdown">
									<i class="isax isax-more"></i>
								</a>
								<ul class="dropdown-menu">
									<li>
										<a href="{{url('customer-details')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-eye me-2"></i>View</a>
									</li>
									<li>
										<a href="{{url('edit-customer')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-edit me-2"></i>Edit</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-archive-2 me-2"></i>Archive</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
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
								<div class="d-flex align-items-center">
									<a href="{{url('customer-details')}}" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
										<img src="{{URL::asset('build/img/profiles/avatar-31.jpg')}}" class="rounded-circle" alt="img">
									</a>
									<div>
										<h6 class="fs-14 fw-medium mb-0"><a href="{{url('customer-details')}}">Daniel Martinez</a></h6>
									</div>
								</div>
							</td>
							<td>+1 901-678-4321</td>
							<td>
								<div class="d-flex align-items-center">
									<a href="javascript:void(0);" class=" me-2 flex-shrink-0">
										<img src="{{URL::asset('build/img/icons/flag-10.svg')}}" alt="img">
									</a>
									<div>
										<h6 class="fs-14 fw-medium mb-0"><a href="javascript:void(0);">Australia</a></h6>
									</div>
								</div>
							</td>
							<td>$9,99,999</td>
							<td>14</td>
							<td>12 Oct 2024</td>
							<td>
								<span class="badge badge-soft-danger d-inline-flex align-items-center">Inactive<i class="isax isax-close-circle ms-1"></i></span>
							</td>
							<td>
								<div class="d-flex align-items-center">
									<a href="{{url('add-invoice')}}" class="btn btn-sm btn-outline-white d-inline-flex align-items-center me-1">
										<i class="isax isax-add-circle me-1"></i> Invoice
									</a>
									<a href="#" class="btn btn-sm btn-outline-white d-inline-flex align-items-center me-1" data-bs-toggle="modal" data-bs-target="#view-ledger">
										<i class="isax isax-document-text-1 me-1"></i> Ledger
									</a>
								</div>
							</td>
							<td class="action-item">
								<a href="javascript:void(0);" data-bs-toggle="dropdown">
									<i class="isax isax-more"></i>
								</a>
								<ul class="dropdown-menu">
									<li>
										<a href="{{url('customer-details')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-eye me-2"></i>View</a>
									</li>
									<li>
										<a href="{{url('edit-customer')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-edit me-2"></i>Edit</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-archive-2 me-2"></i>Archive</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
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
								<div class="d-flex align-items-center">
									<a href="{{url('customer-details')}}" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
										<img src="{{URL::asset('build/img/profiles/avatar-32.jpg')}}" class="rounded-circle" alt="img">
									</a>
									<div>
										<h6 class="fs-14 fw-medium mb-0"><a href="{{url('customer-details')}}">Charlotte Brown</a></h6>
									</div>
								</div>
							</td>
							<td>+1 503-987-2105</td>
							<td>
								<div class="d-flex align-items-center">
									<a href="javascript:void(0);" class=" me-2 flex-shrink-0">
										<img src="{{URL::asset('build/img/icons/flag-11.svg')}}" alt="img">
									</a>
									<div>
										<h6 class="fs-14 fw-medium mb-0"><a href="javascript:void(0);">China</a></h6>
									</div>
								</div>
							</td>
							<td>$87,650</td>
							<td>6</td>
							<td>05 Oct 2024</td>
							<td>
								<span class="badge badge-soft-success d-inline-flex align-items-center">Active <i class="isax isax-tick-circle ms-1"></i></span>
							</td>
							<td>
								<div class="d-flex align-items-center">
									<a href="{{url('add-invoice')}}" class="btn btn-sm btn-outline-white d-inline-flex align-items-center me-1">
										<i class="isax isax-add-circle me-1"></i> Invoice
									</a>
									<a href="#" class="btn btn-sm btn-outline-white d-inline-flex align-items-center me-1" data-bs-toggle="modal" data-bs-target="#view-ledger">
										<i class="isax isax-document-text-1 me-1"></i> Ledger
									</a>
								</div>
							</td>
							<td class="action-item">
								<a href="javascript:void(0);" data-bs-toggle="dropdown">
									<i class="isax isax-more"></i>
								</a>
								<ul class="dropdown-menu">
									<li>
										<a href="{{url('customer-details')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-eye me-2"></i>View</a>
									</li>
									<li>
										<a href="{{url('edit-customer')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-edit me-2"></i>Edit</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-archive-2 me-2"></i>Archive</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
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
								<div class="d-flex align-items-center">
									<a href="{{url('customer-details')}}" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
										<img src="{{URL::asset('build/img/profiles/avatar-33.jpg')}}" class="rounded-circle" alt="img">
									</a>
									<div>
										<h6 class="fs-14 fw-medium mb-0"><a href="{{url('customer-details')}}">William Parker</a></h6>
									</div>
								</div>
							</td>
							<td>+1 320-345-6789</td>
							<td>
								<div class="d-flex align-items-center">
									<a href="javascript:void(0);" class=" me-2 flex-shrink-0">
										<img src="{{URL::asset('build/img/icons/flag-12.svg')}}" alt="img">
									</a>
									<div>
										<h6 class="fs-14 fw-medium mb-0"><a href="javascript:void(0);">Brazil</a></h6>
									</div>
								</div>
							</td>
							<td>$69,420</td>
							<td>16</td>
							<td>09 Oct 2024</td>
							<td>
								<span class="badge badge-soft-danger d-inline-flex align-items-center">Inactive<i class="isax isax-close-circle ms-1"></i></span>
							</td>
							<td>
								<div class="d-flex align-items-center">
									<a href="{{url('add-invoice')}}" class="btn btn-sm btn-outline-white d-inline-flex align-items-center me-1">
										<i class="isax isax-add-circle me-1"></i> Invoice
									</a>
									<a href="#" class="btn btn-sm btn-outline-white d-inline-flex align-items-center me-1" data-bs-toggle="modal" data-bs-target="#view-ledger">
										<i class="isax isax-document-text-1 me-1"></i> Ledger
									</a>
								</div>
							</td>
							<td class="action-item">
								<a href="javascript:void(0);" data-bs-toggle="dropdown">
									<i class="isax isax-more"></i>
								</a>
								<ul class="dropdown-menu">
									<li>
										<a href="{{url('customer-details')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-eye me-2"></i>View</a>
									</li>
									<li>
										<a href="{{url('edit-customer')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-edit me-2"></i>Edit</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-archive-2 me-2"></i>Archive</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
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
								<div class="d-flex align-items-center">
									<a href="{{url('customer-details')}}" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
										<img src="{{URL::asset('build/img/profiles/avatar-34.jpg')}}" class="rounded-circle" alt="img">
									</a>
									<div>
										<h6 class="fs-14 fw-medium mb-0"><a href="{{url('customer-details')}}">Mia Thompson</a></h6>
									</div>
								</div>
							</td>
							<td>+1 720-654-7890</td>
							<td>
								<div class="d-flex align-items-center">
									<a href="javascript:void(0);" class=" me-2 flex-shrink-0">
										<img src="{{URL::asset('build/img/icons/flag-13.svg')}}" alt="img">
									</a>
									<div>
										<h6 class="fs-14 fw-medium mb-0"><a href="javascript:void(0);">Turkey</a></h6>
									</div>
								</div>
							</td>
							<td>$33,210</td>
							<td>18</td>
							<td>02 Sep 2024</td>
							<td>
								<span class="badge badge-soft-success d-inline-flex align-items-center">Active <i class="isax isax-tick-circle ms-1"></i></span>
							</td>
							<td>
								<div class="d-flex align-items-center">
									<a href="{{url('add-invoice')}}" class="btn btn-sm btn-outline-white d-inline-flex align-items-center me-1">
										<i class="isax isax-add-circle me-1"></i> Invoice
									</a>
									<a href="#" class="btn btn-sm btn-outline-white d-inline-flex align-items-center me-1" data-bs-toggle="modal" data-bs-target="#view-ledger">
										<i class="isax isax-document-text-1 me-1"></i> Ledger
									</a>
								</div>
							</td>
							<td class="action-item">
								<a href="javascript:void(0);" data-bs-toggle="dropdown">
									<i class="isax isax-more"></i>
								</a>
								<ul class="dropdown-menu">
									<li>
										<a href="{{url('customer-details')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-eye me-2"></i>View</a>
									</li>
									<li>
										<a href="{{url('edit-customer')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-edit me-2"></i>Edit</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-archive-2 me-2"></i>Archive</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
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
								<div class="d-flex align-items-center">
									<a href="{{url('customer-details')}}" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
										<img src="{{URL::asset('build/img/profiles/avatar-35.jpg')}}" class="rounded-circle" alt="img">
									</a>
									<div>
										<h6 class="fs-14 fw-medium mb-0"><a href="{{url('customer-details')}}">Amelia Robinson</a></h6>
									</div>
								</div>
							</td>
							<td>+1 919-321-9876</td>
							<td>
								<div class="d-flex align-items-center">
									<a href="javascript:void(0);" class=" me-2 flex-shrink-0">
										<img src="{{URL::asset('build/img/icons/flag-14.svg')}}" alt="img">
									</a>
									<div>
										<h6 class="fs-14 fw-medium mb-0"><a href="javascript:void(0);">Turkey</a></h6>
									</div>
								</div>
							</td>
							<td>$2,10,000</td>
							<td>12</td>
							<td>07 Aug 2024</td>
							<td>
								<span class="badge badge-soft-danger d-inline-flex align-items-center">Inactive<i class="isax isax-close-circle ms-1"></i></span>
							</td>
							<td>
								<div class="d-flex align-items-center">
									<a href="{{url('add-invoice')}}" class="btn btn-sm btn-outline-white d-inline-flex align-items-center me-1">
										<i class="isax isax-add-circle me-1"></i> Invoice
									</a>
									<a href="#" class="btn btn-sm btn-outline-white d-inline-flex align-items-center me-1" data-bs-toggle="modal" data-bs-target="#view-ledger">
										<i class="isax isax-document-text-1 me-1"></i> Ledger
									</a>
								</div>
							</td>
							<td class="action-item">
								<a href="javascript:void(0);" data-bs-toggle="dropdown">
									<i class="isax isax-more"></i>
								</a>
								<ul class="dropdown-menu">
									<li>
										<a href="{{url('customer-details')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-eye me-2"></i>View</a>
									</li>
									<li>
										<a href="{{url('edit-customer')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-edit me-2"></i>Edit</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-archive-2 me-2"></i>Archive</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
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
					<label class="form-label">Customers</label>
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
										<input class="form-check-input m-0 me-2" type="checkbox">
										<span class="avatar avatar-sm rounded-circle me-2"><img src="{{URL::asset('build/img/profiles/avatar-28.jpg')}}" class="flex-shrink-0 rounded-circle" alt="img"></span>Emily Clark
									</label>
								</li>
								<li>
									<label class="dropdown-item px-2 d-flex align-items-center text-dark">
										<input class="form-check-input m-0 me-2" type="checkbox">
										<span class="avatar avatar-sm rounded-circle me-2"><img src="{{URL::asset('build/img/profiles/avatar-29.jpg')}}" class="flex-shrink-0 rounded-circle" alt="img"></span>John Carter
									</label>
								</li>
								<li>
									<label class="dropdown-item px-2 d-flex align-items-center text-dark">
										<input class="form-check-input m-0 me-2" type="checkbox">
										<span class="avatar avatar-sm rounded-circle me-2"><img src="{{URL::asset('build/img/profiles/avatar-12.jpg')}}" class="flex-shrink-0 rounded-circle" alt="img"></span>Sophia White
									</label>
								</li>
								<li>
									<label class="dropdown-item px-2 d-flex align-items-center text-dark">
										<input class="form-check-input m-0 me-2" type="checkbox">
										<span class="avatar avatar-sm rounded-circle me-2"><img src="{{URL::asset('build/img/profiles/avatar-06.jpg')}}" class="flex-shrink-0 rounded-circle" alt="img"></span>Sophia White
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
				<div class="mb-3">
					<label class="form-label">Country</label>
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
										<input class="form-check-input m-0 me-2" type="checkbox">
										<span class=" me-2"><img src="{{URL::asset('build/img/icons/flag-1.svg')}}" class="flex-shrink-0" alt="img"></span>United states
									</label>
								</li>
								<li>
									<label class="dropdown-item px-2 d-flex align-items-center text-dark">
										<input class="form-check-input m-0 me-2" type="checkbox">
										<span class=" me-2"><img src="{{URL::asset('build/img/icons/flag-2.svg')}}" class="flex-shrink-0" alt="img"></span>Canada
									</label>
								</li>
								<li>
									<label class="dropdown-item px-2 d-flex align-items-center text-dark">
										<input class="form-check-input m-0 me-2" type="checkbox">
										<span class=" me-2"><img src="{{URL::asset('build/img/icons/flag-3.svg')}}" class="flex-shrink-0" alt="img"></span>UK
									</label>
								</li>
								<li>
									<label class="dropdown-item px-2 d-flex align-items-center text-dark">
										<input class="form-check-input m-0 me-2" type="checkbox">
										<span class=" me-2"><img src="{{URL::asset('build/img/icons/flag-4.svg')}}" class="flex-shrink-0" alt="img"></span>Germany
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
					<label class="form-label">Balance</label>
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
										<i class="fa-solid fa-circle fs-6 text-success me-1"></i>Active
									</label>
								</li>
								<li>
									<label class="dropdown-item px-2 d-flex align-items-center text-dark">
										<input class="form-check-input m-0 me-2" type="checkbox">
										<i class="fa-solid fa-circle fs-6 text-danger me-1"></i>Inactive
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