<?php $page = 'add-credit-notes'; ?>
@extends('layout.mainlayout')
@section('content')
    <!-- ========================
        Start Page Content
    ========================= -->

    <div class="page-wrapper">

        <!-- Start Content -->
        <div class="content">

            <!-- start row -->
            <div class="row">
                <div class="col-xxl-10 col-lg-11 mx-auto">
                    <div>
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h6><a href="{{url('credit-notes')}}"><i class="isax isax-arrow-left me-2"></i>Credit Notes</a></h6>
                            <a href="javascript:void(0);" class="btn btn-outline-white d-inline-flex align-items-center" data-bs-toggle="modal" data-bs-target="#view_notes"><i class="isax isax-eye me-1"></i>Preview</a>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h6 class="mb-3">Credit Note Details</h6>
                                <form action="{{url('credit-notes')}}">
                                    <div class="border-bottom mb-3 pb-1">
                                        
                                        <!-- start row -->
                                        <div class="row justify-content-between">
                                            <div class="col-xl-5 col-lg-7">
                                                <div class="row gx-3">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="form-label">Credit Note Id</label>
                                                            <input type="text" class="form-control" placeholder="9876543" readonly="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="form-label">Reference Number</label>
                                                            <input type="text" class="form-control" value="1254569">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                                <label class="form-label">Customer Name</label>
                                                                <a href="#" class="d-inline-flex align-items-center">
                                                                    <i class="isax isax-add-circle5 text-primary me-1"></i>Add New
                                                                </a>
                                                            </div>
                                                            <select class="select">
                                                                <option>Timesquare Tech</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="form-label">Related To</label>
                                                            <select class="select">
                                                                <option>Select Invoice</option>
                                                                <option>INV00025</option>
                                                                <option>INV00024</option>
                                                                <option>INV00023</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label class="form-label">Credit Note Date</label>
                                                        <div class="input-group position-relative mb-3">
                                                            <input type="text" class="form-control datetimepicker rounded-end" value="25-03-2025">
                                                            <span class="input-icon-addon fs-16 text-gray-9">
                                                                <i class="isax isax-calendar-2"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <a href="#" class="d-inline-flex align-items-center"><i class="isax isax-add-circle5 text-primary me-1"></i>Add Due Date</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- end col -->
                                            <div class="col-xl-5 col-lg-5">

                                                <!-- start row -->
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="border border-dashed bg-light rounded text-center p-3 mb-3">
                                                            <img src="{{URL::asset('build/img/invoice-logo.svg')}}" class="invoice-logo-dark" alt="img">
                                                            <img src="{{URL::asset('build/img/invoice-logo-white-2.svg')}}" class="invoice-logo-white" alt="img">
                                                        </div>
                                                    </div><!-- end col -->
                                                    <div class="col-lg-12">
                                                        <div class="row gx-3">
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <select class="select">
                                                                        <option>Select Status</option>
                                                                        <option>Paid</option>
                                                                        <option>Pending</option>
                                                                        <option>Cancelled</option>
                                                                        <option>Partially Paid</option>
                                                                        <option>Uncollectable</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <select class="select">
                                                                        <option>Currency</option>
                                                                        <option>$</option>
                                                                        <option>€</option>
                                                                        <option>£</option>
                                                                        <option>₹</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div><!-- end col -->
                                                    <div class="col-md-12">
                                                        <div class="d-flex align-items-center justify-content-between border rounded p-2 mb-3">
                                                            <div class="form-check form-switch me-4">
                                                                <input class="form-check-input" type="checkbox" role="switch" id="enabe_tax" checked>
                                                                <label class="form-check-label" for="enabe_tax">Enable Tax</label>
                                                            </div>
                                                            <div>
                                                                <a href="#" class="btn btn-icon btn-sm btn-soft-primary"><i class="isax isax-setting-2 fs-16"></i></a>
                                                            </div>
                                                        </div>
                                                    </div><!-- end col -->
                                                </div>
                                                <!-- end row -->
                                            </div><!-- end col -->
                                        </div>
                                        <!-- end row -->
                                    </div>

                                    <div class="border-bottom mb-3">

                                        <!-- start row -->
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="card shadow-none">
                                                    <div class="card-body">
                                                        <h6 class="mb-3">Bill From</h6>
                                                        <div class="mb-3">
                                                            <label class="form-label">Billed By</label>
                                                            <input type="text" class="form-control" value="Kanakku">
                                                        </div>
                                                        <div class="p-3 bg-light rounded border">
                                                            <div class="d-flex">
                                                                <div class="me-3">
                                                                    <span class="p-2 rounded border"><img src="{{URL::asset('build/img/logo-small.svg')}}" alt="image" class="img-fluid"></span>
                                                                </div>
                                                                <div>
                                                                    <h6 class="fs-14 mb-1 fw-semibold">Kanakku Invoice Management</h6>
                                                                    <p class="mb-1 fs-13">15 Hodges Mews, HP12 3JL, United Kingdom
                                                                    </p>
                                                                    <p class="mb-1 fs-13">Phone : +1 54664 75945</p>
                                                                    <p class="mb-1 fs-13">Email : info@example.com</p>
                                                                    <p class="text-dark mb-0 fs-13">GST : 243E45767889</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- end col -->
                                            <div class="col-lg-6">
                                                <div class="card shadow-none">
                                                    <div class="card-body">
                                                        <h6 class="mb-3">Bill To</h6>
                                                        <div class="mb-3">
                                                            <label class="form-label">Customer Name</label>
                                                            <input type="text" class="form-control" value="Timesquare Tech">
                                                        </div>
                                                        <div class="p-3 bg-light rounded border">
                                                            <div class="d-flex">
                                                                <div class="me-3">
                                                                    <span><img src="{{URL::asset('build/img/icons/timesquare-icon.svg')}}" alt="image" class="img-fluid rounded"></span>
                                                                </div>
                                                                <div>
                                                                    <h6 class="fs-14 mb-1 fw-semibold">Timesquare Tech</h6>
                                                                    <p class="mb-1 fs-13">299 Star Trek Drive, Florida, 32405, USA
                                                                    </p>
                                                                    <p class="mb-1 fs-13">Phone : +1 54664 75945</p>
                                                                    <p class="mb-1 fs-13">Email : info@example.com</p>
                                                                    <p class="text-dark mb-0 fs-13">GST : 243E45767889</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- end col -->
                                        </div>
                                        <!-- end row -->
                                    </div>

                                    <div class="border-bottom mb-3 pb-3">

                                        <!-- start row -->
                                        <div class="row">
                                            <div class="col-xl-4 col-md-6">
                                                <h6 class="mb-3">Items & Details</h6>
                                                <div>
                                                    <label class="form-label">Item Type</label>
                                                    <div class="d-flex align-items-center mb-3">
                                                        <div class="form-check me-3">
                                                            <input class="form-check-input" type="radio" name="Radio" id="Radio-sm-1" checked="">
                                                            <label class="form-check-label" for="Radio-sm-1">
                                                                Product
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="Radio" id="Radio-sm-2">
                                                            <label class="form-check-label" for="Radio-sm-2">
                                                                Service
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Products/Services</label>
                                                    <select class="select">
                                                        <option>Select</option>
                                                        <option>Apple iPhone 15</option>
                                                        <option>Dell XPS 13 9310</option>
                                                        <option>Bose QuietComfort 45</option>
                                                        <option>Nike Dri-FIT T-shirt</option>
                                                        <option>Adidas Ultraboost </option>
                                                    </select>
                                                </div>
                                            </div><!-- end col -->
                                        </div>
                                        <!-- end row -->

                                        <div class="table-responsive rounded table-nowrap border-bottom-0 border mb-3">
                                            <table class="table mb-0 add-table">
                                                <thead class="table-dark">
                                                    <tr>
                                                        <th>Product/Service</th>
                                                        <th>Quantity</th>
                                                        <th>Unit</th>
                                                        <th>Rate</th>
                                                        <th>Discount</th>
                                                        <th>Tax (%)</th>
                                                        <th>Amount</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody class="add-tbody">
                                                    <tr>
                                                        <td>
                                                            <input type="text" class="form-control" value="Nike Jordon">
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control" value="1" style="min-width: 66px;">
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control" value="Pcs" style="min-width: 66px;">
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control" value="$1360.00" style="min-width: 66px;">
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control" value="0%" style="min-width: 66px;">
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control" value="18" style="min-width: 66px;">
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control" value="$1358.00" style="min-width: 66px;">
                                                        </td>
                                                        <td>
                                                            <div>
                                                                <a href="javascript:void(0);" class="text-danger remove-table"><i class="isax isax-close-circle"></i></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input type="text" class="form-control" value="Enter Product Name">
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control" value="0">
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control" value="Unit">
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control" value="0">
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control" value="0%">
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control" value="0">
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control" value="0" style="min-width: 66px;">
                                                        </td>
                                                        <td>
                                                            <div>
                                                                <a href="javascript:void(0);" class="text-danger remove-table"><i class="isax isax-close-circle"></i></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div>
                                            <a href="#" class="d-inline-flex align-items-center add-invoice-data"><i class="isax isax-add-circle5 text-primary me-1"></i>Add New</a>
                                        </div>
                                    </div>

                                    <div class="border-bottom mb-3">

                                        <!-- start row -->
                                        <div class="row">
                                            <div class="col-lg-7">
                                                <div class="mb-3">
                                                    <h6 class="mb-3">Extra Information</h6>
                                                    <div>
                                                        <ul class="nav nav-tabs nav-solid-primary tab-style-1 border-0 p-0 d-flex flex-wrap gap-3 mb-3" role="tablist">
                                                            <li class="nav-item" role="presentation">
                                                                <a class="nav-link active d-inline-flex align-items-center border fs-12 fw-semibold rounded-2" data-bs-toggle="tab" data-bs-target="#notes" aria-current="page" href="javascript:void(0);"><i class="isax isax-document-text me-1"></i>Add Notes</a>
                                                            </li>
                                                            <li class="nav-item" role="presentation">
                                                                <a class="nav-link d-inline-flex align-items-center border fs-12 fw-semibold rounded-2" data-bs-toggle="tab" data-bs-target="#terms" href="javascript:void(0);"><i class="isax isax-document me-1"></i>Add Terms & Conditions</a>
                                                            </li>
                                                            <li class="nav-item" role="presentation">
                                                                <a class="nav-link d-inline-flex align-items-center border fs-12 fw-semibold rounded-2" data-bs-toggle="tab" data-bs-target="#bank" href="javascript:void(0);"><i class="isax isax-bank me-1"></i>Bank Details</a>
                                                            </li>
                                                        </ul>
                                                        <div class="tab-content">
                                                            <div class="tab-pane active show" id="notes" role="tabpanel">
                                                                <label class="form-label">Additional Notes</label>
                                                                <textarea class="form-control"></textarea>
                                                            </div>
                                                            <div class="tab-pane fade" id="terms" role="tabpanel">
                                                                <label class="form-label">Terms & Conditions</label>
                                                                <textarea class="form-control"></textarea>
                                                            </div>
                                                            <div class="tab-pane fade" id="bank" role="tabpanel">
                                                                <label class="form-label">Account</label>
                                                                <select class="select">
                                                                    <option>Select</option>
                                                                    <option>Andrew - 5225655545555454 (Swiss Bank)</option>
                                                                    <option>Mark Salween - 4654145644566 (International Bank)</option>
                                                                    <option>Sophia Martinez - 7890123456789012 (Global Finance)</option>
                                                                    <option>David Chen - 2345678901234567 (National Bank)</option>
                                                                    <option>Emily Johnson - 3456789012345678 (Community Credit Union)</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- end col -->
                                            <div class="col-lg-5">
                                                <div class="mb-3">
                                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                                        <h6 class="fs-14 fw-semibold">Amount</h6>
                                                        <h6 class="fs-14 fw-semibold">$565</h6>
                                                    </div>
                                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                                        <h6 class="fs-14 fw-semibold">CGST (9%)</h6>
                                                        <h6 class="fs-14 fw-semibold">$18</h6>
                                                    </div>
                                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                                        <h6 class="fs-14 fw-semibold">SGST (9%)</h6>
                                                        <h6 class="fs-14 fw-semibold">$18</h6>
                                                    </div>
                                                    <div class="mb-3">
                                                        <a href="#" class="d-inline-flex align-items-center">
                                                            <i class="isax isax-add-circle5 text-primary me-1"></i>Add Additional Charges
                                                        </a>
                                                    </div>
                                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                                        <h6 class="fs-14 fw-semibold">Discount</h6>
                                                        <input type="text" class="form-control" value="0%" style="width: 106px;">
                                                    </div>
                                                    <div class="d-flex align-items-center justify-content-between border-bottom pb-3 mb-3">
                                                        <div class="form-check form-switch me-4">
                                                            <input class="form-check-input" type="checkbox" role="switch" id="require_check_2" checked="">
                                                            <label class="form-check-label" for="require_check_2">Round Off Total</label>
                                                        </div>
                                                        <h6 class="fs-14 fw-semibold">$596</h6>
                                                    </div>
                                                    <div class="d-flex align-items-center justify-content-between border-bottom pb-3 mb-3">
                                                        <h6>Total (USD)</h6>
                                                        <h6>$596</h6>
                                                    </div>
                                                    <div class="border-bottom mb-3 pb-3">
                                                        <h6 class="fs-14 fw-semibold mb-1">Total In Words</h6>
                                                        <p>Five Hundred &amp; Ninety Six Dollars</p>
                                                    </div>
                                                    <div class="mb-3">
                                                        <div class="mb-3">
                                                            <select class="select">
                                                                <option>Select Signature</option>
                                                                <option>Adrian</option>
                                                                <option>Emily Clark</option>
                                                                <option>John Carter</option>
                                                                <option>Michael Johnson</option>
                                                                <option>Olivia Harris</option>
                                                            </select>
                                                        </div>
                                                        <p class="mb-0 text-center">OR</p>
                                                    </div>
                                                    <div class="mb-2">
                                                        <label class="form-label">Signature Name</label>
                                                        <input type="text" class="form-control" value="Adrian">
                                                    </div>
                                                    <div class="file-upload drag-file w-100 h-auto py-3 d-flex align-items-center justify-content-center flex-column">
                                                        <span class="upload-img d-block"><i class="isax isax-image text-primary me-1"></i>Upload Signature</span>
                                                        <input type="file" accept="video/image">
                                                    </div>
                                                </div>
                                            </div><!-- end col -->
                                        </div>
                                        <!-- end row -->

                                    </div>

                                    <div class="d-flex align-items-center justify-content-between">
                                        <button type="button" class="btn btn-outline-white border">Cancel</button>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>

                                </form>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div>
                </div><!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- End Content -->

        <!-- Start Footer-->
        <div class="footer d-sm-flex align-items-center justify-content-between bg-white py-2 px-4 border-top">
            <p class="text-dark mb-0">&copy; 2025 <a href="javascript:void(0);" class="link-primary">Kanakku</a>, All Rights Reserved</p>
            <p class="text-dark">Version : 1.3.8</p>
        </div>
        <!-- End Footer-->

    </div>

    <!-- ========================
        End Page Content
    ========================= -->

    <!-- Start view notes -->
    <div class="modal fade" id="view_notes">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="d-flex mb-3 pb-3 align-items-center justify-content-between border-bottom">
                        <h5 class="mb-0">Preview</h5>
                        <button type="button" class="text-danger bg-transparent border-0 outline-0 p-0 lh-sm" data-bs-dismiss="modal" aria-label="Close">
                            <i class="isax isax-close-circle5 fs-16"></i>
                        </button>
                    </div>
                    <div>
                        <div class="d-flex align-items-center justify-content-end flex-wrap row-gap-3 mb-3">
                            <div class="d-flex align-items-center flex-wrap row-gap-3">
                                <a href="#" class="btn btn-outline-white d-inline-flex align-items-center me-3"><i class="isax isax-document-like me-1"></i>Download PDF</a>
                                <a href="#" class="btn btn-outline-white d-inline-flex align-items-center me-3"><i class="isax isax-message-notif me-1"></i>Send Email</a>
                                <a href="#" class="btn btn-outline-white d-inline-flex align-items-center me-3"><i class="isax isax-printer me-1"></i>Print</a>
                            </div>
                        </div>
                        <div class="bg-light p-4 rounded position-relative mb-3">
                            <div class="position-absolute top-0 end-0">
                                <img src="{{URL::asset('build/img/bg/card-bg.png')}}" alt="User Img">
                            </div>
                            <div class="d-flex align-items-center justify-content-between border-bottom flex-wrap mb-3 pb-2 position-relative z-1">
                                <div class="mb-3">
                                    <h4 class="mb-1">Credit Notes</h4>
                                    <div class="d-flex align-items-center flex-wrap row-gap-3">
                                        <div class="me-4">
                                            <h6 class="fs-14 fw-semibold mb-1">Dreams Technologies Pvt Ltd.,</h6>
                                            <p>15 Hodges Mews, High Wycombe HP12 3JL, United Kingdom</p>
                                        </div>
                                        <span><img src="{{URL::asset('build/img/icons/not-paid.png')}}" alt="User Img" width="48" height="48"></span>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <img src="{{URL::asset('build/img/invoice-logo.svg')}}" class="invoice-logo-dark" alt="img">
                                    <img src="{{URL::asset('build/img/invoice-logo-white-2.svg')}}" class="invoice-logo-white" alt="img">
                                </div>
                            </div>
                            <div class="row gy-3 position-relative z-1">
                                <div class="col-lg-4">
                                    <div>
                                        <h6 class="mb-2 fs-16 fw-semibold">Credit Notes Details</h6>
                                        <div>
                                            <p class="mb-1">Credit Note Id : <span class="text-dark">9876543</span></p>
                                            <p class="mb-1">Credit Note Date : <span class="text-dark">25 Jan 2025</span></p>
                                            <p class="mb-1">Due Date : <span class="text-dark">31 Jan 2025</span></p>
                                            <p class="mb-1">Related Invoice :  <span class="text-primary">#INV00025</span></p>
                                            <span class="badge bg-danger">Due in 8 days</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div>
                                        <h6 class="mb-2 fs-16 fw-semibold">Billing From</h6>
                                        <div>
                                            <h6 class="fs-14 fw-semibold mb-1">Kanakku Invoice Management</h6>
                                            <p class="mb-1">15 Hodges Mews, HP12 3JL, United Kingdom</p>
                                            <p class="mb-1">Phone : +1 54664 75945</p>
                                            <p class="mb-1">Email : info@example.com</p>
                                            <p class="mb-1">GST : 243E45767889</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div>
                                        <h6 class="mb-2 fs-16 fw-semibold">Billing To</h6>
                                        <div class="bg-white rounded p-3">
                                            <div class="d-flex align-items-center mb-1">
                                                <div class="me-2">
                                                    <span><img src="{{URL::asset('build/img/icons/timesquare-icon.svg')}}" alt="image" class="img-fluid rounded"></span>
                                                </div>
                                                <h6 class="fs-14 fw-semibold">Timesquare Tech</h6>
                                            </div>
                                            <p class="mb-1">299 Star Trek Drive, Florida, 3240, USA</p>
                                            <p class="mb-1">Phone : +1 54664 75945</p>
                                            <p class="mb-1">Email : info@example.com</p>
                                            <p class="mb-0">GST : 243E45767889</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <h6 class="mb-3">Product / Service Items</h6>
                            <div class="table-responsive rounded border-bottom-0 border">
                                <table class="table mb-0">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>#</th>
                                            <th>Product/Service</th>
                                            <th>Quantity</th>
                                            <th>Unit</th>
                                            <th>Rate</th>
                                            <th>Discount</th>
                                            <th>Tax (%)</th>
                                            <th>Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td class="text-dark">T-Shirt</td>
                                            <td>2</td>
                                            <td>Pcs</td>
                                            <td>$200.00</td>
                                            <td>10%</td>
                                            <td>$36.00</td>
                                            <td>$396.00</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td class="text-dark">Office Chair</td>
                                            <td>1</td>
                                            <td>Pcs</td>
                                            <td>$350.00</td>
                                            <td>5%</td>
                                            <td>$33.25</td>
                                            <td>$365.75</td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td class="text-dark">LED Monitor</td>
                                            <td>1</td>
                                            <td>Pcs</td>
                                            <td>$399.00</td>
                                            <td>2%</td>
                                            <td>$39.10</td>
                                            <td>$398.90</td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td class="text-dark">Smartphone</td>
                                            <td>4</td>
                                            <td>Pcs</td>
                                            <td>$100.00</td>
                                            <td>10%</td>
                                            <td>$36.00</td>
                                            <td>$396.00</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="border-bottom mb-3">
                            <div class="row">
                                <div class="col-xl-8 col-lg-6">
                                    <div class="d-flex align-items-center flex-wrap row-gap-3 mb-3">
                                        <div class="me-3">
                                            <p class="mb-2">Scan to the pay</p>
                                            <span><img src="{{URL::asset('build/img/icons/qr.png')}}" alt="User Img"></span>
                                        </div>
                                        <div>
                                            <h6 class="mb-2">Bank Details</h6>
                                            <div>
                                                <p class="mb-1">Bank Name : <span class="text-dark">ABC Bank</span></p>
                                                <p class="mb-1">Account Number : <span class="text-dark">782459739212</span></p>
                                                <p class="mb-1">IFSC Code : <span class="text-dark">ABC0001345</span></p>
                                                <p class="mb-0">Payment Reference : <span class="text-dark">INV-20250220-001</span></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6">
                                    <div class="mb-3">
                                        <div class="d-flex align-items-center justify-content-between mb-3">
                                            <h6 class="fs-14 fw-semibold">Amount</h6>
                                            <h6 class="fs-14 fw-semibold">$1,793.12</h6>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mb-3">
                                            <h6 class="fs-14 fw-semibold">CGST (9%)</h6>
                                            <h6 class="fs-14 fw-semibold">$18</h6>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mb-3">
                                            <h6 class="fs-14 fw-semibold">SGST (9%)</h6>
                                            <h6 class="fs-14 fw-semibold">$18</h6>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between border-bottom pb-3 mb-3">
                                            <h6 class="fs-14 fw-semibold">Discount</h6>
                                            <h6 class="fs-14 fw-semibold text-danger">$18</h6>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between border-bottom pb-3 mb-3">
                                            <h6>Total (USD)</h6>
                                            <h6>$596</h6>
                                        </div>
                                        <div>
                                            <h6 class="fs-14 fw-semibold mb-1">Total In Words</h6>
                                            <p>Five Hundred &amp; Ninety Six Dollars</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="mb-3">
                                    <div class="mb-3">
                                        <h6 class="fs-14 fw-semibold mb-1">Terms and Conditions</h6>
                                        <p>The Payment must be returned in the same condition.</p>
                                    </div>
                                    <div>
                                        <h6 class="fs-14 fw-semibold mb-1">Notes</h6>
                                        <p>All charges are final and include applicable taxes, fees, and additional costs</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="text-lg-end mb-3">
                                    <span><img src="{{URL::asset('build/img/icons/sign.png')}}" class="sign-dark" alt="img"></span>
                                    <h6 class="fs-14 fw-semibold mb-1">Ted M. Davis</h6>
                                    <p>Manager</p>
                                </div>
                            </div>
                        </div>
                        <div class="bg-light d-flex align-items-center justify-content-between p-4 rounded card-bg flex-wrap gap-2">
                            <div>
                                <h6 class="fs-14 fw-semibold mb-1">Dreams Technologies Pvt Ltd.,</h6>
                                <p>15 Hodges Mews, High Wycombe HP12 3JL, United Kingdom</p>
                            </div>
                            <div>
                                <img src="{{URL::asset('build/img/invoice-logo.svg')}}" class="invoice-logo-dark" alt="img">
                                <img src="{{URL::asset('build/img/invoice-logo-white-2.svg')}}" class="invoice-logo-white" alt="img">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End view notes -->
@endsection