<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Bon de livraison {{ $deliveryChallan->number }}</title>
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

        .customer-block { background: #f8f9fa; border: 1px solid #e9ecef; border-radius: 4px; padding: 12px 15px; margin-bottom: 20px; }
        .customer-block .label { font-size: 9px; text-transform: uppercase; color: #888; letter-spacing: 0.5px; margin-bottom: 4px; }
        .customer-block .name { font-size: 13px; font-weight: bold; margin-bottom: 2px; }
        .customer-block .detail { font-size: 10px; color: #555; }

        .badge { display: inline-block; padding: 3px 10px; border-radius: 3px; font-size: 9px; font-weight: bold; text-transform: uppercase; letter-spacing: 0.3px; }
        .badge-draft { background: #e9ecef; color: #495057; }
        .badge-issued { background: #cff4fc; color: #055160; }
        .badge-delivered { background: #d1e7dd; color: #0f5132; }
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

        .bank-block { margin-top: 15px; font-size: 10px; color: #555; }
        .bank-block strong { color: #333; }
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
                <div class="doc-title">BON DE LIVRAISON</div>
                <div class="doc-meta">
                    <strong>N°</strong> {{ $deliveryChallan->number }}<br>
                    <strong>Date :</strong> {{ $deliveryChallan->challan_date?->format('d/m/Y') }}<br>
                    @if($deliveryChallan->due_date)
                        <strong>Date prévue :</strong> {{ $deliveryChallan->due_date->format('d/m/Y') }}<br>
                    @endif
                    @if($deliveryChallan->reference_number)
                        <strong>Réf :</strong> {{ $deliveryChallan->reference_number }}<br>
                    @endif
                    <span class="badge badge-{{ $deliveryChallan->status }}">{{ str_replace('_', ' ', ucfirst($deliveryChallan->status)) }}</span>
                </div>
            </td>
        </tr>
    </table>

    {{-- ─── Bill To ────────────────────────────────────────────── --}}
    @php
        $billTo = $deliveryChallan->bill_to_snapshot ?? [];
    @endphp
    <div class="customer-block">
        <div class="label">Destinataire</div>
        <div class="name">{{ $billTo['name'] ?? $deliveryChallan->customer?->name ?? '' }}</div>
        <div class="detail">
            @if(!empty($billTo['address'])) {{ $billTo['address'] }}<br> @endif
            @if(!empty($billTo['city'])) {{ $billTo['city'] }} @endif
            @if(!empty($billTo['postal_code'])) {{ $billTo['postal_code'] }} @endif
            @if(!empty($billTo['country'])) {{ $billTo['country'] }} @endif
            @if(!empty($billTo['email'])) <br>{{ $billTo['email'] }} @endif
            @if(!empty($billTo['phone'])) <br>{{ $billTo['phone'] }} @endif
            @if(!empty($billTo['tax_id'])) <br>IF : {{ $billTo['tax_id'] }} @endif
        </div>
    </div>

    {{-- ─── Related documents ────────────────────────────────────── --}}
    @if($deliveryChallan->invoice || $deliveryChallan->quote)
    <p style="font-size: 10px; color: #555; margin-bottom: 15px;">
        @if($deliveryChallan->invoice)
            <strong>Facture associée :</strong> {{ $deliveryChallan->invoice->number }}
        @endif
        @if($deliveryChallan->quote)
            @if($deliveryChallan->invoice) &nbsp;|&nbsp; @endif
            <strong>Devis associé :</strong> {{ $deliveryChallan->quote->number }}
        @endif
    </p>
    @endif

    {{-- ─── Items table ────────────────────────────────────────── --}}
    <table class="items-table">
        <thead>
            <tr>
                <th style="width: 5%;">#</th>
                <th style="width: 35%;">Désignation</th>
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
                <td>{{ $index + 1 }}</td>
                <td>
                    <strong>{{ $item->label }}</strong>
                    @if($item->description)
                        <br><span style="color: #888; font-size: 9px;">{{ $item->description }}</span>
                    @endif
                </td>
                <td class="text-center">{{ rtrim(rtrim(number_format($item->quantity, 3, ',', ' '), '0'), ',') }}</td>
                <td class="text-right">{{ number_format($item->unit_price, 2, ',', ' ') }}</td>
                @if($deliveryChallan->enable_tax)
                    <td class="text-right">{{ number_format($item->tax_rate, 2) }}%</td>
                @endif
                <td class="text-right">{{ number_format($item->line_subtotal, 2, ',', ' ') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{-- ─── Charges ────────────────────────────────────────────── --}}
    @if($deliveryChallan->charges->count())
    <table class="items-table" style="margin-top: -15px;">
        <thead>
            <tr>
                <th colspan="{{ $deliveryChallan->enable_tax ? 5 : 4 }}" style="background: #6c757d; border-radius: 0;">Frais supplémentaires</th>
            </tr>
        </thead>
        <tbody>
            @foreach($deliveryChallan->charges->sortBy('position') as $charge)
            <tr>
                <td colspan="{{ $deliveryChallan->enable_tax ? 3 : 2 }}">{{ $charge->label }}</td>
                @if($deliveryChallan->enable_tax)
                    <td class="text-right">{{ number_format($charge->tax_rate, 2) }}%</td>
                @endif
                <td class="text-right">{{ number_format($charge->amount, 2, ',', ' ') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif

    {{-- ─── Totals ─────────────────────────────────────────────── --}}
    <div class="totals-wrapper">
        <table class="totals-table">
            <tr>
                <td>Sous-total</td>
                <td class="text-right">{{ number_format($deliveryChallan->subtotal, 2, ',', ' ') }} {{ $currency }}</td>
            </tr>
            @if($deliveryChallan->discount_total > 0)
            <tr>
                <td>Remise</td>
                <td class="text-right">-{{ number_format($deliveryChallan->discount_total, 2, ',', ' ') }} {{ $currency }}</td>
            </tr>
            @endif
            @if($deliveryChallan->enable_tax)
            <tr>
                <td>TVA</td>
                <td class="text-right">{{ number_format($deliveryChallan->tax_total, 2, ',', ' ') }} {{ $currency }}</td>
            </tr>
            @endif
            @if($deliveryChallan->round_off != 0)
            <tr>
                <td>Arrondi</td>
                <td class="text-right">{{ number_format($deliveryChallan->round_off, 2, ',', ' ') }} {{ $currency }}</td>
            </tr>
            @endif
            <tr class="total-row">
                <td>Total TTC</td>
                <td class="text-right">{{ number_format($deliveryChallan->total, 2, ',', ' ') }} {{ $currency }}</td>
            </tr>
        </table>
    </div>

    @if($deliveryChallan->total_in_words)
    <p style="font-size: 10px; color: #555; font-style: italic; margin-bottom: 15px;">
        Arrêté le présent bon de livraison à la somme de : <strong>{{ $deliveryChallan->total_in_words }}</strong>
    </p>
    @endif

    {{-- ─── Notes & Terms ──────────────────────────────────────── --}}
    @if($deliveryChallan->notes)
    <div class="notes-block">
        <strong>Notes :</strong><br>
        {!! nl2br(e($deliveryChallan->notes)) !!}
    </div>
    @endif

    @if($deliveryChallan->terms)
    <div class="notes-block" style="margin-top: 10px;">
        <strong>Conditions :</strong><br>
        {!! nl2br(e($deliveryChallan->terms)) !!}
    </div>
    @endif

    {{-- ─── Signature ────────────────────────────────────────────── --}}
    @include('pdf.partials.signature')

</div>
</body>
</html>
