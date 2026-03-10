<?php $page = 'internet-billing-invoice'; ?>
@extends('backoffice.layout.mainlayout')
@section('content')
    @php
        $company = $settings?->company_settings ?? [];
        $billTo = $invoice->bill_to_snapshot ?? [];
        $billFrom = $invoice->bill_from_snapshot ?? [];
        $bank = $invoice->bank_details_snapshot ?? [];
    @endphp
    <!-- Start content -->
    <div class="content p-4">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="d-flex align-items-center justify-content-between border-bottom flex-wrap row-gap-3 mb-3 pb-3">
                    <div class="">
                        <p class="mb-1">Original pour le destinataire</p>
                        <h6 class="text-primary mb-2">FACTURE</h6>
                        <div>
                            <h6 class="mb-1">{{ $company['company_name'] ?? $tenant?->name ?? '' }}</h6>
                            <div>
                                <p class="mb-1">Adresse : <span>{{ $company['address'] ?? '' }}</span></p>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div class="mb-1 text-end">
                            @if($tenant)
                                @php $logoPath = $tenant->getFirstMediaUrl('logo'); @endphp
                                @if($logoPath)
                                    <img src="{{ $logoPath }}" alt="" style="max-height: 50px;">
                                @endif
                            @endif
                        </div>
                        <p class="mb-1 text-end">Date : <span class="text-dark">{{ $invoice->issue_date?->format('d/m/Y') }}</span></p>
                        <div class="inv-details">
                            <div class="inv-date-rest">
                                <p class="text-start text-white">N° Facture : <span>{{ $invoice->number }}</span></p>
                            </div>
                            <div class="triangle-right"></div>
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <div>
                        <p class="mb-1">Facturé à :</p>
                        <h6 class="mb-1 fs-16">{{ $billTo['name'] ?? '' }}</h6>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-6 md-12 d-flex align-items-center justify-content-between">
                        <p class="mb-1">Réf. Client :</p>
                        <span class="mb-1 fs-13 fw-noraml text-dark">{{ $invoice->customer?->id }}</span>
                    </div>
                    <div class="col-6 md-12 d-flex align-items-center justify-content-between">
                        <p class="mb-1">Date :</p>
                        <span class="mb-1 fs-13 fw-noraml text-dark">{{ $invoice->issue_date?->format('d/m/Y') }}</span>
                    </div>
                    <div class="col-6 md-12 d-flex align-items-center justify-content-between">
                        <p class="mb-1">Échéance :</p>
                        <span class="mb-1 fs-13 fw-noraml text-dark">{{ $invoice->due_date?->format('d/m/Y') }}</span>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-12">
                        <table class="table">
                            <thead
                                class="thead-light border-top border-start-0 border-end-0 border-bottom border-3 border-dark p-2">
                                <tr>
                                    <th>#</th>
                                    <th>Désignation</th>
                                    <th>Prix unit.</th>
                                    <th>Qté</th>
                                    <th class="text-end">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($invoice->items->sortBy('position') as $index => $item)
                                <tr class="border-dark">
                                    <td class="text-dark">{{ $index + 1 }}</td>
                                    <td>
                                        <div class="d-flex flex-column">
                                            <span class="text-dark">{{ $item->label }}</span>
                                            @if($item->description)
                                                <span>{{ $item->description }}</span>
                                            @endif
                                        </div>
                                    </td>
                                    <td><span class="text-dark">{{ number_format($item->unit_price, 2, ',', ' ') }} {{ $currency }}</span></td>
                                    <td><span class="text-dark">{{ rtrim(rtrim(number_format($item->quantity, 3, ',', ' '), '0'), ',') }}</span></td>
                                    <td class="text-end"><span class="text-dark">{{ number_format($item->line_total, 2, ',', ' ') }} {{ $currency }}</span></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-8">

                    </div>
                    <div class="col-md-4">
                        <div class="d-flex align-items-center justify-content-between ">
                            <div class="d-flex flex-column">
                                <span class="text-dark text-end fw-semibold mb-1">Sous-total HT</span>
                                @if($invoice->enable_tax)
                                <span class="text-dark text-end fw-semibold">TVA</span>
                                @endif
                            </div>
                            <div class="d-flex flex-column text-end">
                                <span class="text-dark fw-semibold mb-1">{{ number_format($invoice->subtotal, 2, ',', ' ') }} {{ $currency }}</span>
                                @if($invoice->enable_tax)
                                <span class="text-dark fw-semibold">{{ number_format($invoice->tax_total, 2, ',', ' ') }} {{ $currency }}</span>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row border-top border-bottom border-3 border-dark p-3 align-items-center">
                    <div class="col-md-8">
                        <span class="text-dark">Total articles / Qté : {{ $invoice->items->count() }} / {{ rtrim(rtrim(number_format($invoice->items->sum('quantity'), 2, ',', ' '), '0'), ',') }}</span>
                    </div>
                    <div class="col-md-4">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class=" text-end">
                                <span class="fw-bold fs-18 text-end text-dark">Total TTC</span>
                            </div>
                            <div class="text-end">
                                <span class="fw-bold fs-18 text-dark">{{ number_format($invoice->total, 2, ',', ' ') }} {{ $currency }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                @if($invoice->total_in_words)
                <div class="row py-3 border-bottom  border-bottom border-3 border-dark mb-3 d-flex align-items-center">
                    <div class="col-md-12">
                        <div class="d-flex align-items-center justify-content-center">
                            <p class="text-gary">Arrêtée la présente facture à la somme de :<span class="text-dark"> {{ $invoice->total_in_words }}</span></p>
                        </div>
                    </div>
                </div>
                @endif
                @if(!empty($bank))
                <div class="d-flex align-items-center flex-wrap border-bottom mb-3">
                    <div class="mb-3">
                        <h6 class="mb-2">Coordonnées bancaires :</h6>
                        <div>
                            <p class="mb-1">Banque : <span class="text-dark">{{ $bank['bank_name'] ?? '' }}</span></p>
                            <p class="mb-1">Titulaire : <span class="text-dark">{{ $bank['account_name'] ?? '' }}</span></p>
                            @if(!empty($bank['rib']))
                            <p class="mb-1">RIB : <span class="text-dark">{{ $bank['rib'] }}</span></p>
                            @endif
                            @if(!empty($bank['iban']))
                            <p class="mb-1">IBAN : <span class="text-dark">{{ $bank['iban'] }}</span></p>
                            @endif
                        </div>
                    </div>
                </div>
                @endif
                <div class="row border border-start-0 border-end-0 border-dark text-center text-white bg-light p-2">
                    <div class="col-md-12">
                        <p class="text-gray">Merci pour votre confiance</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End content -->
@endsection
