<?php $page = 'gdpr-cookies'; ?>
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
				<div class="col-lg-12 mx-auto">
					<div class="row">
                        <!-- Start settings sidebar -->
                        @component('components.settings-sidebar')
                        @endcomponent                        
                        <!-- End settings sidebar -->
						<div class="col-xl-9 col-lg-8">
							<div class="mb-3">
								<div class="pb-3 d-flex align-items-center justify-content-between border-bottom mb-3">
									<h6 class="mb-0">GDPR Cookies</h6>
								</div>
								<form action="{{url('gdpr-cookies')}}">
								<div class="mb-3">
									<div class="row mb-3 align-items-center justify-content-between">
										<div class="col-xl-4 d-flex">
											<div class="d-flex align-items-center justify-content-center">
												<label class="form-label">Cookies Position <span class="text-danger">*</span></label>
											</div>
										</div> <!-- end col -->
										<div class="col-xl-6">
											<div>
												<select class="select">
													<option>Select</option>
													<option>Right</option>
													<option>Left</option>
												</select>
											</div> 
										</div> <!-- end col -->
									</div> <!-- end row -->
									<div class="row mb-3 align-items-center justify-content-between">
										<div class="col-xl-4 d-flex">
											<div class="d-flex align-items-center justify-content-center">
												<label class="form-label">Agree Button Text <span class="text-danger">*</span></label>
											</div>
										</div> <!-- end col -->
										<div class="col-xl-6">
											<div>
												<input type="text" class="form-control">
											</div> 
										</div> <!-- end col -->
									</div> <!-- end row -->
									<div class="row mb-3 align-items-center justify-content-between">
										<div class="col-xl-4 d-flex">
											<div class="d-flex align-items-center justify-content-center">
												<label class="form-label">Decline Button Text <span class="text-danger">*</span></label>
											</div>
										</div> <!-- end col -->
										<div class="col-xl-6">
											<div>
												<input type="text" class="form-control">
											</div> 
										</div> <!-- end col -->
									</div> <!-- end row -->
									<div class="row mb-3 align-items-center">
										<div class="col-9 d-flex">
											<div class="d-flex align-items-center justify-content-center">
												<label class="form-label">Show Decline Button <span class="text-danger">*</span></label>
											</div>
										</div> <!-- end col -->
										<div class="col-3">
											<div class="form-check form-check-sm form-switch text-end">
												<label class="form-check-label form-label m-0">
												<input class="form-check-input form-label" type="checkbox" role="switch" checked="">
												</label>
											</div>
										</div> <!-- end col -->
									</div> <!-- end row -->
									<div class="row mb-3 ">
										<div class="col-xl-4 d-flex">
											<div class="d-flex align-items-center justify-content-center">
												<label class="form-label">Cookies Content Text <span class="text-danger">*</span></label>
											</div>
										</div> <!-- end col -->
										<div class="col-xl-8">
											<div>
												<div class="summernote"></div>
											</div>
										</div> <!-- end col -->
									</div> <!-- end row -->																			
									<div class="row align-items-center">
										<div class="col-xl-4 d-flex">
											<div class="d-flex align-items-center justify-content-center">
												<label class="form-label">Links for Cookies Page <span class="text-danger">*</span></label>
											</div>
										</div> <!-- end col -->
										<div class="col-xl-8">
											<div>
												<input type="text" class="form-control">
											</div> 
										</div> <!-- end col -->
									</div> <!-- end row -->
								</div>
								<div class="d-flex align-items-center justify-content-between border-top pt-4">
									<a href="javascript:void(0);" class="btn btn-outline-white">Cancel</a>
									<a href="javascript:void(0);" class="btn btn-primary">Save Changes</a>
								</div>
							</form>
							</div>
						</div> <!-- end col -->
					</div>  <!-- end row -->
				</div>
			</div> <!-- end col -->
			<!-- end row -->

		</div>
		<!-- End Content -->

		<!-- Start Footer-->
		<div class="footer d-sm-flex align-items-center justify-content-between bg-white py-2 px-4 border-top">
			<p class="text-dark mb-0">&copy; 2025 <a href="javascript:void(0);" class="link-primary">Kanakku</a>, All Rights Reserved</p>
			<p class="text-dark">Version : 1.3.8</p>
		</div>
		<!-- End Footer-->
	</div>

	<!-- ========================
		End Page Content
	========================= -->
@endsection