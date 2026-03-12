<?php

namespace Database\Factories;

use App\Models\Purchases\GoodsReceiptItem;
use Illuminate\Database\Eloquent\Factories\Factory;

class GoodsReceiptItemFactory extends Factory
{
    protected $model = GoodsReceiptItem::class;

    public function definition(): array
    {
        $quantity = fake()->randomFloat(3, 1, 50);
        $unitCost = fake()->randomFloat(2, 10, 500);
        $taxRate = 20.0000;
        $lineTotal = round($quantity * $unitCost * (1 + $taxRate / 100), 2);

        return [
            'goods_receipt_id' => GoodsReceiptFactory::new(),
            'product_id' => ProductFactory::new(),
            'quantity' => $quantity,
            'unit_cost' => $unitCost,
            'tax_rate' => $taxRate,
            'line_total' => $lineTotal,
            'position' => 1,
        ];
    }
}
