<?php $page = 'student-billing-invoice'; ?>
@extends('backoffice.layout.mainlayout')
@section('content')
    @php
        $company = $settings?->company_settings ?? [];
        $billTo = $invoice->bill_to_snapshot ?? [];
        $billFrom = $invoice->bill_from_snapshot ?? [];
        $bank = $invoice->bank_details_snapshot ?? [];
    @endphp
    <!-- Start Invoice -->
    <div class="content p-4">
        <!-- start row -->
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="mb-3">
                    <h6><a href="{{ url()->previous() }}"><i class="isax isax-arrow-left me-1"></i>Retour</a></h6>
                </div>
                <div class="pb-3 mb-3 border-bottom border-3 border-light">
                    <div class="d-flex align-items-center justify-content-between bg-light flex-wrap p-3 rounded">
                        <div>
                            @if($tenant)
                                @php $logoPath = $tenant->getFirstMediaUrl('logo'); @endphp
                                @if($logoPath)
                                    <img src="{{ $logoPath }}" class="mb-2" alt="" style="max-height: 50px;">
                                @endif
                            @endif
                        </div>
                        <div class="text-end">
                            <h6 class="text-primary fw-bold mb-2">{{ $company['company_name'] ?? $tenant?->name ?? '' }}</h6>
                            <span class="text-gray mb-2">Original pour le destinataire</span>
                        </div>

                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-center mb-3">
                    <div>
                        <h6 class="mb-1 fs-16">FACTURE</h6>
                    </div>
                </div>
                <!-- start row -->
                <div class="row">
                    <div class="col-lg-4">
                        <div class="mb-3 border-light">
                            <div class="d-flex align-items-center justify-content-between bg-light flex-wrap p-2 rounded">
                                <div class="text-gray fw-normal">Réf. Client :</div>
                                <span class="text-dark fw-medium">{{ $invoice->customer?->id }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3 border-light">
                            <div class="d-flex align-items-center justify-content-between bg-light flex-wrap p-2 rounded">
                                <div class="text-gray fw-normal">N° Facture :</div>
                                <span class="text-dark fw-medium">{{ $invoice->number }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3 border-light">
                            <div class="d-flex align-items-center justify-content-between bg-light flex-wrap p-2 rounded">
                                <div class="text-gray fw-normal">Date :</div>
                                <span class="text-dark fw-medium">{{ $invoice->issue_date?->format('d/m/Y') }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3 border-light">
                            <div class="d-flex align-items-center justify-content-between bg-light flex-wrap p-2 rounded">
                                <div class="text-gray fw-normal">Total TTC :</div>
                                <span class="text-dark fw-medium">{{ number_format($invoice->total, 2, ',', ' ') }} {{ $currency }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3 border-light">
                            <div class="d-flex align-items-center justify-content-between bg-light flex-wrap p-2 rounded">
                                <div class="text-gray fw-normal">Échéance :</div>
                                <span class="text-dark fw-medium">{{ $invoice->due_date?->format('d/m/Y') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <div>
                        <p class="mb-1 fw-bold d-block">Facturé à :</p>
                        <span class="mb-1 fw-noraml text-dark d-block">{{ $billTo['name'] ?? '' }}</span>
                        @if(!empty($billTo['address']))
                        <span class="mb-1 fw-noraml text-dark d-block">{{ $billTo['address'] }}</span>
                        @endif
                        @if(!empty($billTo['email']))
                        <span class="mb-1 fw-noraml text-dark d-block">{{ $billTo['email'] }}</span>
                        @endif
                        @if(!empty($billTo['phone']))
                        <span class="mb-1 fw-noraml text-dark d-block">{{ $billTo['phone'] }}</span>
                        @endif
                    </div>
                </div>
                <!-- start row -->
                <div class="row mb-3">
                    <div class="col-md-12">
                        <table class="table">
                            <thead class="thead-light border border-gray border-start-0 border-end-0">
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
                                <tr class="border-gray">
                                    <td class="text-dark">{{ $index + 1 }}</td>
                                    <td>
                                        <div class="d-flex flex-column">
                                            <span class="text-dark">{{ $item->label }}</span>
                                            @if($item->description)
                                            <span>{{ $item->description }}</span>
                                            @endif
                                        </div>
                                    </td>
                                    <td><span class="text-dark">{{ number_format($item->unit_price, 2, ',', ' ') }} {{ $currency }}</span></td>
                                    <td><span class="text-dark">{{ rtrim(rtrim(number_format($item->quantity, 3, ',', ' '), '0'), ',') }}</span></td>
                                    <td class="text-end"><span class="text-dark">{{ number_format($item->line_total, 2, ',', ' ') }} {{ $currency }}</span></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- end row -->
                <!-- start row -->
                <div class="row">
                    <div class="col-md-9">
                    </div>
                    <div class="col-md-3">
                        <div class="">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <p class="fs-14 fw-medium mb-0 text-dark">Sous-total HT</p>
                                <p class="fs-14 fw-medium mb-0 text-dark">{{ number_format($invoice->subtotal, 2, ',', ' ') }} {{ $currency }}</p>
                            </div>
                            @if($invoice->discount_total > 0)
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <p class="fs-14 fw-medium mb-0 text-dark">Remise</p>
                                <p class="fs-14 fw-medium mb-0 text-dark">- {{ number_format($invoice->discount_total, 2, ',', ' ') }} {{ $currency }}</p>
                            </div>
                            @endif
                            @if($invoice->enable_tax)
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <p class="fs-14 fw-medium mb-0 text-dark">TVA</p>
                                <p class="fs-14 fw-medium mb-0 text-dark">{{ number_format($invoice->tax_total, 2, ',', ' ') }} {{ $currency }}</p>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- end row -->
                <!-- start row -->
                <div class="row mb-2 border-top border-bottom border-3 border-light">
                    <div class="col-md-9 pb-3">
                        @if($invoice->total_in_words)
                        <p class="mb-1 fw-normal pt-3">Arrêtée la présente facture à la somme de :</p>
                        <span class="mb-1 fw-noraml text-dark">{{ $invoice->total_in_words }}</span>
                        @endif
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3 pt-4 align-items-center">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <h6 class="fs-18 fw-bold">Total TTC</h6>
                                <h6 class="fs-18 fw-bold">{{ number_format($invoice->total, 2, ',', ' ') }} {{ $currency }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
                <!-- start row -->
                <div class="row d-flex align-items-center justify-content-between flex-wrap border-bottom mb-3">
                    @if(!empty($bank))
                    <div class="col-md-9">
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
                    </div>
                    @endif
                    <div class="col-md-3">
                        <div class="text-end mb-3">
                            <p class="mb-1">Pour {{ $company['company_name'] ?? $tenant?->name ?? '' }}</p>
                            @if($signature && $signature->getFirstMediaUrl('signature'))
                            <span><img src="{{ $signature->getFirstMediaUrl('signature') }}" alt="Signature" style="max-height: 60px;"></span>
                            @endif
                        </div>
                    </div>
                    @if($invoice->terms)
                    <div class="d-flex align-items-center justify-content-center mb-3">
                        <div>
                            <h6 class="mb-2 fs-16 text-center">Conditions générales : </h6>
                            <p class="mb-0 fs-13">{!! nl2br(e($invoice->terms)) !!}</p>
                        </div>
                    </div>
                    @endif
                </div>
                <!-- end row -->
                <!-- start row -->
                <div class="row border-bottom pb-3 text-center">
                    <div class="col-md-12">
                        <p class="text-gray">Merci pour votre confiance</p>
                    </div>
                </div>
                <!-- end row -->
            </div>
        </div>
        <!-- end row -->
    </div>
    <!-- End Invoice -->
@endsection
