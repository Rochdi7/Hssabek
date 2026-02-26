<?php $page = 'notifications-settings'; ?>
@extends('layout.mainlayout')
@section('content')
    <!-- ========================
        Start Page Content
    ========================= -->

    <div class="page-wrapper">
        <div class="content">
            <!-- start row  -->
            <div class="row justify-content-center mb-3">
                <div class="col-lg-12">
                    <!-- start row  -->
                    <div class="row settings-wrapper d-flex">
                        <!-- Start settings sidebar -->
                        @component('components.settings-sidebar')
                        @endcomponent                        
                        <!-- End settings sidebar -->

                        <div class="col-xl-9 col-lg-8">
                            <div class="mb-3 pb-3 border-bottom">
                                <h6 class="fw-bold mb-0">Notifications</h6>
                            </div>
                            <form action="{{url('notifications-settings')}}">
                                <div class="border-bottom mb-3 pb-2">
                                    <div class="card-title-head d-flex align-items-center justify-content-between">
                                        <h6 class="fs-16 fw-semibold mb-3 d-flex align-items-center">
                                            <span class="fs-16 me-2 p-1 rounded bg-dark text-white d-inline-flex align-items-center justify-content-center"><i class="isax isax-notification"></i></span> 
                                            General Notifications
                                        </h6>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" checked>
                                        </div>
                                    </div>
                                    <div class="mb-0">
                                        <div class="table-responsive table-nowrap notification-table">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th class="fs-14">Modules </th>
                                                        <th class="fs-14">Email</th>
                                                        <th class="fs-14">SMS</th>
                                                        <th class="fs-14">In App</th>
                                                        <th class="fs-14">Whatsapp</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <h6 class="fs-13 fw-medium mb-1">System Updates</h6>
                                                            <p class="fs-12">Get alerts for software updates and maintenance.</p>
                                                        </td>
                                                        <td class="text-center">
                                                            <input class="form-check-input" type="checkbox" checked>
                                                        </td>
                                                        <td class="text-center">
                                                            <input class="form-check-input" type="checkbox">
                                                        </td>
                                                        <td class="text-center">
                                                            <input class="form-check-input" type="checkbox">
                                                        </td>
                                                        <td class="text-center">
                                                            <input class="form-check-input" type="checkbox">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <h6 class="fs-13 fw-medium mb-1">Security Alerts</h6>
                                                            <p class="fs-12">Notify about login attempts, password changes.</p>
                                                        </td>
                                                        <td class="text-center">
                                                            <input class="form-check-input" type="checkbox" checked>
                                                        </td>
                                                        <td class="text-center">
                                                            <input class="form-check-input" type="checkbox" checked>
                                                        </td>
                                                        <td class="text-center">
                                                            <input class="form-check-input" type="checkbox" checked>
                                                        </td>
                                                        <td class="text-center">
                                                            <input class="form-check-input" type="checkbox" checked>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="border-bottom mb-3 pb-2">
                                    <div class="card-title-head d-flex align-items-center justify-content-between">
                                        <h6 class="fs-16 fw-semibold mb-3 d-flex align-items-center">
                                            <span class="fs-16 me-2 p-1 rounded bg-dark text-white d-inline-flex align-items-center justify-content-center"><i class="isax isax-shopping-cart"></i></span> 
                                            Sales Notifications
                                        </h6>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" checked>
                                        </div>
                                    </div>
                                    <div class="table-responsive table-nowrap mb-0 notification-table">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th class="fs-14">Modules </th>
                                                    <th class="fs-14">Email</th>
                                                    <th class="fs-14">SMS</th>
                                                    <th class="fs-14">In App</th>
                                                    <th class="fs-14">Whatsapp</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <h6 class="fs-13 fw-medium mb-1">New Sale Recorded</h6>
                                                        <p class="fs-12">Get notified when a sale is made.</p>
                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input" type="checkbox" checked>
                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input" type="checkbox" checked>
                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input" type="checkbox" checked>
                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input" type="checkbox" checked>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6 class="fs-13 fw-medium mb-1">Pending Payments</h6>
                                                        <p class="fs-12">Alerts for overdue invoices.</p>
                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input" type="checkbox" checked>
                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input" type="checkbox" checked>
                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input" type="checkbox" checked>
                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input" type="checkbox" checked>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6 class="fs-13 fw-medium mb-1">Transactions</h6>
                                                        <p class="fs-12">Confirmation when a payment is received.</p>
                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input" type="checkbox" checked>
                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input" type="checkbox" checked>
                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input" type="checkbox" checked>
                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input" type="checkbox" checked>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="border-bottom mb-3 pb-2">
                                    <div class="card-title-head d-flex align-items-center justify-content-between">
                                        <h6 class="fs-16 fw-semibold mb-3 d-flex align-items-center">
                                            <span class="fs-16 me-2 p-1 rounded bg-dark text-white d-inline-flex align-items-center justify-content-center"><i class="isax isax-notification-status"></i></span> 
                                            Invoice Notifications
                                        </h6>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" checked>
                                        </div>
                                    </div>
                                    <div class="table-responsive table-nowrap mb-0 notification-table">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th class="fs-14">Modules </th>
                                                    <th class="fs-14">Email</th>
                                                    <th class="fs-14">SMS</th>
                                                    <th class="fs-14">In App</th>
                                                    <th class="fs-14">Whatsapp</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <h6 class="fs-13 fw-medium mb-1">New Invoice Created</h6>
                                                        <p class="fs-12">Alert when a new invoice is generated.</p>
                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input" type="checkbox" checked>
                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input" type="checkbox" checked>
                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input" type="checkbox" checked>
                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input" type="checkbox" checked>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6 class="fs-13 fw-medium mb-1">Invoice Due Reminder</h6>
                                                        <p class="fs-12">Notification before the invoice due date</p>
                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input" type="checkbox" checked>
                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input" type="checkbox" checked>
                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input" type="checkbox" checked>
                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input" type="checkbox" checked>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="border-bottom mb-3 pb-2">
                                    <div class="card-title-head d-flex align-items-center justify-content-between">
                                        <h6 class="fs-16 fw-semibold mb-3 d-flex align-items-center">
                                            <span class="fs-16 me-2 p-1 rounded bg-dark text-white d-inline-flex align-items-center justify-content-center"><i class="isax isax-user-tag"></i></span> 
                                            User Management
                                        </h6>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" checked>
                                        </div>
                                    </div>
                                    <div class="table-responsive table-nowrap mb-0 notification-table">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th class="fs-14">Modules </th>
                                                    <th class="fs-14">Email</th>
                                                    <th class="fs-14">SMS</th>
                                                    <th class="fs-14">In App</th>
                                                    <th class="fs-14">Whatsapp</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <h6 class="fs-13 fw-medium mb-1">New User Added</h6>
                                                        <p class="fs-12">Notify when a new user is registered.</p>
                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input" type="checkbox" checked>
                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input" type="checkbox" checked>
                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input" type="checkbox" checked>
                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input" type="checkbox" checked>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6 class="fs-13 fw-medium mb-1">User Feedback</h6>
                                                        <p class="fs-12">Alerts for received feedback or reviews.</p>
                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input" type="checkbox" checked>
                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input" type="checkbox" checked>
                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input" type="checkbox" checked>
                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input" type="checkbox" checked>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6 class="fs-13 fw-medium mb-1">Role & Permission Changes</h6>
                                                        <p class="fs-12">Notify when user roles are updated</p>
                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input" type="checkbox" checked>
                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input" type="checkbox" checked>
                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input" type="checkbox" checked>
                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input" type="checkbox" checked>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6 class="fs-13 fw-medium mb-1">Direct Messages & Mentions</h6>
                                                        <p class="fs-12">Get alerts when you are tagged or messaged.</p>
                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input" type="checkbox" checked>
                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input" type="checkbox" checked>
                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input" type="checkbox" checked>
                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input" type="checkbox" checked>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-between settings-bottom-btn mt-0">
                                    <button type="button" class="btn btn-outline-white me-2">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </div>
                            </form>
                        </div>
                        <!-- end col  -->
                    </div>
                </div>
                <!-- end col  -->
            </div>
            <!-- end row  -->

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