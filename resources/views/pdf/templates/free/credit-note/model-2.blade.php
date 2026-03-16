<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Avoir {{ $creditNote->number }}</title>
    @php
        $brandColor = $settings?->company_settings['brand_color'] ?? '#2563eb';
        $company = $settings?->company_settings ?? [];
    @endphp
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: DejaVu Sans, sans-serif; font-size: 11px; color: #333; line-height: 1.6; }

        /* ── Left accent stripe ─────────────────────────────── */
        .page {
            padding: 0 0 30px 0;
            position: relative;
        }
        .left-stripe {
            position: fixed;
            left: 0;
            top: 0;
            bottom: 0;
            width: 6px;
            background: {{ $brandColor }};
        }

        /* ── Header bar ─────────────────────────────────────── */
        .header-bar {
            background: {{ $brandColor }};
            padding: 20px 40px 20px 46px;
            margin-bottom: 0;
        }
        .header-bar table { width: 100%; }
        .header-bar td { vertical-align: middle; }
        .header-bar .doc-title {
            font-size: 24px;
            font-weight: bold;
            color: #ffffff;
            text-align: right;
            letter-spacing: 1px;
        }
        .header-bar .company-name-white {
            font-size: 18px;
            font-weight: bold;
            color: #ffffff;
        }

        /* ── Content wrapper ────────────────────────────────── */
        .content { padding: 25px 40px 0 46px; }

        /* ── Company info ───────────────────────────────────── */
        .info-row { width: 100%; margin-bottom: 22px; }
        .info-row td { vertical-align: top; }
        .company-detail {
            font-size: 10px;
            color: #555;
            line-height: 1.7;
        }

        /* ── Doc meta card ──────────────────────────────────── */
        .doc-meta-card {
            background: #f8f9fa;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            padding: 14px 18px;
        }
        .doc-meta-card table { width: 100%; }
        .doc-meta-card td {
            font-size: 10px;
            color: #555;
            padding: 2px 0;
        }
        .doc-meta-card td.meta-label {
            font-weight: bold;
            color: #333;
            width: 45%;
        }

        /* ── Status badge ───────────────────────────────────── */
        .badge {
            display: inline-block;
            padding: 3px 12px;
            border-radius: 12px;
            font-size: 9px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 0.4px;
        }
        .badge-draft { background: #e9ecef; color: #495057; }
        .badge-issued { background: #cff4fc; color: #055160; }
        .badge-applied { background: #d1e7dd; color: #0f5132; }
        .badge-partially_applied { background: #fff3cd; color: #664d03; }
        .badge-void { background: #e9ecef; color: #6c757d; }

        /* ── Section divider ────────────────────────────────── */
        .section-divider {
            border: none;
            height: 2px;
            background: {{ $brandColor }};
            opacity: 0.15;
            margin: 18px 0;
            border-radius: 2px;
        }

        /* ── Customer block ─────────────────────────────────── */
        .customer-card {
            background: #f8f9fa;
            border-left: 4px solid {{ $brandColor }};
            border-radius: 0 8px 8px 0;
            padding: 14px 18px;
            margin-bottom: 22px;
        }
        .customer-card .label {
            font-size: 9px;
            text-transform: uppercase;
            color: {{ $brandColor }};
            letter-spacing: 0.8px;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .customer-card .name {
            font-size: 13px;
            font-weight: bold;
            margin-bottom: 3px;
            color: #1a202c;
        }
        .customer-card .detail {
            font-size: 10px;
            color: #555;
            line-height: 1.7;
        }

        /* ── Items table ────────────────────────────────────── */
        .items-table { width: 100%; border-collapse: collapse; margin-bottom: 22px; border-radius: 8px; overflow: hidden; }
        .items-table th {
            background: {{ $brandColor }};
            color: #ffffff;
            padding: 10px 12px;
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: 0.4px;
            font-weight: bold;
        }
        .items-table th:first-child { text-align: left; }
        .items-table td {
            padding: 10px 12px;
            font-size: 10px;
            border-bottom: 1px solid #edf2f7;
        }
        .items-table tbody tr:nth-child(even) td { background: #f8f9fa; }
        .items-table tbody tr:nth-child(odd) td { background: #ffffff; }
        .items-table tbody tr:last-child td { border-bottom: none; }
        .text-right { text-align: right; }
        .text-center { text-align: center; }

        /* ── Totals ─────────────────────────────────────────── */
        .totals-wrapper { width: 100%; margin-bottom: 22px; }
        .totals-table { width: 300px; margin-left: auto; border-collapse: collapse; }
        .totals-table td {
            padding: 6px 12px;
            font-size: 11px;
        }
        .totals-table .label-cell { color: #555; }
        .totals-table .value-cell { text-align: right; color: #333; }
        .totals-table .total-row td {
            font-size: 15px;
            font-weight: bold;
            color: #ffffff;
            background: {{ $brandColor }};
            padding: 10px 12px;
        }
        .totals-table .total-row td:first-child {
            border-radius: 8px 0 0 8px;
        }
        .totals-table .total-row td:last-child {
            border-radius: 0 8px 8px 0;
        }
        .totals-table .sub-row td {
            border-bottom: 1px solid #edf2f7;
        }

        /* ── Notes card ─────────────────────────────────────── */
        .notes-card {
            background: #f8f9fa;
            border-radius: 8px;
            padding: 14px 18px;
            margin-top: 20px;
            font-size: 10px;
            color: #555;
            border-left: 4px solid {{ $brandColor }};
        }
        .notes-card strong { color: #333; }
    </style>
</head>
<body>
<div class="page">

    {{-- ─── Left accent stripe ─────────────────────────────────── --}}
    <div class="left-stripe"></div>

    {{-- ─── Header bar ─────────────────────────────────────────── --}}
    <div class="header-bar">
        <table>
            <tr>
                <td style="width: 60%;">
                    <table><tr>
                        <td>
                            @if($tenant)
                                @php $logoPath = $tenant->getFirstMediaPath('logo'); @endphp
                                @if($logoPath && file_exists($logoPath))
                                    <img src="{{ $logoPath }}" height="50" alt="logo" style="margin-right: 12px;">
                                @endif
                            @endif
                        </td>
                        <td>
                            <span class="company-name-white">{{ $company['company_name'] ?? $tenant?->name ?? '' }}</span>
                        </td>
                    </tr></table>
                </td>
                <td style="width: 40%;">
                    <div class="doc-title">AVOIR</div>
                </td>
            </tr>
        </table>
    </div>

    {{-- ─── Content ────────────────────────────────────────────── --}}
    <div class="content">

        {{-- ─── Company info + Doc meta ────────────────────────── --}}
        <table class="info-row">
            <tr>
                <td style="width: 55%;">
                    <div class="company-detail">
                        @if(!empty($company['forme_juridique'])) @php $formeLabels = ['sarl'=>'SARL','sarl_au'=>'SARL AU','sa'=>'SA','snc'=>'SNC','scs'=>'SCS','sca'=>'SCA','auto_entrepreneur'=>'Auto-Entrepreneur','ei'=>'Entreprise Individuelle','cooperative'=>'Coopérative']; @endphp {{ $formeLabels[$company['forme_juridique']] ?? strtoupper($company['forme_juridique']) }}@if(!empty($company['capital_social'])) au capital de {{ number_format($company['capital_social'], 2, ',', ' ') }} DH @endif<br>@endif
                    @if(!empty($company['address'])) {{ $company['address'] }}<br> @endif
                        @if(!empty($company['city'])) {{ $company['city'] }} @endif
                        @if(!empty($company['postal_code'])) {{ $company['postal_code'] }} @endif
                        @if(!empty($company['country'])) {{ $company['country'] }} @endif
                        @if(!empty($company['phone'])) <br>Tél : {{ $company['phone'] }} @endif
                        @if(!empty($company['email'])) <br>Email : {{ $company['email'] }} @endif
                        @if(!empty($company['tax_id'])) <br>IF : {{ $company['tax_id'] }} @endif
                        @if(!empty($company['ice'])) <br>ICE : {{ $company['ice'] }} @endif
                        @if(!empty($company['rc'])) <br>RC : {{ $company['rc'] }} @endif
                    @if(!empty($company['cnss'])) <br>CNSS : {{ $company['cnss'] }} @endif
                    @if(!empty($company['patente'])) <br>Patente : {{ $company['patente'] }} @endif
                    @if(!empty($company['numero_ae'])) <br>N° AE : {{ $company['numero_ae'] }} @endif
                    @if(!empty($company['cin'])) <br>CIN : {{ $company['cin'] }} @endif
                    </div>
                </td>
                <td style="width: 45%;">
                    <div class="doc-meta-card">
                        <table>
                            <tr>
                                <td class="meta-label">N°</td>
                                <td>{{ $creditNote->number }}</td>
                            </tr>
                            <tr>
                                <td class="meta-label">Date</td>
                                <td>{{ $creditNote->issue_date?->format('d/m/Y') }}</td>
                            </tr>
                            @if($creditNote->reference_number)
                            <tr>
                                <td class="meta-label">Réf.</td>
                                <td>{{ $creditNote->reference_number }}</td>
                            </tr>
                            @endif
                            @if($creditNote->invoice)
                            <tr>
                                <td class="meta-label">Facture</td>
                                <td>{{ $creditNote->invoice->number }}</td>
                            </tr>
                            @endif
                            <tr>
                                <td class="meta-label">Statut</td>
                                <td><span class="badge badge-{{ $creditNote->status }}">{{ str_replace('_', ' ', ucfirst($creditNote->status)) }}</span></td>
                            </tr>
                        </table>
                    </div>
                </td>
            </tr>
        </table>

        <hr class="section-divider">

        {{-- ─── Customer card ──────────────────────────────────── --}}
        <div class="customer-card">
            <div class="label">Client</div>
            <div class="name">{{ $creditNote->customer?->name ?? '' }}</div>
            <div class="detail">
                @if($creditNote->customer?->email) {{ $creditNote->customer->email }}<br> @endif
                @if($creditNote->customer?->phone) {{ $creditNote->customer->phone }}<br> @endif
                @if($creditNote->customer?->tax_id) IF : {{ $creditNote->customer->tax_id }} @endif
            </div>
        </div>

        {{-- ─── Items table ────────────────────────────────────── --}}
        <table class="items-table">
            <thead>
                <tr>
                    <th style="width: 5%;">#</th>
                    <th style="width: 40%;">Désignation</th>
                    <th class="text-center" style="width: 10%;">Qté</th>
                    <th class="text-right" style="width: 15%;">Prix unit.</th>
                    @if($creditNote->enable_tax)
                        <th class="text-right" style="width: 10%;">TVA</th>
                    @endif
                    <th class="text-right" style="width: 15%;">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($creditNote->items->sortBy('position') as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>
                        <strong>{{ $item->label }}</strong>
                        @if($item->description)
                            <br><span style="color: #888; font-size: 9px;">{{ $item->description }}</span>
                        @endif
                    </td>
                    <td class="text-center">{{ rtrim(rtrim(number_format($item->quantity, 3, ',', ' '), '0'), ',') }}</td>
                    <td class="text-right">{{ number_format($item->unit_price, 2, ',', ' ') }}</td>
                    @if($creditNote->enable_tax)
                        <td class="text-right">{{ number_format($item->tax_rate, 2) }}%</td>
                    @endif
                    <td class="text-right">{{ number_format($item->line_total, 2, ',', ' ') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{-- ─── Totals ─────────────────────────────────────────── --}}
        <div class="totals-wrapper">
            <table class="totals-table">
                <tr class="sub-row">
                    <td class="label-cell">Sous-total</td>
                    <td class="value-cell">{{ number_format($creditNote->subtotal, 2, ',', ' ') }} {{ $currency }}</td>
                </tr>
                @if($creditNote->enable_tax)
                <tr class="sub-row">
                    <td class="label-cell">TVA</td>
                    <td class="value-cell">{{ number_format($creditNote->tax_total, 2, ',', ' ') }} {{ $currency }}</td>
                </tr>
                @endif
                @if($creditNote->round_off != 0)
                <tr class="sub-row">
                    <td class="label-cell">Arrondi</td>
                    <td class="value-cell">{{ number_format($creditNote->round_off, 2, ',', ' ') }} {{ $currency }}</td>
                </tr>
                @endif
                <tr class="total-row">
                    <td>Total Avoir</td>
                    <td style="text-align: right;">{{ number_format($creditNote->total, 2, ',', ' ') }} {{ $currency }}</td>
                </tr>
            </table>
        </div>

        {{-- ─── Notes ──────────────────────────────────────────── --}}
        @if($creditNote->notes)
        <div class="notes-card">
            <strong>Notes :</strong><br>
            {!! nl2br(e($creditNote->notes)) !!}
        </div>
        @endif

        {{-- ─── Signature ──────────────────────────────────────── --}}
        @include('pdf.partials.signature')

    </div>
</div>
</body>
</html>
