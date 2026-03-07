<?php

namespace Database\Factories;

use App\Models\Purchases\PurchaseOrder;
use Illuminate\Database\Eloquent\Factories\Factory;

class PurchaseOrderFactory extends Factory
{
    protected $model = PurchaseOrder::class;

    public function definition(): array
    {
        $subtotal = fake()->randomFloat(2, 100, 10000);
        $taxTotal = round($subtotal * 0.20, 2);
        $total = $subtotal + $taxTotal;

        return [
            'supplier_id' => SupplierFactory::new(),
            'warehouse_id' => WarehouseFactory::new(),
            'number' => 'PO-' . fake()->unique()->numerify('######'),
            'status' => 'draft',
            'order_date' => now(),
            'expected_date' => now()->addDays(14),
            'subtotal' => $subtotal,
            'discount_total' => 0,
            'tax_total' => $taxTotal,
            'round_off' => 0,
            'total' => $total,
        ];
    }
}
