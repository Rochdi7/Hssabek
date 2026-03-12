<?php

namespace Tests\Feature\SuperAdmin;

use App\Models\Billing\Plan;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PlanManagementTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Create a super admin user (tenant_id = null).
     */
    private function createSuperAdmin(): User
    {
        return User::factory()->create([
            'tenant_id' => null,
            'status' => 'active',
        ]);
    }

    public function test_list_plans(): void
    {
        $admin = $this->createSuperAdmin();

        Plan::create([
            'name' => 'Starter',
            'code' => 'starter',
            'interval' => 'month',
            'price' => 49,
            'currency' => 'MAD',
            'is_active' => true,
        ]);

        $response = $this->actingAs($admin)->get(route('sa.plans.index'));

        $response->assertStatus(200);
    }

    public function test_store_creates_plan(): void
    {
        $admin = $this->createSuperAdmin();

        $planData = [
            'name' => 'Pro Plan',
            'code' => 'pro-plan',
            'interval' => 'month',
            'price' => 99,
            'currency' => 'MAD',
            'is_active' => true,
        ];

        $response = $this->actingAs($admin)->post(route('sa.plans.store'), $planData);

        $response->assertRedirect(route('sa.plans.index'));
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('plans', [
            'name' => 'Pro Plan',
            'code' => 'pro-plan',
            'interval' => 'month',
            'currency' => 'MAD',
        ]);
    }

    public function test_update_modifies_plan(): void
    {
        $admin = $this->createSuperAdmin();

        $plan = Plan::create([
            'name' => 'Old Plan',
            'code' => 'old-plan',
            'interval' => 'month',
            'price' => 50,
            'currency' => 'MAD',
            'is_active' => true,
        ]);

        $response = $this->actingAs($admin)->put(route('sa.plans.update', $plan), [
            'name' => 'Updated Plan',
            'code' => 'old-plan',
            'interval' => 'year',
            'price' => 199,
            'currency' => 'MAD',
            'is_active' => true,
        ]);

        $response->assertRedirect(route('sa.plans.index'));
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('plans', [
            'id' => $plan->id,
            'name' => 'Updated Plan',
            'interval' => 'year',
        ]);
    }

    public function test_destroy_deletes_plan(): void
    {
        $admin = $this->createSuperAdmin();

        $plan = Plan::create([
            'name' => 'Disposable Plan',
            'code' => 'disposable',
            'interval' => 'month',
            'price' => 10,
            'currency' => 'MAD',
            'is_active' => false,
        ]);

        $response = $this->actingAs($admin)->delete(route('sa.plans.destroy', $plan));

        $response->assertRedirect(route('sa.plans.index'));
        $response->assertSessionHas('success');

        $this->assertDatabaseMissing('plans', [
            'id' => $plan->id,
        ]);
    }
}
