<?php

namespace Database\Factories;

use App\Models\Inventory\StockTransferItem;
use Illuminate\Database\Eloquent\Factories\Factory;

class StockTransferItemFactory extends Factory
{
    protected $model = StockTransferItem::class;

    public function definition(): array
    {
        return [
            'stock_transfer_id' => StockTransferFactory::new(),
            'product_id' => ProductFactory::new(),
            'quantity' => fake()->randomFloat(3, 1, 100),
        ];
    }
}
