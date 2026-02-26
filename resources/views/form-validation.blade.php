<?php $page = 'form-validation'; ?>
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
                    <h4 class="fs-18 fw-semibold mb-0">Form Validation</h4>
                </div>

                <div class="text-end">
                    <ol class="breadcrumb m-0 py-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                        
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                        
                        <li class="breadcrumb-item active">Form Validation</li>
                    </ol>
                </div>
            </div>
            <!-- End Page Header -->

            <!-- start row -->
            <div class="row">
                <div class="col-sm-12">

                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Custom Bootstrap Form Validation</h5>
                        </div> <!-- end card-header -->
                        <div class="card-body">
                            <p>For custom Bootstrap form validation messages, you’ll need to add the <code>novalidate</code> boolean attribute to your form. For server side validation <a href="https://getbootstrap.com/docs/4.1/components/forms/#server-side"
                                target="_blank" class="text-primary">read full documentation</a>.</p>
                            <div class="row">
                                <div class="col-sm">
                                    <form class="needs-validation" novalidate>
                                        <div class="form-row row">
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label" for="validationCustom01">First name
                                                </label>
                                                <input type="text" class="form-control" id="validationCustom01" placeholder="First name" value="Mark" required>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div> <!-- end col -->
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label" for="validationCustom02">Last name</label>
                                                <input type="text" class="form-control" id="validationCustom02" placeholder="Last name" value="Otto" required>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div> <!-- end col -->
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label" for="validationCustomUsername">Username</label>
                                                <div class="input-group">
                                                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                                                    <input type="text" class="form-control" id="validationCustomUsername" placeholder="Username" aria-describedby="inputGroupPrepend" required>
                                                    <div class="invalid-feedback">
                                                        Please choose a username.
                                                    </div>
                                                </div>
                                            </div> <!-- end col -->
                                        </div> <!-- end row -->
                                        <div class="form-row row">
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label" for="validationCustom03">City</label>
                                                <input type="text" class="form-control" id="validationCustom03" placeholder="City" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid city.
                                                </div>
                                            </div> <!-- end col -->
                                            <div class="col-md-3 mb-3">
                                                <label class="form-label" for="validationCustom04">State</label>
                                                <input type="text" class="form-control" id="validationCustom04" placeholder="State" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid state.
                                                </div>
                                            </div> <!-- end col -->
                                            <div class="col-md-3 mb-3">
                                                <label class="form-label" for="validationCustom05">Zip</label>
                                                <input type="text" class="form-control" id="validationCustom05" placeholder="Zip" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid zip.
                                                </div>
                                            </div> <!-- end col -->
                                        </div> <!-- end row -->
                                        <div class="mb-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                                                <label class="form-check-label" for="invalidCheck">
                                                    Agree to terms and conditions
                                                </label>
                                                <div class="invalid-feedback">
                                                    You must agree before submitting.
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary" type="submit">Submit form</button>
                                    </form>
                                </div> <!-- end col -->
                            </div> <!-- end row -->
                        </div> <!-- end card-body -->
                    </div> <!-- end card -->

                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Browser defaults</h5>
                        </div> <!-- end card-header -->
                        <div class="card-body">
                            <p>Not interested in custom validation feedback messages or writing JavaScript to change form behaviors? All good, you can use the browser defaults. Try submitting the form below.</p>
                            <div class="row">
                                <div class="col-sm">
                                    <form>
                                        <div class="form-row row">
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label" for="validationDefault01">First name
                                                </label>
                                                <input type="text" class="form-control" id="validationDefault01" placeholder="First name" value="Mark" required>
                                            </div> <!-- end col -->
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label" for="validationDefault02">Last name
                                                </label>
                                                <input type="text" class="form-control" id="validationDefault02" placeholder="Last name" value="Otto" required>
                                            </div> <!-- end col -->
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label" for="validationDefaultUsername">Username</label>
                                                <div class="input-group">
                                                    <span class="input-group-text" id="inputGroupPrepend2">@</span>
                                                    <input type="text" class="form-control" id="validationDefaultUsername" placeholder="Username" aria-describedby="inputGroupPrepend2" required>
                                                </div>
                                            </div> <!-- end col -->
                                        </div> <!-- end row -->
                                        <div class="form-row row">
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label" for="validationDefault03">City</label>
                                                <input type="text" class="form-control" id="validationDefault03" placeholder="City" required>
                                            </div> <!-- end col -->
                                            <div class="col-md-3 mb-3">
                                                <label class="form-label" for="validationDefault04">State</label>
                                                <input type="text" class="form-control" id="validationDefault04" placeholder="State" required>
                                            </div> <!-- end col -->
                                            <div class="col-md-3 mb-3">
                                                <label class="form-label" for="validationDefault05">Zip</label>
                                                <input type="text" class="form-control" id="validationDefault05" placeholder="Zip" required>
                                            </div> <!-- end col -->
                                        </div> <!-- end row -->
                                        <div class="mb-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
                                                <label class="form-check-label" for="invalidCheck2">
                                                    Agree to terms and conditions
                                                </label>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary" type="submit">Submit form</button>
                                    </form>
                                </div> <!-- end col -->
                            </div> <!-- end row -->
                        </div> <!-- end card-body -->
                    </div> <!-- end card -->

                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Server side</h5>
                        </div>  <!-- end card-header -->
                        <div class="card-body">
                            <p>We recommend using client side validation, but in case you require server side, you can indicate invalid and valid form fields with
                                <code>.is-invalid</code> and <code>.is-valid</code>. Note that
                                <code>.invalid-feedback</code> is also supported with these classes.
                            </p>
                            <form>
                                <div class="form-row row">
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label" for="validationServer01">First name</label>
                                        <input type="text" class="form-control is-valid" id="validationServer01" placeholder="First name" value="Mark" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div> <!-- end col -->
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label" for="validationServer02">Last name</label>
                                        <input type="text" class="form-control is-valid" id="validationServer02" placeholder="Last name" value="Otto" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div> <!-- end col -->
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label" for="validationServerUsername">Username</label>
                                        <div class="input-group input-grp">
                                            <span class="input-group-text" id="inputGroupPrepend3">@</span>
                                            <input type="text" class="form-control is-invalid" id="validationServerUsername" placeholder="Username" aria-describedby="inputGroupPrepend3" required>
                                            <div class="invalid-feedback">
                                                Please choose a username.
                                            </div>
                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->
                                <div class="form-row row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label" for="validationServer03">City</label>
                                        <input type="text" class="form-control is-invalid" id="validationServer03" placeholder="City" required>
                                        <div class="invalid-feedback">
                                            Please provide a valid city.
                                        </div>
                                    </div> <!-- end col -->
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label" for="validationServer04">State</label>
                                        <input type="text" class="form-control is-invalid" id="validationServer04" placeholder="State" required>
                                        <div class="invalid-feedback">
                                            Please provide a valid state.
                                        </div>
                                    </div> <!-- end col -->
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label" for="validationServer05">Zip</label>
                                        <input type="text" class="form-control is-invalid" id="validationServer05" placeholder="Zip" required>
                                        <div class="invalid-feedback">
                                            Please provide a valid zip.
                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->
                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input is-invalid" type="checkbox" value="" id="invalidCheck3" required>
                                        <label class="form-check-label" for="invalidCheck3">
                                            Agree to terms and conditions
                                        </label>
                                        <div class="invalid-feedback">
                                            You must agree before submitting.
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-primary" type="submit">Submit form</button>
                            </form>
                        </div> <!-- end card-body -->
                    </div> <!-- end card -->

                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Supported elements</h5>
                        </div> <!-- end card-header -->
                        <div class="card-body pb-1">
                            <p>Form validation styles are also available for bootstrap custom form controls.</p>
                            <div class="row">
                                <div class="col-sm">
                                    <form class="was-validated">
                                        <div class="mb-3">
                                            <label for="validationTextarea" class="form-label">Textarea</label>
                                            <textarea class="form-control is-invalid" id="validationTextarea" placeholder="Required example textarea" required></textarea>
                                            <div class="invalid-feedback">
                                                Please enter a message in the textarea.
                                            </div>
                                        </div>

                                        <div class="form-check mb-3">
                                            <input type="checkbox" class="form-check-input" id="validationFormCheck1" required>
                                            <label class="form-check-label" for="validationFormCheck1">Check this checkbox
                                            </label>
                                            <div class="invalid-feedback">Example invalid feedback text</div>
                                        </div>

                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" id="validationFormCheck2" name="radio-stacked" required>
                                            <label class="form-check-label" for="validationFormCheck2">Toggle this radio
                                            </label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input type="radio" class="form-check-input" id="validationFormCheck3" name="radio-stacked" required>
                                            <label class="form-check-label" for="validationFormCheck3">Or toggle this other radio</label>
                                            <div class="invalid-feedback">More example invalid feedback text</div>
                                        </div>

                                        <div class="mb-3">
                                            <select class="form-select" required aria-label="select example">
                                                <option value="">Open this select menu</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                            <div class="invalid-feedback">Example invalid select feedback</div>
                                        </div>

                                        <div class="mb-3">
                                            <input type="file" class="form-control" aria-label="file example" required>
                                            <div class="invalid-feedback">Example invalid form file feedback</div>
                                        </div>
                                    </form>
                                </div>  <!-- end col -->
                            </div> <!-- end row -->
                        </div> <!-- end card-body -->
                    </div> <!-- end card -->

                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Tooltips</h5>
                        </div> <!-- end card-header -->
                        <div class="card-body">
                            <p>You can swap the <code>.{valid|invalid}-feedback</code> classes for
                                <code>.{valid|invalid}-tooltip</code> classes to display validation feedback in a styled tooltip.
                            </p>
                            <form class="row g-3 needs-validation" novalidate>
                                <div class="col-md-4 position-relative">
                                    <label for="validationTooltip01" class="form-label">First name</label>
                                    <input type="text" class="form-control" id="validationTooltip01" value="Mark" required>
                                    <div class="valid-tooltip">
                                        Looks good!
                                    </div>
                                </div> <!-- end col -->
                                <div class="col-md-4 position-relative">
                                    <label for="validationTooltip02" class="form-label">Last name</label>
                                    <input type="text" class="form-control" id="validationTooltip02" value="Otto" required>
                                    <div class="valid-tooltip">
                                        Looks good!
                                    </div>
                                </div> <!-- end col -->
                                <div class="col-md-4 position-relative">
                                    <label for="validationTooltipUsername" class="form-label">Username</label>
                                    <div class="input-group has-validation">
                                        <span class="input-group-text" id="validationTooltipUsernamePrepend">@</span>
                                        <input type="text" class="form-control" id="validationTooltipUsername" aria-describedby="validationTooltipUsernamePrepend" required>
                                        <div class="invalid-tooltip">
                                            Please choose a unique and valid username.
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                                <div class="col-md-6 position-relative">
                                    <label for="validationTooltip03" class="form-label">City</label>
                                    <input type="text" class="form-control" id="validationTooltip03" required>
                                    <div class="invalid-tooltip">
                                        Please provide a valid city.
                                    </div>
                                </div> <!-- end col -->
                                <div class="col-md-3 position-relative">
                                    <label for="validationTooltip04" class="form-label">State</label>
                                    <select class="form-select" id="validationTooltip04" required>
                                        <option selected disabled value="">Choose...</option>
                                        <option>...</option>
                                    </select>
                                    <div class="invalid-tooltip">
                                        Please select a valid state.
                                    </div>
                                </div> <!-- end col -->
                                <div class="col-md-3 position-relative">
                                    <label for="validationTooltip05" class="form-label">Zip</label>
                                    <input type="text" class="form-control" id="validationTooltip05" required>
                                    <div class="invalid-tooltip">
                                        Please provide a valid zip.
                                    </div>
                                </div> <!-- end col -->
                                <div class="col-12">
                                    <button class="btn btn-primary" type="submit">Submit form</button>
                                </div> <!-- end col -->
                            </form> <!-- end row -->
                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                </div> <!-- end col -->
                
            </div>
            <!-- end row -->
            
        </div>
        <!-- End Content -->

        @component('components.footer')
        @endcomponent

    </div>
    
    <!-- ========================
        End Page Content
    ========================= -->
@endsection