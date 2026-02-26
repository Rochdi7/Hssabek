<?php $page = 'general-invoice-9'; ?>
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
                <div class="mb-3 border-bottom">
                    <div class="d-flex align-items-center justify-content-between flex-wrap p-3 rounded">
                        <div class="">
                            <h6 class="mb-2 text-primary">INVOICE</h6>
                            <div>
                                <h6 class="mb-1">Dreamstechnologies Internet Pvt Ltd.,</h6>
                                <div> 
                                    <p class="mb-1">Address : <span class="text-dark">15 Hodges Mews, High Wycombe HP12 3JL, United Kingdom.</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="text-end">
                            <img src="{{URL::asset('build/img/invoice-logo.svg')}}" class="mb-2" alt="">
                            <p class="mb-1">Date : <span class="text-dark">05/12/2024</span></p>
                            <div class="inv-details">
                                <div class="inv-date-nine">
                                    <p class="text-dark">Invoice No: <span>INV 000500</span></p>                                
                                </div>
                                <div class="triangle-left"></div>                            
                            </div>
                        </div>
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
                <div class="row border-top border-bottom p-2">
                    <div class="col-md-8">
                        
                    </div> <!-- end col -->
                    <div class="col-md-4">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class=" text-end">
                                <span class="fw-bold fs-18 text-end text-primary">Total</span>
                            </div>
                            <div class="text-end">
                                <span class="fw-bold fs-18 text-primary">$1,815.00</span>
                            </div>
                        </div>
                    </div> <!-- end col -->              
                </div> <!-- end row -->
                <div class="row py-3 border-bottom mb-3 d-flex align-items-center">
                    <div class="col-lg-12">
                        <div class="d-flex align-items-center justify-content-center">
                            <p class="text-dark">Total amount ( in words): One Thousand Eight Hundred Fifteen Dollars Only.</p>
                        </div>
                    </div> <!-- end col -->                       
                </div> <!-- end row -->
                <div class="d-flex align-items-center justify-content-between flex-wrap border-bottom mb-3">                        
                    <div class="d-flex align-items-center mb-3">
                        <div class="me-4">
                            <span class="d-block mb-2"><img src="{{URL::asset('build/img/icons/qr.png')}}" alt=""></span>
                            <p class="text-dark">Scan to View Receipt</p>
                        </div>
                        <div>
                            <h6 class="mb-2">Payment Info:</h6>
                            <div>
                                <p class="mb-1">Debit Card :  <span class="text-dark">465 *************645</span></p>
                                <p class="mb-1">Amount :  <span class="text-dark">$1,815</span></p>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <h6 class="mb-2">Terms & Conditions : </h6>
                        <p class="mb-1">1. Goods Once sold cannot be taken back or exchanged.</p>
                        <p>2. We are not the manufactures, company will stand for warrenty as per their terms and conditions.</p>
                    </div>
                </div>
                <div class="border-bottom text-center pb-3">
                    <p>Thanks for your Business</p>
                </div>
            </div> <!-- end col -->
        </div>
        <!-- end row -->

    </div>

    <!-- ========================
        Start Page Content
    ========================= -->
@endsection