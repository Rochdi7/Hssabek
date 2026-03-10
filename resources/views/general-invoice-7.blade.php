<?php $page = 'general-invoice-7'; ?>
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
                <div>
                    <div class="border-bottom mb-3 pb-3">
                        <div class="bg-gradient-primary d-flex align-items-center justify-content-between rounded p-3">
                            <h5>Facture</h5>
                            <div>
                                @if($tenant)
                                    @php $logoPath = $tenant->getFirstMediaUrl('logo'); @endphp
                                    @if($logoPath)
                                        <img src="{{ $logoPath }}" alt="" style="max-height: 60px;">
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="border-bottom mb-3">
                        <div class="row align-items-center">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <div>
                                        <p class="fw-semibold text-dark mb-1">{{ $company['company_name'] ?? $tenant?->name ?? '' }}</p>
                                        <p class="text-dark">Adresse : @if(!empty($company['address'])){{ $company['address'] }}@endif</p>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                            <div class="col-lg-6">
                                <div class="text-lg-end mb-2">
                                    <p class="mb-1">N° Facture : <span class="text-dark">{{ $invoice->number }}</span></p>
                                    <p class="mb-1">Date de facturation : <span class="text-dark">{{ $invoice->issue_date?->format('d/m/Y') }}</span></p>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
                    </div>
                    <div class="p-3 pt-0">
                        <p>Informations client</p>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
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
                        <div class="col-lg-4">
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
                        <div class="col-lg-4">
                            <div class="mb-3 bg-light p-3 rounded">
                                <span class="d-block mb-1">Échéance</span>
                                <h6 class="mb-2 fs-16 fw-semibold">{{ $invoice->due_date?->format('d/m/Y') }}</h6>
                                <span class="d-block mb-1">Statut du paiement</span>
                                <p class="{{ $statusColors[$invoice->status] ?? 'text-info' }} fs-16 fw-semibold">{{ $statusLabels[$invoice->status] ?? strtoupper($invoice->status) }}</p>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->
                    <div class="table-responsive mb-3">
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
                        <div class="d-flex align-items-start mb-3">
                            @if(!empty($bank))
                            <div>
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
                        <div class="mb-3">
                            @if($invoice->terms)
                                <p class="mb-2">Conditions générales : </p>
                                {!! nl2br(e($invoice->terms)) !!}
                            @endif
                        </div>
                    </div>
                    <div class="border-bottom py-3 bg-light text-center">
                        <p>{{ $invoice->notes ?? 'Merci pour votre confiance' }}</p>
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
