<?php $page = 'edit-product'; ?>
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
                            <h6><a href="{{url('products')}}"><i class="isax isax-arrow-left me-2"></i>Products</a></h6>
                            <a href="#" class="btn btn-outline-white d-inline-flex align-items-center"><i class="isax isax-eye me-1"></i>Preview</a>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h6 class="mb-3">Basic Details</h6>
                                <form action="{{url('edit-product')}}">
                                    <div class="mb-3">
                                        <span class="text-gray-9 fw-bold mb-2 d-flex">Project Image<span class="text-danger ms-1">*</span></span>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar avatar-xxl border border-dashed bg-light me-3 flex-shrink-0">
                                                <div class="position-relative d-flex align-items-center">
                                                    <img src="{{URL::asset('build/img/products/product-05.jpg')}}" class="avatar avatar-xl " alt="User Img">
                                                    <a href="javascript:void(0);" class="rounded-trash trash-top d-flex align-items-center justify-content-center"><i class="isax isax-trash"></i></a>
                                                </div>
                                            </div>
                                            <div class="d-inline-flex flex-column align-items-start">
                                                <div class="drag-upload-btn btn btn-sm btn-primary position-relative mb-2">
                                                    <i class="isax isax-image me-1"></i>Upload Image
                                                    <input type="file" class="form-control image-sign" multiple="">
                                                </div>
                                                <span class="text-gray-9 fs-12">JPG or PNG format, not exceeding 5MB.</span>
                                            </div>
                                        </div>
                                    </div>
                                    <label class="form-label">Item Type <span class="text-danger">*</span></label>
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="form-check me-3">
                                            <input class="form-check-input" type="radio" name="Radio" id="Radio-sm-1" checked>
                                            <label class="form-check-label" for="Radio-sm-1">
                                                Product
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="Radio" id="Radio-sm-2">
                                            <label class="form-check-label" for="Radio-sm-2">
                                                Service
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row gx-3">
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Name <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" value="Adidas Ultraboost 22 Running Shoe">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Code <span class="text-danger">*</span></label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control" value="PR345466">
                                                    <a href="#" class="btn btn-sm btn-dark position-absolute end-0 top-0 bottom-0 mx-2 my-1 d-inline-flex align-items-center">Generate</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Category <span class="text-danger">*</span></label>
                                                <select class="select">
                                                    <option>Select</option>
                                                    <option>Smartphones</option>
                                                    <option>Laptops</option>
                                                    <option>Headphones</option>
                                                    <option>Computer Service</option>
                                                    <option selected>Footwear</option>
                                                    <option>Kitchen</option>
                                                    <option>Cleaning</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Selling Price ($) <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" value="99">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Purchase Price ($) <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" value="108">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Quantity <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" value="98">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Units <span class="text-danger">*</span></label>
                                                <select class="select">
                                                    <option>Select</option>
                                                    <option>Kilograms (Kg)</option>
                                                    <option>Gram (g)</option>
                                                    <option>Liter (l)</option>
                                                    <option>Millimetre (mm)</option>
                                                    <option>Milliliter (ml)</option>
                                                    <option>Pack (pk)</option>
                                                    <option selected>Piece (pc)</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Discount Type <span class="text-danger">*</span></label>
                                                <select class="select">
                                                    <option>Select</option>
                                                    <option selected>%</option>
                                                    <option>Fixed</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Barcode <span class="text-danger">*</span></label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control" value="0129-4597">
                                                    <a href="#" class="btn btn-sm btn-dark position-absolute end-0 top-0 bottom-0 mx-2 my-1 d-inline-flex align-items-center">Generate</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Alert Quantity <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" value="100">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Tax <span class="text-danger">*</span></label>
                                                <select class="select">
                                                    <option>Select</option>
                                                    <option selected>VAT (10%)</option>
                                                    <option>CGST (08%)</option>
                                                    <option>SGST (10%)</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label class="form-label">Product Description</label>
                                                <div class="editor"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="mb-3 pb-3 border-bottom">
                                                <label class="form-label">Gallery Images</label>
                                                <div class="file-upload drag-file w-100 d-flex align-items-center justify-content-center flex-column mb-3">
                                                    <span class="upload-img d-block mb-2"><i class="isax isax-image text-primary"></i></span>
                                                    <p class="mb-0 text-gray-9 fw-semibold">Drop Your Files or <a href="#" class="text-primary text-decoration-underline">
                                                            Browse</a></p>
                                                    <input type="file" accept="video/image">
                                                    <p class="fs-13">Max Upload  Size 800x800px. PNG / JPEG file, Maximum Upload size 5MB</p>
                                                </div>
                                                <div class="d-flex align-items-center gap-3">
                                                    <div class="avatar avatar-xl border gallery-img p-1 ">
                                                        <img src="{{URL::asset('build/img/products/product-10.jpg')}}" alt="User Img">
                                                        <a href="javascript:void(0);" class="rounded-trash gallery-trash d-flex align-items-center justify-content-center"><i class="isax isax-trash"></i></a>
                                                    </div>
                                                    <div class="avatar avatar-xl border gallery-img p-1 ">
                                                        <img src="{{URL::asset('build/img/products/product-11.jpg')}}" alt="User Img">
                                                        <a href="javascript:void(0);" class="rounded-trash gallery-trash d-flex align-items-center justify-content-center"><i class="isax isax-trash"></i></a>
                                                    </div>
                                                    <div class="avatar avatar-xl border gallery-img p-1 ">
                                                        <img src="{{URL::asset('build/img/products/product-12.jpg')}}" alt="User Img">
                                                        <a href="javascript:void(0);" class="rounded-trash gallery-trash d-flex align-items-center justify-content-center"><i class="isax isax-trash"></i></a>
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