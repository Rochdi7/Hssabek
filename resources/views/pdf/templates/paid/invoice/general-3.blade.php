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
                            <div class="mb-3">
                                @if($tenant)
                                    @php $logoPath = $tenant->getFirstMediaPath('logo'); @endphp
                                    @if($logoPath && file_exists($logoPath))
                                        <img src="{{ $logoPath }}" height="50" alt="logo">
                                    @endif
                                @endif
                            </div>
                            <h6 class="fs-16 fw-semibold mb-2">{{ $company['company_name'] ?? $tenant?->name ?? '' }}</h6>
                            <div class="row align-items-center">
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
                                @if(!empty($company['ice']))
                                <div class="col-md-6">
                                    <div class="mb-2">
                                        <span class="d-block mb-1">ICE :</span>
                                        <p class="text-dark">{{ $company['ice'] }}</p>
                                    </div>
                                </div>
                                @endif
                                @if(!empty($company['rc']))
                                <div class="col-md-6">
                                    <div class="mb-2">
                                        <span class="d-block mb-1">RC :</span>
                                        <p class="text-dark">{{ $company['rc'] }}</p>
                                    </div>
                                </div>
                                @endif
                                @if(!empty($company['cnss']))
                                <div class="col-md-6">
                                    <div class="mb-2">
                                        <span class="d-block mb-1">CNSS :</span>
                                        <p class="text-dark">{{ $company['cnss'] }}</p>
                                    </div>
                                </div>
                                @endif
                                @if(!empty($company['patente']))
                                <div class="col-md-6">
                                    <div class="mb-2">
                                        <span class="d-block mb-1">Patente :</span>
                                        <p class="text-dark">{{ $company['patente'] }}</p>
                                    </div>
                                </div>
                                @endif
                                @if(!empty($company['numero_ae']))
                                <div class="col-md-6">
                                    <div class="mb-2">
                                        <span class="d-block mb-1">N° AE :</span>
                                        <p class="text-dark">{{ $company['numero_ae'] }}</p>
                                    </div>
                                </div>
                                @endif
                                <div class="col-md-12">
                                    @if(!empty($company['address']))
                                    <div>
                                        <span class="d-block mb-1">Adresse :</span>
                                        <p class="text-dark">{{ $company['address'] }}@if(!empty($company['city'])), {{ $company['city'] }}@endif @if(!empty($company['postal_code'])) {{ $company['postal_code'] }}@endif @if(!empty($company['country'])) {{ $company['country'] }}@endif</p>
                                    </div>
                                    @endif
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
                                    @if($invoice->due_date)
                                    <span class="d-block mb-1">Échéance :</span>
                                    <p class="text-dark">{{ $invoice->due_date?->format('d/m/Y') }}</p>
                                    @endif
                                    @if($invoice->reference_number)
                                    <span class="d-block mb-1">Réf :</span>
                                    <p class="text-dark">{{ $invoice->reference_number }}</p>
                                    @endif
                                </div>
                            </div> <!-- end col -->
                            <div class="col-md-6">
                                <div class="border-end p-3">
                                    <h6 class="fs-16 text-gray-5 mb-2">Facturé à :</h6>
                                    <div>
                                        <p class="mb-0 text-dark">{{ $billTo['name'] ?? $invoice->customer?->name ?? '' }}</p>
                                        <p class="mb-0 text-dark">
                                            @if(!empty($billTo['address'])){{ $billTo['address'] }}@endif
                                            @if(!empty($billTo['city'])), <br>{{ $billTo['city'] }}@endif
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
                                <div class="p-3">
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
                        <td>{{ number_format($item->tax_rate, 0) }}%</td>
                        @endif
                        <td class="text-dark text-end">{{ number_format($item->line_total, 2, ',', ' ') }} {{ $currency }}</td>
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="{{ $invoice->enable_tax ? 5 : 4 }}" class="border-0 border-start text-dark">Total articles : {{ $invoice->items->count() }}</td>
                        <td class="text-dark fw-medium border-0 text-center">Sous-total HT</td>
                        <td class="text-dark text-end fw-medium border-0 border-end">{{ number_format($invoice->subtotal, 2, ',', ' ') }} {{ $currency }}</td>
                    </tr>
                    @if($invoice->discount_total > 0)
                    <tr>
                        <td colspan="{{ $invoice->enable_tax ? 5 : 4 }}" class="border-end-0"></td>
                        <td class="text-dark fw-medium border-end-0 border-start-0 text-center">Remise</td>
                        <td class="text-dark text-end fw-medium border-start-0">-{{ number_format($invoice->discount_total, 2, ',', ' ') }} {{ $currency }}</td>
                    </tr>
                    @endif
                    @if($invoice->enable_tax)
                    <tr>
                        <td colspan="{{ $invoice->enable_tax ? 5 : 4 }}" class="border-end-0"></td>
                        <td class="text-dark fw-medium border-end-0 border-start-0 text-center">TVA</td>
                        <td class="text-dark text-end fw-medium border-start-0">{{ number_format($invoice->tax_total, 2, ',', ' ') }} {{ $currency }}</td>
                    </tr>
                    @endif
                    @if($invoice->round_off != 0)
                    <tr>
                        <td colspan="{{ $invoice->enable_tax ? 5 : 4 }}" class="border-end-0"></td>
                        <td class="text-dark fw-medium border-end-0 border-start-0 text-center">Arrondi</td>
                        <td class="text-dark text-end fw-medium border-start-0">{{ number_format($invoice->round_off, 2, ',', ' ') }} {{ $currency }}</td>
                    </tr>
                    @endif
                    <tr>
                        <td colspan="{{ $invoice->enable_tax ? 4 : 3 }}" class="border-end-0"></td>
                        <td colspan="2" class="text-dark fw-medium border-end-0 border-start-0 text-center"><h6>Total TTC</h6></td>
                        <td class="text-dark text-end fw-medium border-start-0"><h6>{{ number_format($invoice->total, 2, ',', ' ') }} {{ $currency }}</h6></td>
                    </tr>
                </tbody>
            </table>  <!-- end table -->
        </div>

        {{-- Charges --}}
        @if($invoice->charges->count())
        <div class="table-responsive">
            <table class="table table-nowrap table-bordered">
                <thead class="thead-light">
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
        <div class="table-responsive">
            <table class="table table-nowrap table-bordered">
                <tbody>
                    <tr>
                        <td colspan="4" class="border-end-0"></td>
                        <td class="text-dark fw-medium border-end-0 border-start-0 text-center">Montant payé</td>
                        <td class="text-dark text-end fw-medium border-start-0">{{ number_format($invoice->amount_paid, 2, ',', ' ') }} {{ $currency }}</td>
                    </tr>
                    <tr>
                        <td colspan="4" class="border-end-0"></td>
                        <td class="text-dark fw-medium border-end-0 border-start-0 text-center"><h6>Solde dû</h6></td>
                        <td class="text-dark text-end fw-medium border-start-0"><h6>{{ number_format($invoice->amount_due, 2, ',', ' ') }} {{ $currency }}</h6></td>
                    </tr>
                </tbody>
            </table>
        </div>
        @endif

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
                        @if(!empty($bank['bank_name']))<p class="mb-1">Banque : <span class="text-dark">{{ $bank['bank_name'] }}</span></p>@endif
                        @if(!empty($bank['account_name']))<p class="mb-0">Titulaire : <span class="text-dark">{{ $bank['account_name'] }}</span></p>@endif
                    </div>
                    <div>
                        @if(!empty($bank['rib']))<p class="mb-1">RIB : <span class="text-dark">{{ $bank['rib'] }}</span></p>@endif
                        @if(!empty($bank['iban']))<p class="mb-1">IBAN : <span class="text-dark">{{ $bank['iban'] }}</span></p>@endif
                        @if(!empty($bank['swift']))<p class="mb-0">SWIFT : <span class="text-dark">{{ $bank['swift'] }}</span></p>@endif
                    </div>
                </div>
            </div>
            @endif
            <div class="text-center border-start p-3">
                <p class="mb-1">Pour {{ $company['company_name'] ?? $tenant?->name ?? '' }}</p>
                @include('pdf.partials.signature')
            </div>
        </div>
        <div class="border border-top-0">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-6 d-flex">
                    <div class="p-3 flex-fill">
                        <span class="d-block mb-1">Notes :</span>
                        @if($invoice->notes)
                            <p class="text-dark">{{ $invoice->notes }}</p>
                        @else
                            <p class="text-dark">Merci pour votre confiance</p>
                        @endif
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

</body>
</html>
