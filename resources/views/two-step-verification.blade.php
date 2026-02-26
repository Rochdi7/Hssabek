<?php $page = 'two-step-verifcation'; ?>
@extends('layout.mainlayout')
@section('content')
    <!-- ========================
        Start Page Content
    ========================= -->

    <div class="container-fuild">
        <div class="w-100 overflow-hidden position-relative flex-wrap d-block vh-100">
            <!-- row start -->
            <div class="row justify-content-center align-items-center vh-100 overflow-auto flex-wrap ">
                <div class="col-lg-4 mx-auto">
                    <form action="{{url('reset-password')}}" class="digit-group d-flex justify-content-center align-items-center">
                        <div class="d-flex flex-column justify-content-lg-center p-4 p-lg-0 pb-0 flex-fill">
                            <div class=" mx-auto mb-5 text-center">
                                <img src="{{URL::asset('build/img/logo.svg')}}" class="img-fluid" alt="Logo">
                            </div>
                            <!-- card start -->
                            <div class="card border-0 p-lg-3 shadow-lg rounded-2">
                                <!-- card body start -->
                                <div class="card-body">
                                    <div class="mb-3 text-center">
                                        <span><i class="isax isax-tick-circle5 text-success fs-48"></i></span>
                                    </div>
                                    <div class="text-center mb-3">
                                        <h5 class="mb-2">Reset Password</h5>
                                        <p class="mb-0">We sent a code to info@example.com</p>
                                    </div>
                                    <div class="text-center otp-input">
                                        <div class="d-flex align-items-center justify-content-center mb-3">
                                            <input type="text" class=" rounded text-center fs-26 fw-bold me-3" id="digit-1" name="digit-1" data-next="digit-2" maxlength="1">
                                            <input type="text" class=" rounded text-center fs-26 fw-bold me-3" id="digit-2" name="digit-2" data-next="digit-3" data-previous="digit-1" maxlength="1">
                                            <input type="text" class=" rounded text-center fs-26 fw-bold me-3" id="digit-3" name="digit-3" data-next="digit-4" data-previous="digit-2" maxlength="1">
                                            <input type="text" class=" rounded text-center fs-26 fw-bold" id="digit-4" name="digit-4" data-next="digit-5" data-previous="digit-3" maxlength="1">
                                        </div>
                                        <div class="d-flex justify-content-center">
                                            <div class="mb-3 d-flex align-items-center ">
                                                <p class="text-gray-9 me-4 mb-0">Didn't receive code. <a href="javascript:void(0);" class="text-primary">Resend Code</a></p>
                                                <span class="text-danger">00:45</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <button type="submit" class="btn bg-primary-gradient text-white w-100">Reset Password</button>
                                    </div>
                                </div>
                                <!-- card body end -->
                            </div>
                            <!-- card end -->
                        </div>
                    </form>
                </div>

            </div>
            <!-- row end -->
        </div>
    </div>

    <!-- ========================
        End Page Content
    ========================= -->
@endsection