<?php $page = 'ui-counter'; ?>
@extends('layout.mainlayout')
@section('content')
    <!-- ========================
        Start Page Content
    ========================= -->

    <div class="page-wrapper cardhead">

        <!-- Start Content -->
        <div class="content">

            <!-- Start Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Counter</h3>
                    </div>
                </div>
            </div>
            <!-- End Page Header -->

            <!-- start row -->
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5>Clients</h5>
                            <h6 class="counter">3,000</h6>
                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                </div> <!-- end col -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5>Total Sales</h5>
                            <h6 class="counter">10,000</h6>
                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                </div> <!-- end col -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5>Total Projects</h5>
                            <h6 class="counter">15,000</h6>
                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                </div> <!-- end col -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Count Down</h5>
                        </div> <!-- end card-header -->
                        <div class="card-body">
                            <h6>Time Count from 3</h6>
                            <span id="timer-countdown"></span>
                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                </div> <!-- end col -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Count Up</h5>
                        </div> <!-- end card-header -->
                        <div class="card-body">
                            <h6>Time Counting From 0</h6>
                            <span id="timer-countup"></span>
                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                </div> <!-- end col -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Count Inbetween</h5>
                        </div> <!-- end card-header -->
                        <div class="card-body">
                            <h6>Time counting from 30 to 20</h6>
                            <span id="timer-countinbetween"></span>
                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                </div> <!-- end col -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Count Callback</h5>
                        </div> <!-- end card-header -->
                        <div class="card-body">
                            <h6>Count from 10 to 0 and calls timer end callback</h6>
                            <span id="timer-countercallback"></span>
                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                </div> <!-- end col -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Custom Output</h5>
                        </div> <!-- end card-header -->
                        <div class="card-body">
                            <h6>Changed output pattern</h6>
                            <span id="timer-outputpattern"></span>
                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                </div> <!-- end col -->
            </div>
            <!-- end row -->

        </div>
        <!-- End container -->
        
        <!-- Start Footer -->
        <div class="footer d-sm-flex align-items-center justify-content-between bg-white py-2 px-4 border-top">
            <p class="text-dark mb-0">&copy; <script>document.write(new Date().getFullYear())</script> <a href="javascript:void(0);" class="link-primary">Kanakku</a>, All Rights Reserved</p>
            <p class="text-dark">Version : 1.3.8</p>
        </div>
        <!-- End Footer -->		

    </div>
    <!-- ========================
        End Page Content
    ========================= -->
@endsection
