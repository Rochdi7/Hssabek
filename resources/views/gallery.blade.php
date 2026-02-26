<?php $page = 'gallery'; ?>
@extends('layout.mainlayout')
@section('content')
	<!-- ========================
		Start Page Content
	========================= -->

	<div class="page-wrapper">	

		<!-- Start container -->
		<div class="content content-two">

			<!-- start row -->
			<div class="row justify-content-center">
				<div class="col-lg-12">   
					<div class="mb-3 border-bottom pb-3">
						<h6 class="mb-0">Gallery</h6>
					</div>              
					<div class="card mb-0">
						<div class="card-body pb-0">
							<div class="row row-cols-2 row-cols-sm-4 row-cols-md-5">
								<div class="col mb-3">
									<a href="{{URL::asset('build/img/gallery/gallery-01.png')}}" data-fancybox="gallery" class="gallery-item">
										<img src="{{URL::asset('build/img/gallery/gallery-01.png')}}" class="rounded" alt="img">
									</a>
								</div> <!-- end col -->
								<div class="col mb-3">
									<a href="{{URL::asset('build/img/gallery/gallery-02.png')}}" data-fancybox="gallery" class="gallery-item">
										<img src="{{URL::asset('build/img/gallery/gallery-02.png')}}" class="rounded" alt="img">
									</a>
								</div> <!-- end col -->
								<div class="col mb-3">
									<a href="{{URL::asset('build/img/gallery/gallery-03.png')}}" data-fancybox="gallery" class="gallery-item">
										<img src="{{URL::asset('build/img/gallery/gallery-03.png')}}" class="rounded" alt="img">
									</a>
								</div> <!-- end col -->
								<div class="col mb-3">
									<a href="{{URL::asset('build/img/gallery/gallery-04.png')}}" data-fancybox="gallery" class="gallery-item">
										<img src="{{URL::asset('build/img/gallery/gallery-04.png')}}" class="rounded" alt="img">
									</a>
								</div> <!-- end col -->
								<div class="col mb-3">
									<a href="{{URL::asset('build/img/gallery/gallery-05.png')}}" data-fancybox="gallery" class="gallery-item">
										<img src="{{URL::asset('build/img/gallery/gallery-05.png')}}" class="rounded" alt="img">
									</a>
								</div> <!-- end col -->
								<div class="col mb-3">
									<a href="{{URL::asset('build/img/gallery/gallery-06.png')}}" data-fancybox="gallery" class="gallery-item">
										<img src="{{URL::asset('build/img/gallery/gallery-06.png')}}" class="rounded" alt="img">
									</a>
								</div> <!-- end col -->
								<div class="col mb-3">
									<a href="{{URL::asset('build/img/gallery/gallery-07.png')}}" data-fancybox="gallery" class="gallery-item">
										<img src="{{URL::asset('build/img/gallery/gallery-07.png')}}" class="rounded" alt="img">
									</a>
								</div> <!-- end col -->
								<div class="col mb-3">
									<a href="{{URL::asset('build/img/gallery/gallery-08.png')}}" data-fancybox="gallery" class="gallery-item">
										<img src="{{URL::asset('build/img/gallery/gallery-08.png')}}" class="rounded" alt="img">
									</a>
								</div> <!-- end col -->
								<div class="col mb-3">
									<a href="{{URL::asset('build/img/gallery/gallery-09.png')}}" data-fancybox="gallery" class="gallery-item">
										<img src="{{URL::asset('build/img/gallery/gallery-09.png')}}" class="rounded" alt="img">
									</a>
								</div> <!-- end col -->
								<div class="col mb-3">
									<a href="{{URL::asset('build/img/gallery/gallery-10.png')}}" data-fancybox="gallery" class="gallery-item">
										<img src="{{URL::asset('build/img/gallery/gallery-10.png')}}" class="rounded" alt="img">
									</a>
								</div> <!-- end col -->
								<div class="col mb-3">
									<a href="{{URL::asset('build/img/gallery/gallery-11.png')}}" data-fancybox="gallery" class="gallery-item">
										<img src="{{URL::asset('build/img/gallery/gallery-11.png')}}" class="rounded" alt="img">
									</a>
								</div> <!-- end col -->
								<div class="col mb-3">
									<a href="{{URL::asset('build/img/gallery/gallery-12.png')}}" data-fancybox="gallery" class="gallery-item">
										<img src="{{URL::asset('build/img/gallery/gallery-12.png')}}" class="rounded" alt="img">
									</a>
								</div> <!-- end col -->
								<div class="col mb-3">
									<a href="{{URL::asset('build/img/gallery/gallery-13.png')}}" data-fancybox="gallery" class="gallery-item">
										<img src="{{URL::asset('build/img/gallery/gallery-13.png')}}" class="rounded" alt="img">
									</a>
								</div> <!-- end col -->
								<div class="col mb-3">
									<a href="{{URL::asset('build/img/gallery/gallery-14.png')}}" data-fancybox="gallery" class="gallery-item">
										<img src="{{URL::asset('build/img/gallery/gallery-14.png')}}" class="rounded" alt="img">
									</a>
								</div> <!-- end col -->
								<div class="col mb-3">
									<a href="{{URL::asset('build/img/gallery/gallery-15.png')}}" data-fancybox="gallery" class="gallery-item">
										<img src="{{URL::asset('build/img/gallery/gallery-15.png')}}" class="rounded" alt="img">
									</a>
								</div> <!-- end col -->
							</div> <!-- end row -->
						</div> <!-- end card-body -->
					</div> <!-- end card -->
				</div> <!-- end col -->
			</div>     
			<!-- end row -->

		</div>
		<!-- End container -->

		@component('components.footer')
		@endcomponent


	</div>

	<!-- ========================
		End Page Content
	========================= -->
@endsection