<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Reçu de paiement fournisseur {{ $supplierPayment->reference_number }}</title>
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
        .badge-pending { background: #fff3cd; color: #664d03; }
        .badge-completed { background: #d1e7dd; color: #0f5132; }
        .badge-failed { background: #f8d7da; color: #842029; }

        .amount-box { text-align: center; margin: 25px 0; padding: 20px; background: #f8f9fa; border: 2px solid {{ $settings?->company_settings['brand_color'] ?? '#2563eb' }}; border-radius: 6px; }
        .amount-box .label { font-size: 10px; text-transform: uppercase; color: #888; letter-spacing: 0.5px; margin-bottom: 5px; }
        .amount-box .amount { font-size: 28px; font-weight: bold; color: {{ $settings?->company_settings['brand_color'] ?? '#2563eb' }}; }

        .info-table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        .info-table td { padding: 8px 12px; font-size: 10px; border-bottom: 1px solid #eee; }
        .info-table td:first-child { font-weight: bold; color: #555; width: 35%; }

        .allocations-table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        .allocations-table th { background: {{ $settings?->company_settings['brand_color'] ?? '#2563eb' }}; color: #fff; padding: 8px 10px; font-size: 10px; text-transform: uppercase; letter-spacing: 0.3px; }
        .allocations-table th:first-child { text-align: left; border-radius: 4px 0 0 0; }
        .allocations-table th:last-child { border-radius: 0 4px 0 0; }
        .allocations-table td { padding: 8px 10px; border-bottom: 1px solid #eee; font-size: 10px; }
        .text-right { text-align: right; }

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
                <div class="doc-title">REÇU DE PAIEMENT<br><span style="font-size: 14px;">FOURNISSEUR</span></div>
                <div class="doc-meta">
                    @if($supplierPayment->reference_number)
                        <strong>Réf :</strong> {{ $supplierPayment->reference_number }}<br>
                    @endif
                    <strong>Date :</strong> {{ $supplierPayment->payment_date?->format('d/m/Y') }}<br>
                    <span class="badge badge-{{ $supplierPayment->status }}">{{ ucfirst($supplierPayment->status) }}</span>
                </div>
            </td>
        </tr>
    </table>

    {{-- ─── Supplier ─────────────────────────────────────────────── --}}
    <div class="supplier-block">
        <div class="label">Payé à</div>
        <div class="name">{{ $supplierPayment->supplier?->name ?? '' }}</div>
        <div class="detail">
            @if($supplierPayment->supplier?->email) {{ $supplierPayment->supplier->email }}<br> @endif
            @if($supplierPayment->supplier?->phone) {{ $supplierPayment->supplier->phone }} @endif
        </div>
    </div>

    {{-- ─── Amount ─────────────────────────────────────────────── --}}
    <div class="amount-box">
        <div class="label">Montant payé</div>
        <div class="amount">{{ number_format($supplierPayment->amount, 2, ',', ' ') }} {{ $currency }}</div>
    </div>

    {{-- ─── Payment info ─────────────────────────────────────────── --}}
    <table class="info-table">
        <tr>
            <td>Mode de paiement</td>
            <td>{{ $supplierPayment->paymentMethod?->name ?? '—' }}</td>
        </tr>
        @if($supplierPayment->vendorBill)
        <tr>
            <td>Facture fournisseur</td>
            <td>{{ $supplierPayment->vendorBill->number }}</td>
        </tr>
        @endif
        @if($supplierPayment->paid_at)
        <tr>
            <td>Payé le</td>
            <td>{{ $supplierPayment->paid_at->format('d/m/Y à H:i') }}</td>
        </tr>
        @endif
    </table>

    {{-- ─── Allocations ──────────────────────────────────────────── --}}
    @if($supplierPayment->allocations->count())
    <table class="allocations-table">
        <thead>
            <tr>
                <th>Facture fournisseur</th>
                <th class="text-right">Montant alloué</th>
            </tr>
        </thead>
        <tbody>
            @foreach($supplierPayment->allocations as $alloc)
            <tr>
                <td>{{ $alloc->vendorBill?->number ?? '—' }}</td>
                <td class="text-right">{{ number_format($alloc->amount, 2, ',', ' ') }} {{ $currency }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif

    {{-- ─── Notes ────────────────────────────────────────────────── --}}
    @if($supplierPayment->notes)
    <div class="notes-block">
        <strong>Notes :</strong><br>
        {!! nl2br(e($supplierPayment->notes)) !!}
    </div>
    @endif

    {{-- ─── Signature ────────────────────────────────────────────── --}}
    @include('pdf.partials.signature')

</div>
</body>
</html>
