<?php

namespace App\Services\Purchases;

use App\Models\Purchases\DebitNote;
use App\Models\Purchases\DebitNoteApplication;
use App\Models\Purchases\DebitNoteItem;
use App\Models\Purchases\VendorBill;
use App\Services\Sales\TaxCalculationService;
use App\Services\System\DocumentNumberService;
use Illuminate\Support\Facades\DB;

class DebitNoteService
{
    public function __construct(
        private readonly VendorBillService $vendorBillService,
        private readonly TaxCalculationService $taxService,
        private readonly DocumentNumberService $docService,
    ) {}

    public function create(array $validated): DebitNote
    {
        return DB::transaction(function () use ($validated) {
            $items = $validated['items'] ?? [];
            $totals = $this->taxService->calculateDocument($items);

            $debitNote = DebitNote::create([
                'supplier_id' => $validated['supplier_id'],
                'purchase_order_id' => $validated['purchase_order_id'] ?? null,
                'vendor_bill_id' => $validated['vendor_bill_id'] ?? null,
                'number' => $this->docService->next('debit_note'),
                'reference_number' => $validated['reference_number'] ?? null,
                'status' => 'draft',
                'debit_note_date' => $validated['debit_note_date'],
                'due_date' => $validated['due_date'] ?? null,
                'enable_tax' => $validated['enable_tax'] ?? true,
                'subtotal' => $totals['subtotal'],
                'discount_total' => $totals['discount_total'],
                'tax_total' => $totals['tax_total'],
                'total' => $totals['total'],
                'notes' => $validated['notes'] ?? null,
                'terms' => $validated['terms'] ?? null,
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

            return $debitNote->load('items');
        });
    }

    public function update(DebitNote $debitNote, array $validated): DebitNote
    {
        if ($debitNote->status !== 'draft') {
            throw new \DomainException('Seules les notes de débit en brouillon peuvent être modifiées.');
        }

        return DB::transaction(function () use ($debitNote, $validated) {
            $items = $validated['items'] ?? [];
            $totals = $this->taxService->calculateDocument($items);

            $debitNote->update([
                'supplier_id' => $validated['supplier_id'] ?? $debitNote->supplier_id,
                'vendor_bill_id' => $validated['vendor_bill_id'] ?? $debitNote->vendor_bill_id,
                'debit_note_date' => $validated['debit_note_date'] ?? $debitNote->debit_note_date,
                'due_date' => $validated['due_date'] ?? $debitNote->due_date,
                'reference_number' => $validated['reference_number'] ?? $debitNote->reference_number,
                'notes' => $validated['notes'] ?? $debitNote->notes,
                'terms' => $validated['terms'] ?? $debitNote->terms,
                'subtotal' => $totals['subtotal'],
                'discount_total' => $totals['discount_total'],
                'tax_total' => $totals['tax_total'],
                'total' => $totals['total'],
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

            return $debitNote->fresh('items');
        });
    }

    /**
     * Apply a debit note to vendor bills.
     */
    public function apply(DebitNote $debitNote, array $allocations): void
    {
        DB::transaction(function () use ($debitNote, $allocations) {
            $totalAlreadyApplied = (float) $debitNote->applications()->sum('amount_applied');
            $totalNewApplied = 0;

            foreach ($allocations as $alloc) {
                $amountApplied = (float) $alloc['amount_applied'];
                if ($amountApplied <= 0) {
                    continue;
                }

                $totalNewApplied += $amountApplied;
                $vendorBill = VendorBill::findOrFail($alloc['vendor_bill_id']);

                // Anti-over-allocation check on vendor bill
                $outstanding = (float) $vendorBill->amount_due;
                if ($amountApplied > $outstanding + 0.01) {
                    throw new \DomainException(
                        "Le montant d'application ({$amountApplied}) dépasse le solde restant ({$outstanding}) de la facture fournisseur {$vendorBill->number}."
                    );
                }

                DebitNoteApplication::create([
                    'debit_note_id'  => $debitNote->id,
                    'vendor_bill_id' => $vendorBill->id,
                    'amount_applied' => $amountApplied,
                    'applied_at'     => now(),
                ]);

                $this->vendorBillService->updatePaymentTotals($vendorBill);
            }

            // Anti-over-allocation check on debit note total
            if (($totalAlreadyApplied + $totalNewApplied) > (float) $debitNote->total + 0.01) {
                throw new \DomainException(
                    "Le total des applications dépasse le montant de la note de débit."
                );
            }

            // Auto-transition to 'applied' if fully applied
            $totalApplied = $totalAlreadyApplied + $totalNewApplied;
            if ($totalApplied >= (float) $debitNote->total - 0.01) {
                $debitNote->update(['status' => 'applied']);
            }
        });
    }
}
