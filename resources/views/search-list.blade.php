<?php $page = 'search-list'; ?>
@extends('layout.mainlayout')
@section('content')
    <!-- ========================
        Start Page Content
    ========================= -->

    <div class="page-wrapper">

        <!-- Start Content -->
        <div class="content">
            <div class="card">
                <div class="card-body">
                    <form action="{{url('search-list')}}">
                        <div class="d-flex align-items-center">
                            <input type="text" class="form-control flex-fill me-3" value="Kanakku">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                    </form>
                </div><!-- end card body -->
            </div><!-- end card -->
            <div class="card">
                <div class="card-body">
                    <h6 class="mb-3 text-capitalize">Search result for "Kanakku"</h6>
                    <!-- start row -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card shadow-none">
                                <div class="card-body">
                                    <a href="#" class="text-info text-truncate mb-2 text-wrap">https://themeforest.net/search/kanakku</a>
                                    <p class="text-truncate line-clamb-2 mb-2">Kanakku - Html, Vue 3, Angular 17+, React & Node HR Project Management & CRM Admin Dashboard Template</p>
                                    <div class="d-flex align-items-center flex-wrap row-gap-2">
                                        <span class="text-gray-9 me-3 pe-3 border-end">1.7K Sales</span>
                                        <div class="text-gray-9 d-flex align-items-center me-3 pe-3 border-end">
                                            <i class="ti ti-star-filled text-warning me-1"></i>
                                            <i class="ti ti-star-filled text-warning me-1"></i>
                                            <i class="ti ti-star-filled text-warning me-1"></i>
                                            <i class="ti ti-star-filled text-warning me-1"></i>
                                            <i class="ti ti-star-filled text-gray-2 me-1"></i>
                                            (45)
                                        </div>
                                        <span class="text-gray-9">$35</span>
                                    </div>
                                </div><!-- end card body -->    
                            </div><!-- end card -->    
                        </div><!-- end col -->
                    </div>
                    <!-- end row -->
                    <h6 class="mb-3">Images</h6>
                    <!-- start row -->
                    <div class="row g-3">
                        <div class="col-xl-2 col-md-4 col-6">
                            <a href="{{URL::asset('build/img/media/media-15.jpg')}}" data-fancybox="gallery" class="gallery-item">
                                <img src="{{URL::asset('build/img/media/media-15.jpg')}}" class="rounded" alt="img">
                            </a>
                        </div><!-- end col -->
                        <div class="col-xl-2 col-md-4 col-6">
                            <a href="{{URL::asset('build/img/media/media-16.jpg')}}" data-fancybox="gallery" class="gallery-item">
                                <img src="{{URL::asset('build/img/media/media-16.jpg')}}" class="rounded" alt="img">
                            </a>
                        </div><!-- end col -->
                        <div class="col-xl-2 col-md-4 col-6">
                            <a href="{{URL::asset('build/img/media/media-17.jpg')}}" data-fancybox="gallery" class="gallery-item">
                                <img src="{{URL::asset('build/img/media/media-17.jpg')}}" class="rounded" alt="img">
                            </a>
                        </div><!-- end col -->
                        <div class="col-xl-2 col-md-4 col-6">
                            <a href="{{URL::asset('build/img/media/media-18.jpg')}}" data-fancybox="gallery" class="gallery-item">
                                <img src="{{URL::asset('build/img/media/media-18.jpg')}}" class="rounded" alt="img">
                            </a>
                        </div><!-- end col -->
                        <div class="col-xl-2 col-md-4 col-6">
                            <a href="{{URL::asset('build/img/media/media-19.jpg')}}" data-fancybox="gallery" class="gallery-item">
                                <img src="{{URL::asset('build/img/media/media-19.jpg')}}" class="rounded" alt="img">
                            </a>
                        </div><!-- end col -->
                        <div class="col-xl-2 col-md-4 col-6">
                            <a href="{{URL::asset('build/img/media/media-20.jpg')}}" data-fancybox="gallery" class="gallery-item">
                                <img src="{{URL::asset('build/img/media/media-20.jpg')}}" class="rounded" alt="img">
                            </a>
                        </div><!-- end col -->
                        <div class="col-xl-2 col-md-4 col-6">
                            <a href="{{URL::asset('build/img/media/media-21.jpg')}}" data-fancybox="gallery" class="gallery-item">
                                <img src="{{URL::asset('build/img/media/media-21.jpg')}}" class="rounded" alt="img">
                            </a>
                        </div><!-- end col -->
                        <div class="col-xl-2 col-md-4 col-6">
                            <a href="{{URL::asset('build/img/media/media-22.jpg')}}" data-fancybox="gallery" class="gallery-item">
                                <img src="{{URL::asset('build/img/media/media-22.jpg')}}" class="rounded" alt="img">
                            </a>
                        </div><!-- end col -->
                        <div class="col-xl-2 col-md-4 col-6">
                            <a href="{{URL::asset('build/img/media/media-23.jpg')}}" data-fancybox="gallery" class="gallery-item">
                                <img src="{{URL::asset('build/img/media/media-23.jpg')}}" class="rounded" alt="img">
                            </a>
                        </div><!-- end col -->
                        <div class="col-xl-2 col-md-4 col-6">
                            <a href="{{URL::asset('build/img/media/media-24.jpg')}}" data-fancybox="gallery" class="gallery-item">
                                <img src="{{URL::asset('build/img/media/media-24.jpg')}}" class="rounded" alt="img">
                            </a>
                        </div><!-- end col -->
                        <div class="col-xl-2 col-md-4 col-6">
                            <a href="{{URL::asset('build/img/media/media-25.jpg')}}" data-fancybox="gallery" class="gallery-item">
                                <img src="{{URL::asset('build/img/media/media-25.jpg')}}" class="rounded" alt="img">
                            </a>
                        </div><!-- end col -->
                        <div class="col-xl-2 col-md-4 col-6">
                            <a href="{{URL::asset('build/img/media/media-26.jpg')}}" data-fancybox="gallery" class="gallery-item">
                                <img src="{{URL::asset('build/img/media/media-26.jpg')}}" class="rounded" alt="img">
                            </a>
                        </div><!-- end col -->
                    </div>
                    <!-- end row -->
                </div><!-- end card body -->
            </div><!-- end card -->       
        </div>
        <!-- End Content -->

        <!-- Start Footer -->
        <div class="footer d-sm-flex align-items-center justify-content-between bg-white py-2 px-4 border-top">
            <p class="text-dark mb-0">&copy; 2025 <a href="javascript:void(0);" class="link-primary">Kanakku</a>, All Rights Reserved</p>
            <p class="text-dark">Version : 1.3.8</p>
        </div>
        <!-- End Footer -->
    </div>
    
    <!-- ========================
        End Page Content
    ========================= -->
@endsection