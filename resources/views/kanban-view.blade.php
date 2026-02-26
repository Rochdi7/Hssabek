<?php $page = 'kanban-view'; ?>
@extends('layout.mainlayout')
@section('content')
    <!-- ========================
        Start Page Content
    ========================= -->

    <div class="page-wrapper">	

        <!-- Start container -->
        <div class="content">
            <div class="d-flex my-xl-auto right-content justify-content-end align-items-center flex-wrap table-header">
                <div class="me-2 mb-3">
                    <div class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle btn btn-outline-white d-inline-flex align-items-center" data-bs-toggle="dropdown">
                            <i class="ti ti-file-export me-1"></i>Export
                        </a>
                        <ul class="dropdown-menu  dropdown-menu-end p-3">
                            <li>
                                <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-file-type-pdf me-1"></i>Export as PDF</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-file-type-xls me-1"></i>Export as Excel </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card shadow-none">
                <div class="card-header d-flex align-items-center justify-content-between flex-wrap row-gap-3">
                    <h6 class="mb-0">Kanban View</h6>
                    <div class="d-flex align-items-center flex-wrap row-gap-3">
                        <div class="avatar-list-stacked avatar-group-sm me-3">
                            <span class="avatar avatar-rounded">
                                <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-19.jpg')}}" alt="img">
                            </span>
                            <span class="avatar avatar-rounded">
                                <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-02.jpg')}}" alt="img">
                            </span>
                            <span class="avatar avatar-rounded">
                                <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-16.jpg')}}" alt="img">
                            </span>
                            <span class="avatar avatar-rounded bg-primary fs-12">
                            1+
                            </span>
                        </div>
                        <div class="d-flex align-items-center me-3">
                            <p class="mb-0 me-3 pe-3 border-end fs-14">Total Task : <span class="text-dark"> 55 </span></p>
                            <p class="mb-0 me-3 pe-3 border-end fs-14">Pending : <span class="text-dark"> 15 </span></p>
                            <p class="mb-0 fs-14">Completed : <span class="text-dark"> 40 </span></p>
                        </div>
                        <div class="input-icon-start position-relative">
                            <span class="input-icon-addon">
                                <i class="ti ti-search"></i>
                            </span>
                            <input type="text" class="form-control h-auto py-1" placeholder="Search Project">
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="d-flex align-items-center flex-wrap row-gap-3 mb-3">
                                <h6 class="me-2 fs-14">Priority</h6>
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
                                    <li class="nav-item me-1" role="presentation">
                                        <button class="nav-link btn btn-sm btn-icon p-2 d-flex align-items-center justify-content-center w-auto" data-bs-toggle="pill" data-bs-target="#pills-low" type="button" role="tab" aria-selected="false">Low</button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="d-flex align-items-center justify-content-lg-end flex-wrap row-gap-3 mb-3 table-header">
                                <div class="dropdown me-2">
                                    <a href="javascript:void(0);" class="dropdown-toggle btn btn-outline-white d-inline-flex align-items-center" data-bs-toggle="dropdown">
                                    Clients
                                    </a>
                                    <ul class="dropdown-menu  dropdown-menu-end p-3">
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item rounded-1">Clients</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item rounded-1">Sophie</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item rounded-1">Cameron</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item rounded-1">Doris</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="dropdown me-2">
                                    <a href="javascript:void(0);" class="dropdown-toggle btn btn-outline-white d-inline-flex align-items-center" data-bs-toggle="dropdown">
                                    Select Status
                                    </a>
                                    <ul class="dropdown-menu  dropdown-menu-end p-3">
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item rounded-1">Inprogress</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item rounded-1">On-hold</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item rounded-1">Completed</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="d-flex align-items-center border p-2 h-auto py-1 rounded fw-medium text-gray-9">
                                    <span class="d-inline-flex me-2">Sort By : </span>
                                    <div class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle pe-4 btn btn-outline-white d-inline-flex align-items-center border-0 bg-transparent p-0 text-dark" data-bs-toggle="dropdown">
                                    Created Date
                                    </a>
                                        <ul class="dropdown-menu  dropdown-menu-end p-3">
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item rounded-1">Created Date</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item rounded-1">Last 7 Days</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item rounded-1">Due Date</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel">
                            <div class="d-flex align-items-start overflow-auto project-status">
                                <div class="p-3 rounded bg-light border w-100 me-3">
                                    <div class="bg-white border p-2 rounded mb-2">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <span class="bg-soft-warning p-1 d-flex rounded-circle me-2"><span class="bg-warning rounded-circle d-block p-1"></span></span>
                                                <h6 class="me-2 mb-0">New</h6>
                                                <span class="badge badge-soft-light  text-dark rounded-pill">02</span>
                                            </div>
                                            <div class="dropdown">
                                                <a href="javascript:void(0);" class="d-inline-flex align-items-center" data-bs-toggle="dropdown">
                                                    <i class="ti ti-dots-vertical"></i>
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-end p-3">
                                                    <li>
                                                        <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-edit me-2"></i>Edit</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-2"></i>Delete</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="kanban-drag-wrap">
                                        <div>
                                            <div class="card kanban-card mb-2">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                                        <div class="d-flex align-items-center">
                                                            <span class="badge bg-success badge-xs d-flex align-items-center justify-content-center"><i class="fas fa-circle fs-6 me-1"></i>Low</span>
                                                        </div>
                                                        <div class="dropdown">
                                                            <a href="javascript:void(0);" class="d-inline-flex align-items-center" data-bs-toggle="dropdown">
                                                                <i class="ti ti-dots-vertical"></i>
                                                            </a>
                                                            <ul class="dropdown-menu dropdown-menu-end p-3">
                                                                <li>
                                                                    <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-edit me-2"></i>Edit</a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-2"></i>Delete</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center mb-3">
                                                        <span class="avatar avatar-xs rounded-circle bg-warning me-2">
                                                        <img src="{{URL::asset('build/img/icons/kanban-arrow.svg')}}" class="w-auto h-auto" alt="Img">
                                                    </span>
                                                        <h6 class="d-flex align-items-center mb-0">Doccure</h6>
                                                    </div>
                                                    <div class="d-flex align-items-center border-bottom mb-3 pb-3">
                                                        <div class="me-3 pe-3 border-end">
                                                            <span class="fw-medium fs-12 d-block mb-1">Budget</span>
                                                            <p class="fs-12 text-dark">$24,000</p>
                                                        </div>
                                                        <div class="me-3 pe-3 border-end">
                                                            <span class="fw-medium fs-12 d-block mb-1">Tasks</span>
                                                            <p class="fs-12 text-dark">12/15</p>
                                                        </div>
                                                        <div class="">
                                                            <span class="fw-medium fs-12 d-block mb-1">Due on</span>
                                                            <p class="fs-12 text-dark">15 Apr</p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <div class="avatar-list-stacked avatar-group-sm me-3">
                                                            <span class="avatar avatar-rounded">
                                                                <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-10.jpg')}}" alt="img">
                                                            </span>
                                                            <span class="avatar avatar-rounded">
                                                                <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-08.jpg')}}" alt="img">
                                                            </span>
                                                            <span class="avatar avatar-rounded">
                                                                <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-07.jpg')}}" alt="img">
                                                            </span>
                                                            <span class="avatar avatar-rounded">
                                                                <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-02.jpg')}}" alt="img">
                                                            </span>
                                                            <span class="avatar avatar-rounded">
                                                                <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-03.jpg')}}" alt="img">
                                                            </span>
                                                            <a href="#" class="avatar avatar-rounded bg-primary fs-12 text-white">
                                                            1+
                                                            </a>
                                                        </div>
                                                        <div class="d-flex align-items-center">
                                                            <a href="javascript:void(0);" class="d-flex align-items-center text-dark me-2"><i class="ti ti-message-circle text-gray me-1"></i></a>
                                                            <a href="javascript:void(0);" class="d-flex align-items-center text-dark"><i class="ti ti-paperclip text-gray me-1"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="card kanban-card mb-2">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                                        <div class="d-flex align-items-center">
                                                            <span class="badge bg-danger badge-xs d-flex align-items-center justify-content-center"><i class="fas fa-circle fs-6 me-1"></i>High</span>
                                                        </div>
                                                        <div class="dropdown">
                                                            <a href="javascript:void(0);" class="d-inline-flex align-items-center" data-bs-toggle="dropdown">
                                                                <i class="ti ti-dots-vertical"></i>
                                                            </a>
                                                            <ul class="dropdown-menu dropdown-menu-end p-3">
                                                                <li>
                                                                    <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-edit me-2"></i>Edit</a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-2"></i>Delete</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center mb-3">
                                                        <span class="avatar avatar-xs rounded-circle bg-warning me-2">
                                                            <img src="{{URL::asset('build/img/icons/kanban-arrow.svg')}}" class="w-auto h-auto" alt="Img">
                                                        </span>
                                                        <h6 class="d-flex align-items-center mb-0">Dreams Tour</h6>
                                                    </div>
                                                    <div class="d-flex align-items-center border-bottom mb-3 pb-3">
                                                        <div class="me-3 pe-3 border-end">
                                                            <span class="fw-medium fs-12 d-block mb-1">Budget</span>
                                                            <p class="fs-12 text-dark">$24,000</p>
                                                        </div>
                                                        <div class="me-3 pe-3 border-end">
                                                            <span class="fw-medium fs-12 d-block mb-1">Tasks</span>
                                                            <p class="fs-12 text-dark">12/15</p>
                                                        </div>
                                                        <div class="">
                                                            <span class="fw-medium fs-12 d-block mb-1">Due on</span>
                                                            <p class="fs-12 text-dark">15 Apr</p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <div class="avatar-list-stacked avatar-group-sm me-3">
                                                            <span class="avatar avatar-rounded">
                                                                <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-07.jpg')}}" alt="img">
                                                            </span>
                                                            <span class="avatar avatar-rounded">
                                                                <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-09.jpg')}}" alt="img">
                                                            </span>
                                                            <span class="avatar avatar-rounded">
                                                                <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-01.jpg')}}" alt="img">
                                                            </span>
                                                            <span class="avatar avatar-rounded">
                                                                <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-02.jpg')}}" alt="img">
                                                            </span>
                                                            <span class="avatar avatar-rounded">
                                                                <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-03.jpg')}}" alt="img">
                                                            </span>
                                                            <a href="#" class="avatar avatar-rounded bg-primary fs-12 text-white">
                                                            1+
                                                            </a>
                                                        </div>
                                                        <div class="d-flex align-items-center">
                                                            <a href="javascript:void(0);" class="d-flex align-items-center text-dark me-2"><i class="ti ti-message-circle text-gray me-1"></i></a>
                                                            <a href="javascript:void(0);" class="d-flex align-items-center text-dark"><i class="ti ti-paperclip text-gray me-1"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pt-2">
                                        <a href="#" class="btn btn-outline-white border border-dashed d-flex align-items-center justify-content-center">
                                            <i class="ti ti-plus me-2"></i> New Project
                                        </a>
                                    </div>
                                </div>
                                <div class="p-3 rounded bg-light border w-100 me-3">
                                    <div class="bg-white border p-2 rounded mb-2">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <span class="bg-soft-primary p-1 d-flex rounded-circle me-2"><span class="bg-primary rounded-circle d-block p-1"></span></span>
                                                <h6 class="me-2 mb-0">Inprogress</h6>
                                                <span class="badge badge-soft-light  text-dark rounded-pill">13</span>
                                            </div>
                                            <div class="dropdown">
                                                <a href="javascript:void(0);" class="d-inline-flex align-items-center" data-bs-toggle="dropdown">
                                                    <i class="ti ti-dots-vertical"></i>
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-end p-3">
                                                    <li>
                                                        <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-edit me-2"></i>Edit</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-2"></i>Delete</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="kanban-drag-wrap">
                                        <div>
                                            <div class="card kanban-card mb-2">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                                        <div class="d-flex align-items-center">
                                                            <span class="badge bg-danger badge-xs d-flex align-items-center justify-content-center"><i class="fas fa-circle fs-6 me-1"></i>High</span>
                                                        </div>
                                                        <div class="dropdown">
                                                            <a href="javascript:void(0);" class="d-inline-flex align-items-center" data-bs-toggle="dropdown">
                                                                <i class="ti ti-dots-vertical"></i>
                                                            </a>
                                                            <ul class="dropdown-menu dropdown-menu-end p-3">
                                                                <li>
                                                                    <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-edit me-2"></i>Edit</a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-2"></i>Delete</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center mb-3">
                                                        <span class="avatar avatar-xs rounded-circle bg-warning me-2">
                                                        <img src="{{URL::asset('build/img/icons/kanban-arrow.svg')}}" class="w-auto h-auto" alt="Img">
                                                    </span>
                                                        <h6 class="d-flex align-items-center mb-0">Dreams Gigs</h6>
                                                    </div>
                                                    <div class="d-flex align-items-center border-bottom mb-3 pb-3">
                                                        <div class="me-3 pe-3 border-end">
                                                            <span class="fw-medium fs-12 d-block mb-1">Budget</span>
                                                            <p class="fs-12 text-dark">$24,000</p>
                                                        </div>
                                                        <div class="me-3 pe-3 border-end">
                                                            <span class="fw-medium fs-12 d-block mb-1">Tasks</span>
                                                            <p class="fs-12 text-dark">12/15</p>
                                                        </div>
                                                        <div class="">
                                                            <span class="fw-medium fs-12 d-block mb-1">Due on</span>
                                                            <p class="fs-12 text-dark">15 Apr</p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <div class="avatar-list-stacked avatar-group-sm me-3">
                                                            <span class="avatar avatar-rounded">
                                                                <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-02.jpg')}}" alt="img">
                                                            </span>
                                                            <span class="avatar avatar-rounded">
                                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-04.jpg')}}" alt="img">
                                                            </span>
                                                            <span class="avatar avatar-rounded">
                                                                <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-01.jpg')}}" alt="img">
                                                            </span>
                                                            <span class="avatar avatar-rounded">
                                                                <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-02.jpg')}}" alt="img">
                                                            </span>
                                                            <span class="avatar avatar-rounded">
                                                                <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-03.jpg')}}" alt="img">
                                                            </span>
                                                            <a href="#" class="avatar avatar-rounded bg-primary fs-12 text-white">
                                                            1+
                                                            </a>
                                                        </div>
                                                        <div class="d-flex align-items-center">
                                                            <a href="javascript:void(0);" class="d-flex align-items-center text-dark me-2"><i class="ti ti-message-circle text-gray me-1"></i></a>
                                                            <a href="javascript:void(0);" class="d-flex align-items-center text-dark"><i class="ti ti-paperclip text-gray me-1"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="card kanban-card mb-2">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                                        <div class="d-flex align-items-center">
                                                            <span class="badge bg-warning badge-xs d-flex align-items-center justify-content-center"><i class="fas fa-circle fs-6 me-1"></i>Medium</span>
                                                        </div>
                                                        <div class="dropdown">
                                                            <a href="javascript:void(0);" class="d-inline-flex align-items-center" data-bs-toggle="dropdown">
                                                                <i class="ti ti-dots-vertical"></i>
                                                            </a>
                                                            <ul class="dropdown-menu dropdown-menu-end p-3">
                                                                <li>
                                                                    <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-edit me-2"></i>Edit</a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-2"></i>Delete</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center mb-3">
                                                        <span class="avatar avatar-xs rounded-circle bg-warning me-2">
                                                            <img src="{{URL::asset('build/img/icons/kanban-arrow.svg')}}" class="w-auto h-auto" alt="Img">
                                                        </span>
                                                        <h6 class="d-flex align-items-center mb-0">Dreams Rent</h6>
                                                    </div>
                                                    <div class="d-flex align-items-center border-bottom mb-3 pb-3">
                                                        <div class="me-3 pe-3 border-end">
                                                            <span class="fw-medium fs-12 d-block mb-1">Budget</span>
                                                            <p class="fs-12 text-dark">$24,000</p>
                                                        </div>
                                                        <div class="me-3 pe-3 border-end">
                                                            <span class="fw-medium fs-12 d-block mb-1">Tasks</span>
                                                            <p class="fs-12 text-dark">12/15</p>
                                                        </div>
                                                        <div class="">
                                                            <span class="fw-medium fs-12 d-block mb-1">Due on</span>
                                                            <p class="fs-12 text-dark">15 Apr</p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <div class="avatar-list-stacked avatar-group-sm me-3">
                                                            <span class="avatar avatar-rounded">
                                                                <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-10.jpg')}}" alt="img">
                                                            </span>
                                                            <span class="avatar avatar-rounded">
                                                                <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-05.jpg')}}" alt="img">
                                                            </span>
                                                            <span class="avatar avatar-rounded">
                                                                <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-01.jpg')}}" alt="img">
                                                            </span>
                                                            <span class="avatar avatar-rounded">
                                                                <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-02.jpg')}}" alt="img">
                                                            </span>
                                                            <span class="avatar avatar-rounded">
                                                                <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-03.jpg')}}" alt="img">
                                                            </span>
                                                            <a href="#" class="avatar avatar-rounded bg-primary fs-12 text-white">
                                                            1+
                                                            </a>
                                                        </div>
                                                        <div class="d-flex align-items-center">
                                                            <a href="javascript:void(0);" class="d-flex align-items-center text-dark me-2"><i class="ti ti-message-circle text-gray me-1"></i></a>
                                                            <a href="javascript:void(0);" class="d-flex align-items-center text-dark"><i class="ti ti-paperclip text-gray me-1"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pt-2">
                                        <a href="#" class="btn btn-outline-white border border-dashed d-flex align-items-center justify-content-center">
                                            <i class="ti ti-plus me-2"></i> New Project
                                        </a>
                                    </div>
                                </div>
                                <div class="p-3 rounded bg-light border w-100 me-3">
                                    <div class="bg-white border p-2 rounded mb-2">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <span class="bg-soft-danger p-1 d-flex rounded-circle me-2"><span class="bg-danger rounded-circle d-block p-1"></span></span>
                                                <h6 class="me-2 mb-0">On-hold</h6>
                                                <span class="badge badge-soft-light  text-dark rounded-pill">04</span>
                                            </div>
                                            <div class="dropdown">
                                                <a href="javascript:void(0);" class="d-inline-flex align-items-center" data-bs-toggle="dropdown">
                                                    <i class="ti ti-dots-vertical"></i>
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-end p-3">
                                                    <li>
                                                        <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-edit me-2"></i>Edit</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-2"></i>Delete</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="kanban-drag-wrap">
                                        <div>
                                            <div class="card kanban-card mb-2">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                                        <div class="d-flex align-items-center">
                                                            <span class="badge bg-success badge-xs d-flex align-items-center justify-content-center"><i class="fas fa-circle fs-6 me-1"></i>Low</span>
                                                        </div>
                                                        <div class="dropdown">
                                                            <a href="javascript:void(0);" class="d-inline-flex align-items-center" data-bs-toggle="dropdown">
                                                                <i class="ti ti-dots-vertical"></i>
                                                            </a>
                                                            <ul class="dropdown-menu dropdown-menu-end p-3">
                                                                <li>
                                                                    <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-edit me-2"></i>Edit</a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-2"></i>Delete</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center mb-3">
                                                        <span class="avatar avatar-xs rounded-circle bg-warning me-2">
                                                        <img src="{{URL::asset('build/img/icons/kanban-arrow.svg')}}" class="w-auto h-auto" alt="Img">
                                                    </span>
                                                        <h6 class="d-flex align-items-center mb-0">Dreams Sports</h6>
                                                    </div>
                                                    <div class="d-flex align-items-center border-bottom mb-3 pb-3">
                                                        <div class="me-3 pe-3 border-end">
                                                            <span class="fw-medium fs-12 d-block mb-1">Budget</span>
                                                            <p class="fs-12 text-dark">$24,000</p>
                                                        </div>
                                                        <div class="me-3 pe-3 border-end">
                                                            <span class="fw-medium fs-12 d-block mb-1">Tasks</span>
                                                            <p class="fs-12 text-dark">12/15</p>
                                                        </div>
                                                        <div class="">
                                                            <span class="fw-medium fs-12 d-block mb-1">Due on</span>
                                                            <p class="fs-12 text-dark">15 Apr</p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <div class="avatar-list-stacked avatar-group-sm me-3">
                                                            <span class="avatar avatar-rounded">
                                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-10.jpg')}}" alt="img">
                                                        </span>
                                                            <span class="avatar avatar-rounded">
                                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-03.jpg')}}" alt="img">
                                                        </span>
                                                            <span class="avatar avatar-rounded">
                                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-01.jpg')}}" alt="img">
                                                        </span>
                                                            <span class="avatar avatar-rounded">
                                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-02.jpg')}}" alt="img">
                                                        </span>
                                                            <span class="avatar avatar-rounded">
                                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-03.jpg')}}" alt="img">
                                                        </span>
                                                            <a href="#" class="avatar avatar-rounded bg-primary fs-12 text-white">
                                                            1+
                                                        </a>
                                                        </div>
                                                        <div class="d-flex align-items-center">
                                                            <a href="javascript:void(0);" class="d-flex align-items-center text-dark me-2"><i class="ti ti-message-circle text-gray me-1"></i></a>
                                                            <a href="javascript:void(0);" class="d-flex align-items-center text-dark"><i class="ti ti-paperclip text-gray me-1"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="card kanban-card mb-2">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                                        <div class="d-flex align-items-center">
                                                            <span class="badge bg-success badge-xs d-flex align-items-center justify-content-center"><i class="fas fa-circle fs-6 me-1"></i>Low</span>
                                                        </div>
                                                        <div class="dropdown">
                                                            <a href="javascript:void(0);" class="d-inline-flex align-items-center" data-bs-toggle="dropdown">
                                                                <i class="ti ti-dots-vertical"></i>
                                                            </a>
                                                            <ul class="dropdown-menu dropdown-menu-end p-3">
                                                                <li>
                                                                    <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-edit me-2"></i>Edit</a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-2"></i>Delete</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center mb-3">
                                                        <span class="avatar avatar-xs rounded-circle bg-warning me-2">
                                                        <img src="{{URL::asset('build/img/icons/kanban-arrow.svg')}}" class="w-auto h-auto" alt="Img">
                                                    </span>
                                                        <h6 class="d-flex align-items-center mb-0">Dreams Estate</h6>
                                                    </div>
                                                    <div class="d-flex align-items-center border-bottom mb-3 pb-3">
                                                        <div class="me-3 pe-3 border-end">
                                                            <span class="fw-medium fs-12 d-block mb-1">Budget</span>
                                                            <p class="fs-12 text-dark">$24,000</p>
                                                        </div>
                                                        <div class="me-3 pe-3 border-end">
                                                            <span class="fw-medium fs-12 d-block mb-1">Tasks</span>
                                                            <p class="fs-12 text-dark">12/15</p>
                                                        </div>
                                                        <div class="">
                                                            <span class="fw-medium fs-12 d-block mb-1">Due on</span>
                                                            <p class="fs-12 text-dark">15 Apr</p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <div class="avatar-list-stacked avatar-group-sm me-3">
                                                            <span class="avatar avatar-rounded">
                                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-10.jpg')}}" alt="img">
                                                        </span>
                                                            <span class="avatar avatar-rounded">
                                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-04.jpg')}}" alt="img">
                                                        </span>
                                                            <span class="avatar avatar-rounded">
                                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-01.jpg')}}" alt="img">
                                                        </span>
                                                            <span class="avatar avatar-rounded">
                                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-02.jpg')}}" alt="img">
                                                        </span>
                                                            <span class="avatar avatar-rounded">
                                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-03.jpg')}}" alt="img">
                                                        </span>
                                                            <a href="#" class="avatar avatar-rounded bg-primary fs-12 text-white">
                                                            1+
                                                        </a>
                                                        </div>
                                                        <div class="d-flex align-items-center">
                                                            <a href="javascript:void(0);" class="d-flex align-items-center text-dark me-2"><i class="ti ti-message-circle text-gray me-1"></i></a>
                                                            <a href="javascript:void(0);" class="d-flex align-items-center text-dark"><i class="ti ti-paperclip text-gray me-1"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pt-2">
                                        <a href="#" class="btn btn-outline-white border border-dashed d-flex align-items-center justify-content-center">
                                            <i class="ti ti-plus me-2"></i> New Project
                                        </a>
                                    </div>
                                </div>
                                <div class="p-3 rounded bg-light border w-100">
                                    <div class="bg-white border p-2 rounded mb-2">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <span class="bg-soft-success p-1 d-flex rounded-circle me-2"><span class="bg-success rounded-circle d-block p-1"></span></span>
                                                <h6 class="me-2 mb-0">Completed</h6>
                                                <span class="badge badge-soft-light  text-dark rounded-pill">10</span>
                                            </div>
                                            <div class="dropdown">
                                                <a href="javascript:void(0);" class="d-inline-flex align-items-center" data-bs-toggle="dropdown">
                                                    <i class="ti ti-dots-vertical"></i>
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-end p-3">
                                                    <li>
                                                        <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-edit me-2"></i>Edit</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-2"></i>Delete</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="kanban-drag-wrap">
                                        <div>
                                            <div class="card kanban-card mb-2">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                                        <div class="d-flex align-items-center">
                                                            <span class="badge bg-warning badge-xs d-flex align-items-center justify-content-center"><i class="fas fa-circle fs-6 me-1"></i>Medium</span>
                                                        </div>
                                                        <div class="dropdown">
                                                            <a href="javascript:void(0);" class="d-inline-flex align-items-center" data-bs-toggle="dropdown">
                                                                <i class="ti ti-dots-vertical"></i>
                                                            </a>
                                                            <ul class="dropdown-menu dropdown-menu-end p-3">
                                                                <li>
                                                                    <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-edit me-2"></i>Edit</a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-2"></i>Delete</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center mb-3">
                                                        <span class="avatar avatar-xs rounded-circle bg-warning me-2">
                                                        <img src="{{URL::asset('build/img/icons/kanban-arrow.svg')}}" class="w-auto h-auto" alt="Img">
                                                    </span>
                                                        <h6 class="d-flex align-items-center mb-0">Dreams Rent</h6>
                                                    </div>
                                                    <div class="d-flex align-items-center border-bottom mb-3 pb-3">
                                                        <div class="me-3 pe-3 border-end">
                                                            <span class="fw-medium fs-12 d-block mb-1">Budget</span>
                                                            <p class="fs-12 text-dark">$24,000</p>
                                                        </div>
                                                        <div class="me-3 pe-3 border-end">
                                                            <span class="fw-medium fs-12 d-block mb-1">Tasks</span>
                                                            <p class="fs-12 text-dark">12/15</p>
                                                        </div>
                                                        <div class="">
                                                            <span class="fw-medium fs-12 d-block mb-1">Due on</span>
                                                            <p class="fs-12 text-dark">15 Apr</p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <div class="avatar-list-stacked avatar-group-sm me-3">
                                                            <span class="avatar avatar-rounded">
                                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-10.jpg')}}" alt="img">
                                                        </span>
                                                            <span class="avatar avatar-rounded">
                                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-04.jpg')}}" alt="img">
                                                        </span>
                                                            <span class="avatar avatar-rounded">
                                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-01.jpg')}}" alt="img">
                                                        </span>
                                                            <span class="avatar avatar-rounded">
                                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-02.jpg')}}" alt="img">
                                                        </span>
                                                            <span class="avatar avatar-rounded">
                                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-03.jpg')}}" alt="img">
                                                        </span>
                                                            <a href="#" class="avatar avatar-rounded bg-primary fs-12 text-white">
                                                            1+
                                                        </a>
                                                        </div>
                                                        <div class="d-flex align-items-center">
                                                            <a href="javascript:void(0);" class="d-flex align-items-center text-dark me-2"><i class="ti ti-message-circle text-gray me-1"></i></a>
                                                            <a href="javascript:void(0);" class="d-flex align-items-center text-dark"><i class="ti ti-paperclip text-gray me-1"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pt-2">
                                        <a href="#" class="btn btn-outline-white border border-dashed d-flex align-items-center justify-content-center">
                                            <i class="ti ti-plus me-2"></i> New Project
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-contact" role="tabpanel">
                            <div class="d-flex align-items-start overflow-auto project-status pb-3">
                                <div class="p-3 rounded bg-light border w-100 me-3">
                                    <div class="bg-white border p-2 rounded mb-2">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <span class="bg-soft-warning p-1 d-flex rounded-circle me-2"><span class="bg-warning rounded-circle d-block p-1"></span></span>
                                                <h6 class="me-2 mb-0">New</h6>
                                                <span class="badge badge-soft-light  text-dark rounded-pill">02</span>
                                            </div>
                                            <div class="dropdown">
                                                <a href="javascript:void(0);" class="d-inline-flex align-items-center" data-bs-toggle="dropdown">
                                                    <i class="ti ti-dots-vertical"></i>
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-end p-3">
                                                    <li>
                                                        <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-edit me-2"></i>Edit</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-2"></i>Delete</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="kanban-drag-wrap">
                                        <div>
                                            <div class="card kanban-card mb-2">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                                        <div class="d-flex align-items-center">
                                                            <span class="badge bg-danger badge-xs d-flex align-items-center justify-content-center"><i class="fas fa-circle fs-6 me-1"></i>High</span>
                                                        </div>
                                                        <div class="dropdown">
                                                            <a href="javascript:void(0);" class="d-inline-flex align-items-center" data-bs-toggle="dropdown">
                                                                <i class="ti ti-dots-vertical"></i>
                                                            </a>
                                                            <ul class="dropdown-menu dropdown-menu-end p-3">
                                                                <li>
                                                                    <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-edit me-2"></i>Edit</a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-2"></i>Delete</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center mb-3">
                                                        <span class="avatar avatar-xs rounded-circle bg-warning me-2">
                                                        <img src="{{URL::asset('build/img/icons/kanban-arrow.svg')}}" class="w-auto h-auto" alt="Img">
                                                    </span>
                                                        <h6 class="d-flex align-items-center mb-0">Dreams LMS</h6>
                                                    </div>
                                                    <div class="d-flex align-items-center border-bottom mb-3 pb-3">
                                                        <div class="me-3 pe-3 border-end">
                                                            <span class="fw-medium fs-12 d-block mb-1">Budget</span>
                                                            <p class="fs-12 text-dark">$24,000</p>
                                                        </div>
                                                        <div class="me-3 pe-3 border-end">
                                                            <span class="fw-medium fs-12 d-block mb-1">Tasks</span>
                                                            <p class="fs-12 text-dark">12/15</p>
                                                        </div>
                                                        <div class="">
                                                            <span class="fw-medium fs-12 d-block mb-1">Due on</span>
                                                            <p class="fs-12 text-dark">15 Apr</p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <div class="avatar-list-stacked avatar-group-sm me-3">
                                                            <span class="avatar avatar-rounded">
                                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-10.jpg')}}" alt="img">
                                                        </span>
                                                            <span class="avatar avatar-rounded">
                                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-04.jpg')}}" alt="img">
                                                        </span>
                                                            <span class="avatar avatar-rounded">
                                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-01.jpg')}}" alt="img">
                                                        </span>
                                                            <span class="avatar avatar-rounded">
                                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-02.jpg')}}" alt="img">
                                                        </span>
                                                            <span class="avatar avatar-rounded">
                                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-03.jpg')}}" alt="img">
                                                        </span>
                                                            <a href="#" class="avatar avatar-rounded bg-primary fs-12 text-white">
                                                            1+
                                                        </a>
                                                        </div>
                                                        <div class="d-flex align-items-center">
                                                            <a href="javascript:void(0);" class="d-flex align-items-center text-dark me-2"><i class="ti ti-message-circle text-gray me-1"></i></a>
                                                            <a href="javascript:void(0);" class="d-flex align-items-center text-dark"><i class="ti ti-paperclip text-gray me-1"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="card kanban-card mb-2">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                                        <div class="d-flex align-items-center">
                                                            <span class="badge bg-danger badge-xs d-flex align-items-center justify-content-center"><i class="fas fa-circle fs-6 me-1"></i>High</span>
                                                        </div>
                                                        <div class="dropdown">
                                                            <a href="javascript:void(0);" class="d-inline-flex align-items-center" data-bs-toggle="dropdown">
                                                                <i class="ti ti-dots-vertical"></i>
                                                            </a>
                                                            <ul class="dropdown-menu dropdown-menu-end p-3">
                                                                <li>
                                                                    <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-edit me-2"></i>Edit</a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-2"></i>Delete</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center mb-3">
                                                        <span class="avatar avatar-xs rounded-circle bg-warning me-2">
                                                        <img src="{{URL::asset('build/img/icons/kanban-arrow.svg')}}" class="w-auto h-auto" alt="Img">
                                                    </span>
                                                        <h6 class="d-flex align-items-center mb-0">Truelysell</h6>
                                                    </div>
                                                    <div class="d-flex align-items-center border-bottom mb-3 pb-3">
                                                        <div class="me-3 pe-3 border-end">
                                                            <span class="fw-medium fs-12 d-block mb-1">Budget</span>
                                                            <p class="fs-12 text-dark">$24,000</p>
                                                        </div>
                                                        <div class="me-3 pe-3 border-end">
                                                            <span class="fw-medium fs-12 d-block mb-1">Tasks</span>
                                                            <p class="fs-12 text-dark">12/15</p>
                                                        </div>
                                                        <div class="">
                                                            <span class="fw-medium fs-12 d-block mb-1">Due on</span>
                                                            <p class="fs-12 text-dark">15 Apr</p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <div class="avatar-list-stacked avatar-group-sm me-3">
                                                            <span class="avatar avatar-rounded">
                                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-10.jpg')}}" alt="img">
                                                        </span>
                                                            <span class="avatar avatar-rounded">
                                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-05.jpg')}}" alt="img">
                                                        </span>
                                                            <span class="avatar avatar-rounded">
                                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-01.jpg')}}" alt="img">
                                                        </span>
                                                            <span class="avatar avatar-rounded">
                                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-02.jpg')}}" alt="img">
                                                        </span>
                                                            <span class="avatar avatar-rounded">
                                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-03.jpg')}}" alt="img">
                                                        </span>
                                                            <a href="#" class="avatar avatar-rounded bg-primary fs-12 text-white">
                                                            1+
                                                        </a>
                                                        </div>
                                                        <div class="d-flex align-items-center">
                                                            <a href="javascript:void(0);" class="d-flex align-items-center text-dark me-2"><i class="ti ti-message-circle text-gray me-1"></i></a>
                                                            <a href="javascript:void(0);" class="d-flex align-items-center text-dark"><i class="ti ti-paperclip text-gray me-1"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pt-2">
                                        <a href="#" class="btn btn-outline-white border border-dashed d-flex align-items-center justify-content-center">
                                            <i class="ti ti-plus me-2"></i> New Project
                                        </a>
                                    </div>
                                </div>
                                <div class="p-3 rounded bg-light border w-100 me-3">
                                    <div class="bg-white border p-2 rounded mb-2">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <span class="bg-soft-skyblue p-1 d-flex rounded-circle me-2"><span class="bg-skyblue rounded-circle d-block p-1"></span></span>
                                                <h6 class="me-2 mb-0">Inprogress</h6>
                                                <span class="badge badge-soft-light  text-dark rounded-pill">13</span>
                                            </div>
                                            <div class="dropdown">
                                                <a href="javascript:void(0);" class="d-inline-flex align-items-center" data-bs-toggle="dropdown">
                                                    <i class="ti ti-dots-vertical"></i>
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-end p-3">
                                                    <li>
                                                        <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-edit me-2"></i>Edit</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-2"></i>Delete</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="kanban-drag-wrap">
                                        <div>
                                            <div class="card kanban-card mb-2">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                                        <div class="d-flex align-items-center">
                                                            <span class="badge bg-danger badge-xs d-flex align-items-center justify-content-center"><i class="fas fa-circle fs-6 me-1"></i>High</span>
                                                        </div>
                                                        <div class="dropdown">
                                                            <a href="javascript:void(0);" class="d-inline-flex align-items-center" data-bs-toggle="dropdown">
                                                                <i class="ti ti-dots-vertical"></i>
                                                            </a>
                                                            <ul class="dropdown-menu dropdown-menu-end p-3">
                                                                <li>
                                                                    <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-edit me-2"></i>Edit</a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-2"></i>Delete</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center mb-3">
                                                        <span class="avatar avatar-xs rounded-circle bg-warning me-2">
                                                        <img src="{{URL::asset('build/img/icons/kanban-arrow.svg')}}" class="w-auto h-auto" alt="Img">
                                                    </span>
                                                        <h6 class="d-flex align-items-center mb-0">Dreams POS</h6>
                                                    </div>
                                                    <div class="d-flex align-items-center border-bottom mb-3 pb-3">
                                                        <div class="me-3 pe-3 border-end">
                                                            <span class="fw-medium fs-12 d-block mb-1">Budget</span>
                                                            <p class="fs-12 text-dark">$24,000</p>
                                                        </div>
                                                        <div class="me-3 pe-3 border-end">
                                                            <span class="fw-medium fs-12 d-block mb-1">Tasks</span>
                                                            <p class="fs-12 text-dark">12/15</p>
                                                        </div>
                                                        <div class="">
                                                            <span class="fw-medium fs-12 d-block mb-1">Due on</span>
                                                            <p class="fs-12 text-dark">15 Apr</p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <div class="avatar-list-stacked avatar-group-sm me-3">
                                                            <span class="avatar avatar-rounded">
                                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-10.jpg')}}" alt="img">
                                                        </span>
                                                            <span class="avatar avatar-rounded">
                                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-07.jpg')}}" alt="img">
                                                        </span>
                                                            <span class="avatar avatar-rounded">
                                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-01.jpg')}}" alt="img">
                                                        </span>
                                                            <span class="avatar avatar-rounded">
                                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-02.jpg')}}" alt="img">
                                                        </span>
                                                            <span class="avatar avatar-rounded">
                                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-03.jpg')}}" alt="img">
                                                        </span>
                                                            <a href="#" class="avatar avatar-rounded bg-primary fs-12 text-white">
                                                            1+
                                                        </a>
                                                        </div>
                                                        <div class="d-flex align-items-center">
                                                            <a href="javascript:void(0);" class="d-flex align-items-center text-dark me-2"><i class="ti ti-message-circle text-gray me-1"></i></a>
                                                            <a href="javascript:void(0);" class="d-flex align-items-center text-dark"><i class="ti ti-paperclip text-gray me-1"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="card kanban-card mb-2">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                                        <div class="d-flex align-items-center">
                                                            <span class="badge bg-danger badge-xs d-flex align-items-center justify-content-center"><i class="fas fa-circle fs-6 me-1"></i>High</span>
                                                        </div>
                                                        <div class="dropdown">
                                                            <a href="javascript:void(0);" class="d-inline-flex align-items-center" data-bs-toggle="dropdown">
                                                                <i class="ti ti-dots-vertical"></i>
                                                            </a>
                                                            <ul class="dropdown-menu dropdown-menu-end p-3">
                                                                <li>
                                                                    <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-edit me-2"></i>Edit</a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-2"></i>Delete</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center mb-3">
                                                        <span class="avatar avatar-xs rounded-circle bg-warning me-2">
                                                        <img src="{{URL::asset('build/img/icons/kanban-arrow.svg')}}" class="w-auto h-auto" alt="Img">
                                                    </span>
                                                        <h6 class="d-flex align-items-center mb-0">PreSkool</h6>
                                                    </div>
                                                    <div class="d-flex align-items-center border-bottom mb-3 pb-3">
                                                        <div class="me-3 pe-3 border-end">
                                                            <span class="fw-medium fs-12 d-block mb-1">Budget</span>
                                                            <p class="fs-12 text-dark">$24,000</p>
                                                        </div>
                                                        <div class="me-3 pe-3 border-end">
                                                            <span class="fw-medium fs-12 d-block mb-1">Tasks</span>
                                                            <p class="fs-12 text-dark">12/15</p>
                                                        </div>
                                                        <div class="">
                                                            <span class="fw-medium fs-12 d-block mb-1">Due on</span>
                                                            <p class="fs-12 text-dark">15 Apr</p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <div class="avatar-list-stacked avatar-group-sm me-3">
                                                            <span class="avatar avatar-rounded">
                                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-10.jpg')}}" alt="img">
                                                        </span>
                                                            <span class="avatar avatar-rounded">
                                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-05.jpg')}}" alt="img">
                                                        </span>
                                                            <span class="avatar avatar-rounded">
                                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-01.jpg')}}" alt="img">
                                                        </span>
                                                            <span class="avatar avatar-rounded">
                                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-02.jpg')}}" alt="img">
                                                        </span>
                                                            <span class="avatar avatar-rounded">
                                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-03.jpg')}}" alt="img">
                                                        </span>
                                                            <a href="#" class="avatar avatar-rounded bg-primary fs-12 text-white">
                                                            1+
                                                        </a>
                                                        </div>
                                                        <div class="d-flex align-items-center">
                                                            <a href="javascript:void(0);" class="d-flex align-items-center text-dark me-2"><i class="ti ti-message-circle text-gray me-1"></i></a>
                                                            <a href="javascript:void(0);" class="d-flex align-items-center text-dark"><i class="ti ti-paperclip text-gray me-1"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pt-2">
                                        <a href="#" class="btn btn-outline-white border border-dashed d-flex align-items-center justify-content-center">
                                            <i class="ti ti-plus me-2"></i> New Project
                                        </a>
                                    </div>
                                </div>
                                <div class="p-3 rounded bg-light border w-100 me-3">
                                    <div class="bg-white border p-2 rounded mb-2">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <span class="bg-soft-danger p-1 d-flex rounded-circle me-2"><span class="bg-danger rounded-circle d-block p-1"></span></span>
                                                <h6 class="me-2 mb-0">On-hold</h6>
                                                <span class="badge badge-soft-light  text-dark rounded-pill">04</span>
                                            </div>
                                            <div class="dropdown">
                                                <a href="javascript:void(0);" class="d-inline-flex align-items-center" data-bs-toggle="dropdown">
                                                    <i class="ti ti-dots-vertical"></i>
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-end p-3">
                                                    <li>
                                                        <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-edit me-2"></i>Edit</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-2"></i>Delete</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="kanban-drag-wrap">
                                        <div>
                                            <div class="card kanban-card mb-2">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                                        <div class="d-flex align-items-center">
                                                            <span class="badge bg-danger badge-xs d-flex align-items-center justify-content-center"><i class="fas fa-circle fs-6 me-1"></i>High</span>
                                                        </div>
                                                        <div class="dropdown">
                                                            <a href="javascript:void(0);" class="d-inline-flex align-items-center" data-bs-toggle="dropdown">
                                                                <i class="ti ti-dots-vertical"></i>
                                                            </a>
                                                            <ul class="dropdown-menu dropdown-menu-end p-3">
                                                                <li>
                                                                    <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-edit me-2"></i>Edit</a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-2"></i>Delete</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center mb-3">
                                                        <span class="avatar avatar-xs rounded-circle bg-warning me-2">
                                                        <img src="{{URL::asset('build/img/icons/kanban-arrow.svg')}}" class="w-auto h-auto" alt="Img">
                                                    </span>
                                                        <h6 class="d-flex align-items-center mb-0">Kanakku</h6>
                                                    </div>
                                                    <div class="d-flex align-items-center border-bottom mb-3 pb-3">
                                                        <div class="me-3 pe-3 border-end">
                                                            <span class="fw-medium fs-12 d-block mb-1">Budget</span>
                                                            <p class="fs-12 text-dark">$24,000</p>
                                                        </div>
                                                        <div class="me-3 pe-3 border-end">
                                                            <span class="fw-medium fs-12 d-block mb-1">Tasks</span>
                                                            <p class="fs-12 text-dark">12/15</p>
                                                        </div>
                                                        <div class="">
                                                            <span class="fw-medium fs-12 d-block mb-1">Due on</span>
                                                            <p class="fs-12 text-dark">15 Apr</p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <div class="avatar-list-stacked avatar-group-sm me-3">
                                                            <span class="avatar avatar-rounded">
                                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-11.jpg')}}" alt="img">
                                                        </span>
                                                            <span class="avatar avatar-rounded">
                                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-12.jpg')}}" alt="img">
                                                        </span>
                                                            <span class="avatar avatar-rounded">
                                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-01.jpg')}}" alt="img">
                                                        </span>
                                                            <span class="avatar avatar-rounded">
                                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-02.jpg')}}" alt="img">
                                                        </span>
                                                            <span class="avatar avatar-rounded">
                                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-03.jpg')}}" alt="img">
                                                        </span>
                                                            <a href="#" class="avatar avatar-rounded bg-primary fs-12 text-white">
                                                            1+
                                                        </a>
                                                        </div>
                                                        <div class="d-flex align-items-center">
                                                            <a href="javascript:void(0);" class="d-flex align-items-center text-dark me-2"><i class="ti ti-message-circle text-gray me-1"></i></a>
                                                            <a href="javascript:void(0);" class="d-flex align-items-center text-dark"><i class="ti ti-paperclip text-gray me-1"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pt-2">
                                        <a href="#" class="btn btn-outline-white border border-dashed d-flex align-items-center justify-content-center">
                                            <i class="ti ti-plus me-2"></i> New Project
                                        </a>
                                    </div>
                                </div>
                                <div class="p-3 rounded bg-light border w-100">
                                    <div class="bg-white border p-2 rounded mb-2">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <span class="bg-soft-success p-1 d-flex rounded-circle me-2"><span class="bg-success rounded-circle d-block p-1"></span></span>
                                                <h6 class="me-2 mb-0">Completed</h6>
                                                <span class="badge badge-soft-light  text-dark rounded-pill">10</span>
                                            </div>
                                            <div class="dropdown">
                                                <a href="javascript:void(0);" class="d-inline-flex align-items-center" data-bs-toggle="dropdown">
                                                    <i class="ti ti-dots-vertical"></i>
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-end p-3">
                                                    <li>
                                                        <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-edit me-2"></i>Edit</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-2"></i>Delete</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="kanban-drag-wrap">
                                        <div>
                                            <div class="card kanban-card mb-2">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                                        <div class="d-flex align-items-center">
                                                            <span class="badge bg-danger badge-xs d-flex align-items-center justify-content-center"><i class="fas fa-circle fs-6 me-1"></i>High</span>
                                                        </div>
                                                        <div class="dropdown">
                                                            <a href="javascript:void(0);" class="d-inline-flex align-items-center" data-bs-toggle="dropdown">
                                                                <i class="ti ti-dots-vertical"></i>
                                                            </a>
                                                            <ul class="dropdown-menu dropdown-menu-end p-3">
                                                                <li>
                                                                    <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-edit me-2"></i>Edit</a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-2"></i>Delete</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center mb-3">
                                                        <span class="avatar avatar-xs rounded-circle bg-warning me-2">
                                                        <img src="{{URL::asset('build/img/icons/kanban-arrow.svg')}}" class="w-auto h-auto" alt="Img">
                                                    </span>
                                                        <h6 class="d-flex align-items-center mb-0">SmartHR</h6>
                                                    </div>
                                                    <div class="d-flex align-items-center border-bottom mb-3 pb-3">
                                                        <div class="me-3 pe-3 border-end">
                                                            <span class="fw-medium fs-12 d-block mb-1">Budget</span>
                                                            <p class="fs-12 text-dark">$24,000</p>
                                                        </div>
                                                        <div class="me-3 pe-3 border-end">
                                                            <span class="fw-medium fs-12 d-block mb-1">Tasks</span>
                                                            <p class="fs-12 text-dark">12/15</p>
                                                        </div>
                                                        <div class="">
                                                            <span class="fw-medium fs-12 d-block mb-1">Due on</span>
                                                            <p class="fs-12 text-dark">15 Apr</p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <div class="avatar-list-stacked avatar-group-sm me-3">
                                                            <span class="avatar avatar-rounded">
                                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-19.jpg')}}" alt="img">
                                                        </span>
                                                            <span class="avatar avatar-rounded">
                                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-16.jpg')}}" alt="img">
                                                        </span>
                                                            <span class="avatar avatar-rounded">
                                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-01.jpg')}}" alt="img">
                                                        </span>
                                                            <span class="avatar avatar-rounded">
                                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-02.jpg')}}" alt="img">
                                                        </span>
                                                            <span class="avatar avatar-rounded">
                                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-03.jpg')}}" alt="img">
                                                        </span>
                                                            <a href="#" class="avatar avatar-rounded bg-primary fs-12 text-white">
                                                            1+
                                                        </a>
                                                        </div>
                                                        <div class="d-flex align-items-center">
                                                            <a href="javascript:void(0);" class="d-flex align-items-center text-dark me-2"><i class="ti ti-message-circle text-gray me-1"></i></a>
                                                            <a href="javascript:void(0);" class="d-flex align-items-center text-dark"><i class="ti ti-paperclip text-gray me-1"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pt-2">
                                        <a href="#" class="btn btn-outline-white border border-dashed d-flex align-items-center justify-content-center">
                                            <i class="ti ti-plus me-2"></i> New Project
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-medium" role="tabpanel">
                            <div class="d-flex align-items-start overflow-auto project-status pb-3">
                                <div class="p-3 rounded bg-light border w-100 me-3">
                                    <div class="bg-white border p-2 rounded mb-2">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <span class="bg-soft-warning p-1 d-flex rounded-circle me-2"><span class="bg-warning rounded-circle d-block p-1"></span></span>
                                                <h6 class="me-2 mb-0">New</h6>
                                                <span class="badge badge-soft-light  text-dark rounded-pill">02</span>
                                            </div>
                                            <div class="dropdown">
                                                <a href="javascript:void(0);" class="d-inline-flex align-items-center" data-bs-toggle="dropdown">
                                                    <i class="ti ti-dots-vertical"></i>
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-end p-3">
                                                    <li>
                                                        <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-edit me-2"></i>Edit</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-2"></i>Delete</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="kanban-drag-wrap">
                                        <div>
                                            <div class="card kanban-card mb-2">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                                        <div class="d-flex align-items-center">
                                                            <span class="badge bg-warning badge-xs d-flex align-items-center justify-content-center"><i class="fas fa-circle fs-6 me-1"></i>Medium</span>
                                                        </div>
                                                        <div class="dropdown">
                                                            <a href="javascript:void(0);" class="d-inline-flex align-items-center" data-bs-toggle="dropdown">
                                                                <i class="ti ti-dots-vertical"></i>
                                                            </a>
                                                            <ul class="dropdown-menu dropdown-menu-end p-3">
                                                                <li>
                                                                    <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-edit me-2"></i>Edit</a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-2"></i>Delete</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center mb-3">
                                                        <span class="avatar avatar-xs rounded-circle bg-warning me-2">
                                                        <img src="{{URL::asset('build/img/icons/kanban-arrow.svg')}}" class="w-auto h-auto" alt="Img">
                                                    </span>
                                                        <h6 class="d-flex align-items-center mb-0">CRMS</h6>
                                                    </div>
                                                    <div class="d-flex align-items-center border-bottom mb-3 pb-3">
                                                        <div class="me-3 pe-3 border-end">
                                                            <span class="fw-medium fs-12 d-block mb-1">Budget</span>
                                                            <p class="fs-12 text-dark">$24,000</p>
                                                        </div>
                                                        <div class="me-3 pe-3 border-end">
                                                            <span class="fw-medium fs-12 d-block mb-1">Tasks</span>
                                                            <p class="fs-12 text-dark">12/15</p>
                                                        </div>
                                                        <div class="">
                                                            <span class="fw-medium fs-12 d-block mb-1">Due on</span>
                                                            <p class="fs-12 text-dark">15 Apr</p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <div class="avatar-list-stacked avatar-group-sm me-3">
                                                            <span class="avatar avatar-rounded">
                                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-19.jpg')}}" alt="img">
                                                        </span>
                                                            <span class="avatar avatar-rounded">
                                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-16.jpg')}}" alt="img">
                                                        </span>
                                                            <span class="avatar avatar-rounded">
                                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-01.jpg')}}" alt="img">
                                                        </span>
                                                            <span class="avatar avatar-rounded">
                                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-02.jpg')}}" alt="img">
                                                        </span>
                                                            <span class="avatar avatar-rounded">
                                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-03.jpg')}}" alt="img">
                                                        </span>
                                                            <a href="#" class="avatar avatar-rounded bg-primary fs-12 text-white">
                                                            1+
                                                        </a>
                                                        </div>
                                                        <div class="d-flex align-items-center">
                                                            <a href="javascript:void(0);" class="d-flex align-items-center text-dark me-2"><i class="ti ti-message-circle text-gray me-1"></i></a>
                                                            <a href="javascript:void(0);" class="d-flex align-items-center text-dark"><i class="ti ti-paperclip text-gray me-1"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="card kanban-card mb-2">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                                        <div class="d-flex align-items-center">
                                                            <span class="badge bg-warning badge-xs d-flex align-items-center justify-content-center"><i class="fas fa-circle fs-6 me-1"></i>Medium</span>
                                                        </div>
                                                        <div class="dropdown">
                                                            <a href="javascript:void(0);" class="d-inline-flex align-items-center" data-bs-toggle="dropdown">
                                                                <i class="ti ti-dots-vertical"></i>
                                                            </a>
                                                            <ul class="dropdown-menu dropdown-menu-end p-3">
                                                                <li>
                                                                    <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-edit me-2"></i>Edit</a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-2"></i>Delete</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center mb-3">
                                                        <span class="avatar avatar-xs rounded-circle bg-warning me-2">
                                                        <img src="{{URL::asset('build/img/icons/kanban-arrow.svg')}}" class="w-auto h-auto" alt="Img">
                                                    </span>
                                                        <h6 class="d-flex align-items-center mb-0">Doccure</h6>
                                                    </div>
                                                    <div class="d-flex align-items-center border-bottom mb-3 pb-3">
                                                        <div class="me-3 pe-3 border-end">
                                                            <span class="fw-medium fs-12 d-block mb-1">Budget</span>
                                                            <p class="fs-12 text-dark">$24,000</p>
                                                        </div>
                                                        <div class="me-3 pe-3 border-end">
                                                            <span class="fw-medium fs-12 d-block mb-1">Tasks</span>
                                                            <p class="fs-12 text-dark">12/15</p>
                                                        </div>
                                                        <div class="">
                                                            <span class="fw-medium fs-12 d-block mb-1">Due on</span>
                                                            <p class="fs-12 text-dark">15 Apr</p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <div class="avatar-list-stacked avatar-group-sm me-3">
                                                            <span class="avatar avatar-rounded">
                                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-19.jpg')}}" alt="img">
                                                        </span>
                                                            <span class="avatar avatar-rounded">
                                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-16.jpg')}}" alt="img">
                                                        </span>
                                                            <span class="avatar avatar-rounded">
                                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-01.jpg')}}" alt="img">
                                                        </span>
                                                            <span class="avatar avatar-rounded">
                                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-02.jpg')}}" alt="img">
                                                        </span>
                                                            <span class="avatar avatar-rounded">
                                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-03.jpg')}}" alt="img">
                                                        </span>
                                                            <a href="#" class="avatar avatar-rounded bg-primary fs-12 text-white">
                                                            1+
                                                        </a>
                                                        </div>
                                                        <div class="d-flex align-items-center">
                                                            <a href="javascript:void(0);" class="d-flex align-items-center text-dark me-2"><i class="ti ti-message-circle text-gray me-1"></i></a>
                                                            <a href="javascript:void(0);" class="d-flex align-items-center text-dark"><i class="ti ti-paperclip text-gray me-1"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pt-2">
                                        <a href="#" class="btn btn-outline-white border border-dashed d-flex align-items-center justify-content-center">
                                            <i class="ti ti-plus me-2"></i> New Project
                                        </a>
                                    </div>
                                </div>
                                <div class="p-3 rounded bg-light border w-100 me-3">
                                    <div class="bg-white border p-2 rounded mb-2">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <span class="bg-soft-skyblue p-1 d-flex rounded-circle me-2"><span class="bg-skyblue rounded-circle d-block p-1"></span></span>
                                                <h6 class="me-2 mb-0">Inprogress</h6>
                                                <span class="badge badge-soft-light  text-dark rounded-pill">13</span>
                                            </div>
                                            <div class="dropdown">
                                                <a href="javascript:void(0);" class="d-inline-flex align-items-center" data-bs-toggle="dropdown">
                                                    <i class="ti ti-dots-vertical"></i>
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-end p-3">
                                                    <li>
                                                        <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-edit me-2"></i>Edit</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-2"></i>Delete</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="kanban-drag-wrap">
                                        <div>
                                            <div class="card kanban-card mb-2">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                                        <div class="d-flex align-items-center">
                                                            <span class="badge bg-warning badge-xs d-flex align-items-center justify-content-center"><i class="fas fa-circle fs-6 me-1"></i>Medium</span>
                                                        </div>
                                                        <div class="dropdown">
                                                            <a href="javascript:void(0);" class="d-inline-flex align-items-center" data-bs-toggle="dropdown">
                                                                <i class="ti ti-dots-vertical"></i>
                                                            </a>
                                                            <ul class="dropdown-menu dropdown-menu-end p-3">
                                                                <li>
                                                                    <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-edit me-2"></i>Edit</a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-2"></i>Delete</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center mb-3">
                                                        <span class="avatar avatar-xs rounded-circle bg-warning me-2">
                                                        <img src="{{URL::asset('build/img/icons/kanban-arrow.svg')}}" class="w-auto h-auto" alt="Img">
                                                    </span>
                                                        <h6 class="d-flex align-items-center mb-0">Dreams Rent</h6>
                                                    </div>
                                                    <div class="d-flex align-items-center border-bottom mb-3 pb-3">
                                                        <div class="me-3 pe-3 border-end">
                                                            <span class="fw-medium fs-12 d-block mb-1">Budget</span>
                                                            <p class="fs-12 text-dark">$24,000</p>
                                                        </div>
                                                        <div class="me-3 pe-3 border-end">
                                                            <span class="fw-medium fs-12 d-block mb-1">Tasks</span>
                                                            <p class="fs-12 text-dark">12/15</p>
                                                        </div>
                                                        <div class="">
                                                            <span class="fw-medium fs-12 d-block mb-1">Due on</span>
                                                            <p class="fs-12 text-dark">15 Apr</p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <div class="avatar-list-stacked avatar-group-sm me-3">
                                                            <span class="avatar avatar-rounded">
                                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-19.jpg')}}" alt="img">
                                                        </span>
                                                            <span class="avatar avatar-rounded">
                                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-16.jpg')}}" alt="img">
                                                        </span>
                                                            <span class="avatar avatar-rounded">
                                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-01.jpg')}}" alt="img">
                                                        </span>
                                                            <span class="avatar avatar-rounded">
                                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-02.jpg')}}" alt="img">
                                                        </span>
                                                            <span class="avatar avatar-rounded">
                                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-03.jpg')}}" alt="img">
                                                        </span>
                                                            <a href="#" class="avatar avatar-rounded bg-primary fs-12 text-white">
                                                            1+
                                                        </a>
                                                        </div>
                                                        <div class="d-flex align-items-center">
                                                            <a href="javascript:void(0);" class="d-flex align-items-center text-dark me-2"><i class="ti ti-message-circle text-gray me-1"></i></a>
                                                            <a href="javascript:void(0);" class="d-flex align-items-center text-dark"><i class="ti ti-paperclip text-gray me-1"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="card kanban-card mb-2">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                                        <div class="d-flex align-items-center">
                                                            <span class="badge bg-warning badge-xs d-flex align-items-center justify-content-center"><i class="fas fa-circle fs-6 me-1"></i>Medium</span>
                                                        </div>
                                                        <div class="dropdown">
                                                            <a href="javascript:void(0);" class="d-inline-flex align-items-center" data-bs-toggle="dropdown">
                                                                <i class="ti ti-dots-vertical"></i>
                                                            </a>
                                                            <ul class="dropdown-menu dropdown-menu-end p-3">
                                                                <li>
                                                                    <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-edit me-2"></i>Edit</a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-2"></i>Delete</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center mb-3">
                                                        <span class="avatar avatar-xs rounded-circle bg-warning me-2">
                                                        <img src="{{URL::asset('build/img/icons/kanban-arrow.svg')}}" class="w-auto h-auto" alt="Img">
                                                    </span>
                                                        <h6 class="d-flex align-items-center mb-0">Dreams POS</h6>
                                                    </div>
                                                    <div class="d-flex align-items-center border-bottom mb-3 pb-3">
                                                        <div class="me-3 pe-3 border-end">
                                                            <span class="fw-medium fs-12 d-block mb-1">Budget</span>
                                                            <p class="fs-12 text-dark">$24,000</p>
                                                        </div>
                                                        <div class="me-3 pe-3 border-end">
                                                            <span class="fw-medium fs-12 d-block mb-1">Tasks</span>
                                                            <p class="fs-12 text-dark">12/15</p>
                                                        </div>
                                                        <div class="">
                                                            <span class="fw-medium fs-12 d-block mb-1">Due on</span>
                                                            <p class="fs-12 text-dark">15 Apr</p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <div class="avatar-list-stacked avatar-group-sm me-3">
                                                            <span class="avatar avatar-rounded">
                                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-19.jpg')}}" alt="img">
                                                        </span>
                                                            <span class="avatar avatar-rounded">
                                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-16.jpg')}}" alt="img">
                                                        </span>
                                                            <span class="avatar avatar-rounded">
                                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-01.jpg')}}" alt="img">
                                                        </span>
                                                            <span class="avatar avatar-rounded">
                                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-02.jpg')}}" alt="img">
                                                        </span>
                                                            <span class="avatar avatar-rounded">
                                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-03.jpg')}}" alt="img">
                                                        </span>
                                                            <a href="#" class="avatar avatar-rounded bg-primary fs-12 text-white">
                                                            1+
                                                        </a>
                                                        </div>
                                                        <div class="d-flex align-items-center">
                                                            <a href="javascript:void(0);" class="d-flex align-items-center text-dark me-2"><i class="ti ti-message-circle text-gray me-1"></i></a>
                                                            <a href="javascript:void(0);" class="d-flex align-items-center text-dark"><i class="ti ti-paperclip text-gray me-1"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pt-2">
                                        <a href="#" class="btn btn-outline-white border border-dashed d-flex align-items-center justify-content-center">
                                            <i class="ti ti-plus me-2"></i> New Project
                                        </a>
                                    </div>
                                </div>
                                <div class="p-3 rounded bg-light border w-100 me-3">
                                    <div class="bg-white border p-2 rounded mb-2">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <span class="bg-soft-danger p-1 d-flex rounded-circle me-2"><span class="bg-danger rounded-circle d-block p-1"></span></span>
                                                <h6 class="me-2 mb-0">On-hold</h6>
                                                <span class="badge badge-soft-light  text-dark rounded-pill">04</span>
                                            </div>
                                            <div class="dropdown">
                                                <a href="javascript:void(0);" class="d-inline-flex align-items-center" data-bs-toggle="dropdown">
                                                    <i class="ti ti-dots-vertical"></i>
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-end p-3">
                                                    <li>
                                                        <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-edit me-2"></i>Edit</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-2"></i>Delete</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="kanban-drag-wrap">
                                        <div>
                                            <div class="card kanban-card mb-2">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                                        <div class="d-flex align-items-center">
                                                            <span class="badge bg-warning badge-xs d-flex align-items-center justify-content-center"><i class="fas fa-circle fs-6 me-1"></i>Medium</span>
                                                        </div>
                                                        <div class="dropdown">
                                                            <a href="javascript:void(0);" class="d-inline-flex align-items-center" data-bs-toggle="dropdown">
                                                                <i class="ti ti-dots-vertical"></i>
                                                            </a>
                                                            <ul class="dropdown-menu dropdown-menu-end p-3">
                                                                <li>
                                                                    <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-edit me-2"></i>Edit</a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-2"></i>Delete</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center mb-3">
                                                        <span class="avatar avatar-xs rounded-circle bg-warning me-2">
                                                        <img src="{{URL::asset('build/img/icons/kanban-arrow.svg')}}" class="w-auto h-auto" alt="Img">
                                                    </span>
                                                        <h6 class="d-flex align-items-center mb-0">Dreams LMS</h6>
                                                    </div>
                                                    <div class="d-flex align-items-center border-bottom mb-3 pb-3">
                                                        <div class="me-3 pe-3 border-end">
                                                            <span class="fw-medium fs-12 d-block mb-1">Budget</span>
                                                            <p class="fs-12 text-dark">$24,000</p>
                                                        </div>
                                                        <div class="me-3 pe-3 border-end">
                                                            <span class="fw-medium fs-12 d-block mb-1">Tasks</span>
                                                            <p class="fs-12 text-dark">12/15</p>
                                                        </div>
                                                        <div class="">
                                                            <span class="fw-medium fs-12 d-block mb-1">Due on</span>
                                                            <p class="fs-12 text-dark">15 Apr</p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <div class="avatar-list-stacked avatar-group-sm me-3">
                                                            <span class="avatar avatar-rounded">
                                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-19.jpg')}}" alt="img">
                                                        </span>
                                                            <span class="avatar avatar-rounded">
                                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-27.jpg')}}" alt="img">
                                                        </span>
                                                            <span class="avatar avatar-rounded">
                                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-16.jpg')}}" alt="img">
                                                        </span>
                                                            <span class="avatar avatar-rounded">
                                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-02.jpg')}}" alt="img">
                                                        </span>
                                                            <span class="avatar avatar-rounded">
                                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-03.jpg')}}" alt="img">
                                                        </span>
                                                            <a href="#" class="avatar avatar-rounded bg-primary fs-12 text-white">
                                                            1+
                                                        </a>
                                                        </div>
                                                        <div class="d-flex align-items-center">
                                                            <a href="javascript:void(0);" class="d-flex align-items-center text-dark me-2"><i class="ti ti-message-circle text-gray me-1"></i></a>
                                                            <a href="javascript:void(0);" class="d-flex align-items-center text-dark"><i class="ti ti-paperclip text-gray me-1"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pt-2">
                                        <a href="#" class="btn btn-outline-white border border-dashed d-flex align-items-center justify-content-center">
                                            <i class="ti ti-plus me-2"></i> New Project
                                        </a>
                                    </div>
                                </div>
                                <div class="p-3 rounded bg-light border w-100">
                                    <div class="bg-white border p-2 rounded mb-2">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <span class="bg-soft-success p-1 d-flex rounded-circle me-2"><span class="bg-success rounded-circle d-block p-1"></span></span>
                                                <h6 class="me-2 mb-0">Completed</h6>
                                                <span class="badge badge-soft-light  text-dark rounded-pill">10</span>
                                            </div>
                                            <div class="dropdown">
                                                <a href="javascript:void(0);" class="d-inline-flex align-items-center" data-bs-toggle="dropdown">
                                                    <i class="ti ti-dots-vertical"></i>
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-end p-3">
                                                    <li>
                                                        <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-edit me-2"></i>Edit</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-2"></i>Delete</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="kanban-drag-wrap">
                                        <div>
                                            <div class="card kanban-card mb-2">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                                        <div class="d-flex align-items-center">
                                                            <span class="badge bg-warning badge-xs d-flex align-items-center justify-content-center"><i class="fas fa-circle fs-6 me-1"></i>Medium</span>
                                                        </div>
                                                        <div class="dropdown">
                                                            <a href="javascript:void(0);" class="d-inline-flex align-items-center" data-bs-toggle="dropdown">
                                                                <i class="ti ti-dots-vertical"></i>
                                                            </a>
                                                            <ul class="dropdown-menu dropdown-menu-end p-3">
                                                                <li>
                                                                    <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-edit me-2"></i>Edit</a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-2"></i>Delete</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center mb-3">
                                                        <span class="avatar avatar-xs rounded-circle bg-warning me-2">
                                                        <img src="{{URL::asset('build/img/icons/kanban-arrow.svg')}}" class="w-auto h-auto" alt="Img">
                                                    </span>
                                                        <h6 class="d-flex align-items-center mb-0">Doccure</h6>
                                                    </div>
                                                    <div class="d-flex align-items-center border-bottom mb-3 pb-3">
                                                        <div class="me-3 pe-3 border-end">
                                                            <span class="fw-medium fs-12 d-block mb-1">Budget</span>
                                                            <p class="fs-12 text-dark">$24,000</p>
                                                        </div>
                                                        <div class="me-3 pe-3 border-end">
                                                            <span class="fw-medium fs-12 d-block mb-1">Tasks</span>
                                                            <p class="fs-12 text-dark">12/15</p>
                                                        </div>
                                                        <div class="">
                                                            <span class="fw-medium fs-12 d-block mb-1">Due on</span>
                                                            <p class="fs-12 text-dark">15 Apr</p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <div class="avatar-list-stacked avatar-group-sm me-3">
                                                            <span class="avatar avatar-rounded">
                                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-19.jpg')}}" alt="img">
                                                        </span>
                                                            <span class="avatar avatar-rounded">
                                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-16.jpg')}}" alt="img">
                                                        </span>
                                                            <span class="avatar avatar-rounded">
                                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-01.jpg')}}" alt="img">
                                                        </span>
                                                            <span class="avatar avatar-rounded">
                                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-02.jpg')}}" alt="img">
                                                        </span>
                                                            <span class="avatar avatar-rounded">
                                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-03.jpg')}}" alt="img">
                                                        </span>
                                                            <a href="#" class="avatar avatar-rounded bg-primary fs-12 text-white">
                                                            1+
                                                        </a>
                                                        </div>
                                                        <div class="d-flex align-items-center">
                                                            <a href="javascript:void(0);" class="d-flex align-items-center text-dark me-2"><i class="ti ti-message-circle text-gray me-1"></i></a>
                                                            <a href="javascript:void(0);" class="d-flex align-items-center text-dark"><i class="ti ti-paperclip text-gray me-1"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pt-2">
                                        <a href="#" class="btn btn-outline-white border border-dashed d-flex align-items-center justify-content-center">
                                            <i class="ti ti-plus me-2"></i> New Project
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-low" role="tabpanel">
                            <div class="d-flex align-items-start overflow-auto project-status pb-3">
                                <div class="p-3 rounded bg-light border w-100 me-3">
                                    <div class="bg-white border p-2 rounded mb-2">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <span class="bg-soft-warning p-1 d-flex rounded-circle me-2"><span class="bg-warning rounded-circle d-block p-1"></span></span>
                                                <h6 class="me-2 mb-0">New</h6>
                                                <span class="badge badge-soft-light  text-dark rounded-pill">02</span>
                                            </div>
                                            <div class="dropdown">
                                                <a href="javascript:void(0);" class="d-inline-flex align-items-center" data-bs-toggle="dropdown">
                                                    <i class="ti ti-dots-vertical"></i>
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-end p-3">
                                                    <li>
                                                        <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-edit me-2"></i>Edit</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-2"></i>Delete</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="kanban-drag-wrap">
                                        <div>
                                            <div class="card kanban-card mb-2">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                                        <div class="d-flex align-items-center">
                                                            <span class="badge bg-success badge-xs d-flex align-items-center justify-content-center"><i class="fas fa-circle fs-6 me-1"></i>Low</span>
                                                        </div>
                                                        <div class="dropdown">
                                                            <a href="javascript:void(0);" class="d-inline-flex align-items-center" data-bs-toggle="dropdown">
                                                                <i class="ti ti-dots-vertical"></i>
                                                            </a>
                                                            <ul class="dropdown-menu dropdown-menu-end p-3">
                                                                <li>
                                                                    <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-edit me-2"></i>Edit</a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-2"></i>Delete</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center mb-3">
                                                        <span class="avatar avatar-xs rounded-circle bg-warning me-2">
                                                        <img src="{{URL::asset('build/img/icons/kanban-arrow.svg')}}" class="w-auto h-auto" alt="Img">
                                                    </span>
                                                        <h6 class="d-flex align-items-center mb-0">Project Title</h6>
                                                    </div>
                                                    <div class="d-flex align-items-center border-bottom mb-3 pb-3">
                                                        <div class="me-3 pe-3 border-end">
                                                            <span class="fw-medium fs-12 d-block mb-1">Budget</span>
                                                            <p class="fs-12 text-dark">$24,000</p>
                                                        </div>
                                                        <div class="me-3 pe-3 border-end">
                                                            <span class="fw-medium fs-12 d-block mb-1">Tasks</span>
                                                            <p class="fs-12 text-dark">12/15</p>
                                                        </div>
                                                        <div class="">
                                                            <span class="fw-medium fs-12 d-block mb-1">Due on</span>
                                                            <p class="fs-12 text-dark">15 Apr</p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <div class="avatar-list-stacked avatar-group-sm me-3">
                                                            <span class="avatar avatar-rounded">
                                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-19.jpg')}}" alt="img">
                                                        </span>
                                                            <span class="avatar avatar-rounded">
                                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-27.jpg')}}" alt="img">
                                                        </span>
                                                            <span class="avatar avatar-rounded">
                                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-01.jpg')}}" alt="img">
                                                        </span>
                                                            <span class="avatar avatar-rounded">
                                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-02.jpg')}}" alt="img">
                                                        </span>
                                                            <span class="avatar avatar-rounded">
                                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-03.jpg')}}" alt="img">
                                                        </span>
                                                            <a href="#" class="avatar avatar-rounded bg-primary fs-12 text-white">
                                                            1+
                                                        </a>
                                                        </div>
                                                        <div class="d-flex align-items-center">
                                                            <a href="javascript:void(0);" class="d-flex align-items-center text-dark me-2"><i class="ti ti-message-circle text-gray me-1"></i></a>
                                                            <a href="javascript:void(0);" class="d-flex align-items-center text-dark"><i class="ti ti-paperclip text-gray me-1"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="card kanban-card mb-2">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                                        <div class="d-flex align-items-center">
                                                            <span class="badge bg-success badge-xs d-flex align-items-center justify-content-center"><i class="fas fa-circle fs-6 me-1"></i>Low</span>
                                                        </div>
                                                        <div class="dropdown">
                                                            <a href="javascript:void(0);" class="d-inline-flex align-items-center" data-bs-toggle="dropdown">
                                                                <i class="ti ti-dots-vertical"></i>
                                                            </a>
                                                            <ul class="dropdown-menu dropdown-menu-end p-3">
                                                                <li>
                                                                    <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-edit me-2"></i>Edit</a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-2"></i>Delete</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center mb-3">
                                                        <span class="avatar avatar-xs rounded-circle bg-warning me-2">
                                                        <img src="{{URL::asset('build/img/icons/kanban-arrow.svg')}}" class="w-auto h-auto" alt="Img">
                                                    </span>
                                                        <h6 class="d-flex align-items-center mb-0">Project Title</h6>
                                                    </div>
                                                    <div class="d-flex align-items-center border-bottom mb-3 pb-3">
                                                        <div class="me-3 pe-3 border-end">
                                                            <span class="fw-medium fs-12 d-block mb-1">Budget</span>
                                                            <p class="fs-12 text-dark">$24,000</p>
                                                        </div>
                                                        <div class="me-3 pe-3 border-end">
                                                            <span class="fw-medium fs-12 d-block mb-1">Tasks</span>
                                                            <p class="fs-12 text-dark">12/15</p>
                                                        </div>
                                                        <div class="">
                                                            <span class="fw-medium fs-12 d-block mb-1">Due on</span>
                                                            <p class="fs-12 text-dark">15 Apr</p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <div class="avatar-list-stacked avatar-group-sm me-3">
                                                            <span class="avatar avatar-rounded">
                                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-19.jpg')}}" alt="img">
                                                        </span>
                                                            <span class="avatar avatar-rounded">
                                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-16.jpg')}}" alt="img">
                                                        </span>
                                                            <span class="avatar avatar-rounded">
                                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-01.jpg')}}" alt="img">
                                                        </span>
                                                            <span class="avatar avatar-rounded">
                                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-02.jpg')}}" alt="img">
                                                        </span>
                                                            <span class="avatar avatar-rounded">
                                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-03.jpg')}}" alt="img">
                                                        </span>
                                                            <a href="#" class="avatar avatar-rounded bg-primary fs-12 text-white">
                                                            1+
                                                        </a>
                                                        </div>
                                                        <div class="d-flex align-items-center">
                                                            <a href="javascript:void(0);" class="d-flex align-items-center text-dark me-2"><i class="ti ti-message-circle text-gray me-1"></i></a>
                                                            <a href="javascript:void(0);" class="d-flex align-items-center text-dark"><i class="ti ti-paperclip text-gray me-1"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pt-2">
                                        <a href="#" class="btn btn-outline-white border border-dashed d-flex align-items-center justify-content-center">
                                            <i class="ti ti-plus me-2"></i> New Project
                                        </a>
                                    </div>
                                </div>
                                <div class="p-3 rounded bg-light border w-100 me-3">
                                    <div class="bg-white border p-2 rounded mb-2">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <span class="bg-soft-skyblue p-1 d-flex rounded-circle me-2"><span class="bg-skyblue rounded-circle d-block p-1"></span></span>
                                                <h6 class="me-2 mb-0">Inprogress</h6>
                                                <span class="badge badge-soft-light  text-dark rounded-pill">13</span>
                                            </div>
                                            <div class="dropdown">
                                                <a href="javascript:void(0);" class="d-inline-flex align-items-center" data-bs-toggle="dropdown">
                                                    <i class="ti ti-dots-vertical"></i>
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-end p-3">
                                                    <li>
                                                        <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-edit me-2"></i>Edit</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-2"></i>Delete</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="kanban-drag-wrap">
                                        <div>
                                            <div class="card kanban-card mb-2">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                                        <div class="d-flex align-items-center">
                                                            <span class="badge bg-success badge-xs d-flex align-items-center justify-content-center"><i class="fas fa-circle fs-6 me-1"></i>Low</span>
                                                        </div>
                                                        <div class="dropdown">
                                                            <a href="javascript:void(0);" class="d-inline-flex align-items-center" data-bs-toggle="dropdown">
                                                                <i class="ti ti-dots-vertical"></i>
                                                            </a>
                                                            <ul class="dropdown-menu dropdown-menu-end p-3">
                                                                <li>
                                                                    <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-edit me-2"></i>Edit</a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-2"></i>Delete</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center mb-3">
                                                        <span class="avatar avatar-xs rounded-circle bg-warning me-2">
                                                        <img src="{{URL::asset('build/img/icons/kanban-arrow.svg')}}" class="w-auto h-auto" alt="Img">
                                                    </span>
                                                        <h6 class="d-flex align-items-center mb-0">Project Title</h6>
                                                    </div>
                                                    <div class="d-flex align-items-center border-bottom mb-3 pb-3">
                                                        <div class="me-3 pe-3 border-end">
                                                            <span class="fw-medium fs-12 d-block mb-1">Budget</span>
                                                            <p class="fs-12 text-dark">$24,000</p>
                                                        </div>
                                                        <div class="me-3 pe-3 border-end">
                                                            <span class="fw-medium fs-12 d-block mb-1">Tasks</span>
                                                            <p class="fs-12 text-dark">12/15</p>
                                                        </div>
                                                        <div class="">
                                                            <span class="fw-medium fs-12 d-block mb-1">Due on</span>
                                                            <p class="fs-12 text-dark">15 Apr</p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <div class="avatar-list-stacked avatar-group-sm me-3">
                                                            <span class="avatar avatar-rounded">
                                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-19.jpg')}}" alt="img">
                                                        </span>
                                                            <span class="avatar avatar-rounded">
                                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-16.jpg')}}" alt="img">
                                                        </span>
                                                            <span class="avatar avatar-rounded">
                                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-01.jpg')}}" alt="img">
                                                        </span>
                                                            <span class="avatar avatar-rounded">
                                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-02.jpg')}}" alt="img">
                                                        </span>
                                                            <span class="avatar avatar-rounded">
                                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-03.jpg')}}" alt="img">
                                                        </span>
                                                            <a href="#" class="avatar avatar-rounded bg-primary fs-12 text-white">
                                                            1+
                                                        </a>
                                                        </div>
                                                        <div class="d-flex align-items-center">
                                                            <a href="javascript:void(0);" class="d-flex align-items-center text-dark me-2"><i class="ti ti-message-circle text-gray me-1"></i></a>
                                                            <a href="javascript:void(0);" class="d-flex align-items-center text-dark"><i class="ti ti-paperclip text-gray me-1"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="card kanban-card mb-2">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                                        <div class="d-flex align-items-center">
                                                            <span class="badge bg-success badge-xs d-flex align-items-center justify-content-center"><i class="fas fa-circle fs-6 me-1"></i>Low</span>
                                                        </div>
                                                        <div class="dropdown">
                                                            <a href="javascript:void(0);" class="d-inline-flex align-items-center" data-bs-toggle="dropdown">
                                                                <i class="ti ti-dots-vertical"></i>
                                                            </a>
                                                            <ul class="dropdown-menu dropdown-menu-end p-3">
                                                                <li>
                                                                    <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-edit me-2"></i>Edit</a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-2"></i>Delete</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center mb-3">
                                                        <span class="avatar avatar-xs rounded-circle bg-warning me-2">
                                                        <img src="{{URL::asset('build/img/icons/kanban-arrow.svg')}}" class="w-auto h-auto" alt="Img">
                                                    </span>
                                                        <h6 class="d-flex align-items-center mb-0">Project Title</h6>
                                                    </div>
                                                    <div class="d-flex align-items-center border-bottom mb-3 pb-3">
                                                        <div class="me-3 pe-3 border-end">
                                                            <span class="fw-medium fs-12 d-block mb-1">Budget</span>
                                                            <p class="fs-12 text-dark">$24,000</p>
                                                        </div>
                                                        <div class="me-3 pe-3 border-end">
                                                            <span class="fw-medium fs-12 d-block mb-1">Tasks</span>
                                                            <p class="fs-12 text-dark">12/15</p>
                                                        </div>
                                                        <div class="">
                                                            <span class="fw-medium fs-12 d-block mb-1">Due on</span>
                                                            <p class="fs-12 text-dark">15 Apr</p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <div class="avatar-list-stacked avatar-group-sm me-3">
                                                            <span class="avatar avatar-rounded">
                                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-19.jpg')}}" alt="img">
                                                        </span>
                                                            <span class="avatar avatar-rounded">
                                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-16.jpg')}}" alt="img">
                                                        </span>
                                                            <span class="avatar avatar-rounded">
                                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-01.jpg')}}" alt="img">
                                                        </span>
                                                            <span class="avatar avatar-rounded">
                                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-02.jpg')}}" alt="img">
                                                        </span>
                                                            <span class="avatar avatar-rounded">
                                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-03.jpg')}}" alt="img">
                                                        </span>
                                                            <a href="#" class="avatar avatar-rounded bg-primary fs-12 text-white">
                                                            1+
                                                        </a>
                                                        </div>
                                                        <div class="d-flex align-items-center">
                                                            <a href="javascript:void(0);" class="d-flex align-items-center text-dark me-2"><i class="ti ti-message-circle text-gray me-1"></i></a>
                                                            <a href="javascript:void(0);" class="d-flex align-items-center text-dark"><i class="ti ti-paperclip text-gray me-1"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pt-2">
                                        <a href="#" class="btn btn-outline-white border border-dashed d-flex align-items-center justify-content-center">
                                            <i class="ti ti-plus me-2"></i> New Project
                                        </a>
                                    </div>
                                </div>
                                <div class="p-3 rounded bg-light border w-100 me-3">
                                    <div class="bg-white border p-2 rounded mb-2">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <span class="bg-soft-danger p-1 d-flex rounded-circle me-2"><span class="bg-danger rounded-circle d-block p-1"></span></span>
                                                <h6 class="me-2 mb-0">On-hold</h6>
                                                <span class="badge badge-soft-light  text-dark rounded-pill">04</span>
                                            </div>
                                            <div class="dropdown">
                                                <a href="javascript:void(0);" class="d-inline-flex align-items-center" data-bs-toggle="dropdown">
                                                    <i class="ti ti-dots-vertical"></i>
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-end p-3">
                                                    <li>
                                                        <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-edit me-2"></i>Edit</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-2"></i>Delete</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="kanban-drag-wrap">
                                        <div>
                                            <div class="card kanban-card mb-2">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                                        <div class="d-flex align-items-center">
                                                            <span class="badge bg-success badge-xs d-flex align-items-center justify-content-center"><i class="fas fa-circle fs-6 me-1"></i>Low</span>
                                                        </div>
                                                        <div class="dropdown">
                                                            <a href="javascript:void(0);" class="d-inline-flex align-items-center" data-bs-toggle="dropdown">
                                                                <i class="ti ti-dots-vertical"></i>
                                                            </a>
                                                            <ul class="dropdown-menu dropdown-menu-end p-3">
                                                                <li>
                                                                    <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-edit me-2"></i>Edit</a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-2"></i>Delete</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center mb-3">
                                                        <span class="avatar avatar-xs rounded-circle bg-warning me-2">
                                                        <img src="{{URL::asset('build/img/icons/kanban-arrow.svg')}}" class="w-auto h-auto" alt="Img">
                                                    </span>
                                                        <h6 class="d-flex align-items-center mb-0">Project Title</h6>
                                                    </div>
                                                    <div class="d-flex align-items-center border-bottom mb-3 pb-3">
                                                        <div class="me-3 pe-3 border-end">
                                                            <span class="fw-medium fs-12 d-block mb-1">Budget</span>
                                                            <p class="fs-12 text-dark">$24,000</p>
                                                        </div>
                                                        <div class="me-3 pe-3 border-end">
                                                            <span class="fw-medium fs-12 d-block mb-1">Tasks</span>
                                                            <p class="fs-12 text-dark">12/15</p>
                                                        </div>
                                                        <div class="">
                                                            <span class="fw-medium fs-12 d-block mb-1">Due on</span>
                                                            <p class="fs-12 text-dark">15 Apr</p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <div class="avatar-list-stacked avatar-group-sm me-3">
                                                            <span class="avatar avatar-rounded">
                                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-19.jpg')}}" alt="img">
                                                        </span>
                                                            <span class="avatar avatar-rounded">
                                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-16.jpg')}}" alt="img">
                                                        </span>
                                                            <span class="avatar avatar-rounded">
                                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-01.jpg')}}" alt="img">
                                                        </span>
                                                            <span class="avatar avatar-rounded">
                                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-02.jpg')}}" alt="img">
                                                        </span>
                                                            <span class="avatar avatar-rounded">
                                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-03.jpg')}}" alt="img">
                                                        </span>
                                                            <a href="#" class="avatar avatar-rounded bg-primary fs-12 text-white">
                                                            1+
                                                        </a>
                                                        </div>
                                                        <div class="d-flex align-items-center">
                                                            <a href="javascript:void(0);" class="d-flex align-items-center text-dark me-2"><i class="ti ti-message-circle text-gray me-1"></i></a>
                                                            <a href="javascript:void(0);" class="d-flex align-items-center text-dark"><i class="ti ti-paperclip text-gray me-1"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pt-2">
                                        <a href="#" class="btn btn-outline-white border border-dashed d-flex align-items-center justify-content-center">
                                            <i class="ti ti-plus me-2"></i> New Project
                                        </a>
                                    </div>
                                </div>
                                <div class="p-3 rounded bg-light border w-100">
                                    <div class="bg-white border p-2 rounded mb-2">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <span class="bg-soft-success p-1 d-flex rounded-circle me-2"><span class="bg-success rounded-circle d-block p-1"></span></span>
                                                <h6 class="me-2 mb-0">Completed</h6>
                                                <span class="badge badge-soft-light  text-dark rounded-pill">10</span>
                                            </div>
                                            <div class="dropdown">
                                                <a href="javascript:void(0);" class="d-inline-flex align-items-center" data-bs-toggle="dropdown">
                                                    <i class="ti ti-dots-vertical"></i>
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-end p-3">
                                                    <li>
                                                        <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-edit me-2"></i>Edit</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-2"></i>Delete</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="kanban-drag-wrap">
                                        <div>
                                            <div class="card kanban-card mb-2">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                                        <div class="d-flex align-items-center">
                                                            <span class="badge bg-success badge-xs d-flex align-items-center justify-content-center"><i class="fas fa-circle fs-6 me-1"></i>Low</span>
                                                        </div>
                                                        <div class="dropdown">
                                                            <a href="javascript:void(0);" class="d-inline-flex align-items-center" data-bs-toggle="dropdown">
                                                                <i class="ti ti-dots-vertical"></i>
                                                            </a>
                                                            <ul class="dropdown-menu dropdown-menu-end p-3">
                                                                <li>
                                                                    <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-edit me-2"></i>Edit</a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-2"></i>Delete</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center mb-3">
                                                        <span class="avatar avatar-xs rounded-circle bg-warning me-2">
                                                        <img src="{{URL::asset('build/img/icons/kanban-arrow.svg')}}" class="w-auto h-auto" alt="Img">
                                                    </span>
                                                        <h6 class="d-flex align-items-center mb-0">Project Title</h6>
                                                    </div>
                                                    <div class="d-flex align-items-center border-bottom mb-3 pb-3">
                                                        <div class="me-3 pe-3 border-end">
                                                            <span class="fw-medium fs-12 d-block mb-1">Budget</span>
                                                            <p class="fs-12 text-dark">$24,000</p>
                                                        </div>
                                                        <div class="me-3 pe-3 border-end">
                                                            <span class="fw-medium fs-12 d-block mb-1">Tasks</span>
                                                            <p class="fs-12 text-dark">12/15</p>
                                                        </div>
                                                        <div class="">
                                                            <span class="fw-medium fs-12 d-block mb-1">Due on</span>
                                                            <p class="fs-12 text-dark">15 Apr</p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <div class="avatar-list-stacked avatar-group-sm me-3">
                                                            <span class="avatar avatar-rounded">
                                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-19.jpg')}}" alt="img">
                                                        </span>
                                                            <span class="avatar avatar-rounded">
                                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-16.jpg')}}" alt="img">
                                                        </span>
                                                            <span class="avatar avatar-rounded">
                                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-01.jpg')}}" alt="img">
                                                        </span>
                                                            <span class="avatar avatar-rounded">
                                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-02.jpg')}}" alt="img">
                                                        </span>
                                                            <span class="avatar avatar-rounded">
                                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-03.jpg')}}" alt="img">
                                                        </span>
                                                            <a href="#" class="avatar avatar-rounded bg-primary fs-12 text-white">
                                                            1+
                                                        </a>
                                                        </div>
                                                        <div class="d-flex align-items-center">
                                                            <a href="javascript:void(0);" class="d-flex align-items-center text-dark me-2"><i class="ti ti-message-circle text-gray me-1"></i></a>
                                                            <a href="javascript:void(0);" class="d-flex align-items-center text-dark"><i class="ti ti-paperclip text-gray me-1"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pt-2">
                                        <a href="#" class="btn btn-outline-white border border-dashed d-flex align-items-center justify-content-center">
                                            <i class="ti ti-plus me-2"></i> New Project
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- End container -->

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