<?php $page = 'general-invoice-10'; ?>
@extends('layout.mainlayout')
@section('content')
    <!-- ========================
        Start Page Content
    ========================= -->        

    <div class="content p-4">

        <!-- start row -->
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="mb-3">
                    <h6><a href="{{url('invoice-templates')}}"><i class="isax isax-arrow-left me-1"></i>Back</a></h6>
                </div>
                <div class="mb-3 p-2 bg-light">
                    <div class="d-flex align-items-center justify-content-between flex-wrap p-3 rounded">
                        <div class="">
                            <img src="{{URL::asset('build/img/invoice-logo.svg')}}" class="mb-2" alt=""> 
                        </div>
                        <div class="text-end">
                            <h6 class="mb-2 text-primary">INVOICE</h6>
                        </div>
                    </div>
                </div>
                <div class="invoice-five-details d-flex">
                    <div class="gradient-block me-4"></div>
                    <div class="d-flex align-items-center gap-2">
                        <div class="text-dark fs-13 me-4">Invoice No :<span>#005</span> </div>
                        <div class="text-dark fs-13">Invoice Date :<span> 07-10-2023</span></div>
                    </div>
                </div>  
                <div class="row bg-light p-2 mb-3">
                    <div class="col-lg-7">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <h6 class="fs-16 text-gray mb-2">Invoice To:</h6>
                                    <div>
                                        <p class="mb-0 text-dark">Walter Roberson</p>
                                        <p class="mb-0 text-dark">299 Star Trek Drive, Panama City, Florida, 32405, USA.</p>
                                        <p class="mb-0 text-dark">walter@gmail.com</p>
                                        <p class="mb-0 text-dark">+45 5421 4523</p>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <h6 class="fs-16 text-gray mb-2">Pay To:</h6>
                                    <div>
                                        <p class="mb-0 text-dark">Walter Roberson</p>
                                        <p class="mb-0 text-dark">299 Star Trek Drive, Panama City, Florida, 32405, USA.</p>
                                        <p class="mb-0 text-dark">walter@gmail.com</p>
                                        <p class="mb-0 text-dark">+45 5421 4523</p>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
                    </div> <!-- end col -->
                    <div class="col-lg-5">
                        <div class="mb-3">
                            <div>
                                <p class="mb-3 text-dark">Date <br> <span class="badge bg-orange-transparent text-orange">07/19/2023</span></p>
                                <p class="text-dark">Payment Status <br> <span class="text-info">Not Paid</span></p>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->
                <div class="d-flex align-items-center justify-content-between border-bottom flex-wrap row-gap-3 mb-3 pb-3">							
                    <div>
                        <h5 class="mb-2">Customer Details :</h5>
                        <div>
                            <h6 class="mb-1">John Williams</h6>
                            <div class="mb-2"> 
                                <p>GSTIN : <span class="text-dark">ACWR000054321</span></p>
                            </div>
                            <h6 class="mb-1 fw-semibold text-gray mb-2">Payment Status</h6>
                            <h6 class="mb-1 text-success">PAID</h6>
                        </div>
                    </div>
                    <div>
                        <h6 class="mb-2 text-end">Dreamstechnologies</h6>
                        <p class="mb-1 text-end">GST IN : <span class="text-dark">22AABCU9603R1ZX</span></p>
                        <p class="mb-1 text-end">Address : <span class="text-dark">15 Hodges Mews, High Wycombe HP12 3JL, United Kingdom.</span></p>
                        <p class="mb-1 text-end">Mobile : <span class="text-dark"> +91 98765 43210</span></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <h6 class="fs-16 text-gray-5 mb-2">Billing Address :</h6>
                            <div>
                                <p class="mb-0 text-dark">Walter Roberson</p>
                                <p class="mb-0 text-dark">299 Star Trek Drive, Panama City, Florida, 32405, USA.</p>
                                <p class="mb-0 text-dark">walter@gmail.com</p>
                                <p class="mb-0 text-dark">+45 5421 4523</p>
                            </div>
                        </div>
                    </div> <!-- end col -->
                    <div class="col-md-6 text-end">
                        <div class="mb-3">
                            <h6 class="fs-16 text-gray-5 mb-2">Shipping Address :</h6>
                            <div>
                                <p class="mb-0 text-dark">Walter Roberson</p>
                                <p class="mb-0 text-dark">299 Star Trek Drive, Panama City, Florida, 32405, USA.</p>
                                <p class="mb-0 text-dark">walter@gmail.com</p>
                                <p class="mb-0 text-dark">+45 5421 4523</p>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->
                <div class="table-responsive">
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>Tax Value</th>
                                <th>Qty</th>
                                <th>Tax Value</th>
                                <th>Discount</th>
                                <th class="text-end">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-dark">1</td>
                                <td>Accounting Software Maintainence</td>
                                <td class="text-dark">1</td>
                                <td>
                                    <div>
                                        <span class="d-block mb-1">$500</span>
                                        <p class="text-primary">after disc. $450.00</p>
                                    </div>
                                </td>
                                <td class="text-dark">10%</td>
                                <td class="text-dark text-end">$350</td>
                            </tr>
                            <tr>
                                <td class="text-dark">2</td>
                                <td>Man Power Support</td>
                                <td class="text-dark">1</td>
                                <td>
                                    <div>
                                        <span class="d-block">$100</span>
                                    </div>
                                </td>
                                <td class="text-dark">10%</td>
                                <td class="text-dark text-end">$600</td>
                            </tr>
                            <tr>
                                <td class="text-dark">3</td>
                                <td>Transportation Fee</td>
                                <td class="text-dark">2</td>
                                <td>
                                    <div>
                                        <span class="d-block mb-1">$500</span>
                                        <p class="text-primary">after disc. $450.00</p>
                                    </div>
                                </td>
                                <td class="text-dark">10%</td>
                                <td class="text-dark text-end">$400</td>
                            </tr>
                            <tr>
                                <td class="text-dark">4</td>
                                <td>Spars Replacement Charges</td>
                                <td class="text-dark">3</td>
                                <td>
                                    <div>
                                        <span class="d-block">$100</span>
                                    </div>
                                </td>
                                <td class="text-dark">10%</td>
                                <td class="text-dark text-end">$300</td>
                            </tr>
                            <tr>
                                <td class="text-dark">5</td>
                                <td>Materials Handling</td>
                                <td class="text-dark">3</td>
                                <td>
                                    <div>
                                        <span class="d-block mb-1">$500</span>
                                        <p class="text-primary">after disc. $450.00</p>
                                    </div>
                                </td>
                                <td class="text-dark">10%</td>
                                <td class="text-dark text-end">$300</td>
                            </tr>
                            <tr>
                                <td colspan="4">
                                    
                                </td>
                                <td class="text-dark">
                                    <div>
                                        <h6 class="fs-14 fw-medium mb-2 pb-2">Taxable Amount</h6>
                                        <h6 class="fs-14 fw-medium mb-2 pb-2">IGST 18.0%</h6>
                                        <h6 class="fs-14 fw-medium mb-2 pb-2">Extra Discount Promo (5%)</h6>
                                        <h6 class="fs-14 fw-medium mb-0">Round Off</h6>
                                    </div>
                                </td>
                                <td class="text-dark text-end fw-medium">
                                    <div>
                                        <h6 class="fs-14 fw-medium mb-2 pb-2">$1650.00</h6>
                                        <h6 class="fs-14 fw-medium mb-2 pb-2">$165.00</h6>
                                        <h6 class="fs-14 fw-medium mb-2 pb-2">$165.00</h6>
                                        <h6 class="fs-14 fw-medium mb-0">$165.00</h6>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table> <!-- end table -->
                </div>
                <div class="py-3 border-top-0 border-bottom d-flex align-items-center justify-content-between">
                    <p class="text-dark mb-0">Total amount ( in words): <br>  One Thousand Eight Hundred Fifteen Dollars Only.</p>
                    <div class="d-flex align-items-center">
                        <span class="border-end-0"></span>
                        <span class="text-dark fw-medium border-end-0 border-start-0 text-center me-2"><h6>Amount Payable</h6></span>
                        <span class="text-dark text-end fw-medium border-start-0"><h6>$1,815.00</h6></span>
                    </div>
                </div>
                <div class="d-flex align-items-center py-3 justify-content-between flex-wrap border-bottom mb-3">
                    <div class="mb-3">								
                        <div class="d-flex align-items-center">
                            <div class="me-3">
                                <h6 class="mb-2">Bank Details</h6>
                                <p class="mb-1">Bank Name :  <span class="text-dark">YES Bank</span></p>
                                <p class="mb-1">Account # :  <span class="text-dark">6677889944551</span></p>
                                <p class="mb-1">IFSC :  <span class="text-dark">YESBBIN4567</span></p>
                                <p class="mb-0">BRANCH :  <span class="text-dark">RS Puram</span></p>
                            </div>
                            <div class="me-4">
                                <span class="d-block mb-2"><img src="{{URL::asset('build/img/icons/qr.png')}}" alt=""></span>
                                <p class="text-dark">Scan to View Receipt</p>
                            </div>
                        </div>
                    </div>
                    <div class="text-center mb-3">
                        <p class="mb-1">For Dreamstechnologies</p>
                        <span><img src="{{URL::asset('build/img/icons/sign-01.png')}}" alt=""></span>
                    </div>
                </div>
                <div class="d-flex align-items-center flex-wrap border-bottom mb-3">
                    <div class="mb-3">
                        <p class="mb-2 fs-13 text-gray">Terms & Conditions : </p>
                        <p class="mb-1 text-dark">1. Goods Once sold cannot be taken back or exchanged.</p>
                        <p class="text-dark">2. We are not the manufactures, company will stand for warrenty as per their terms and conditions.</p>
                    </div>
                </div>
                <div class="border-bottom pb-3">
                    <p>Thanks for your Business</p>
                </div>
            </div> <!-- end col -->
        </div>
        <!-- end row -->
    </div>

    <!-- ========================
        End Page Content
    ========================= -->        
@endsection