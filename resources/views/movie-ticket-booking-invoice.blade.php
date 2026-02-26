<?php $page = 'movie-ticket-booking-invoice'; ?>
@extends('layout.mainlayout')
@section('content')

    <!-- Start Content -->
    <div class="content p-4">
        <!-- start row -->
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div>
                    <div class="d-flex align-items-center justify-content-between border-bottom flex-wrap row-gap-3 mb-3 pb-3">
                        
                        <div>
                            <h5 class="mb-2">TAX INVOICE</h5>
                            <span class="mb-2">
                                <img src="{{URL::asset('build/img/icons/cineplex.svg')}}" alt="icon">
                            </span>
                            <div>
                                <h6 class="mb-1">Dreamstechnologies Cineplex</h6>
                                <div> 
                                    <p class="mb-1">Address : <span class="text-dark">15 Hodges Mews, High Wycombe HP12 3JL, United Kingdom.</span></p>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="mb-1"><img src="{{URL::asset('build/img/invoice-logo.svg')}}" alt=""></div>
                            <p class="mb-1 text-end">Original For Recipient</p>
                            <p class="mb-1 text-end">Invoice No: <span class="text-dark">INV 00001</span></p>
                            <p class="mb-1 text-end">Date: <span class="text-dark">05/12/2024</span></p>
                        </div>
                    </div>
                    <!-- start row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- start row -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <h6 class="fs-16 text-gray mb-2">Purcheser Info:</h6>
                                        <div>
                                            <p class="mb-0 fs-13 text-dark">Walter Roberson <br>299 Star Trek Drive, Panama City, Florida, 32405, USA </p>
                                        </div> 
                                    </div>
                                </div> <!-- end col -->
                            </div>
                            <!-- end row -->
                        </div> <!-- end col -->
                    </div> <!-- end row -->

                    <!-- start table -->
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="thead-primary">
                                <tr>
                                    <th>#</th>
                                    <th>Item</th>
                                    <th>Rate/Item</th>
                                    <th>Qty</th>
                                    <th class="text-end">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-dark">1</td>
                                    <td>
                                        <div>
                                            <p class="text-dark mb-0">Top Gun: Maverick</p>
                                            <span class="d-block">22 July 2024 at 2.30pm - General Seat</span>
                                        </div>
                                    </td>
                                    <td class="text-dark">$350</td>
                                    <td>1</td>
                                    <td class="text-dark">$350</td>
                                </tr>
                                <tr>
                                    <td class="text-dark">2</td>
                                    <td>
                                        <div>
                                            <p class="text-dark mb-0">The Gray Man</p>
                                            <span class="d-block">22 July 2024 at 2.30pm - General Seat</span>
                                        </div>
                                    </td>
                                    <td class="text-dark">$600</td>
                                    <td>1</td>
                                    <td class="text-dark">$600</td>
                                </tr>
                                <tr>
                                    <td class="text-dark">2</td>
                                    <td>
                                        <div>
                                            <p class="text-dark mb-0">Bullet Train</p>
                                            <span class="d-block">22 July 2024 at 2.30pm - General Seat</span>
                                        </div>
                                    </td>
                                    <td class="text-dark">$200</td>
                                    <td>2</td>
                                    <td class="text-dark">$400</td>
                                </tr>
                                <tr>
                                    <td colspan="3" class="border-0"></td>
                                    <td class="text-dark fw-medium border-0">Taxable Amount</td>
                                    <td class="text-dark text-end fw-medium border-0">$1650.00</td>
                                </tr>
                                <tr>
                                    <td colspan="3" class="border-0"></td>
                                    <td class="text-dark fw-medium border-0">IGST 18.0%</td>
                                    <td class="text-dark text-end fw-medium border-0">$165.00</td>
                                </tr>
                                <tr>
                                    <td colspan="3" class="text-dark border-0" >Total Items / Qty : 3 / 3.00</td>
                                    <td class="text-dark fw-medium border-0"><h6>Total</h6></td>
                                    <td class="text-dark text-end fw-medium border-0"><h6>$1,815.00</h6></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- end table -->
                    <div class="py-3 border-top border-bottom mb-3 d-flex align-items-center justify-content-center">
                        <p class="text-dark">Total amount ( in words): One Thousand Eight Hundred Fifteen Dollars Only.</p>
                    </div>
                    <div class="d-flex align-items-center justify-content-between flex-wrap border-bottom mb-3">
                        <div class="mb-3">
                            <h6 class="mb-2">Bank Details</h6>
                            <div>
                                <p class="mb-1">Bank Name :  <span class="text-dark">YES Bank</span></p>
                                <p class="mb-1">Account # :  <span class="text-dark">6677889944551</span></p>
                                <p class="mb-1">IFSC :  <span class="text-dark">YESBBIN4567</span></p>
                                <p class="mb-0">BRANCH :  <span class="text-dark">RS Puram</span></p>
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
                </div>
            </div> <!-- end row -->
        </div>
        <!-- end row -->
    </div>
    <!-- End Content -->

@endsection