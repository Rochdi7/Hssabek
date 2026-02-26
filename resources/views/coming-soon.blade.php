<?php $page = 'coming-soon'; ?>
@extends('layout.mainlayout')
@section('content')
    <!-- Start content -->
    <div class="container-fuild">
        <div class="w-100 overflow-hidden position-relative flex-wrap d-block vh-100">
            <div class="row justify-content-center align-items-center vh-100 overflow-auto flex-wrap ">
                <div class="col-lg-6 mx-auto">
                    <div class="card">
                        <div class="comming-soon-pg d-flex flex-column align-items-center justify-content-center">
                            <div class="mb-2 p-4">
                                <img src="{{URL::asset('build/img/favicon.png')}}" alt="logo" class="img-fluid">
                            </div>
                            <div>
                                <p class="mb-2">Our Website is</p>
                            </div>
                            <div class="d-flex align-items-center justify-content-center mb-2">
                                <h1 class="text-primary text-center">COMING <span class="text-dark">SOON</span></h1>
                            </div>
                            <p class="fs-16 text-gray text-center">Please check back later, We are working hard  to get <br> everything  just  right.</p>
                            <ul class="d-inline-flex list-unstyled align-items-center justify-content-center mb-3">
                                <li class="me-sm-3 me-2">
                                    <div class="d-flex flex-column align-items-center">
                                        <div class="d-fle align-items-center mb-2 justify-content-center flex-column border rounded bg-light px-sm-4 py-sm-3 p-2">
                                            <h3 class="days fs-sm-30 text-dark fs-24">54</h3>
                                            <p class="text-gray fw-medium fs-16">Days</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="text-dark fw-normal fs-18 me-sm-3 mb-2 me-2">:</li>
                                <li class="me-sm-3 me-2">
                                    <div class="d-flex flex-column align-items-center">
                                        <div class="d-flex align-items-center mb-2 justify-content-center flex-column border rounded bg-light px-sm-4 py-sm-3 p-2">
                                            <h3 class="hours fs-sm-30 text-dark fs-24">2</h3>
                                            <p class="text-gray fw-medium fs-16">Hrs</p>
                                        </div>
                                    </div>
                                    <li class="text-dark fw-normal fs-18 me-sm-3 mb-2 me-2">:</li>
                                <li class="me-sm-3 me-2">
                                    <div class="d-flex flex-column align-items-center">
                                        <div class="d-flex align-items-center mb-2 justify-content-center flex-column border rounded bg-light px-sm-4 py-sm-3 p-2">
                                            <h3 class="minutes fs-sm-30 text-dark fs-24">54</h3>
                                            <p class="text-gray fw-medium fs-16">Min</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="text-dark fw-normal fs-18 me-sm-3 mb-2 me-2">:</li>
                                <li>
                                    <div class="d-flex flex-column align-items-center">
                                        <div class="d-flex align-items-center mb-2 justify-content-center flex-column border rounded bg-light px-sm-4 py-sm-3 p-2">
                                            <h3 class="seconds fs-sm-30 text-dark fs-24">10</h3>
                                            <p class="text-gray fw-medium fs-16">Sec</p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <div class="w-75">
                                <div class="subscribe-form w-100">
                                    <div class="mb-3">
                                        <p class="d-flex text-gray-9 text-center justify-content-center fw-normal fs-16">Subscribe to get notified!</p>
                                    </div>
                                        <div class="bg-transparent border p-2 d-flex align-items-center rounded ps-0 mb-3">
                                            <input type="email" class="form-control bg-transparent border-0" placeholder="Enter Your Email">
                                            <a href="javascript:void(0);" class="btn btn-primary">Subscribe</a>
                                        </div>
                                </div>
                                <div class="d-flex flex-wrap justify-content-center align-items-center pb-4">
                                    <a href="javascript:void(0);" class="btn btn-dark rounded-circle btn-icon btn-sm me-2 d-flex align-items-center justify-content-center">
                                        <img src="{{URL::asset('build/img/icons/facebook-white.svg')}}" class="img-fluid">
                                    </a>
                                    <a href="javascript:void(0);" class="btn btn-dark rounded-circle btn-icon btn-sm me-2 d-flex align-items-center justify-content-center">
                                        <img src="{{URL::asset('build/img/icons/instagram.svg')}}" class="img-fluid">
                                    </a>
                                    <a href="javascript:void(0);" class="btn btn-dark rounded-circle btn-icon btn-sm me-2 d-flex align-items-center justify-content-center">
                                        <img src="{{URL::asset('build/img/icons/twitter.svg')}}" class="img-fluid">
                                    </a>
                                    <a href="javascript:void(0);" class="btn btn-dark rounded-circle btn-icon btn-sm me-2 d-flex align-items-center justify-content-center">
                                        <img src="{{URL::asset('build/img/icons/pinterest.svg')}}" class="img-fluid">
                                    </a>
                                    <a href="javascript:void(0);" class="btn btn-dark rounded-circle btn-icon btn-sm d-flex align-items-center justify-content-center">
                                        <img src="{{URL::asset('build/img/icons/linkedin.svg')}}" class="img-fluid">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>                        
                </div>
            </div>
        </div>
    </div>
    <!-- End content -->
@endsection