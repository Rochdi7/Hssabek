<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Bon de réception {{ $goodsReceipt->number }}</title>
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

        /* ── Status badge ─────────────────────────────────────── */
        .badge { display: inline-block; padding: 2px 8px; border-radius: 3px; font-size: 9px; font-weight: bold; text-transform: uppercase; letter-spacing: 0.3px; }
        .badge-draft { background: #e9ecef; color: #495057; }
        .badge-received { background: #d1e7dd; color: #0f5132; }
        .badge-cancelled { background: #e9ecef; color: #6c757d; }

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

        /* ── Info section ────────────────────────────────────── */
        .info-table { width: 100%; margin-bottom: 22px; }
        .info-table td { vertical-align: top; font-size: 10px; line-height: 1.8; }
        .info-label {
            font-size: 9px;
            font-weight: bold;
            color: {{ $accentColor }};
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 5px;
            padding-bottom: 3px;
            border-bottom: 1px solid #eee;
        }

        /* ── Items table ─────────────────────────────────────── */
        .items-table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
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

        /* ── Notes ────────────────────────────────────────────── */
        .footer-section { margin-top: 30px; }
        .footer-divider {
            height: 1px;
            background: #ddd;
            margin-bottom: 15px;
        }
        .footer-title {
            font-size: 9px;
            font-weight: bold;
            color: {{ $brandColor }};
            text-transform: uppercase;
            letter-spacing: 0.8px;
            margin-bottom: 5px;
        }
        .footer-detail {
            font-size: 10px;
            color: #555;
            line-height: 1.8;
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
                    <div class="doc-title">Bon de réception</div>
                    <div class="doc-number">N° {{ $goodsReceipt->number }}</div>
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
                                <td class="m-label">N°</td>
                                <td class="m-value">{{ $goodsReceipt->number }}</td>
                            </tr>
                            @if($goodsReceipt->received_at)
                            <tr>
                                <td class="m-label">Date</td>
                                <td class="m-value">{{ $goodsReceipt->received_at->format('d/m/Y') }}</td>
                            </tr>
                            @endif
                            @if($goodsReceipt->reference_number)
                            <tr>
                                <td class="m-label">Réf</td>
                                <td class="m-value">{{ $goodsReceipt->reference_number }}</td>
                            </tr>
                            @endif
                            <tr>
                                <td class="m-label">Statut</td>
                                <td class="m-value"><span class="badge badge-{{ $goodsReceipt->status }}">{{ str_replace('_', ' ', ucfirst($goodsReceipt->status)) }}</span></td>
                            </tr>
                        </table>
                    </div>
                </td>
            </tr>
        </table>

        <div class="accent-bar"></div>

        {{-- ─── Supplier / PO / Warehouse / Creator ──────────────── --}}
        <table class="info-table">
            <tr>
                <td style="width: 50%;">
                    @if($goodsReceipt->purchaseOrder)
                        <div class="info-label">Fournisseur</div>
                        <div style="font-size: 12px; font-weight: bold; color: #222; margin: 4px 0 10px;">{{ $goodsReceipt->purchaseOrder->supplier?->name ?? '—' }}</div>
                        <div class="info-label">Bon de commande</div>
                        {{ $goodsReceipt->purchaseOrder->number }}
                    @endif
                </td>
                <td style="width: 50%;">
                    @if($goodsReceipt->warehouse)
                        <div class="info-label">Entrepôt</div>
                        <div style="font-size: 12px; font-weight: bold; color: #222; margin: 4px 0 10px;">{{ $goodsReceipt->warehouse->name }}</div>
                    @endif
                    @if($goodsReceipt->creator)
                        <div class="info-label">Réceptionné par</div>
                        {{ $goodsReceipt->creator->name }}
                    @endif
                </td>
            </tr>
        </table>

        {{-- ─── Items table ──────────────────────────────────────── --}}
        <table class="items-table">
            <thead>
                <tr>
                    <th style="width: 5%;">#</th>
                    <th style="width: 40%;">PRODUIT</th>
                    <th class="text-center" style="width: 15%;">QTÉ REÇUE</th>
                    <th class="text-right" style="width: 20%;">COÛT UNIT.</th>
                    <th class="text-right" style="width: 20%;">TOTAL</th>
                </tr>
            </thead>
            <tbody>
                @foreach($goodsReceipt->items->sortBy('position') as $index => $item)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td>{{ $item->product?->name ?? '—' }}</td>
                    <td class="text-center">{{ rtrim(rtrim(number_format($item->quantity, 3, ',', ' '), '0'), ',') }}</td>
                    <td class="text-right">{{ number_format($item->unit_cost, 2, ',', ' ') }}</td>
                    <td class="text-right">{{ number_format($item->line_total, 2, ',', ' ') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{-- ─── Signature ────────────────────────────────────────── --}}
        @include('pdf.partials.signature')

        {{-- ─── Notes ────────────────────────────────────────────── --}}
        @if($goodsReceipt->notes)
        <div class="footer-section">
            <div class="footer-divider"></div>
            <div class="footer-title">Notes</div>
            <div class="footer-detail">
                {!! nl2br(e($goodsReceipt->notes)) !!}
            </div>
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
