<?php $page = 'general-invoice-3'; ?>
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
                    <div class="card rounded-0 shadow-none mb-0 border-bottom-0">
                        <div class="card-header py-2">
                            <div class="d-flex align-items-center justify-content-between">
                                <h5>FACTURE</h5>
                                <p>Original pour le destinataire</p>
                            </div>
                        </div> <!-- end card-header -->
                        <div class="card-body p-0">
                            <div class="row gx-0">
                                <div class="col-lg-5 d-flex">
                                    <div class="p-3 border-end flex-fill">
                                        @if($tenant)
                                            @php $logoPath = $tenant->getFirstMediaUrl('logo'); @endphp
                                            @if($logoPath)
                                                <div class="mb-3"><img src="{{ $logoPath }}" alt="" style="max-height: 50px;"></div>
                                            @endif
                                        @endif
                                        <h6 class="fs-16 fw-semibold mb-2">{{ $company['company_name'] ?? $tenant?->name ?? '' }}</h6>
                                        <div class="row align-items-center">
                                            <div class="col-md-6">
                                                <div class="mb-2">
                                                    <span class="d-block mb-1">IF :</span>
                                                    <p class="text-dark">{{ $company['tax_id'] ?? '' }}</p>
                                                </div>
                                            </div> <!-- end col -->
                                            <div class="col-md-6">
                                                <div class="mb-2">
                                                    <span class="d-block mb-1">Tél :</span>
                                                    <p class="text-dark">{{ $company['phone'] ?? '' }}</p>
                                                </div>
                                            </div> <!-- end col -->
                                            <div class="col-md-12">
                                                <div>
                                                    <span class="d-block mb-1">Adresse :</span>
                                                    <p class="text-dark">{{ $company['address'] ?? '' }}@if(!empty($company['city'])), {{ $company['city'] }}@endif @if(!empty($company['postal_code'])) {{ $company['postal_code'] }}@endif @if(!empty($company['country'])) {{ $company['country'] }}@endif</p>
                                                </div>
                                            </div> <!-- end col -->
                                        </div> <!-- end row -->
                                    </div>
                                </div> <!-- end col -->
                                <div class="col-lg-7 d-flex">
                                    <div class="row flex-fill gx-0 align-items-center">
                                        <div class="col-md-6">
                                            <div class="border-end border-bottom p-3">
                                                <span class="d-block mb-1">N° Facture :</span>
                                                <p class="text-dark">{{ $invoice->number }}</p>
                                            </div>
                                        </div> <!-- end col -->
                                        <div class="col-md-6">
                                            <div class="border-bottom p-3">
                                                <span class="d-block mb-1">Date de facturation :</span>
                                                <p class="text-dark">{{ $invoice->issue_date?->format('d/m/Y') }}</p>
                                            </div>
                                        </div> <!-- end col -->
                                        <div class="col-md-6">
                                            <div class="border-end p-3">
                                                <h6 class="fs-16 text-gray-5 mb-2">Facturé à :</h6>
                                                <div>
                                                    <p class="mb-0 text-dark">{{ $billTo['name'] ?? $invoice->customer?->name ?? '' }}</p>
                                                    <p class="mb-0 text-dark">
                                                        @if(!empty($billTo['address'])) {{ $billTo['address'] }}@if(!empty($billTo['city'])), <br> {{ $billTo['city'] }}@endif @if(!empty($billTo['postal_code'])) {{ $billTo['postal_code'] }}@endif @if(!empty($billTo['country'])) {{ $billTo['country'] }}@endif @endif
                                                    </p>
                                                    @if(!empty($billTo['email'])) <p class="mb-0 text-dark">{{ $billTo['email'] }}</p> @endif
                                                    @if(!empty($billTo['phone'])) <p class="mb-0 text-dark">{{ $billTo['phone'] }}</p> @endif
                                                </div>
                                            </div>
                                        </div> <!-- end col -->
                                        <div class="col-md-6">
                                            <div class="p-3">
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
                                </div> <!-- end col -->
                            </div> <!-- end row -->
                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                    <div class="table-responsive">
                        <table class="table table-nowrap table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>Désignation</th>
                                    <th>Prix unit.</th>
                                    <th>Qté</th>
                                    <th>Montant HT</th>
                                    @if($invoice->enable_tax)
                                    <th>TVA</th>
                                    @endif
                                    <th class="text-end">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($invoice->items->sortBy('position') as $index => $item)
                                <tr>
                                    <td class="text-dark">{{ $index + 1 }}</td>
                                    <td>
                                        <div>
                                            <p class="text-dark mb-0">{{ $item->label }}</p>
                                            @if($item->description)
                                            <span class="d-block">{{ $item->description }}</span>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="text-dark">{{ number_format($item->unit_price, 2, ',', ' ') }}</td>
                                    <td>{{ rtrim(rtrim(number_format($item->quantity, 3, ',', ' '), '0'), ',') }}</td>
                                    <td class="text-dark">{{ number_format($item->line_subtotal, 2, ',', ' ') }}</td>
                                    @if($invoice->enable_tax)
                                    <td>{{ number_format($item->line_tax, 2, ',', ' ') }} ({{ number_format($item->tax_rate, 0) }}%)</td>
                                    @endif
                                    <td class="text-dark text-end">{{ number_format($item->line_total, 2, ',', ' ') }} {{ $currency }}</td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td colspan="{{ $invoice->enable_tax ? 5 : 4 }}" class="border-0 border-start text-dark">Total articles : {{ $invoice->items->count() }}</td>
                                    <td class="text-dark fw-medium border-0 text-center">Total HT</td>
                                    <td class="text-dark text-end fw-medium border-0 border-end">{{ number_format($invoice->subtotal, 2, ',', ' ') }} {{ $currency }}</td>
                                </tr>
                                @if($invoice->enable_tax)
                                <tr>
                                    <td colspan="{{ $invoice->enable_tax ? 5 : 4 }}" class="border-end-0"></td>
                                    <td class="text-dark fw-medium border-end-0 border-start-0 text-center">TVA</td>
                                    <td class="text-dark text-end fw-medium border-start-0">{{ number_format($invoice->tax_total, 2, ',', ' ') }} {{ $currency }}</td>
                                </tr>
                                @endif
                                <tr>
                                    <td colspan="{{ $invoice->enable_tax ? 4 : 3 }}" class="border-end-0"></td>
                                    <td colspan="2" class="text-dark fw-medium border-end-0 border-start-0 text-center">
                                        <h6>Total TTC</h6>
                                    </td>
                                    <td class="text-dark text-end fw-medium border-start-0">
                                        <h6>{{ number_format($invoice->total, 2, ',', ' ') }} {{ $currency }}</h6>
                                    </td>
                                </tr>
                            </tbody>
                        </table> <!-- end table -->
                    </div>
                    @if($invoice->total_in_words)
                    <div class="p-3 border border-top-0 text-center">
                        <p class="text-dark">Arrêtée la présente facture à la somme de : {{ $invoice->total_in_words }}</p>
                    </div>
                    @endif
                    <div class="d-flex justify-content-between align-items-center flex-wrap border border-top-0">
                        @if(!empty($bank))
                        <div class="p-3 flex-fill">
                            <h6 class="mb-2">Coordonnées bancaires</h6>
                            <div class="d-flex align-items-center">
                                <div class="me-2">
                                    @if(!empty($bank['bank_name'])) <p class="mb-1">Banque : <span class="text-dark">{{ $bank['bank_name'] }}</span></p> @endif
                                    @if(!empty($bank['account_name'])) <p class="mb-0">Titulaire : <span class="text-dark">{{ $bank['account_name'] }}</span></p> @endif
                                </div>
                                <div>
                                    @if(!empty($bank['rib'])) <p class="mb-1">RIB : <span class="text-dark">{{ $bank['rib'] }}</span></p> @endif
                                    @if(!empty($bank['iban'])) <p class="mb-0">IBAN : <span class="text-dark">{{ $bank['iban'] }}</span></p> @endif
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="text-center border-start p-3">
                            <p class="mb-1">Pour {{ $company['company_name'] ?? $tenant?->name ?? '' }}</p>
                            @if($signature && $signature->getFirstMediaUrl('signature'))
                                <span><img src="{{ $signature->getFirstMediaUrl('signature') }}" alt="" style="max-height: 60px;"></span>
                            @endif
                        </div>
                    </div>
                    <div class="border border-top-0">
                        <div class="row align-items-center">
                            <div class="col-lg-3 col-md-6 d-flex">
                                <div class="p-3 flex-fill">
                                    <span class="d-block mb-1">Notes :</span>
                                    <p class="text-dark">{{ $invoice->notes ?? 'Merci pour votre confiance' }}</p>
                                </div>
                            </div> <!-- end col -->
                            <div class="col-lg-9 col-md-6 d-flex">
                                <div class="p-3 ps-5 flex-fill border-start">
                                    @if($invoice->terms)
                                    <h6 class="mb-2">Conditions générales :</h6>
                                    {!! nl2br(e($invoice->terms)) !!}
                                    @endif
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
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
