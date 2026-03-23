<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Reçu de paiement fournisseur {{ $supplierPayment->reference_number }}</title>
    @php
        $company = $settings?->company_settings ?? [];
    @endphp
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: DejaVu Sans, sans-serif; font-size: 11px; color: #222; line-height: 1.5; }
        .page { padding: 30px 40px; }

        /* ── Hatching decoration ─────────────────────────────── */
        .hatching {
            width: 200px;
            height: 20px;
            margin-bottom: 5px;
            background: repeating-linear-gradient(
                -45deg,
                #222,
                #222 1px,
                transparent 1px,
                transparent 5px
            );
        }

        /* ── Header ──────────────────────────────────────────── */
        .header-table { width: 100%; margin-bottom: 20px; }
        .header-table td { vertical-align: top; }
        .doc-title {
            font-size: 30px;
            font-weight: bold;
            font-style: italic;
            color: #222;
            margin-bottom: 3px;
        }
        .doc-subtitle {
            font-size: 16px;
            font-weight: bold;
            font-style: italic;
            color: #444;
        }
        .logo-circle {
            width: 65px;
            height: 65px;
            border-radius: 50%;
            background: #666;
            display: inline-block;
            text-align: center;
            line-height: 65px;
            overflow: hidden;
        }
        .logo-circle img {
            height: 38px;
            vertical-align: middle;
        }
        .logo-placeholder {
            color: #ffffff;
            font-size: 13px;
            font-weight: bold;
            letter-spacing: 1px;
        }

        /* ── Info section ────────────────────────────────────── */
        .info-section { width: 100%; margin-bottom: 18px; }
        .info-section td { vertical-align: top; font-size: 10px; line-height: 1.7; }
        .info-label {
            font-weight: bold;
            font-size: 10px;
            color: #222;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 4px;
        }
        .company-name { font-size: 12px; font-weight: bold; color: #222; margin-bottom: 2px; }
        .company-detail { font-size: 10px; color: #444; line-height: 1.7; }

        /* ── Meta table ──────────────────────────────────────── */
        .meta-table { width: 100%; }
        .meta-table td { font-size: 11px; padding: 2px 0; }
        .meta-table td.meta-label {
            font-weight: bold;
            color: #222;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            text-align: right;
            padding-right: 12px;
        }
        .meta-table td.meta-value {
            text-align: right;
            color: #444;
        }

        .badge { display: inline-block; padding: 3px 10px; border-radius: 3px; font-size: 9px; font-weight: bold; text-transform: uppercase; letter-spacing: 0.3px; }
        .badge-pending { background: #fff3cd; color: #664d03; }
        .badge-completed { background: #d1e7dd; color: #0f5132; }
        .badge-failed { background: #f8d7da; color: #842029; }

        /* ── Supplier block ──────────────────────────────────── */
        .supplier-block { margin-bottom: 20px; }
        .supplier-block .name { font-size: 13px; font-weight: bold; margin-bottom: 2px; }
        .supplier-block .detail { font-size: 10px; color: #444; }

        /* ── Info table ───────────────────────────────────────── */
        .info-table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        .info-table td { padding: 8px 12px; font-size: 10px; border-bottom: 1px solid #ddd; }
        .info-table td:first-child { font-weight: bold; color: #222; width: 35%; }

        /* ── Amount box ──────────────────────────────────────── */
        .amount-box {
            border: 2px solid #222;
            padding: 15px;
            margin: 20px 0;
        }
        .amount-box-table { width: 100%; }
        .amount-box-table td { vertical-align: middle; }
        .amount-label {
            font-size: 14px;
            font-weight: bold;
            color: #222;
            letter-spacing: 2px;
            text-transform: uppercase;
        }
        .amount-value {
            font-size: 22px;
            font-weight: bold;
            color: #222;
            text-align: right;
        }

        /* ── Allocations ─────────────────────────────────────── */
        .allocations-table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        .allocations-table th {
            padding: 8px 10px;
            font-size: 10px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 0.3px;
            color: #222;
            background: none;
            border-top: 2px solid #222;
            border-bottom: 1px solid #222;
        }
        .allocations-table th:first-child { text-align: left; }
        .allocations-table td {
            padding: 8px 10px;
            font-size: 10px;
            border-bottom: 1px solid #ddd;
        }
        .allocations-table tbody tr:last-child td {
            border-bottom: 2px solid #222;
        }
        .text-right { text-align: right; }

        /* ── Notes ────────────────────────────────────────────── */
        .notes-block { margin-top: 25px; font-size: 10px; color: #444; }
        .notes-title {
            font-size: 11px;
            font-weight: bold;
            color: #222;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            margin-bottom: 8px;
        }
    </style>
</head>
<body>
<div class="page">

    {{-- ─── Hatching decoration + Title + Logo ───────────────────── --}}
    <table class="header-table">
        <tr>
            <td style="width: 70%;">
                <div class="hatching"></div>
                <div class="doc-title">reçu de paiement</div>
                <div class="doc-subtitle">fournisseur</div>
            </td>
            <td style="width: 30%; text-align: right;">
                @if($tenant)
                    @php $logoPath = $tenant->getFirstMediaPath('logo'); @endphp
                    @if($logoPath && file_exists($logoPath))
                        <div class="logo-circle">
                            <img src="{{ $logoPath }}" alt="logo">
                        </div>
                    @else
                        <div class="logo-circle" style="float: right;">
                            <span class="logo-placeholder">LOGO</span>
                        </div>
                    @endif
                @else
                    <div class="logo-circle" style="float: right;">
                        <span class="logo-placeholder">LOGO</span>
                    </div>
                @endif
            </td>
        </tr>
    </table>

    {{-- ─── DE (company) + Meta ──────────────────────────────────── --}}
    <table class="info-section">
        <tr>
            <td style="width: 50%;">
                <div class="info-label">DE</div>
                <div class="company-name">{{ $company['company_name'] ?? $tenant?->name ?? '' }}</div>
                <div class="company-detail">
                    @if(!empty($company['address'])) {{ $company['address'] }}<br> @endif
                    @if(!empty($company['postal_code'])) {{ $company['postal_code'] }} @endif
                    @if(!empty($company['city'])) {{ $company['city'] }} @endif
                    @if(!empty($company['phone'])) <br>Tél : {{ $company['phone'] }} @endif
                    @if(!empty($company['email'])) <br>{{ $company['email'] }} @endif
                </div>
            </td>
            <td style="width: 50%;">
                <table class="meta-table">
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

    {{-- ─── Supplier info ────────────────────────────────────────── --}}
    <div class="supplier-block">
        <div class="info-label">Payé à</div>
        <div class="name">{{ $supplierPayment->supplier?->name ?? '' }}</div>
        <div class="detail">
            @if($supplierPayment->supplier?->email) {{ $supplierPayment->supplier->email }}<br> @endif
            @if($supplierPayment->supplier?->phone) {{ $supplierPayment->supplier->phone }} @endif
        </div>
    </div>

    {{-- ─── Amount (bordered box) ────────────────────────────────── --}}
    <div class="amount-box">
        <table class="amount-box-table">
            <tr>
                <td style="width: 50%;">
                    <span class="amount-label">Montant payé</span>
                </td>
                <td style="width: 50%;">
                    <span class="amount-value">{{ number_format($supplierPayment->amount, 2, ',', ' ') }} {{ $currency }}</span>
                </td>
            </tr>
        </table>
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
        <div class="notes-title">Notes</div>
        {!! nl2br(e($supplierPayment->notes)) !!}
    </div>
    @endif

    {{-- ─── Signature ────────────────────────────────────────────── --}}
    @include('pdf.partials.signature')

    {{-- ─── Legal info footer ────────────────────────────────────── --}}
    @if(!empty($company['forme_juridique']) || !empty($company['tax_id']) || !empty($company['ice']) || !empty($company['rc']))
    <div style="margin-top: 15px; font-size: 8px; color: #888; text-align: center; border-top: 1px solid #ddd; padding-top: 8px;">
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
