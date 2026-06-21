<?php $page = 'email-verification'; ?>
@extends('backoffice.layout.mainlayout')
@section('content')
    <!-- Start Content -->
    <div class="container-fuild" dir="rtl">
        <div class="w-100 overflow-hidden position-relative flex-wrap d-block vh-100">
            <div class="row justify-content-center align-items-center vh-100 overflow-auto flex-wrap ">
                <div class="col-lg-4 mx-auto">
                    <div class="d-flex justify-content-center align-items-center">
                        <div class="d-flex flex-column justify-content-lg-center p-4 p-lg-0 pb-0 flex-fill">
                            <div class=" mx-auto mb-5 text-center">
                                <img src="{{ URL::asset('assets/images/logo/hssabek mobile logo.png') }}" class="img-fluid"
                                    alt="Logo">
                            </div>
                            <div class="card border-0 p-lg-3 shadow-lg rounded-2">
                                <div class="card-body">
                                    <div class="mb-3 text-center">
                                        <span><i class="isax isax-tick-circle5 text-success fs-48"></i></span>
                                    </div>
                                    <div class="text-center mb-3">
                                        <h5 class="mb-2">تحقق من بريدك الإلكتروني</h5>
                                        <p class="mb-0">لقد أرسلنا رابط التحقق إلى عنوان بريدك الإلكتروني
                                        </p>
                                    </div>

                                    @if (session('status'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <div class="d-flex align-items-center">
                                                <i class="isax isax-verify ms-2"></i>
                                                <div>{{ session('status') }}</div>
                                            </div>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="إغلاق"></button>
                                        </div>
                                    @endif

                                    <div class="text-center mb-3">
                                        <p class="mb-2">لم تستلم البريد الإلكتروني؟</p>
                                        <form method="POST" action="{{ route('verification.send') }}"
                                            style="display: inline;">
                                            @csrf
                                            <button type="submit" class="btn btn-link p-0">إعادة إرسال رابط
                                                التحقق</button>
                                        </form>
                                    </div>

                                    <div>
                                        <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                                            @csrf
                                            <button type="submit" class="btn bg-primary-gradient text-white w-100">العودة
                                                إلى تسجيل الدخول</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- End container -->
@endsection
