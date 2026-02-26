<?php $page = 'payments'; ?>
@extends('layout.mainlayout')
@section('content')
  

		<!-- ========================
			Start Page Content
		========================= -->

		<div class="page-wrapper">

			<!-- Start Conatiner  -->
			<div class="content content-two">

				<!-- Page Header -->
				<div class="d-flex d-block align-items-center justify-content-between flex-wrap gap-3 mb-3">
					<div>
						<h6>Payments</h6>
					</div>
					<div class="d-flex my-xl-auto right-content align-items-center flex-wrap gap-2">
						<div class="dropdown">
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
							<a href="#" class="btn btn-primary d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#add_payment">
								<i class="isax isax-add-circle5 me-1"></i>New payment
							</a>
						</div>
					</div>
				</div>
				<!-- End Page Header -->
				
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
							<div class="dropdown">
								<a href="javascript:void(0);" class="dropdown-toggle btn btn-outline-white d-inline-flex align-items-center fw-medium" data-bs-toggle="dropdown">
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
											<span>Cusomer</span>
										</label>
									</li>
                                    <li>
										<label class="dropdown-item d-flex align-items-center form-switch">
											<i class="fa-solid fa-grip-vertical me-3 text-default"></i>
											<input class="form-check-input m-0 me-2" type="checkbox" checked>
											<span>Payment ID</span>
										</label>
									</li>
									<li>
										<label class="dropdown-item d-flex align-items-center form-switch">
											<i class="fa-solid fa-grip-vertical me-3 text-default"></i>
											<input class="form-check-input m-0 me-2" type="checkbox" checked>
											<span>Paid Date</span>
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
								</ul>
							</div>
						</div>
					</div>	

                    <!-- Filter Info -->
					<div class="align-items-center gap-2 flex-wrap filter-info mt-3">
						<h6 class="fs-13 fw-semibold">Filters</h6>
						<span class="tag bg-light border rounded-1 fs-12 text-dark badge"><span class="num-count d-inline-flex align-items-center justify-content-center bg-success fs-10 me-1">5</span>Customers Selected<span class="ms-1 tag-close"><i class="fa-solid fa-x fs-10"></i></span></span>					
						<span class="tag bg-light border rounded-1 fs-12 text-dark badge"><span class="num-count d-inline-flex align-items-center justify-content-center bg-success fs-10 me-1">1</span>$10,000 - $25,500<span class="ms-1 tag-close"><i class="fa-solid fa-x fs-10"></i></span></span>											
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
								<th class="no-sort">Customer</th>
								<th class="no-sort">Payment ID</th>
								<th>Paid Date</th>
								<th>Amount</th>
								<th>Payment method</th>
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
									<a href="javascript:void(0);" class="link-default">PAY00025</a>
								</td>
								<td>22 Feb 2025, 05:30 AM</td>
								<td class="text-dark">$10,000</td>
								<td class="text-dark">Cash</td>
								<td class="action-item">
                                    <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                        <i class="fa-solid fa-ellipsis"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#edit_payment"><i class="isax isax-edit me-2"></i>Edit</a>
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
                                <td>
									<a href="javascript:void(0);" class="link-default">PAY00024</a>
								</td>
								<td>07 Feb 2025, 03:28 AM</td>								
								<td class="text-dark">$25,750</td>								
								<td class="text-dark">Cheque</td>								
								<td class="action-item">
                                    <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                        <i class="fa-solid fa-ellipsis"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#edit_payment"><i class="isax isax-edit me-2"></i>Edit</a>
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
                                <td>
									<a href="javascript:void(0);" class="link-default">PAY00023</a>
								</td>
								<td>30 Jan 2025, 07:23 AM</td>
								<td class="text-dark">$50,125</td>
								<td class="text-dark">Paypal</td>
								<td class="action-item">
                                    <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                        <i class="fa-solid fa-ellipsis"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#edit_payment"><i class="isax isax-edit me-2"></i>Edit</a>
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
                                <td>
									<a href="javascript:void(0);" class="link-default">PAY00022</a>
								</td>
								<td>24 Jan 2025, 12:48 PM</td>
								<td class="text-dark">$75,900</td>
								<td class="text-dark">Bank Transfer</td>
								<td class="action-item">
                                    <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                        <i class="fa-solid fa-ellipsis"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#edit_payment"><i class="isax isax-edit me-2"></i>Edit</a>
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
                                <td>
									<a href="javascript:void(0);" class="link-default">PAY00021</a>
								</td>
								<td>04 Jan 2025, 02:30 PM</td>
								<td class="text-dark">$99,999</td>
								<td class="text-dark">Stripe</td>
								<td class="action-item">
                                    <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                        <i class="fa-solid fa-ellipsis"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#edit_payment"><i class="isax isax-edit me-2"></i>Edit</a>
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
                                <td>
									<a href="javascript:void(0);" class="link-default">PAY00020</a>
								</td>
								<td>09 Dec 2024, 9:45 AM</td>								
								<td class="text-dark">$1,20,500</td>								
								<td class="text-dark">Cash</td>								
								<td class="action-item">
                                    <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                        <i class="fa-solid fa-ellipsis"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#edit_payment"><i class="isax isax-edit me-2"></i>Edit</a>
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
                                <td>
									<a href="javascript:void(0);" class="link-default">PAY00019</a>
								</td>
								<td>02 Dec 2024, 11:28 AM</td>								
								<td class="text-dark">$2,50,000</td>								
								<td class="text-dark">Cheque</td>								
								<td class="action-item">
                                    <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                        <i class="fa-solid fa-ellipsis"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#edit_payment"><i class="isax isax-edit me-2"></i>Edit</a>
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
                                <td>
									<a href="javascript:void(0);" class="link-default">PAY00018</a>
								</td>
								<td>15 Nov 2024, 05:15 PM</td>								
								<td class="text-dark">$5,00,750</td>								
								<td class="text-dark">Paypal</td>								
								<td class="action-item">
                                    <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                        <i class="fa-solid fa-ellipsis"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#edit_payment"><i class="isax isax-edit me-2"></i>Edit</a>
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
                                <td>
									<a href="javascript:void(0);" class="link-default">PAY00017</a>
								</td>
								<td>30 Nov 2024, 04:37 PM</td>								
								<td class="text-dark">$7,50,300</td>								
								<td class="text-dark">Bank Transfer</td>								
								<td class="action-item">
                                    <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                        <i class="fa-solid fa-ellipsis"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#edit_payment"><i class="isax isax-edit me-2"></i>Edit</a>
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
                                <td>
									<a href="javascript:void(0);" class="link-default">PAY00016</a>
								</td>
								<td>12 Oct 2024, 12:28 AM</td>
								<td class="text-dark">$9,99,999</td>
								<td class="text-dark">Stripe</td>
								<td class="action-item">
                                    <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                        <i class="fa-solid fa-ellipsis"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#edit_payment"><i class="isax isax-edit me-2"></i>Edit</a>
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
                                <td>
									<a href="javascript:void(0);" class="link-default">PAY00015</a>
								</td>
								<td>05 Oct 2024, 09:09 AM</td>
								<td class="text-dark">$87,650</td>
								<td class="text-dark">Cash</td>
								<td class="action-item">
                                    <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                        <i class="fa-solid fa-ellipsis"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#edit_payment"><i class="isax isax-edit me-2"></i>Edit</a>
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
                                <td>
									<a href="javascript:void(0);" class="link-default">PAY00014</a>
								</td>
								<td>09 Sep 2024, 10:28 AM</td>
								<td class="text-dark">$69,420</td>
								<td class="text-dark">Cheque</td>
								<td class="action-item">
                                    <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                        <i class="fa-solid fa-ellipsis"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#edit_payment"><i class="isax isax-edit me-2"></i>Edit</a>
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
                                <td>
									<a href="javascript:void(0);" class="link-default">PAY00013</a>
								</td>
								<td>02 Sep 2024, 07:13 AM</td>
								<td class="text-dark">$33,210</td>
								<td class="text-dark">Paypal</td>
								<td class="action-item">
                                    <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                        <i class="fa-solid fa-ellipsis"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#edit_payment"><i class="isax isax-edit me-2"></i>Edit</a>
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
                                <td>
									<a href="javascript:void(0);" class="link-default">PAY00012</a>
								</td>
								<td>07 Aug 2024, 05:16 AM</td>
								<td class="text-dark">$2,10,000</td>
								<td class="text-dark">Bank Transfer</td>
								<td class="action-item">
                                    <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                        <i class="fa-solid fa-ellipsis"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#edit_payment"><i class="isax isax-edit me-2"></i>Edit</a>
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

			@component('components.footer')
            @endcomponent

		</div>
		<!-- ========================
			End Page Content
		========================= -->
@endsection