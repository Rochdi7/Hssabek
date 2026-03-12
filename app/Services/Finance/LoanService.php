<?php

namespace App\Services\Finance;

use App\Models\Finance\BankAccount;
use App\Models\Finance\Loan;
use App\Models\Finance\LoanPayment;
use App\Services\System\DocumentNumberService;
use Illuminate\Support\Facades\DB;

class LoanService
{
    public function __construct(
        private readonly DocumentNumberService $docService,
    ) {}

    public function create(array $validated): Loan
    {
        $validated['reference_number'] = $validated['reference_number']
            ?? $this->docService->next('loan_ref');

        return DB::transaction(function () use ($validated) {
            $validated['total_amount'] = (float) $validated['principal_amount'];
            $validated['paid_amount'] = 0;
            $validated['remaining_balance'] = $validated['total_amount'];

            return Loan::create($validated);
        });
    }

    public function update(Loan $loan, array $validated): Loan
    {
        return DB::transaction(function () use ($loan, $validated) {
            $validated['total_amount'] = (float) $validated['principal_amount'];
            $validated['remaining_balance'] = round($validated['total_amount'] - (float) $loan->paid_amount, 2);

            $loan->update($validated);

            return $loan;
        });
    }

    public function addPayment(Loan $loan, array $validated): LoanPayment
    {
        return DB::transaction(function () use ($loan, $validated) {
            $remaining = $loan->remaining_amount;

            if ((float) $validated['amount'] > $remaining) {
                throw new \InvalidArgumentException(
                    "Le montant du paiement ({$validated['amount']}) dépasse le reste à payer ({$remaining})."
                );
            }

            $payment = LoanPayment::create([
                'loan_id'         => $loan->id,
                'amount'          => $validated['amount'],
                'payment_date'    => $validated['payment_date'],
                'payment_mode'    => $validated['payment_mode'],
                'bank_account_id' => $validated['bank_account_id'] ?? null,
                'note'            => $validated['note'] ?? null,
            ]);

            $newPaidAmount = (float) $loan->paid_amount + (float) $validated['amount'];
            $newRemaining = max(0, (float) $loan->total_amount - $newPaidAmount);
            $newStatus = $newRemaining <= 0 ? 'closed' : $loan->status;

            $loan->update([
                'paid_amount'       => $newPaidAmount,
                'remaining_balance' => $newRemaining,
                'status'            => $newStatus,
            ]);

            if ($payment->bank_account_id) {
                BankAccount::where('id', $payment->bank_account_id)
                    ->lockForUpdate()
                    ->firstOrFail();
                BankAccount::where('id', $payment->bank_account_id)
                    ->decrement('current_balance', $payment->amount);
            }

            return $payment;
        });
    }

    public function deletePayment(Loan $loan, LoanPayment $payment): void
    {
        DB::transaction(function () use ($loan, $payment) {
            if ($payment->bank_account_id) {
                BankAccount::where('id', $payment->bank_account_id)
                    ->lockForUpdate()
                    ->firstOrFail();
                BankAccount::where('id', $payment->bank_account_id)
                    ->increment('current_balance', $payment->amount);
            }

            $newPaidAmount = max(0, (float) $loan->paid_amount - (float) $payment->amount);
            $newRemaining = round((float) $loan->total_amount - $newPaidAmount, 2);
            $newStatus = ($loan->status === 'closed' && $newRemaining > 0) ? 'active' : $loan->status;

            $loan->update([
                'paid_amount'       => $newPaidAmount,
                'remaining_balance' => $newRemaining,
                'status'            => $newStatus,
            ]);

            $payment->delete();
        });
    }

    public function delete(Loan $loan): void
    {
        DB::transaction(function () use ($loan) {
            $payments = $loan->payments()->whereNotNull('bank_account_id')->get();
            foreach ($payments as $payment) {
                BankAccount::where('id', $payment->bank_account_id)
                    ->lockForUpdate()
                    ->firstOrFail();
                BankAccount::where('id', $payment->bank_account_id)
                    ->increment('current_balance', $payment->amount);
            }

            $loan->delete();
        });
    }
}
