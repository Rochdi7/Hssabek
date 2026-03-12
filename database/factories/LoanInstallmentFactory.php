<?php

namespace Database\Factories;

use App\Models\Finance\LoanInstallment;
use Illuminate\Database\Eloquent\Factories\Factory;

class LoanInstallmentFactory extends Factory
{
    protected $model = LoanInstallment::class;

    public function definition(): array
    {
        $principal = fake()->randomFloat(2, 500, 5000);
        $interest = round($principal * 0.05, 2);
        $total = $principal + $interest;

        return [
            'loan_id' => LoanFactory::new(),
            'installment_number' => fake()->numberBetween(1, 12),
            'due_date' => now()->addDays(fake()->numberBetween(30, 365)),
            'principal_amount' => $principal,
            'interest_amount' => $interest,
            'total_amount' => $total,
            'paid_amount' => 0,
            'remaining_amount' => $total,
            'status' => 'pending',
        ];
    }

    public function paid(): static
    {
        return $this->state(function (array $attributes) {
            return [
                'status' => 'paid',
                'paid_amount' => $attributes['total_amount'],
                'remaining_amount' => 0,
                'paid_at' => now(),
            ];
        });
    }
}
