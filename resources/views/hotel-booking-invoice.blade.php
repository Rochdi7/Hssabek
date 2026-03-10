<?php $page = 'hotel-booking-invoice'; ?>
@extends('backoffice.layout.mainlayout')
@section('content')
    @php
        $company = $settings?->company_settings ?? [];
        $billTo = $invoice->bill_to_snapshot ?? [];
        $billFrom = $invoice->bill_from_snapshot ?? [];
        $bank = $invoice->bank_details_snapshot ?? [];
    @endphp
    <!-- ========================
            Start Page Content
        ========================= -->

    <div class="invoice-wrapper">

        <!-- start row -->
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="row justify-content-between border-top border-bottom row-gap-3 flex-wrap py-4 mb-3">
                    <div class="mb-3">
                        <h6><a href="{{ url()->previous() }}"><i class="isax isax-arrow-left me-1"></i>Retour</a></h6>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4 p-0">
                        <div class="invoice-logo">
                            @if($tenant)
                                @php $logoPath = $tenant->getFirstMediaUrl('logo'); @endphp
                                @if($logoPath)
                                    <img src="{{ $logoPath }}" class="mb-3 image-fluid" alt="img" style="max-height: 50px;">
                                @endif
                            @endif
                            <p class="mb-3">Original pour le destinataire</p>
                            <h3 class="text-primary">{{ $company['company_name'] ?? $tenant?->name ?? '' }}</h3>
                        </div>
                    </div> <!-- end col -->
                    <div class="col-sm-8 col-md-8 col-lg-8 p-0">
                        <div class="ribbon-hotel">
                            <span class="text-center text-white">Adresse : {{ $company['address'] ?? '' }}</span>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->
                <div class="row mb-3 justify-content-between row-gap-3">
                    <div class="col-lg-9 d-flex ps-0">
                        <div class="table-responsive px-0 d-flex flex-fill">
                            <table class="table table-nowrap invoice-table">
                                <tbody>
                                    <tr>
                                        <td>N° Facture</td>
                                        <td>
                                            <p class="text-dark fw-medium">{{ $invoice->number }}</p>
                                        </td>
                                        <td>Date</td>
                                        <td>
                                            <p class="text-dark fw-medium">{{ $invoice->issue_date?->format('d/m/Y') }}</p>
                                        </td>
                                        <td>Échéance</td>
                                        <td>
                                            <p class="text-dark fw-medium">{{ $invoice->due_date?->format('d/m/Y') }}</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Réf. Client</td>
                                        <td>
                                            <p class="text-dark fw-medium">{{ $invoice->customer?->id }}</p>
                                        </td>
                                        <td colspan="4"></td>
                                    </tr>
                                </tbody>
                            </table> <!-- end table -->
                        </div>
                    </div> <!-- end col -->
                    <div class="col-lg-3 d-flex px-0">
                        <div class="border rounded p-3 flex-fill">
                            <p class="fw-semibold fs-16 mb-2">Facturé à :</p>
                            <p class="text-dark fs-13">
                                {{ $billTo['name'] ?? '' }}<br>
                                {{ $billTo['address'] ?? '' }}
                            </p>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->
                <div class="row mb-3">
                    <h6 class="mb-3">Désignation :</h6>
                    <div class="table-responsive px-0">
                        <table class="table table-nowrap invoice-table2">
                            <thead class="thead-2">
                                <tr>
                                    <th>#</th>
                                    <th>Désignation</th>
                                    <th>Prix unit.</th>
                                    <th>Qté</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody class="tbody-2">
                                @foreach($invoice->items->sortBy('position') as $index => $item)
                                <tr class="{{ $index % 2 == 0 ? 'odd' : '' }}">
                                    <td>{{ $index + 1 }}</td>
                                    <td>
                                        {{ $item->label }}
                                        @if($item->description)
                                            <br><small>{{ $item->description }}</small>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p class="mb-0">{{ $currency }}</p>
                                            <p>{{ number_format($item->unit_price, 2, ',', ' ') }}</p>
                                        </div>
                                    </td>
                                    <td>{{ rtrim(rtrim(number_format($item->quantity, 3, ',', ' '), '0'), ',') }}</td>
                                    <td>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p class="mb-0">{{ $currency }}</p>
                                            <p>{{ number_format($item->line_total, 2, ',', ' ') }}</p>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                @if($invoice->discount_total > 0)
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <p class="fw-medium">Remise</p>
                                    </td>
                                    <td class="bg-light">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p class="mb-0 fw-medium">{{ $currency }}</p>
                                            <p class="fw-medium">{{ number_format($invoice->discount_total, 2, ',', ' ') }}</p>
                                        </div>
                                    </td>
                                </tr>
                                @endif
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <p class="fw-medium">Sous-total HT</p>
                                    </td>
                                    <td class="bg-light">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p class="mb-0 fw-medium">{{ $currency }}</p>
                                            <p class="fw-medium">{{ number_format($invoice->subtotal, 2, ',', ' ') }}</p>
                                        </div>
                                    </td>
                                </tr>
                                @if($invoice->enable_tax)
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <p class="fw-medium">TVA</p>
                                    </td>
                                    <td class="bg-light">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p class="mb-0 fw-medium">{{ $currency }}</p>
                                            <p class="fw-medium">{{ number_format($invoice->tax_total, 2, ',', ' ') }}</p>
                                        </div>
                                    </td>
                                </tr>
                                @endif
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <p class="fw-semibold fs-16">Total TTC</p>
                                    </td>
                                    <td class="bg-dark">
                                        <div class="d-flex justify-content-between align-items-center text-white">
                                            <p class="mb-0 fw-semibold">{{ $currency }}</p>
                                            <p class="fw-semibold">{{ number_format($invoice->total, 2, ',', ' ') }}</p>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table> <!-- end table -->
                    </div>
                </div> <!-- end row -->
                @if($invoice->terms)
                <div class="mb-3">
                    <h6 class="mb-2">Conditions générales : </h6>
                    <p class="mb-0">{!! nl2br(e($invoice->terms)) !!}</p>
                </div>
                @endif
                <div class="border-bottom">
                    <div class="bg-light border border-dark border-2 p-3 text-center border-end-0 border-start-0 mb-3">
                        <p>Merci pour votre confiance</p>
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
