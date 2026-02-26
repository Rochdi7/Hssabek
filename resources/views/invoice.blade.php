<?php $page = 'invoice'; ?>
@extends('layout.mainlayout')
@section('content')
   
 <!-- ========================
			Start Page Content
		========================= -->

		<div class="page-wrapper">	
			<div class="content content-two">
				<!-- Start Breadcrumb -->
				<div class="mb-3 d-flex align-items-center justify-content-between flex-wrap gap-2">
					<div>
						<h5 class="mb-1 fw-bold">Invoices</h5>
					</div>
					<div class="d-flex my-xl-auto right-content align-items-center flex-wrap table-header">
						<div class="me-2 mb-2">
							<div class="dropdown">
								<a href="javascript:void(0);" class="dropdown-toggle btn btn-outline-white d-inline-flex align-items-center" data-bs-toggle="dropdown">
									<i class="ti ti-file-export me-1"></i>Export
								</a>
								<ul class="dropdown-menu  dropdown-menu-end p-3">
									<li>
										<a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-file-type-pdf me-1"></i>Export as PDF</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-file-type-xls me-1"></i>Export as Excel </a>
									</li>
								</ul>
							</div>
						</div>
						<div class="mb-2">
							<a href="{{url('add-invoice')}}" class="btn btn-md btn-primary d-flex align-items-center"><i class="ti ti-circle-plus me-2"></i>Add Invoices</a>
						</div>
					</div>
				</div>
				<!-- End Breadcrumb -->

                <!-- Start Invoice Data -->
                <div class="row">
                    <div class="col-xl-3 col-sm-6">
                        <div class="card flex-fill">
                            <div class="card-body">
                                <div class="d-flex align-items-center overflow-hidden mb-2">
                                    <div>
                                        <p class="mb-1 text-truncate">Total Invoice</p>
                                        <h6>$3,237.94</h6>
                                    </div>
                                </div>
                                <div class="attendance-report-bar mb-2">
                                    <div class="progress" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="height: 5px;">
                                        <div class="progress-bar bg-pink" style="width: 85%"></div>
                                    </div>
                                </div>
                                <div>
                                    <p class="d-flex align-items-center text-truncate"><span class="text-success fs-12 d-flex align-items-center me-1"><i class="ti ti-arrow-wave-right-up me-1"></i>+32.40%</span>from last month</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6">
                        <div class="card flex-fill">
                            <div class="card-body">
                                <div class="d-flex align-items-center overflow-hidden mb-2">
                                    <div>
                                        <p class="mb-1 text-truncate">Outstanding</p>
                                        <h6>$3,237.94</h6>
                                    </div>
                                </div>
                                <div class="attendance-report-bar mb-2">
                                    <div class="progress" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="height: 5px;">
                                        <div class="progress-bar bg-purple" style="width: 50%"></div>
                                    </div>
                                </div>
                                <div>
                                    <p class="d-flex align-items-center text-truncate"><span class="text-danger fs-12 d-flex align-items-center me-1"><i class="ti ti-arrow-wave-right-up me-1"></i>-4.40%</span>from last month</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6">
                        <div class="card flex-fill">
                            <div class="card-body">
                                <div class="d-flex align-items-center overflow-hidden mb-2">
                                    <div>
                                        <p class="mb-1 text-truncate">Draft</p>
                                        <h6>$3,237.94</h6>
                                    </div>
                                </div>
                                <div class="attendance-report-bar mb-2">
                                    <div class="progress" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="height: 5px;">
                                        <div class="progress-bar bg-warning" style="width: 30%"></div>
                                    </div>
                                </div>
                                <div>
                                    <p class="d-flex align-items-center text-truncate"><span class="text-success fs-12 d-flex align-items-center me-1"><i class="ti ti-arrow-wave-right-up me-1"></i>12%</span>from last month</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6">
                        <div class="card flex-fill">
                            <div class="card-body">
                                <div class="d-flex align-items-center overflow-hidden mb-2">
                                    <div>
                                        <p class="mb-1 text-truncate">Total Overdue</p>
                                        <h6>$3,237.94</h6>
                                    </div>
                                </div>
                                <div class="attendance-report-bar mb-2">
                                    <div class="progress" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="height: 5px;">
                                        <div class="progress-bar bg-danger" style="width: 20%"></div>
                                    </div>
                                </div>
                                <div>
                                    <p class="d-flex align-items-center text-truncate"><span class="text-danger fs-12 d-flex align-items-center me-1"><i class="ti ti-arrow-wave-right-up me-1"></i>-15.40%</span>from last month</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Invoice Data -->

                <!-- Start Table List -->
                <div class="row">
                    <div class="col-sm-12">
                        <div>
                            <div class="d-flex align-items-center justify-content-between flex-wrap row-gap-3 mb-3">
                                <h5 class="d-flex align-items-center">Invoices<span class="badge bg-light ms-2 text-dark fs-12">2000 Invoices</span></h5>
                                <div class="d-flex align-items-center flex-wrap row-gap-3 table-header">

                                    <div class="input-icon position-relative me-2">                                       
                                        <input type="text" class="form-control datetimepicker py-1 h-auto" placeholder="Due Date">
										<span class="input-icon-addon">
                                            <i class="ti ti-calendar"></i>
                                        </span>
                                    </div>
                                    <div class="dropdown me-2">
                                        <a href="javascript:void(0);" class="dropdown-toggle btn btn-outline-white d-inline-flex align-items-center" data-bs-toggle="dropdown">
                                            Select Status
                                        </a>
                                        <ul class="dropdown-menu  dropdown-menu-end p-3">
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item rounded-1">Paid</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item rounded-1">Overdue</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item rounded-1">Pending</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item rounded-1">Draft</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="dropdown">
                                        <a href="javascript:void(0);" class="dropdown-toggle btn btn-outline-white d-inline-flex align-items-center fw-medium" data-bs-toggle="dropdown">
                                            <span class="d-inline-flex me-1">Sort By : </span> Last 7 Days
                                        </a>
                                        <ul class="dropdown-menu  dropdown-menu-end p-3">
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item rounded-1">Last 7 Days</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item rounded-1">Created Date</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item rounded-1">Due Date</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-0">

                                <div class="table-responsive table-nowrap">
                                    <table class="table mb-0 border">
                                        <thead class="table-light">
                                            <tr>
                                                <th class="no-sort">
                                                    <div class="form-check form-check-md">
                                                        <input class="form-check-input" type="checkbox" id="select-all">
                                                    </div>
                                                </th>
                                                <th class="fw-medium fs-14">Invoice</th>
                                                <th class="fw-medium fs-14">Name</th>
                                                <th class="fw-medium fs-14">Created On</th>
                                                <th class="fw-medium fs-14">Total</th>
                                                <th class="fw-medium fs-14">Amount Due</th>
                                                <th class="fw-medium fs-14">Due Date</th>
                                                <th class="fw-medium fs-14">Status</th>
                                                <th></th>
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
                                                    <a href="{{url('invoice-details')}}" class="tb-data">INV-1454</a>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <a href="{{url('invoice-details')}}" class="avatar avatar-lg me-2">
                                                            <img src="{{URL::asset('build/img/users/user-01.jpg')}}" class="rounded-circle" alt="user">
                                                        </a>
                                                        <div>
                                                            <h6 class="fw-medium fs-14"><a href="{{url('invoice-details')}}">Anthony Lewis</a>
                                                            </h6>
                                                            <span class="fs-12">anthony@example.com</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>14 Jan 2024, 04:27 AM </td>
                                                <td>$300</td>
                                                <td>$0</td>
                                                <td>14 Jan 2024, 04:27 AM</td>
                                                <td>
                                                    <span class="badge badge-soft-success d-inline-flex align-items-center">
														<i class="ti ti-point-filled me-1"></i>Paid
													</span>
                                                </td>
                                                <td>
                                                    <div class="action-icon d-inline-flex">
                                                        <a href="{{url('invoice-details')}}" class="me-2"><i class="ti ti-eye"></i></a>
                                                        <a href="#" class="me-2"><i class="ti ti-edit"></i></a>
                                                        <a href="#delete_modal" class="" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="form-check form-check-md">
                                                        <input class="form-check-input" type="checkbox">
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="{{url('invoice-details')}}" class="tb-data">INV-6571</a>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <a href="{{url('invoice-details')}}" class="avatar avatar-lg me-2">
                                                            <img src="{{URL::asset('build/img/users/user-09.jpg')}}" class="rounded-circle" alt="user">
                                                        </a>
                                                        <div>
                                                            <h6 class="fw-medium fs-14"><a href="{{url('invoice-details')}}">Brian Villalobos</a>
                                                            </h6>
                                                            <span class="fs-12">brian@example.com</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>21 Jan 2024, 03:19 AM</td>
                                                <td>$547</td>
                                                <td>$200</td>
                                                <td>21 Jan 2024, 03:19 AM</td>
                                                <td>
                                                    <span class="badge badge-soft-danger d-inline-flex align-items-center">
														<i class="ti ti-point-filled me-1"></i>Overdue
													</span>
                                                </td>
                                                <td>
                                                    <div class="action-icon d-inline-flex">
                                                        <a href="{{url('invoice-details')}}" class="me-2"><i class="ti ti-eye"></i></a>
                                                        <a href="#" class="me-2"><i class="ti ti-edit"></i></a>
                                                        <a href="#delete_modal" class="" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="form-check form-check-md">
                                                        <input class="form-check-input" type="checkbox">
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="{{url('invoice-details')}}" class="tb-data">INV-2245</a>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <a href="{{url('invoice-details')}}" class="avatar avatar-lg me-2">
                                                            <img src="{{URL::asset('build/img/users/user-01.jpg')}}" class="rounded-circle" alt="user">
                                                        </a>
                                                        <div>
                                                            <h6 class="fw-medium fs-14"><a href="{{url('invoice-details')}}">Harvey Smith</a>
                                                            </h6>
                                                            <span class="fs-12">harvey@example.com</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>20 Feb 2024, 12:15 PM</td>
                                                <td>$325</td>
                                                <td>$65</td>
                                                <td>20 Feb 2024, 12:15 PM</td>
                                                <td>
                                                    <span class="badge badge-soft-primary d-inline-flex align-items-center">
														<i class="ti ti-point-filled me-1"></i>Pending
													</span>
                                                </td>
                                                <td>
                                                    <div class="action-icon d-inline-flex">
                                                        <a href="{{url('invoice-details')}}" class="me-2"><i class="ti ti-eye"></i></a>
                                                        <a href="#" class="me-2"><i class="ti ti-edit"></i></a>
                                                        <a href="#delete_modal" class="" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="form-check form-check-md">
                                                        <input class="form-check-input" type="checkbox">
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="{{url('invoice-details')}}" class="tb-data">INV-1456</a>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <a href="{{url('invoice-details')}}" class="avatar avatar-lg me-2">
                                                            <img src="{{URL::asset('build/img/users/user-02.jpg')}}" class="rounded-circle" alt="user">
                                                        </a>
                                                        <div>
                                                            <h6 class="fw-medium fs-14"><a href="{{url('invoice-details')}}">Stephan Peralt</a>
                                                            </h6>
                                                            <span class="fs-12">peral@example.com</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>15 Mar 2024, 12:11 AM</td>
                                                <td>$471</td>
                                                <td>$145</td>
                                                <td>15 Mar 2024, 12:11 AM</td>
                                                <td>
                                                    <span class="badge badge-soft-primary d-inline-flex align-items-center">
														<i class="ti ti-point-filled me-1"></i>Pending
													</span>
                                                </td>
                                                <td>
                                                    <div class="action-icon d-inline-flex">
                                                        <a href="{{url('invoice-details')}}" class="me-2"><i class="ti ti-eye"></i></a>
                                                        <a href="#" class="me-2"><i class="ti ti-edit"></i></a>
                                                        <a href="#" class="" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="form-check form-check-md">
                                                        <input class="form-check-input" type="checkbox">
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="{{url('invoice-details')}}" class="tb-data">INV-0045</a>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <a href="{{url('invoice-details')}}" class="avatar avatar-lg me-2">
                                                            <img src="{{URL::asset('build/img/users/user-03.jpg')}}" class="rounded-circle" alt="user">
                                                        </a>
                                                        <div>
                                                            <h6 class="fw-medium fs-14"><a href="{{url('invoice-details')}}">Doglas Martini</a>
                                                            </h6>
                                                            <span class="fs-12">martniwr@example.com</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>12 Apr 2024, 05:48 PM</td>
                                                <td>$147</td>
                                                <td>$32</td>
                                                <td>12 Apr 2024, 05:48 PM</td>
                                                <td>
                                                    <span class="badge badge-soft-danger d-inline-flex align-items-center">
														<i class="ti ti-point-filled me-1"></i>Overdue
													</span>
                                                </td>
                                                <td>
                                                    <div class="action-icon d-inline-flex">
                                                        <a href="{{url('invoice-details')}}" class="me-2"><i class="ti ti-eye"></i></a>
                                                        <a href="#" class="me-2"><i class="ti ti-edit"></i></a>
                                                        <a href="#delete_modal" class="" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="form-check form-check-md">
                                                        <input class="form-check-input" type="checkbox">
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="{{url('invoice-details')}}" class="tb-data">INV-6244</a>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <a href="{{url('invoice-details')}}" class="avatar avatar-lg me-2">
                                                            <img src="{{URL::asset('build/img/users/user-02.jpg')}}" class="rounded-circle" alt="user">
                                                        </a>
                                                        <div>
                                                            <h6 class="fw-medium fs-14"><a href="{{url('invoice-details')}}">Linda Ray</a>
                                                            </h6>
                                                            <span class="fs-12">ray456@example.com</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>20 Apr 2024, 06:11 PM</td>
                                                <td>$654</td>
                                                <td>$140</td>
                                                <td>20 Apr 2024, 06:11 PM</td>
                                                <td>
                                                    <span class="badge badge-soft-warning d-inline-flex align-items-center">
														<i class="ti ti-point-filled me-1"></i>Draft
													</span>
                                                </td>
                                                <td>
                                                    <div class="action-icon d-inline-flex">
                                                        <a href="{{url('invoice-details')}}" class="me-2"><i class="ti ti-eye"></i></a>
                                                        <a href="#" class="me-2"><i class="ti ti-edit"></i></a>
                                                        <a href="#delete_modal" class="" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="form-check form-check-md">
                                                        <input class="form-check-input" type="checkbox">
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="{{url('invoice-details')}}" class="tb-data">INV-9565</a>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <a href="{{url('invoice-details')}}" class="avatar avatar-lg me-2">
                                                            <img src="{{URL::asset('build/img/users/user-06.jpg')}}" class="rounded-circle" alt="user">
                                                        </a>
                                                        <div>
                                                            <h6 class="fw-medium fs-14"><a href="{{url('invoice-details')}}">Elliot Murray</a>
                                                            </h6>
                                                            <span class="fs-12">murray@example.com</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>14 Jan 2024, 04:27 AM </td>
                                                <td>$300</td>
                                                <td>$0</td>
                                                <td>14 Jan 2024, 04:27 AM</td>
                                                <td>
                                                    <span class="badge badge-soft-success d-inline-flex align-items-center">
														<i class="ti ti-point-filled me-1"></i>Paid
													</span>
                                                </td>
                                                <td>
                                                    <div class="action-icon d-inline-flex">
                                                        <a href="{{url('invoice-details')}}" class="me-2"><i class="ti ti-eye"></i></a>
                                                        <a href="#" class="me-2"><i class="ti ti-edit"></i></a>
                                                        <a href="#delete_modal" class="" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="form-check form-check-md">
                                                        <input class="form-check-input" type="checkbox">
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="{{url('invoice-details')}}" class="tb-data">INV-6874</a>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <a href="{{url('invoice-details')}}" class="avatar avatar-lg me-2">
                                                            <img src="{{URL::asset('build/img/users/user-07.jpg')}}" class="rounded-circle" alt="user">
                                                        </a>
                                                        <div>
                                                            <h6 class="fw-medium fs-14"><a href="{{url('invoice-details')}}">Rebecca Smtih</a>
                                                            </h6>
                                                            <span class="fs-12">smtih@example.com</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>02 Sep 2024, 09:21 PM</td>
                                                <td>$654</td>
                                                <td>$65</td>
                                                <td>02 Sep 2024, 09:21 PM</td>
                                                <td>
                                                    <span class="badge badge-soft-success d-inline-flex align-items-center">
														<i class="ti ti-point-filled me-1"></i>Paid
													</span>
                                                </td>
                                                <td>
                                                    <div class="action-icon d-inline-flex">
                                                        <a href="{{url('invoice-details')}}" class="me-2"><i class="ti ti-eye"></i></a>
                                                        <a href="#" class="me-2"><i class="ti ti-edit"></i></a>
                                                        <a href="#delete_modal" class="" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="form-check form-check-md">
                                                        <input class="form-check-input" type="checkbox">
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="{{url('invoice-details')}}" class="tb-data">INV-1454</a>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <a href="{{url('invoice-details')}}" class="avatar avatar-lg me-2">
                                                            <img src="{{URL::asset('build/img/users/user-08.jpg')}}" class="rounded-circle" alt="user">
                                                        </a>
                                                        <div>
                                                            <h6 class="fw-medium fs-14"><a href="{{url('invoice-details')}}">Anthony Lewis</a>
                                                            </h6>
                                                            <span class="fs-12">anthony@example.com</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>14 Jan 2024, 04:27 AM </td>
                                                <td>$300</td>
                                                <td>$0</td>
                                                <td>14 Jan 2024, 04:27 AM</td>
                                                <td>
                                                    <span class="badge badge-soft-warning d-inline-flex align-items-center">
														<i class="ti ti-point-filled me-1"></i>Draft
													</span>
                                                </td>
                                                <td>
                                                    <div class="action-icon d-inline-flex">
                                                        <a href="{{url('invoice-details')}}" class="me-2"><i class="ti ti-eye"></i></a>
                                                        <a href="#" class="me-2"><i class="ti ti-edit"></i></a>
                                                        <a href="#delete_modal" class="" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="form-check form-check-md">
                                                        <input class="form-check-input" type="checkbox">
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="{{url('invoice-details')}}" class="tb-data">INV-6587</a>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <a href="{{url('invoice-details')}}" class="avatar avatar-lg me-2">
                                                            <img src="{{URL::asset('build/img/users/user-09.jpg')}}" class="rounded-circle" alt="user">
                                                        </a>
                                                        <div>
                                                            <h6 class="fw-medium fs-14"><a href="{{url('invoice-details')}}">Connie Waters</a>
                                                            </h6>
                                                            <span class="fs-12">connie@example.com</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>15 Nov 2024, 12:44 PM</td>
                                                <td>$987</td>
                                                <td>$47</td>
                                                <td>15 Nov 2024, 12:44 PM</td>
                                                <td>
                                                    <span class="badge badge-soft-primary d-inline-flex align-items-center">
														<i class="ti ti-point-filled me-1"></i>Pending
													</span>
                                                </td>
                                                <td>
                                                    <div class="action-icon d-inline-flex">
                                                        <a href="{{url('invoice-details')}}" class="me-2"><i class="ti ti-eye"></i></a>
                                                        <a href="#" class="me-2"><i class="ti ti-edit"></i></a>
                                                        <a href="#delete_modal" class="" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="form-check form-check-md">
                                                        <input class="form-check-input" type="checkbox">
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="{{url('invoice-details')}}" class="tb-data">INV-5879</a>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <a href="{{url('invoice-details')}}" class="avatar avatar-lg me-2">
                                                            <img src="{{URL::asset('build/img/users/user-10.jpg')}}" class="rounded-circle" alt="user">
                                                        </a>
                                                        <div>
                                                            <h6 class="fw-medium fs-14"><a href="{{url('invoice-details')}}">Lori Broaddus</a>
                                                            </h6>
                                                            <span class="fs-12">broaddus@example.com</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>10 Dec 2024, 11:23 PM</td>
                                                <td>$365</td>
                                                <td>$21</td>
                                                <td>10 Dec 2024, 11:23 PM</td>
                                                <td>
                                                    <span class="badge badge-soft-danger d-inline-flex align-items-center">
														<i class="ti ti-point-filled me-1"></i>Overdue
													</span>
                                                </td>
                                                <td>
                                                    <div class="action-icon d-inline-flex">
                                                        <a href="{{url('invoice-details')}}" class="me-2"><i class="ti ti-eye"></i></a>
                                                        <a href="#" class="me-2"><i class="ti ti-edit"></i></a>
                                                        <a href="#delete_modal" class="" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Table List -->

		    </div>

            @component('components.footer')
            @endcomponent
        </div>

		<!-- ========================
			End Page Content
		========================= -->
@endsection