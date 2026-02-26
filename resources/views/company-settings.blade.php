<?php $page = 'company-settings'; ?>
@extends('layout.mainlayout')
@section('content')
    <!-- ========================
        Start Page Content
    ========================= --> 

    <div class="page-wrapper">
        <div class="content">
            <!-- Start Row -->
            <div class="row justify-content-center mb-4">
                <div class="col-lg-12">
                    <div class=" row settings-wrapper d-flex">
                        @component('components.settings-sidebar')
                        @endcomponent
                        <div class="col-xl-9 col-lg-8">
                            <div class="mb-4 pb-4 border-bottom">
                                <h6 class="fw-bold mb-0">Company Settings</h6>
                            </div>
                            <form action="{{url('company-settings')}}">
                                <div class="border-bottom mb-4">
                                    <div class="card-title-head">
                                        <h6 class="fs-16 fw-semibold mb-3 d-flex align-items-center">
                                            <span class="fs-16 me-2 p-1 rounded bg-dark text-white d-inline-flex align-items-center justify-content-center"><i class="isax isax-info-circle"></i></span> 
                                            General Information
                                        </h6>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-6 col-lg-6 col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    Company Name <span class="text-danger">*</span>
                                                </label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    Email Address <span class="text-danger">*</span>
                                                </label>
                                                <input type="email" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    Mobile Number <span class="text-danger">*</span>
                                                </label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    Fax <span class="text-danger">*</span>
                                                </label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="border-bottom mb-4 pb-3">
                                    <div class="card-title-head">
                                        <h6 class="fs-16 fw-semibold mb-3 d-flex align-items-center">
                                            <span class="fs-16 me-2 p-1 rounded bg-dark text-white d-inline-flex align-items-center justify-content-center"><i class="isax isax-image"></i></span> 
                                            Company Images
                                        </h6>
                                    </div>
                                    <div class="row align-items-center pb-3 mb-3 border-bottom">
                                        <div class="col-xl-9">
                                            <div class="row gy-3 align-items-center">
                                                <div class="col-lg-6">
                                                    <div class="logo-info">
                                                        <h6 class="fs-14 fw-medium mb-1">Logo</h6>
                                                        <p class="fs-12">Upload Icon of your Company</p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="profile-pic-upload mb-0 justify-content-lg-end">
                                                        <div class="new-employee-field">
                                                            <div class="mb-0">
                                                                <div class="image-upload mb-1">
                                                                    <input type="file">
                                                                    <div class="image-uploads">
                                                                        <h4><i class="ti ti-upload me-1"></i>Change Photo</h4>
                                                                    </div>
                                                                </div>
                                                                <span class="fs-12">Recommended size is 250 px*100 px</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3">
                                            <div class="new-logo ms-xl-auto bg-light border">
                                                <img src="{{URL::asset('build/img/settings/company-setting-1.svg')}}" alt="Logo">
                                                <a href="javascript:void(0);" class="logo-trash bg-white text-danger me-1 mt-1"><i class="isax isax-trash"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row align-items-center pb-3 mb-3 border-bottom">
                                        <div class="col-xl-9">
                                            <div class="row gy-3 align-items-center">
                                                <div class="col-lg-6">
                                                    <div class="logo-info">
                                                        <h6 class="fs-14 fw-medium mb-1">Dark Logo</h6>
                                                        <p class="fs-12">Upload Dark Logo of your company </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="profile-pic-upload mb-0 justify-content-lg-end">
                                                        <div class="new-employee-field">
                                                            <div class="mb-0">
                                                                <div class="image-upload mb-1">
                                                                    <input type="file">
                                                                    <div class="image-uploads">
                                                                        <h4><i class="ti ti-upload me-1"></i>Change Photo</h4>
                                                                    </div>
                                                                </div>
                                                                <span class="fs-12">Recommended size is 250 px*100 px</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3">
                                            <div class="new-logo ms-xl-auto bg-dark border">
                                                <img src="{{URL::asset('build/img/settings/company-setting-2.svg')}}" alt="Logo">
                                                <a href="javascript:void(0);" class="logo-trash bg-white text-danger me-1 mt-1"><i class="isax isax-trash"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row align-items-center pb-3 mb-3 border-bottom">
                                        <div class="col-xl-9">
                                            <div class="row gy-3 align-items-center">
                                                <div class="col-lg-6">
                                                    <div class="logo-info">
                                                        <h6 class="fs-14 fw-medium mb-1">Mini Logo</h6>
                                                        <p class="fs-12">Upload Logo of your company </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="profile-pic-upload mb-0 justify-content-lg-end">
                                                        <div class="new-employee-field">
                                                            <div class="mb-0">
                                                                <div class="image-upload mb-1">
                                                                    <input type="file">
                                                                    <div class="image-uploads">
                                                                        <h4><i class="ti ti-upload me-1"></i>Change Photo</h4>
                                                                    </div>
                                                                </div>
                                                                <span class="fs-12">Recommended size is 250 px*100 px</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3">
                                            <div class="new-logo ms-xl-auto bg-light border">
                                                <img src="{{URL::asset('build/img/settings/company-setting-1.svg')}}" alt="Logo">
                                                <a href="javascript:void(0);" class="logo-trash bg-white text-danger me-1 mt-1"><i class="isax isax-trash"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row align-items-center pb-3 mb-3 border-bottom">
                                        <div class="col-xl-9">
                                            <div class="row gy-3 align-items-center">
                                                <div class="col-lg-6">
                                                    <div class="logo-info">
                                                        <h6 class="fs-14 fw-medium mb-1">Dark Mini Logo</h6>
                                                        <p class="fs-12">Upload Dark Mini Logo of your company </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="profile-pic-upload mb-0 justify-content-lg-end">
                                                        <div class="new-employee-field">
                                                            <div class="mb-0">
                                                                <div class="image-upload mb-1">
                                                                    <input type="file">
                                                                    <div class="image-uploads">
                                                                        <h4><i class="ti ti-upload me-1"></i>Change Photo</h4>
                                                                    </div>
                                                                </div>
                                                                <span class="fs-12">Recommended size is 250 px*100 px</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3">
                                            <div class="new-logo ms-xl-auto bg-dark border">
                                                <img src="{{URL::asset('build/img/settings/company-setting-4.svg')}}" alt="Logo">
                                                <a href="javascript:void(0);" class="logo-trash bg-white text-danger me-1 mt-1"><i class="isax isax-trash"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row align-items-center pb-3 mb-3 border-bottom">
                                        <div class="col-xl-9">
                                            <div class="row gy-3 align-items-center">
                                                <div class="col-lg-6">
                                                    <div class="logo-info">
                                                        <h6 class="fs-14 fw-medium mb-1">Favicon</h6>
                                                        <p class="fs-12">Upload Logo of your company </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="profile-pic-upload mb-0 justify-content-lg-end">
                                                        <div class="new-employee-field">
                                                            <div class="mb-0">
                                                                <div class="image-upload mb-1">
                                                                    <input type="file">
                                                                    <div class="image-uploads">
                                                                        <h4><i class="ti ti-upload me-1"></i>Change Photo</h4>
                                                                    </div>
                                                                </div>
                                                                <span class="fs-12">Recommended size is 250 px*100 px</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3">
                                            <div class="new-logo ms-xl-auto bg-light border">
                                                <img src="{{URL::asset('build/img/settings/company-setting-3.svg')}}" alt="Logo">
                                                <a href="javascript:void(0);" class="logo-trash bg-white text-danger me-1 mt-1"><i class="isax isax-trash"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-xl-9">
                                            <div class="row gy-3 align-items-center">
                                                <div class="col-lg-6">
                                                    <div class="logo-info">
                                                        <h6 class="fs-14 fw-medium mb-1">Apple Icon</h6>
                                                        <p class="fs-12">Upload Logo of your company </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="profile-pic-upload mb-0 justify-content-lg-end">
                                                        <div class="new-employee-field">
                                                            <div class="mb-0">
                                                                <div class="image-upload mb-1">
                                                                    <input type="file">
                                                                    <div class="image-uploads">
                                                                        <h4><i class="ti ti-upload me-1"></i>Change Photo</h4>
                                                                    </div>
                                                                </div>
                                                                <span class="fs-12">Recommended size is 250 px*100 px</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3">
                                            <div class="new-logo ms-xl-auto bg-light border">
                                                <img src="{{URL::asset('build/img/settings/company-setting-3.svg')}}" alt="Logo">
                                                <a href="javascript:void(0);" class="logo-trash bg-white text-danger me-1 mt-1"><i class="isax isax-trash"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="company-address pb-2 mb-4 border-bottom">
                                    <div class="card-title-head">
                                        <h6 class="fs-16 fw-bold mb-3 d-flex align-items-center">
                                            <span class="fs-16 me-2 p-1 rounded bg-dark text-white d-inline-flex align-items-center justify-content-center"><i class="isax isax-map"></i></span> 
                                            Address Information
                                        </h6>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    Address <span class="text-danger">*</span>
                                                </label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    Country <span class="text-danger">*</span>
                                                </label>
                                                <select class="select">
                                                    <option>Select</option>
                                                    <option>USA</option>
                                                    <option>India</option>
                                                    <option>French</option>
                                                    <option>Australia</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    State <span class="text-danger">*</span>
                                                </label>
                                                <select class="select">
                                                    <option>Select</option>
                                                    <option>Alaska</option>
                                                    <option>Mexico</option>
                                                    <option>Tasmania</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    City <span class="text-danger">*</span>
                                                </label>
                                                <select class="select">
                                                    <option>Select</option>
                                                    <option>Anchorage</option>
                                                    <option>Tijuana</option>
                                                    <option>Hobart</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    Postal Code <span class="text-danger">*</span>
                                                </label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-between settings-bottom-btn mt-0">
                                    <button type="button" class="btn btn-outline-white me-2">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Row -->

            @component('components.footer')
            @endcomponent
        </div>
    </div>

    <!-- ========================
        End Page Content
    ========================= -->
@endsection