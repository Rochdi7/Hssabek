<?php

namespace Database\Factories;

use App\Models\CRM\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    protected $model = Customer::class;

    public function definition(): array
    {
        return [
            'type' => fake()->randomElement(['individual', 'company']),
            'name' => fake()->company(),
            'email' => fake()->unique()->safeEmail(),
            'phone' => fake()->phoneNumber(),
            'tax_id' => fake()->optional()->numerify('##########'),
            'payment_terms_days' => fake()->randomElement([15, 30, 45, 60]),
            'status' => 'active',
            'notes' => fake()->optional()->sentence(),
        ];
    }

    public function individual(): static
    {
        return $this->state([
            'type' => 'individual',
            'name' => fake()->name(),
        ]);
    }

    public function company(): static
    {
        return $this->state(['type' => 'company']);
    }
}
