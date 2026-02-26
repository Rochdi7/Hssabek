<?php $page = 'general-invoice-2'; ?>
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
					<div class="d-flex align-items-center justify-content-between border-bottom flex-wrap row-gap-3 mb-3 pb-3">
						<div>
							<div class="mb-1"><img src="{{URL::asset('build/img/invoice-logo.svg')}}" alt=""></div>
							<p>Original For Recipient</p>
						</div>
						<div>
							<h5 class="mb-1">TAX INVOICE</h5>
							<div class="d-flex align-items-center">
								<p class="mb-0 me-3">Date : <span class="text-dark"> 05/12/2024</span></p>
								<p>Invoice No : <span class="text-dark"> INV 00001</span></p>
							</div>
						</div>
					</div>
					<div class="border-bottom mb-3">
						<h6 class="mb-2 fs-16">Dreamstechnologies</h6>
						<div class="row">
							<div class="col-md-6">
								<div class="row">
									<div class="col-md-6">
										<div class="mb-3">
											<span class="d-block mb-1">GST IN :</span>
											<p class="text-dark">22AABCU9603R1ZX</p>
										</div>
									</div> <!-- end col -->
									<div class="col-md-6">
										<div class="mb-3">
											<span class="d-block mb-1">Mobile :</span>
											<p class="text-dark">+91 98765 43210</p>
										</div>
									</div> <!-- end col -->
								</div> <!-- end row -->
							</div> <!-- end col -->
							<div class="col-md-6">
								<div class="mb-3">
									<span class="d-block mb-1">Address :</span>
									<p class="text-dark">15 Hodges Mews, High Wycombe HP12 3JL, United Kingdom.</p>
								</div>
							</div> <!-- end col -->
						</div> <!-- end row -->
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="mb-3">
								<h6 class="fs-16 text-gray-5 mb-2">Invoice To :</h6>
								<div>
									<p class="mb-0 text-dark">Walter Roberson</p>
									<p class="mb-0 text-dark">299 Star Trek Drive, Panama City, Florida, 32405, USA.</p>
									<p class="mb-0 text-dark">walter@gmail.com</p>
									<p class="mb-0 text-dark">+45 5421 4523</p>
								</div>
							</div>
						</div>  <!-- end col -->
						<div class="col-md-6">
							<div class="mb-3">
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
					<div class="table-responsive border border-bottom-0 mb-3">
						<table class="table">
							<thead class="thead-light">
								<tr>
									<th>#</th>
									<th>Item</th>
									<th>Tax Value</th>
									<th>Qty</th>
									<th>Price</th>
									<th class="text-end">Total</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td class="text-dark">1</td>
									<td class="text-dark">Website Design</td>
									<td class="text-dark">Four plus web pages design and two rivision</td>
									<td class="text-dark">1</td>
									<td class="text-dark">$350</td>
									<td class="text-dark text-end">$350</td>
								</tr>
								<tr>
									<td class="text-dark">2</td>
									<td class="text-dark">Web Development</td>
									<td class="text-dark">Dynamic frontend design</td>
									<td class="text-dark">1</td>
									<td class="text-dark">$600</td>
									<td class="text-dark text-end">$600</td>
								</tr>
								<tr>
									<td class="text-dark">3</td>
									<td class="text-dark">App Development</td>
									<td class="text-dark">Android and Ios App design</td>
									<td class="text-dark">2</td>
									<td class="text-dark">$200</td>
									<td class="text-dark text-end">$400</td>
								</tr>
								<tr>
									<td class="text-dark">4</td>
									<td class="text-dark">Digital Marketing</td>
									<td class="text-dark">Facebook and instagram marketing</td>
									<td class="text-dark">3</td>
									<td class="text-dark">$100</td>
									<td class="text-dark text-end">$300</td>
								</tr>
								<tr>
									<td colspan="3">
										<div>
											<span>Important Note:  </span>
											<p>Delivery dates are not guaranteed and Seller has <br>
												no liability for damages that may be incurred <br>
												due to any delay.
											</p>
										</div>
									</td>
									<td colspan="2" class="text-dark">
										<div>
											<h6 class="fs-14 fw-medium mb-2">Taxable Amount</h6>
											<h6 class="fs-14 fw-medium mb-2">Discount 0%</h6>
											<h6 class="fs-14 fw-medium mb-0">IGST 18.0%</h6>
										</div>
									</td>
									<td class="text-dark text-end fw-medium">
										<div>
											<h6 class="fs-14 fw-medium mb-2">$1650.00</h6>
											<h6 class="fs-14 fw-medium mb-2">+ $0.00</h6>
											<h6 class="fs-14 fw-medium mb-0">$165.00</h6>
										</div>
									</td>
								</tr>
								<tr>
									<td colspan="3" class="text-dark bg-light">Total Items / Qty : 4 / 4.00</td>
									<td colspan="2" class="text-dark fw-medium bg-light"><h6>Total</h6></td>
									<td class="text-dark text-end fw-medium bg-light"><h6>$1,815.00</h6></td>
								</tr>
								<tr>
									<td colspan="6">Total amount ( in words): One Thousand Eight Hundred Fifteen Dollars Only.</td>
								</tr>
							</tbody>
						</table> <!-- end table -->
					</div>
					<div class="d-flex align-items-center justify-content-between flex-wrap border-bottom mb-3">
						<div class="mb-3">
							<h6 class="mb-2">Payment Info :</h6>
							<div>
								<p class="mb-1">Debit Card : <span class="text-dark">465 *************645</span></p>
								<p class="mb-1">Amount : <span class="text-dark">$1,815</span></p>
							</div>
						</div>
						<div class="text-center mb-3">
							<p class="mb-1">For Dreamstechnologies</p>
							<span><img src="{{URL::asset('build/img/icons/sign-01.png')}}" alt=""></span>
						</div>
					</div>
					<div class="border-bottom mb-3 pb-3">
						<h6 class="mb-2">Terms & Conditions : </h6>
						<p class="mb-1">1. Goods Once sold cannot be taken back or exchanged.</p>
						<p>2. We are not the manufactures, company will stand for warrenty as per their terms and conditions.</p>
					</div>
					<div class="border-bottom pb-3 text-center">
						<p>Thanks for your Business</p>
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