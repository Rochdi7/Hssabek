<?php $page = 'ui-tooltips'; ?>
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
                    <h4 class="fs-18 fw-semibold mb-0">Tooltips</h4>
                </div>

                <div class="text-end">
                    <ol class="breadcrumb m-0 py-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                        
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Base UI</a></li>
                        
                        <li class="breadcrumb-item active">Tooltips</li>
                    </ol>
                </div>
            </div>
            <!--  End Page Header-->

            
            <!-- start row -->
            <div class="row">
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Tooltips on links</h5>
                        </div>

                        <div class="card-body">
                            <p>Hover over the links below to see tooltips.</p>
                            <p class="muted mb-0">Placeholder text to demonstrate some <a href="#" class="text-primary" data-bs-toggle="tooltip" data-bs-title="Default tooltip">inline links</a> with tooltips. This is now just filler, no killer. Content placed here just to mimic the presence of <a href="#" class="text-primary" data-bs-toggle="tooltip" data-bs-title="Another tooltip">real text</a>. And all that just to give you an idea of how tooltips would look when used in real-world situations. So hopefully you've now seen how <a href="#" class="text-primary" data-bs-toggle="tooltip" data-bs-title="Another one here too">these tooltips on links</a> can work in practice, once you use them on <a href="#" class="text-primary" data-bs-toggle="tooltip" data-bs-title="The last tip!">your own</a> site or project.</p>
                        
                        </div> <!-- end card body -->
                    </div> <!-- end card -->

                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Disabled Elements</h5>
                        </div>

                        <div class="card-body">
                            <p class="text-muted">Elements with the <code>disabled</code> attribute
                                aren’t interactive, meaning users cannot focus, hover, or click them to trigger
                                a tooltip (or popover). As a workaround, you’ll want to trigger the tooltip from
                                a wrapper <code>&lt;div&gt;</code> or <code>&lt;span&gt;</code>, ideally made
                                keyboard-focusable using <code>tabindex="0"</code>, and override the
                                <code>pointer-events</code> on the disabled element.
                            </p>
                            <div>
                                <span class="d-inline-block" tabindex="0" data-bs-toggle="tooltip" data-bs-title="Disabled tooltip">
                                    <button class="btn btn-primary pe-none" type="button" disabled>Disabled
                                        button</button>
                                </span>
                            </div>

                        </div> <!-- end card body -->
                    </div> <!-- end card -->

                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Hover Elements</h5>
                        </div>

                        <div class="card-body">
                            <p class="text-muted">Elements with the <code>disabled</code> attribute
                                aren’t interactive, meaning users cannot focus, hover, or click them to trigger
                                a tooltip (or popover). As a workaround, you’ll want to trigger the tooltip from
                                a wrapper <code>&lt;div&gt;</code> or <code>&lt;span&gt;</code>, ideally made
                                keyboard-focusable using <code>tabindex="0"</code>, and override the
                                <code>pointer-events</code> on the disabled element.
                            </p>
                            <button class="btn btn-primary" type="button" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-title="Hover Only, Not a Focus">Hover</button>

                        </div> <!-- end card body -->
                    </div> <!-- end card -->
                </div> <!-- end col -->

                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Directions</h5>
                        </div>

                        <div class="card-body">
                            <p>Hover over the buttons below to see the four tooltips directions: top, right, bottom, and left.</p>
                            <div class="d-flex flex-wrap gap-2">
                                <button type="button" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Tooltip on top">Tooltip on
                                    top</button>
                                <button type="button" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Tooltip on bottom">Tooltip on
                                    bottom</button>
                                <button type="button" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="Tooltip on left">Tooltip on
                                    left</button>
                                <button type="button" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Tooltip on right">Tooltip on
                                    right</button>
                            </div>

                        </div> <!-- end card body -->
                    </div> <!-- end card -->

                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">HTML Tags</h5>
                        </div>

                        <div class="card-body">
                            <p class="text-muted">And with custom HTML added:</p>
                            <button type="button" class="btn btn-secondary" data-bs-toggle="tooltip" data-bs-html="true" data-bs-title="<em>Tooltip</em> <u>with</u> <b>HTML</b>">
                                Tooltip with HTML
                            </button>
                            <button type="button" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-trigger="click" data-bs-html="true" data-bs-placement="bottom" title="" data-bs-original-title="<em>Tooltip</em> <u>with</u> <b>HTML</b>">
                                Click Me
                            </button>

                        </div> <!-- end card body -->
                    </div> <!-- end card -->

                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Color Tooltips</h5>
                        </div>

                        <div class="card-body">
                            <p class="text-muted">We set a custom class with ex.
                                <code>data-bs-custom-class="primary-tooltip"</code> to scope our background-color
                                primary appearance and use
                                it to override a local CSS
                                variable.
                            </p>
                            <div class="d-flex flex-wrap gap-2">
                                <button type="button" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="tooltip-primary" data-bs-title="This top tooltip is themed via CSS variables.">
                                    Primary tooltip
                                </button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="tooltip-danger" data-bs-title="This top tooltip is themed via CSS variables.">
                                    Danger tooltip
                                </button>
                                <button type="button" class="btn btn-info" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="tooltip-info" data-bs-title="This top tooltip is themed via CSS variables.">
                                    Info tooltip
                                </button>
                                <button type="button" class="btn btn-success" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="tooltip-success" data-bs-title="This top tooltip is themed via CSS variables.">
                                    Success tooltip
                                </button>
                                <button type="button" class="btn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="tooltip-secondary" data-bs-title="This top tooltip is themed via CSS variables.">
                                    Secondary tooltip
                                </button>
                                <button type="button" class="btn btn-warning" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="tooltip-warning" data-bs-title="This top tooltip is themed via CSS variables.">
                                    Warning tooltip
                                </button>
                                <button type="button" class="btn btn-dark" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="tooltip-dark" data-bs-title="This top tooltip is themed via CSS variables.">
                                    Dark tooltip
                                </button>
                            </div>

                        </div> <!-- end card body -->
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
