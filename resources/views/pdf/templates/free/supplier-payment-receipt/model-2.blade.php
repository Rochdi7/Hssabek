<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Reçu de paiement fournisseur {{ $supplierPayment->reference_number }}</title>
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
            font-size: 32px;
            font-weight: bold;
            color: {{ $brandColor }};
            letter-spacing: 2px;
            font-style: italic;
            margin-bottom: 5px;
        }
        .doc-subtitle {
            font-size: 16px;
            font-weight: bold;
            color: {{ $brandColor }};
            font-style: italic;
            letter-spacing: 1px;
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

        /* ── Supplier info ────────────────────────────────────── */
        .supplier-block {
            border-left: 3px solid {{ $brandColor }};
            padding: 10px 15px;
            margin-bottom: 20px;
            background: #f8f9fa;
        }
        .supplier-block .label {
            font-weight: bold;
            font-size: 10px;
            color: {{ $brandColor }};
            text-transform: uppercase;
            letter-spacing: 0.8px;
            margin-bottom: 5px;
        }
        .supplier-block .name { font-size: 13px; font-weight: bold; margin-bottom: 2px; }
        .supplier-block .detail { font-size: 10px; color: #555; }

        /* ── Meta ─────────────────────────────────────────────── */
        .meta-table { width: 100%; border-top: 2px solid {{ $brandColor }}; padding-top: 12px; margin-bottom: 20px; }
        .meta-table td { vertical-align: top; font-size: 10px; line-height: 1.8; }
        .meta-label {
            font-weight: bold;
            font-size: 10px;
            color: {{ $brandColor }};
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding-right: 8px;
        }
        .meta-value { text-align: right; color: #333; }

        .badge { display: inline-block; padding: 3px 10px; border-radius: 3px; font-size: 9px; font-weight: bold; text-transform: uppercase; letter-spacing: 0.3px; }
        .badge-pending { background: #fff3cd; color: #664d03; }
        .badge-completed { background: #d1e7dd; color: #0f5132; }
        .badge-failed { background: #f8d7da; color: #842029; }

        /* ── Amount ───────────────────────────────────────────── */
        .amount-box {
            text-align: center;
            margin: 25px 0;
            padding: 20px;
            background: #fff;
            border: 2px solid {{ $accentColor }};
            border-radius: 6px;
        }
        .amount-box .label { font-size: 10px; text-transform: uppercase; color: #888; letter-spacing: 0.5px; margin-bottom: 5px; }
        .amount-box .amount { font-size: 28px; font-weight: bold; color: {{ $accentColor }}; }

        /* ── Info table ───────────────────────────────────────── */
        .info-table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        .info-table td { padding: 8px 12px; font-size: 10px; border-bottom: 1px solid #eee; }
        .info-table td:first-child { font-weight: bold; color: {{ $brandColor }}; width: 35%; }

        /* ── Allocations ──────────────────────────────────────── */
        .allocations-table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        .allocations-table th {
            color: {{ $brandColor }};
            padding: 10px 10px;
            font-size: 10px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 0.4px;
            border-top: 2px solid {{ $brandColor }};
            border-bottom: 2px solid {{ $accentColor }};
        }
        .allocations-table th:first-child { text-align: left; }
        .allocations-table td { padding: 8px 10px; border-bottom: 1px solid #e9ecef; font-size: 10px; }
        .text-right { text-align: right; }

        /* ── Notes ────────────────────────────────────────────── */
        .notes-block {
            margin-top: 25px;
            padding: 10px 15px;
            border-left: 3px solid {{ $accentColor }};
            font-size: 10px;
            color: #555;
        }
        .notes-block strong { color: #333; }

        /* ── Footer ───────────────────────────────────────────── */
        .merci-text {
            font-size: 36px;
            font-weight: bold;
            font-style: italic;
            color: {{ $brandColor }};
        }
    </style>
</head>
<body>
<div class="page">

    {{-- ─── Header: Title + Logo ─────────────────────────────────── --}}
    <table class="header-table">
        <tr>
            <td style="width: 70%;">
                <div class="doc-title">REÇU DE PAIEMENT</div>
                <div class="doc-subtitle">FOURNISSEUR</div>
                <div style="margin-top: 12px;">
                    <div class="company-name">{{ $company['company_name'] ?? $tenant?->name ?? '' }}</div>
                    <div class="company-detail">
                        @if(!empty($company['address'])) {{ $company['address'] }}<br> @endif
                        @if(!empty($company['postal_code'])) {{ $company['postal_code'] }} @endif
                        @if(!empty($company['city'])) {{ $company['city'] }} @endif
                    </div>
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

    {{-- ─── Meta + Supplier ──────────────────────────────────────── --}}
    <table class="meta-table">
        <tr>
            <td style="width: 50%;">
                <div class="supplier-block">
                    <div class="label">Payé à</div>
                    <div class="name">{{ $supplierPayment->supplier?->name ?? '' }}</div>
                    <div class="detail">
                        @if($supplierPayment->supplier?->email) {{ $supplierPayment->supplier->email }}<br> @endif
                        @if($supplierPayment->supplier?->phone) {{ $supplierPayment->supplier->phone }} @endif
                    </div>
                </div>
            </td>
            <td style="width: 50%;">
                <table style="width: 100%;">
                    @if($supplierPayment->reference_number)
                    <tr>
                        <td class="meta-label">Réf</td>
                        <td class="meta-value">{{ $supplierPayment->reference_number }}</td>
                    </tr>
                    @endif
                    <tr>
                        <td class="meta-label">Date</td>
                        <td class="meta-value">{{ $supplierPayment->payment_date?->format('d/m/Y') }}</td>
                    </tr>
                    <tr>
                        <td class="meta-label">Statut</td>
                        <td class="meta-value"><span class="badge badge-{{ $supplierPayment->status }}">{{ ucfirst($supplierPayment->status) }}</span></td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

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

    {{-- ─── Footer: Merci ────────────────────────────────────────── --}}
    <div style="margin-top: 30px;">
        <div class="merci-text">Merci</div>
    </div>

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
