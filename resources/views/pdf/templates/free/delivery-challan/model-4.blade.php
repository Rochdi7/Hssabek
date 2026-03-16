<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Bon de livraison {{ $deliveryChallan->number }}</title>
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
        .badge-issued { border-color: {{ $brandColor }}; color: {{ $brandColor }}; }
        .badge-delivered { border-color: #22c55e; color: #22c55e; }
        .badge-cancelled { border-color: #ccc; color: #999; }

        /* Separator line */
        .accent-line {
            width: 60px;
            height: 1px;
            background: {{ $brandColor }};
            margin-bottom: 30px;
        }

        /* Customer block */
        .customer-section { margin-bottom: 35px; }
        .customer-label {
            font-size: 8px;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: #aaa;
            margin-bottom: 8px;
        }
        .customer-name {
            font-size: 14px;
            font-weight: 600;
            color: #1a1a1a;
            margin-bottom: 4px;
        }
        .customer-detail {
            font-size: 10px;
            color: #777;
            line-height: 1.8;
        }
        .customer-border {
            border-bottom: 1px solid #e8e8e8;
            padding-bottom: 20px;
        }

        /* Related docs */
        .related-docs {
            font-size: 10px;
            color: #888;
            margin-bottom: 25px;
            padding: 10px 0;
            border-bottom: 1px solid #f2f2f2;
        }
        .related-docs strong { color: #444; }

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

        /* Charges */
        .charges-header {
            font-size: 8px;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            color: #999;
            padding: 10px;
            border-bottom: 1px solid #f2f2f2;
        }
    </style>
</head>
<body>
<div class="page">

    {{-- Watermark --}}
    <div class="watermark">BON DE LIVRAISON</div>

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
                <div class="doc-title">Bon de livraison</div>
                <div class="doc-meta">
                    <strong>N°</strong> {{ $deliveryChallan->number }}<br>
                    <strong>Date</strong> {{ $deliveryChallan->challan_date?->format('d/m/Y') }}<br>
                    @if($deliveryChallan->due_date)
                        <strong>Date prévue</strong> {{ $deliveryChallan->due_date->format('d/m/Y') }}<br>
                    @endif
                    @if($deliveryChallan->reference_number)
                        <strong>Réf.</strong> {{ $deliveryChallan->reference_number }}<br>
                    @endif
                    <span class="badge badge-{{ $deliveryChallan->status }}">{{ str_replace('_', ' ', ucfirst($deliveryChallan->status)) }}</span>
                </div>
            </td>
        </tr>
    </table>

    <div class="accent-line"></div>

    {{-- ─── Bill To ────────────────────────────────────────────── --}}
    @php
        $billTo = $deliveryChallan->bill_to_snapshot ?? [];
    @endphp
    <div class="customer-section">
        <div class="customer-border">
            <div class="customer-label">Destinataire</div>
            <div class="customer-name">{{ $billTo['name'] ?? $deliveryChallan->customer?->name ?? '' }}</div>
            <div class="customer-detail">
                @if(!empty($billTo['address'])) {{ $billTo['address'] }}<br> @endif
                @if(!empty($billTo['city'])) {{ $billTo['city'] }} @endif
                @if(!empty($billTo['postal_code'])) {{ $billTo['postal_code'] }} @endif
                @if(!empty($billTo['country'])) {{ $billTo['country'] }} @endif
                @if(!empty($billTo['email'])) <br>{{ $billTo['email'] }} @endif
                @if(!empty($billTo['phone'])) <br>{{ $billTo['phone'] }} @endif
                @if(!empty($billTo['tax_id'])) <br>IF : {{ $billTo['tax_id'] }} @endif
            </div>
        </div>
    </div>

    {{-- ─── Related documents ────────────────────────────────────── --}}
    @if($deliveryChallan->invoice || $deliveryChallan->quote)
    <div class="related-docs">
        @if($deliveryChallan->invoice)
            <strong>Facture associée :</strong> {{ $deliveryChallan->invoice->number }}
        @endif
        @if($deliveryChallan->quote)
            @if($deliveryChallan->invoice) &nbsp;&nbsp;|&nbsp;&nbsp; @endif
            <strong>Devis associé :</strong> {{ $deliveryChallan->quote->number }}
        @endif
    </div>
    @endif

    {{-- ─── Items table ────────────────────────────────────────── --}}
    <table class="items-table">
        <thead>
            <tr>
                <th style="width: 5%;">#</th>
                <th style="width: 35%; text-align: left;">Désignation</th>
                <th class="text-center" style="width: 10%;">Qté</th>
                <th class="text-right" style="width: 15%;">Prix unit.</th>
                @if($deliveryChallan->enable_tax)
                    <th class="text-right" style="width: 10%;">TVA</th>
                @endif
                <th class="text-right" style="width: 15%;">Total HT</th>
            </tr>
        </thead>
        <tbody>
            @foreach($deliveryChallan->items->sortBy('position') as $index => $item)
            <tr>
                <td style="color: #bbb;">{{ $index + 1 }}</td>
                <td>
                    <div class="item-label">{{ $item->label }}</div>
                    @if($item->description)
                        <div class="item-description">{{ $item->description }}</div>
                    @endif
                </td>
                <td class="text-center">{{ rtrim(rtrim(number_format($item->quantity, 3, ',', ' '), '0'), ',') }}</td>
                <td class="text-right">{{ number_format($item->unit_price, 2, ',', ' ') }}</td>
                @if($deliveryChallan->enable_tax)
                    <td class="text-right">{{ number_format($item->tax_rate, 2) }}%</td>
                @endif
                <td class="text-right" style="font-weight: 600; color: #2d2d2d;">{{ number_format($item->line_subtotal, 2, ',', ' ') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{-- ─── Charges ────────────────────────────────────────────── --}}
    @if($deliveryChallan->charges->count())
    <table class="items-table" style="margin-top: -25px;">
        <thead>
            <tr>
                <th colspan="{{ $deliveryChallan->enable_tax ? 5 : 4 }}" class="charges-header" style="border-top: none;">Frais supplémentaires</th>
            </tr>
        </thead>
        <tbody>
            @foreach($deliveryChallan->charges->sortBy('position') as $charge)
            <tr>
                <td colspan="{{ $deliveryChallan->enable_tax ? 3 : 2 }}">{{ $charge->label }}</td>
                @if($deliveryChallan->enable_tax)
                    <td class="text-right">{{ number_format($charge->tax_rate, 2) }}%</td>
                @endif
                <td class="text-right" style="font-weight: 600; color: #2d2d2d;">{{ number_format($charge->amount, 2, ',', ' ') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif

    {{-- ─── Totals ─────────────────────────────────────────────── --}}
    <div class="totals-wrapper">
        <table class="totals-table">
            <tr>
                <td class="label-cell">Sous-total</td>
                <td class="value-cell">{{ number_format($deliveryChallan->subtotal, 2, ',', ' ') }} {{ $currency }}</td>
            </tr>
            @if($deliveryChallan->discount_total > 0)
            <tr>
                <td class="label-cell">Remise</td>
                <td class="value-cell">-{{ number_format($deliveryChallan->discount_total, 2, ',', ' ') }} {{ $currency }}</td>
            </tr>
            @endif
            @if($deliveryChallan->enable_tax)
            <tr>
                <td class="label-cell">TVA</td>
                <td class="value-cell">{{ number_format($deliveryChallan->tax_total, 2, ',', ' ') }} {{ $currency }}</td>
            </tr>
            @endif
            @if($deliveryChallan->round_off != 0)
            <tr>
                <td class="label-cell">Arrondi</td>
                <td class="value-cell">{{ number_format($deliveryChallan->round_off, 2, ',', ' ') }} {{ $currency }}</td>
            </tr>
            @endif
            <tr class="total-row">
                <td class="label-cell">Total TTC</td>
                <td class="value-cell">{{ number_format($deliveryChallan->total, 2, ',', ' ') }} {{ $currency }}</td>
            </tr>
        </table>
    </div>

    @if($deliveryChallan->total_in_words)
    <p style="font-size: 9.5px; color: #999; font-style: italic; margin-bottom: 20px;">
        Arrêté le présent bon de livraison à la somme de : <span style="color: #666;">{{ $deliveryChallan->total_in_words }}</span>
    </p>
    @endif

    {{-- ─── Notes & Terms ──────────────────────────────────────── --}}
    @if($deliveryChallan->notes)
    <div class="notes-block">
        <strong>Notes</strong><br>
        {!! nl2br(e($deliveryChallan->notes)) !!}
    </div>
    @endif

    @if($deliveryChallan->terms)
    <div class="notes-block" style="margin-top: 12px; border-top: none;">
        <strong>Conditions</strong><br>
        {!! nl2br(e($deliveryChallan->terms)) !!}
    </div>
    @endif

    {{-- ─── Signature ────────────────────────────────────────────── --}}
    @include('pdf.partials.signature')

</div>
</body>
</html>
