<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Reçu de paiement {{ $payment->reference_number }}</title>
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
            font-size: 36px;
            font-weight: bold;
            color: {{ $brandColor }};
            letter-spacing: 3px;
            font-style: italic;
            margin-bottom: 15px;
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

        /* ── Info section ───────────────────────────────────────── */
        .info-table { width: 100%; margin-bottom: 25px; border-top: 2px solid {{ $brandColor }}; padding-top: 12px; }
        .info-table td { vertical-align: top; font-size: 10px; line-height: 1.8; }
        .info-label {
            font-weight: bold;
            font-size: 10px;
            color: {{ $brandColor }};
            text-transform: uppercase;
            letter-spacing: 0.8px;
            margin-bottom: 5px;
        }
        .meta-table { width: 100%; }
        .meta-table td { font-size: 10px; padding: 2px 0; }
        .meta-table td.meta-label {
            font-weight: bold;
            color: {{ $brandColor }};
            text-transform: uppercase;
            letter-spacing: 0.5px;
            text-align: left;
            padding-right: 8px;
        }
        .meta-table td.meta-value {
            text-align: right;
            color: #333;
        }

        /* ── Badge ──────────────────────────────────────────────── */
        .badge { display: inline-block; padding: 3px 10px; border-radius: 3px; font-size: 9px; font-weight: bold; text-transform: uppercase; letter-spacing: 0.3px; }
        .badge-pending { background: #fff3cd; color: #664d03; }
        .badge-completed { background: #d1e7dd; color: #0f5132; }
        .badge-failed { background: #f8d7da; color: #842029; }

        /* ── Amount box ─────────────────────────────────────────── */
        .amount-box {
            text-align: center;
            margin: 25px 0;
            padding: 20px;
            border-left: 4px solid {{ $accentColor }};
            background: #f8f9fa;
        }
        .amount-box .label {
            font-size: 10px;
            text-transform: uppercase;
            color: {{ $accentColor }};
            letter-spacing: 0.8px;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .amount-box .amount {
            font-size: 28px;
            font-weight: bold;
            color: {{ $brandColor }};
        }

        /* ── Payment info rows ──────────────────────────────────── */
        .info-rows { width: 100%; margin-bottom: 20px; }
        .info-rows td { padding: 6px 10px; font-size: 10px; border-bottom: 1px solid #eee; }
        .info-rows td.row-label {
            font-weight: bold;
            color: {{ $brandColor }};
            width: 35%;
        }

        /* ── Allocations table ──────────────────────────────────── */
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
        .allocations-table td {
            padding: 10px 10px;
            font-size: 10px;
            border-bottom: 1px solid #e9ecef;
        }
        .text-right { text-align: right; }

        /* ── Footer ───────────────────────────────────────────── */
        .footer-table { width: 100%; margin-top: 40px; }
        .footer-table td { vertical-align: top; }
        .merci-text {
            font-size: 36px;
            font-weight: bold;
            font-style: italic;
            color: {{ $brandColor }};
        }
        .conditions-box {
            border-left: 3px solid {{ $accentColor }};
            padding-left: 12px;
        }
        .conditions-title {
            font-size: 10px;
            font-weight: bold;
            color: {{ $accentColor }};
            text-transform: uppercase;
            letter-spacing: 0.8px;
            margin-bottom: 6px;
        }
        .conditions-detail {
            font-size: 10px;
            color: #555;
            line-height: 1.8;
        }
    </style>
</head>
<body>
<div class="page">

    {{-- ─── Header: REÇU DE PAIEMENT title + Logo ─────────────────── --}}
    <table class="header-table">
        <tr>
            <td style="width: 70%;">
                <div class="doc-title">REÇU DE PAIEMENT</div>
                <div class="company-name">{{ $company['company_name'] ?? $tenant?->name ?? '' }}</div>
                <div class="company-detail">
                    @if(!empty($company['address'])) {{ $company['address'] }}<br> @endif
                    @if(!empty($company['postal_code'])) {{ $company['postal_code'] }} @endif
                    @if(!empty($company['city'])) {{ $company['city'] }} @endif
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

    {{-- ─── Info block: Reçu de / Meta ─────────────────────────────── --}}
    <table class="info-table">
        <tr>
            <td style="width: 50%;">
                <div class="info-label">Reçu de</div>
                {{ $payment->customer?->name ?? '' }}<br>
                @if($payment->customer?->email) {{ $payment->customer->email }}<br> @endif
                @if($payment->customer?->phone) {{ $payment->customer->phone }} @endif
            </td>
            <td style="width: 50%;">
                <table class="meta-table">
                    @if($payment->reference_number)
                    <tr>
                        <td class="meta-label">Réf</td>
                        <td class="meta-value">{{ $payment->reference_number }}</td>
                    </tr>
                    @endif
                    <tr>
                        <td class="meta-label">Date</td>
                        <td class="meta-value">{{ $payment->payment_date?->format('d/m/Y') }}</td>
                    </tr>
                    <tr>
                        <td class="meta-label">Statut</td>
                        <td class="meta-value"><span class="badge badge-{{ $payment->status }}">{{ ucfirst($payment->status) }}</span></td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    {{-- ─── Amount box ─────────────────────────────────────────────── --}}
    <div class="amount-box">
        <div class="label">Montant reçu</div>
        <div class="amount">{{ number_format($payment->amount, 2, ',', ' ') }} {{ $currency }}</div>
    </div>

    {{-- ─── Payment info rows ──────────────────────────────────────── --}}
    <table class="info-rows">
        <tr>
            <td class="row-label">Mode de paiement</td>
            <td>{{ $payment->paymentMethod?->name ?? '—' }}</td>
        </tr>
        @if($payment->provider_payment_id)
        <tr>
            <td class="row-label">Référence transaction</td>
            <td>{{ $payment->provider_payment_id }}</td>
        </tr>
        @endif
        @if($payment->paid_at)
        <tr>
            <td class="row-label">Payé le</td>
            <td>{{ $payment->paid_at->format('d/m/Y à H:i') }}</td>
        </tr>
        @endif
    </table>

    {{-- ─── Allocations (invoices covered) ─────────────────────────── --}}
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

    {{-- ─── Signature ──────────────────────────────────────────────── --}}
    @include('pdf.partials.signature')

    {{-- ─── Footer: Merci + Notes ──────────────────────────────────── --}}
    <table class="footer-table">
        <tr>
            <td style="width: 35%; vertical-align: bottom;">
                <div class="merci-text">Merci</div>
            </td>
            <td style="width: 65%;">
                @if($payment->notes)
                <div class="conditions-box">
                    <div class="conditions-title">Notes</div>
                    <div class="conditions-detail">
                        {!! nl2br(e($payment->notes)) !!}
                    </div>
                </div>
                @endif
            </td>
        </tr>
    </table>

    {{-- ─── Legal info footer ──────────────────────────────────────── --}}
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
