<?php $page = 'plans-billings'; ?>
@extends('layout.mainlayout')
@section('content')
  <!-- ========================
			Start Page Content
		========================= -->

		<div class="page-wrapper">	

			<!-- Start Conatiner  -->
			<div class="content">

				<!-- start row -->
				<div class="row justify-content-center">

					<div class="col-xl-12">

						<!-- start row -->
						<div class=" row settings-wrapper d-flex">

							@component('components.settings-sidebar')
                            @endcomponent
							<div class="col-xl-9 col-lg-8">
								<div class="mb-3">
                                    <div class="pb-3 border-bottom mb-3">
                                        <h6 class="mb-0">Plans & Billings</h6>
                                    </div>
									<div class="d-flex align-items-center mb-3">
										<span class="bg-dark avatar avatar-sm me-2 flex-shrink-0"><i class="isax isax-info-circle fs-14"></i></span>
										<h6 class="fs-16 fw-semibold mb-0">Current Plan Information</h6>
									</div>
									<form action="{{url('account-settings')}}">
										<div class="mb-3 border-bottom">
											<div class="card shadow-none bg-light">
												<div class="card-body">
													<div class="mb-0">		
														<div class="d-flex align-items-center justify-content-between">
															<div class="">
																<h6 class="fw-bold mb-2 fs-14">Basic Plan</h6>
																<div class="progress-container">
																	<svg class="progress-circle me-2" viewBox="0 0 36 36">
																		<circle class="progress-bar" cx="18" cy="18" r="16"></circle>
																		<circle class="progress-bar-fill" cx="18" cy="18" r="16"></circle>
																	</svg>		
																	<span class="fs-14">20 Days Left</span>													
																</div>															
															</div>	
															<div>														
																<button type="button" class="btn btn-primary btn-md d-inline-flex align-items-center" data-bs-toggle="modal" data-bs-target="#upgrade"> <i class="isax isax-crown me-1"></i>Upgrade</button>
															</div>		
														</div>																							
													</div>
													
												</div><!-- end card body -->
											</div><!-- end card -->
										</div>
										<div class="mb-0">
											<div class="d-flex align-items-center mb-3">
												<span class="bg-dark avatar avatar-sm me-2 flex-shrink-0"><i class="isax isax-card fs-14"></i></span>
												<h6 class="fs-16 fw-semibold mb-0">Saved Cards</h6>
											</div>

											<!-- start row -->
											<div class="row">
												<div class="col-xl-6">
													<div class="card shadow-none">
														<div class="card-body">
															<div class="d-flex align-items-center mb-3">
																<a href="javascript:void(0);">
																	<img src="{{URL::asset('build/img/settings/payment-icon-01.svg')}}" class="img-fluid me-2" alt="clock">
																</a>
																<div>
																	<p class="mb-1">James Peterson</p>
																	<h6 class="fs-14 fw-medium mb-1">Visa •••• 1568</h6>
																</div>
															</div>
															<div class="d-flex align-items-center justify-content-between">
																<a href="javascript:void(0);" class="badge badge-success bg-success">Default</a>
																<div class="d-flex align-items-center">
																	<a href="javascript:void(0);" class="avatar text-dark avatar-md border rounded-circle me-2 bg-light"><i class="isax isax-edit text-gray"></i></a>
																	<a href="javascript:void(0);" class="avatar text-dark avatar-md border rounded-circle bg-light" data-bs-toggle="modal" data-bs-target="#delete_card"><i class="isax isax-trash text-gray"></i></a>
																</div>
															</div>
														</div><!-- end card body -->
													</div><!-- end card -->
												</div><!-- end col -->
												<div class="col-xl-6">
													<div class="card shadow-none">
														<div class="card-body">
															<div class="d-flex align-items-center mb-3">
																<a href="javascript:void(0);">
																	<img src="{{URL::asset('build/img/settings/payment-icon-02.svg')}}" class="img-fluid me-2" alt="clock">
																</a>
																<div>
																	<p class="mb-1">Raymond Rowley</p>
																	<h6 class="fs-14 fw-medium mb-1">Mastercard •••• 1279</h6>
																</div>
															</div>
															<div class="d-flex align-items-center justify-content-between">
																<a href="javascript:void(0);" class="text-primary text-decoration-underline">Set as Default</a>
																<div class="d-flex align-items-center">
																	<a href="javascript:void(0);" class="avatar text-dark avatar-md border rounded-circle me-2 bg-light"><i class="isax isax-edit text-gray"></i></a>
																	<a href="javascript:void(0);" class="avatar text-dark avatar-md border rounded-circle bg-light" data-bs-toggle="modal" data-bs-target="#delete_card"><i class="isax isax-trash text-gray"></i></a>
																</div>
															</div>
														</div><!-- end card body -->
													</div><!-- end card -->
												</div><!-- end col -->
											</div>
											<!-- end row -->

										</div>
										<div class="mb-3 border-top pt-4">
											<div class="d-flex align-items-center mb-3">
												<span class="bg-dark avatar avatar-sm me-2 flex-shrink-0"><i class="isax isax-transaction-minus fs-14"></i></span>
												<h6 class="fs-16 fw-semibold mb-0">Transactions</h6>
											</div>
											<div>
												<!-- Table Search -->
												<div class="mb-3">
													<div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
														<div class="d-flex align-items-center flex-wrap gap-2">
															<div class="input-icon-start position-relative me-2">
																<span class="input-icon-addon">
																	<i class="isax isax-search-normal"></i>
																</span>
																<input type="text" class="form-control form-control-sm bg-white" placeholder="Search">															
															</div>
														</div>
														<div class="d-flex align-items-center flex-wrap gap-2">
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
														</div>
													</div>			
													
												</div>
												<!-- /Table Search -->

												<!-- Table List -->
												<div class="table-responsive table-nowrap">
													<table class="table border mb-0">
														<thead class="table-light">
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
																<td><p class="text-dark">Basic</p></td>
																<td>$99</td>
																<td>22 Feb 2025</td>
																<td>22 Mar 2025</td>
																<td>
																	<span class="badge badge-soft-success d-inline-flex align-items-center">Completed
																		<i class="isax isax-tick-circle5 ms-1"></i>
																	</span>
																</td>
																<td class="action-item">
																	<a href="javascript:void(0);" data-bs-toggle="dropdown">
																		<i class="isax isax-more"></i>
																	</a>
																	<ul class="dropdown-menu">
																		<li>
																			<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-edit me-2"></i>Edit</a>
																		</li>
																		<li>
																			<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
																		</li>
																	</ul>
																</td>
															</tr>
															<tr>
																<td><p class="text-dark">Premium</p></td>
																<td>$199</td>
																<td>22 Jan 2025</td>
																<td>22 Feb 2025</td>
																<td>
																	<span class="badge badge-soft-success d-inline-flex align-items-center">Completed
																		<i class="isax isax-tick-circle5 ms-1"></i>
																	</span>
																</td>
																<td class="action-item">
																	<a href="javascript:void(0);" data-bs-toggle="dropdown">
																		<i class="isax isax-more"></i>
																	</a>
																	<ul class="dropdown-menu">
																		<li>
																			<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-edit me-2"></i>Edit</a>
																		</li>
																		<li>
																			<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
																		</li>
																	</ul>
																</td>
															</tr>
															<tr>
																<td><p class="text-dark">Enterprise</p></td>
																<td>$299</td>
																<td>22 Dec 2025</td>
																<td>22 Jan 2025</td>
																<td>
																	<span class="badge badge-soft-success d-inline-flex align-items-center">Completed
																		<i class="isax isax-tick-circle5 ms-1"></i>
																	</span>
																</td>
																<td class="action-item">
																	<a href="javascript:void(0);" data-bs-toggle="dropdown">
																		<i class="isax isax-more"></i>
																	</a>
																	<ul class="dropdown-menu">
																		<li>
																			<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-edit me-2"></i>Edit</a>
																		</li>
																		<li>
																			<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
																		</li>
																	</ul>
																</td>
															</tr>
															<tr>
																<td><p class="text-dark">Premium</p></td>
																<td>$199</td>
																<td>22 Nov 2025</td>
																<td>22 Dec 2025</td>
																<td>
																	<span class="badge badge-soft-success d-inline-flex align-items-center">Completed
																		<i class="isax isax-tick-circle5 ms-1"></i>
																	</span>
																</td>
																<td class="action-item">
																	<a href="javascript:void(0);" data-bs-toggle="dropdown">
																		<i class="isax isax-more"></i>
																	</a>
																	<ul class="dropdown-menu">
																		<li>
																			<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i class="isax isax-edit me-2"></i>Edit</a>
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
										</div>
									</form>
                                </div>
							</div><!-- end col -->
						</div>
						<!-- end row -->

					</div><!-- end col -->

				</div>
				<!-- end row -->

			</div>
			<!-- End Content -->

			@component('components.footer')
			@endcomponent
		</div>

		<!-- ========================
			End Page Content
		========================= --> 
@endsection