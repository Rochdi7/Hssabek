<?php

namespace App\Services\Purchases;

use App\Models\Finance\BankAccount;
use App\Models\Purchases\SupplierPayment;
use App\Models\Purchases\SupplierPaymentAllocation;
use App\Models\Purchases\VendorBill;
use Illuminate\Support\Facades\DB;

class SupplierPaymentService
{
    public function __construct(
        private readonly VendorBillService $vendorBillService,
    ) {}

    /**
     * Create a supplier payment and allocate it to vendor bills.
     * Supplier payments are expenses — they debit the bank account.
     */
    public function create(array $validated): SupplierPayment
    {
        return DB::transaction(function () use ($validated) {
            $paymentAmount = (float) $validated['amount'];
            $allocations = $validated['allocations'] ?? [];
            $totalAllocated = 0.0;

            foreach ($allocations as $alloc) {
                $amountApplied = (float) ($alloc['amount_applied'] ?? 0);
                if ($amountApplied <= 0) {
                    throw new \DomainException("Chaque montant d'allocation doit être supérieur à 0.");
                }
                $totalAllocated += $amountApplied;
            }

            if ($totalAllocated > $paymentAmount + 0.01) {
                throw new \DomainException(
                    "Le total alloué ({$totalAllocated}) dépasse le montant du paiement fournisseur ({$paymentAmount})."
                );
            }

            $payment = SupplierPayment::create([
                'supplier_id' => $validated['supplier_id'],
                'amount' => $validated['amount'],
                'status' => 'succeeded',
                'payment_date' => $validated['paid_at'],
                'paid_at' => now(),
                'payment_method_id' => $validated['payment_method_id'] ?? null,
                'bank_account_id' => $validated['bank_account_id'] ?? null,
                'reference_number' => $validated['reference_number'] ?? null,
                'notes' => $validated['notes'] ?? null,
            ]);

            // Debit bank account (expense: money going out)
            if ($payment->bank_account_id) {
                $bankAccount = BankAccount::where('id', $payment->bank_account_id)
                    ->lockForUpdate()
                    ->firstOrFail();
                $bankAccount->debit($paymentAmount);
            }

            foreach ($allocations as $alloc) {
                $amountApplied = (float) $alloc['amount_applied'];

                $vendorBill = VendorBill::whereKey($alloc['vendor_bill_id'])
                    ->lockForUpdate()
                    ->firstOrFail();

                if ($vendorBill->tenant_id !== $payment->tenant_id) {
                    throw new \DomainException("La facture fournisseur sélectionnée n'appartient pas à votre organisation.");
                }

                if ($vendorBill->supplier_id !== $payment->supplier_id) {
                    throw new \DomainException(
                        "Chaque facture fournisseur allouée doit appartenir au même fournisseur que le paiement."
                    );
                }

                // Anti-over-allocation check
                $outstanding = (float) $vendorBill->amount_due;
                if ($amountApplied > $outstanding + 0.01) {
                    throw new \DomainException(
                        "Le montant d'allocation ({$amountApplied}) dépasse le solde restant ({$outstanding}) de la facture fournisseur {$vendorBill->number}."
                    );
                }

                SupplierPaymentAllocation::create([
                    'supplier_payment_id' => $payment->id,
                    'vendor_bill_id' => $vendorBill->id,
                    'amount_applied' => $amountApplied,
                ]);

                $this->vendorBillService->updatePaymentTotals($vendorBill);
            }

            return $payment->load('allocations');
        });
    }

    /**
     * Delete a supplier payment and reverse its allocations.
     * Reverses the bank account debit (credit back).
     */
    public function delete(SupplierPayment $payment): void
    {
        DB::transaction(function () use ($payment) {
            $payment->loadMissing('allocations');

            // Reverse bank account debit (credit the amount back)
            if ($payment->bank_account_id) {
                $bankAccount = BankAccount::where('id', $payment->bank_account_id)
                    ->lockForUpdate()
                    ->firstOrFail();
                $bankAccount->credit((float) $payment->amount);
            }

            $vendorBillIds = $payment->allocations->pluck('vendor_bill_id')->unique();

            $payment->allocations()->delete();

            foreach ($vendorBillIds as $vendorBillId) {
                $vendorBill = VendorBill::find($vendorBillId);
                if ($vendorBill) {
                    $this->vendorBillService->updatePaymentTotals($vendorBill);
                }
            }

            $payment->delete();
        });
    }
}
