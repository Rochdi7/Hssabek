<?php $page = 'money-exchange-invoice'; ?>
@extends('backoffice.layout.mainlayout')
@section('content')
    @php
        $company = $settings?->company_settings ?? [];
        $billTo = $invoice->bill_to_snapshot ?? [];
        $billFrom = $invoice->bill_from_snapshot ?? [];
        $bank = $invoice->bank_details_snapshot ?? [];
    @endphp
    <!-- Start Content -->
    <div class="content p-4">
        <!-- start row -->
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="pb-3 mb-3">
                    <div class="d-flex align-items-center justify-content-between bg-light flex-wrap p-3 rounded">
                        <div>
                            @if($tenant)
                                @php $logoPath = $tenant->getFirstMediaUrl('logo'); @endphp
                                @if($logoPath)
                                    <img src="{{ $logoPath }}" class="mb-2" alt="" style="max-height: 50px;">
                                @endif
                            @endif
                            <p class="mb-1">Original pour le destinataire</p>
                            <p class="mb-1">N° Facture : <span class="text-dark">{{ $invoice->number }}</span></p>
                            <p class="mb-1">Date : <span class="text-dark">{{ $invoice->issue_date?->format('d/m/Y') }}</span></p>
                        </div>
                        <div class="text-end">
                            <h6 class="mb-1">FACTURE</h6>
                            <div>
                                <h6 class="mb-1">{{ $company['company_name'] ?? $tenant?->name ?? '' }}</h6>
                                <div>
                                    <p class="mb-1">Adresse : <span class="text-dark">{{ $company['address'] ?? '' }}</span></p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="mb-3">
                    <h6 class="mb-2 fs-16 bg-light p-2 text-dark">Facturé à</h6>
                    <div class="d-flex align-items-center justify-content-between gap-3">
                        <div class="d-flex align-items-center justify-content-between flex-fill border rounded p-2">
                            <span class="text-dark me-2">Nom</span>
                            <p>{{ $billTo['name'] ?? '' }}</p>
                        </div>
                        <div class="d-flex align-items-center justify-content-between flex-fill border rounded p-2">
                            <span class="text-dark me-2">Adresse</span>
                            <p>{{ $billTo['address'] ?? '' }}</p>
                        </div>
                        <div class="d-flex align-items-center justify-content-between flex-fill border rounded p-2">
                            <span class="text-dark me-2">Réf. Client</span>
                            <p>{{ $invoice->customer?->id }}</p>
                        </div>
                        <div class="d-flex align-items-center justify-content-between flex-fill border rounded p-2">
                            <span class="text-dark me-2">Échéance</span>
                            <p>{{ $invoice->due_date?->format('d/m/Y') }}</p>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <h6 class="mb-2 fs-16 bg-light p-2 text-dark">Détails des articles</h6>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Désignation</th>
                                    <th>Prix unit.</th>
                                    <th>Qté</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($invoice->items->sortBy('position') as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>
                                        {{ $item->label }}
                                        @if($item->description)
                                            <br><small>{{ $item->description }}</small>
                                        @endif
                                    </td>
                                    <td>{{ number_format($item->unit_price, 2, ',', ' ') }} {{ $currency }}</td>
                                    <td>{{ rtrim(rtrim(number_format($item->quantity, 3, ',', ' '), '0'), ',') }}</td>
                                    <td>{{ number_format($item->line_total, 2, ',', ' ') }} {{ $currency }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="row">
                        <div class="col-lg-6 d-flex">
                            <div class="flex-fill border rounded p-2">
                                <p class="mb-1 d-flex align-items-center justify-content-between">Sous-total HT : <span class="text-dark">{{ number_format($invoice->subtotal, 2, ',', ' ') }} {{ $currency }}</span></p>
                                @if($invoice->discount_total > 0)
                                <p class="mb-1 d-flex align-items-center justify-content-between">Remise : <span class="text-dark">{{ number_format($invoice->discount_total, 2, ',', ' ') }} {{ $currency }}</span></p>
                                @endif
                                @if($invoice->enable_tax)
                                <p class="mb-1 d-flex align-items-center justify-content-between">TVA : <span class="text-dark">{{ number_format($invoice->tax_total, 2, ',', ' ') }} {{ $currency }}</span></p>
                                @endif
                                <p class="mb-0 d-flex align-items-center justify-content-between fw-bold">Total TTC : <span class="text-dark fw-bold">{{ number_format($invoice->total, 2, ',', ' ') }} {{ $currency }}</span></p>
                            </div>
                        </div>
                        @if(!empty($bank))
                        <div class="col-lg-6 d-flex">
                            <div class="flex-fill border rounded p-2">
                                <p class="mb-1 d-flex align-items-center justify-content-between">Banque : <span class="text-dark">{{ $bank['bank_name'] ?? '' }}</span></p>
                                <p class="mb-1 d-flex align-items-center justify-content-between">Titulaire : <span class="text-dark">{{ $bank['account_name'] ?? '' }}</span></p>
                                @if(!empty($bank['rib']))
                                <p class="mb-1 d-flex align-items-center justify-content-between">RIB : <span class="text-dark">{{ $bank['rib'] }}</span></p>
                                @endif
                                @if(!empty($bank['iban']))
                                <p class="mb-0 d-flex align-items-center justify-content-between">IBAN : <span class="text-dark">{{ $bank['iban'] }}</span></p>
                                @endif
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                @if($invoice->total_in_words)
                <div class="mb-3">
                    <h6 class="mb-2 fs-16 bg-light p-2 text-dark">Arrêtée la présente facture à la somme de</h6>
                    <div class="row">
                        <p>{{ $invoice->total_in_words }}</p>
                    </div>
                </div>
                @endif
                @if($invoice->terms)
                <div class="mb-3">
                    <h6 class="mb-2 fs-16 bg-light p-2 text-dark">Conditions générales</h6>
                    <div class="row">
                        <p>{!! nl2br(e($invoice->terms)) !!}</p>
                    </div>
                </div>
                @endif
                <div class="border-top border-bottom text-center p-2">
                    <p>Merci pour votre confiance</p>
                </div>
            </div> <!-- end col -->
            <!-- end row -->
        </div>
    </div>
    <!-- End Content -->
@endsection
