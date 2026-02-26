<?php $page = 'ticket-details'; ?>
@extends('layout.mainlayout')
@section('content')
    <!-- ========================
        Start Page Content
    ========================= -->

    <div class="page-wrapper">
        <div class="content">
            <div class="mb-3">
                <h6>Ticket Overview</h6>
            </div>
            <div class="card mb-3">
                <div class="card-header border-0 bg-light">
                    <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
                        <div class="d-flex align-items-center">
                            <span class="p-2 bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center me-2"><i class="isax isax-ticket"></i></span>
                            <h6 class="fs-16">#TK001 - <span class="text-gray-5">New Support Ticket</span></h6>
                        </div>
                        <div class="d-flex align-items-center">
                            <span class="badge badge-soft-danger me-3">Medium</span>
                            <div class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle btn btn-lg bg-light  d-flex align-items-center justify-content-start fs-13 fw-normal border" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="true">
                                    <i class="isax isax-shield me-1 text-gray-9"></i> Resolved
                                </a>
                                <div class="dropdown-menu shadow-lg w-100 dropdown-info">
                                    <ul class="mb-3">
                                        <li>
                                            <label class="dropdown-item px-2 d-flex align-items-center">
                                                Open
                                            </label>
                                        </li>
                                        <li>
                                            <label class="dropdown-item px-2 d-flex align-items-center">
                                                On Hold
                                            </label>
                                        </li>
                                        <li>
                                            <label class="dropdown-item px-2 d-flex align-items-center">
                                                Reopened
                                            </label>
                                        </li>
                                        <li>
                                            <label class="dropdown-item px-2 d-flex align-items-center">
                                                Resolved
                                            </label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <h6 class="mb-2">Description</h6>
                        <p>Need help? Submit a support ticket, and our team will assist you quickly. Provide your name, email, issue category, and a detailed description of the problem. Choose a priority level and attach relevant files if needed. Our
                            support team will review your request and respond as soon as possible. Stay updated on your ticket status and get the assistance you need efficiently!</p>
                        <p> Provide your name, email, issue category, and a detailed description of the problem. Choose a priority level and attach relevant files if needed.</p>
                    </div>
                    <!-- row start -->
                    <div class="row mb-3 mx-1">
                        <div class="col-lg-4 p-0 d-flex">
                            <div class="p-3 border flex-fill rounded-left border-end-0">
                                <div class="d-flex align-items-center">
                                    <img src="{{URL::asset('build/img/users/user-08.jpg')}}" class="avatar avatar-lg rounded-circle me-2" alt="img">
                                    <div>
                                        <h6 class="fs-14 mb-1">Created By</h6>
                                        <p class="fs-13">Michael Carter</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 p-0 d-flex">
                            <div class="p-3 border flex-fill rounded-0 border-end-0">
                                <div class="">
                                    <h6 class="fs-14 mb-1">Subject</h6>
                                    <p class="fs-13">Support Ticket</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 p-0 d-flex">
                            <div class="p-3 border flex-fill rounded-right">
                                <div class="">
                                    <h6 class="fs-14 mb-1">Subject</h6>
                                    <p class="fs-13">Support Ticket</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- row end -->
                    <!-- row start -->
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="border-bottom mb-3">
                                        <h6 class="mb-2">Attachments</h6>
                                    </div>
                                    <div class="file-upload drag-file w-100 d-flex align-items-center justify-content-center flex-column mb-3">
                                        <span class="upload-img d-block mb-2"><i class="isax isax-image text-primary"></i></span>
                                        <p class="mb-0 text-gray-9 fw-normal">Drop your files here or<a href="#" class="text-primary text-decoration-underline">
                                                browse</a></p>
                                        <input type="file" accept="video/image">
                                        <p>Maximum size : 50 MB</p>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between border rounded p-2 mb-3">
                                        <div class="d-flex align-items-center">
                                            <img src="{{URL::asset('build/img/icons/pdf.svg')}}" alt="img" class="avatar avatar-lg me-2">
                                            <div>
                                                <a href="javascript:void(0);" class="fs-13">Report1.pdf</a>
                                                <span class="d-block fs-12">45 KB</span>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <a href="javascript:void(0);" class="btn btn-primary btn-md rounded-circle me-2 p-2"><i class="isax isax-document-download"></i></a>
                                            <a href="javascript:void(0);" class="btn btn-light btn-md rounded-circle p-2"><i class="isax isax-more"></i></a>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between border rounded p-2">
                                        <div class="d-flex align-items-center">
                                            <img src="{{URL::asset('build/img/products/product-01.jpg')}}" alt="img" class="avatar avatar-lg me-2">
                                            <div>
                                                <a href="javascript:void(0);" class="fs-13">Image2.jpg</a>
                                                <span class="d-block fs-12">38 KB</span>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <a href="javascript:void(0);" class="btn btn-primary btn-md rounded-circle me-2 p-2"><i class="isax isax-document-download"></i></a>
                                            <a href="javascript:void(0);" class="btn btn-light btn-md rounded-circle p-2"><i class="isax isax-more"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card mb-0">
                                <div class="card-body">
                                    <h5 class="fw-bold border-bottom pb-2 mb-3">History</h5>

                                    <ul class="activity-feed">
                                        <li class="feed-item timeline-item">
                                            <p class="mb-1"><span class="text-dark fw-semibold">John Smith</span> Got it now, and I can log in.</p>
                                            <div class="invoice-date"><span><i class="isax isax-calendar5 me-1"></i>17 Jan 2025</span></div>
                                        </li>
                                        <li class="feed-item timeline-item">
                                            <p class="mb-1"><span class="text-dark fw-semibold">Forest Kroch </span> Check your spam folder</p>
                                            <div class="invoice-date"><span><i class="isax isax-calendar5 me-1"></i>17 Jan 2025</span></div>
                                        </li>
                                        <li class="feed-item timeline-item">
                                            <p class="mb-1"><span class="text-dark fw-semibold">Townsend Seary </span> I’m not receiving the email confirmation.</p>
                                            <div class="invoice-date"><span><i class="isax isax-calendar5 me-1"></i>17 Jan 2025</span></div>
                                        </li>
                                        <li class="feed-item timeline-item">
                                            <p class="mb-1"><span class="text-dark fw-semibold">Margaretta Worvell </span> Please try resetting your password</p>
                                            <div class="invoice-date"><span><i class="isax isax-calendar5 me-1"></i>17 Jan 2025</span></div>
                                        </li>
                                        <li class="feed-item timeline-item">
                                            <p class="mb-1"><span class="text-dark fw-semibold">Michael Carter </span> I can’t log in; it says incorrect password.</p>
                                            <div class="invoice-date"><span><i class="isax isax-calendar5 me-1"></i>17 Jan 2025</span></div>
                                        </li>
                                    </ul>

                                    <div class="d-flex align-items-center mt-4">
                                        <button class="btn btn-light border d-flex align-items-center justify-content-center w-100">View All</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- row end -->
                </div>
                <!-- card body end -->
            </div>
            <!-- card end -->

            <div class="mb-3">
                <h6>Comments</h6>
            </div>
            <div class="card mb-3">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div class="d-flex align-items-center">
                            <a href="javascript:void(0);"><img src="{{URL::asset('build/img/users/user-03.jpg')}}" class="avatar avatar-lg rounded-circle me-2" alt="img"></a>
                            <div>
                                <h6 class="fs-14 mb-1"><a href="javascript:void(0);">John Carter</a></h6>
                                <p class="fs-13">2 weeks ago</p>
                            </div>
                        </div>
                        <a href="javascript:void(0);" class="btn btn-light btn-sm text-gray-9"><i class="isax isax-repeat me-1"></i> Reply</a>
                    </div>
                    <p>"This platform has made invoicing and expense tracking so much easier for my business. The automation features save me a lot of time, and the reports are very insightful. Highly recommend it to anyone looking for a reliable accounting
                        solution. Great job, team!</p>
                </div>
                <!-- card body end -->
            </div>
            <!-- card end -->
            <div class="card mb-3">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div class="d-flex align-items-center">
                            <a href="javascript:void(0);"><img src="{{URL::asset('build/img/users/user-05.jpg')}}" class="avatar avatar-lg rounded-circle me-2" alt="img"></a>
                            <div>
                                <h6 class="fs-14 mb-1"><a href="javascript:void(0);">Braun Tucker</a></h6>
                                <p class="fs-13">3 weeks ago</p>
                            </div>
                        </div>
                        <a href="javascript:void(0);" class="btn btn-light btn-sm text-gray-9"><i class="isax isax-repeat me-1"></i> Reply</a>
                    </div>
                    <p>"This platform has made invoicing and expense tracking so much easier for my business. The automation features save me a lot of time, and the reports are very insightful. Highly recommend it to anyone looking for a reliable accounting
                        solution. Great job, team!</p>
                </div>
                <!-- card body end -->
            </div>
            <!-- card end -->
            <div class="mb-3">
                <label class="form-label">Leave a Comment</label>
                <textarea class="form-control"></textarea>
            </div>
            <div class="d-flex align-items-center justify-content-end mb-3">
                <a href="javascript:void(0);" class="btn btn-primary">Post a Comment</a>
            </div>
            <!-- Start Footer-->
            <div class="footer d-sm-flex align-items-center justify-content-between bg-white py-2 px-4 border-top">
                <p class="text-dark mb-0">&copy; 2025 <a href="javascript:void(0);" class="link-primary">Kanakku</a>, All Rights Reserved</p>
                <p class="text-dark">Version : 1.3.8</p>
            </div>
            <!-- End Footer-->
        </div>
    </div>

    <!-- ========================
        End Page Content
    ========================= -->
@endsection