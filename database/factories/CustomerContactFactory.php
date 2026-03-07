<?php

namespace Database\Factories;

use App\Models\CRM\CustomerContact;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerContactFactory extends Factory
{
    protected $model = CustomerContact::class;

    public function definition(): array
    {
        return [
            'customer_id' => CustomerFactory::new(),
            'name' => fake()->name(),
            'email' => fake()->safeEmail(),
            'phone' => fake()->phoneNumber(),
            'position' => fake()->jobTitle(),
            'is_primary' => false,
        ];
    }
}
