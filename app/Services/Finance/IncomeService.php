<?php

namespace App\Services\Finance;

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
            return Income::create($validated);
        });
    }

    public function update(Income $income, array $validated): Income
    {
        return DB::transaction(function () use ($income, $validated) {
            $income->update($validated);

            return $income;
        });
    }

    public function delete(Income $income): void
    {
        DB::transaction(function () use ($income) {
            $income->delete();
        });
    }
}
