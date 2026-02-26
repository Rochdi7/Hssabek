<?php $page = 'todo'; ?>
@extends('layout.mainlayout')
@section('content')
    <!-- ========================
        Start Page Content
    ========================= -->

    <div class="page-wrapper">

        <!-- Start Content -->
        <div class="content content-two">
            <div class="d-flex align-items-center todo-header gap-3 justify-content-between mb-3">
                <div class="add-item d-flex">
                    <div class="page-title">
                        <h4 class="mb-0">Todo</h4>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <ul class="table-top-head flex-shrink-0 list-unstyled mb-0">
                        <li>
                            <a href="{{url('todo')}}" class="active btn btn-icon btn-sm" ><i class="ti ti-layout-grid"></i></a>
                        </li>
                        <li>
                            <a href="{{url('todo-list')}}"><i class="ti ti-list-tree"></i></a>
                        </li>
                    </ul>
                    <div class="page-btn ms-2">
                        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_todo"><i class="ti ti-circle-plus me-1"></i>Create New</a>
                    </div>
                </div>
            </div>
            <div class="card shadow-none mb-0">
                <div class="card-body">

                    <!-- start row -->
                    <div class="row gy-3 mb-3">
                        <div class="col-sm-4">
                            <div class="d-flex align-items-center">
                                <h6>Total Todo</h6>
                                <span class="badge badge-dark rounded-pill badge-xs ms-2">+1</span>
                            </div>
                        </div><!-- end col -->
                        <div class="col-sm-8">
                            <div class="d-flex align-items-center justify-content-end">
                                <p class="mb-0 me-3 pe-3 border-end fs-14">Total Task : <span class="text-dark"> 55 </span></p>
                                <p class="mb-0 me-3 pe-3 border-end fs-14">Pending : <span class="text-dark"> 15 </span></p>
                                <p class="mb-0 fs-14">Completed : <span class="text-dark"> 40 </span></p>
                            </div>
                        </div><!-- end col -->
                    </div>
                    <!-- end row -->

                    <div class="mb-3">
                        <button class="btn bg-primary-subtle border-dashed border-primary w-100 text-start" data-bs-toggle="modal" data-bs-target="#add_todo">
                            <i class="ti ti-plus me-2"></i>New task
                        </button>
                    </div>
                    <div class="border-bottom mb-3">

                        <!-- start row -->
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="d-flex align-items-center flex-wrap row-gap-3 mb-3">
                                    <h6 class="me-2">Priority</h6>
                                    <ul class="nav nav-pills border d-inline-flex p-1 rounded bg-light todo-tabs" id="pills-tab" role="tablist">
                                        <li class="nav-item me-1" role="presentation">
                                            <button class="nav-link btn btn-sm btn-icon p-2 d-flex align-items-center justify-content-center w-auto active" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-selected="true">All</button>
                                        </li>
                                        <li class="nav-item me-1" role="presentation">
                                            <button class="nav-link btn btn-sm btn-icon p-2 d-flex align-items-center justify-content-center w-auto" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-selected="false">High</button>
                                        </li>
                                        <li class="nav-item me-1" role="presentation">
                                            <button class="nav-link btn btn-sm btn-icon p-2 d-flex align-items-center justify-content-center w-auto" data-bs-toggle="pill" data-bs-target="#pills-medium" type="button" role="tab" aria-selected="false">Medium</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link btn btn-sm btn-icon p-2 d-flex align-items-center justify-content-center w-auto" data-bs-toggle="pill" data-bs-target="#pills-low" type="button" role="tab" aria-selected="false">Low</button>
                                        </li>
                                    </ul>
                                </div>
                            </div><!-- end col -->
                            <div class="col-lg-6">
                                <div class="d-flex align-items-center justify-content-lg-end flex-wrap row-gap-3 mb-3">
                                    <div class="input-icon-start input-icon position-relative me-2">
                                        <span class="input-icon-addon">
                                        <i class="ti ti-calendar text-gray-9"></i>
                                    </span>
                                        <input type="text" class="form-control datetimepicker" placeholder="Due Date">
                                    </div>
                                    <div class="dropdown me-2">
                                        <a href="javascript:void(0);" class="dropdown-toggle btn btn-outline-white d-inline-flex align-items-center" data-bs-toggle="dropdown">
                                        All Tags
                                    </a>
                                        <ul class="dropdown-menu  dropdown-menu-end p-3">
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item rounded-1">All Tags</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item rounded-1">Internal</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item rounded-1">Projects</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item rounded-1">Meetings</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item rounded-1">Reminder</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item rounded-1">Research</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <span class="d-inline-flex me-2">Sort By : </span>
                                        <div class="dropdown">
                                            <a href="javascript:void(0);" class="dropdown-toggle btn btn-outline-white d-inline-flex align-items-center border-0 bg-transparent p-0 text-dark pe-4" data-bs-toggle="dropdown">
                                            Created Date
                                        </a>
                                            <ul class="dropdown-menu  dropdown-menu-end p-3">
                                                <li>
                                                    <a href="javascript:void(0);" class="dropdown-item rounded-1">Created Date</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);" class="dropdown-item rounded-1">Priority</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);" class="dropdown-item rounded-1">Due Date</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end col -->
                        </div>
                        <!-- end row -->

                    </div>
                    <div class="tab-content todo-item" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel">
                            <div class="accordion todo-accordion" id="accordionExample">
                                <div class="accordion-item bg-white mb-3 border-0">

                                    <!-- start row -->
                                    <div class="row align-items-center mb-3 row-gap-3">
                                        <div class="col-lg-4 col-sm-6">
                                            <div class="accordion-header" id="headingTwo">
                                                <div class="accordion-button bg-transparent" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-controls="collapseTwo">
                                                    <div class="d-flex align-items-center w-100">
                                                        <div class="me-2">
                                                            <a href="javascript:void(0);">
                                                                <span><i class="fas fa-chevron-down"></i></span>
                                                            </a>
                                                        </div>
                                                        <div class="d-flex align-items-center">
                                                            <span><i class="ti ti-square-rounded text-purple me-2"></i></span>
                                                            <h5 class="fw-semibold">High</h5>
                                                            <span class="badge bg-light text-dark rounded-pill ms-2">15</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- end col -->
                                        <div class="col-lg-8 col-sm-6">
                                            <div class="d-flex align-items-center justify-content-sm-end">
                                                <a href="#" class="btn btn-light me-2" data-bs-toggle="modal" data-bs-target="#add_todo"><i class="ti ti-circle-plus me-2"></i>Add New</a>
                                                <a href="#" class="btn btn-white border">See All <i class="ti ti-arrow-right ms-2"></i></a>
                                            </div>
                                        </div><!-- end col -->
                                    </div>
                                    <!-- end row -->

                                    <div id="collapseTwo" class="accordion-collapse collapse show" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div class="list-group list-group-flush border-bottom pb-2">
                                                <div class="list-group-item list-item-hover border rounded mb-2 p-3">

                                                    <!-- start row -->
                                                    <div class="row align-items-center row-gap-3">
                                                        <div class="col-lg-6 col-md-7">
                                                            <div class="todo-inbox-check d-flex align-items-center flex-wrap row-gap-3">
                                                                <span class="me-2 d-flex align-items-center"><i class="ti ti-grid-dots text-dark"></i></span>
                                                                <div class="form-check form-check-md me-2">
                                                                    <input class="form-check-input" type="checkbox">
                                                                </div>
                                                                <span class="me-2 d-flex align-items-center rating-select"><i class="ti ti-star-filled filled"></i></span>
                                                                <div class="strike-info">
                                                                    <h4 class="fs-14 mb-0">Finalize project proposal</h4>
                                                                </div>
                                                                <span class="badge bg-transparent-dark text-dark rounded-pill ms-2"><i class="ti ti-calendar me-1"></i>15 Jan 2025</span>
                                                            </div>
                                                        </div><!-- end col -->
                                                        <div class="col-lg-6 col-md-5">
                                                            <div class="d-flex align-items-center justify-content-md-end flex-wrap row-gap-3">
                                                                <span class="badge badge-success bg-success me-3">Projects</span>
                                                                <span class="badge badge-soft-danger d-inline-flex align-items-center me-3"><i class="fas fa-circle fs-6 me-1"></i>Onhold</span>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="avatar-list-stacked avatar-group-sm">
                                                                        <span class="avatar avatar-rounded">
                                                                        <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-01.jpg')}}" alt="img">
                                                                    </span>
                                                                        <span class="avatar avatar-rounded">
                                                                        <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-02.jpg')}}" alt="img">
                                                                    </span>
                                                                        <span class="avatar avatar-rounded">
                                                                        <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-03.jpg')}}" alt="img">
                                                                    </span>
                                                                    </div>
                                                                    <div class="dropdown ms-2">
                                                                        <a href="javascript:void(0);" class="d-inline-flex align-items-center" data-bs-toggle="dropdown">
                                                                            <i class="ti ti-dots-vertical"></i>
                                                                        </a>
                                                                        <ul class="dropdown-menu dropdown-menu-end p-3">
                                                                            <li>
                                                                                <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#add_todo"><i class="ti ti-edit me-2"></i>Edit</a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-2"></i>Delete</a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#view_todo"><i class="ti ti-eye me-2"></i>View</a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div><!-- end col -->
                                                    </div>
                                                    <!-- end row -->

                                                </div>
                                                <div class="list-group-item list-item-hover border rounded mb-2 p-3">

                                                    <!-- start row -->
                                                    <div class="row align-items-center row-gap-3">
                                                        <div class="col-lg-6 col-md-7">
                                                            <div class="todo-inbox-check d-flex align-items-center flex-wrap row-gap-3">
                                                                <span class="me-2 d-flex align-items-center"><i class="ti ti-grid-dots text-dark"></i></span>
                                                                <div class="form-check form-check-md me-2">
                                                                    <input class="form-check-input" type="checkbox">
                                                                </div>
                                                                <span class="me-2 rating-select d-flex align-items-center"><i class="ti ti-star"></i></span>
                                                                <div class="strike-info">
                                                                    <h4 class="fs-14 mb-0">Submit to supervisor by EOD</h4>
                                                                </div>
                                                                <span class="badge bg-transparent-dark text-dark rounded-pill ms-2"><i class="ti ti-calendar me-1"></i>25 May 2024</span>
                                                            </div>
                                                        </div><!-- end col -->
                                                        <div class="col-lg-6 col-md-5">
                                                            <div class="d-flex align-items-center justify-content-md-end flex-wrap row-gap-3">
                                                                <span class="badge bg-danger bg-danger me-3">Internal</span>
                                                                <span class="badge badge-soft-secondary d-flex align-items-center me-3"><i class="fas fa-circle fs-6 me-1"></i>Inprogress</span>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="avatar-list-stacked avatar-group-sm">
                                                                        <span class="avatar avatar-rounded">
                                                                        <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-01.jpg')}}" alt="img">
                                                                    </span>
                                                                        <span class="avatar avatar-rounded">
                                                                        <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-02.jpg')}}" alt="img">
                                                                    </span>
                                                                        <span class="avatar avatar-rounded">
                                                                        <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-03.jpg')}}" alt="img">
                                                                    </span>
                                                                    </div>
                                                                    <div class="dropdown ms-2">
                                                                        <a href="javascript:void(0);" class="d-inline-flex align-items-center" data-bs-toggle="dropdown">
                                                                            <i class="ti ti-dots-vertical"></i>
                                                                        </a>
                                                                        <ul class="dropdown-menu dropdown-menu-end p-3">
                                                                            <li>
                                                                                <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#add_todo"><i class="ti ti-edit me-2"></i>Edit</a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-2"></i>Delete</a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#view_todo"><i class="ti ti-eye me-2"></i>View</a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div><!-- end col -->
                                                    </div>
                                                    <!-- end row -->

                                                </div>
                                                <div class="list-group-item list-item-hover border rounded mb-2 p-3">

                                                    <!-- start row -->
                                                    <div class="row align-items-center row-gap-3">
                                                        <div class="col-lg-6 col-md-7">
                                                            <div class="todo-inbox-check d-flex align-items-center flex-wrap row-gap-3 todo-strike-content">
                                                                <span class="me-2 d-flex align-items-center"><i class="ti ti-grid-dots text-dark"></i></span>
                                                                <div class="form-check form-check-md me-2">
                                                                    <input class="form-check-input" type="checkbox" checked>
                                                                </div>
                                                                <span class="me-2 rating-select d-flex align-items-center"><i class="ti ti-star"></i></span>
                                                                <div class="strike-info">
                                                                    <h4 class="fs-14 mb-0">Prepare presentation slides</h4>
                                                                </div>
                                                                <span class="badge bg-transparent-dark text-dark rounded-pill ms-2"><i class="ti ti-calendar me-1"></i>15 Jan 2025</span>
                                                            </div>
                                                        </div><!-- end col -->
                                                        <div class="col-lg-6 col-md-5">
                                                            <div class="d-flex align-items-center justify-content-md-end flex-wrap row-gap-3">
                                                                <span class="badge bg-info me-3">Reminder</span>
                                                                <span class="badge badge-soft-info d-flex align-items-center me-3"><i class="fas fa-circle fs-6 me-1"></i>Pending</span>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="avatar-list-stacked avatar-group-sm">
                                                                        <span class="avatar avatar-rounded">
                                                                        <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-01.jpg')}}" alt="img">
                                                                    </span>
                                                                        <span class="avatar avatar-rounded">
                                                                        <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-02.jpg')}}" alt="img">
                                                                    </span>
                                                                        <span class="avatar avatar-rounded">
                                                                        <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-03.jpg')}}" alt="img">
                                                                    </span>
                                                                    </div>
                                                                    <div class="dropdown ms-2">
                                                                        <a href="javascript:void(0);" class="d-inline-flex align-items-center" data-bs-toggle="dropdown">
                                                                            <i class="ti ti-dots-vertical"></i>
                                                                        </a>
                                                                        <ul class="dropdown-menu dropdown-menu-end p-3">
                                                                            <li>
                                                                                <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#add_todo"><i class="ti ti-edit me-2"></i>Edit</a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-2"></i>Delete</a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#view_todo"><i class="ti ti-eye me-2"></i>View</a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div><!-- end col -->
                                                    </div>
                                                    <!-- end row -->

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item bg-white mb-3 border-0">
                                    <div class="row align-items-center mb-3 row-gap-3">
                                        <div class="col-lg-4 col-sm-6">
                                            <div class="accordion-header" id="headingThree">
                                                <div class="accordion-button bg-transparent" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-controls="collapseThree">
                                                    <div class="d-flex align-items-center w-100">
                                                        <div class="me-2">
                                                            <a href="javascript:void(0);">
                                                                <span><i class="fas fa-chevron-down"></i></span>
                                                            </a>
                                                        </div>
                                                        <div class="d-flex align-items-center">
                                                            <span><i class="ti ti-square-rounded text-warning me-2"></i></span>
                                                            <h5 class="fw-semibold">Medium</h5>
                                                            <span class="badge bg-light text-dark rounded-pill ms-2">05</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-8 col-sm-6">
                                            <div class="d-flex align-items-center justify-content-sm-end">
                                                <a href="#" class="btn btn-light me-2" data-bs-toggle="modal" data-bs-target="#add_todo"><i class="ti ti-circle-plus me-2"></i>Add New</a>
                                                <a href="#" class="btn btn-white border">See All <i class="ti ti-arrow-right ms-2"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="collapseThree" class="accordion-collapse collapse show" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div class="list-group list-group-flush border-bottom pb-2">
                                                <div class="list-group-item list-item-hover border rounded mb-2 p-3">
                                                    <div class="row align-items-center row-gap-3">
                                                        <div class="col-lg-6 col-md-7">
                                                            <div class="todo-inbox-check d-flex align-items-center flex-wrap row-gap-3">
                                                                <span class="me-2 d-flex align-items-center"><i class="ti ti-grid-dots text-dark"></i></span>
                                                                <div class="form-check form-check-md me-2">
                                                                    <input class="form-check-input" type="checkbox">
                                                                </div>
                                                                <span class="me-2 rating-select d-flex align-items-center"><i class="ti ti-star"></i></span>
                                                                <div class="strike-info">
                                                                    <h4 class="fs-14 mb-0">Check and respond to emails</h4>
                                                                </div>
                                                                <span class="badge bg-transparent-dark text-dark rounded-pill ms-2"><i class="ti ti-calendar me-1"></i>Tomorrow</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-5">
                                                            <div class="d-flex align-items-center justify-content-md-end flex-wrap row-gap-3">
                                                                <span class="badge bg-info me-3">Reminder</span>
                                                                <span class="badge badge-soft-success align-items-center me-3"><i class="fas fa-circle fs-6 me-1"></i>Completed</span>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="avatar-list-stacked avatar-group-sm">
                                                                        <span class="avatar avatar-rounded">
                                                                        <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-01.jpg')}}" alt="img">
                                                                    </span>
                                                                        <span class="avatar avatar-rounded">
                                                                        <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-02.jpg')}}" alt="img">
                                                                    </span>
                                                                        <span class="avatar avatar-rounded">
                                                                        <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-03.jpg')}}" alt="img">
                                                                    </span>
                                                                    </div>
                                                                    <div class="dropdown ms-2">
                                                                        <a href="javascript:void(0);" class="d-inline-flex align-items-center" data-bs-toggle="dropdown">
                                                                            <i class="ti ti-dots-vertical"></i>
                                                                        </a>
                                                                        <ul class="dropdown-menu dropdown-menu-end p-3">
                                                                            <li>
                                                                                <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#add_todo"><i class="ti ti-edit me-2"></i>Edit</a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-2"></i>Delete</a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#view_todo"><i class="ti ti-eye me-2"></i>View</a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="list-group-item list-item-hover border rounded mb-2 p-3">
                                                    <div class="row align-items-center row-gap-3">
                                                        <div class="col-lg-6 col-md-7">
                                                            <div class="todo-inbox-check d-flex align-items-center flex-wrap row-gap-3">
                                                                <span class="me-2 d-flex align-items-center"><i class="ti ti-grid-dots text-dark"></i></span>
                                                                <div class="form-check form-check-md me-2">
                                                                    <input class="form-check-input" type="checkbox">
                                                                </div>
                                                                <span class="me-2 rating-select d-flex align-items-center"><i class="ti ti-star"></i></span>
                                                                <div class="strike-info">
                                                                    <h4 class="fs-14 mb-0">Coordinate with department head on progress</h4>
                                                                </div>
                                                                <span class="badge bg-transparent-dark text-dark rounded-pill ms-2"><i class="ti ti-calendar me-1"></i>25 May 2024</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-5">
                                                            <div class="d-flex align-items-center justify-content-md-end flex-wrap row-gap-3">
                                                                <span class="badge bg-danger bg-danger me-3">Internal</span>
                                                                <span class="badge badge-soft-secondary d-flex align-items-center me-3"><i class="fas fa-circle fs-6 me-1"></i>Inprogress</span>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="avatar-list-stacked avatar-group-sm">
                                                                        <span class="avatar avatar-rounded">
                                                                        <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-06.jpg')}}" alt="img">
                                                                    </span>
                                                                        <span class="avatar avatar-rounded">
                                                                        <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-09.jpg')}}" alt="img">
                                                                    </span>
                                                                        <span class="avatar avatar-rounded">
                                                                        <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-02.jpg')}}" alt="img">
                                                                    </span>
                                                                    </div>
                                                                    <div class="dropdown ms-2">
                                                                        <a href="javascript:void(0);" class="d-inline-flex align-items-center" data-bs-toggle="dropdown">
                                                                            <i class="ti ti-dots-vertical"></i>
                                                                        </a>
                                                                        <ul class="dropdown-menu dropdown-menu-end p-3">
                                                                            <li>
                                                                                <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#add_todo"><i class="ti ti-edit me-2"></i>Edit</a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-2"></i>Delete</a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#view_todo"><i class="ti ti-eye me-2"></i>View</a>
                                                                            </li>
                                                                        </ul>
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
                                <div class="accordion-item bg-white border-0 mb-3">
                                    <div class="row align-items-center mb-3 row-gap-3">
                                        <div class="col-lg-4 col-sm-6">
                                            <div class="accordion-header" id="headingFour">
                                                <div class="accordion-button bg-transparent" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-controls="collapseFour">
                                                    <div class="d-flex align-items-center w-100">
                                                        <div class="me-2">
                                                            <a href="javascript:void(0);">
                                                                <span><i class="fas fa-chevron-down"></i></span>
                                                            </a>
                                                        </div>
                                                        <div class="d-flex align-items-center">
                                                            <span><i class="ti ti-square-rounded text-success me-2"></i></span>
                                                            <h5 class="fw-semibold">Low</h5>
                                                            <span class="badge bg-light text-dark rounded-pill ms-2">24</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-8 col-sm-6">
                                            <div class="d-flex align-items-center justify-content-sm-end">
                                                <a href="#" class="btn btn-light me-2" data-bs-toggle="modal" data-bs-target="#add_todo"><i class="ti ti-circle-plus me-2"></i>Add New</a>
                                                <a href="#" class="btn btn-white border">See All <i class="ti ti-arrow-right ms-2"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="collapseFour" class="accordion-collapse collapse show" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div class="list-group list-group-flush">
                                                <div class="list-group-item list-item-hover border rounded mb-2 p-3">
                                                    <div class="row align-items-center row-gap-3">
                                                        <div class="col-lg-6 col-md-7">
                                                            <div class="todo-inbox-check d-flex align-items-center flex-wrap row-gap-3">
                                                                <span class="me-2 d-flex align-items-center"><i class="ti ti-grid-dots text-dark"></i></span>
                                                                <div class="form-check form-check-md me-2">
                                                                    <input class="form-check-input" type="checkbox">
                                                                </div>
                                                                <span class="me-2 rating-select d-flex align-items-center"><i class="ti ti-star"></i></span>
                                                                <div class="strike-info">
                                                                    <h4 class="fs-14 mb-0">Plan tasks for the next day</h4>
                                                                </div>
                                                                <span class="badge bg-transparent-dark text-dark rounded-pill ms-2"><i class="ti ti-calendar me-1"></i>Today</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-5">
                                                            <div class="d-flex align-items-center justify-content-md-end flex-wrap row-gap-3">
                                                                <span class="badge bg-info me-3">Social</span>
                                                                <span class="badge badge-soft-info d-flex align-items-center me-3"><i class="fas fa-circle fs-6 me-1"></i>Pending</span>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="avatar-list-stacked avatar-group-sm">
                                                                        <span class="avatar avatar-rounded">
                                                                        <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-01.jpg')}}" alt="img">
                                                                    </span>
                                                                        <span class="avatar avatar-rounded">
                                                                        <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-02.jpg')}}" alt="img">
                                                                    </span>
                                                                        <span class="avatar avatar-rounded">
                                                                        <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-03.jpg')}}" alt="img">
                                                                    </span>
                                                                    </div>
                                                                    <div class="dropdown ms-2">
                                                                        <a href="javascript:void(0);" class="d-inline-flex align-items-center" data-bs-toggle="dropdown">
                                                                            <i class="ti ti-dots-vertical"></i>
                                                                        </a>
                                                                        <ul class="dropdown-menu dropdown-menu-end p-3">
                                                                            <li>
                                                                                <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#add_todo"><i class="ti ti-edit me-2"></i>Edit</a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-2"></i>Delete</a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#view_todo"><i class="ti ti-eye me-2"></i>View</a>
                                                                            </li>
                                                                        </ul>
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
                        <div class="tab-pane fade" id="pills-contact" role="tabpanel">
                            <div class="accordion todo-accordion">
                                <div class="accordion-item bg-white mb-3 border-0">
                                    <div class="row align-items-center mb-3 row-gap-3">
                                        <div class="col-lg-4 col-sm-6">
                                            <div class="accordion-header" id="headingSix">
                                                <div class="accordion-button bg-transparent" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-controls="collapseSix">
                                                    <div class="d-flex align-items-center w-100">
                                                        <div class="me-2">
                                                            <a href="javascript:void(0);">
                                                                <span><i class="fas fa-chevron-down"></i></span>
                                                            </a>
                                                        </div>
                                                        <div class="d-flex align-items-center">
                                                            <span><i class="ti ti-square-rounded text-purple me-2"></i></span>
                                                            <h5 class="fw-semibold">High</h5>
                                                            <span class="badge text-dark bg-light rounded-pill ms-2">15</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-8 col-sm-6">
                                            <div class="d-flex align-items-center justify-content-sm-end">
                                                <a href="#" class="btn btn-light me-2" data-bs-toggle="modal" data-bs-target="#add_todo"><i class="ti ti-circle-plus me-2"></i>Add New</a>
                                                <a href="#" class="btn btn-white border">See All <i class="ti ti-arrow-right ms-2"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="collapseSix" class="accordion-collapse collapse show" aria-labelledby="headingSix">
                                        <div class="accordion-body">
                                            <div class="list-group list-group-flush">
                                                <div class="list-group-item list-item-hover border rounded mb-2 p-3">
                                                    <div class="row align-items-center row-gap-3">
                                                        <div class="col-lg-6 col-md-7">
                                                            <div class="todo-inbox-check d-flex align-items-center flex-wrap row-gap-3">
                                                                <span class="me-2 d-flex align-items-center"><i class="ti ti-grid-dots text-dark"></i></span>
                                                                <div class="form-check form-check-md me-2">
                                                                    <input class="form-check-input" type="checkbox">
                                                                </div>
                                                                <span class="me-2 rating-select d-flex align-items-center"><i class="ti ti-star-filled filled"></i></span>
                                                                <div class="strike-info">
                                                                    <h4 class="fs-14 mb-0">Finalize project proposal</h4>
                                                                </div>
                                                                <span class="badge bg-transparent-dark text-dark rounded-pill ms-2"><i class="ti ti-calendar me-1"></i>15 Jan 2025</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-5">
                                                            <div class="d-flex align-items-center justify-content-md-end flex-wrap row-gap-3">
                                                                <span class="badge badge-success bg-success me-3">Projects</span>
                                                                <span class="badge badge-soft-danger d-inline-flex align-items-center me-3"><i class="fas fa-circle fs-6 me-1"></i>Onhold</span>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="avatar-list-stacked avatar-group-sm">
                                                                        <span class="avatar avatar-rounded">
                                                                        <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-01.jpg')}}" alt="img">
                                                                    </span>
                                                                        <span class="avatar avatar-rounded">
                                                                        <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-02.jpg')}}" alt="img">
                                                                    </span>
                                                                        <span class="avatar avatar-rounded">
                                                                        <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-03.jpg')}}" alt="img">
                                                                    </span>
                                                                    </div>
                                                                    <div class="dropdown ms-2">
                                                                        <a href="javascript:void(0);" class="d-inline-flex align-items-center" data-bs-toggle="dropdown">
                                                                            <i class="ti ti-dots-vertical"></i>
                                                                        </a>
                                                                        <ul class="dropdown-menu dropdown-menu-end p-3">
                                                                            <li>
                                                                                <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#add_todo"><i class="ti ti-edit me-2"></i>Edit</a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-2"></i>Delete</a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#view_todo"><i class="ti ti-eye me-2"></i>View</a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="list-group-item list-item-hover border rounded mb-2 p-3">
                                                    <div class="row align-items-center row-gap-3">
                                                        <div class="col-lg-6 col-md-7">
                                                            <div class="todo-inbox-check d-flex align-items-center flex-wrap row-gap-3">
                                                                <span class="me-2 d-flex align-items-center"><i class="ti ti-grid-dots text-dark"></i></span>
                                                                <div class="form-check form-check-md me-2">
                                                                    <input class="form-check-input" type="checkbox">
                                                                </div>
                                                                <span class="me-2 rating-select d-flex align-items-center"><i class="ti ti-star"></i></span>
                                                                <div class="strike-info">
                                                                    <h4 class="fs-14 mb-0">Submit to supervisor by EOD</h4>
                                                                </div>
                                                                <span class="badge bg-transparent-dark text-dark rounded-pill ms-2"><i class="ti ti-calendar me-1"></i>25 May 2024</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-5">
                                                            <div class="d-flex align-items-center justify-content-md-end flex-wrap row-gap-3">
                                                                <span class="badge bg-danger bg-danger me-3">Internal</span>
                                                                <span class="badge badge-soft-secondary d-flex align-items-center me-3"><i class="fas fa-circle fs-6 me-1"></i>Inprogress</span>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="avatar-list-stacked avatar-group-sm">
                                                                        <span class="avatar avatar-rounded">
                                                                        <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-01.jpg')}}" alt="img">
                                                                    </span>
                                                                        <span class="avatar avatar-rounded">
                                                                        <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-02.jpg')}}" alt="img">
                                                                    </span>
                                                                        <span class="avatar avatar-rounded">
                                                                        <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-03.jpg')}}" alt="img">
                                                                    </span>
                                                                    </div>
                                                                    <div class="dropdown ms-2">
                                                                        <a href="javascript:void(0);" class="d-inline-flex align-items-center" data-bs-toggle="dropdown">
                                                                            <i class="ti ti-dots-vertical"></i>
                                                                        </a>
                                                                        <ul class="dropdown-menu dropdown-menu-end p-3">
                                                                            <li>
                                                                                <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#add_todo"><i class="ti ti-edit me-2"></i>Edit</a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-2"></i>Delete</a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#view_todo"><i class="ti ti-eye me-2"></i>View</a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="list-group-item list-item-hover border rounded mb-2 p-3">
                                                    <div class="row align-items-center row-gap-3">
                                                        <div class="col-lg-6 col-md-7">
                                                            <div class="todo-inbox-check d-flex align-items-center flex-wrap row-gap-3 todo-strike-content">
                                                                <span class="me-2 d-flex align-items-center"><i class="ti ti-grid-dots text-dark"></i></span>
                                                                <div class="form-check form-check-md me-2">
                                                                    <input class="form-check-input" type="checkbox" checked>
                                                                </div>
                                                                <span class="me-2 rating-select d-flex align-items-center"><i class="ti ti-star"></i></span>
                                                                <div class="strike-info">
                                                                    <h4 class="fs-14 mb-0">Prepare presentation slides</h4>
                                                                </div>
                                                                <span class="badge bg-transparent-dark text-dark rounded-pill ms-2"><i class="ti ti-calendar me-1"></i>15 Jan 2025</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-5">
                                                            <div class="d-flex align-items-center justify-content-md-end flex-wrap row-gap-3">
                                                                <span class="badge bg-info me-3">Reminder</span>
                                                                <span class="badge badge-soft-info d-flex align-items-center me-3"><i class="fas fa-circle fs-6 me-1"></i>Pending</span>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="avatar-list-stacked avatar-group-sm">
                                                                        <span class="avatar avatar-rounded">
                                                                        <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-01.jpg')}}" alt="img">
                                                                    </span>
                                                                        <span class="avatar avatar-rounded">
                                                                        <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-02.jpg')}}" alt="img">
                                                                    </span>
                                                                        <span class="avatar avatar-rounded">
                                                                        <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-03.jpg')}}" alt="img">
                                                                    </span>
                                                                    </div>
                                                                    <div class="dropdown ms-2">
                                                                        <a href="javascript:void(0);" class="d-inline-flex align-items-center" data-bs-toggle="dropdown">
                                                                            <i class="ti ti-dots-vertical"></i>
                                                                        </a>
                                                                        <ul class="dropdown-menu dropdown-menu-end p-3">
                                                                            <li>
                                                                                <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#add_todo"><i class="ti ti-edit me-2"></i>Edit</a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-2"></i>Delete</a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#view_todo"><i class="ti ti-eye me-2"></i>View</a>
                                                                            </li>
                                                                        </ul>
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
                        <div class="tab-pane fade" id="pills-medium" role="tabpanel">
                            <div class="accordion todo-accordion">
                                <div class="accordion-item bg-white mb-3 border-0">
                                    <div class="row align-items-center mb-3 row-gap-3">
                                        <div class="col-lg-4 col-sm-6">
                                            <div class="accordion-header" id="headingSeven">
                                                <div class="accordion-button bg-transparent" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-controls="collapseSeven">
                                                    <div class="d-flex align-items-center w-100">
                                                        <div class="me-2">
                                                            <a href="javascript:void(0);">
                                                                <span><i class="fas fa-chevron-down"></i></span>
                                                            </a>
                                                        </div>
                                                        <div class="d-flex align-items-center">
                                                            <span><i class="ti ti-square-rounded text-warning me-2"></i></span>
                                                            <h5 class="fw-semibold">Medium</h5>
                                                            <span class="badge text-dark bg-light rounded-pill ms-2">05</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-8 col-sm-6">
                                            <div class="d-flex align-items-center justify-content-sm-end">
                                                <a href="#" class="btn btn-light me-2" data-bs-toggle="modal" data-bs-target="#add_todo"><i class="ti ti-circle-plus me-2"></i>Add New</a>
                                                <a href="#" class="btn btn-white border">See All <i class="ti ti-arrow-right ms-2"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="collapseSeven" class="accordion-collapse collapse show" aria-labelledby="headingSeven">
                                        <div class="accordion-body">
                                            <div class="list-group list-group-flush">
                                                <div class="list-group-item list-item-hover border rounded mb-2 p-3">
                                                    <div class="row align-items-center row-gap-3">
                                                        <div class="col-lg-6 col-md-7">
                                                            <div class="todo-inbox-check d-flex align-items-center flex-wrap row-gap-3">
                                                                <span class="me-2 d-flex align-items-center"><i class="ti ti-grid-dots text-dark"></i></span>
                                                                <div class="form-check form-check-md me-2">
                                                                    <input class="form-check-input" type="checkbox">
                                                                </div>
                                                                <span class="me-2 rating-select d-flex align-items-center"><i class="ti ti-star"></i></span>
                                                                <div class="strike-info">
                                                                    <h4 class="fs-14 mb-0">Check and respond to emails</h4>
                                                                </div>
                                                                <span class="badge bg-transparent-dark text-dark rounded-pill ms-2"><i class="ti ti-calendar me-1"></i>Tomorrow</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-5">
                                                            <div class="d-flex align-items-center justify-content-md-end flex-wrap row-gap-3">
                                                                <span class="badge bg-info me-3">Reminder</span>
                                                                <span class="badge badge-soft-success align-items-center me-3"><i class="fas fa-circle fs-6 me-1"></i>Completed</span>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="avatar-list-stacked avatar-group-sm">
                                                                        <span class="avatar avatar-rounded">
                                                                        <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-01.jpg')}}" alt="img">
                                                                    </span>
                                                                        <span class="avatar avatar-rounded">
                                                                        <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-02.jpg')}}" alt="img">
                                                                    </span>
                                                                        <span class="avatar avatar-rounded">
                                                                        <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-03.jpg')}}" alt="img">
                                                                    </span>
                                                                    </div>
                                                                    <div class="dropdown ms-2">
                                                                        <a href="javascript:void(0);" class="d-inline-flex align-items-center" data-bs-toggle="dropdown">
                                                                            <i class="ti ti-dots-vertical"></i>
                                                                        </a>
                                                                        <ul class="dropdown-menu dropdown-menu-end p-3">
                                                                            <li>
                                                                                <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#add_todo"><i class="ti ti-edit me-2"></i>Edit</a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-2"></i>Delete</a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#view_todo"><i class="ti ti-eye me-2"></i>View</a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="list-group-item list-item-hover border rounded mb-2 p-3">
                                                    <div class="row align-items-center row-gap-3">
                                                        <div class="col-lg-6 col-md-7">
                                                            <div class="todo-inbox-check d-flex align-items-center flex-wrap row-gap-3">
                                                                <span class="me-2 d-flex align-items-center"><i class="ti ti-grid-dots text-dark"></i></span>
                                                                <div class="form-check form-check-md me-2">
                                                                    <input class="form-check-input" type="checkbox">
                                                                </div>
                                                                <span class="me-2 rating-select d-flex align-items-center"><i class="ti ti-star"></i></span>
                                                                <div class="strike-info">
                                                                    <h4 class="fs-14 mb-0">Coordinate with department head on progress</h4>
                                                                </div>
                                                                <span class="badge bg-transparent-dark text-dark rounded-pill ms-2"><i class="ti ti-calendar me-1"></i>25 May 2024</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-5">
                                                            <div class="d-flex align-items-center justify-content-md-end flex-wrap row-gap-3">
                                                                <span class="badge bg-danger bg-danger me-3">Internal</span>
                                                                <span class="badge badge-soft-secondary d-flex align-items-center me-3"><i class="fas fa-circle fs-6 me-1"></i>Inprogress</span>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="avatar-list-stacked avatar-group-sm">
                                                                        <span class="avatar avatar-rounded">
                                                                        <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-06.jpg')}}" alt="img">
                                                                    </span>
                                                                        <span class="avatar avatar-rounded">
                                                                        <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-09.jpg')}}" alt="img">
                                                                    </span>
                                                                        <span class="avatar avatar-rounded">
                                                                        <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-02.jpg')}}" alt="img">
                                                                    </span>
                                                                    </div>
                                                                    <div class="dropdown ms-2">
                                                                        <a href="javascript:void(0);" class="d-inline-flex align-items-center" data-bs-toggle="dropdown">
                                                                            <i class="ti ti-dots-vertical"></i>
                                                                        </a>
                                                                        <ul class="dropdown-menu dropdown-menu-end p-3">
                                                                            <li>
                                                                                <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#add_todo"><i class="ti ti-edit me-2"></i>Edit</a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-2"></i>Delete</a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#view_todo"><i class="ti ti-eye me-2"></i>View</a>
                                                                            </li>
                                                                        </ul>
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
                        <div class="tab-pane fade" id="pills-low" role="tabpanel">
                            <div class="accordion todo-accordion">
                                <div class="accordion-item bg-white mb-3 border-0">
                                    <div class="row align-items-center mb-3 row-gap-3">
                                        <div class="col-lg-4 col-sm-6">
                                            <div class="accordion-header" id="headingEight">
                                                <div class="accordion-button bg-transparent" data-bs-toggle="collapse" data-bs-target="#collapseEight" aria-controls="collapseEight">
                                                    <div class="d-flex align-items-center w-100">
                                                        <div class="me-2">
                                                            <a href="javascript:void(0);">
                                                                <span><i class="fas fa-chevron-down"></i></span>
                                                            </a>
                                                        </div>
                                                        <div class="d-flex align-items-center">
                                                            <span><i class="ti ti-square-rounded text-success me-2"></i></span>
                                                            <h5 class="fw-semibold">Low</h5>
                                                            <span class="badge text-dark bg-light rounded-pill ms-2">24</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-8 col-sm-6">
                                            <div class="d-flex align-items-center justify-content-sm-end">
                                                <a href="#" class="btn btn-light me-2" data-bs-toggle="modal" data-bs-target="#add_todo"><i class="ti ti-circle-plus me-2"></i>Add New</a>
                                                <a href="#" class="btn btn-white border">See All <i class="ti ti-arrow-right ms-2"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="collapseEight" class="accordion-collapse collapse show" aria-labelledby="headingEight">
                                        <div class="accordion-body">
                                            <div class="list-group list-group-flush">
                                                <div class="list-group-item list-item-hover border rounded mb-2 p-3">
                                                    <div class="row align-items-center row-gap-3">
                                                        <div class="col-lg-6 col-md-7">
                                                            <div class="todo-inbox-check d-flex align-items-center flex-wrap row-gap-3">
                                                                <span class="me-2 d-flex align-items-center"><i class="ti ti-grid-dots text-dark"></i></span>
                                                                <div class="form-check form-check-md me-2">
                                                                    <input class="form-check-input" type="checkbox">
                                                                </div>
                                                                <span class="me-2 rating-select d-flex align-items-center"><i class="ti ti-star"></i></span>
                                                                <div class="strike-info">
                                                                    <h4 class="fs-14 mb-0">Plan tasks for the next day</h4>
                                                                </div>
                                                                <span class="badge bg-transparent-dark text-dark rounded-pill ms-2"><i class="ti ti-calendar me-1"></i>Today</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-5">
                                                            <div class="d-flex align-items-center justify-content-md-end flex-wrap row-gap-3">
                                                                <span class="badge bg-info me-3">Social</span>
                                                                <span class="badge badge-soft-info d-flex align-items-center me-3"><i class="fas fa-circle fs-6 me-1"></i>Pending</span>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="avatar-list-stacked avatar-group-sm">
                                                                        <span class="avatar avatar-rounded">
                                                                        <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-01.jpg')}}" alt="img">
                                                                    </span>
                                                                        <span class="avatar avatar-rounded">
                                                                        <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-02.jpg')}}" alt="img">
                                                                    </span>
                                                                        <span class="avatar avatar-rounded">
                                                                        <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-03.jpg')}}" alt="img">
                                                                    </span>
                                                                    </div>
                                                                    <div class="dropdown ms-2">
                                                                        <a href="javascript:void(0);" class="d-inline-flex align-items-center" data-bs-toggle="dropdown">
                                                                            <i class="ti ti-dots-vertical"></i>
                                                                        </a>
                                                                        <ul class="dropdown-menu dropdown-menu-end p-3">
                                                                            <li>
                                                                                <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#add_todo"><i class="ti ti-edit me-2"></i>Edit</a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-2"></i>Delete</a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#view_todo"><i class="ti ti-eye me-2"></i>View</a>
                                                                            </li>
                                                                        </ul>
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
                    <div class="text-center">
                        <a href="#" class="btn btn-primary"><i class="ti ti-loader me-2"></i>Load More</a>
                    </div>
                </div><!-- end card body -->
            </div><!-- end card -->
        </div>
        <!-- End Content -->

        <!-- Footer-->
        <div class="footer d-sm-flex align-items-center justify-content-between bg-white py-2 px-4 border-top">
            <p class="text-dark mb-0">&copy; 2025 <a href="javascript:void(0);" class="link-primary">Kanakku</a>, All Rights Reserved</p>
            <p class="text-dark">Version : 1.3.8</p>
        </div>
        <!-- /Footer-->
    </div>

    <!-- ========================
        End Page Content
    ========================= -->
@endsection