<?php

namespace Database\Factories;

use App\Models\CRM\CustomerAddress;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerAddressFactory extends Factory
{
    protected $model = CustomerAddress::class;

    public function definition(): array
    {
        return [
            'customer_id' => CustomerFactory::new(),
            'type' => fake()->randomElement(['billing', 'shipping']),
            'line1' => fake()->streetAddress(),
            'line2' => fake()->optional()->secondaryAddress(),
            'city' => fake()->city(),
            'region' => fake()->state(),
            'postal_code' => fake()->postcode(),
            'country' => 'MA',
        ];
    }
}
