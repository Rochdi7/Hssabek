<?php

namespace Database\Factories;

use App\Models\Sales\DeliveryChallanItem;
use Illuminate\Database\Eloquent\Factories\Factory;

class DeliveryChallanItemFactory extends Factory
{
    protected $model = DeliveryChallanItem::class;

    public function definition(): array
    {
        $quantity = fake()->randomFloat(3, 1, 10);
        $unitPrice = fake()->randomFloat(2, 50, 500);
        $lineSubtotal = round($quantity * $unitPrice, 2);
        $taxRate = 20.0000;
        $lineTax = round($lineSubtotal * $taxRate / 100, 2);
        $lineTotal = $lineSubtotal + $lineTax;

        return [
            'delivery_challan_id' => DeliveryChallanFactory::new(),
            'label' => fake()->words(3, true),
            'quantity' => $quantity,
            'unit_price' => $unitPrice,
            'tax_rate' => $taxRate,
            'line_subtotal' => $lineSubtotal,
            'line_tax' => $lineTax,
            'line_total' => $lineTotal,
            'position' => 1,
        ];
    }
}
