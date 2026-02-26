<?php $page = 'edit-blog'; ?>
@extends('layout.mainlayout')
@section('content')
    <!-- ========================
        Start Page Content
    ========================= -->

    <div class="page-wrapper">

        <!-- Start Content -->
        <div class="content">

            <!-- start row -->
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div>
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h6><a href="{{url('blogs')}}"><i class="isax isax-arrow-left me-2"></i>All Blogs</a></h6>
                            <a href="#" class="btn btn-outline-white d-inline-flex align-items-center"><i class="isax isax-eye me-1"></i>Preview</a>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h5 class="mb-3">Edit Blog</h5>
                                <form action="{{url('blogs')}}">
                                    <div class="mb-3">
                                        <h6 class=" mb-2">Basic Details</h6>
                                    </div>
                                    <div class="row gx-3">
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Title<span class="text-danger ms-1">*</span></label>
                                                <input type="text" class="form-control" value="Small Businesses Automate Accounting">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Category<span class="text-danger ms-1">*</span></label>
                                                <select class="select">
                                                    <option>Select</option>
                                                    <option>Invoicing</option>
                                                    <option selected>Accounting</option>
                                                    <option>ExpenseManagement</option>
                                                    <option>BusinessFinance</option>
                                                    <option>Technology</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Tag<span class="text-danger ms-1">*</span></label>
                                                <input class="input-tags form-control" id="inputBox" type="text" data-role="tagsinput" name="specialist" value="Main, Accounts">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label class="form-label">Content<span class="text-danger ms-1">*</span></label>
                                                <div class="editor">Learn how automation can save time, reduce errors, and help small businesses manage their finances efficiently.</div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="mb-3 pb-3 border-bottom">
                                                <label class="form-label">Images</label>
                                                <div class="file-upload drag-file w-100 d-flex align-items-center justify-content-center flex-column">
                                                    <span class="upload-img d-block mb-2"><i class="isax isax-folder-open text-primary fs-16"></i></span>
                                                    <p class="mb-0 text-gray-9">Drop your files here or<a href="#" class="text-primary text-decoration-underline">
                                                            browse</a></p>
                                                    <input type="file" accept="video/image">
                                                    <p class="fs-13">Maximum size : 50 MB</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="row mb-3 border-bottom">
                                                <div class="col-lg-4">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                                <div class="d-flex align-items-center">
                                                                    <img src="{{URL::asset('build/img/media/img-07.png')}}" alt="img" class="avatar avatar-lg rounded me-2">
                                                                    <div>
                                                                        <a href="javascript:void(0);" class="fs-14 fw-medium d-block">Blog1.jpg</a>
                                                                        <span class="fs-13">15.45 KB</span>
                                                                    </div>
                                                                </div>
                                                                <a href="javascript:void(0);" class="btn p-1 btn-light rounded-circle d-inline-flex align-items-center justify-content-center"><i class="isax isax-trash"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <button type="button" class="btn btn-outline-white">Cancel</button>
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </form>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div>
                </div><!-- end col -->
            </div>
            <!-- end row -->

        </div>
        <!-- End Content -->

        <!-- Start Footer-->
        <div class="footer d-sm-flex align-items-center justify-content-between bg-white py-2 px-4 border-top">
            <p class="text-dark mb-0">&copy; 2025 <a href="javascript:void(0);" class="link-primary">Kanakku</a>, All Rights Reserved</p>
            <p class="text-dark">Version : 1.3.8</p>
        </div>
        <!-- End Footer-->

    </div>

    <!-- ========================
        End Page Content
    ========================= -->
@endsection