<?php $page = 'customer-transactions'; ?>
@extends('layout.mainlayout')
@section('content')
	<!-- ========================
		Start Page Content
	========================= -->

	<div class="page-wrapper">

		<!-- Start Content -->
		<div class="content content-two">

			<!-- Page Header -->
			<div class="d-flex d-block align-items-center justify-content-between flex-wrap gap-3 mb-3">
				<div>
					<h6>Transactions</h6>
				</div>
			</div>
			<!-- End Page Header -->

			<!-- Table Search Start -->
			<div class="mb-3">
				<div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
					<div class="d-flex align-items-center flex-wrap gap-2">
						<div class="table-search d-flex align-items-center mb-0">
							<div class="search-input">
								<a href="javascript:void(0);" class="btn-searchset"><i class="isax isax-search-normal fs-12"></i></a>
							</div>
						</div>
						<a class="btn btn-outline-white fw-normal d-inline-flex align-items-center" href="javascript:void(0);" data-bs-toggle="offcanvas" data-bs-target="#customcanvas">
							<i class="isax isax-filter me-1"></i>Filter
						</a>
					</div>
					<div class="d-flex align-items-center flex-wrap gap-2">
						<div class="dropdown">
							<a href="javascript:void(0);" class="dropdown-toggle btn btn-outline-white d-inline-flex align-items-center" data-bs-toggle="dropdown">
								<i class="isax isax-sort me-1"></i>Sort By : <span class="fw-normal ms-1">Latest</span>
							</a>
							<ul class="dropdown-menu  dropdown-menu-end">
								<li>
									<a href="javascript:void(0);" class="dropdown-item">Latest</a>
								</li>
								<li>
									<a href="javascript:void(0);" class="dropdown-item">Oldest</a>
								</li>
							</ul>
						</div>
					</div>
				</div>

				<!-- Filter Info -->
				<div class="align-items-center gap-2 flex-wrap filter-info mt-3">
					<h6 class="fs-13 fw-semibold">Filters</h6>
					<span class="tag bg-light border rounded-1 fs-12 text-dark badge"><span class="num-count d-inline-flex align-items-center justify-content-center bg-success fs-10 me-1">1</span>Type Selected<span class="ms-1 tag-close"><i class="fa-solid fa-x fs-10"></i></span></span>
					<span class="tag bg-light border rounded-1 fs-12 text-dark badge"><span class="num-count d-inline-flex align-items-center justify-content-center bg-success fs-10 me-1">1</span>Status Selected<span class="ms-1 tag-close"><i class="fa-solid fa-x fs-10"></i></span></span>
					<a href="#" class="link-danger fw-medium text-decoration-underline ms-md-1">Clear All</a>
				</div>
				<!-- /Filter Info -->
			</div>
			<!-- /Table Search End -->

			<!-- Table List Start -->
			<div class="table-responsive">
				<table class="table table-nowrap datatable">
					<thead class="thead-light">
						<tr>
							<th>Type</th>
							<th>Amount</th>
							<th>Date</th>
							<th>Payment Mode</th>
							<th class="no-sort">Status</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="text-dark">Wallet Topup</td>
							<td class="text-dark">$300</td>
							<td>22 Feb 2025</td>
							<td>Cash</td>
							<td>
								<span class="badge badge-soft-success d-inline-flex align-items-center">Completed
									<i class="isax isax-tick-circle ms-1"></i>
								</span>
							</td>
						</tr>
						<tr>
							<td class="text-dark">Purchase</td>
							<td class="text-dark">$150</td>
							<td>07 Feb 2025</td>
							<td>Cheque</td>
							<td>
								<span class="badge badge-soft-danger d-inline-flex align-items-center">Cancelled
									<i class="isax isax-close-circle ms-1"></i>
								</span>
							</td>
						</tr>
						<tr>
							<td class="text-dark">Refund</td>
							<td class="text-dark">$350</td>
							<td>30 Jan 2025</td>
							<td>Bank Transfer</td>
							<td>
								<span class="badge badge-soft-success d-inline-flex align-items-center">Completed
									<i class="isax isax-tick-circle ms-1"></i>
								</span>
							</td>
						</tr>
						<tr>
							<td class="text-dark">Wallet Topup</td>
							<td class="text-dark">$500</td>
							<td>17 Jan 2025</td>
							<td>Paypal</td>
							<td>
								<span class="badge badge-soft-danger d-inline-flex align-items-center">Cancelled
									<i class="isax isax-close-circle ms-1"></i>
								</span>
							</td>
						</tr>
						<tr>
							<td class="text-dark">Purchase</td>
							<td class="text-dark">$2000</td>
							<td>04 Jan 2025</td>
							<td>Stripe</td>
							<td>
								<span class="badge badge-soft-success d-inline-flex align-items-center">Completed
									<i class="isax isax-tick-circle ms-1"></i>
								</span>
							</td>
						</tr>
						<tr>
							<td class="text-dark">Refund</td>
							<td class="text-dark">$100</td>
							<td>09 Dec 2024</td>
							<td>Cash</td>
							<td>
								<span class="badge badge-soft-danger d-inline-flex align-items-center">Cancelled
									<i class="isax isax-close-circle ms-1"></i>
								</span>
							</td>
						</tr>
						<tr>
							<td class="text-dark">Wallet Topup</td>
							<td class="text-dark">$550</td>
							<td>02 Dec 2024</td>
							<td>Cheque</td>
							<td>
								<span class="badge badge-soft-success d-inline-flex align-items-center">Completed
									<i class="isax isax-tick-circle ms-1"></i>
								</span>
							</td>
						</tr>
						<tr>
							<td class="text-dark">Purchase</td>
							<td class="text-dark">$700</td>
							<td>15 Nov 2024</td>
							<td>Bank Transfer</td>
							<td>
								<span class="badge badge-soft-danger d-inline-flex align-items-center">Cancelled
									<i class="isax isax-close-circle ms-1"></i>
								</span>
							</td>
						</tr>
						<tr>
							<td class="text-dark">Refund</td>
							<td class="text-dark">$2500</td>
							<td>30 Nov 2024</td>
							<td>Paypal</td>
							<td>
								<span class="badge badge-soft-success d-inline-flex align-items-center">Completed
									<i class="isax isax-tick-circle ms-1"></i>
								</span>
							</td>
						</tr>
						<tr>
							<td class="text-dark">Wallet Topup</td>
							<td class="text-dark">$1000</td>
							<td>12 Oct 2024</td>
							<td>Stripe</td>
							<td>
								<span class="badge badge-soft-danger d-inline-flex align-items-center">Cancelled
									<i class="isax isax-close-circle ms-1"></i>
								</span>
							</td>
						</tr>
						<tr>
							<td class="text-dark">Purchase</td>
							<td class="text-dark">$200</td>
							<td>05 Oct 2024</td>
							<td>Cash</td>
							<td>
								<span class="badge badge-soft-success d-inline-flex align-items-center">Completed
									<i class="isax isax-tick-circle ms-1"></i>
								</span>
							</td>
						</tr>
						<tr>
							<td class="text-dark">Refund</td>
							<td class="text-dark">$350</td>
							<td>09 Sep 2024</td>
							<td>Cheque</td>
							<td>
								<span class="badge badge-soft-danger d-inline-flex align-items-center">Cancelled
									<i class="isax isax-close-circle ms-1"></i>
								</span>
							</td>
						</tr>
						<tr>
							<td class="text-dark">Wallet Topup</td>
							<td class="text-dark">$500</td>
							<td>02 Sep 2024</td>
							<td>Bank Transfer</td>
							<td>
								<span class="badge badge-soft-success d-inline-flex align-items-center">Completed
									<i class="isax isax-tick-circle ms-1"></i>
								</span>
							</td>
						</tr>
						<tr>
							<td class="text-dark">Purchase</td>
							<td class="text-dark">$800</td>
							<td>07 Aug 2024</td>
							<td>Paypal</td>
							<td>
								<span class="badge badge-soft-danger d-inline-flex align-items-center">Cancelled
									<i class="isax isax-close-circle ms-1"></i>
								</span>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<!-- /Table List End -->

		</div>
		<!-- End Content -->

		<!-- Start Footer -->
		<div class="footer d-sm-flex align-items-center justify-content-between bg-white py-2 px-4">
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
				<h6 class="offcanvas-title">Filter</h6>
				<button type="button" class="btn-close btn-close-modal custom-btn-close" data-bs-dismiss="offcanvas" aria-label="Close"><i class="fa-solid fa-x"></i></button>
			</div>
		</div>
		<div class="offcanvas-body pt-3">
			<form action="#">
				<div class="mb-3">
					<label class="form-label">Type</label>
					<div class="dropdown">
						<a href="javascript:void(0);" class="dropdown-toggle btn btn-lg bg-light  d-flex align-items-center justify-content-start fs-13 fw-normal border" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="true">
							Select
						</a>
						<div class="dropdown-menu shadow-lg w-100 dropdown-info">
							<div class="mb-3">
								<div class="input-icon-start position-relative">
									<span class="input-icon-addon fs-12">
										<i class="isax isax-search-normal"></i>
									</span>
									<input type="text" class="form-control form-control-sm" placeholder="Search">
								</div>
							</div>
							<ul class="mb-3">
								<li>
									<label class="dropdown-item px-2 d-flex align-items-center text-dark">
										<input class="form-check-input m-0 me-2" type="checkbox"> Wallet Topup
									</label>
								</li>
								<li>
									<label class="dropdown-item px-2 d-flex align-items-center text-dark">
										<input class="form-check-input m-0 me-2" type="checkbox"> Purchase
									</label>
								</li>
								<li>
									<label class="dropdown-item px-2 d-flex align-items-center text-dark">
										<input class="form-check-input m-0 me-2" type="checkbox"> Refund
									</label>
								</li>
							</ul>
							<div class="row g-2">
								<div class="col-6">
									<a href="#" class="btn btn-outline-white w-100" id="close-filter">Cancel</a>
								</div>
								<div class="col-6">
									<a href="#" class="btn btn-primary w-100">Select</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="mb-3">
					<label for="dateRangePicker" class="form-label">Date Range</label>
					<div class="input-group position-relative">
						<input type="text" class="form-control date-range bookingrange rounded-end">
						<span class="input-icon-addon fs-16 text-gray-9">
							<i class="isax isax-calendar-2"></i>
						</span>
					</div>
				</div>
				<div class="mb-3">
					<label class="form-label">Amount</label>
					<div class="dropdown">
						<a href="javascript:void(0);" class="dropdown-toggle btn btn-lg bg-light  d-flex align-items-center justify-content-start fs-13 fw-normal border" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="true">
							Select
						</a>
						<div class="dropdown-menu shadow-lg w-100 dropdown-info">
							<div class="filter-range">
								<input type="text" id="range_03">
								<p>Range : <span class="text-gray-9">Range : $200 - $5695</span></p>
							</div>
						</div>
					</div>
				</div>
				<div class="mb-3">
					<label class="form-label">Payment Mode</label>
					<div class="dropdown">
						<a href="javascript:void(0);" class="dropdown-toggle btn btn-lg bg-light  d-flex align-items-center justify-content-start fs-13 fw-normal border" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="true">
							Select
						</a>
						<div class="dropdown-menu shadow-lg w-100 dropdown-info">
							<ul class="mb-3">
								<li>
									<label class="dropdown-item px-2 d-flex align-items-center text-dark">
										<input class="form-check-input m-0 me-2" type="checkbox"> Cash
									</label>
								</li>
								<li>
									<label class="dropdown-item px-2 d-flex align-items-center text-dark">
										<input class="form-check-input m-0 me-2" type="checkbox"> Cheque
									</label>
								</li>
								<li>
									<label class="dropdown-item px-2 d-flex align-items-center text-dark">
										<input class="form-check-input m-0 me-2" type="checkbox"> Bank Transfer
									</label>
								</li>
								<li>
									<label class="dropdown-item px-2 d-flex align-items-center text-dark">
										<input class="form-check-input m-0 me-2" type="checkbox"> Paypal
									</label>
								</li>
								<li>
									<label class="dropdown-item px-2 d-flex align-items-center text-dark">
										<input class="form-check-input m-0 me-2" type="checkbox"> Stripe
									</label>
								</li>
							</ul>
						</div>
					</div>
				</div>
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
										<i class="fa-solid fa-circle fs-6 text-success me-1"></i>Completed
									</label>
								</li>
								<li>
									<label class="dropdown-item px-2 d-flex align-items-center text-dark">
										<input class="form-check-input m-0 me-2" type="checkbox">
										<i class="fa-solid fa-circle fs-6 text-danger me-1"></i>Canceled
									</label>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="offcanvas-footer">
					<div class="row g-2">
						<div class="col-6">
							<a href="#" class="btn btn-outline-white w-100">Reset</a>
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