<?php

namespace Database\Factories;

use App\Models\Purchases\Supplier;
use Illuminate\Database\Eloquent\Factories\Factory;

class SupplierFactory extends Factory
{
    protected $model = Supplier::class;

    public function definition(): array
    {
        return [
            'name' => fake()->company(),
            'email' => fake()->unique()->safeEmail(),
            'phone' => fake()->phoneNumber(),
            'tax_id' => fake()->optional()->numerify('##########'),
            'payment_terms_days' => fake()->randomElement([15, 30, 45, 60]),
            'status' => 'active',
            'notes' => fake()->optional()->sentence(),
        ];
    }
}
