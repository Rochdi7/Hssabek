<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Facture {{ $invoice->number }}</title>
    @include('pdf.partials.theme-css')
</head>
<body>
    @php
        $company = $settings?->company_settings ?? [];
        $billTo = $invoice->bill_to_snapshot ?? [];
        $billFrom = $invoice->bill_from_snapshot ?? [];
        $bank = $invoice->bank_details_snapshot ?? [];
        $currency = $invoice->currency ?? 'MAD';
    @endphp

    <div class="invoice-dark">
        <div class="d-flex align-items-center justify-content-between bg-gray-9 p-3 rounded flex-wrap row-gap-3 mb-3">
            <div>
                <div class="mb-1">
                    @if($tenant)
                        @php $logoPath = $tenant->getFirstMediaPath('logo'); @endphp
                        @if($logoPath && file_exists($logoPath))
                            <img src="{{ $logoPath }}" height="50" alt="logo">
                        @endif
                    @endif
                </div>
            </div>
            <div>
                <h5 class="mb-1">FACTURE</h5>
                <p>Original pour le destinataire</p>
            </div>
        </div>
        <div class="border-bottom mb-3">
            <h6 class="mb-2 fs-16">{{ $company['company_name'] ?? $tenant?->name ?? '' }}</h6>
            <div class="row">
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-md-6">
                            @if(!empty($company['tax_id']))
                            <div class="mb-2">
                                <span class="d-block mb-1">IF :</span>
                                <p class="text-dark">{{ $company['tax_id'] }}</p>
                            </div>
                            @endif
                        </div> <!-- end col -->
                        <div class="col-md-6">
                            @if(!empty($company['phone']))
                            <div class="mb-2">
                                <span class="d-block mb-1">Tél :</span>
                                <p class="text-dark">{{ $company['phone'] }}</p>
                            </div>
                            @endif
                        </div> <!-- end col -->
                    </div> <!-- end row -->
                </div> <!-- end col -->
                <div class="col-lg-8">
                    <div class="text-lg-end mb-2">
                        <p class="mb-1">N° Facture : <span class="text-dark">{{ $invoice->number }}</span></p>
                        <p class="mb-1">Date : <span class="text-dark">{{ $invoice->issue_date?->format('d/m/Y') }}</span></p>
                        @if($invoice->due_date)
                        <p class="mb-1">Échéance : <span class="text-dark">{{ $invoice->due_date?->format('d/m/Y') }}</span></p>
                        @endif
                        @if($invoice->reference_number)
                        <p class="mb-1">Réf : <span class="text-dark">{{ $invoice->reference_number }}</span></p>
                        @endif
                    </div>
                </div> <!-- end col -->
                @if(!empty($company['ice']))
                <div class="col-md-3">
                    <div class="mb-2">
                        <span class="d-block mb-1">ICE :</span>
                        <p class="text-dark">{{ $company['ice'] }}</p>
                    </div>
                </div>
                @endif
                @if(!empty($company['rc']))
                <div class="col-md-3">
                    <div class="mb-2">
                        <span class="d-block mb-1">RC :</span>
                        <p class="text-dark">{{ $company['rc'] }}</p>
                    </div>
                </div>
                @endif
                @if(!empty($company['cnss']))
                <div class="col-md-3">
                    <div class="mb-2">
                        <span class="d-block mb-1">CNSS :</span>
                        <p class="text-dark">{{ $company['cnss'] }}</p>
                    </div>
                </div>
                @endif
                @if(!empty($company['patente']))
                <div class="col-md-3">
                    <div class="mb-2">
                        <span class="d-block mb-1">Patente :</span>
                        <p class="text-dark">{{ $company['patente'] }}</p>
                    </div>
                </div>
                @endif
                @if(!empty($company['numero_ae']))
                <div class="col-md-3">
                    <div class="mb-2">
                        <span class="d-block mb-1">N° AE :</span>
                        <p class="text-dark">{{ $company['numero_ae'] }}</p>
                    </div>
                </div>
                @endif
                <div class="col-md-12">
                    @if(!empty($company['address']))
                    <div class="mb-3">
                        <span class="d-block mb-1">Adresse :</span>
                        <p class="text-dark">{{ $company['address'] }}@if(!empty($company['city'])), {{ $company['city'] }}@endif @if(!empty($company['postal_code'])) {{ $company['postal_code'] }}@endif @if(!empty($company['country'])) {{ $company['country'] }}@endif</p>
                    </div>
                    @endif
                </div> <!-- end col -->
            </div> <!-- end row -->
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <h6 class="fs-16 text-gray-5 mb-2">Facturé à :</h6>
                    <div>
                        <p class="mb-0 text-dark">{{ $billTo['name'] ?? $invoice->customer?->name ?? '' }}</p>
                        <p class="mb-0 text-dark">
                            @if(!empty($billTo['address'])){{ $billTo['address'] }}@endif
                            @if(!empty($billTo['city'])), {{ $billTo['city'] }}@endif
                            @if(!empty($billTo['postal_code'])), {{ $billTo['postal_code'] }}@endif
                            @if(!empty($billTo['country'])) {{ $billTo['country'] }}@endif
                        </p>
                        @if(!empty($billTo['email']))<p class="mb-0 text-dark">{{ $billTo['email'] }}</p>@endif
                        @if(!empty($billTo['phone']))<p class="mb-0 text-dark">{{ $billTo['phone'] }}</p>@endif
                        @if(!empty($billTo['tax_id']))<p class="mb-0 text-dark">IF : {{ $billTo['tax_id'] }}</p>@endif
                    </div>
                </div>
            </div> <!-- end col -->
            <div class="col-md-6">
                <div class="mb-3">
                    <h6 class="fs-16 text-gray-5 mb-2">Payé à :</h6>
                    <div>
                        <p class="mb-0 text-dark">{{ $billFrom['company_name'] ?? $company['company_name'] ?? $tenant?->name ?? '' }}</p>
                        <p class="mb-0 text-dark">
                            @if(!empty($billFrom['address'] ?? $company['address'] ?? '')){{ $billFrom['address'] ?? $company['address'] ?? '' }}@endif
                            @if(!empty($billFrom['city'] ?? $company['city'] ?? '')) <br>{{ $billFrom['city'] ?? $company['city'] ?? '' }}@endif
                        </p>
                        @if(!empty($billFrom['email'] ?? $company['email'] ?? ''))<p class="mb-0 text-dark">{{ $billFrom['email'] ?? $company['email'] ?? '' }}</p>@endif
                        @if(!empty($billFrom['phone'] ?? $company['phone'] ?? ''))<p class="mb-0 text-dark">{{ $billFrom['phone'] ?? $company['phone'] ?? '' }}</p>@endif
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
        <div class="table-responsive mb-3">
            <table class="table table-nowrap table-bordered table-dark">
                <thead class="thead-dark">
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
                        <td colspan="3" class="border-end-0">
                            @if($invoice->notes)
                            <div>
                                <span>Note : </span>
                                <p class="text-dark">{!! nl2br(e($invoice->notes)) !!}</p>
                            </div>
                            @endif
                        </td>
                        <td colspan="2" class="text-dark border-0 pe-0">
                            <div>
                                <h6 class="fs-14 fw-medium mb-2 pb-2 border-bottom pb-2">Sous-total HT</h6>
                                @if($invoice->discount_total > 0)
                                <h6 class="fs-14 fw-medium mb-2 border-bottom pb-2">Remise</h6>
                                @endif
                                @if($invoice->enable_tax)
                                <h6 class="fs-14 fw-medium mb-0">TVA</h6>
                                @endif
                                @if($invoice->round_off != 0)
                                <h6 class="fs-14 fw-medium mb-0">Arrondi</h6>
                                @endif
                            </div>
                        </td>
                        <td class="text-dark text-end fw-medium border-start-0 ps-0">
                            <div>
                                <h6 class="fs-14 fw-medium mb-2 border-bottom pb-2">{{ number_format($invoice->subtotal, 2, ',', ' ') }} {{ $currency }}</h6>
                                @if($invoice->discount_total > 0)
                                <h6 class="fs-14 fw-medium mb-2 border-bottom pb-2">-{{ number_format($invoice->discount_total, 2, ',', ' ') }} {{ $currency }}</h6>
                                @endif
                                @if($invoice->enable_tax)
                                <h6 class="fs-14 fw-medium mb-0">{{ number_format($invoice->tax_total, 2, ',', ' ') }} {{ $currency }}</h6>
                                @endif
                                @if($invoice->round_off != 0)
                                <h6 class="fs-14 fw-medium mb-0">{{ number_format($invoice->round_off, 2, ',', ' ') }} {{ $currency }}</h6>
                                @endif
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" class="text-dark border-end-0">Total articles : {{ $invoice->items->count() }}</td>
                        <td colspan="2" class="text-dark fw-medium border-end-0 border-start-0"><h6>Total TTC</h6></td>
                        <td class="text-dark text-end fw-medium border-start-0"><h6>{{ number_format($invoice->total, 2, ',', ' ') }} {{ $currency }}</h6></td>
                    </tr>
                    @if($invoice->total_in_words)
                    <tr>
                        <td colspan="6">Arrêtée la présente facture à la somme de : {{ $invoice->total_in_words }}</td>
                    </tr>
                    @endif
                </tbody>
            </table> <!-- end table -->
        </div>

        {{-- Charges --}}
        @if($invoice->charges->count())
        <div class="table-responsive mb-3">
            <table class="table table-nowrap table-bordered table-dark">
                <thead class="thead-dark">
                    <tr>
                        <th colspan="3">Frais supplémentaires</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($invoice->charges->sortBy('position') as $charge)
                    <tr>
                        <td class="text-dark">{{ $charge->label }}</td>
                        @if($invoice->enable_tax)
                        <td class="text-dark text-end">{{ number_format($charge->tax_rate, 2) }}%</td>
                        @endif
                        <td class="text-dark text-end">{{ number_format($charge->amount, 2, ',', ' ') }} {{ $currency }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif

        {{-- Amount paid / Amount due --}}
        @if($invoice->amount_paid > 0)
        <div class="table-responsive mb-3">
            <table class="table table-nowrap table-bordered table-dark">
                <tbody>
                    <tr>
                        <td colspan="3" class="text-dark border-end-0"></td>
                        <td colspan="2" class="text-dark fw-medium border-end-0 border-start-0">Montant payé</td>
                        <td class="text-dark text-end fw-medium border-start-0">{{ number_format($invoice->amount_paid, 2, ',', ' ') }} {{ $currency }}</td>
                    </tr>
                    <tr>
                        <td colspan="3" class="text-dark border-end-0"></td>
                        <td colspan="2" class="text-dark fw-medium border-end-0 border-start-0"><h6>Solde dû</h6></td>
                        <td class="text-dark text-end fw-medium border-start-0"><h6>{{ number_format($invoice->amount_due, 2, ',', ' ') }} {{ $currency }}</h6></td>
                    </tr>
                </tbody>
            </table>
        </div>
        @endif

        <div class="d-flex align-items-center justify-content-between flex-wrap border-bottom mb-3">
            @if(!empty($bank))
            <div class="mb-3">
                <h6 class="mb-2">Coordonnées bancaires :</h6>
                <div>
                    @if(!empty($bank['bank_name']))<p class="mb-1">Banque : <span class="text-dark">{{ $bank['bank_name'] }}</span></p>@endif
                    @if(!empty($bank['account_name']))<p class="mb-1">Titulaire : <span class="text-dark">{{ $bank['account_name'] }}</span></p>@endif
                    @if(!empty($bank['rib']))<p class="mb-1">RIB : <span class="text-dark">{{ $bank['rib'] }}</span></p>@endif
                    @if(!empty($bank['iban']))<p class="mb-1">IBAN : <span class="text-dark">{{ $bank['iban'] }}</span></p>@endif
                    @if(!empty($bank['swift']))<p class="mb-0">SWIFT : <span class="text-dark">{{ $bank['swift'] }}</span></p>@endif
                </div>
            </div>
            @endif
            <div class="text-center mb-3">
                <p class="mb-1">Pour {{ $company['company_name'] ?? $tenant?->name ?? '' }}</p>
                @include('pdf.partials.signature')
            </div>
        </div>
        @if($invoice->terms)
        <div class="border-bottom mb-3 pb-3">
            <h6 class="mb-2">Conditions générales :</h6>
            {!! nl2br(e($invoice->terms)) !!}
        </div>
        @endif
        <div class="border-bottom pb-3 text-center">
            @if($invoice->notes)
                <p>{{ $invoice->notes }}</p>
            @else
                <p>Merci pour votre confiance</p>
            @endif
        </div>
    </div>

</body>
</html>
