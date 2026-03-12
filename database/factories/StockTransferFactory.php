<?php

namespace Database\Factories;

use App\Models\Inventory\StockTransfer;
use Illuminate\Database\Eloquent\Factories\Factory;

class StockTransferFactory extends Factory
{
    protected $model = StockTransfer::class;

    public function definition(): array
    {
        return [
            'from_warehouse_id' => WarehouseFactory::new(),
            'to_warehouse_id' => WarehouseFactory::new(),
            'number' => 'ST-' . fake()->unique()->numerify('######'),
            'status' => 'draft',
        ];
    }
}
