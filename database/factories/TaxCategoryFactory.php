<?php

namespace Database\Factories;

use App\Models\Catalog\TaxCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaxCategoryFactory extends Factory
{
    protected $model = TaxCategory::class;

    public function definition(): array
    {
        return [
            'name' => 'TVA ' . fake()->randomElement([7, 10, 14, 20]) . '%',
            'rate' => fake()->randomElement([7.0000, 10.0000, 14.0000, 20.0000]),
            'type' => 'percentage',
            'is_default' => false,
            'is_active' => true,
        ];
    }
}
