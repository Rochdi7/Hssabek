<?php $page = 'general-invoice-8'; ?>
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
                    <div class="d-flex align-items-center justify-content-between rounded flex-wrap row-gap-3 mb-2">
                        <h5 class="text-primary">Facture</h5>
                        <div>
                            <div class="mb-1">
                                @if($tenant)
                                    @php $logoPath = $tenant->getFirstMediaUrl('logo'); @endphp
                                    @if($logoPath)
                                        <img src="{{ $logoPath }}" alt="" style="max-height: 60px;">
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="mb-2">
                                <h6 class="fs-16 mb-1">{{ $company['company_name'] ?? $tenant?->name ?? '' }}</h6>
                                <p class="mb-1">IF : <span class="text-dark">{{ $company['tax_id'] ?? '' }}</span></p>
                                <p class="mb-1">Adresse : <span class="text-dark">@if(!empty($company['address'])){{ $company['address'] }}@endif</span></p>
                                <p class="mb-1">Tél : <span class="text-dark">{{ $company['phone'] ?? '' }}</span></p>
                            </div>
                        </div> <!-- end row -->
                    </div>
                    <div class="card rounded-0 shadow-none mb-3 border-bottom">
                        <div class="card-body p-0">
                            <div class="row gx-0">
                                <div class="col-lg-7 d-flex">
                                    <div class="p-3 border-end flex-fill">
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
                                    </div>
                                </div> <!-- end col -->
                                <div class="col-lg-5 d-flex">
                                    <div class="row flex-fill gx-0 align-items-center">
                                        <div class="col-md-6">
                                            <div class="border-end border-bottom text-center p-3">
                                                <span class="d-block mb-1">N° Facture :</span>
                                                <p class="fw-semibold text-primary">{{ $invoice->number }}</p>
                                            </div>
                                        </div> <!-- end col -->
                                        <div class="col-md-6">
                                            <div class="border-bottom text-center p-3">
                                                <span class="d-block mb-1">Date de facturation :</span>
                                                <p class="fw-semibold text-primary">{{ $invoice->issue_date?->format('d/m/Y') }}</p>
                                            </div>
                                        </div> <!-- end col -->
                                        <div class="col-md-6">
                                            <div class="border-end p-3">
                                                <div class="text-center">
                                                    <span class="d-block mb-1">Statut du paiement :</span>
                                                    <p class="fw-semibold {{ $statusColors[$invoice->status] ?? 'text-primary' }}">{{ $statusLabels[$invoice->status] ?? strtoupper($invoice->status) }}</p>
                                                </div>
                                            </div>
                                        </div> <!-- end col -->
                                        <div class="col-md-6">
                                            <div class="p-3">
                                                <div class="text-center">
                                                    <span class="d-block mb-1">Échéance :</span>
                                                    <p class="fw-semibold text-primary">{{ $invoice->due_date?->format('d/m/Y') }}</p>
                                                </div>
                                            </div>
                                        </div> <!-- end col -->
                                    </div> <!-- end row -->
                                </div> <!-- end col -->
                            </div> <!-- end row -->
                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
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
                        </table>
                    </div>
                    <div class="py-3 border-top-0 border-bottom mb-3 d-flex align-items-center justify-content-between">
                        @if($invoice->total_in_words)
                            <p class="text-dark">Arrêtée la présente facture à la somme de : <br> {{ $invoice->total_in_words }}</p>
                        @else
                            <p class="text-dark"></p>
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
                    <div class="d-flex align-items-center justify-content-between flex-wrap border-bottom mb-3">
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
                    <div class="border-bottom mb-3">
                        @if($invoice->notes)
                            <p class="bg-primary-subtle p-2 text-dark fs-13 mb-3">{{ $invoice->notes }}</p>
                        @endif
                    </div>
                    <div class="border-bottom pb-3">
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
