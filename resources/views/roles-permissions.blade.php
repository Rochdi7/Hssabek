<?php $page = 'roles-permissions'; ?>
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
                        <h6>Roles & Permission</h6>
                    </div>
                    <div class="d-flex my-xl-auto right-content align-items-center flex-wrap gap-2">
                        <div class="dropdown">
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
                            <a href="javascript:void(0);" class="btn btn-primary d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#add_modal">
                                <i class="isax isax-add-circle5 me-1"></i>New Role
                            </a>
                        </div>
                    </div>
                </div>
                <!-- End Page Header -->

				 <!-- start row -->
                <div class="row">
                    <div class="col-md-3">
                        <div class="input-group mb-3">
                            <span class="input-group-text bg-white border-end-0">
								<i class="isax isax-search-normal fs-12"></i>
							</span>
                            <input type="text" class="form-control border-start-0 ps-0 bg-white" placeholder="Search">
                        </div>
                    </div><!-- end col -->
                </div>
				<!-- end row -->

                <!-- Table List -->
                <div class="table-responsive table-nowrap">
                    <table class="table border mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Role</th>
                                <th>Create On</th>
                                <th class="no-sort"></th>
                                <th class="no-sort"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="bg-light"><span class="text-gray-3">Admin</span></td>
                                <td class="bg-light"><span class="text-gray-3">22 Feb 2025</span></td>
                                <td class="bg-light"></td>
                                <td class="bg-light"></td>
                            </tr>
                            <tr>
                                <td>Customer</td>
                                <td>07 Feb 2025</td>
                                <td>
                                    <a href="{{url('permission')}}" class="btn btn-outline-white d-inline-flex align-items-center">
                                        <i class="isax isax-shield-tick me-1"></i> Permissions
                                    </a>
                                </td>
                                <td class="action-item">
                                    <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                        <i class="isax isax-more"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#edit_modal"><i class="isax isax-edit me-2"></i>Edit</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <td>Shop Owner</td>
                                <td>30 Jan 2025</td>
                                <td>
                                    <a href="{{url('permission')}}" class="btn btn-outline-white d-inline-flex align-items-center">
                                        <i class="isax isax-shield-tick me-1"></i> Permissions
                                    </a>
                                </td>
                                <td class="action-item">
                                    <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                        <i class="isax isax-more"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#edit_modal"><i class="isax isax-edit me-2"></i>Edit</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <td>Receptionist</td>
                                <td>04 Jan 2025</td>
                                <td>
                                    <a href="{{url('permission')}}" class="btn btn-outline-white d-inline-flex align-items-center">
                                        <i class="isax isax-shield-tick me-1"></i> Permissions
                                    </a>
                                </td>
                                <td class="action-item">
                                    <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                        <i class="isax isax-more"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#edit_modal"><i class="isax isax-edit me-2"></i>Edit</a>
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
			<!-- End Content -->

            @component('components.footer')
            @endcomponent

        </div>
        
		<!-- ========================
			End Page Content
		========================= -->
@endsection