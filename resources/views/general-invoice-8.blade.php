
<?php $page = 'general-invoice-8'; ?>
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
					<div class="d-flex align-items-center justify-content-between rounded flex-wrap row-gap-3 mb-2">
						<h5 class="text-primary">Invoice</h5>
						<div>
							<div class="mb-1"><img src="{{URL::asset('build/img/invoice-logo.svg')}}" alt=""></div>
						</div>							
					</div>
					<div class="mb-3">
						<div class="row">
							<div class="mb-2">
								<h6 class="fs-16 mb-1">Dreamstechnologies</h6>
								<p class="mb-1">GST IN : <span class="text-dark">22AABCU9603R1ZX</span></p>
								<p class="mb-1">Address : <span class="text-dark">15 Hodges Mews, High Wycombe HP12 3JL, United Kingdom.</span></p>
								<p class="mb-1">Mobile  : <span class="text-dark">+91 98765 43210</span></p>
							</div>
						</div> <!-- end row -->
					</div>
					<div class="card rounded-0 shadow-none mb-3 border-bottom">
						<div class="card-body p-0">
							<div class="row gx-0">
								<div class="col-lg-7 d-flex">
									<div class="p-3 border-end flex-fill">
											<div class="mb-3">
											<h6 class="fs-16 text-gray-5 mb-2">Billing Address :</h6>
											<div>
												<p class="mb-0 text-dark">Walter Roberson</p>
												<p class="mb-0 text-dark">299 Star Trek Drive, Panama City, Florida, 32405, USA.</p>
												<p class="mb-0 text-dark">walter@gmail.com</p>
												<p class="mb-0 text-dark">+45 5421 4523</p>
											</div>
										</div>
										<div class="mb-3">
											<h6 class="fs-16 text-gray-5 mb-2">Shipping Address :</h6>
											<div>
												<p class="mb-0 text-dark">Walter Roberson</p>
												<p class="mb-0 text-dark">299 Star Trek Drive, Panama City, Florida, 32405, USA.</p>
												<p class="mb-0 text-dark">walter@gmail.com</p>
												<p class="mb-0 text-dark">+45 5421 4523</p>
											</div>
										</div>
									</div>
								</div> <!-- end col -->
								<div class="col-lg-5 d-flex">
									<div class="row flex-fill gx-0 align-items-center">
										<div class="col-md-6">
											<div class="border-end border-bottom text-center p-3">
												<span class="d-block mb-1">Invoice No:</span>
												<p class="fw-semibold text-primary">#10077005</p>
											</div>
										</div> <!-- end col -->
										<div class="col-md-6">
											<div class="border-bottom text-center p-3">
												<span class="d-block mb-1">Invoice Date:</span>
												<p class="fw-semibold text-primary">07/12/2023</p>
											</div>
										</div> <!-- end col -->
										<div class="col-md-6">
											<div class="border-end p-3">
												<div class="text-center">
													<span class="d-block mb-1">Payment Status :</span>
													<p class="fw-semibold text-primary">NOT PAID</p>
												</div>
											</div>
										</div> <!-- end col -->
										<div class="col-md-6">
											<div class="p-3">
												<div class="text-center">
													<span class="d-block mb-1">Due Date:</span>
													<p class="fw-semibold text-primary">07/31/2023</p>
												</div>
											</div>
										</div> <!-- end col -->
									</div> <!-- end row -->
								</div> <!-- end col -->
							</div> <!-- end row -->
						</div> <!-- end card-body -->
					</div> <!-- end card -->
					<div class="table-responsive">
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
							</tbody>
						</table>
					</div>
					<div class="py-3 border-top-0 border-bottom mb-3 d-flex align-items-center justify-content-between">
						<p class="text-dark">Total amount ( in words): <br>  One Thousand Eight Hundred Fifteen Dollars Only.</p>
						<div class="d-flex align-items-center">
							<span class="border-end-0"></span>
							<span class="text-dark fw-medium border-end-0 border-start-0 text-center me-2"><h6>Amount Payable</h6></span>
							<span class="text-dark text-end fw-medium border-start-0"><h6>$1,815.00</h6></span>
						</div>
					</div>
					<div class="d-flex align-items-center justify-content-between flex-wrap border-bottom mb-3">
						<div class="mb-3">								
							<div class="d-flex align-items-center">
								<div class="me-3">
									<h6 class="mb-2">Bank Details</h6>
									<p class="mb-1">Bank Name :  <span class="text-dark">YES Bank</span></p>
									<p class="mb-1">Account # :  <span class="text-dark">6677889944551</span></p>
									<p class="mb-1">IFSC :  <span class="text-dark">YESBBIN4567</span></p>
									<p class="mb-0">BRANCH :  <span class="text-dark">RS Puram</span></p>
								</div>
								<div class="me-4">
									<span class="d-block mb-2"><img src="{{URL::asset('build/img/icons/qr.png')}}" alt=""></span>
									<p class="text-dark">Scan to View Receipt</p>
								</div>
							</div>
						</div>
						<div class="text-center mb-3">
							<p class="mb-1">For Dreamstechnologies</p>
							<span><img src="{{URL::asset('build/img/icons/sign-01.png')}}" alt=""></span>
						</div>
					</div>
					<div class="border-bottom mb-3">
						<p class="bg-primary-subtle p-2 text-dark fs-13 mb-3">NOTES: All accounts are to be paid within 7 days from receipt of invoice. To be paid by cheque or credit card or direct payment online. If account is not paid within 7 days the credits details supplied as confirmation of work undertaken will be charged the agreed quoted fee noted above.</p>
					</div>
					<div class="border-bottom pb-3">
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