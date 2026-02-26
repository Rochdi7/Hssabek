<?php $page = 'file-manager'; ?>
@extends('layout.mainlayout')
@section('content')

    <!-- ========================
        Start Page Content
    ========================= -->
    <div class="page-wrapper">

        <!-- Start Content -->
        <div class="content file-manager-content">

            <div class="mb-3 d-flex align-items-center justify-content-between flex-wrap gap-2">
                <div>
                    <h5 class="mb-1 fw-bold">File Manager</h5>
                </div>
                <div class="d-flex my-xl-auto right-content align-items-center flex-wrap table-header">
                    <div class="me-2 mb-2">
                        <div class="input-icon-start position-relative">
                            <span class="input-icon-addon">
                            <i class="ti ti-search"></i>
                        </span>
                            <input type="text" class="form-control py-1 h-auto" placeholder="Search Files / Folders">
                        </div>
                    </div>
                    <div class="me-2 mb-2">
                        <div class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle btn btn-outline-white d-inline-flex align-items-center" data-bs-toggle="dropdown">
                            All Files
                        </a>
                            <ul class="dropdown-menu  dropdown-menu-end p-3">
                                <li>
                                    <a href="javascript:void(0);" class="dropdown-item rounded-1">All Files</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" class="dropdown-item rounded-1">Music</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" class="dropdown-item rounded-1">Video</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" class="dropdown-item rounded-1">Documents</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" class="dropdown-item rounded-1">Photos</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="mb-2">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#add_folder" class="btn btn-md btn-primary d-flex align-items-center"><i class="ti ti-circle-plus me-2"></i>Create Folder</a>
                    </div>
                </div>
            </div>
            <div class="row">

                <!-- Dropbox -->
                <div class="col-lg-3 col-md-6 d-flex">
                    <div class="card flex-fill">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <div class="d-flex align-items-center">
                                    <img src="{{URL::asset('build/img/icons/dropbox.svg')}}" alt="img">
                                    <h5 class="ms-2">Dropbox</h5>
                                </div>
                                <div class="dropdown">
                                    <a href="javascript:void(0);" class="d-inline-flex align-items-center" data-bs-toggle="dropdown">
                                        <i class="ti ti-dots"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end p-3">
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-folder-open me-2"></i>Open</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-trash me-1"></i>Delete All</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-status-change me-1"></i>Reset</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="progress progress-xs flex-grow-1 mb-2">
                                <div class="progress-bar bg-pink rounded" role="progressbar" style="width: 20%;" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <p class="mb-0">200 Files</p>
                                <p class="text-dark mb-0">28GB</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Dropbox -->

                <!-- Google Drive -->
                <div class="col-lg-3 col-md-6 d-flex">
                    <div class="card flex-fill">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <div class="d-flex align-items-center">
                                    <img src="{{URL::asset('build/img/icons/drive.svg')}}" alt="img">
                                    <h5 class="ms-2">Google Drive</h5>
                                </div>
                                <div class="dropdown">
                                    <a href="javascript:void(0);" class="d-inline-flex align-items-center" data-bs-toggle="dropdown">
                                        <i class="ti ti-dots"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end p-3">
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-folder-open me-2"></i>Open</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-trash me-1"></i>Delete All</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-status-change me-1"></i>Reset</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="progress progress-xs flex-grow-1 mb-2">
                                <div class="progress-bar bg-pink rounded" role="progressbar" style="width: 80%;" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <p class="mb-0">144 Files</p>
                                <p class="text-dark mb-0">54GB</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Google Drive -->

                <!-- Cloud Storage -->
                <div class="col-lg-3 col-md-6 d-flex">
                    <div class="card flex-fill">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <div class="d-flex align-items-center">
                                    <img src="{{URL::asset('build/img/icons/cloud.svg')}}" alt="img">
                                    <h5 class="ms-2">Cloud Storage</h5>
                                </div>
                                <div class="dropdown">
                                    <a href="javascript:void(0);" class="d-inline-flex align-items-center" data-bs-toggle="dropdown">
                                        <i class="ti ti-dots"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end p-3">
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-folder-open me-2"></i>Open</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-trash me-1"></i>Delete All</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-status-change me-1"></i>Reset</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="progress progress-xs flex-grow-1 mb-2">
                                <div class="progress-bar bg-purple rounded" role="progressbar" style="width: 50%;" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <p class="mb-0">144 Files</p>
                                <p class="text-dark mb-0">54GB</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Cloud Storage -->

                <!-- Internal Storage -->
                <div class="col-lg-3 col-md-6 d-flex">
                    <div class="card flex-fill">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <div class="d-flex align-items-center">
                                    <img src="{{URL::asset('build/img/icons/storage.svg')}}" alt="img">
                                    <h5 class="ms-2">Internal Storage</h5>
                                </div>
                                <div class="dropdown">
                                    <a href="javascript:void(0);" class="d-inline-flex align-items-center" data-bs-toggle="dropdown">
                                        <i class="ti ti-dots"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end p-3">
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-folder-open me-2"></i>Open</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-trash me-1"></i>Delete All</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-status-change me-1"></i>Reset</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="progress progress-xs flex-grow-1 mb-2">
                                <div class="progress-bar bg-purple rounded" role="progressbar" style="width: 20%;" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <p class="mb-0">144 Files</p>
                                <p class="text-dark mb-0">54GB</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Internal Storage -->

            </div>

            <div class="row">

                <!-- Sidebar -->
                <div class="col-xl-3">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="shadow-xs p-2 mb-3">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center overflow-hidden">
                                        <span class="avatar flex-shrink-0">
                                            <img src="{{URL::asset('build/img/profiles/avatar-01.jpg')}}" alt="img" class="rounded-circle">
                                        </span>
                                        <div class="overflow-hidden ms-2">
                                            <h5 class="text-truncate mb-1">James Hong</h5>
                                            <p class="fs-12 text-truncate">jameshong@example.com</p>
                                        </div>
                                    </div>
                                    <div class="dropdown ms-2">
                                        <a href="javascript:void(0);" class="d-inline-flex align-items-center" data-bs-toggle="dropdown">
                                            <i class="ti ti-dots"></i>
                                        </a>
                                        <ul class="dropdown-menu  dropdown-menu-end p-3">
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-edit me-1"></i>Edit</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="file-drop mb-3 text-center">
                                <span class="avatar avatar-sm bg-primary text-white mb-2">
                                    <i class="ti ti-upload fs-16"></i>
                                </span>
                                <h6 class="mb-2">Drop files here</h6>
                                <p class="fs-12 mb-0">Browse and chose the files you want to upload from your computer</p>
                                <input type="file">
                            </div>
                            <div class="files-list nav d-block">
                                <a href="javscript:void(0);" class="d-flex align-items-center fw-medium p-2 active"><i class="ti ti-folder-up me-2"></i>All Folder / Files</a>
                                <a href="javscript:void(0);" class="d-flex align-items-center fw-medium p-2"><i class="ti ti-star me-2"></i>Drive</a>
                                <a href="javscript:void(0);" class="d-flex align-items-center fw-medium p-2"><i class="ti ti-octahedron me-2"></i>Dropbox</a>
                                <a href="javscript:void(0);" class="d-flex align-items-center fw-medium p-2"><i class="ti ti-share-2 me-2"></i>Shared with Me</a>
                                <a href="javscript:void(0);" class="d-flex align-items-center fw-medium p-2"><i class="ti ti-file me-2"></i>Document</a>
                                <a href="javscript:void(0);" class="d-flex align-items-center fw-medium p-2"><i class="ti ti-clock-hour-11 me-2"></i>Recent File</a>
                                <a href="javscript:void(0);" class="d-flex align-items-center fw-medium p-2"><i class="ti ti-star me-2"></i>Important</a>
                                <a href="javscript:void(0);" class="d-flex align-items-center fw-medium p-2"><i class="ti ti-music me-2"></i>Media</a>
                            </div>
                        </div>
                    </div>

                    <!-- Storage Details -->
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <h4 class="mb-2">Storage Details</h4>
                                <span class="badge bg-success mb-2">Used 77%</span>
                            </div>
                            <div id="storage-chart"></div>
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <div class="d-flex align-items-center overflow-hidden">
                                    <span class="avatar avatar-md bg-soft-info">
                                        <i class="ti ti-music fs-20 text-info"></i>
                                    </span>
                                    <div class="overflow-hidden ms-2">
                                        <h6 class="text-truncate fs-14">Music</h6>
                                        <p class="text-truncate">35 Files</p>
                                    </div>
                                </div>
                                <p class="text-dark">8.5 GB</p>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <div class="d-flex align-items-center overflow-hidden">
                                    <span class="avatar avatar-md bg-soft-warning">
                                        <i class="fa-regular fa-file-audio fs-20 text-warning"></i>
                                    </span>
                                    <div class="overflow-hidden ms-2">
                                        <h6 class="text-truncate fs-14">Video</h6>
                                        <p class="text-truncate">145 Files</p>
                                    </div>
                                </div>
                                <p class="text-dark">2 GB</p>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <div class="d-flex align-items-center overflow-hidden">
                                    <span class="avatar avatar-md bg-soft-secondary">
                                        <i class="ti ti-file-description fs-20 text-secondary"></i>
                                    </span>
                                    <div class="overflow-hidden ms-2">
                                        <h6 class="text-truncate fs-14">Documents</h6>
                                        <p class="text-truncate">487 Files</p>
                                    </div>
                                </div>
                                <p class="text-dark">24.5 GB</p>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <div class="d-flex align-items-center overflow-hidden">
                                    <span class="avatar avatar-md badge-soft-primary">
                                        <i class="ti ti-photo fs-20 text-secondary"></i>
                                    </span>
                                    <div class="overflow-hidden ms-2">
                                        <h6 class="text-truncate fs-14">Photos</h6>
                                        <p class="text-truncate">35 Files</p>
                                    </div>
                                </div>
                                <p class="text-dark">8.5 GB</p>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mb-0">
                                <div class="d-flex align-items-center overflow-hidden">
                                    <span class="avatar avatar-md bg-soft-danger">
                                        <i class="ti ti-file-type-doc fs-20 text-danger"></i>
                                    </span>
                                    <div class="overflow-hidden ms-2">
                                        <h6 class="text-truncate fs-14">Other</h6>
                                        <p class="text-truncate">487 Files</p>
                                    </div>
                                </div>
                                <p class="text-dark">16.2 GB</p>
                            </div>
                        </div>
                    </div>
                    <!-- /Storage Details -->

                </div>
                <!-- /Sidebar -->

                <div class="col-xl-9">

                    <!-- Quick Access -->
                    <div class="border-bottom mb-3">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <h4 class="mb-2">Quick Access</h4>
                            <div>
                                <a href="javascript:void(0);" class="mb-2 me-3 fw-medium link-default">Close</a>
                                <a href="javascript:void(0);" class="mb-2 fw-medium link-default">View All</a>
                            </div>
                        </div>
                        <div class="row row-cols-xxl-5 row-cols-xl-3 row-cols-sm-3 row-cols-1 justify-content-center">
                            <div class="col d-flex">
                                <div class="card access-wrap flex-fill">
                                    <div class="card-body text-center">
                                        <img src="{{URL::asset('build/img/icons/file.svg')}}" alt="img" class="mb-3">
                                        <h6 class="mb-2 fw-medium"><a href="javascript:void(0);" data-bs-toggle="offcanvas" data-bs-target="#preview">Final.doc</a></h6>
                                        <span class="badge badge-soft-primary">2.4 GB</span>
                                    </div>
                                    <span class="access-rate rating-select"><i class="ti ti-star-filled filled"></i></span>
                                </div>
                            </div>
                            <div class="col d-flex">
                                <div class="card access-wrap flex-fill">
                                    <div class="card-body text-center">
                                        <img src="{{URL::asset('build/img/icons/pdf-icon.svg')}}" alt="img" class="mb-3">
                                        <h6 class="mb-2 fw-medium"><a href="javascript:void(0);" data-bs-toggle="offcanvas" data-bs-target="#preview">Marklist.pdf</a></h6>
                                        <span class="badge badge-soft-primary">2.4 GB</span>
                                    </div>
                                    <span class="access-rate rating-select"><i class="ti ti-star"></i></span>
                                </div>
                            </div>
                            <div class="col d-flex">
                                <div class="card access-wrap flex-fill">
                                    <div class="card-body text-center">
                                        <img src="{{URL::asset('build/img/icons/image.svg')}}" alt="img" class="mb-3">
                                        <h6 class="mb-2 fw-medium"><a href="javascript:void(0);" data-bs-toggle="offcanvas" data-bs-target="#preview">Nature.png</a></h6>
                                        <span class="badge badge-soft-primary">2.4 GB</span>
                                    </div>
                                    <span class="access-rate rating-select"><i class="ti ti-star-filled filled"></i></span>
                                </div>
                            </div>
                            <div class="col d-flex">
                                <div class="card access-wrap flex-fill">
                                    <div class="card-body text-center">
                                        <img src="{{URL::asset('build/img/icons/xls-icon.svg')}}" alt="img" class="mb-3">
                                        <h6 class="mb-2 fw-medium"><a href="javascript:void(0);" data-bs-toggle="offcanvas" data-bs-target="#preview">List.xlsx</a></h6>
                                        <span class="badge badge-soft-primary">2.4 GB</span>
                                    </div>
                                    <span class="access-rate rating-select"><i class="ti ti-star"></i></span>
                                </div>
                            </div>
                            <div class="col d-flex">
                                <div class="card access-wrap flex-fill">
                                    <div class="card-body text-center">
                                        <img src="{{URL::asset('build/img/icons/folder-icon.svg')}}" alt="img" class="mb-3">
                                        <h6 class="mb-2 fw-medium"><a href="javascript:void(0);" data-bs-toggle="offcanvas" data-bs-target="#preview">Group Photos</a></h6>
                                        <span class="badge badge-soft-primary">2.4 GB</span>
                                    </div>
                                    <span class="access-rate rating-select"><i class="ti ti-star"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Quick Access -->

                    <!-- Recent Folders -->
                    <div class="border-bottom mb-3">
                        <div class="d-flex align-items-center justify-content-between mb-2 table-header">
                            <h4 class="mb-2">Recent Folders</h4>
                            <div class="dropdown mb-2">
                                <a href="javascript:void(0);" class="dropdown-toggle btn btn-outline-white" data-bs-toggle="dropdown">
                                    Last 7 Days
                                </a>
                                <ul class="dropdown-menu  dropdown-menu-end p-3">
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item rounded-1">Last 7 Days</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item rounded-1">Last 1 month</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item rounded-1">Last 1 year</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="owl-carousel folders-carousel">
                            <div class="folder-wrap bg-white d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <span class="text-warning fs-30">
                                        <i class="ti ti-folder-filled"></i>
                                    </span>
                                    <div class="ms-2">
                                        <h6 class="mb-1"><a href="#" data-bs-toggle="offcanvas" data-bs-target="#preview">Personal Assets</a></h6>
                                        <div class="d-flex align-items-center">
                                            <p class="fs-12 mb-0 me-2">2.4 GB</p>
                                            <p class="fs-12 mb-0 d-flex align-items-center"><i class="ti ti-circle-filled fs-6 me-2 text-dark"></i>135 files</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="avatar-list-stacked avatar-group-sm">
                                        <span class="avatar avatar-rounded">
                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-07.jpg')}}" alt="img">
                                        </span>
                                        <span class="avatar avatar-rounded">
                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-02.jpg')}}" alt="img">
                                        </span>
                                    </div>
                                    <div class="dropdown ms-2">
                                        <a href="javascript:void(0);" class="d-inline-flex align-items-center" data-bs-toggle="dropdown">
                                            <i class="ti ti-dots"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-end p-3">
                                            <li>
                                                <a href="javascript:void(0);" data-bs-toggle="offcanvas" data-bs-target="#preview" class="dropdown-item rounded-1"><i class="ti ti-folder-open me-2"></i>Preview</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-copy me-2"></i>Duplicate</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-arrow-left-right me-2"></i>Move</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-user-plus me-2"></i>Invite</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-share-3 me-2"></i>Share Link</a>
                                            </li>
                                            <li>
                                                <hr class="dropdown-divider my-2">
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-eye me-2"></i>View Details</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-download me-2"></i>Download</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-trash-x me-2"></i>Delete</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="folder-wrap bg-white d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <span class="text-warning fs-30">
                                        <i class="ti ti-folder-filled"></i>
                                    </span>
                                    <div class="ms-2">
                                        <h6 class="mb-1"><a href="#" data-bs-toggle="offcanvas" data-bs-target="#preview">Document</a></h6>
                                        <div class="d-flex align-items-center">
                                            <p class="fs-12 mb-0 me-2">4 GB</p>
                                            <p class="fs-12 mb-0 d-flex align-items-center"><i class="ti ti-circle-filled fs-6 me-2 text-dark"></i>15 files</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="avatar-list-stacked avatar-group-sm">
                                        <span class="avatar avatar-rounded">
                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-05.jpg')}}" alt="img">
                                        </span>
                                        <span class="avatar avatar-rounded">
                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-02.jpg')}}" alt="img">
                                        </span>
                                    </div>
                                    <div class="dropdown ms-2">
                                        <a href="javascript:void(0);" class="d-inline-flex align-items-center" data-bs-toggle="dropdown">
                                            <i class="ti ti-dots"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-end p-3">
                                            <li>
                                                <a href="javascript:void(0);" data-bs-toggle="offcanvas" data-bs-target="#preview" class="dropdown-item rounded-1"><i class="ti ti-folder-open me-2"></i>Preview</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-copy me-2"></i>Duplicate</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-arrow-left-right me-2"></i>Move</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-user-plus me-2"></i>Invite</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-share-3 me-2"></i>Share Link</a>
                                            </li>
                                            <li>
                                                <hr class="dropdown-divider my-2">
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-eye me-2"></i>View Details</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-download me-2"></i>Download</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-trash-x me-2"></i>Delete</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="folder-wrap bg-white d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <span class="text-warning fs-30">
                                        <i class="ti ti-folder-filled"></i>
                                    </span>
                                    <div class="ms-2">
                                        <h6 class="mb-1"><a href="#" data-bs-toggle="offcanvas" data-bs-target="#preview">Handyimages</a></h6>
                                        <div class="d-flex align-items-center">
                                            <p class="fs-12 mb-0 me-2">1.4 GB</p>
                                            <p class="fs-12 mb-0 d-flex align-items-center"><i class="ti ti-circle-filled fs-6 me-2 text-dark"></i>115 files</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="dropdown ms-2">
                                        <a href="javascript:void(0);" class="d-inline-flex align-items-center" data-bs-toggle="dropdown">
                                            <i class="ti ti-dots"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-end p-3">
                                            <li>
                                                <a href="javascript:void(0);" data-bs-toggle="offcanvas" data-bs-target="#preview" class="dropdown-item rounded-1"><i class="ti ti-folder-open me-2"></i>Preview</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-copy me-2"></i>Duplicate</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-arrow-left-right me-2"></i>Move</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-user-plus me-2"></i>Invite</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-share-3 me-2"></i>Share Link</a>
                                            </li>
                                            <li>
                                                <hr class="dropdown-divider my-2">
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-eye me-2"></i>View Details</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-download me-2"></i>Download</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-trash-x me-2"></i>Delete</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Recent Folders -->

                    <!-- Recent Files -->
                    <div class="border-bottom mb-3">
                        <div class="d-flex align-items-center justify-content-between mb-2 table-header">
                            <h4 class="mb-2"><a href="#" data-bs-toggle="offcanvas" data-bs-target="#preview">Recent Files</a></h4>
                            <div class="dropdown mb-2">
                                <a href="javascript:void(0);" class="dropdown-toggle btn btn-outline-white" data-bs-toggle="dropdown">
                                    Last Modified
                                </a>
                                <ul class="dropdown-menu  dropdown-menu-end p-3">
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item rounded-1">Newest to Oldest</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item rounded-1">Last Modified</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item rounded-1">Oldest to Newest</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="owl-carousel files-carousel">
                            <div class="files-wrap">
                                <div class="bg-transparent-dark p-5 d-flex align-items-center justify-content-center  files-icon">
                                    <i class="ti ti-file-description fs-24 text-dark"></i>
                                </div>
                                <div class="bg-white d-flex align-items-center justify-content-between p-3 files-content">
                                    <h6 class="fw-medium">customer_data.txt</h6>
                                    <div class="dropdown ms-2">
                                        <a href="javascript:void(0);" class="d-inline-flex align-items-center" data-bs-toggle="dropdown">
                                            <i class="ti ti-dots"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-end p-3">
                                            <li>
                                                <a href="javascript:void(0);" data-bs-toggle="offcanvas" data-bs-target="#preview" class="dropdown-item rounded-1"><i class="ti ti-folder-open me-2"></i>Preview</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-copy me-2"></i>Duplicate</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-arrow-left-right me-2"></i>Move</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-user-plus me-2"></i>Invite</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-share-3 me-2"></i>Share Link</a>
                                            </li>
                                            <li>
                                                <hr class="dropdown-divider my-2">
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-eye me-2"></i>View Details</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-download me-2"></i>Download</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-trash-x me-2"></i>Delete</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="files-wrap">
                                <div class="bg-transparent-dark p-5 d-flex align-items-center justify-content-center files-icon">
                                    <i class="ti ti-file-type-pdf fs-24 text-dark"></i>
                                </div>
                                <div class="bg-white d-flex align-items-center justify-content-between p-3 files-content">
                                    <h6 class="fw-medium text-truncate"><a href="#" data-bs-toggle="offcanvas" data-bs-target="#preview">video_player_installer_setup.rar</a></h6>
                                    <div class="dropdown ms-2">
                                        <a href="javascript:void(0);" class="d-inline-flex align-items-center" data-bs-toggle="dropdown">
                                            <i class="ti ti-dots"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-end p-3">
                                            <li>
                                                <a href="javascript:void(0);" data-bs-toggle="offcanvas" data-bs-target="#preview" class="dropdown-item rounded-1"><i class="ti ti-folder-open me-2"></i>Preview</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-copy me-2"></i>Duplicate</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-arrow-left-right me-2"></i>Move</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-user-plus me-2"></i>Invite</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-share-3 me-2"></i>Share Link</a>
                                            </li>
                                            <li>
                                                <hr class="dropdown-divider my-2">
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-eye me-2"></i>View Details</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-download me-2"></i>Download</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-trash-x me-2"></i>Delete</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="files-wrap">
                                <div class="bg-transparent-dark p-5 d-flex align-items-center justify-content-center files-icon">
                                    <i class="fa-regular fa-file-audio fs-24 text-dark"></i>
                                </div>
                                <div class="bg-white d-flex align-items-center justify-content-between p-3 files-content">
                                    <h6 class="fw-medium text-truncate"><a href="#" data-bs-toggle="offcanvas" data-bs-target="#preview">recording.mp3</a></h6>
                                    <div class="dropdown ms-2">
                                        <a href="javascript:void(0);" class="d-inline-flex align-items-center" data-bs-toggle="dropdown">
                                            <i class="ti ti-dots"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-end p-3">
                                            <li>
                                                <a href="javascript:void(0);" data-bs-toggle="offcanvas" data-bs-target="#preview" class="dropdown-item rounded-1"><i class="ti ti-folder-open me-2"></i>Preview</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-copy me-2"></i>Duplicate</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-arrow-left-right me-2"></i>Move</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-user-plus me-2"></i>Invite</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-share-3 me-2"></i>Share Link</a>
                                            </li>
                                            <li>
                                                <hr class="dropdown-divider my-2">
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-eye me-2"></i>View Details</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-download me-2"></i>Download</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-trash-x me-2"></i>Delete</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="files-wrap">
                                <div class="bg-transparent-dark p-5 d-flex align-items-center justify-content-center files-icon">
                                    <i class="fa-solid fa-file-zipper fs-24 text-dark"></i>
                                </div>
                                <div class="bg-white d-flex align-items-center justify-content-between p-3 files-content">
                                    <h6 class="fw-medium"><a href="#" data-bs-toggle="offcanvas" data-bs-target="#preview">header_file.zip</a></h6>
                                    <div class="dropdown ms-2">
                                        <a href="javascript:void(0);" class="d-inline-flex align-items-center" data-bs-toggle="dropdown">
                                            <i class="ti ti-dots"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-end p-3">
                                            <li>
                                                <a href="javascript:void(0);" data-bs-toggle="offcanvas" data-bs-target="#preview" class="dropdown-item rounded-1"><i class="ti ti-folder-open me-2"></i>Preview</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-copy me-2"></i>Duplicate</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-arrow-left-right me-2"></i>Move</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-user-plus me-2"></i>Invite</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-share-3 me-2"></i>Share Link</a>
                                            </li>
                                            <li>
                                                <hr class="dropdown-divider my-2">
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-eye me-2"></i>View Details</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-download me-2"></i>Download</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-trash-x me-2"></i>Delete</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Recent Files -->

                <!-- table list -->
                    <div class="d-flex align-items-center justify-content-between mb-2 table-header">
                        <h4 class="mb-2">Files</h4>
                        <div class="d-flex align-items-center">
                            <div class="dropdown mb-2 me-2">
                                <a href="javascript:void(0);" class="dropdown-toggle btn btn-outline-white" data-bs-toggle="dropdown">
                                    Sort By : Docs Type
                                </a>
                                <ul class="dropdown-menu  dropdown-menu-end p-3">
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item rounded-1">Docs</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item rounded-1">Pdf</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item rounded-1">Image</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item rounded-1">Folder</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item rounded-1">Xml</a>
                                    </li>
                                </ul>
                            </div>
                            <a href="javascript:void(0);" class="link-primary fw-medium mb-2">View All</a>
                        </div>
                    </div>
                    <div class="table-responsive table-nowrap mb-3">
                        <table class="table mb-0 border">
                            <thead class="table-light">
                                <tr>
                                    <th>
                                        <div class="form-check form-check-md">
                                            <input class="form-check-input" type="checkbox" id="select-all">
                                        </div>
                                    </th>
                                    <th class="fs-14 fw-medium">Name</th>
                                    <th class="fs-14 fw-medium">Size</th>
                                    <th class="fs-14 fw-medium">Type</th>
                                    <th class="fs-14 fw-medium">Modified</th>
                                    <th class="fs-14 fw-medium">Share</th>
                                    <th class="fs-14 fw-medium"></th>
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
                                        <div class="d-flex align-items-center file-name-icon">
                                            <a href="#" class="avatar avatar-md bg-light" data-bs-toggle="offcanvas" data-bs-target="#preview">
                                                <img src="{{URL::asset('build/img/icons/file-01.svg')}}" class="img-fluid" alt="img"></a>
                                            <div class="ms-2">
                                                <p class="text-dark fw-medium  mb-0"><a href="#" data-bs-toggle="offcanvas" data-bs-target="#preview">Secret</a></p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>7.6 MB</td>
                                    <td>Doc</td>
                                    <td>
                                        <p class="text-dark mb-0">Mar 15, 2025</p>
                                        <span>05:00:14 PM</span>
                                    </td>
                                    <td>
                                        <div class="avatar-list-stacked avatar-group-sm">
                                            <span class="avatar avatar-rounded">
                                                <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-03.jpg')}}" alt="img">
                                            </span>
                                            <span class="avatar avatar-rounded">
                                                <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-04.jpg')}}" alt="img">
                                            </span>
                                            <span class="avatar avatar-rounded">
                                                <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-12.jpg')}}" alt="img">
                                            </span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="rating-select me-2">
                                                <a href="javascript:void(0);"><i class="ti ti-star"></i></a>
                                            </div>
                                            <div class="dropdown">
                                                <a href="#" class="d-flex align-items-center justify-content-center" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="ti ti-dots fs-14"></i>
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-right p-3">
                                                    <li>
                                                        <a class="dropdown-item rounded-1" href="#">
                                                            <i class="ti ti-trash me-2"></i>Permanent Delete
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item rounded-1" href="#">
                                                            <i class="ti ti-edit-circle me-2"></i>Restore File
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check form-check-md">
                                            <input class="form-check-input" type="checkbox">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center file-name-icon">
                                            <a href="#" class="avatar avatar-md bg-light" data-bs-toggle="offcanvas" data-bs-target="#preview">
                                                <img src="{{URL::asset('build/img/icons/file-02.svg')}}" class="img-fluid" alt="img"></a>
                                            <div class="ms-2">
                                                <p class="text-dark fw-medium  mb-0"><a href="#" data-bs-toggle="offcanvas" data-bs-target="#preview">Sophie Headrick</a></p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>7.4 MB</td>
                                    <td>PDF</td>
                                    <td>
                                        <p class="text-dark mb-0">Jan 8, 2025</p>
                                        <span>08:20:13 PM</span>
                                    </td>
                                    <td>
                                        <div class="avatar-list-stacked avatar-group-sm">
                                            <span class="avatar avatar-rounded">
                                                <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-15.jpg')}}" alt="img">
                                            </span>
                                            <span class="avatar avatar-rounded">
                                                <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-16.jpg')}}" alt="img">
                                            </span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="rating-select me-2">
                                                <a href="javascript:void(0);"><i class="ti ti-star"></i></a>
                                            </div>
                                            <div class="dropdown">
                                                <a href="#" class="d-flex align-items-center justify-content-center" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="ti ti-dots fs-14"></i>
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-right p-3">
                                                    <li>
                                                        <a class="dropdown-item rounded-1" href="#">
                                                            <i class="ti ti-trash me-2"></i>Permanent Delete
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item rounded-1" href="#">
                                                            <i class="ti ti-edit-circle me-2"></i>Restore File
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check form-check-md">
                                            <input class="form-check-input" type="checkbox">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center file-name-icon">
                                            <a href="#" class="avatar avatar-md bg-light" data-bs-toggle="offcanvas" data-bs-target="#preview">
                                                <img src="{{URL::asset('build/img/icons/file-03.svg')}}" class="img-fluid" alt="img"></a>
                                            <div class="ms-2">
                                                <p class="text-dark fw-medium  mb-0"><a href="#" data-bs-toggle="offcanvas" data-bs-target="#preview">Gallery</a></p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>6.1 MB</td>
                                    <td>Image</td>
                                    <td>
                                        <p class="text-dark mb-0">Aug 6, 2025</p>
                                        <span>04:10:12 PM</span>
                                    </td>
                                    <td>
                                        <div class="avatar-list-stacked avatar-group-sm">
                                            <span class="avatar avatar-rounded">
                                                <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-02.jpg')}}" alt="img">
                                            </span>
                                            <span class="avatar avatar-rounded">
                                                <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-03.jpg')}}" alt="img">
                                            </span>
                                            <span class="avatar avatar-rounded">
                                                <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-05.jpg')}}" alt="img">
                                            </span>
                                            <span class="avatar avatar-rounded">
                                                <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-06.jpg')}}" alt="img">
                                            </span>
                                            <a class="avatar bg-primary avatar-rounded text-fixed-white" href="javascript:void(0);">
                                                +1
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="rating-select me-2">
                                                <a href="javascript:void(0);"><i class="ti ti-star"></i></a>
                                            </div>
                                            <div class="dropdown">
                                                <a href="#" class="d-flex align-items-center justify-content-center" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="ti ti-dots fs-14"></i>
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-right p-3">
                                                    <li>
                                                        <a class="dropdown-item rounded-1" href="#">
                                                            <i class="ti ti-trash me-2"></i>Permanent Delete
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item rounded-1" href="#">
                                                            <i class="ti ti-edit-circle me-2"></i>Restore File
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check form-check-md">
                                            <input class="form-check-input" type="checkbox">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center file-name-icon">
                                            <a href="#" class="avatar avatar-md bg-light" data-bs-toggle="offcanvas" data-bs-target="#preview">
                                                <img src="{{URL::asset('build/img/icons/file-04.svg')}}" class="img-fluid" alt="img"></a>
                                            <div class="ms-2">
                                                <p class="text-dark fw-medium  mb-0"><a href="#" data-bs-toggle="offcanvas" data-bs-target="#preview">Doris Crowley</a></p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>5.2 MB</td>
                                    <td>Folder</td>
                                    <td>
                                        <p class="text-dark mb-0">Jan 6, 2025</p>
                                        <span>03:40:14 PM</span>
                                    </td>
                                    <td>
                                        <div class="avatar-list-stacked avatar-group-sm">
                                            <span class="avatar avatar-rounded">
                                                <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-06.jpg')}}" alt="img">
                                            </span>
                                            <span class="avatar avatar-rounded">
                                                <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-10.jpg')}}" alt="img">
                                            </span>
                                            <span class="avatar avatar-rounded">
                                                <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-15.jpg')}}" alt="img">
                                            </span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="rating-select me-2">
                                                <a href="javascript:void(0);"><i class="ti ti-star"></i></a>
                                            </div>
                                            <div class="dropdown">
                                                <a href="#" class="d-flex align-items-center justify-content-center" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="ti ti-dots fs-14"></i>
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-right p-3">
                                                    <li>
                                                        <a class="dropdown-item rounded-1" href="#">
                                                            <i class="ti ti-trash me-2"></i>Permanent Delete
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item rounded-1" href="#">
                                                            <i class="ti ti-edit-circle me-2"></i>Restore File
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check form-check-md">
                                            <input class="form-check-input" type="checkbox">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center file-name-icon">
                                            <a href="#" class="avatar avatar-md bg-light" data-bs-toggle="offcanvas" data-bs-target="#preview">
                                                <img src="{{URL::asset('build/img/icons/file-05.svg')}}" class="img-fluid" alt="img"></a>
                                            <div class="ms-2">
                                                <p class="text-dark fw-medium  mb-0"><a href="#" data-bs-toggle="offcanvas" data-bs-target="#preview">Cheat_codez</a></p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>8 MB</td>
                                    <td>Xml</td>
                                    <td>
                                        <p class="text-dark mb-0">Oct 12, 2025</p>
                                        <span>05:00:14 PM</span>
                                    </td>
                                    <td>
                                        <div class="avatar-list-stacked avatar-group-sm">
                                            <span class="avatar avatar-rounded">
                                                <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-04.jpg')}}" alt="img">
                                            </span>
                                            <span class="avatar avatar-rounded">
                                                <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-05.jpg')}}" alt="img">
                                            </span>
                                            <span class="avatar avatar-rounded">
                                                <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-12.jpg')}}" alt="img">
                                            </span>
                                            <span class="avatar avatar-rounded">
                                                <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-11.jpg')}}" alt="img">
                                            </span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="rating-select me-2">
                                                <a href="javascript:void(0);"><i class="ti ti-star"></i></a>
                                            </div>
                                            <div class="dropdown">
                                                <a href="#" class="d-flex align-items-center justify-content-center" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="ti ti-dots fs-14"></i>
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-right p-3">
                                                    <li>
                                                        <a class="dropdown-item rounded-1" href="#">
                                                            <i class="ti ti-trash me-2"></i>Permanent Delete
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item rounded-1" href="#">
                                                            <i class="ti ti-edit-circle me-2"></i>Restore File
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- table list -->

                </div>

            </div>
        </div>
        <!-- End Content -->

        @component('components.footer')
        @endcomponent
    </div>
    <!-- ========================
        End Page Content
    ========================= -->

@endsection