<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Facture {{ $invoice->number }}</title>
    @php
        $brandColor = $settings?->company_settings['brand_color'] ?? '#2563eb';
    @endphp
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 11px;
            color: #2d2d2d;
            line-height: 1.6;
            background: #fff;
        }
        .page {
            padding: 45px 50px;
            position: relative;
        }

        /* Watermark */
        .watermark {
            position: fixed;
            top: 280px;
            left: 50%;
            font-size: 100px;
            color: #f0f0f0;
            letter-spacing: 15px;
            font-weight: bold;
            text-transform: uppercase;
            transform: rotate(-35deg);
            z-index: 0;
            white-space: nowrap;
            margin-left: -300px;
        }

        /* Header */
        .header-table { width: 100%; margin-bottom: 40px; border-collapse: collapse; }
        .header-table td { vertical-align: top; }

        .company-name {
            font-size: 15px;
            font-weight: bold;
            color: #1a1a1a;
            margin-bottom: 6px;
            letter-spacing: 0.3px;
        }
        .company-detail {
            font-size: 9.5px;
            color: #777;
            line-height: 1.8;
        }

        .doc-title {
            font-size: 32px;
            font-weight: 300;
            color: #c8c8c8;
            text-align: right;
            letter-spacing: 4px;
            text-transform: uppercase;
            margin-bottom: 15px;
        }
        .doc-meta {
            font-size: 10px;
            color: #888;
            text-align: right;
            line-height: 2;
        }
        .doc-meta strong {
            color: #444;
            font-weight: 600;
        }

        /* Status badge */
        .badge {
            display: inline-block;
            padding: 3px 12px;
            font-size: 8px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
            border: 1px solid;
            margin-top: 4px;
        }
        .badge-draft { border-color: #ccc; color: #999; }
        .badge-sent { border-color: {{ $brandColor }}; color: {{ $brandColor }}; }
        .badge-paid { border-color: #22c55e; color: #22c55e; }
        .badge-partial { border-color: #f59e0b; color: #f59e0b; }
        .badge-overdue { border-color: #ef4444; color: #ef4444; }
        .badge-void { border-color: #ccc; color: #999; }

        /* Separator line */
        .accent-line {
            width: 60px;
            height: 1px;
            background: {{ $brandColor }};
            margin-bottom: 30px;
        }

        /* Customer block */
        .customer-section { margin-bottom: 35px; }
        .customer-label {
            font-size: 8px;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: #aaa;
            margin-bottom: 8px;
        }
        .customer-name {
            font-size: 14px;
            font-weight: 600;
            color: #1a1a1a;
            margin-bottom: 4px;
        }
        .customer-detail {
            font-size: 10px;
            color: #777;
            line-height: 1.8;
        }
        .customer-border {
            border-bottom: 1px solid #e8e8e8;
            padding-bottom: 20px;
        }

        /* Items table */
        .items-table { width: 100%; border-collapse: collapse; margin-bottom: 30px; }
        .items-table th {
            padding: 12px 10px;
            font-size: 8px;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            color: #999;
            font-weight: 600;
            border-top: 1px solid {{ $brandColor }};
            border-bottom: 1px solid #eee;
        }
        .items-table th:first-child { text-align: left; }
        .items-table td {
            padding: 14px 10px;
            border-bottom: 1px solid #f2f2f2;
            font-size: 10px;
            color: #444;
        }
        .items-table tr:last-child td { border-bottom: 1px solid #eee; }
        .item-label { font-weight: 600; color: #2d2d2d; font-size: 10.5px; }
        .item-description { color: #aaa; font-size: 9px; margin-top: 2px; }
        .text-right { text-align: right; }
        .text-center { text-align: center; }

        /* Totals */
        .totals-wrapper { width: 100%; margin-bottom: 30px; }
        .totals-table { width: 300px; margin-left: auto; }
        .totals-table td {
            padding: 8px 12px;
            font-size: 10.5px;
            color: #666;
        }
        .totals-table .label-cell { text-align: left; }
        .totals-table .value-cell { text-align: right; font-weight: 500; color: #444; }
        .totals-table .total-row td {
            font-size: 16px;
            font-weight: 700;
            color: {{ $brandColor }};
            border-top: 1px solid {{ $brandColor }};
            padding-top: 14px;
            padding-bottom: 14px;
        }
        .totals-table .sub-row td {
            font-size: 10px;
            color: #888;
            padding: 4px 12px;
        }

        /* Notes */
        .notes-block {
            margin-top: 30px;
            font-size: 9.5px;
            color: #999;
            font-style: italic;
            line-height: 1.7;
            padding-top: 15px;
            border-top: 1px solid #f0f0f0;
        }
        .notes-block strong {
            color: #666;
            font-style: normal;
            font-size: 8px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* Bank details */
        .bank-block {
            margin-top: 20px;
            font-size: 9.5px;
            color: #999;
            line-height: 1.8;
        }
        .bank-block strong { color: #666; }

        /* Charges */
        .charges-header {
            font-size: 8px;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            color: #999;
            padding: 10px;
            border-bottom: 1px solid #f2f2f2;
        }
    </style>
</head>
<body>
<div class="page">

    {{-- Watermark --}}
    <div class="watermark">FACTURE</div>

    {{-- ─── Header ─────────────────────────────────────────────── --}}
    <table class="header-table">
        <tr>
            <td style="width: 55%;">
                @if($tenant)
                    @php
                        $logoPath = $tenant->getFirstMediaPath('logo');
                    @endphp
                    @if($logoPath && file_exists($logoPath))
                        <img src="{{ $logoPath }}" height="50" alt="logo" style="margin-bottom: 10px;">
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
                    @if(!empty($company['phone'])) <br>{{ $company['phone'] }} @endif
                    @if(!empty($company['email'])) <br>{{ $company['email'] }} @endif
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
                <div class="doc-title">Facture</div>
                <div class="doc-meta">
                    <strong>N°</strong> {{ $invoice->number }}<br>
                    <strong>Date</strong> {{ $invoice->issue_date?->format('d/m/Y') }}<br>
                    <strong>Échéance</strong> {{ $invoice->due_date?->format('d/m/Y') }}<br>
                    @if($invoice->reference_number)
                        <strong>Réf.</strong> {{ $invoice->reference_number }}<br>
                    @endif
                    <span class="badge badge-{{ $invoice->status }}">{{ ucfirst($invoice->status) }}</span>
                </div>
            </td>
        </tr>
    </table>

    <div class="accent-line"></div>

    {{-- ─── Bill To ────────────────────────────────────────────── --}}
    @php
        $billTo = $invoice->bill_to_snapshot ?? [];
    @endphp
    <div class="customer-section">
        <div class="customer-border">
            <div class="customer-label">Facturé à</div>
            <div class="customer-name">{{ $billTo['name'] ?? $invoice->customer?->name ?? '' }}</div>
            <div class="customer-detail">
                @if(!empty($billTo['address'])) {{ $billTo['address'] }}<br> @endif
                @if(!empty($billTo['city'])) {{ $billTo['city'] }} @endif
                @if(!empty($billTo['postal_code'])) {{ $billTo['postal_code'] }} @endif
                @if(!empty($billTo['country'])) {{ $billTo['country'] }} @endif
                @if(!empty($billTo['email'])) <br>{{ $billTo['email'] }} @endif
                @if(!empty($billTo['phone'])) <br>{{ $billTo['phone'] }} @endif
                @if(!empty($billTo['tax_id'])) <br>IF : {{ $billTo['tax_id'] }} @endif
            </div>
        </div>
    </div>

    {{-- ─── Items table ────────────────────────────────────────── --}}
    <table class="items-table">
        <thead>
            <tr>
                <th style="width: 5%;">#</th>
                <th style="width: 35%; text-align: left;">Désignation</th>
                <th class="text-center" style="width: 10%;">Qté</th>
                <th class="text-right" style="width: 15%;">Prix unit.</th>
                @if($invoice->enable_tax)
                    <th class="text-right" style="width: 10%;">TVA</th>
                @endif
                <th class="text-right" style="width: 15%;">Total HT</th>
            </tr>
        </thead>
        <tbody>
            @foreach($invoice->items->sortBy('position') as $index => $item)
            <tr>
                <td style="color: #bbb;">{{ $index + 1 }}</td>
                <td>
                    <div class="item-label">{{ $item->label }}</div>
                    @if($item->description)
                        <div class="item-description">{{ $item->description }}</div>
                    @endif
                </td>
                <td class="text-center">{{ rtrim(rtrim(number_format($item->quantity, 3, ',', ' '), '0'), ',') }}</td>
                <td class="text-right">{{ number_format($item->unit_price, 2, ',', ' ') }}</td>
                @if($invoice->enable_tax)
                    <td class="text-right">{{ number_format($item->tax_rate, 2) }}%</td>
                @endif
                <td class="text-right" style="font-weight: 600; color: #2d2d2d;">{{ number_format($item->line_subtotal, 2, ',', ' ') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{-- ─── Charges (if any) ───────────────────────────────────── --}}
    @if($invoice->charges->count())
    <table class="items-table" style="margin-top: -25px;">
        <thead>
            <tr>
                <th colspan="{{ $invoice->enable_tax ? 5 : 4 }}" class="charges-header" style="border-top: none;">Frais supplémentaires</th>
            </tr>
        </thead>
        <tbody>
            @foreach($invoice->charges->sortBy('position') as $charge)
            <tr>
                <td colspan="{{ $invoice->enable_tax ? 3 : 2 }}">{{ $charge->label }}</td>
                @if($invoice->enable_tax)
                    <td class="text-right">{{ number_format($charge->tax_rate, 2) }}%</td>
                @endif
                <td class="text-right" style="font-weight: 600; color: #2d2d2d;">{{ number_format($charge->amount, 2, ',', ' ') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif

    {{-- ─── Totals ─────────────────────────────────────────────── --}}
    <div class="totals-wrapper">
        <table class="totals-table">
            <tr>
                <td class="label-cell">Sous-total</td>
                <td class="value-cell">{{ number_format($invoice->subtotal, 2, ',', ' ') }} {{ $currency }}</td>
            </tr>
            @if($invoice->discount_total > 0)
            <tr>
                <td class="label-cell">Remise</td>
                <td class="value-cell">-{{ number_format($invoice->discount_total, 2, ',', ' ') }} {{ $currency }}</td>
            </tr>
            @endif
            @if($invoice->enable_tax)
            <tr>
                <td class="label-cell">TVA</td>
                <td class="value-cell">{{ number_format($invoice->tax_total, 2, ',', ' ') }} {{ $currency }}</td>
            </tr>
            @endif
            @if($invoice->round_off != 0)
            <tr>
                <td class="label-cell">Arrondi</td>
                <td class="value-cell">{{ number_format($invoice->round_off, 2, ',', ' ') }} {{ $currency }}</td>
            </tr>
            @endif
            <tr class="total-row">
                <td class="label-cell">Total TTC</td>
                <td class="value-cell">{{ number_format($invoice->total, 2, ',', ' ') }} {{ $currency }}</td>
            </tr>
            @if($invoice->amount_paid > 0)
            <tr class="sub-row">
                <td class="label-cell">Montant payé</td>
                <td class="value-cell">{{ number_format($invoice->amount_paid, 2, ',', ' ') }} {{ $currency }}</td>
            </tr>
            <tr class="sub-row">
                <td class="label-cell" style="font-weight: 700; color: #444;">Solde dû</td>
                <td class="value-cell" style="font-weight: 700; color: #444;">{{ number_format($invoice->amount_due, 2, ',', ' ') }} {{ $currency }}</td>
            </tr>
            @endif
        </table>
    </div>

    @if($invoice->total_in_words)
    <p style="font-size: 9.5px; color: #999; font-style: italic; margin-bottom: 20px;">
        Arrêtée la présente facture à la somme de : <span style="color: #666;">{{ $invoice->total_in_words }}</span>
    </p>
    @endif

    {{-- ─── Bank details ───────────────────────────────────────── --}}
    @php $bank = $invoice->bank_details_snapshot ?? []; @endphp
    @if(!empty($bank))
    <div class="bank-block">
        <strong style="font-size: 8px; text-transform: uppercase; letter-spacing: 1px;">Coordonnées bancaires</strong><br>
        @if(!empty($bank['bank_name'])) Banque : {{ $bank['bank_name'] }}<br> @endif
        @if(!empty($bank['account_name'])) Titulaire : {{ $bank['account_name'] }}<br> @endif
        @if(!empty($bank['rib'])) RIB : {{ $bank['rib'] }}<br> @endif
        @if(!empty($bank['iban'])) IBAN : {{ $bank['iban'] }}<br> @endif
        @if(!empty($bank['swift'])) SWIFT : {{ $bank['swift'] }} @endif
    </div>
    @endif

    {{-- ─── Notes & Terms ──────────────────────────────────────── --}}
    @if($invoice->notes)
    <div class="notes-block">
        <strong>Notes</strong><br>
        {!! nl2br(e($invoice->notes)) !!}
    </div>
    @endif

    @if($invoice->terms)
    <div class="notes-block" style="margin-top: 12px; border-top: none;">
        <strong>Conditions</strong><br>
        {!! nl2br(e($invoice->terms)) !!}
    </div>
    @endif

    {{-- ─── Signature ────────────────────────────────────────────── --}}
    @include('pdf.partials.signature')

</div>
</body>
</html>
