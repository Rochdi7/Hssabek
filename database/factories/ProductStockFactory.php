<?php

namespace Database\Factories;

use App\Models\Inventory\ProductStock;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductStockFactory extends Factory
{
    protected $model = ProductStock::class;

    public function definition(): array
    {
        return [
            'warehouse_id' => WarehouseFactory::new(),
            'product_id' => ProductFactory::new(),
            'quantity_on_hand' => fake()->randomFloat(3, 0, 1000),
            'quantity_reserved' => 0,
            'updated_at' => now(),
        ];
    }
}
