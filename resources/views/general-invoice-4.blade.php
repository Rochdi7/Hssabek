<?php $page = 'general-invoice-4'; ?>
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

    <div class="content p-4">

        <!-- Start row -->
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="mb-3">
                    <h6><a href="{{ url()->previous() }}"><i class="isax isax-arrow-left me-1"></i>Retour</a></h6>
                </div>
                <div>
                    <div
                        class="d-flex align-items-center justify-content-between bg-light p-3 rounded flex-wrap row-gap-3 mb-3">
                        <div>
                            @if($tenant)
                                @php $logoPath = $tenant->getFirstMediaUrl('logo'); @endphp
                                @if($logoPath)
                                    <div class="mb-1"><img src="{{ $logoPath }}" alt="" style="max-height: 50px;"></div>
                                @endif
                            @endif
                        </div>
                        <div>
                            <h5 class="mb-1">FACTURE</h5>
                            <p>Original pour le destinataire</p>
                        </div>
                    </div>
                    <div class="border-bottom mb-3">
                        <h6 class="mb-2 fs-16">{{ $company['company_name'] ?? $tenant?->name ?? '' }}</h6>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-2">
                                            <span class="d-block mb-1">IF :</span>
                                            <p class="text-dark">{{ $company['tax_id'] ?? '' }}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-2">
                                            <span class="d-block mb-1">Tél :</span>
                                            <p class="text-dark">{{ $company['phone'] ?? '' }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                            <div class="col-lg-8">
                                <div class="text-lg-end mb-2">
                                    <p class="mb-1">N° Facture : <span class="text-dark">{{ $invoice->number }}</span></p>
                                    <p class="mb-1">Date : <span class="text-dark">{{ $invoice->issue_date?->format('d/m/Y') }}</span></p>
                                </div>
                            </div> <!-- end col -->
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <span class="d-block mb-1">Adresse :</span>
                                    <p class="text-dark">{{ $company['address'] ?? '' }}@if(!empty($company['city'])), {{ $company['city'] }}@endif @if(!empty($company['postal_code'])) {{ $company['postal_code'] }}@endif @if(!empty($company['country'])) {{ $company['country'] }}@endif</p>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <h6 class="fs-16 text-gray-5 mb-2">Facturé à :</h6>
                                <div>
                                    <p class="mb-0 text-dark">{{ $billTo['name'] ?? $invoice->customer?->name ?? '' }}</p>
                                    <p class="mb-0 text-dark">
                                        @if(!empty($billTo['address'])) {{ $billTo['address'] }}@if(!empty($billTo['city'])), {{ $billTo['city'] }}@endif @if(!empty($billTo['postal_code'])) {{ $billTo['postal_code'] }}@endif @if(!empty($billTo['country'])) {{ $billTo['country'] }}@endif @endif
                                    </p>
                                    @if(!empty($billTo['email'])) <p class="mb-0 text-dark">{{ $billTo['email'] }}</p> @endif
                                    @if(!empty($billTo['phone'])) <p class="mb-0 text-dark">{{ $billTo['phone'] }}</p> @endif
                                </div>
                            </div>
                        </div> <!-- end col -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <h6 class="fs-16 text-gray-5 mb-2">Payé à :</h6>
                                <div>
                                    <p class="mb-0 text-dark">{{ $billFrom['company_name'] ?? $company['company_name'] ?? $tenant?->name ?? '' }}</p>
                                    <p class="mb-0 text-dark">
                                        @if(!empty($billFrom['address'] ?? $company['address'] ?? '')) {{ $billFrom['address'] ?? $company['address'] ?? '' }} @endif
                                        @if(!empty($billFrom['city'] ?? $company['city'] ?? '')) <br> {{ $billFrom['city'] ?? $company['city'] ?? '' }} @endif
                                    </p>
                                    @if(!empty($billFrom['email'] ?? $company['email'] ?? '')) <p class="mb-0 text-dark">{{ $billFrom['email'] ?? $company['email'] ?? '' }}</p> @endif
                                    @if(!empty($billFrom['phone'] ?? $company['phone'] ?? '')) <p class="mb-0 text-dark">{{ $billFrom['phone'] ?? $company['phone'] ?? '' }}</p> @endif
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->
                    <div class="table-responsive mb-3">
                        <table class="table table-nowrap table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>Désignation</th>
                                    <th>Description</th>
                                    <th>Qté</th>
                                    <th>Prix unit.</th>
                                    <th class="text-end">Total HT</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($invoice->items->sortBy('position') as $index => $item)
                                <tr>
                                    <td class="text-dark">{{ $index + 1 }}</td>
                                    <td class="text-dark">{{ $item->label }}</td>
                                    <td class="text-dark">{{ $item->description ?? '' }}</td>
                                    <td class="text-dark">{{ rtrim(rtrim(number_format($item->quantity, 3, ',', ' '), '0'), ',') }}</td>
                                    <td class="text-dark">{{ number_format($item->unit_price, 2, ',', ' ') }} {{ $currency }}</td>
                                    <td class="text-dark text-end">{{ number_format($item->line_subtotal, 2, ',', ' ') }} {{ $currency }}</td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td colspan="3" class="border-end-0">
                                        @if($invoice->notes)
                                        <div>
                                            <span>Note : </span>
                                            <p class="text-dark">{!! nl2br(e($invoice->notes)) !!}</p>
                                        </div>
                                        @endif
                                    </td>
                                    <td colspan="2" class="text-dark border-0 pe-0">
                                        <div>
                                            <h6 class="fs-14 fw-medium mb-2 pb-2 border-bottom pb-2">Sous-total HT</h6>
                                            @if($invoice->discount_total > 0)
                                            <h6 class="fs-14 fw-medium mb-2 border-bottom pb-2">Remise</h6>
                                            @endif
                                            @if($invoice->enable_tax)
                                            <h6 class="fs-14 fw-medium mb-0">TVA</h6>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="text-dark text-end fw-medium border-start-0 ps-0">
                                        <div>
                                            <h6 class="fs-14 fw-medium mb-2 border-bottom pb-2">{{ number_format($invoice->subtotal, 2, ',', ' ') }} {{ $currency }}</h6>
                                            @if($invoice->discount_total > 0)
                                            <h6 class="fs-14 fw-medium mb-2 border-bottom pb-2">-{{ number_format($invoice->discount_total, 2, ',', ' ') }} {{ $currency }}</h6>
                                            @endif
                                            @if($invoice->enable_tax)
                                            <h6 class="fs-14 fw-medium mb-0">{{ number_format($invoice->tax_total, 2, ',', ' ') }} {{ $currency }}</h6>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3" class="text-dark border-end-0">Total articles : {{ $invoice->items->count() }}</td>
                                    <td colspan="2" class="text-dark fw-medium border-end-0 border-start-0">
                                        <h6>Total TTC</h6>
                                    </td>
                                    <td class="text-dark text-end fw-medium border-start-0">
                                        <h6>{{ number_format($invoice->total, 2, ',', ' ') }} {{ $currency }}</h6>
                                    </td>
                                </tr>
                                @if($invoice->total_in_words)
                                <tr>
                                    <td colspan="6">Arrêtée la présente facture à la somme de : {{ $invoice->total_in_words }}</td>
                                </tr>
                                @endif
                            </tbody>
                        </table> <!-- end table -->
                    </div>
                    <div class="d-flex align-items-center justify-content-between flex-wrap border-bottom mb-3">
                        @if(!empty($bank))
                        <div class="mb-3">
                            <h6 class="mb-2">Coordonnées bancaires :</h6>
                            <div>
                                @if(!empty($bank['bank_name'])) <p class="mb-1">Banque : <span class="text-dark">{{ $bank['bank_name'] }}</span></p> @endif
                                @if(!empty($bank['rib'])) <p class="mb-1">RIB : <span class="text-dark">{{ $bank['rib'] }}</span></p> @endif
                            </div>
                        </div>
                        @endif
                        <div class="text-center mb-3">
                            <p class="mb-1">Pour {{ $company['company_name'] ?? $tenant?->name ?? '' }}</p>
                            @if($signature && $signature->getFirstMediaUrl('signature'))
                                <span><img src="{{ $signature->getFirstMediaUrl('signature') }}" alt="" style="max-height: 60px;"></span>
                            @endif
                        </div>
                    </div>
                    @if($invoice->terms)
                    <div class="border-bottom mb-3 pb-3">
                        <h6 class="mb-2">Conditions générales :</h6>
                        {!! nl2br(e($invoice->terms)) !!}
                    </div>
                    @endif
                    <div class="border-bottom pb-3 text-center">
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
