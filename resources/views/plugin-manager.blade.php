c<?php $page = 'plugin-manager'; ?>
@extends('layout.mainlayout')
@section('content')
 
 <!-- ========================
			Start Page Content
		========================= -->

        <div class="page-wrapper">

			<!-- Start Container  -->
            <div class="content">

				<!-- start row  -->
                <div class="row justify-content-center">
                    <div class="col-lg-12">

						<!-- start row -->
                        <div class=" row settings-wrapper d-flex">
                            @component('components.settings-sidebar')
                            @endcomponent

                            <div class="col-xl-9 col-lg-8">
                                <div class="mb-3 pb-3 border-bottom d-flex align-items-center justify-content-between flex-wrap gap-3">
                                    <h6 class="fw-bold mb-0">Plugin Manager</h6>
                                    <div class="d-flex align-items-center">
                                        <a href="javascript:void(0);" class="btn btn-primary d-inline-flex align-items-center" data-bs-toggle="modal" data-bs-target="#google_login"><i class="isax isax-add-circle5 me-1"></i>New Plugin</a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card shadow-none">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center justify-content-between border-0 mb-3 pb-0 flex-wrap gap-2">
                                                    <div class="d-flex align-items-center">
                                                        <span class="avatar avatar-lg p-2 bg-light rounded flex-shrink-0 me-2"><img src="{{URL::asset('build/img/icons/paypal.svg')}}" alt="Img"></span>
                                                        <p class="fw-medium text-gray-9">PayPal</p>
                                                    </div>
                                                    <span class="badge badge-soft-primary">Version : 8.78.1</span>
                                                </div>
                                                <p class="text-truncate line-clamb-2">PayPal is a global digital payments platform that enables secure, fast online transactions.</p>
                                            </div>
                                            <div class="card-footer bg-light d-flex align-items-center justify-content-between ">
                                                <div class="d-flex align-items-center">
                                                    <a class="btn btn-sm btn-dark rounded-2 d-inline-flex align-items-center justify-content-center p-1 me-2" href="#" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash"></i></a>
                                                    <a class="btn btn-sm btn-dark rounded-2 d-inline-flex align-items-center justify-content-center p-1" href="#" data-bs-toggle="modal" data-bs-target="#google_login"><i class="isax isax-setting-2"></i></a>
                                                </div>
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input m-0" type="checkbox" checked>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card shadow-none">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center justify-content-between border-0 mb-3 pb-0 flex-wrap gap-2">
                                                    <div class="d-flex align-items-center">
                                                        <span class="avatar avatar-lg p-2 bg-light rounded flex-shrink-0 me-2"><img src="{{URL::asset('build/img/icons/google-analytics.svg')}}" alt="Img"></span>
                                                        <p class="fw-medium text-gray-9">Google Analytics</p>
                                                    </div>
                                                    <span class="badge badge-soft-primary">Version : GA4</span>
                                                </div>
                                                <p class="text-truncate line-clamb-2">Google Analytics tracks and analyzes website traffic & user interactions to provide insights.</p>
                                            </div>
                                            <div class="card-footer bg-light d-flex align-items-center justify-content-between ">
                                                <div class="d-flex align-items-center">
                                                    <a class="btn btn-sm btn-dark rounded-2 d-inline-flex align-items-center justify-content-center p-1 me-2" href="#" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash"></i></a>
                                                    <a class="btn btn-sm btn-dark rounded-2 d-inline-flex align-items-center justify-content-center p-1" href="#" data-bs-toggle="modal" data-bs-target="#google_login"><i class="isax isax-setting-2"></i></a>
                                                </div>
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input m-0" type="checkbox" checked>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div>
						<!-- end row -->

                    </div>  <!-- end col -->
                </div>
				<!-- end row  -->

            </div>
			<!-- container  -->

            @component('components.footer')
            @endcomponent
        </div>


        <!-- ========================
			End Page Content
		========================= -->
@endsection