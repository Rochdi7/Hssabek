<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Facture {{ $invoice->number }}</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: DejaVu Sans, sans-serif; font-size: 11px; color: #333; line-height: 1.5; }
        .page { padding: 30px 40px; }

        /* Header */
        .header-table { width: 100%; margin-bottom: 30px; }
        .header-table td { vertical-align: top; }
        .company-name { font-size: 20px; font-weight: bold; margin-bottom: 6px; }
        .company-detail { font-size: 10px; color: #333; line-height: 1.6; }
        .doc-title { font-size: 24px; font-weight: bold; text-align: right; }

        /* Info block: Facturé à / Envoyé à / Meta */
        .info-table { width: 100%; margin-bottom: 30px; }
        .info-table td { vertical-align: top; font-size: 10px; line-height: 1.7; }
        .info-label { font-weight: bold; font-size: 11px; margin-bottom: 4px; }
        .meta-table { width: 100%; }
        .meta-table td { font-size: 10px; padding: 1px 0; }
        .meta-table td:first-child { font-weight: bold; text-align: left; padding-right: 10px; }
        .meta-table td:last-child { text-align: right; }

        /* Items table */
        .items-table { width: 100%; border-collapse: collapse; margin-bottom: 5px; }
        .items-table th {
            background: #e8d44d;
            color: #333;
            padding: 8px 10px;
            font-size: 10px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 0.3px;
            border: 1px solid #ccc;
        }
        .items-table td {
            padding: 8px 10px;
            border: 1px solid #ccc;
            font-size: 10px;
        }
        .text-right { text-align: right; }
        .text-center { text-align: center; }

        /* Totals inside table */
        .totals-row td {
            border: none !important;
            padding: 4px 10px;
            font-size: 10px;
        }
        .totals-row td.label-cell {
            text-align: right;
            font-weight: bold;
        }
        .totals-row td.value-cell {
            text-align: right;
        }
        .grand-total td {
            font-size: 16px;
            font-weight: bold;
            padding-top: 6px;
        }

        /* Footer */
        .footer-section { margin-top: 40px; position: relative; }
        .payment-conditions { font-size: 10px; line-height: 1.7; }
        .payment-conditions strong { font-size: 11px; }

        .separator { border: none; border-top: 1px solid #e9ecef; margin: 15px 0; }
    </style>
</head>
<body>
<div class="page">

    {{-- ─── Header: Company name + FACTURE ──────────────────────── --}}
    <table class="header-table">
        <tr>
            <td style="width: 60%;">
                @if($tenant)
                    @php
                        $logoPath = $tenant->getFirstMediaPath('logo');
                    @endphp
                    @if($logoPath && file_exists($logoPath))
                        <img src="{{ $logoPath }}" height="50" alt="logo" style="margin-bottom: 8px;"><br>
                    @endif
                @endif
                @php
                    $company = $settings?->company_settings ?? [];
                @endphp
                <div class="company-name">{{ $company['company_name'] ?? $tenant?->name ?? '' }}</div>
                <div class="company-detail">
                    @if(!empty($company['address'])) {{ $company['address'] }}<br> @endif
                    @if(!empty($company['postal_code'])) {{ $company['postal_code'] }} @endif
                    @if(!empty($company['city'])) {{ $company['city'] }} @endif
                    @if(!empty($company['country'])) <br>{{ $company['country'] }} @endif
                </div>
            </td>
            <td style="width: 40%;">
                <div class="doc-title">FACTURE</div>
            </td>
        </tr>
    </table>

    {{-- ─── Info block: Facturé à / Envoyé à / Meta ─────────────── --}}
    @php
        $billTo = $invoice->bill_to_snapshot ?? [];
        $shipTo = $invoice->ship_to_snapshot ?? [];
    @endphp
    <table class="info-table">
        <tr>
            <td style="width: 30%;">
                <div class="info-label">Facturé à</div>
                {{ $billTo['name'] ?? $invoice->customer?->name ?? '' }}<br>
                @if(!empty($billTo['address'])) {{ $billTo['address'] }}<br> @endif
                @if(!empty($billTo['postal_code'])) {{ $billTo['postal_code'] }} @endif
                @if(!empty($billTo['city'])) {{ $billTo['city'] }} @endif
            </td>
            <td style="width: 30%;">
                <div class="info-label">Envoyé à</div>
                @if(!empty($shipTo))
                    {{ $shipTo['name'] ?? $billTo['name'] ?? $invoice->customer?->name ?? '' }}<br>
                    @if(!empty($shipTo['address'])) {{ $shipTo['address'] }}<br> @endif
                    @if(!empty($shipTo['postal_code'])) {{ $shipTo['postal_code'] }} @endif
                    @if(!empty($shipTo['city'])) {{ $shipTo['city'] }} @endif
                @else
                    {{ $billTo['name'] ?? $invoice->customer?->name ?? '' }}<br>
                    @if(!empty($billTo['address'])) {{ $billTo['address'] }}<br> @endif
                    @if(!empty($billTo['postal_code'])) {{ $billTo['postal_code'] }} @endif
                    @if(!empty($billTo['city'])) {{ $billTo['city'] }} @endif
                @endif
            </td>
            <td style="width: 40%;">
                <table class="meta-table">
                    <tr>
                        <td>Facture n°</td>
                        <td>{{ $invoice->number }}</td>
                    </tr>
                    <tr>
                        <td>Date</td>
                        <td>{{ $invoice->issue_date?->format('d/m/Y') }}</td>
                    </tr>
                    @if($invoice->reference_number)
                    <tr>
                        <td>Commande n°</td>
                        <td>{{ $invoice->reference_number }}</td>
                    </tr>
                    @endif
                    <tr>
                        <td>Échéance</td>
                        <td>{{ $invoice->due_date?->format('d/m/Y') }}</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    {{-- ─── Items table ──────────────────────────────────────────── --}}
    <table class="items-table">
        <thead>
            <tr>
                <th style="width: 8%;">QTÉ</th>
                <th style="width: 42%;">DÉSIGNATION</th>
                <th class="text-right" style="width: 25%;">PRIX UNIT. HT</th>
                <th class="text-right" style="width: 25%;">MONTANT HT</th>
            </tr>
        </thead>
        <tbody>
            @foreach($invoice->items->sortBy('position') as $index => $item)
            <tr>
                <td class="text-center">{{ rtrim(rtrim(number_format($item->quantity, 3, ',', ' '), '0'), ',') }}</td>
                <td>
                    {{ $item->label }}
                    @if($item->description)
                        <br><span style="color: #888; font-size: 9px;">{{ $item->description }}</span>
                    @endif
                </td>
                <td class="text-right">{{ number_format($item->unit_price, 2, ',', ' ') }}</td>
                <td class="text-right">{{ number_format($item->line_subtotal, 2, ',', ' ') }}</td>
            </tr>
            @endforeach

            {{-- ─── Charges (if any) ─────────────────────────────── --}}
            @if($invoice->charges->count())
                @foreach($invoice->charges->sortBy('position') as $charge)
                <tr>
                    <td class="text-center"></td>
                    <td>{{ $charge->label }} <span style="color: #888; font-size: 9px;">(frais)</span></td>
                    <td class="text-right"></td>
                    <td class="text-right">{{ number_format($charge->amount, 2, ',', ' ') }}</td>
                </tr>
                @endforeach
            @endif

            {{-- ─── Totals rows ──────────────────────────────────── --}}
            <tr class="totals-row">
                <td colspan="2"></td>
                <td class="label-cell">Total HT</td>
                <td class="value-cell">{{ number_format($invoice->subtotal, 2, ',', ' ') }}</td>
            </tr>
            @if($invoice->discount_total > 0)
            <tr class="totals-row">
                <td colspan="2"></td>
                <td class="label-cell">Remise</td>
                <td class="value-cell">-{{ number_format($invoice->discount_total, 2, ',', ' ') }}</td>
            </tr>
            @endif
            @if($invoice->enable_tax)
            <tr class="totals-row">
                <td colspan="2"></td>
                <td class="label-cell">TVA {{ number_format($invoice->items->first()?->tax_rate ?? 20, 1) }}%</td>
                <td class="value-cell">{{ number_format($invoice->tax_total, 2, ',', ' ') }}</td>
            </tr>
            @endif
            @if($invoice->round_off != 0)
            <tr class="totals-row">
                <td colspan="2"></td>
                <td class="label-cell">Arrondi</td>
                <td class="value-cell">{{ number_format($invoice->round_off, 2, ',', ' ') }}</td>
            </tr>
            @endif
            <tr class="totals-row grand-total">
                <td colspan="2"></td>
                <td class="label-cell">TOTAL</td>
                <td class="value-cell">{{ number_format($invoice->total, 2, ',', ' ') }} {{ $currency }}</td>
            </tr>
            @if($invoice->amount_paid > 0)
            <tr class="totals-row">
                <td colspan="2"></td>
                <td class="label-cell">Montant payé</td>
                <td class="value-cell">{{ number_format($invoice->amount_paid, 2, ',', ' ') }} {{ $currency }}</td>
            </tr>
            <tr class="totals-row">
                <td colspan="2"></td>
                <td class="label-cell" style="font-size: 12px;">Solde dû</td>
                <td class="value-cell" style="font-size: 12px; font-weight: bold;">{{ number_format($invoice->amount_due, 2, ',', ' ') }} {{ $currency }}</td>
            </tr>
            @endif
        </tbody>
    </table>

    @if($invoice->total_in_words)
    <p style="font-size: 10px; color: #555; font-style: italic; margin: 10px 0 15px;">
        Arrêtée la présente facture à la somme de : <strong>{{ $invoice->total_in_words }}</strong>
    </p>
    @endif

    {{-- ─── Signature ────────────────────────────────────────────── --}}
    @include('pdf.partials.signature')

    {{-- ─── Footer: Payment conditions & Bank details ────────────── --}}
    @php $bank = $invoice->bank_details_snapshot ?? []; @endphp
    <div class="footer-section">
        <hr class="separator">

        {{-- Notes & Terms --}}
        @if($invoice->notes || $invoice->terms)
        <div class="payment-conditions">
            @if($invoice->notes)
                <strong>Notes :</strong><br>
                {!! nl2br(e($invoice->notes)) !!}<br><br>
            @endif
            @if($invoice->terms)
                <strong>Conditions et modalités de paiement</strong><br>
                {!! nl2br(e($invoice->terms)) !!}
            @endif
        </div>
        @endif

        {{-- Bank details --}}
        @if(!empty($bank))
        <div class="payment-conditions" style="margin-top: 10px;">
            @if(empty($invoice->terms) && empty($invoice->notes))
                <strong>Conditions et modalités de paiement</strong><br>
            @endif
            @if(!empty($bank['bank_name'])) {{ $bank['bank_name'] }}<br> @endif
            @if(!empty($bank['iban'])) IBAN : {{ $bank['iban'] }}<br> @endif
            @if(!empty($bank['swift'])) SWIFT/BIC : {{ $bank['swift'] }}<br> @endif
            @if(!empty($bank['rib'])) RIB : {{ $bank['rib'] }}<br> @endif
            @if(!empty($bank['account_name'])) Titulaire : {{ $bank['account_name'] }} @endif
        </div>
        @endif
    </div>

    {{-- ─── Legal info footer ────────────────────────────────────── --}}
    @if(!empty($company['forme_juridique']) || !empty($company['tax_id']) || !empty($company['ice']) || !empty($company['rc']))
    <div style="margin-top: 15px; font-size: 8px; color: #888; text-align: center; border-top: 1px solid #e9ecef; padding-top: 8px;">
        @php $formeLabels = ['sarl'=>'SARL','sarl_au'=>'SARL AU','sa'=>'SA','snc'=>'SNC','scs'=>'SCS','sca'=>'SCA','auto_entrepreneur'=>'Auto-Entrepreneur','ei'=>'Entreprise Individuelle','cooperative'=>'Coopérative']; @endphp
        @if(!empty($company['forme_juridique'])) {{ $formeLabels[$company['forme_juridique']] ?? strtoupper($company['forme_juridique']) }} @endif
        @if(!empty($company['capital_social'])) au capital de {{ number_format($company['capital_social'], 2, ',', ' ') }} DH @endif
        @if(!empty($company['tax_id'])) — IF : {{ $company['tax_id'] }} @endif
        @if(!empty($company['ice'])) — ICE : {{ $company['ice'] }} @endif
        @if(!empty($company['rc'])) — RC : {{ $company['rc'] }} @endif
        @if(!empty($company['cnss'])) — CNSS : {{ $company['cnss'] }} @endif
        @if(!empty($company['patente'])) — Patente : {{ $company['patente'] }} @endif
    </div>
    @endif

</div>
</body>
</html>
