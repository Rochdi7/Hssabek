<?php

namespace Database\Factories;

use App\Models\Finance\Income;
use Illuminate\Database\Eloquent\Factories\Factory;

class IncomeFactory extends Factory
{
    protected $model = Income::class;

    public function definition(): array
    {
        return [
            'income_number' => 'INC-' . fake()->unique()->numerify('######'),
            'amount' => fake()->randomFloat(2, 100, 10000),
            'income_date' => fake()->dateTimeBetween('-3 months', 'now'),
            'payment_mode' => fake()->randomElement(['cash', 'bank_transfer', 'check']),
        ];
    }
}
