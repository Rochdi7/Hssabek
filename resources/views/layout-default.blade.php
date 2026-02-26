<?php $page = 'layout-default'; ?>
@extends('layout.mainlayout')
@section('content')
	<!-- ========================
		Start Page Content
	========================= -->

	<div class="page-wrapper">

		<!-- Start Content -->
		<div class="content">

			<!-- Start Breadcrumb -->
			<div class="d-flex d-block align-items-center justify-content-between flex-wrap gap-3 mb-3">
				<div>
					<h6>Dashboard</h6>
				</div>
				<div class="d-flex my-xl-auto right-content align-items-center flex-wrap gap-2">
					<div id="reportrange" class="reportrange-picker d-flex align-items-center">
						<i class="isax isax-calendar text-gray-5 fs-14 me-1"></i><span class="reportrange-picker-field">16 Apr 25 - 16 Apr 25</span>
					</div>
					<div class="dropdown me-1">
						<a class="btn btn-primary d-flex align-items-center justify-content-center dropdown-toggle" data-bs-toggle="dropdown" href="javascript:void(0);" role="button">
							Create New
						</a>
						<ul class="dropdown-menu dropdown-menu-start">
							<li>
								<a href="{{url('add-invoice')}}" class="dropdown-item d-flex align-items-center">
									<i class="isax isax-document-text-1 me-2"></i>Invoice
								</a>
							</li>
							<li>
								<a href="{{url('expenses')}}" class="dropdown-item d-flex align-items-center">
									<i class="isax isax-money-send me-2"></i>Expense
								</a>
							</li>
							<li>
								<a href="{{url('add-credit-notes')}}" class="dropdown-item d-flex align-items-center">
									<i class="isax isax-money-add me-2"></i>Credit Notes
								</a>
							</li>
							<li>
								<a href="{{url('add-debit-notes')}}" class="dropdown-item d-flex align-items-center">
									<i class="isax isax-money-recive me-2"></i>Debit Notes
								</a>
							</li>
							<li>
								<a href="{{url('add-purchases-orders')}}" class="dropdown-item d-flex align-items-center">
									<i class="isax isax-document me-2"></i>Purchase Order
								</a>
							</li>
							<li>
								<a href="{{url('add-quotation')}}" class="dropdown-item d-flex align-items-center">
									<i class="isax isax-document-download me-2"></i>Quotation
								</a>
							</li>
							<li>
								<a href="{{url('add-delivery-challan')}}" class="dropdown-item d-flex align-items-center">
									<i class="isax isax-document-forward me-2"></i>Delivery Challan
								</a>
							</li>
						</ul>
					</div>
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
				</div>
			</div>
			<!-- End Breadcrumb -->

			<div class="bg-primary rounded welcome-wrap position-relative mb-3">

				<!-- start row -->
				<div class="row">
					<div class="col-lg-8 col-md-9 col-sm-7">
						<div>
							<h5 class="text-white mb-1">Good Morning, Jafna Cremson</h5>
							<p class="text-white mb-3">You have 15+ invoices saved to draft that has to send to customers</p>
							<div class="d-flex align-items-center flex-wrap gap-3">
								<p class="d-flex align-items-center fs-13 text-white mb-0"><i class="isax isax-calendar5 me-1"></i>Friday, 24 Mar 2025</p>
								<p class="d-flex align-items-center fs-13 text-white mb-0"><i class="isax isax-clock5 me-1"></i>11:24 AM</p>
							</div>
						</div>
					</div><!-- end col -->
				</div>
				<!-- end row -->

				<div class="position-absolute end-0 top-50 translate-middle-y p-2 d-none d-sm-block">
					<img src="{{URL::asset('build/img/icons/dashboard.svg')}}" alt="img">
				</div>
			</div>

			<!-- start row -->
			<div class="row">
				<div class="col-md-4 d-flex">
					<div class="card flex-fill">
						<div class="card-body">
							<div class="mb-3">
								<h6 class="d-flex align-items-center mb-1"><i class="isax isax-category5 text-default me-2"></i>Overview</h6>
							</div>
							<div class="row g-4">
								<div class="col-xl-6">
									<div class="d-flex align-items-center">
										<span class="avatar avatar-44 avatar-rounded bg-primary-subtle text-primary flex-shrink-0 me-2">
											<i class="isax isax-document-text-1 fs-20"></i>
										</span>
										<div>
											<p class="mb-1 text-truncate">Invoices</p>
											<h6 class="fs-16 fw-semibold mb-0 text-truncate">1,041</h6>
										</div>
									</div>
								</div>
								<div class="col-xl-6">
									<div class="d-flex align-items-center me-2">
										<span class="avatar avatar-44 avatar-rounded bg-success-subtle text-success-emphasis flex-shrink-0 me-2">
											<i class="isax isax-profile-2user fs-20"></i>
										</span>
										<div>
											<p class="mb-1 text-truncate">Customers</p>
											<h6 class="fs-16 fw-semibold mb-0 text-truncate">3,462</h6>
										</div>
									</div>
								</div>
								<div class="col-xl-6">
									<div class="d-flex align-items-center">
										<span class="avatar avatar-44 avatar-rounded bg-warning-subtle text-warning-emphasis flex-shrink-0 me-2">
											<i class="isax isax-dcube fs-20"></i>
										</span>
										<div>
											<p class="mb-1 text-truncate">Amount Due</p>
											<h6 class="fs-16 fw-semibold mb-0 text-truncate">$1,642</h6>
										</div>
									</div>
								</div>
								<div class="col-xl-6">
									<div class="d-flex align-items-center me-2">
										<span class="avatar avatar-44 avatar-rounded bg-info-subtle text-info-emphasis flex-shrink-0 me-2">
											<i class="isax isax-document-text fs-20"></i>
										</span>
										<div>
											<p class="mb-1 text-truncate">Quotations</p>
											<h6 class="fs-16 fw-semibold mb-0 text-truncate">2,150</h6>
										</div>
									</div>
								</div>
							</div>
						</div> <!-- end card body -->
					</div> <!-- end card -->
				</div> <!-- end col -->
				<div class="col-md-4 d-flex">
					<div class="card flex-fill">
						<div class="card-body">
							<div class="mb-3">
								<h6 class="d-flex align-items-center mb-1"><i class="isax isax-chart-215 text-default me-2"></i>Sales Analytics</h6>
							</div>
							<div class="row g-4">
								<div class="col-xl-6">
									<div class="d-flex align-items-center">
										<span class="avatar avatar-44 avatar-rounded bg-primary-subtle text-primary flex-shrink-0 me-2">
											<i class="isax isax-document-forward fs-20"></i>
										</span>
										<div>
											<p class="mb-1 text-truncate">Total Sales</p>
											<h6 class="fs-16 fw-semibold mb-0">$40,569</h6>
										</div>
									</div>
								</div>
								<div class="col-xl-6">
									<div class="d-flex align-items-center me-2">
										<span class="avatar avatar-44 avatar-rounded bg-success-subtle text-success-emphasis flex-shrink-0 me-2">
											<i class="isax isax-programming-arrow fs-20"></i>
										</span>
										<div>
											<p class="mb-1 text-truncate">Purchase</p>
											<h6 class="fs-16 fw-semibold mb-0 text-truncate">$1,54,220</h6>
										</div>
									</div>
								</div>
								<div class="col-xl-6">
									<div class="d-flex align-items-center">
										<span class="avatar avatar-44 avatar-rounded bg-warning-subtle text-warning-emphasis flex-shrink-0 me-2">
											<i class="isax isax-dollar-circle fs-20"></i>
										</span>
										<div>
											<p class="mb-1 mb-0">Expenses</p>
											<h6 class="fs-16 fw-semibold text-truncate">$10,041</h6>
										</div>
									</div>
								</div>
								<div class="col-xl-6">
									<div class="d-flex align-items-center me-2">
										<span class="avatar avatar-44 avatar-rounded bg-info-subtle text-info-emphasis flex-shrink-0 me-2">
											<i class="isax isax-flag fs-20"></i>
										</span>
										<div>
											<p class="mb-1 text-truncate">Credits</p>
											<h6 class="fs-16 fw-semibold mb-0 text-truncate">$12,150</h6>
										</div>
									</div>
								</div>
							</div>
						</div> <!-- end card body -->
					</div> <!-- end card -->
				</div> <!-- end col -->
				<div class="col-md-4 d-flex">
					<div class="card flex-fill">
						<div class="card-body">
							<div class="mb-3">
								<h6 class="d-flex align-items-center mb-1"><i class="isax isax-chart-success5 text-default me-2"></i>Invoice Statistics</h6>
							</div>
							<div class="row g-4">
								<div class="col-xl-6">
									<div class="d-flex align-items-center">
										<span class="avatar avatar-44 avatar-rounded bg-primary-subtle text-primary flex-shrink-0 me-2">
											<i class="isax isax-document fs-20"></i>
										</span>
										<div>
											<p class="mb-1 text-truncate">Invoiced</p>
											<h6 class="fs-16 fw-semibold mb-0">$21,132</h6>
										</div>
									</div>
								</div>
								<div class="col-xl-6">
									<div class="d-flex align-items-center me-2">
										<span class="avatar avatar-44 avatar-rounded bg-success-subtle text-success-emphasis flex-shrink-0 me-2">
											<i class="isax isax-document-forward fs-20"></i>
										</span>
										<div>
											<p class="mb-1 text-truncate">Received</p>
											<h6 class="fs-16 fw-semibold mb-0 text-truncate">$10,763</h6>
										</div>
									</div>
								</div>
								<div class="col-xl-6">
									<div class="d-flex align-items-center">
										<span class="avatar avatar-44 avatar-rounded bg-warning-subtle text-warning-emphasis flex-shrink-0 me-2">
											<i class="isax isax-document-previous fs-20"></i>
										</span>
										<div>
											<p class="mb-1 text-truncate">Outstanding</p>
											<h6 class="fs-16 fw-semibold mb-0 text-truncate">$8041</h6>
										</div>
									</div>
								</div>
								<div class="col-xl-6">
									<div class="d-flex align-items-center me-2">
										<span class="avatar avatar-44 avatar-rounded bg-info-subtle text-info-emphasis flex-shrink-0 me-2">
											<i class="isax isax-dislike fs-20"></i>
										</span>
										<div>
											<p class="mb-1 text-truncate">Overdue</p>
											<h6 class="fs-16 fw-semibold text-truncate mb-0">$41,811.2</h6>
										</div>
									</div>
								</div>
							</div>
						</div> <!-- end card body -->
					</div> <!-- end card -->
				</div> <!-- end col -->
			</div>
			<!-- end row -->

			<!-- start row -->
				<div class="row">
				<div class="col-md-4 d-flex flex-column">
					<div class="card overflow-hidden z-1 flex-fill">
						<div class="card-body">
							<div class="d-flex align-items-center justify-content-between border-bottom mb-2 pb-2">
								<div>										
									<p class="mb-1">Total Products</p>
									<div class="d-flex align-items-center">
										<h6 class="fs-16 fw-semibold me-2">897</h6>
										<span class="badge badge-sm badge-soft-success">+45<i class="isax isax-arrow-up-15 ms-1"></i></span>
									</div>
								</div>
								<span class="avatar avatar-lg bg-light text-dark avatar-rounded">
									<i class="isax isax-document-text fs-16"></i>
								</span>
							</div>
							<a href="{{url('inventory')}}" class="fw-medium text-decoration-underline">View Inventory</a>
						</div> <!-- end card body -->
						<div class="position-absolute end-0 bottom-0 z-n1">
							<img src="{{URL::asset('build/img/bg/card-bg-01.svg')}}" alt="img">
						</div>
					</div> <!-- end card -->
				</div> <!-- end col -->
				<div class="col-md-4 d-flex flex-column">
					<div class="card overflow-hidden z-1 flex-fill">
						<div class="card-body">
							<div class="d-flex align-items-center justify-content-between border-bottom mb-2 pb-2">
								<div>										
									<p class="mb-1">Total Sales</p>
									<div class="d-flex align-items-center">
										<h6 class="fs-16 fw-semibold me-2">645</h6>
										<span class="badge badge-sm badge-soft-success">+45<i class="isax isax-arrow-up-15 ms-1"></i></span>
									</div>
								</div>
								<span class="avatar avatar-lg bg-light text-dark avatar-rounded">
									<i class="isax isax-document-text fs-16"></i>
								</span>
							</div>
							<a href="{{url('invoices')}}" class="fw-medium text-decoration-underline">View Invoices</a>
						</div> <!-- end card body -->
						<div class="position-absolute end-0 bottom-0 z-n1">
							<img src="{{URL::asset('build/img/bg/card-bg-02.svg')}}" alt="img">
						</div>
					</div> <!-- end card -->
				</div> <!-- end col -->
				<div class="col-md-4 d-flex flex-column">
					<div class="card overflow-hidden z-1 flex-fill">
						<div class="card-body">
							<div class="d-flex align-items-center justify-content-between border-bottom mb-2 pb-2">
								<div>										
									<p class="mb-1">Total Quotations</p>
									<div class="d-flex align-items-center">
										<h6 class="fs-16 fw-semibold me-2">128</h6>
										<span class="badge badge-sm badge-soft-success">+45<i class="isax isax-arrow-up-15 ms-1"></i></span>
									</div>
								</div>
								<span class="avatar avatar-lg bg-light text-dark avatar-rounded">
									<i class="isax isax-document-text fs-16"></i>
								</span>
							</div>
							<a href="{{url('quotations')}}" class="fw-medium text-decoration-underline">View All</a>
						</div> <!-- end card body -->
						<div class="position-absolute end-0 bottom-0 z-n1">
							<img src="{{URL::asset('build/img/bg/card-bg-03.svg')}}" alt="img">
						</div>
					</div> <!-- end card -->
				</div>
				</div>
			<!-- end row -->

			<!-- start row -->
			<div class="row">
				<div class="col-xl-6 d-flex">
					<div class="card flex-fill">
						<div class="card-body pb-0">
							<div class="mb-3">
								<h6 class="mb-1">Revenue</h6>
							</div>
							<div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
								<div>
									<p class="mb-1">Total Revenue</p>
									<div class="d-flex align-items-center">
										<h6 class="fs-16 fw-semibold me-2">897</h6>
										<span class="badge badge-sm badge-soft-success">+45<i class="isax isax-arrow-up-15 ms-1"></i></span>
									</div>
								</div>
								<div class="d-flex align-items-center gap-2">
									<p class="fs-13 text-dark d-flex align-items-center mb-0"><i class="fa-solid fa-circle text-primary-transparent fs-12 me-1"></i>Received </p>
									<p class="fs-13 text-dark d-flex align-items-center mb-0"><i class="fa-solid fa-circle text-primary fs-12 me-1"></i>Outstanding</p>
								</div>
							</div>
							<div id="revenue_chart"></div>
						</div> <!-- end card body -->
					</div> <!-- end card -->
				</div> <!-- end col -->
				<div class="col-xl-6 d-flex">
					<div class="card flex-fill">
						<div class="card-body">
							<div class="mb-3">
								<h6 class="mb-1">Customers</h6>
							</div>
							<div class="table-responsive">
								<table class="table table-nowrap table-borderless custom-table">
									<tbody>
										<tr>
											<td>
												<div class="d-flex align-items-center">
													<a href="{{url('customer-details')}}" class="avatar avatar-lg rounded-circle me-2 flex-shrink-0">
														<img src="{{URL::asset('build/img/users/user-06.jpg')}}" class="rounded-circle" alt="img">
													</a>
													<div>
														<h6 class="fs-14 fw-medium mb-1"><a href="{{url('customer-details')}}">Emily Clark</a></h6>
														<p class="fs-13">No of Invoices : 45</p>
													</div>
												</div>
											</td>
											<td>
												<p class="mb-1">Outstanding </p>
												<h6 class="fs-14 fw-semibold">$3589</h6>
											</td>
											<td>
												<div class="d-flex align-items-center justify-content-end gap-2">
													<a href="{{url('add-invoice')}}" class="btn btn-icon btn-sm btn-light" data-bs-toggle="tooltip" data-bs-title="New Invoice"><i class="isax isax-add-circle"></i></a>
													<div data-bs-toggle="tooltip" data-bs-title="Add Ledger">
														<a href="#" class="btn btn-icon btn-sm btn-light"  data-bs-toggle="modal" data-bs-target="#add_ledger"><i class="isax isax-document-text-1"></i></a>															
													</div>
												</div>
											</td>
										</tr>
										<tr>
											<td>
												<div class="d-flex align-items-center">
													<a href="{{url('customer-details')}}" class="avatar avatar-lg rounded-circle me-2 flex-shrink-0">
														<img src="{{URL::asset('build/img/users/user-01.jpg')}}" class="rounded-circle" alt="img">
													</a>
													<div>
														<h6 class="fs-14 fw-medium mb-1"><a href="{{url('customer-details')}}">John Smith</a></h6>
														<p class="fs-13">No of Invoices : 16</p>
													</div>
												</div>
											</td>
											<td>
												<p class="mb-1">Outstanding </p>
												<h6 class="fs-14 fw-semibold">$5426</h6>
											</td>
											<td>
												<div class="d-flex align-items-center justify-content-end gap-2">
													<a href="{{url('add-invoice')}}" class="btn btn-icon btn-sm btn-light" data-bs-toggle="tooltip" data-bs-title="New Invoice"><i class="isax isax-add-circle"></i></a>
													<div data-bs-toggle="tooltip" data-bs-title="Add Ledger">
														<a href="#" class="btn btn-icon btn-sm btn-light"  data-bs-toggle="modal" data-bs-target="#add_ledger"><i class="isax isax-document-text-1"></i></a>															
													</div>
												</div>
											</td>
										</tr>
										<tr>
											<td>
												<div class="d-flex align-items-center">
													<a href="{{url('customer-details')}}" class="avatar avatar-lg rounded-circle me-2 flex-shrink-0">
														<img src="{{URL::asset('build/img/users/user-38.jpg')}}" class="rounded-circle" alt="img">
													</a>
													<div>
														<h6 class="fs-14 fw-medium mb-1"><a href="{{url('customer-details')}}">Olivia Harris</a></h6>
														<p class="fs-13">No of Invoices : 23</p>
													</div>
												</div>
											</td>
											<td>
												<p class="mb-1">Outstanding </p>
												<h6 class="fs-14 fw-semibold">$1493</h6>
											</td>
											<td>
												<div class="d-flex align-items-center justify-content-end gap-2">
													<a href="{{url('add-invoice')}}" class="btn btn-icon btn-sm btn-light" data-bs-toggle="tooltip" data-bs-title="New Invoice"><i class="isax isax-add-circle"></i></a>
													<div data-bs-toggle="tooltip" data-bs-title="Add Ledger">
														<a href="#" class="btn btn-icon btn-sm btn-light"  data-bs-toggle="modal" data-bs-target="#add_ledger"><i class="isax isax-document-text-1"></i></a>															
													</div>
												</div>
											</td>
										</tr>
										<tr>
											<td>
												<div class="d-flex align-items-center">
													<a href="{{url('customer-details')}}" class="avatar avatar-lg rounded-circle me-2 flex-shrink-0">
														<img src="{{URL::asset('build/img/users/user-12.jpg')}}" class="rounded-circle" alt="img">
													</a>
													<div>
														<h6 class="fs-14 fw-medium mb-1"><a href="{{url('customer-details')}}">William Parker</a></h6>
														<p class="fs-13">No of Invoices : 58</p>
													</div>
												</div>
											</td>
											<td>
												<p class="mb-1">Outstanding </p>
												<h6 class="fs-14 fw-semibold">$7854</h6>
											</td>
											<td>
												<div class="d-flex align-items-center justify-content-end gap-2">
													<a href="{{url('add-invoice')}}" class="btn btn-icon btn-sm btn-light" data-bs-toggle="tooltip" data-bs-title="New Invoice"><i class="isax isax-add-circle"></i></a>
													<div data-bs-toggle="tooltip" data-bs-title="Add Ledger">
														<a href="#" class="btn btn-icon btn-sm btn-light"  data-bs-toggle="modal" data-bs-target="#add_ledger"><i class="isax isax-document-text-1"></i></a>															
													</div>
												</div>
											</td>
										</tr>
										<tr>
											<td>
												<div class="d-flex align-items-center">
													<a href="{{url('customer-details')}}" class="avatar avatar-lg rounded-circle me-2 flex-shrink-0">
														<img src="{{URL::asset('build/img/users/user-02.jpg')}}" class="rounded-circle" alt="img">
													</a>
													<div>
														<h6 class="fs-14 fw-medium mb-1"><a href="{{url('customer-details')}}">Charlotte Brown</a></h6>
														<p class="fs-13">No of Invoices : 09</p>
													</div>
												</div>
											</td>
											<td>
												<p class="mb-1">Outstanding </p>
												<h6 class="fs-14 fw-semibold">$4989</h6>
											</td>
											<td>
												<div class="d-flex align-items-center justify-content-end gap-2">
													<a href="{{url('add-invoice')}}" class="btn btn-icon btn-sm btn-light" data-bs-toggle="tooltip" data-bs-title="New Invoice"><i class="isax isax-add-circle"></i></a>
													<div data-bs-toggle="tooltip" data-bs-title="Add Ledger">
														<a href="#" class="btn btn-icon btn-sm btn-light"  data-bs-toggle="modal" data-bs-target="#add_ledger"><i class="isax isax-document-text-1"></i></a>															
													</div>
												</div>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
							<a href="{{url('customers')}}" class="btn btn-light btn-lg w-100 text-decoration-underline mt-3">All Customers</a>
						</div> <!-- end card body -->
					</div> <!-- end card -->
				</div> <!-- end col -->
			</div>
			<!-- end row -->

			<!-- start row -->
			<div class="row">
				<div class="col-md-12">
					<div class="card"> 
						<div class="card-body">
							<div class="d-flex align-items-center justify-content-between gap-2 flex-wrap mb-3">
								<h6 class="mb-1">Invoices</h6>
								<a href="{{url('invoices')}}" class="btn btn-primary mb-1">View all Invoices</a>
							</div>
							<div class="table-responsive no-filter no-pagination">
								<table class="table table-nowrap border mb-0">
									<thead>
										<tr>
											<th>ID</th>
											<th>Customer</th>
											<th>Created On</th>
											<th>Amount</th>
											<th>Paid</th>
											<th>Payment Mode</th>
											<th>Due Date</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>
												<a href="{{url('invoice-details')}}" class="link-default">INV00025</a>
											</td>
											<td>
												<div class="d-flex align-items-center">
													<a href="{{url('customer-details')}}" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
														<img src="{{URL::asset('build/img/users/user-22.jpg')}}" class="rounded-circle" alt="img">
													</a>
													<div>
														<h6 class="fs-14 fw-medium mb-0"><a href="{{url('customer-details')}}">Emily Clark</a></h6>
													</div>
												</div>
											</td>
											<td>22 Feb 2025</td>
											<td class="text-dark">$10,000</td>
											<td>$5,000</td>
											<td class="text-dark">Cash</td>	
											<td>04 Mar 2025</td>
										</tr>
										<tr>
											<td>
												<a href="{{url('invoice-details')}}" class="link-default">INV00024</a>
											</td>
											<td>
												<div class="d-flex align-items-center">
													<a href="{{url('customer-details')}}" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
														<img src="{{URL::asset('build/img/users/user-07.jpg')}}" class="rounded-circle" alt="img">
													</a>
													<div>
														<h6 class="fs-14 fw-medium mb-0"><a href="{{url('customer-details')}}">John Carter</a></h6>
													</div>
												</div>
											</td>
											<td>07 Feb 2025</td>
											<td class="text-dark">$25,750</td>
											<td>$5,000</td>
											<td class="text-dark">Check</td>
											<td>20 Feb 2025</td>
										</tr>
										<tr>
											<td>
												<a href="{{url('invoice-details')}}" class="link-default">INV00023</a>
											</td>
											<td>
												<div class="d-flex align-items-center">
													<a href="{{url('customer-details')}}" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
														<img src="{{URL::asset('build/img/users/user-16.jpg')}}" class="rounded-circle" alt="img">
													</a>
													<div>
														<h6 class="fs-14 fw-medium mb-0"><a href="{{url('customer-details')}}">Sophia White</a></h6>
													</div>
												</div>
											</td>
											<td>09 Dec 2024</td>
											<td class="text-dark">$1,20,500</td>
											<td>$60,000</td>
											<td class="text-dark">Check</td>
											<td>12 Nov 2024</td>
										</tr>
										<tr>
											<td>
												<a href="{{url('invoice-details')}}" class="link-default">INV00022</a>
											</td>
											<td>
												<div class="d-flex align-items-center">
													<a href="{{url('customer-details')}}" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
														<img src="{{URL::asset('build/img/users/user-08.jpg')}}" class="rounded-circle" alt="img">
													</a>
													<div>
														<h6 class="fs-14 fw-medium mb-0"><a href="{{url('customer-details')}}">Michael Johnson</a></h6>
													</div>
												</div>
											</td>
											<td>30 Nov 2024</td>
											<td class="text-dark">$7,50,300</td>
											<td>$60,000</td>
											<td class="text-dark">Check</td>
											<td>25 Oct 2024</td>
										</tr>
										<tr>
											<td>
												<a href="{{url('invoice-details')}}" class="link-default">INV00016</a>
											</td>
											<td>
												<div class="d-flex align-items-center">
													<a href="{{url('customer-details')}}" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
														<img src="{{URL::asset('build/img/users/user-15.jpg')}}" class="rounded-circle" alt="img">
													</a>
													<div>
														<h6 class="fs-14 fw-medium mb-0"><a href="{{url('customer-details')}}">Daniel Martinez</a></h6>
													</div>
												</div>
											</td>
											<td>12 Oct 2024</td>
											<td class="text-dark">$9,99,999</td>
											<td>$4,00,000</td>
											<td class="text-dark">Cash</td>
											<td>18 Oct 2024</td>
										</tr>
										<tr>
											<td>
												<a href="{{url('invoice-details')}}" class="link-default">INV00015</a>
											</td>
											<td>
												<div class="d-flex align-items-center">
													<a href="{{url('customer-details')}}" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
														<img src="{{URL::asset('build/img/users/user-27.jpg')}}" class="rounded-circle" alt="img">
													</a>
													<div>
														<h6 class="fs-14 fw-medium mb-0"><a href="{{url('customer-details')}}">Charlotte Brown</a></h6>
													</div>
												</div>
											</td>
											<td>05 Oct 2024</td>
											<td class="text-dark">$87,650</td>
											<td>$40,000</td>
											<td class="text-dark">Check</td>
											<td>22 Sep 2024</td>
										</tr>
										<tr>
											<td>
												<a href="{{url('invoice-details')}}" class="link-default">INV00014</a>
											</td>
											<td>
												<div class="d-flex align-items-center">
													<a href="{{url('customer-details')}}" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
														<img src="{{URL::asset('build/img/users/user-14.jpg')}}" class="rounded-circle" alt="img">
													</a>
													<div>
														<h6 class="fs-14 fw-medium mb-0"><a href="{{url('customer-details')}}">William Parker</a></h6>
													</div>
												</div>
											</td>
											<td>09 Sep 2024</td>
											<td class="text-dark">$69,420</td>
											<td>$30,000</td>
											<td class="text-dark">Cash</td>
											<td>15 Sep 2024</td>
										</tr>
										<tr>
											<td>
												<a href="{{url('invoice-details')}}" class="link-default">INV00013</a>
											</td>
											<td>
												<div class="d-flex align-items-center">
													<a href="{{url('customer-details')}}" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
														<img src="{{URL::asset('build/img/users/user-25.jpg')}}" class="rounded-circle" alt="img">
													</a>
													<div>
														<h6 class="fs-14 fw-medium mb-0"><a href="{{url('customer-details')}}">Mia Thompson</a></h6>
													</div>
												</div>
											</td>
											<td>02 Sep 2024</td>
											<td class="text-dark">$33,210</td>
											<td>$15,000</td>
											<td class="text-dark">Check</td>
											<td>20 Aug 2024</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div> <!-- end card body -->
					</div> <!-- end card -->
				</div> <!-- end col -->
			</div>
			<!-- end row -->

			<!-- start row -->
			<div class="row">
				<div class="col-lg-12 col-xl-4 d-flex">
					<div class="card flex-fill">
						<div class="card-body pb-1">
							<div class="mb-3">
								<h6 class="mb-1">Recent Transactions</h6>
							</div>
							<h6 class="fs-14 fw-semibold mb-3">Today</h6>
							<div class="d-flex align-items-center justify-content-between mb-3">
								<div class="d-flex align-items-center">
									<a href="javascript:void(0);" class="avatar avatar-md flex-shrink-0 me-2">
										<img src="{{URL::asset('build/img/icons/transaction-01.svg')}}" class="rounded-circle" alt="img">
									</a>
									<div>
										<h6 class="fs-14 fw-semibold mb-1"><a href="javascript:void(0);">Andrew James</a></h6>
										<p class="fs-13"><a href="{{url('invoice-details')}}" class="link-default">#INV45478</a></p>
									</div>
								</div>
								<div class="text-end">
									<span class="badge badge-lg badge-soft-success">+ $989.15</span>
								</div>
							</div>
							<div class="d-flex align-items-center justify-content-between mb-3">
								<div class="d-flex align-items-center">
									<a href="javascript:void(0);" class="avatar avatar-md flex-shrink-0 me-2">
										<img src="{{URL::asset('build/img/icons/transaction-02.svg')}}" class="rounded-circle" alt="img">
									</a>
									<div>
										<h6 class="fs-14 fw-semibold mb-1"><a href="javascript:void(0);">John Carter</a></h6>
										<p class="fs-13"><a href="{{url('invoice-details')}}" class="link-default">#INV45477</a></p>
									</div>
								</div>
								<div class="text-end">
									<span class="badge badge-lg badge-soft-danger">- $300.12</span>
								</div>
							</div>
							<hr>
							<h6 class="fs-14 fw-semibold mb-3">Yesterday</h6>
							<div class="d-flex align-items-center justify-content-between mb-3">
								<div class="d-flex align-items-center">
									<a href="javascript:void(0);" class="avatar avatar-md flex-shrink-0 me-2">
										<img src="{{URL::asset('build/img/icons/transaction-02.svg')}}" class="rounded-circle" alt="img">
									</a>
									<div>
										<h6 class="fs-14 fw-semibold mb-1"><a href="javascript:void(0);">Sophia White</a></h6>
										<p class="fs-13"><a href="{{url('invoice-details')}}" class="link-default">#INV45476</a></p>
									</div>
								</div>
								<div class="text-end">
									<span class="badge badge-lg badge-soft-success"> + $669</span>
								</div>
							</div>
							<div class="d-flex align-items-center justify-content-between mb-3">
								<div class="d-flex align-items-center">
									<a href="javascript:void(0);" class="avatar avatar-md flex-shrink-0 me-2">
										<img src="{{URL::asset('build/img/icons/transaction-02.svg')}}" class="rounded-circle" alt="img">
									</a>
									<div>
										<h6 class="fs-14 fw-semibold mb-1"><a href="javascript:void(0);">Daniel Martinez</a></h6>
										<p class="fs-13"><a href="{{url('invoice-details')}}" class="link-default">#INV45475</a></p>
									</div>
								</div>
								<div class="text-end">
									<span class="badge badge-lg badge-soft-success"> + $474.22</span>
								</div>
							</div>
							<div class="d-flex align-items-center justify-content-between mb-3">
								<div class="d-flex align-items-center">
									<a href="javascript:void(0);" class="avatar avatar-md flex-shrink-0 me-2">
										<img src="{{URL::asset('build/img/icons/transaction-01.svg')}}" class="rounded-circle" alt="img">
									</a>
									<div>
										<h6 class="fs-14 fw-semibold mb-1"><a href="javascript:void(0);">Amelia Robinson</a></h6>
										<p class="fs-13"><a href="{{url('invoice-details')}}" class="link-default">#INV45474</a></p>
									</div>
								</div>
								<div class="text-end">
									<span class="badge badge-lg badge-soft-success"> + $339.79</span>
								</div>
							</div>
						</div> <!-- end card body -->
					</div> <!-- end card -->
				</div> <!-- end col -->

				<div class="col-md-6 col-xl-4 d-flex">
					<div class="card flex-fill">
						<div class="card-body">
							<div class="mb-3">
								<h6 class="mb-1">Quotations</h6>
							</div>
							<div class="d-flex align-items-center justify-content-between border-bottom pb-3 mb-3">
								<div class="d-flex align-items-center">
									<a href="{{url('customer-details')}}" class="avatar avatar-lg flex-shrink-0 me-2">
										<img src="{{URL::asset('build/img/users/user-02.jpg')}}" class="rounded-circle" alt="img">
									</a>
									<div>
										<h6 class="fs-14 fw-semibold mb-1"><a href="{{url('customer-details')}}">Emily Clark</a></h6>
										<p class="fs-13">QU0014</p>
									</div>
								</div>
								<div class="text-end">
									<span class="badge badge-sm badge-soft-success d-inline-flex align-items-center mb-1">Accepted<i class="isax isax-tick-circle ms-1"></i></span>
									<p class="fs-13">25 Mar 2025</p>
								</div>
							</div>
							<div class="d-flex align-items-center justify-content-between border-bottom pb-3 mb-3">
								<div class="d-flex align-items-center">
									<a href="{{url('customer-details')}}" class="avatar avatar-lg flex-shrink-0 me-2">
										<img src="{{URL::asset('build/img/users/user-07.jpg')}}" class="rounded-circle" alt="img">
									</a>
									<div>
										<h6 class="fs-14 fw-semibold mb-1"><a href="{{url('customer-details')}}">David Anderson</a></h6>
										<p class="fs-13">QU0147</p>
									</div>
								</div>
								<div class="text-end">
									<span class="badge badge-sm badge-soft-info d-inline-flex align-items-center mb-1">Sent<i class="isax isax-arrow-right-24 ms-1"></i></span>
									<p class="fs-13">12 Feb 2025</p>
								</div>
							</div>
							<div class="d-flex align-items-center justify-content-between border-bottom pb-3 mb-3">
								<div class="d-flex align-items-center">
									<a href="{{url('customer-details')}}" class="avatar avatar-lg flex-shrink-0 me-2">
										<img src="{{URL::asset('build/img/users/user-16.jpg')}}" class="rounded-circle" alt="img">
									</a>
									<div>
										<h6 class="fs-14 fw-semibold mb-1"><a href="{{url('customer-details')}}">Sophia White</a></h6>
										<p class="fs-13">QU1947</p>
									</div>
								</div>
								<div class="text-end">
									<span class="badge badge-sm badge-soft-light d-inline-flex align-items-center text-dark mb-1">Expired<i class="isax isax-timer-pause ms-1"></i></span>
									<p class="fs-13">08 Mar 2025</p>
								</div>
							</div>
							<div class="d-flex align-items-center justify-content-between border-bottom pb-3 mb-3">
								<div class="d-flex align-items-center">
									<a href="{{url('customer-details')}}" class="avatar avatar-lg flex-shrink-0 me-2">
										<img src="{{URL::asset('build/img/users/user-08.jpg')}}" class="rounded-circle" alt="img">
									</a>
									<div>
										<h6 class="fs-14 fw-semibold mb-1"><a href="{{url('customer-details')}}">Michael Johnson</a></h6>
										<p class="fs-13">QU2842</p>
									</div>
								</div>
								<div class="text-end">
									<span class="badge badge-sm badge-soft-danger d-inline-flex align-items-center mb-1">Declined<i class="isax isax-close-circle ms-1"></i></span>
									<p class="fs-13">31 Jan 2025</p>
								</div>
							</div>
							<div class="d-flex align-items-center justify-content-between">
								<div class="d-flex align-items-center">
									<a href="{{url('customer-details')}}" class="avatar avatar-lg flex-shrink-0 me-2">
										<img src="{{URL::asset('build/img/users/user-22.jpg')}}" class="rounded-circle" alt="img">
									</a>
									<div>
										<h6 class="fs-14 fw-semibold mb-1"><a href="{{url('customer-details')}}">Emily Clark</a></h6>
										<p class="fs-13">QU7868</p>
									</div>
								</div>
								<div class="text-end">
									<span class="badge badge-sm badge-soft-success d-inline-flex align-items-center mb-1">Accepted<i class="isax isax-tick-circle ms-1"></i></span>
									<p class="fs-13">18 Jan 2025</p>
								</div>
							</div>
						</div> <!-- end card body -->
					</div> <!-- end card -->
				</div> <!-- end col -->
				<div class="col-md-6 col-xl-4 d-flex flex-column">
					<div class="card d-flex">
						<div class="card-body flex-fill">
							<div class="d-flex align-items-center justify-content-between">
								<div>
									<p class="mb-1">Total Income on Invoice</p>
									<h6 class="fs-16 fw-semibold">$98,545</h6>
								</div>
								<div>
									<h6 class="fs-14 fw-semibold mb-1">30.2 <i class="isax isax-arrow-circle-up4 text-success"></i></h6>
									<p class="fs-13">Vs Last Week</p>
								</div>
							</div>
						</div> <!-- end card body -->
						<div id="invoice_income"></div>
					</div> <!-- end card -->
					<div class="card d-flex">
						<div class="card-body flex-fill">
							<h6 class="mb-3">Top Sales Statistics</h6>
							<div class="d-flex align-items-center justify-content-between flex-wrap gap-1 mb-3">
								<p class="d-flex align-items-center fs-13 text-dark mb-0"><i class="fa-solid fa-circle fs-8 me-1 text-pink"></i>Dell XPS 13</p>
								<p class="d-flex align-items-center fs-13 text-dark mb-0"><i class="fa-solid fa-circle fs-8 me-1 text-secondary"></i>Nike T-shirt</p>
								<p class="d-flex align-items-center fs-13 text-dark mb-0"><i class="fa-solid fa-circle fs-8 me-1 text-success"></i>Apple iPhone 15</p>
							</div>								
							<div id="total_sales"></div>
						</div> <!-- end card body -->
					</div> <!-- end card -->
				</div> <!-- end col -->
			</div>
			<!-- end row -->

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
@endsection