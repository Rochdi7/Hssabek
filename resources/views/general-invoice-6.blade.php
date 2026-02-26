<?php $page = 'general-invoice-6'; ?>
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
					<div class="border-bottom mb-3">
						<div class="row align-items-center">
							<div class="col-lg-4">
								<div class="mb-3">
									<h5 class="text-primary mb-3">Invoice</h5>
									<div class="p-4 invoice-design-6">
										<p class="fw-semibold text-dark mb-1">Dreams Technologies Pvt Ltd</p>
										<p class="text-dark">Address : 15 Hodges Mews, <br> High Wycombe HP12 3JL, United Kingdom.</p>
									</div>
								</div>
							</div> <!-- end col -->
							<div class="col-lg-8">
								<div class="text-lg-end mb-2">
									<div class="mb-1"><img src="{{URL::asset('build/img/invoice-logo.svg')}}" alt=""></div>
									<p class="mb-1">Invoice No : <span class="text-dark">#005</span></p>
									<p class="mb-1">Invoice Date : <span class="text-dark">05/10/2024</span></p>
									<p class="mb-1">Due Date  : <span class="text-dark">05/12/2024</span></p>
								</div>
							</div> <!-- end col -->
						</div> <!-- end row -->
					</div>
					<div class="bg-light p-2 mb-3">
						<p>Customer Information</p>
					</div>
					<div class="row">
						<div class="col-lg-4">
							<div class="mb-3">
								<h6 class="fs-16 text-gray-5 mb-2">Customer Details :</h6>
								<div>
									<h6 class="mb-1">John Williams</h6>
									<p class="mb-0">GSTIN : ACWR000054321</p>
								</div>
							</div>
						</div> <!-- end col -->
						<div class="col-lg-4">
							<div class="mb-3">
								<h6 class="fs-16 text-gray-5 mb-2">Billing Address :</h6>
								<div>
									<p class="mb-0 text-dark">Walter Roberson</p>
									<p class="mb-0 text-dark">299 Star Trek Drive, Panama City, Florida, 32405, USA.</p>
									<p class="mb-0 text-dark">walter@gmail.com</p>
									<p class="mb-0 text-dark">+45 5421 4523</p>
								</div>
							</div>
						</div> <!-- end col -->
						<div class="col-lg-4">
							<div class="mb-3">
								<h6 class="fs-16 text-gray-5 mb-2">Shipping Address :</h6>
								<div>
									<p class="mb-0 text-dark">Walter Roberson</p>
									<p class="mb-0 text-dark">299 Star Trek Drive, Panama City, Florida, 32405, USA.</p>
									<p class="mb-0 text-dark">walter@gmail.com</p>
									<p class="mb-0 text-dark">+45 5421 4523</p>
								</div>
							</div>
						</div> <!-- end col -->
					</div> <!-- end row -->
					<div class="mb-3">
						<h6 class="fs-16 text-gray-5 mb-3">Payment Status</h6>
						<span class="text-success fs-18 fw-semibold">PAID</span>
					</div>
					<div class="table-responsive mb-3">
						<table class="table">
							<thead class="thead-light">
								<tr>
									<th>#</th>
									<th>Tax Value</th>
									<th>Qty</th>
									<th>Tax Value</th>
									<th>Discount</th>
									<th class="text-end">Total</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td class="text-dark">1</td>
									<td>Accounting Software Maintainence</td>
									<td class="text-dark">1</td>
									<td>
										<div>
											<span class="d-block mb-1">$500</span>
											<p class="text-primary">after disc. $450.00</p>
										</div>
									</td>
									<td class="text-dark">10%</td>
									<td class="text-dark text-end">$350</td>
								</tr>
								<tr>
									<td class="text-dark">2</td>
									<td>Man Power Support</td>
									<td class="text-dark">1</td>
									<td>
										<div>
											<span class="d-block">$100</span>
										</div>
									</td>
									<td class="text-dark">10%</td>
									<td class="text-dark text-end">$600</td>
								</tr>
								<tr>
									<td class="text-dark">3</td>
									<td>Transportation Fee</td>
									<td class="text-dark">2</td>
									<td>
										<div>
											<span class="d-block mb-1">$500</span>
											<p class="text-primary">after disc. $450.00</p>
										</div>
									</td>
									<td class="text-dark">10%</td>
									<td class="text-dark text-end">$400</td>
								</tr>
								<tr>
									<td class="text-dark">4</td>
									<td>Spars Replacement Charges</td>
									<td class="text-dark">3</td>
									<td>
										<div>
											<span class="d-block">$100</span>
										</div>
									</td>
									<td class="text-dark">10%</td>
									<td class="text-dark text-end">$300</td>
								</tr>
								<tr>
									<td class="text-dark">5</td>
									<td>Materials Handling</td>
									<td class="text-dark">3</td>
									<td>
										<div>
											<span class="d-block mb-1">$500</span>
											<p class="text-primary">after disc. $450.00</p>
										</div>
									</td>
									<td class="text-dark">10%</td>
									<td class="text-dark text-end">$300</td>
								</tr>
								<tr>
									<td colspan="4">
										
									</td>
									<td class="text-dark">
										<div>
											<h6 class="fs-14 fw-medium mb-2 pb-2">Taxable Amount</h6>
											<h6 class="fs-14 fw-medium mb-2 pb-2">IGST 18.0%</h6>
											<h6 class="fs-14 fw-medium mb-2 pb-2">Extra Discount Promo (5%)</h6>
											<h6 class="fs-14 fw-medium mb-0">Round Off</h6>
										</div>
									</td>
									<td class="text-dark text-end fw-medium">
										<div>
											<h6 class="fs-14 fw-medium mb-2 pb-2">$1650.00</h6>
											<h6 class="fs-14 fw-medium mb-2 pb-2">$165.00</h6>
											<h6 class="fs-14 fw-medium mb-2 pb-2">$165.00</h6>
											<h6 class="fs-14 fw-medium mb-0">$165.00</h6>
										</div>
									</td>
								</tr>
								<tr>
									<td colspan="4" class="text-dark"></td>
									<td class="text-dark fw-medium"><h6>Total</h6></td>
									<td class="text-dark text-end fw-medium"><h6>$1,815.00</h6></td>
								</tr>
								<tr>
									<td colspan="6" class="text-end">Total amount ( in words):   One Thousand Eight Hundred Fifteen Dollars Only.</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="d-flex align-items-center justify-content-between flex-wrap border-bottom">
						<div class="d-flex align-items-start mb-3">
							<div class="me-4">
								<span class="d-block mb-2"><img src="{{URL::asset('build/img/icons/qr.png')}}" alt=""></span>
								<p class="text-dark">Scan to View Receipt</p>
							</div>
							<div>
								<h6 class="mb-2">Payment Info :</h6>
								<div>
									<p class="mb-1">Debit Card : <span class="text-dark">465 *************645</span></p>
									<p class="mb-1">Amount : <span class="text-dark">$1,815</span></p>
								</div>
							</div>
						</div>
						<div class="mb-3">
							<p class="mb-2">Terms & Conditions : </p>
							<p class="mb-1 text-dark">1. Goods Once sold cannot be taken back or exchanged.</p>
							<p class="text-dark">2. We are not the manufactures, company will stand for warrenty as per their terms and conditions.</p>
						</div>
					</div>
					<div class="border-bottom py-3 bg-light text-center">
						<p>Thanks for your Business</p>
					</div>
				</div>
			</div> <!-- end col -->
		</div>
		<!-- end row -->

	</div>

	<!-- ========================
		End Page Content
	========================= -->
@endsection