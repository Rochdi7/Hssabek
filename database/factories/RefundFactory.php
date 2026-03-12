<?php

namespace Database\Factories;

use App\Models\Sales\Refund;
use Illuminate\Database\Eloquent\Factories\Factory;

class RefundFactory extends Factory
{
    protected $model = Refund::class;

    public function definition(): array
    {
        return [
            'payment_id' => PaymentFactory::new(),
            'amount' => fake()->randomFloat(2, 50, 2000),
            'status' => 'pending',
            'provider_refund_id' => fake()->optional()->bothify('REF-####'),
            'refunded_at' => now(),
        ];
    }
}
