<?php $page = 'add-debit-notes'; ?>
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
                <div class="col-md-11 mx-auto">

                    <!-- Start Breadcrumb -->
                    <div class="d-flex d-block align-items-center justify-content-between flex-wrap gap-3 mb-3">
                        <div>
                            <h6><a href="{{url('debit-notes')}}" class="d-flex align-items-center "><i class="isax isax-arrow-left me-2"></i>Debit Note</a></h6>
                        </div>
                        <div class="d-flex my-xl-auto right-content align-items-center flex-wrap gap-2">
                            <div class="me-1">
                                <a href="javascript:void(0);" class="btn btn-outline-white d-inline-flex align-items-center">
                                    <i class="isax isax-eye me-1"></i>Preview
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- End Breadcrumb -->

                    <div class="card">
                        <div class="card-body">
                            <div class="top-content">
                                <div class="purchase-header mb-3">
                                    <h6>Purchase Order Details</h6>
                                </div>
                                <div>

                                    <!-- start row -->
                                    <div class="row justify-content-between">
                                        <div class="col-md-6">
                                            <div class="purchase-top-content">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="form-label">Debit Note Id</label>
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
                                                        <label class="form-label">Debit Note Date</label>
                                                        <div class="input-group position-relative mb-3">
                                                            <input type="text" class="form-control datetimepicker rounded-end" placeholder="25 Mar 2025">
                                                            <span class="input-icon-addon fs-16 text-gray-9">
                                                                <i class="isax isax-calendar-2"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <a href="javascript:void(0);" class="d-flex align-items-center "><i
                                                                class="isax isax-add-circle5 me-1 text-primary"></i>Add
                                                            Due Date</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- end col -->
                                        <div class="col-md-4">
                                            <div class="purchase-top-content">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <div class="logo-image">
                                                                <img src="{{URL::asset('build/img/invoice-logo.svg')}}" class="invoice-logo-dark" alt="img">
                                                                <img src="{{URL::asset('build/img/invoice-logo-white-2.svg')}}" class="invoice-logo-white" alt="img">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <select class="select">
                                                                <option>Select Status</option>
                                                                <option>Paid</option>
                                                                <option>Pending</option>
                                                                <option>Cancelled</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <select class="select">
                                                                <option>Currency</option>
                                                                <option>$</option>
                                                                <option>€</option>
                                                                <option>₹</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="p-2 border rounded d-flex justify-content-between">
                                                            <div class="d-flex align-items-center">
                                                                <div class="form-check form-switch me-4">
                                                                    <input class="form-check-input" type="checkbox" role="switch" id="enabe_tax" checked>
                                                                    <label class="form-check-label" for="enabe_tax">Enable Tax</label>
                                                                </div>
                                                            </div>
                                                            <div>
                                                                <a href="javascript:void(0);"><span
                                                                        class="bg-primary-subtle p-1 rounded"><i
                                                                            class="isax isax-setting-2 text-primary"></i></span></a>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div><!-- end col -->
                                    </div>
                                    <!-- end row -->

                                </div>
                            </div>
                            <div class="bill-content pb-0">

                                <!-- start row -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card box-shadow-0">
                                            <div class="card-header border-0 pb-0">
                                                <h6>Bill From</h6>
                                            </div>
                                            <div class="card-body">
                                                <div class="mb-3">
                                                    <label class="form-label">Billed By</label>
                                                    <select class="select">
                                                        <option>Select</option>
                                                        <option>Kanakku</option>
                                                    </select>
                                                </div>
                                                <div class="p-3 bg-light rounded border">
                                                    <div class="d-flex">
                                                        <div class="me-3">
                                                            <span class="p-2 rounded border"><img src="{{URL::asset('build/img/logo-small.svg')}}" alt="image" class="img-fluid"></span>
                                                        </div>
                                                        <div>
                                                            <h6 class="fs-14 mb-1">Kanakku Invoice Management</h6>
                                                            <p class="mb-0">15 Hodges Mews, HP12 3JL, United Kingdom
                                                            </p>
                                                            <p class="mb-0">Phone : +1 54664 75945</p>
                                                            <p class="mb-0">Email : info@example.com</p>
                                                            <p class="text-dark mb-0">GST : 243E45767889</p>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div><!-- end col -->
                                    <div class="col-md-6">
                                        <div class="card box-shadow-0">
                                            <div class="card-header border-0 pb-0">
                                                <h6>Bill To</h6>
                                            </div>
                                            <div class="card-body">
                                                <div class="mb-3">
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <label class="form-label">Vendor Name</label>
                                                        <a href="javascript:void(0);" class="d-flex align-items-center"><i
                                                                class="isax isax-add-circle5 text-primary me-1"></i>Add
                                                            New</a>
                                                    </div>

                                                    <select class="select">
                                                        <option>Select</option>
                                                        <option>Timesquare Tech</option>
                                                    </select>
                                                </div>
                                                <div class="p-3 bg-light rounded border">
                                                    <div class="d-flex">
                                                        <div class="me-3">
                                                            <span><img src="{{URL::asset('build/img/icons/timesquare-icon.svg')}}" alt="image" class="img-fluid rounded"></span>
                                                        </div>
                                                        <div>
                                                            <h6 class="fs-14 mb-1">Timesquare Tech</h6>
                                                            <p class="mb-0">299 Star Trek Drive, Florida, 32405, USA
                                                            </p>
                                                            <p class="mb-0">Phone : +1 54664 75945</p>
                                                            <p class="mb-0">Email : info@example.com</p>
                                                            <p class="text-dark mb-0">GST : 243E45767889</p>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div><!-- end col -->
                                </div>
                                <!-- end row -->

                            </div>
                            <div class="items-details">
                                <div class="purchase-header mb-3">
                                    <h6>Items & Details</h6>
                                </div>

                                <!-- start row -->
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <h6 class="fs-14 mb-1">Item Type</h6>
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked>
                                                    <label class="form-check-label" for="flexRadioDefault1">
                                                        Product
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                                                    <label class="form-check-label" for="flexRadioDefault2">
                                                        Service
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Products/Services</label>
                                            <select class="select">
                                                <option>Select</option>
                                                <option>Nike Jordon</option>
                                                <option>Enter Product Name</option>
                                            </select>
                                        </div>

                                    </div><!-- end col -->
                                </div>
                                <!-- end row -->

                                <!-- Table list start -->
                                <div class="table-responsive rounded border-bottom-0 border mb-3">
                                    <table class="table table-nowrap add-table mb-0">
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
                                <!-- Table list end -->

                                <div>
                                    <a href="#" class="d-inline-flex align-items-center add-invoice-data"><i class="isax isax-add-circle5 text-primary me-1"></i>Add New</a>
                                </div>

                            </div>

                            <div class="extra-info">

                                <!-- start row -->
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="mb-3">
                                            <h6 class="mb-3">Extra Information</h6>
                                            <div>
                                                <ul class="nav nav-tabs nav-solid-primary mb-3" role="tablist">
                                                    <li class="nav-item me-2" role="presentation">
                                                        <a class="nav-link active border fs-12 fw-semibold rounded" data-bs-toggle="tab" data-bs-target="#notes" aria-current="page" href="javascript:void(0);"><i class="isax isax-document-text me-1"></i>Add Notes</a>
                                                    </li>
                                                    <li class="nav-item me-2" role="presentation">
                                                        <a class="nav-link border fs-12 fw-semibold rounded" data-bs-toggle="tab" data-bs-target="#terms" href="javascript:void(0);"><i class="isax isax-document me-1"></i>Add Terms & Conditions</a>
                                                    </li>
                                                    <li class="nav-item" role="presentation">
                                                        <a class="nav-link border fs-12 fw-semibold rounded" data-bs-toggle="tab" data-bs-target="#bank" href="javascript:void(0);"><i class="isax isax-bank me-1"></i>Bank Details</a>
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
                                    <div class="col-md-5">
                                        <ul class="mb-0 ps-0 list-unstyled">
                                            <li class="mb-3">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <p class="fw-semibold fs-14 text-gray-9 mb-0">Amount</p>
                                                    <h6 class="fs-14">$ 565</h6>
                                                </div>
                                            </li>
                                            <li class="mb-3">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <p class="fw-semibold fs-14 text-gray-9 mb-0">CGST (9%)</p>
                                                    <h6 class="fs-14">$18</h6>
                                                </div>
                                            </li>
                                            <li class="mb-3">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <p class="fw-semibold fs-14 text-gray-9 mb-0">SGST (9%)</p>
                                                    <h6 class="fs-14">$18</h6>
                                                </div>
                                            </li>
                                            <li class="mb-3">
                                                <a href="javascript:void(0);" class="d-flex align-items-center "><i class="isax isax-add-circle5 text-primary me-1"></i>Add Additional Charges</a>
                                            </li>
                                            <li class="mb-3">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <p class="fw-semibold fs-14 text-gray-9 mb-0">Discount</p>
                                                    <div>
                                                        <select class="select">
                                                            <option>Select</option>
                                                            <option>0 %</option>
                                                            <option>1 %</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="pb-2 border-gray border-bottom">
                                                <div class="p-2 d-flex justify-content-between">
                                                    <div class="d-flex align-items-center">
                                                        <div class="form-check form-switch me-4">
                                                            <input class="form-check-input" type="checkbox" role="switch" id="enabe_tax1" checked>
                                                            <label class="form-check-label" for="enabe_tax1">Round Off Total</label>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <h6 class="fs-14">$596</h6>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="mt-3 pb-3 border-bottom border-gray">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <h6>Total (USD)</h6>
                                                    <h6>$ 596</h6>
                                                </div>
                                            </li>
                                            <li class="mt-3 pb-3 border-bottom border-gray">
                                                <h6 class="fs-14 fw-semibold">Total In Words</h6>
                                                <p>Five Hundred & Ninety Six Dollars</p>
                                            </li>
                                            <li class="mt-3 mb-3">
                                                <div>
                                                    <select class="select">
                                                        <option>Select Signature</option>
                                                        <option>Adrian</option>
                                                    </select>
                                                </div>
                                            </li>
                                            <li class="mb-3">
                                                <div class="d-flex align-items-center justify-content-center">
                                                    OR
                                                </div>

                                            </li>
                                            <li class="mb-2">
                                                <div class="mb-3">
                                                    <label class="form-label">Signature Name</label>
                                                    <input type="text" class="form-control" value="Adrian">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="singnature-upload bg-light d-flex align-items-center justify-content-center">
                                                    <div class="drag-upload-btn bg-light position-relative mb-2 fs-14 fw-normal text-gray-5">
                                                        <i class="isax isax-image me-1 text-primary"></i>Upload Image
                                                        <input type="file" class="form-control image-sign" multiple="">
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div><!-- end col -->
                                </div>
                                <!-- end row -->

                            </div>
                        </div><!-- end card body -->

                        <div class=" card-footer d-flex align-items-center justify-content-between">
                            <button type="button" class="btn btn-outline-white">Cancel</button>
                            <button type="submit" class="btn btn-primary">Create New</button>
                        </div><!-- end card footer -->
                    </div><!-- end card -->
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
@endsection