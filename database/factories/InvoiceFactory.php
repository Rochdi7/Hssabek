<?php

namespace Database\Factories;

use App\Models\Sales\Invoice;
use Illuminate\Database\Eloquent\Factories\Factory;

class InvoiceFactory extends Factory
{
    protected $model = Invoice::class;

    public function definition(): array
    {
        $subtotal = fake()->randomFloat(2, 100, 10000);
        $taxTotal = round($subtotal * 0.20, 2);
        $total = $subtotal + $taxTotal;

        return [
            'customer_id' => CustomerFactory::new(),
            'number' => 'INV-' . fake()->unique()->numerify('######'),
            'status' => 'draft',
            'issue_date' => now(),
            'due_date' => now()->addDays(30),
            'enable_tax' => true,
            'subtotal' => $subtotal,
            'discount_total' => 0,
            'tax_total' => $taxTotal,
            'round_off' => 0,
            'total' => $total,
            'amount_paid' => 0,
            'amount_due' => $total,
        ];
    }

    public function sent(): static
    {
        return $this->state([
            'status' => 'sent',
            'sent_at' => now(),
        ]);
    }

    public function paid(): static
    {
        return $this->state(function (array $attributes) {
            return [
                'status' => 'paid',
                'amount_paid' => $attributes['total'],
                'amount_due' => 0,
                'paid_at' => now(),
                'sent_at' => now()->subDay(),
            ];
        });
    }
}
