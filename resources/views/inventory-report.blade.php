<?php $page = 'inventory-report'; ?>
@extends('layout.mainlayout')
@section('content') 
	<!-- ========================
		Start Page Content
	========================= -->

	<div class="page-wrapper">	

		<div class="content content-two">

			<!-- Start Breadcrumb -->
			<div class="d-flex d-block align-items-center justify-content-between flex-wrap gap-3 mb-3">
				<div>
					<h6 class="mb-0">Inventory Report</h6>
				</div>
				<div class="my-xl-auto">
					<div class="dropdown">
						<a href="javascript:void(0);" class="btn btn-outline-white d-inline-flex align-items-center"  data-bs-toggle="dropdown">
							<i class="isax isax-export-1 me-1"></i>Export
						</a>
						<ul class="dropdown-menu">
							<li>
								<a class="dropdown-item" href="javascript:void(0);">Download as PDF</a>
							</li>
							<li>
								<a class="dropdown-item" href="javascript:void(0);">Download as Excel</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<!-- End Breadcrumb -->
			
			<!-- start row -->
			<div class="row">

				<div class="col-xl-3 col-lg-4 col-md-6">
					<div class="card position-relative">
						<div class="card-body">
							<div class="d-flex align-items-center justify-content-between mb-2 pb-1">
								<div>
									<p class="mb-1">Total Inventory</p>
									<h6 class="fs-16 fw-semibold mb-0">$8,500,000</h6>
								</div>
								<div>
									<span class="avatar bg-primary rounded">
										<i class="isax isax-dollar-circle fs-16"></i>
									</span>
								</div>
							</div>
							<p class="fs-13 mb-0">
								<span class="text-success"><i class="isax isax-send text-success me-1"></i>5.62%</span> from last month
							</p>
							<span class="position-absolute start-0 top-0">
								<img src="{{URL::asset('build/img/bg/card-overlay-12.svg')}}" alt="">
							</span>
						</div> <!-- end card body -->
					</div> <!-- end card -->
				</div> <!-- end col -->

				<div class="col-xl-3 col-lg-4 col-md-6">
					<div class="card position-relative">
						<div class="card-body">
							<div class="d-flex align-items-center justify-content-between mb-2 pb-1">
								<div>
									<p class="mb-1">Low Stock Items</p>
									<h6 class="fs-16 fw-semibold mb-0">25 Products</h6>
								</div>
								<div>
									<span class="avatar bg-success rounded">
										<i class="isax isax-bag-2 fs-16"></i>
									</span>
								</div>
							</div>
							<p class="fs-13 mb-0">
								<span class="text-success"><i class="isax isax-send text-success me-1"></i>11.4%</span> from last month
							</p>
							<span class="position-absolute start-0 top-0">
								<img src="{{URL::asset('build/img/bg/card-overlay-11.svg')}}" alt="">
							</span>
						</div> <!-- end card body -->
					</div> <!-- end card -->
				</div> <!-- end col -->

				<div class="col-xl-3 col-lg-4 col-md-6">
					<div class="card position-relative">
						<div class="card-body">
							<div class="d-flex align-items-center justify-content-between mb-2 pb-1">
								<div>
									<p class="mb-1">Out-of-Stock Items</p>
									<h6 class="fs-16 fw-semibold mb-0">10 Products</h6>
								</div>
								<div>
									<span class="avatar bg-warning rounded">
										<i class="isax isax-bag-timer fs-16"></i>
									</span>
								</div>
							</div>
							<p class="fs-13 mb-0">
								<span class="text-success"><i class="isax isax-send text-success me-1"></i>8.52%</span> from last month
							</p>
							<span class="position-absolute start-0 top-0">
								<img src="{{URL::asset('build/img/bg/card-overlay-10.svg')}}" alt="">
							</span>
						</div> <!-- end card body -->
					</div> <!-- end card -->
				</div> <!-- end col -->

				<div class="col-xl-3 col-lg-4 col-md-6">
					<div class="card position-relative">
						<div class="card-body">
							<div class="d-flex align-items-center justify-content-between mb-2 pb-1">
								<div>
									<p class="mb-1">Pending Reorders</p>
									<h6 class="fs-16 fw-semibold mb-0">$750,000</h6>
								</div>
								<div>
									<span class="avatar bg-info rounded">											
										<i class="isax isax-timer fs-16"></i>
									</span>
								</div>
							</div>
							<p class="fs-13 mb-0">
								<span class="text-danger"><i class="isax isax-received text-danger me-1"></i>7.45%</span> from last month
							</p>
							<span class="position-absolute start-0 top-0">
								<img src="{{URL::asset('build/img/bg/card-overlay-09.svg')}}" alt="">
							</span>
						</div> <!-- end card body -->
					</div> <!-- end card -->
				</div> <!-- end col -->
			</div>
			<!-- end row -->

			<!-- Start Table Search -->
			<div class="mb-3">

				<div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
					<div class="d-flex align-items-center gap-2 flex-wrap">
						<div class="table-search d-flex align-items-center mb-0">
							<div class="search-input">
								<a href="javascript:void(0);" class="btn-searchset"><i class="isax isax-search-normal fs-12"></i></a>
							</div>
						</div>
						<div id="reportrange" class="reportrange-picker d-flex align-items-center">
							<i class="isax isax-calendar text-gray-5 fs-14 me-1"></i><span class="reportrange-picker-field">16 Apr 25 - 16 Apr 25</span>
						</div>
						<a class="btn btn-outline-white fw-normal d-inline-flex align-items-center" href="javascript:void(0);" data-bs-toggle="offcanvas" data-bs-target="#customcanvas">
							<i class="isax isax-filter me-1"></i>Filter
						</a>
					</div>
					<div class="d-flex align-items-center flex-wrap gap-2">
						<div class="dropdown">
							<a href="javascript:void(0);" class="dropdown-toggle btn btn-outline-white d-inline-flex align-items-center" data-bs-toggle="dropdown" data-bs-auto-close="outside">
								<i class="isax isax-grid-3 me-1"></i>Column
							</a>
							<ul class="dropdown-menu  dropdown-menu">
								<li>
									<label class="dropdown-item d-flex align-items-center form-switch">
										<i class="fa-solid fa-grip-vertical me-3 text-default"></i>
										<input class="form-check-input m-0 me-2" type="checkbox" checked>
										<span>Code</span>
									</label>
								</li>
								<li>
									<label class="dropdown-item d-flex align-items-center form-switch">
										<i class="fa-solid fa-grip-vertical me-3 text-default"></i>
										<input class="form-check-input m-0 me-2" type="checkbox" checked>
										<span>Product</span>
									</label>
								</li>
								<li>
									<label class="dropdown-item d-flex align-items-center form-switch">
										<i class="fa-solid fa-grip-vertical me-3 text-default"></i>
										<input class="form-check-input m-0 me-2" type="checkbox" checked>
										<span>Category</span>
									</label>
								</li>
								<li>
									<label class="dropdown-item d-flex align-items-center form-switch">
										<i class="fa-solid fa-grip-vertical me-3 text-default"></i>
										<input class="form-check-input m-0 me-2" type="checkbox" checked>
										<span>Unit</span>
									</label>
								</li>
								<li>
									<label class="dropdown-item d-flex align-items-center form-switch">
										<i class="fa-solid fa-grip-vertical me-3 text-default"></i>
										<input class="form-check-input m-0 me-2" type="checkbox" checked>
										<span>Quantity</span>
									</label>
								</li>
								<li>
									<label class="dropdown-item d-flex align-items-center form-switch">
										<i class="fa-solid fa-grip-vertical me-3 text-default"></i>
										<input class="form-check-input m-0 me-2" type="checkbox" checked>
										<span>Selling Price</span>
									</label>
								</li>
								<li>
									<label class="dropdown-item d-flex align-items-center form-switch">
										<i class="fa-solid fa-grip-vertical me-3 text-default"></i>
										<input class="form-check-input m-0 me-2" type="checkbox" checked>
										<span>Purchase Price</span>
									</label>
								</li>
							</ul>
						</div>
					</div>
				</div>				

				<!-- Filter Info -->
				<div class="align-items-center gap-2 flex-wrap filter-info mt-3">
					<h6 class="fs-13 fw-semibold">Filters</h6>
					<span class="tag bg-light border rounded-1 fs-12 text-dark badge"><span class="num-count d-inline-flex align-items-center justify-content-center bg-success fs-10 me-1">5</span>Product Selected<span class="ms-1 tag-close"><i class="fa-solid fa-x fs-10"></i></span></span>	
					<a href="#" class="link-danger fw-medium text-decoration-underline ms-md-1">Clear All</a>
				</div>
				<!-- /Filter Info -->

			</div>
			<!-- End Table Search -->
			
			<!-- Table List Start -->
			<div class="table-responsive">
				<table class="table table-nowrap datatable">
					<thead>
						<tr>
							<th class="no-sort">
								<div class="form-check form-check-md">
									<input class="form-check-input" type="checkbox" id="select-all">
								</div>
							</th>
							<th>Code</th>
							<th>Product</th>
							<th>Category</th>
							<th>Unit</th>
							<th class="no-sort">Quantity</th>
							<th class="no-sort">Selling Price</th>
							<th class="no-sort">Purchase Price</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>
								<div class="form-check form-check-md">
									<input class="form-check-input" type="checkbox">
								</div>
							</td>
							<td>
								<a href="javascript:void(0);" class="text-default">PR00025</a> 
							</td>
							<td>
								<div class="d-flex align-items-center">
									<a href="javascript:void(0);" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
										<img src="{{URL::asset('build/img/products/product-01.jpg')}}" class="rounded-circle" alt="img">
									</a>
									<div>
										<h6 class="fs-14 fw-medium mb-0"><a href="javascript:void(0);">Apple iPhone 15</a></h6>
									</div>
								</div>
							</td>
							<td>
								Smartphones
							</td>
							<td class="text-dark">Piece</td>
							<td>2</td>
							<td class="text-dark">$100</td>
							<td class="text-dark">$98</td>
						</tr>
						<tr>
							<td>
								<div class="form-check form-check-md">
									<input class="form-check-input" type="checkbox">
								</div>
							</td>
							<td>
								<a href="javascript:void(0);" class="text-default">PR00014</a>
							</td>
							<td>
								<div class="d-flex align-items-center">
									<a href="javascript:void(0);" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
										<img src="{{URL::asset('build/img/products/product-02.jpg')}}" class="rounded-circle" alt="img">
									</a>
									<div>
										<h6 class="fs-14 fw-medium mb-0"><a href="javascript:void(0);">Dell XPS 13 9310</a></h6>
									</div>
								</div>
							</td>
							<td>
								Laptops
							</td>
							<td class="text-dark">Piece</td>
							<td>12</td>
							<td class="text-dark">$25</td>
							<td class="text-dark">$24</td>
						</tr>
						<tr>
							<td>
								<div class="form-check form-check-md">
									<input class="form-check-input" type="checkbox">
								</div>
							</td>
							<td>
								<a href="javascript:void(0);" class="text-default">PR00012</a>
							</td>
							<td>
								<div class="d-flex align-items-center">
									<a href="javascript:void(0);" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
										<img src="{{URL::asset('build/img/products/product-03.jpg')}}" class="rounded-circle" alt="img">
									</a>
									<div>
										<h6 class="fs-14 fw-medium mb-0"><a href="javascript:void(0);">Bose QuietComfort 45</a></h6>
									</div>
								</div>
							</td>
							<td>
								Headphones
							</td>
							<td class="text-dark">Piece</td>
							<td>2</td>
							<td class="text-dark">$34</td>
							<td class="text-dark">$58</td>
						</tr>
						<tr>
							<td>
								<div class="form-check form-check-md">
									<input class="form-check-input" type="checkbox">
								</div>
							</td>
							<td>
								<a href="javascript:void(0);" class="text-default">PR00016</a>
							</td>
							<td>
								<div class="d-flex align-items-center">
									<a href="javascript:void(0);" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
										<img src="{{URL::asset('build/img/products/product-04.jpg')}}" class="rounded-circle" alt="img">
									</a>
									<div>
										<h6 class="fs-14 fw-medium mb-0"><a href="javascript:void(0);">Nike Dri-FIT T-shirt</a></h6>
									</div>
								</div>
							</td>
							<td>
								Computer Service
							</td>
							<td class="text-dark">Piece</td>
							<td>24</td>
							<td class="text-dark">$75</td>
							<td class="text-dark">$72</td>
						</tr>
						<tr>
							<td>
								<div class="form-check form-check-md">
									<input class="form-check-input" type="checkbox">
								</div>
							</td>
							<td>
								<a href="javascript:void(0);" class="text-default">PR00022</a>
							</td>
							<td>
								<div class="d-flex align-items-center">
									<a href="javascript:void(0);" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
										<img src="{{URL::asset('build/img/products/product-05.jpg')}}" class="rounded-circle" alt="img">
									</a>
									<div>
										<h6 class="fs-14 fw-medium mb-0"><a href="javascript:void(0);">Adidas Ultraboost 22 Running Shoe</a></h6>
									</div>
								</div>
							</td>
							<td>
								Footwear
							</td>
							<td class="text-dark">Piece</td>
							<td>13</td>
							<td class="text-dark">$9</td>
							<td class="text-dark">$89</td>
						</tr>
						<tr>
							<td>
								<div class="form-check form-check-md">
									<input class="form-check-input" type="checkbox">
								</div>
							</td>
							<td>
								<a href="javascript:void(0);" class="text-default">PR00047</a>
							</td>
							<td>
								<div class="d-flex align-items-center">
									<a href="javascript:void(0);" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
										<img src="{{URL::asset('build/img/products/product-06.jpg')}}" class="rounded-circle" alt="img">
									</a>
									<div>
										<h6 class="fs-14 fw-medium mb-0"><a href="javascript:void(0);">Samsung French Door Refrigerator</a></h6>
									</div>
								</div>
							</td>
							<td>
								Kitchen
							</td>
							<td class="text-dark">Pack</td>
							<td>67</td>
							<td class="text-dark">$120</td>
							<td class="text-dark">$115</td>
						</tr>
						<tr>
							<td>
								<div class="form-check form-check-md">
									<input class="form-check-input" type="checkbox">
								</div>
							</td>
							<td>
								<a href="javascript:void(0);" class="text-default">PR00014</a>
							</td>
							<td>
								<div class="d-flex align-items-center">
									<a href="javascript:void(0);" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
										<img src="{{URL::asset('build/img/products/product-07.jpg')}}" class="rounded-circle" alt="img">
									</a>
									<div>
										<h6 class="fs-14 fw-medium mb-0"><a href="javascript:void(0);">Dyson V15 Detect  Vacuum Cleaner</a></h6>
									</div>
								</div>
							</td>
							<td>
								Cleaning
							</td>
							<td class="text-dark">Pack</td>
							<td>13</td>
							<td class="text-dark">$250</td>
							<td class="text-dark">$240</td>
						</tr>
						<tr>
							<td>
								<div class="form-check form-check-md">
									<input class="form-check-input" type="checkbox">
								</div>
							</td>
							<td>
								<a href="javascript:void(0);" class="text-default">PR00031</a>
							</td>
							<td>
								<div class="d-flex align-items-center">
									<a href="javascript:void(0);" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
										<img src="{{URL::asset('build/img/products/product-08.jpg')}}" class="rounded-circle" alt="img">
									</a>
									<div>
										<h6 class="fs-14 fw-medium mb-0"><a href="javascript:void(0);">HP Spectre x360 14</a></h6>
									</div>
								</div>
							</td>
							<td>
								Laptops
							</td>
							<td class="text-dark">Piece</td>
							<td>25</td>
							<td class="text-dark">$541</td>
							<td class="text-dark">$525</td>
						</tr>
						<tr>
							<td>
								<div class="form-check form-check-md">
									<input class="form-check-input" type="checkbox">
								</div>
							</td>
							<td>
								<a href="javascript:void(0);" class="text-default">PR00077</a>
							</td>
							<td>
								<div class="d-flex align-items-center">
									<a href="javascript:void(0);" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
										<img src="{{URL::asset('build/img/products/product-09.jpg')}}" class="rounded-circle" alt="img">
									</a>
									<div>
										<h6 class="fs-14 fw-medium mb-0"><a href="javascript:void(0);">Dyson Supersonic Hair Dryer</a></h6>
									</div>
								</div>
							</td>
							<td>
								Haircare
							</td>
							<td class="text-dark">Litre</td>
							<td>24</td>
							<td class="text-dark">$741</td>
							<td class="text-dark">$750</td>
						</tr>
						<tr>
							<td>
								<div class="form-check form-check-md">
									<input class="form-check-input" type="checkbox">
								</div>
							</td>
							<td>
								<a href="javascript:void(0);" class="text-default">PR00045</a>
							</td>
							<td>
								<div class="d-flex align-items-center">
									<a href="javascript:void(0);" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
										<img src="{{URL::asset('build/img/products/product-10.jpg')}}" class="rounded-circle" alt="img">
									</a>
									<div>
										<h6 class="fs-14 fw-medium mb-0"><a href="javascript:void(0);">Apple AirPods Pro</a></h6>
									</div>
								</div>
							</td>
							<td>
								Headphones
							</td>
							<td class="text-dark">Piece</td>
							<td>65</td>
							<td class="text-dark">$89</td>
							<td class="text-dark">$49</td>
						</tr>
						<tr>
							<td>
								<div class="form-check form-check-md">
									<input class="form-check-input" type="checkbox">
								</div>
							</td>
							<td>
								<a href="javascript:void(0);" class="text-default">PR00021</a>
							</td>
							<td>
								<div class="d-flex align-items-center">
									<a href="javascript:void(0);" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
										<img src="{{URL::asset('build/img/products/product-11.jpg')}}" class="rounded-circle" alt="img">
									</a>
									<div>
										<h6 class="fs-14 fw-medium mb-0"><a href="javascript:void(0);">Levi’s 501 Original Fit Jeans</a></h6>
									</div>
								</div>
							</td>
							<td>
								Men’s Apparel
							</td>
							<td class="text-dark">Piece</td>
							<td>23</td>
							<td class="text-dark">$34</td>
							<td class="text-dark">$36</td>
						</tr>
						<tr>
							<td>
								<div class="form-check form-check-md">
									<input class="form-check-input" type="checkbox">
								</div>
							</td>
							<td>
								<a href="javascript:void(0);" class="text-default">PR00074</a>
							</td>
							<td>
								<div class="d-flex align-items-center">
									<a href="javascript:void(0);" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
										<img src="{{URL::asset('build/img/products/product-12.jpg')}}" class="rounded-circle" alt="img">
									</a>
									<div>
										<h6 class="fs-14 fw-medium mb-0"><a href="javascript:void(0);">CeraVe Hydrating Facial Cleanser</a></h6>
									</div>
								</div>
							</td>
							<td>
								Skincare
							</td>
							<td class="text-dark">Liter</td>
							<td>12</td>
							<td class="text-dark">$45</td>
							<td class="text-dark">$47</td>
						</tr>
						<tr>
							<td>
								<div class="form-check form-check-md">
									<input class="form-check-input" type="checkbox">
								</div>
							</td>
							<td>
								<a href="javascript:void(0);" class="text-default">PR00048</a>
							</td>
							<td>
								<div class="d-flex align-items-center">
									<a href="javascript:void(0);" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
										<img src="{{URL::asset('build/img/products/product-13.jpg')}}" class="rounded-circle" alt="img">
									</a>
									<div>
										<h6 class="fs-14 fw-medium mb-0"><a href="javascript:void(0);">Giro Synthe MIPS Helmet</a></h6>
									</div>
								</div>
							</td>
							<td>
								Bikes & Accessories
							</td>
							<td class="text-dark">Piece</td>
							<td>43</td>
							<td class="text-dark">$74</td>
							<td class="text-dark">$70</td>
						</tr>
						<tr>
							<td>
								<div class="form-check form-check-md">
									<input class="form-check-input" type="checkbox">
								</div>
							</td>
							<td>
								<a href="javascript:void(0);" class="text-default">PR00022</a>
							</td>
							<td>
								<div class="d-flex align-items-center">
									<a href="javascript:void(0);" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
										<img src="{{URL::asset('build/img/products/product-14.jpg')}}" class="rounded-circle" alt="img">
									</a>
									<div>
										<h6 class="fs-14 fw-medium mb-0"><a href="javascript:void(0);">OnePlus 11 5G</a></h6>
									</div>
								</div>
							</td>
							<td>
								Smartphones
							</td>
							<td class="text-dark">Piece</td>
							<td>20</td>
							<td class="text-dark">$80</td>
							<td class="text-dark">$74</td>
						</tr>
					</tbody>
				</table>
			</div>
			<!-- Table List End -->

		</div>
		
		@component('components.footer')
		@endcomponent


	</div>

	<!-- ========================
		End Page Content
	========================= -->
@endsection