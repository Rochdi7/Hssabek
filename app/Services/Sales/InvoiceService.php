<?php

namespace App\Services\Sales;

use App\Events\InvoiceCreated;
use App\Events\InvoicePaid;
use App\Models\Pro\RecurringInvoice;
use App\Models\Sales\Invoice;
use App\Models\Sales\InvoiceCharge;
use App\Models\Sales\InvoiceItem;
use App\Models\Inventory\StockMovement;
use App\Services\Inventory\StockService;
use App\Services\System\DocumentNumberService;
use Illuminate\Support\Facades\DB;

class InvoiceService
{
    public function __construct(
        private readonly TaxCalculationService $taxService,
        private readonly DocumentNumberService $docService,
        private readonly StockService $stockService,
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
                'status' => Invoice::STATUS_UNPAID,
                'issue_date' => $validated['issue_date'],
                'due_date' => $validated['due_date'] ?? null,
                'enable_tax' => $validated['enable_tax'] ?? true,
                'bill_from_snapshot' => $validated['bill_from_snapshot'] ?? null,
                'bill_to_snapshot' => array_merge(
                    is_array($validated['bill_to_snapshot'] ?? null) ? $validated['bill_to_snapshot'] : (json_decode($validated['bill_to_snapshot'] ?? 'null', true) ?? []),
                    ['addition' => $validated['addition'] ?? '']
                ),
                'subtotal' => $totals['subtotal'],
                'discount_total' => $totals['discount_total'],
                'tax_total' => $totals['tax_total'],

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
                    'calculation_mode' => $item['calculation_mode'] ?? 'quantity',
                    'length' => $item['length'] ?? null,
                    'width' => $item['width'] ?? null,
                    'height' => $item['height'] ?? null,
                    'thickness' => $item['thickness'] ?? null,
                    'measurement_unit' => $item['measurement_unit'] ?? null,
                    'calculated_measurement' => $item['calculated_measurement'] ?? null,
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

            // Goods are committed at creation now (no separate "sent" step).
            $this->deductStockOnce($invoice);

            // Create recurring invoice if enabled
            if (!empty($validated['is_recurring']) && $validated['is_recurring']) {
                RecurringInvoice::create([
                    'customer_id' => $validated['customer_id'],
                    'template_invoice_id' => $invoice->id,
                    'interval' => $validated['recurring_interval'],
                    'every' => $validated['recurring_every'] ?? 1,
                    'next_run_at' => $validated['recurring_next_run_at'],
                    'end_at' => $validated['recurring_end_at'] ?? null,
                    'status' => 'active',
                ]);
            }

            InvoiceCreated::dispatch($invoice);

            return $invoice;
        });
    }

    /**
     * Update an invoice — allowed only while unpaid and no money has been applied.
     */
    public function update(Invoice $invoice, array $validated): Invoice
    {
        if (!$this->isEditable($invoice)) {
            throw new \DomainException('Seules les factures non payées et sans paiement peuvent être modifiées.');
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
                'bill_to_snapshot' => array_merge(
                    is_array($invoice->bill_to_snapshot) ? $invoice->bill_to_snapshot : [],
                    ['addition' => $validated['addition'] ?? '']
                ),
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
                    'calculation_mode' => $item['calculation_mode'] ?? 'quantity',
                    'length' => $item['length'] ?? null,
                    'width' => $item['width'] ?? null,
                    'height' => $item['height'] ?? null,
                    'thickness' => $item['thickness'] ?? null,
                    'measurement_unit' => $item['measurement_unit'] ?? null,
                    'calculated_measurement' => $item['calculated_measurement'] ?? null,
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

            // Create recurring invoice if enabled and doesn't exist
            if (!empty($validated['is_recurring']) && $validated['is_recurring']) {
                $existingRecurring = $invoice->recurringInvoice;
                if (!$existingRecurring) {
                    RecurringInvoice::create([
                        'customer_id' => $validated['customer_id'] ?? $invoice->customer_id,
                        'template_invoice_id' => $invoice->id,
                        'interval' => $validated['recurring_interval'],
                        'every' => $validated['recurring_every'] ?? 1,
                        'next_run_at' => $validated['recurring_next_run_at'],
                        'end_at' => $validated['recurring_end_at'] ?? null,
                        'status' => 'active',
                    ]);
                }
            }

            return $invoice->fresh(['items', 'charges', 'recurringInvoice']);
        });
    }

    /**
     * Whether an invoice may still be edited: unpaid, not void, and no money applied.
     */
    public function isEditable(Invoice $invoice): bool
    {
        if (in_array($invoice->normalizedStatus(), [Invoice::STATUS_PAID, Invoice::STATUS_VOID], true)) {
            return false;
        }

        return (float) $invoice->amount_paid <= 0.0;
    }

    /**
     * Manually cancel an invoice. Void is the only manual status change allowed.
     */
    public function void(Invoice $invoice): void
    {
        if ($invoice->status === Invoice::STATUS_VOID) {
            return;
        }

        $invoice->update(['status' => Invoice::STATUS_VOID]);
    }

    /**
     * Deduct stock for tracked products exactly once per invoice.
     * Idempotent: skips any product that already has a 'sale_out' movement
     * referencing this invoice, so re-running never double-deducts.
     */
    public function deductStockOnce(Invoice $invoice): void
    {
        $invoice->loadMissing('items.product');

        foreach ($invoice->items as $item) {
            if (
                !$item->product ||
                !$item->product->track_inventory ||
                $item->product->item_type !== 'product'
            ) {
                continue;
            }

            $alreadyMoved = StockMovement::where('reference_type', Invoice::class)
                ->where('reference_id', $invoice->id)
                ->where('product_id', $item->product_id)
                ->where('movement_type', 'sale_out')
                ->exists();

            if ($alreadyMoved) {
                continue;
            }

            $this->stockService->adjust(
                $item->product_id,
                (float) $item->quantity,
                'sale_out',
                "Facture #{$invoice->number}",
                null,
                Invoice::class,
                $invoice->id
            );
        }
    }

    /**
     * Recalculate amount_paid / amount_due from PaymentAllocations + credit notes,
     * then auto-resolve the status. Payment data is the single source of truth.
     * Called after payment creation/deletion and credit-note application.
     */
    public function updatePaymentTotals(Invoice $invoice): void
    {
        $totalPaid = (float) $invoice->paymentAllocations()->sum('amount_applied');
        $totalCredits = (float) $invoice->creditNoteApplications()->sum('amount_applied');
        $amountPaid = round($totalPaid + $totalCredits, 2);
        $amountDue = round((float) $invoice->total - $amountPaid, 2);

        $resolved = self::resolvePaymentStatus(
            $invoice->normalizedStatus(),
            $amountPaid,
            $amountDue,
            $invoice->due_date,
            Invoice::STATUS_UNPAID
        );

        $wasPaid = $invoice->normalizedStatus() === Invoice::STATUS_PAID;

        $updates = [
            'amount_paid' => $amountPaid,
            'amount_due' => max(0, $amountDue),
            'status' => $resolved,
        ];

        if ($resolved === Invoice::STATUS_PAID && !$invoice->paid_at) {
            $updates['paid_at'] = now();
        }

        $invoice->update($updates);

        if ($resolved === Invoice::STATUS_PAID && !$wasPaid) {
            InvoicePaid::dispatch($invoice);
        }
    }

    /**
     * Single source of truth for resolving a payment-driven status.
     * Void is never auto-overwritten. Shared rule for invoices and vendor bills.
     *
     * @param string $unpaidStatus the "no payment yet, not overdue" status for this document type
     */
    public static function resolvePaymentStatus(
        string $currentStatus,
        float $amountPaid,
        float $amountDue,
        $dueDate,
        string $unpaidStatus
    ): string {
        if ($currentStatus === 'void') {
            return 'void';
        }

        if ($amountDue <= 0.01) {
            return 'paid';
        }

        if ($amountPaid > 0.0) {
            return 'partial';
        }

        if ($dueDate && \Illuminate\Support\Carbon::parse($dueDate)->endOfDay()->isPast()) {
            return 'overdue';
        }

        return $unpaidStatus;
    }
}
