<?php

namespace App\Services\Finance;

use App\Events\ExpenseCreated;
use App\Models\Finance\Expense;
use App\Models\Finance\ExpensePayment;
use App\Services\System\DocumentNumberService;
use Illuminate\Support\Facades\DB;

class ExpenseService
{
    public function __construct(
        private readonly DocumentNumberService $docService,
    ) {}

    public function create(array $validated): Expense
    {
        $validated['expense_number'] = $this->docService->next('expense');

        return DB::transaction(function () use ($validated) {
            // Determine paid_amount based on payment_status
            if ($validated['payment_status'] === 'paid') {
                $validated['paid_amount'] = $validated['amount'];
            } elseif ($validated['payment_status'] === 'partial') {
                $validated['paid_amount'] = $validated['paid_amount'] ?? 0;
            } else {
                $validated['paid_amount'] = 0;
            }

            $expense = Expense::create($validated);

            // Create initial payment record if there's a paid amount
            if ((float) $expense->paid_amount > 0) {
                ExpensePayment::create([
                    'expense_id'   => $expense->id,
                    'amount'       => $expense->paid_amount,
                    'payment_date' => $expense->expense_date,
                    'payment_mode' => $expense->payment_mode,
                    'note'         => 'Paiement initial',
                ]);
            }

            ExpenseCreated::dispatch($expense);

            return $expense;
        });
    }

    public function update(Expense $expense, array $validated): Expense
    {
        return DB::transaction(function () use ($expense, $validated) {
            // Keep paid_amount as-is for partial (managed via addPayment)
            // For paid: set paid_amount = amount, for unpaid: set to 0
            if ($validated['payment_status'] === 'paid') {
                $validated['paid_amount'] = $validated['amount'];
            } elseif ($validated['payment_status'] === 'unpaid') {
                $validated['paid_amount'] = 0;
            }
            // For partial: don't change paid_amount from what was already tracked

            $expense->update($validated);

            return $expense;
        });
    }

    public function addPayment(Expense $expense, array $validated): ExpensePayment
    {
        return DB::transaction(function () use ($expense, $validated) {
            $remaining = $expense->remaining_amount;

            if ((float) $validated['amount'] > $remaining) {
                throw new \InvalidArgumentException(
                    "Le montant du paiement ({$validated['amount']}) dépasse le reste à payer ({$remaining})."
                );
            }

            $payment = ExpensePayment::create([
                'expense_id'   => $expense->id,
                'amount'       => $validated['amount'],
                'payment_date' => $validated['payment_date'],
                'payment_mode' => $validated['payment_mode'],
                'note'         => $validated['note'] ?? null,
            ]);

            // Update expense paid_amount
            $newPaidAmount = (float) $expense->paid_amount + (float) $validated['amount'];
            $newStatus = $newPaidAmount >= (float) $expense->amount ? 'paid' : 'partial';

            $expense->update([
                'paid_amount'    => $newPaidAmount,
                'payment_status' => $newStatus,
            ]);

            return $payment;
        });
    }

    public function delete(Expense $expense): void
    {
        DB::transaction(function () use ($expense) {
            $expense->delete();
        });
    }
}
