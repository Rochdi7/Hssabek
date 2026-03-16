<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Bon de réception {{ $goodsReceipt->number }}</title>
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

        .badge { display: inline-block; padding: 3px 10px; border-radius: 3px; font-size: 9px; font-weight: bold; text-transform: uppercase; letter-spacing: 0.3px; }
        .badge-draft { background: #e9ecef; color: #495057; }
        .badge-received { background: #d1e7dd; color: #0f5132; }
        .badge-cancelled { background: #e9ecef; color: #6c757d; }

        .info-table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        .info-table td { padding: 8px 12px; font-size: 10px; border-bottom: 1px solid #eee; }
        .info-table td:first-child { font-weight: bold; color: #555; width: 35%; }

        .items-table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        .items-table th { background: {{ $settings?->company_settings['brand_color'] ?? '#2563eb' }}; color: #fff; padding: 8px 10px; font-size: 10px; text-transform: uppercase; letter-spacing: 0.3px; }
        .items-table th:first-child { text-align: left; border-radius: 4px 0 0 0; }
        .items-table th:last-child { border-radius: 0 4px 0 0; }
        .items-table td { padding: 8px 10px; border-bottom: 1px solid #eee; font-size: 10px; }
        .items-table tr:last-child td { border-bottom: none; }
        .text-right { text-align: right; }
        .text-center { text-align: center; }

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
                @php
                    $logoPath = $tenant ? $tenant->getFirstMediaPath('logo') : null;
                    $defaultLogo = public_path('assets/images/logo/logo.svg');
                @endphp
                @if($logoPath && file_exists($logoPath))
                    <img src="{{ $logoPath }}" alt="logo" style="max-height: 36px; max-width: 140px; margin-bottom: 8px; object-fit: contain;">
                @elseif(file_exists($defaultLogo))
                    <img src="{{ $defaultLogo }}" alt="logo" style="max-height: 36px; max-width: 140px; margin-bottom: 8px; object-fit: contain;">
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
                <div class="doc-title">BON DE RÉCEPTION</div>
                <div class="doc-meta">
                    <strong>N°</strong> {{ $goodsReceipt->number }}<br>
                    @if($goodsReceipt->received_at)
                        <strong>Reçu le :</strong> {{ $goodsReceipt->received_at->format('d/m/Y') }}<br>
                    @endif
                    @if($goodsReceipt->reference_number)
                        <strong>Réf :</strong> {{ $goodsReceipt->reference_number }}<br>
                    @endif
                    <span class="badge badge-{{ $goodsReceipt->status }}">{{ str_replace('_', ' ', ucfirst($goodsReceipt->status)) }}</span>
                </div>
            </td>
        </tr>
    </table>

    {{-- ─── Info ─────────────────────────────────────────────── --}}
    <table class="info-table">
        @if($goodsReceipt->purchaseOrder)
        <tr>
            <td>Bon de commande</td>
            <td>{{ $goodsReceipt->purchaseOrder->number }}</td>
        </tr>
        <tr>
            <td>Fournisseur</td>
            <td>{{ $goodsReceipt->purchaseOrder->supplier?->name ?? '—' }}</td>
        </tr>
        @endif
        @if($goodsReceipt->warehouse)
        <tr>
            <td>Entrepôt de réception</td>
            <td>{{ $goodsReceipt->warehouse->name }}</td>
        </tr>
        @endif
        @if($goodsReceipt->creator)
        <tr>
            <td>Réceptionné par</td>
            <td>{{ $goodsReceipt->creator->name }}</td>
        </tr>
        @endif
    </table>

    {{-- ─── Items table ────────────────────────────────────────── --}}
    <table class="items-table">
        <thead>
            <tr>
                <th style="width: 5%;">#</th>
                <th style="width: 45%;">Produit</th>
                <th class="text-center" style="width: 15%;">Qté reçue</th>
                <th class="text-right" style="width: 15%;">Coût unit.</th>
                <th class="text-right" style="width: 15%;">Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($goodsReceipt->items->sortBy('position') as $index => $item)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $item->product?->name ?? '—' }}</td>
                <td class="text-center">{{ rtrim(rtrim(number_format($item->quantity, 3, ',', ' '), '0'), ',') }}</td>
                <td class="text-right">{{ number_format($item->unit_cost, 2, ',', ' ') }}</td>
                <td class="text-right">{{ number_format($item->line_total, 2, ',', ' ') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{-- ─── Notes ────────────────────────────────────────────────── --}}
    @if($goodsReceipt->notes)
    <div class="notes-block">
        <strong>Notes :</strong><br>
        {!! nl2br(e($goodsReceipt->notes)) !!}
    </div>
    @endif

    {{-- ─── Signature ────────────────────────────────────────────── --}}
    @include('pdf.partials.signature')

</div>
</body>
</html>
