<?php $page = 'todo-list'; ?>
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
                    <ul class="table-top-head flex-shrink-0 mb-0 list-unstyled">
                        <li>
                            <a href="{{url('todo')}}"><i class="ti ti-layout-grid"></i></a>
                        </li>
                        <li>
                            <a href="{{url('todo-list')}}" class="active"><i class="ti ti-list-tree"></i></a>
                        </li>
                    </ul>
                    <div class="page-btn ms-2">
                        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_todo"><i class="ti ti-circle-plus me-1"></i>Create New</a>
                    </div>
                </div>
            </div>
            <div>

                <!-- table list start -->
                <div class="table-responsive table-nowrap">
                    <table class="table border mb-0">
                        <thead class="table-light text-uppercase">
                            <tr>
                                <th>
                                    <div class="form-check form-check-md">
                                        <input class="form-check-input" type="checkbox" id="select-all">
                                    </div>
                                </th>
                                <th>Company Name</th>
                                <th>Tags</th>
                                <th>Assignee</th>
                                <th>Created On</th>
                                <th>Progress</th>
                                <th>Due Date</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="form-check form-check-md">
                                            <input class="form-check-input" type="checkbox">
                                        </div>
                                        <span class="mx-2 d-flex align-items-center rating-select"><i class="ti ti-star"></i></span>
                                        <span class="d-flex align-items-center"><i class="ti ti-square-rounded text-danger me-2"></i></span>
                                    </div>
                                </td>
                                <td>
                                    <p class="fw-medium text-dark">Respond to any pending messages</p>
                                </td>
                                <td>
                                    <span class="badge bg-info">Social</span>
                                </td>
                                <td>
                                    <div class="avatar-list-stacked avatar-group-sm">
                                        <span class="avatar avatar-rounded">
                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-01.jpg')}}" alt="img">
                                        </span>
                                        <span class="avatar avatar-rounded">
                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-02.jpg')}}" alt="img">
                                        </span>
                                        <span class="avatar avatar-rounded">
                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-05.jpg')}}" alt="img">
                                        </span>
                                    </div>
                                </td>
                                <td>14 Jan 2024</td>
                                <td>
                                    <span class="d-block mb-1">Progress : 100%</span>
                                    <div class="progress progress-xs flex-grow-1 mb-2" style="width: 190px;">
                                        <div class="progress-bar bg-success rounded" role="progressbar" style="width: 100%;" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </td>
                                <td>14 Jan 2024</td>
                                <td>
                                    <span class="badge badge-soft-success d-inline-flex align-items-center">
                                        <i class="ti ti-circle-filled fs-5 me-1"></i>
                                        Completed
                                    </span>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <a href="#" class="btn btn-sm btn-icon" data-bs-toggle="modal" data-bs-target="#edit_todo">
                                            <i class="ti ti-edit"></i>
                                        </a>
                                        <a href="#" class="btn btn-sm btn-icon" data-bs-toggle="modal" data-bs-target="#delete_modal">
                                            <i class="ti ti-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="form-check form-check-md">
                                            <input class="form-check-input" type="checkbox">
                                        </div>
                                        <span class="mx-2 d-flex align-items-center rating-select"><i class="ti ti-star-filled filled"></i></span>
                                        <span class="d-flex align-items-center"><i class="ti ti-square-rounded text-purple me-2"></i></span>
                                    </div>
                                </td>
                                <td>
                                    <p class="fw-medium text-dark">Update calendar and schedule</p>
                                </td>
                                <td>
                                    <span class="badge bg-primary">Meetings</span>
                                </td>
                                <td>
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
                                </td>
                                <td>21 Jan 2024</td>
                                <td>
                                    <span class="d-block mb-1">Progress : 15%</span>
                                    <div class="progress progress-xs flex-grow-1 mb-2" style="width: 190px;">
                                        <div class="progress-bar bg-danger rounded" role="progressbar" style="width: 15%;" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </td>
                                <td>21 Jan 2024</td>
                                <td>
                                    <span class="badge badge-soft-secondary d-inline-flex align-items-center">
                                        <i class="ti ti-circle-filled fs-5 me-1"></i>
                                        Pending
                                    </span>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <a href="#" class="btn btn-sm btn-icon" data-bs-toggle="modal" data-bs-target="#edit_todo">
                                            <i class="ti ti-edit"></i>
                                        </a>
                                        <a href="#" class="btn btn-sm btn-icon" data-bs-toggle="modal" data-bs-target="#delete_modal">
                                            <i class="ti ti-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="form-check form-check-md">
                                            <input class="form-check-input" type="checkbox">
                                        </div>
                                        <span class="mx-2 d-flex align-items-center rating-select"><i class="ti ti-star"></i></span>
                                        <span class="d-flex align-items-center"><i class="ti ti-square-rounded text-purple me-2"></i></span>
                                    </div>
                                </td>
                                <td>
                                    <p class="fw-medium text-dark">Respond to any pending messages</p>
                                </td>
                                <td>
                                    <span class="badge bg-danger">Research</span>
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
                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-06.jpg')}}" alt="img">
                                        </span>
                                    </div>
                                </td>
                                <td>20 Feb 2024</td>
                                <td>
                                    <span class="d-block mb-1">Progress : 45%</span>
                                    <div class="progress progress-xs flex-grow-1 mb-2" style="width: 190px;">
                                        <div class="progress-bar bg-warning rounded" role="progressbar" style="width: 45%;" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </td>
                                <td>20 Feb 2024</td>
                                <td>
                                    <span class="badge badge-soft-primary d-inline-flex align-items-center">
                                        <i class="ti ti-circle-filled fs-5 me-1"></i>
                                        Inprogress
                                    </span>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <a href="#" class="btn btn-sm btn-icon" data-bs-toggle="modal" data-bs-target="#edit_todo">
                                            <i class="ti ti-edit"></i>
                                        </a>
                                        <a href="#" class="btn btn-sm btn-icon" data-bs-toggle="modal" data-bs-target="#delete_modal">
                                            <i class="ti ti-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="form-check form-check-md">
                                            <input class="form-check-input" type="checkbox">
                                        </div>
                                        <span class="mx-2 d-flex align-items-center rating-select"><i class="ti ti-star"></i></span>
                                        <span class="d-flex align-items-center"><i class="ti ti-square-rounded text-warning me-2"></i></span>
                                    </div>
                                </td>
                                <td>
                                    <p class="fw-medium text-dark">Attend team meeting at 10:00 AM</p>
                                </td>
                                <td>
                                    <span class="badge bg-primary">Web Design</span>
                                </td>
                                <td>
                                    <div class="avatar-list-stacked avatar-group-sm">
                                        <span class="avatar avatar-rounded">
                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-05.jpg')}}" alt="img">
                                        </span>
                                        <span class="avatar avatar-rounded">
                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-06.jpg')}}" alt="img">
                                        </span>
                                        <span class="avatar avatar-rounded">
                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-07.jpg')}}" alt="img">
                                        </span>
                                    </div>
                                </td>
                                <td>15 Mar 2024</td>
                                <td>
                                    <span class="d-block mb-1">Progress : 40%</span>
                                    <div class="progress progress-xs flex-grow-1 mb-2" style="width: 190px;">
                                        <div class="progress-bar bg-warning rounded" role="progressbar" style="width: 40%;" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </td>
                                <td>15 Mar 2024</td>
                                <td>
                                    <span class="badge badge-soft-primary d-inline-flex align-items-center">
                                        <i class="ti ti-circle-filled fs-5 me-1"></i>
                                        Inprogress
                                    </span>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <a href="#" class="btn btn-sm btn-icon" data-bs-toggle="modal" data-bs-target="#edit_todo">
                                            <i class="ti ti-edit"></i>
                                        </a>
                                        <a href="#" class="btn btn-sm btn-icon" data-bs-toggle="modal" data-bs-target="#delete_modal">
                                            <i class="ti ti-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="form-check form-check-md">
                                            <input class="form-check-input" type="checkbox">
                                        </div>
                                        <span class="mx-2 d-flex align-items-center rating-select"><i class="ti ti-star"></i></span>
                                        <span class="d-flex align-items-center"><i class="ti ti-square-rounded text-purple me-2"></i></span>
                                    </div>
                                </td>
                                <td>
                                    <p class="fw-medium text-dark">Check and respond to emails</p>
                                </td>
                                <td>
                                    <span class="badge bg-info">Reminder</span>
                                </td>
                                <td>
                                    <div class="avatar-list-stacked avatar-group-sm">
                                        <span class="avatar avatar-rounded">
                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-08.jpg')}}" alt="img">
                                        </span>
                                        <span class="avatar avatar-rounded">
                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-09.jpg')}}" alt="img">
                                        </span>
                                        <span class="avatar avatar-rounded">
                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-10.jpg')}}" alt="img">
                                        </span>
                                    </div>
                                </td>
                                <td>12 Apr 2024</td>
                                <td>
                                    <span class="d-block mb-1">Progress : 65%</span>
                                    <div class="progress progress-xs flex-grow-1 mb-2" style="width: 190px;">
                                        <div class="progress-bar bg-purple rounded" role="progressbar" style="width: 65%;" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </td>
                                <td>12 Apr 2024</td>
                                <td>
                                    <span class="badge badge-soft-secondary d-inline-flex align-items-center">
                                        <i class="ti ti-circle-filled fs-5 me-1"></i>
                                        Pending
                                    </span>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <a href="#" class="btn btn-sm btn-icon" data-bs-toggle="modal" data-bs-target="#edit_todo">
                                            <i class="ti ti-edit"></i>
                                        </a>
                                        <a href="#" class="btn btn-sm btn-icon" data-bs-toggle="modal" data-bs-target="#delete_modal">
                                            <i class="ti ti-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="form-check form-check-md">
                                            <input class="form-check-input" type="checkbox">
                                        </div>
                                        <span class="mx-2 d-flex align-items-center rating-select"><i class="ti ti-star"></i></span>
                                        <span class="d-flex align-items-center"><i class="ti ti-square-rounded text-warning me-2"></i></span>
                                    </div>
                                </td>
                                <td>
                                    <p class="fw-medium text-dark">Coordinate with department head</p>
                                </td>
                                <td>
                                    <span class="badge bg-danger">Internal</span>
                                </td>
                                <td>
                                    <div class="avatar-list-stacked avatar-group-sm">
                                        <span class="avatar avatar-rounded">
                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-11.jpg')}}" alt="img">
                                        </span>
                                        <span class="avatar avatar-rounded">
                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-12.jpg')}}" alt="img">
                                        </span>
                                        <span class="avatar avatar-rounded">
                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-13.jpg')}}" alt="img">
                                        </span>
                                    </div>
                                </td>
                                <td>20 Apr 2024</td>
                                <td>
                                    <span class="d-block mb-1">Progress : 85%</span>
                                    <div class="progress progress-xs flex-grow-1 mb-2" style="width: 190px;">
                                        <div class="progress-bar bg-pink rounded" role="progressbar" style="width: 85%;" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </td>
                                <td>20 Apr 2024</td>
                                <td>
                                    <span class="badge badge-soft-danger d-inline-flex align-items-center">
                                        <i class="ti ti-circle-filled fs-5 me-1"></i>
                                        Onhold
                                    </span>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <a href="#" class="btn btn-sm btn-icon" data-bs-toggle="modal" data-bs-target="#edit_todo">
                                            <i class="ti ti-edit"></i>
                                        </a>
                                        <a href="#" class="btn btn-sm btn-icon" data-bs-toggle="modal" data-bs-target="#delete_modal">
                                            <i class="ti ti-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="form-check form-check-md">
                                            <input class="form-check-input" type="checkbox">
                                        </div>
                                        <span class="mx-2 d-flex align-items-center rating-select"><i class="ti ti-star"></i></span>
                                        <span class="d-flex align-items-center"><i class="ti ti-square-rounded text-success me-2"></i></span>
                                    </div>
                                </td>
                                <td>
                                    <p class="fw-medium text-dark">Plan tasks for the next day</p>
                                </td>
                                <td>
                                    <span class="badge bg-info">Social</span>
                                </td>
                                <td>
                                    <div class="avatar-list-stacked avatar-group-sm">
                                        <span class="avatar avatar-rounded">
                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-14.jpg')}}" alt="img">
                                        </span>
                                        <span class="avatar avatar-rounded">
                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-15.jpg')}}" alt="img">
                                        </span>
                                        <span class="avatar avatar-rounded">
                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-16.jpg')}}" alt="img">
                                        </span>
                                    </div>
                                </td>
                                <td>06 Jul 2024</td>
                                <td>
                                    <span class="d-block mb-1">Progress : 100%</span>
                                    <div class="progress progress-xs flex-grow-1 mb-2" style="width: 190px;">
                                        <div class="progress-bar bg-success rounded" role="progressbar" style="width: 100%;" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </td>
                                <td>06 Jul 2024</td>
                                <td>
                                    <span class="badge badge-soft-success d-inline-flex align-items-center">
                                        <i class="ti ti-circle-filled fs-5 me-1"></i>
                                        Completed
                                    </span>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <a href="#" class="btn btn-sm btn-icon" data-bs-toggle="modal" data-bs-target="#edit_todo">
                                            <i class="ti ti-edit"></i>
                                        </a>
                                        <a href="#" class="btn btn-sm btn-icon" data-bs-toggle="modal" data-bs-target="#delete_modal">
                                            <i class="ti ti-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="form-check form-check-md">
                                            <input class="form-check-input" type="checkbox">
                                        </div>
                                        <span class="mx-2 d-flex align-items-center rating-select"><i class="ti ti-star"></i></span>
                                        <span class="d-flex align-items-center"><i class="ti ti-square-rounded text-success me-2"></i></span>
                                    </div>
                                </td>
                                <td>
                                    <p class="fw-medium text-dark">Finalize project proposal</p>
                                </td>
                                <td>
                                    <span class="badge bg-success">Projects</span>
                                </td>
                                <td>
                                    <div class="avatar-list-stacked avatar-group-sm">
                                        <span class="avatar avatar-rounded">
                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-17.jpg')}}" alt="img">
                                        </span>
                                        <span class="avatar avatar-rounded">
                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-18.jpg')}}" alt="img">
                                        </span>
                                        <span class="avatar avatar-rounded">
                                            <img class="border border-white" src="{{URL::asset('build/img/profiles/avatar-19.jpg')}}" alt="img">
                                        </span>
                                    </div>
                                </td>
                                <td>02 Sep 2024</td>
                                <td>
                                    <span class="d-block mb-1">Progress : 65%</span>
                                    <div class="progress progress-xs flex-grow-1 mb-2" style="width: 190px;">
                                        <div class="progress-bar bg-danger rounded" role="progressbar" style="width: 65%;" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </td>
                                <td>02 Sep 2024</td>
                                <td>
                                    <span class="badge badge-soft-danger d-inline-flex align-items-center">
                                        <i class="ti ti-circle-filled fs-5 me-1"></i>
                                        Onhold
                                    </span>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <a href="#" class="btn btn-sm btn-icon" data-bs-toggle="modal" data-bs-target="#edit_todo">
                                            <i class="ti ti-edit"></i>
                                        </a>
                                        <a href="#" class="btn btn-sm btn-icon" data-bs-toggle="modal" data-bs-target="#delete_modal">
                                            <i class="ti ti-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="form-check form-check-md">
                                            <input class="form-check-input" type="checkbox">
                                        </div>
                                        <span class="mx-2 d-flex align-items-center rating-select"><i class="ti ti-star"></i></span>
                                        <span class="d-flex align-items-center"><i class="ti ti-square-rounded text-purple me-2"></i></span>
                                    </div>
                                </td>
                                <td>
                                    <p class="fw-medium text-dark">Submit to supervisor by EOD</p>
                                </td>
                                <td>
                                    <span class="badge bg-info">Reminder</span>
                                </td>
                                <td>
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
                                </td>
                                <td>15 Nov 2024</td>
                                <td>
                                    <span class="d-block mb-1">Progress : 75%</span>
                                    <div class="progress progress-xs flex-grow-1 mb-2" style="width: 190px;">
                                        <div class="progress-bar bg-purple rounded" role="progressbar" style="width: 75%;" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </td>
                                <td>15 Nov 2024</td>
                                <td>
                                    <span class="badge badge-soft-primary d-inline-flex align-items-center">
                                        <i class="ti ti-circle-filled fs-5 me-1"></i>
                                        Inprogress
                                    </span>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <a href="#" class="btn btn-sm btn-icon" data-bs-toggle="modal" data-bs-target="#edit_todo">
                                            <i class="ti ti-edit"></i>
                                        </a>
                                        <a href="#" class="btn btn-sm btn-icon" data-bs-toggle="modal" data-bs-target="#delete_modal">
                                            <i class="ti ti-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="form-check form-check-md">
                                            <input class="form-check-input" type="checkbox">
                                        </div>
                                        <span class="mx-2 d-flex align-items-center rating-select"><i class="ti ti-star"></i></span>
                                        <span class="d-flex align-items-center"><i class="ti ti-square-rounded text-success me-2"></i></span>
                                    </div>
                                </td>
                                <td>
                                    <p class="fw-medium text-dark">Prepare presentation slides</p>
                                </td>
                                <td>
                                    <span class="badge bg-danger">Research</span>
                                </td>
                                <td>
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
                                </td>
                                <td>10 Dec 2024</td>
                                <td>
                                    <span class="d-block mb-1">Progress : 90%</span>
                                    <div class="progress progress-xs flex-grow-1 mb-2" style="width: 190px;">
                                        <div class="progress-bar bg-pink rounded" role="progressbar" style="width: 90%;" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </td>
                                <td>10 Dec 2024</td>
                                <td>
                                    <span class="badge badge-soft-secondary d-inline-flex align-items-center">
                                        <i class="ti ti-circle-filled fs-5 me-1"></i>
                                        Pending
                                    </span>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <a href="#" class="btn btn-sm btn-icon" data-bs-toggle="modal" data-bs-target="#edit_todo">
                                            <i class="ti ti-edit"></i>
                                        </a>
                                        <a href="#" class="btn btn-sm btn-icon" data-bs-toggle="modal" data-bs-target="#delete_modal">
                                            <i class="ti ti-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- table list end -->
                    
            </div>
        </div>
        <!-- End Content -->

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