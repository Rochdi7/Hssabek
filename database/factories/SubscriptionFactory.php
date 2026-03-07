<?php

namespace Database\Factories;

use App\Models\Billing\Subscription;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubscriptionFactory extends Factory
{
    protected $model = Subscription::class;

    public function definition(): array
    {
        return [
            'tenant_id' => TenantFactory::new(),
            'plan_id' => PlanFactory::new(),
            'status' => 'active',
            'starts_at' => now(),
            'ends_at' => now()->addMonth(),
        ];
    }
}
