<?php $page = 'fitness-center-invoice'; ?>
@extends('layout.mainlayout')
@section('content')
    <!-- ========================
        Start Page Content
    ========================= -->

    <!-- Start Content -->
    <div class="content p-4">

        <!-- start row -->
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="mb-3">
                    <h6><a href="{{url('invoice-templates')}}"><i class="isax isax-arrow-left me-1"></i>Back</a></h6>
                </div>
                <div class="d-flex align-items-center justify-content-between flex-wrap row-gap-3 mb-3 pb-3">
                    <div>
                        <h6 class="text-dark mb-2">TAX INVOICE</h6>
                        <div>
                            <h6 class="mb-1">Dreamguys Internet Pvt Ltd.,</h6>
                            <div>
                                <p class="mb-1">GST IN : <span class="text-dark">22AABCU9603R1ZX</span></p>
                            </div>
                            <div>
                                <p class="mb-1">Address : <span class="text-dark">15 Hodges Mews, High Wycombe HP12 3JL, United Kingdom.</span></p>
                            </div>
                            <div>
                                <p class="mb-1">Mobile : <span class="text-dark">+91 98765 4321</span></p>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="mb-1 text-end"><img src="{{URL::asset('build/img/invoice-logo.svg')}}" alt="User Img"></div>
                        <div>
                            <p class="mb-1 text-end">Original For Recipient</p>
                        </div>
                        <div>
                            <p class="mb-1 text-end">Date : <span class="text-dark">05/12/2024</span></p>
                        </div>
                        <div>
                            <p class="mb-1 text-end">Invoice No : <span class="text-dark">INV 00001</span></p>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-md-2">
                            <div class="mb-3 align-items-center justify-content-end">
                                <p class="mb-1">Customer Info :</p>
                                <h6 class="mb-1 fs-16">John Williams</h6>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="d-block py-4 px-2 bg-light text-center">
                                <p class="mb-1 text-gray">Grand Total</p>
                                <h6 class="mb-1 fs-16">$270</h6>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- start row -->
                <div class="row mb-3">
                    <div class="col-6 md-12 d-flex align-items-center justify-content-between">
                        <p class="mb-1">Client ID :</p>
                        <span class="mb-1 fs-13 fw-noraml text-dark">AS2534568</span>
                    </div>
                    <div class="col-6 md-12 d-flex align-items-center justify-content-between">
                        <p class="mb-1">Outstanding Balance :</p>
                        <span class="mb-1 fs-13 fw-noraml text-dark">$3600</span>
                    </div>
                    <div class="col-6 md-12 d-flex align-items-center justify-content-between">
                        <p class="mb-1">Invoice Date : </p>
                        <span class="mb-1 fs-13 fw-noraml text-dark">Johan Smith</span>
                    </div>
                    <div class="col-6 md-12 d-flex align-items-center justify-content-between">
                        <p class="mb-1">Due Date :</p>
                        <span class="mb-1 fs-13 fw-noraml text-dark">Winter</span>
                    </div>
                    <div class="col-6 md-12 d-flex align-items-center justify-content-between">
                        <p class="mb-1">Total Curent Charges :</p>
                        <span class="mb-1 fs-13 fw-noraml text-dark">SI2534687</span>
                    </div>
                    <div class="col-6 md-12 d-flex align-items-center justify-content-between">
                        <p class="mb-1">Total Balance Due :</p>
                        <span class="mb-1 fs-13 fw-noraml text-dark">2024 Spring</span>
                    </div>
                </div>
                <!-- end row -->

                <!-- start row -->
                <div class="row mb-3">
                    <div class="col-md-12">
                        <table class="table">
                            <thead class="thead-dark border-top border-start-0 border-end-0 border-bottom border-3 border-dark p-2">
                                <tr>
                                    <th>#</th>
                                    <th>Description</th>
                                    <th>Hours</th>
                                    <th>Total</th>
                                    <th class="text-end">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="border-gray">
                                    <td class="text-dark">1</td>
                                    <td>
                                        <div class="d-flex flex-column">
                                            <span class="text-dark">Additional monthly usages - 125 GB</span>
                                        </div>
                                    </td>
                                    <td><span class="text-dark">10</span></td>
                                    <td><span class="text-dark">$350</span></td>
                                    <td class="text-end"><span class="text-dark">$350</span></td>
                                </tr>
                                <tr class="border-gray">
                                    <td class="text-dark">2</td>
                                    <td>
                                        <div class="d-flex flex-column">
                                            <span class="text-dark">Equpment rental</span>
                                        </div>
                                    </td>
                                    <td><span class="text-dark">8</span></td>
                                    <td><span class="text-dark">$350</span></td>
                                    <td class="text-end"><span class="text-dark">$350</span></td>
                                </tr>
                                <tr class="border-gray">
                                    <td class="text-dark">3</td>
                                    <td>
                                        <div class="d-flex flex-column">
                                            <span class="text-dark">Xtreme5</span>
                                        </div>
                                    </td>
                                    <td><span class="text-dark">6</span></td>
                                    <td><span class="text-dark">$600</span></td>
                                    <td class="text-end"><span class="text-dark">$600</span></td>
                                </tr>
                                <tr class="border-gray">
                                    <td class="text-dark">4</td>
                                    <td>
                                        <div class="d-flex flex-column">
                                            <span class="text-dark">Govement fee & taxes</span>
                                        </div>
                                    </td>
                                    <td><span class="text-dark">17</span></td>
                                    <td><span class="text-dark">$400</span></td>
                                    <td class="text-end"><span class="text-dark">$400</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- end row -->

                <!-- start row -->
                <div class="row mb-2">
                    <div class="col-md-8">

                    </div>
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
                    </div>

                </div>
                <!-- end row -->

                <!-- start row -->
                <div class="row border-top border-bottom border-3 border-gray p-3 align-items-center">
                    <div class="col-md-8">
                        <span class="text-dark">Total Items / Qty : 5 / 5.00</span>
                    </div>
                    <div class="col-md-4">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class=" text-end">
                                <span class="fw-bold fs-18 text-end text-dark">Total</span>
                            </div>
                            <div class="text-end">
                                <span class="fw-bold fs-18 text-dark">$1,815.00</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <!-- start row -->
                <div class="row py-3 border-bottom  border-bottom border-3 border-gray mb-3 d-flex align-items-center">
                    <div class="col-md-12">
                        <div class="d-flex align-items-center justify-content-center">
                            <p class="text-gary">Total amount ( in words):<span class="text-dark"> One Thousand Eight Hundred Fifteen Dollars Only.</span></p>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div class="d-flex align-items-center justify-content-between flex-wrap mb-2 p-3">
                    <div class="">
                        <h6 class="mb-2">Payment Info:</h6>
                        <div>
                            <p class="mb-1">Debit Card : <span class="text-dark">465 *************645</span></p>
                            <p class="">Amount : <span class="text-dark">$1,815</span></p>
                        </div>
                    </div>
                    <div class="text-center">
                        <p class="mb-1">For Dreamguys</p>
                        <span><img src="{{URL::asset('build/img/icons/sign-01.png')}}" alt="User Img"></span>
                    </div>
                </div>
                <div class="border-bottom mb-3 p-3">
                    <h6 class="mb-2">Terms &amp; Conditions : </h6>
                    <p class="mb-1">1. Goods Once sold cannot be taken back or exchanged.</p>
                    <p>2. We are not the manufactures, company will stand for warrenty as per their terms and conditions.</p>
                </div>
                <div class="border-bottom text-center pb-3">
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