<?php $page = 'form-editors'; ?>
@extends('layout.mainlayout')
@section('content') 
    <!-- ========================
        Start Page Content
    ========================= -->

    <div class="page-wrapper">

        <!-- Start Content -->
        <div class="content">

            <!-- Page Header -->
            <div class="d-flex align-items-sm-center flex-sm-row flex-column gap-2 pb-3">
                <div class="flex-grow-1">
                    <h4 class="fs-18 fw-semibold mb-0">Editors</h4>
                </div>

                <div class="text-end">
                    <ol class="breadcrumb m-0 py-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                        
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                        
                        <li class="breadcrumb-item active">Editors</li>
                    </ol>
                </div>
            </div>
            <!-- End Page Header -->
            

            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Quill Editor</h5>
                </div>

                <div class="card-body">
                    <p class="text-muted">Snow is a clean, flat toolbar theme.</p>

                    <div id="snow-editor" style="height: 300px;">
                        <h3><span class="ql-size-large">Hello World!</span></h3>
                        <p><br></p>
                        <h3>This is an simple editable area.</h3>
                        <p><br></p>
                        <ul>
                            <li>
                                Select a text to reveal the toolbar.
                            </li>
                            <li>
                                Edit rich document on-the-fly, so elastic!
                            </li>
                        </ul>
                        <p><br></p>
                        <p>
                            End of simple area
                        </p>
                    </div><!-- end snow editor-->
                </div> <!-- end card body -->
            </div> <!-- end card -->

            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Quill Bubble Editor</h5>
                </div>

                <div class="card-body">
                    <p class="text-muted">Bubble is a simple tooltip based theme.</p>

                    <div id="bubble-editor" style="height: 300px;">
                        <h3><span class="ql-size-large">Hello World!</span></h3>
                        <p><br></p>
                        <h3>This is an simple editable area.</h3>
                        <p><br></p>
                        <ul>
                            <li>
                                Select a text to reveal the toolbar.
                            </li>
                            <li>
                                Edit rich document on-the-fly, so elastic!
                            </li>
                        </ul>
                        <p><br></p>
                        <p>
                            End of simple area
                        </p>
                    </div> <!-- end snow editor-->
                </div> <!-- end card body -->
            </div> <!-- end card -->

        </div> <!-- End Content -->

        @component('components.footer')
        @endcomponent
    </div>
    
    <!-- ========================
        End Page Content
    ========================= -->
@endsection