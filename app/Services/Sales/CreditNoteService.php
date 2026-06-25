<?php

namespace App\Services\Sales;

use App\Models\Inventory\StockMovement;
use App\Models\Sales\CreditNote;
use App\Models\Sales\CreditNoteApplication;
use App\Models\Sales\CreditNoteItem;
use App\Models\Sales\Invoice;
use App\Services\Inventory\StockService;
use App\Services\System\DocumentNumberService;
use Illuminate\Support\Facades\DB;

class CreditNoteService
{
    public function __construct(
        private readonly DocumentNumberService $docService,
        private readonly InvoiceService        $invoiceService,
        private readonly StockService          $stockService,
    ) {}

    /**
     * Create a credit note, make it immediately active, auto-apply to linked invoice,
     * and return credited stock to inventory.
     */
    public function create(array $validated): CreditNote
    {
        return DB::transaction(function () use ($validated) {
            $items = $validated['items'] ?? [];

            [$subtotal, $taxTotal, $calculatedItems] = $this->calculateItems($items);
            $total = round($subtotal + $taxTotal, 2);

            $creditNote = CreditNote::create([
                'customer_id'      => $validated['customer_id'],
                'invoice_id'       => $validated['invoice_id'] ?? null,
                'number'           => $this->docService->next('credit_note'),
                'reference_number' => $validated['reference_number'] ?? null,
                'status'           => 'active',
                'issue_date'       => $validated['issue_date'],
                'enable_tax'       => $validated['enable_tax'] ?? true,
                'subtotal'         => round($subtotal, 2),
                'tax_total'        => round($taxTotal, 2),
                'total'            => $total,
                'notes'            => $validated['notes'] ?? null,
            ]);

            foreach ($calculatedItems as $item) {
                CreditNoteItem::create([
                    'credit_note_id'  => $creditNote->id,
                    'product_id'      => $item['product_id'] ?? null,
                    'invoice_item_id' => $item['invoice_item_id'] ?? null,
                    'label'           => $item['label'],
                    'description'     => $item['description'] ?? null,
                    'quantity'        => $item['quantity'],
                    'unit_price'      => $item['unit_price'],
                    'tax_rate'        => $item['tax_rate'] ?? 0,
                    'line_total'      => $item['line_total'],
                    'position'        => $item['position'],
                ]);
            }

            // Return stock for tracked products
            $this->returnStockOnce($creditNote);

            // Auto-apply to linked invoice immediately
            if (!empty($validated['invoice_id'])) {
                $invoice = Invoice::find($validated['invoice_id']);
                if ($invoice) {
                    $this->applyToInvoice($creditNote, $invoice, $total);
                }
            }

            return $creditNote->load('items');
        });
    }

    /**
     * Update an active credit note. Reverses old stock movements and applications,
     * then re-applies with new totals.
     */
    public function update(CreditNote $creditNote, array $validated): CreditNote
    {
        if ($creditNote->status === 'void') {
            throw new \DomainException('Un avoir annulé ne peut pas être modifié.');
        }

        return DB::transaction(function () use ($creditNote, $validated) {
            $items = $validated['items'] ?? [];

            [$subtotal, $taxTotal, $calculatedItems] = $this->calculateItems($items);
            $total = round($subtotal + $taxTotal, 2);

            // Reverse existing stock movements referencing this credit note
            $this->reverseStockMovements($creditNote);

            // Reverse existing applications so we can re-apply with new total
            $affectedInvoiceIds = $creditNote->applications()->pluck('invoice_id')->unique();
            $creditNote->applications()->delete();

            $creditNote->update([
                'customer_id'      => $validated['customer_id'] ?? $creditNote->customer_id,
                'invoice_id'       => $validated['invoice_id'] ?? $creditNote->invoice_id,
                'reference_number' => $validated['reference_number'] ?? $creditNote->reference_number,
                'issue_date'       => $validated['issue_date'] ?? $creditNote->issue_date,
                'enable_tax'       => $validated['enable_tax'] ?? $creditNote->enable_tax,
                'subtotal'         => round($subtotal, 2),
                'tax_total'        => round($taxTotal, 2),
                'total'            => $total,
                'notes'            => $validated['notes'] ?? $creditNote->notes,
            ]);

            $creditNote->items()->delete();
            foreach ($calculatedItems as $item) {
                CreditNoteItem::create([
                    'credit_note_id'  => $creditNote->id,
                    'product_id'      => $item['product_id'] ?? null,
                    'invoice_item_id' => $item['invoice_item_id'] ?? null,
                    'label'           => $item['label'],
                    'description'     => $item['description'] ?? null,
                    'quantity'        => $item['quantity'],
                    'unit_price'      => $item['unit_price'],
                    'tax_rate'        => $item['tax_rate'] ?? 0,
                    'line_total'      => $item['line_total'],
                    'position'        => $item['position'],
                ]);
            }

            // Return stock with new quantities
            $creditNote->loadMissing('items.product');
            $this->returnStockOnce($creditNote);

            // Recalculate previously affected invoices (without new application)
            foreach ($affectedInvoiceIds as $invoiceId) {
                $inv = Invoice::find($invoiceId);
                if ($inv) {
                    $this->invoiceService->updatePaymentTotals($inv);
                }
            }

            // Apply new total to the linked invoice
            $linkedInvoiceId = $validated['invoice_id'] ?? $creditNote->invoice_id;
            if ($linkedInvoiceId) {
                $invoice = Invoice::find($linkedInvoiceId);
                if ($invoice) {
                    $this->applyToInvoice($creditNote, $invoice, $total);
                }
            }

            return $creditNote->fresh(['items']);
        });
    }

    /**
     * Void a credit note. Reverses applications and stock movements.
     */
    public function void(CreditNote $creditNote): void
    {
        if ($creditNote->status === 'void') {
            return;
        }

        DB::transaction(function () use ($creditNote) {
            $affectedInvoiceIds = $creditNote->applications()->pluck('invoice_id')->unique();

            $creditNote->applications()->delete();
            $creditNote->update(['status' => 'void']);

            // Reverse stock that was returned when this credit note was created
            $this->reverseStockMovements($creditNote);

            foreach ($affectedInvoiceIds as $invoiceId) {
                $inv = Invoice::find($invoiceId);
                if ($inv) {
                    $this->invoiceService->updatePaymentTotals($inv);
                }
            }
        });
    }

    // ── Private helpers ───────────────────────────────────────────────────────

    /**
     * Return stock to inventory for each tracked-product line on the credit note.
     * Idempotent: skips any product already having a 'return_in' movement for this CN.
     */
    private function returnStockOnce(CreditNote $creditNote): void
    {
        $creditNote->loadMissing('items.product');

        foreach ($creditNote->items as $item) {
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

            $alreadyMoved = StockMovement::where('reference_type', CreditNote::class)
                ->where('reference_id', $creditNote->id)
                ->where('product_id', $item->product_id)
                ->where('movement_type', 'return_in')
                ->exists();

            if ($alreadyMoved) {
                continue;
            }

            $this->stockService->adjust(
                $item->product_id,
                (float) $item->quantity,
                'return_in',
                "Avoir #{$creditNote->number}",
                null,
                CreditNote::class,
                $creditNote->id
            );
        }
    }

    /**
     * Reverse all return_in stock movements that were created for this credit note.
     * Used when updating or voiding.
     */
    private function reverseStockMovements(CreditNote $creditNote): void
    {
        $movements = StockMovement::where('reference_type', CreditNote::class)
            ->where('reference_id', $creditNote->id)
            ->where('movement_type', 'return_in')
            ->get();

        foreach ($movements as $movement) {
            $this->stockService->adjust(
                $movement->product_id,
                (float) $movement->quantity,
                'return_out',
                "Annulation avoir #{$creditNote->number}",
                $movement->warehouse_id,
                CreditNote::class,
                $creditNote->id
            );
        }

        // Delete the reversed movement records so returnStockOnce stays idempotent
        StockMovement::where('reference_type', CreditNote::class)
            ->where('reference_id', $creditNote->id)
            ->where('movement_type', 'return_in')
            ->delete();
    }

    /**
     * Create an application record and immediately recalculate the invoice totals.
     * Caps the applied amount at the invoice's remaining balance.
     */
    private function applyToInvoice(CreditNote $creditNote, Invoice $invoice, float $amount): void
    {
        $remaining = (float) $invoice->amount_due;
        $toApply   = min($amount, $remaining > 0 ? $remaining : $amount);

        if ($toApply <= 0) {
            return;
        }

        CreditNoteApplication::create([
            'credit_note_id' => $creditNote->id,
            'invoice_id'     => $invoice->id,
            'amount_applied' => round($toApply, 2),
            'applied_at'     => now(),
        ]);

        // Update status on the credit note if fully applied
        if (round($toApply, 2) >= (float) $creditNote->total - 0.01) {
            $creditNote->update(['status' => 'applied']);
        }

        $this->invoiceService->updatePaymentTotals($invoice);
    }

    /**
     * Calculate line items and return [subtotal, taxTotal, calculatedItems].
     */
    private function calculateItems(array $items): array
    {
        $subtotal        = 0.0;
        $taxTotal        = 0.0;
        $calculatedItems = [];

        foreach ($items as $index => $item) {
            $quantity  = (float) ($item['quantity'] ?? 1);
            $unitPrice = (float) ($item['unit_price'] ?? 0);
            $taxRate   = (float) ($item['tax_rate'] ?? 0);

            $lineSubtotal = round($quantity * $unitPrice, 2);
            $lineTax      = round($lineSubtotal * ($taxRate / 100), 2);
            $lineTotal    = round($lineSubtotal + $lineTax, 2);

            $subtotal += $lineSubtotal;
            $taxTotal += $lineTax;

            $calculatedItems[] = array_merge($item, [
                'line_total' => $lineTotal,
                'position'   => $item['position'] ?? ($index + 1),
            ]);
        }

        return [$subtotal, $taxTotal, $calculatedItems];
    }
}
