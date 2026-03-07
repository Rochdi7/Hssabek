<?php

namespace Database\Factories;

use App\Models\Sales\Payment;
use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentFactory extends Factory
{
    protected $model = Payment::class;

    public function definition(): array
    {
        return [
            'customer_id' => CustomerFactory::new(),
            'amount' => fake()->randomFloat(2, 100, 5000),
            'status' => 'succeeded',
            'payment_date' => now(),
            'paid_at' => now(),
        ];
    }
}
