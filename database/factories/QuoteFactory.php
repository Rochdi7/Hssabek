<?php

namespace Database\Factories;

use App\Models\Sales\Quote;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuoteFactory extends Factory
{
    protected $model = Quote::class;

    public function definition(): array
    {
        $subtotal = fake()->randomFloat(2, 100, 10000);
        $taxTotal = round($subtotal * 0.20, 2);
        $total = $subtotal + $taxTotal;

        return [
            'customer_id' => CustomerFactory::new(),
            'number' => 'QUO-' . fake()->unique()->numerify('######'),
            'status' => 'draft',
            'issue_date' => now(),
            'expiry_date' => now()->addDays(30),
            'enable_tax' => true,
            'subtotal' => $subtotal,
            'discount_total' => 0,
            'tax_total' => $taxTotal,

            'total' => $total,
        ];
    }
}
