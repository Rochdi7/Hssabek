<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Bon de livraison {{ $deliveryChallan->number }}</title>
    <style>
        @php $brandColor = $settings?->company_settings['brand_color'] ?? '#2563eb'; @endphp
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: DejaVu Sans, sans-serif; font-size: 11px; color: #222; line-height: 1.5; }
        .page { padding: 30px 40px; }

        /* ── Document title ── */
        .doc-title-wrapper { text-align: center; margin-bottom: 25px; }
        .doc-title {
            font-size: 22px;
            font-weight: bold;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: {{ $settings?->company_settings['brand_color'] ?? '#2563eb' }};
            padding-bottom: 6px;
            display: inline-block;
            border-bottom: 2px solid {{ $settings?->company_settings['brand_color'] ?? '#2563eb' }};
        }

        /* ── Header layout ── */
        .header-table { width: 100%; margin-bottom: 20px; border-collapse: collapse; }
        .header-table td { vertical-align: top; }

        /* ── Structured boxes ── */
        .info-box {
            border: 1px solid #888;
            padding: 10px 14px;
            margin-bottom: 18px;
            font-size: 10px;
            line-height: 1.7;
        }
        .info-box .box-label {
            font-size: 9px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #555;
            margin-bottom: 4px;
            border-bottom: 1px solid #ccc;
            padding-bottom: 3px;
        }
        .info-box .name { font-size: 12px; font-weight: bold; margin-bottom: 2px; }
        .info-box .detail { color: #444; }

        /* ── Status badge ── */
        .badge { display: inline-block; padding: 2px 8px; border: 1px solid #666; font-size: 9px; font-weight: bold; text-transform: uppercase; letter-spacing: 0.3px; }
        .badge-draft { border-color: #6c757d; color: #495057; }
        .badge-issued { border-color: #055160; color: #055160; }
        .badge-delivered { border-color: #0f5132; color: #0f5132; }
        .badge-cancelled { border-color: #6c757d; color: #6c757d; }

        /* ── Items table — double border header ── */
        .items-table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        .items-table th {
            border-top: 2px solid #222;
            border-bottom: 2px solid #222;
            padding: 7px 10px;
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: 0.3px;
            color: #222;
            background: none;
        }
        .items-table th:first-child { text-align: left; }
        .items-table td {
            padding: 7px 10px;
            border-bottom: 1px solid #ccc;
            font-size: 10px;
        }
        .items-table tbody tr:last-child td { border-bottom: 2px solid #222; }
        .text-right { text-align: right; }
        .text-center { text-align: center; }

        /* ── Totals box ── */
        .totals-wrapper { width: 100%; margin-bottom: 20px; }
        .totals-table { width: 300px; margin-left: auto; border: 1px solid #888; border-collapse: collapse; }
        .totals-table td { padding: 5px 12px; font-size: 11px; border-bottom: 1px solid #ddd; }
        .totals-table tr:last-child td { border-bottom: none; }
        .totals-table .total-row td {
            font-size: 13px;
            font-weight: bold;
            border-top: 2px solid {{ $settings?->company_settings['brand_color'] ?? '#2563eb' }};
            border-bottom: none;
            padding-top: 8px;
            color: {{ $settings?->company_settings['brand_color'] ?? '#2563eb' }};
        }

        /* ── Notes ── */
        .notes-section { margin-top: 20px; border-top: 1px solid #aaa; padding-top: 10px; font-size: 10px; color: #444; }
        .notes-section strong { color: #222; }

        /* ── Doc meta ── */
        .doc-meta-table { border-collapse: collapse; margin-left: auto; }
        .doc-meta-table td { padding: 2px 8px; font-size: 10px; }
        .doc-meta-table td:first-child { font-weight: bold; text-align: right; color: #444; }
    </style>
</head>
<body>
<div class="page">

    {{-- ─── Centered document title ──────────────────────────────── --}}
    <div class="doc-title-wrapper">
        <span class="doc-title">Bon de Livraison</span>
    </div>

    {{-- ─── Header: Logo + Company left / Doc info right ─────────── --}}
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
                <div class="info-box">
                    <div class="box-label">Emetteur</div>
                    <div class="name">{{ $company['company_name'] ?? $tenant?->name ?? '' }}</div>
                    <div class="detail">
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
                </div>
            </td>
            <td style="width: 45%;">
                <table class="doc-meta-table">
                    <tr><td>N°</td><td>{{ $deliveryChallan->number }}</td></tr>
                    <tr><td>Date :</td><td>{{ $deliveryChallan->challan_date?->format('d/m/Y') }}</td></tr>
                    @if($deliveryChallan->due_date)
                        <tr><td>Date prévue :</td><td>{{ $deliveryChallan->due_date->format('d/m/Y') }}</td></tr>
                    @endif
                    @if($deliveryChallan->reference_number)
                        <tr><td>Réf :</td><td>{{ $deliveryChallan->reference_number }}</td></tr>
                    @endif
                    <tr><td>Statut :</td><td><span class="badge badge-{{ $deliveryChallan->status }}">{{ str_replace('_', ' ', ucfirst($deliveryChallan->status)) }}</span></td></tr>
                </table>
            </td>
        </tr>
    </table>

    {{-- ─── Destinataire ─────────────────────────────────────────── --}}
    @php
        $billTo = $deliveryChallan->bill_to_snapshot ?? [];
    @endphp
    <div class="info-box">
        <div class="box-label">Destinataire</div>
        <div class="name">{{ $billTo['name'] ?? $deliveryChallan->customer?->name ?? '' }}</div>
        <div class="detail">
            @if(!empty($billTo['address'])) {{ $billTo['address'] }}<br> @endif
            @if(!empty($billTo['city'])) {{ $billTo['city'] }} @endif
            @if(!empty($billTo['postal_code'])) {{ $billTo['postal_code'] }} @endif
            @if(!empty($billTo['country'])) {{ $billTo['country'] }} @endif
            @if(!empty($billTo['email'])) <br>{{ $billTo['email'] }} @endif
            @if(!empty($billTo['phone'])) <br>{{ $billTo['phone'] }} @endif
            @if(!empty($billTo['tax_id'])) <br>IF : {{ $billTo['tax_id'] }} @endif
        </div>
    </div>

    {{-- ─── Related documents ────────────────────────────────────── --}}
    @if($deliveryChallan->invoice || $deliveryChallan->quote)
    <p style="font-size: 10px; color: #444; margin-bottom: 15px;">
        @if($deliveryChallan->invoice)
            <strong>Facture associée :</strong> {{ $deliveryChallan->invoice->number }}
        @endif
        @if($deliveryChallan->quote)
            @if($deliveryChallan->invoice) &nbsp;|&nbsp; @endif
            <strong>Devis associé :</strong> {{ $deliveryChallan->quote->number }}
        @endif
    </p>
    @endif

    {{-- ─── Items table ──────────────────────────────────────────── --}}
    <table class="items-table">
        <thead>
            <tr>
                <th style="width: 5%;">#</th>
                <th style="width: 35%;">Désignation</th>
                <th class="text-center" style="width: 10%;">Qté</th>
                <th class="text-right" style="width: 15%;">Prix unit.</th>
                @if($deliveryChallan->enable_tax)
                    <th class="text-right" style="width: 10%;">TVA</th>
                @endif
                <th class="text-right" style="width: 15%;">Total HT</th>
            </tr>
        </thead>
        <tbody>
            @foreach($deliveryChallan->items->sortBy('position') as $index => $item)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>
                    <strong>{{ $item->label }}</strong>
                    @if($item->description)
                        <br><span style="color: #777; font-size: 9px;">{{ $item->description }}</span>
                    @endif
                </td>
                <td class="text-center">{{ rtrim(rtrim(number_format($item->quantity, 3, ',', ' '), '0'), ',') }}</td>
                <td class="text-right">{{ number_format($item->unit_price, 2, ',', ' ') }}</td>
                @if($deliveryChallan->enable_tax)
                    <td class="text-right">{{ number_format($item->tax_rate, 2) }}%</td>
                @endif
                <td class="text-right">{{ number_format($item->line_subtotal, 2, ',', ' ') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{-- ─── Charges ──────────────────────────────────────────────── --}}
    @if($deliveryChallan->charges->count())
    <table class="items-table" style="margin-top: -15px;">
        <thead>
            <tr>
                <th colspan="{{ $deliveryChallan->enable_tax ? 5 : 4 }}" style="border-top: 1px solid #222; border-bottom: 1px solid #222; font-size: 9px; letter-spacing: 1px;">Frais supplémentaires</th>
            </tr>
        </thead>
        <tbody>
            @foreach($deliveryChallan->charges->sortBy('position') as $charge)
            <tr>
                <td colspan="{{ $deliveryChallan->enable_tax ? 3 : 2 }}">{{ $charge->label }}</td>
                @if($deliveryChallan->enable_tax)
                    <td class="text-right">{{ number_format($charge->tax_rate, 2) }}%</td>
                @endif
                <td class="text-right">{{ number_format($charge->amount, 2, ',', ' ') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif

    {{-- ─── Totals ───────────────────────────────────────────────── --}}
    <div class="totals-wrapper">
        <table class="totals-table">
            <tr>
                <td>Sous-total</td>
                <td class="text-right">{{ number_format($deliveryChallan->subtotal, 2, ',', ' ') }} {{ $currency }}</td>
            </tr>
            @if($deliveryChallan->discount_total > 0)
            <tr>
                <td>Remise</td>
                <td class="text-right">-{{ number_format($deliveryChallan->discount_total, 2, ',', ' ') }} {{ $currency }}</td>
            </tr>
            @endif
            @if($deliveryChallan->enable_tax)
            <tr>
                <td>TVA</td>
                <td class="text-right">{{ number_format($deliveryChallan->tax_total, 2, ',', ' ') }} {{ $currency }}</td>
            </tr>
            @endif
            @if($deliveryChallan->round_off != 0)
            <tr>
                <td>Arrondi</td>
                <td class="text-right">{{ number_format($deliveryChallan->round_off, 2, ',', ' ') }} {{ $currency }}</td>
            </tr>
            @endif
            <tr class="total-row">
                <td>Total TTC</td>
                <td class="text-right">{{ number_format($deliveryChallan->total, 2, ',', ' ') }} {{ $currency }}</td>
            </tr>
        </table>
    </div>

    {{-- ─── Arrêté le présent ────────────────────────────────────── --}}
    @if($deliveryChallan->total_in_words)
    <p style="font-size: 10px; color: #444; font-style: italic; margin-bottom: 15px;">
        Arrêté le présent bon de livraison à la somme de : <strong>{{ $deliveryChallan->total_in_words }}</strong>
    </p>
    @endif

    {{-- ─── Notes & Terms ────────────────────────────────────────── --}}
    @if($deliveryChallan->notes)
    <div class="notes-section">
        <strong>Notes :</strong><br>
        {!! nl2br(e($deliveryChallan->notes)) !!}
    </div>
    @endif

    @if($deliveryChallan->terms)
    <div class="notes-section" style="margin-top: 10px;">
        <strong>Conditions :</strong><br>
        {!! nl2br(e($deliveryChallan->terms)) !!}
    </div>
    @endif

    {{-- ─── Signature ────────────────────────────────────────────── --}}
    @include('pdf.partials.signature')

</div>
</body>
</html>
