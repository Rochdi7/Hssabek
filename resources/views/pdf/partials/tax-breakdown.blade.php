{{--
    Reusable tax-breakdown partial for PDF totals sections.

    Variables expected from the parent template:
      $doc         — the model instance (invoice / quote / creditNote / debitNote)
      $colspan     — number of empty leading <td> columns (for inline-table style, pass 0)
      $cellStyle   — 'totals-row'|'debit' — controls which CSS class pattern to use
      $currency    — currency symbol string

    Usage (totals-row style, invoice model-1/2/3):
        @include('pdf.partials.tax-breakdown', [
            'doc'       => $invoice,
            'colspan'   => $hasMeasurement ? 5 : 2,
            'cellStyle' => 'totals-row',
            'currency'  => $currency,
        ])

    Usage (t-label/t-value style, model-4):
        @include('pdf.partials.tax-breakdown', [
            'doc'       => $invoice,
            'colspan'   => 0,
            'cellStyle' => 't-label',
            'currency'  => $currency,
        ])

    Usage (debit-note standalone table style):
        @include('pdf.partials.tax-breakdown', [
            'doc'       => $debitNote,
            'colspan'   => 0,
            'cellStyle' => 'debit',
            'currency'  => $currency,
        ])
--}}
@php
    /*
     * Build per-rate tax breakdown from item collection.
     * Works for: Invoice, Quote, CreditNote, DebitNote items.
     * Each item must have: tax_rate (float), line_subtotal or line_total.
     */
    $items      = $doc->items ?? collect();
    $charges    = property_exists($doc, 'charges') ? ($doc->charges ?? collect()) : collect();
    $enableTax  = $doc->enable_tax ?? true;

    $taxByRate  = [];   // [rate => amount]

    if ($enableTax) {
        foreach ($items as $item) {
            $rate = round((float) ($item->tax_rate ?? 0), 4);
            if ($rate <= 0) continue;

            // Prefer stored line_tax; fall back to computing from subtotal or quantity × price
            if (isset($item->line_tax) && $item->line_tax !== null) {
                $tax = (float) $item->line_tax;
            } elseif (isset($item->line_subtotal) && $item->line_subtotal !== null) {
                $tax = round((float) $item->line_subtotal * ($rate / 100), 2);
            } else {
                // CreditNoteItem / DebitNoteItem: derive from quantity × unit price
                $qty   = (float) ($item->quantity ?? 1);
                $price = (float) ($item->unit_price ?? $item->unit_cost ?? 0);
                $tax   = round($qty * $price * ($rate / 100), 2);
            }

            $rateKey = number_format($rate, 10, '.', '');
            if (!isset($taxByRate[$rateKey])) {
                $taxByRate[$rateKey] = ['rate' => $rate, 'amount' => 0.0];
            }
            $taxByRate[$rateKey]['amount'] += $tax;
        }

        // Also accumulate taxes from charges
        foreach ($charges as $charge) {
            $rate = round((float) ($charge->tax_rate ?? 0), 4);
            if ($rate <= 0) continue;
            $chargeAmount = (float) ($charge->amount ?? 0);
            $tax = round($chargeAmount * ($rate / 100), 2);
            $rateKey = number_format($rate, 10, '.', '');
            if (!isset($taxByRate[$rateKey])) {
                $taxByRate[$rateKey] = ['rate' => $rate, 'amount' => 0.0];
            }
            $taxByRate[$rateKey]['amount'] += $tax;
        }

        // Round each bucket
        foreach ($taxByRate as $k => $v) {
            $taxByRate[$k]['amount'] = round($v['amount'], 2);
        }

        // Sort by rate ascending
        uasort($taxByRate, fn($a, $b) => $a['rate'] <=> $b['rate']);
    }

    $multiRate      = count($taxByRate) > 1;
    $totalTaxStored = (float) ($doc->tax_total ?? 0);
    $isDebitStyle   = ($cellStyle === 'debit');
    $isTLabelStyle  = ($cellStyle === 't-label');
    $isTotalsRow    = !$isDebitStyle && !$isTLabelStyle;
@endphp

@if($enableTax)

    @if($isTotalsRow)
        {{-- ── Style used in model-1, model-2, model-3 (rows inside items table) ── --}}
        @if(count($taxByRate) === 0)
            {{-- No taxable items: show 0% row --}}
            <tr class="totals-row">
                <td colspan="{{ $colspan }}"></td>
                <td class="label-cell">T.V.A 0%</td>
                <td class="value-cell">0,00</td>
            </tr>
        @elseif($multiRate)
            @foreach($taxByRate as $bucket)
            <tr class="totals-row">
                <td colspan="{{ $colspan }}"></td>
                <td class="label-cell">T.V.A {{ rtrim(rtrim(number_format($bucket['rate'], 2, ',', ''), '0'), ',') }}%</td>
                <td class="value-cell">{{ number_format($bucket['amount'], 2, ',', ' ') }}</td>
            </tr>
            @endforeach
            <tr class="totals-row">
                <td colspan="{{ $colspan }}"></td>
                <td class="label-cell" style="border-top: 1px solid #ccc;">T.V.A TOTAL</td>
                <td class="value-cell" style="border-top: 1px solid #ccc;">{{ number_format($totalTaxStored, 2, ',', ' ') }}</td>
            </tr>
        @else
            @php $bucket = reset($taxByRate); @endphp
            <tr class="totals-row">
                <td colspan="{{ $colspan }}"></td>
                <td class="label-cell">T.V.A {{ rtrim(rtrim(number_format($bucket['rate'], 2, ',', ''), '0'), ',') }}%</td>
                <td class="value-cell">{{ number_format($totalTaxStored, 2, ',', ' ') }}</td>
            </tr>
        @endif

    @elseif($isTLabelStyle)
        {{-- ── Style used in model-4 (standalone totals table with t-label/t-value) ── --}}
        @if(count($taxByRate) === 0)
            <tr>
                <td class="t-label">T.V.A 0%</td>
                <td class="t-value">0,00</td>
            </tr>
        @elseif($multiRate)
            @foreach($taxByRate as $bucket)
            <tr>
                <td class="t-label">T.V.A {{ rtrim(rtrim(number_format($bucket['rate'], 2, ',', ''), '0'), ',') }}%</td>
                <td class="t-value">{{ number_format($bucket['amount'], 2, ',', ' ') }}</td>
            </tr>
            @endforeach
            <tr>
                <td class="t-label" style="border-top: 1px solid #ccc;">T.V.A TOTAL</td>
                <td class="t-value" style="border-top: 1px solid #ccc;">{{ number_format($totalTaxStored, 2, ',', ' ') }}</td>
            </tr>
        @else
            @php $bucket = reset($taxByRate); @endphp
            <tr>
                <td class="t-label">T.V.A {{ rtrim(rtrim(number_format($bucket['rate'], 2, ',', ''), '0'), ',') }}%</td>
                <td class="t-value">{{ number_format($totalTaxStored, 2, ',', ' ') }}</td>
            </tr>
        @endif

    @elseif($isDebitStyle)
        {{-- ── Style used in debit-note model-1 (standalone totals-table, no colspan) ── --}}
        @if(count($taxByRate) === 0)
            <tr>
                <td>T.V.A 0%</td>
                <td class="text-right">0,00 {{ $currency }}</td>
            </tr>
        @elseif($multiRate)
            @foreach($taxByRate as $bucket)
            <tr>
                <td>T.V.A {{ rtrim(rtrim(number_format($bucket['rate'], 2, ',', ''), '0'), ',') }}%</td>
                <td class="text-right">{{ number_format($bucket['amount'], 2, ',', ' ') }} {{ $currency }}</td>
            </tr>
            @endforeach
            <tr>
                <td style="border-top: 1px solid #ccc;">T.V.A TOTAL</td>
                <td class="text-right" style="border-top: 1px solid #ccc;">{{ number_format($totalTaxStored, 2, ',', ' ') }} {{ $currency }}</td>
            </tr>
        @else
            @php $bucket = reset($taxByRate); @endphp
            <tr>
                <td>T.V.A {{ rtrim(rtrim(number_format($bucket['rate'], 2, ',', ''), '0'), ',') }}%</td>
                <td class="text-right">{{ number_format($totalTaxStored, 2, ',', ' ') }} {{ $currency }}</td>
            </tr>
        @endif

    @endif

@endif
