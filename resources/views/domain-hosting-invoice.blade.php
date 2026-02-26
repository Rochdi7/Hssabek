<?php $page = 'domain-hosting-invoice'; ?>
@extends('layout.mainlayout')
@section('content')
    <!-- Start Content -->
    <div class="invoice-wrapper">
        <div class="mb-3 border-bottom">
            <div class="d-flex align-items-center justify-content-between bg-light flex-wrap p-3  mb-3 rounded">
                <div>
                    <h6 class="mb-2 text-dark">Dreams Domain</h6>
                    <p class="mb-2">Original For Recipient</p>
                </div>
                <div class="invoice-logo">
                    <img src="{{URL::asset('build/img/logo.svg')}}" alt="User Img">
                </div>
            </div>
        </div>
        <div class="mb-3">
            <h5 class="text-center text-primary mb-3">Tax Invoice</h5>
            <div class="mb-3">
                <div class="row row-gap-3">
                    <div class="col-md-4 col-lg-4">
                        <div class="d-flex justify-content-between align-items-center bg-light p-2">
                            <p class="mb-0">Customer ID:</p>
                            <p class="text-dark fw-medium">#326725</p>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4">
                        <div class="d-flex justify-content-between align-items-center bg-light p-2">
                            <p class="mb-0">Customer ID:</p>
                            <p class="text-dark fw-medium">#326725</p>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4">
                        <div class="d-flex justify-content-between align-items-center bg-light p-2">
                            <p class="mb-0">Customer ID:</p>
                            <p class="text-dark fw-medium">#326725</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <p class="fs-16 fw-semibold mb-1">Bill To :</p>
                <p class="text-dark">Walter Roberson
                    <br> 299 Star Trek Drive, Panama City, Florida, 32405, USA.
                    <br> walter@gmail.com
                    <br> +45 5421 4523</p>
            </div>
            <div class="mb-3">
                <h6 class="mb-3">Domain Details:</h6>
                <div class="table-responsive px-0">
                    <table class="table table-nowrap invoice-table2">
                        <thead class="thead-3">
                            <tr>
                                <th class="bg-light text-center ">Description</th>
                                <th class="bg-light text-center">Price</th>
                                <th class="bg-light text-center">Discount</th>
                                <th class="bg-light text-center">Total</th>
                            </tr>
                        </thead>
                        <tbody class="tbody-3">
                            <tr>
                                <td>
                                    <div class="bg-light p-2">
                                        <p class="text-dark">1 Domain - (.com Domain Registration with SSL) 2 Yearsdomainname.com</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-between align-items-center bg-light p-2">
                                        <p class="mb-0 text-dark">$</p>
                                        <p class="text-dark">200.00</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-between align-items-center bg-light p-2">
                                        <p class="mb-0 text-dark">$</p>
                                        <p class="text-dark">50.00</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-between align-items-center bg-light p-2">
                                        <p class="mb-0 text-dark">$</p>
                                        <p class="text-dark">150.00</p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>
                                    <p class="text-dark fw-medium text-center">Disount 25%</p>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-between align-items-center bg-light p-2">
                                        <p class="mb-0 text-dark fw-medium">$</p>
                                        <p class="text-dark fw-medium">150.00</p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>
                                    <p class="text-dark fw-semibold text-center">Total Amount</p>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-between align-items-center bg-dark p-2">
                                        <p class="mb-0 text-white fw-semibold">$</p>
                                        <p class="text-white fw-semibold">600.00</p>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="mb-3">
                <h6 class="mb-3">Hosting Details:</h6>
                <div class="table-responsive px-0">
                    <table class="table table-nowrap invoice-table2">
                        <thead class="thead-3">
                            <tr>
                                <th class="bg-light text-center ">Description</th>
                                <th class="bg-light text-center">Price</th>
                                <th class="bg-light text-center">Discount</th>
                                <th class="bg-light text-center">Total</th>
                            </tr>
                        </thead>
                        <tbody class="tbody-3">
                            <tr>
                                <td>
                                    <div class="bg-light p-2">
                                        <p class="text-dark">25 GB Hosting - (Business Package #SHP2564874) 2 Years</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-between align-items-center bg-light p-2">
                                        <p class="mb-0 text-dark">$</p>
                                        <p class="text-dark">200.00</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-between align-items-center bg-light p-2">
                                        <p class="mb-0 text-dark">$</p>
                                        <p class="text-dark">50.00</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-between align-items-center bg-light p-2">
                                        <p class="mb-0 text-dark">$</p>
                                        <p class="text-dark">150.00</p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>
                                    <p class="text-dark fw-medium text-center">Disount 25%</p>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-between align-items-center bg-light p-2">
                                        <p class="mb-0 text-dark fw-medium">$</p>
                                        <p class="text-dark fw-medium">150.00</p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>
                                    <p class="text-dark fw-semibold text-center">Total Amount</p>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-between align-items-center bg-dark p-2">
                                        <p class="mb-0 text-white fw-semibold">$</p>
                                        <p class="text-white fw-semibold">600.00</p>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="mb-3 bg-light p-2">
                <div class="row row-gap-3">
                    <div class="col-sm-6 col-md-6">
                        <div class="row align-items-center justify-content-between row-gap-3">
                            <div class="col-sm-6 col-md-6">
                                <p class="text-dark">SALES TAX 10%</p>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="d-flex justify-content-between align-items-center bg-white p-2">
                                    <p class="mb-0 text-dark">$</p>
                                    <p class="text-dark">90</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="row align-items-center justify-content-between row-gap-3">
                            <div class="col-sm-6 col-md-6">
                                <p class="text-dark">TOTAL AMOUNT</p>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="d-flex justify-content-between align-items-center bg-dark p-2">
                                    <p class="mb-0 text-white fw-semibold">$</p>
                                    <p class="text-white fw-semibold">690.00</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <div class="py-2 px-3 d-flex justify-content-between align-items-center">
                    <div>
                        <p class="fs-13 mb-0">Total amount ( in words):</p>
                        <p class="text-dark">USD Six Hundred Ninety Dollars Only.</p>
                    </div>
                    <div class="text-md-end">
                        <p class="text-dark fw-semibold">Amount Payable <span class="ms-4">$690.00</span></p>
                    </div>
                </div>
            </div>
            <div class="d-flex align-items-center justify-content-between flex-wrap mb-3 p-3">
                <div class="mb-3">
                    <h6 class="mb-2">Payment Info:</h6>
                    <div>
                        <p class="mb-1">Debit Card : <span class="text-dark">465 *************645</span></p>
                        <p class="mb-1">Amount : <span class="text-dark">$1,815</span></p>
                    </div>
                </div>
                <div class="text-center mb-3">
                    <p class="mb-1">For Dreamguys</p>
                    <span><img src="{{URL::asset('build/img/icons/sign-01.png')}}" alt="User Img"></span>
                </div>
            </div>
        </div>
        <div class="mb-3">
            <h6 class="mb-2">Terms & Conditions : </h6>
            <p class="mb-0">1. Goods Once sold cannot be taken back or exchanged.</p>
            <p>2. We are not the manufactures, company will stand for warrenty as per their terms and conditions.</p>
        </div>
        <div class=" border border-gray-100 p-3 text-center border-end-0 border-start-0">
            <p>Thanks for your Business</p>
        </div>

    </div>
    <!-- End Content -->
@endsection