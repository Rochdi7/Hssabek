<?php $page = 'payment-methods'; ?>
@extends('layout.mainlayout')
@section('content')
 <!-- ========================
			Start Page Content
		========================= -->

		<div class="page-wrapper">	

			<!-- Start conatiner -->
			<div class="content">

				<!-- start row -->
				<div class="row justify-content-center">
					<div class="col-xl-12">
						<!-- start row -->
						<div class=" row settings-wrapper d-flex">
							@component('components.settings-sidebar')
                            @endcomponent
							<!-- end settings sidebar -->

							<div class="col-xl-9 col-lg-8">
								<div class="mb-0">
									<div class="pb-3 border-bottom mb-3">
										<h6 class="mb-0">Payments Method</h6>
									</div>
									<form action="{{url('sass-settings')}}">
										<div class="card-body">
											<!-- start row -->
											<div class="row align-items-center saas-settings">
												<div class="col-md-6">
													<div class="card shadow-none">
														<div class="card-body">
																<div class="d-flex align-items-center justify-content-between mb-2">
																	<span><img src="{{URL::asset('build/img/icons/paypal-name.svg')}}" alt="image"></span>
																	<span class="badge badge-soft-success d-inline-flex align-items-center ms-2"><span class="badge-dot bg-success me-1"></span>Connected</span>
																</div>
															<p class="text-truncate line-clamb-2">PayPal is the faster, safer way to send and receive money </p>
														</div> <!-- end card body -->
														<div class="card-footer bg-light d-flex align-items-center justify-content-between ">
															<div class="d-flex align-items-center">
																<a class="btn btn-sm btn-dark rounded-2 d-inline-flex align-items-center justify-content-center p-1 me-2" href="#" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash"></i></a>
																<a class="btn btn-sm btn-dark rounded-2 d-inline-flex align-items-center justify-content-center p-1" href="#" data-bs-toggle="modal" data-bs-target="#add_paypall"><i class="isax isax-setting-2"></i></a>
															</div>
															<div class="form-check form-switch">
																<input class="form-check-input m-0" type="checkbox" checked="">
															</div>
														</div> <!-- end card footer -->
													</div> <!-- end card -->
												</div> <!-- end col -->

												<div class="col-md-6">
													<div class="card shadow-none">
														<div class="card-body">
																<div class="d-flex align-items-center justify-content-between mb-2">
																	<span><img src="{{URL::asset('build/img/icons/stripe-icon.svg')}}" alt="image"></span>
																	<span class="badge badge-soft-success d-inline-flex align-items-center ms-2"><span class="badge-dot bg-success me-1"></span>Connected</span>
																</div>
															<p class="text-truncate line-clamb-2">APIs to accept cards, manage subscriptions, send money. </p>
														</div> <!-- end card body -->
														<div class="card-footer bg-light d-flex align-items-center justify-content-between ">
															<div class="d-flex align-items-center">
																<a class="btn btn-sm btn-dark rounded-2 d-inline-flex align-items-center justify-content-center p-1 me-2" href="#" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash"></i></a>
																<a class="btn btn-sm btn-dark rounded-2 d-inline-flex align-items-center justify-content-center p-1" href="#" data-bs-toggle="modal" data-bs-target="#add_strip"><i class="isax isax-setting-2"></i></a>
															</div>
															<div class="form-check form-switch">
																<input class="form-check-input m-0" type="checkbox" checked="">
															</div>
														</div> <!-- end card footer -->
													</div> <!-- end card -->
												</div> <!-- end col -->

												<div class="col-md-6">
													<div class="card shadow-none">
														<div class="card-body">
																<div class="d-flex align-items-center justify-content-between mb-2">
																	<span><img src="{{URL::asset('build/img/icons/razorpay-icon.svg')}}" alt="image"></span>
																	<span class="badge badge-soft-success d-inline-flex align-items-center ms-2"><span class="badge-dot bg-success me-1"></span>Connected</span>
																</div>
															<p class="text-truncate line-clamb-2">Razorpay is an India's all in one payment solution. </p>
														</div> <!-- end card body -->
														<div class="card-footer bg-light d-flex align-items-center justify-content-between ">
															<div class="d-flex align-items-center">
																<a class="btn btn-sm btn-dark rounded-2 d-inline-flex align-items-center justify-content-center p-1 me-2" href="#" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash"></i></a>
																<a class="btn btn-sm btn-dark rounded-2 d-inline-flex align-items-center justify-content-center p-1" href="#" data-bs-toggle="modal" data-bs-target="#add_razorpay"><i class="isax isax-setting-2"></i></a>
															</div>
															<div class="form-check form-switch">
																<input class="form-check-input m-0" type="checkbox" checked="">
															</div>
														</div> <!-- end card footer -->
													</div> <!-- end card -->
												</div> <!-- end col -->

												<div class="col-md-6">
													<div class="card shadow-none">
														<div class="card-body">
															<div class="d-flex align-items-center justify-content-between mb-2">
																<span><img src="{{URL::asset('build/img/icons/applepay-icon.svg')}}" alt="image"></span>
																<span class="badge badge-soft-primary d-inline-flex align-items-center ms-2"><span class="badge-dot bg-dark me-1"></span>Not Connected</span>
															</div>
															<p class="text-truncate line-clamb-2">PayPal is the faster, safer way to send and</br> receive money </p>
														</div> <!-- end col -->
														<div class="card-footer bg-light d-flex align-items-center justify-content-between ">
															<div class="d-flex align-items-center">
																<a class="btn btn-sm btn-dark rounded-2 d-inline-flex align-items-center justify-content-center p-1 me-2" href="#" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash"></i></a>
																<a class="btn btn-sm btn-dark rounded-2 d-inline-flex align-items-center justify-content-center p-1" href="#" data-bs-toggle="modal" data-bs-target="#add_applepay"><i class="isax isax-setting-2"></i></a>
															</div>
														</div>  <!-- end card footer -->
													</div> <!-- end card -->
												</div> <!-- end col -->
											</div>
											<!-- end row -->
										</div> <!-- end card body -->
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
			
			@component('components.footer')
            @endcomponent

		</div>
		<!-- ========================
			End Page Content
		========================= -->  
@endsection