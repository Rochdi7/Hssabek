<?php

namespace Database\Factories;

use App\Models\Finance\Loan;
use Illuminate\Database\Eloquent\Factories\Factory;

class LoanFactory extends Factory
{
    protected $model = Loan::class;

    public function definition(): array
    {
        $principal = fake()->randomFloat(2, 10000, 500000);
        $interestRate = fake()->randomFloat(3, 2, 15);
        $total = round($principal * (1 + $interestRate / 100), 2);

        return [
            'lender_type' => fake()->randomElement(['bank', 'individual', 'institution']),
            'lender_name' => fake()->company(),
            'principal_amount' => $principal,
            'interest_rate' => $interestRate,
            'total_amount' => $total,
            'remaining_balance' => $total,
            'start_date' => now(),
            'end_date' => now()->addYear(),
            'status' => 'active',
        ];
    }
}
