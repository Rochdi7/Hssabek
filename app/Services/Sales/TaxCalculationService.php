<?php

namespace App\Services\Sales;

use App\Models\Catalog\TaxGroup;

class TaxCalculationService
{
    /**
     * Resolve the combined tax rate for a TaxGroup (sum of its rates).
     */
    public function resolveTaxRate(?string $taxGroupId): float
    {
        if (!$taxGroupId) {
            return 0.0;
        }

        $taxGroup = TaxGroup::with('rates')->find($taxGroupId);

        if (!$taxGroup || !$taxGroup->is_active) {
            return 0.0;
        }

        return (float) $taxGroup->rates->sum('rate');
    }

    /**
     * Calculate a single line item's totals.
     *
     * Input: ['quantity', 'unit_price', 'discount_type', 'discount_value', 'tax_rate', 'tax_group_id']
     * Returns: ['line_subtotal', 'line_tax', 'line_total', 'tax_rate', 'discount_value']
     */
    /**
     * Resolve calculated_measurement from measurement fields.
     * Returns null when calculation_mode is 'quantity' (no measurement needed).
     */
    public function resolveMeasurement(array $item): ?float
    {
        $mode = $item['calculation_mode'] ?? 'quantity';

        if ($mode === 'surface') {
            $l = (float) ($item['length'] ?? 0);
            $h = (float) ($item['height'] ?? 0);
            $w = (float) ($item['width'] ?? 0);
            $second = $h > 0 ? $h : $w;
            return $l > 0 && $second > 0 ? round($l * $second, 4) : null;
        }

        if ($mode === 'volume') {
            $l = (float) ($item['length'] ?? 0);
            $w = (float) ($item['width'] ?? 0);
            $h = (float) ($item['height'] ?? 0);
            return $l > 0 && $w > 0 && $h > 0 ? round($l * $w * $h, 4) : null;
        }

        return null;
    }

    public function calculateLineItem(array $item): array
    {
        $mode = $item['calculation_mode'] ?? 'quantity';
        $baseQty = (float) ($item['quantity'] ?? 1);

        // For surface/volume modes, effective quantity = measurement × item quantity
        $measurement = $this->resolveMeasurement($item);
        $quantity = ($measurement !== null) ? round($measurement * $baseQty, 4) : $baseQty;

        $unitPrice = (float) ($item['unit_price'] ?? 0);
        $discountType = $item['discount_type'] ?? 'none';
        $discountValue = (float) ($item['discount_value'] ?? 0);

        // Resolve tax rate: use explicit tax_rate if set, otherwise resolve from tax_group_id
        $taxRate = isset($item['tax_rate']) && $item['tax_rate'] > 0
            ? (float) $item['tax_rate']
            : $this->resolveTaxRate($item['tax_group_id'] ?? null);

        // Gross line amount before discount
        $grossAmount = round($quantity * $unitPrice, 2);

        // Apply discount
        $discountAmount = match ($discountType) {
            'percentage' => round($grossAmount * ($discountValue / 100), 2),
            'fixed' => round(min($discountValue, $grossAmount), 2),
            default => 0.0,
        };

        $lineSubtotal = round($grossAmount - $discountAmount, 2);

        // Tax on discounted amount
        $lineTax = round($lineSubtotal * ($taxRate / 100), 2);
        $lineTotal = round($lineSubtotal + $lineTax, 2);

        return [
            'line_subtotal' => $lineSubtotal,
            'line_tax' => $lineTax,
            'line_total' => $lineTotal,
            'tax_rate' => round($taxRate, 4),
            'discount_value' => round($discountValue, 4),
        ];
    }

    /**
     * Calculate totals for a full document (invoice, quote, etc.).
     *
     * @param array $items   Line items (each with quantity, unit_price, discount_type, discount_value, tax_rate/tax_group_id)
     * @param array $charges Additional charges (each with amount, tax_rate)
     * @return array ['subtotal', 'discount_total', 'tax_total', 'total', 'calculated_items', 'calculated_charges']
     */
    public function calculateDocument(array $items, array $charges = []): array
    {
        $subtotal = 0.0;
        $discountTotal = 0.0;
        $taxTotal = 0.0;
        $calculatedItems = [];

        foreach ($items as $index => $item) {
            $calculated = $this->calculateLineItem($item);

            // Use effective quantity (measurement × qty for surface/volume, raw qty otherwise)
            $measurement = $this->resolveMeasurement($item);
            $baseQty = (float) ($item['quantity'] ?? 1);
            $effectiveQty = ($measurement !== null) ? round($measurement * $baseQty, 4) : $baseQty;

            $grossAmount = round($effectiveQty * (float) ($item['unit_price'] ?? 0), 2);
            $discountAmount = round($grossAmount - $calculated['line_subtotal'], 2);

            $subtotal += $grossAmount;
            $discountTotal += $discountAmount;
            $taxTotal += $calculated['line_tax'];

            $calculatedItems[] = array_merge($item, $calculated, [
                'position' => $item['position'] ?? ($index + 1),
                'calculated_measurement' => $measurement,
            ]);
        }

        // Process charges
        $calculatedCharges = [];
        foreach ($charges as $index => $charge) {
            $chargeAmount = round((float) ($charge['amount'] ?? 0), 2);
            $chargeTaxRate = (float) ($charge['tax_rate'] ?? 0);
            $chargeTax = round($chargeAmount * ($chargeTaxRate / 100), 2);

            $taxTotal += $chargeTax;

            $calculatedCharges[] = array_merge($charge, [
                'amount' => $chargeAmount,
                'tax_rate' => round($chargeTaxRate, 4),
                'position' => $charge['position'] ?? ($index + 1),
            ]);
        }

        $chargesTotal = round(array_sum(array_column($calculatedCharges, 'amount')), 2);
        $total = round($subtotal - $discountTotal + $taxTotal + $chargesTotal, 2);

        return [
            'subtotal' => round($subtotal, 2),
            'discount_total' => round($discountTotal, 2),
            'tax_total' => round($taxTotal, 2),
            'total' => $total,
            'calculated_items' => $calculatedItems,
            'calculated_charges' => $calculatedCharges,
        ];
    }
}
