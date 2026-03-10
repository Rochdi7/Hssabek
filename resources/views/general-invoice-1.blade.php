<?php $page = 'general-invoice-1'; ?>
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

        <!-- start row -->
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="mb-3">
                    <h6><a href="{{ url()->previous() }}"><i class="isax isax-arrow-left me-1"></i>Retour</a></h6>
                </div>
                <div>
                    <div
                        class="d-flex align-items-center justify-content-between border-bottom flex-wrap row-gap-3 mb-3 pb-3">
                        <div>
                            @if($tenant)
                                @php $logoPath = $tenant->getFirstMediaUrl('logo'); @endphp
                                @if($logoPath)
                                    <div class="mb-1"><img src="{{ $logoPath }}" alt="" style="max-height: 50px;"></div>
                                @endif
                            @endif
                            <p>Original pour le destinataire</p>
                        </div>
                        <div>
                            <h5 class="mb-1">FACTURE</h5>
                            <div class="d-flex align-items-center">
                                <p class="mb-0 me-3">Date : <span class="text-dark"> {{ $invoice->issue_date?->format('d/m/Y') }}</span></p>
                                <p>N° Facture : <span class="text-dark"> {{ $invoice->number }}</span></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <h6 class="fs-16 text-primary mb-2">Facturé à :</h6>
                                        <div>
                                            <p class="mb-0 text-dark">{{ $billTo['name'] ?? $invoice->customer?->name ?? '' }}</p>
                                            <p class="mb-0 text-dark">
                                                @if(!empty($billTo['address'])) {{ $billTo['address'] }} @endif
                                                @if(!empty($billTo['city'])) <br> {{ $billTo['city'] }}@if(!empty($billTo['postal_code'])), {{ $billTo['postal_code'] }}@endif @endif
                                                @if(!empty($billTo['country'])) {{ $billTo['country'] }} @endif
                                            </p>
                                            @if(!empty($billTo['email'])) <p class="mb-0 text-dark">{{ $billTo['email'] }}</p> @endif
                                            @if(!empty($billTo['phone'])) <p class="mb-0 text-dark">{{ $billTo['phone'] }}</p> @endif
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <h6 class="fs-16 text-primary mb-2">Payé à :</h6>
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
                        </div> <!-- end col -->
                        <div class="col-lg-5">
                            <div class="mb-3">
                                <h6 class="fs-16 text-primary mb-2">{{ $company['company_name'] ?? $tenant?->name ?? '' }}</h6>
                                <div>
                                    @if(!empty($company['tax_id'])) <p class="mb-1">IF : <span class="text-dark"> {{ $company['tax_id'] }}</span></p> @endif
                                    @if(!empty($company['address'])) <p class="mb-1">Adresse : <span class="text-dark"> {{ $company['address'] }}@if(!empty($company['city'])), {{ $company['city'] }}@endif @if(!empty($company['postal_code'])) {{ $company['postal_code'] }}@endif @if(!empty($company['country'])) {{ $company['country'] }}@endif</span></p> @endif
                                    @if(!empty($company['phone'])) <p class="mb-0">Tél : <span class="text-dark"> {{ $company['phone'] }}</span></p> @endif
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->
                    <div class="table-responsive">
                        <table class="table">
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
                                    <td colspan="3" class="border-0"></td>
                                    <td colspan="2" class="text-dark fw-medium border-0">Sous-total HT</td>
                                    <td class="text-dark text-end fw-medium border-0">{{ number_format($invoice->subtotal, 2, ',', ' ') }} {{ $currency }}</td>
                                </tr>
                                @if($invoice->enable_tax)
                                <tr>
                                    <td colspan="3"></td>
                                    <td colspan="2" class="text-dark fw-medium">TVA</td>
                                    <td class="text-dark text-end fw-medium">{{ number_format($invoice->tax_total, 2, ',', ' ') }} {{ $currency }}</td>
                                </tr>
                                @endif
                                <tr>
                                    <td colspan="3" class="text-dark">Total articles : {{ $invoice->items->count() }}</td>
                                    <td colspan="2" class="text-dark fw-medium">
                                        <h6>Total TTC</h6>
                                    </td>
                                    <td class="text-dark text-end fw-medium">
                                        <h6>{{ number_format($invoice->total, 2, ',', ' ') }} {{ $currency }}</h6>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div> <!-- end table -->
                    @if($invoice->total_in_words)
                    <div class="py-3 border-bottom mb-3">
                        <p class="text-dark">Arrêtée la présente facture à la somme de : {{ $invoice->total_in_words }}</p>
                    </div>
                    @endif
                    <div class="d-flex align-items-center justify-content-between flex-wrap border-bottom mb-3">
                        @if(!empty($bank))
                        <div class="mb-3">
                            <h6 class="mb-2">Coordonnées bancaires</h6>
                            <div>
                                @if(!empty($bank['bank_name'])) <p class="mb-1">Banque : <span class="text-dark">{{ $bank['bank_name'] }}</span></p> @endif
                                @if(!empty($bank['account_name'])) <p class="mb-1">Titulaire : <span class="text-dark">{{ $bank['account_name'] }}</span></p> @endif
                                @if(!empty($bank['rib'])) <p class="mb-1">RIB : <span class="text-dark">{{ $bank['rib'] }}</span></p> @endif
                                @if(!empty($bank['iban'])) <p class="mb-0">IBAN : <span class="text-dark">{{ $bank['iban'] }}</span></p> @endif
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
                    @if($invoice->notes)
                    <div class="border-bottom pb-3">
                        <p>{{ $invoice->notes }}</p>
                    </div>
                    @else
                    <div class="border-bottom pb-3">
                        <p>Merci pour votre confiance</p>
                    </div>
                    @endif
                </div>
            </div> <!-- end col -->
        </div>
        <!-- end row -->
    </div>

    <!-- ========================
      End Page Content
     ========================= -->
@endsection
