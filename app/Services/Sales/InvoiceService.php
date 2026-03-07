<?php

namespace App\Services\Sales;

use App\Events\InvoiceCreated;
use App\Events\InvoicePaid;
use App\Models\Sales\Invoice;
use App\Models\Sales\InvoiceCharge;
use App\Models\Sales\InvoiceItem;
use App\Services\System\DocumentNumberService;
use Illuminate\Support\Facades\DB;

class InvoiceService
{
    public function __construct(
        private readonly TaxCalculationService $taxService,
        private readonly DocumentNumberService $docService,
    ) {}

    /**
     * Create an invoice with line items, charges, and server-calculated totals.
     */
    public function create(array $validated): Invoice
    {
        return DB::transaction(function () use ($validated) {
            $items = $validated['items'] ?? [];
            $charges = $validated['charges'] ?? [];

            $totals = $this->taxService->calculateDocument($items, $charges);

            $invoice = Invoice::create([
                'customer_id' => $validated['customer_id'],
                'number' => $this->docService->next('invoice'),
                'reference_number' => $validated['reference_number'] ?? null,
                'status' => 'draft',
                'issue_date' => $validated['issue_date'],
                'due_date' => $validated['due_date'] ?? null,
                'enable_tax' => $validated['enable_tax'] ?? true,
                'bill_from_snapshot' => $validated['bill_from_snapshot'] ?? null,
                'bill_to_snapshot' => $validated['bill_to_snapshot'] ?? null,
                'subtotal' => $totals['subtotal'],
                'discount_total' => $totals['discount_total'],
                'tax_total' => $totals['tax_total'],
                'round_off' => 0,
                'total' => $totals['total'],
                'amount_paid' => 0,
                'amount_due' => $totals['total'],
                'total_in_words' => $validated['total_in_words'] ?? null,
                'notes' => $validated['notes'] ?? null,
                'terms' => $validated['terms'] ?? null,
                'bank_details_snapshot' => $validated['bank_details_snapshot'] ?? null,
            ]);

            foreach ($totals['calculated_items'] as $item) {
                InvoiceItem::create([
                    'invoice_id' => $invoice->id,
                    'product_id' => $item['product_id'] ?? null,
                    'label' => $item['label'],
                    'description' => $item['description'] ?? null,
                    'quantity' => $item['quantity'],
                    'unit_id' => $item['unit_id'] ?? null,
                    'unit_price' => $item['unit_price'],
                    'discount_type' => $item['discount_type'] ?? 'none',
                    'discount_value' => $item['discount_value'],
                    'tax_rate' => $item['tax_rate'],
                    'tax_group_id' => $item['tax_group_id'] ?? null,
                    'line_subtotal' => $item['line_subtotal'],
                    'line_tax' => $item['line_tax'],
                    'line_total' => $item['line_total'],
                    'position' => $item['position'],
                ]);
            }

            foreach ($totals['calculated_charges'] as $charge) {
                InvoiceCharge::create([
                    'invoice_id' => $invoice->id,
                    'label' => $charge['label'],
                    'amount' => $charge['amount'],
                    'tax_rate' => $charge['tax_rate'],
                    'position' => $charge['position'],
                ]);
            }

            $invoice = $invoice->load('items', 'charges');

            InvoiceCreated::dispatch($invoice);

            return $invoice;
        });
    }

    /**
     * Update a draft invoice — recalculate totals, sync items and charges.
     */
    public function update(Invoice $invoice, array $validated): Invoice
    {
        if ($invoice->status !== 'draft') {
            throw new \DomainException('Seules les factures en brouillon peuvent être modifiées.');
        }

        return DB::transaction(function () use ($invoice, $validated) {
            $items = $validated['items'] ?? [];
            $charges = $validated['charges'] ?? [];

            $totals = $this->taxService->calculateDocument($items, $charges);

            $invoice->update([
                'customer_id' => $validated['customer_id'] ?? $invoice->customer_id,
                'reference_number' => $validated['reference_number'] ?? $invoice->reference_number,
                'issue_date' => $validated['issue_date'] ?? $invoice->issue_date,
                'due_date' => $validated['due_date'] ?? $invoice->due_date,
                'enable_tax' => $validated['enable_tax'] ?? $invoice->enable_tax,
                'subtotal' => $totals['subtotal'],
                'discount_total' => $totals['discount_total'],
                'tax_total' => $totals['tax_total'],
                'total' => $totals['total'],
                'amount_due' => $totals['total'] - (float) $invoice->amount_paid,
                'notes' => $validated['notes'] ?? $invoice->notes,
                'terms' => $validated['terms'] ?? $invoice->terms,
            ]);

            // Replace items
            $invoice->items()->delete();
            foreach ($totals['calculated_items'] as $item) {
                InvoiceItem::create([
                    'invoice_id' => $invoice->id,
                    'product_id' => $item['product_id'] ?? null,
                    'label' => $item['label'],
                    'description' => $item['description'] ?? null,
                    'quantity' => $item['quantity'],
                    'unit_id' => $item['unit_id'] ?? null,
                    'unit_price' => $item['unit_price'],
                    'discount_type' => $item['discount_type'] ?? 'none',
                    'discount_value' => $item['discount_value'],
                    'tax_rate' => $item['tax_rate'],
                    'tax_group_id' => $item['tax_group_id'] ?? null,
                    'line_subtotal' => $item['line_subtotal'],
                    'line_tax' => $item['line_tax'],
                    'line_total' => $item['line_total'],
                    'position' => $item['position'],
                ]);
            }

            // Replace charges
            $invoice->charges()->delete();
            foreach ($totals['calculated_charges'] as $charge) {
                InvoiceCharge::create([
                    'invoice_id' => $invoice->id,
                    'label' => $charge['label'],
                    'amount' => $charge['amount'],
                    'tax_rate' => $charge['tax_rate'],
                    'position' => $charge['position'],
                ]);
            }

            return $invoice->fresh(['items', 'charges']);
        });
    }

    /**
     * Transition invoice status — enforces allowed state machine.
     */
    public function transition(Invoice $invoice, string $newStatus): void
    {
        $allowed = [
            'draft' => ['sent', 'void'],
            'sent' => ['partial', 'paid', 'void'],
            'partial' => ['paid', 'void'],
            'paid' => [],
            'overdue' => ['paid', 'partial', 'void'],
            'void' => [],
        ];

        $permitted = $allowed[$invoice->status] ?? [];
        if (!in_array($newStatus, $permitted)) {
            throw new \DomainException(
                "Transition de statut invalide : {$invoice->status} → {$newStatus}"
            );
        }

        $updates = ['status' => $newStatus];

        if ($newStatus === 'sent' && !$invoice->sent_at) {
            $updates['sent_at'] = now();
        }

        if ($newStatus === 'paid') {
            $updates['paid_at'] = now();
        }

        $invoice->update($updates);

        if ($newStatus === 'paid') {
            InvoicePaid::dispatch($invoice);
        }
    }

    /**
     * Recalculate amount_paid / amount_due from PaymentAllocations.
     * Called after payment creation or deletion.
     */
    public function updatePaymentTotals(Invoice $invoice): void
    {
        $totalPaid = (float) $invoice->paymentAllocations()->sum('amount_applied');
        $totalCredits = (float) $invoice->creditNoteApplications()->sum('amount_applied');
        $amountPaid = round($totalPaid + $totalCredits, 2);
        $amountDue = round((float) $invoice->total - $amountPaid, 2);

        $invoice->update([
            'amount_paid' => $amountPaid,
            'amount_due' => max(0, $amountDue),
        ]);

        // Auto-transition status based on payment
        if ($amountDue <= 0.01 && !in_array($invoice->status, ['paid', 'void'])) {
            $this->transition($invoice, 'paid');
        } elseif ($amountPaid > 0 && $amountDue > 0.01 && $invoice->status === 'sent') {
            $this->transition($invoice, 'partial');
        }
    }
}
