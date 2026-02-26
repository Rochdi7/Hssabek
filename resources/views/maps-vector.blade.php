<?php $page = 'maps-vector'; ?>
@extends('layout.mainlayout')
@section('content')
    <!-- ========================
        Start Page Content
    ========================= -->

    <div class="page-wrapper cardhead">

        <!-- Start container -->
        <div class="content">

            <!-- Start Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Vector Maps</h3>
                    </div>
                </div>
            </div>
            <!-- End Page Header -->

            <!-- start row-->
            <div class="row">
                <div class="col-xl-6">
                    <div class="card custom-card">
                        <div class="card-header">
                            <div class="card-title">Basic Vector Map</div>
                        </div> <!-- end card-header -->
                        <div class="card-body">
                            <div id="vector-map"></div>
                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                </div> <!-- end col -->
                <div class="col-xl-6">
                    <div class="card custom-card">
                        <div class="card-header">
                            <div class="card-title">Map With Markers</div>
                        </div> <!-- end card-header -->
                        <div class="card-body">
                            <div id="marker-map"></div>
                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                </div> <!-- end col -->
                <div class="col-xl-6">
                    <div class="card custom-card">
                        <div class="card-header">
                            <div class="card-title">Map With Image Markers</div>
                        </div> <!-- end card-header -->
                        <div class="card-body">
                            <div id="marker-image-map"></div>
                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                </div> <!-- end col -->
                <div class="col-xl-6">
                    <div class="card custom-card">
                        <div class="card-header">
                            <div class="card-title">Map With Lines</div>
                        </div> <!-- end card-header -->
                        <div class="card-body">
                            <div id="lines-map"></div>
                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                </div> <!-- end col -->
                <div class="col-xl-6">
                    <div class="card custom-card">
                        <div class="card-header">
                            <div class="card-title">US Vector Map</div>
                        </div> <!-- end card-header -->
                        <div class="card-body">
                            <div id="us-map"></div>
                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                </div> <!-- end col -->
                <div class="col-xl-6">
                    <div class="card custom-card">
                        <div class="card-header">
                            <div class="card-title">Russia Vector Map</div>
                        </div> <!-- end card-header -->
                        <div class="card-body">
                            <div id="russia-map"></div>
                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                </div> <!-- end col -->
                <div class="col-xl-6">
                    <div class="card custom-card">
                        <div class="card-header">
                            <div class="card-title">Spain Vector Map</div>
                        </div> <!-- end card-header -->
                        <div class="card-body">
                            <div id="spain-map"></div>
                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                </div> <!-- end col -->
                <div class="col-xl-6">
                    <div class="card custom-card">
                        <div class="card-header">
                            <div class="card-title">Canada Vector Map</div>
                        </div> <!-- end card-header -->
                        <div class="card-body">
                            <div id="canada-map"></div>
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