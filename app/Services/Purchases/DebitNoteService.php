<?php

namespace App\Services\Purchases;

use App\Models\Inventory\StockMovement;
use App\Models\Purchases\DebitNote;
use App\Models\Purchases\DebitNoteApplication;
use App\Models\Purchases\DebitNoteItem;
use App\Models\Purchases\VendorBill;
use App\Services\Inventory\StockService;
use App\Services\Sales\TaxCalculationService;
use App\Services\System\DocumentNumberService;
use Illuminate\Support\Facades\DB;

class DebitNoteService
{
    public function __construct(
        private readonly VendorBillService      $vendorBillService,
        private readonly TaxCalculationService  $taxService,
        private readonly DocumentNumberService  $docService,
        private readonly StockService           $stockService,
    ) {}

    /**
     * Create a debit note, make it immediately active, deduct stock for returned
     * products, and auto-apply to the linked vendor bill.
     */
    public function create(array $validated): DebitNote
    {
        return DB::transaction(function () use ($validated) {
            $items  = $validated['items'] ?? [];
            $totals = $this->taxService->calculateDocument($items);

            $debitNote = DebitNote::create([
                'supplier_id'       => $validated['supplier_id'],
                'purchase_order_id' => $validated['purchase_order_id'] ?? null,
                'vendor_bill_id'    => $validated['vendor_bill_id'] ?? null,
                'number' => ($validated['number_mode'] ?? 'auto') === 'manuel' && !empty($validated['number'])
                    ? $validated['number']
                    : $this->docService->next('debit_note'),
                'reference_number'  => $validated['reference_number'] ?? null,
                'status'            => 'active',
                'debit_note_date'   => $validated['debit_note_date'],
                'due_date'          => $validated['due_date'] ?? null,
                'enable_tax'        => $validated['enable_tax'] ?? true,
                'subtotal'          => $totals['subtotal'],
                'discount_total'    => $totals['discount_total'],
                'tax_total'         => $totals['tax_total'],
                'total'             => $totals['total'],
                'notes'             => $validated['notes'] ?? null,
                'terms'             => $validated['terms'] ?? null,
            ]);

            foreach ($totals['calculated_items'] as $item) {
                DebitNoteItem::create([
                    'debit_note_id'  => $debitNote->id,
                    'product_id'     => $item['product_id'] ?? null,
                    'label'          => $item['label'] ?? '',
                    'description'    => $item['description'] ?? null,
                    'quantity'       => $item['quantity'],
                    'unit_cost'      => $item['unit_price'],
                    'discount_type'  => $item['discount_type'] ?? 'none',
                    'discount_value' => $item['discount_value'] ?? 0,
                    'tax_rate'       => $item['tax_rate'],
                    'tax_group_id'   => $item['tax_group_id'] ?? null,
                    'line_total'     => $item['line_total'],
                    'position'       => $item['position'],
                ]);
            }

            // Deduct stock — goods returned to supplier leave the warehouse
            $this->deductStockOnce($debitNote);

            // Auto-apply to linked vendor bill immediately
            if (!empty($validated['vendor_bill_id'])) {
                $bill = VendorBill::find($validated['vendor_bill_id']);
                if ($bill) {
                    $this->applyToBill($debitNote, $bill, (float) $totals['total']);
                }
            }

            return $debitNote->load('items');
        });
    }

    /**
     * Update an active debit note. Reverses old stock movements and applications,
     * then re-applies with new totals.
     */
    public function update(DebitNote $debitNote, array $validated): DebitNote
    {
        if ($debitNote->status === 'void') {
            throw new \DomainException('Une note de débit annulée ne peut pas être modifiée.');
        }

        return DB::transaction(function () use ($debitNote, $validated) {
            $items  = $validated['items'] ?? [];
            $totals = $this->taxService->calculateDocument($items);

            // Reverse existing stock movements before rebuilding items
            $this->reverseStockMovements($debitNote);

            // Reverse existing applications so we can re-apply with new total
            $affectedBillIds = $debitNote->applications()->pluck('vendor_bill_id')->unique();
            $debitNote->applications()->delete();

            $debitNote->update([
                'supplier_id'      => $validated['supplier_id'] ?? $debitNote->supplier_id,
                'vendor_bill_id'   => $validated['vendor_bill_id'] ?? $debitNote->vendor_bill_id,
                'number'           => ($validated['number_mode'] ?? 'auto') === 'manuel' && !empty($validated['number'])
                    ? $validated['number']
                    : $debitNote->number,
                'debit_note_date'  => $validated['debit_note_date'] ?? $debitNote->debit_note_date,
                'due_date'         => $validated['due_date'] ?? $debitNote->due_date,
                'reference_number' => $validated['reference_number'] ?? $debitNote->reference_number,
                'notes'            => $validated['notes'] ?? $debitNote->notes,
                'terms'            => $validated['terms'] ?? $debitNote->terms,
                'subtotal'         => $totals['subtotal'],
                'discount_total'   => $totals['discount_total'],
                'tax_total'        => $totals['tax_total'],
                'total'            => $totals['total'],
            ]);

            $debitNote->items()->delete();
            foreach ($totals['calculated_items'] as $item) {
                DebitNoteItem::create([
                    'debit_note_id'  => $debitNote->id,
                    'product_id'     => $item['product_id'] ?? null,
                    'label'          => $item['label'] ?? '',
                    'description'    => $item['description'] ?? null,
                    'quantity'       => $item['quantity'],
                    'unit_cost'      => $item['unit_price'],
                    'discount_type'  => $item['discount_type'] ?? 'none',
                    'discount_value' => $item['discount_value'] ?? 0,
                    'tax_rate'       => $item['tax_rate'],
                    'tax_group_id'   => $item['tax_group_id'] ?? null,
                    'line_total'     => $item['line_total'],
                    'position'       => $item['position'],
                ]);
            }

            // Re-deduct stock with new quantities
            $debitNote->loadMissing('items.product');
            $this->deductStockOnce($debitNote);

            // Recalculate previously affected bills
            foreach ($affectedBillIds as $billId) {
                $bill = VendorBill::find($billId);
                if ($bill) {
                    $this->vendorBillService->updatePaymentTotals($bill);
                }
            }

            $linkedBillId = $validated['vendor_bill_id'] ?? $debitNote->vendor_bill_id;
            if ($linkedBillId) {
                $bill = VendorBill::find($linkedBillId);
                if ($bill) {
                    $this->applyToBill($debitNote, $bill, (float) $totals['total']);
                }
            }

            return $debitNote->fresh('items');
        });
    }

    /**
     * Void a debit note. Reverses stock deductions and all applications.
     */
    public function void(DebitNote $debitNote): void
    {
        if ($debitNote->status === 'void') {
            return;
        }

        DB::transaction(function () use ($debitNote) {
            $affectedBillIds = $debitNote->applications()->pluck('vendor_bill_id')->unique();

            $debitNote->applications()->delete();
            $debitNote->update(['status' => 'void']);

            // Reverse the return_out stock deductions
            $this->reverseStockMovements($debitNote);

            foreach ($affectedBillIds as $billId) {
                $bill = VendorBill::find($billId);
                if ($bill) {
                    $this->vendorBillService->updatePaymentTotals($bill);
                }
            }
        });
    }

    // ── Private helpers ───────────────────────────────────────────────────────

    /**
     * Deduct stock for each tracked-product line — goods leaving for the supplier.
     * Idempotent: skips any product already having a 'return_out' movement for this DN.
     */
    private function deductStockOnce(DebitNote $debitNote): void
    {
        $debitNote->loadMissing('items.product');

        foreach ($debitNote->items as $item) {
            if (
                !$item->product_id ||
                !$item->product ||
                !$item->product->track_inventory ||
                $item->product->item_type !== 'product'
            ) {
                continue;
            }

            if ((float) $item->quantity <= 0) {
                continue;
            }

            $alreadyMoved = StockMovement::where('reference_type', DebitNote::class)
                ->where('reference_id', $debitNote->id)
                ->where('product_id', $item->product_id)
                ->where('movement_type', 'return_out')
                ->exists();

            if ($alreadyMoved) {
                continue;
            }

            $this->stockService->adjust(
                $item->product_id,
                (float) $item->quantity,
                'return_out',
                "Note débit #{$debitNote->number}",
                null,
                DebitNote::class,
                $debitNote->id
            );
        }
    }

    /**
     * Reverse all return_out movements created for this debit note.
     * Used when updating or voiding.
     */
    private function reverseStockMovements(DebitNote $debitNote): void
    {
        $movements = StockMovement::where('reference_type', DebitNote::class)
            ->where('reference_id', $debitNote->id)
            ->where('movement_type', 'return_out')
            ->get();

        foreach ($movements as $movement) {
            $this->stockService->adjust(
                $movement->product_id,
                (float) $movement->quantity,
                'return_in',
                "Annulation note débit #{$debitNote->number}",
                $movement->warehouse_id,
                DebitNote::class,
                $debitNote->id
            );
        }

        StockMovement::where('reference_type', DebitNote::class)
            ->where('reference_id', $debitNote->id)
            ->where('movement_type', 'return_out')
            ->delete();
    }

    /**
     * Create an application record and recalculate the vendor bill totals.
     */
    private function applyToBill(DebitNote $debitNote, VendorBill $bill, float $amount): void
    {
        $remaining = (float) $bill->amount_due;
        $toApply   = min($amount, $remaining > 0 ? $remaining : $amount);

        if ($toApply <= 0) {
            return;
        }

        DebitNoteApplication::create([
            'debit_note_id'  => $debitNote->id,
            'vendor_bill_id' => $bill->id,
            'amount_applied' => round($toApply, 2),
            'applied_at'     => now(),
        ]);

        if (round($toApply, 2) >= (float) $debitNote->total - 0.01) {
            $debitNote->update(['status' => 'applied']);
        }

        $this->vendorBillService->updatePaymentTotals($bill);
    }
}
