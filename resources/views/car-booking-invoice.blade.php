<?php $page = 'car-booking-invoice'; ?>
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

    <div class="invoice-wrapper">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="mb-3">
                    <h6><a href="{{ url()->previous() }}"><i class="isax isax-arrow-left me-1"></i>Retour</a></h6>
                </div>
                <div class="mb-3">
                    <div class="d-flex align-items-center justify-content-between bg-primary flex-wrap p-3 rounded">

                        <div>
                            <p class="text-white mb-2">Original pour le destinataire</p>
                            <h6 class="mb-0 text-white">FACTURE</h6>

                        </div>
                        <div>
                            @if($tenant)
                                @php $logoPath = $tenant->getFirstMediaUrl('logo'); @endphp
                                @if($logoPath)
                                    <img src="{{ $logoPath }}" alt="Logo" style="max-height: 50px;">
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <div>
                        <h6 class="mb-1 fs-16">{{ $company['company_name'] ?? $tenant?->name ?? '' }}</h6>
                        <p>{{ $company['address'] ?? '' }}</p>
                    </div>
                    <div class="text-end">
                        <h6 class="mb-1 fs-18 fw-medium">Info :</h6>
                        <p class="invoice-info">{{ $invoice->notes ?? '' }}</p>
                    </div>

                </div>
                <div class="row mb-4 ">
                    <div class="col-md-4">
                        <div class="bg-light">
                            <div class="d-flex justify-content-center align-items-center p-2">
                                <span class="me-3">Date :</span>
                                <span class="text-dark fw-medium">{{ $invoice->issue_date?->format('d/m/Y') }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="bg-light">
                            <div class="d-flex justify-content-center align-items-center p-2">
                                <span class="me-3">Échéance :</span>
                                <span class="text-dark fw-medium">{{ $invoice->due_date?->format('d/m/Y') }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="bg-light">
                            <div class="d-flex justify-content-center align-items-center p-2">
                                <span class="me-3">N° Facture :</span>
                                <span class="text-dark fw-medium">{{ $invoice->number }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-4 ">
                    <div class="col-md-4">
                        <div class="ribbon-tittle">
                            <div class="ribbon-text">
                                <span class="text-white">Informations client</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-4 ">
                    <div class="col-md-6 d-flex">
                        <div class="d-flex justify-content-between bg-light p-3 flex-fill">
                            <div class="d-flex flex-column">
                                <span class="mb-1">Nom du client :</span>
                                <span class="mb-1">Email :</span>
                                <span class="mb-1">Tél :</span>
                                <span>Adresse :</span>
                            </div>
                            <div class="d-flex flex-column text-end">
                                <span class="text-dark mb-1">{{ $billTo['name'] ?? $invoice->customer?->name ?? '' }}</span>
                                <span class="text-dark mb-1">{{ $billTo['email'] ?? $invoice->customer?->email ?? '' }}</span>
                                <span class="text-dark mb-1">{{ $billTo['phone'] ?? $invoice->customer?->phone ?? '' }}</span>
                                <span class="text-dark">{{ $billTo['address'] ?? '' }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex">
                        <div class="d-flex justify-content-between bg-light p-3 flex-fill">
                            <div class="d-flex flex-column">
                                <span class="mb-1">Réf. Client :</span>
                                <span class="mb-1">IF :</span>
                                <span>Date :</span>

                            </div>
                            <div class="d-flex flex-column text-end">
                                <span class="text-dark mb-1">{{ $invoice->customer?->reference ?? '' }}</span>
                                <span class="text-dark mb-1">{{ $billTo['tax_id'] ?? $invoice->customer?->tax_id ?? '' }}</span>
                                <span class="text-dark">{{ $invoice->issue_date?->format('d/m/Y') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <h6 class="mb-3 fs-16">Détails de la facture</h6>
                <div class="row mb-4">
                    <div class="col-md-12">
                        <table class="table table-nowrap invoice-tables">
                            <thead class="thead-light">
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
                                <tr>
                                    <td>{{ $index + 1 }}</td>
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
                                    <td class="text-end"><span class="text-dark">{{ number_format($item->line_subtotal, 2, ',', ' ') }} {{ $currency }}</span></td>
                                </tr>
                                @endforeach

                                <tr>
                                    <td colspan="2" class="border-0"></td>
                                    <td colspan="2" class="text-dark text-end fw-medium border-0">Sous-total HT</td>
                                    <td class="text-dark text-end fw-medium border-0">{{ number_format($invoice->subtotal, 2, ',', ' ') }} {{ $currency }}</td>
                                </tr>
                                @if($invoice->tax_total > 0)
                                <tr>
                                    <td colspan="2" class="border-bottom-transparent"></td>
                                    <td colspan="2" class="text-dark text-end fw-medium border-bottom-transparent">TVA</td>
                                    <td class="text-dark text-end fw-medium border-bottom-transparent">{{ number_format($invoice->tax_total, 2, ',', ' ') }} {{ $currency }}</td>
                                </tr>
                                @endif
                                @if($invoice->discount_total > 0)
                                <tr>
                                    <td colspan="2" class="border-bottom-transparent"></td>
                                    <td colspan="2" class="text-dark text-end fw-medium border-bottom-transparent">Remise</td>
                                    <td class="text-dark text-end fw-medium border-bottom-transparent">-{{ number_format($invoice->discount_total, 2, ',', ' ') }} {{ $currency }}</td>
                                </tr>
                                @endif
                                <tr>
                                    <td colspan="2" class="text-dark border-0 bg-light">{{ $invoice->items->count() }} article(s)
                                    </td>
                                    <td colspan="2" class="text-dark bg-light border-0 text-end fw-medium">
                                        <h6>Total TTC</h6>
                                    </td>
                                    <td class="text-dark bg-light text-end border-0 fw-medium">
                                        <h6>{{ number_format($invoice->total, 2, ',', ' ') }} {{ $currency }}</h6>
                                    </td>
                                </tr>
                                @if($invoice->total_in_words)
                                <tr>
                                    <td colspan="2" class="border-bottom-transparent">
                                        <div class="d-flex flex-column">
                                            <span>Arrêtée la présente facture à la somme de :</span>
                                            <span class="text-dark mb-1">{{ $invoice->total_in_words }}</span>
                                        </div>
                                    </td>
                                    <td colspan="2" class="text-dark text-end border-bottom-transparent fw-medium">
                                        <h6>Total TTC</h6>
                                    </td>
                                    <td class="text-dark border-bottom-transparent text-end fw-medium">
                                        <h6>{{ number_format($invoice->total, 2, ',', ' ') }} {{ $currency }}</h6>
                                    </td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
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
            </div>
        </div>
    </div>

    <!-- ========================
            End Page Content
        ========================= -->
@endsection
