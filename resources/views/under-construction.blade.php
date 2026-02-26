<?php $page = 'under-construction'; ?>
@extends('layout.mainlayout')
@section('content')
    <!-- Start container -->
    <div class="container-fuild">
        <div class="w-100 overflow-hidden position-relative flex-wrap d-block vh-100">
            <div class="row justify-content-center align-items-center vh-100 overflow-auto flex-wrap ">
                <div class="col-lg-6">
                    <div class="d-flex flex-column align-items-center justify-content-center">
                        <div class="error-images mb-3">
                            <img src="{{URL::asset('build/img/under-construction.svg')}}" alt="image" class="img-fluid">
                        </div>
                        <div class="text-center">
                            <h4 class="mb-3">We are Under Construction</h4>
                            <p class="fs-16 text-center">Sorry for any inconvenience caused, we have almost done 
                                <br> Will get back soon! 
                            </p>
                            <div class="d-flex justify-content-center pb-3">
                                <a href="{{url('index')}}" class="btn btn-primary d-flex align-items-center "><i class="isax isax-arrow-left me-2"></i>Back to Dashboard</a>
                            </div>
                        </div>
                    </div>                   
                </div>
            </div>
        </div>
    </div>
    <!-- End container -->
@endsection