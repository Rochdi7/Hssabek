<?php

namespace Database\Factories;

use App\Models\Purchases\GoodsReceipt;
use Illuminate\Database\Eloquent\Factories\Factory;

class GoodsReceiptFactory extends Factory
{
    protected $model = GoodsReceipt::class;

    public function definition(): array
    {
        return [
            'warehouse_id' => WarehouseFactory::new(),
            'number' => 'GR-' . fake()->unique()->numerify('######'),
            'status' => 'draft',
            'received_at' => now(),
        ];
    }
}
