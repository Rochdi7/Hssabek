<?php

namespace App\Events;

use App\Models\Finance\Expense;
use Illuminate\Foundation\Events\Dispatchable;

class ExpenseCreated
{
    use Dispatchable;

    public function __construct(
        public readonly Expense $expense,
    ) {}
}
