<?php $page = 'testimonials'; ?>
@extends('layout.mainlayout')
@section('content')
    <!-- ========================
        Start Page Content
    ========================= -->

    <div class="page-wrapper">

        <!-- Start container -->
        <div class="content content-two">

            <!-- Breadcrumb Start -->
            <div class="d-flex d-block align-items-center justify-content-between flex-wrap gap-3 mb-3">
                <div>
                    <h6>Testimonials</h6>
                </div>
                <div class="d-flex my-xl-auto right-content align-items-center flex-wrap gap-2">
                    <div class="dropdown me-1">
                        <a href="javascript:void(0);" class="btn btn-outline-white d-inline-flex align-items-center" data-bs-toggle="dropdown">
                            <i class="isax isax-export-1 me-1"></i>Export
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="#">Download as PDF</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">Download as Excel</a>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <a href="#" class="btn btn-primary d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#add_modal">
                            <i class="isax isax-add-circle5 me-1"></i>New Testimonials

                        </a>
                    </div>
                </div>
            </div>
            <!-- Breadcrumb End -->

            <!-- Table Search Start -->
            <div class="mb-3">

                <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                    <div class="d-flex align-items-center flex-wrap gap-2">
                        <div class="table-search d-flex align-items-center mb-0">
                            <div class="search-input">
                                <a href="javascript:void(0);" class="btn-searchset"><i class="isax isax-search-normal fs-12"></i></a>
                            </div>
                        </div>
                        <a class="btn btn-outline-white fw-normal d-inline-flex align-items-center" href="javascript:void(0);" data-bs-toggle="offcanvas" data-bs-target="#customcanvas">
                            <i class="isax isax-filter me-1"></i>Filter
                        </a>
                    </div>
                    <div class="d-flex align-items-center flex-wrap gap-2">
                        <div class="dropdown me-2">
                            <a href="javascript:void(0);" class="dropdown-toggle btn btn-outline-white d-inline-flex align-items-center" data-bs-toggle="dropdown">
                                <i class="isax isax-sort me-1"></i>Sort By : <span class="fw-normal ms-1">Latest</span>
                            </a>
                            <ul class="dropdown-menu  dropdown-menu-end">
                                <li>
                                    <a href="javascript:void(0);" class="dropdown-item">Latest</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" class="dropdown-item">Oldest</a>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
            <!-- Table Search End -->

            <!-- Table List Start -->
            <div class="table-responsive">
                <table class="table table-nowrap datatable">
                    <thead class="thead-light">
                        <tr>
                            <th class="no-sort">
                                <div class="form-check form-check-md">
                                    <input class="form-check-input" type="checkbox" id="select-all">
                                </div>
                            </th>
                            <th class="no-sort">Customer</th>
                            <th class="no-sort">Rating</th>
                            <th class="no-sort">Content</th>
                            <th>Created On</th>
                            <th>Status</th>
                            <th class="no-sort"></th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <tr>
                            <td>
                                <div class="form-check form-check-md">
                                    <input class="form-check-input" type="checkbox">
                                </div>
                            </td>
                            
                            <td>
                                <div class="d-flex align-items-center">
                                    <a href="javascript:void(0);" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
                                        <img src="{{URL::asset('build/img/profiles/avatar-28.jpg')}}" class="rounded-circle" alt="img">
                                    </a>
                                    <div>
                                        <h6 class="fs-14 fw-medium mb-0"><a href="javascript:void(0);">Emily Clark</a></h6>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <i class="isax isax-star-15 text-warning"></i>
                                <i class="isax isax-star-15 text-warning"></i>
                                <i class="isax isax-star-15 text-warning"></i>
                                <i class="isax isax-star-15 text-warning"></i>
                                <i class="isax isax-star-15 text-warning"></i>
                            </td>	
                            <td>Invoicing system is a game-changer! I get paid faster, and my clients love the automated reminders</td>
                            <td>22 Feb 2025</td>
                            
                            <td>
                                <div class="d-flex align-items-center">
                                    <a href="#" class="badge badge-sm badge-soft-success d-inline-flex align-items-center me-1" data-bs-toggle="modal" data-bs-target="#view_history">
                                        <i class="isax isax-document-sketch5 me-1"></i>
                                        active
                                    </a>
                                    </div>
                            </td>
                            <td class="action-item">
                                <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{url('testimonials')}}" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#edit_modal"><i class="isax isax-edit me-2"></i>Edit</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check form-check-md">
                                    <input class="form-check-input" type="checkbox">
                                </div>
                            </td>
                            
                            <td>
                                <div class="d-flex align-items-center">
                                    <a href="javascript:void(0);" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
                                        <img src="{{URL::asset('build/img/profiles/avatar-29.jpg')}}" class="rounded-circle" alt="img">
                                    </a>
                                    <div>
                                        <h6 class="fs-14 fw-medium mb-0"><a href="javascript:void(0);">John Carter</a></h6>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <i class="isax isax-star-15"></i>
                                <i class="isax isax-star-15 text-warning"></i>
                                <i class="isax isax-star-15 text-warning"></i>
                                <i class="isax isax-star-15 text-warning"></i>
                                <i class="isax isax-star-15 text-warning"></i>
                            </td>	
                            <td>Creating professional invoices in seconds has never been easier. Kanakku simplifies my billing process completely!</td>
                            <td>07 Feb 2025</td>
                            
                            <td>
                                <div class="d-flex align-items-center">
                                    <a href="#" class="badge badge-sm badge-soft-danger d-inline-flex align-items-center me-1" data-bs-toggle="modal" data-bs-target="#view_history">
                                        <i class="isax isax-document-sketch5 me-1"></i>
                                        Inactive
                                    </a>
                                    </div>
                            </td>
                            <td class="action-item">
                                <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{url('testimonials')}}" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#edit_modal"><i class="isax isax-edit me-2"></i>Edit</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check form-check-md">
                                    <input class="form-check-input" type="checkbox">
                                </div>
                            </td>
                            
                            <td>
                                <div class="d-flex align-items-center">
                                    <a href="javascript:void(0);" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
                                        <img src="{{URL::asset('build/img/profiles/avatar-12.jpg')}}" class="rounded-circle" alt="img">
                                    </a>
                                    <div>
                                        <h6 class="fs-14 fw-medium mb-0"><a href="javascript:void(0);">Sophia White</a></h6>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <i class="isax isax-star-15"></i>
                                <i class="isax isax-star-15 text-warning"></i>
                                <i class="isax isax-star-15 text-warning"></i>
                                <i class="isax isax-star-15 text-warning"></i>
                                <i class="isax isax-star-15 text-warning"></i>
                            </td>
                            <td>Recurring invoices save me so much time! I don’t have to worry about sending invoices every month anymore.</td>
                            <td>30 Jan 2025</td>
                            
                            <td>
                                <div class="d-flex align-items-center">
                                    <a href="#" class="badge badge-sm badge-soft-success d-inline-flex align-items-center me-1" data-bs-toggle="modal" data-bs-target="#view_history">
                                        <i class="isax isax-document-sketch5 me-1"></i>
                                        Active
                                    </a>
                                    </div>
                            </td>
                            <td class="action-item">
                                <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{url('testimonials')}}" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#edit_modal"><i class="isax isax-edit me-2"></i>Edit</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check form-check-md">
                                    <input class="form-check-input" type="checkbox">
                                </div>
                            </td>
                            
                            <td>
                                <div class="d-flex align-items-center">
                                    <a href="javascript:void(0);" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
                                        <img src="{{URL::asset('build/img/profiles/avatar-06.jpg')}}" class="rounded-circle" alt="img">
                                    </a>
                                    <div>
                                        <h6 class="fs-14 fw-medium mb-0"><a href="javascript:void(0);">Michael Johnson</a></h6>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <i class="isax isax-star-15"></i>
                                <i class="isax isax-star-15"></i>
                                <i class="isax isax-star-15 text-warning"></i>
                                <i class="isax isax-star-15 text-warning"></i>
                                <i class="isax isax-star-15 text-warning"></i>
                            </td>	
                            <td>Helps me track every rupee I spend. Now, I know exactly where my money is going.</td>
                            <td>17 Jan 2025</td>
                            
                            <td>
                                <div class="d-flex align-items-center">
                                    <a href="#" class="badge badge-sm badge-soft-danger d-inline-flex align-items-center me-1" data-bs-toggle="modal" data-bs-target="#view_history">
                                        <i class="isax isax-document-sketch5 me-1"></i>
                                        Inactive
                                    </a>
                                    </div>
                            </td>
                            <td class="action-item">
                                <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{url('testimonials')}}" class="dropdown-item d-flex align-items-center"  data-bs-toggle="modal" data-bs-target="#edit_modal"><i class="isax isax-edit me-2"></i>Edit</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check form-check-md">
                                    <input class="form-check-input" type="checkbox">
                                </div>
                            </td>
                            
                            <td>
                                <div class="d-flex align-items-center">
                                    <a href="javascript:void(0);" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
                                        <img src="{{URL::asset('build/img/profiles/avatar-30.jpg')}}" class="rounded-circle" alt="img">
                                    </a>
                                    <div>
                                        <h6 class="fs-14 fw-medium mb-0"><a href="javascript:void(0);">Olivia Harris</a></h6>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <i class="isax isax-star-15 text-warning"></i>
                                <i class="isax isax-star-15 text-warning"></i>
                                <i class="isax isax-star-15 text-warning"></i>
                                <i class="isax isax-star-15 text-warning"></i>
                                <i class="isax isax-star-15 text-warning"></i>
                            </td>	
                            <td>Expense categorization is effortless. It keeps my books clean and accurate.</td>
                            <td>04 Jan 2025</td>
                            
                            <td>
                                <div class="d-flex align-items-center">
                                    <a href="#" class="badge badge-sm badge-soft-success d-inline-flex align-items-center me-1" data-bs-toggle="modal" data-bs-target="#view_history">
                                        <i class="isax isax-document-sketch5 me-1"></i>
                                        Active
                                    </a>
                                    </div>
                            </td>
                            <td class="action-item">
                                <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{url('testimonials')}}" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#edit_modal"><i class="isax isax-edit me-2"></i>Edit</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check form-check-md">
                                    <input class="form-check-input" type="checkbox">
                                </div>
                            </td>
                            
                            <td>
                                <div class="d-flex align-items-center">
                                    <a href="javascript:void(0);" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
                                        <img src="{{URL::asset('build/img/profiles/avatar-27.jpg')}}" class="rounded-circle" alt="img">
                                    </a>
                                    <div>
                                        <h6 class="fs-14 fw-medium mb-0"><a href="javascript:void(0);">David Anderson</a></h6>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <i class="isax isax-star-15"></i>
                                <i class="isax isax-star-15 text-warning"></i>
                                <i class="isax isax-star-15 text-warning"></i>
                                <i class="isax isax-star-15 text-warning"></i>
                                <i class="isax isax-star-15 text-warning"></i>
                            </td>	
                            <td>Gives me a clear picture of my cash flow, so I can plan better for my business growth.</td>
                            <td>09 Dec 2024</td>
                            
                            <td>
                                <div class="d-flex align-items-center">
                                    <a href="#" class="badge badge-sm badge-soft-danger d-inline-flex align-items-center me-1" data-bs-toggle="modal" data-bs-target="#view_history">
                                        <i class="isax isax-document-sketch5 me-1"></i>
                                        Inactive
                                    </a>
                                    </div>
                            </td>
                            <td class="action-item">
                                <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{url('testimonials')}}" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#edit_modal"><i class="isax isax-edit me-2"></i>Edit</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check form-check-md">
                                    <input class="form-check-input" type="checkbox">
                                </div>
                            </td>
                            
                            <td>
                                <div class="d-flex align-items-center">
                                    <a href="javascript:void(0);" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
                                        <img src="{{URL::asset('build/img/profiles/avatar-22.jpg')}}" class="rounded-circle" alt="img">
                                    </a>
                                    <div>
                                        <h6 class="fs-14 fw-medium mb-0"><a href="javascript:void(0);">Emma Lewis</a></h6>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <i class="isax isax-star-15"></i>
                                <i class="isax isax-star-15"></i>
                                <i class="isax isax-star-15 text-warning"></i>
                                <i class="isax isax-star-15 text-warning"></i>
                                <i class="isax isax-star-15 text-warning"></i>
                            </td>
                            <td>Filing GST has never been this easy. Kanakku calculates everything automatically, saving me hours of work.</td>
                            <td>02 Dec 2024</td>
                            
                            <td>
                                <div class="d-flex align-items-center">
                                    <a href="#" class="badge badge-sm badge-soft-success d-inline-flex align-items-center me-1" data-bs-toggle="modal" data-bs-target="#view_history">
                                        <i class="isax isax-document-sketch5 me-1"></i>
                                        Active
                                    </a>
                                    </div>
                            </td>
                            <td class="action-item">
                                <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{url('testimonials')}}" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#edit_modal"><i class="isax isax-edit me-2"></i>Edit</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check form-check-md">
                                    <input class="form-check-input" type="checkbox">
                                </div>
                            </td>
                            
                            <td>
                                <div class="d-flex align-items-center">
                                    <a href="javascript:void(0);" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
                                        <img src="{{URL::asset('build/img/profiles/avatar-23.jpg')}}" class="rounded-circle" alt="img">
                                    </a>
                                    <div>
                                        <h6 class="fs-14 fw-medium mb-0"><a href="javascript:void(0);">Robert Thomas</a></h6>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <i class="isax isax-star-15 text-warning"></i>
                                <i class="isax isax-star-15 text-warning"></i>
                                <i class="isax isax-star-15 text-warning"></i>
                                <i class="isax isax-star-15 text-warning"></i>
                                <i class="isax isax-star-15 text-warning"></i>
                            </td>	
                            <td>The tax reports are spot on! I no longer worry about making errors during tax season.</td>
                            <td>15 Nov 2024</td>
                            
                            <td>
                                <div class="d-flex align-items-center">
                                    <a href="#" class="badge badge-sm badge-soft-danger d-inline-flex align-items-center me-1" data-bs-toggle="modal" data-bs-target="#view_history">
                                        <i class="isax isax-document-sketch5 me-1"></i>
                                        InActive
                                    </a>
                                    </div>
                            </td>
                            <td class="action-item">
                                <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{url('testimonials')}}" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#edit_modal"><i class="isax isax-edit me-2"></i>Edit</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check form-check-md">
                                    <input class="form-check-input" type="checkbox">
                                </div>
                            </td>
                            
                            <td>
                                <div class="d-flex align-items-center">
                                    <a href="javascript:void(0);" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
                                        <img src="{{URL::asset('build/img/profiles/avatar-07.jpg')}}" class="rounded-circle" alt="img">
                                    </a>
                                    <div>
                                        <h6 class="fs-14 fw-medium mb-0"><a href="javascript:void(0);">Isabella Scott</a></h6>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <i class="isax isax-star-15"></i>
                                <i class="isax isax-star-15 text-warning"></i>
                                <i class="isax isax-star-15 text-warning"></i>
                                <i class="isax isax-star-15 text-warning"></i>
                                <i class="isax isax-star-15 text-warning"></i>
                            </td>	
                            <td>Ensures my clients stay 100% compliant with GST and other tax regulations.</td>
                            <td>30 Nov 2024</td>
                            
                            <td>
                                <div class="d-flex align-items-center">
                                    <a href="#" class="badge badge-sm badge-soft-success d-inline-flex align-items-center me-1" data-bs-toggle="modal" data-bs-target="#view_history">
                                        <i class="isax isax-document-sketch5 me-1"></i>
                                        Active
                                    </a>
                                    </div>
                            </td>
                            <td class="action-item">
                                <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{url('testimonials')}}" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#edit_modal"><i class="isax isax-edit me-2"></i>Edit</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check form-check-md">
                                    <input class="form-check-input" type="checkbox">
                                </div>
                            </td>
                            
                            <td>
                                <div class="d-flex align-items-center">
                                    <a href="javascript:void(0);" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
                                        <img src="{{URL::asset('build/img/profiles/avatar-41.jpg')}}" class="rounded-circle" alt="img">
                                    </a>
                                    <div>
                                        <h6 class="fs-14 fw-medium mb-0"><a href="javascript:void(0);">Charlotte Brown</a></h6>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <i class="isax isax-star-15"></i>
                                <i class="isax isax-star-15 text-warning"></i>
                                <i class="isax isax-star-15 text-warning"></i>
                                <i class="isax isax-star-15 text-warning"></i>
                                <i class="isax isax-star-15 text-warning"></i>
                            </td>		
                            <td>Even with multiple accounts, It remains super easy to use. The UI is simple and intuitive.</td>
                            <td>05 Oct 2024</td>
                            
                            <td>
                                <div class="d-flex align-items-center">
                                    <a href="#" class="badge badge-sm badge-soft-success d-inline-flex align-items-center me-1" data-bs-toggle="modal" data-bs-target="#view_history">
                                        <i class="isax isax-document-sketch5 me-1"></i>
                                        Active
                                    </a>
                                    </div>
                            </td>
                            <td class="action-item">
                                <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{url('testimonials')}}" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#edit_modal"><i class="isax isax-edit me-2"></i>Edit</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check form-check-md">
                                    <input class="form-check-input" type="checkbox">
                                </div>
                            </td>
                            
                            <td>
                                <div class="d-flex align-items-center">
                                    <a href="javascript:void(0);" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
                                        <img src="{{URL::asset('build/img/profiles/avatar-21.jpg')}}" class="rounded-circle" alt="img">
                                    </a>
                                    <div>
                                        <h6 class="fs-14 fw-medium mb-0"><a href="javascript:void(0);">William Parker</a></h6>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <i class="isax isax-star-15"></i>
                                <i class="isax isax-star-15 text-warning"></i>
                                <i class="isax isax-star-15 text-warning"></i>
                                <i class="isax isax-star-15 text-warning"></i>
                                <i class="isax isax-star-15 text-warning"></i>
                            </td>		
                            <td>Invoice customization is fantastic! I can add my logo, terms, and even set up recurring invoices effortlessly.</td>
                            <td>09 Sep 2024</td>
                            
                            <td>
                                <div class="d-flex align-items-center">
                                    <a href="#" class="badge badge-sm badge-soft-danger d-inline-flex align-items-center me-1" data-bs-toggle="modal" data-bs-target="#view_history">
                                        <i class="isax isax-document-sketch5 me-1"></i>
                                        Inactive
                                    </a>
                                    </div>
                            </td>
                            <td class="action-item">
                                <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{url('testimonials')}}" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#edit_modal"><i class="isax isax-edit me-2"></i>Edit</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check form-check-md">
                                    <input class="form-check-input" type="checkbox">
                                </div>
                            </td>
                            
                            <td>
                                <div class="d-flex align-items-center">
                                    <a href="javascript:void(0);" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
                                        <img src="{{URL::asset('build/img/profiles/avatar-26.jpg')}}" class="rounded-circle" alt="img">
                                    </a>
                                    <div>
                                        <h6 class="fs-14 fw-medium mb-0"><a href="javascript:void(0);">Mia Thompson</a></h6>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <i class="isax isax-star-15 text-warning"></i>
                                <i class="isax isax-star-15 text-warning"></i>
                                <i class="isax isax-star-15 text-warning"></i>
                                <i class="isax isax-star-15 text-warning"></i>
                                <i class="isax isax-star-15 text-warning"></i>
                            </td>	
                            <td>I no longer chase clients for payments! The automated invoice reminders ensure I get paid on time, every time.</td>
                            <td>02 Sep 2024</td>
                            
                            <td>
                                <div class="d-flex align-items-center">
                                    <a href="#" class="badge badge-sm badge-soft-success d-inline-flex align-items-center me-1" data-bs-toggle="modal" data-bs-target="#view_history">
                                        <i class="isax isax-document-sketch5 me-1"></i>
                                        Active
                                    </a>
                                    </div>
                            </td>
                            <td class="action-item">
                                <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{url('testimonials')}}" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#edit_modal"><i class="isax isax-edit me-2"></i>Edit</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check form-check-md">
                                    <input class="form-check-input" type="checkbox">
                                </div>
                            </td>
                            
                            <td>
                                <div class="d-flex align-items-center">
                                    <a href="javascript:void(0);" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
                                        <img src="{{URL::asset('build/img/profiles/avatar-30.jpg')}}" class="rounded-circle" alt="img">
                                    </a>
                                    <div>
                                        <h6 class="fs-14 fw-medium mb-0"><a href="javascript:void(0);">Amelia Robinson</a></h6>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <i class="isax isax-star-15"></i>
                                <i class="isax isax-star-15 text-warning"></i>
                                <i class="isax isax-star-15 text-warning"></i>
                                <i class="isax isax-star-15 text-warning"></i>
                                <i class="isax isax-star-15 text-warning"></i>
                            </td>	
                            <td>Bulk invoice generation is a lifesaver! I can create and send multiple invoices in just a few clicks</td>
                            <td>07 Aug 2024</td>
                            
                            <td>
                                <div class="d-flex align-items-center">
                                    <a href="#" class="badge badge-sm badge-soft-danger d-inline-flex align-items-center me-1" data-bs-toggle="modal" data-bs-target="#view_history">
                                        <i class="isax isax-document-sketch5 me-1"></i>
                                        Inactive
                                    </a>
                                    </div>
                            </td>
                            <td class="action-item">
                                <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{url('testimonials')}}" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#edit_modal"><i class="isax isax-edit me-2"></i>Edit</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>
            <!-- /Table List -->
        </div>
        <!-- End container -->

        <!-- Start filter -->
        <div class="offcanvas offcanvas-offset offcanvas-end" tabindex="-1" id="customcanvas">                                      
            <div class="offcanvas-header d-block pb-0">
                <div class="border-bottom d-flex align-items-center justify-content-between pb-3">
                    <h6 class="offcanvas-title">Filter</h6>
                    <button type="button" class="btn-close btn-close-modal custom-btn-close" data-bs-dismiss="offcanvas" aria-label="Close"><i class="fa-solid fa-x"></i></button>
                </div>
            </div>			
            <div class="offcanvas-body pt-3">  
                <form action="#">
                    <div class="mb-3">
                        <label class="form-label">Customer</label>
                        <div class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle btn btn-lg bg-light  d-flex align-items-center justify-content-start fs-13 fw-normal border" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="true">
                                Select
                            </a>
                            <div class="dropdown-menu shadow-lg w-100 dropdown-info">
                                <div class="mb-3">
                                    <div class="input-icon-start position-relative">
                                        <span class="input-icon-addon fs-12">
                                            <i class="isax isax-search-normal"></i>
                                        </span>
                                        <input type="text" class="form-control form-control-sm" placeholder="Search">
                                    </div>
                                </div>
                                <ul class="mb-3">
                                    <li class="d-flex align-items-center justify-content-between mb-3">
                                        <label class="d-inline-flex align-items-center text-gray-9">
                                            <input class="form-check-input select-all m-0 me-2" type="checkbox">
                                            Select All
                                        </label>
                                        <a href="javascript:void(0);" class="link-danger fw-medium text-decoration-underline">Reset</a>
                                    </li>
                                    <li>
                                        <label class="dropdown-item px-2 d-flex align-items-center text-dark">
                                            <input class="form-check-input m-0 me-2" type="checkbox">
                                            <span class="avatar avatar-sm rounded-circle me-2"><img src="{{URL::asset('build/img/profiles/avatar-28.jpg')}}" class="flex-shrink-0 rounded-circle" alt="img"></span>Emily Clark
                                        </label>
                                    </li>
                                    <li>
                                        <label class="dropdown-item px-2 d-flex align-items-center text-dark">
                                            <input class="form-check-input m-0 me-2" type="checkbox">
                                            <span class="avatar avatar-sm rounded-circle me-2"><img src="{{URL::asset('build/img/profiles/avatar-29.jpg')}}" class="flex-shrink-0 rounded-circle" alt="img"></span>John Carter
                                        </label>
                                    </li>
                                    <li>
                                        <label class="dropdown-item px-2 d-flex align-items-center text-dark">
                                            <input class="form-check-input m-0 me-2" type="checkbox">
                                            <span class="avatar avatar-sm rounded-circle me-2"><img src="{{URL::asset('build/img/profiles/avatar-12.jpg')}}" class="flex-shrink-0 rounded-circle" alt="img"></span>Sophia White
                                        </label>
                                    </li>
                                    <li>
                                        <label class="dropdown-item px-2 d-flex align-items-center text-dark">
                                            <input class="form-check-input m-0 me-2" type="checkbox">
                                            <span class="avatar avatar-sm rounded-circle me-2"><img src="{{URL::asset('build/img/profiles/avatar-06.jpg')}}" class="flex-shrink-0 rounded-circle" alt="img"></span>Sophia White
                                        </label>
                                    </li>
                                </ul>
                                <div class="row g-2">
                                    <div class="col-6">
                                        <a href="#" class="btn btn-outline-white w-100 close-filter">Cancel</a>
                                    </div>
                                    <div class="col-6">
                                        <a href="#" class="btn btn-primary w-100">Select</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Ratings</label>
                        <div class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle btn btn-lg bg-light  d-flex align-items-center justify-content-start fs-13 fw-normal border" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="true">
                                Select
                            </a>
                            <div class="dropdown-menu shadow-lg w-100 dropdown-info">
                                <ul class="mb-3">
                                    <li>
                                        <label class="dropdown-item px-2 d-flex align-items-center text-dark">
                                            <input class="form-check-input m-0 me-2" type="checkbox">
                                            <i class="isax isax-star-15 text-warning me-1"></i>
                                            <i class="isax isax-star-15 text-warning me-1"></i>
                                            <i class="isax isax-star-15 text-warning me-1"></i>
                                            <i class="isax isax-star-15 text-warning me-1"></i>
                                            <i class="isax isax-star-15 text-warning"></i>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="dropdown-item px-2 d-flex align-items-center text-dark">
                                            <input class="form-check-input m-0 me-2" type="checkbox">
                                            <i class="isax isax-star-15 text-warning me-1"></i>
                                            <i class="isax isax-star-15 text-warning me-1"></i>
                                            <i class="isax isax-star-15 text-warning me-1"></i>
                                            <i class="isax isax-star-15 text-warning me-1"></i>
                                            <i class="isax isax-star-15"></i>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="dropdown-item px-2 d-flex align-items-center text-dark">
                                            <input class="form-check-input m-0 me-2" type="checkbox">
                                            <i class="isax isax-star-15 text-warning me-1"></i>
                                            <i class="isax isax-star-15 text-warning me-1"></i>
                                            <i class="isax isax-star-15 text-warning me-1"></i>
                                            <i class="isax isax-star-15 me-1"></i>
                                            <i class="isax isax-star-15"></i>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="dropdown-item px-2 d-flex align-items-center text-dark">
                                            <input class="form-check-input m-0 me-2" type="checkbox">
                                            <i class="isax isax-star-15 text-warning me-1"></i>
                                            <i class="isax isax-star-15 text-warning me-1"></i>
                                            <i class="isax isax-star-15 me-1"></i>
                                            <i class="isax isax-star-15 me-1"></i>
                                            <i class="isax isax-star-15"></i>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="dropdown-item px-2 d-flex align-items-center text-dark">
                                            <input class="form-check-input m-0 me-2" type="checkbox">
                                            <i class="isax isax-star-15 text-warning me-1"></i>
                                            <i class="isax isax-star-15 me-1"></i>
                                            <i class="isax isax-star-15 me-1"></i>
                                            <i class="isax isax-star-15 me-1"></i>
                                            <i class="isax isax-star-15"></i>
                                        </label>
                                    </li>
                                </ul>
                                <div class="row g-2">
                                    <div class="col-6">
                                        <a href="#" class="btn btn-outline-white w-100 close-filter">Cancel</a>
                                    </div>
                                    <div class="col-6">
                                        <a href="#" class="btn btn-primary w-100">Select</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Date Range</label>
                        <div class="input-group position-relative">
                            <input type="text" class="form-control date-range bookingrange rounded-end">
                            <span class="input-icon-addon fs-16 text-gray-9">
                                <i class="isax isax-calendar-2"></i>
                            </span>
                        </div>
                    </div>	
                    <div class="mb-0">
                        <label class="form-label">Status</label>
                        <div class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle btn btn-lg bg-light  d-flex align-items-center justify-content-start fs-13 fw-normal border" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="true">
                                Select
                            </a>
                            <div class="dropdown-menu shadow-lg w-100 dropdown-info">	
                                <ul>
                                    <li>
                                        <label class="dropdown-item px-2 d-flex align-items-center text-dark">
                                            <input class="form-check-input m-0 me-2" type="checkbox">
                                            <i class="fa-solid fa-circle fs-6 text-success me-1"></i>Active
                                        </label>
                                    </li>
                                    <li>
                                        <label class="dropdown-item px-2 d-flex align-items-center text-dark">
                                            <input class="form-check-input m-0 me-2" type="checkbox">
                                            <i class="fa-solid fa-circle fs-6 text-danger me-1"></i>Inactive
                                        </label>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>			
                    <div class="offcanvas-footer">
                        <div class="row g-2">
                            <div class="col-6">
                                <a href="#"  class="btn btn-outline-white w-100">Reset</a>
                            </div>
                            <div class="col-6">
                                <button data-bs-dismiss="offcanvas" class="btn btn-primary w-100" id="filter-submit">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- End filter -->

    </div>

    <!-- ========================
        End Page Content
    ========================= -->
@endsection