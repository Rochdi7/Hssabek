<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Facture fournisseur {{ $vendorBill->number }}</title>
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
        .badge-received { background: #cff4fc; color: #055160; }
        .badge-paid { background: #d1e7dd; color: #0f5132; }
        .badge-partial { background: #fff3cd; color: #664d03; }
        .badge-overdue { background: #f8d7da; color: #842029; }
        .badge-void { background: #e9ecef; color: #6c757d; }

        .info-table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        .info-table td { padding: 6px 10px; font-size: 10px; border-bottom: 1px solid #eee; }
        .info-table td:first-child { font-weight: bold; color: #555; width: 35%; }

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
                <div class="doc-title">FACTURE FOURNISSEUR</div>
                <div class="doc-meta">
                    <strong>N°</strong> {{ $vendorBill->number }}<br>
                    <strong>Date :</strong> {{ $vendorBill->issue_date?->format('d/m/Y') }}<br>
                    @if($vendorBill->due_date)
                        <strong>Échéance :</strong> {{ $vendorBill->due_date->format('d/m/Y') }}<br>
                    @endif
                    @if($vendorBill->reference_number)
                        <strong>Réf :</strong> {{ $vendorBill->reference_number }}<br>
                    @endif
                    <span class="badge badge-{{ $vendorBill->status }}">{{ str_replace('_', ' ', ucfirst($vendorBill->status)) }}</span>
                </div>
            </td>
        </tr>
    </table>

    {{-- ─── Supplier ─────────────────────────────────────────────── --}}
    <div class="supplier-block">
        <div class="label">Fournisseur</div>
        <div class="name">{{ $vendorBill->supplier?->name ?? '' }}</div>
        <div class="detail">
            @if($vendorBill->supplier?->email) {{ $vendorBill->supplier->email }}<br> @endif
            @if($vendorBill->supplier?->phone) {{ $vendorBill->supplier->phone }}<br> @endif
            @if($vendorBill->supplier?->tax_id) IF : {{ $vendorBill->supplier->tax_id }} @endif
        </div>
    </div>

    {{-- ─── Summary info ─────────────────────────────────────────── --}}
    <table class="info-table">
        @if($vendorBill->purchaseOrder)
        <tr>
            <td>Bon de commande</td>
            <td>{{ $vendorBill->purchaseOrder->number }}</td>
        </tr>
        @endif
        @if($vendorBill->goodsReceipt)
        <tr>
            <td>Bon de réception</td>
            <td>{{ $vendorBill->goodsReceipt->number }}</td>
        </tr>
        @endif
    </table>

    {{-- ─── Totals ─────────────────────────────────────────────── --}}
    <div class="totals-wrapper">
        <table class="totals-table">
            <tr>
                <td>Sous-total</td>
                <td class="text-right">{{ number_format($vendorBill->subtotal, 2, ',', ' ') }} {{ $currency }}</td>
            </tr>
            <tr>
                <td>TVA</td>
                <td class="text-right">{{ number_format($vendorBill->tax_total, 2, ',', ' ') }} {{ $currency }}</td>
            </tr>
            @if($vendorBill->round_off != 0)
            <tr>
                <td>Arrondi</td>
                <td class="text-right">{{ number_format($vendorBill->round_off, 2, ',', ' ') }} {{ $currency }}</td>
            </tr>
            @endif
            <tr class="total-row">
                <td>Total TTC</td>
                <td class="text-right">{{ number_format($vendorBill->total, 2, ',', ' ') }} {{ $currency }}</td>
            </tr>
            @if($vendorBill->amount_paid > 0)
            <tr>
                <td>Montant payé</td>
                <td class="text-right">{{ number_format($vendorBill->amount_paid, 2, ',', ' ') }} {{ $currency }}</td>
            </tr>
            <tr>
                <td><strong>Solde dû</strong></td>
                <td class="text-right"><strong>{{ number_format($vendorBill->amount_due, 2, ',', ' ') }} {{ $currency }}</strong></td>
            </tr>
            @endif
        </table>
    </div>

    {{-- ─── Notes ────────────────────────────────────────────────── --}}
    @if($vendorBill->notes)
    <div class="notes-block">
        <strong>Notes :</strong><br>
        {!! nl2br(e($vendorBill->notes)) !!}
    </div>
    @endif

    {{-- ─── Signature ────────────────────────────────────────────── --}}
    @include('pdf.partials.signature')

</div>
</body>
</html>
