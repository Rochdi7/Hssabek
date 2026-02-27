<?php

namespace Database\Seeders;

use App\Models\Tenancy\Tenant;
use App\Models\Tenancy\TenantDomain;
use Illuminate\Database\Seeder;

class TenantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create a test tenant
        $tenant = Tenant::firstOrCreate(
            ['slug' => 'localhost'],
            [
                'name' => 'Test Tenant',
                'status' => 'active',
                'timezone' => 'UTC',
                'default_currency' => 'USD',
                'has_free_trial' => false,
            ]
        );

        // Create domain mappings for local development
        TenantDomain::firstOrCreate(
            ['domain' => 'localhost:8000'],
            ['tenant_id' => $tenant->id]
        );

        TenantDomain::firstOrCreate(
            ['domain' => 'localhost'],
            ['tenant_id' => $tenant->id]
        );

        // Also create domain for IP if needed for fallback
        TenantDomain::firstOrCreate(
            ['domain' => '127.0.0.1:8000'],
            ['tenant_id' => $tenant->id]
        );

        TenantDomain::firstOrCreate(
            ['domain' => '127.0.0.1'],
            ['tenant_id' => $tenant->id]
        );
    }
}
