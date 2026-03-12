<?php

namespace Database\Factories;

use App\Models\Sales\PaymentAllocation;
use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentAllocationFactory extends Factory
{
    protected $model = PaymentAllocation::class;

    public function definition(): array
    {
        return [
            'payment_id' => PaymentFactory::new(),
            'invoice_id' => InvoiceFactory::new(),
            'amount_applied' => fake()->randomFloat(2, 50, 2000),
        ];
    }
}
