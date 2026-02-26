<?php $page = 'seo-setup'; ?>
@extends('layout.mainlayout')
@section('content')
    <!-- ========================
        Start Page Content
    ========================= -->

    <div class="page-wrapper">

        <!-- Start Content -->
        <div class="content">
            <!-- start row -->
            <div class="row justify-content-center">
                <div class="col-xl-12">
                    <!-- start row -->
                    <div class="row settings-wrapper d-flex">
                        <!-- Start settings sidebar -->
                        @component('components.settings-sidebar')
                        @endcomponent                        
                        <!-- End settings sidebar -->

                        <div class="col-xl-9 col-lg-8">
                            <div class="mb-3 pb-3 border-bottom">
                                <h6 class="fw-bold mb-0">SEO Setup</h6>
                            </div>
                            <form action="{{url('seo-setup')}}">
                                <div class="mb-3 border-bottom">
                                    <h6 class="fw-semibold fs-16 mb-3">SEO Setup - Site Meta</h6>
                                    <div class="mb-3">
                                        <label class="form-label">Meta Title<span class="text-danger ms-1">*</span></label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Site Description<span class="text-danger ms-1">*</span></label>
                                        <div class="editor"></div>
                                    </div>
                                    <div class="mb-3 pb-3 border-bottom">
                                        <label class="form-label">Keywords<span class="text-danger ms-1">*</span></label>
                                        <input class="input-tags form-control" id="inputBox" type="text" data-role="tagsinput" name="specialist" value="Test">
                                        <span class="fs-13 mt-1 d-flex">Enter value separated by comma</span>
                                    </div>
                                    <h6 class="fw-bold fs-16 mb-3">SEO Setup - OG Meta</h6>
                                    <div class="mb-3">
                                        <label class="form-label">Meta Image <span class="text-danger">*</span></label>
                                        <div class="d-flex align-items-center flex-wrap row-gap-3 mb-3">
                                            <div class="d-flex align-items-center bg-light justify-content-center avatar avatar-xxl border me-3 flex-shrink-0 text-dark frames">
                                                <i class="isax isax-image text-gray-4 fs-12"></i>
                                            </div>
                                            <div class="profile-upload">
                                                <div class="profile-uploader d-flex align-items-center">
                                                    <div class="drag-upload-btn btn btn-md btn-primary">
                                                        <i class="isax isax-image fs-14 me-1"></i> Upload Image
                                                        <input type="file" class="form-control image-sign" multiple="">
                                                    </div>
                                                </div>
                                                <div class="mt-2">
                                                    <p class="fs-12">JPG or PNG format, not exceeding 5MB.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Meta Title<span class="text-danger ms-1">*</span></label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Site Description<span class="text-danger ms-1">*</span></label>
                                        <div class="editor"></div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Keywords<span class="text-danger ms-1">*</span></label>
                                        <input class="input-tags form-control" id="inputBox1" type="text" data-role="tagsinput" name="specialist" value="Test">
                                        <span class="fs-13 mt-1 d-flex">Enter value separated by comma</span>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between">
                                        <a href="javascript:void(0);" class="btn btn-outline-white me-3" data-bs-dismiss="modal">Cancel</a>
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </div>
                            </form>
                        </div><!-- end col -->
                    </div>
                    <!-- end row -->
                </div><!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- End Content -->

        <!-- Start Footer -->
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