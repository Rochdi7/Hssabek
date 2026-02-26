<?php $page = 'blogs'; ?>
@extends('layout.mainlayout')
@section('content')
    <!-- ========================
        Start Page Content
    ========================= -->
    <div class="page-wrapper">

        <!-- Start Content -->
        <div class="content content-two">

            <!-- Page Header -->
            <div class="d-flex d-block align-items-center justify-content-between flex-wrap gap-3 mb-3">
                <div>
                    <h6>All Blogs</h6>
                </div>
                <div class="d-flex my-xl-auto right-content align-items-center flex-wrap gap-2">
                    <div>
                        <a href="{{url('add-blog')}}" class="btn btn-primary d-flex align-items-center">
                            <i class="isax isax-add-circle5 me-1"></i>Add New Blog
                        </a>
                    </div>
                </div>
            </div>
            <!-- End Page Header -->

            <ul class="nav nav-tabs nav-bordered mb-3">
                <li class="nav-item"><a class="nav-link active" href="javascript:void(0);" data-bs-toggle="tab" data-bs-target="#tab1">Active </a></li>
                <li class="nav-item"><a class="nav-link" href="javascript:void(0);" data-bs-toggle="tab" data-bs-target="#tab2">Inactive </a></li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane active" id="tab1" role="tabpanel" tabindex="0">

                    <!-- start row -->
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6">
                            <div class="card">
                                <div class="card-body p-0">
                                    <div class="position-relative">
                                        <a href="{{url('blog-details')}}" class="rounded">
                                            <img src="{{URL::asset('build/img/media/img-06.png')}}" class="img-fluid rounded w-100" alt="img">
                                        </a>
                                        <span class="trend-tag badge bg-info badge-sm position-absolute">Invoicing</span>
                                        <div class="action-item dot-icon ">
                                            <a href="javascript:void(0);" data-bs-toggle="dropdown" class="bg-white">
                                                <i class="isax isax-more"></i>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="{{url('edit-blog')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-edit me-2"></i>Edit</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="p-3">
                                        <div class="d-flex align-items-center justify-content-between mb-3">
                                            <span class="d-flex align-items-center"><i class="isax isax-calendar-1 me-1"></i>14 Mar 2025</span>
                                            <a href="javascript:void(0);" class="fs-14 fw-normal text-truncate d-flex align-items-center"><img src="{{URL::asset('build/img/users/user-08.jpg')}}" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0" alt="Img">Gertrude Bowie</a>
                                        </div>
                                        <h6 class="fs-16 mb-3"><a href="{{url('blog-details')}}">5 Must-Have Features in Invoicing</a></h6>
                                        <p class="">Discover the key features every invoicing tool should have to simplify payments and improve cash flow.</p>
                                    </div>
                                </div>
                                <!-- end card body -->
                            </div>
                            <!-- end card -->
                        </div><!-- end col -->
                        <div class="col-lg-4 col-md-6">
                            <div class="card">
                                <div class="card-body p-0">
                                    <div class="position-relative">
                                        <a href="{{url('blog-details')}}" class="rounded">
                                            <img src="{{URL::asset('build/img/media/img-07.png')}}" class="img-fluid rounded w-100" alt="img">
                                        </a>
                                        <span class="trend-tag badge bg-info badge-sm position-absolute">Accounting</span>
                                        <div class="action-item dot-icon ">
                                            <a href="javascript:void(0);" data-bs-toggle="dropdown" class="bg-white">
                                                <i class="isax isax-more"></i>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="{{url('edit-blog')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-edit me-2"></i>Edit</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="p-3">
                                        <div class="d-flex align-items-center justify-content-between mb-3">
                                            <span class="d-flex align-items-center"><i class="isax isax-calendar-1 me-1"></i>14 Mar 2025</span>
                                            <a href="javascript:void(0);" class="fs-14 fw-normal text-truncate d-flex align-items-center"><img src="{{URL::asset('build/img/profiles/avatar-28.jpg')}}" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0" alt="Img">Emily Clark</a>
                                        </div>
                                        <h6 class="fs-16 mb-3"><a href="{{url('blog-details')}}">Small Businesses Automate Accounting</a></h6>
                                        <p class="">Learn how automation can save time, reduce errors, and help small businesses manage their finances efficiently.</p>
                                    </div>
                                </div><!-- end card body -->
                            </div><!-- end card -->
                        </div><!-- end col -->
                        <div class="col-lg-4 col-md-6">
                            <div class="card">
                                <div class="card-body p-0">
                                    <div class="position-relative">
                                        <a href="{{url('blog-details')}}" class="rounded">
                                            <img src="{{URL::asset('build/img/media/img-08.png')}}" class="img-fluid rounded w-100" alt="img">
                                        </a>
                                        <span class="trend-tag badge bg-info badge-sm position-absolute">Expense Management</span>
                                        <div class="action-item dot-icon ">
                                            <a href="javascript:void(0);" data-bs-toggle="dropdown" class="bg-white">
                                                <i class="isax isax-more"></i>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="{{url('edit-blog')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-edit me-2"></i>Edit</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="p-3">
                                        <div class="d-flex align-items-center justify-content-between mb-3">
                                            <span class="d-flex align-items-center"><i class="isax isax-calendar-1 me-1"></i>14 Mar 2025</span>
                                            <a href="javascript:void(0);" class="fs-14 fw-normal text-truncate d-flex align-items-center"><img src="{{URL::asset('build/img/profiles/avatar-29.jpg')}}" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0" alt="Img">John Carter</a>
                                        </div>
                                        <h6 class="fs-16 mb-3"><a href="{{url('blog-details')}}">Top Strategies for Business Expenses</a></h6>
                                        <p class="">Effective ways to track expenses, cut unnecessary costs, and improve financial management for growing businesses.</p>
                                    </div>
                                </div><!-- end card body -->
                            </div><!-- end card -->
                        </div><!-- end col -->
                        <div class="col-lg-4 col-md-6">
                            <div class="card">
                                <div class="card-body p-0">
                                    <div class="position-relative">
                                        <a href="{{url('blog-details')}}" class="rounded">
                                            <img src="{{URL::asset('build/img/media/img-09.png')}}" class="img-fluid rounded w-100" alt="img">
                                        </a>
                                        <span class="trend-tag badge bg-info badge-sm position-absolute">Finance Tips</span>
                                        <div class="action-item dot-icon ">
                                            <a href="javascript:void(0);" data-bs-toggle="dropdown" class="bg-white">
                                                <i class="isax isax-more"></i>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="{{url('edit-blog')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-edit me-2"></i>Edit</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="p-3">
                                        <div class="d-flex align-items-center justify-content-between mb-3">
                                            <span class="d-flex align-items-center"><i class="isax isax-calendar-1 me-1"></i>14 Mar 2025</span>
                                            <a href="javascript:void(0);" class="fs-14 fw-normal text-truncate d-flex align-items-center"><img src="{{URL::asset('build/img/users/user-22.jpg')}}" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0" alt="Img">Olivia Harris</a>
                                        </div>
                                        <h6 class="fs-16 mb-3"><a href="{{url('blog-details')}}">A Beginner’s Guide to Digital Invoicing</a></h6>
                                        <p class="">New to digital invoicing? Here’s everything you need to know to create and send invoices professionally.</p>
                                    </div>
                                </div><!-- end card body -->
                            </div><!-- end card -->
                        </div><!-- end col -->
                        <div class="col-lg-4 col-md-6">
                            <div class="card">
                                <div class="card-body p-0">
                                    <div class="position-relative">
                                        <a href="{{url('blog-details')}}" class="rounded">
                                            <img src="{{URL::asset('build/img/media/img-10.png')}}" class="img-fluid rounded w-100" alt="img">
                                        </a>
                                        <span class="trend-tag badge bg-info badge-sm position-absolute">Business Finance</span>
                                        <div class="action-item dot-icon ">
                                            <a href="javascript:void(0);" data-bs-toggle="dropdown" class="bg-white">
                                                <i class="isax isax-more"></i>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="{{url('edit-blog')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-edit me-2"></i>Edit</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="p-3">
                                        <div class="d-flex align-items-center justify-content-between mb-3">
                                            <span class="d-flex align-items-center"><i class="isax isax-calendar-1 me-1"></i>14 Mar 2025</span>
                                            <a href="javascript:void(0);" class="fs-14 fw-normal text-truncate d-flex align-items-center"><img src="{{URL::asset('build/img/profiles/avatar-16.jpg')}}" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0" alt="Img">David Anderson</a>
                                        </div>
                                        <h6 class="fs-16 mb-3"><a href="{{url('blog-details')}}">How to Handle Late Payments</a></h6>
                                        <p class="">Dealing with overdue invoices? Learn the best strategies to follow up and get paid on time eveytime.</p>
                                    </div>
                                </div><!-- end card body -->
                            </div><!-- end card -->
                        </div><!-- end col -->
                        <div class="col-lg-4 col-md-6">
                            <div class="card">
                                <div class="card-body p-0">
                                    <div class="position-relative">
                                        <a href="{{url('blog-details')}}" class="rounded">
                                            <img src="{{URL::asset('build/img/media/img-11.png')}}" class="img-fluid rounded w-100" alt="img">
                                        </a>
                                        <span class="trend-tag badge bg-info badge-sm position-absolute">Tax & Compliance</span>
                                        <div class="action-item dot-icon ">
                                            <a href="javascript:void(0);" data-bs-toggle="dropdown" class="bg-white">
                                                <i class="isax isax-more"></i>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="{{url('edit-blog')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-edit me-2"></i>Edit</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="p-3">
                                        <div class="d-flex align-items-center justify-content-between mb-3">
                                            <span class="d-flex align-items-center"><i class="isax isax-calendar-1 me-1"></i>14 Mar 2025</span>
                                            <a href="javascript:void(0);" class="fs-14 fw-normal text-truncate d-flex align-items-center"><img src="{{URL::asset('build/img/profiles/avatar-17.jpg')}}" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0" alt="Img">Emma Lewis</a>
                                        </div>
                                        <h6 class="fs-16 mb-3"><a href="{{url('blog-details')}}">Understanding Tax Deductions</a></h6>
                                        <p class="">Maximize your savings! A guide to deductible expenses freelancers should track for tax season.</p>
                                    </div>
                                </div><!-- end card body -->
                            </div><!-- end card -->
                        </div><!-- end col -->
                        <div class="col-lg-4 col-md-6">
                            <div class="card">
                                <div class="card-body p-0">
                                    <div class="position-relative">
                                        <a href="{{url('blog-details')}}" class="rounded">
                                            <img src="{{URL::asset('build/img/media/img-12.png')}}" class="img-fluid rounded w-100" alt="img">
                                        </a>
                                        <span class="trend-tag badge bg-info badge-sm position-absolute">Technology</span>
                                        <div class="action-item dot-icon ">
                                            <a href="javascript:void(0);" data-bs-toggle="dropdown" class="bg-white">
                                                <i class="isax isax-more"></i>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="{{url('edit-blog')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-edit me-2"></i>Edit</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="p-3">
                                        <div class="d-flex align-items-center justify-content-between mb-3">
                                            <span class="d-flex align-items-center"><i class="isax isax-calendar-1 me-1"></i>14 Mar 2025</span>
                                            <a href="javascript:void(0);" class="fs-14 fw-normal text-truncate d-flex align-items-center"><img src="{{URL::asset('build/img/profiles/avatar-23.jpg')}}" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0" alt="Img">Robert Thomas</a>
                                        </div>
                                        <h6 class="fs-16 mb-3"><a href="{{url('blog-details')}}">Why Cloud-Based Accounting is Future</a></h6>
                                        <p class="">Explore the benefits of cloud accounting software and how it helps businesses stay organized from anywhere.</p>
                                    </div>
                                </div><!-- end card body -->
                            </div><!-- end card -->
                        </div><!-- end col -->
                        <div class="col-lg-4 col-md-6">
                            <div class="card">
                                <div class="card-body p-0">
                                    <div class="position-relative">
                                        <a href="{{url('blog-details')}}" class="rounded">
                                            <img src="{{URL::asset('build/img/media/img-13.png')}}" class="img-fluid rounded w-100" alt="img">
                                        </a>
                                        <span class="trend-tag badge bg-info badge-sm position-absolute">Reporting</span>
                                        <div class="action-item dot-icon ">
                                            <a href="javascript:void(0);" data-bs-toggle="dropdown" class="bg-white">
                                                <i class="isax isax-more"></i>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="{{url('edit-blog')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-edit me-2"></i>Edit</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="p-3">
                                        <div class="d-flex align-items-center justify-content-between mb-3">
                                            <span class="d-flex align-items-center"><i class="isax isax-calendar-1 me-1"></i>14 Mar 2025</span>
                                            <a href="javascript:void(0);" class="fs-14 fw-normal text-truncate d-flex align-items-center"><img src="{{URL::asset('build/img/profiles/avatar-07.jpg')}}" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0" alt="Img">Isabella Scott</a>
                                        </div>
                                        <h6 class="fs-16 mb-3"><a href="{{url('blog-details')}}">Best Practices for Financial Reporting</a></h6>
                                        <p class="">Learn how to generate accurate financial reports to analyze business performance and plan for growth.</p>
                                    </div>
                                </div><!-- end card body -->
                            </div><!-- end card -->
                        </div><!-- end col -->
                        <div class="col-lg-4 col-md-6">
                            <div class="card">
                                <div class="card-body p-0">
                                    <div class="position-relative">
                                        <a href="{{url('blog-details')}}" class="rounded">
                                            <img src="{{URL::asset('build/img/media/img-14.png')}}" class="img-fluid rounded w-100" alt="img">
                                        </a>
                                        <span class="trend-tag badge bg-info badge-sm position-absolute">Software Reviews</span>
                                        <div class="action-item dot-icon ">
                                            <a href="javascript:void(0);" data-bs-toggle="dropdown" class="bg-white">
                                                <i class="isax isax-more"></i>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="{{url('edit-blog')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-edit me-2"></i>Edit</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="p-3">
                                        <div class="d-flex align-items-center justify-content-between mb-3">
                                            <span class="d-flex align-items-center"><i class="isax isax-calendar-1 me-1"></i>14 Mar 2025</span>
                                            <a href="javascript:void(0);" class="fs-14 fw-normal text-truncate d-flex align-items-center"><img src="{{URL::asset('build/img/profiles/avatar-07.jpg')}}" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0" alt="Img">Sophia White</a>
                                        </div>
                                        <h6 class="fs-16 mb-3"><a href="{{url('blog-details')}}">How to Choose the Right Accounting</a></h6>
                                        <p class="">Confused about accounting tools? Here’s a step-by-step guide to selecting the best software for your business needs.</p>
                                    </div>
                                </div><!-- end card body -->
                            </div><!-- end card -->
                        </div><!-- end col -->
                        <div class="col-lg-12 col-md-12">
                            <div class="d-flex align-items-center justify-content-center">
                                <a href="javascript:void(0);" class="btn btn-dark d-inline-flex align-items-center"><i class="isax isax-rotate-right me-1"></i>Load More</a>
                            </div>
                        </div><!-- end col -->
                    </div>
                    <!-- end row -->
                </div>

                <div class="tab-pane" id="tab2" role="tabpanel" tabindex="0">

                    <!-- start row -->
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6">
                            <div class="card">
                                <div class="card-body p-0">
                                    <div class="position-relative">
                                        <a href="{{url('blog-details')}}" class="rounded">
                                            <img src="{{URL::asset('build/img/media/img-11.png')}}" class="img-fluid rounded w-100" alt="img">
                                        </a>
                                        <span class="trend-tag badge bg-info badge-sm position-absolute">Tax & Compliance</span>
                                        <div class="action-item dot-icon ">
                                            <a href="javascript:void(0);" data-bs-toggle="dropdown" class="bg-white">
                                                <i class="isax isax-more"></i>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="{{url('edit-blog')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-edit me-2"></i>Edit</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="p-3">
                                        <div class="d-flex align-items-center justify-content-between mb-3">
                                            <span class="d-flex align-items-center"><i class="isax isax-calendar-1 me-1"></i>14 Mar 2025</span>
                                            <a href="javascript:void(0);" class="fs-14 fw-normal text-truncate d-flex align-items-center"><img src="{{URL::asset('build/img/profiles/avatar-17.jpg')}}" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0" alt="Img">Emma Lewis</a>
                                        </div>
                                        <h6 class="fs-16 mb-3"><a href="{{url('blog-details')}}">Understanding Tax Deductions</a></h6>
                                        <p class="">Maximize your savings! A guide to deductible expenses freelancers should track for tax season.</p>
                                    </div>
                                </div><!-- end card body -->
                            </div><!-- end card -->
                        </div><!-- end col -->
                        <div class="col-lg-4 col-md-6">
                            <div class="card">
                                <div class="card-body p-0">
                                    <div class="position-relative">
                                        <a href="{{url('blog-details')}}" class="rounded">
                                            <img src="{{URL::asset('build/img/media/img-09.png')}}" class="img-fluid rounded w-100" alt="img">
                                        </a>
                                        <span class="trend-tag badge bg-info badge-sm position-absolute">Finance Tips</span>
                                        <div class="action-item dot-icon ">
                                            <a href="javascript:void(0);" data-bs-toggle="dropdown" class="bg-white">
                                                <i class="isax isax-more"></i>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="{{url('edit-blog')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-edit me-2"></i>Edit</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="p-3">
                                        <div class="d-flex align-items-center justify-content-between mb-3">
                                            <span class="d-flex align-items-center"><i class="isax isax-calendar-1 me-1"></i>14 Mar 2025</span>
                                            <a href="javascript:void(0);" class="fs-14 fw-normal text-truncate d-flex align-items-center"><img src="{{URL::asset('build/img/users/user-22.jpg')}}" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0" alt="Img">Olivia Harris</a>
                                        </div>
                                        <h6 class="fs-16 mb-3"><a href="{{url('blog-details')}}">A Beginner’s Guide to Digital Invoicing</a></h6>
                                        <p class="">New to digital invoicing? Here’s everything you need to know to create and send invoices professionally.</p>
                                    </div>
                                </div><!-- end card body -->
                            </div><!-- end card -->
                        </div><!-- end col -->
                        <div class="col-lg-4 col-md-6">
                            <div class="card">
                                <div class="card-body p-0">
                                    <div class="position-relative">
                                        <a href="{{url('blog-details')}}" class="rounded">
                                            <img src="{{URL::asset('build/img/media/img-10.png')}}" class="img-fluid rounded w-100" alt="img">
                                        </a>
                                        <span class="trend-tag badge bg-info badge-sm position-absolute">Business Finance</span>
                                        <div class="action-item dot-icon ">
                                            <a href="javascript:void(0);" data-bs-toggle="dropdown" class="bg-white">
                                                <i class="isax isax-more"></i>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="{{url('edit-blog')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-edit me-2"></i>Edit</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="p-3">
                                        <div class="d-flex align-items-center justify-content-between mb-3">
                                            <span class="d-flex align-items-center"><i class="isax isax-calendar-1 me-1"></i>14 Mar 2025</span>
                                            <a href="javascript:void(0);" class="fs-14 fw-normal text-truncate d-flex align-items-center"><img src="{{URL::asset('build/img/profiles/avatar-16.jpg')}}" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0" alt="Img">David Anderson</a>
                                        </div>
                                        <h6 class="fs-16 mb-3"><a href="{{url('blog-details')}}">How to Handle Late Payments</a></h6>
                                        <p class="">Dealing with overdue invoices? Learn the best strategies to follow up and get paid on time eveytime.</p>
                                    </div>
                                </div><!-- end card body -->
                            </div><!-- end card -->
                        </div><!-- end col -->
                        <div class="col-lg-4 col-md-6">
                            <div class="card">
                                <div class="card-body p-0">
                                    <div class="position-relative">
                                        <a href="{{url('blog-details')}}" class="rounded">
                                            <img src="{{URL::asset('build/img/media/img-14.png')}}" class="img-fluid rounded w-100" alt="img">
                                        </a>
                                        <span class="trend-tag badge bg-info badge-sm position-absolute">Software Reviews</span>
                                        <div class="action-item dot-icon ">
                                            <a href="javascript:void(0);" data-bs-toggle="dropdown" class="bg-white">
                                                <i class="isax isax-more"></i>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="{{url('edit-blog')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-edit me-2"></i>Edit</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="p-3">
                                        <div class="d-flex align-items-center justify-content-between mb-3">
                                            <span class="d-flex align-items-center"><i class="isax isax-calendar-1 me-1"></i>14 Mar 2025</span>
                                            <a href="javascript:void(0);" class="fs-14 fw-normal text-truncate d-flex align-items-center"><img src="{{URL::asset('build/img/profiles/avatar-07.jpg')}}" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0" alt="Img">Sophia White</a>
                                        </div>
                                        <h6 class="fs-16 mb-3"><a href="{{url('blog-details')}}">How to Choose the Right Accounting</a></h6>
                                        <p class="">Confused about accounting tools? Here’s a step-by-step guide to selecting the best software for your business needs.</p>
                                    </div>
                                </div><!-- end card body -->
                            </div><!-- end card -->
                        </div><!-- end col -->
                        <div class="col-lg-4 col-md-6">
                            <div class="card">
                                <div class="card-body p-0">
                                    <div class="position-relative">
                                        <a href="{{url('blog-details')}}" class="rounded">
                                            <img src="{{URL::asset('build/img/media/img-12.png')}}" class="img-fluid rounded w-100" alt="img">
                                        </a>
                                        <span class="trend-tag badge bg-info badge-sm position-absolute">Technology</span>
                                        <div class="action-item dot-icon ">
                                            <a href="javascript:void(0);" data-bs-toggle="dropdown" class="bg-white">
                                                <i class="isax isax-more"></i>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="{{url('edit-blog')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-edit me-2"></i>Edit</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="p-3">
                                        <div class="d-flex align-items-center justify-content-between mb-3">
                                            <span class="d-flex align-items-center"><i class="isax isax-calendar-1 me-1"></i>14 Mar 2025</span>
                                            <a href="javascript:void(0);" class="fs-14 fw-normal text-truncate d-flex align-items-center"><img src="{{URL::asset('build/img/profiles/avatar-23.jpg')}}" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0" alt="Img">Robert Thomas</a>
                                        </div>
                                        <h6 class="fs-16 mb-3"><a href="{{url('blog-details')}}">Why Cloud-Based Accounting is Future</a></h6>
                                        <p class="">Explore the benefits of cloud accounting software and how it helps businesses stay organized from anywhere.</p>
                                    </div>
                                </div><!-- end card body -->
                            </div><!-- end card -->
                        </div><!-- end col -->
                        <div class="col-lg-4 col-md-6">
                            <div class="card">
                                <div class="card-body p-0">
                                    <div class="position-relative">
                                        <a href="{{url('blog-details')}}" class="rounded">
                                            <img src="{{URL::asset('build/img/media/img-13.png')}}" class="img-fluid rounded w-100" alt="img">
                                        </a>
                                        <span class="trend-tag badge bg-info badge-sm position-absolute">Reporting</span>
                                        <div class="action-item dot-icon ">
                                            <a href="javascript:void(0);" data-bs-toggle="dropdown" class="bg-white">
                                                <i class="isax isax-more"></i>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="{{url('edit-blog')}}" class="dropdown-item d-flex align-items-center"><i class="isax isax-edit me-2"></i>Edit</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="p-3">
                                        <div class="d-flex align-items-center justify-content-between mb-3">
                                            <span class="d-flex align-items-center"><i class="isax isax-calendar-1 me-1"></i>14 Mar 2025</span>
                                            <a href="javascript:void(0);" class="fs-14 fw-normal text-truncate d-flex align-items-center"><img src="{{URL::asset('build/img/profiles/avatar-07.jpg')}}" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0" alt="Img">Isabella Scott</a>
                                        </div>
                                        <h6 class="fs-16 mb-3"><a href="{{url('blog-details')}}">Best Practices for Financial Reporting</a></h6>
                                        <p class="">Learn how to generate accurate financial reports to analyze business performance and plan for growth.</p>
                                    </div>
                                </div><!-- end card body -->
                            </div><!-- end card -->
                        </div><!-- end col -->
                        <div class="col-lg-12 col-md-12">
                            <div class="d-flex align-items-center justify-content-center">
                                <a href="javascript:void(0);" class="btn btn-dark d-inline-flex align-items-center"><i class="isax isax-rotate-right me-1"></i>Load More</a>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                </div>
            </div>
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