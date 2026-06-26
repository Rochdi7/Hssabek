<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>{{ $pdfDocumentTitle ?? 'Devis' }} {{ $quote->number }}</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: DejaVu Sans, sans-serif; font-size: 11px; color: #000; line-height: 1.5; }
        .page { padding: 30px 40px; }

        /* Logo header — centered */
        .logo-header { text-align: center; margin-bottom: 30px; }
        .logo-header img { max-height: 130px; max-width: 320px; width: auto; height: auto; }
        .logo-header .company-name { font-size: 22px; font-weight: bold; }

        /* Meta block: Devis/Date left — Client/Chantier right */
        .meta-table { width: 100%; margin-bottom: 30px; }
        .meta-table td { vertical-align: top; font-size: 12px; }
        .meta-left strong { font-weight: bold; }
        .meta-left .line { margin-bottom: 12px; }
        .meta-right { font-weight: bold; }
        .meta-right .line { margin-bottom: 4px; }

        /* Items table — bordered grid */
        .items-table { width: 100%; border-collapse: collapse; margin-bottom: 5px; }
        .items-table th {
            border: 1px solid #000;
            padding: 5px 8px;
            font-size: 11px;
            font-weight: bold;
            text-align: center;
        }
        .items-table td {
            border: 1px solid #000;
            padding: 6px 8px;
            font-size: 11px;
            font-weight: bold;
        }
        .items-table td.no-border { border: none; }
        .text-right { text-align: right; }
        .text-center { text-align: center; }

        .group-title { font-weight: bold; }
        .item-label { padding-left: 6px; }

        .totals-label {
            background: #e9ecef;
            text-align: center;
            font-weight: bold;
        }

        .amount-words { font-size: 10px; font-style: italic; margin: 12px 0; }
    </style>
</head>
<body>
<div class="page">

    {{-- ─── Logo header (centered) ──────────────────────────────── --}}
    @php
        $company = $settings?->company_settings ?? [];
        $logoPath = $tenant?->getFirstMediaPath('logo');
    @endphp
    <div class="logo-header">
        @if($logoPath && file_exists($logoPath))
            <img src="{{ $logoPath }}" alt="logo">
        @else
            <div class="company-name">{{ $company['company_name'] ?? $tenant?->name ?? '' }}</div>
        @endif
    </div>

    {{-- ─── Meta: Devis/Date (left) — Client/Chantier (right) ──── --}}
    @php
        $billTo = $quote->bill_to_snapshot ?? [];
        $clientName = $billTo['name'] ?? $quote->customer?->name ?? '';
    @endphp
    <table class="meta-table">
        <tr>
            <td class="meta-left" style="width: 50%;">
                <div class="line"><strong>{{ $pdfDocumentNumberLabel ?? 'Devis' }} N° {{ $quote->number }}</strong></div>
                <div class="line"><strong>Date : {{ $quote->issue_date?->format('d/m/Y') }}</strong></div>
            </td>
            <td class="meta-right" style="width: 50%;">
                <div class="line">Client : {{ $clientName }}</div>
                @if(!empty($billTo['addition']))
                <div class="line">{{ $billTo['addition'] }}</div>
                @endif
            </td>
        </tr>
    </table>

    {{-- ─── Items table ──────────────────────────────────────────── --}}
    <table class="items-table">
        <thead>
            <tr>
                <th style="width: 6%;">N°</th>
                <th style="width: 44%;">désignation</th>
                <th style="width: 10%;">unité</th>
                <th style="width: 12%;">Quantité</th>
                <th style="width: 14%;">Prix U H.T</th>
                <th style="width: 14%;">Prix T H.T</th>
            </tr>
        </thead>
        <tbody>
            @foreach($quote->items->sortBy('position') as $index => $item)
            <tr>
                <td class="text-center">{{ $index + 1 }}</td>
                <td class="item-label">
                    {{ $item->label }}
                    @if($item->description)
                        <br><span style="font-weight: normal; font-size: 10px;">{{ $item->description }}</span>
                    @endif
                </td>
                <td class="text-center">{{ $item->unit?->short_name ?? $item->unit?->name ?? '' }}</td>
                <td class="text-right">{{ number_format($item->quantity, 2, ',', ' ') }}</td>
                <td class="text-right">{{ number_format($item->unit_price, 2, ',', ' ') }}</td>
                <td class="text-right">{{ number_format($item->line_subtotal, 2, ',', ' ') }}</td>
            </tr>
            @endforeach

            @if($quote->charges->count())
                @foreach($quote->charges->sortBy('position') as $charge)
                <tr>
                    <td class="text-center"></td>
                    <td class="item-label">{{ $charge->label }} <span style="font-weight: normal; font-size: 10px;">(frais)</span></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="text-right">{{ number_format($charge->amount, 2, ',', ' ') }}</td>
                </tr>
                @endforeach
            @endif

            {{-- ─── Totals ───────────────────────────────────────── --}}
            <tr>
                <td class="no-border"></td>
                <td class="no-border"></td>
                <td class="no-border"></td>
                <td class="no-border"></td>
                <td class="totals-label">T.H.T</td>
                <td class="text-right">{{ number_format($quote->subtotal, 2, ',', ' ') }}</td>
            </tr>
            @if($quote->discount_total > 0)
            <tr>
                <td class="no-border"></td>
                <td class="no-border"></td>
                <td class="no-border"></td>
                <td class="no-border"></td>
                <td class="totals-label">Remise</td>
                <td class="text-right">-{{ number_format($quote->discount_total, 2, ',', ' ') }}</td>
            </tr>
            @endif
            @if($quote->enable_tax)
            @php
                $__taxByRate = [];
                foreach ($quote->items ?? [] as $__item) {
                    $__rate = round((float)($__item->tax_rate ?? 0), 4);
                    if ($__rate <= 0) continue;
                    $__tax = isset($__item->line_tax) ? (float)$__item->line_tax : round((float)($__item->line_subtotal ?? 0) * ($__rate / 100), 2);
                    $__key = number_format($__rate, 10, '.', '');
                    $__taxByRate[$__key] = ($__taxByRate[$__key] ?? ['rate' => $__rate, 'amount' => 0.0]);
                    $__taxByRate[$__key]['amount'] += $__tax;
                }
                foreach ($__taxByRate as $__k => $__v) { $__taxByRate[$__k]['amount'] = round($__v['amount'], 2); }
                uasort($__taxByRate, fn($a, $b) => $a['rate'] <=> $b['rate']);
                $__multiRate = count($__taxByRate) > 1;
            @endphp
            @if(count($__taxByRate) === 0)
            <tr>
                <td class="no-border"></td><td class="no-border"></td><td class="no-border"></td><td class="no-border"></td>
                <td class="totals-label">T.V.A 0%</td>
                <td class="text-right">0,00</td>
            </tr>
            @else
            @foreach($__taxByRate as $__bucket)
            <tr>
                <td class="no-border"></td><td class="no-border"></td><td class="no-border"></td><td class="no-border"></td>
                <td class="totals-label">T.V.A {{ rtrim(rtrim(number_format($__bucket['rate'], 2, ',', ''), '0'), ',') }}%</td>
                <td class="text-right">{{ number_format($__bucket['amount'], 2, ',', ' ') }}</td>
            </tr>
            @endforeach
            @if($__multiRate)
            <tr>
                <td class="no-border"></td><td class="no-border"></td><td class="no-border"></td><td class="no-border"></td>
                <td class="totals-label" style="border-top:1px solid #ccc;">T.V.A TOTAL</td>
                <td class="text-right" style="border-top:1px solid #ccc;">{{ number_format($quote->tax_total, 2, ',', ' ') }}</td>
            </tr>
            @endif
            @endif
            @endif
            <tr>
                <td class="no-border"></td>
                <td class="no-border"></td>
                <td class="no-border"></td>
                <td class="no-border"></td>
                <td class="totals-label">TOTAL TTC</td>
                <td class="text-right">{{ number_format($quote->total, 2, ',', ' ') }} {{ $currency }}</td>
            </tr>
        </tbody>
    </table>

    @if($quote->total_in_words)
    <p class="amount-words">
        Arrêté le présent document à la somme de : <strong>{{ $quote->total_in_words }}</strong>
    </p>
    @endif

    {{-- ─── Signature ────────────────────────────────────────────── --}}
    @include('pdf.partials.signature')

    {{-- ─── Legal info footer ────────────────────────────────────── --}}
    @php
        $company = $company ?? ($settings?->company_settings ?? []);
        $siegeParts = array_filter([
            $company['address'] ?? null,
            $company['city'] ?? null,
            $company['country'] ?? null,
        ]);
        $legalParts = array_filter([
            !empty($company['ice']) ? 'ICE : ' . $company['ice'] : null,
            !empty($company['patente']) ? 'TP : ' . $company['patente'] : null,
            !empty($company['tax_id']) ? 'IF : ' . $company['tax_id'] : null,
            !empty($company['rc']) ? 'RC : ' . $company['rc'] : null,
            !empty($company['cnss']) ? 'CNSS : ' . $company['cnss'] : null,
        ]);
    @endphp
    @if(!empty($siegeParts) || !empty($legalParts))
    <div style="margin-top: 15px; font-size: 8px; color: #888; text-align: center; border-top: 1px solid #e9ecef; padding-top: 8px;">
        @if(!empty($siegeParts))Siège Social : {{ implode(' - ', $siegeParts) }}@endif
        @if(!empty($siegeParts) && !empty($legalParts))<br>@endif
        @if(!empty($legalParts)){{ implode(' - ', $legalParts) }}@endif
    </div>
    @endif

</div>
</body>
</html>
