<?php $page = 'maps-leaflet'; ?>
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
                        <h3 class="page-title">Leaflet Maps</h3>
                    </div>
                </div>
            </div>
            <!-- End Page Header -->

            <!-- start row-->
            <div class="row">
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Leaflet Map</div>
                        </div> <!-- end card-header -->
                        <div class="card-body">
                            <div id="map"></div>
                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                </div> <!-- end col -->
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Map With Markers,circles and Polygons</div>
                        </div> <!-- end card-header -->
                        <div class="card-body">
                            <div id="map1"></div>
                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                </div> <!-- end col -->
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Map With Popup</div>
                        </div> <!-- end card-header -->
                        <div class="card-body">
                            <div id="map-popup"></div>
                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                </div> <!-- end col -->
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Map With Custom Icon</div>
                        </div> <!-- end card-header -->
                        <div class="card-body">
                            <div id="map-custom-icon"></div>
                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                </div> <!-- end col -->
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Interactive Choropleth Map</div>
                        </div> <!-- end card-header -->
                        <div class="card-body">
                            <div id="interactive-map"></div>
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