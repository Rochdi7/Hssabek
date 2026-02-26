<?php $page = 'form-checkbox-radios'; ?>
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
                    <h4 class="fs-18 fw-semibold mb-0">Checks & Radios</h4>
                </div>

                <div class="text-end">
                    <ol class="breadcrumb m-0 py-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                        
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Base UI</a></li>
                        
                        <li class="breadcrumb-item active">Checks & Radios</li>
                    </ol>
                </div>
            </div>
            


            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Checkboxes</h5>
                        </div>

                        <div class="card-body">
                            <p class="text-muted">
                                Each checkbox and radio <code>&lt;input&gt;</code> and <code>&lt;label&gt;</code> pairing is wrapped in a <code>&lt;div&gt;</code> to create our custom control. Structurally, this is the same approach as our default <code>.form-check</code>.
                            </p>
                            <div class="mt-3">
                                <div class="form-check mb-1">
                                    <input type="checkbox" class="form-check-input" id="customCheck1">
                                    <label class="form-check-label" for="customCheck1">Check this custom checkbox</label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="customCheck2">
                                    <label class="form-check-label" for="customCheck2">Check this custom checkbox</label>
                                </div>
                            </div>

                            <h6 class="fs-15 mt-3">Inline</h6>

                            <div class="mt-2">
                                <div class="form-check form-check-inline">
                                    <input type="checkbox" class="form-check-input" id="customCheck3">
                                    <label class="form-check-label" for="customCheck3">Check this custom checkbox</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="checkbox" class="form-check-input" id="customCheck4">
                                    <label class="form-check-label" for="customCheck4">Check this custom checkbox</label>
                                </div>
                            </div>

                            <h6 class="fs-15 mt-3">Disabled</h6>

                            <div class="mt-2">
                                <div class="form-check form-check-inline">
                                    <input type="checkbox" class="form-check-input" id="customCheck5" checked disabled>
                                    <label class="form-check-label" for="customCheck5">Check this custom checkbox</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="checkbox" class="form-check-input" id="customCheck6" disabled>
                                    <label class="form-check-label" for="customCheck6">Check this custom checkbox</label>
                                </div>
                            </div>

                            <h6 class="fs-15 mt-3">Colors</h6>

                            <div class="form-check mb-2">
                                <input type="checkbox" class="form-check-input" id="customCheckcolor1" checked>
                                <label class="form-check-label" for="customCheckcolor1">Default Checkbox</label>
                            </div>
                            <div class="form-check form-checkbox-success mb-2">
                                <input type="checkbox" class="form-check-input" id="customCheckcolor2" checked>
                                <label class="form-check-label" for="customCheckcolor2">Success Checkbox</label>
                            </div>
                            <div class="form-check form-checkbox-info mb-2">
                                <input type="checkbox" class="form-check-input" id="customCheckcolor3" checked>
                                <label class="form-check-label" for="customCheckcolor3">Info Checkbox</label>
                            </div>
                            <div class="form-check form-checkbox-secondary mb-2">
                                <input type="checkbox" class="form-check-input" id="customCheckcolor6" checked>
                                <label class="form-check-label" for="customCheckcolor6">Secondary Checkbox</label>
                            </div>
                            <div class="form-check  form-checkbox-warning mb-2">
                                <input type="checkbox" class="form-check-input" id="customCheckcolor4" checked>
                                <label class="form-check-label" for="customCheckcolor4">Warning Checkbox</label>
                            </div>
                            <div class="form-check form-checkbox-danger mb-2">
                                <input type="checkbox" class="form-check-input" id="customCheckcolor5" checked>
                                <label class="form-check-label" for="customCheckcolor5">Danger Checkbox</label>
                            </div>
                            <div class="form-check form-checkbox-dark">
                                <input type="checkbox" class="form-check-input" id="customCheckcolor7" checked>
                                <label class="form-check-label" for="customCheckcolor7">Dark Checkbox</label>
                            </div>
                            
                            <h6 class="fs-15 mt-3">Without Labels</h6>
                            <div>
                                <input class="form-check-input" type="checkbox" id="checkboxNoLabel" value="" aria-label="...">
                            </div>
                            
                            <h6 class="fs-15 mt-3">Checkbox toggle buttons</h6>
                            <div class="mb-3">
                                <input type="checkbox" class="btn-check" id="btn-check">
                                <label class="btn btn-primary" for="btn-check">Single toggle</label>

                                <input type="checkbox" class="btn-check" id="btn-check-2" checked>
                                <label class="btn btn-primary" for="btn-check-2">Checked</label>

                                <input type="checkbox" class="btn-check" id="btn-check-3" disabled>
                                <label class="btn btn-primary" for="btn-check-3">Disabled</label>
                            </div>
                            <div>
                                <input type="checkbox" class="btn-check" id="btn-check-4">
                                <label class="btn" for="btn-check-4">Single toggle</label>

                                <input type="checkbox" class="btn-check" id="btn-check-5" checked>
                                <label class="btn" for="btn-check-5">Checked</label>

                                <input type="checkbox" class="btn-check" id="btn-check-6" disabled>
                                <label class="btn" for="btn-check-6">Disabled</label>
                            </div>
                            
                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                </div> <!-- end col -->

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Radios</h5>
                        </div>

                        <div class="card-body">
                            <p class="text-muted">
                                Each checkbox and radio <code>&lt;input&gt;</code> and <code>&lt;label&gt;</code> pairing is wrapped in a <code>&lt;div&gt;</code> to create our custom control. Structurally, this is the same approach as our default <code>.form-check</code>.
                            </p>

                            <div class="mt-3">
                                <div class="form-check mb-1">
                                    <input type="radio" id="customRadio1" name="customRadio" class="form-check-input">
                                    <label class="form-check-label" for="customRadio1">Toggle this custom radio</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" id="customRadio2" name="customRadio" class="form-check-input">
                                    <label class="form-check-label" for="customRadio2">Or toggle this other custom radio</label>
                                </div>
                            </div>

                            <h6 class="fs-15 mt-3">Inline</h6>

                            <div class="mt-2">
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="customRadio3" name="customRadio1" class="form-check-input">
                                    <label class="form-check-label" for="customRadio3">Toggle this custom radio</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="customRadio4" name="customRadio1" class="form-check-input">
                                    <label class="form-check-label" for="customRadio4">Or toggle this other custom radio</label>
                                </div>
                            </div>

                            <h6 class="fs-15 mt-3">Disabled</h6>

                            <div class="mt-2">
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="customRadio5" name="customRadio2" class="form-check-input" disabled>
                                    <label class="form-check-label" for="customRadio5">Toggle this custom radio</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="customRadio6" name="customRadio2" class="form-check-input" checked disabled>
                                    <label class="form-check-label" for="customRadio6">Or toggle this other custom radio</label>
                                </div>
                            </div>

                            <h6 class="fs-15 mt-3">Colors</h6>

                            <div class="form-check mb-2">
                                <input type="radio" id="customRadiocolor1" name="customRadiocolor1" class="form-check-input" checked>
                                <label class="form-check-label" for="customRadiocolor1">Default Radio</label>
                            </div>
                            <div class="form-check form-radio-success mb-2">
                                <input type="radio" id="customRadiocolor2" name="customRadiocolor2" class="form-check-input" checked>
                                <label class="form-check-label" for="customRadiocolor2">Success Radio</label>
                            </div>
                            <div class="form-check form-radio-info mb-2">
                                <input type="radio" id="customRadiocolor3" name="customRadiocolor3" class="form-check-input" checked>
                                <label class="form-check-label" for="customRadiocolor3">Info Radio</label>
                            </div>
                            <div class="form-check form-radio-secondary mb-2">
                                <input type="radio" id="customRadiocolor6" name="customRadiocolor6" class="form-check-input" checked>
                                <label class="form-check-label" for="customRadiocolor6">Secondary Radio</label>
                            </div>
                            <div class="form-check form-radio-warning mb-2">
                                <input type="radio" id="customRadiocolor4" name="customRadiocolor4" class="form-check-input" checked>
                                <label class="form-check-label" for="customRadiocolor4">Warning Radio</label>
                            </div>
                            <div class="form-check form-radio-danger mb-2">
                                <input type="radio" id="customRadiocolor5" name="customRadiocolor5" class="form-check-input" checked>
                                <label class="form-check-label" for="customRadiocolor5">Danger Radio</label>
                            </div>
                            <div class="form-check form-radio-dark">
                                <input type="radio" id="customRadiocolor7" name="customRadiocolor7" class="form-check-input" checked>
                                <label class="form-check-label" for="customRadiocolor7">Dark Radio</label>
                            </div>
                            
                            <h6 class="fs-15 mt-3">Without Labels</h6>
                            <div>
                                <input class="form-check-input" type="radio" name="radioNoLabel" id="radioNoLabel1" value="" aria-label="...">
                            </div>
                            
                            <h6 class="fs-15 mt-3">Radio toggle buttons</h6>
                            <div class="mb-3">
                                <input type="radio" class="btn-check" name="options" id="option1" checked>
                                <label class="btn btn-secondary" for="option1">Checked</label>

                                <input type="radio" class="btn-check" name="options" id="option2">
                                <label class="btn btn-secondary" for="option2">Radio</label>

                                <input type="radio" class="btn-check" name="options" id="option3" disabled>
                                <label class="btn btn-secondary" for="option3">Disabled</label>

                                <input type="radio" class="btn-check" name="options" id="option4">
                                <label class="btn btn-secondary" for="option4">Radio</label>
                            </div>
                            <div>
                                <input type="radio" class="btn-check" name="options-base" id="option5" checked>
                                <label class="btn" for="option5">Checked</label>

                                <input type="radio" class="btn-check" name="options-base" id="option6">
                                <label class="btn" for="option6">Radio</label>

                                <input type="radio" class="btn-check" name="options-base" id="option7" disabled>
                                <label class="btn" for="option7">Disabled</label>

                                <input type="radio" class="btn-check" name="options-base" id="option8">
                                <label class="btn" for="option8">Radio</label>
                            </div>
                            
                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                </div> <!-- end col -->
            </div>
            <!-- end row -->

            <div class="row">
                <div class="col-xl-6">
                    <div class="card card-h-100">
                        <div class="card-header">
                            <h5 class="card-title">Reverse</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-check form-check-reverse mb-2">
                                <input class="form-check-input" type="checkbox" value="" id="reverseCheck1">
                                <label class="form-check-label" for="reverseCheck1">
                                    Reverse checkbox
                                </label>
                            </div>
                            <div class="form-check form-check-reverse mb-2">
                                <input class="form-check-input" type="checkbox" value="" id="reverseCheck2" disabled>
                                <label class="form-check-label" for="reverseCheck2">
                                Disabled reverse checkbox
                                </label>
                            </div>

                            <div class="form-check form-switch form-check-reverse">
                                <input class="form-check-input" type="checkbox" id="switchCheckReverse">
                                <label class="form-check-label" for="switchCheckReverse">Reverse switch checkbox input</label>
                            </div>
                            
                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                </div> <!-- end col -->
                
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Switches</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-check form-switch mb-2">
                                <input class="form-check-input" type="checkbox" role="switch" id="switchCheckDefault">
                                <label class="form-check-label" for="switchCheckDefault">Default switch checkbox input</label>
                            </div>
                            <div class="form-check form-switch mb-2">
                                <input class="form-check-input" type="checkbox" role="switch" id="switchCheckChecked" checked>
                                <label class="form-check-label" for="switchCheckChecked">Checked switch checkbox input</label>
                            </div>
                            <div class="form-check form-switch mb-2">
                                <input class="form-check-input" type="checkbox" role="switch" id="switchCheckDisabled" disabled>
                                <label class="form-check-label" for="switchCheckDisabled">Disabled switch checkbox input</label>
                            </div>
                            <div class="form-check form-switch mb-2">
                                <input class="form-check-input" type="checkbox" role="switch" id="switchCheckCheckedDisabled" checked disabled>
                                <label class="form-check-label" for="switchCheckCheckedDisabled">Disabled checked switch checkbox input</label>
                            </div>
                            
                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                </div> <!-- end col -->
            </div>
            <!-- end row -->
            
        </div> <!-- End Content -->

        @component('components.footer')
        @endcomponent
    </div>
    
    <!-- ========================
        End Page Content
    ========================= -->
@endsection