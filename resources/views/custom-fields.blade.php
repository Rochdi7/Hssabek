<?php $page = 'custom-fields'; ?>
@extends('layout.mainlayout')
@section('content')
	<!-- ========================
		Start Page Content
	========================= -->

	<div class="page-wrapper">	
		<div class="content">
			<div class="row justify-content-center">
				<div class="col-xl-12">
					<div class=" row settings-wrapper d-flex">
						@component('components.settings-sidebar')
						@endcomponent
													
						<div class="col-xl-9 col-lg-8">
							<div class="mb-3">
								<div class="pb-3 border-bottom mb-3">
									<h6 class="mb-0">Custom Fields</h6>
								</div>
								<form action="{{url('esignatures')}}">
									<div class="mb-3">
										<div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
											<div class="d-flex align-items-center flex-wrap gap-2">
												<div class="input-icon-start position-relative">
													<span class="input-icon-addon">
														<i class="isax isax-search-normal"></i>
													</span>
													<input type="text" class="form-control form-control-sm bg-white" placeholder="Search">
												</div>
											</div>
											<div class="d-flex align-items-center flex-wrap gap-2">
												<a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#add_customfield" class="btn btn-primary d-flex align-items-center"><i class="isax isax-add-circle5 me-2"></i>New Field</a>
											</div>
										</div>				
									</div>
									<div class="table-responsive table-nowrap">
										<table class="table border">
											<thead class="table-light">
												<tr>
													<th class="no-sort">Module</th>
													<th>Label</th>
													<th>Type</th>
													<th>Default Value</th>
													<th>Required</th>
													<th>Status</th>
													<th class="no-sort"></th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>
														<a href="javascript:void(0);" class="text-dark">Customers</a>
													</td>
													<td>Type </td>
													<td>Select </td>
													<td>Retail</td>
													<td>
														<div class="form-check form-switch">
															<input class="form-check-input" type="checkbox" role="switch" checked="">
														</div>
													</td>
													<td>
														<div class="form-check form-switch">
															<input class="form-check-input" type="checkbox" role="switch" checked="">
														</div>
													</td>
													<td class="action-item">
														<a href="javascript:void(0);" data-bs-toggle="dropdown">
															<i class="isax isax-more"></i>
														</a>
														<ul class="dropdown-menu">
															<li>
																<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#edit_customfield"><i class="isax isax-edit me-2"></i>Edit</a>
															</li>
															<li>
																<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
															</li>
														</ul>
													</td>
												</tr>
												<tr>
													<td>
														<a href="javascript:void(0);" class="text-dark">Supplier</a>
													</td>
													<td>Payment Method </td>
													<td>Select </td>
													<td>PayPal</td>
													<td>
														<div class="form-check form-switch">
															<input class="form-check-input" type="checkbox" role="switch">
														</div>
													</td>
													<td>
														<div class="form-check form-switch">
															<input class="form-check-input" type="checkbox" role="switch" checked="">
														</div>
													</td>
													<td class="action-item">
														<a href="javascript:void(0);" data-bs-toggle="dropdown">
															<i class="isax isax-more"></i>
														</a>
														<ul class="dropdown-menu">
															<li>
																<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#edit_customfield"><i class="isax isax-edit me-2"></i>Edit</a>
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
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		@component('components.footer')
		@endcomponent

	</div>

	<!-- ========================
		End Page Content
	========================= -->
@endsection