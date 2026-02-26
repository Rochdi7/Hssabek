<?php $page = 'customer-account-settings'; ?>
@extends('layout.mainlayout')
@section('content')
	<!-- ========================
		Start Page Content
	========================= -->

	<div class="page-wrapper">

		<!-- Start Content -->
		<div class="content">

			<!-- start row -->
			<div class="row justify-content-center">
				<div class="col-xl-11">

					<!-- start row -->
					<div class=" row settings-wrapper d-flex">
						<div class="col-xxl-3 col-lg-4">
							<div class="card settings-card">
								<div class="card-header">
									<h6 class="mb-0">Settings</h6>
								</div>
								<div class="card-body">
									<div class="sidebars settings-sidebar">
										<div class="sidebar-inner">
											<div class="sidebar-menu p-0">
												<ul>
													<li>
														<a href="{{url('customer-account-settings')}}" class="active fs-14 fw-medium d-flex align-items-center"><i class="isax isax-user-octagon fs-18 me-1"></i>Account Settings</a>
													</li>
													<li>
														<a href="{{url('customer-security-settings')}}" class="fs-14 fw-medium d-flex align-items-center"><i class="isax isax-security-safe fs-18 me-1"></i>Security</a>
													</li>
													<li>
														<a href="{{url('customer-plans-settings')}}" class="fs-14 fw-medium d-flex align-items-center"><i class="isax isax-transaction-minus fs-18 me-1"></i>Plans & Billings</a>
													</li>
													<li>
														<a href="{{url('customer-notification-settings')}}" class="fs-14 fw-medium d-flex align-items-center"><i class="isax isax-notification fs-18 me-1"></i>Notifications</a>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</div><!-- end card body -->
							</div><!-- end card -->
						</div><!-- end col -->
						<div class="col-xxl-9 col-lg-8">
							<div class="mb-3">
								<div class="pb-3 border-bottom mb-3">
									<h6>Account Settings</h6>
								</div>
								<div class="d-flex align-items-center mb-3">
									<span class="bg-dark avatar avatar-sm me-2 flex-shrink-0"><i class="isax isax-info-circle fs-14"></i></span>
									<h6 class="fs-16 fw-semibold">General Information</h6>
								</div>
								<form action="{{url('account-settings')}}">
									<div class="mb-3">
										<span class="text-gray-9 fw-bold mb-2 d-flex">Project Image<span class="text-danger ms-1">*</span></span>
										<div class="d-flex align-items-center">
											<div class="avatar avatar-xxl border border-dashed bg-light me-3 flex-shrink-0">
												<div class="position-relative d-flex align-items-center">
													<img src="{{URL::asset('build/img/users/user-01.jpg')}}" class="avatar avatar-xl " alt="User Img">
													<a href="javascript:void(0);" class="rounded-trash trash-top d-flex align-items-center justify-content-center"><i class="isax isax-trash"></i></a>
												</div>
											</div>
											<div class="d-inline-flex flex-column align-items-start">
												<div class="drag-upload-btn btn btn-sm btn-primary position-relative mb-2">
													<i class="isax isax-image me-1"></i>Upload Image
													<input type="file" class="form-control image-sign" multiple="">
												</div>
												<span class="text-gray-9">JPG or PNG format, not exceeding 5MB.</span>
											</div>
										</div>
									</div>
									<div class="border-bottom mb-3">
										<div class="row gx-3">
											<div class="col-lg-4 col-md-6">
												<div class="mb-3">
													<label class="form-label">Name<span class="text-danger ms-1">*</span></label>
													<input type="text" class="form-control">
												</div>
											</div>
											<div class="col-lg-4 col-md-6">
												<div class="mb-3">
													<label class="form-label">Email<span class="text-danger ms-1">*</span></label>
													<input type="text" class="form-control">
												</div>
											</div>
											<div class="col-lg-4 col-md-6">
												<div class="mb-3">
													<label class="form-label">Mobile Number<span class="text-danger ms-1">*</span></label>
													<input type="text" class="form-control">
												</div>
											</div>
											<div class="col-lg-4 col-md-6">
												<div class="mb-3">
													<label class="form-label">Gender</label>
													<select class="select">
														<option>Select</option>
														<option>Male</option>
														<option>Female</option>
													</select>
												</div>
											</div>
											<div class="col-lg-4 col-md-6">
												<div class="mb-3">
													<label class="form-label">DOB</label>
													<div class="input-group position-relative mb-3">
														<input type="text" class="form-control datetimepicker rounded-end" placeholder="25 Mar 2025">
														<span class="input-icon-addon fs-16 text-gray-9">
															<i class="isax isax-calendar-2"></i>
														</span>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="border-bottom mb-3">
										<div class="d-flex align-items-center mb-3">
											<span class="bg-dark avatar avatar-sm me-2 flex-shrink-0"><i class="isax isax-info-circle fs-14"></i></span>
											<h6 class="fs-16 fw-semibold">Address Information</h6>
										</div>
										<div class="row gx-3">
											<div class="col-lg-12">
												<div class="mb-3">
													<label class="form-label">Address</label>
													<input type="text" class="form-control">
												</div>
											</div>
											<div class="col-md-6">
												<div class="mb-3">
													<label class="form-label">Country</label>
													<select class="select">
														<option>Select</option>
														<option>United States</option>
														<option>Canada</option>
														<option>UK</option>
														<option>Germany</option>
														<option>France</option>
													</select>
												</div>
											</div>
											<div class="col-md-6">
												<div class="mb-3">
													<label class="form-label">State</label>
													<select class="select">
														<option>Select</option>
														<option>California</option>
														<option>Ontario</option>
														<option>Bavaria</option>
														<option>Wellington</option>
														<option>Le-de-France</option>
													</select>
												</div>
											</div>
											<div class="col-md-6">
												<div class="mb-3">
													<label class="form-label">City<span class="text-danger ms-1">*</span></label>
													<select class="select">
														<option>Select</option>
														<option>Los Angeles</option>
														<option>Toronto</option>
														<option>London</option>
														<option>Munich</option>
														<option>Sydney</option>
													</select>
												</div>
											</div>
											<div class="col-md-6">
												<div class="mb-3">
													<label class="form-label">Postal Code<span class="text-danger ms-1">*</span></label>
													<input type="text" class="form-control">
												</div>
											</div>
										</div>
									</div>
									<div class="d-flex align-items-center justify-content-between">
										<button type="button" class="btn btn-outline-white">Cancel</button>
										<button type="submit" class="btn btn-primary">Save Changes</button>
									</div>
								</form>
							</div>
						</div><!-- end col -->
					</div>
					<!-- end row -->

				</div><!-- end col -->
			</div>
			<!-- end row -->

		</div>
		<!-- End Content -->

		<!-- Start Footer-->
		<div class="footer d-sm-flex align-items-center justify-content-between bg-white py-2 px-4">
			<p class="text-dark mb-0">&copy; 2025 <a href="javascript:void(0);" class="link-primary">Kanakku</a>, All Rights Reserved</p>
			<p class="text-dark">Version : 1.3.8</p>
		</div>
		<!-- End Footer-->
	</div>

	<!-- ========================
		End Page Content
	========================= -->
@endsection