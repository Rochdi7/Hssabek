<?php

namespace Database\Factories;

use App\Models\Finance\MoneyTransfer;
use Illuminate\Database\Eloquent\Factories\Factory;

class MoneyTransferFactory extends Factory
{
    protected $model = MoneyTransfer::class;

    public function definition(): array
    {
        return [
            'from_bank_account_id' => BankAccountFactory::new(),
            'to_bank_account_id' => BankAccountFactory::new(),
            'reference_number' => fake()->optional()->bothify('MT-####'),
            'transfer_date' => now(),
            'amount' => fake()->randomFloat(2, 100, 10000),
            'status' => 'pending',
        ];
    }
}
