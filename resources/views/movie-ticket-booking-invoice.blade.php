<?php $page = 'movie-ticket-booking-invoice'; ?>
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
                <div>
                    <div
                        class="d-flex align-items-center justify-content-between border-bottom flex-wrap row-gap-3 mb-3 pb-3">

                        <div>
                            <h5 class="mb-2">FACTURE</h5>
                            <div>
                                <h6 class="mb-1">{{ $company['company_name'] ?? $tenant?->name ?? '' }}</h6>
                                <div>
                                    <p class="mb-1">Adresse : <span class="text-dark">{{ $company['address'] ?? '' }}</span></p>
                                    @if(!empty($company['tax_number']))
                                    <p class="mb-1">IF : <span class="text-dark">{{ $company['tax_number'] }}</span></p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="mb-1">
                                @if($tenant)
                                    @php $logoPath = $tenant->getFirstMediaUrl('logo'); @endphp
                                    @if($logoPath)
                                        <img src="{{ $logoPath }}" alt="" style="max-height: 50px;">
                                    @endif
                                @endif
                            </div>
                            <p class="mb-1 text-end">Original pour le destinataire</p>
                            <p class="mb-1 text-end">N° Facture : <span class="text-dark">{{ $invoice->number }}</span></p>
                            <p class="mb-1 text-end">Date : <span class="text-dark">{{ $invoice->issue_date?->format('d/m/Y') }}</span></p>
                        </div>
                    </div>
                    <!-- start row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- start row -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <h6 class="fs-16 text-gray mb-2">Facturé à :</h6>
                                        <div>
                                            <p class="mb-0 fs-13 text-dark">
                                                {{ $billTo['name'] ?? '' }}
                                                @if(!empty($billTo['address']))
                                                <br>{{ $billTo['address'] }}
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div>
                            <!-- end row -->
                        </div> <!-- end col -->
                    </div> <!-- end row -->

                    <!-- start table -->
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="thead-primary">
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
                                    <td class="text-dark">{{ $index + 1 }}</td>
                                    <td>
                                        <div>
                                            <p class="text-dark mb-0">{{ $item->label }}</p>
                                            @if($item->description)
                                            <span class="d-block">{{ $item->description }}</span>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="text-dark">{{ number_format($item->unit_price, 2, ',', ' ') }} {{ $currency }}</td>
                                    <td>{{ rtrim(rtrim(number_format($item->quantity, 3, ',', ' '), '0'), ',') }}</td>
                                    <td class="text-dark">{{ number_format($item->line_total, 2, ',', ' ') }} {{ $currency }}</td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td colspan="3" class="border-0"></td>
                                    <td class="text-dark fw-medium border-0">Sous-total HT</td>
                                    <td class="text-dark text-end fw-medium border-0">{{ number_format($invoice->subtotal, 2, ',', ' ') }} {{ $currency }}</td>
                                </tr>
                                @if($invoice->enable_tax)
                                <tr>
                                    <td colspan="3" class="border-0"></td>
                                    <td class="text-dark fw-medium border-0">TVA</td>
                                    <td class="text-dark text-end fw-medium border-0">{{ number_format($invoice->tax_total, 2, ',', ' ') }} {{ $currency }}</td>
                                </tr>
                                @endif
                                @if($invoice->discount_total > 0)
                                <tr>
                                    <td colspan="3" class="border-0"></td>
                                    <td class="text-dark fw-medium border-0">Remise</td>
                                    <td class="text-dark text-end fw-medium border-0">{{ number_format($invoice->discount_total, 2, ',', ' ') }} {{ $currency }}</td>
                                </tr>
                                @endif
                                <tr>
                                    <td colspan="3" class="text-dark border-0">Total articles / Qté : {{ $invoice->items->count() }} / {{ rtrim(rtrim(number_format($invoice->items->sum('quantity'), 2, ',', ' '), '0'), ',') }}</td>
                                    <td class="text-dark fw-medium border-0">
                                        <h6>Total TTC</h6>
                                    </td>
                                    <td class="text-dark text-end fw-medium border-0">
                                        <h6>{{ number_format($invoice->total, 2, ',', ' ') }} {{ $currency }}</h6>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- end table -->
                    @if($invoice->total_in_words)
                    <div class="py-3 border-top border-bottom mb-3 d-flex align-items-center justify-content-center">
                        <p class="text-dark">Arrêtée la présente facture à la somme de : {{ $invoice->total_in_words }}</p>
                    </div>
                    @endif
                    <div class="d-flex align-items-center justify-content-between flex-wrap border-bottom mb-3">
                        @if(!empty($bank))
                        <div class="mb-3">
                            <h6 class="mb-2">Coordonnées bancaires</h6>
                            <div>
                                <p class="mb-1">Banque : <span class="text-dark">{{ $bank['bank_name'] ?? '' }}</span></p>
                                <p class="mb-1">Titulaire : <span class="text-dark">{{ $bank['account_name'] ?? '' }}</span></p>
                                @if(!empty($bank['rib']))
                                <p class="mb-1">RIB : <span class="text-dark">{{ $bank['rib'] }}</span></p>
                                @endif
                                @if(!empty($bank['iban']))
                                <p class="mb-0">IBAN : <span class="text-dark">{{ $bank['iban'] }}</span></p>
                                @endif
                            </div>
                        </div>
                        @endif
                        @if($invoice->terms)
                        <div class="mb-3">
                            <h6 class="mb-2">Conditions générales : </h6>
                            <p class="mb-0">{!! nl2br(e($invoice->terms)) !!}</p>
                        </div>
                        @endif
                    </div>
                    @if($signature && $signature->getFirstMediaUrl('signature'))
                    <div class="d-flex justify-content-end mb-3">
                        <div class="text-end">
                            <p class="mb-1">Pour {{ $company['company_name'] ?? $tenant?->name ?? '' }}</p>
                            <img src="{{ $signature->getFirstMediaUrl('signature') }}" alt="Signature" style="max-height: 60px;">
                        </div>
                    </div>
                    @endif
                    <div class="border-bottom text-center text-white bg-primary p-2">
                        <p>Merci pour votre confiance</p>
                    </div>
                </div>
            </div> <!-- end row -->
        </div>
        <!-- end row -->
    </div>
    <!-- End Content -->
@endsection
