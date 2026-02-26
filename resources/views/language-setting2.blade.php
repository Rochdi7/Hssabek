<?php $page = 'language-setting2'; ?>
@extends('layout.mainlayout')
@section('content')
    <!-- ========================
        Start Page Content
    ========================= -->

    <div class="page-wrapper">

        <!-- Start container -->
        <div class="content">

            <!-- Start row -->
            <div class="row justify-content-center">

                <div class="col-xl-12">
                    <div class="row settings-wrapper d-flex">
                        <!-- Start settings sidebar -->
                        @component('components.settings-sidebar')
                        @endcomponent                        
                        <!-- End settings sidebar -->

                        <div class="col-xl-9 col-lg-8">
                            <div class="mb-3 pb-3 border-bottom d-flex align-items-center justify-content-between flex-wrap gap-3">
                                <h6 class="fw-bold mb-0">Language</h6>
                                <div class="d-flex align-items-center">
                                    <div class="dropdown me-2">
                                        <a href="javascript:void(0);" class="dropdown-toggle btn btn-outline-white d-inline-flex align-items-center" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                            <i class="isax isax-language-square me-1"></i>Language
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-lg p-2">
                                            <li>
                                                <label class="dropdown-item d-flex align-items-center rounded-1">
                                                    English
                                                </label>
                                            </li>
                                            <li>
                                                <label class="dropdown-item d-flex align-items-center rounded-1">
                                                    German
                                                </label>
                                            </li>
                                            <li>
                                                <label class="dropdown-item d-flex align-items-center rounded-1">
                                                    Arabic
                                                </label>
                                            </li>
                                            <li>
                                                <label class="dropdown-item d-flex align-items-center rounded-1">
                                                    French
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                    <a href="javascript:void(0);" class="btn btn-primary d-inline-flex align-items-center"><i class="isax isax-add-circle5 me-1"></i>New Language</a>
                                </div>
                            </div>

                            <div class="d-flex align-items-center justify-content-between mb-3 gap-2 flex-wrap">
                                <div class="d-flex my-xl-auto right-content align-items-center flex-wrap row-gap-3">
                                    <div class="input-icon-start position-relative me-2">
                                        <span class="input-icon-addon">
                                            <i class="isax isax-search-normal"></i>
                                        </span>
                                        <input type="text" class="form-control form-control-sm bg-white" placeholder="Search"> 
                                    </div>
                                </div>
                                <a href="javascript:void(0);" class="btn btn-outline-white d-inline-flex align-items-center"><i class="isax isax-arrow-left me-1"></i>Back to Translations</a>
                            </div>

                            <!-- Custom Data Table -->
                            <div class="custom-datatable-filter table-responsive border rounded mb-3">
                                <table class="table mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Module</th>
                                            <th>Total</th>
                                            <th>Done</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <a href="javascript:void(0);">Inventory</a>
                                            </td>
                                            <td>
                                                1620
                                            </td>
                                            <td>
                                                1296
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <a href="javascript:void(0);" class="btn btn-sm btn-outline-white me-2">Web</a>
                                                    <a href="javascript:void(0);" class="btn btn-sm btn-outline-white me-2">App</a>
                                                    <a href="javascript:void(0);" class="btn btn-sm btn-outline-white">Admin</a>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                    <a href="javascript:void(0);" class="btn btn-outline-white rounded-circle btn-sm d-inline-flex align-items-center p-1 justify-content-center" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="isax isax-more"></i>
                                                    </a>
                                                    <ul class="dropdown-menu dropdown-menu-end p-2">
                                                        <li>
                                                            <a class="dropdown-item rounded-1" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#edit_testimonial"><i class="isax isax-edit me-2"></i>Edit</a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item rounded-1" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#delete_testimonials"><i class="isax isax-trash me-2"></i>Delete</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="javascript:void(0);">Sales</a>
                                            </td>
                                            <td>
                                                1620
                                            </td>
                                            <td>
                                                972
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <a href="javascript:void(0);" class="btn btn-sm btn-outline-white me-2">Web</a>
                                                    <a href="javascript:void(0);" class="btn btn-sm btn-outline-white me-2">App</a>
                                                    <a href="javascript:void(0);" class="btn btn-sm btn-outline-white">Admin</a>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                    <a href="javascript:void(0);" class="btn btn-outline-white rounded-circle btn-sm d-inline-flex align-items-center p-1 justify-content-center" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="isax isax-more"></i>
                                                    </a>
                                                    <ul class="dropdown-menu dropdown-menu-end p-2">
                                                        <li>
                                                            <a class="dropdown-item rounded-1" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#edit_testimonial"><i class="isax isax-edit me-2"></i>Edit</a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item rounded-1" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#delete_testimonials"><i class="isax isax-trash me-2"></i>Delete</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="javascript:void(0);">Purchases</a>
                                            </td>
                                            <td>
                                                1620
                                            </td>
                                            <td>
                                                810
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <a href="javascript:void(0);" class="btn btn-sm btn-outline-white me-2">Web</a>
                                                    <a href="javascript:void(0);" class="btn btn-sm btn-outline-white me-2">App</a>
                                                    <a href="javascript:void(0);" class="btn btn-sm btn-outline-white">Admin</a>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                    <a href="javascript:void(0);" class="btn btn-outline-white rounded-circle btn-sm d-inline-flex align-items-center p-1 justify-content-center" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="isax isax-more"></i>
                                                    </a>
                                                    <ul class="dropdown-menu dropdown-menu-end p-2">
                                                        <li>
                                                            <a class="dropdown-item rounded-1" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#edit_testimonial"><i class="isax isax-edit me-2"></i>Edit</a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item rounded-1" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#delete_testimonials"><i class="isax isax-trash me-2"></i>Delete</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="javascript:void(0);">Finance & Accounts</a>
                                            </td>
                                            <td>
                                                1620
                                            </td>
                                            <td>
                                                324
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <a href="javascript:void(0);" class="btn btn-sm btn-outline-white me-2">Web</a>
                                                    <a href="javascript:void(0);" class="btn btn-sm btn-outline-white me-2">App</a>
                                                    <a href="javascript:void(0);" class="btn btn-sm btn-outline-white">Admin</a>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                    <a href="javascript:void(0);" class="btn btn-outline-white rounded-circle btn-sm d-inline-flex align-items-center p-1 justify-content-center" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="isax isax-more"></i>
                                                    </a>
                                                    <ul class="dropdown-menu dropdown-menu-end p-2">
                                                        <li>
                                                            <a class="dropdown-item rounded-1" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#edit_testimonial"><i class="isax isax-edit me-2"></i>Edit</a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item rounded-1" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#delete_testimonials"><i class="isax isax-trash me-2"></i>Delete</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- Custom Data Table -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- End row -->

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