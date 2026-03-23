<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Reçu de paiement fournisseur {{ $supplierPayment->reference_number }}</title>
    @php
        $brandColor = $settings?->company_settings['brand_color'] ?? '#2c3e50';
        $accentColor = '#e67e22';
        $company = $settings?->company_settings ?? [];
    @endphp
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: DejaVu Sans, sans-serif; font-size: 11px; color: #333; line-height: 1.5; }
        .page { padding: 0; }

        /* ── Top band ────────────────────────────────────────── */
        .top-band {
            background: {{ $brandColor }};
            padding: 25px 40px;
        }
        .top-band-table { width: 100%; }
        .top-band-table td { vertical-align: middle; }
        .top-band .doc-title {
            font-size: 24px;
            font-weight: bold;
            color: #ffffff;
            letter-spacing: 3px;
            text-transform: uppercase;
        }
        .top-band .doc-subtitle {
            font-size: 14px;
            color: rgba(255,255,255,0.7);
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-top: 2px;
        }
        .top-band .doc-number {
            font-size: 11px;
            color: rgba(255,255,255,0.7);
            margin-top: 6px;
            letter-spacing: 1px;
        }
        .logo-box { text-align: right; }
        .logo-box img { height: 45px; }
        .logo-box .logo-text {
            color: #ffffff;
            font-size: 16px;
            font-weight: bold;
            letter-spacing: 1px;
            border: 2px solid rgba(255,255,255,0.5);
            padding: 8px 16px;
            display: inline-block;
        }

        /* ── Content ─────────────────────────────────────────── */
        .content { padding: 25px 40px 30px 40px; }

        /* ── Company + Meta row ──────────────────────────────── */
        .info-row { width: 100%; margin-bottom: 22px; }
        .info-row td { vertical-align: top; }
        .company-name { font-size: 13px; font-weight: bold; color: {{ $brandColor }}; margin-bottom: 3px; }
        .company-detail { font-size: 9px; color: #666; line-height: 1.8; }

        /* ── Meta card ───────────────────────────────────────── */
        .meta-card {
            border: 1px solid #ddd;
            border-top: 3px solid {{ $accentColor }};
            padding: 12px 15px;
        }
        .meta-card table { width: 100%; border-collapse: collapse; }
        .meta-card td { font-size: 10px; padding: 3px 0; }
        .meta-card td.m-label {
            font-weight: bold;
            color: {{ $brandColor }};
            text-transform: uppercase;
            letter-spacing: 0.4px;
            width: 50%;
        }
        .meta-card td.m-value { text-align: right; color: #444; }

        .badge { display: inline-block; padding: 3px 10px; border-radius: 3px; font-size: 9px; font-weight: bold; text-transform: uppercase; letter-spacing: 0.3px; }
        .badge-pending { background: #fff3cd; color: #664d03; }
        .badge-completed { background: #d1e7dd; color: #0f5132; }
        .badge-failed { background: #f8d7da; color: #842029; }

        /* ── Accent bar ──────────────────────────────────────── */
        .accent-bar {
            height: 3px;
            background: {{ $accentColor }};
            margin: 18px 0;
        }

        /* ── Supplier section ────────────────────────────────── */
        .supplier-table { width: 100%; margin-bottom: 22px; }
        .supplier-table td { vertical-align: top; font-size: 10px; line-height: 1.8; }
        .supplier-label {
            font-size: 9px;
            font-weight: bold;
            color: {{ $accentColor }};
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 5px;
            padding-bottom: 3px;
            border-bottom: 1px solid #eee;
        }
        .supplier-name { font-size: 12px; font-weight: bold; color: #222; margin: 4px 0 2px; }

        /* ── Amount bar ──────────────────────────────────────── */
        .amount-bar {
            background: {{ $brandColor }};
            padding: 12px 15px;
            margin-bottom: 20px;
        }
        .amount-bar table { width: 100%; }
        .amount-bar td { vertical-align: middle; }
        .amount-bar .a-label {
            font-size: 14px;
            font-weight: bold;
            color: #ffffff;
            letter-spacing: 2px;
            text-transform: uppercase;
        }
        .amount-bar .a-value {
            font-size: 20px;
            font-weight: bold;
            color: {{ $accentColor }};
            text-align: right;
        }

        /* ── Info table ───────────────────────────────────────── */
        .info-table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        .info-table td { padding: 8px 12px; font-size: 10px; border-bottom: 1px solid #eee; }
        .info-table td:first-child { font-weight: bold; color: {{ $brandColor }}; width: 35%; }

        /* ── Allocations ──────────────────────────────────────── */
        .allocations-table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        .allocations-table th {
            background: {{ $brandColor }};
            color: #ffffff;
            padding: 9px 10px;
            font-size: 9px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .allocations-table th:first-child { text-align: left; }
        .allocations-table td {
            padding: 9px 10px;
            font-size: 10px;
            border-bottom: 1px solid #eee;
        }
        .allocations-table tbody tr:nth-child(even) td { background: #fafafa; }
        .allocations-table tbody tr:last-child td { border-bottom: none; }
        .text-right { text-align: right; }

        /* ── Notes ────────────────────────────────────────────── */
        .notes-section { margin-top: 20px; }
        .notes-divider { height: 1px; background: #ddd; margin-bottom: 15px; }
        .notes-title {
            font-size: 9px;
            font-weight: bold;
            color: {{ $brandColor }};
            text-transform: uppercase;
            letter-spacing: 0.8px;
            margin-bottom: 5px;
        }
        .notes-detail { font-size: 10px; color: #555; line-height: 1.8; }

        /* ── Legal bar ───────────────────────────────────────── */
        .legal-bar {
            background: {{ $brandColor }};
            padding: 8px 40px;
            margin-top: 20px;
            font-size: 7px;
            color: rgba(255,255,255,0.7);
            text-align: center;
            letter-spacing: 0.3px;
        }
    </style>
</head>
<body>
<div class="page">

    {{-- ─── Top colored band ─────────────────────────────────────── --}}
    <div class="top-band">
        <table class="top-band-table">
            <tr>
                <td style="width: 65%;">
                    <div class="doc-title">Reçu de paiement</div>
                    <div class="doc-subtitle">Fournisseur</div>
                    @if($supplierPayment->reference_number)
                        <div class="doc-number">Réf {{ $supplierPayment->reference_number }}</div>
                    @endif
                </td>
                <td style="width: 35%;">
                    <div class="logo-box">
                        @if($tenant)
                            @php $logoPath = $tenant->getFirstMediaPath('logo'); @endphp
                            @if($logoPath && file_exists($logoPath))
                                <img src="{{ $logoPath }}" alt="logo">
                            @else
                                <span class="logo-text">LOGO</span>
                            @endif
                        @else
                            <span class="logo-text">LOGO</span>
                        @endif
                    </div>
                </td>
            </tr>
        </table>
    </div>

    <div class="content">

        {{-- ─── Company info + Meta card ─────────────────────────── --}}
        <table class="info-row">
            <tr>
                <td style="width: 55%;">
                    <div class="company-name">{{ $company['company_name'] ?? $tenant?->name ?? '' }}</div>
                    <div class="company-detail">
                        @if(!empty($company['address'])) {{ $company['address'] }}<br> @endif
                        @if(!empty($company['postal_code'])) {{ $company['postal_code'] }} @endif
                        @if(!empty($company['city'])) {{ $company['city'] }} @endif
                        @if(!empty($company['country'])) <br>{{ $company['country'] }} @endif
                        @if(!empty($company['phone'])) <br>Tél : {{ $company['phone'] }} @endif
                        @if(!empty($company['email'])) <br>{{ $company['email'] }} @endif
                    </div>
                </td>
                <td style="width: 45%;">
                    <div class="meta-card">
                        <table>
                            @if($supplierPayment->reference_number)
                            <tr>
                                <td class="m-label">Réf</td>
                                <td class="m-value">{{ $supplierPayment->reference_number }}</td>
                            </tr>
                            @endif
                            <tr>
                                <td class="m-label">Date</td>
                                <td class="m-value">{{ $supplierPayment->payment_date?->format('d/m/Y') }}</td>
                            </tr>
                            <tr>
                                <td class="m-label">Statut</td>
                                <td class="m-value"><span class="badge badge-{{ $supplierPayment->status }}">{{ ucfirst($supplierPayment->status) }}</span></td>
                            </tr>
                        </table>
                    </div>
                </td>
            </tr>
        </table>

        <div class="accent-bar"></div>

        {{-- ─── Supplier info ────────────────────────────────────── --}}
        <table class="supplier-table">
            <tr>
                <td>
                    <div class="supplier-label">Payé à</div>
                    <div class="supplier-name">{{ $supplierPayment->supplier?->name ?? '' }}</div>
                    @if($supplierPayment->supplier?->email) {{ $supplierPayment->supplier->email }}<br> @endif
                    @if($supplierPayment->supplier?->phone) {{ $supplierPayment->supplier->phone }} @endif
                </td>
            </tr>
        </table>

        {{-- ─── Amount bar ───────────────────────────────────────── --}}
        <div class="amount-bar">
            <table>
                <tr>
                    <td style="width: 50%;">
                        <span class="a-label">Montant payé</span>
                    </td>
                    <td style="width: 50%;">
                        <span class="a-value">{{ number_format($supplierPayment->amount, 2, ',', ' ') }} {{ $currency }}</span>
                    </td>
                </tr>
            </table>
        </div>

        {{-- ─── Payment info ─────────────────────────────────────── --}}
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

        {{-- ─── Allocations ──────────────────────────────────────── --}}
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

        {{-- ─── Notes ────────────────────────────────────────────── --}}
        @if($supplierPayment->notes)
        <div class="notes-section">
            <div class="notes-divider"></div>
            <div class="notes-title">Notes</div>
            <div class="notes-detail">
                {!! nl2br(e($supplierPayment->notes)) !!}
            </div>
        </div>
        @endif

        {{-- ─── Signature ────────────────────────────────────────── --}}
        @include('pdf.partials.signature')

    </div>{{-- /content --}}

    {{-- ─── Legal footer bar ─────────────────────────────────────── --}}
    @if(!empty($company['forme_juridique']) || !empty($company['tax_id']) || !empty($company['ice']) || !empty($company['rc']))
    <div class="legal-bar">
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
