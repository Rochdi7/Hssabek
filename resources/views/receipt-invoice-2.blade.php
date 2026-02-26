<?php $page = 'receipt-invoice-2'; ?>
@extends('layout.mainlayout')
@section('content')

<div class="invoice-wrapper receipt-page">
    <div class="mb-3">
        <h6><a href="{{url('invoice-templates')}}"><i class="isax isax-arrow-left me-1"></i>Back</a></h6>
    </div>
    <div class="card m-auto shadow-none">
        <div class="card-body">
            <div class="bg-light p-2 text-center mb-2">
                <img src="{{URL::asset('build/img/receipt-logo.svg')}}" alt="User Img">
            </div>
            <h6 class="fs-16 fw-semibold text-center mb-2">Dreams Technologies Pvt Ltd.,</h6>
            <p class=" text-center mb-2">15 Hodges Mews, High Wycombe HP12 3JL, United Kingdom.
                Email: demo@gmail.com</p>
            <span class="retail-receipt fs-12 text-dark text-center fw-semibold mb-2">RETAIL RECEIPT</span>
            <div class="mb-2">

                <!-- start row -->
                <div class="row mb-2 row-gap-3">
                    <div class="col-sm-6 col-md-6">
                        <div class="d-flex justify-content-between align-items-center">
                            <p class=" mb-0">Name:</p>
                            <p class=" text-dark">John Doe</p>
                        </div>
                    </div><!-- end col -->
                    <div class="col-sm-6 col-md-6">
                        <div class="d-flex justify-content-between align-items-center">
                            <p class=" mb-0">Invoice No:</p>
                            <p class=" text-dark">CS132453</p>
                        </div>
                    </div><!-- end col -->
                </div>
                <!-- end row -->

                <!-- start row -->
                <div class="row row-gap-3">
                    <div class="col-sm-6 col-md-6">
                        <div class="d-flex justify-content-between align-items-center">
                            <p class=" mb-0">Customer Id:</p>
                            <p class=" text-dark">#LL93784</p>
                        </div>
                    </div><!-- end col -->
                    <div class="col-sm-6 col-md-6">
                        <div class="d-flex justify-content-between align-items-center">
                            <p class=" mb-0">Date :</p>
                            <p class=" text-dark">01.07.2024</p>
                        </div>
                    </div><!-- end col -->
                </div>
                <!-- end row -->
                 
            </div>
            <div class="receipt-header">
                <table class="table table-nowrap border-dashed mb-2">
                    <thead>
                        <tr class="mb-2">
                            <th class="fs-10 border-0 pe-0">SL</t>
                            <th class="fs-10 border-0 ps-0">Item</th>
                            <th class="fs-10 border-0 pe-0 text-end">Price</th>
                            <th class="fs-10 border-0 pe-0 text-end">Qty</th>
                            <th class="fs-10 border-0 pe-0 text-end">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="fs-10 border-0 p-1 pe-0">1.</td>
                            <td class="fs-10 border-0 p-1 ps-0">Sugarfree</td>
                            <td class="fs-10 border-0 p-1 text-end">$50</td>
                            <td class="fs-10 border-0 p-1 text-end">3</td>
                            <td class="fs-10 border-0 p-1 text-end">$150</td>
                        </tr>
                        <tr>
                            <td class="fs-10 border-0 p-1 pe-0">2.</td>
                            <td class="fs-10 border-0 p-1 ps-0">Onion (Loose) (5kg)</td>
                            <td class="fs-10 border-0 p-1 text-end">$50</td>
                            <td class="fs-10 border-0 p-1 text-end">2</td>
                            <td class="fs-10 border-0 p-1 text-end">$100</td>
                        </tr>
                        <tr>
                            <td class="fs-10 border-0 p-1 pe-0">3.</td>
                            <td class="fs-10 border-0 p-1 ps-0">Mushrooms - Button 1 pack</td>
                            <td class="fs-10 border-0 p-1 text-end">$50</td>
                            <td class="fs-10 border-0 p-1 text-end">3</td>
                            <td class="fs-10 border-0 p-1 text-end">$150</td>
                        </tr>
                        <tr>
                            <td class="fs-10 border-0 p-1 pe-0">4.</td>
                            <td class="fs-10 border-0 p-1 ps-0">Tea 1kg</td>
                            <td class="fs-10 border-0 p-1 text-end">$50</td>
                            <td class="fs-10 border-0 p-1 text-end">3</td>
                            <td class="fs-10 border-0 p-1 text-end">$150</td>
                        </tr>
                        <tr class="border-dashed">
                            <td class="fs-10 border-0 p-1 pe-0">5.</td>
                            <td class="fs-10 border-0 p-1 ps-0">Diet Coke Soft Drink 300ml</td>
                            <td class="fs-10 border-0 p-1 text-end">$50</td>
                            <td class="fs-10 border-0 p-1 text-end">3</td>
                            <td class="fs-10 border-0 p-1 text-end">$150</td>
                        </tr>
                        <tr>
                            <td class="border-0"></td>
                            <td colspan="2" class="fs-10 border-0 p-1 text-end">Sub Total :</td>
                            <td colspan="2" class="fs-10 border-0 p-1 text-end">$700.00</td>
                        </tr>
                        <tr>
                            <td class="border-0"></td>
                            <td colspan="2" class="fs-10 border-dashed p-1 text-end">Discount :</td>
                            <td colspan="2" class="fs-10 border-dashed p-1 text-end">-$50.00</td>
                        </tr>
                        <tr>
                            <td class="border-0"></td>
                            <td colspan="2" class="fs-10 border-0 p-1 text-end">Service Charge :</td>
                            <td colspan="2" class="fs-10 border-0 p-1 text-end">0.00</td>
                        </tr>
                        <tr>
                            <td class="border-0"></td>
                            <td colspan="2" class="fs-10 border-dashed p-1 text-end">Tax(5%) :</td>
                            <td colspan="2" class="fs-10 border-dashed p-1 text-end">$5.00</td>
                        </tr>
                        <tr>
                            <td class="border-0"></td>
                            <td colspan="2" class="fs-10 border-0 p-1 text-end">Total Bill :</td>
                            <td colspan="2" class="fs-10 border-0 p-1 text-end">$655.00</td>
                        </tr>
                        <tr>
                            <td class="border-0"></td>
                            <td colspan="2" class="fs-10 border-0 p-1 text-end">Due :</td>
                            <td colspan="2" class="fs-10 border-0 p-1 text-end">$0.00</td>
                        </tr>
                        <tr>
                            <td class="border-0"></td>
                            <td colspan="2" class="fs-10 border-dashed p-1 text-dark text-end fw-semibold">Total Payable :</td>
                            <td colspan="2" class="fs-10 border-dashed p-1 text-dark text-end fw-semibold">$655.00</td>
                        </tr>
                    </tbody>
                </table>
                <p class="text-center mb-2">12332345698234592384</p>
                <img src="{{URL::asset('build/img/barcode.svg')}}" class="img-fluid mb-2" alt="img">
                <p class="text-center border-dashed pb-2 mb-2">**VAT against this challan is payable through central registration. Thank you for your business!</p>
                <p class="text-center">Thank You</p>
            </div>
        </div><!-- end card body -->
    </div><!-- end card -->
</div>
@endsection