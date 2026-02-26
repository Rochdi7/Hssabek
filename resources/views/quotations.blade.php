<?php $page = 'quotations'; ?>
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
						<h6 class="mb-0">Quotations</h6>
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
							<a href="{{url('add-quotation')}}" class="btn btn-primary d-flex align-items-center">
								<i class="isax isax-add-circle5 me-1"></i>New Quotations
							</a>
						</div>
					</div>
				</div>
				<!-- End Page Header -->
				
				<!-- Table Search -->
                <div class="mb-3">
                    <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                        <div class="d-flex align-items-center gap-2 flex-wrap flex-lg-nowrap flex-md-nowrap">
                            <div class="table-search d-flex align-items-center mb-0">
                                <div class="search-input">
                                    <a href="javascript:void(0);" class="btn-searchset"><i class="isax isax-search-normal fs-12"></i></a>
                                </div>
                            </div>
							<div id="reportrange" class="reportrange-picker d-flex align-items-center">
								<i class="isax isax-calendar text-gray-5 fs-14 me-1"></i><span class="reportrange-picker-field">21 Apr 25 - 21 Apr 25</span>
							</div>
                            <a class="btn btn-outline-white fw-normal d-inline-flex align-items-center" href="javascript:void(0);" data-bs-toggle="offcanvas" data-bs-target="#customcanvas">
                                <i class="isax isax-filter me-1"></i>Filter
                            </a>
                        </div>
                        <div class="d-flex align-items-center flex-wrap gap-2">
                            <div class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle btn btn-outline-white d-inline-flex align-items-center" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                    <i class="isax isax-grid-3 me-1"></i>Column
                                </a>
                                <ul class="dropdown-menu  dropdown-menu">
                                    <li>
                                        <label class="dropdown-item d-flex align-items-center form-switch">
                                            <i class="fa-solid fa-grip-vertical me-3 text-default"></i>
                                            <input class="form-check-input m-0 me-2" type="checkbox" checked>
                                            <span>Account Holder Name</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="dropdown-item d-flex align-items-center form-switch">
                                            <i class="fa-solid fa-grip-vertical me-3 text-default"></i>
                                            <input class="form-check-input m-0 me-2" type="checkbox" checked>
                                            <span>Bank & Account No</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="dropdown-item d-flex align-items-center form-switch">
                                            <i class="fa-solid fa-grip-vertical me-3 text-default"></i>
                                            <input class="form-check-input m-0 me-2" type="checkbox" checked>
                                            <span>Credit</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="dropdown-item d-flex align-items-center form-switch">
                                            <i class="fa-solid fa-grip-vertical me-3 text-default"></i>
                                            <input class="form-check-input m-0 me-2" type="checkbox">
                                            <span>Debit</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="dropdown-item d-flex align-items-center form-switch">
                                            <i class="fa-solid fa-grip-vertical me-3 text-default"></i>
                                            <input class="form-check-input m-0 me-2" type="checkbox" checked>
                                            <span>Balance</span>
                                        </label>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Filter Info -->
                    <div class="align-items-center gap-2 flex-wrap filter-info mt-3">
                        <h6 class="fs-13 fw-semibold">Filters</h6>
                        <span class="tag bg-light border rounded-1 fs-12 text-dark badge"><span class="num-count d-inline-flex align-items-center justify-content-center bg-success fs-10 me-1">6</span>Account Holders Selected<span class="ms-1 tag-close"><i class="fa-solid fa-x fs-10"></i></span></span>
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
								<th class="no-sort">Quotation ID</th>
								<th>Customer</th>
								<th>Created On</th>
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
									<a href="javascript:void(0);" class="link-default">QU0014</a>
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
								<td>
									<span class="badge badge-soft-success d-inline-flex align-items-center">Accepted <i class="isax isax-tick-circle ms-1"></i></span>
								</td>
								<td class="action-item">
                                    <a href="javascript:void(0);" data-bs-toggle="dropdown" class="custom-elipse">
                                        <i class="isax isax-more"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-eye me-2"></i>View</a>
                                        </li>
                                        <li>
                                            <a href="{{url('edit-quotation')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-edit me-2"></i>Edit</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-document-text-1 me-2"></i>Convert to Invoice</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-arrow-right-2 me-2"></i>Mark as Sent</a>
                                        </li>                                        
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-send-2 me-2"></i>Send</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-copy me-2"></i>Clone as Invoice</a>
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
										<a href="{{url('customer-details')}}" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
											<img src="{{URL::asset('build/img/profiles/avatar-29.jpg')}}" class="rounded-circle" alt="img">
										</a>
										<div>
											<h6 class="fs-14 fw-medium mb-0"><a href="{{url('customer-details')}}">John Carter</a></h6>
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
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-eye me-2"></i>View</a>
                                        </li>
                                        <li>
                                            <a href="{{url('edit-quotation')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-edit me-2"></i>Edit</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-document-text-1 me-2"></i>Convert to Invoice</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-arrow-right-2 me-2"></i>Mark as Sent</a>
                                        </li>                                        
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-send-2 me-2"></i>Send</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-copy me-2"></i>Clone as Invoice</a>
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
										<a href="{{url('customer-details')}}" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
											<img src="{{URL::asset('build/img/profiles/avatar-12.jpg')}}" class="rounded-circle" alt="img">
										</a>
										<div>
											<h6 class="fs-14 fw-medium mb-0"><a href="{{url('customer-details')}}">Sophia White</a></h6>
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
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-eye me-2"></i>View</a>
                                        </li>
                                        <li>
                                            <a href="{{url('edit-quotation')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-edit me-2"></i>Edit</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-document-text-1 me-2"></i>Convert to Invoice</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-arrow-right-2 me-2"></i>Mark as Sent</a>
                                        </li>                                        
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-send-2 me-2"></i>Send</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-copy me-2"></i>Clone as Invoice</a>
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
										<a href="{{url('customer-details')}}" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
											<img src="{{URL::asset('build/img/profiles/avatar-06.jpg')}}" class="rounded-circle" alt="img">
										</a>
										<div>
											<h6 class="fs-14 fw-medium mb-0"><a href="{{url('customer-details')}}">Michael Johnson</a></h6>
										</div>
									</div>
                                </td>
								<td>17 Jan 2025</td>
								<td>
									<span class="badge badge-soft-info d-inline-flex align-items-center">Expired
										<i class="isax isax-timer-pause ms-1"></i>
									</span>
								</td>
								<td class="action-item">
                                    <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                        <i class="isax isax-more"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-eye me-2"></i>View</a>
                                        </li>
                                        <li>
                                            <a href="{{url('edit-quotation')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-edit me-2"></i>Edit</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-document-text-1 me-2"></i>Convert to Invoice</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-arrow-right-2 me-2"></i>Mark as Sent</a>
                                        </li>                                        
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-send-2 me-2"></i>Send</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-copy me-2"></i>Clone as Invoice</a>
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
										<a href="{{url('customer-details')}}" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
											<img src="{{URL::asset('build/img/profiles/avatar-30.jpg')}}" class="rounded-circle" alt="img">
										</a>
										<div>
											<h6 class="fs-14 fw-medium mb-0"><a href="{{url('customer-details')}}">Olivia Harris</a></h6>
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
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-eye me-2"></i>View</a>
                                        </li>
                                        <li>
                                            <a href="{{url('edit-quotation')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-edit me-2"></i>Edit</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-document-text-1 me-2"></i>Convert to Invoice</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-arrow-right-2 me-2"></i>Mark as Sent</a>
                                        </li>                                        
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-send-2 me-2"></i>Send</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-copy me-2"></i>Clone as Invoice</a>
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
										<a href="{{url('customer-details')}}" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
											<img src="{{URL::asset('build/img/profiles/avatar-16.jpg')}}" class="rounded-circle" alt="img">
										</a>
										<div>
											<h6 class="fs-14 fw-medium mb-0"><a href="{{url('customer-details')}}">David Anderson</a></h6>
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
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-eye me-2"></i>View</a>
                                        </li>
                                        <li>
                                            <a href="{{url('edit-quotation')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-edit me-2"></i>Edit</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-document-text-1 me-2"></i>Convert to Invoice</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-arrow-right-2 me-2"></i>Mark as Sent</a>
                                        </li>                                        
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-send-2 me-2"></i>Send</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-copy me-2"></i>Clone as Invoice</a>
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
										<a href="{{url('customer-details')}}" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
											<img src="{{URL::asset('build/img/profiles/avatar-17.jpg')}}" class="rounded-circle" alt="img">
										</a>
										<div>
											<h6 class="fs-14 fw-medium mb-0"><a href="{{url('customer-details')}}">Emma Lewis</a></h6>
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
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-eye me-2"></i>View</a>
                                        </li>
                                        <li>
                                            <a href="{{url('edit-quotation')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-edit me-2"></i>Edit</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-document-text-1 me-2"></i>Convert to Invoice</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-arrow-right-2 me-2"></i>Mark as Sent</a>
                                        </li>                                        
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-send-2 me-2"></i>Send</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-copy me-2"></i>Clone as Invoice</a>
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
										<a href="{{url('customer-details')}}" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
											<img src="{{URL::asset('build/img/profiles/avatar-23.jpg')}}" class="rounded-circle" alt="img">
										</a>
										<div>
											<h6 class="fs-14 fw-medium mb-0"><a href="{{url('customer-details')}}">Robert Thomas</a></h6>
										</div>
									</div>
                                </td>
								<td>15 Nov 2024</td>
								<td>
									<span class="badge badge-soft-info d-inline-flex align-items-center">Expired
										<i class="isax isax-timer-pause ms-1"></i>
									</span>
								</td>
								<td class="action-item">
                                    <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                        <i class="isax isax-more"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-eye me-2"></i>View</a>
                                        </li>
                                        <li>
                                            <a href="{{url('edit-quotation')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-edit me-2"></i>Edit</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-document-text-1 me-2"></i>Convert to Invoice</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-arrow-right-2 me-2"></i>Mark as Sent</a>
                                        </li>                                        
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-send-2 me-2"></i>Send</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-copy me-2"></i>Clone as Invoice</a>
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
										<a href="{{url('customer-details')}}" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
											<img src="{{URL::asset('build/img/profiles/avatar-07.jpg')}}" class="rounded-circle" alt="img">
										</a>
										<div>
											<h6 class="fs-14 fw-medium mb-0"><a href="{{url('customer-details')}}">Isabella Scott</a></h6>
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
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-eye me-2"></i>View</a>
                                        </li>
                                        <li>
                                            <a href="{{url('edit-quotation')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-edit me-2"></i>Edit</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-document-text-1 me-2"></i>Convert to Invoice</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-arrow-right-2 me-2"></i>Mark as Sent</a>
                                        </li>                                        
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-send-2 me-2"></i>Send</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-copy me-2"></i>Clone as Invoice</a>
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
										<a href="{{url('customer-details')}}" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
											<img src="{{URL::asset('build/img/profiles/avatar-31.jpg')}}" class="rounded-circle" alt="img">
										</a>
										<div>
											<h6 class="fs-14 fw-medium mb-0"><a href="{{url('customer-details')}}">Daniel Martinez</a></h6>
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
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-eye me-2"></i>View</a>
                                        </li>
                                        <li>
                                            <a href="{{url('edit-quotation')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-edit me-2"></i>Edit</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-document-text-1 me-2"></i>Convert to Invoice</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-arrow-right-2 me-2"></i>Mark as Sent</a>
                                        </li>                                        
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-send-2 me-2"></i>Send</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-copy me-2"></i>Clone as Invoice</a>
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
										<a href="{{url('customer-details')}}" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
											<img src="{{URL::asset('build/img/profiles/avatar-32.jpg')}}" class="rounded-circle" alt="img">
										</a>
										<div>
											<h6 class="fs-14 fw-medium mb-0"><a href="{{url('customer-details')}}">Charlotte Brown</a></h6>
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
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-eye me-2"></i>View</a>
                                        </li>
                                        <li>
                                            <a href="{{url('edit-quotation')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-edit me-2"></i>Edit</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-document-text-1 me-2"></i>Convert to Invoice</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-arrow-right-2 me-2"></i>Mark as Sent</a>
                                        </li>                                        
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-send-2 me-2"></i>Send</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-copy me-2"></i>Clone as Invoice</a>
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
										<a href="{{url('customer-details')}}" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
											<img src="{{URL::asset('build/img/profiles/avatar-33.jpg')}}" class="rounded-circle" alt="img">
										</a>
										<div>
											<h6 class="fs-14 fw-medium mb-0"><a href="{{url('customer-details')}}">William Parker</a></h6>
										</div>
									</div>
                                </td>
								<td>09 Oct 2024</td>
								<td>
									<span class="badge badge-soft-info d-inline-flex align-items-center">Expired
										<i class="isax isax-timer-pause ms-1"></i>
									</span>
								</td>
								<td class="action-item">
                                    <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                        <i class="isax isax-more"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-eye me-2"></i>View</a>
                                        </li>
                                        <li>
                                            <a href="{{url('edit-quotation')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-edit me-2"></i>Edit</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-document-text-1 me-2"></i>Convert to Invoice</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-arrow-right-2 me-2"></i>Mark as Sent</a>
                                        </li>                                        
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-send-2 me-2"></i>Send</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-copy me-2"></i>Clone as Invoice</a>
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
										<a href="{{url('customer-details')}}" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
											<img src="{{URL::asset('build/img/profiles/avatar-34.jpg')}}" class="rounded-circle" alt="img">
										</a>
										<div>
											<h6 class="fs-14 fw-medium mb-0"><a href="{{url('customer-details')}}">Mia Thompson</a></h6>
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
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-eye me-2"></i>View</a>
                                        </li>
                                        <li>
                                            <a href="{{url('edit-quotation')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-edit me-2"></i>Edit</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-document-text-1 me-2"></i>Convert to Invoice</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-arrow-right-2 me-2"></i>Mark as Sent</a>
                                        </li>                                        
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-send-2 me-2"></i>Send</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-copy me-2"></i>Clone as Invoice</a>
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
										<a href="{{url('customer-details')}}" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
											<img src="{{URL::asset('build/img/profiles/avatar-35.jpg')}}" class="rounded-circle" alt="img">
										</a>
										<div>
											<h6 class="fs-14 fw-medium mb-0"><a href="{{url('customer-details')}}">Amelia Robinson</a></h6>
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
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-eye me-2"></i>View</a>
                                        </li>
                                        <li>
                                            <a href="{{url('edit-quotation')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-edit me-2"></i>Edit</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-document-text-1 me-2"></i>Convert to Invoice</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-arrow-right-2 me-2"></i>Mark as Sent</a>
                                        </li>                                        
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-send-2 me-2"></i>Send</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-copy me-2"></i>Clone as Invoice</a>
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
				<!-- /Table List -->

			</div>
			<!-- End Content -->
			
            @component('components.footer')
            @endcomponent


		</div>
		
		<!-- ========================
			End Page Content
		========================= -->

@endsection