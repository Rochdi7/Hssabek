<?php $page = 'incomes'; ?>
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
					<h6>Income</h6>
				</div>
				<div class="my-xl-auto d-flex align-items-center gap-2">
					<div class="dropdown">
						<a href="javascript:void(0);" class="btn btn-outline-white d-inline-flex align-items-center"  data-bs-toggle="dropdown">
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
					
					<a href="javascript:void(0);" class="btn btn-primary d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#add_income"><i class="isax isax-add-circle5 me-1"></i>New Income</a>
				</div>
			</div>
			<!-- End Page Header -->

			<!-- Start Table Search -->
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
							<a href="javascript:void(0);" class="dropdown-toggle btn btn-outline-white d-inline-flex align-items-center fw-medium" data-bs-toggle="dropdown">
								<i class="isax isax-sort me-1"></i> Sort By : <span class="fw-normal ms-1">Latest</span>
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
										<input class="form-check-input m-0 me-2" type="checkbox">
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
							</ul>
						</div>
					</div>
				</div>				

				<!-- Filter Info -->
				<div class="align-items-center gap-2 flex-wrap filter-info mt-3">
					<h6 class="fs-13 fw-semibold">Filters</h6>
					<span class="tag bg-light border rounded-1 fs-12 text-dark badge"><span class="num-count d-inline-flex align-items-center justify-content-center bg-success fs-10 me-1">1</span>Payment Mode Selected<span class="ms-1 tag-close"><i class="fa-solid fa-x fs-10"></i></span></span>					
					<span class="tag bg-light border rounded-1 fs-12 text-dark badge"><span class="num-count d-inline-flex align-items-center justify-content-center bg-success fs-10 me-1">1</span>$10,000 - $25,500<span class="ms-1 tag-close"><i class="fa-solid fa-x fs-10"></i></span></span>					
					<a href="#" class="link-danger fw-medium text-decoration-underline ms-md-1">Clear All</a>
				</div>
				<!-- /Filter Info -->

			</div>
			<!-- End Table Search -->
			
			<!-- Table List Start -->
			<div class="table-responsive">
				<table class="table table-nowrap datatable">
					<thead>
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
							<th class="no-sort">Amount</th>
							<th>Payment Mode</th>
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
							<td><a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#details_income">INC00025</a></td>
							<td>22 Feb 2025</td>
							<td>REF17420</td>
							<td>Sale of laptops</td>
							
							<td>
								<p class="text-dark">$10,000</p>
							</td>
							<td>
								
								<p class="text-dark">Cash</p>
							</td>
							
							<td class="action-item">
								<a href="javascript:void(0);" data-bs-toggle="dropdown">
									<i class="isax isax-more"></i>
								</a>
								<ul class="dropdown-menu">
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#details_income"><i class="isax isax-eye me-2"></i>View</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#edit_income"><i class="isax isax-edit me-2"></i>Edit</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-document-download4 me-2"></i>Download</a>
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
							<td><a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#details_income">INC00024</a></td>
							<td>07 Feb 2025</td>
							<td>REF16512</td>
							<td>Website development</td>
							
							<td>
								<p class="text-dark">$25,750</p>
							</td>
							<td>
								
								<p class="text-dark">Cheque</p>
							</td>
							
							<td class="action-item">
								<a href="javascript:void(0);" data-bs-toggle="dropdown">
									<i class="isax isax-more"></i>
								</a>
								<ul class="dropdown-menu">
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#details_income"><i class="isax isax-eye me-2"></i>View</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#edit_income"><i class="isax isax-edit me-2"></i>Edit</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-document-download4 me-2"></i>Download</a>
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
							<td><a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#details_income">INC00023</a></td>
							<td>30 Jan 2025</td>
							<td>REF16418</td>
							<td>Cloud migration service</td>
							
							<td>
								<p class="text-dark">$50,125</p>
							</td>
							<td>
								<p class="text-dark">Paypal</p>
							</td>
							<td class="action-item">
								<a href="javascript:void(0);" data-bs-toggle="dropdown">
									<i class="isax isax-more"></i>
								</a>
								<ul class="dropdown-menu">
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#details_income"><i class="isax isax-eye me-2"></i>View</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#edit_income"><i class="isax isax-edit me-2"></i>Edit</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-document-download4 me-2"></i>Download</a>
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
							<td><a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#details_income">INC00022</a></td>
							<td>17 Jan 2025</td>
							<td>REF16317</td>
							<td>Sale of smartphones</td>
							<td>
								<p class="text-dark">$75,900</p>
							</td>
							<td>
								<p class="text-dark">Bank Transfer</p>
							</td>
							<td class="action-item">
								<a href="javascript:void(0);" data-bs-toggle="dropdown">
									<i class="isax isax-more"></i>
								</a>
								<ul class="dropdown-menu">
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#details_income"><i class="isax isax-eye me-2"></i>View</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#edit_income"><i class="isax isax-edit me-2"></i>Edit</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-document-download4 me-2"></i>Download</a>
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
							<td><a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#details_income">INC00021</a></td>
							<td>04 Jan 2025</td>
							<td>REF15294</td>
							<td>Monthly premium plan</td>
							<td>
								<p class="text-dark">$99,999</p>
							</td>
							<td>
								<p class="text-dark">Stripe</p>
							</td>
							<td class="action-item">
								<a href="javascript:void(0);" data-bs-toggle="dropdown">
									<i class="isax isax-more"></i>
								</a>
								<ul class="dropdown-menu">
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#details_income"><i class="isax isax-eye me-2"></i>View</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#edit_income"><i class="isax isax-edit me-2"></i>Edit</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-document-download4 me-2"></i>Download</a>
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
							<td><a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#details_income">INC00020</a></td>
							<td>09 Dec 2024</td>
							<td>REF15420</td>
							<td>IT consulting services</td>
							<td>
								<p class="text-dark">$1,20,500</p>
							</td>
							<td>
								<p class="text-dark">Cash</p>
							</td>
							<td class="action-item">
								<a href="javascript:void(0);" data-bs-toggle="dropdown">
									<i class="isax isax-more"></i>
								</a>
								<ul class="dropdown-menu">
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#details_income"><i class="isax isax-eye me-2"></i>View</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#edit_income"><i class="isax isax-edit me-2"></i>Edit</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-document-download4 me-2"></i>Download</a>
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
							<td><a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#details_income">INC00019</a></td>
							<td>02 Dec 2024</td>
							<td>REF15275</td>
							<td>Sale of office equipment</td>
							<td>
								<p class="text-dark">$2,50,000</p>
							</td>
							<td>
								<p class="text-dark">Cheque</p>
							</td>
							<td class="action-item">
								<a href="javascript:void(0);" data-bs-toggle="dropdown">
									<i class="isax isax-more"></i>
								</a>
								<ul class="dropdown-menu">
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#details_income"><i class="isax isax-eye me-2"></i>View</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#edit_income"><i class="isax isax-edit me-2"></i>Edit</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-document-download4 me-2"></i>Download</a>
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
							<td><a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#details_income">INC00018</a></td>
							<td>15 Nov 2024</td>
							<td>REF14405</td>
							<td>Online training session</td>
							
							<td>
								<p class="text-dark">$5,00,750</p>
							</td>
							<td>
								<p class="text-dark">Paypal</p>
							</td>
							<td class="action-item">
								<a href="javascript:void(0);" data-bs-toggle="dropdown">
									<i class="isax isax-more"></i>
								</a>
								<ul class="dropdown-menu">
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#details_income"><i class="isax isax-eye me-2"></i>View</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#edit_income"><i class="isax isax-edit me-2"></i>Edit</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-document-download4 me-2"></i>Download</a>
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
							<td><a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#details_income">INC00017</a></td>
							<td>30 Nov 2024</td>
							<td>REF14754</td>
							<td>Purchase of manufacturing tools</td>
							<td>
								<p class="text-dark">$7,50,300</p>
							</td>
							<td>
								<p class="text-dark">Bank Transfer</p>
							</td>
							<td class="action-item">
								<a href="javascript:void(0);" data-bs-toggle="dropdown">
									<i class="isax isax-more"></i>
								</a>
								<ul class="dropdown-menu">
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#details_income"><i class="isax isax-eye me-2"></i>View</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#edit_income"><i class="isax isax-edit me-2"></i>Edit</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-document-download4 me-2"></i>Download</a>
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
							<td><a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#details_income">INC00016</a></td>
							<td>12 Oct 2024</td>
							<td>REF14947</td>
							<td>Software maintenance</td>
							<td>
								<p class="text-dark">$9,99,999</p>
							</td>
							<td>
								<p class="text-dark">Stripe</p>
							</td>
							<td class="action-item">
								<a href="javascript:void(0);" data-bs-toggle="dropdown">
									<i class="isax isax-more"></i>
								</a>
								<ul class="dropdown-menu">
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#details_income"><i class="isax isax-eye me-2"></i>View</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#edit_income"><i class="isax isax-edit me-2"></i>Edit</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-document-download4 me-2"></i>Download</a>
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
							<td><a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#details_income">INC00015</a></td>
							<td>05 Oct 2024</td>
							<td>REF13302</td>
							<td>Cloud storage solutions</td>
							<td>
								<p class="text-dark">$87,650</p>
							</td>
							<td>
								<p class="text-dark">Cheque</p>
							</td>
							<td class="action-item">
								<a href="javascript:void(0);" data-bs-toggle="dropdown">
									<i class="isax isax-more"></i>
								</a>
								<ul class="dropdown-menu">
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#details_income"><i class="isax isax-eye me-2"></i>View</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#edit_income"><i class="isax isax-edit me-2"></i>Edit</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-document-download4 me-2"></i>Download</a>
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
							<td><a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#details_income">INC00014</a></td>
							<td>09 Sep 2024</td>
							<td>REF13035</td>
							<td>Sale of smart devices</td>
							<td>
								<p class="text-dark">$69,420</p>
							</td>
							<td>
								<p class="text-dark">Paypal</p>
							</td>
							<td class="action-item">
								<a href="javascript:void(0);" data-bs-toggle="dropdown">
									<i class="isax isax-more"></i>
								</a>
								<ul class="dropdown-menu">
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#details_income"><i class="isax isax-eye me-2"></i>View</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#edit_income"><i class="isax isax-edit me-2"></i>Edit</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-document-download4 me-2"></i>Download</a>
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
							<td><a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#details_income">INC00013</a></td>
							<td>02 Sep 2024</td>
							<td>REF12710</td>
							<td>Software maintenance</td>
							
							<td>
								<p class="text-dark">$33,210</p>
							</td>
							<td>
								<p class="text-dark">Bank Transfer</p>
							</td>
							<td class="action-item">
								<a href="javascript:void(0);" data-bs-toggle="dropdown">
									<i class="isax isax-more"></i>
								</a>
								<ul class="dropdown-menu">
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#details_income"><i class="isax isax-eye me-2"></i>View</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#edit_income"><i class="isax isax-edit me-2"></i>Edit</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-document-download4 me-2"></i>Download</a>
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
							<td><a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#details_income">INC00012</a></td>
							<td>07 Aug 2024</td>
							<td>REF12831</td>
							<td>Server maintenance</td>
							<td>
								<p class="text-dark">$2,10,000</p>
							</td>
							<td>
								<p class="text-dark">Cash</p>
							</td>
							<td class="action-item">
								<a href="javascript:void(0);" data-bs-toggle="dropdown">
									<i class="isax isax-more"></i>
								</a>
								<ul class="dropdown-menu">
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#details_income"><i class="isax isax-eye me-2"></i>View</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#edit_income"><i class="isax isax-edit me-2"></i>Edit</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-document-download4 me-2"></i>Download</a>
									</li>
								</ul>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<!-- Table List End -->

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
					<label class="form-label">Amount</label>
					<div class="dropdown">
						<a href="javascript:void(0);" class="dropdown-toggle btn btn-lg bg-light  d-flex align-items-center justify-content-start fs-13 fw-normal border" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="true">
							Select
						</a>
						<div class="dropdown-menu shadow-lg w-100 dropdown-info">							
							<div class="filter-range">
								<input type="text" id="range_03">
								<p>Range : <span class="text-gray-9">Range : $200 - $5695</span></p>
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
							<ul class="mb-3">
								<li>
									<label class="dropdown-item px-2 d-flex align-items-center text-dark">
										<input class="form-check-input m-0 me-2" type="checkbox" checked>
										<i class="fa-solid fa-circle fs-6 text-success me-1"></i>Cash
									</label>
								</li>
								<li>
									<label class="dropdown-item px-2 d-flex align-items-center text-dark">
										<input class="form-check-input m-0 me-2" type="checkbox">
										<i class="fa-solid fa-circle fs-6 text-warning me-1"></i>Cheque
									</label>
								</li>
								<li>
									<label class="dropdown-item px-2 d-flex align-items-center text-dark">
										<input class="form-check-input m-0 me-2" type="checkbox">
										<i class="fa-solid fa-circle fs-6 text-danger me-1"></i>Paypal
									</label>
								</li>
								<li>
									<label class="dropdown-item px-2 d-flex align-items-center text-dark">
										<input class="form-check-input m-0 me-2" type="checkbox">
										<i class="fa-solid fa-circle fs-6 text-purple me-1"></i>Bank Transfer
									</label>
								</li>
								<li>
									<label class="dropdown-item px-2 d-flex align-items-center text-dark">
										<input class="form-check-input m-0 me-2" type="checkbox">
										<i class="fa-solid fa-circle fs-6 text-purple me-1"></i>Stripe
									</label>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="mb-3">
					<label id="dateRangePicker" class="form-label">Date Range</label>
					<div class="input-group position-relative">
						<input type="text" class="form-control date-range bookingrange rounded-end">
						<span class="input-icon-addon fs-16 text-gray-9">
							<i class="isax isax-calendar-2"></i>
						</span>
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