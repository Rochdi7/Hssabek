<?php $page = 'car-booking-invoice'; ?>
@extends('layout.mainlayout')
@section('content')
    <!-- ========================
        Start Page Content
    ========================= -->

    <div class="invoice-wrapper">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="mb-3">
                    <h6><a href="{{url('invoice-templates')}}"><i class="isax isax-arrow-left me-1"></i>Back</a></h6>
                </div>
                <div class="mb-3">
                    <div class="d-flex align-items-center justify-content-between bg-primary flex-wrap p-3 rounded">

                        <div>
                            <p class="text-white mb-2">Original For Recipient</p>
                            <h6 class="mb-0 text-white">Tax Invoice</h6>

                        </div>
                        <div>
                            <img src="{{URL::asset('build/img/logo-white.svg')}}" alt="">
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <div>
                        <h6 class="mb-1 fs-16">Dreams Car</h6>
                        <p>299 Star Trek Drive, Panama City, Florida, 32405, USA</p>
                    </div>
                    <div class="text-end">
                        <h6 class="mb-1 fs-18 fw-medium">Info:</h6>
                        <p class="invoice-info">Seating is on a first come, first served basis unless you have purchased ticket for a Reserved Seating performance. Please arrive early for best seat section.</p>
                    </div>

                </div>
                <div class="row mb-4 ">
                    <div class="col-md-4">
                        <div class="bg-light">
                            <div class="d-flex justify-content-center align-items-center p-2">
                                <span class="me-3">Date:</span>
                                <span class="text-dark fw-medium">05/12/2024</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="bg-light">
                            <div class="d-flex justify-content-center align-items-center p-2">
                                <span class="me-3">Journy Date:</span>
                                <span class="text-dark fw-medium">05/01/2023</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="bg-light">
                            <div class="d-flex justify-content-center align-items-center p-2">
                                <span class="me-3">Invoice No:</span>
                                <span class="text-dark fw-medium">#00001</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-4 ">
                    <div class="col-md-4 d-flex">
                        <div class="d-flex align-items-center  bg-light px-3 py-4 flex-fill">
                            <ul class="activity-feed bg-light rounded">
                                <li class="feed-item timeline-item">
                                    <p class="mb-1 text-gray-5 fw-semibold fs-16">From Station</p>
                                </li>
                                <li class="feed-item timeline-item">
                                    <div><span class="text-dark fw-semibold">Acton GTR 3:00PM</span></div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4 d-flex">
                        <div class="d-flex align-items-center bg-light px-3 py-4 flex-fill">
                            <ul class="activity-feed bg-light rounded">
                                <li class="feed-item timeline-item">
                                    <p class="mb-1 text-gray-5 fw-semibold fs-16">To Station</p>
                                </li>
                                <li class="feed-item timeline-item">
                                    <div><span class="text-dark fw-semibold">Acton GWR 4:30PM</span></div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2 d-flex">
                        <div class="d-flex align-items-center justify-content-center bg-light px-3 py-4 flex-fill">
                            <div class="text-center">
                                <p class="mb-2 text-gray-5 fw-medium fs-18">No Of Days</p>
                                <h4 class="mb-0 text-primary fw-semibold">15 Days</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 d-flex">
                        <div class="d-flex align-items-center justify-content-center bg-light px-3 py-4 flex-fill">
                            <div class="text-center">
                                <p class="mb-2 text-gray-5 fw-medium fs-18">Upto</p>
                                <h4 class="mb-0 text-primary fw-semibold">1500 Km</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-4 ">
                    <div class="col-md-4">
                        <div class="ribbon-tittle">
                            <div class="ribbon-text">
                                <span class="text-white">Hirer’s Information</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="ribbon-tittle">
                            <div class="ribbon-text">
                                <span class="text-white">Car Information</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="ribbon-tittle">
                            <div class="ribbon-text">
                                <span class="text-white">Driver Information</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-4 ">
                    <div class="col-md-4 d-flex">
                        <div class="d-flex justify-content-between bg-light p-3 flex-fill">
                            <div class="d-flex flex-column">
                                <span class="mb-1">Hirer’s Name:</span>
                                <span class="mb-1">Passport NO:</span>
                                <span class="mb-1">Licence NO:</span>
                                <span class="mb-1">Date of birth:</span>
                                <span>Address:</span>
                            </div>
                            <div class="d-flex flex-column text-end">
                                <span class="text-dark mb-1">Jennifer Richards</span>
                                <span class="text-dark mb-1">AA123456</span>
                                <span class="text-dark mb-1">Toronto - G 28-26-23</span>
                                <span class="text-dark mb-1">05 Feb 1991</span>
                                <span class="text-dark">440 Balmy Beach Road, Owen Sound, Ontario, Canada</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 d-flex">
                        <div class="d-flex justify-content-between bg-light p-3 flex-fill">
                            <div class="d-flex flex-column">
                                <span class="mb-1">Car Mode:</span>
                                <span class="mb-1">Type:</span>
                                <span class="mb-1">Licence NO:</span>
                                <span>Expire Date :</span>

                            </div>
                            <div class="d-flex flex-column text-end">
                                <span class="text-dark mb-1">Lamborghini Aventador</span>
                                <span class="text-dark mb-1">Aventador</span>
                                <span class="text-dark mb-1">LI-25345</span>
                                <span class="text-dark mb-1">05 Feb 2026</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 d-flex">
                        <div class="d-flex justify-content-between bg-light p-3 flex-fill">
                            <div class="d-flex flex-column">
                                <span class="mb-1">Driver Name :</span>
                                <span class="mb-1">Driving Licence :</span>
                                <span class="mb-1">Expire Date :</span>
                                <span>Contact :</span>

                            </div>
                            <div class="d-flex flex-column text-end">
                                <span class="text-dark mb-1">Jennifer Law</span>
                                <span class="text-dark mb-1">LI-25345</span>
                                <span class="text-dark mb-1">05 Feb 2026</span>
                                <span class="text-dark mb-1">+1-613-555-0141</span>
                            </div>
                        </div>
                    </div>
                </div>
                <h6 class="mb-3 fs-16">Travel Information</h6>
                <div class="row mb-4">
                    <div class="col-md-12">
                        <table class="table table-nowrap invoice-tables">
                            <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>Train Details</th>
                                    <th>Base Fare</th>
                                    <th>Qty</th>
                                    <th class="text-end">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>
                                        <div class="d-flex flex-column">
                                            <span class="text-dark">Lamborghini Aventador - 15 Days - Driver Services - Road Fee</span>
                                        </div>
                                    </td>
                                    <td><span class="text-dark">$350</span></td>
                                    <td><span class="text-dark">1</span></td>
                                    <td class="text-end"><span class="text-dark">$350</span></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>
                                        <div class="d-flex flex-column">
                                            <span class="text-dark">Premium location fee</span>
                                        </div>
                                    </td>
                                    <td><span class="text-dark">$600</span></td>
                                    <td><span class="text-dark">1</span></td>
                                    <td class="text-end"><span class="text-dark">$600</span></td>
                                </tr>

                                <tr>
                                    <td colspan="2" class="border-0"></td>
                                    <td colspan="2" class="text-dark text-end fw-medium border-0">Taxable Amount</td>
                                    <td class="text-dark text-end fw-medium border-0">$1650.00</td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="border-bottom-transparent"></td>
                                    <td colspan="2" class="text-dark text-end fw-medium border-bottom-transparent">IGST 18.0%</td>
                                    <td class="text-dark text-end fw-medium border-bottom-transparent">$165.00</td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="text-dark border-0 bg-light">Total Items / Qty : 4 / 4.00</td>
                                    <td colspan="2" class="text-dark bg-light border-0 text-end fw-medium">
                                        <h6>Total</h6></td>
                                    <td class="text-dark bg-light text-end border-0 fw-medium">
                                        <h6>$1,815.00</h6></td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="border-bottom-transparent">
                                        <div class="d-flex flex-column">
                                            <span>Total amount ( in words):</span>
                                            <span class="text-dark mb-1">One Thousand, Eight Hundred and Fifteen Dollars Only</span>
                                        </div>
                                    </td>
                                    <td colspan="2" class="text-dark text-end border-bottom-transparent fw-medium">
                                        <h6>Amount Payable</h6></td>
                                    <td class="text-dark border-bottom-transparent text-end fw-medium">
                                        <h6>$1,815.00</h6></td>
                                </tr>
                            </tbody>
                        </table>
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

                </div>
                <div class="border-bottom mb-3 p-3">
                    <h6 class="mb-2">Terms &amp; Conditions : </h6>
                    <p class="mb-1">1. Goods Once sold cannot be taken back or exchanged.</p>
                    <p>2. We are not the manufactures, company will stand for warrenty as per their terms and conditions.</p>
                </div>
                <div class="border-bottom text-center pb-3">
                    <p>Thanks for your Business</p>
                </div>
            </div>
        </div>
    </div>

    <!-- ========================
        End Page Content
    ========================= -->
@endsection