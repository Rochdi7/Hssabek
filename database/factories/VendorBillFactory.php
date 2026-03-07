<?php

namespace Database\Factories;

use App\Models\Purchases\VendorBill;
use Illuminate\Database\Eloquent\Factories\Factory;

class VendorBillFactory extends Factory
{
    protected $model = VendorBill::class;

    public function definition(): array
    {
        $subtotal = fake()->randomFloat(2, 100, 10000);
        $taxTotal = round($subtotal * 0.20, 2);
        $total = $subtotal + $taxTotal;

        return [
            'supplier_id' => SupplierFactory::new(),
            'number' => 'VB-' . fake()->unique()->numerify('######'),
            'status' => 'draft',
            'issue_date' => now(),
            'due_date' => now()->addDays(30),
            'subtotal' => $subtotal,
            'tax_total' => $taxTotal,
            'round_off' => 0,
            'total' => $total,
            'amount_paid' => 0,
            'amount_due' => $total,
        ];
    }
}
