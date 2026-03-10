<?php $page = 'domain-hosting-invoice'; ?>
@extends('backoffice.layout.mainlayout')
@section('content')
@php
    $company = $settings?->company_settings ?? [];
    $billTo = $invoice->bill_to_snapshot ?? [];
    $billFrom = $invoice->bill_from_snapshot ?? [];
    $bank = $invoice->bank_details_snapshot ?? [];
    $currency = $company['currency'] ?? 'MAD';
@endphp
    <!-- Start Content -->
    <div class="invoice-wrapper">
        <div class="mb-3 border-bottom">
            <div class="d-flex align-items-center justify-content-between bg-light flex-wrap p-3  mb-3 rounded">
                <div>
                    <h6 class="mb-2 text-dark">{{ $company['company_name'] ?? $tenant?->name ?? '' }}</h6>
                    <p class="mb-2">Original pour le destinataire</p>
                </div>
                <div class="invoice-logo">
                    @if($tenant)
                        @php $logoPath = $tenant->getFirstMediaUrl('logo'); @endphp
                        @if($logoPath)
                            <img src="{{ $logoPath }}" alt="Logo" style="max-height: 50px;">
                        @endif
                    @endif
                </div>
            </div>
        </div>
        <div class="mb-3">
            <h5 class="text-center text-primary mb-3">FACTURE</h5>
            <div class="mb-3">
                <div class="row row-gap-3">
                    <div class="col-md-4 col-lg-4">
                        <div class="d-flex justify-content-between align-items-center bg-light p-2">
                            <p class="mb-0">Réf. Client :</p>
                            <p class="text-dark fw-medium">{{ $invoice->customer?->reference ?? '' }}</p>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4">
                        <div class="d-flex justify-content-between align-items-center bg-light p-2">
                            <p class="mb-0">Date :</p>
                            <p class="text-dark fw-medium">{{ $invoice->issue_date?->format('d/m/Y') }}</p>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4">
                        <div class="d-flex justify-content-between align-items-center bg-light p-2">
                            <p class="mb-0">N° Facture :</p>
                            <p class="text-dark fw-medium">{{ $invoice->number }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <p class="fs-16 fw-semibold mb-1">Facturé à :</p>
                <p class="text-dark">{{ $billTo['name'] ?? $invoice->customer?->name ?? '' }}
                    @if(!empty($billTo['address']))
                        <br> {{ $billTo['address'] }}
                    @endif
                    @if(!empty($billTo['email'] ?? $invoice->customer?->email ?? ''))
                        <br> {{ $billTo['email'] ?? $invoice->customer?->email ?? '' }}
                    @endif
                    @if(!empty($billTo['phone'] ?? $invoice->customer?->phone ?? ''))
                        <br> {{ $billTo['phone'] ?? $invoice->customer?->phone ?? '' }}
                    @endif
                </p>
            </div>
            <div class="mb-3">
                <h6 class="mb-3">Détails de la facture :</h6>
                <div class="table-responsive px-0">
                    <table class="table table-nowrap invoice-table2">
                        <thead class="thead-3">
                            <tr>
                                <th class="bg-light text-center ">Désignation</th>
                                <th class="bg-light text-center">Prix unit.</th>
                                <th class="bg-light text-center">Qté</th>
                                <th class="bg-light text-center">Total</th>
                            </tr>
                        </thead>
                        <tbody class="tbody-3">
                            @foreach($invoice->items->sortBy('position') as $index => $item)
                            <tr>
                                <td>
                                    <div class="bg-light p-2">
                                        <p class="text-dark">{{ $item->label }}@if($item->description) - {{ $item->description }}@endif</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-between align-items-center bg-light p-2">
                                        <p class="mb-0 text-dark"></p>
                                        <p class="text-dark">{{ number_format($item->unit_price, 2, ',', ' ') }} {{ $currency }}</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-between align-items-center bg-light p-2">
                                        <p class="mb-0 text-dark"></p>
                                        <p class="text-dark">{{ rtrim(rtrim(number_format($item->quantity, 3, ',', ' '), '0'), ',') }}</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-between align-items-center bg-light p-2">
                                        <p class="mb-0 text-dark"></p>
                                        <p class="text-dark">{{ number_format($item->line_subtotal, 2, ',', ' ') }} {{ $currency }}</p>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            @if($invoice->discount_total > 0)
                            <tr>
                                <td></td>
                                <td></td>
                                <td>
                                    <p class="text-dark fw-medium text-center">Remise</p>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-between align-items-center bg-light p-2">
                                        <p class="mb-0 text-dark fw-medium"></p>
                                        <p class="text-dark fw-medium">-{{ number_format($invoice->discount_total, 2, ',', ' ') }} {{ $currency }}</p>
                                    </div>
                                </td>
                            </tr>
                            @endif
                            <tr>
                                <td></td>
                                <td></td>
                                <td>
                                    <p class="text-dark fw-semibold text-center">Sous-total HT</p>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-between align-items-center bg-light p-2">
                                        <p class="mb-0 text-dark fw-semibold"></p>
                                        <p class="text-dark fw-semibold">{{ number_format($invoice->subtotal, 2, ',', ' ') }} {{ $currency }}</p>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="mb-3 bg-light p-2">
                <div class="row row-gap-3">
                    @if($invoice->tax_total > 0)
                    <div class="col-sm-6 col-md-6">
                        <div class="row align-items-center justify-content-between row-gap-3">
                            <div class="col-sm-6 col-md-6">
                                <p class="text-dark">TVA</p>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="d-flex justify-content-between align-items-center bg-white p-2">
                                    <p class="mb-0 text-dark"></p>
                                    <p class="text-dark">{{ number_format($invoice->tax_total, 2, ',', ' ') }} {{ $currency }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    <div class="col-sm-6 col-md-6">
                        <div class="row align-items-center justify-content-between row-gap-3">
                            <div class="col-sm-6 col-md-6">
                                <p class="text-dark">TOTAL TTC</p>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="d-flex justify-content-between align-items-center bg-dark p-2">
                                    <p class="mb-0 text-white fw-semibold"></p>
                                    <p class="text-white fw-semibold">{{ number_format($invoice->total, 2, ',', ' ') }} {{ $currency }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if($invoice->total_in_words)
            <div class="mb-3">
                <div class="py-2 px-3 d-flex justify-content-between align-items-center">
                    <div>
                        <p class="fs-13 mb-0">Arrêtée la présente facture à la somme de :</p>
                        <p class="text-dark">{{ $invoice->total_in_words }}</p>
                    </div>
                    <div class="text-md-end">
                        <p class="text-dark fw-semibold">Total TTC <span class="ms-4">{{ number_format($invoice->total, 2, ',', ' ') }} {{ $currency }}</span></p>
                    </div>
                </div>
            </div>
            @endif
            <div class="d-flex align-items-center justify-content-between flex-wrap mb-3 p-3">
                @if(!empty($bank))
                <div class="mb-3">
                    <h6 class="mb-2">Coordonnées bancaires :</h6>
                    <div>
                        @if(!empty($bank['bank_name']))
                            <p class="mb-1">Banque : <span class="text-dark">{{ $bank['bank_name'] }}</span></p>
                        @endif
                        @if(!empty($bank['account_name']))
                            <p class="mb-1">Titulaire : <span class="text-dark">{{ $bank['account_name'] }}</span></p>
                        @endif
                        @if(!empty($bank['rib']))
                            <p class="mb-1">RIB : <span class="text-dark">{{ $bank['rib'] }}</span></p>
                        @endif
                        @if(!empty($bank['iban']))
                            <p class="mb-1">IBAN : <span class="text-dark">{{ $bank['iban'] }}</span></p>
                        @endif
                    </div>
                </div>
                @endif
                <div class="text-center mb-3">
                    <p class="mb-1">Pour {{ $company['company_name'] ?? $tenant?->name ?? '' }}</p>
                    @if($signature && $signature->getFirstMediaUrl('signature'))
                        <span><img src="{{ $signature->getFirstMediaUrl('signature') }}" alt="Signature" style="max-height: 60px;"></span>
                    @endif
                </div>
            </div>
        </div>
        @if($invoice->terms)
        <div class="mb-3">
            <h6 class="mb-2">Conditions générales : </h6>
            {!! nl2br(e($invoice->terms)) !!}
        </div>
        @endif
        <div class=" border border-gray-100 p-3 text-center border-end-0 border-start-0">
            <p>Merci pour votre confiance</p>
        </div>

    </div>
    <!-- End Content -->
@endsection
