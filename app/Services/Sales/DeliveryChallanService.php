<?php

namespace App\Services\Sales;

use App\Models\Sales\DeliveryChallan;
use App\Models\Sales\DeliveryChallanItem;
use App\Services\System\DocumentNumberService;
use Illuminate\Support\Facades\DB;

class DeliveryChallanService
{
    public function __construct(
        private readonly TaxCalculationService $taxService,
        private readonly DocumentNumberService $docService,
    ) {}

    public function create(array $validated): DeliveryChallan
    {
        return DB::transaction(function () use ($validated) {
            $items = $validated['items'] ?? [];
            $totals = $this->taxService->calculateDocument($items);

            $challan = DeliveryChallan::create([
                'customer_id' => $validated['customer_id'],
                'invoice_id' => $validated['invoice_id'] ?? null,
                'quote_id' => $validated['quote_id'] ?? null,
                'number' => $this->docService->next('delivery_challan'),
                'status' => 'draft',
                'challan_date' => $validated['challan_date'],
                'due_date' => $validated['due_date'] ?? null,
                'reference_number' => $validated['reference_number'] ?? null,
                'enable_tax' => $validated['enable_tax'] ?? true,
                'subtotal' => $totals['subtotal'],
                'discount_total' => $totals['discount_total'],
                'tax_total' => $totals['tax_total'],
                'total' => $totals['total'],
                'notes' => $validated['notes'] ?? null,
                'terms' => $validated['terms'] ?? null,
            ]);

            foreach ($totals['calculated_items'] as $item) {
                DeliveryChallanItem::create([
                    'delivery_challan_id' => $challan->id,
                    'product_id' => $item['product_id'] ?? null,
                    'label' => $item['label'] ?? null,
                    'quantity' => $item['quantity'],
                    'unit_price' => $item['unit_price'] ?? 0,
                    'tax_rate' => $item['tax_rate'] ?? 0,
                    'line_subtotal' => $item['line_subtotal'],
                    'line_tax' => $item['line_tax'],
                    'line_total' => $item['line_total'],
                    'position' => $item['position'],
                ]);
            }

            return $challan->load('items');
        });
    }

    public function update(DeliveryChallan $challan, array $validated): DeliveryChallan
    {
        return DB::transaction(function () use ($challan, $validated) {
            $items = $validated['items'] ?? [];
            $totals = $this->taxService->calculateDocument($items);

            $challan->update([
                'customer_id' => $validated['customer_id'] ?? $challan->customer_id,
                'invoice_id' => $validated['invoice_id'] ?? $challan->invoice_id,
                'challan_date' => $validated['challan_date'] ?? $challan->challan_date,
                'reference_number' => $validated['reference_number'] ?? $challan->reference_number,
                'notes' => $validated['notes'] ?? $challan->notes,
                'subtotal' => $totals['subtotal'],
                'discount_total' => $totals['discount_total'],
                'tax_total' => $totals['tax_total'],
                'total' => $totals['total'],
            ]);

            $challan->items()->delete();
            foreach ($totals['calculated_items'] as $item) {
                DeliveryChallanItem::create([
                    'delivery_challan_id' => $challan->id,
                    'product_id' => $item['product_id'] ?? null,
                    'label' => $item['label'] ?? null,
                    'quantity' => $item['quantity'],
                    'unit_price' => $item['unit_price'] ?? 0,
                    'tax_rate' => $item['tax_rate'] ?? 0,
                    'line_subtotal' => $item['line_subtotal'],
                    'line_tax' => $item['line_tax'],
                    'line_total' => $item['line_total'],
                    'position' => $item['position'],
                ]);
            }

            return $challan->fresh('items');
        });
    }
}
