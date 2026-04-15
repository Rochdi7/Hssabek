<?php

namespace App\Services\Sales;

use App\Models\Sales\CreditNote;
use App\Models\Sales\CreditNoteApplication;
use App\Models\Sales\CreditNoteItem;
use App\Models\Sales\Invoice;
use App\Services\System\DocumentNumberService;
use Illuminate\Support\Facades\DB;

class CreditNoteService
{
    public function __construct(
        private readonly TaxCalculationService $taxService,
        private readonly DocumentNumberService $docService,
        private readonly InvoiceService $invoiceService,
    ) {}

    /**
     * Create a credit note with line items and server-calculated totals.
     */
    public function create(array $validated): CreditNote
    {
        return DB::transaction(function () use ($validated) {
            $items = $validated['items'] ?? [];

            // Calculate totals from line items
            $subtotal = 0.0;
            $taxTotal = 0.0;
            $calculatedItems = [];

            foreach ($items as $index => $item) {
                $quantity = (float) ($item['quantity'] ?? 1);
                $unitPrice = (float) ($item['unit_price'] ?? 0);
                $taxRate = (float) ($item['tax_rate'] ?? 0);

                $lineSubtotal = round($quantity * $unitPrice, 2);
                $lineTax = round($lineSubtotal * ($taxRate / 100), 2);
                $lineTotal = round($lineSubtotal + $lineTax, 2);

                $subtotal += $lineSubtotal;
                $taxTotal += $lineTax;

                $calculatedItems[] = array_merge($item, [
                    'line_total' => $lineTotal,
                    'position' => $item['position'] ?? ($index + 1),
                ]);
            }

            $total = round($subtotal + $taxTotal, 2);

            $creditNote = CreditNote::create([
                'customer_id' => $validated['customer_id'],
                'invoice_id' => $validated['invoice_id'] ?? null,
                'number' => $this->docService->next('credit_note'),
                'reference_number' => $validated['reference_number'] ?? null,
                'status' => 'draft',
                'issue_date' => $validated['issue_date'],
                'enable_tax' => $validated['enable_tax'] ?? true,
                'subtotal' => round($subtotal, 2),
                'tax_total' => round($taxTotal, 2),

                'total' => $total,
                'notes' => $validated['notes'] ?? null,
            ]);

            foreach ($calculatedItems as $item) {
                CreditNoteItem::create([
                    'credit_note_id' => $creditNote->id,
                    'label' => $item['label'],
                    'description' => $item['description'] ?? null,
                    'quantity' => $item['quantity'],
                    'unit_price' => $item['unit_price'],
                    'tax_rate' => $item['tax_rate'] ?? 0,
                    'line_total' => $item['line_total'],
                    'position' => $item['position'],
                ]);
            }

            return $creditNote->load('items');
        });
    }

    /**
     * Update a draft credit note.
     */
    public function update(CreditNote $creditNote, array $validated): CreditNote
    {
        if ($creditNote->status !== 'draft') {
            throw new \DomainException('Seuls les avoirs en brouillon peuvent être modifiés.');
        }

        return DB::transaction(function () use ($creditNote, $validated) {
            $items = $validated['items'] ?? [];

            $subtotal = 0.0;
            $taxTotal = 0.0;
            $calculatedItems = [];

            foreach ($items as $index => $item) {
                $quantity = (float) ($item['quantity'] ?? 1);
                $unitPrice = (float) ($item['unit_price'] ?? 0);
                $taxRate = (float) ($item['tax_rate'] ?? 0);

                $lineSubtotal = round($quantity * $unitPrice, 2);
                $lineTax = round($lineSubtotal * ($taxRate / 100), 2);
                $lineTotal = round($lineSubtotal + $lineTax, 2);

                $subtotal += $lineSubtotal;
                $taxTotal += $lineTax;

                $calculatedItems[] = array_merge($item, [
                    'line_total' => $lineTotal,
                    'position' => $item['position'] ?? ($index + 1),
                ]);
            }

            $total = round($subtotal + $taxTotal, 2);

            $creditNote->update([
                'customer_id' => $validated['customer_id'] ?? $creditNote->customer_id,
                'invoice_id' => $validated['invoice_id'] ?? $creditNote->invoice_id,
                'reference_number' => $validated['reference_number'] ?? $creditNote->reference_number,
                'issue_date' => $validated['issue_date'] ?? $creditNote->issue_date,
                'enable_tax' => $validated['enable_tax'] ?? $creditNote->enable_tax,
                'subtotal' => round($subtotal, 2),
                'tax_total' => round($taxTotal, 2),
                'total' => $total,
                'notes' => $validated['notes'] ?? $creditNote->notes,
            ]);

            $creditNote->items()->delete();
            foreach ($calculatedItems as $item) {
                CreditNoteItem::create([
                    'credit_note_id' => $creditNote->id,
                    'label' => $item['label'],
                    'description' => $item['description'] ?? null,
                    'quantity' => $item['quantity'],
                    'unit_price' => $item['unit_price'],
                    'tax_rate' => $item['tax_rate'] ?? 0,
                    'line_total' => $item['line_total'],
                    'position' => $item['position'],
                ]);
            }

            return $creditNote->fresh(['items']);
        });
    }

    /**
     * Transition credit note status.
     */
    public function transition(CreditNote $creditNote, string $newStatus): void
    {
        $allowed = [
            'draft' => ['issued', 'void'],
            'issued' => ['applied', 'void'],
            'applied' => [],
            'void' => [],
        ];

        $permitted = $allowed[$creditNote->status] ?? [];
        if (!in_array($newStatus, $permitted)) {
            throw new \DomainException(
                "Transition de statut invalide : {$creditNote->status} → {$newStatus}"
            );
        }

        $creditNote->update(['status' => $newStatus]);
    }

    /**
     * Apply a credit note to invoices.
     */
    public function apply(CreditNote $creditNote, array $allocations): void
    {
        if (!in_array($creditNote->status, ['issued'])) {
            throw new \DomainException("Seuls les avoirs émis peuvent être appliqués.");
        }

        DB::transaction(function () use ($creditNote, $allocations) {
            $totalApplied = (float) $creditNote->applications()->sum('amount_applied');

            foreach ($allocations as $alloc) {
                $amount = (float) $alloc['amount_applied'];
                $totalApplied += $amount;

                if ($totalApplied > (float) $creditNote->total + 0.01) {
                    throw new \DomainException(
                        "Le montant total appliqué dépasse le total de l'avoir."
                    );
                }

                $invoice = Invoice::findOrFail($alloc['invoice_id']);

                CreditNoteApplication::create([
                    'credit_note_id' => $creditNote->id,
                    'invoice_id' => $invoice->id,
                    'amount_applied' => $amount,
                    'applied_at' => now(),
                ]);

                // Recalculate invoice payment totals
                $this->invoiceService->updatePaymentTotals($invoice);
            }

            // If fully applied, transition status
            if ($totalApplied >= (float) $creditNote->total - 0.01) {
                $this->transition($creditNote, 'applied');
            }
        });
    }
}
