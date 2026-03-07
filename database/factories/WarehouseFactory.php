<?php

namespace Database\Factories;

use App\Models\Inventory\Warehouse;
use Illuminate\Database\Eloquent\Factories\Factory;

class WarehouseFactory extends Factory
{
    protected $model = Warehouse::class;

    public function definition(): array
    {
        return [
            'name' => fake()->words(2, true) . ' Warehouse',
            'code' => fake()->unique()->bothify('WH-####'),
            'address' => fake()->address(),
            'is_default' => false,
            'is_active' => true,
        ];
    }
}
