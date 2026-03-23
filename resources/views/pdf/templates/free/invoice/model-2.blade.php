<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Facture {{ $invoice->number }}</title>
    @php
        $brandColor = $settings?->company_settings['brand_color'] ?? '#1e3a5f';
        $accentColor = '#d4453b';
        $company = $settings?->company_settings ?? [];
    @endphp
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: DejaVu Sans, sans-serif; font-size: 11px; color: #333; line-height: 1.6; }
        .page { padding: 30px 40px; }

        /* ── Header ───────────────────────────────────────────── */
        .header-table { width: 100%; margin-bottom: 25px; }
        .header-table td { vertical-align: top; }
        .doc-title {
            font-size: 36px;
            font-weight: bold;
            color: {{ $brandColor }};
            letter-spacing: 3px;
            font-style: italic;
            margin-bottom: 15px;
        }
        .company-name { font-size: 12px; font-weight: bold; color: #333; margin-bottom: 2px; }
        .company-detail { font-size: 10px; color: #555; line-height: 1.7; }
        .logo-circle {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            background: {{ $accentColor }};
            display: inline-block;
            text-align: center;
            line-height: 70px;
            overflow: hidden;
        }
        .logo-circle img {
            height: 40px;
            vertical-align: middle;
        }
        .logo-placeholder {
            color: #ffffff;
            font-size: 14px;
            font-weight: bold;
            letter-spacing: 1px;
        }

        /* ── Info section (Facturé à / Envoyé à / Meta) ───────── */
        .info-table { width: 100%; margin-bottom: 25px; border-top: 2px solid {{ $brandColor }}; padding-top: 12px; }
        .info-table td { vertical-align: top; font-size: 10px; line-height: 1.8; }
        .info-label {
            font-weight: bold;
            font-size: 10px;
            color: {{ $brandColor }};
            text-transform: uppercase;
            letter-spacing: 0.8px;
            margin-bottom: 5px;
        }
        .meta-table { width: 100%; }
        .meta-table td { font-size: 10px; padding: 2px 0; }
        .meta-table td.meta-label {
            font-weight: bold;
            color: {{ $brandColor }};
            text-transform: uppercase;
            letter-spacing: 0.5px;
            text-align: left;
            padding-right: 8px;
        }
        .meta-table td.meta-value {
            text-align: right;
            color: #333;
        }

        /* ── Items table ──────────────────────────────────────── */
        .items-table { width: 100%; border-collapse: collapse; margin-bottom: 5px; }
        .items-table th {
            color: {{ $brandColor }};
            padding: 10px 10px;
            font-size: 10px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 0.4px;
            border-top: 2px solid {{ $brandColor }};
            border-bottom: 2px solid {{ $accentColor }};
        }
        .items-table th:first-child { text-align: left; }
        .items-table td {
            padding: 10px 10px;
            font-size: 10px;
            border-bottom: 1px solid #e9ecef;
        }
        .items-table tbody tr:last-child td { border-bottom: none; }
        .text-right { text-align: right; }
        .text-center { text-align: center; }

        /* ── Totals ───────────────────────────────────────────── */
        .totals-row td {
            border: none !important;
            padding: 4px 10px;
            font-size: 10px;
        }
        .totals-row td.label-cell {
            text-align: right;
            font-weight: bold;
            color: #555;
        }
        .totals-row td.value-cell {
            text-align: right;
            color: #333;
        }
        .grand-total td {
            font-size: 16px;
            font-weight: bold;
            padding-top: 8px;
        }
        .grand-total td.label-cell { color: {{ $brandColor }}; }
        .grand-total td.value-cell { color: {{ $accentColor }}; }

        /* ── Footer ───────────────────────────────────────────── */
        .footer-table { width: 100%; margin-top: 40px; }
        .footer-table td { vertical-align: top; }
        .merci-text {
            font-size: 36px;
            font-weight: bold;
            font-style: italic;
            color: {{ $brandColor }};
        }
        .conditions-box {
            border-left: 3px solid {{ $accentColor }};
            padding-left: 12px;
        }
        .conditions-title {
            font-size: 10px;
            font-weight: bold;
            color: {{ $accentColor }};
            text-transform: uppercase;
            letter-spacing: 0.8px;
            margin-bottom: 6px;
        }
        .conditions-detail {
            font-size: 10px;
            color: #555;
            line-height: 1.8;
        }
    </style>
</head>
<body>
<div class="page">

    {{-- ─── Header: FACTURE title + Logo ─────────────────────────── --}}
    <table class="header-table">
        <tr>
            <td style="width: 70%;">
                <div class="doc-title">FACTURE</div>
                @php
                    $company = $settings?->company_settings ?? [];
                @endphp
                <div class="company-name">{{ $company['company_name'] ?? $tenant?->name ?? '' }}</div>
                <div class="company-detail">
                    @if(!empty($company['address'])) {{ $company['address'] }}<br> @endif
                    @if(!empty($company['postal_code'])) {{ $company['postal_code'] }} @endif
                    @if(!empty($company['city'])) {{ $company['city'] }} @endif
                </div>
            </td>
            <td style="width: 30%; text-align: right;">
                @if($tenant)
                    @php $logoPath = $tenant->getFirstMediaPath('logo'); @endphp
                    @if($logoPath && file_exists($logoPath))
                        <div class="logo-circle">
                            <img src="{{ $logoPath }}" alt="logo">
                        </div>
                    @else
                        <div class="logo-circle">
                            <span class="logo-placeholder">LOGO</span>
                        </div>
                    @endif
                @else
                    <div class="logo-circle">
                        <span class="logo-placeholder">LOGO</span>
                    </div>
                @endif
            </td>
        </tr>
    </table>

    {{-- ─── Info block: Facturé à / Envoyé à / Meta ──────────────── --}}
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
                        <td class="meta-label">Facture n°</td>
                        <td class="meta-value">{{ $invoice->number }}</td>
                    </tr>
                    <tr>
                        <td class="meta-label">Date</td>
                        <td class="meta-value">{{ $invoice->issue_date?->format('d/m/Y') }}</td>
                    </tr>
                    @if($invoice->reference_number)
                    <tr>
                        <td class="meta-label">Commande n°</td>
                        <td class="meta-value">{{ $invoice->reference_number }}</td>
                    </tr>
                    @endif
                    <tr>
                        <td class="meta-label">Échéance</td>
                        <td class="meta-value">{{ $invoice->due_date?->format('d/m/Y') }}</td>
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

    {{-- ─── Footer: Merci + Conditions + Bank ────────────────────── --}}
    @php $bank = $invoice->bank_details_snapshot ?? []; @endphp
    <table class="footer-table">
        <tr>
            <td style="width: 35%; vertical-align: bottom;">
                <div class="merci-text">Merci</div>
            </td>
            <td style="width: 65%;">
                <div class="conditions-box">
                    @if($invoice->terms || $invoice->notes || !empty($bank))
                        <div class="conditions-title">Conditions et modalités de paiement</div>
                        <div class="conditions-detail">
                            @if($invoice->notes)
                                {!! nl2br(e($invoice->notes)) !!}<br>
                            @endif
                            @if($invoice->terms)
                                {!! nl2br(e($invoice->terms)) !!}<br>
                            @endif
                            <br>
                            @if(!empty($bank))
                                @if(!empty($bank['bank_name'])) {{ $bank['bank_name'] }}<br> @endif
                                @if(!empty($bank['iban'])) IBAN : {{ $bank['iban'] }}<br> @endif
                                @if(!empty($bank['swift'])) SWIFT/BIC : {{ $bank['swift'] }}<br> @endif
                                @if(!empty($bank['rib'])) RIB : {{ $bank['rib'] }}<br> @endif
                                @if(!empty($bank['account_name'])) Titulaire : {{ $bank['account_name'] }} @endif
                            @endif
                        </div>
                    @endif
                </div>
            </td>
        </tr>
    </table>

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
