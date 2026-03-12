<?php

namespace Database\Factories;

use App\Models\Pro\Branch;
use Illuminate\Database\Eloquent\Factories\Factory;

class BranchFactory extends Factory
{
    protected $model = Branch::class;

    public function definition(): array
    {
        return [
            'name' => fake()->company(),
            'code' => fake()->optional()->bothify('BR-##'),
            'email' => fake()->optional()->companyEmail(),
            'phone' => fake()->optional()->phoneNumber(),
            'is_default' => false,
            'is_active' => true,
        ];
    }
}
