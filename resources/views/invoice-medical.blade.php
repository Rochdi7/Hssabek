<?php $page = 'invoice-medical'; ?>
@extends('layout.mainlayout')
@section('content')
   
<div class="content p-4">
    <div class="row">
        <div class="col-md-10 mx-auto">
            <div>
                <div class="bg-primary-gradient p-1 mb-3 w-100">
                </div>
                <div class="d-flex align-items-start justify-content-between flex-wrap pb-3 overflow-hidden">							
                    <div>
                        <h1 class="mb-1 text-primary fs-48">TAX INVOICE</h1>
                        <div class="d-inline-block inv-medical position-relative">
                            <p class="mb-0 text-white">Address : 15 Hodges Mews, High Wycombe HP12 3JL, United Kingdom.</p>
                            <span class="position-absolute end-0 top-0">
                                <img src="{{URL::asset('build/img/bg/inv-medical-bg.png')}}" alt="bg">
                            </span>
                        </div>
                    </div>
                    <div>
                        <div class="mb-1"><img src="{{URL::asset('build/img/invoice-logo.svg')}}" alt=""></div>
                        <p class="mb-1 fs-13 text-end">Original For Recipient</p>
                        <h5 class="fs-20 font-bold text-end">Dreams Medicals</h5>
                    </div>
                </div>
                <div class="bg-primary-gradient p-1 mb-3 w-100">
                </div>
                <div class="mb-3">
                    <div class="d-block bg-light p-2 ps-3">
                        <h5 class="fs-18 fw-bold">Patient Information</h5>
                    </div>
                    <div class="row justify-content-between align-items-start">
                        <div class="col-lg-6">
                            <div class="d-flex align-items-center justify-content-between p-3">
                                <div>
                                    <p class="mb-1 text-dark fw-medium">Patient Name :</p>
                                    <p class="mb-1 text-dark fw-medium">Patient Birth Date :</p>
                                    <p class="mb-1 text-dark fw-medium">Insurance Billed :</p>
                                    <p class="mb-0 text-dark fw-medium">Patient No :</p>
                                </div>
                                <div class="text-end">
                                    <p class="mb-1 text-dark fw-bold">Micle Richard</p>
                                    <p class="mb-1 text-dark fw-bold">32 Years Old - 22 July 1991</p>
                                    <p class="mb-1 text-dark fw-bold">WPS</p>
                                    <p class="mb-0 text-dark fw-bold">123456789</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="d-flex align-items-center justify-content-between p-3">
                                <div>
                                    <p class="mb-1 text-dark fw-medium">Service :</p>
                                    <p class="mb-1 text-dark fw-medium">Due Date :</p>
                                    <p class="mb-0 text-dark fw-medium">Address :</p>
                                </div>
                                <div class="text-end">
                                    <p class="mb-1 text-dark fw-bold">Dental Treatment</p>
                                    <p class="mb-1 text-dark fw-bold">25 Jan 2024</p>
                                    <p class="mb-0 text-dark fw-bold">4 Balmy Beach Road, Owen Sound, Ontario, Canada</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive w-100">
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>Item</th>
                                <th class="text-end">Price</th>
                                <th class="text-end">Qty</th>
                                <th class="text-end">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-dark">1</td>
                                <td class="text-dark">Dental Treatment</td>
                                <td class="text-dark text-end">$350</td>
                                <td class="text-dark text-end">1</td>
                                <td class="text-dark text-end">$350</td>
                            </tr>
                            <tr>
                                <td class="text-dark">2</td>
                                <td class="text-dark">Bed Charge</td>
                                <td class="text-dark text-end">$600</td>
                                <td class="text-dark text-end">1</td>
                                <td class="text-dark text-end">$600</td>
                            </tr>
                            <tr>
                                <td class="text-dark">3</td>
                                <td class="text-dark">Consultant Surgeon Fee</td>
                                <td class="text-dark text-end">$200</td>
                                <td class="text-dark text-end">2</td>
                                <td class="text-dark text-end">$400</td>
                            </tr>
                            <tr>
                                <td class="text-dark">4</td>
                                <td class="text-dark">Nursing Service Charge</td>
                                <td class="text-dark text-end">$100</td>
                                <td class="text-dark text-end">3</td>
                                <td class="text-dark text-end">$300</td>
                            </tr>
                            <tr>
                                <td class="text-dark">5</td>
                                <td class="text-dark">Medical Hospital Supply</td>
                                <td class="text-dark text-end">$100</td>
                                <td class="text-dark text-end">3</td>
                                <td class="text-dark text-end">$300</td>
                            </tr>
                            <tr>
                                <td class="text-dark">6</td>
                                <td class="text-dark">Dental Treatment</td>
                                <td class="text-dark text-end">$100</td>
                                <td class="text-dark text-end">3</td>
                                <td class="text-dark text-end">$300</td>
                            </tr>
                            <tr>
                                <td colspan="2" class="border-0"></td>
                                <td colspan="2" class="text-dark fw-medium border-0 text-end">Taxable Amount</td>
                                <td class="text-dark text-end fw-medium border-0">$1650.00</td>
                            </tr>
                            <tr>
                                <td colspan="2"></td>
                                <td colspan="2" class="text-dark fw-medium text-end">IGST 18.0%</td>
                                <td class="text-dark text-end fw-medium">$165.00</td>
                            </tr>
                            <tr>
                                <td colspan="2" class="text-dark">Total Items / Qty : 6 / 6.00</td>
                                <td colspan="2" class="text-dark fw-medium text-end"><h6>Total</h6></td>
                                <td class="text-dark text-end fw-medium"><h6>$1,815.00</h6></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="py-3 border-bottom border-dark">
                    <p class="text-dark text-center">Total amount ( in words):   One Thousand Eight Hundred Fifteen Dollars Only.</p>
                </div>
                <div class="border-bottom border-dark p-3">
                    <div class="row">
                        <div class="col-3">
                            <h6 class="mb-2">Payment Info : </h6>
                            <p class="mb-1">Debit Card : 465 *************645</p>
                            <p>Amount : $1,815</p>
                        </div>
                        <div class="col-9">
                            <h6 class="mb-2">Terms & Conditions : </h6>
                            <p class="mb-1">1. Goods Once sold cannot be taken back or exchanged.</p>
                            <p>2. We are not the manufactures, company will stand for warrenty as per their terms and conditions.</p>
                        </div>
                    </div>
                </div>
                <div class="border-bottom border-dark bg-light py-3">
                    <p class="text-center">Thanks for your Business</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection