<?php $page = 'ui-sortable'; ?>
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
                        <h3 class="page-title">Sortable JS</h3>
                    </div>
                </div>
            </div>
            <!-- End Page Header -->

            <!-- Start::row-1 -->
            <div class="row">
                <div class="col-xl-4">
                    <div class="card custom-card">
                        <div class="card-header">
                            <div class="card-title">
                                SIMPLE LIST
                            </div>
                        </div> <!-- end card-header -->
                        <div class="card-body">
                            <ol class="list-group sortable-list list-group-numbered" id="simple-list">
                                <li class="list-group-item">Design logo for fictional company</li>
                                <li class="list-group-item">Draft 300-word blog post</li>
                                <li class="list-group-item">Create project plan with milestones</li>
                                <li class="list-group-item">Develop sample interview questions</li>
                                <li class="list-group-item">Generate customer feedback for product.</li>
                                <li class="list-group-item">Write email template for newsletter.</li>
                            </ol>
                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                </div> <!-- end col -->
                <div class="col-xl-8">
                    <div class="card custom-card">
                        <div class="card-header">
                            <div class="card-title">SHARED LISTS</div>
                        </div> <!-- end card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-6">
                                    <ol class="list-group sortable-list list-group-numbered" id="shared-left">
                                        <li class="list-group-item">Sketch a website homepage</li>
                                        <li class="list-group-item">Plan team-building activity.</li>
                                        <li class="list-group-item">Summarize meeting minutes.</li>
                                        <li class="list-group-item">Code a simple webpage.</li>
                                        <li class="list-group-item">Create survey questions.</li>
                                        <li class="list-group-item">Schedule team meeting.</li>
                                    </ol>
                                </div> <!-- end col -->
                                <div class="col-xl-6">
                                    <ol class="list-group sortable-list list-group-numbered" id="shared-right">
                                        <li class="list-group-item">Edit product description.</li>
                                        <li class="list-group-item">Brainstorm marketing ideas.</li>
                                        <li class="list-group-item">Write slogan for brand.</li>
                                        <li class="list-group-item">Update contact information.</li>
                                        <li class="list-group-item">Proofread blog post.</li>
                                        <li class="list-group-item">Analyze sales data.</li>
                                    </ol>
                                </div> <!-- end col -->
                            </div> <!-- end row -->
                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                </div> <!-- end col -->
            </div>
            <!--End::row-1 -->

            <!-- Start:: row-2 -->
            <div class="row">
                <div class="col-xl-6">
                    <div class="card custom-card">
                        <div class="card-header">
                            <div class="card-title">
                                CLONING
                            </div>
                        </div> <!-- end card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-6">
                                    <ul class="list-group sortable-list" id="cloning-left">
                                        <li class="list-group-item">Update social media profiles.</li>
                                        <li class="list-group-item">Draft project budget.</li>
                                        <li class="list-group-item">Brainstorm domain names.</li>
                                        <li class="list-group-item">Revise resume content.</li>
                                        <li class="list-group-item">Test website functionality.</li>
                                        <li class="list-group-item">Edit meeting agenda.</li>
                                    </ul>
                                </div> <!-- end col -->
                                <div class="col-xl-6">
                                    <ul class="list-group sortable-list" id="cloning-right">
                                        <li class="list-group-item">Create mood board.</li>
                                        <li class="list-group-item">Design event flyer.</li>
                                        <li class="list-group-item">Research industry trends.</li>
                                        <li class="list-group-item">Format spreadsheet cells.</li>
                                        <li class="list-group-item">Outline marketing strategy.</li>
                                        <li class="list-group-item">Compile data report.</li>
                                    </ul>
                                </div> <!-- end col -->
                            </div> <!-- end row -->
                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                </div> <!-- end col -->
                <div class="col-xl-6">
                    <div class="card custom-card">
                        <div class="card-header">
                            <div class="card-title">
                                DISABLING SORTING
                            </div>
                        </div> <!-- end card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-6">
                                    <ul class="list-group sortable-list" id="disabling-sorting-left">
                                        <li class="list-group-item">Write customer service script.</li>
                                        <li class="list-group-item">Schedule team training.</li>
                                        <li class="list-group-item">Edit presentation slides.</li>
                                        <li class="list-group-item">Generate weekly schedule.</li>
                                        <li class="list-group-item">Review expense reports.</li>
                                        <li class="list-group-item">Create product catalog.</li>
                                    </ul>
                                </div> <!-- end col -->
                                <div class="col-xl-6">
                                    <ul class="list-group sortable-list" id="disabling-sorting-right">
                                        <li class="list-group-item">Brainstorm blog topics.</li>
                                        <li class="list-group-item">Draft press release.</li>
                                        <li class="list-group-item">Update employee handbook.</li>
                                        <li class="list-group-item">Design event tickets.</li>
                                        <li class="list-group-item">Summarize research findings.</li>
                                        <li class="list-group-item">Plan office layout.</li>
                                    </ul>
                                </div> <!-- end col -->
                            </div> <!-- end row -->
                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                </div> <!-- end col -->
            </div>
            <!-- End:: row-2 -->

            <!-- Start:: row-3 -->
            <div class="row">
                <div class="col-xl-6">
                    <div class="card custom-card">
                        <div class="card-header">
                            <div class="card-title">
                                SORTING WITH HANDLE
                            </div>
                        </div> <!-- end card-header -->
                        <div class="card-body">
                            <ol class="list-group sortable-list list-item-numbered" id="sorting-with-handle">
                                <li class="list-group-item"><i class="fas fa-arrows-alt me-2 text-dark fs-16 handle lh-1"></i>Analyze market trends.</li>
                                <li class="list-group-item"><i class="fas fa-arrows-alt me-2 text-dark fs-16 handle lh-1"></i>Edit video content.</li>
                                <li class="list-group-item"><i class="fas fa-arrows-alt me-2 text-dark fs-16 handle lh-1"></i>Plan social media calendar.</li>
                                <li class="list-group-item"><i class="fas fa-arrows-alt me-2 text-dark fs-16 handle lh-1"></i>Update company policies.</li>
                                <li class="list-group-item"><i class="fas fa-arrows-alt me-2 text-dark fs-16 handle lh-1"></i>Compile sales reports.</li>
                                <li class="list-group-item"><i class="fas fa-arrows-alt me-2 text-dark fs-16 handle lh-1"></i>Schedule client calls.</li>
                            </ol>
                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                </div> <!-- end col -->
                <div class="col-xl-6">
                    <div class="card custom-card">
                        <div class="card-header">
                            <div class="card-title">
                                SORTING WITH FILTER
                            </div>
                        </div> <!-- end card-header -->
                        <div class="card-body">
                            <ul class="list-group sortable-list" id="sorting-with-filter">
                                <li class="list-group-item">Analyze market trends.</li>
                                <li class="list-group-item">Edit video content.</li>
                                <li class="list-group-item">Plan social media calendar.</li>
                                <li class="list-group-item filtered">Update company policies.</li>
                                <li class="list-group-item">Compile sales reports.</li>
                                <li class="list-group-item">Schedule client calls.</li>
                            </ul>
                        </div> <!-- end car-body -->
                    </div> <!-- end card -->
                </div> <!-- end col -->
            </div>
            <!-- End:: row-3 -->

            <!-- Start:: row-4 -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card custom-card">
                        <div class="card-header">
                            <div class="card-title">
                                SORTABLE GRID
                            </div>
                        </div> <!-- end card-header -->
                        <div class="card-body pb-1" id="sortable-grid">
                            <div class="grid-square">
                                <span class="fw-medium">Item-1</span>
                            </div>
                            <div class="grid-square">
                                <span class="fw-medium">Item-2</span>
                            </div>
                            <div class="grid-square">
                                <span class="fw-medium">Item-3</span>
                            </div>
                            <div class="grid-square">
                                <span class="fw-medium">Item-4</span>
                            </div>
                            <div class="grid-square">
                                <span class="fw-medium">Item-5</span>
                            </div>
                            <div class="grid-square">
                                <span class="fw-medium">Item-6</span>
                            </div>
                            <div class="grid-square">
                                <span class="fw-medium">Item-7</span>
                            </div>
                            <div class="grid-square">
                                <span class="fw-medium">Item-8</span>
                            </div>
                            <div class="grid-square">
                                <span class="fw-medium">Item-9</span>
                            </div>
                            <div class="grid-square">
                                <span class="fw-medium">Item-10</span>
                            </div>
                            <div class="grid-square">
                                <span class="fw-medium">Item-11</span>
                            </div>
                            <div class="grid-square">
                                <span class="fw-medium">Item-12</span>
                            </div>
                            <div class="grid-square">
                                <span class="fw-medium">Item-13</span>
                            </div>
                            <div class="grid-square">
                                <span class="fw-medium">Item-14</span>
                            </div>
                            <div class="grid-square">
                                <span class="fw-medium">Item-15</span>
                            </div>
                            <div class="grid-square">
                                <span class="fw-medium">Item-16</span>
                            </div>
                            <div class="grid-square">
                                <span class="fw-medium">Item-17</span>
                            </div>
                            <div class="grid-square">
                                <span class="fw-medium">Item-18</span>
                            </div>
                            <div class="grid-square">
                                <span class="fw-medium">Item-19</span>
                            </div>
                            <div class="grid-square">
                                <span class="fw-medium">Item-20</span>
                            </div>
                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                </div> <!-- end col -->
            </div>
            <!-- End:: row-4 -->

            <!-- Start:: row-5 -->
            <div class="row">
                <div class="col-xl-6">
                    <div class="card custom-card">
                        <div class="card-header">
                            <div class="card-title">
                                NESTED SORTABLE
                            </div>
                        </div> <!-- end card-header -->
                        <div class="card-body">
                            <div id="nestedSortables" class="list-group col nested-sortable">
                                <div class="list-group-item nested-1">Item 1.1
                                    <div class="list-group nested-sortable">
                                        <div class="list-group-item nested-2">Item 2.1</div>
                                        <div class="list-group-item nested-2">Item 2.2
                                            <div class="list-group nested-sortable">
                                                <div class="list-group-item nested-3" draggable="false">Item 3.3</div>
                                                <div class="list-group-item nested-3">Item 3.1</div>
                                                <div class="list-group-item nested-3">Item 3.2</div>

                                                <div class="list-group-item nested-3">Item 3.4</div>
                                            </div>
                                        </div>
                                        <div class="list-group-item nested-2">Item 2.3</div>
                                        <div class="list-group-item nested-2">Item 2.4</div>
                                    </div>
                                </div>
                                <div class="list-group-item nested-1">Item 1.2</div>
                                <div class="list-group-item nested-1">Item 1.3</div>
                                <div class="list-group-item nested-1">Item 1.4
                                    <div class="list-group nested-sortable">
                                        <div class="list-group-item nested-2" draggable="false">Item 2.4</div>
                                        <div class="list-group-item nested-2">Item 2.1</div>
                                        <div class="list-group-item nested-2">Item 2.2</div>
                                        <div class="list-group-item nested-2">Item 2.3</div>
                                    </div>
                                </div>
                                <div class="list-group-item nested-1">Item 1.5</div>
                            </div>
                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                </div> <!-- end col -->
                <div class="col-xl-6">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card custom-card">
                                <div class="card-header">
                                    <div class="card-title">
                                        MULTIPLE DRAG
                                    </div>
                                </div> <!-- end card-header -->
                                <div class="card-body">
                                    <ul class="list-group sortable-list" id="multiple-drag">
                                        <li class="list-group-item">Update website images.</li>
                                        <li class="list-group-item">Create marketing banners.</li>
                                        <li class="list-group-item">Revise product descriptions.</li>
                                        <li class="list-group-item">Set up client meetings.</li>
                                        <li class="list-group-item">Check email for urgent messages.</li>
                                        <li class="list-group-item">Proofread customer communications.</li>
                                    </ul>
                                </div> <!-- end card-body -->
                            </div> <!-- end card -->
                        </div> <!-- end col -->
                        <div class="col-xl-12">
                            <div class="card custom-card">
                                <div class="card-header">
                                    <div class="card-title">
                                        SWAP
                                    </div>
                                </div> <!-- end card-header -->
                                <div class="card-body">
                                    <ul class="list-group sortable-list" id="sortable-swap">
                                        <li class="list-group-item">Test software functionality.</li>
                                        <li class="list-group-item">Brainstorm team-building activities.</li>
                                        <li class="list-group-item">Format spreadsheet cells.</li>
                                        <li class="list-group-item">Plan virtual team event.</li>
                                        <li class="list-group-item">Edit meeting agenda.</li>
                                        <li class="list-group-item">Compile weekly progress report.</li>
                                    </ul>
                                </div> <!-- end card-body -->
                            </div> <!-- end card -->
                        </div> <!-- end col -->
                    </div> <!-- end row -->
                </div> <!-- end col -->
            </div>
            <!-- End:: row-5 -->

        </div>
        <!-- End container -->

        <!-- Start Footer -->
        <div class="footer d-sm-flex align-items-center justify-content-between bg-white py-2 px-4 border-top">
            <p class="text-title mb-0">&copy; <script>document.write(new Date().getFullYear())</script> <a href="javascript:void(0);" class="link-primary">Kanakku</a>, All Rights Reserved</p>
            <p class="text-title">Version : 1.3.8</p>
        </div>
        <!-- End Footer -->

    </div>

    <!-- ========================
        End Page Content
    ========================= -->
@endsection
