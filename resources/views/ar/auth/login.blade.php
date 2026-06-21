<?php $page = 'login'; ?>
@extends('backoffice.layout.mainlayout')
@section('content')
    <!-- ========================
                            Start Page Content
                        ========================= -->

    <!-- Start container -->
    <div class="container-fuild" dir="rtl">
        <div class="w-100 overflow-hidden position-relative flex-wrap d-block vh-100">
            <div class="row justify-content-center align-items-center vh-100 overflow-auto flex-wrap ">
                <div class="col-lg-4 mx-auto">
                    <form method="POST" action="{{ route('login') }}"
                        class="d-flex justify-content-center align-items-center">
                        @csrf
                        <div class="d-flex flex-column justify-content-lg-center p-4 p-lg-0 pb-0 flex-fill">
                            <div class=" mx-auto mb-5 text-center">
                                <img src="{{ URL::asset('assets/images/logo/hssabek mobile logo.png') }}" class="img-fluid"
                                    alt="Logo">
                            </div>
                            <div class="card border-0 p-lg-3 shadow-lg">
                                <div class="card-body">
                                    <div class="text-center mb-3">
                                        <h5 class="mb-2">تسجيل الدخول</h5>
                                        <p class="mb-0">يرجى إدخال بيانات الاعتماد الخاصة بك للوصول إلى لوحة التحكم
                                        </p>
                                    </div>

                                    @if (session('success'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <div class="d-flex align-items-center">
                                                <i class="isax isax-tick-circle ms-2"></i>
                                                <div>
                                                    {{ session('success') }}
                                                </div>
                                            </div>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="إغلاق"></button>
                                        </div>
                                    @endif

                                    @if ($errors->any())
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <div class="d-flex align-items-center">
                                                <i class="isax isax-close-circle ms-2"></i>
                                                <div>
                                                    @foreach ($errors->all() as $error)
                                                        <div>{{ $error }}</div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="إغلاق"></button>
                                        </div>
                                    @endif

                                    <div class="mb-3">
                                        <label class="form-label">البريد الإلكتروني</label>
                                        <div class="input-group">
                                            <span class="input-group-text border-end-0">
                                                <i class="isax isax-sms-notification"></i>
                                            </span>
                                            <input type="email" name="email" value="{{ old('email') }}"
                                                class="form-control border-start-0 ps-0 @error('email') is-invalid @enderror"
                                                placeholder="أدخل البريد الإلكتروني" required>
                                            @error('email')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">كلمة المرور</label>
                                        <div class="pass-group input-group">
                                            <span class="input-group-text border-end-0">
                                                <i class="isax isax-lock"></i>
                                            </span>
                                            <span class="isax toggle-passwords isax-eye-slash"></span>
                                            <input type="password" name="password"
                                                class="pass-inputs form-control border-start-0 ps-0 @error('password') is-invalid @enderror"
                                                placeholder="****************" required>
                                            @error('password')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                        <div class="d-flex align-items-center">
                                            <div class="form-check form-check-md mb-0">
                                                <input class="form-check-input" id="remember_me" name="remember"
                                                    type="checkbox">
                                                <label for="remember_me" class="form-check-label mt-0">تذكرني</label>
                                            </div>
                                        </div>
                                        <div class="text-end">
                                            <a href="{{ route('password.request') }}">نسيت كلمة المرور</a>
                                        </div>
                                    </div>

                                    <div class="mb-1">
                                        <button type="submit" class="btn bg-primary-gradient text-white w-100">تسجيل
                                            الدخول</button>
                                    </div>


                                    <div class="text-center">
                                        <h6 class="fw-normal fs-14 text-dark mb-0">ليس لديك حساب بعد؟
                                            <a href="{{ route('register') }}" class="hover-a"> إنشاء حساب</a>
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

    <!-- ========================
                            End Page Content
                        ========================= -->
@endsection
