<?php $page = 'general-invoice-10'; ?>
@extends('backoffice.layout.mainlayout')
@section('content')
    @php
        $company = $settings?->company_settings ?? [];
        $billTo = $invoice->bill_to_snapshot ?? [];
        $billFrom = $invoice->bill_from_snapshot ?? [];
        $bank = $invoice->bank_details_snapshot ?? [];
        $statusColors = ['paid' => 'text-success', 'partial' => 'text-warning', 'sent' => 'text-info', 'draft' => 'text-secondary', 'overdue' => 'text-danger'];
        $statusLabels = ['paid' => 'PAYÉE', 'partial' => 'PARTIELLE', 'sent' => 'ENVOYÉE', 'draft' => 'BROUILLON', 'overdue' => 'EN RETARD'];
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
                <div class="mb-3 p-2 bg-light">
                    <div class="d-flex align-items-center justify-content-between flex-wrap p-3 rounded">
                        <div class="">
                            @if($tenant)
                                @php $logoPath = $tenant->getFirstMediaUrl('logo'); @endphp
                                @if($logoPath)
                                    <img src="{{ $logoPath }}" class="mb-2" alt="" style="max-height: 60px;">
                                @endif
                            @endif
                        </div>
                        <div class="text-end">
                            <h6 class="mb-2 text-primary">FACTURE</h6>
                        </div>
                    </div>
                </div>
                <div class="invoice-five-details d-flex">
                    <div class="gradient-block me-4"></div>
                    <div class="d-flex align-items-center gap-2">
                        <div class="text-dark fs-13 me-4">N° Facture :<span>{{ $invoice->number }}</span> </div>
                        <div class="text-dark fs-13">Date de facturation :<span> {{ $invoice->issue_date?->format('d/m/Y') }}</span></div>
                    </div>
                </div>
                <div class="row bg-light p-2 mb-3">
                    <div class="col-lg-7">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <h6 class="fs-16 text-gray mb-2">Facturé à :</h6>
                                    <div>
                                        <p class="mb-0 text-dark">{{ $billTo['name'] ?? $invoice->customer?->name ?? '' }}</p>
                                        @if(!empty($billTo['address']))
                                            <p class="mb-0 text-dark">{{ $billTo['address'] }}</p>
                                        @endif
                                        @if(!empty($billTo['email']))
                                            <p class="mb-0 text-dark">{{ $billTo['email'] }}</p>
                                        @endif
                                        @if(!empty($billTo['phone']))
                                            <p class="mb-0 text-dark">{{ $billTo['phone'] }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div> <!-- end col -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <h6 class="fs-16 text-gray mb-2">Payé à :</h6>
                                    <div>
                                        <p class="mb-0 text-dark">{{ $company['company_name'] ?? $tenant?->name ?? '' }}</p>
                                        @if(!empty($company['address']))
                                            <p class="mb-0 text-dark">{{ $company['address'] }}</p>
                                        @endif
                                        @if(!empty($company['email']))
                                            <p class="mb-0 text-dark">{{ $company['email'] }}</p>
                                        @endif
                                        @if(!empty($company['phone']))
                                            <p class="mb-0 text-dark">{{ $company['phone'] }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
                    </div> <!-- end col -->
                    <div class="col-lg-5">
                        <div class="mb-3">
                            <div>
                                <p class="mb-3 text-dark">Échéance <br> <span
                                        class="badge bg-orange-transparent text-orange">{{ $invoice->due_date?->format('d/m/Y') }}</span></p>
                                <p class="text-dark">Statut du paiement <br> <span class="{{ $statusColors[$invoice->status] ?? 'text-info' }}">{{ $statusLabels[$invoice->status] ?? strtoupper($invoice->status) }}</span></p>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->
                <div class="d-flex align-items-center justify-content-between border-bottom flex-wrap row-gap-3 mb-3 pb-3">
                    <div>
                        <h5 class="mb-2">Détails du client :</h5>
                        <div>
                            <h6 class="mb-1">{{ $billTo['name'] ?? $invoice->customer?->name ?? '' }}</h6>
                            @if(!empty($billTo['tax_id']))
                            <div class="mb-2">
                                <p>IF : <span class="text-dark">{{ $billTo['tax_id'] }}</span></p>
                            </div>
                            @endif
                            <h6 class="mb-1 fw-semibold text-gray mb-2">Statut du paiement</h6>
                            <h6 class="mb-1 {{ $statusColors[$invoice->status] ?? 'text-info' }}">{{ $statusLabels[$invoice->status] ?? strtoupper($invoice->status) }}</h6>
                        </div>
                    </div>
                    <div>
                        <h6 class="mb-2 text-end">{{ $company['company_name'] ?? $tenant?->name ?? '' }}</h6>
                        <p class="mb-1 text-end">IF : <span class="text-dark">{{ $company['tax_id'] ?? '' }}</span></p>
                        <p class="mb-1 text-end">Adresse : <span class="text-dark">@if(!empty($company['address'])){{ $company['address'] }}@endif</span></p>
                        <p class="mb-1 text-end">Tél : <span class="text-dark">{{ $company['phone'] ?? '' }}</span></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <h6 class="fs-16 text-gray-5 mb-2">Adresse de facturation :</h6>
                            <div>
                                <p class="mb-0 text-dark">{{ $billTo['name'] ?? $invoice->customer?->name ?? '' }}</p>
                                @if(!empty($billTo['address']))
                                    <p class="mb-0 text-dark">{{ $billTo['address'] }}</p>
                                @endif
                                @if(!empty($billTo['email']))
                                    <p class="mb-0 text-dark">{{ $billTo['email'] }}</p>
                                @endif
                                @if(!empty($billTo['phone']))
                                    <p class="mb-0 text-dark">{{ $billTo['phone'] }}</p>
                                @endif
                            </div>
                        </div>
                    </div> <!-- end col -->
                    <div class="col-md-6 text-end">
                        <div class="mb-3">
                            <h6 class="fs-16 text-gray-5 mb-2">Adresse de livraison :</h6>
                            <div>
                                <p class="mb-0 text-dark">{{ $billTo['name'] ?? $invoice->customer?->name ?? '' }}</p>
                                @if(!empty($billTo['shipping_address']))
                                    <p class="mb-0 text-dark">{{ $billTo['shipping_address'] }}</p>
                                @elseif(!empty($billTo['address']))
                                    <p class="mb-0 text-dark">{{ $billTo['address'] }}</p>
                                @endif
                                @if(!empty($billTo['email']))
                                    <p class="mb-0 text-dark">{{ $billTo['email'] }}</p>
                                @endif
                                @if(!empty($billTo['phone']))
                                    <p class="mb-0 text-dark">{{ $billTo['phone'] }}</p>
                                @endif
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
                                <th>Qté</th>
                                <th>Prix unitaire</th>
                                <th>Remise</th>
                                <th class="text-end">Total</th>
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
                                        <span class="d-block @if($item->discount_value > 0) mb-1 @endif">{{ number_format($item->unit_price, 2, ',', ' ') }} {{ $currency }}</span>
                                        @if($item->discount_value > 0)
                                            <p class="text-primary">après remise {{ number_format($item->line_subtotal / ($item->quantity ?: 1), 2, ',', ' ') }} {{ $currency }}</p>
                                        @endif
                                    </div>
                                </td>
                                <td class="text-dark">{{ $item->discount_value > 0 ? ($item->discount_type === 'percentage' ? number_format($item->discount_value, 0) . '%' : number_format($item->discount_value, 2, ',', ' ') . ' ' . $currency) : '-' }}</td>
                                <td class="text-dark text-end">{{ number_format($item->line_subtotal, 2, ',', ' ') }} {{ $currency }}</td>
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="4">

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
                        </tbody>
                    </table> <!-- end table -->
                </div>
                <div class="py-3 border-top-0 border-bottom d-flex align-items-center justify-content-between">
                    @if($invoice->total_in_words)
                        <p class="text-dark mb-0">Arrêtée la présente facture à la somme de : <br> {{ $invoice->total_in_words }}</p>
                    @else
                        <p class="text-dark mb-0"></p>
                    @endif
                    <div class="d-flex align-items-center">
                        <span class="border-end-0"></span>
                        <span class="text-dark fw-medium border-end-0 border-start-0 text-center me-2">
                            <h6>Total TTC</h6>
                        </span>
                        <span class="text-dark text-end fw-medium border-start-0">
                            <h6>{{ number_format($invoice->total, 2, ',', ' ') }} {{ $currency }}</h6>
                        </span>
                    </div>
                </div>
                <div class="d-flex align-items-center py-3 justify-content-between flex-wrap border-bottom mb-3">
                    <div class="mb-3">
                        <div class="d-flex align-items-center">
                            @if(!empty($bank))
                            <div class="me-3">
                                <h6 class="mb-2">Coordonnées bancaires</h6>
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
                                    <p class="mb-0">IBAN : <span class="text-dark">{{ $bank['iban'] }}</span></p>
                                @endif
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="text-center mb-3">
                        <p class="mb-1">Pour {{ $company['company_name'] ?? $tenant?->name ?? '' }}</p>
                        @if($signature && $signature->getFirstMediaUrl('signature'))
                            <span><img src="{{ $signature->getFirstMediaUrl('signature') }}" alt="" style="max-height: 60px;"></span>
                        @endif
                    </div>
                </div>
                <div class="d-flex align-items-center flex-wrap border-bottom mb-3">
                    <div class="mb-3">
                        @if($invoice->terms)
                            <p class="mb-2 fs-13 text-gray">Conditions générales : </p>
                            {!! nl2br(e($invoice->terms)) !!}
                        @endif
                    </div>
                </div>
                <div class="border-bottom pb-3">
                    <p>{{ $invoice->notes ?? 'Merci pour votre confiance' }}</p>
                </div>
            </div> <!-- end col -->
        </div>
        <!-- end row -->
    </div>

    <!-- ========================
            End Page Content
        ========================= -->
@endsection
