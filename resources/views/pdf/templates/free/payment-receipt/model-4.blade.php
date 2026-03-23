<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Reçu de paiement {{ $payment->reference_number }}</title>
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
            position: relative;
        }
        .top-band-table { width: 100%; }
        .top-band-table td { vertical-align: middle; }
        .top-band .doc-title {
            font-size: 28px;
            font-weight: bold;
            color: #ffffff;
            letter-spacing: 4px;
            text-transform: uppercase;
        }
        .top-band .doc-number {
            font-size: 12px;
            color: rgba(255,255,255,0.7);
            margin-top: 4px;
            letter-spacing: 1px;
        }
        .logo-box {
            text-align: right;
        }
        .logo-box img {
            height: 45px;
        }
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

        /* ── Accent bar ──────────────────────────────────────── */
        .accent-bar {
            height: 3px;
            background: {{ $accentColor }};
            margin: 18px 0;
        }

        /* ── Badge ───────────────────────────────────────────── */
        .badge { display: inline-block; padding: 3px 10px; border-radius: 3px; font-size: 9px; font-weight: bold; text-transform: uppercase; letter-spacing: 0.3px; }
        .badge-pending { background: #fff3cd; color: #664d03; }
        .badge-completed { background: #d1e7dd; color: #0f5132; }
        .badge-failed { background: #f8d7da; color: #842029; }

        /* ── Customer section ────────────────────────────────── */
        .customer-table { width: 100%; margin-bottom: 22px; }
        .customer-table td { vertical-align: top; font-size: 10px; line-height: 1.8; }
        .customer-label {
            font-size: 9px;
            font-weight: bold;
            color: {{ $accentColor }};
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 5px;
            padding-bottom: 3px;
            border-bottom: 1px solid #eee;
        }
        .customer-name { font-size: 12px; font-weight: bold; color: #222; margin: 4px 0 2px; }

        /* ── Amount bar ──────────────────────────────────────── */
        .amount-bar {
            background: {{ $brandColor }};
            padding: 10px 15px;
            margin-bottom: 20px;
        }
        .amount-bar table { width: 100%; }
        .amount-bar td { vertical-align: middle; }
        .amount-bar .ab-label {
            font-size: 14px;
            font-weight: bold;
            color: #ffffff;
            letter-spacing: 2px;
            text-transform: uppercase;
        }
        .amount-bar .ab-value {
            font-size: 18px;
            font-weight: bold;
            color: {{ $accentColor }};
            text-align: right;
        }

        /* ── Payment info table ──────────────────────────────── */
        .info-table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        .info-table td { padding: 8px 10px; font-size: 10px; border-bottom: 1px solid #eee; }
        .info-table td.i-label { font-weight: bold; color: #555; width: 35%; }

        /* ── Allocations table ───────────────────────────────── */
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

        /* ── Footer ──────────────────────────────────────────── */
        .footer-section { margin-top: 30px; }
        .footer-divider {
            height: 1px;
            background: #ddd;
            margin-bottom: 15px;
        }
        .footer-title {
            font-size: 9px;
            font-weight: bold;
            color: {{ $brandColor }};
            text-transform: uppercase;
            letter-spacing: 0.8px;
            margin-bottom: 5px;
        }
        .footer-detail {
            font-size: 10px;
            color: #555;
            line-height: 1.8;
        }

        /* ── Legal ───────────────────────────────────────────── */
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

    {{-- ─── Top colored band ───────────────────────────────────────── --}}
    <div class="top-band">
        <table class="top-band-table">
            <tr>
                <td style="width: 65%;">
                    <div class="doc-title">Reçu de paiement</div>
                    @if($payment->reference_number)
                    <div class="doc-number">Réf {{ $payment->reference_number }}</div>
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

        {{-- ─── Company info + Meta card ───────────────────────────── --}}
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
                            @if($payment->reference_number)
                            <tr>
                                <td class="m-label">Réf</td>
                                <td class="m-value">{{ $payment->reference_number }}</td>
                            </tr>
                            @endif
                            <tr>
                                <td class="m-label">Date</td>
                                <td class="m-value">{{ $payment->payment_date?->format('d/m/Y') }}</td>
                            </tr>
                            <tr>
                                <td class="m-label">Statut</td>
                                <td class="m-value"><span class="badge badge-{{ $payment->status }}">{{ ucfirst($payment->status) }}</span></td>
                            </tr>
                        </table>
                    </div>
                </td>
            </tr>
        </table>

        <div class="accent-bar"></div>

        {{-- ─── Reçu de (customer) ─────────────────────────────────── --}}
        <table class="customer-table">
            <tr>
                <td>
                    <div class="customer-label">Reçu de</div>
                    <div class="customer-name">{{ $payment->customer?->name ?? '' }}</div>
                    @if($payment->customer?->email) {{ $payment->customer->email }}<br> @endif
                    @if($payment->customer?->phone) {{ $payment->customer->phone }} @endif
                </td>
            </tr>
        </table>

        {{-- ─── Amount bar ─────────────────────────────────────────── --}}
        <div class="amount-bar">
            <table>
                <tr>
                    <td style="width: 50%;">
                        <span class="ab-label">Montant reçu</span>
                    </td>
                    <td style="width: 50%;">
                        <span class="ab-value">{{ number_format($payment->amount, 2, ',', ' ') }} {{ $currency }}</span>
                    </td>
                </tr>
            </table>
        </div>

        {{-- ─── Payment info table ─────────────────────────────────── --}}
        <table class="info-table">
            <tr>
                <td class="i-label">Mode de paiement</td>
                <td>{{ $payment->paymentMethod?->name ?? '—' }}</td>
            </tr>
            @if($payment->provider_payment_id)
            <tr>
                <td class="i-label">Référence transaction</td>
                <td>{{ $payment->provider_payment_id }}</td>
            </tr>
            @endif
            @if($payment->paid_at)
            <tr>
                <td class="i-label">Payé le</td>
                <td>{{ $payment->paid_at->format('d/m/Y à H:i') }}</td>
            </tr>
            @endif
        </table>

        {{-- ─── Allocations (invoices covered) ─────────────────────── --}}
        @if($payment->allocations->count())
        <table class="allocations-table">
            <thead>
                <tr>
                    <th>Facture</th>
                    <th class="text-right">Montant alloué</th>
                </tr>
            </thead>
            <tbody>
                @foreach($payment->allocations as $alloc)
                <tr>
                    <td>{{ $alloc->invoice?->number ?? '—' }}</td>
                    <td class="text-right">{{ number_format($alloc->amount, 2, ',', ' ') }} {{ $currency }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif

        {{-- ─── Signature ──────────────────────────────────────────── --}}
        @include('pdf.partials.signature')

        {{-- ─── Footer: Notes ──────────────────────────────────────── --}}
        @if($payment->notes)
        <div class="footer-section">
            <div class="footer-divider"></div>
            <div class="footer-title">Notes</div>
            <div class="footer-detail">
                {!! nl2br(e($payment->notes)) !!}
            </div>
        </div>
        @endif

    </div>{{-- /content --}}

    {{-- ─── Legal footer bar ───────────────────────────────────────── --}}
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
