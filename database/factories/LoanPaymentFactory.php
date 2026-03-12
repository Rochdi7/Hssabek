<?php

namespace Database\Factories;

use App\Models\Finance\Loan;
use Illuminate\Database\Eloquent\Factories\Factory;

class LoanPaymentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'loan_id'      => Loan::factory(),
            'amount'       => $this->faker->randomFloat(2, 100, 5000),
            'payment_date' => $this->faker->dateTimeBetween('-6 months', 'now'),
            'payment_mode' => $this->faker->randomElement(['cash', 'bank_transfer', 'card', 'cheque', 'other']),
            'bank_account_id' => null,
            'note'         => $this->faker->optional(0.5)->sentence(),
        ];
    }
}
