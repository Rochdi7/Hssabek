<?php $page = 'success'; ?>
@extends('layout.mainlayout')
@section('content')
    <!-- Start container -->
    <div class="container-fuild">
        <div class="w-100 overflow-hidden position-relative flex-wrap d-block vh-100">
            
            <!-- row start -->
            <div class="row justify-content-center align-items-center vh-100 overflow-auto flex-wrap ">
                <div class="col-lg-4 mx-auto">
                    <div class="d-flex justify-content-center align-items-center">
                        <div class="d-flex flex-column justify-content-lg-center p-4 p-lg-0 pb-0 flex-fill">
                            <div class=" mx-auto mb-5 text-center">
                                <img src="{{URL::asset('build/img/logo.svg')}}" class="img-fluid" alt="Logo">
                            </div>
                            <!-- card start -->
                            <div class="card border-0 p-lg-3">
                                <!-- card body start -->
                                <div class="card-body">
                                    <div class="mb-3 text-center">
                                        <span><i class="isax isax-tick-circle5 text-success fs-48"></i></span>
                                    </div>
                                    <div class="text-center mb-3">
                                        <h5 class="mb-2">Success</h5>
                                        <p class="mb-0">Your new password has been successfully saved.</p>
                                    </div>
                                    <div>
                                        <a href="{{url('login')}}" class="btn btn-primary bg-gradient w-100">Back to Sign In</a>
                                    </div>
                                </div>
                                <!-- card body end -->
                            </div>
                            <!-- card end -->
                        </div>
                    </div>
                </div>

            </div>
            <!-- row end -->
        </div>
    </div>
    <!-- End container -->
@endsection