<?php

namespace Database\Factories;

use App\Models\Sales\DeliveryChallan;
use Illuminate\Database\Eloquent\Factories\Factory;

class DeliveryChallanFactory extends Factory
{
    protected $model = DeliveryChallan::class;

    public function definition(): array
    {
        $subtotal = fake()->randomFloat(2, 100, 10000);
        $taxTotal = round($subtotal * 0.20, 2);
        $total = $subtotal + $taxTotal;

        return [
            'customer_id' => CustomerFactory::new(),
            'number' => 'DC-' . fake()->unique()->numerify('######'),
            'status' => 'draft',
            'challan_date' => now(),
            'enable_tax' => true,
            'subtotal' => $subtotal,
            'discount_total' => 0,
            'tax_total' => $taxTotal,

            'total' => $total,
        ];
    }
}
