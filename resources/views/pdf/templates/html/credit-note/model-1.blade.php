<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Avoir {{ $creditNote->number }}</title>
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
        .badge-applied { background: #d1e7dd; color: #0f5132; }
        .badge-partially_applied { background: #fff3cd; color: #664d03; }
        .badge-void { background: #e9ecef; color: #6c757d; }

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
                    @if(!empty($company['address'])) {{ $company['address'] }}<br> @endif
                    @if(!empty($company['city'])) {{ $company['city'] }} @endif
                    @if(!empty($company['postal_code'])) {{ $company['postal_code'] }} @endif
                    @if(!empty($company['country'])) {{ $company['country'] }} @endif
                    @if(!empty($company['phone'])) <br>Tél : {{ $company['phone'] }} @endif
                    @if(!empty($company['email'])) <br>Email : {{ $company['email'] }} @endif
                    @if(!empty($company['tax_id'])) <br>IF : {{ $company['tax_id'] }} @endif
                    @if(!empty($company['ice'])) <br>ICE : {{ $company['ice'] }} @endif
                    @if(!empty($company['rc'])) <br>RC : {{ $company['rc'] }} @endif
                </div>
            </td>
            <td style="width: 45%;">
                <div class="doc-title">AVOIR</div>
                <div class="doc-meta">
                    <strong>N°</strong> {{ $creditNote->number }}<br>
                    <strong>Date :</strong> {{ $creditNote->issue_date?->format('d/m/Y') }}<br>
                    @if($creditNote->reference_number)
                        <strong>Réf :</strong> {{ $creditNote->reference_number }}<br>
                    @endif
                    @if($creditNote->invoice)
                        <strong>Facture :</strong> {{ $creditNote->invoice->number }}<br>
                    @endif
                    <span class="badge badge-{{ $creditNote->status }}">{{ str_replace('_', ' ', ucfirst($creditNote->status)) }}</span>
                </div>
            </td>
        </tr>
    </table>

    {{-- ─── Customer ─────────────────────────────────────────────── --}}
    <div class="customer-block">
        <div class="label">Client</div>
        <div class="name">{{ $creditNote->customer?->name ?? '' }}</div>
        <div class="detail">
            @if($creditNote->customer?->email) {{ $creditNote->customer->email }}<br> @endif
            @if($creditNote->customer?->phone) {{ $creditNote->customer->phone }}<br> @endif
            @if($creditNote->customer?->tax_id) IF : {{ $creditNote->customer->tax_id }} @endif
        </div>
    </div>

    {{-- ─── Items table ────────────────────────────────────────── --}}
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

    {{-- ─── Totals ─────────────────────────────────────────────── --}}
    <div class="totals-wrapper">
        <table class="totals-table">
            <tr>
                <td>Sous-total</td>
                <td class="text-right">{{ number_format($creditNote->subtotal, 2, ',', ' ') }} {{ $currency }}</td>
            </tr>
            @if($creditNote->enable_tax)
            <tr>
                <td>TVA</td>
                <td class="text-right">{{ number_format($creditNote->tax_total, 2, ',', ' ') }} {{ $currency }}</td>
            </tr>
            @endif
            @if($creditNote->round_off != 0)
            <tr>
                <td>Arrondi</td>
                <td class="text-right">{{ number_format($creditNote->round_off, 2, ',', ' ') }} {{ $currency }}</td>
            </tr>
            @endif
            <tr class="total-row">
                <td>Total Avoir</td>
                <td class="text-right">{{ number_format($creditNote->total, 2, ',', ' ') }} {{ $currency }}</td>
            </tr>
        </table>
    </div>

    {{-- ─── Notes ────────────────────────────────────────────────── --}}
    @if($creditNote->notes)
    <div class="notes-block">
        <strong>Notes :</strong><br>
        {!! nl2br(e($creditNote->notes)) !!}
    </div>
    @endif

    {{-- ─── Signature ────────────────────────────────────────────── --}}
    @include('pdf.partials.signature')

</div>
</body>
</html>
