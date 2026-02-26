<?php $page = 'email-settings'; ?>
@extends('layout.mainlayout')
@section('content')
    <!-- ========================
        Start Page Content
    ========================= -->

    <div class="page-wrapper">

        <!-- Start Content -->
        <div class="content">
            <div class="row">
                <div class="col-lg-12 mx-auto">
                    <div class="row">
                        <!-- Start settings sidebar -->
                        @component('components.settings-sidebar')
                        @endcomponent                        
                        <!-- End settings sidebar -->
                        <div class="col-xl-9 col-lg-8">
                            <div>
                                <div class="pb-3 d-flex align-items-center justify-content-between border-bottom mb-3">
                                    <h6 class="mb-0">Email Settings</h6>
                                    <a href="javascript:void(0);" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#sendgrid"><i class="isax isax-send-25 me-1"></i>Send Test Email</a>
                                </div>
                                <div class="mb-0">
                                    <div class="row">
                                        <div class="col-md-6 d-flex">
                                            <div class="card flex-fill">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center justify-content-between mb-3 flex-wrap gap-2">
                                                        <div class="d-flex align-items-center">
                                                            <span class="avatar avatar-lg bg-light me-2 p-2 flex-shrink-0">
                                                                <img src="{{URL::asset('build/img/settings/phpmail.svg')}}" class="img-fluid" alt="img">
                                                            </span>
                                                            <p class="text-gray-9 fw-medium">PHP Mailer</p>
                                                        </div>
                                                        <span class="badge badge-soft-success d-flex align-items-center">
                                                            <span class="badge-dot bg-success me-1"></span>
                                                            Connected
                                                        </span>
                                                    </div>
                                                    <p class="fs-13">Used to send emails safely and easily via PHP code from a web server.</p>
                                                </div>
                                                <div class="card-footer bg-light">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <a href="javascript:void(0);" class="btn btn-sm btn-dark rounded-2 d-inline-flex align-items-center justify-content-center p-1 me-2" data-bs-toggle="modal" data-bs-target="#delete_modal">
                                                                <i class="isax isax-trash fs-14"></i>
                                                            </a>
                                                            <a href="javascript:void(0);" class="btn btn-sm btn-dark rounded-2 d-inline-flex align-items-center justify-content-center p-1 me-2" data-bs-toggle="modal" data-bs-target="#phpmailersettings">
                                                                <i class="isax isax-setting-2 fs-14"></i>
                                                            </a>
                                                        </div>
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input ms-0" type="checkbox" role="switch" checked>
                                                        </div>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 d-flex">
                                            <div class="card flex-fill">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center justify-content-between mb-3 flex-wrap gap-2">
                                                        <div class="d-flex align-items-center">
                                                            <span class="avatar avatar-lg bg-light me-2 p-2 flex-shrink-0">
                                                                <img src="{{URL::asset('build/img/settings/smtp.svg')}}" class="img-fluid" alt="img">
                                                            </span>
                                                            <p class="text-gray-9 fw-medium">SMTP</p>
                                                        </div>
                                                        <span class="badge badge-soft-success d-flex align-items-center">
                                                            <span class="badge-dot bg-success me-1"></span>
                                                            Connected
                                                        </span>
                                                    </div>
                                                    <p class="fs-13">SMTP is used to send, relay or forward messages from a mail client.</p>
                                                </div>
                                                <div class="card-footer bg-light">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <a href="javascript:void(0);" class="btn btn-sm btn-dark rounded-2 d-inline-flex align-items-center justify-content-center p-1 me-2" data-bs-toggle="modal" data-bs-target="#delete_modal">
                                                                <i class="isax isax-trash fs-14"></i>
                                                            </a>
                                                            <a href="javascript:void(0);" class="btn btn-sm btn-dark rounded-2 d-inline-flex align-items-center justify-content-center p-1 me-2" data-bs-toggle="modal" data-bs-target="#smtpsettings">
                                                                <i class="isax isax-setting-2 fs-14"></i>
                                                            </a>
                                                        </div>
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input ms-0" type="checkbox" role="switch" checked>
                                                        </div>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 d-flex">
                                            <div class="card flex-fill">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center justify-content-between mb-3 flex-wrap gap-2">
                                                        <div class="d-flex align-items-center">
                                                            <span class="avatar avatar-lg bg-light me-2 p-2 flex-shrink-0">
                                                                <img src="{{URL::asset('build/img/settings/sendgrid.svg')}}" class="img-fluid" alt="img">
                                                            </span>
                                                            <p class="text-gray-9 fw-medium">Send Grid</p>
                                                        </div>
                                                        <span class="badge badge-soft-primary d-flex align-items-center">
                                                            <span class="badge-dot bg-dark me-1"></span>
                                                            Not Connected
                                                        </span>
                                                    </div>
                                                    <p class="fs-13">Cloud-based email marketing tool that assists marketers and developers.</p>
                                                </div>
                                                <div class="card-footer bg-light">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <a href="javascript:void(0);" class="btn btn-sm btn-dark rounded-2 d-inline-flex align-items-center justify-content-center p-1 me-2" data-bs-toggle="modal" data-bs-target="#delete_modal">
                                                                <i class="isax isax-trash fs-14"></i>
                                                            </a>
                                                            <a href="javascript:void(0);" class="btn btn-sm btn-dark rounded-2 d-inline-flex align-items-center justify-content-center p-1 me-2" data-bs-toggle="modal" data-bs-target="#phpmailersettings">
                                                                <i class="isax isax-setting-2 fs-14"></i>
                                                            </a>
                                                        </div>
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input ms-0" type="checkbox" role="switch" checked>
                                                        </div>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Content -->

        <!-- Footer-->
        <div class="footer d-sm-flex align-items-center justify-content-between bg-white py-2 px-4 border-top">
            <p class="text-dark mb-0">&copy; 2025 <a href="javascript:void(0);" class="link-primary">Kanakku</a>, All Rights Reserved</p>
            <p class="text-dark">Version : 1.3.8</p>
        </div>
            <!-- End Footer -->
    </div>

    <!-- ========================
        End Page Content
    ========================= -->
@endsection