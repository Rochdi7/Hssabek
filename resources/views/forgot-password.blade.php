<?php $page = 'forgot-password'; ?>
@extends('layout.mainlayout')
@section('content')
    <!-- Start container -->
    <div class="container-fuild">
        <div class="w-100 overflow-hidden position-relative flex-wrap d-block vh-100">
            <div class="row justify-content-center align-items-center vh-100 overflow-auto flex-wrap ">
                <div class="col-lg-4 mx-auto">
                    <form action="{{url('email-verification')}}" class="d-flex justify-content-center align-items-center">
                        <div class="d-flex flex-column justify-content-lg-center p-4 p-lg-0 pb-0 flex-fill">
                            <div class=" mx-auto mb-5 text-center">
                                <img src="{{URL::asset('build/img/logo.svg')}}"
                                    class="img-fluid" alt="Logo">
                            </div>
                            <div class="card border-0 p-lg-3 shadow-lg rounded-2">
                                <div class="card-body">
                                    <div class="text-center mb-3">
                                        <h5 class="mb-2">Forgot Paassword</h5>
                                        <p class="mb-0">No worries, we’ll send you reset instructions</p>
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
                                        <button type="submit" class="btn bg-primary-gradient text-white w-100">Reset Password</button>
                                    </div>
                                    <div class="text-center">
                                        <h6 class="fw-normal fs-14 text-dark mb-0">Return to
                                            <a href="{{url('login')}}" class="hover-a"> Sign In</a>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- End container -->
@endsection