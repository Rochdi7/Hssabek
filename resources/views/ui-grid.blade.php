<?php $page = 'ui-grid'; ?>
@extends('layout.mainlayout')
@section('content')
    <!-- ========================
        Start Page Content
    ========================= -->

    <div class="page-wrapper">

        <!-- Start Content -->
        <div class="content">

            <!-- Start Page Header -->
            <div class="d-flex align-items-sm-center flex-sm-row flex-column gap-2 pb-3">
                <div class="flex-grow-1">
                    <h4 class="fs-18 fw-semibold mb-0">Grid System</h4>
                </div>

                <div class="text-end">
                    <ol class="breadcrumb m-0 py-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                        
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Base UI</a></li>
                        
                        <li class="breadcrumb-item active">Grid System</li>
                    </ol>
                </div>
            </div>
            <!-- End Page Header -->

            <!-- start row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Grid Options</h5>
                        </div>
                        <div class="card-body">
                            <p class="text-muted">
                                See how aspects of the Bootstrap grid system work across multiple devices with a handy table.
                            </p>

                            <div class="table-responsive">
                                <table class="table table-nowrap table-bordered table-striped mb-0">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th class="text-center">
                                                Extra small<br>
                                                <small>&lt;576px</small>
                                            </th>
                                            <th class="text-center">
                                                Small<br>
                                                <small>≥576px</small>
                                            </th>
                                            <th class="text-center">
                                                Medium<br>
                                                <small>≥768px</small>
                                            </th>
                                            <th class="text-center">
                                                Large<br>
                                                <small>≥992px</small>
                                            </th>
                                            <th class="text-center">
                                                Extra Large<br>
                                                <small>≥1200px</small>
                                            </th>
                                            <th class="text-center">
                                                Extra Large<br>
                                                <small>≥1400px</small>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th class="text-nowrap" scope="row">Container <code class="fw-normal">max-width</code></th>
                                            <td>None (auto)</td>
                                            <td>540px</td>
                                            <td>720px</td>
                                            <td>960px</td>
                                            <td>1140px</td>
                                            <td>1320px</td>
                                        </tr>
                                        <tr>
                                            <th class="text-nowrap" scope="row">Class prefix</th>
                                            <td><code>.col-</code></td>
                                            <td><code>.col-sm-</code></td>
                                            <td><code>.col-md-</code></td>
                                            <td><code>.col-lg-</code></td>
                                            <td><code>.col-xl-</code></td>
                                            <td><code>.col-xxl-</code></td>
                                        </tr>
                                        <tr>
                                            <th class="text-nowrap" scope="row"># of columns</th>
                                            <td colspan="6">12</td>
                                        </tr>
                                        <tr>
                                            <th class="text-nowrap" scope="row">Gutter width</th>
                                            <td colspan="6">2rem (1rem on left and right)</td>
                                        </tr>
                                        <tr>
                                            <th class="text-nowrap" scope="row">Custom gutters</th>
                                            <td colspan="6">Yes</td>
                                        </tr>
                                        <tr>
                                            <th class="text-nowrap" scope="row">Nestable</th>
                                            <td colspan="6">Yes</td>
                                        </tr>
                                        <tr>
                                            <th class="text-nowrap" scope="row">Column ordering</th>
                                            <td colspan="6">Yes</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div> <!-- end table responsive -->

                        </div> <!-- end card body -->
                    </div> <!-- end card -->
                </div> <!-- end col -->
            </div>
            <!-- end row -->

            <!-- start row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Grid Example</h5>
                        </div>
                        <div class="card-body">
                            <p class="text-muted">You may use predefined grid classes. Using
                                <code>.col-lg-* </code>you can set the grid system.
                            </p>

                            <div class="grid-structure">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="grid-container">
                                            col-lg-12
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-11">
                                        <div class="grid-container">
                                            col-lg-11
                                        </div>
                                    </div>
                                    <div class="col-lg-1">
                                        <div class="grid-container">
                                            col-lg-1
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-10">
                                        <div class="grid-container">
                                            col-lg-10
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="grid-container">
                                            col-lg-2
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-9">
                                        <div class="grid-container">
                                            col-lg-9
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="grid-container">
                                            col-lg-3
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="grid-container">
                                            col-lg-8
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="grid-container">
                                            col-lg-4
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-7">
                                        <div class="grid-container">
                                            col-lg-7
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="grid-container">
                                            col-lg-5
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="grid-container">
                                            col-lg-6
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="grid-container">
                                            col-lg-6
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-5">
                                        <div class="grid-container">
                                            col-lg-5
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="grid-container">
                                            col-lg-7
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="grid-container">
                                            col-lg-4
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="grid-container">
                                            col-lg-8
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="grid-container">
                                            col-lg-3
                                        </div>
                                    </div>
                                    <div class="col-lg-9">
                                        <div class="grid-container">
                                            col-lg-9
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-2">
                                        <div class="grid-container">
                                            col-lg-2
                                        </div>
                                    </div>
                                    <div class="col-lg-10">
                                        <div class="grid-container">
                                            col-lg-10
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-1">
                                        <div class="grid-container">
                                            col-lg-1
                                        </div>
                                    </div>
                                    <div class="col-lg-11">
                                        <div class="grid-container">
                                            col-lg-11
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-2">
                                        <div class="grid-container">
                                            col-lg-2
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="grid-container">
                                            col-lg-3
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="grid-container">
                                            col-lg-4
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="grid-container">
                                            col-lg-2
                                        </div>
                                    </div>
                                    <div class="col-lg-1">
                                        <div class="grid-container">
                                            col-lg-1
                                        </div>
                                    </div>
                                </div> <!-- end row -->
                            </div> <!-- grid structure -->

                        </div> <!-- end card body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->
            </div>
            <!-- end row-->

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
