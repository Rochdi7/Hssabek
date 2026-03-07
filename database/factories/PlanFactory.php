<?php

namespace Database\Factories;

use App\Models\Billing\Plan;
use Illuminate\Database\Eloquent\Factories\Factory;

class PlanFactory extends Factory
{
    protected $model = Plan::class;

    public function definition(): array
    {
        return [
            'name' => fake()->randomElement(['Starter', 'Pro', 'Enterprise']),
            'code' => fake()->unique()->bothify('plan-####'),
            'interval' => fake()->randomElement(['month', 'year', 'lifetime']),
            'price' => fake()->randomFloat(2, 29, 299),
            'currency' => 'MAD',
            'trial_days' => 14,
            'is_active' => true,
            'features' => ['invoicing', 'reports', 'multi-user'],
        ];
    }
}
