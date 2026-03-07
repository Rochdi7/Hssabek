<?php

namespace Database\Factories;

use App\Models\Tenancy\Tenant;
use Illuminate\Database\Eloquent\Factories\Factory;

class TenantFactory extends Factory
{
    protected $model = Tenant::class;

    public function definition(): array
    {
        return [
            'name' => fake()->company(),
            'slug' => fake()->unique()->slug(2),
            'status' => 'active',
            'timezone' => 'UTC',
            'default_currency' => 'MAD',
            'has_free_trial' => false,
        ];
    }

    public function trial(): static
    {
        return $this->state([
            'has_free_trial' => true,
            'trial_ends_at' => now()->addDays(14),
        ]);
    }

    public function inactive(): static
    {
        return $this->state(['status' => 'inactive']);
    }
}
