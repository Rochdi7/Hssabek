<?php $page = 'products'; ?>
@extends('layout.mainlayout')
@section('content')
  
<!-- ========================
			Start Page Content
		========================= -->

		<div class="page-wrapper">	
			<!-- Start Container  -->
			<div class="content content-two">

				<!-- Start Breadcrumb -->
				<div class="d-flex d-block align-items-center justify-content-between flex-wrap gap-3 mb-3">
					<div>
						<h6>Products</h6>
					</div>
					<div class="d-flex my-xl-auto right-content align-items-center flex-wrap gap-2">
						<div class="dropdown me-1">
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
                        <div>
							<a href="{{url('add-product')}}" class="btn btn-primary d-flex align-items-center"><i class="isax isax-add-circle5 me-1"></i>New Product</a>
						</div>
					</div>
				</div>
				<!-- End Breadcrumb -->
				
				<!-- Start Table Search -->
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
							<div class="dropdown me-2">
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
											<input class="form-check-input m-0 me-2" type="checkbox">
											<span>Purchase Price</span>
										</label>
									</li>
									<li>
										<label class="dropdown-item d-flex align-items-center form-switch">
											<i class="fa-solid fa-grip-vertical me-3 text-default"></i>
											<input class="form-check-input m-0 me-2" type="checkbox">
											<span>Status</span>
										</label>
									</li>
								</ul>
							</div>
						</div>
					</div>				

					<!-- Filter Info -->
					<div class="align-items-center gap-2 flex-wrap filter-info mt-3">
						<h6 class="fs-13 fw-semibold">Filters</h6>
						<span class="tag bg-light border rounded-1 fs-12 text-dark badge"><span class="num-count d-inline-flex align-items-center justify-content-center bg-success fs-10 me-1">5</span>Products Selected<span class="ms-1 tag-close"><i class="fa-solid fa-x fs-10"></i></span></span>					
						<span class="tag bg-light border rounded-1 fs-12 text-dark badge"><span class="num-count d-inline-flex align-items-center justify-content-center bg-success fs-10 me-1">5</span>Unit Selected<span class="ms-1 tag-close"><i class="fa-solid fa-x fs-10"></i></span></span>					
						<span class="tag bg-light border rounded-1 fs-12 text-dark badge"><span class="num-count d-inline-flex align-items-center justify-content-center bg-success fs-10 me-1">5</span>Price Selected<span class="ms-1 tag-close"><i class="fa-solid fa-x fs-10"></i></span></span>
						<a href="#" class="link-danger fw-medium text-decoration-underline ms-md-1">Clear All</a>
					</div>
					<!-- /Filter Info -->

				</div>
				<!-- End Table Search -->
				
				<!-- Start Table List -->
				<div class="table-responsive">
					<table class="table table-nowrap datatable">
						<thead>
							<tr>
								<th class="no-sort">
                                    <div class="form-check form-check-md">
                                        <input class="form-check-input" type="checkbox" id="select-all">
                                    </div>
                                </th>
								<th class="no-sort">Code</th>
								<th class="no-sort">Product</th>
								<th class="no-sort">Category</th>
								<th class="no-sort">Unit</th>
								<th>Quantity</th>
								<th>Selling Price</th>
								<th>Purchase Price</th>
								<th class="no-sort"></th>
								<th class="no-sort"></th>
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
									<a href="javascript:void(0);" class="link-default">PR00025</a>
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
								<td>Smartphones</td>
								<td class="text-dark">Piece</td>
								<td>2</td>
								<td class="text-dark">$100</td>
								<td class="text-dark">$98</td>
								<td>
									<div class="form-check form-switch">
										<input class="form-check-input" type="checkbox" role="switch" checked>
									</div>
								</td>
								<td class="action-item">
                                    <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                        <i class="fa-solid fa-ellipsis-vertical"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="{{url('edit-product')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-edit me-2"></i>Edit</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                        </li>
                                    </ul>
                                </td>
							</tr>
							<tr>
								<td>
                                    <div class="form-check form-check-md">
                                        <input class="form-check-input" type="checkbox">
                                    </div>
                                </td>
								<td>
									<a href="javascript:void(0);" class="link-default">PR00014</a>
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
								<td>Laptops</td>
								<td class="text-dark">Piece</td>
								<td>12</td>
								<td class="text-dark">$25</td>
								<td class="text-dark">$24</td>
								<td>
									<div class="form-check form-switch">
										<input class="form-check-input" type="checkbox" role="switch" checked>
									</div>
								</td>
								<td class="action-item">
                                    <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                        <i class="fa-solid fa-ellipsis-vertical"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="{{url('edit-product')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-edit me-2"></i>Edit</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                        </li>
                                    </ul>
                                </td>
							</tr>
							<tr>
								<td>
                                    <div class="form-check form-check-md">
                                        <input class="form-check-input" type="checkbox">
                                    </div>
                                </td>
								<td>
									<a href="javascript:void(0);" class="link-default">PR00012</a>
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
								<td>Headphones</td>
								<td class="text-dark">Pack</td>
								<td>2</td>
								<td class="text-dark">$34</td>
								<td class="text-dark">$58</td>
								<td>
									<div class="form-check form-switch">
										<input class="form-check-input" type="checkbox" role="switch" checked>
									</div>
								</td>
								<td class="action-item">
                                    <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                        <i class="fa-solid fa-ellipsis-vertical"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="{{url('edit-product')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-edit me-2"></i>Edit</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                        </li>
                                    </ul>
                                </td>
							</tr>
							<tr>
								<td>
                                    <div class="form-check form-check-md">
                                        <input class="form-check-input" type="checkbox">
                                    </div>
                                </td>
								<td>
									<a href="javascript:void(0);" class="link-default">PR00016</a>
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
								<td>Computer Service</td>
								<td class="text-dark">Piece</td>
								<td>24</td>
								<td class="text-dark">$75</td>
								<td class="text-dark">$72</td>
								<td>
									<div class="form-check form-switch">
										<input class="form-check-input" type="checkbox" role="switch" checked>
									</div>
								</td>
								<td class="action-item">
                                    <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                        <i class="fa-solid fa-ellipsis-vertical"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="{{url('edit-product')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-edit me-2"></i>Edit</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                        </li>
                                    </ul>
                                </td>
							</tr>
							<tr>
								<td>
                                    <div class="form-check form-check-md">
                                        <input class="form-check-input" type="checkbox">
                                    </div>
                                </td>
								<td>
									<a href="javascript:void(0);" class="link-default">PR00022</a>
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
								<td>Footwear</td>
								<td class="text-dark">Pack</td>
								<td>13</td>
								<td class="text-dark">$9</td>
								<td class="text-dark">$89</td>
								<td>
									<div class="form-check form-switch">
										<input class="form-check-input" type="checkbox" role="switch" checked>
									</div>
								</td>
								<td class="action-item">
                                    <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                        <i class="fa-solid fa-ellipsis-vertical"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="{{url('edit-product')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-edit me-2"></i>Edit</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                        </li>
                                    </ul>
                                </td>
							</tr>
							<tr>
								<td>
                                    <div class="form-check form-check-md">
                                        <input class="form-check-input" type="checkbox">
                                    </div>
                                </td>
								<td>
									<a href="javascript:void(0);" class="link-default">PR00047</a>
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
								<td>Kitchen</td>
								<td class="text-dark">Litre</td>
								<td>67</td>
								<td class="text-dark">$120</td>
								<td class="text-dark">$115</td>
								<td>
									<div class="form-check form-switch">
										<input class="form-check-input" type="checkbox" role="switch" checked>
									</div>
								</td>
								<td class="action-item">
                                    <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                        <i class="fa-solid fa-ellipsis-vertical"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="{{url('edit-product')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-edit me-2"></i>Edit</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                        </li>
                                    </ul>
                                </td>
							</tr>
							<tr>
								<td>
                                    <div class="form-check form-check-md">
                                        <input class="form-check-input" type="checkbox">
                                    </div>
                                </td>
								<td>
									<a href="javascript:void(0);" class="link-default">PR00014</a>
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
								<td>Cleaning</td>
								<td class="text-dark">Piece</td>
								<td>13</td>
								<td class="text-dark">$250</td>
								<td class="text-dark">$240</td>
								<td>
									<div class="form-check form-switch">
										<input class="form-check-input" type="checkbox" role="switch" checked>
									</div>
								</td>
								<td class="action-item">
                                    <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                        <i class="fa-solid fa-ellipsis-vertical"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="{{url('edit-product')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-edit me-2"></i>Edit</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                        </li>
                                    </ul>
                                </td>
							</tr>
							<tr>
								<td>
                                    <div class="form-check form-check-md">
                                        <input class="form-check-input" type="checkbox">
                                    </div>
                                </td>
								<td>
									<a href="javascript:void(0);" class="link-default">PR00031</a>
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
								<td>Laptops</td>
								<td class="text-dark">Piece</td>
								<td>25</td>
								<td class="text-dark">$541</td>
								<td class="text-dark">$525</td>
								<td>
									<div class="form-check form-switch">
										<input class="form-check-input" type="checkbox" role="switch" checked>
									</div>
								</td>
								<td class="action-item">
                                    <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                        <i class="fa-solid fa-ellipsis-vertical"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="{{url('edit-product')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-edit me-2"></i>Edit</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                        </li>
                                    </ul>
                                </td>
							</tr>
							<tr>
								<td>
                                    <div class="form-check form-check-md">
                                        <input class="form-check-input" type="checkbox">
                                    </div>
                                </td>
								<td>
									<a href="javascript:void(0);" class="link-default">PR00077</a>
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
								<td>Haircare</td>
								<td class="text-dark">Litre</td>
								<td>24</td>
								<td class="text-dark">$741</td>
								<td class="text-dark">$750</td>
								<td>
									<div class="form-check form-switch">
										<input class="form-check-input" type="checkbox" role="switch" checked>
									</div>
								</td>
								<td class="action-item">
                                    <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                        <i class="fa-solid fa-ellipsis-vertical"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="{{url('edit-product')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-edit me-2"></i>Edit</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                        </li>
                                    </ul>
                                </td>
							</tr>
							<tr>
								<td>
                                    <div class="form-check form-check-md">
                                        <input class="form-check-input" type="checkbox">
                                    </div>
                                </td>
								<td>
									<a href="javascript:void(0);" class="link-default">PR00045</a>
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
								<td>Headphones</td>
								<td class="text-dark">Piece</td>
								<td>65</td>
								<td class="text-dark">$89</td>
								<td class="text-dark">$49</td>
								<td>
									<div class="form-check form-switch">
										<input class="form-check-input" type="checkbox" role="switch" checked>
									</div>
								</td>
								<td class="action-item">
                                    <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                        <i class="fa-solid fa-ellipsis-vertical"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="{{url('edit-product')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-edit me-2"></i>Edit</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                        </li>
                                    </ul>
                                </td>
							</tr>
							<tr>
								<td>
                                    <div class="form-check form-check-md">
                                        <input class="form-check-input" type="checkbox">
                                    </div>
                                </td>
								<td>
									<a href="javascript:void(0);" class="link-default">PR00045</a>
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
								<td>Men’s Apparel</td>
								<td class="text-dark">Piece</td>
								<td>23</td>
								<td class="text-dark">$34</td>
								<td class="text-dark">$36</td>
								<td>
									<div class="form-check form-switch">
										<input class="form-check-input" type="checkbox" role="switch" checked>
									</div>
								</td>
								<td class="action-item">
                                    <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                        <i class="fa-solid fa-ellipsis-vertical"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="{{url('edit-product')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-edit me-2"></i>Edit</a>
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
				<!-- End Table List -->

			</div>
			<!-- End Container  -->
			
            @component('components.footer')
            @endcomponent

		</div>
		<!-- ========================
			End Page Content
		========================= -->

@endsection