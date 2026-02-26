<?php $page = 'student-billing-invoice'; ?>
@extends('layout.mainlayout')
@section('content')
    <!-- Start Invoice -->
    <div class="content p-4">
        <!-- start row -->
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="mb-3">
                    <h6><a href="{{url('invoice-templates')}}"><i class="isax isax-arrow-left me-1"></i>Back</a></h6>
                </div>
                <div class="pb-3 mb-3 border-bottom border-3 border-light">
                    <div class="d-flex align-items-center justify-content-between bg-light flex-wrap p-3 rounded">
                        <div>
                            <img src="{{URL::asset('build/img/invoice-logo.svg')}}" class="mb-2" alt="">
                        </div>
                        <div class="text-end">
                            <h6 class="text-primary fw-bold mb-2">UNIVERSITY NAME</h6>
                            <span class="text-gray mb-2">Original For Recipient</span>
                        </div>

                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-center mb-3">
                    <div>
                        <h6 class="mb-1 fs-16">Tax Invoice</h6>
                    </div>
                </div>
                <!-- start row -->
                <div class="row">
                    <div class="col-lg-4">
                        <div class="mb-3 border-light">
                            <div class="d-flex align-items-center justify-content-between bg-light flex-wrap p-2 rounded">
                                <div class="text-gray fw-normal">Student Name :</div>
                                <span class="text-dark fw-medium">Walter Roberson</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3 border-light">
                            <div class="d-flex align-items-center justify-content-between bg-light flex-wrap p-2 rounded">
                                <div class="text-gray fw-normal">Student ID :</div>
                                <span class="text-dark fw-medium">DD465123</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3 border-light">
                            <div class="d-flex align-items-center justify-content-between bg-light flex-wrap p-2 rounded">
                                <div class="text-gray fw-normal">Term :</div>
                                <span class="text-dark fw-medium">Winter</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3 border-light">
                            <div class="d-flex align-items-center justify-content-between bg-light flex-wrap p-2 rounded">
                                <div class="text-gray fw-normal">Balance Due :</div>
                                <span class="text-dark fw-medium">$1815</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3 border-light">
                            <div class="d-flex align-items-center justify-content-between bg-light flex-wrap p-2 rounded">
                                <div class="text-gray fw-normal">Due Date :</div>
                                <span class="text-dark fw-medium">05/01/2023</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3 border-light">
                            <div class="d-flex align-items-center justify-content-between bg-light flex-wrap p-2 rounded">
                                <div class="text-gray fw-normal">Statement For :</div>
                                <span class="text-dark fw-medium">2023 Spring</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <div>
                        <p class="mb-1 fw-bold d-block">Bill To :</p>
                        <span class="mb-1 fw-noraml text-dark d-block">Walter Roberson</span>
                        <span class="mb-1 fw-noraml text-dark d-block">299 Star Trek Drive, Panama City, Florida, 32405, USA.</span>
                        <span class="mb-1 fw-noraml text-dark d-block">walter@gmail.com</span>
                        <span class="mb-1 fw-noraml text-dark d-block">+45 5421 4523</span>
                    </div>
                </div>
                <!-- start row -->
                <div class="row mb-3">
                    <div class="col-md-12">
                        <table class="table">
                            <thead class="thead-light border border-gray border-start-0 border-end-0">
                                <tr>
                                    <th>#</th>
                                    <th>Item</th>
                                    <th>Due Date</th>
                                    <th class="text-end">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="border-gray">
                                    <td class="text-dark">1</td>
                                    <td>
                                        <div class="d-flex flex-column">
                                            <span class="text-dark">Semester Fee</span>
                                        </div>
                                    </td>
                                    <td><span class="text-dark">01Jan 2024</span></td>
                                    <td class="text-end"><span class="text-dark">$350</span></td>
                                </tr>
                                <tr class="border-gray">
                                    <td class="text-dark">2</td>
                                    <td>
                                        <div class="d-flex flex-column">
                                            <span class="text-dark">Exam Fee</span>
                                        </div>
                                    </td>
                                    <td><span class="text-dark">01Jan 2024</span></td>
                                    <td class="text-end"><span class="text-dark">$600</span></td>
                                </tr>
                                <tr class="border-gray">
                                    <td class="text-dark">3</td>
                                    <td>
                                        <div class="d-flex flex-column">
                                            <span class="text-dark">Tansport Fee</span>
                                        </div>
                                    </td>
                                    <td><span class="text-dark">01Jan 2024</span></td>
                                    <td class="text-end"><span class="text-dark">$400</span></td>
                                </tr>
                                <tr class="border-gray">
                                    <td class="text-dark">4</td>
                                    <td>
                                        <div class="d-flex flex-column">
                                            <span class="text-dark">Hostel Fee</span>
                                        </div>
                                    </td>
                                    <td><span class="text-dark">01Jan 2024</span></td>
                                    <td class="text-end"><span class="text-dark">$300</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- end row -->
                <!-- start row -->
                <div class="row">
                    <div class="col-md-9">
                        <p class="mb-1 fw-normal">Important Note :</p>
                        <span class="mb-1 fw-noraml text-dark">Delivery dates are not guaranteed and Seller has no liability for damages that may be incurred due to any delay.</span>
                    </div>
                    <div class="col-md-3">
                        <div class="">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <p class="fs-14 fw-medium mb-0 text-dark">Taxable Amount</p>
                                <p class="fs-14 fw-medium mb-0 text-dark">$1650.00</p>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <p class="fs-14 fw-medium mb-0 text-dark">Discount 0%</p>
                                <p class="fs-14 fw-medium mb-0 text-dark">+ $0.00</p>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <p class="fs-14 fw-medium mb-0 text-dark">IGST 18.0%</p>
                                <p class="fs-14 fw-medium mb-0 text-dark">$165.00</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
                <!-- start row -->
                <div class="row mb-2 border-top border-bottom border-3 border-light">
                    <div class="col-md-9 pb-3">
                        <p class="mb-1 fw-normal pt-3">Total amount ( in words):</p>
                        <span class="mb-1 fw-noraml text-dark">One Thousand, Eight Hundred and Fifteen Dollars Only.</span>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3 pt-4 align-items-center">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <h6 class="fs-18 fw-bold">Amount Payable</h6>
                                <h6 class="fs-18 fw-bold">$1,815.00</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
                <!-- start row -->
                <div class="row d-flex align-items-center justify-content-between flex-wrap border-bottom mb-3">
                    <div class="col-md-9">
                        <div class="mb-3">
                            <h6 class="mb-2">Payment Info :</h6>
                            <div>
                                <p class="mb-1">Debit Card : <span class="text-dark">465 *************645</span></p>
                                <p class="mb-1">Amount : <span class="text-dark">$1,815</span></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="text-end mb-3">
                            <p class="mb-1">For Dreamstechnologies</p>
                            <span><img src="{{URL::asset('build/img/icons/sign-01.png')}}" alt=""></span>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-center mb-3">
                        <div>
                            <h6 class="mb-2 fs-16 text-center">Terms & Conditions : </h6>
                            <p class="mb-0 fs-13">1. We are not the manufactures, company will stand for warrenty as per their terms and conditions. </p>
                        </div>
                    </div>
                </div>
                <!-- end row -->
                <!-- start row -->
                <div class="row border-bottom pb-3 text-center">
                    <div class="col-md-12">
                        <p class="text-gray">Thanks for your Business</p>
                    </div>
                </div>
                <!-- end row -->
            </div>
        </div>
        <!-- end row -->
    </div>
    <!-- End Invoice -->
@endsection