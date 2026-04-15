<?php

namespace Database\Factories;

use App\Models\Purchases\DebitNote;
use Illuminate\Database\Eloquent\Factories\Factory;

class DebitNoteFactory extends Factory
{
    protected $model = DebitNote::class;

    public function definition(): array
    {
        $subtotal = fake()->randomFloat(2, 50, 2000);
        $taxTotal = round($subtotal * 0.20, 2);
        $total = $subtotal + $taxTotal;

        return [
            'supplier_id' => SupplierFactory::new(),
            'number' => 'DN-' . fake()->unique()->numerify('######'),
            'status' => 'draft',
            'debit_note_date' => now(),
            'enable_tax' => true,
            'subtotal' => $subtotal,
            'discount_total' => 0,
            'tax_total' => $taxTotal,

            'total' => $total,
        ];
    }
}
