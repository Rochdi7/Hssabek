<?php $page = 'receipt-invoice-3'; ?>
@extends('backoffice.layout.mainlayout')
@section('content')
    @php
        $company = $settings?->company_settings ?? [];
        $billTo = $invoice->bill_to_snapshot ?? [];
        $billFrom = $invoice->bill_from_snapshot ?? [];
        $bank = $invoice->bank_details_snapshot ?? [];
        $currency = $invoice->currency ?? 'MAD';
        $statusLabels = [
            'draft' => 'Brouillon',
            'sent' => 'Envoyée',
            'paid' => 'Payée',
            'partially_paid' => 'Partiellement payée',
            'overdue' => 'En retard',
            'cancelled' => 'Annulée',
        ];
        $statusColors = [
            'draft' => 'secondary',
            'sent' => 'info',
            'paid' => 'success',
            'partially_paid' => 'warning',
            'overdue' => 'danger',
            'cancelled' => 'dark',
        ];
    @endphp
    <div class="invoice-wrapper receipt-page">
        <div class="mb-3">
            <h6><a href="{{ url()->previous() }}"><i class="isax isax-arrow-left me-1"></i>Retour</a></h6>
        </div>
        <div class="card m-auto shadow-none">
            <div class="card-body">
                <div class="p-2 text-center mb-2">
                    <h6 class="fs-16">Reçu</h6>
                </div>
                <h6 class="fs-10 fw-bold text-center text-gray-5 border-dashed pb-2 mb-2">{{ $company['company_name'] ?? $tenant?->name ?? '' }}</h6>
                <div class="mb-2">

                    <!-- start row -->
                    <div class="row mb-2 row-gap-3">
                        <div class="col-sm-6 col-md-6">
                            <div class="d-flex justify-content-between align-items-center">
                                <p class=" mb-0">Nom :</p>
                                <p class=" text-dark">{{ $billTo['name'] ?? $billTo['company_name'] ?? '' }}</p>
                            </div>
                        </div><!-- end col -->
                        <div class="col-sm-6 col-md-6">
                            <div class="d-flex justify-content-between align-items-center">
                                <p class=" mb-0">N° Facture :</p>
                                <p class=" text-dark">{{ $invoice->number }}</p>
                            </div>
                        </div><!-- end col -->
                    </div>
                    <!-- end row -->

                    <!-- start row -->
                    <div class="row row-gap-3">
                        <div class="col-sm-6 col-md-6">
                            <div class="d-flex justify-content-between align-items-center">
                                <p class=" mb-0">IF :</p>
                                <p class=" text-dark">{{ $billTo['tax_id'] ?? '' }}</p>
                            </div>
                        </div><!-- end col -->
                        <div class="col-sm-6 col-md-6">
                            <div class="d-flex justify-content-between align-items-center">
                                <p class=" mb-0">Date :</p>
                                <p class=" text-dark">{{ $invoice->issue_date?->format('d/m/Y') }}</p>
                            </div>
                        </div><!-- end col -->
                    </div>
                    <!-- end row -->

                </div>
                <div class="receipt-header">
                    <table class="table table-nowrap border-dashed mb-2">
                        <thead>
                            <tr class="mb-2">
                                <th class="fs-10 border-0 pe-0">N°</t>
                                <th class="fs-10 border-0 ps-0">Article</th>
                                <th class="fs-10 border-0 pe-0 text-end">Prix</th>
                                <th class="fs-10 border-0 pe-0 text-end">Qté</th>
                                <th class="fs-10 border-0 pe-0 text-end">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($invoice->items->sortBy('position') as $index => $item)
                            <tr@if($loop->last) class="border-dashed"@endif>
                                <td class="fs-10 border-0 p-1 pe-0">{{ $index + 1 }}.</td>
                                <td class="fs-10 border-0 p-1 ps-0">{{ $item->description }}</td>
                                <td class="fs-10 border-0 p-1 text-end">{{ number_format($item->unit_price, 2, ',', ' ') }} {{ $currency }}</td>
                                <td class="fs-10 border-0 p-1 text-end">{{ rtrim(rtrim(number_format($item->quantity, 3, ',', ' '), '0'), ',') }}</td>
                                <td class="fs-10 border-0 p-1 text-end">{{ number_format($item->total, 2, ',', ' ') }} {{ $currency }}</td>
                            </tr>
                            @endforeach
                            <tr>
                                <td class="border-0"></td>
                                <td colspan="2" class="fs-10 border-0 p-1 text-end">Sous-total HT :</td>
                                <td colspan="2" class="fs-10 border-0 p-1 text-end">{{ number_format($invoice->subtotal, 2, ',', ' ') }} {{ $currency }}</td>
                            </tr>
                            @if($invoice->discount_total > 0)
                            <tr>
                                <td class="border-0"></td>
                                <td colspan="2" class="fs-10 border-dashed p-1 text-end">Remise :</td>
                                <td colspan="2" class="fs-10 border-dashed p-1 text-end">-{{ number_format($invoice->discount_total, 2, ',', ' ') }} {{ $currency }}</td>
                            </tr>
                            @endif
                            @if($invoice->enable_tax)
                            <tr>
                                <td class="border-0"></td>
                                <td colspan="2" class="fs-10 border-dashed p-1 text-end">TVA :</td>
                                <td colspan="2" class="fs-10 border-dashed p-1 text-end">{{ number_format($invoice->tax_total, 2, ',', ' ') }} {{ $currency }}</td>
                            </tr>
                            @endif
                            <tr>
                                <td class="border-0"></td>
                                <td colspan="2" class="fs-10 border-0 p-1 text-end">Total TTC :</td>
                                <td colspan="2" class="fs-10 border-0 p-1 text-end">{{ number_format($invoice->total, 2, ',', ' ') }} {{ $currency }}</td>
                            </tr>
                            <tr>
                                <td class="border-0"></td>
                                <td colspan="2" class="fs-10 border-0 p-1 text-end">Statut :</td>
                                <td colspan="2" class="fs-10 border-0 p-1 text-end"><span class="badge bg-{{ $statusColors[$invoice->status] ?? 'secondary' }}">{{ $statusLabels[$invoice->status] ?? $invoice->status }}</span></td>
                            </tr>
                            <tr>
                                <td class="border-0"></td>
                                <td colspan="2" class="fs-10 border-dashed p-1 text-dark text-end fw-semibold">Total
                                    TTC :</td>
                                <td colspan="2" class="fs-10 border-dashed p-1 text-dark text-end fw-semibold">{{ number_format($invoice->total, 2, ',', ' ') }} {{ $currency }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    @if($invoice->total_in_words)
                    <p class="text-center mb-2">Arrêtée la présente facture à la somme de : {{ $invoice->total_in_words }}</p>
                    @endif
                    @if(!empty($bank))
                    <div class="mb-2">
                        <p class="fw-semibold text-dark mb-1">Coordonnées bancaires :</p>
                        @if(!empty($bank['bank_name']))<p class="mb-0">Banque : {{ $bank['bank_name'] }}</p>@endif
                        @if(!empty($bank['account_name']))<p class="mb-0">Titulaire : {{ $bank['account_name'] }}</p>@endif
                        @if(!empty($bank['rib']))<p class="mb-0">RIB : {{ $bank['rib'] }}</p>@endif
                        @if(!empty($bank['iban']))<p class="mb-0">IBAN : {{ $bank['iban'] }}</p>@endif
                    </div>
                    @endif
                    @if($invoice->terms)
                    <p class="text-center pb-2 border-dashed">{!! nl2br(e($invoice->terms)) !!}</p>
                    @endif
                    <p class="text-center pb-2 border-dashed">{{ $invoice->notes ?? 'Merci pour votre confiance' }}</p>
                    @if($signature && $signature->getFirstMediaUrl('signature'))
                    <div class="text-end mt-2">
                        <span><img src="{{ $signature->getFirstMediaUrl('signature') }}" alt="" style="max-height: 60px;"></span>
                        <p class="mb-0">Pour {{ $company['company_name'] ?? $tenant?->name ?? '' }}</p>
                    </div>
                    @endif
                </div>
            </div><!-- end card body -->
        </div><!-- end card -->
    </div>
@endsection
