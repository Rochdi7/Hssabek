<?php

namespace Database\Factories;

use App\Models\Inventory\StockMovement;
use Illuminate\Database\Eloquent\Factories\Factory;

class StockMovementFactory extends Factory
{
    protected $model = StockMovement::class;

    public function definition(): array
    {
        return [
            'warehouse_id' => WarehouseFactory::new(),
            'product_id' => ProductFactory::new(),
            'movement_type' => fake()->randomElement(['stock_in', 'stock_out', 'adjustment_in', 'adjustment_out']),
            'quantity' => fake()->randomFloat(3, 1, 100),
            'unit_cost' => fake()->randomFloat(2, 10, 500),
            'moved_at' => now(),
            'created_at' => now(),
        ];
    }
}
