<?php $page = 'ui-accordion'; ?>
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
                    <h4 class="fs-18 fw-semibold mb-0">Accordions</h4>
                </div>

                <div class="text-end">
                    <ol class="breadcrumb m-0 py-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>

                        <li class="breadcrumb-item"><a href="javascript: void(0);">Base UI</a></li>

                        <li class="breadcrumb-item active">Accordions</li>
                    </ol>
                </div>
            </div>
            <!-- End Page Header -->

            <!-- start row -->
            <div class="row">

                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Default Accordion</h5>
                        </div>
                        <div class="card-body">
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Accordion Item #1
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall
                                            appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within
                                            the <code>.accordion-body</code>, though the transition does limit overflow.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingTwo">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            Accordion Item #2
                                        </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall
                                            appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within
                                            the <code>.accordion-body</code>, though the transition does limit overflow.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingThree">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            Accordion Item #3
                                        </button>
                                    </h2>
                                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall
                                            appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within
                                            the <code>.accordion-body</code>, though the transition does limit overflow.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->

                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Flush Accordions</h5>
                        </div>
                        <div class="card-body">
                            <p class="text-muted">Add <code>.accordion-flush</code> to remove the default <code>background-color</code>, some borders, and some rounded corners to render accordions edge-to-edge with their parent container.</p>

                            <div class="accordion accordion-flush" id="accordionFlushExample">

                                <!-- item -->
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                            Accordion Item #1
                                        </button>
                                    </h2>
                                    <div id="flush-collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the first item's accordion body.</div>
                                    </div>
                                </div>

                                <!-- item -->
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                            Accordion Item #2
                                        </button>
                                    </h2>
                                    <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the second item's accordion body. Let's imagine this being filled with some actual
                                            content.
                                        </div>
                                    </div>
                                </div>

                                <!-- item -->
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                            Accordion Item #3
                                        </button>
                                    </h2>
                                    <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the third item's accordion body. Nothing more exciting happening here in terms of
                                            content, but just filling up the space to make it look, at least at first glance, a bit more representative of how this would look in a real-world application.
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- end card body-->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->

            </div>
            <!-- end row -->

            <!-- start row -->
            <div class="row">

                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Bordered Accordions</h5>
                        </div>
                        <div class="card-body">
                            <p class="text-muted">Using the card component, you can extend the default collapse behavior to create an accordion. To properly achieve the accordion style, be sure to use <code>.accordion</code> as a wrapper.</p>
                            <div class="accordion accordion-bordered" id="BorderedaccordionExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="BorderedheadingOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#BorderedcollapseOne" aria-expanded="true" aria-controls="BorderedcollapseOne">
                                            Accordion Item #1
                                        </button>
                                    </h2>
                                    <div id="BorderedcollapseOne" class="accordion-collapse collapse show" aria-labelledby="BorderedheadingOne" data-bs-parent="#BorderedaccordionExample">
                                        <div class="accordion-body">
                                            <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall
                                            appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within
                                            the <code>.accordion-body</code>, though the transition does limit overflow.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="BorderedheadingTwo">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#BorderedcollapseTwo" aria-expanded="false" aria-controls="BorderedcollapseTwo">
                                            Accordion Item #2
                                        </button>
                                    </h2>
                                    <div id="BorderedcollapseTwo" class="accordion-collapse collapse" aria-labelledby="BorderedheadingTwo" data-bs-parent="#BorderedaccordionExample">
                                        <div class="accordion-body">
                                            <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall
                                            appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within
                                            the <code>.accordion-body</code>, though the transition does limit overflow.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="BorderedheadingThree">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#BorderedcollapseThree" aria-expanded="false" aria-controls="BorderedcollapseThree">
                                            Accordion Item #3
                                        </button>
                                    </h2>
                                    <div id="BorderedcollapseThree" class="accordion-collapse collapse" aria-labelledby="BorderedheadingThree" data-bs-parent="#BorderedaccordionExample">
                                        <div class="accordion-body">
                                            <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall
                                            appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within
                                            the <code>.accordion-body</code>, though the transition does limit overflow.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->

                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Custom Icon Accordion</h5>
                        </div>
                        <div class="card-body">
                            <p class="text-muted">
                                Using the card component, you can extend the default collapse behavior to create an accordion. To properly achieve the accordion style, be sure to use <code>.accordion</code> as a wrapper.
                            </p>

                            <div class="accordion accordion-bordered accordion-custom-icon accordion-arrow-none" id="CustomIconaccordionExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="CustomIconheadingOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#CustomIconcollapseOne" aria-expanded="true" aria-controls="CustomIconcollapseOne">
                                            Accordion item with tabler icons
                                            <i class="ti ti-plus accordion-icon accordion-icon-on"></i>
                                            <i class="ti ti-minus accordion-icon accordion-icon-off"></i>
                                        </button>
                                    </h2>
                                    <div id="CustomIconcollapseOne" class="accordion-collapse collapse show" aria-labelledby="CustomIconheadingOne" data-bs-parent="#CustomIconaccordionExample">
                                        <div class="accordion-body">
                                            <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall
                                            appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within
                                            the <code>.accordion-body</code>, though the transition does limit overflow.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="CustomIconheadingTwo">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#CustomIconcollapseTwo" aria-expanded="false" aria-controls="CustomIconcollapseTwo">
                                            Accordion item with tabler icons
                                            <i class="ti ti-circle-plus accordion-icon accordion-icon-on"></i>
                                            <i class="ti ti-circle-minus accordion-icon accordion-icon-off"></i>
                                        </button>
                                    </h2>
                                    <div id="CustomIconcollapseTwo" class="accordion-collapse collapse" aria-labelledby="CustomIconheadingTwo" data-bs-parent="#CustomIconaccordionExample">
                                        <div class="accordion-body">
                                            <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall
                                            appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within
                                            the <code>.accordion-body</code>, though the transition does limit overflow.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="CustomIconheadingThree">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#CustomIconcollapseThree" aria-expanded="false" aria-controls="CustomIconcollapseThree">
                                            Accordion item with tabler icons
                                            <i class="ti ti-square-plus accordion-icon accordion-icon-on"></i>
                                            <i class="ti ti-square-minus accordion-icon accordion-icon-off"></i>
                                        </button>
                                    </h2>
                                    <div id="CustomIconcollapseThree" class="accordion-collapse collapse" aria-labelledby="CustomIconheadingThree" data-bs-parent="#CustomIconaccordionExample">
                                        <div class="accordion-body">
                                            <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall
                                            appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within
                                            the <code>.accordion-body</code>, though the transition does limit overflow.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->

                <div class="col-xl-6">
                    <div class="card card-h-100">
                        <div class="card-header">
                            <h5 class="card-title">Always Open Accordions</h5>
                        </div>
                        <div class="card-body">
                            <p class="text-muted">Omit the <code>data-bs-parent</code> attribute on each <code>.accordion-collapse</code> to make accordion items stay open when another item is opened.</p>

                            <div class="accordion" id="accordionPanelsStayOpenExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                            Accordion Item #1
                                        </button>
                                    </h2>
                                    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                                        <div class="accordion-body">
                                            <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall
                                            appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within
                                            the <code>.accordion-body</code>, though the transition does limit overflow.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                                            Accordion Item #2
                                        </button>
                                    </h2>
                                    <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
                                        <div class="accordion-body">
                                            <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall
                                            appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within
                                            the <code>.accordion-body</code>, though the transition does limit overflow.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                                            Accordion Item #3
                                        </button>
                                    </h2>
                                    <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
                                        <div class="accordion-body">
                                            <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall
                                            appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within
                                            the <code>.accordion-body</code>, though the transition does limit overflow.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->

                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Accordion Without Arrow</h5>
                        </div>
                        <div class="card-body">
                            <p class="text-muted">
                                Using the card component, you can extend the default collapse behavior to create an accordion. To properly achieve the accordion style, be sure to use <code>.accordion</code> as a wrapper.
                            </p>

                            <div class="accordion accordion-arrow-none" id="withoutarrowaccordionExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="withoutarrowheadingOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#withoutarrowcollapseOne" aria-expanded="true" aria-controls="withoutarrowcollapseOne">
                                            Accordion Item #1
                                        </button>
                                    </h2>
                                    <div id="withoutarrowcollapseOne" class="accordion-collapse collapse show" aria-labelledby="withoutarrowheadingOne" data-bs-parent="#withoutarrowaccordionExample">
                                        <div class="accordion-body">
                                            <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall
                                            appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within
                                            the <code>.accordion-body</code>, though the transition does limit overflow.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="withoutarrowheadingTwo">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#withoutarrowcollapseTwo" aria-expanded="false" aria-controls="withoutarrowcollapseTwo">
                                            Accordion Item #2
                                        </button>
                                    </h2>
                                    <div id="withoutarrowcollapseTwo" class="accordion-collapse collapse" aria-labelledby="withoutarrowheadingTwo" data-bs-parent="#withoutarrowaccordionExample">
                                        <div class="accordion-body">
                                            <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall
                                            appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within
                                            the <code>.accordion-body</code>, though the transition does limit overflow.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="withoutarrowheadingThree">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#withoutarrowcollapseThree" aria-expanded="false" aria-controls="withoutarrowcollapseThree">
                                            Accordion Item #3
                                        </button>
                                    </h2>
                                    <div id="withoutarrowcollapseThree" class="accordion-collapse collapse" aria-labelledby="withoutarrowheadingThree" data-bs-parent="#withoutarrowaccordionExample">
                                        <div class="accordion-body">
                                            <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall
                                            appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within
                                            the <code>.accordion-body</code>, though the transition does limit overflow.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->

            <!-- start row -->
            <div class="row">
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Primary - Light Color</h5>
                        </div>
                        <div class="card-body">
                            <div class="accordion accordion-primary" id="accordionPrimaryExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingPrimaryOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePrimaryOne" aria-expanded="true" aria-controls="collapsePrimaryOne">
                                            Accordion Item #1
                                        </button>
                                    </h2>
                                    <div id="collapsePrimaryOne" class="accordion-collapse collapse show" aria-labelledby="headingPrimaryOne" data-bs-parent="#accordionPrimaryExample">
                                        <div class="accordion-body">
                                            <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall
                                            appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within
                                            the
                                            <code>.accordion-body</code>, though the transition does limit overflow.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingPrimaryTwo">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePrimaryTwo" aria-expanded="false" aria-controls="collapsePrimaryTwo">
                                            Accordion Item #2
                                        </button>
                                    </h2>
                                    <div id="collapsePrimaryTwo" class="accordion-collapse collapse" aria-labelledby="headingPrimaryTwo" data-bs-parent="#accordionPrimaryExample">
                                        <div class="accordion-body">
                                            <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall
                                            appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within
                                            the
                                            <code>.accordion-body</code>, though the transition does limit overflow.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingPrimaryThree">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePrimaryThree" aria-expanded="false" aria-controls="collapsePrimaryThree">
                                            Accordion Item #3
                                        </button>
                                    </h2>
                                    <div id="collapsePrimaryThree" class="accordion-collapse collapse" aria-labelledby="headingPrimaryThree" data-bs-parent="#accordionPrimaryExample">
                                        <div class="accordion-body">
                                            <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall
                                            appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within
                                            the
                                            <code>.accordion-body</code>, though the transition does limit overflow.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->

                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Secondary - Light Color</h5>
                        </div>
                        <div class="card-body">
                            <div class="accordion accordion-secondary" id="accordionSecondaryExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingSecondaryOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSecondaryOne" aria-expanded="true" aria-controls="collapseSecondaryOne">
                                            Accordion Item #1
                                        </button>
                                    </h2>
                                    <div id="collapseSecondaryOne" class="accordion-collapse collapse show" aria-labelledby="headingSecondaryOne" data-bs-parent="#accordionSecondaryExample">
                                        <div class="accordion-body">
                                            <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall
                                            appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within
                                            the <code>.accordion-body</code>, though the transition does limit overflow.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingSecondaryTwo">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSecondaryTwo" aria-expanded="false" aria-controls="collapseSecondaryTwo">
                                            Accordion Item #2
                                        </button>
                                    </h2>
                                    <div id="collapseSecondaryTwo" class="accordion-collapse collapse" aria-labelledby="headingSecondaryTwo" data-bs-parent="#accordionSecondaryExample">
                                        <div class="accordion-body">
                                            <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall
                                            appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within
                                            the
                                            <code>.accordion-body</code>, though the transition does limit overflow.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingSecondaryThree">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSecondaryThree" aria-expanded="false" aria-controls="collapseSecondaryThree">
                                            Accordion Item #3
                                        </button>
                                    </h2>
                                    <div id="collapseSecondaryThree" class="accordion-collapse collapse" aria-labelledby="headingSecondaryThree" data-bs-parent="#accordionSecondaryExample">
                                        <div class="accordion-body">
                                            <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall
                                            appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within
                                            the <code>.accordion-body</code>, though the transition does limit overflow.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->

            <!-- start row -->
            <div class="row">
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Primary - Solid Color</h5>
                        </div>
                        <div class="card-body">
                            <p class="text-muted">Use the <code>.accordion-solid-primary</code> to create a solid primary accordion.</p>
                            <div class="accordion accordion-solid-primary" id="accordionPrimarySolidExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingPrimarySolidOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePrimarySolidOne" aria-expanded="true" aria-controls="collapsePrimarySolidOne">
                                            Accordion Item #1
                                        </button>
                                    </h2>
                                    <div id="collapsePrimarySolidOne" class="accordion-collapse collapse show" aria-labelledby="headingPrimarySolidOne" data-bs-parent="#accordionPrimarySolidExample">
                                        <div class="accordion-body">
                                            <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall
                                            appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within
                                            the
                                            <code>.accordion-body</code>, though the transition does limit overflow.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingPrimarySolidTwo">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePrimarySolidTwo" aria-expanded="false" aria-controls="collapsePrimarySolidTwo">
                                            Accordion Item #2
                                        </button>
                                    </h2>
                                    <div id="collapsePrimarySolidTwo" class="accordion-collapse collapse" aria-labelledby="headingPrimarySolidTwo" data-bs-parent="#accordionPrimarySolidExample">
                                        <div class="accordion-body">
                                            <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall
                                            appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within
                                            the
                                            <code>.accordion-body</code>, though the transition does limit overflow.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingPrimarySolidThree">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePrimarySolidThree" aria-expanded="false" aria-controls="collapsePrimarySolidThree">
                                            Accordion Item #3
                                        </button>
                                    </h2>
                                    <div id="collapsePrimarySolidThree" class="accordion-collapse collapse" aria-labelledby="headingPrimarySolidThree" data-bs-parent="#accordionPrimarySolidExample">
                                        <div class="accordion-body">
                                            <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall
                                            appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within
                                            the
                                            <code>.accordion-body</code>, though the transition does limit overflow.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->

                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Secondary - Solid Color</h5>
                        </div>
                        <div class="card-body">
                            <p class="text-muted">Use the <code>.accordion-solid-secondary</code> to create a solid secondary accordion.</p>
                            <div class="accordion accordion-solid-secondary" id="accordionSecondarySolidExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingSecondarySolidOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSecondarySolidOne" aria-expanded="true" aria-controls="collapseSecondarySolidOne">
                                            Accordion Item #1
                                        </button>
                                    </h2>
                                    <div id="collapseSecondarySolidOne" class="accordion-collapse collapse show" aria-labelledby="headingSecondarySolidOne" data-bs-parent="#accordionSecondarySolidExample">
                                        <div class="accordion-body">
                                            <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall
                                            appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within
                                            the
                                            <code>.accordion-body</code>, though the transition does limit overflow.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingSecondarySolidTwo">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSecondarySolidTwo" aria-expanded="false" aria-controls="collapseSecondarySolidTwo">
                                            Accordion Item #2
                                        </button>
                                    </h2>
                                    <div id="collapseSecondarySolidTwo" class="accordion-collapse collapse" aria-labelledby="headingSecondarySolidTwo" data-bs-parent="#accordionSecondarySolidExample">
                                        <div class="accordion-body">
                                            <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall
                                            appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within
                                            the
                                            <code>.accordion-body</code>, though the transition does limit overflow.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingSecondarySolidThree">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSecondarySolidThree" aria-expanded="false" aria-controls="collapseSecondarySolidThree">
                                            Accordion Item #3
                                        </button>
                                    </h2>
                                    <div id="collapseSecondarySolidThree" class="accordion-collapse collapse" aria-labelledby="headingSecondarySolidThree" data-bs-parent="#accordionSecondarySolidExample">
                                        <div class="accordion-body">
                                            <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall
                                            appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within
                                            the
                                            <code>.accordion-body</code>, though the transition does limit overflow.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->

                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Warning - Solid Color</h5>
                        </div>
                        <div class="card-body">
                            <p class="text-muted">Use the <code>.accordion-solid-warning</code> to create a solid warning accordion.</p>
                            <div class="accordion accordion-solid-warning" id="accordionWarningSolidExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingWarningSolidOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseWarningSolidOne" aria-expanded="true" aria-controls="collapseWarningSolidOne">
                                            Accordion Item #1
                                        </button>
                                    </h2>
                                    <div id="collapseWarningSolidOne" class="accordion-collapse collapse show" aria-labelledby="headingWarningSolidOne" data-bs-parent="#accordionWarningSolidExample">
                                        <div class="accordion-body">
                                            <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall
                                            appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within
                                            the
                                            <code>.accordion-body</code>, though the transition does limit overflow.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingWarningSolidTwo">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseWarningSolidTwo" aria-expanded="false" aria-controls="collapseWarningSolidTwo">
                                            Accordion Item #2
                                        </button>
                                    </h2>
                                    <div id="collapseWarningSolidTwo" class="accordion-collapse collapse" aria-labelledby="headingWarningSolidTwo" data-bs-parent="#accordionWarningSolidExample">
                                        <div class="accordion-body">
                                            <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall
                                            appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within
                                            the
                                            <code>.accordion-body</code>, though the transition does limit overflow.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingWarningSolidThree">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseWarningSolidThree" aria-expanded="false" aria-controls="collapseWarningSolidThree">
                                            Accordion Item #3
                                        </button>
                                    </h2>
                                    <div id="collapseWarningSolidThree" class="accordion-collapse collapse" aria-labelledby="headingWarningSolidThree" data-bs-parent="#accordionWarningSolidExample">
                                        <div class="accordion-body">
                                            <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall
                                            appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within
                                            the
                                            <code>.accordion-body</code>, though the transition does limit overflow.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->

                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Info - Solid Color</h5>
                        </div>
                        <div class="card-body">
                            <p class="text-muted">Use the <code>.accordion-solid-info</code> to create a solid info accordion.</p>
                            <div class="accordion accordion-solid-info" id="accordionInfoSolidExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingInfoSolidOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseInfoSolidOne" aria-expanded="true" aria-controls="collapseInfoSolidOne">
                                            Accordion Item #1
                                        </button>
                                    </h2>
                                    <div id="collapseInfoSolidOne" class="accordion-collapse collapse show" aria-labelledby="headingInfoSolidOne" data-bs-parent="#accordionInfoSolidExample">
                                        <div class="accordion-body">
                                            <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall
                                            appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within
                                            the
                                            <code>.accordion-body</code>, though the transition does limit overflow.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingInfoSolidTwo">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseInfoSolidTwo" aria-expanded="false" aria-controls="collapseInfoSolidTwo">
                                            Accordion Item #2
                                        </button>
                                    </h2>
                                    <div id="collapseInfoSolidTwo" class="accordion-collapse collapse" aria-labelledby="headingInfoSolidTwo" data-bs-parent="#accordionInfoSolidExample">
                                        <div class="accordion-body">
                                            <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall
                                            appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within
                                            the
                                            <code>.accordion-body</code>, though the transition does limit overflow.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingInfoSolidThree">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseInfoSolidThree" aria-expanded="false" aria-controls="collapseInfoSolidThree">
                                            Accordion Item #3
                                        </button>
                                    </h2>
                                    <div id="collapseInfoSolidThree" class="accordion-collapse collapse" aria-labelledby="headingInfoSolidThree" data-bs-parent="#accordionInfoSolidExample">
                                        <div class="accordion-body">
                                            <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall
                                            appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within
                                            the
                                            <code>.accordion-body</code>, though the transition does limit overflow.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->

                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Success - Solid Color</h5>
                        </div>
                        <div class="card-body">
                            <p class="text-muted">Use the <code>.accordion-solid-success</code> to create a solid success accordion.</p>
                            <div class="accordion accordion-solid-success" id="accordionSuccessSolidExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingSuccessSolidOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSuccessSolidOne" aria-expanded="true" aria-controls="collapseSuccessSolidOne">
                                            Accordion Item #1
                                        </button>
                                    </h2>
                                    <div id="collapseSuccessSolidOne" class="accordion-collapse collapse show" aria-labelledby="headingSuccessSolidOne" data-bs-parent="#accordionSuccessSolidExample">
                                        <div class="accordion-body">
                                            <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall
                                            appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within
                                            the
                                            <code>.accordion-body</code>, though the transition does limit overflow.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingSuccessSolidTwo">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSuccessSolidTwo" aria-expanded="false" aria-controls="collapseSuccessSolidTwo">
                                            Accordion Item #2
                                        </button>
                                    </h2>
                                    <div id="collapseSuccessSolidTwo" class="accordion-collapse collapse" aria-labelledby="headingSuccessSolidTwo" data-bs-parent="#accordionSuccessSolidTwo">
                                        <div class="accordion-body">
                                            <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall
                                            appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within
                                            the
                                            <code>.accordion-body</code>, though the transition does limit overflow.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingSuccessSolidThree">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSuccessSolidThree" aria-expanded="false" aria-controls="collapseSuccessSolidThree">
                                            Accordion Item #3
                                        </button>
                                    </h2>
                                    <div id="collapseSuccessSolidThree" class="accordion-collapse collapse" aria-labelledby="headingSuccessSolidThree" data-bs-parent="#accordionSuccessSolidThree">
                                        <div class="accordion-body">
                                            <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall
                                            appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within
                                            the
                                            <code>.accordion-body</code>, though the transition does limit overflow.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->

                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Danger - Solid Color</h5>
                        </div>
                        <div class="card-body">
                            <p class="text-muted">Use the <code>.accordion-solid-danger</code> to create a solid danger accordion.</p>
                            <div class="accordion accordion-solid-danger" id="accordionDangerSolidExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingDangerSolidOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseDangerSolidOne" aria-expanded="true" aria-controls="collapseDangerSolidOne">
                                            Accordion Item #1
                                        </button>
                                    </h2>
                                    <div id="collapseDangerSolidOne" class="accordion-collapse collapse show" aria-labelledby="headingDangerSolidOne" data-bs-parent="#accordionDangerSolidExample">
                                        <div class="accordion-body">
                                            <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall
                                            appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within
                                            the
                                            <code>.accordion-body</code>, though the transition does limit overflow.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingDangerSolidTwo">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseDangerSolidTwo" aria-expanded="false" aria-controls="collapseDangerSolidTwo">
                                            Accordion Item #2
                                        </button>
                                    </h2>
                                    <div id="collapseDangerSolidTwo" class="accordion-collapse collapse" aria-labelledby="headingDangerSolidTwo" data-bs-parent="#accordionDangerSolidExample">
                                        <div class="accordion-body">
                                            <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall
                                            appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within
                                            the
                                            <code>.accordion-body</code>, though the transition does limit overflow.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingDangerSolidThree">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseDangerSolidThree" aria-expanded="false" aria-controls="collapseDangerSolidThree">
                                            Accordion Item #3
                                        </button>
                                    </h2>
                                    <div id="collapseDangerSolidThree" class="accordion-collapse collapse" aria-labelledby="headingDangerSolidThree" data-bs-parent="#accordionDangerSolidExample">
                                        <div class="accordion-body">
                                            <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall
                                            appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within
                                            the
                                            <code>.accordion-body</code>, though the transition does limit overflow.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->

            <!-- start row -->
            <div class="row">
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Primary - Colored Border</h5>
                        </div>
                        <div class="card-body">
                            <p class="text-muted">Use the <code>.accordion-border-primary</code> to create a primary border accordion.</p>
                            <div class="accordion accordion-border-primary accordions-items-seperate" id="accordionprimaryborderExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingborderprimaryOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#primaryBorderOne" aria-expanded="true" aria-controls="primaryBorderOne">
                                            Accordion Item #1
                                        </button>
                                    </h2>
                                    <div id="primaryBorderOne" class="accordion-collapse collapse show" aria-labelledby="headingborderprimaryOne" data-bs-parent="#accordionprimaryborderExample">
                                        <div class="accordion-body">
                                            <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall
                                            appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within
                                            the
                                            <code>.accordion-body</code>, though the transition does limit overflow.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingborderprimaryTwo">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#primaryBorderTwo" aria-expanded="false" aria-controls="primaryBorderTwo">
                                            Accordion Item #2
                                        </button>
                                    </h2>
                                    <div id="primaryBorderTwo" class="accordion-collapse collapse" aria-labelledby="headingborderprimaryTwo" data-bs-parent="#accordionprimaryborderExample">
                                        <div class="accordion-body">
                                            <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall
                                            appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within
                                            the
                                            <code>.accordion-body</code>, though the transition does limit overflow.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingborderprimaryThree">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#primaryBorderThree" aria-expanded="false" aria-controls="primaryBorderThree">
                                            Accordion Item #3
                                        </button>
                                    </h2>
                                    <div id="primaryBorderThree" class="accordion-collapse collapse" aria-labelledby="headingborderprimaryThree" data-bs-parent="#accordionprimaryborderExample">
                                        <div class="accordion-body">
                                            <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall
                                            appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within
                                            the
                                            <code>.accordion-body</code>, though the transition does limit overflow.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->

                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Secondary - Colored Border</h5>
                        </div>
                        <div class="card-body">
                            <p class="text-muted">Use the <code>.accordion-border-secondary</code> to create a secondary border accordion.</p>
                            <div class="accordion accordion-border-secondary accordions-items-seperate" id="accordioninfoborderExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingborderinfoOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#infoBorderOne" aria-expanded="true" aria-controls="infoBorderOne">
                                            Accordion Item #1
                                        </button>
                                    </h2>
                                    <div id="infoBorderOne" class="accordion-collapse collapse show" aria-labelledby="headingborderinfoOne" data-bs-parent="#accordioninfoborderExample">
                                        <div class="accordion-body">
                                            <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall
                                            appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within
                                            the
                                            <code>.accordion-body</code>, though the transition does limit overflow.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingborderinfoTwo">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#infoBorderTwo" aria-expanded="false" aria-controls="infoBorderTwo">
                                            Accordion Item #2
                                        </button>
                                    </h2>
                                    <div id="infoBorderTwo" class="accordion-collapse collapse" aria-labelledby="headingborderinfoTwo" data-bs-parent="#accordioninfoborderExample">
                                        <div class="accordion-body">
                                            <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall
                                            appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within
                                            the
                                            <code>.accordion-body</code>, though the transition does limit overflow.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingborderinfoThree">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#infoBorderThree" aria-expanded="false" aria-controls="infoBorderThree">
                                            Accordion Item #3
                                        </button>
                                    </h2>
                                    <div id="infoBorderThree" class="accordion-collapse collapse" aria-labelledby="headingborderinfoThree" data-bs-parent="#accordioninfoborderExample">
                                        <div class="accordion-body">
                                            <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall
                                            appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within
                                            the
                                            <code>.accordion-body</code>, though the transition does limit overflow.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->

                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Success - Colored Border</h5>
                        </div>
                        <div class="card-body">
                            <p class="text-muted">Use the <code>.accordion-border-success</code> to create a success border accordion.</p>
                            <div class="accordion accordion-border-success accordions-items-seperate" id="accordionsuccessborderExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingbordersuccessOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#successBorderOne" aria-expanded="true" aria-controls="successBorderOne">
                                            Accordion Item #1
                                        </button>
                                    </h2>
                                    <div id="successBorderOne" class="accordion-collapse collapse show" aria-labelledby="headingbordersuccessOne" data-bs-parent="#accordionsuccessborderExample">
                                        <div class="accordion-body">
                                            <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall
                                            appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within
                                            the
                                            <code>.accordion-body</code>, though the transition does limit overflow.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingbordersuccessTwo">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#successBorderTwo" aria-expanded="false" aria-controls="successBorderTwo">
                                            Accordion Item #2
                                        </button>
                                    </h2>
                                    <div id="successBorderTwo" class="accordion-collapse collapse" aria-labelledby="headingbordersuccessTwo" data-bs-parent="#accordionsuccessborderExample">
                                        <div class="accordion-body">
                                            <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall
                                            appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within
                                            the
                                            <code>.accordion-body</code>, though the transition does limit overflow.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingbordersuccessThree">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#successBorderThree" aria-expanded="false" aria-controls="successBorderThree">
                                            Accordion Item #3
                                        </button>
                                    </h2>
                                    <div id="successBorderThree" class="accordion-collapse collapse" aria-labelledby="headingbordersuccessThree" data-bs-parent="#accordionsuccessborderExample">
                                        <div class="accordion-body">
                                            <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall
                                            appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within
                                            the
                                            <code>.accordion-body</code>, though the transition does limit overflow.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->

                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Info - Colored Border</h5>
                        </div>
                        <div class="card-body">
                            <p class="text-muted">Use the <code>.accordion-border-info</code> to create a info border accordion.</p>
                            <div class="accordion accordion-border-info accordions-items-seperate" id="accordioninfoborderExampleTwo">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingborderinfoTwos">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#infoBorderOnes" aria-expanded="true" aria-controls="infoBorderOnes">
                                            Accordion Item #1
                                        </button>
                                    </h2>
                                    <div id="infoBorderOnes" class="accordion-collapse collapse show" aria-labelledby="headingborderinfoTwos" data-bs-parent="#accordioninfoborderExampleTwo">
                                        <div class="accordion-body">
                                            <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall
                                            appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within
                                            the
                                            <code>.accordion-body</code>, though the transition does limit overflow.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingborderinfoTwoo">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#infoBorderTwos" aria-expanded="false" aria-controls="infoBorderTwos">
                                            Accordion Item #2
                                        </button>
                                    </h2>
                                    <div id="infoBorderTwos" class="accordion-collapse collapse" aria-labelledby="headingborderinfoTwoo" data-bs-parent="#accordioninfoborderExample2">
                                        <div class="accordion-body">
                                            <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall
                                            appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within
                                            the
                                            <code>.accordion-body</code>, though the transition does limit overflow.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingborderinfoThrees">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#infoBorderThrees" aria-expanded="false" aria-controls="infoBorderThrees">
                                            Accordion Item #3
                                        </button>
                                    </h2>
                                    <div id="infoBorderThrees" class="accordion-collapse collapse" aria-labelledby="headingborderinfoThrees" data-bs-parent="#accordioninfoborderExample2">
                                        <div class="accordion-body">
                                            <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall
                                            appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within
                                            the
                                            <code>.accordion-body</code>, though the transition does limit overflow.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->

                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Warning - Colored Border</h5>
                        </div>
                        <div class="card-body">
                            <p class="text-muted">Use the <code>.accordion-border-warning</code> to create a warning border accordion.</p>
                            <div class="accordion accordion-border-warning accordions-items-seperate" id="accordionwarningborderExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingborderwarningOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#warningBorderOne" aria-expanded="true" aria-controls="warningBorderOne">
                                            Accordion Item #1
                                        </button>
                                    </h2>
                                    <div id="warningBorderOne" class="accordion-collapse collapse show" aria-labelledby="headingborderwarningOne" data-bs-parent="#accordionwarningborderExample">
                                        <div class="accordion-body">
                                            <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall
                                            appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within
                                            the
                                            <code>.accordion-body</code>, though the transition does limit overflow.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingborderwarningTwo">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#warningBorderTwo" aria-expanded="false" aria-controls="warningBorderTwo">
                                            Accordion Item #2
                                        </button>
                                    </h2>
                                    <div id="warningBorderTwo" class="accordion-collapse collapse" aria-labelledby="headingborderwarningTwo" data-bs-parent="#accordionwarningborderExample">
                                        <div class="accordion-body">
                                            <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall
                                            appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within
                                            the
                                            <code>.accordion-body</code>, though the transition does limit overflow.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingborderwarningThree">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#warningBorderThree" aria-expanded="false" aria-controls="warningBorderThree">
                                            Accordion Item #3
                                        </button>
                                    </h2>
                                    <div id="warningBorderThree" class="accordion-collapse collapse" aria-labelledby="headingborderwarningThree" data-bs-parent="#accordionwarningborderExample">
                                        <div class="accordion-body">
                                            <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall
                                            appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within
                                            the
                                            <code>.accordion-body</code>, though the transition does limit overflow.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->

                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Danger - Colored Border</h5>
                        </div>
                        <div class="card-body">
                            <p class="text-muted">Use the <code>.accordion-border-danger</code> to create a danger border accordion.</p>
                            <div class="accordion accordion-border-danger accordions-items-seperate" id="accordiondangerborderExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingborderdangerOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#dangerBorderOne" aria-expanded="true" aria-controls="dangerBorderOne">
                                            Accordion Item #1
                                        </button>
                                    </h2>
                                    <div id="dangerBorderOne" class="accordion-collapse collapse show" aria-labelledby="headingborderdangerOne" data-bs-parent="#accordiondangerborderExample">
                                        <div class="accordion-body">
                                            <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall
                                            appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within
                                            the
                                            <code>.accordion-body</code>, though the transition does limit overflow.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingborderdangerTwo">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#dangerBorderTwo" aria-expanded="false" aria-controls="dangerBorderTwo">
                                            Accordion Item #2
                                        </button>
                                    </h2>
                                    <div id="dangerBorderTwo" class="accordion-collapse collapse" aria-labelledby="headingborderdangerTwo" data-bs-parent="#accordiondangerborderExample">
                                        <div class="accordion-body">
                                            <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall
                                            appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within
                                            the
                                            <code>.accordion-body</code>, though the transition does limit overflow.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingborderdangerThree">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#dangerBorderThree" aria-expanded="false" aria-controls="dangerBorderThree">
                                            Accordion Item #3
                                        </button>
                                    </h2>
                                    <div id="dangerBorderThree" class="accordion-collapse collapse" aria-labelledby="headingborderdangerThree" data-bs-parent="#accordiondangerborderExample">
                                        <div class="accordion-body">
                                            <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall
                                            appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within
                                            the
                                            <code>.accordion-body</code>, though the transition does limit overflow.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->

        </div>
        <!-- End Content -->

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
