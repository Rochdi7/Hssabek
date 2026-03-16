<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Bon de commande {{ $purchaseOrder->number }}</title>
    @php
        $brandColor = $settings?->company_settings['brand_color'] ?? '#2563eb';
    @endphp
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 11px;
            color: #2d2d2d;
            line-height: 1.6;
            background: #fff;
        }
        .page {
            padding: 45px 50px;
            position: relative;
        }

        /* Watermark */
        .watermark {
            position: fixed;
            top: 280px;
            left: 50%;
            font-size: 72px;
            color: #f0f0f0;
            letter-spacing: 10px;
            font-weight: bold;
            text-transform: uppercase;
            transform: rotate(-35deg);
            z-index: 0;
            white-space: nowrap;
            margin-left: -320px;
        }

        /* Header */
        .header-table { width: 100%; margin-bottom: 40px; border-collapse: collapse; }
        .header-table td { vertical-align: top; }

        .company-name {
            font-size: 15px;
            font-weight: bold;
            color: #1a1a1a;
            margin-bottom: 6px;
            letter-spacing: 0.3px;
        }
        .company-detail {
            font-size: 9.5px;
            color: #777;
            line-height: 1.8;
        }

        .doc-title {
            font-size: 28px;
            font-weight: 300;
            color: #c8c8c8;
            text-align: right;
            letter-spacing: 3px;
            text-transform: uppercase;
            margin-bottom: 15px;
        }
        .doc-meta {
            font-size: 10px;
            color: #888;
            text-align: right;
            line-height: 2;
        }
        .doc-meta strong {
            color: #444;
            font-weight: 600;
        }

        /* Status badge */
        .badge {
            display: inline-block;
            padding: 3px 12px;
            font-size: 8px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
            border: 1px solid;
            margin-top: 4px;
        }
        .badge-draft { border-color: #ccc; color: #999; }
        .badge-sent { border-color: {{ $brandColor }}; color: {{ $brandColor }}; }
        .badge-confirmed { border-color: #22c55e; color: #22c55e; }
        .badge-partially_received { border-color: #f59e0b; color: #f59e0b; }
        .badge-received { border-color: #22c55e; color: #22c55e; }
        .badge-cancelled { border-color: #ccc; color: #999; }

        /* Separator line */
        .accent-line {
            width: 60px;
            height: 1px;
            background: {{ $brandColor }};
            margin-bottom: 30px;
        }

        /* Supplier block */
        .supplier-section { margin-bottom: 35px; }
        .supplier-label {
            font-size: 8px;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: #aaa;
            margin-bottom: 8px;
        }
        .supplier-name {
            font-size: 14px;
            font-weight: 600;
            color: #1a1a1a;
            margin-bottom: 4px;
        }
        .supplier-detail {
            font-size: 10px;
            color: #777;
            line-height: 1.8;
        }
        .supplier-border {
            border-bottom: 1px solid #e8e8e8;
            padding-bottom: 20px;
        }

        /* Warehouse info */
        .warehouse-info {
            font-size: 10px;
            color: #888;
            margin-bottom: 25px;
            padding: 10px 0;
            border-bottom: 1px solid #f2f2f2;
        }
        .warehouse-info strong { color: #444; }

        /* Items table */
        .items-table { width: 100%; border-collapse: collapse; margin-bottom: 30px; }
        .items-table th {
            padding: 12px 10px;
            font-size: 8px;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            color: #999;
            font-weight: 600;
            border-top: 1px solid {{ $brandColor }};
            border-bottom: 1px solid #eee;
        }
        .items-table th:first-child { text-align: left; }
        .items-table td {
            padding: 14px 10px;
            border-bottom: 1px solid #f2f2f2;
            font-size: 10px;
            color: #444;
        }
        .items-table tr:last-child td { border-bottom: 1px solid #eee; }
        .item-label { font-weight: 600; color: #2d2d2d; font-size: 10.5px; }
        .item-description { color: #aaa; font-size: 9px; margin-top: 2px; }
        .text-right { text-align: right; }
        .text-center { text-align: center; }

        /* Totals */
        .totals-wrapper { width: 100%; margin-bottom: 30px; }
        .totals-table { width: 300px; margin-left: auto; }
        .totals-table td {
            padding: 8px 12px;
            font-size: 10.5px;
            color: #666;
        }
        .totals-table .label-cell { text-align: left; }
        .totals-table .value-cell { text-align: right; font-weight: 500; color: #444; }
        .totals-table .total-row td {
            font-size: 16px;
            font-weight: 700;
            color: {{ $brandColor }};
            border-top: 1px solid {{ $brandColor }};
            padding-top: 14px;
            padding-bottom: 14px;
        }

        /* Notes */
        .notes-block {
            margin-top: 30px;
            font-size: 9.5px;
            color: #999;
            font-style: italic;
            line-height: 1.7;
            padding-top: 15px;
            border-top: 1px solid #f0f0f0;
        }
        .notes-block strong {
            color: #666;
            font-style: normal;
            font-size: 8px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
    </style>
</head>
<body>
<div class="page">

    {{-- Watermark --}}
    <div class="watermark">BON DE COMMANDE</div>

    {{-- ─── Header ─────────────────────────────────────────────── --}}
    <table class="header-table">
        <tr>
            <td style="width: 55%;">
                @if($tenant)
                    @php
                        $logoPath = $tenant->getFirstMediaPath('logo');
                    @endphp
                    @if($logoPath && file_exists($logoPath))
                        <img src="{{ $logoPath }}" height="50" alt="logo" style="margin-bottom: 10px;">
                    @endif
                @endif
                @php
                    $company = $settings?->company_settings ?? [];
                @endphp
                <div class="company-name">{{ $company['company_name'] ?? $tenant?->name ?? '' }}</div>
                <div class="company-detail">
                    @if(!empty($company['forme_juridique'])) @php $formeLabels = ['sarl'=>'SARL','sarl_au'=>'SARL AU','sa'=>'SA','snc'=>'SNC','scs'=>'SCS','sca'=>'SCA','auto_entrepreneur'=>'Auto-Entrepreneur','ei'=>'Entreprise Individuelle','cooperative'=>'Coopérative']; @endphp {{ $formeLabels[$company['forme_juridique']] ?? strtoupper($company['forme_juridique']) }}@if(!empty($company['capital_social'])) au capital de {{ number_format($company['capital_social'], 2, ',', ' ') }} DH @endif<br>@endif
                    @if(!empty($company['address'])) {{ $company['address'] }}<br> @endif
                    @if(!empty($company['city'])) {{ $company['city'] }} @endif
                    @if(!empty($company['postal_code'])) {{ $company['postal_code'] }} @endif
                    @if(!empty($company['country'])) {{ $company['country'] }} @endif
                    @if(!empty($company['phone'])) <br>{{ $company['phone'] }} @endif
                    @if(!empty($company['email'])) <br>{{ $company['email'] }} @endif
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
                <div class="doc-title">Bon de commande</div>
                <div class="doc-meta">
                    <strong>N°</strong> {{ $purchaseOrder->number }}<br>
                    <strong>Date</strong> {{ $purchaseOrder->order_date?->format('d/m/Y') }}<br>
                    @if($purchaseOrder->expected_date)
                        <strong>Livraison prévue</strong> {{ $purchaseOrder->expected_date->format('d/m/Y') }}<br>
                    @endif
                    @if($purchaseOrder->reference_number)
                        <strong>Réf.</strong> {{ $purchaseOrder->reference_number }}<br>
                    @endif
                    <span class="badge badge-{{ $purchaseOrder->status }}">{{ str_replace('_', ' ', ucfirst($purchaseOrder->status)) }}</span>
                </div>
            </td>
        </tr>
    </table>

    <div class="accent-line"></div>

    {{-- ─── Supplier ───────────────────────────────────────────── --}}
    <div class="supplier-section">
        <div class="supplier-border">
            <div class="supplier-label">Fournisseur</div>
            <div class="supplier-name">{{ $purchaseOrder->supplier?->name ?? '' }}</div>
            <div class="supplier-detail">
                @if($purchaseOrder->supplier?->email) {{ $purchaseOrder->supplier->email }}<br> @endif
                @if($purchaseOrder->supplier?->phone) {{ $purchaseOrder->supplier->phone }}<br> @endif
                @if($purchaseOrder->supplier?->tax_id) IF : {{ $purchaseOrder->supplier->tax_id }} @endif
            </div>
        </div>
    </div>

    @if($purchaseOrder->warehouse)
    <div class="warehouse-info">
        <strong>Entrepôt de réception :</strong> {{ $purchaseOrder->warehouse->name }}
    </div>
    @endif

    {{-- ─── Items table ────────────────────────────────────────── --}}
    <table class="items-table">
        <thead>
            <tr>
                <th style="width: 5%;">#</th>
                <th style="width: 35%; text-align: left;">Désignation</th>
                <th class="text-center" style="width: 10%;">Qté</th>
                <th class="text-right" style="width: 15%;">Coût unit.</th>
                <th class="text-right" style="width: 10%;">TVA</th>
                <th class="text-right" style="width: 15%;">Total HT</th>
            </tr>
        </thead>
        <tbody>
            @foreach($purchaseOrder->items->sortBy('position') as $index => $item)
            <tr>
                <td style="color: #bbb;">{{ $index + 1 }}</td>
                <td>
                    <div class="item-label">{{ $item->label }}</div>
                    @if($item->description)
                        <div class="item-description">{{ $item->description }}</div>
                    @endif
                </td>
                <td class="text-center">{{ rtrim(rtrim(number_format($item->quantity, 3, ',', ' '), '0'), ',') }}</td>
                <td class="text-right">{{ number_format($item->unit_cost, 2, ',', ' ') }}</td>
                <td class="text-right">{{ number_format($item->tax_rate, 2) }}%</td>
                <td class="text-right" style="font-weight: 600; color: #2d2d2d;">{{ number_format($item->line_subtotal, 2, ',', ' ') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{-- ─── Totals ─────────────────────────────────────────────── --}}
    <div class="totals-wrapper">
        <table class="totals-table">
            <tr>
                <td class="label-cell">Sous-total</td>
                <td class="value-cell">{{ number_format($purchaseOrder->subtotal, 2, ',', ' ') }} {{ $currency }}</td>
            </tr>
            @if($purchaseOrder->discount_total > 0)
            <tr>
                <td class="label-cell">Remise</td>
                <td class="value-cell">-{{ number_format($purchaseOrder->discount_total, 2, ',', ' ') }} {{ $currency }}</td>
            </tr>
            @endif
            <tr>
                <td class="label-cell">TVA</td>
                <td class="value-cell">{{ number_format($purchaseOrder->tax_total, 2, ',', ' ') }} {{ $currency }}</td>
            </tr>
            @if($purchaseOrder->round_off != 0)
            <tr>
                <td class="label-cell">Arrondi</td>
                <td class="value-cell">{{ number_format($purchaseOrder->round_off, 2, ',', ' ') }} {{ $currency }}</td>
            </tr>
            @endif
            <tr class="total-row">
                <td class="label-cell">Total TTC</td>
                <td class="value-cell">{{ number_format($purchaseOrder->total, 2, ',', ' ') }} {{ $currency }}</td>
            </tr>
        </table>
    </div>

    {{-- ─── Notes & Terms ──────────────────────────────────────── --}}
    @if($purchaseOrder->notes)
    <div class="notes-block">
        <strong>Notes</strong><br>
        {!! nl2br(e($purchaseOrder->notes)) !!}
    </div>
    @endif

    @if($purchaseOrder->terms)
    <div class="notes-block" style="margin-top: 12px; border-top: none;">
        <strong>Conditions</strong><br>
        {!! nl2br(e($purchaseOrder->terms)) !!}
    </div>
    @endif

    {{-- ─── Signature ────────────────────────────────────────────── --}}
    @include('pdf.partials.signature')

</div>
</body>
</html>
