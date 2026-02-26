<?php $page = 'prefixes-settings'; ?>
@extends('layout.mainlayout')
@section('content')
   
   <!-- ========================
			Start Page Content
		========================= -->
        <div class="page-wrapper">
			<!-- Start Container-->
            <div class="content">
				<!-- start row  -->
                <div class="row justify-content-center">
                    <div class="col-xl-12">
						<!-- start col  -->
                        <div class="row settings-wrapper d-flex">

                            @component('components.settings-sidebar')
                             @endcomponent
                            <div class="col-xl-9 col-lg-8">
                                <div class="mb-3 pb-3 border-bottom">
                                    <h6 class="fw-bold mb-0">Prefixes</h6>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Product</label>
                                            <div class="input-group d-flex align-items-center mb-3">
                                                <span class="input-group-text border-end-0 fs-14 pe-1">PRO -</span>
                                                <input type="text" class="form-control border-start-0 ps-0" aria-label="Username">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Invoice</label>
                                            <div class="input-group d-flex align-items-center mb-3">
                                                <span class="input-group-text border-end-0 fs-14 pe-1">INV -</span>
                                                <input type="text" class="form-control border-start-0 ps-0" aria-label="Username">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Transaction</label>
                                            <div class="input-group d-flex align-items-center mb-3">
                                                <span class="input-group-text border-end-0 fs-14 pe-1">TXN -</span>
                                                <input type="text" class="form-control border-start-0 ps-0" aria-label="Username">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Purchase</label>
                                            <div class="input-group d-flex align-items-center mb-3">
                                                <span class="input-group-text border-end-0 fs-14 pe-1">PUR - </span>
                                                <input type="text" class="form-control border-start-0 ps-0" aria-label="Username">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Reference Number</label>
                                            <div class="input-group d-flex align-items-center mb-3">
                                                <span class="input-group-text border-end-0 fs-14 pe-1">REF - </span>
                                                <input type="text" class="form-control border-start-0 ps-0" aria-label="Username">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Debit Note</label>
                                            <div class="input-group d-flex align-items-center mb-3">
                                                <span class="input-group-text border-end-0 fs-14 pe-1">DN - </span>
                                                <input type="text" class="form-control border-start-0 ps-0" aria-label="Username">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Credit Note</label>
                                            <div class="input-group d-flex align-items-center mb-3">
                                                <span class="input-group-text border-end-0 fs-14 pe-1">CN - </span>
                                                <input type="text" class="form-control border-start-0 ps-0" aria-label="Username">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Purchase Order</label>
                                            <div class="input-group d-flex align-items-center mb-3">
                                                <span class="input-group-text border-end-0 fs-14 pe-1">PO - </span>
                                                <input type="text" class="form-control border-start-0 ps-0" aria-label="Username">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Payments</label>
                                            <div class="input-group d-flex align-items-center mb-3">
                                                <span class="input-group-text border-end-0 fs-14 pe-1">PAY - </span>
                                                <input type="text" class="form-control border-start-0 ps-0" aria-label="Username">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Quotation</label>
                                            <div class="input-group d-flex align-items-center mb-3">
                                                <span class="input-group-text border-end-0 fs-14 pe-1">QUO - </span>
                                                <input type="text" class="form-control border-start-0 ps-0" aria-label="Username">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Expense</label>
                                            <div class="input-group d-flex align-items-center mb-3">
                                                <span class="input-group-text border-end-0 fs-14 pe-1">EXP - </span>
                                                <input type="text" class="form-control border-start-0 ps-0" aria-label="Username">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Income</label>
                                            <div class="input-group d-flex align-items-center mb-3">
                                                <span class="input-group-text border-end-0 fs-14 pe-1">INC - </span>
                                                <input type="text" class="form-control border-start-0 ps-0" aria-label="Username">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end col  -->


                        </div>
						<!-- end row  -->
                    </div>  <!-- end col  -->
                </div>
				<!-- end row  -->
            </div>
			<!-- End Container-->

            @component('components.footer')
            @endcomponent
        </div>
        <!-- ========================
			End Page Content
		========================= -->

@endsection