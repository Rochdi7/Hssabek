<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Bon de réception {{ $goodsReceipt->number }}</title>
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

        /* ── Status badge ─────────────────────────────────────── */
        .badge { display: inline-block; padding: 2px 8px; border-radius: 3px; font-size: 9px; font-weight: bold; text-transform: uppercase; letter-spacing: 0.3px; }
        .badge-draft { background: #e9ecef; color: #495057; }
        .badge-received { background: #d1e7dd; color: #0f5132; }
        .badge-cancelled { background: #e9ecef; color: #6c757d; }

        /* ── Info section ─────────────────────────────────────── */
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
        .items-table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
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

        /* ── Notes ────────────────────────────────────────────── */
        .conditions-box {
            border-left: 3px solid {{ $accentColor }};
            padding-left: 12px;
            margin-top: 30px;
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

    {{-- ─── Header: BON DE RÉCEPTION title + Logo ──────────────────── --}}
    <table class="header-table">
        <tr>
            <td style="width: 70%;">
                <div class="doc-title">BON DE RÉCEPTION</div>
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

    {{-- ─── Info block: Supplier/PO + Meta ─────────────────────────── --}}
    <table class="info-table">
        <tr>
            <td style="width: 50%;">
                @if($goodsReceipt->purchaseOrder)
                    <div class="info-label">Fournisseur</div>
                    {{ $goodsReceipt->purchaseOrder->supplier?->name ?? '—' }}<br><br>
                    <div class="info-label">Bon de commande</div>
                    {{ $goodsReceipt->purchaseOrder->number }}
                @endif
                @if($goodsReceipt->warehouse)
                    <br><br>
                    <div class="info-label">Entrepôt</div>
                    {{ $goodsReceipt->warehouse->name }}
                @endif
                @if($goodsReceipt->creator)
                    <br><br>
                    <div class="info-label">Réceptionné par</div>
                    {{ $goodsReceipt->creator->name }}
                @endif
            </td>
            <td style="width: 50%;">
                <table class="meta-table">
                    <tr>
                        <td class="meta-label">N°</td>
                        <td class="meta-value">{{ $goodsReceipt->number }}</td>
                    </tr>
                    @if($goodsReceipt->received_at)
                    <tr>
                        <td class="meta-label">Date</td>
                        <td class="meta-value">{{ $goodsReceipt->received_at->format('d/m/Y') }}</td>
                    </tr>
                    @endif
                    @if($goodsReceipt->reference_number)
                    <tr>
                        <td class="meta-label">Réf</td>
                        <td class="meta-value">{{ $goodsReceipt->reference_number }}</td>
                    </tr>
                    @endif
                    <tr>
                        <td class="meta-label">Statut</td>
                        <td class="meta-value"><span class="badge badge-{{ $goodsReceipt->status }}">{{ str_replace('_', ' ', ucfirst($goodsReceipt->status)) }}</span></td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    {{-- ─── Items table ──────────────────────────────────────────── --}}
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

    {{-- ─── Signature ────────────────────────────────────────────── --}}
    @include('pdf.partials.signature')

    {{-- ─── Notes ────────────────────────────────────────────────── --}}
    @if($goodsReceipt->notes)
    <div class="conditions-box">
        <div class="conditions-title">Notes</div>
        <div class="conditions-detail">
            {!! nl2br(e($goodsReceipt->notes)) !!}
        </div>
    </div>
    @endif

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
