<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Avoir {{ $creditNote->number }}</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: DejaVu Sans, sans-serif; font-size: 11px; color: #222; line-height: 1.5; }
        .page { padding: 30px 40px; }

        /* ── Hatching decoration ─────────────────────────────── */
        .hatching {
            width: 200px;
            height: 20px;
            margin-bottom: 5px;
            background: repeating-linear-gradient(
                -45deg,
                #222,
                #222 1px,
                transparent 1px,
                transparent 5px
            );
        }

        /* ── Header ──────────────────────────────────────────── */
        .header-table { width: 100%; margin-bottom: 20px; }
        .header-table td { vertical-align: top; }
        .doc-title {
            font-size: 36px;
            font-weight: bold;
            font-style: italic;
            color: #222;
            margin-bottom: 10px;
        }
        .logo-circle {
            width: 65px;
            height: 65px;
            border-radius: 50%;
            background: #666;
            display: inline-block;
            text-align: center;
            line-height: 65px;
            overflow: hidden;
        }
        .logo-circle img {
            height: 38px;
            vertical-align: middle;
        }
        .logo-placeholder {
            color: #ffffff;
            font-size: 13px;
            font-weight: bold;
            letter-spacing: 1px;
        }

        /* ── Info section ────────────────────────────────────── */
        .info-section { width: 100%; margin-bottom: 18px; }
        .info-section td { vertical-align: top; font-size: 10px; line-height: 1.7; }
        .info-label {
            font-weight: bold;
            font-size: 10px;
            color: #222;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 4px;
        }
        .company-name { font-size: 12px; font-weight: bold; color: #222; margin-bottom: 2px; }
        .company-detail { font-size: 10px; color: #444; line-height: 1.7; }

        /* ── Meta table ──────────────────────────────────────── */
        .meta-table { width: 100%; }
        .meta-table td { font-size: 11px; padding: 2px 0; }
        .meta-table td.meta-label {
            font-weight: bold;
            color: #222;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            text-align: right;
            padding-right: 12px;
        }
        .meta-table td.meta-value {
            text-align: right;
            color: #444;
        }

        /* ── Billing info ────────────────────────────────────── */
        .billing-table { width: 100%; margin-bottom: 20px; }
        .billing-table td { vertical-align: top; font-size: 10px; line-height: 1.8; }

        /* ── Items table ─────────────────────────────────────── */
        .items-table { width: 100%; border-collapse: collapse; margin-bottom: 5px; }
        .items-table th {
            padding: 8px 10px;
            font-size: 10px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 0.3px;
            color: #222;
            background: none;
            border-top: 2px solid #222;
            border-bottom: 1px solid #222;
        }
        .items-table th:first-child { text-align: left; }
        .items-table td {
            padding: 8px 10px;
            font-size: 10px;
            border-bottom: 1px solid #ddd;
        }
        .items-table tbody tr:last-child td {
            border-bottom: 2px solid #222;
        }
        .text-right { text-align: right; }
        .text-center { text-align: center; }

        /* ── Totals ──────────────────────────────────────────── */
        .totals-row td {
            border: none !important;
            padding: 4px 10px;
            font-size: 10px;
        }
        .totals-row td.label-cell {
            text-align: right;
            font-weight: bold;
            color: #444;
        }
        .totals-row td.value-cell {
            text-align: right;
            color: #222;
        }

        /* ── Grand total bar ─────────────────────────────────── */
        .total-bar {
            width: 100%;
            margin-top: 10px;
            margin-bottom: 20px;
        }
        .total-bar-inner {
            border: 2px solid #222;
            padding: 10px 15px;
        }
        .total-bar-table { width: 100%; }
        .total-bar-table td { vertical-align: middle; }
        .total-label {
            font-size: 18px;
            font-weight: bold;
            color: #222;
            letter-spacing: 2px;
        }
        .total-value {
            font-size: 18px;
            font-weight: bold;
            color: #222;
            text-align: right;
        }

        /* ── Footer ──────────────────────────────────────────── */
        .conditions-title {
            font-size: 11px;
            font-weight: bold;
            color: #222;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            margin-bottom: 8px;
        }
        .conditions-detail {
            font-size: 10px;
            color: #444;
            line-height: 1.8;
        }
    </style>
</head>
<body>
<div class="page">

    {{-- ─── Hatching decoration + Title + Logo ───────────────────── --}}
    <table class="header-table">
        <tr>
            <td style="width: 70%;">
                <div class="hatching"></div>
                <div class="doc-title">avoir</div>
            </td>
            <td style="width: 30%; text-align: right;">
                @if($tenant)
                    @php $logoPath = $tenant->getFirstMediaPath('logo'); @endphp
                    @if($logoPath && file_exists($logoPath))
                        <div class="logo-circle">
                            <img src="{{ $logoPath }}" alt="logo">
                        </div>
                    @else
                        <div class="logo-circle" style="float: right;">
                            <span class="logo-placeholder">LOGO</span>
                        </div>
                    @endif
                @else
                    <div class="logo-circle" style="float: right;">
                        <span class="logo-placeholder">LOGO</span>
                    </div>
                @endif
            </td>
        </tr>
    </table>

    {{-- ─── DE (company) + Meta ──────────────────────────────────── --}}
    @php
        $company = $settings?->company_settings ?? [];
    @endphp
    <table class="info-section">
        <tr>
            <td style="width: 50%;">
                <div class="info-label">DE</div>
                <div class="company-name">{{ $company['company_name'] ?? $tenant?->name ?? '' }}</div>
                <div class="company-detail">
                    @if(!empty($company['address'])) {{ $company['address'] }}<br> @endif
                    @if(!empty($company['postal_code'])) {{ $company['postal_code'] }} @endif
                    @if(!empty($company['city'])) {{ $company['city'] }} @endif
                </div>
            </td>
            <td style="width: 50%;">
                <table class="meta-table">
                    <tr>
                        <td class="meta-label">Avoir n°</td>
                        <td class="meta-value">{{ $creditNote->number }}</td>
                    </tr>
                    <tr>
                        <td class="meta-label">Date</td>
                        <td class="meta-value">{{ $creditNote->issue_date?->format('d/m/Y') }}</td>
                    </tr>
                    @if($creditNote->reference_number)
                    <tr>
                        <td class="meta-label">Référence</td>
                        <td class="meta-value">{{ $creditNote->reference_number }}</td>
                    </tr>
                    @endif
                    @if($creditNote->invoice)
                    <tr>
                        <td class="meta-label">Facture liée</td>
                        <td class="meta-value">{{ $creditNote->invoice->number }}</td>
                    </tr>
                    @endif
                </table>
            </td>
        </tr>
    </table>

    {{-- ─── Client ─────────────────────────────────────────────────── --}}
    <table class="billing-table">
        <tr>
            <td style="width: 50%;">
                <div class="info-label">Client</div>
                {{ $creditNote->customer?->name ?? '' }}<br>
                @if($creditNote->customer?->email) {{ $creditNote->customer->email }}<br> @endif
                @if($creditNote->customer?->phone) {{ $creditNote->customer->phone }}<br> @endif
                @if($creditNote->customer?->tax_id) IF : {{ $creditNote->customer->tax_id }} @endif
            </td>
            <td style="width: 50%;"></td>
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
            @foreach($creditNote->items as $item)
            <tr>
                <td class="text-center">{{ rtrim(rtrim(number_format($item->quantity, 3, ',', ' '), '0'), ',') }}</td>
                <td>
                    {{ $item->label }}
                    @if($item->description)
                        <br><span style="color: #777; font-size: 9px;">{{ $item->description }}</span>
                    @endif
                </td>
                <td class="text-right">{{ number_format($item->unit_price, 2, ',', ' ') }}</td>
                <td class="text-right">{{ number_format($item->line_total, 2, ',', ' ') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{-- ─── Subtotals (right-aligned, no borders) ────────────────── --}}
    <table style="width: 100%; margin-bottom: 0;">
        <tr class="totals-row">
            <td style="width: 50%;"></td>
            <td class="label-cell">Total HT</td>
            <td class="value-cell">{{ number_format($creditNote->subtotal, 2, ',', ' ') }}</td>
        </tr>
        @if($creditNote->enable_tax)
        <tr class="totals-row">
            <td></td>
            <td class="label-cell">TVA {{ number_format($creditNote->items->first()?->tax_rate ?? 20, 1) }}%</td>
            <td class="value-cell">{{ number_format($creditNote->tax_total, 2, ',', ' ') }}</td>
        </tr>
        @endif
        @if($creditNote->round_off != 0)
        <tr class="totals-row">
            <td></td>
            <td class="label-cell">Arrondi</td>
            <td class="value-cell">{{ number_format($creditNote->round_off, 2, ',', ' ') }}</td>
        </tr>
        @endif
    </table>

    {{-- ─── TOTAL bar (bordered box) ─────────────────────────────── --}}
    <div class="total-bar">
        <div class="total-bar-inner">
            <table class="total-bar-table">
                <tr>
                    <td style="width: 50%;">
                        <span class="total-label">TOTAL AVOIR</span>
                    </td>
                    <td style="width: 50%;">
                        <span class="total-value">{{ number_format($creditNote->total, 2, ',', ' ') }} {{ $currency }}</span>
                    </td>
                </tr>
            </table>
        </div>
    </div>

    {{-- ─── Signature ────────────────────────────────────────────── --}}
    @include('pdf.partials.signature')

    {{-- ─── Footer: Notes ──────────────────────────────────────── --}}
    @if($creditNote->notes)
    <div style="margin-top: 40px;">
        <div class="conditions-title">Notes</div>
        <div class="conditions-detail">
            {!! nl2br(e($creditNote->notes)) !!}
        </div>
    </div>
    @endif

    {{-- ─── Legal info footer ────────────────────────────────────── --}}
    @if(!empty($company['forme_juridique']) || !empty($company['tax_id']) || !empty($company['ice']) || !empty($company['rc']))
    <div style="margin-top: 15px; font-size: 8px; color: #888; text-align: center; border-top: 1px solid #ddd; padding-top: 8px;">
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
