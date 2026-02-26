<?php $page = 'calendar'; ?>
@extends('layout.mainlayout')
@section('content')
    <!-- ========================
        Start Page Content
    ========================= -->

    <div class="page-wrapper">

        <!-- Start content -->
        <div class="content content-two">
            <!-- Start Breadcrumb -->
            <div class="mb-3 d-flex align-items-center justify-content-between flex-wrap gap-2">
                <div>
                    <h4 class="mb-1 fw-bold">Calendar</h4>
                </div>
                <div class="d-flex my-xl-auto right-content align-items-center flex-wrap table-header">
                    <div class="me-2 mb-2">
                        <div class="dropdown py-1">
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
                    <div class="mb-2">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#add_event" class="btn btn-lg py-1 h-auto btn-primary d-flex align-items-center"><i class="ti ti-circle-plus me-2"></i>Create</a>
                    </div>
                </div>
            </div>
            <!-- End Breadcrumb -->

            <!-- Start Card -->
            <div class="card mb-0">
                <div class="card-body">
                    <div id="calendar"></div>
                </div>
            </div>
            <!-- End Card -->

        </div>
        <!-- End content -->
         
        @component('components.footer')
        @endcomponent

    </div>

    <!-- ========================
        End Page Content
    ========================= -->
@endsection