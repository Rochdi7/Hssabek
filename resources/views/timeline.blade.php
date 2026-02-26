<?php $page = 'timeline'; ?>
@extends('layout.mainlayout')
@section('content')
    <!-- ========================
        Start Page Content
    ========================= -->

    <div class="page-wrapper">
        <div class="content content-two">
            <!-- row start -->
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="mb-3 border-bottom pb-3">
                        <h6 class="mb-0">Timeline</h6>
                    </div>
                    <div class="card mb-0">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <p class="text-dark me-4 mb-0 timeline-date flex-shrink-0">07 Apr 2025</p>
                                <div class="border-start ps-4 py-4 border-circle position-relative">
                                    <p class="text-dark fw-semibold mb-1">Invoice Marked as Paid</p>
                                    <p>Status updated to Paid</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <p class="text-dark me-4 mb-0 timeline-date flex-shrink-0">07 Apr 2025</p>
                                <div class="border-start ps-4 py-4 border-circle position-relative">
                                    <p class="text-dark fw-semibold mb-1">Payment Received</p>
                                    <p>Payment received for Invoice #INV-1025</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <p class="text-dark me-4 mb-0 timeline-date flex-shrink-0">03 Apr 2025</p>
                                <div class="border-start ps-4 py-4 border-circle position-relative">
                                    <p class="text-dark fw-semibold mb-1">Invoice Sent to Client</p>
                                    <p>Invoice #INV-1025 emailed to billing@abccorp.com</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <p class="text-dark me-4 mb-0 timeline-date flex-shrink-0">02 Apr 2025</p>
                                <div class="border-start ps-4 py-4 border-circle position-relative">
                                    <p class="text-dark fw-semibold mb-1">Invoice Approved</p>
                                    <p>Invoice #INV-1025 approved for processing</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <p class="text-dark me-4 mb-0 timeline-date flex-shrink-0">01 Apr 2025</p>
                                <div class="border-start ps-4 py-4 border-circle position-relative">
                                    <p class="text-dark fw-semibold mb-1">Invoice Created</p>
                                    <p>Invoice #INV-1025 was generated for Client: ABC Corp.</p>
                                </div>
                            </div>
                        </div>
                        <!-- card body end -->
                    </div>
                    <!-- card end -->
                </div>
            </div>
            <!-- row end -->
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