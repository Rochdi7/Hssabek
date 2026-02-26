<?php $page = 'esignatures'; ?>
@extends('layout.mainlayout')
@section('content')
    <!-- ========================
        Start Page Content
    ========================= -->

    <div class="page-wrapper">	
        <!-- Start Content -->
        <div class="content">
            <div class="row justify-content-center">
                <div class="col-xl-12">
                    <div class=" row settings-wrapper d-flex">
                        <!-- Start settings sidebar -->
                        @component('components.settings-sidebar')
                        @endcomponent                        
                        <!-- End settings sidebar -->
                        <div class="col-xl-9 col-lg-8">
                            <div class="mb-3">
                                <div class="pb-3 border-bottom mb-3">
                                    <h6 class="mb-0">eSignatures</h6>
                                </div>
                                <form action="{{url('esignatures')}}">
                                    <div class="mb-3">
                                        <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                                            <div class="d-flex align-items-center flex-wrap gap-2">
                                                <div class="input-group mb-1">
                                                    <span class="input-group-text bg-white border-end-0">
                                                        <i class="isax isax-search-normal fs-12"></i>
                                                    </span>
                                                    <input type="text" class="form-control border-start-0 ps-0 bg-white" placeholder="Search">
                                                </div>	
                                            </div>
                                            <div class="d-flex align-items-center flex-wrap gap-2">
                                                <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#add_signatures" class="btn btn-primary d-flex align-items-center"><i class="isax isax-add-circle5 me-2"></i>New Signature</a>
                                            </div>
                                        </div>				
                                    </div>
                                    <div class="table-responsive table-nowrap">
                                        <table class="table border">
                                            <thead class="table-light">
                                                <tr>
                                                    <th class="no-sort">Signature Name</th>
                                                    <th>Signature</th>
                                                    <th>Default</th>
                                                    <th>Status</th>
                                                    <th class="no-sort"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <a href="javascript:void(0);" class="text-dark">Samuel Donatte</a>
                                                    </td>
                                                    <td>
                                                        <img src="{{URL::asset('build/img/icons/sign-01.svg')}}" alt="">
                                                    </td>
                                                    <td><a class="rounded-circle bg-light p-1" href="javascript:void(0);"><i class="isax isax-star icon-active"></i></a></td>
                                                    <td>
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox" role="switch" checked="">
                                                        </div>
                                                    </td>
                                                    <td class="action-item">
                                                        <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                                            <i class="isax isax-more"></i>
                                                        </a>
                                                        <ul class="dropdown-menu">
                                                            <li>
                                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#edit_signatures"><i class="isax isax-edit me-2"></i>Edit</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                                            </li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <a href="javascript:void(0);" class="text-dark">Michael Smith</a>
                                                    </td>
                                                    <td>
                                                        <img src="{{URL::asset('build/img/icons/sign-02.svg')}}" alt="">
                                                    </td>
                                                    <td><a class="rounded-circle bg-light p-1" href="javascript:void(0);"><i class="isax isax-star icon-active"></i></a></td>
                                                    <td>
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox" role="switch" checked="">
                                                        </div>
                                                    </td>
                                                    <td class="action-item">
                                                        <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                                            <i class="isax isax-more"></i>
                                                        </a>
                                                        <ul class="dropdown-menu">
                                                            <li>
                                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#edit_signatures"><i class="isax isax-edit me-2"></i>Edit</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                                            </li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <a href="javascript:void(0);" class="text-dark">Alberto Alleo</a>
                                                    </td>
                                                    <td>
                                                        <img src="{{URL::asset('build/img/icons/sign-03.svg')}}" alt="">
                                                    </td>
                                                    <td><a class="rounded-circle bg-light p-1" href="javascript:void(0);"><i class="isax isax-star icon-active"></i></a></td>
                                                    <td>
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox" role="switch">
                                                        </div>
                                                    </td>
                                                    <td class="action-item">
                                                        <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                                            <i class="isax isax-more"></i>
                                                        </a>
                                                        <ul class="dropdown-menu">
                                                            <li>
                                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#edit_signatures"><i class="isax isax-edit me-2"></i>Edit</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="isax isax-trash me-2"></i>Delete</a>
                                                            </li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <a href="javascript:void(0);" class="text-dark">Ernesto Janetts</a>
                                                    </td>
                                                    <td>
                                                        <img src="{{URL::asset('build/img/icons/sign-04.svg')}}" alt="">
                                                    </td>
                                                    <td><a class="rounded-circle bg-light p-1" href="javascript:void(0);"><i class="isax isax-star icon-active"></i></a></td>
                                                    <td>
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox" role="switch" checked="">
                                                        </div>
                                                    </td>
                                                    <td class="action-item">
                                                        <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                                            <i class="isax isax-more"></i>
                                                        </a>
                                                        <ul class="dropdown-menu">
                                                            <li>
                                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#edit_signatures"><i class="isax isax-edit me-2"></i>Edit</a>
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
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End container -->

        <!-- Footer-->
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