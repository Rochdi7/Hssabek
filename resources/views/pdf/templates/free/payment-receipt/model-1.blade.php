<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Reçu de paiement {{ $payment->reference_number }}</title>
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

        /* Info block: Customer / Meta */
        .info-table { width: 100%; margin-bottom: 30px; }
        .info-table td { vertical-align: top; font-size: 10px; line-height: 1.7; }
        .info-label { font-weight: bold; font-size: 11px; margin-bottom: 4px; }
        .meta-table { width: 100%; }
        .meta-table td { font-size: 10px; padding: 1px 0; }
        .meta-table td:first-child { font-weight: bold; text-align: left; padding-right: 10px; }
        .meta-table td:last-child { text-align: right; }

        /* Badge */
        .badge { display: inline-block; padding: 3px 10px; border-radius: 3px; font-size: 9px; font-weight: bold; text-transform: uppercase; letter-spacing: 0.3px; }
        .badge-pending { background: #fff3cd; color: #664d03; }
        .badge-completed { background: #d1e7dd; color: #0f5132; }
        .badge-failed { background: #f8d7da; color: #842029; }

        /* Amount box */
        .amount-box { text-align: center; margin: 25px 0; padding: 20px; border: 2px solid #e8d44d; border-radius: 4px; }
        .amount-box .label { font-size: 10px; text-transform: uppercase; color: #888; letter-spacing: 0.5px; margin-bottom: 5px; }
        .amount-box .amount { font-size: 28px; font-weight: bold; color: #333; }

        /* Payment info table */
        .payment-info-table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        .payment-info-table td { padding: 8px 10px; font-size: 10px; border-bottom: 1px solid #eee; }
        .payment-info-table td:first-child { font-weight: bold; color: #555; width: 35%; }

        /* Allocations table */
        .allocations-table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        .allocations-table th {
            background: #e8d44d;
            color: #333;
            padding: 8px 10px;
            font-size: 10px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 0.3px;
            border: 1px solid #ccc;
        }
        .allocations-table td {
            padding: 8px 10px;
            border: 1px solid #ccc;
            font-size: 10px;
        }
        .text-right { text-align: right; }

        /* Footer */
        .footer-section { margin-top: 40px; position: relative; }
        .separator { border: none; border-top: 1px solid #e9ecef; margin: 15px 0; }
        .payment-conditions { font-size: 10px; line-height: 1.7; }
        .payment-conditions strong { font-size: 11px; }
    </style>
</head>
<body>
<div class="page">

    {{-- ─── Header: Company name + REÇU DE PAIEMENT ───────────────── --}}
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
                <div class="doc-title">REÇU DE PAIEMENT</div>
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
                        <td>Réf</td>
                        <td>{{ $payment->reference_number }}</td>
                    </tr>
                    @endif
                    <tr>
                        <td>Date</td>
                        <td>{{ $payment->payment_date?->format('d/m/Y') }}</td>
                    </tr>
                    <tr>
                        <td>Statut</td>
                        <td><span class="badge badge-{{ $payment->status }}">{{ ucfirst($payment->status) }}</span></td>
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

    {{-- ─── Payment info ───────────────────────────────────────────── --}}
    <table class="payment-info-table">
        <tr>
            <td>Mode de paiement</td>
            <td>{{ $payment->paymentMethod?->name ?? '—' }}</td>
        </tr>
        @if($payment->provider_payment_id)
        <tr>
            <td>Référence transaction</td>
            <td>{{ $payment->provider_payment_id }}</td>
        </tr>
        @endif
        @if($payment->paid_at)
        <tr>
            <td>Payé le</td>
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

    {{-- ─── Notes ──────────────────────────────────────────────────── --}}
    @if($payment->notes)
    <div class="footer-section">
        <hr class="separator">
        <div class="payment-conditions">
            <strong>Notes :</strong><br>
            {!! nl2br(e($payment->notes)) !!}
        </div>
    </div>
    @endif

    {{-- ─── Signature ──────────────────────────────────────────────── --}}
    @include('pdf.partials.signature')

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
