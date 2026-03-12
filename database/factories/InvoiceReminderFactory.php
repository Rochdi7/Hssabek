<?php

namespace Database\Factories;

use App\Models\Pro\InvoiceReminder;
use Illuminate\Database\Eloquent\Factories\Factory;

class InvoiceReminderFactory extends Factory
{
    protected $model = InvoiceReminder::class;

    public function definition(): array
    {
        return [
            'invoice_id' => InvoiceFactory::new(),
            'type' => fake()->randomElement(['before_due', 'on_due', 'after_due']),
            'channel' => 'email',
            'status' => 'queued',
            'scheduled_at' => now()->addDays(fake()->numberBetween(1, 30)),
            'created_at' => now(),
        ];
    }
}
