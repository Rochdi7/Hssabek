<?php $page = 'fitness-center-invoice'; ?>
@extends('backoffice.layout.mainlayout')
@section('content')
@php
    $company = $settings?->company_settings ?? [];
    $billTo = $invoice->bill_to_snapshot ?? [];
    $billFrom = $invoice->bill_from_snapshot ?? [];
    $bank = $invoice->bank_details_snapshot ?? [];
    $currency = $company['currency'] ?? 'MAD';
@endphp
    <!-- ========================
            Start Page Content
        ========================= -->

    <!-- Start Content -->
    <div class="content p-4">

        <!-- start row -->
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="mb-3">
                    <h6><a href="{{ url()->previous() }}"><i class="isax isax-arrow-left me-1"></i>Retour</a></h6>
                </div>
                <div class="d-flex align-items-center justify-content-between flex-wrap row-gap-3 mb-3 pb-3">
                    <div>
                        <h6 class="text-dark mb-2">FACTURE</h6>
                        <div>
                            <h6 class="mb-1">{{ $company['company_name'] ?? $tenant?->name ?? '' }}</h6>
                            <div>
                                <p class="mb-1">IF : <span class="text-dark">{{ $company['tax_id'] ?? '' }}</span></p>
                            </div>
                            <div>
                                <p class="mb-1">Adresse : <span class="text-dark">{{ $company['address'] ?? '' }}</span></p>
                            </div>
                            <div>
                                <p class="mb-1">Tél : <span class="text-dark">{{ $company['phone'] ?? '' }}</span></p>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="mb-1 text-end">
                            @if($tenant)
                                @php $logoPath = $tenant->getFirstMediaUrl('logo'); @endphp
                                @if($logoPath)
                                    <img src="{{ $logoPath }}" alt="Logo" style="max-height: 50px;">
                                @endif
                            @endif
                        </div>
                        <div>
                            <p class="mb-1 text-end">Original pour le destinataire</p>
                        </div>
                        <div>
                            <p class="mb-1 text-end">Date : <span class="text-dark">{{ $invoice->issue_date?->format('d/m/Y') }}</span></p>
                        </div>
                        <div>
                            <p class="mb-1 text-end">N° Facture : <span class="text-dark">{{ $invoice->number }}</span></p>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-md-2">
                            <div class="mb-3 align-items-center justify-content-end">
                                <p class="mb-1">Facturé à :</p>
                                <h6 class="mb-1 fs-16">{{ $billTo['name'] ?? $invoice->customer?->name ?? '' }}</h6>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="d-block py-4 px-2 bg-light text-center">
                                <p class="mb-1 text-gray">Total TTC</p>
                                <h6 class="mb-1 fs-16">{{ number_format($invoice->total, 2, ',', ' ') }} {{ $currency }}</h6>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- start row -->
                <div class="row mb-3">
                    <div class="col-6 md-12 d-flex align-items-center justify-content-between">
                        <p class="mb-1">Réf. Client :</p>
                        <span class="mb-1 fs-13 fw-noraml text-dark">{{ $invoice->customer?->reference ?? '' }}</span>
                    </div>
                    <div class="col-6 md-12 d-flex align-items-center justify-content-between">
                        <p class="mb-1">Email :</p>
                        <span class="mb-1 fs-13 fw-noraml text-dark">{{ $billTo['email'] ?? $invoice->customer?->email ?? '' }}</span>
                    </div>
                    <div class="col-6 md-12 d-flex align-items-center justify-content-between">
                        <p class="mb-1">Date : </p>
                        <span class="mb-1 fs-13 fw-noraml text-dark">{{ $invoice->issue_date?->format('d/m/Y') }}</span>
                    </div>
                    <div class="col-6 md-12 d-flex align-items-center justify-content-between">
                        <p class="mb-1">Échéance :</p>
                        <span class="mb-1 fs-13 fw-noraml text-dark">{{ $invoice->due_date?->format('d/m/Y') }}</span>
                    </div>
                    <div class="col-6 md-12 d-flex align-items-center justify-content-between">
                        <p class="mb-1">Tél :</p>
                        <span class="mb-1 fs-13 fw-noraml text-dark">{{ $billTo['phone'] ?? $invoice->customer?->phone ?? '' }}</span>
                    </div>
                    <div class="col-6 md-12 d-flex align-items-center justify-content-between">
                        <p class="mb-1">Adresse :</p>
                        <span class="mb-1 fs-13 fw-noraml text-dark">{{ $billTo['address'] ?? '' }}</span>
                    </div>
                </div>
                <!-- end row -->

                <!-- start row -->
                <div class="row mb-3">
                    <div class="col-md-12">
                        <table class="table">
                            <thead
                                class="thead-dark border-top border-start-0 border-end-0 border-bottom border-3 border-dark p-2">
                                <tr>
                                    <th>#</th>
                                    <th>Désignation</th>
                                    <th>Qté</th>
                                    <th>Prix unit.</th>
                                    <th class="text-end">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($invoice->items->sortBy('position') as $index => $item)
                                <tr class="border-gray">
                                    <td class="text-dark">{{ $index + 1 }}</td>
                                    <td>
                                        <div class="d-flex flex-column">
                                            <span class="text-dark">{{ $item->label }}</span>
                                            @if($item->description)
                                                <span>{{ $item->description }}</span>
                                            @endif
                                        </div>
                                    </td>
                                    <td><span class="text-dark">{{ rtrim(rtrim(number_format($item->quantity, 3, ',', ' '), '0'), ',') }}</span></td>
                                    <td><span class="text-dark">{{ number_format($item->unit_price, 2, ',', ' ') }} {{ $currency }}</span></td>
                                    <td class="text-end"><span class="text-dark">{{ number_format($item->line_subtotal, 2, ',', ' ') }} {{ $currency }}</span></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- end row -->

                <!-- start row -->
                <div class="row mb-2">
                    <div class="col-md-8">

                    </div>
                    <div class="col-md-4">
                        <div class="d-flex align-items-center justify-content-between ">
                            <div class="d-flex flex-column">
                                <span class="text-dark text-end fw-semibold mb-1">Sous-total HT</span>
                                @if($invoice->tax_total > 0)
                                    <span class="text-dark text-end fw-semibold">TVA</span>
                                @endif
                                @if($invoice->discount_total > 0)
                                    <span class="text-dark text-end fw-semibold">Remise</span>
                                @endif
                            </div>
                            <div class="d-flex flex-column text-end">
                                <span class="text-dark fw-semibold mb-1">{{ number_format($invoice->subtotal, 2, ',', ' ') }} {{ $currency }}</span>
                                @if($invoice->tax_total > 0)
                                    <span class="text-dark fw-semibold">{{ number_format($invoice->tax_total, 2, ',', ' ') }} {{ $currency }}</span>
                                @endif
                                @if($invoice->discount_total > 0)
                                    <span class="text-dark fw-semibold">-{{ number_format($invoice->discount_total, 2, ',', ' ') }} {{ $currency }}</span>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>
                <!-- end row -->

                <!-- start row -->
                <div class="row border-top border-bottom border-3 border-gray p-3 align-items-center">
                    <div class="col-md-8">
                        <span class="text-dark">{{ $invoice->items->count() }} article(s)</span>
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
                <!-- end row -->

                <!-- start row -->
                @if($invoice->total_in_words)
                <div class="row py-3 border-bottom  border-bottom border-3 border-gray mb-3 d-flex align-items-center">
                    <div class="col-md-12">
                        <div class="d-flex align-items-center justify-content-center">
                            <p class="text-gary">Arrêtée la présente facture à la somme de :<span class="text-dark"> {{ $invoice->total_in_words }}</span></p>
                        </div>
                    </div>
                </div>
                @endif
                <!-- end row -->

                <div class="d-flex align-items-center justify-content-between flex-wrap mb-2 p-3">
                    <div class="">
                        @if(!empty($bank))
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
                                <p class="">IBAN : <span class="text-dark">{{ $bank['iban'] }}</span></p>
                            @endif
                        </div>
                        @endif
                    </div>
                    <div class="text-center">
                        <p class="mb-1">Pour {{ $company['company_name'] ?? $tenant?->name ?? '' }}</p>
                        @if($signature && $signature->getFirstMediaUrl('signature'))
                            <span><img src="{{ $signature->getFirstMediaUrl('signature') }}" alt="Signature" style="max-height: 60px;"></span>
                        @endif
                    </div>
                </div>
                @if($invoice->terms)
                <div class="border-bottom mb-3 p-3">
                    <h6 class="mb-2">Conditions générales : </h6>
                    {!! nl2br(e($invoice->terms)) !!}
                </div>
                @endif
                <div class="border-bottom text-center pb-3">
                    <p>Merci pour votre confiance</p>
                </div>
            </div><!-- end col -->
        </div>
        <!-- end row -->

    </div>
    <!-- End Content -->

    <!-- ========================
            End Page Content
        ========================= -->
@endsection
