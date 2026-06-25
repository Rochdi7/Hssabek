<?php

namespace App\Services\Sales;

use App\Models\Sales\Invoice;
use App\Models\Sales\InvoiceCharge;
use App\Models\Sales\InvoiceItem;
use App\Models\Sales\Quote;
use App\Models\Sales\QuoteCharge;
use App\Models\Sales\QuoteItem;
use App\Services\System\DocumentNumberService;
use Illuminate\Support\Facades\DB;

class QuoteService
{
    public function __construct(
        private readonly TaxCalculationService $taxService,
        private readonly DocumentNumberService $docService,
    ) {}

    /**
     * Create a quote with line items, charges, and server-calculated totals.
     */
    public function create(array $validated, string $documentType = 'quote'): Quote
    {
        return DB::transaction(function () use ($validated, $documentType) {
            $items = $validated['items'] ?? [];
            $charges = $validated['charges'] ?? [];

            $totals = $this->taxService->calculateDocument($items, $charges);

            $quote = Quote::create([
                'customer_id' => $validated['customer_id'],
                'number' => $this->docService->next('quote'),
                'document_type' => $documentType,
                'reference_number' => $validated['reference_number'] ?? null,
                'status' => Quote::STATUS_ACTIVE,
                'issue_date' => $validated['issue_date'],
                'due_date' => $validated['due_date'] ?? null,
                'expiry_date' => $validated['expiry_date'] ?? null,
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
                'total_in_words' => $validated['total_in_words'] ?? null,
                'notes' => $validated['notes'] ?? null,
                'terms' => $validated['terms'] ?? null,
                'bank_details_snapshot' => $validated['bank_details_snapshot'] ?? null,
            ]);

            foreach ($totals['calculated_items'] as $item) {
                QuoteItem::create([
                    'quote_id' => $quote->id,
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
                QuoteCharge::create([
                    'quote_id' => $quote->id,
                    'label' => $charge['label'],
                    'amount' => $charge['amount'],
                    'tax_rate' => $charge['tax_rate'],
                    'position' => $charge['position'],
                ]);
            }

            return $quote->load('items', 'charges');
        });
    }

    /**
     * Update an active quote (legacy draft/sent normalize to active).
     */
    public function update(Quote $quote, array $validated): Quote
    {
        if ($quote->normalizedStatus() !== Quote::STATUS_ACTIVE) {
            throw new \DomainException('Seuls les devis actifs peuvent être modifiés.');
        }

        return DB::transaction(function () use ($quote, $validated) {
            $items = $validated['items'] ?? [];
            $charges = $validated['charges'] ?? [];

            $totals = $this->taxService->calculateDocument($items, $charges);

            $quote->update([
                'customer_id' => $validated['customer_id'] ?? $quote->customer_id,
                'reference_number' => $validated['reference_number'] ?? $quote->reference_number,
                'issue_date' => $validated['issue_date'] ?? $quote->issue_date,
                'due_date' => $validated['due_date'] ?? $quote->due_date,
                'expiry_date' => $validated['expiry_date'] ?? $quote->expiry_date,
                'enable_tax' => $validated['enable_tax'] ?? $quote->enable_tax,
                'subtotal' => $totals['subtotal'],
                'discount_total' => $totals['discount_total'],
                'tax_total' => $totals['tax_total'],
                'total' => $totals['total'],
                'bill_to_snapshot' => array_merge(
                    is_array($quote->bill_to_snapshot) ? $quote->bill_to_snapshot : [],
                    ['addition' => $validated['addition'] ?? '']
                ),
                'notes' => $validated['notes'] ?? $quote->notes,
                'terms' => $validated['terms'] ?? $quote->terms,
            ]);

            $quote->items()->delete();
            foreach ($totals['calculated_items'] as $item) {
                QuoteItem::create([
                    'quote_id' => $quote->id,
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

            $quote->charges()->delete();
            foreach ($totals['calculated_charges'] as $charge) {
                QuoteCharge::create([
                    'quote_id' => $quote->id,
                    'label' => $charge['label'],
                    'amount' => $charge['amount'],
                    'tax_rate' => $charge['tax_rate'],
                    'position' => $charge['position'],
                ]);
            }

            return $quote->fresh(['items', 'charges']);
        });
    }

    /**
     * Transition quote status.
     */
    public function transition(Quote $quote, string $newStatus): void
    {
        $allowed = [
            'active' => ['accepted', 'rejected', 'expired', 'cancelled'],
            // Legacy states kept for backward compatibility.
            'draft' => ['active', 'sent', 'accepted', 'rejected', 'expired', 'cancelled'],
            'sent' => ['accepted', 'rejected', 'expired', 'cancelled'],
            'accepted' => [],
            'rejected' => [],
            'expired' => [],
            'cancelled' => [],
        ];

        $permitted = $allowed[$quote->status] ?? [];
        if (!in_array($newStatus, $permitted)) {
            throw new \DomainException(
                "Transition de statut invalide : {$quote->status} → {$newStatus}"
            );
        }

        $updates = ['status' => $newStatus];

        if ($newStatus === 'sent' && !$quote->sent_at) {
            $updates['sent_at'] = now();
        }

        if ($newStatus === 'accepted') {
            $updates['accepted_at'] = now();
        }

        $quote->update($updates);
    }

    /**
     * Convert a quote to an invoice — copies items and charges.
     */
    public function convertToInvoice(Quote $quote): Invoice
    {
        // Active (incl. legacy draft/sent) and accepted quotes can be converted.
        if (!in_array($quote->normalizedStatus(), [Quote::STATUS_ACTIVE, Quote::STATUS_ACCEPTED], true)) {
            throw new \DomainException('Seuls les devis actifs ou acceptés peuvent être convertis en facture.');
        }

        return DB::transaction(function () use ($quote) {
            $quote->loadMissing(['items', 'charges']);

            $invoiceNumber = $this->docService->next('invoice');

            $invoice = Invoice::create([
                'customer_id' => $quote->customer_id,
                'quote_id' => $quote->id,
                'number' => $invoiceNumber,
                'reference_number' => $quote->reference_number,
                'status' => Invoice::STATUS_UNPAID,
                'issue_date' => now()->toDateString(),
                'due_date' => $quote->due_date,
                'enable_tax' => $quote->enable_tax,
                'bill_from_snapshot' => $quote->bill_from_snapshot,
                'bill_to_snapshot' => $quote->bill_to_snapshot,
                'subtotal' => $quote->subtotal,
                'discount_total' => $quote->discount_total,
                'tax_total' => $quote->tax_total,

                'total' => $quote->total,
                'amount_paid' => 0,
                'amount_due' => $quote->total,
                'total_in_words' => $quote->total_in_words,
                'notes' => $quote->notes,
                'terms' => $quote->terms,
                'bank_details_snapshot' => $quote->bank_details_snapshot,
            ]);

            foreach ($quote->items as $quoteItem) {
                InvoiceItem::create([
                    'invoice_id' => $invoice->id,
                    'product_id' => $quoteItem->product_id,
                    'label' => $quoteItem->label,
                    'description' => $quoteItem->description,
                    'quantity' => $quoteItem->quantity,
                    'unit_id' => $quoteItem->unit_id,
                    'unit_price' => $quoteItem->unit_price,
                    'discount_type' => $quoteItem->discount_type,
                    'discount_value' => $quoteItem->discount_value,
                    'tax_rate' => $quoteItem->tax_rate,
                    'tax_group_id' => $quoteItem->tax_group_id,
                    'line_subtotal' => $quoteItem->line_subtotal,
                    'line_tax' => $quoteItem->line_tax,
                    'line_total' => $quoteItem->line_total,
                    'position' => $quoteItem->position,
                    'calculation_mode' => $quoteItem->calculation_mode ?? 'quantity',
                    'length' => $quoteItem->length,
                    'width' => $quoteItem->width,
                    'height' => $quoteItem->height,
                    'thickness' => $quoteItem->thickness,
                    'measurement_unit' => $quoteItem->measurement_unit,
                    'calculated_measurement' => $quoteItem->calculated_measurement,
                ]);
            }

            foreach ($quote->charges as $quoteCharge) {
                InvoiceCharge::create([
                    'invoice_id' => $invoice->id,
                    'label' => $quoteCharge->label,
                    'amount' => $quoteCharge->amount,
                    'tax_rate' => $quoteCharge->tax_rate,
                    'position' => $quoteCharge->position,
                ]);
            }

            // Mark quote as accepted when converting an active/legacy quote.
            if ($quote->normalizedStatus() === Quote::STATUS_ACTIVE) {
                $quote->update(['status' => Quote::STATUS_ACCEPTED, 'accepted_at' => now()]);
            }

            return $invoice->load('items', 'charges');
        });
    }
}
