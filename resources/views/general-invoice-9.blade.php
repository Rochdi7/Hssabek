<?php $page = 'general-invoice-9'; ?>
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
                <div class="mb-3 border-bottom">
                    <div class="d-flex align-items-center justify-content-between flex-wrap p-3 rounded">
                        <div class="">
                            <h6 class="mb-2 text-primary">FACTURE</h6>
                            <div>
                                <h6 class="mb-1">{{ $company['company_name'] ?? $tenant?->name ?? '' }}</h6>
                                <div>
                                    <p class="mb-1">Adresse : <span class="text-dark">@if(!empty($company['address'])){{ $company['address'] }}@endif</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="text-end">
                            @if($tenant)
                                @php $logoPath = $tenant->getFirstMediaUrl('logo'); @endphp
                                @if($logoPath)
                                    <img src="{{ $logoPath }}" class="mb-2" alt="" style="max-height: 60px;">
                                @endif
                            @endif
                            <p class="mb-1">Date : <span class="text-dark">{{ $invoice->issue_date?->format('d/m/Y') }}</span></p>
                            <div class="inv-details">
                                <div class="inv-date-nine">
                                    <p class="text-dark">N° Facture : <span>{{ $invoice->number }}</span></p>
                                </div>
                                <div class="triangle-left"></div>
                            </div>
                        </div>
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
                <div class="row border-top border-bottom p-2">
                    <div class="col-md-8">

                    </div> <!-- end col -->
                    <div class="col-md-4">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class=" text-end">
                                <span class="fw-bold fs-18 text-end text-primary">Total TTC</span>
                            </div>
                            <div class="text-end">
                                <span class="fw-bold fs-18 text-primary">{{ number_format($invoice->total, 2, ',', ' ') }} {{ $currency }}</span>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->
                <div class="row py-3 border-bottom mb-3 d-flex align-items-center">
                    <div class="col-lg-12">
                        <div class="d-flex align-items-center justify-content-center">
                            @if($invoice->total_in_words)
                                <p class="text-dark">Arrêtée la présente facture à la somme de : {{ $invoice->total_in_words }}
                                </p>
                            @endif
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->
                <div class="d-flex align-items-center justify-content-between flex-wrap border-bottom mb-3">
                    <div class="d-flex align-items-center mb-3">
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
                            <h6 class="mb-2">Conditions générales : </h6>
                            {!! nl2br(e($invoice->terms)) !!}
                        @endif
                    </div>
                </div>
                <div class="border-bottom text-center pb-3">
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
