<?php $page = 'customer-plans-settings'; ?>
@extends('layout.mainlayout')
@section('content')
	<!-- ========================
		Start Page Content
	========================= -->

	<div class="page-wrapper">

		<!-- Start Content -->
		<div class="content">
			<!-- start row -->
			<div class="row justify-content-center">
				<div class="col-xl-11">
					<div class=" row settings-wrapper d-flex">
						<div class="col-xxl-3 col-lg-4">
							<div class="card settings-card">
								<div class="card-header">
									<h6 class="mb-0">Settings</h6>
								</div>
								<div class="card-body">
									<div class="sidebars settings-sidebar">
										<div class="sidebar-inner">
											<div class="sidebar-menu p-0">
												<ul>
													<li>
														<a href="{{url('customer-account-settings')}}" class="fs-14 fw-medium d-flex align-items-center"><i class="isax isax-user-octagon fs-18 me-1"></i>Account Settings</a>
													</li>
													<li>
														<a href="{{url('customer-security-settings')}}" class="fs-14 fw-medium d-flex align-items-center"><i class="isax isax-security-safe fs-18 me-1"></i>Security</a>
													</li>
													<li>
														<a href="{{url('customer-plans-settings')}}" class="active fs-14 fw-medium d-flex align-items-center"><i class="isax isax-transaction-minus fs-18 me-1"></i>Plans & Billings</a>
													</li>
													<li>
														<a href="{{url('customer-notification-settings')}}" class="fs-14 fw-medium d-flex align-items-center"><i class="isax isax-notification fs-18 me-1"></i>Notifications</a>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div> <!-- end col -->
						<div class="col-xxl-9 col-lg-8">
							<div class="mb-3">
								<div class="pb-3 border-bottom mb-3">
									<h6 class="mb-0">Plans & Billings</h6>
								</div>
								<div class="d-flex align-items-center mb-3">
									<span class="bg-dark avatar avatar-sm me-2 flex-shrink-0"><i class="isax isax-info-circle fs-14"></i></span>
									<h6 class="fs-16 fw-semibold">Current Plan Information</h6>
								</div>
								<form action="{{url('customer-plans-settings')}}">
									<div class="mb-3">
										<div class="card shadow-none">
											<div class="card-body">
												<div class="mb-0">
													<div class="d-flex align-items-center justify-content-between">
														<div class="">
															<h6 class="fw-bold mb-2">Basic Plan</h6>
															<div class="progress-container">
																<svg class="progress-circle me-2" viewBox="0 0 36 36">
																	<circle class="progress-bar" cx="18" cy="18" r="16"></circle>
																	<circle class="progress-bar-fill" cx="18" cy="18" r="16"></circle>
																</svg>
																<span>20 Days Left</span>
															</div>
														</div>
														<div>
															<button type="button" class="btn btn-primary btn-md" data-bs-toggle="modal" data-bs-target="#upgrade"> <i class="ti ti-crown"></i> Upgrade</button>
														</div>
													</div>
												</div>

											</div>
										</div>
									</div>
									<div class="mb-3">
										<div class="d-flex align-items-center mb-3">
											<span class="bg-dark avatar avatar-sm me-2 flex-shrink-0"><i class="isax isax-card fs-14"></i></span>
											<h6 class="fs-16 fw-semibold">Saved Cards</h6>
										</div>
										<div class="row">
											<div class="col-xl-6">
												<div class="card shadow-none">
													<div class="card-body">
														<div class="d-flex align-items-center mb-3">
															<a href="javascript:void(0);">
																<img src="{{URL::asset('build/img/settings/payment-icon-01.svg')}}" class="img-fluid me-2" alt="clock">
															</a>
															<div>
																<span class="fs-12">James Peterson</span>
																<h6 class="fs-14 fw-medium mb-1">Visa •••• 1568</h6>
															</div>
														</div>
														<div class="d-flex align-items-center justify-content-between">
															<a href="javascript:void(0);" class="badge bg-success">Default</a>
															<div class="d-flex align-items-center">
																<a href="javascript:void(0);" class="avatar bg-light text-dark avatar-md border rounded-circle me-2"><i class="isax isax-edit text-gray"></i></a>
																<a href="javascript:void(0);" class="avatar bg-light text-dark avatar-md border rounded-circle" data-bs-toggle="modal" data-bs-target="#delete_card"><i class="isax isax-trash text-gray"></i></a>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="col-xl-6">
												<div class="card shadow-none">
													<div class="card-body">
														<div class="d-flex align-items-center mb-3">
															<a href="javascript:void(0);">
																<img src="{{URL::asset('build/img/settings/payment-icon-02.svg')}}" class="img-fluid me-2" alt="clock">
															</a>
															<div>
																<span class="fs-12">Raymond Rowley</span>
																<h6 class="fs-14 fw-medium mb-1">Mastercard •••• 1279</h6>
															</div>
														</div>
														<div class="d-flex align-items-center justify-content-between">
															<a href="javascript:void(0);" class="text-primary text-decoration-underline">Set as Default</a>
															<div class="d-flex align-items-center">
																<a href="javascript:void(0);" class="avatar bg-light text-dark avatar-md border rounded-circle me-2"><i class="isax isax-edit text-gray"></i></a>
																<a href="javascript:void(0);" class="avatar bg-light text-dark avatar-md border rounded-circle" data-bs-toggle="modal" data-bs-target="#delete_card"><i class="isax isax-trash text-gray"></i></a>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="mb-3">
										<div class="d-flex align-items-center mb-3">
											<span class="bg-dark avatar avatar-sm me-2 flex-shrink-0"><i class="isax isax-transaction-minus fs-14"></i></span>
											<h6 class="fs-16 fw-semibold">Transactions</h6>
										</div>
										<div class="row">
											<!-- Table Search Start -->
											<div class="mb-3">

												<div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
													<div class="d-flex align-items-center flex-wrap gap-2">
														<div class="table-search d-flex align-items-center mb-0">
															<div class="search-input">
																<a href="javascript:void(0);" class="btn-searchset"><i class="isax isax-search-normal fs-12"></i></a>
															</div>
														</div>
													</div>
													<div class="d-flex align-items-center flex-wrap gap-2">
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

											</div>
											<!-- /Table Search End -->

											<!-- Table List Start -->
											<div class="table-responsive no-pagination">
												<table class="table table-nowrap datatable">
													<thead class="thead-light">
														<tr>
															<th>Plan Name</th>
															<th>Amount</th>
															<th>Purchased Date</th>
															<th>End Date</th>
															<th>Status</th>
															<th class="no-sort"></th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td>
																<p class="text-dark">Basic</p>
															</td>
															<td>$99</td>
															<td>22 Feb 2025</td>
															<td>22 Mar 2025</td>
															<td>
																<span class="badge badge-soft-success d-inline-flex align-items-center">Completed
																	<i class="isax isax-tick-circle ms-1"></i>
																</span>
															</td>
															<td class="action-item">
																<a href="javascript:void(0);" data-bs-toggle="dropdown">
																	<i class="isax isax-more"></i>
																</a>
																<ul class="dropdown-menu">
																	<li>
																		<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#edit_modal"><i class="isax isax-edit me-2"></i>Edit</a>
																	</li>
																	<li>
																		<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
																	</li>
																</ul>
															</td>
														</tr>
														<tr>
															<td>
																<p class="text-dark">Premium</p>
															</td>
															<td>$199</td>
															<td>22 Jan 2025</td>
															<td>22 Feb 2025</td>
															<td>
																<span class="badge badge-soft-success d-inline-flex align-items-center">Completed
																	<i class="isax isax-tick-circle ms-1"></i>
																</span>
															</td>
															<td class="action-item">
																<a href="javascript:void(0);" data-bs-toggle="dropdown">
																	<i class="isax isax-more"></i>
																</a>
																<ul class="dropdown-menu">
																	<li>
																		<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#edit_modal"><i class="isax isax-edit me-2"></i>Edit</a>
																	</li>
																	<li>
																		<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
																	</li>
																</ul>
															</td>
														</tr>
														<tr>
															<td>
																<p class="text-dark">Enterprise</p>
															</td>
															<td>$299</td>
															<td>22 Dec 2025</td>
															<td>22 Jan 2025</td>
															<td>
																<span class="badge badge-soft-success d-inline-flex align-items-center">Completed
																	<i class="isax isax-tick-circle ms-1"></i>
																</span>
															</td>
															<td class="action-item">
																<a href="javascript:void(0);" data-bs-toggle="dropdown">
																	<i class="isax isax-more"></i>
																</a>
																<ul class="dropdown-menu">
																	<li>
																		<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#edit_modal"><i class="isax isax-edit me-2"></i>Edit</a>
																	</li>
																	<li>
																		<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
																	</li>
																</ul>
															</td>
														</tr>
														<tr>
															<td>
																<p class="text-dark">Premium</p>
															</td>
															<td>$199</td>
															<td>22 Nov 2025</td>
															<td>22 Dec 2025</td>
															<td>
																<span class="badge badge-soft-success d-inline-flex align-items-center">Completed
																	<i class="isax isax-tick-circle ms-1"></i>
																</span>
															</td>
															<td class="action-item">
																<a href="javascript:void(0);" data-bs-toggle="dropdown">
																	<i class="isax isax-more"></i>
																</a>
																<ul class="dropdown-menu">
																	<li>
																		<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#edit_modal"><i class="isax isax-edit me-2"></i>Edit</a>
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
											<!-- /Table List End -->
										</div>
									</div>
									<div class="d-flex align-items-center justify-content-between">
										<button type="button" class="btn btn-outline-white">Cancel</button>
										<button type="submit" class="btn btn-primary">Save Changes</button>
									</div>
								</form>
							</div>
						</div> <!-- end col -->
					</div>
					<!-- end row -->
				</div> <!-- end col -->
			</div>
			<!-- end row -->

		</div>
		<!-- End Content -->

		<!-- Start Footer-->
		<div class="footer d-sm-flex align-items-center justify-content-between bg-white py-2 px-4 border-top">
			<p class="text-dark mb-0">&copy; 2025 <a href="javascript:void(0);" class="link-primary">Kanakku</a>, All Rights Reserved</p>
			<p class="text-dark">Version : 1.3.8</p>
		</div>
		<!-- End Footer-->

	</div>

	<!-- ========================
		End Page Content
	========================= -->
@endsection