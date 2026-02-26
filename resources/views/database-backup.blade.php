<?php $page = 'database-backup'; ?>
@extends('layout.mainlayout')
@section('content')
    <!-- ========================
        Start Page Content
    ========================= -->

    <div class="page-wrapper">	
        <div class="content">
            <div class="row">
                <div class="col-lg-12 mx-auto">
                    <div class="row">
                        <!-- Start settings sidebar -->
                        @component('components.settings-sidebar')
                        @endcomponent                        
                        <!-- End settings sidebar -->
                        <div class="col-xl-9 col-lg-8">
                            <div>
                                <div class="pb-3 border-bottom mb-3">
                                    <h6 class="mb-0">Database Backup</h6>
                                </div>
                                <!-- Table Search -->
                                <div class="row justify-content-between align-items-center pb-1">
                                    <div class="col-md-5 mb-3">
                                        <div class="input-icon-start position-relative">
                                            <span class="input-icon-addon">
                                                <i class="isax isax-search-normal"></i>
                                            </span>
                                            <input type="text" class="form-control form-control-sm bg-white" placeholder="Search">
                                    
                                        </div>
                                    </div>
                                    <div class="col-md-7 text-end mb-3">
                                        <a href="javascript:void(0);" class="btn btn-primary d-inline-flex align-items-center" data-bs-toggle="modal" data-bs-target="#generate_modal"><i class="isax isax-folder-connection5 me-1"></i>Generate Backup</a>
                                    </div>
                                </div>
                                <!-- /Table Search -->
                                    <!-- Table List -->
                                <div class="table-responsive table-nowrap">
                                    <table class="table border">
                                        <thead class="table-light">
                                            <tr>
                                                <th class="no-sort">Template Name</th>
                                                <th class="no-sort">Created On</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <p class="text-dark">sales_db_backup_20250312.sql</p>
                                                </td>
                                                <td>
                                                    22 Feb 2025
                                                </td>
                                                <td class="action-item">
                                                    <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                                        <i class="isax isax-more"></i>
                                                    </a>
                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                                        </li>
                                                    </ul>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p class="text-dark">invoice_db_backup_2025-03-12_1430.sql</p>
                                                </td>
                                                <td>
                                                    07 Feb 2025
                                                </td>
                                                <td class="action-item">
                                                    <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                                        <i class="isax isax-more"></i>
                                                    </a>
                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                                        </li>
                                                    </ul>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p class="text-dark">customer_db_backup_2025-03-12.sql</p>
                                                </td>
                                                <td>
                                                    30 Jan 2025
                                                </td>
                                                <td class="action-item">
                                                    <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                                        <i class="isax isax-more"></i>
                                                    </a>
                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                                        </li>
                                                    </ul>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p class="text-dark">full_backup_2025-03-12.sql</p>
                                                </td>
                                                <td>
                                                    02 Jan 2025
                                                </td>
                                                <td class="action-item">
                                                    <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                                        <i class="isax isax-more"></i>
                                                    </a>
                                                    <ul class="dropdown-menu">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
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