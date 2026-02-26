<?php $page = 'form-input-groups'; ?>
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
                    <h4 class="fs-18 fw-semibold mb-0">Input Groups</h4>
                </div>

                <div class="text-end">
                    <ol class="breadcrumb m-0 py-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                        
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Form</a></li>
                        
                        <li class="breadcrumb-item active">Input Groups</li>
                    </ol>
                </div>
            </div>
            <!-- End Page Header -->
            
            <!-- start row -->
            <div class="row">
                <div class="col-xl-12">
                
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Basic Examples</h5>
                        </div>
                        <div class="card-body">
                        
                            <!-- Start Form -->
                            <form action="#">
                                <div class="mb-3 row">
                                    <label class="form-label col-lg-2">Group Left</label>
                                    <div class="col-lg-10">
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon1">@</span>
                                            <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="form-label col-lg-2">Group Right</label>
                                    <div class="col-lg-10">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                            <span class="input-group-text" id="basic-addon2">@example.com</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="form-label col-lg-2">URL Example</label>
                                    <div class="col-lg-10">
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon3">https://example.com/users/</span>
                                            <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="form-label col-lg-2">Group with Price</label>
                                    <div class="col-lg-10">
                                        <div class="input-group">
                                            <span class="input-group-text">$</span>
                                            <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                                            <span class="input-group-text">.00</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3 row mb-0">
                                    <label class="form-label col-lg-2">Group with Price (Left)</label>
                                    <div class="col-lg-10">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">$</span>
                                            <span class="input-group-text">0.00</span>
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-text">$</span>
                                            <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                                            <span class="input-group-text">.00</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="form-label col-lg-2">With textarea</label>
                                    <div class="col-lg-10">
                                        <div class="input-group">
                                            <span class="input-group-text">With textarea</span>
                                            <textarea class="form-control" aria-label="With textarea"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!-- End Form -->
                            
                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                    
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Sizing</h5>
                        </div>
                        <div class="card-body pb-1">
                        
                            <!-- Start Form -->
                            <form action="#">
                                <div class="mb-3 row">
                                    <label class="form-label col-lg-2">Input Group Large</label>
                                    <div class="col-lg-10">
                                        <div class="input-group input-group-lg">
                                            <span class="input-group-text" id="inputGroup-sizing-lg">Large</span>
                                            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="form-label col-lg-2">Input Group Default</label>
                                    <div class="col-lg-10">
                                        <div class="input-group">
                                            <span class="input-group-text" id="inputGroup-sizing-default">Default</span>
                                            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="form-label col-lg-2">Input Group Small</label>
                                    <div class="col-lg-10">
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">Small</span>
                                            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!-- End Form -->
                            
                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                    
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Checkbox and Radio Addons</h5>
                        </div>
                        <div class="card-body pb-1">
                        
                            <!-- Start Form -->
                            <form action="#">
                                <div class="mb-3 row">
                                    <label class="form-label col-lg-2">Checkbox</label>
                                    <div class="col-lg-10">
                                        <div class="input-group">
                                            <div class="input-group-text">
                                                <input class="form-check-input" type="checkbox" value="" aria-label="Checkbox for following text input">
                                            </div>
                                            <input type="text" class="form-control" aria-label="Text input with checkbox">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="form-label col-lg-2">Radio</label>
                                    <div class="col-lg-10">
                                        <div class="input-group">
                                            <div class="input-group-text">
                                                <input class="form-check-input" type="radio" value="" aria-label="Radio button for following text input">
                                            </div>
                                            <input type="text" class="form-control" aria-label="Text input with radio button">
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!-- End Form -->
                            
                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                    
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Multiple Addons</h5>
                        </div>
                        <div class="card-body">
                        
                            <!-- Start Form -->
                            <form action="#">
                            
                                <div class="mb-3 row">
                                    <label class="form-label col-lg-2">Radio and Text Addons</label>
                                    <div class="col-lg-10">
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <input type="checkbox">
                                            </span>
                                            <span class="input-group-text">$</span>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 row ">
                                    <label class="form-label col-lg-2">Two Addons Left</label>
                                    <div class="col-lg-10">
                                        <div class="input-group">
                                            <span class="input-group-text">$</span>
                                            <span class="input-group-text">0.00</span>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="form-label col-lg-2">Two Addons Right</label>
                                    <div class="col-lg-10">
                                        <div class="input-group">
                                            <input type="text" class="form-control">
                                            <span class="input-group-text">$</span>
                                            <span class="input-group-text">0.00</span>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!-- End Form -->
                            
                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                    
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Button addons</h5>
                        </div>
                        <div class="card-body">
                        
                            <!-- Start Form -->
                            <form action="#">
                                <div class="input-group mb-3">
                                    <button class="btn btn-outline-secondary" type="button" id="button-addon1">Button</button>
                                    <input type="text" class="form-control" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                                </div>

                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
                                    <button class="btn btn-outline-secondary" type="button" id="button-addon2">Button</button>
                                </div>

                                <div class="input-group mb-3">
                                        <button class="btn btn-outline-secondary" type="button">Button</button>
                                    <button class="btn btn-outline-secondary" type="button">Button</button>
                                    <input type="text" class="form-control" placeholder="" aria-label="Example text with two button addons">
                                </div>

                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username with two button addons">
                                    <button class="btn btn-outline-secondary" type="button">Button</button>
                                    <button class="btn btn-outline-secondary" type="button">Button</button>
                                </div>
                            </form>
                            <!-- End Form -->
                            
                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                    
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Buttons with dropdowns</h5>
                        </div>
                        <div class="card-body pb-1">
                        
                            <!-- Start Form -->
                            <form action="#">
                                <div class="mb-3 row">
                                    <label class="form-label col-lg-2">Left Dropdown Text Addons</label>
                                    <div class="col-lg-10">
                                        <div class="input-group">
                                            <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Dropdown</button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="javascript:void(0);">Action</a>
                                                </li>
                                                <li><a class="dropdown-item" href="javascript:void(0);">Another
                                                        action</a></li>
                                                <li><a class="dropdown-item" href="javascript:void(0);">Something
                                                        else here</a></li>
                                                <li>
                                                    <hr class="dropdown-divider">
                                                </li>
                                                <li><a class="dropdown-item" href="javascript:void(0);">Separated
                                                        link</a></li>
                                            </ul>
                                            <input type="text" class="form-control" aria-label="Text input with dropdown button">
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3 row mb-0">
                                    <label class="form-label col-lg-2">Right Dropdown Text Addons</label>
                                    <div class="col-lg-10">
                                        <div class="input-group">
                                            <input type="text" class="form-control" aria-label="Text input with dropdown button">
                                            <button class="btn btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Dropdown</button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li><a class="dropdown-item" href="javascript:void(0);">Action</a>
                                                </li>
                                                <li><a class="dropdown-item" href="javascript:void(0);">Another
                                                        action</a></li>
                                                <li><a class="dropdown-item" href="javascript:void(0);">Something
                                                        else here</a></li>
                                                <li>
                                                    <hr class="dropdown-divider">
                                                </li>
                                                <li><a class="dropdown-item" href="javascript:void(0);">Separated
                                                        link</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <label class="form-label col-lg-2">Right Dropdown Text Addons</label>
                                    <div class="col-lg-10">
                                        <div class="input-group mb-2">
                                            <button class="btn btn-soft-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Dropdown</button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="javascript:void(0);">Action
                                                        before</a></li>
                                                <li><a class="dropdown-item" href="javascript:void(0);">Another
                                                        action before</a></li>
                                                <li><a class="dropdown-item" href="javascript:void(0);">Something
                                                        else here</a></li>
                                                <li>
                                                    <hr class="dropdown-divider">
                                                </li>
                                                <li><a class="dropdown-item" href="javascript:void(0);">Separated
                                                        link</a></li>
                                            </ul>
                                            <input type="text" class="form-control" aria-label="Text input with 2 dropdown buttons">
                                            <button class="btn btn-soft-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Dropdown</button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li><a class="dropdown-item" href="javascript:void(0);">Action</a>
                                                </li>
                                                <li><a class="dropdown-item" href="javascript:void(0);">Another
                                                        action</a></li>
                                                <li><a class="dropdown-item" href="javascript:void(0);">Something
                                                        else here</a></li>
                                                <li>
                                                    <hr class="dropdown-divider">
                                                </li>
                                                <li><a class="dropdown-item" href="javascript:void(0);">Separated
                                                        link</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!-- End Form -->
                            
                        </div> <!-- end card-body -->
                    </div> <!-- end card -->

                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Segmented Buttons</h5>
                        </div>
                        <div class="card-body">
                            <div class="input-group mb-3">
                                <button type="button" class="btn btn-outline-secondary">Action</button>
                                <button type="button" class="btn btn-outline-secondary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                                    <span class="visually-hidden">Toggle Dropdown</span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#">Separated link</a></li>
                                </ul>
                                <input type="text" class="form-control" aria-label="Text input with segmented dropdown button">
                            </div>

                            <div class="input-group">
                                <input type="text" class="form-control" aria-label="Text input with segmented dropdown button">
                                <button type="button" class="btn btn-outline-secondary">Action</button>
                                <button type="button" class="btn btn-outline-secondary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                                    <span class="visually-hidden">Toggle Dropdown</span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#">Separated link</a></li>
                                </ul>
                            </div>
                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                    

                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Custom Select</h5>
                        </div>
                        <div class="card-body">
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="inputGroupSelect01">Options</label>
                                <select class="form-select" id="inputGroupSelect01">
                                    <option selected>Choose...</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>

                            <div class="input-group mb-3">
                                <select class="form-select" id="inputGroupSelect02">
                                    <option selected>Choose...</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                                <label class="input-group-text" for="inputGroupSelect02">Options</label>
                            </div>

                            <div class="input-group mb-3">
                                <button class="btn btn-outline-secondary" type="button">Button</button>
                                <select class="form-select" id="inputGroupSelect03" aria-label="Example select with button addon">
                                    <option selected>Choose...</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>

                            <div class="input-group">
                                <select class="form-select" id="inputGroupSelect04" aria-label="Example select with button addon">
                                    <option selected>Choose...</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                                <button class="btn btn-outline-secondary" type="button">Button</button>
                            </div>
                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                    

                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Custom File Input</h5>
                        </div>
                        <div class="card-body">
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="inputGroupFile01">Upload</label>
                                <input type="file" class="form-control" id="inputGroupFile01">
                            </div>

                            <div class="input-group mb-3">
                                <input type="file" class="form-control" id="inputGroupFile02">
                                <label class="input-group-text" for="inputGroupFile02">Upload</label>
                            </div>

                            <div class="input-group mb-3">
                                <button class="btn btn-outline-secondary" type="button" id="inputGroupFileAddon03">Button</button>
                                <input type="file" class="form-control" id="inputGroupFile03" aria-describedby="inputGroupFileAddon03" aria-label="Upload">
                            </div>

                            <div class="input-group">
                                <input type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                                <button class="btn btn-outline-secondary" type="button" id="inputGroupFileAddon04">Button</button>
                            </div>
                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                    
                </div> <!-- end card -->
            </div> <!-- end row -->

        </div> <!-- End Content -->

        @component('components.footer')
        @endcomponent

    </div>
    
    <!-- ========================
        End Page Content
    ========================= -->
@endsection