<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Avoir {{ $creditNote->number }}</title>
    @php
        $brandColor = $settings?->company_settings['brand_color'] ?? '#2c3e50';
        $accentColor = '#e67e22';
        $company = $settings?->company_settings ?? [];
    @endphp
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: DejaVu Sans, sans-serif; font-size: 11px; color: #333; line-height: 1.5; }
        .page { padding: 0; }

        /* ── Top band ────────────────────────────────────────── */
        .top-band {
            background: {{ $brandColor }};
            padding: 25px 40px;
            position: relative;
        }
        .top-band-table { width: 100%; }
        .top-band-table td { vertical-align: middle; }
        .top-band .doc-title {
            font-size: 28px;
            font-weight: bold;
            color: #ffffff;
            letter-spacing: 4px;
            text-transform: uppercase;
        }
        .top-band .doc-number {
            font-size: 12px;
            color: rgba(255,255,255,0.7);
            margin-top: 4px;
            letter-spacing: 1px;
        }
        .logo-box {
            text-align: right;
        }
        .logo-box img {
            height: 45px;
        }
        .logo-box .logo-text {
            color: #ffffff;
            font-size: 16px;
            font-weight: bold;
            letter-spacing: 1px;
            border: 2px solid rgba(255,255,255,0.5);
            padding: 8px 16px;
            display: inline-block;
        }

        /* ── Content ─────────────────────────────────────────── */
        .content { padding: 25px 40px 30px 40px; }

        /* ── Company + Meta row ──────────────────────────────── */
        .info-row { width: 100%; margin-bottom: 22px; }
        .info-row td { vertical-align: top; }
        .company-name { font-size: 13px; font-weight: bold; color: {{ $brandColor }}; margin-bottom: 3px; }
        .company-detail { font-size: 9px; color: #666; line-height: 1.8; }

        /* ── Meta card ───────────────────────────────────────── */
        .meta-card {
            border: 1px solid #ddd;
            border-top: 3px solid {{ $accentColor }};
            padding: 12px 15px;
        }
        .meta-card table { width: 100%; border-collapse: collapse; }
        .meta-card td { font-size: 10px; padding: 3px 0; }
        .meta-card td.m-label {
            font-weight: bold;
            color: {{ $brandColor }};
            text-transform: uppercase;
            letter-spacing: 0.4px;
            width: 50%;
        }
        .meta-card td.m-value { text-align: right; color: #444; }

        /* ── Accent bar ──────────────────────────────────────── */
        .accent-bar {
            height: 3px;
            background: {{ $accentColor }};
            margin: 18px 0;
        }

        /* ── Billing section ─────────────────────────────────── */
        .billing-table { width: 100%; margin-bottom: 22px; }
        .billing-table td { vertical-align: top; font-size: 10px; line-height: 1.8; }
        .billing-label {
            font-size: 9px;
            font-weight: bold;
            color: {{ $accentColor }};
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 5px;
            padding-bottom: 3px;
            border-bottom: 1px solid #eee;
        }
        .billing-name { font-size: 12px; font-weight: bold; color: #222; margin: 4px 0 2px; }

        /* ── Items table ─────────────────────────────────────── */
        .items-table { width: 100%; border-collapse: collapse; margin-bottom: 5px; }
        .items-table th {
            background: {{ $brandColor }};
            color: #ffffff;
            padding: 9px 10px;
            font-size: 9px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .items-table th:first-child { text-align: left; }
        .items-table td {
            padding: 9px 10px;
            font-size: 10px;
            border-bottom: 1px solid #eee;
        }
        .items-table tbody tr:nth-child(even) td { background: #fafafa; }
        .items-table tbody tr:last-child td { border-bottom: none; }
        .text-right { text-align: right; }
        .text-center { text-align: center; }

        /* ── Totals ──────────────────────────────────────────── */
        .totals-wrapper { width: 100%; margin-bottom: 5px; }
        .totals-table { width: 280px; margin-left: auto; border-collapse: collapse; }
        .totals-table td { padding: 5px 10px; font-size: 10px; }
        .totals-table td.t-label { color: #666; text-align: left; }
        .totals-table td.t-value { text-align: right; color: #333; }
        .totals-table .sep-row td { border-top: 1px solid #ddd; }

        /* ── Grand total ─────────────────────────────────────── */
        .grand-total-bar {
            background: {{ $brandColor }};
            padding: 10px 15px;
            margin-bottom: 15px;
        }
        .grand-total-bar table { width: 100%; }
        .grand-total-bar td { vertical-align: middle; }
        .grand-total-bar .gt-label {
            font-size: 14px;
            font-weight: bold;
            color: #ffffff;
            letter-spacing: 2px;
            text-transform: uppercase;
        }
        .grand-total-bar .gt-value {
            font-size: 18px;
            font-weight: bold;
            color: {{ $accentColor }};
            text-align: right;
        }

        /* ── Footer ──────────────────────────────────────────── */
        .footer-section { margin-top: 30px; }
        .footer-divider {
            height: 1px;
            background: #ddd;
            margin-bottom: 15px;
        }
        .footer-table { width: 100%; }
        .footer-table td { vertical-align: top; font-size: 10px; line-height: 1.8; color: #555; }
        .footer-title {
            font-size: 9px;
            font-weight: bold;
            color: {{ $brandColor }};
            text-transform: uppercase;
            letter-spacing: 0.8px;
            margin-bottom: 5px;
        }

        /* ── Legal ───────────────────────────────────────────── */
        .legal-bar {
            background: {{ $brandColor }};
            padding: 8px 40px;
            margin-top: 20px;
            font-size: 7px;
            color: rgba(255,255,255,0.7);
            text-align: center;
            letter-spacing: 0.3px;
        }
    </style>
</head>
<body>
<div class="page">

    {{-- ─── Top colored band ─────────────────────────────────────── --}}
    <div class="top-band">
        <table class="top-band-table">
            <tr>
                <td style="width: 65%;">
                    <div class="doc-title">Avoir</div>
                    <div class="doc-number">N° {{ $creditNote->number }}</div>
                </td>
                <td style="width: 35%;">
                    <div class="logo-box">
                        @if($tenant)
                            @php $logoPath = $tenant->getFirstMediaPath('logo'); @endphp
                            @if($logoPath && file_exists($logoPath))
                                <img src="{{ $logoPath }}" alt="logo">
                            @else
                                <span class="logo-text">LOGO</span>
                            @endif
                        @else
                            <span class="logo-text">LOGO</span>
                        @endif
                    </div>
                </td>
            </tr>
        </table>
    </div>

    <div class="content">

        {{-- ─── Company info + Meta card ─────────────────────────── --}}
        <table class="info-row">
            <tr>
                <td style="width: 55%;">
                    <div class="company-name">{{ $company['company_name'] ?? $tenant?->name ?? '' }}</div>
                    <div class="company-detail">
                        @if(!empty($company['address'])) {{ $company['address'] }}<br> @endif
                        @if(!empty($company['postal_code'])) {{ $company['postal_code'] }} @endif
                        @if(!empty($company['city'])) {{ $company['city'] }} @endif
                        @if(!empty($company['country'])) <br>{{ $company['country'] }} @endif
                        @if(!empty($company['phone'])) <br>Tél : {{ $company['phone'] }} @endif
                        @if(!empty($company['email'])) <br>{{ $company['email'] }} @endif
                    </div>
                </td>
                <td style="width: 45%;">
                    <div class="meta-card">
                        <table>
                            <tr>
                                <td class="m-label">Avoir n°</td>
                                <td class="m-value">{{ $creditNote->number }}</td>
                            </tr>
                            <tr>
                                <td class="m-label">Date</td>
                                <td class="m-value">{{ $creditNote->issue_date?->format('d/m/Y') }}</td>
                            </tr>
                            @if($creditNote->reference_number)
                            <tr>
                                <td class="m-label">Référence</td>
                                <td class="m-value">{{ $creditNote->reference_number }}</td>
                            </tr>
                            @endif
                            @if($creditNote->invoice)
                            <tr>
                                <td class="m-label">Facture liée</td>
                                <td class="m-value">{{ $creditNote->invoice->number }}</td>
                            </tr>
                            @endif
                        </table>
                    </div>
                </td>
            </tr>
        </table>

        <div class="accent-bar"></div>

        {{-- ─── Client ─────────────────────────────────────────────── --}}
        <table class="billing-table">
            <tr>
                <td style="width: 50%;">
                    <div class="billing-label">Client</div>
                    <div class="billing-name">{{ $creditNote->customer?->name ?? '' }}</div>
                    @if($creditNote->customer?->email) {{ $creditNote->customer->email }}<br> @endif
                    @if($creditNote->customer?->phone) {{ $creditNote->customer->phone }}<br> @endif
                    @if($creditNote->customer?->tax_id) IF : {{ $creditNote->customer->tax_id }} @endif
                </td>
                <td style="width: 50%;"></td>
            </tr>
        </table>

        {{-- ─── Items table ──────────────────────────────────────── --}}
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
                            <br><span style="color: #999; font-size: 9px;">{{ $item->description }}</span>
                        @endif
                    </td>
                    <td class="text-right">{{ number_format($item->unit_price, 2, ',', ' ') }}</td>
                    <td class="text-right">{{ number_format($item->line_total, 2, ',', ' ') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{-- ─── Subtotals ────────────────────────────────────────── --}}
        <div class="totals-wrapper">
            <table class="totals-table">
                <tr>
                    <td class="t-label">Total HT</td>
                    <td class="t-value">{{ number_format($creditNote->subtotal, 2, ',', ' ') }}</td>
                </tr>
                @if($creditNote->enable_tax)
                <tr>
                    <td class="t-label">TVA {{ number_format($creditNote->items->first()?->tax_rate ?? 20, 1) }}%</td>
                    <td class="t-value">{{ number_format($creditNote->tax_total, 2, ',', ' ') }}</td>
                </tr>
                @endif
                @if($creditNote->round_off != 0)
                <tr>
                    <td class="t-label">Arrondi</td>
                    <td class="t-value">{{ number_format($creditNote->round_off, 2, ',', ' ') }}</td>
                </tr>
                @endif
            </table>
        </div>

        {{-- ─── Grand total bar ──────────────────────────────────── --}}
        <div class="grand-total-bar">
            <table>
                <tr>
                    <td style="width: 50%;">
                        <span class="gt-label">Total Avoir</span>
                    </td>
                    <td style="width: 50%;">
                        <span class="gt-value">{{ number_format($creditNote->total, 2, ',', ' ') }} {{ $currency }}</span>
                    </td>
                </tr>
            </table>
        </div>

        {{-- ─── Signature ────────────────────────────────────────── --}}
        @include('pdf.partials.signature')

        {{-- ─── Footer ───────────────────────────────────────────── --}}
        @if($creditNote->notes)
        <div class="footer-section">
            <div class="footer-divider"></div>
            <table class="footer-table">
                <tr>
                    <td style="width: 100%;">
                        <div class="footer-title">Notes</div>
                        {!! nl2br(e($creditNote->notes)) !!}
                    </td>
                </tr>
            </table>
        </div>
        @endif

    </div>{{-- /content --}}

    {{-- ─── Legal footer bar ─────────────────────────────────────── --}}
    @if(!empty($company['forme_juridique']) || !empty($company['tax_id']) || !empty($company['ice']) || !empty($company['rc']))
    <div class="legal-bar">
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
