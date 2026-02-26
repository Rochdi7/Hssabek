<?php $page = 'invoice-templates'; ?>
@extends('layout.mainlayout')
@section('content')
   
 <!-- ========================
			Start Page Content
		========================= -->

		<div class="page-wrapper">	
			<div class="content">
				<div class="mb-3">
					<div class="pb-3 border-bottom mb-3">
						<h6 class="mb-0">Invoice Templates</h6>
					</div>
					<form action="{{url('invoice-settings')}}">
						<ul class="nav nav-tabs nav-bordered mb-3">
							<li class="nav-item">
								<a
									id="invoice-tab" 
									data-bs-toggle="tab" 
									data-bs-target="#invoice_tab" 
									type="button" role="tab" 
									aria-controls="invoice_tab" 
									aria-selected="true" 
									href="javascript:void(0);" 
									class="nav-link active">Invoice
								</a>
							</li>
							<li class="nav-item">
								<a  id="purchases-tab"  data-bs-toggle="tab" data-bs-target="#purchases_tab" type="button" role="tab" aria-controls="purchases_tab" aria-selected="true" class="nav-link" href="javascript:void(0);">
								Purchases
								</a>
							</li>
							<li class="nav-item">
								<a id="receipt-tab" data-bs-toggle="tab" data-bs-target="#receipt_tab" type="button" role="tab" aria-controls="receipt_tab" aria-selected="true" class="nav-link" href="javascript:void(0);">
								Receipt
								</a>
							</li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane active" id="invoice_tab" role="tabpanel" aria-labelledby="invoice-tab" tabindex="0">
								<div class="row gx-3">
									<div class="col-md-3">
										<div class="card invoice-template">
											<div class="card-body p-2">
												<div class="invoice-img">
													<a href="#">
														<img class="w-100" src="{{URL::asset('build/img/invoice/general-invoice-31.svg')}}" alt="invoice">
													</a>
													<a href="#" class="invoice-view-icon" data-bs-toggle="modal" data-bs-target="#invoice_view_1"><i class="isax isax-eye"></i></a>
												</div>
												<div class="d-flex justify-content-between align-items-center">
													<a href="{{url('general-invoice-1')}}">General Invoice 1</a>
													<a href="javascript:void(0);" class="invoice-star d-flex align-items-center justify-content-center">
														<i class="isax isax-star"></i>
													</a>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="card invoice-template">
											<div class="card-body p-2">
												<div class="invoice-img">
													<a href="#">
														<img class="w-100" src="{{URL::asset('build/img/invoice/general-invoice-32.svg')}}" alt="invoice">
													</a>
													<a href="#" class="invoice-view-icon" data-bs-toggle="modal" data-bs-target="#invoice_view_2"><i class="isax isax-eye"></i></a>
												</div>
												<div class="d-flex justify-content-between align-items-center">
													<a href="{{url('general-invoice-2')}}">General Invoice 2</a>
													<a href="javascript:void(0);" class="invoice-star d-flex align-items-center justify-content-center">
														<i class="isax isax-star"></i>
													</a>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="card invoice-template">
											<div class="card-body p-2">
												<div class="invoice-img">
													<a href="#">
														<img class="w-100" src="{{URL::asset('build/img/invoice/general-invoice-33.svg')}}" alt="invoice">
													</a>
													<a href="#" class="invoice-view-icon" data-bs-toggle="modal" data-bs-target="#invoice_view_3"><i class="isax isax-eye"></i></a>
												</div>
												<div class="d-flex justify-content-between align-items-center">
													<a href="{{url('general-invoice-3')}}">General Invoice 3</a>
													<a href="javascript:void(0);" class="invoice-star d-flex align-items-center justify-content-center">
														<i class="isax isax-star"></i>
													</a>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="card invoice-template">
											<div class="card-body p-2">
												<div class="invoice-img">
													<a href="#">
														<img class="w-100" src="{{URL::asset('build/img/invoice/general-invoice-34.svg')}}" alt="invoice">
													</a>
													<a href="#" class="invoice-view-icon" data-bs-toggle="modal" data-bs-target="#invoice_view_4"><i class="isax isax-eye"></i></a>
												</div>
												<div class="d-flex justify-content-between align-items-center">
													<a href="{{url('general-invoice-4')}}">General Invoice 4</a>
													<a href="javascript:void(0);" class="invoice-star d-flex align-items-center justify-content-center">
														<i class="isax isax-star"></i>
													</a>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="card invoice-template">
											<div class="card-body p-2">
												<div class="invoice-img">
													<a href="#">
														<img class="w-100" src="{{URL::asset('build/img/invoice/general-invoice-35.svg')}}" alt="invoice">
													</a>
													<a href="#" class="invoice-view-icon" data-bs-toggle="modal" data-bs-target="#invoice_view_5"><i class="isax isax-eye"></i></a>
												</div>
												<div class="d-flex justify-content-between align-items-center">
													<a href="{{url('general-invoice-5')}}">General Invoice 5</a>
													<a href="javascript:void(0);" class="invoice-star d-flex align-items-center justify-content-center">
														<i class="isax isax-star"></i>
													</a>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="card invoice-template">
											<div class="card-body p-2">
												<div class="invoice-img">
													<a href="#">
														<img class="w-100" src="{{URL::asset('build/img/invoice/general-invoice-36.svg')}}" alt="invoice">
													</a>
													<a href="#" class="invoice-view-icon" data-bs-toggle="modal" data-bs-target="#invoice_view_6"><i class="isax isax-eye"></i></a>
												</div>
												<div class="d-flex justify-content-between align-items-center">
													<a href="{{url('general-invoice-6')}}">General Invoice 6</a>
													<a href="javascript:void(0);" class="invoice-star d-flex align-items-center justify-content-center">
														<i class="isax isax-star"></i>
													</a>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="card invoice-template">
											<div class="card-body p-2">
												<div class="invoice-img">
													<a href="#">
														<img class="w-100" src="{{URL::asset('build/img/invoice/general-invoice-37.svg')}}" alt="invoice">
													</a>
													<a href="#" class="invoice-view-icon" data-bs-toggle="modal" data-bs-target="#invoice_view_7"><i class="isax isax-eye"></i></a>
												</div>
												<div class="d-flex justify-content-between align-items-center">
													<a href="{{url('general-invoice-7')}}">General Invoice 7</a>
													<a href="javascript:void(0);" class="invoice-star d-flex align-items-center justify-content-center">
														<i class="isax isax-star"></i>
													</a>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="card invoice-template">
											<div class="card-body p-2">
												<div class="invoice-img">
													<a href="#">
														<img class="w-100" src="{{URL::asset('build/img/invoice/general-invoice-38.svg')}}" alt="invoice">
													</a>
													<a href="#" class="invoice-view-icon" data-bs-toggle="modal" data-bs-target="#invoice_view_8"><i class="isax isax-eye"></i></a>
												</div>
												<div class="d-flex justify-content-between align-items-center">
													<a href="{{url('general-invoice-8')}}">General Invoice 8</a>
													<a href="javascript:void(0);" class="invoice-star d-flex align-items-center justify-content-center">
														<i class="isax isax-star"></i>
													</a>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="card invoice-template">
											<div class="card-body p-2">
												<div class="invoice-img">
													<a href="#">
														<img class="w-100" src="{{URL::asset('build/img/invoice/general-invoice-39.svg')}}" alt="invoice">
													</a>
													<a href="#" class="invoice-view-icon" data-bs-toggle="modal" data-bs-target="#invoice_view_9"><i class="isax isax-eye"></i></a>
												</div>
												<div class="d-flex justify-content-between align-items-center">
													<a href="{{url('general-invoice-9')}}">General Invoice 9</a>
													<a href="javascript:void(0);" class="invoice-star d-flex align-items-center justify-content-center">
														<i class="isax isax-star"></i>
													</a>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="card invoice-template">
											<div class="card-body p-2">
												<div class="invoice-img">
													<a href="#">
														<img class="w-100" src="{{URL::asset('build/img/invoice/general-invoice-40.svg')}}" alt="invoice">
													</a>
													<a href="#" class="invoice-view-icon" data-bs-toggle="modal" data-bs-target="#invoice_view_10"><i class="isax isax-eye"></i></a>
												</div>
												<div class="d-flex justify-content-between align-items-center">
													<a href="{{url('general-invoice-10')}}">General Invoice 10</a>
													<a href="javascript:void(0);" class="invoice-star d-flex align-items-center justify-content-center">
														<i class="isax isax-star"></i>
													</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="tab-pane" id="purchases_tab" role="tabpanel" aria-labelledby="purchases-tab" tabindex="0">
								<div class="row gx-3">
									<div class="col-md-3">
										<div class="card invoice-template">
											<div class="card-body p-2">
												<div class="invoice-img">
													<a href="#">
														<img class="w-100" src="{{URL::asset('build/img/invoice/general-invoice-41.svg')}}" alt="invoice">
													</a>
													<a href="#" class="invoice-view-icon" data-bs-toggle="modal" data-bs-target="#invoice_view11"><i class="isax isax-eye"></i></a>
												</div>
												<div class="d-flex justify-content-between align-items-center">
													<a href="{{url('bus-booking-invoice')}}">Bus Booking</a>
													<a href="javascript:void(0);" class="invoice-star d-flex align-items-center justify-content-center">
														<i class="isax isax-star"></i>
													</a>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="card invoice-template">
											<div class="card-body p-2">
												<div class="invoice-img">
													<a href="#">
														<img class="w-100" src="{{URL::asset('build/img/invoice/general-invoice-42.svg')}}" alt="invoice">
													</a>
													<a href="#" class="invoice-view-icon" data-bs-toggle="modal" data-bs-target="#invoice_view_12"><i class="isax isax-eye"></i></a>
												</div>
												<div class="d-flex justify-content-between align-items-center">
													<a href="{{url('car-booking-invoice')}}">Car Booking</a>
													<a href="javascript:void(0);" class="invoice-star d-flex align-items-center justify-content-center">
														<i class="isax isax-star"></i>
													</a>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="card invoice-template">
											<div class="card-body p-2">
												<div class="invoice-img">
													<a href="#">
														<img class="w-100" src="{{URL::asset('build/img/invoice/general-invoice-43.svg')}}" alt="invoice">
													</a>
													<a href="#" class="invoice-view-icon" data-bs-toggle="modal" data-bs-target="#invoice_view_13"><i class="isax isax-eye"></i></a>
												</div>
												<div class="d-flex justify-content-between align-items-center">
													<a href="{{url('coffee-shop-invoice')}}">Coffee Shop</a>
													<a href="javascript:void(0);" class="invoice-star d-flex align-items-center justify-content-center">
														<i class="isax isax-star"></i>
													</a>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="card invoice-template">
											<div class="card-body p-2">
												<div class="invoice-img">
													<a href="#">
														<img class="w-100" src="{{URL::asset('build/img/invoice/general-invoice-44.svg')}}" alt="invoice">
													</a>
													<a href="#" class="invoice-view-icon" data-bs-toggle="modal" data-bs-target="#invoice_view_14"><i class="isax isax-eye"></i></a>
												</div>
												<div class="d-flex justify-content-between align-items-center">
													<a href="{{url('domain-hosting-invoice')}}">Domain & Hosting</a>
													<a href="javascript:void(0);" class="invoice-star d-flex align-items-center justify-content-center">
														<i class="isax isax-star"></i>
													</a>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="card invoice-template">
											<div class="card-body p-2">
												<div class="invoice-img">
													<a href="#">
														<img class="w-100" src="{{URL::asset('build/img/invoice/general-invoice-45.svg')}}" alt="invoice">
													</a>
													<a href="#" class="invoice-view-icon" data-bs-toggle="modal" data-bs-target="#invoice_view_15"><i class="isax isax-eye"></i></a>
												</div>
												<div class="d-flex justify-content-between align-items-center">
													<a href="{{url('ecommerce-invoice')}}">Ecommerce</a>
													<a href="javascript:void(0);" class="invoice-star d-flex align-items-center justify-content-center">
														<i class="isax isax-star"></i>
													</a>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="card invoice-template">
											<div class="card-body p-2">
												<div class="invoice-img">
													<a href="#">
														<img class="w-100" src="{{URL::asset('build/img/invoice/general-invoice-46.svg')}}" alt="invoice">
													</a>
													<a href="#" class="invoice-view-icon" data-bs-toggle="modal" data-bs-target="#invoice_view_16"><i class="isax isax-eye"></i></a>
												</div>
												<div class="d-flex justify-content-between align-items-center">
													<a href="{{url('fitness-center-invoice')}}">Fitness</a>
													<a href="javascript:void(0);" class="invoice-star d-flex align-items-center justify-content-center">
														<i class="isax isax-star"></i>
													</a>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="card invoice-template">
											<div class="card-body p-2">
												<div class="invoice-img">
													<a href="#">
														<img class="w-100" src="{{URL::asset('build/img/invoice/general-invoice-47.svg')}}" alt="invoice">
													</a>
													<a href="#" class="invoice-view-icon" data-bs-toggle="modal" data-bs-target="#invoice_view_17"><i class="isax isax-eye"></i></a>
												</div>
												<div class="d-flex justify-content-between align-items-center">
													<a href="{{url('flight-booking-invoice')}}">Dream Flights</a>
													<a href="javascript:void(0);" class="invoice-star d-flex align-items-center justify-content-center">
														<i class="isax isax-star"></i>
													</a>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="card invoice-template">
											<div class="card-body p-2">
												<div class="invoice-img">
													<a href="#">
														<img class="w-100" src="{{URL::asset('build/img/invoice/general-invoice-48.svg')}}" alt="invoice">
													</a>
													<a href="#" class="invoice-view-icon" data-bs-toggle="modal" data-bs-target="#invoice_view_18"><i class="isax isax-eye"></i></a>
												</div>
												<div class="d-flex justify-content-between align-items-center">
													<a href="{{url('hotel-booking-invoice')}}">Hotel Booking</a>
													<a href="javascript:void(0);" class="invoice-star d-flex align-items-center justify-content-center">
														<i class="isax isax-star"></i>
													</a>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="card invoice-template">
											<div class="card-body p-2">
												<div class="invoice-img">
													<a href="#">
														<img class="w-100" src="{{URL::asset('build/img/invoice/general-invoice-49.svg')}}" alt="invoice">
													</a>
													<a href="#" class="invoice-view-icon" data-bs-toggle="modal" data-bs-target="#invoice_view_19"><i class="isax isax-eye"></i></a>
												</div>
												<div class="d-flex justify-content-between align-items-center">
													<a href="{{url('internet-billing-invoice')}}">Internet Billing</a>
													<a href="javascript:void(0);" class="invoice-star d-flex align-items-center justify-content-center">
														<i class="isax isax-star"></i>
													</a>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="card invoice-template">
											<div class="card-body p-2">
												<div class="invoice-img">
													<a href="#">
														<img class="w-100" src="{{URL::asset('build/img/invoice/general-invoice-50.svg')}}" alt="invoice">
													</a>
													<a href="#" class="invoice-view-icon" data-bs-toggle="modal" data-bs-target="#invoice_view_20"><i class="isax isax-eye"></i></a>
												</div>
												<div class="d-flex justify-content-between align-items-center">
													<a href="{{url('invoice-medical')}}">Medical</a>
													<a href="javascript:void(0);" class="invoice-star d-flex align-items-center justify-content-center">
														<i class="isax isax-star"></i>
													</a>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="card invoice-template">
											<div class="card-body p-2">
												<div class="invoice-img">
													<a href="#">
														<img class="w-100" src="{{URL::asset('build/img/invoice/general-invoice-51.svg')}}" alt="invoice">
													</a>
													<a href="#" class="invoice-view-icon" data-bs-toggle="modal" data-bs-target="#invoice_view_21"><i class="isax isax-eye"></i></a>
												</div>
												<div class="d-flex justify-content-between align-items-center">
													<a href="{{url('money-exchange-invoice')}}">Money Exchange</a>
													<a href="javascript:void(0);" class="invoice-star d-flex align-items-center justify-content-center">
														<i class="isax isax-star"></i>
													</a>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="card invoice-template">
											<div class="card-body p-2">
												<div class="invoice-img">
													<a href="#">
														<img class="w-100" src="{{URL::asset('build/img/invoice/general-invoice-52.svg')}}" alt="invoice">
													</a>
													<a href="#" class="invoice-view-icon" data-bs-toggle="modal" data-bs-target="#invoice_view_22"><i class="isax isax-eye"></i></a>
												</div>
												<div class="d-flex justify-content-between align-items-center">
													<a href="{{url('movie-ticket-booking-invoice')}}">Movie Ticket</a>
													<a href="javascript:void(0);" class="invoice-star d-flex align-items-center justify-content-center">
														<i class="isax isax-star"></i>
													</a>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="card invoice-template">
											<div class="card-body p-2">
												<div class="invoice-img">
													<a href="#">
														<img class="w-100" src="{{URL::asset('build/img/invoice/general-invoice-53.svg')}}" alt="invoice">
													</a>
													<a href="#" class="invoice-view-icon" data-bs-toggle="modal" data-bs-target="#invoice_view_23"><i class="isax isax-eye"></i></a>
												</div>
												<div class="d-flex justify-content-between align-items-center">
													<a href="{{url('restaurants-invoice')}}">Restaurant</a>
													<a href="javascript:void(0);" class="invoice-star d-flex align-items-center justify-content-center">
														<i class="isax isax-star"></i>
													</a>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="card invoice-template">
											<div class="card-body p-2">
												<div class="invoice-img">
													<a href="#">
														<img class="w-100" src="{{URL::asset('build/img/invoice/general-invoice-54.svg')}}" alt="invoice">
													</a>
													<a href="#" class="invoice-view-icon" data-bs-toggle="modal" data-bs-target="#invoice_view_24"><i class="isax isax-eye"></i></a>
												</div>
												<div class="d-flex justify-content-between align-items-center">
													<a href="{{url('student-billing-invoice')}}">Student Billing</a>
													<a href="javascript:void(0);" class="invoice-star d-flex align-items-center justify-content-center">
														<i class="isax isax-star"></i>
													</a>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="card invoice-template">
											<div class="card-body p-2">
												<div class="invoice-img">
													<a href="#">
														<img class="w-100" src="{{URL::asset('build/img/invoice/general-invoice-55.svg')}}" alt="invoice">
													</a>
													<a href="#" class="invoice-view-icon" data-bs-toggle="modal" data-bs-target="#invoice_view_25"><i class="isax isax-eye"></i></a>
												</div>
												<div class="d-flex justify-content-between align-items-center">
													<a href="{{url('train-ticket-invoice')}}">Train Ticket</a>
													<a href="javascript:void(0);" class="invoice-star d-flex align-items-center justify-content-center">
														<i class="isax isax-star"></i>
													</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="tab-pane" id="receipt_tab" role="tabpanel" aria-labelledby="receipt-tab" tabindex="0">
								<div class="row gx-3">
									<div class="col-md-3">
										<div class="card invoice-template">
											<div class="card-body p-2">
												<div class="invoice-img">
													<a href="#">
														<img class="w-100" src="{{URL::asset('build/img/invoice/general-invoice-56.svg')}}" alt="invoice">
													</a>
													<a href="#" class="invoice-view-icon" data-bs-toggle="modal" data-bs-target="#invoice_view_26"><i class="isax isax-eye"></i></a>
												</div>
												<div class="d-flex justify-content-between align-items-center">
													<a href="{{url('receipt-invoice-1')}}">Receipt Invoice 1</a>
													<a href="javascript:void(0);" class="invoice-star d-flex align-items-center justify-content-center">
														<i class="isax isax-star"></i>
													</a>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="card invoice-template">
											<div class="card-body p-2">
												<div class="invoice-img">
													<a href="#">
														<img class="w-100" src="{{URL::asset('build/img/invoice/general-invoice-57.svg')}}" alt="invoice">
													</a>
													<a href="#" class="invoice-view-icon" data-bs-toggle="modal" data-bs-target="#invoice_view_27"><i class="isax isax-eye"></i></a>
												</div>
												<div class="d-flex justify-content-between align-items-center">
													<a href="{{url('receipt-invoice-2')}}">Receipt Invoice 2</a>
													<a href="javascript:void(0);" class="invoice-star d-flex align-items-center justify-content-center">
														<i class="isax isax-star"></i>
													</a>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="card invoice-template">
											<div class="card-body p-2">
												<div class="invoice-img">
													<a href="#">
														<img class="w-100" src="{{URL::asset('build/img/invoice/general-invoice-58.svg')}}" alt="invoice">
													</a>
													<a href="#" class="invoice-view-icon" data-bs-toggle="modal" data-bs-target="#invoice_view_28"><i class="isax isax-eye"></i></a>
												</div>
												<div class="d-flex justify-content-between align-items-center">
													<a href="{{url('receipt-invoice-3')}}">Receipt Invoice 3</a>
													<a href="javascript:void(0);" class="invoice-star d-flex align-items-center justify-content-center">
														<i class="isax isax-star"></i>
													</a>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="card invoice-template">
											<div class="card-body p-2">
												<div class="invoice-img">
													<a href="#">
														<img class="w-100" src="{{URL::asset('build/img/invoice/general-invoice-59.svg')}}" alt="invoice">
													</a>
													<a href="#" class="invoice-view-icon" data-bs-toggle="modal" data-bs-target="#invoice_view_29"><i class="isax isax-eye"></i></a>
												</div>
												<div class="d-flex justify-content-between align-items-center">
													<a href="{{url('receipt-invoice-4')}}">Receipt Invoice 4</a>
													<a href="javascript:void(0);" class="invoice-star d-flex align-items-center justify-content-center">
														<i class="isax isax-star"></i>
													</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
			
            @component('components.footer')
            @endcomponent

		</div>

		<!-- ========================
			End Page Content
		========================= -->
@endsection