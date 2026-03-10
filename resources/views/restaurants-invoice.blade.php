<?php $page = 'restaurants-invoice'; ?>
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
                <div class="mb-3">
                    <h6><a href="{{ url()->previous() }}"><i class="isax isax-arrow-left me-1"></i>Retour</a></h6>
                </div>
                <div class="pb-3 mb-3 border-bottom border-3 border-primary">
                    <div class="d-flex align-items-center justify-content-between bg-light flex-wrap p-3 rounded">
                        <div>
                            @if($tenant)
                                @php $logoPath = $tenant->getFirstMediaUrl('logo'); @endphp
                                @if($logoPath)
                                    <img src="{{ $logoPath }}" class="mb-2" alt="User Img" style="max-height: 50px;">
                                @endif
                            @endif
                            <p class="mb-1">Date : <span class="text-dark">{{ $invoice->issue_date?->format('d/m/Y') }}</span></p>
                            <div class="inv-details">
                                <div class="inv-date-rest">
                                    <p class="text-start text-white">N° Facture : <span>{{ $invoice->number }}</span></p>
                                </div>
                                <div class="triangle-right"></div>
                            </div>
                        </div>
                        <div class="text-end">
                            <p class="mb-1">Original pour le destinataire</p>
                            <h6 class="text-primary mb-2">FACTURE</h6>
                            <div>
                                <h6 class="mb-1">{{ $company['company_name'] ?? $tenant?->name ?? '' }}</h6>
                                <div>
                                    <p class="mb-1">Adresse : <span>{{ $company['address'] ?? '' }}</span></p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <div>
                        <p class="mb-1">Facturé à :</p>
                        <h6 class="mb-1 fs-16">{{ $billTo['name'] ?? '' }}</h6>
                    </div>
                </div>

                <!-- start row -->
                <div class="row mb-3">
                    <div class="col-md-12">
                        <table class="table">
                            <thead
                                class="thead border-top border-start-0 border-end-0 border-bottom border-3 border-dark p-2">
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
                                <tr class="border-dark">
                                    <td>{{ $index + 1 }}</td>
                                    <td>
                                        <div class="d-flex flex-column">
                                            <span class="text-dark mb-1">{{ $item->label }}</span>
                                            @if($item->description)
                                            <span>{{ $item->description }}</span>
                                            @endif
                                        </div>
                                    </td>
                                    <td><span class="text-dark">{{ number_format($item->unit_price, 2, ',', ' ') }} {{ $currency }}</span></td>
                                    <td><span class="text-dark">{{ rtrim(rtrim(number_format($item->quantity, 3, ',', ' '), '0'), ',') }}</span></td>
                                    <td><span class="text-dark">{{ number_format($item->line_total, 2, ',', ' ') }} {{ $currency }}</span></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div><!-- end col -->
                </div>
                <!-- end row -->

                <!-- start row -->
                <div class="row mb-2 ">
                    <div class="col-md-8">

                    </div><!-- end col -->
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
                    </div><!-- end col -->
                </div>
                <!-- end row -->

                <!-- start row -->
                <div class="row border-top border-bottom border-3 border-dark p-3 align-items-center">
                    <div class="col-md-8">
                        <span class="text-dark">Total articles / Qté : {{ $invoice->items->count() }} / {{ rtrim(rtrim(number_format($invoice->items->sum('quantity'), 2, ',', ' '), '0'), ',') }}</span>
                    </div><!-- end col -->
                    <div class="col-md-4">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class=" text-end">
                                <span class="fw-bold fs-18 text-end text-dark">Total TTC</span>
                            </div>
                            <div class="text-end">
                                <span class="fw-bold fs-18 text-dark">{{ number_format($invoice->total, 2, ',', ' ') }} {{ $currency }}</span>
                            </div>
                        </div>
                    </div><!-- end col -->
                </div>
                <!-- end row -->

                @if($invoice->total_in_words)
                <!-- start row -->
                <div class="row py-3 border-bottom  border-bottom border-3 border-dark mb-3 d-flex align-items-center">
                    <div class="col-md-12">
                        <div class="d-flex align-items-center justify-content-end">
                            <p class="text-gary">Arrêtée la présente facture à la somme de :<span class="text-dark"> {{ $invoice->total_in_words }}</span></p>
                        </div>
                    </div><!-- end col -->
                </div>
                <!-- end row -->
                @endif

                <!-- start row -->
                <div class="row d-flex align-items-center flex-wrap border-bottom mb-3">
                    @if(!empty($bank))
                    <div class="col-md-4">
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
                    </div><!-- end col -->
                    @endif
                    @if($invoice->terms)
                    <div class="col-md-8">
                        <div class="mb-3">
                            <h6 class="mb-2">Conditions générales : </h6>
                            <p class="mb-0">{!! nl2br(e($invoice->terms)) !!}</p>
                        </div>
                    </div><!-- end col -->
                    @endif
                </div>
                <!-- end row -->

                @if($signature && $signature->getFirstMediaUrl('signature'))
                <div class="d-flex justify-content-end mb-3">
                    <div class="text-end">
                        <p class="mb-1">Pour {{ $company['company_name'] ?? $tenant?->name ?? '' }}</p>
                        <img src="{{ $signature->getFirstMediaUrl('signature') }}" alt="Signature" style="max-height: 60px;">
                    </div>
                </div>
                @endif

                <!-- start row -->
                <div class="row border border-start-0 border-end-0 border-dark text-center text-white bg-light p-2">
                    <div class="col-md-12">
                        <p class="text-gray">Merci pour votre confiance</p>
                    </div><!-- end col -->
                </div>
            </div><!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- End Content -->
@endsection
