<?php $page = 'tax-rates'; ?>
@extends('layout.mainlayout')
@section('content')
    <!-- ========================
        Start Page Content
    ========================= -->

    <div class="page-wrapper">
        <div class="content">
            <!-- row start -->
            <div class="row justify-content-center">
                <div class="col-xl-12">
                    <!-- row start -->
                    <div class=" row settings-wrapper d-flex">
                        <!-- Start settings sidebar -->
                        @component('components.settings-sidebar')
                        @endcomponent                        
                        <!-- End settings sidebar -->
                        <div class="col-xl-9 col-lg-8">
                            <div class="mb-3">
                                <div class="pb-3 border-bottom mb-3">
                                    <h6 class="mb-0">Tax Rates</h6>
                                </div>
                                <div class="d-flex align-items-center mb-3">
                                    <h6 class="fs-16 fw-semibold mb-0">Tax Rates</h6>
                                </div>
                                <form action="{{url('tax-rates')}}">
                                    <div class="mb-3">
                                        <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                                            <div class="d-flex align-items-center flex-wrap gap-2">
                                                <div class="input-icon-start position-relative">
                                                    <span class="input-icon-addon">
                                                        <i class="isax isax-search-normal"></i>
                                                    </span>
                                                    <input type="text" class="form-control form-control-sm bg-white" placeholder="Search">
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center flex-wrap gap-2">
                                                <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#add_tax_rates" class="btn btn-primary d-flex align-items-center"><i class="isax isax-add-circle5 me-2"></i>New Tax Rate</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-responsive table-nowrap pb-3 border-bottom">
                                        <table class="table border mb-0">
                                            <thead class="table-light">
                                                <tr>
                                                    <th class="no-sort">Name</th>
                                                    <th>Tax Rate</th>
                                                    <th>Created On</th>
                                                    <th>Status</th>
                                                    <th class="no-sort"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <a href="javascript:void(0);" class="text-dark">VAT</a>
                                                    </td>
                                                    <td>10%</td>
                                                    <td>22 Feb 2025</td>
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
                                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#edit_tax_rates"><i class="isax isax-edit me-2"></i>Edit</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_tax_rates"><i class="isax isax-trash me-2"></i>Delete</a>
                                                            </li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <a href="javascript:void(0);" class="text-dark">CGST</a>
                                                    </td>
                                                    <td>08%</td>
                                                    <td>07 Feb 2025</td>
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
                                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#edit_tax_rates"><i class="isax isax-edit me-2"></i>Edit</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_tax_rates"><i class="isax isax-trash me-2"></i>Delete</a>
                                                            </li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <a href="javascript:void(0);" class="text-dark">SGST</a>
                                                    </td>
                                                    <td>10%</td>
                                                    <td>17 Jan 2025</td>
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
                                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#edit_tax_rates"><i class="isax isax-edit me-2"></i>Edit</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_tax_rates"><i class="isax isax-trash me-2"></i>Delete</a>
                                                            </li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="d-flex align-items-center mb-3 mt-4">
                                        <h6 class="fs-16 fw-semibold mb-0">Tax Group</h6>
                                    </div>
                                    <div class="mb-3">
                                        <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                                            <div class="d-flex align-items-center flex-wrap gap-2">
                                                <div class="input-icon-start position-relative">
                                                    <span class="input-icon-addon">
                                                        <i class="isax isax-search-normal"></i>
                                                    </span>
                                                    <input type="text" class="form-control form-control-sm bg-white" placeholder="Search">

                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center flex-wrap gap-2">
                                                <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#add_tax_group" class="btn btn-primary d-flex align-items-center"><i class="isax isax-add-circle5 me-2"></i>New Tax Group</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-responsive table-nowrap">
                                        <table class="table border mb-0">
                                            <thead class="table-light">
                                                <tr>
                                                    <th class="no-sort">Name</th>
                                                    <th>Tax Rate</th>
                                                    <th>Created On</th>
                                                    <th>Status</th>
                                                    <th class="no-sort"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <a href="javascript:void(0);" class="text-dark">GST</a>
                                                    </td>
                                                    <td>18%</td>
                                                    <td>19 Feb 2025</td>
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
                                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#edit_tax_group"><i class="isax isax-edit me-2"></i>Edit</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_tax_group"><i class="isax isax-trash me-2"></i>Delete</a>
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
                    <!-- row end -->
                </div>
            </div>
            <!-- row end -->
        </div>

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