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
        <div class="d-flex align-items-center justify-content-between border-bottom flex-wrap row-gap-3 mb-3 pb-3">
            <div>
                <div class="mb-1">
                    @if($tenant)
                        @php $logoPath = $tenant->getFirstMediaPath('logo'); @endphp
                        @if($logoPath && file_exists($logoPath))
                            <img src="{{ $logoPath }}" height="50" alt="logo">
                        @endif
                    @endif
                </div>
                <p>Original pour le destinataire</p>
            </div>
            <div>
                <h5 class="mb-1">FACTURE</h5>
                <div class="d-flex align-items-center">
                    <p class="mb-0 me-3">Date : <span class="text-dark"> {{ $invoice->issue_date?->format('d/m/Y') }}</span></p>
                    <p>N° Facture : <span class="text-dark"> {{ $invoice->number }}</span></p>
                </div>
                @if($invoice->due_date)
                <p class="mb-0">Échéance : <span class="text-dark">{{ $invoice->due_date?->format('d/m/Y') }}</span></p>
                @endif
                @if($invoice->reference_number)
                <p class="mb-0">Réf : <span class="text-dark">{{ $invoice->reference_number }}</span></p>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-lg-7">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <h6 class="fs-16 text-primary mb-2">Facturé à :</h6>
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
                        <div class="mb-3">
                            <h6 class="fs-16 text-primary mb-2">Payé à :</h6>
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
            <div class="col-lg-5">
                <div class="mb-3">
                    <h6 class="fs-16 text-primary mb-2">{{ $company['company_name'] ?? $tenant?->name ?? '' }}</h6>
                    <div>
                        @if(!empty($company['tax_id']))<p class="mb-1">IF : <span class="text-dark"> {{ $company['tax_id'] }}</span></p>@endif
                        @if(!empty($company['ice']))<p class="mb-1">ICE : <span class="text-dark"> {{ $company['ice'] }}</span></p>@endif
                        @if(!empty($company['rc']))<p class="mb-1">RC : <span class="text-dark"> {{ $company['rc'] }}</span></p>@endif
                        @if(!empty($company['cnss']))<p class="mb-1">CNSS : <span class="text-dark"> {{ $company['cnss'] }}</span></p>@endif
                        @if(!empty($company['patente']))<p class="mb-1">Patente : <span class="text-dark"> {{ $company['patente'] }}</span></p>@endif
                        @if(!empty($company['numero_ae']))<p class="mb-1">N° AE : <span class="text-dark"> {{ $company['numero_ae'] }}</span></p>@endif
                        @if(!empty($company['cin']))<p class="mb-1">CIN : <span class="text-dark"> {{ $company['cin'] }}</span></p>@endif
                        @if(!empty($company['address']))<p class="mb-1">Adresse : <span class="text-dark"> {{ $company['address'] }}@if(!empty($company['city'])), {{ $company['city'] }}@endif @if(!empty($company['postal_code'])) {{ $company['postal_code'] }}@endif @if(!empty($company['country'])) {{ $company['country'] }}@endif</span></p>@endif
                        @if(!empty($company['phone']))<p class="mb-0">Tél : <span class="text-dark"> {{ $company['phone'] }}</span></p>@endif
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
                        <td colspan="3" class="border-0"></td>
                        <td colspan="2" class="text-dark fw-medium border-0">Sous-total HT</td>
                        <td class="text-dark text-end fw-medium border-0">{{ number_format($invoice->subtotal, 2, ',', ' ') }} {{ $currency }}</td>
                    </tr>
                    @if($invoice->discount_total > 0)
                    <tr>
                        <td colspan="3"></td>
                        <td colspan="2" class="text-dark fw-medium">Remise</td>
                        <td class="text-dark text-end fw-medium">-{{ number_format($invoice->discount_total, 2, ',', ' ') }} {{ $currency }}</td>
                    </tr>
                    @endif
                    @if($invoice->enable_tax)
                    <tr>
                        <td colspan="3"></td>
                        <td colspan="2" class="text-dark fw-medium">TVA</td>
                        <td class="text-dark text-end fw-medium">{{ number_format($invoice->tax_total, 2, ',', ' ') }} {{ $currency }}</td>
                    </tr>
                    @endif
                    @if($invoice->round_off != 0)
                    <tr>
                        <td colspan="3"></td>
                        <td colspan="2" class="text-dark fw-medium">Arrondi</td>
                        <td class="text-dark text-end fw-medium">{{ number_format($invoice->round_off, 2, ',', ' ') }} {{ $currency }}</td>
                    </tr>
                    @endif
                    <tr>
                        <td colspan="3" class="text-dark">Total articles : {{ $invoice->items->count() }}</td>
                        <td colspan="2" class="text-dark fw-medium"><h6>Total TTC</h6></td>
                        <td class="text-dark text-end fw-medium"><h6>{{ number_format($invoice->total, 2, ',', ' ') }} {{ $currency }}</h6></td>
                    </tr>
                </tbody>
            </table>
        </div>  <!-- end table -->

        {{-- Charges --}}
        @if($invoice->charges->count())
        <div class="table-responsive mb-3">
            <table class="table">
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
        <div class="table-responsive mb-3">
            <table class="table">
                <tbody>
                    <tr>
                        <td colspan="4" class="border-0"></td>
                        <td colspan="2" class="text-dark fw-medium">Montant payé</td>
                        <td class="text-dark text-end fw-medium">{{ number_format($invoice->amount_paid, 2, ',', ' ') }} {{ $currency }}</td>
                    </tr>
                    <tr>
                        <td colspan="4" class="border-0"></td>
                        <td colspan="2" class="text-dark fw-medium"><h6>Solde dû</h6></td>
                        <td class="text-dark text-end fw-medium"><h6>{{ number_format($invoice->amount_due, 2, ',', ' ') }} {{ $currency }}</h6></td>
                    </tr>
                </tbody>
            </table>
        </div>
        @endif

        @if($invoice->total_in_words)
        <div class="py-3 border-bottom mb-3">
            <p class="text-dark">Arrêtée la présente facture à la somme de : {{ $invoice->total_in_words }}</p>
        </div>
        @endif
        <div class="d-flex align-items-center justify-content-between flex-wrap border-bottom mb-3">
            @if(!empty($bank))
            <div class="mb-3">
                <h6 class="mb-2">Coordonnées bancaires</h6>
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
        <div class="border-bottom pb-3">
            @if($invoice->notes)
                <p>{{ $invoice->notes }}</p>
            @else
                <p>Merci pour votre confiance</p>
            @endif
        </div>
    </div>

</body>
</html>
