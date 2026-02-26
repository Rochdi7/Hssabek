<?php $page = 'customer-quotations'; ?>
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
					<h6>Quotations</h6>
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
						<a href="{{url('customer-add-quotation')}}" class="btn btn-primary d-flex align-items-center">
							<i class="isax isax-add-circle5 me-1"></i>New Quotations
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
			<!-- /Table Search End  -->

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
							<th class="no-sort">Quotation ID</th>
							<th>Customer</th>
							<th>Created On</th>
							<th class="no-sort">Status</th>
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
								<a href="javascript:void(0);" class="link-default">QU0014</a>
							</td>
							<td>
								<div class="d-flex align-items-center">
									<a href="javascript:void(0);" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
										<img src="{{URL::asset('build/img/profiles/avatar-28.jpg')}}" class="rounded-circle" alt="img">
									</a>
									<div>
										<h6 class="fs-14 fw-medium mb-0"><a href="javascript:void(0);">Emily Clark</a></h6>
									</div>
								</div>
							</td>
							<td>22 Feb 2025</td>
							<td>
								<span class="badge badge-soft-success d-inline-flex align-items-center">Accepted <i class="isax isax-tick-circle ms-1"></i></span>
							</td>
							<td class="action-item">
								<a href="javascript:void(0);" data-bs-toggle="dropdown">
									<i class="isax isax-more"></i>
								</a>
								<ul class="dropdown-menu">
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#view_quotation"><i class="isax isax-eye me-2"></i>View</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-document-download me-2"></i>Download</a>
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
								<a href="javascript:void(0);" class="link-default">QU0013</a>
							</td>
							<td>
								<div class="d-flex align-items-center">
									<a href="javascript:void(0);" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
										<img src="{{URL::asset('build/img/profiles/avatar-29.jpg')}}" class="rounded-circle" alt="img">
									</a>
									<div>
										<h6 class="fs-14 fw-medium mb-0"><a href="javascript:void(0);">John Carter</a></h6>
									</div>
								</div>
							</td>
							<td>07 Feb 2025</td>
							<td>
								<span class="badge badge-soft-danger d-inline-flex align-items-center">Declined<i class="isax isax-close-circle ms-1"></i></span>
							</td>
							<td class="action-item">
								<a href="javascript:void(0);" data-bs-toggle="dropdown">
									<i class="isax isax-more"></i>
								</a>
								<ul class="dropdown-menu">
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#view_quotation"><i class="isax isax-eye me-2"></i>View</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-document-download me-2"></i>Download</a>
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
								<a href="javascript:void(0);" class="link-default">QU0012</a>
							</td>
							<td>
								<div class="d-flex align-items-center">
									<a href="javascript:void(0);" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
										<img src="{{URL::asset('build/img/profiles/avatar-12.jpg')}}" class="rounded-circle" alt="img">
									</a>
									<div>
										<h6 class="fs-14 fw-medium mb-0"><a href="javascript:void(0);">Sophia White</a></h6>
									</div>
								</div>
							</td>
							<td>30 Jan 2025</td>
							<td>
								<span class="badge badge-soft-info d-inline-flex align-items-center">Sent<i class="isax isax-arrow-right-2 ms-1"></i></span>
							</td>
							<td class="action-item">
								<a href="javascript:void(0);" data-bs-toggle="dropdown">
									<i class="isax isax-more"></i>
								</a>
								<ul class="dropdown-menu">
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#view_quotation"><i class="isax isax-eye me-2"></i>View</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-document-download me-2"></i>Download</a>
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
								<a href="javascript:void(0);" class="link-default">QU0011</a>
							</td>
							<td>
								<div class="d-flex align-items-center">
									<a href="javascript:void(0);" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
										<img src="{{URL::asset('build/img/profiles/avatar-06.jpg')}}" class="rounded-circle" alt="img">
									</a>
									<div>
										<h6 class="fs-14 fw-medium mb-0"><a href="javascript:void(0);">Michael Johnson</a></h6>
									</div>
								</div>
							</td>
							<td>17 Jan 2025</td>
							<td>
								<span class="badge badge-soft-light d-inline-flex align-items-center text-dark">Expired
									<i class="isax isax-timer-pause ms-1"></i>
								</span>
							</td>
							<td class="action-item">
								<a href="javascript:void(0);" data-bs-toggle="dropdown">
									<i class="isax isax-more"></i>
								</a>
								<ul class="dropdown-menu">
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#view_quotation"><i class="isax isax-eye me-2"></i>View</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-document-download me-2"></i>Download</a>
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
								<a href="javascript:void(0);" class="link-default">QU0010</a>
							</td>
							<td>
								<div class="d-flex align-items-center">
									<a href="javascript:void(0);" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
										<img src="{{URL::asset('build/img/profiles/avatar-30.jpg')}}" class="rounded-circle" alt="img">
									</a>
									<div>
										<h6 class="fs-14 fw-medium mb-0"><a href="javascript:void(0);">Olivia Harris</a></h6>
									</div>
								</div>
							</td>
							<td>04 Jan 2025</td>
							<td>
								<span class="badge badge-soft-success d-inline-flex align-items-center">Accepted <i class="isax isax-tick-circle ms-1"></i></span>
							</td>
							<td class="action-item">
								<a href="javascript:void(0);" data-bs-toggle="dropdown">
									<i class="isax isax-more"></i>
								</a>
								<ul class="dropdown-menu">
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#view_quotation"><i class="isax isax-eye me-2"></i>View</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-document-download me-2"></i>Download</a>
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
								<a href="javascript:void(0);" class="link-default">QU0009</a>
							</td>
							<td>
								<div class="d-flex align-items-center">
									<a href="javascript:void(0);" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
										<img src="{{URL::asset('build/img/profiles/avatar-16.jpg')}}" class="rounded-circle" alt="img">
									</a>
									<div>
										<h6 class="fs-14 fw-medium mb-0"><a href="javascript:void(0);">David Anderson</a></h6>
									</div>
								</div>
							</td>
							<td>09 Dec 2024</td>
							<td>
								<span class="badge badge-soft-danger d-inline-flex align-items-center">Declined<i class="isax isax-close-circle ms-1"></i></span>
							</td>
							<td class="action-item">
								<a href="javascript:void(0);" data-bs-toggle="dropdown">
									<i class="isax isax-more"></i>
								</a>
								<ul class="dropdown-menu">
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#view_quotation"><i class="isax isax-eye me-2"></i>View</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-document-download me-2"></i>Download</a>
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
								<a href="javascript:void(0);" class="link-default">QU0008</a>
							</td>
							<td>
								<div class="d-flex align-items-center">
									<a href="javascript:void(0);" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
										<img src="{{URL::asset('build/img/profiles/avatar-17.jpg')}}" class="rounded-circle" alt="img">
									</a>
									<div>
										<h6 class="fs-14 fw-medium mb-0"><a href="javascript:void(0);">Emma Lewis</a></h6>
									</div>
								</div>
							</td>
							<td>02 Dec 2024</td>
							<td>
								<span class="badge badge-soft-info d-inline-flex align-items-center">Sent<i class="isax isax-arrow-right-2 ms-1"></i></span>
							</td>
							<td class="action-item">
								<a href="javascript:void(0);" data-bs-toggle="dropdown">
									<i class="isax isax-more"></i>
								</a>
								<ul class="dropdown-menu">
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#view_quotation"><i class="isax isax-eye me-2"></i>View</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-document-download me-2"></i>Download</a>
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
								<a href="javascript:void(0);" class="link-default">QU0007</a>
							</td>
							<td>
								<div class="d-flex align-items-center">
									<a href="javascript:void(0);" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
										<img src="{{URL::asset('build/img/profiles/avatar-23.jpg')}}" class="rounded-circle" alt="img">
									</a>
									<div>
										<h6 class="fs-14 fw-medium mb-0"><a href="javascript:void(0);">Robert Thomas</a></h6>
									</div>
								</div>
							</td>
							<td>15 Nov 2024</td>
							<td>
								<span class="badge badge-soft-light d-inline-flex align-items-center text-dark">Expired
									<i class="isax isax-timer-pause ms-1"></i>
								</span>
							</td>
							<td class="action-item">
								<a href="javascript:void(0);" data-bs-toggle="dropdown">
									<i class="isax isax-more"></i>
								</a>
								<ul class="dropdown-menu">
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#view_quotation"><i class="isax isax-eye me-2"></i>View</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-document-download me-2"></i>Download</a>
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
								<a href="javascript:void(0);" class="link-default">QU0006</a>
							</td>
							<td>
								<div class="d-flex align-items-center">
									<a href="javascript:void(0);" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
										<img src="{{URL::asset('build/img/profiles/avatar-07.jpg')}}" class="rounded-circle" alt="img">
									</a>
									<div>
										<h6 class="fs-14 fw-medium mb-0"><a href="javascript:void(0);">Isabella Scott</a></h6>
									</div>
								</div>
							</td>
							<td>30 Nov 2024</td>
							<td>
								<span class="badge badge-soft-success d-inline-flex align-items-center">Accepted <i class="isax isax-tick-circle ms-1"></i></span>
							</td>
							<td class="action-item">
								<a href="javascript:void(0);" data-bs-toggle="dropdown">
									<i class="isax isax-more"></i>
								</a>
								<ul class="dropdown-menu">
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#view_quotation"><i class="isax isax-eye me-2"></i>View</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-document-download me-2"></i>Download</a>
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
								<a href="javascript:void(0);" class="link-default">QU0005</a>
							</td>
							<td>
								<div class="d-flex align-items-center">
									<a href="javascript:void(0);" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
										<img src="{{URL::asset('build/img/profiles/avatar-31.jpg')}}" class="rounded-circle" alt="img">
									</a>
									<div>
										<h6 class="fs-14 fw-medium mb-0"><a href="javascript:void(0);">Daniel Martinez</a></h6>
									</div>
								</div>
							</td>
							<td>12 Oct 2024</td>
							<td>
								<span class="badge badge-soft-danger d-inline-flex align-items-center">Declined<i class="isax isax-close-circle ms-1"></i></span>
							</td>
							<td class="action-item">
								<a href="javascript:void(0);" data-bs-toggle="dropdown">
									<i class="isax isax-more"></i>
								</a>
								<ul class="dropdown-menu">
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#view_quotation"><i class="isax isax-eye me-2"></i>View</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-document-download me-2"></i>Download</a>
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
								<a href="javascript:void(0);" class="link-default">QU0004</a>
							</td>
							<td>
								<div class="d-flex align-items-center">
									<a href="javascript:void(0);" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
										<img src="{{URL::asset('build/img/profiles/avatar-08.jpg')}}" class="rounded-circle" alt="img">
									</a>
									<div>
										<h6 class="fs-14 fw-medium mb-0"><a href="javascript:void(0);">Charlotte Brown</a></h6>
									</div>
								</div>
							</td>
							<td>05 Oct 2024</td>
							<td>
								<span class="badge badge-soft-info d-inline-flex align-items-center">Sent<i class="isax isax-arrow-right-2 ms-1"></i></span>
							</td>
							<td class="action-item">
								<a href="javascript:void(0);" data-bs-toggle="dropdown">
									<i class="isax isax-more"></i>
								</a>
								<ul class="dropdown-menu">
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#view_quotation"><i class="isax isax-eye me-2"></i>View</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-document-download me-2"></i>Download</a>
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
								<a href="javascript:void(0);" class="link-default">QU0003</a>
							</td>
							<td>
								<div class="d-flex align-items-center">
									<a href="javascript:void(0);" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
										<img src="{{URL::asset('build/img/profiles/avatar-10.jpg')}}" class="rounded-circle" alt="img">
									</a>
									<div>
										<h6 class="fs-14 fw-medium mb-0"><a href="javascript:void(0);">William Parker</a></h6>
									</div>
								</div>
							</td>
							<td>09 Oct 2024</td>
							<td>
								<span class="badge badge-soft-light d-inline-flex align-items-center text-dark">Expired
									<i class="isax isax-timer-pause ms-1"></i>
								</span>
							</td>
							<td class="action-item">
								<a href="javascript:void(0);" data-bs-toggle="dropdown">
									<i class="isax isax-more"></i>
								</a>
								<ul class="dropdown-menu">
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#view_quotation"><i class="isax isax-eye me-2"></i>View</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-document-download me-2"></i>Download</a>
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
								<a href="javascript:void(0);" class="link-default">QU0002</a>
							</td>
							<td>
								<div class="d-flex align-items-center">
									<a href="javascript:void(0);" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
										<img src="{{URL::asset('build/img/profiles/avatar-18.jpg')}}" class="rounded-circle" alt="img">
									</a>
									<div>
										<h6 class="fs-14 fw-medium mb-0"><a href="javascript:void(0);">Mia Thompson</a></h6>
									</div>
								</div>
							</td>
							<td>02 Sep 2024</td>
							<td>
								<span class="badge badge-soft-success d-inline-flex align-items-center">Accepted <i class="isax isax-tick-circle ms-1"></i></span>
							</td>
							<td class="action-item">
								<a href="javascript:void(0);" data-bs-toggle="dropdown">
									<i class="isax isax-more"></i>
								</a>
								<ul class="dropdown-menu">
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#view_quotation"><i class="isax isax-eye me-2"></i>View</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-document-download me-2"></i>Download</a>
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
								<a href="javascript:void(0);" class="link-default">QU0001</a>
							</td>
							<td>
								<div class="d-flex align-items-center">
									<a href="javascript:void(0);" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
										<img src="{{URL::asset('build/img/profiles/avatar-26.jpg')}}" class="rounded-circle" alt="img">
									</a>
									<div>
										<h6 class="fs-14 fw-medium mb-0"><a href="javascript:void(0);">Amelia Robinson</a></h6>
									</div>
								</div>
							</td>
							<td>07 Aug 2024</td>
							<td>
								<span class="badge badge-soft-danger d-inline-flex align-items-center">Declined<i class="isax isax-close-circle ms-1"></i></span>
							</td>
							<td class="action-item">
								<a href="javascript:void(0);" data-bs-toggle="dropdown">
									<i class="isax isax-more"></i>
								</a>
								<ul class="dropdown-menu">
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#view_quotation"><i class="isax isax-eye me-2"></i>View</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-document-download me-2"></i>Download</a>
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
		<div class="footer d-sm-flex align-items-center justify-content-between bg-white py-2 px-4">
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
									<a href="#" class="btn btn-outline-white w-100" id="close-filter">Cancel</a>
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
					<label class="form-label">Quotation Id</label>
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
										<input class="form-check-input m-0 me-2" type="checkbox"> QU0014
									</label>
								</li>
								<li>
									<label class="dropdown-item px-2 d-flex align-items-center text-dark">
										<input class="form-check-input m-0 me-2" type="checkbox"> QU0013
									</label>
								</li>
								<li>
									<label class="dropdown-item px-2 d-flex align-items-center text-dark">
										<input class="form-check-input m-0 me-2" type="checkbox"> QU0012
									</label>
								</li>
								<li>
									<label class="dropdown-item px-2 d-flex align-items-center text-dark">
										<input class="form-check-input m-0 me-2" type="checkbox"> QU0011
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
										<i class="fa-solid fa-circle fs-6 text-success me-1"></i>Accepted
									</label>
								</li>
								<li>
									<label class="dropdown-item px-2 d-flex align-items-center text-dark">
										<input class="form-check-input m-0 me-2" type="checkbox">
										<i class="fa-solid fa-circle fs-6 text-danger me-1"></i>Declined
									</label>
								</li>
								<li>
									<label class="dropdown-item px-2 d-flex align-items-center text-dark">
										<input class="form-check-input m-0 me-2" type="checkbox">
										<i class="fa-solid fa-circle fs-6 text-info me-1"></i>Sent
									</label>
								</li>
								<li>
									<label class="dropdown-item px-2 d-flex align-items-center text-dark">
										<input class="form-check-input m-0 me-2" type="checkbox">
										<i class="fa-solid fa-circle fs-6 text-dark me-1"></i>Expired
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