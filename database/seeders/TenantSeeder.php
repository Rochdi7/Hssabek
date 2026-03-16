<?php

namespace Database\Seeders;

use App\Models\Tenancy\Tenant;
use Illuminate\Database\Seeder;

class TenantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create a test tenant
        Tenant::firstOrCreate(
            ['slug' => 'localhost'],
            [
                'name' => 'Test Tenant',
                'status' => 'active',
                'timezone' => 'UTC',
                'default_currency' => 'USD',
                'has_free_trial' => false,
            ]
        );
    }
}
