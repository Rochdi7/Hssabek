<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Bon de commande {{ $purchaseOrder->number }}</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: DejaVu Sans, sans-serif; font-size: 11px; color: #333; line-height: 1.5; }
        .page { padding: 30px 40px; }

        .header-table { width: 100%; margin-bottom: 25px; }
        .header-table td { vertical-align: top; }
        .company-name { font-size: 16px; font-weight: bold; margin-bottom: 4px; }
        .company-detail { font-size: 10px; color: #555; line-height: 1.6; }
        .doc-title { font-size: 22px; font-weight: bold; color: {{ $settings?->company_settings['brand_color'] ?? '#2563eb' }}; margin-bottom: 8px; text-align: right; }
        .doc-meta { font-size: 10px; color: #555; text-align: right; line-height: 1.8; }
        .doc-meta strong { color: #333; }

        .supplier-block { background: #f8f9fa; border: 1px solid #e9ecef; border-radius: 4px; padding: 12px 15px; margin-bottom: 20px; }
        .supplier-block .label { font-size: 9px; text-transform: uppercase; color: #888; letter-spacing: 0.5px; margin-bottom: 4px; }
        .supplier-block .name { font-size: 13px; font-weight: bold; margin-bottom: 2px; }
        .supplier-block .detail { font-size: 10px; color: #555; }

        .badge { display: inline-block; padding: 3px 10px; border-radius: 3px; font-size: 9px; font-weight: bold; text-transform: uppercase; letter-spacing: 0.3px; }
        .badge-draft { background: #e9ecef; color: #495057; }
        .badge-sent { background: #cff4fc; color: #055160; }
        .badge-confirmed { background: #d1e7dd; color: #0f5132; }
        .badge-partially_received { background: #fff3cd; color: #664d03; }
        .badge-received { background: #d1e7dd; color: #0f5132; }
        .badge-cancelled { background: #e9ecef; color: #6c757d; }

        .items-table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        .items-table th { background: {{ $settings?->company_settings['brand_color'] ?? '#2563eb' }}; color: #fff; padding: 8px 10px; font-size: 10px; text-transform: uppercase; letter-spacing: 0.3px; }
        .items-table th:first-child { text-align: left; border-radius: 4px 0 0 0; }
        .items-table th:last-child { border-radius: 0 4px 0 0; }
        .items-table td { padding: 8px 10px; border-bottom: 1px solid #eee; font-size: 10px; }
        .items-table tr:last-child td { border-bottom: none; }
        .text-right { text-align: right; }
        .text-center { text-align: center; }

        .totals-wrapper { width: 100%; margin-bottom: 20px; }
        .totals-table { width: 280px; margin-left: auto; }
        .totals-table td { padding: 5px 10px; font-size: 11px; }
        .totals-table .total-row td { font-size: 14px; font-weight: bold; border-top: 2px solid {{ $settings?->company_settings['brand_color'] ?? '#2563eb' }}; padding-top: 8px; color: {{ $settings?->company_settings['brand_color'] ?? '#2563eb' }}; }

        .notes-block { margin-top: 25px; padding: 10px 15px; background: #f8f9fa; border-left: 3px solid {{ $settings?->company_settings['brand_color'] ?? '#2563eb' }}; font-size: 10px; color: #555; }
        .notes-block strong { color: #333; }
    </style>
</head>
<body>
<div class="page">

    {{-- ─── Header ─────────────────────────────────────────────── --}}
    <table class="header-table">
        <tr>
            <td style="width: 55%;">
                @if($tenant)
                    @php
                        $logoPath = $tenant->getFirstMediaPath('logo');
                    @endphp
                    @if($logoPath && file_exists($logoPath))
                        <img src="{{ $logoPath }}" height="50" alt="logo" style="margin-bottom: 8px;">
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
                <div class="doc-title">BON DE COMMANDE</div>
                <div class="doc-meta">
                    <strong>N°</strong> {{ $purchaseOrder->number }}<br>
                    <strong>Date :</strong> {{ $purchaseOrder->order_date?->format('d/m/Y') }}<br>
                    @if($purchaseOrder->expected_date)
                        <strong>Livraison prévue :</strong> {{ $purchaseOrder->expected_date->format('d/m/Y') }}<br>
                    @endif
                    @if($purchaseOrder->reference_number)
                        <strong>Réf :</strong> {{ $purchaseOrder->reference_number }}<br>
                    @endif
                    <span class="badge badge-{{ $purchaseOrder->status }}">{{ str_replace('_', ' ', ucfirst($purchaseOrder->status)) }}</span>
                </div>
            </td>
        </tr>
    </table>

    {{-- ─── Supplier ───────────────────────────────────────────── --}}
    <div class="supplier-block">
        <div class="label">Fournisseur</div>
        <div class="name">{{ $purchaseOrder->supplier?->name ?? '' }}</div>
        <div class="detail">
            @if($purchaseOrder->supplier?->email) {{ $purchaseOrder->supplier->email }}<br> @endif
            @if($purchaseOrder->supplier?->phone) {{ $purchaseOrder->supplier->phone }}<br> @endif
            @if($purchaseOrder->supplier?->tax_id) IF : {{ $purchaseOrder->supplier->tax_id }} @endif
        </div>
    </div>

    @if($purchaseOrder->warehouse)
    <p style="font-size: 10px; color: #555; margin-bottom: 15px;">
        <strong>Entrepôt de réception :</strong> {{ $purchaseOrder->warehouse->name }}
    </p>
    @endif

    {{-- ─── Items table ────────────────────────────────────────── --}}
    <table class="items-table">
        <thead>
            <tr>
                <th style="width: 5%;">#</th>
                <th style="width: 35%;">Désignation</th>
                <th class="text-center" style="width: 10%;">Qté</th>
                <th class="text-right" style="width: 15%;">Coût unit.</th>
                <th class="text-right" style="width: 10%;">TVA</th>
                <th class="text-right" style="width: 15%;">Total HT</th>
            </tr>
        </thead>
        <tbody>
            @foreach($purchaseOrder->items->sortBy('position') as $index => $item)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>
                    <strong>{{ $item->label }}</strong>
                    @if($item->description)
                        <br><span style="color: #888; font-size: 9px;">{{ $item->description }}</span>
                    @endif
                </td>
                <td class="text-center">{{ rtrim(rtrim(number_format($item->quantity, 3, ',', ' '), '0'), ',') }}</td>
                <td class="text-right">{{ number_format($item->unit_cost, 2, ',', ' ') }}</td>
                <td class="text-right">{{ number_format($item->tax_rate, 2) }}%</td>
                <td class="text-right">{{ number_format($item->line_subtotal, 2, ',', ' ') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{-- ─── Totals ─────────────────────────────────────────────── --}}
    <div class="totals-wrapper">
        <table class="totals-table">
            <tr>
                <td>Sous-total</td>
                <td class="text-right">{{ number_format($purchaseOrder->subtotal, 2, ',', ' ') }} {{ $currency }}</td>
            </tr>
            @if($purchaseOrder->discount_total > 0)
            <tr>
                <td>Remise</td>
                <td class="text-right">-{{ number_format($purchaseOrder->discount_total, 2, ',', ' ') }} {{ $currency }}</td>
            </tr>
            @endif
            <tr>
                <td>TVA</td>
                <td class="text-right">{{ number_format($purchaseOrder->tax_total, 2, ',', ' ') }} {{ $currency }}</td>
            </tr>
            @if($purchaseOrder->round_off != 0)
            <tr>
                <td>Arrondi</td>
                <td class="text-right">{{ number_format($purchaseOrder->round_off, 2, ',', ' ') }} {{ $currency }}</td>
            </tr>
            @endif
            <tr class="total-row">
                <td>Total TTC</td>
                <td class="text-right">{{ number_format($purchaseOrder->total, 2, ',', ' ') }} {{ $currency }}</td>
            </tr>
        </table>
    </div>

    {{-- ─── Notes & Terms ──────────────────────────────────────── --}}
    @if($purchaseOrder->notes)
    <div class="notes-block">
        <strong>Notes :</strong><br>
        {!! nl2br(e($purchaseOrder->notes)) !!}
    </div>
    @endif

    @if($purchaseOrder->terms)
    <div class="notes-block" style="margin-top: 10px;">
        <strong>Conditions :</strong><br>
        {!! nl2br(e($purchaseOrder->terms)) !!}
    </div>
    @endif

    {{-- ─── Signature ────────────────────────────────────────────── --}}
    @include('pdf.partials.signature')

</div>
</body>
</html>
