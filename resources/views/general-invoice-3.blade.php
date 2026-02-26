<?php $page = 'general-invoice-3'; ?>
@extends('layout.mainlayout')
@section('content')
	<!-- ========================
		Start Page Content
	========================= -->

	<div class="content p-4">

		<!-- start row -->
		<div class="row">
			<div class="col-md-10 mx-auto">
				<div class="mb-3">
					<h6><a href="{{url('invoice-templates')}}"><i class="isax isax-arrow-left me-1"></i>Back</a></h6>
				</div>
				<div>
					<div class="card rounded-0 shadow-none mb-0 border-bottom-0">
						<div class="card-header py-2">
							<div class="d-flex align-items-center justify-content-between">
								<h5>TAX INVOICE</h5>
								<p>Original For Recipient</p>
							</div>
						</div> <!-- end card-header -->
						<div class="card-body p-0">
							<div class="row gx-0">
								<div class="col-lg-5 d-flex">
									<div class="p-3 border-end flex-fill">
										<div class="mb-3"><img src="{{URL::asset('build/img/invoice-logo.svg')}}" alt=""></div>
										<h6 class="fs-16 fw-semibold mb-2">Dreamstechnologies</h6>
										<div class="row align-items-center">
											<div class="col-md-6">
												<div class="mb-2">
													<span class="d-block mb-1">GST IN :</span>
													<p class="text-dark">22AABCU9603R1ZX</p>
												</div>
											</div> <!-- end col -->
											<div class="col-md-6">
												<div class="mb-2">
													<span class="d-block mb-1">Mobile :</span>
													<p class="text-dark">+91 98765 43210</p>
												</div>
											</div> <!-- end col -->
											<div class="col-md-12">
												<div>
													<span class="d-block mb-1">Address :</span>
													<p class="text-dark">15 Hodges Mews, High Wycombe HP12 3JL, United Kingdom.</p>
												</div>
											</div> <!-- end col -->
										</div> <!-- end row -->
									</div>
								</div> <!-- end col -->
								<div class="col-lg-7 d-flex">
									<div class="row flex-fill gx-0 align-items-center">
										<div class="col-md-6">
											<div class="border-end border-bottom p-3">
												<span class="d-block mb-1">Invoice No:</span>
												<p class="text-dark">INV 00001</p>
											</div>
										</div> <!-- end col -->
										<div class="col-md-6">
											<div class="border-bottom p-3">
												<span class="d-block mb-1">Invoice Date:</span>
												<p class="text-dark">05/12/2024</p>
											</div>
										</div> <!-- end col -->
										<div class="col-md-6">
											<div class="border-end p-3">
												<h6 class="fs-16 text-gray-5 mb-2">Invoice To :</h6>
												<div>
													<p class="mb-0 text-dark">Walter Roberson</p>
													<p class="mb-0 text-dark">299 Star Trek Drive, Panama City, <br> Florida, 32405, USA.</p>
													<p class="mb-0 text-dark">walter@gmail.com</p>
													<p class="mb-0 text-dark">+45 5421 4523</p>
												</div>
											</div>
										</div> <!-- end col -->
										<div class="col-md-6">
											<div class="p-3">
												<h6 class="fs-16 text-gray-5 mb-2">Pay To :</h6>
												<div>
													<p class="mb-0 text-dark">Lowell H. Dominguez</p>
													<p class="mb-0 text-dark">84 Spilman Street, London <br> United King</p>
													<p class="mb-0 text-dark">domlowell@gmail.com</p>
													<p class="mb-0 text-dark">+45 5421 2154</p>
												</div>
											</div>
										</div> <!-- end col -->
									</div> <!-- end row -->
								</div> <!-- end col -->
							</div> <!-- end row -->
						</div> <!-- end card-body -->
					</div> <!-- end card -->
					<div class="table-responsive">
						<table class="table table-nowrap table-bordered">
							<thead class="thead-light">
								<tr>
									<th>#</th>
									<th>Item</th>
									<th>Rate/Item</th>
									<th>Qty</th>
									<th>Tax Value</th>
									<th>Tax Amount</th>
									<th class="text-end">Total</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td class="text-dark">1</td>
									<td>
										<div>
											<p class="text-dark mb-0">Samsung Galaxy M32 Prime Edition...</p>
											<span class="d-block">( Light Blue, 4GB RAM, 64GB )</span>
										</div>
									</td>
									<td class="text-dark">15,677.15</td>
									<td>1</td>
									<td class="text-dark">15,677.15</td>
									<td>2,821.88(18%)</td>
									<td class="text-dark text-end">18,49.00</td>
								</tr>
								<tr>
									<td class="text-dark">2</td>
									<td>
										<div>
											<p class="text-dark mb-0">OPPO A74 5G...</p>
											<span class="d-block">( Fluid Black, 6GB RAM, 128GB Storage )</span>
										</div>
									</td>
									<td class="text-dark">2541.53</td>
									<td>2</td>
									<td class="text-dark">2541.53</td>
									<td>457.48(18%)</td>
									<td class="text-dark text-end">2,999.00</td>
								</tr>
								<tr>
									<td colspan="5" class="border-0 border-start text-dark">Total Items / Qty : 2 / 2.00</td>
									<td class="text-dark fw-medium border-0 text-center">Total</td>
									<td class="text-dark text-end fw-medium border-0 border-end">$21,498.00</td>
								</tr>
								<tr>
									<td colspan="5" class="border-end-0"></td>
									<td class="text-dark fw-medium border-end-0 border-start-0 text-center">IGST 18.5%</td>
									<td class="text-dark text-end fw-medium border-start-0">$21,498.00</td>
								</tr>
								<tr>
									<td colspan="4" class="border-end-0"></td>
									<td colspan="2" class="text-dark fw-medium border-end-0 border-start-0 text-center"><h6>Amount Payable</h6></td>
									<td class="text-dark text-end fw-medium border-start-0"><h6>$21,498.00</h6></td>
								</tr>
							</tbody>
						</table>  <!-- end table -->
					</div>
					<div class="p-3 border border-top-0 text-center">
						<p class="text-dark">Total amount ( in words):   One Thousand Eight Hundred Fifteen Dollars Only.</p>
					</div>
					<div class="d-flex justify-content-between align-items-center flex-wrap border border-top-0">
						<div class="p-3 flex-fill">
							<h6 class="mb-2">Bank Details</h6>
							<div class="d-flex align-items-center">
								<div class="me-2">
									<p class="mb-1">Bank Name :  <span class="text-dark">YES Bank</span></p>
									<p class="mb-0">Account # :  <span class="text-dark">6677889944551</span></p>
								</div>
								<div>
									<p class="mb-1">IFSC :  <span class="text-dark">YESBBIN4567</span></p>
									<p class="mb-0">BRANCH :  <span class="text-dark">RS Puram</span></p>
								</div>
							</div>
						</div>
						<div class="text-center border-start p-3">
							<p class="mb-1">For Dreamstechnologies</p>
							<span><img src="{{URL::asset('build/img/icons/sign-01.png')}}" alt=""></span>
						</div>
					</div>
					<div class="border border-top-0">
						<div class="row align-items-center">
							<div class="col-lg-3 col-md-6 d-flex">
								<div class="p-3 flex-fill">
									<span class="d-block mb-1">Notes:</span>
									<p class="text-dark">Thanks for your Business</p>
								</div>
							</div> <!-- end col -->
							<div class="col-lg-9 col-md-6 d-flex">
								<div class="p-3 ps-5 flex-fill border-start">
									<h6 class="mb-2">Terms & Conditions : </h6>
									<p class="mb-1">1. Goods Once sold cannot be taken back or exchanged.</p>
									<p>2. We are not the manufactures, company will stand for warrenty as per their terms and conditions.</p>
								</div>
							</div> <!-- end col -->
						</div> <!-- end row -->							
					</div>
				</div>
			</div> <!-- end col -->
		</div> 
		<!-- end row -->

	</div>

	<!-- ========================
		Start Page Content
	========================= -->
@endsection