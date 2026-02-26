<?php $page = 'restaurants-invoice'; ?>
@extends('layout.mainlayout')
@section('content')
   <!-- Start Content -->
   <div class="content p-4">

    <!-- start row -->
    <div class="row">
        <div class="col-md-10 mx-auto">
            <div class="mb-3">
                <h6><a href="{{url('invoice-templates')}}"><i class="isax isax-arrow-left me-1"></i>Back</a></h6>
            </div>
            <div class="pb-3 mb-3 border-bottom border-3 border-primary">
                <div class="d-flex align-items-center justify-content-between bg-light flex-wrap p-3 rounded">
                    <div>
                        <img src="{{URL::asset('build/img/invoice-logo.svg')}}" class="mb-2" alt="User Img">
                        <p class="mb-1">Date : <span class="text-dark">05/12/2024</span></p>
                        <div class="inv-details">
                            <div class="inv-date-rest">
                                <p class="text-start text-white">Invoice No: <span>INV 000500</span></p>                                
                            </div>
                            <div class="triangle-right"></div>                            
                        </div>
                    </div>
                    <div class="text-end">
                        <p class="mb-1">Original For Recipient</p>
                        <h6 class="text-primary mb-2">TAX INVOICE</h6>
                        <div>
                            <h6 class="mb-1">Dreamguys Restaurent</h6>
                            <div> 
                                <p class="mb-1">Address : <span>15 Hodges Mews, High Wycombe HP12 3JL, United Kingdom.</span></p>
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
            
            <!-- start row -->
            <div class="row mb-3">
                <div class="col-md-12">
                    <table class="table">
                        <thead class="thead border-top border-start-0 border-end-0 border-bottom border-3 border-dark p-2">
                            <tr>
                                <th>#</th>
                                <th>Item</th>
                                <th>Rate/Item</th>
                                <th>Qty</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-dark">
                                <td>1</td>
                                <td>
                                    <div class="d-flex flex-column">
                                        <span class="text-dark mb-1">Finest Ramen</span>
                                        <span>22 July 2024 at 2.30pm</span>
                                    </div>
                                </td>
                                <td><span class="text-dark">$350</span></td>
                                <td><span class="text-dark">1</span></td>
                                <td><span class="text-dark">$350</span></td>
                            </tr>
                            <tr class="border-dark">
                                <td>2</td>
                                <td>
                                    <div class="d-flex flex-column">
                                        <span class="text-dark mb-1">Sushi tray</span>
                                        <span>22 July 2024 at 2.30pm</span>
                                    </div>
                                </td>
                                <td><span class="text-dark">$600</span></td>
                                <td><span class="text-dark">1</span></td>
                                <td><span class="text-dark">$600</span></td>
                            </tr>
                            <tr class="border-dark">
                                <td>3</td>
                                <td>
                                    <div class="d-flex flex-column">
                                        <span class="text-dark mb-1">Extra Condiments</span>
                                        <span>22 July 2024 at 2.30pm</span>
                                    </div>
                                </td>
                                <td><span class="text-dark">$200</span></td>
                                <td><span class="text-dark">2</span></td>
                                <td><span class="text-dark">$400</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div><!-- end col -->
            </div>
            <!-- end row -->

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
            <div class="row border-top border-bottom border-3 border-dark p-3 align-items-center">
                <div class="col-md-8">
                    <span class="text-dark">Total Items / Qty : 3 / 3.00</span>
                </div><!-- end col -->
                <div class="col-md-4">
                    <div class="d-flex align-items-center justify-content-between">
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
                <div class="col-md-12">
                    <div class="d-flex align-items-center justify-content-end">
                        <p class="text-gary">Total amount ( in words):<span class="text-dark"> One Thousand Eight Hundred Fifteen Dollars Only.</span></p>
                    </div>
                </div><!-- end col -->
            </div>
            <!-- end row -->

            <!-- start row -->
            <div class="row d-flex align-items-center flex-wrap border-bottom mb-3">
                <div class="col-md-4">
                    <div class="mb-3">
                        <h6 class="mb-2">Payment Info:</h6>
                        <div>
                            <p class="mb-1">Debit Card :  <span class="text-dark">465 *************645</span></p>
                            <p class="mb-1">Amount :  <span class="text-dark">$1,815</span></p>
                        </div>
                    </div>
                </div><!-- end col -->
                <div class="col-md-8">
                    <div class="mb-3">
                        <h6 class="mb-2">Terms & Conditions : </h6>
                    <p class="mb-1">1. Goods Once sold cannot be taken back or exchanged.</p>
                    <p>2. We are not the manufactures, company will stand for warrenty as per their terms and conditions.</p>
                    </div>
                </div><!-- end col -->                   
            </div>
            <!-- end row -->

            <!-- start row -->
            <div class="row border border-start-0 border-end-0 border-dark text-center text-white bg-light p-2">
                <div class="col-md-12">
                    <p class="text-gray">Thanks for your Business</p>
                </div><!-- end col -->
            </div>
        </div><!-- end col -->
    </div>
    <!-- end row -->
</div>
<!-- End Content --> 
@endsection