<?php

namespace App\Services\Sales;

use App\Events\PaymentReceived;
use App\Models\Sales\Invoice;
use App\Models\Sales\Payment;
use App\Models\Sales\PaymentAllocation;
use Illuminate\Support\Facades\DB;

class PaymentService
{
    public function __construct(
        private readonly InvoiceService $invoiceService,
    ) {}

    /**
     * Create a payment and allocate it to invoices.
     */
    public function create(array $validated): Payment
    {
        return DB::transaction(function () use ($validated) {
            $payment = Payment::create([
                'customer_id' => $validated['customer_id'],
                'payment_method_id' => $validated['payment_method_id'] ?? null,
                'amount' => $validated['amount'],
                'status' => 'succeeded',
                'payment_date' => $validated['payment_date'],
                'paid_at' => now(),
                'reference_number' => $validated['reference_number'] ?? null,
                'notes' => $validated['notes'] ?? null,
            ]);

            // Allocate to invoices
            $allocations = $validated['allocations'] ?? [];
            foreach ($allocations as $alloc) {
                $invoice = Invoice::findOrFail($alloc['invoice_id']);

                // Anti-over-allocation check
                $outstanding = (float) $invoice->amount_due;
                $allocAmount = (float) $alloc['amount_applied'];

                if ($allocAmount > $outstanding + 0.01) {
                    throw new \DomainException(
                        "Le montant d'allocation ({$allocAmount}) dépasse le solde restant ({$outstanding}) de la facture {$invoice->number}."
                    );
                }

                PaymentAllocation::create([
                    'payment_id' => $payment->id,
                    'invoice_id' => $invoice->id,
                    'amount_applied' => $allocAmount,
                ]);

                // Recalculate invoice payment totals
                $this->invoiceService->updatePaymentTotals($invoice);
            }

            $payment = $payment->load('allocations');

            PaymentReceived::dispatch($payment);

            return $payment;
        });
    }

    /**
     * Delete a payment and reverse its allocations.
     */
    public function delete(Payment $payment): void
    {
        DB::transaction(function () use ($payment) {
            $payment->loadMissing('allocations');

            // Collect affected invoices before deleting allocations
            $invoiceIds = $payment->allocations->pluck('invoice_id')->unique();

            // Delete all allocations
            $payment->allocations()->delete();

            // Recalculate each affected invoice
            foreach ($invoiceIds as $invoiceId) {
                $invoice = Invoice::find($invoiceId);
                if ($invoice) {
                    $this->invoiceService->updatePaymentTotals($invoice);
                }
            }

            // Delete the payment
            $payment->delete();
        });
    }
}
