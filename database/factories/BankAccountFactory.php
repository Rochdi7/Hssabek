<?php

namespace Database\Factories;

use App\Models\Finance\BankAccount;
use Illuminate\Database\Eloquent\Factories\Factory;

class BankAccountFactory extends Factory
{
    protected $model = BankAccount::class;

    public function definition(): array
    {
        $balance = fake()->randomFloat(2, 1000, 100000);

        return [
            'account_holder_name' => fake()->name(),
            'account_number' => fake()->unique()->bankAccountNumber(),
            'bank_name' => fake()->randomElement(['Attijariwafa Bank', 'BMCE Bank', 'Banque Populaire', 'CIH Bank']),
            'account_type' => fake()->randomElement(['current', 'savings', 'business', 'other']),
            'currency' => 'MAD',
            'opening_balance' => $balance,
            'current_balance' => $balance,
            'is_active' => true,
        ];
    }
}
