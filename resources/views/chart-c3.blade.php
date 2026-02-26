<?php $page = 'chart-c3'; ?>
@extends('layout.mainlayout')
@section('content')  
    <!-- ========================
        Start Page Content
    ========================= -->

    <div class="page-wrapper cardhead">
        <div class="content">

            <!-- Page Header Start -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">C3 Chart</h3>
                    </div>
                </div>
            </div>

            <!-- Page Header End -->

            <!-- Start Row -->
            <div class="row">

                <!-- Chart Start -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Bar Chart</div>
                        </div>
                        <div class="card-body">
                            <div id="chart-bar-stacked"></div>
                        </div>
                    </div>
                </div>
                <!-- Chart End -->

                <!-- Chart Start -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Multiple Bar Chart</div>
                        </div>
                        <div class="card-body">
                            <div id="chart-bar"></div>
                        </div>
                    </div>
                </div>
                <!-- Chart End -->

                <!-- Chart Start -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Horizontal Bar Chart</div>
                        </div>
                        <div class="card-body">
                            <div id="chart-bar-rotated"></div>
                        </div>
                    </div>
                </div>
                <!-- Chart End -->

                <!-- Chart Start -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Line Chart</div>
                        </div>
                        <div class="card-body">
                            <div id="chart-sracked"></div>
                        </div>
                    </div>
                </div>
                <!-- Chart End -->

                <!-- Chart Start -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Line Chart</div>
                        </div>
                        <div class="card-body">
                            <div id="chart-spline-rotated"></div>
                        </div>
                    </div>
                </div>
                <!-- Chart End -->

                <!-- Chart Start -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Line Chart</div>
                        </div>
                        <div class="card-body">
                            <div id="chart-area-spline-sracked"></div>
                        </div>
                    </div>
                </div>
                <!-- Chart End -->

                <!-- Chart Start -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Pie Chart</div>
                        </div>
                        <div class="card-body">
                            <div id="chart-pie"></div>
                        </div>
                    </div>
                </div>
                <!-- Chart End -->

                <!-- Chart Start -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Donut Chart</div>
                        </div>
                        <div class="card-body">
                            <div id="chart-donut"></div>
                        </div>
                    </div>
                </div>
                <!-- Chart End -->

            </div>
            <!-- End Row -->
        </div>

        @component('components.footer')
        @endcomponent
    </div>

    <!-- ========================
        End Page Content
    ========================= -->
@endsection