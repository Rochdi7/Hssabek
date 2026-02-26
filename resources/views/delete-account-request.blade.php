<?php $page = 'delete-account-request'; ?>
@extends('layout.mainlayout')
@section('content')
    <!-- ========================
        Start Page Content
    ========================= -->

    <div class="page-wrapper">

        <!-- Start container -->
        <div class="content content-two">

            <!-- Page Header -->
            <div class="d-flex d-block align-items-center justify-content-between flex-wrap gap-3 mb-3">
                <div>
                    <h6>Delete Account Request</h6>
                </div>
            </div>
            <!-- End Page Header -->

            <!-- Table Search Start -->
            <div class="mb-3">
                <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                    <div class="d-flex align-items-center flex-wrap gap-2">
                        <div class="table-search d-flex align-items-center mb-0">
                            <div class="search-input">
                                <a href="javascript:void(0);" class="btn-searchset"><i class="isax isax-search-normal fs-12"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center flex-wrap gap-2">
                        <div class="dropdown">
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

                <!-- Filter Info -->
                <div class="align-items-center gap-2 flex-wrap filter-info mt-3">
                    <h6 class="fs-13 fw-semibold">Filters</h6>
                    <span class="tag bg-light border rounded-1 fs-12 text-dark badge"><span class="num-count d-inline-flex align-items-center justify-content-center bg-success fs-10 me-1">5</span>Users Selected<span class="ms-1 tag-close"><i class="fa-solid fa-x fs-10"></i></span></span>
                    <span class="tag bg-light border rounded-1 fs-12 text-dark badge"><span class="num-count d-inline-flex align-items-center justify-content-center bg-success fs-10 me-1">5</span>Status Selected<span class="ms-1 tag-close"><i class="fa-solid fa-x fs-10"></i></span></span>
                    <a href="#" class="link-danger fw-medium text-decoration-underline ms-md-1">Clear All</a>
                </div>
                <!-- /Filter Info -->
            </div>
            <!-- Table Search End -->

            <!-- Table List Start -->
            <div class="table-responsive">
                <table class="table table-nowrap datatable">
                    <thead class="thead-light">
                        <tr>
                            <th>User</th>
                            <th>Delete Request Date</th>
                            <th class="no-sort"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="{{URL::asset('build/img/users/user-16.jpg')}}" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0" alt="img">
                                    <div>
                                        <h6 class="fs-14 fw-medium mb-0">Sarah Michelle</h6>
                                    </div>
                                </div>
                            </td>
                            <td>04 Mar 2025</td>
                            <td>
                                <a href="javascript:void(0);" class="btn btn-outline-white d-inline-flex align-items-center me-2" data-bs-toggle="modal" data-bs-target="#cancel_modal">
                                    <i class="isax isax-close-circle me-1"></i> Cancel
                                </a>
                                <a href="javascript:void(0);" class="btn btn-outline-white d-inline-flex align-items-center" data-bs-toggle="modal" data-bs-target="#confirm_modal">
                                    <i class="isax isax-tick-circle me-1"></i> Confirm
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="{{URL::asset('build/img/users/user-26.jpg')}}" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0" alt="img">
                                    <div>
                                        <h6 class="fs-14 fw-medium mb-0">Daniel Patrick</h6>
                                    </div>
                                </div>
                            </td>
                            <td>20 Feb 2025</td>
                            <td>
                                <a href="javascript:void(0);" class="btn btn-outline-white d-inline-flex align-items-center me-2" data-bs-toggle="modal" data-bs-target="#cancel_modal">
                                    <i class="isax isax-close-circle me-1"></i> Cancel
                                </a>
                                <a href="javascript:void(0);" class="btn btn-outline-white d-inline-flex align-items-center" data-bs-toggle="modal" data-bs-target="#confirm_modal">
                                    <i class="isax isax-tick-circle me-1"></i> Confirm
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="{{URL::asset('build/img/users/user-27.jpg')}}" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0" alt="img">
                                    <div>
                                        <h6 class="fs-14 fw-medium mb-0">Emily Lauren</h6>
                                    </div>
                                </div>
                            </td>
                            <td>13 Feb 2025</td>
                            <td>
                                <a href="javascript:void(0);" class="btn btn-outline-white d-inline-flex align-items-center me-2" data-bs-toggle="modal" data-bs-target="#cancel_modal">
                                    <i class="isax isax-close-circle me-1"></i> Cancel
                                </a>
                                <a href="javascript:void(0);" class="btn btn-outline-white d-inline-flex align-items-center" data-bs-toggle="modal" data-bs-target="#confirm_modal">
                                    <i class="isax isax-tick-circle me-1"></i> Confirm
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="{{URL::asset('build/img/users/user-28.jpg')}}" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0" alt="img">
                                    <div>
                                        <h6 class="fs-14 fw-medium mb-0">Braun Kelton</h6>
                                    </div>
                                </div>
                            </td>
                            <td>30 Jan 2025</td>
                            <td>
                                <a href="javascript:void(0);" class="btn btn-outline-white d-inline-flex align-items-center me-2" data-bs-toggle="modal" data-bs-target="#cancel_modal">
                                    <i class="isax isax-close-circle me-1"></i> Cancel
                                </a>
                                <a href="javascript:void(0);" class="btn btn-outline-white d-inline-flex align-items-center" data-bs-toggle="modal" data-bs-target="#confirm_modal">
                                    <i class="isax isax-tick-circle me-1"></i> Confirm
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="{{URL::asset('build/img/users/user-29.jpg')}}" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0" alt="img">
                                    <div>
                                        <h6 class="fs-14 fw-medium mb-0">Jessica Renee</h6>
                                    </div>
                                </div>
                            </td>
                            <td>17 Jan 2025</td>
                            <td>
                                <a href="javascript:void(0);" class="btn btn-outline-white d-inline-flex align-items-center me-2" data-bs-toggle="modal" data-bs-target="#cancel_modal">
                                    <i class="isax isax-close-circle me-1"></i> Cancel
                                </a>
                                <a href="javascript:void(0);" class="btn btn-outline-white d-inline-flex align-items-center" data-bs-toggle="modal" data-bs-target="#confirm_modal">
                                    <i class="isax isax-tick-circle me-1"></i> Confirm
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="{{URL::asset('build/img/users/user-30.jpg')}}" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0" alt="img">
                                    <div>
                                        <h6 class="fs-14 fw-medium mb-0">Ryan Christopher</h6>
                                    </div>
                                </div>
                            </td>
                            <td>22 Dec 2024</td>
                            <td>
                                <a href="javascript:void(0);" class="btn btn-outline-white d-inline-flex align-items-center me-2" data-bs-toggle="modal" data-bs-target="#cancel_modal">
                                    <i class="isax isax-close-circle me-1"></i> Cancel
                                </a>
                                <a href="javascript:void(0);" class="btn btn-outline-white d-inline-flex align-items-center" data-bs-toggle="modal" data-bs-target="#confirm_modal">
                                    <i class="isax isax-tick-circle me-1"></i> Confirm
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="{{URL::asset('build/img/users/user-24.jpg')}}" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0" alt="img">
                                    <div>
                                        <h6 class="fs-14 fw-medium mb-0">Abigail Harper</h6>
                                    </div>
                                </div>
                            </td>
                            <td>15 Dec 2024</td>
                            <td>
                                <a href="javascript:void(0);" class="btn btn-outline-white d-inline-flex align-items-center me-2" data-bs-toggle="modal" data-bs-target="#cancel_modal">
                                    <i class="isax isax-close-circle me-1"></i> Cancel
                                </a>
                                <a href="javascript:void(0);" class="btn btn-outline-white d-inline-flex align-items-center" data-bs-toggle="modal" data-bs-target="#confirm_modal">
                                    <i class="isax isax-tick-circle me-1"></i> Confirm
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="{{URL::asset('build/img/users/user-31.jpg')}}" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0" alt="img">
                                    <div>
                                        <h6 class="fs-14 fw-medium mb-0">Michael Johnson</h6>
                                    </div>
                                </div>
                            </td>
                            <td>28 Nov 2024</td>
                            <td>
                                <a href="javascript:void(0);" class="btn btn-outline-white d-inline-flex align-items-center me-2" data-bs-toggle="modal" data-bs-target="#cancel_modal">
                                    <i class="isax isax-close-circle me-1"></i> Cancel
                                </a>
                                <a href="javascript:void(0);" class="btn btn-outline-white d-inline-flex align-items-center" data-bs-toggle="modal" data-bs-target="#confirm_modal">
                                    <i class="isax isax-tick-circle me-1"></i> Confirm
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="{{URL::asset('build/img/users/user-32.jpg')}}" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0" alt="img">
                                    <div>
                                        <h6 class="fs-14 fw-medium mb-0">Madison Brooke</h6>
                                    </div>
                                </div>
                            </td>
                            <td>12 Nov 2024</td>
                            <td>
                                <a href="javascript:void(0);" class="btn btn-outline-white d-inline-flex align-items-center me-2" data-bs-toggle="modal" data-bs-target="#cancel_modal">
                                    <i class="isax isax-close-circle me-1"></i> Cancel
                                </a>
                                <a href="javascript:void(0);" class="btn btn-outline-white d-inline-flex align-items-center" data-bs-toggle="modal" data-bs-target="#confirm_modal">
                                    <i class="isax isax-tick-circle me-1"></i> Confirm
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="{{URL::asset('build/img/users/user-33.jpg')}}" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0" alt="img">
                                    <div>
                                        <h6 class="fs-14 fw-medium mb-0">William Andrew</h6>
                                    </div>
                                </div>
                            </td>
                            <td>25 Oct 2024</td>
                            <td>
                                <a href="javascript:void(0);" class="btn btn-outline-white d-inline-flex align-items-center me-2" data-bs-toggle="modal" data-bs-target="#cancel_modal">
                                    <i class="isax isax-close-circle me-1"></i> Cancel
                                </a>
                                <a href="javascript:void(0);" class="btn btn-outline-white d-inline-flex align-items-center" data-bs-toggle="modal" data-bs-target="#confirm_modal">
                                    <i class="isax isax-tick-circle me-1"></i> Confirm
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="{{URL::asset('build/img/users/user-34.jpg')}}" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0" alt="img">
                                    <div>
                                        <h6 class="fs-14 fw-medium mb-0">Victoria Celeste</h6>
                                    </div>
                                </div>
                            </td>
                            <td>18 Oct 2024</td>
                            <td>
                                <a href="javascript:void(0);" class="btn btn-outline-white d-inline-flex align-items-center me-2" data-bs-toggle="modal" data-bs-target="#cancel_modal">
                                    <i class="isax isax-close-circle me-1"></i> Cancel
                                </a>
                                <a href="javascript:void(0);" class="btn btn-outline-white d-inline-flex align-items-center" data-bs-toggle="modal" data-bs-target="#confirm_modal">
                                    <i class="isax isax-tick-circle me-1"></i> Confirm
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="{{URL::asset('build/img/users/user-35.jpg')}}" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0" alt="img">
                                    <div>
                                        <h6 class="fs-14 fw-medium mb-0">Nathaniel Blake</h6>
                                    </div>
                                </div>
                            </td>
                            <td>22 Sep 2024</td>
                            <td>
                                <a href="javascript:void(0);" class="btn btn-outline-white d-inline-flex align-items-center me-2" data-bs-toggle="modal" data-bs-target="#cancel_modal">
                                    <i class="isax isax-close-circle me-1"></i> Cancel
                                </a>
                                <a href="javascript:void(0);" class="btn btn-outline-white d-inline-flex align-items-center" data-bs-toggle="modal" data-bs-target="#confirm_modal">
                                    <i class="isax isax-tick-circle me-1"></i> Confirm
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="{{URL::asset('build/img/users/user-36.jpg')}}" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0" alt="img">
                                    <div>
                                        <h6 class="fs-14 fw-medium mb-0">Natalie Paige</h6>
                                    </div>
                                </div>
                            </td>
                            <td>15 Sep 2024</td>
                            <td>
                                <a href="javascript:void(0);" class="btn btn-outline-white d-inline-flex align-items-center me-2" data-bs-toggle="modal" data-bs-target="#cancel_modal">
                                    <i class="isax isax-close-circle me-1"></i> Cancel
                                </a>
                                <a href="javascript:void(0);" class="btn btn-outline-white d-inline-flex align-items-center" data-bs-toggle="modal" data-bs-target="#confirm_modal">
                                    <i class="isax isax-tick-circle me-1"></i> Confirm
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="{{URL::asset('build/img/users/user-37.jpg')}}" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0" alt="img">
                                    <div>
                                        <h6 class="fs-14 fw-medium mb-0">Isabella Claire</h6>
                                    </div>
                                </div>
                            </td>
                            <td>20 Aug 2024</td>
                            <td>
                                <a href="javascript:void(0);" class="btn btn-outline-white d-inline-flex align-items-center me-2" data-bs-toggle="modal" data-bs-target="#cancel_modal">
                                    <i class="isax isax-close-circle me-1"></i> Cancel
                                </a>
                                <a href="javascript:void(0);" class="btn btn-outline-white d-inline-flex align-items-center" data-bs-toggle="modal" data-bs-target="#confirm_modal">
                                    <i class="isax isax-tick-circle me-1"></i> Confirm
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- /Table List End -->

        </div>
        <!-- End container -->

        <!-- Footer Start -->
        <div class="footer d-sm-flex align-items-center justify-content-between bg-white py-2 px-4 border-top">
            <p class="text-dark mb-0">&copy; 2025 <a href="javascript:void(0);" class="link-primary">Kanakku</a>, All Rights Reserved</p>
            <p class="text-dark">Version : 1.3.8</p>
        </div>
        <!-- Footer End -->

    </div>

    <!-- ========================
        End Page Content
    ========================= -->
@endsection