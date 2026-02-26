<?php $page = 'hotel-booking-invoice'; ?>
@extends('layout.mainlayout')
@section('content')
    <!-- ========================
        Start Page Content
    ========================= -->

    <div class="invoice-wrapper">

        <!-- start row -->
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="row justify-content-between border-top border-bottom row-gap-3 flex-wrap py-4 mb-3">
                    <div class="mb-3">
                        <h6><a href="{{url('invoice-templates')}}"><i class="isax isax-arrow-left me-1"></i>Back</a></h6>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4 p-0">
                        <div class="invoice-logo">
                            <img src="{{URL::asset('build/img/invoice-logo.svg')}}" class="mb-3 image-fluid" alt="img">
                            <p class="mb-3">Original For Recipient</p>
                            <h3 class="text-primary">Dreams Hotel</h3>
                        </div>
                    </div> <!-- end col -->
                    <div class="col-sm-8 col-md-8 col-lg-8 p-0">
                        <div class="ribbon-hotel">
                            <span class="text-center text-white">Address : 15 Hodges Mews, High Wycombe HP12 3JL, United Kingdom.</span>
                        </div>
                    </div> <!-- end col -->                        
                </div> <!-- end row -->
                <div class="row mb-3 justify-content-between row-gap-3">
                    <div class="col-lg-9 d-flex ps-0">
                        <div  class="table-responsive px-0 d-flex flex-fill">
                            <table class="table table-nowrap invoice-table">
                                <tbody>
                                    <tr>
                                        <td>Arrival Date</td>
                                        <td><p class="text-dark fw-medium">31-08-2024</p></td>
                                        <td>Rate per Day/room</td>
                                        <td><p class="text-dark fw-medium">175</p></td>
                                        <td>No. of Rooms</td>
                                        <td><p class="text-dark fw-medium">3</p></td>
                                    </tr>
                                    <tr>
                                        <td>Departure Date</td>
                                        <td><p class="text-dark fw-medium">05-09-2024</p></td>
                                        <td>No. of Adults</td>
                                        <td><p class="text-dark fw-medium">2</p></td>
                                        <td>Room No.s</td>
                                        <td><p class="text-dark fw-medium">181A, 182A</p></td>
                                    </tr>
                                    <tr>
                                        <td>Total No. of days</td>
                                        <td><p class="text-dark fw-medium">5</p></td>
                                        <td>No.of Children</td>
                                        <td><p class="text-dark fw-medium">4</p></td>
                                        <td>Room No.s</td>
                                        <td><p class="text-dark fw-medium">-</p></td>
                                    </tr>
                                </tbody>                
                            </table> <!-- end table -->
                        </div>
                    </div> <!-- end col -->
                    <div class="col-lg-3 d-flex px-0">
                        <div class="border rounded p-3 flex-fill">
                            <p class="fw-semibold fs-16 mb-2">Shipping Address :</p>
                            <p class="text-dark fs-13">Walter Roberson<br>
                            299 Star Trek Drive, Panama City,<br>
                            Florida, 32405,<br>
                            USA
                            </p>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->
                <div class="row mb-3">
                    <h6 class="mb-3">Service Details:</h6>
                    <div  class="table-responsive px-0">
                        <table class="table table-nowrap invoice-table2">
                            <thead class="thead-2">
                                <tr>
                                    <th>Date</th>
                                    <th>Services</th>
                                    <th>Charged Amount</th>
                                    <th>Discount</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody class="tbody-2">
                                <tr class="odd">
                                    <td>31-08-2024</td>
                                    <td>Special Menu</td>
                                    <td>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p class="mb-0">$</p>
                                            <p>50.00</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p class="mb-0">$</p>
                                            <p>50.00</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p class="mb-0">$</p>
                                            <p>150.00</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>01-09-2024</td>
                                    <td>Special Menu</td>
                                    <td>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p class="mb-0">$</p>
                                            <p>50.00</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p class="mb-0">$</p>
                                            <p>50.00</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p class="mb-0">$</p>
                                            <p>150.00</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="odd">
                                    <td>02-09-2024</td>
                                    <td>Special Menu</td>
                                    <td>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p class="mb-0">$</p>
                                            <p>50.00</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p class="mb-0">$</p>
                                            <p>50.00</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p class="mb-0">$</p>
                                            <p>150.00</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>03-09-2024</td>
                                    <td>Special Menu</td>
                                    <td>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p class="mb-0">$</p>
                                            <p>50.00</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p class="mb-0">$</p>
                                            <p>50.00</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p class="mb-0">$</p>
                                            <p>150.00</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <p class="fw-medium">Total Discount</p>
                                    </td>
                                    <td class="bg-light">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p class="mb-0 fw-medium">$</p>
                                            <p class="fw-medium">200.00</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <p class="fw-semibold fs-16">Total Amount</p>
                                    </td>
                                    <td class="bg-dark">
                                        <div class="d-flex justify-content-between align-items-center text-white">
                                            <p class="mb-0 fw-semibold">$</p>
                                            <p class="fw-semibold">600.00</p>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table> <!-- end table -->
                    </div>
                </div> <!-- end row -->
                <div class="row mb-3">
                    <h6 class="mb-3">Room Details:</h6>
                    <div  class="table-responsive px-0">
                        <table class="table table-nowrap invoice-table2">
                            <thead class="thead-2">
                                <tr>
                                    <th>Rate/Day</th>
                                    <th>No.of.Rooms</th>
                                    <th>Description</th>
                                    <th>Amount</th>
                                    <th>Discount</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody class="tbody-2">
                                <tr class="odd">
                                    <td>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p class="mb-0">$</p>
                                            <p>175.00</p>
                                        </div>
                                    </td>
                                    <td class="text-center">3</td>
                                    <td>Personal</td>
                                    <td>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p class="mb-0">$</p>
                                            <p>525.00</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p class="mb-0">$</p>
                                            <p>25.00</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p class="mb-0">$</p>
                                            <p>500.00</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p class="mb-0">$</p>
                                            <p>155.00</p>
                                        </div>
                                    </td>
                                    <td class="text-center">4</td>
                                    <td>Trip</td>
                                    <td>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p class="mb-0">$</p>
                                            <p>600.00</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p class="mb-0">$</p>
                                            <p>45.00</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p class="mb-0">$</p>
                                            <p>89,955.00</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <p class="fw-medium">Total Discount</p>
                                    </td>
                                    <td class="bg-light">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p class="mb-0 fw-medium">$</p>
                                            <p class="fw-medium">70.00</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr >
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <p class="fw-medium">Sub Total</p>
                                    </td>
                                    <td class="bg-light">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p class="mb-0 fw-medium">$</p>
                                            <p class="fw-medium">90,455.00</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <p class="fw-medium">Service Charges</p>
                                    </td>
                                    <td class="bg-light">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p class="mb-0 fw-medium">$</p>
                                            <p class="fw-medium">475.00</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <p class="fw-medium">Sales Tax</p>
                                    </td>
                                    <td class="bg-light">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p class="mb-0 fw-medium">%</p>
                                            <p class="fw-medium">475.00</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <p class="fw-semibold fs-16">Total Amount</p>
                                    </td>
                                    <td class="bg-dark">
                                        <div class="d-flex justify-content-between align-items-center text-white">
                                            <p class="mb-0 fw-semibold">$</p>
                                            <p class="fw-semibold">600.00</p>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table> <!-- end table -->
                    </div>
                </div> <!-- end row -->
                <div class="mb-3">
                    <h6 class="mb-2">Terms & Conditions : </h6>
                    <p class="mb-0">1. Goods Once sold cannot be taken back or exchanged.</p>
                    <p>2. We are not the manufactures, company will stand for warrenty as per their terms and conditions.</p>
                </div>
                <div class="border-bottom">
                    <div class="bg-light border border-dark border-2 p-3 text-center border-end-0 border-start-0 mb-3">
                        <p>Thanks for your Business</p>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
        <!-- end row -->
        
    </div>

    <!-- ========================
        End Page Content
    ========================= -->
@endsection