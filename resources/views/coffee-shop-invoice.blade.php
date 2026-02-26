<?php $page = 'coffee-shop-invoice'; ?>
@extends('layout.mainlayout')
@section('content')
    <!-- ========================
        Start Page Content
    ========================= -->   

   <!-- Start Content -->
   <div class="content p-4">

    <!-- start row -->
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="mb-3">
                <h6><a href="{{url('invoice-templates')}}"><i class="isax isax-arrow-left me-1"></i>Back</a></h6>
            </div>
            <div class="mb-3">
                <div class="d-flex align-items-center justify-content-end">
                    <div class="d-flex align-items-center">
                        <a href="javascript:void(0);" class="btn btn-outline-white me-2 d-inline-flex align-items-center"><i class="isax isax-document-like me-1"></i>Download PDF</a>
                        <a href="javascript:void(0);" class="btn btn-outline-white me-2 d-inline-flex align-items-center"><i class="isax isax-message-notif me-1"></i>Send Email</a>
                        <a href="javascript:void(0);" class="btn btn-outline-white d-inline-flex align-items-center"><i class="isax isax-printer me-1"></i>Print</a>
                    </div>
                </div>
            </div>
            <div class="pb-3 mb-3 border-bottom border-3 border-dark">
                <div class="d-flex align-items-center justify-content-between bg-light flex-wrap gap-2 p-3 rounded">
                    <div>
                        <img src="{{URL::asset('build/img/invoice-logo.svg')}}" class="mb-2" alt="User Img">
                        <p class="mb-1">Date : <span class="text-dark">05/12/2024</span></p>
                        <div class="inv-details">
                            <div class="inv-date-no">
                                <p class="text-start text-white fs-14">Invoice No: <span>INV 000500</span></p>
                            </div>
                            <div class="triangle-right"></div>
                        </div>
                    </div>
                    <div class="text-end">
                        <p class="mb-1">Original For Recipient</p>
                        <h6 class="mb-2">TAX INVOICE</h6>
                        <div>
                            <h6 class="mb-1">Dreams Cineplex</h6>
                            <div>
                                <p class="mb-1">Address : <span class="text-dark">15 Hodges Mews, High Wycombe HP12 3JL, United Kingdom.</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex align-items-center justify-content-between mb-3">
                <div>
                    <p class="mb-1">Customer Info :</p>
                    <h6 class="mb-1 fs-16">John Williams</h6>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="thead-primary">
                                <tr>
                                    <th>#</th>
                                    <th>Item</th>
                                    <th>Rate/Item</th>
                                    <th>Qty</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>
                                        <div class="d-flex flex-column">
                                            <span class="text-dark mb-1">Colombia Dark Roast</span>
                                            <span>22 July 2024 at 2.30pm</span>
                                        </div>
                                    </td>
                                    <td><span class="text-dark">$350</span></td>
                                    <td><span class="text-dark">1</span></td>
                                    <td><span class="text-dark">$350</span></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>
                                        <div class="d-flex flex-column">
                                            <span class="text-dark mb-1">Coffee Mug</span>
                                            <span>22 July 2024 at 2.30pm</span>
                                        </div>
                                    </td>
                                    <td><span class="text-dark">$600</span></td>
                                    <td><span class="text-dark">1</span></td>
                                    <td><span class="text-dark">$600</span></td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>
                                        <div class="d-flex flex-column">
                                            <span class="text-dark mb-1">Medium Cafe Mocha</span>
                                            <span>22 July 2024 at 2.30pm</span>
                                        </div>
                                    </td>
                                    <td><span class="text-dark">$200</span></td>
                                    <td><span class="text-dark">2</span></td>
                                    <td><span class="text-dark">$400</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- start row -->
            <div class="row mb-2 ">
                <div class="col-md-8">
                </div><!-- end col -->
                <div class="col-md-4">
                    <div class="d-flex align-items-center justify-content-between ">
                        <div class="d-flex flex-column">
                            <span class="text-dark text-end fw-semibold mb-1">Taxable Amount</span>
                            <span class="text-dark text-end fw-semibold">IGST 18.0%</span>
                        </div>
                        <div class="d-flex flex-column text-end">
                            <span class="text-dark fw-semibold mb-1">$1650.00</span>
                            <span class="text-dark fw-semibold">$165.00</span>
                        </div>
                    </div>
                </div><!-- end col -->
            </div>
            <!-- end row -->

            <!-- start row -->
            <div class="row border-top border-bottom border-3 border-dark p-2">
                <div class="col-md-8">
                    <span class="text-dark">Total Items / Qty : 3 / 3.00</span>
                </div><!-- end col -->
                <div class="col-md-4">
                    <div class="d-flex align-items-center justify-content-between ">
                        <div class=" text-end">
                            <span class="fw-bold fs-18 text-end text-dark">Total</span>
                        </div>
                        <div class="text-end">
                            <span class="fw-bold fs-18 text-dark">$1,815.00</span>
                        </div>
                    </div>
                </div><!-- end col -->
            </div>
            <!-- end row -->

            <!-- start row -->
            <div class="row py-3 border-bottom  border-bottom border-3 border-dark mb-3 d-flex align-items-center">
                <div class="col-lg-12">
                    <div class="d-flex align-items-center justify-content-end">
                        <p class="text-dark">Total amount ( in words): One Thousand Eight Hundred Fifteen Dollars Only.</p>
                    </div>
                </div><!-- end col -->
            </div>
            <!-- end row -->

            <div class="d-flex align-items-center justify-content-between flex-wrap border-bottom mb-3">
                <div class="mb-3">
                    <h6 class="mb-2">Payment Info:</h6>
                    <div>
                        <p class="mb-1">Debit Card : <span class="text-dark">465 *************645</span></p>
                        <p class="mb-1">Amount : <span class="text-dark">$1,815</span></p>
                    </div>
                </div>
                <div class="mb-3">
                    <h6 class="mb-2">Terms & Conditions : </h6>
                    <p class="mb-1">1. Goods Once sold cannot be taken back or exchanged.</p>
                    <p>2. We are not the manufactures, company will stand for warrenty as per their terms and conditions.</p>
                </div>
            </div>
            <div class="border-bottom text-center text-white bg-primary p-2">
                <p>Thanks for your Business</p>
            </div>
        </div><!-- end col -->
    </div>
    <!-- end row -->

</div>
<!-- End Content -->


        <!-- ========================
        End Page Content
    ========================= -->
@endsection