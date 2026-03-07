<?php

namespace App\Services\Finance;

use App\Models\Finance\BankAccount;
use App\Models\Finance\Income;
use App\Services\System\DocumentNumberService;
use Illuminate\Support\Facades\DB;

class IncomeService
{
    public function __construct(
        private readonly DocumentNumberService $docService,
    ) {}

    public function create(array $validated): Income
    {
        $validated['income_number'] = $this->docService->next('income');

        return DB::transaction(function () use ($validated) {
            $income = Income::create($validated);

            if ($income->bank_account_id) {
                BankAccount::where('id', $income->bank_account_id)
                    ->lockForUpdate()
                    ->firstOrFail();
                BankAccount::where('id', $income->bank_account_id)
                    ->increment('current_balance', $income->amount);
            }

            return $income;
        });
    }

    public function update(Income $income, array $validated): Income
    {
        return DB::transaction(function () use ($income, $validated) {
            $oldBankAccountId = $income->bank_account_id;
            $oldAmount = $income->amount;

            $accountIds = array_filter(array_unique([
                $oldBankAccountId,
                $validated['bank_account_id'] ?? $oldBankAccountId,
            ]));

            if (!empty($accountIds)) {
                BankAccount::whereIn('id', $accountIds)->lockForUpdate()->get();
            }

            // Restore old bank balance
            if ($oldBankAccountId) {
                BankAccount::where('id', $oldBankAccountId)
                    ->decrement('current_balance', $oldAmount);
            }

            $income->update($validated);

            // Add new amount
            if ($income->bank_account_id) {
                BankAccount::where('id', $income->bank_account_id)
                    ->increment('current_balance', $income->amount);
            }

            return $income;
        });
    }

    public function delete(Income $income): void
    {
        DB::transaction(function () use ($income) {
            if ($income->bank_account_id) {
                BankAccount::where('id', $income->bank_account_id)
                    ->lockForUpdate()
                    ->firstOrFail();
                BankAccount::where('id', $income->bank_account_id)
                    ->decrement('current_balance', $income->amount);
            }

            $income->delete();
        });
    }
}
