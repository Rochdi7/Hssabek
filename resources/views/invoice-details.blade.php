<?php $page = 'invoice-details'; ?>
@extends('layout.mainlayout')
@section('content')
	<!-- ========================
		Start Page Content
	========================= -->

	<div class="page-wrapper">

		<!-- Start Content -->
		<div class="content">

			<!-- start row -->
			<div class="row">
				<div class="col-md-10 mx-auto">
					<div>
						<div class="d-flex align-items-center justify-content-between flex-wrap row-gap-3 mb-3">
							<h6><a href="{{url('invoices')}}"><i class="isax isax-arrow-left me-2"></i>Invoice (Admin)</a></h6>
							<div class="d-flex align-items-center flex-wrap row-gap-3">
								<a href="#" class="btn btn-outline-white d-inline-flex align-items-center me-3"><i class="isax isax-document-like me-1"></i>Download PDF</a>
								<a href="#" class="btn btn-outline-white d-inline-flex align-items-center me-3"><i class="isax isax-message-notif me-1"></i>Send Email</a>
								<a href="#" class="btn btn-outline-white d-inline-flex align-items-center me-3"><i class="isax isax-printer me-1"></i>Print</a>
								<a href="#" class="btn btn-primary d-inline-flex align-items-center" data-bs-toggle="offcanvas" data-bs-target="#customcanvas">
									<i class="isax isax-eye me-1"></i>View Details
								</a>
							</div>
						</div>
						<div class="card">
							<div class="card-body">
								<div class="bg-light p-4 rounded position-relative mb-3">
									<div class="position-absolute top-0 end-0 z-0">
										<img src="{{URL::asset('build/img/bg/card-bg.png')}}" alt="img">
									</div>
									<div class="d-flex align-items-center justify-content-between border-bottom flex-wrap mb-3 pb-2 position-relative z-1">
										<div class="mb-3">
											<h4 class="mb-1">Invoice</h4>
											<div class="d-flex align-items-center flex-wrap row-gap-3">
												<div class="me-4">
													<h6 class="fs-14 fw-semibold mb-1">Dreams Technologies Pvt Ltd.,</h6>
													<p>15 Hodges Mews, High Wycombe HP12 3JL, United Kingdom</p>
												</div>
												<span><img src="{{URL::asset('build/img/icons/not-paid.png')}}" alt="img" width="48" height="48"></span>
											</div>
										</div>
										<div class="mb-3">
											<img src="{{URL::asset('build/img/invoice-logo.svg')}}" class="invoice-logo-dark" alt="img">
											<img src="{{URL::asset('build/img/invoice-logo-white-2.svg')}}" class="invoice-logo-white" alt="img">
										</div>
									</div>

									<!-- start row -->
									<div class="row gy-3 position-relative z-1">
										<div class="col-lg-4">
											<div>
												<h6 class="mb-2 fs-16 fw-semibold">Invoice Details</h6>
												<div>
													<p class="mb-1">Invoice Number : <span class="text-dark">INV215654</span></p>
													<p class="mb-1">Issued On : <span class="text-dark">25 Jan 2025</span></p>
													<p class="mb-1">Due Date :  <span class="text-dark">31 Jan 2025</span></p>
													<p class="mb-1">Recurring Invoice  :  <span class="text-dark">Monthly</span></p>
													<span class="badge bg-danger badge-sm">Due in 8 days</span>
												</div>
											</div>
										</div><!-- end col -->
										<div class="col-lg-4">
											<div>
												<h6 class="mb-2 fs-16 fw-semibold">Billing From</h6>
												<div>
													<h6 class="fs-14 fw-semibold mb-1">Kanakku Invoice Management</h6>
													<p class="mb-1">15 Hodges Mews, HP12 3JL, United Kingdom</p>
													<p class="mb-1">Phone : +1 54664 75945</p>
													<p class="mb-1">Email : info@example.com</p>
													<p class="mb-0">GST : 243E45767889</p>
												</div>
											</div>
										</div><!-- end col -->
										<div class="col-lg-4">
											<div>
												<h6 class="mb-2 fs-16 fw-semibold">Billing To</h6>
												<div class="bg-white rounded p-3">
													<div class="d-flex align-items-center mb-1">
														<img src="{{URL::asset('build/img/icons/billing-to-image.svg')}}" alt="img" class="avatar avatar-lg me-2">
														<div>
															<h6 class="fs-14 fw-semibold">Timesquare Tech</h6>
														</div>
													</div>
													<p class="mb-1">299 Star Trek Drive, Florida, 3240, USA</p>
													<p class="mb-1">Phone : +1 54664 75945</p>
													<p class="mb-1">Email : info@example.com</p>
													<p class="mb-0">GST : 243E45767889</p>
												</div>
											</div>
										</div><!-- end col -->
									</div>
									<!-- end row -->

								</div>
								<div class="mb-3">
									<h6 class="mb-3">Product / Service Items</h6>
									<div class="table-responsive rounded border-bottom-0 border table-nowrap">
										<table class="table m-0">
											<thead class="table-dark">
												<tr>
													<th>#</th>
													<th>Product/Service</th>
													<th>Quantity</th>
													<th>Unit</th>
													<th>Rate</th>
													<th>Discount</th>
													<th>Tax (%)</th>
													<th>Amount</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>1</td>
													<td class="text-dark">T-Shirt</td>
													<td>2</td>
													<td>Pcs</td>
													<td>$200.00</td>
													<td>10%</td>
													<td>$36.00</td>
													<td>$396.00</td>
												</tr>
												<tr>
													<td>2</td>
													<td class="text-dark">Office Chair</td>
													<td>1</td>
													<td>Pcs</td>
													<td>$350.00</td>
													<td>5%</td>
													<td>$33.25</td>
													<td>$365.75</td>
												</tr>
												<tr>
													<td>3</td>
													<td class="text-dark">LED Monitor</td>
													<td>1</td>
													<td>Pcs</td>
													<td>$399.00</td>
													<td>2%</td>
													<td>$39.10</td>
													<td>$398.90</td>
												</tr>
												<tr>
													<td>4</td>
													<td class="text-dark">Smartphone</td>
													<td>4</td>
													<td>Pcs</td>
													<td>$100.00</td>
													<td>10%</td>
													<td>$36.00</td>
													<td>$396.00</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
								<div class="border-bottom mb-3">

									<!-- start row -->
									<div class="row">
										<div class="col-lg-6">
											<div class="d-flex align-items-center p-4 mb-3">
												<div class="me-3">
													<p class="mb-2">Scan to the pay</p>
													<span><img src="{{URL::asset('build/img/icons/qr.png')}}" alt="QR"></span>
												</div>
												<div>
													<h6 class="mb-2">Bank Details</h6>
													<div>
														<p class="mb-1">Bank Name :  <span class="text-dark">ABC Bank</span></p>
														<p class="mb-1">Account Number :  <span class="text-dark">782459739212</span></p>
														<p class="mb-1">IFSC Code :  <span class="text-dark">ABC0001345</span></p>
														<p class="mb-0">Payment Reference :  <span class="text-dark">INV-20250220-001</span></p>
													</div>
												</div>
											</div>
										</div><!-- end col -->
										<div class="col-lg-6">
											<div class="mb-3 p-4">
												<div class="d-flex align-items-center justify-content-between mb-3">
													<h6 class="fs-14 fw-semibold">Amount</h6>
													<h6 class="fs-14 fw-semibold">$1,793.12</h6>
												</div>
												<div class="d-flex align-items-center justify-content-between mb-3">
													<h6 class="fs-14 fw-semibold">CGST (9%)</h6>
													<h6 class="fs-14 fw-semibold">$18</h6>
												</div>
												<div class="d-flex align-items-center justify-content-between mb-3">
													<h6 class="fs-14 fw-semibold">SGST (9%)</h6>
													<h6 class="fs-14 fw-semibold">$18</h6>
												</div>
												<div class="d-flex align-items-center justify-content-between border-bottom pb-3 mb-3">
													<h6 class="fs-14 fw-semibold">Discount</h6>
													<h6 class="fs-14 fw-semibold text-danger">$18</h6>
												</div>
												<div class="d-flex align-items-center justify-content-between border-bottom pb-3 mb-3">
													<h6>Total (USD)</h6>
													<h6>$1,972.43</h6>
												</div>
												<div>
													<h6 class="fs-14 fw-semibold mb-1">Total In Words</h6>
													<p>Five Hundred &amp; Ninety Six Dollars</p>
												</div>
											</div>
										</div><!-- end col -->
									</div>
									<!-- end row -->

								</div>

								<!-- start row -->
								<div class="row">
									<div class="col-lg-7">
										<div class="mb-3">
											<div class="mb-3">
												<h6 class="fs-14 fw-semibold mb-1">Terms and Conditions</h6>
												<p>The Payment must be returned in the same condition.</p>
											</div>
											<div>
												<h6 class="fs-14 fw-semibold mb-1">Notes</h6>
												<p>All charges are final and include applicable taxes, fees, and additional costs</p>
											</div>
										</div>
									</div><!-- end col -->
									<div class="col-lg-5">
										<div class="text-lg-end mb-3">
											<span><img src="{{URL::asset('build/img/icons/sign.png')}}" class="sign-dark" alt="img"></span>
											<h6 class="fs-14 fw-semibold mb-1">Ted M. Davis</h6>
											<p>Manager</p>
										</div>
									</div><!-- end col -->
								</div>
								<!-- end row -->

								<div class="bg-light d-flex align-items-center justify-content-between p-4 rounded card-bg">
									<div>
										<h6 class="fs-14 fw-semibold mb-1">Dreams Technologies Pvt Ltd.,</h6>
										<p>15 Hodges Mews, High Wycombe HP12 3JL, United Kingdom</p>
									</div>
									<div>
										<img src="{{URL::asset('build/img/invoice-logo.svg')}}" class="invoice-logo-dark" alt="img">
										<img src="{{URL::asset('build/img/invoice-logo-white-2.svg')}}" class="invoice-logo-white" alt="img">
									</div>
								</div>
							</div><!-- end card body -->
						</div><!-- end card -->
					</div>
				</div><!-- end col -->
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

	<!-- Start Filter -->
	<div class="offcanvas offcanvas-offset offcanvas-end" tabindex="-1" id="customcanvas">                                      
		<div class="offcanvas-header d-block pb-0">
			<div class="border-bottom d-flex align-items-center justify-content-between pb-3">
				<h6 class="offcanvas-title">Details</h6>
				<button type="button" class="btn-close btn-close-modal custom-btn-close" data-bs-dismiss="offcanvas" aria-label="Close"><i class="fa-solid fa-x"></i></button>
			</div>
		</div>			
		<div class="offcanvas-body pt-3">  
			<form action="#">
				<div class="mb-3">
					<label class="form-label">Status</label>
					<div class="dropdown">
						<a href="javascript:void(0);" class="dropdown-toggle btn btn-lg bg-light  d-flex align-items-center justify-content-start fs-13 fw-normal border" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="true">
							Select
						</a>
						<div class="dropdown-menu shadow-lg w-100 dropdown-info">	
							<ul class="mb-3">
								<li>
									<label class="dropdown-item px-2 d-flex align-items-center text-dark">
										<input class="form-check-input m-0 me-2" type="checkbox">
										<i class="fa-solid fa-circle fs-6 text-success me-1"></i>Paid
									</label>
								</li>
								<li>
									<label class="dropdown-item px-2 d-flex align-items-center text-dark">
										<input class="form-check-input m-0 me-2" type="checkbox">
										<i class="fa-solid fa-circle fs-6 text-warning me-1"></i>Unpaid
									</label>
								</li>
								<li>
									<label class="dropdown-item px-2 d-flex align-items-center text-dark">
										<input class="form-check-input m-0 me-2" type="checkbox">
										<i class="fa-solid fa-circle fs-6 text-danger me-1"></i>Cancelled
									</label>
								</li>
								<li>
									<label class="dropdown-item px-2 d-flex align-items-center text-dark">
										<input class="form-check-input m-0 me-2" type="checkbox">
										<i class="fa-solid fa-circle fs-6 text-purple me-1"></i>Partially Paid
									</label>
								</li>
								<li>
									<label class="dropdown-item px-2 d-flex align-items-center text-dark">
										<input class="form-check-input m-0 me-2" type="checkbox">
										<i class="fa-solid fa-circle fs-6 text-orange me-1"></i>Uncollectable
									</label>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div>
					<h6 class="fs-16 fw-semibold mb-2">Payment Details</h6>
					<div class="border-bottom mb-3 pb-0">
						<div class="row">
							<div class="col-6">
								<div class="mb-3">
									<h6 class="fs-14 fw-semibold mb-1">PayPal</h6>
									<p>examplepaypal.com</p>
								</div>
							</div>
							<div class="col-6">
								<div class="mb-3">
									<h6 class="fs-14 fw-semibold mb-1">Account </h6>
									<p>examplepaypal.com</p>
								</div>
							</div>
							<div class="col-6">
								<div class="mb-3">
									<h6 class="fs-14 fw-semibold mb-1">Payment Term</h6>
									<p class="d-flex align-items-center">Days <span class="badge badge-danger ms-2">Due in 8 days</span></p>
								</div>
							</div>
						</div>
					</div>
				</div>		
				<div>
					<h6 class="fs-16 mb-2">Invoice History</h6>
					<ul class="activity-feed bg-light rounded">
						<li class="feed-item timeline-item">
							<p class="mb-1">Status Changed to <span class="text-dark fw-semibold">Partially Paid</span></p>
							<div class="invoice-date"><span><i class="isax isax-calendar me-1"></i>17 Jan 2025</span></div>
						</li>
						<li class="feed-item timeline-item">
							<p class="mb-1"><span class="text-dark fw-semibold">$300 </span> Partial Amount Paid on <span class="text-dark fw-semibold">Paypal</span></p>
							<div class="invoice-date"><span><i class="isax isax-calendar me-1"></i>16 Jan 2025</span></div>
						</li>
						<li class="feed-item timeline-item">
							<p class="mb-1"><span class="text-dark fw-semibold">John Smith </span> Created <span class="text-dark fw-semibold">Invoice</span><a href="#" class="text-primary">#INV1254</a></p>
							<div class="invoice-date"><span><i class="isax isax-calendar me-1"></i>16 Jan 2025</span></div>
						</li>
					</ul>
				</div>
				<div class="offcanvas-footer">
					<div class="row g-2">
						<div class="col-6">
							<a href="#"  class="btn btn-outline-white w-100">Reset</a>
						</div>
						<div class="col-6">
							<button data-bs-dismiss="offcanvas" class="btn btn-primary w-100" id="filter-submit">Submit</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
	<!-- End Filter -->
@endsection