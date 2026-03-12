<?php

namespace Database\Factories;

use App\Models\Purchases\PurchaseOrderItem;
use Illuminate\Database\Eloquent\Factories\Factory;

class PurchaseOrderItemFactory extends Factory
{
    protected $model = PurchaseOrderItem::class;

    public function definition(): array
    {
        $quantity = fake()->randomFloat(3, 1, 10);
        $unitCost = fake()->randomFloat(2, 50, 500);
        $lineSubtotal = round($quantity * $unitCost, 2);
        $taxRate = 20.0000;
        $lineTax = round($lineSubtotal * $taxRate / 100, 2);
        $lineTotal = $lineSubtotal + $lineTax;

        return [
            'purchase_order_id' => PurchaseOrderFactory::new(),
            'label' => fake()->words(3, true),
            'quantity' => $quantity,
            'unit_cost' => $unitCost,
            'tax_rate' => $taxRate,
            'line_subtotal' => $lineSubtotal,
            'line_tax' => $lineTax,
            'line_total' => $lineTotal,
            'received_quantity' => 0,
            'position' => 1,
        ];
    }
}
