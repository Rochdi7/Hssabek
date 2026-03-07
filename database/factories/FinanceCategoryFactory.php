<?php

namespace Database\Factories;

use App\Models\Finance\FinanceCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class FinanceCategoryFactory extends Factory
{
    protected $model = FinanceCategory::class;

    public function definition(): array
    {
        return [
            'type' => fake()->randomElement(['expense', 'income']),
            'name' => fake()->words(2, true),
            'is_active' => true,
        ];
    }
}
