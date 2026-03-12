<?php

namespace Database\Factories;

use App\Models\Pro\RecurringInvoice;
use Illuminate\Database\Eloquent\Factories\Factory;

class RecurringInvoiceFactory extends Factory
{
    protected $model = RecurringInvoice::class;

    public function definition(): array
    {
        return [
            'customer_id' => CustomerFactory::new(),
            'interval' => fake()->randomElement(['week', 'month', 'year']),
            'every' => 1,
            'next_run_at' => now()->addMonth(),
            'status' => 'active',
            'total_generated' => 0,
        ];
    }
}
