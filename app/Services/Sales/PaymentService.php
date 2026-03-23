<?php

namespace App\Services\Sales;

use App\Events\PaymentReceived;
use App\Models\Finance\BankAccount;
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
     * Sales payments are revenue — they credit the bank account.
     */
    public function create(array $validated): Payment
    {
        return DB::transaction(function () use ($validated) {
            $paymentAmount = (float) $validated['amount'];
            $allocations = $validated['allocations'] ?? [];
            $totalAllocated = 0.0;

            foreach ($allocations as $alloc) {
                $allocAmount = (float) ($alloc['amount_applied'] ?? 0);
                if ($allocAmount <= 0) {
                    throw new \DomainException("Chaque montant d'allocation doit être supérieur à 0.");
                }

                $totalAllocated += $allocAmount;
            }

            if ($totalAllocated > $paymentAmount + 0.01) {
                throw new \DomainException(
                    "Le total alloué ({$totalAllocated}) dépasse le montant du paiement ({$paymentAmount})."
                );
            }

            $payment = Payment::create([
                'customer_id' => $validated['customer_id'],
                'payment_method_id' => $validated['payment_method_id'] ?? null,
                'bank_account_id' => $validated['bank_account_id'] ?? null,
                'amount' => $validated['amount'],
                'status' => 'succeeded',
                'payment_date' => $validated['payment_date'],
                'paid_at' => now(),
                'reference_number' => $validated['reference_number'] ?? null,
                'notes' => $validated['notes'] ?? null,
            ]);

            // Credit bank account (revenue: money coming in)
            if ($payment->bank_account_id) {
                $bankAccount = BankAccount::where('id', $payment->bank_account_id)
                    ->lockForUpdate()
                    ->firstOrFail();
                $bankAccount->credit($paymentAmount);
            }

            // Allocate to invoices
            foreach ($allocations as $alloc) {
                $invoice = Invoice::whereKey($alloc['invoice_id'])
                    ->lockForUpdate()
                    ->firstOrFail();

                if ($invoice->tenant_id !== $payment->tenant_id) {
                    throw new \DomainException("La facture sélectionnée n'appartient pas à votre organisation.");
                }

                if ($invoice->customer_id !== $payment->customer_id) {
                    throw new \DomainException("Chaque facture allouée doit appartenir au même client que le paiement.");
                }

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
     * Reverses the bank account credit (debit back).
     */
    public function delete(Payment $payment): void
    {
        DB::transaction(function () use ($payment) {
            $payment->loadMissing('allocations');

            // Reverse bank account credit (debit the amount back)
            if ($payment->bank_account_id) {
                $bankAccount = BankAccount::where('id', $payment->bank_account_id)
                    ->lockForUpdate()
                    ->firstOrFail();
                $bankAccount->debit((float) $payment->amount);
            }

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
