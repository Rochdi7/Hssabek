<?php

namespace Database\Factories;

use App\Models\Finance\Expense;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExpenseFactory extends Factory
{
    protected $model = Expense::class;

    public function definition(): array
    {
        return [
            'expense_number' => 'EXP-' . fake()->unique()->numerify('######'),
            'amount' => fake()->randomFloat(2, 50, 5000),
            'expense_date' => fake()->dateTimeBetween('-3 months', 'now'),
            'payment_mode' => fake()->randomElement(['cash', 'bank_transfer', 'check']),
            'payment_status' => fake()->randomElement(['unpaid', 'paid', 'partial']),
        ];
    }
}
