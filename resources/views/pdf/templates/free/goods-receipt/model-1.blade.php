<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Bon de réception {{ $goodsReceipt->number }}</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: DejaVu Sans, sans-serif; font-size: 11px; color: #333; line-height: 1.5; }
        .page { padding: 30px 40px; }

        /* Header */
        .header-table { width: 100%; margin-bottom: 30px; }
        .header-table td { vertical-align: top; }
        .company-name { font-size: 20px; font-weight: bold; margin-bottom: 6px; }
        .company-detail { font-size: 10px; color: #333; line-height: 1.6; }
        .doc-title { font-size: 24px; font-weight: bold; text-align: right; }

        /* Info block */
        .info-table { width: 100%; margin-bottom: 30px; }
        .info-table td { vertical-align: top; font-size: 10px; line-height: 1.7; }
        .info-label { font-weight: bold; font-size: 11px; margin-bottom: 4px; }
        .meta-table { width: 100%; }
        .meta-table td { font-size: 10px; padding: 1px 0; }
        .meta-table td:first-child { font-weight: bold; text-align: left; padding-right: 10px; }
        .meta-table td:last-child { text-align: right; }

        /* Status badge */
        .badge { display: inline-block; padding: 2px 8px; border-radius: 3px; font-size: 9px; font-weight: bold; text-transform: uppercase; letter-spacing: 0.3px; }
        .badge-draft { background: #e9ecef; color: #495057; }
        .badge-received { background: #d1e7dd; color: #0f5132; }
        .badge-cancelled { background: #e9ecef; color: #6c757d; }

        /* Items table */
        .items-table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        .items-table th {
            background: #e8d44d;
            color: #333;
            padding: 8px 10px;
            font-size: 10px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 0.3px;
            border: 1px solid #ccc;
        }
        .items-table td {
            padding: 8px 10px;
            border: 1px solid #ccc;
            font-size: 10px;
        }
        .text-right { text-align: right; }
        .text-center { text-align: center; }

        /* Footer */
        .footer-section { margin-top: 40px; position: relative; }
        .payment-conditions { font-size: 10px; line-height: 1.7; }
        .payment-conditions strong { font-size: 11px; }
        .separator { border: none; border-top: 1px solid #e9ecef; margin: 15px 0; }
    </style>
</head>
<body>
<div class="page">

    {{-- ─── Header: Company name + BON DE RÉCEPTION ────────────────── --}}
    <table class="header-table">
        <tr>
            <td style="width: 60%;">
                @if($tenant)
                    @php
                        $logoPath = $tenant->getFirstMediaPath('logo');
                    @endphp
                    @if($logoPath && file_exists($logoPath))
                        <img src="{{ $logoPath }}" height="50" alt="logo" style="margin-bottom: 8px;"><br>
                    @endif
                @endif
                @php
                    $company = $settings?->company_settings ?? [];
                @endphp
                <div class="company-name">{{ $company['company_name'] ?? $tenant?->name ?? '' }}</div>
                <div class="company-detail">
                    @if(!empty($company['address'])) {{ $company['address'] }}<br> @endif
                    @if(!empty($company['postal_code'])) {{ $company['postal_code'] }} @endif
                    @if(!empty($company['city'])) {{ $company['city'] }} @endif
                    @if(!empty($company['country'])) <br>{{ $company['country'] }} @endif
                </div>
            </td>
            <td style="width: 40%;">
                <div class="doc-title">BON DE RÉCEPTION</div>
            </td>
        </tr>
    </table>

    {{-- ─── Info block: Supplier/PO info left, Meta right ──────────── --}}
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
                        <td>N°</td>
                        <td>{{ $goodsReceipt->number }}</td>
                    </tr>
                    @if($goodsReceipt->received_at)
                    <tr>
                        <td>Date</td>
                        <td>{{ $goodsReceipt->received_at->format('d/m/Y') }}</td>
                    </tr>
                    @endif
                    @if($goodsReceipt->reference_number)
                    <tr>
                        <td>Réf</td>
                        <td>{{ $goodsReceipt->reference_number }}</td>
                    </tr>
                    @endif
                    <tr>
                        <td>Statut</td>
                        <td><span class="badge badge-{{ $goodsReceipt->status }}">{{ str_replace('_', ' ', ucfirst($goodsReceipt->status)) }}</span></td>
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
    <div class="footer-section">
        <hr class="separator">
        <div class="payment-conditions">
            <strong>Notes :</strong><br>
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
