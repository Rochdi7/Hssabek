<?php $page = 'free-trail'; ?>
@extends('layout.mainlayout')
@section('content')
	<!-- ========================
		Start Page Content
	========================= -->

	<!-- Start Content -->
	<div class="container-fuild">
		<div class="w-100 overflow-hidden position-relative flex-wrap d-block vh-100">

			<!-- start row -->
			<div class="row justify-content-center align-items-center vh-100 overflow-auto flex-wrap ">
				<div class="col-lg-4 mx-auto">
					<form action="{{url('login')}}" class="d-flex justify-content-center align-items-center">
						<div class="d-flex flex-column justify-content-lg-center p-4 p-lg-0 pt-lg-4 pb-0 flex-fill">
							<div class="mx-auto mb-5 text-center">
								<img src="{{URL::asset('build/img/logo.svg')}}" class="img-fluid" alt="Logo">
							</div>
							<div class="card border-0 p-lg-3">
								<div class="card-body">
									<div class="text-center mb-3">
										<h5 class="mb-2">Free Trial</h5>
										<p class="mb-0">Please enter your details to create a free trial account</p>
									</div>
									<div class="mb-3">
										<label class="form-label">Organization Name</label>
										<div class="input-group">
											<span class="input-group-text border-end-0">
												<i class="isax isax-buildings-2"></i>
											</span>
											<input type="text" value="" class="form-control border-start-0 ps-0" placeholder="Name">
										</div>
									</div>
									<div class="mb-3">
										<label class="form-label">Email Address</label>
										<div class="input-group">
											<span class="input-group-text border-end-0">
												<i class="isax isax-sms-notification"></i>
											</span>
											<input type="text" value="" class="form-control border-start-0 ps-0" placeholder="Enter Email Address">
										</div>
									</div>
									<div class="mb-3">
										<label class="form-label">Organization Size</label>
										<div class="input-group">
											<span class="input-group-text"><i class="isax isax-profile-2user"></i></span>
											<select class="form-select" aria-label="Filter select">
												<option>Select Organization Size</option>
												<option>1-10</option>
												<option>11-15</option>
												<option>50+</option>
											</select>
										</div>
									</div>
									<div class="mb-3">
										<label class="form-label">Organization Size</label>
										<div class="input-group">
											<span class="input-group-text"><i class="isax isax-buildings"></i></span>
											<select class="form-select" aria-label="Filter select">
												<option>Select Industry</option>
												<option>Animation</option>
												<option>Computer Networking</option>
												<option>Information Technology/IT</option>
											</select>
										</div>
									</div>
									<div class="d-flex align-items-center justify-content-between mb-3">
										<div class="d-flex align-items-center">
											<div class="form-check form-check-md mb-0">
												<input class="form-check-input" id="remember_me" type="checkbox">
												<label for="remember_me" class="form-check-label mt-0">I agree to the</label>
												<div class="d-inline-flex"><a href="#" class="text-decoration-underline me-1">Terms of Service</a> and <a href="#" class="text-decoration-underline ms-1"> Privacy Policy</a></div>
											</div>
										</div>
									</div>
									<div>
										<button type="submit" class="btn btn-primary bg-gradient w-100">Create Free Trial</button>
									</div>
								</div> <!-- end card-body -->
							</div> <!-- end card -->
						</div>
					</form>
				</div> <!-- end col -->
			</div>
			<!-- end row -->
		</div>
	</div>
	<!-- End Content -->

	<!-- ========================
		End Page Content
	========================= -->
@endsection