<?php $page = 'lock-screen'; ?>
@extends('layout.mainlayout')
@section('content')
    <!-- ========================
        Start Page Content
    ========================= -->

    <!-- Start container -->
    <div class="container-fuild">
        <div class="w-100 overflow-hidden position-relative flex-wrap d-block vh-100">
            <div class="row justify-content-center align-items-center vh-100 overflow-auto flex-wrap ">
                <div class="col-lg-4 mx-auto">
                    <form action="{{url('email-verification')}}" class="d-flex justify-content-center align-items-center">
                        <div class="d-flex flex-column justify-content-lg-center p-4 p-lg-0 pb-0 flex-fill">
                            <div class=" mx-auto mb-5 text-center">
                                <img src="{{URL::asset('build/img/logo.svg')}}" class="img-fluid" alt="Logo">
                            </div>
                            <div class="card border-0 p-lg-3 shadow-lg rounded-2">
                                <div class="card-body">
                                    <div class="text-center mb-3">
                                        <h5 class="mb-2">Welcome Back!</h5>
                                    </div>
                                    <div class="text-center mb-3">
                                        <span class="avatar avatar-xl rounded-circle flex-shrink-0">
                                            <img src="{{URL::asset('build/img/users/user-01.jpg')}}" class="rounded-circle" alt="img">
                                        </span>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Password</label>
                                        <div class="pass-group input-group">
                                            <span class="input-group-text border-end-0">
                                                <i class="isax isax-lock"></i>
                                            </span>
                                            <span class="isax toggle-passwords isax-eye-slash"></span>
                                            <input type="password" class="pass-inputs form-control border-start-0 ps-0" placeholder="****************">
                                        </div>
                                    </div>
                                    <div class="mb-0">
                                        <button type="submit" class="btn bg-primary-gradient text-white w-100">Login</button>
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

    <!-- ========================
        End Page Content
    ========================= -->
@endsection