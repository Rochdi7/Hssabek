<?php

namespace Database\Factories;

use App\Models\Tenancy\TenantDomain;
use Illuminate\Database\Eloquent\Factories\Factory;

class TenantDomainFactory extends Factory
{
    protected $model = TenantDomain::class;

    public function definition(): array
    {
        return [
            'tenant_id' => TenantFactory::new(),
            'domain' => fake()->unique()->domainWord() . '.facturation.test',
            'is_primary' => true,
        ];
    }
}
