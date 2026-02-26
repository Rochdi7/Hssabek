<?php $page = 'cronjob'; ?>
@extends('layout.mainlayout')
@section('content')
    <!-- ========================
        Start Page Content
    ========================= --> 

    <div class="page-wrapper">	
        <div class="content">
            <!-- Start Row -->
            <div class="row">
                <div class="col-lg-12 mx-auto">
                    <div class="row settings-wrapper">
                        
                        @component('components.settings-sidebar')
                        @endcomponent
            
                        <div class="col-xl-9 col-lg-8">
                            <form action="{{('cronjob')}}">
                                <div class="pb-3 border-bottom mb-3">
                                    <h6 class="mb-0">Cronjob</h6>
                                </div>
                                <div class="mb-3">
                                    <div class="row align-items-center mb-3">
                                        <div class="col-md-4">
                                            <p class="text-dark fw-medium">Cronjob Link</p>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" value="https://example.com/cronjob">
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-md-4">
                                            <p class="text-dark fw-medium">Execution Interval</p>
                                        </div>
                                        <div class="col-md-8">
                                            <input class="input-tags form-control" id="inputBox" type="text" data-role="tagsinput" value="1 Day, 1 Hour">
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-between border-top pt-4">
                                    <a href="javascript:void(0);" class="btn btn-outline-white">Cancel</a>
                                    <a href="javascript:void(0);" class="btn btn-primary">Save Changes</a>
                                </div>
                            </form>
                        </div><!-- end col -->
                    </div>
                </div>
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