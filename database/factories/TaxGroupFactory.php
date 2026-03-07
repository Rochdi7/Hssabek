<?php

namespace Database\Factories;

use App\Models\Catalog\TaxGroup;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaxGroupFactory extends Factory
{
    protected $model = TaxGroup::class;

    public function definition(): array
    {
        return [
            'name' => 'Tax Group ' . fake()->unique()->word(),
            'is_active' => true,
        ];
    }
}
