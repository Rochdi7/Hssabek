<?php $page = 'ecommerce-invoice'; ?>
@extends('layout.mainlayout')
@section('content')
    <!-- Start Invoice -->
    <div class="content p-4">

        <!-- start row -->
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="mb-3">
                    <h6><a href="{{url('invoice-templates')}}"><i class="isax isax-arrow-left me-1"></i>Back</a></h6>
                </div>
                <div>
                    <div class="d-flex align-items-center justify-content-between border-bottom flex-wrap row-gap-3 mb-3 pb-3">
                        <div>
                            <h5 class="mb-2">TAX INVOICE</h5>
                            <div>
                                <h6 class="mb-1">Dreamstechnologies</h6>
                                <div>
                                    <p class="mb-1">GST IN : <span class="text-dark">22AABCU9603R1ZX</span></p>
                                    <p class="mb-1">Address : <span class="text-dark">15 Hodges Mews, High Wycombe HP12 3JL, United Kingdom.</span></p>
                                    <p class="mb-1">Mobile : <span class="text-dark">+91 98765 43210</span></p>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="mb-1"><img src="{{URL::asset('build/img/invoice-logo.svg')}}" alt="User Img"></div>
                            <p class="mb-1 text-end">Original For Recipient</p>
                            <p class="mb-1 text-end">Invoice No: <span class="text-dark">INV 00001</span></p>
                            <p class="mb-1 text-end">Date: <span class="text-dark">05/12/2024</span></p>
                        </div>
                    </div>

                    <!-- start row -->
                    <div class="row">
                        <div class="col-lg-7">

                            <!-- start row -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <h6 class="fs-16 text-gray mb-2">Customer Details :</h6>
                                        <div>
                                            <p class="mb-0 fs-18 text-dark">John Williams</p>
                                        </div>
                                    </div>
                                </div><!-- end col -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <h6 class="fs-16 text-gray mb-2">Billing Address :</h6>
                                        <div>
                                            <p class="mb-0 text-dark">Walter Roberson</p>
                                            <p class="mb-0 text-dark">299 Star Trek Drive, Panama City
                                                <br> Florida, 32405,</p>
                                            <p class="mb-0 text-dark">USA</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end col -->
                        <div class="col-lg-5">
                            <div class="mb-3">
                                <h6 class="fs-16 text-gray mb-2">Shipping Address :</h6>
                                <div>
                                    <p class="mb-0 text-dark">Walter Roberson</p>
                                    <p class="mb-0 text-dark">299 Star Trek Drive, Panama City
                                        <br> Florida, 32405,</p>
                                    <p class="mb-0 text-dark">USA</p>
                                </div>
                            </div>
                        </div><!-- end col -->
                    </div>
                    <!-- end row -->

                    <div class="table-responsive">
                        <table class="table table-nowrap table-bordered">
                            <thead class="thead-primary">
                                <tr>
                                    <th>#</th>
                                    <th>Item</th>
                                    <th>Rate/Item</th>
                                    <th>Qty</th>
                                    <th>Tax Value</th>
                                    <th>Tax Amount</th>
                                    <th class="text-end">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-dark">1</td>
                                    <td>
                                        <div>
                                            <p class="text-dark mb-0">Samsung Galaxy M32 Prime Edition...</p>
                                            <span class="d-block">( Light Blue, 4GB RAM, 64GB )</span>
                                        </div>
                                    </td>
                                    <td class="text-dark">15,677.15</td>
                                    <td>1</td>
                                    <td class="text-dark">15,677.15</td>
                                    <td>2,821.88(18%)</td>
                                    <td class="text-dark text-end">18,49.00</td>
                                </tr>
                                <tr>
                                    <td class="text-dark">2</td>
                                    <td>
                                        <div>
                                            <p class="text-dark mb-0">OPPO A74 5G...</p>
                                            <span class="d-block">( Fluid Black, 6GB RAM, 128GB Storage )</span>
                                        </div>
                                    </td>
                                    <td class="text-dark">2541.53</td>
                                    <td>2</td>
                                    <td class="text-dark">2541.53</td>
                                    <td>457.48(18%)</td>
                                    <td class="text-dark text-end">2,999.00</td>
                                </tr>
                                <tr>
                                    <td colspan="5" class="border-0"></td>
                                    <td class="text-dark fw-medium border-0">Taxable Amount</td>
                                    <td class="text-dark text-end fw-medium border-0">$1650.00</td>
                                </tr>
                                <tr>
                                    <td colspan="5" class="border-0"></td>
                                    <td class="text-dark fw-medium border-0">IGST 18.0%</td>
                                    <td class="text-dark text-end fw-medium border-0">$165.00</td>
                                </tr>
                                <tr>
                                    <td colspan="5" class="text-dark border-0">Total Items / Qty : 2 / 2.00</td>
                                    <td class="text-dark fw-medium border-0">
                                        <h6>Total</h6></td>
                                    <td class="text-dark text-end fw-medium border-0">
                                        <h6>$1,815.00</h6></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="py-3 border-bottom mb-3 d-flex align-items-center justify-content-between">
                        <p class="text-dark">Total amount ( in words):
                            <br> One Thousand Eight Hundred Fifteen Dollars Only.</p>
                        <div class="d-flex align-items-center">
                            <span class="border-end-0"></span>
                            <span class="text-dark fw-medium border-end-0 border-start-0 text-center me-2"><h6>Amount Payable</h6></span>
                            <span class="text-dark text-end fw-medium border-start-0"><h6>$21,498.00</h6></span>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between flex-wrap border-bottom mb-3">
                        <div class="mb-3">
                            <h6 class="mb-2">Bank Details</h6>
                            <div>
                                <p class="mb-1">Bank Name : <span class="text-dark">YES Bank</span></p>
                                <p class="mb-1">Account # : <span class="text-dark">6677889944551</span></p>
                                <p class="mb-1">IFSC : <span class="text-dark">YESBBIN4567</span></p>
                                <p class="mb-0">BRANCH : <span class="text-dark">RS Puram</span></p>
                            </div>
                        </div>
                        <div class="text-center mb-3">
                            <p class="mb-1">For Dreamstechnologies</p>
                            <span><img src="{{URL::asset('build/img/icons/sign-01.png')}}" alt="User Img"></span>
                        </div>
                    </div>
                    <div class="border-bottom mb-3 pb-3">
                        <h6 class="mb-2">Terms & Conditions : </h6>
                        <p class="mb-1">1. Goods Once sold cannot be taken back or exchanged.</p>
                        <p>2. We are not the manufactures, company will stand for warrenty as per their terms and conditions.</p>
                    </div>
                    <div class="border-bottom text-center pb-3">
                        <p>Thanks for your Business</p>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
        <!-- end row -->

    </div>
    <!-- End Invoice -->
@endsection