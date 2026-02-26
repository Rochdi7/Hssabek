<?php $page = 'quotation-report'; ?>
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
						<h6 class="mb-0">Quotation Report</h6>
					</div>
					<div class="d-flex my-xl-auto right-content align-items-center flex-wrap gap-2">
						<div class="dropdown me-1">
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
					</div>
				</div>
				<!-- End Page Header -->

				<!-- start row -->
				<div class="row">
					<div class="col-xl-12 d-flex">

						<!-- start row -->
						<div class="row flex-fill">
							<div class="col-xl-3 col-lg-6 col-md-6 d-flex">
								<div class="card invoice-report  flex-fill">
									<span class="invoice-report-badge">
									</span>
									<div class="card-body d-flex flex-wrap align-items-center justify-content-between">
										<div class="d-flex align-items-center flex-column overflow-hidden">
											<div>
												<div>
													<span class="fs-14 fw-normal text-truncate mb-1">Total Quotations</span>
													<div class="d-flex align-items-center">
														<h5 class="fs-16 fw-semibold me-2 mb-0">250</h5>
														<span class="badge badge-sm badge-soft-success me-3">+5.62% <i class="isax isax-arrow-up-15"></i></span>
													</div>
													
												</div>		
											</div>
										</div>
										<div class="d-flex justify-content-between align-items-center flex-wrap">
											<span  class="avatar avatar-md br-5 d-flex align-items-center justify-content-center  bg-transparent-primary border border-primary">
												<span class="text-primary d-flex"><i class=" isax isax-dollar-circle fs-16"></i></span>
											</span>
										</div>
										
									</div><!-- end card body -->
								</div><!-- end card -->
							</div><!-- end col -->
							<div class="col-xl-3 col-lg-6 col-md-6 d-flex">
								<div class="card invoice-report  flex-fill">
									<span class="invoice-report-badge-success">
									</span>
									<div class="card-body d-flex flex-wrap align-items-center justify-content-between">
										<div class="d-flex align-items-center flex-column overflow-hidden">
											<div>
												<div>
													<span class="fs-14 fw-normal text-truncate mb-1">Accecpted Quotations</span>
													<div class="d-flex align-items-center">
														<h5 class="fs-16 fw-semibold me-2 mb-0">185</h5>
														<span class="badge badge-sm badge-soft-success me-3">+5.62% <i class="isax isax-arrow-up-15"></i></span>
													</div>
													
												</div>		
											</div>
										</div>
										<div class="d-flex justify-content-between align-items-center flex-wrap">
											<span class="avatar avatar-md br-5 d-flex align-items-center justify-content-center  bg-transparent-success border border-success">
												<span class="text-success d-flex"><i class=" isax isax-tick-circle4 fs-16"></i></span>
											</span>
										</div>
										
									</div><!-- end card body -->
								</div><!-- end card -->
							</div><!-- end col -->
							<div class="col-xl-3 col-lg-6 col-md-6 d-flex">
								<div class="card invoice-report  flex-fill">
									<span class="invoice-report-badge-warning">
									</span>
									<div class="card-body d-flex flex-wrap align-items-center justify-content-between">
										<div class="d-flex align-items-center flex-column overflow-hidden">
											<div>
												<div>
													<span class="fs-14 fw-normal text-truncate mb-1">Pending Quotations</span>
													<div class="d-flex align-items-center">
														<h5 class="fs-16 fw-semibold me-2 mb-0">50</h5>
														<span class="badge badge-sm badge-soft-success me-3">+5.62% <i class="isax isax-arrow-up-15"></i></span>
													</div>
													
												</div>		
											</div>
										</div>
										<div class="d-flex justify-content-between align-items-center flex-wrap">
											<span class="avatar avatar-md br-5 d-flex align-items-center justify-content-center  border border-warning">
												<span class="text-warning d-flex"><i class="isax isax-timer"></i></span>
											</span>
										</div>
									</div><!-- end card body -->
								</div><!-- end card -->
							</div><!-- end col -->
							<div class="col-xl-3 col-lg-6 col-md-6 d-flex">
								<div class="card invoice-report  flex-fill">
									<span class="invoice-report-badge-danger">
									</span>
									<div class="card-body d-flex flex-wrap align-items-center justify-content-between">
										<div class="d-flex align-items-center flex-column overflow-hidden">
											<div>
												<div>
													<span class="fs-14 fw-normal text-truncate mb-1">Rejected Quotations</span>
													<div class="d-flex align-items-center">
														<h5 class="fs-16 fw-semibold me-2 mb-0">15</h5>
														<span class="badge badge-sm badge-soft-success me-3">+5.62% <i class="isax isax-arrow-up-15"></i></span>
													</div>
													
												</div>		
											</div>
										</div>
										<div class="d-flex justify-content-between align-items-center flex-wrap">
											<span  class="avatar avatar-md br-5 d-flex align-items-center justify-content-center bg-transparent-danger border border-danger">
												<span class="text-danger d-flex"><i class="isax isax-close-circle4"></i></span>
											</span>
										</div>
									</div><!-- end card body -->
								</div><!-- end card -->
							</div>
						</div>
						<!-- end row -->
						
					</div><!-- end col -->
				</div>
				<!-- end row -->
				
				<!-- Table Search -->
				<div class="mb-3">
					<div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
						<div class="d-flex align-items-center gap-2 flex-wrap">
							<div class="table-search d-flex align-items-center mb-0">
								<div class="search-input">
									<a href="javascript:void(0);" class="btn-searchset"><i class="isax isax-search-normal fs-12"></i></a>
								</div>
							</div>
							<div id="reportrange" class="reportrange-picker d-flex align-items-center">
								<i class="isax isax-calendar text-gray-5 fs-14 me-1"></i><span class="reportrange-picker-field">16 Apr 25 - 16 Apr 25</span>
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
											<span>Vendor</span>
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
											<input class="form-check-input m-0 me-2" type="checkbox">
											<span>Payment Mode</span>
										</label>
									</li>
									<li>
										<label class="dropdown-item d-flex align-items-center form-switch">
											<i class="fa-solid fa-grip-vertical me-3 text-default"></i>
											<input class="form-check-input m-0 me-2" type="checkbox">
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
                        <span class="tag bg-light border rounded-1 fs-12 text-dark badge"><span class="num-count d-inline-flex align-items-center justify-content-center bg-success fs-10 me-1">5</span>Vendors Selected<span class="ms-1 tag-close"><i class="fa-solid fa-x fs-10"></i></span></span>                   
                        <span class="tag bg-light border rounded-1 fs-12 text-dark badge"><span class="num-count d-inline-flex align-items-center justify-content-center bg-success fs-10 me-1">1</span>Status Selected<span class="ms-1 tag-close"><i class="fa-solid fa-x fs-10"></i></span></span>                                           
                        <a href="#" class="link-danger fw-medium text-decoration-underline ms-md-1">Clear All</a>
                    </div>
                    <!-- /Filter Info -->	

				</div>
				<!-- /Table Search -->
				
				<!-- Table List -->
				<div class="table-responsive">
					<table class="table table-nowrap datatable">
						<thead>
							<tr>
								<th class="no-sort">
                                    <div class="form-check form-check-md">
                                        <input class="form-check-input" type="checkbox" id="select-all">
                                    </div>
                                </th>
								<th class="no-sort">Quotation ID</th>
								<th>Customer</th>
								<th class="no-sort">Status</th>
								<th>Created On</th>
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
								<td>
									<div class="d-flex align-items-center">
										<a href="#" class="badge badge-soft-success badge-md d-inline-flex align-items-center">
											Accepted <i class="isax isax-tick-circle4 ms-1"></i>
										</a>
									</div>
								</td>
								<td >22 Feb 2025</td>
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
								<td>
									<div class="d-flex align-items-center">
										<a href="#" class="badge badge-soft-danger badge-md d-inline-flex align-items-center">
											Declined <i class="isax isax-close-circle4 ms-1"></i>
										</a>
									</div>
								</td>
								<td >07 Feb 2025</td>
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
								<td>
									<div class="d-flex align-items-center">
										<a href="#" class="badge badge-soft-info badge-md d-inline-flex align-items-center">
											Sent <i class="isax isax-arrow-right-2 ms-1"></i>
										</a>
									</div>
								</td>
								<td >30 Jan 2025</td>
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
								<td>
									<div class="d-flex align-items-center">
										<a href="#" class="badge bg-light text-dark d-inline-flex align-items-center">
											Expired <i class="isax isax-timer-pause ms-1"></i>
										</a>
									</div>
								</td>
								<td >17 Jan 2025</td>
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
								<td>
									<div class="d-flex align-items-center">
										<a href="#" class="badge badge-soft-success badge-md d-inline-flex align-items-center">
											Accepted <i class="isax isax-tick-circle4 ms-1"></i>
										</a>
									</div>
								</td>
								<td >04 Jan 2025</td>
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
								<td>
									<div class="d-flex align-items-center">
										<a href="#" class="badge badge-soft-danger badge-md d-inline-flex align-items-center">
											Declined <i class="isax isax-close-circle4 ms-1"></i>
										</a>
									</div>
								</td>
								<td >09 Dec 2024</td>
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
								<td>
									<div class="d-flex align-items-center">
										<a href="#" class="badge badge-soft-info badge-md d-inline-flex align-items-center">
											Sent <i class="isax isax-arrow-right-2 ms-1"></i>
										</a>
									</div>
								</td>
								<td >02 Dec 2024</td>
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
								<td>
									<div class="d-flex align-items-center">
										<a href="#" class="badge bg-light text-dark d-inline-flex align-items-center">
											Expired <i class="isax isax-timer-pause ms-1"></i>
										</a>
									</div>
								</td>
								<td >15 Nov 2024</td>
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
								<td>
									<div class="d-flex align-items-center">
										<a href="#" class="badge badge-soft-success badge-md d-inline-flex align-items-center">
											Accepted <i class="isax isax-tick-circle4 ms-1"></i>
										</a>
									</div>
								</td>
								<td >30 Nov 2024</td>
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
								<td>
									<div class="d-flex align-items-center">
										<a href="#" class="badge badge-soft-danger badge-md d-inline-flex align-items-center">
											Declined <i class="isax isax-close-circle4 ms-1"></i>
										</a>
									</div>
								</td>
								<td >12 Oct 2024</td>
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
											<img src="{{URL::asset('build/img/profiles/avatar-37.jpg')}}" class="rounded-circle" alt="img">
										</a>
										<div>
											<h6 class="fs-14 fw-medium mb-0"><a href="{{url('customer-details')}}">Charlotte Brown</a></h6>
										</div>
									</div>
                                </td>
								<td>
									<div class="d-flex align-items-center">
										<a href="#" class="badge badge-soft-info badge-md d-inline-flex align-items-center">
											Sent <i class="isax isax-arrow-right-2 ms-1"></i>
										</a>
									</div>
								</td>
								<td >05 Oct 2024</td>
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
											<img src="{{URL::asset('build/img/profiles/avatar-21.jpg')}}" class="rounded-circle" alt="img">
										</a>
										<div>
											<h6 class="fs-14 fw-medium mb-0"><a href="{{url('customer-details')}}">William Parker</a></h6>
										</div>
									</div>
                                </td>
								<td>
									<div class="d-flex align-items-center">
										<a href="#" class="badge bg-light text-dark d-inline-flex align-items-center">
											Expired <i class="isax isax-timer-pause ms-1"></i>
										</a>
									</div>
								</td>
								<td >09 Sep 2024</td>
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
											<img src="{{URL::asset('build/img/profiles/avatar-17.jpg')}}" class="rounded-circle" alt="img">
										</a>
										<div>
											<h6 class="fs-14 fw-medium mb-0"><a href="{{url('customer-details')}}">Mia Thompson</a></h6>
										</div>
									</div>
                                </td>
								<td>
									<div class="d-flex align-items-center">
										<a href="#" class="badge badge-soft-success badge-md d-inline-flex align-items-center">
											Accepted <i class="isax isax-tick-circle4 ms-1"></i>
										</a>
									</div>
								</td>
								<td >02 Sep 2024</td>
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
											<img src="{{URL::asset('build/img/profiles/avatar-07.jpg')}}" class="rounded-circle" alt="img">
										</a>
										<div>
											<h6 class="fs-14 fw-medium mb-0"><a href="{{url('customer-details')}}">Amelia Robinson</a></h6>
										</div>
									</div>
                                </td>
								<td>
									<div class="d-flex align-items-center">
										<a href="#" class="badge badge-soft-danger badge-md d-inline-flex align-items-center">
											Declined <i class="isax isax-close-circle4 ms-1"></i>
										</a>
									</div>
								</td>
								<td >07 Aug 2024</td>
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