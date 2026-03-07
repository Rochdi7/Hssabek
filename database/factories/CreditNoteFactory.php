<?php

namespace Database\Factories;

use App\Models\Sales\CreditNote;
use Illuminate\Database\Eloquent\Factories\Factory;

class CreditNoteFactory extends Factory
{
    protected $model = CreditNote::class;

    public function definition(): array
    {
        $subtotal = fake()->randomFloat(2, 50, 2000);
        $taxTotal = round($subtotal * 0.20, 2);
        $total = $subtotal + $taxTotal;

        return [
            'customer_id' => CustomerFactory::new(),
            'invoice_id' => InvoiceFactory::new(),
            'number' => 'CN-' . fake()->unique()->numerify('######'),
            'status' => 'draft',
            'issue_date' => now(),
            'enable_tax' => true,
            'subtotal' => $subtotal,
            'tax_total' => $taxTotal,
            'round_off' => 0,
            'total' => $total,
        ];
    }
}
