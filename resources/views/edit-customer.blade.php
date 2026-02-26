<?php $page = 'edit-customer'; ?>
@extends('layout.mainlayout')
@section('content')
    <!-- ========================
        Start Page Content
    ========================= -->

    <div class="page-wrapper">
        <div class="content">
            <!-- start row -->
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div>
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h6><a href="{{url('customers')}}"><i class="isax isax-arrow-left me-2"></i>Customer</a></h6>
                            <a href="#" class="btn btn-outline-white d-inline-flex align-items-center"><i class="isax isax-eye me-1"></i>Preview</a>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h6 class="mb-3">Basic Details</h6>
                                <form action="{{url('edit-customer')}}">
                                    <div class="mb-3">
                                        <span class="text-gray-9 fw-bold mb-2 d-flex">Project Image <span class="text-danger">*</span></span>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar avatar-xxl border border-dashed bg-light me-3 flex-shrink-0">
                                                <div class="position-relative d-flex align-items-center">
                                                    <img src="{{URL::asset('build/img/profiles/avatar-16.jpg')}}" class="avatar avatar-xl " alt="User Img">
                                                    <a href="javascript:void(0);" class="rounded-trash trash-top d-flex align-items-center justify-content-center"><i class="isax isax-trash"></i></a>
                                                </div>
                                            </div>
                                            <div class="d-inline-flex flex-column align-items-start">
                                                <div class="drag-upload-btn btn btn-sm btn-primary position-relative mb-2">
                                                    <i class="isax isax-image me-1"></i>Upload Image
                                                    <input type="file" class="form-control image-sign" multiple="">
                                                </div>
                                                <span class="text-gray-9">JPG or PNG format, not exceeding 5MB.</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row gx-3">
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Name <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" value="Mitchel Johnson">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Email <span class="text-danger">*</span></label>
                                                <input type="email" class="form-control" value="mitchel@example.com">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Phone Number <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" value="+1 9876543210">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Currency</label>
                                                <select class="select">
                                                    <option>Select</option>
                                                    <option selected>Dollar</option>
                                                    <option>Euro</option>
                                                    <option>Yen</option>
                                                    <option>Pound</option>
                                                    <option>Rupee</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Website</label>
                                                <input type="text" class="form-control" value="https://www.example.com">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Notes</label>
                                                <input type="text" class="form-control" value="Ensure all details are accurate.">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="border-top my-2">
                                        <div class="row gx-5">
                                            <div class="col-md-6 ">
                                                <h6 class="mb-3 pt-4">Billing Address</h6>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="mb-3">
                                                            <label class="form-label">Name</label>
                                                            <input type="text" class="form-control" value="Mitchel Johnson">
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="mb-3">
                                                            <label class="form-label">Address Line 1</label>
                                                            <input type="text" class="form-control" value="1234, Sunset Boulevard">
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="mb-3">
                                                            <label class="form-label">Address Line 2</label>
                                                            <input type="text" class="form-control" value="Los Angeles, CA 900026, USA">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="form-label">Country</label>
                                                            <select class="select">
                                                                <option>Select</option>
                                                                <option selected>United States</option>
                                                                <option>Canada</option>
                                                                <option>UK</option>
                                                                <option>Germany</option>
                                                                <option>France</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="form-label">State</label>
                                                            <select class="select">
                                                                <option>Select</option>
                                                                <option selected>California</option>
                                                                <option>Ontario</option>
                                                                <option>Bavaria</option>
                                                                <option>Wellington</option>
                                                                <option>Le-de-France</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="form-label">City</label>
                                                            <select class="select">
                                                                <option>Select</option>
                                                                <option selected>Los Angeles</option>
                                                                <option>Toronto</option>
                                                                <option>London</option>
                                                                <option>Munich</option>
                                                                <option>Sydney</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="form-label">Pincode</label>
                                                            <input type="text" class="form-control" value="900026">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="d-flex align-items-center justify-content-between mb-3 pt-4">
                                                    <h6>Shipping Address</h6>
                                                    <a href="#" class="d-inline-flex align-items-center text-primary text-decoration-underline fs-13">
                                                        <i class="isax isax-document-copy me-1"></i>Copy From Billing
                                                    </a>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="mb-3">
                                                            <label class="form-label">Name</label>
                                                            <input type="text" class="form-control" value="Mitchel Johnson">
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="mb-3">
                                                            <label class="form-label">Address Line 1</label>
                                                            <input type="text" class="form-control" value="1234, Sunset Boulevard">
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="mb-3">
                                                            <label class="form-label">Address Line 2</label>
                                                            <input type="text" class="form-control" value="Los Angeles, CA 900026, USA">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="form-label">Country</label>
                                                            <select class="select">
                                                                <option>Select</option>
                                                                <option selected>United States</option>
                                                                <option>Canada</option>
                                                                <option>UK</option>
                                                                <option>Germany</option>
                                                                <option>France</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="form-label">State</label>
                                                            <select class="select">
                                                                <option>Select</option>
                                                                <option selected>California</option>
                                                                <option>Ontario</option>
                                                                <option>Bavaria</option>
                                                                <option>Wellington</option>
                                                                <option>Le-de-France</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="form-label">City</label>
                                                            <select class="select">
                                                                <option>Select</option>
                                                                <option selected>Los Angeles</option>
                                                                <option>Toronto</option>
                                                                <option>London</option>
                                                                <option>Munich</option>
                                                                <option>Sydney</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="form-label">Pincode</label>
                                                            <input type="text" class="form-control" value="900026">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="border-top my-2">
                                        <h6 class="mb-3 pt-4">Banking Details</h6>
                                        <div class="row gx-3">
                                            <div class="col-lg-4 col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Bank Name</label>
                                                    <input type="text" class="form-control" value="ABCD International Bank">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Branch</label>
                                                    <input type="text" class="form-control" value="MNOP Branch">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Account Holder</label>
                                                    <input type="text" class="form-control" value="Mitchel Johnson">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Account Number</label>
                                                    <input type="text" class="form-control" value="988722543618">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">IFSC</label>
                                                    <input type="text" class="form-control" value="ABCD00001234">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between pt-4 border-top">
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
        
        <!-- Footer Start -->
        <div class="footer d-sm-flex align-items-center justify-content-between bg-white py-2 px-4">
            <p class="text-dark mb-0">&copy; 2025 <a href="javascript:void(0);" class="link-primary">Kanakku</a>, All Rights Reserved</p>
            <p class="text-dark">Version : 1.3.8</p>
        </div>
        <!-- Footer End -->

    </div>

    <!-- ========================
        End Page Content
    ========================= -->
@endsection