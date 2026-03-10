<?php $page = 'general-invoice-1a'; ?>
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
                    <div class="border-bottom mb-3">
                        <div class="row align-items-center">
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <h5 class="text-primary mb-3">Facture</h5>
                                    <div class="p-4 invoice-design-6">
                                        <p class="fw-semibold text-dark mb-1">{{ $company['company_name'] ?? $tenant?->name ?? '' }}</p>
                                        <p class="text-dark">Adresse : {{ $company['address'] ?? '' }}@if(!empty($company['city'])), <br> {{ $company['city'] }}@endif @if(!empty($company['postal_code'])) {{ $company['postal_code'] }}@endif @if(!empty($company['country'])) {{ $company['country'] }}@endif</p>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                            <div class="col-lg-8">
                                <div class="text-lg-end mb-2">
                                    @if($tenant)
                                        @php $logoPath = $tenant->getFirstMediaUrl('logo'); @endphp
                                        @if($logoPath)
                                            <div class="mb-1"><img src="{{ $logoPath }}" alt="" style="max-height: 50px;"></div>
                                        @endif
                                    @endif
                                    <p class="mb-1">N° Facture : <span class="text-dark">{{ $invoice->number }}</span></p>
                                    <p class="mb-1">Date de facturation : <span class="text-dark">{{ $invoice->issue_date?->format('d/m/Y') }}</span></p>
                                    <p class="mb-1">Date d'échéance : <span class="text-dark">{{ $invoice->due_date?->format('d/m/Y') }}</span></p>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
                    </div>
                    <div class="bg-light p-2 mb-3">
                        <p>Informations client</p>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <h6 class="fs-16 text-gray-5 mb-2">Détails du client :</h6>
                                <div>
                                    <h6 class="mb-1">{{ $billTo['name'] ?? $invoice->customer?->name ?? '' }}</h6>
                                    @if(!empty($billTo['tax_id'])) <p class="mb-0">IF : {{ $billTo['tax_id'] }}</p> @endif
                                </div>
                            </div>
                        </div> <!-- end col -->
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <h6 class="fs-16 text-gray-5 mb-2">Adresse de facturation :</h6>
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
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <h6 class="fs-16 text-gray-5 mb-2">Adresse de livraison :</h6>
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
                    </div> <!-- end row -->
                    <div class="mb-3">
                        <h6 class="fs-16 text-gray-5 mb-3">Statut du paiement</h6>
                        @php
                            $statusColors = ['paid' => 'text-success', 'partial' => 'text-warning', 'sent' => 'text-info', 'draft' => 'text-secondary', 'overdue' => 'text-danger', 'void' => 'text-muted'];
                            $statusLabels = ['paid' => 'PAYÉE', 'partial' => 'PARTIELLE', 'sent' => 'ENVOYÉE', 'draft' => 'BROUILLON', 'overdue' => 'EN RETARD', 'void' => 'ANNULÉE'];
                        @endphp
                        <span class="{{ $statusColors[$invoice->status] ?? 'text-info' }} fs-18 fw-semibold">{{ $statusLabels[$invoice->status] ?? strtoupper($invoice->status) }}</span>
                    </div>
                    <div class="table-responsive mb-3">
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>Désignation</th>
                                    <th>Qté</th>
                                    <th>Prix unit.</th>
                                    <th>Remise</th>
                                    <th class="text-end">Total HT</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($invoice->items->sortBy('position') as $index => $item)
                                <tr>
                                    <td class="text-dark">{{ $index + 1 }}</td>
                                    <td>{{ $item->label }}</td>
                                    <td class="text-dark">{{ rtrim(rtrim(number_format($item->quantity, 3, ',', ' '), '0'), ',') }}</td>
                                    <td>
                                        <div>
                                            <span class="d-block">{{ number_format($item->unit_price, 2, ',', ' ') }} {{ $currency }}</span>
                                        </div>
                                    </td>
                                    <td class="text-dark">{{ $item->discount_value > 0 ? ($item->discount_type === 'percentage' ? number_format($item->discount_value, 0) . '%' : number_format($item->discount_value, 2, ',', ' ') . ' ' . $currency) : '-' }}</td>
                                    <td class="text-dark text-end">{{ number_format($item->line_subtotal, 2, ',', ' ') }} {{ $currency }}</td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td colspan="4">
                                        @if($invoice->status === 'paid')
                                        <div>
                                            <img src="{{ URL::asset('build/img/icons/paid.svg') }}" alt="">
                                        </div>
                                        @endif
                                    </td>
                                    <td class="text-dark">
                                        <div>
                                            <h6 class="fs-14 fw-medium mb-2 pb-2">Sous-total HT</h6>
                                            @if($invoice->enable_tax)
                                            <h6 class="fs-14 fw-medium mb-2 pb-2">TVA</h6>
                                            @endif
                                            @if($invoice->discount_total > 0)
                                            <h6 class="fs-14 fw-medium mb-2 pb-2">Remise</h6>
                                            @endif
                                            @if($invoice->round_off != 0)
                                            <h6 class="fs-14 fw-medium mb-0">Arrondi</h6>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="text-dark text-end fw-medium">
                                        <div>
                                            <h6 class="fs-14 fw-medium mb-2 pb-2">{{ number_format($invoice->subtotal, 2, ',', ' ') }} {{ $currency }}</h6>
                                            @if($invoice->enable_tax)
                                            <h6 class="fs-14 fw-medium mb-2 pb-2">{{ number_format($invoice->tax_total, 2, ',', ' ') }} {{ $currency }}</h6>
                                            @endif
                                            @if($invoice->discount_total > 0)
                                            <h6 class="fs-14 fw-medium mb-2 pb-2">-{{ number_format($invoice->discount_total, 2, ',', ' ') }} {{ $currency }}</h6>
                                            @endif
                                            @if($invoice->round_off != 0)
                                            <h6 class="fs-14 fw-medium mb-0">{{ number_format($invoice->round_off, 2, ',', ' ') }} {{ $currency }}</h6>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="text-dark"></td>
                                    <td class="text-dark fw-medium">
                                        <h6>Total TTC</h6>
                                    </td>
                                    <td class="text-dark text-end fw-medium">
                                        <h6>{{ number_format($invoice->total, 2, ',', ' ') }} {{ $currency }}</h6>
                                    </td>
                                </tr>
                                @if($invoice->total_in_words)
                                <tr>
                                    <td colspan="6" class="text-end">Arrêtée la présente facture à la somme de : {{ $invoice->total_in_words }}</td>
                                </tr>
                                @endif
                            </tbody>
                        </table> <!-- end table -->
                    </div>
                    <div class="d-flex align-items-center justify-content-between flex-wrap border-bottom">
                        @if(!empty($bank))
                        <div class="d-flex align-items-start mb-3">
                            <div>
                                <h6 class="mb-2">Coordonnées bancaires :</h6>
                                <div>
                                    @if(!empty($bank['bank_name'])) <p class="mb-1">Banque : <span class="text-dark">{{ $bank['bank_name'] }}</span></p> @endif
                                    @if(!empty($bank['rib'])) <p class="mb-1">RIB : <span class="text-dark">{{ $bank['rib'] }}</span></p> @endif
                                    @if(!empty($bank['iban'])) <p class="mb-1">IBAN : <span class="text-dark">{{ $bank['iban'] }}</span></p> @endif
                                </div>
                            </div>
                        </div>
                        @endif
                        @if($invoice->terms)
                        <div class="mb-3">
                            <p class="mb-2">Conditions générales :</p>
                            {!! nl2br(e($invoice->terms)) !!}
                        </div>
                        @endif
                    </div>
                    <div class="border-bottom py-3 bg-light text-center">
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
