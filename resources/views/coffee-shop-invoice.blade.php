<?php $page = 'coffee-shop-invoice'; ?>
@extends('backoffice.layout.mainlayout')
@section('content')
@php
    $company = $settings?->company_settings ?? [];
    $billTo = $invoice->bill_to_snapshot ?? [];
    $billFrom = $invoice->bill_from_snapshot ?? [];
    $bank = $invoice->bank_details_snapshot ?? [];
    $currency = $company['currency'] ?? 'MAD';
@endphp
    <!-- ========================
            Start Page Content
        ========================= -->

    <!-- Start Content -->
    <div class="content p-4">

        <!-- start row -->
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="mb-3">
                    <h6><a href="{{ url()->previous() }}"><i class="isax isax-arrow-left me-1"></i>Retour</a></h6>
                </div>
                <div class="mb-3">
                    <div class="d-flex align-items-center justify-content-end">
                        <div class="d-flex align-items-center">
                            <a href="javascript:void(0);"
                                class="btn btn-outline-white me-2 d-inline-flex align-items-center"><i
                                    class="isax isax-document-like me-1"></i>Télécharger PDF</a>
                            <a href="javascript:void(0);"
                                class="btn btn-outline-white me-2 d-inline-flex align-items-center"><i
                                    class="isax isax-message-notif me-1"></i>Envoyer par email</a>
                            <a href="javascript:void(0);" class="btn btn-outline-white d-inline-flex align-items-center"><i
                                    class="isax isax-printer me-1"></i>Imprimer</a>
                        </div>
                    </div>
                </div>
                <div class="pb-3 mb-3 border-bottom border-3 border-dark">
                    <div class="d-flex align-items-center justify-content-between bg-light flex-wrap gap-2 p-3 rounded">
                        <div>
                            @if($tenant)
                                @php $logoPath = $tenant->getFirstMediaUrl('logo'); @endphp
                                @if($logoPath)
                                    <img src="{{ $logoPath }}" class="mb-2" alt="Logo" style="max-height: 50px;">
                                @endif
                            @endif
                            <p class="mb-1">Date : <span class="text-dark">{{ $invoice->issue_date?->format('d/m/Y') }}</span></p>
                            <div class="inv-details">
                                <div class="inv-date-no">
                                    <p class="text-start text-white fs-14">N° Facture : <span>{{ $invoice->number }}</span></p>
                                </div>
                                <div class="triangle-right"></div>
                            </div>
                        </div>
                        <div class="text-end">
                            <p class="mb-1">Original pour le destinataire</p>
                            <h6 class="mb-2">FACTURE</h6>
                            <div>
                                <h6 class="mb-1">{{ $company['company_name'] ?? $tenant?->name ?? '' }}</h6>
                                <div>
                                    <p class="mb-1">Adresse : <span class="text-dark">{{ $company['address'] ?? '' }}</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <div>
                        <p class="mb-1">Facturé à :</p>
                        <h6 class="mb-1 fs-16">{{ $billTo['name'] ?? $invoice->customer?->name ?? '' }}</h6>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="thead-primary">
                                    <tr>
                                        <th>#</th>
                                        <th>Désignation</th>
                                        <th>Prix unit.</th>
                                        <th>Qté</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($invoice->items->sortBy('position') as $index => $item)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>
                                            <div class="d-flex flex-column">
                                                <span class="text-dark mb-1">{{ $item->label }}</span>
                                                @if($item->description)
                                                    <span>{{ $item->description }}</span>
                                                @endif
                                            </div>
                                        </td>
                                        <td><span class="text-dark">{{ number_format($item->unit_price, 2, ',', ' ') }} {{ $currency }}</span></td>
                                        <td><span class="text-dark">{{ rtrim(rtrim(number_format($item->quantity, 3, ',', ' '), '0'), ',') }}</span></td>
                                        <td><span class="text-dark">{{ number_format($item->line_subtotal, 2, ',', ' ') }} {{ $currency }}</span></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- start row -->
                <div class="row mb-2 ">
                    <div class="col-md-8">
                    </div><!-- end col -->
                    <div class="col-md-4">
                        <div class="d-flex align-items-center justify-content-between ">
                            <div class="d-flex flex-column">
                                <span class="text-dark text-end fw-semibold mb-1">Sous-total HT</span>
                                @if($invoice->tax_total > 0)
                                    <span class="text-dark text-end fw-semibold">TVA</span>
                                @endif
                                @if($invoice->discount_total > 0)
                                    <span class="text-dark text-end fw-semibold">Remise</span>
                                @endif
                            </div>
                            <div class="d-flex flex-column text-end">
                                <span class="text-dark fw-semibold mb-1">{{ number_format($invoice->subtotal, 2, ',', ' ') }} {{ $currency }}</span>
                                @if($invoice->tax_total > 0)
                                    <span class="text-dark fw-semibold">{{ number_format($invoice->tax_total, 2, ',', ' ') }} {{ $currency }}</span>
                                @endif
                                @if($invoice->discount_total > 0)
                                    <span class="text-dark fw-semibold">-{{ number_format($invoice->discount_total, 2, ',', ' ') }} {{ $currency }}</span>
                                @endif
                            </div>
                        </div>
                    </div><!-- end col -->
                </div>
                <!-- end row -->

                <!-- start row -->
                <div class="row border-top border-bottom border-3 border-dark p-2">
                    <div class="col-md-8">
                        <span class="text-dark">{{ $invoice->items->count() }} article(s)</span>
                    </div><!-- end col -->
                    <div class="col-md-4">
                        <div class="d-flex align-items-center justify-content-between ">
                            <div class=" text-end">
                                <span class="fw-bold fs-18 text-end text-dark">Total TTC</span>
                            </div>
                            <div class="text-end">
                                <span class="fw-bold fs-18 text-dark">{{ number_format($invoice->total, 2, ',', ' ') }} {{ $currency }}</span>
                            </div>
                        </div>
                    </div><!-- end col -->
                </div>
                <!-- end row -->

                <!-- start row -->
                @if($invoice->total_in_words)
                <div class="row py-3 border-bottom  border-bottom border-3 border-dark mb-3 d-flex align-items-center">
                    <div class="col-lg-12">
                        <div class="d-flex align-items-center justify-content-end">
                            <p class="text-dark">Arrêtée la présente facture à la somme de : {{ $invoice->total_in_words }}
                            </p>
                        </div>
                    </div><!-- end col -->
                </div>
                @endif
                <!-- end row -->

                <div class="d-flex align-items-center justify-content-between flex-wrap border-bottom mb-3">
                    @if(!empty($bank))
                    <div class="mb-3">
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
                    @if($invoice->terms)
                    <div class="mb-3">
                        <h6 class="mb-2">Conditions générales : </h6>
                        {!! nl2br(e($invoice->terms)) !!}
                    </div>
                    @endif
                </div>
                <div class="border-bottom text-center text-white bg-primary p-2">
                    <p>Merci pour votre confiance</p>
                </div>
            </div><!-- end col -->
        </div>
        <!-- end row -->

    </div>
    <!-- End Content -->


    <!-- ========================
            End Page Content
        ========================= -->
@endsection
