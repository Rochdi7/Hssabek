<?php

namespace App\Services\Finance;

use App\Events\ExpenseCreated;
use App\Models\Finance\BankAccount;
use App\Models\Finance\Expense;
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
            $expense = Expense::create($validated);

            if ($expense->bank_account_id && $expense->payment_status === 'paid') {
                BankAccount::where('id', $expense->bank_account_id)
                    ->lockForUpdate()
                    ->firstOrFail();
                BankAccount::where('id', $expense->bank_account_id)
                    ->decrement('current_balance', $expense->amount);
            }

            ExpenseCreated::dispatch($expense);

            return $expense;
        });
    }

    public function update(Expense $expense, array $validated): Expense
    {
        return DB::transaction(function () use ($expense, $validated) {
            $oldBankAccountId = $expense->bank_account_id;
            $oldAmount = $expense->amount;
            $oldPaymentStatus = $expense->payment_status;

            $accountIds = array_filter(array_unique([
                $oldBankAccountId,
                $validated['bank_account_id'] ?? $oldBankAccountId,
            ]));

            if (!empty($accountIds)) {
                BankAccount::whereIn('id', $accountIds)->lockForUpdate()->get();
            }

            // Restore old bank balance if it was paid
            if ($oldBankAccountId && $oldPaymentStatus === 'paid') {
                BankAccount::where('id', $oldBankAccountId)
                    ->increment('current_balance', $oldAmount);
            }

            $expense->update($validated);

            // Deduct new amount if paid
            if ($expense->bank_account_id && $expense->payment_status === 'paid') {
                BankAccount::where('id', $expense->bank_account_id)
                    ->decrement('current_balance', $expense->amount);
            }

            return $expense;
        });
    }

    public function delete(Expense $expense): void
    {
        DB::transaction(function () use ($expense) {
            if ($expense->bank_account_id && $expense->payment_status === 'paid') {
                BankAccount::where('id', $expense->bank_account_id)
                    ->lockForUpdate()
                    ->firstOrFail();
                BankAccount::where('id', $expense->bank_account_id)
                    ->increment('current_balance', $expense->amount);
            }

            $expense->delete();
        });
    }
}
