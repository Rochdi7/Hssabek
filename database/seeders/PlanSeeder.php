<?php

namespace Database\Seeders;

use App\Models\Billing\Plan;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Seed the plans table with default SaaS plans.
     */
    public function run(): void
    {
        $plans = [
            [
                'name' => 'Gratuit',
                'code' => 'free',
                'interval' => 'lifetime',
                'price' => 0.00,
                'currency' => 'MAD',
                'trial_days' => 0,
                'is_active' => true,
                'features' => [
                    'max_invoices' => 50,
                    'max_users' => 1,
                    'modules' => ['sales', 'crm'],
                ],
            ],
            [
                'name' => 'Premium',
                'code' => 'premium',
                'interval' => 'lifetime',
                'price' => 399.00,
                'currency' => 'MAD',
                'trial_days' => 0,
                'is_active' => true,
                'features' => [
                    'max_invoices' => -1,
                    'max_users' => -1,
                    'modules' => ['sales', 'crm', 'inventory', 'purchases', 'finance', 'reports', 'pro', 'api'],
                ],
            ],
        ];

        foreach ($plans as $planData) {
            Plan::firstOrCreate(
                ['code' => $planData['code']],
                $planData
            );
        }
    }
}
