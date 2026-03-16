<?php

namespace Tests\Feature\Sales;

use App\Models\CRM\Customer;
use App\Models\Sales\Payment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PaymentControllerTest extends TestCase
{
    use RefreshDatabase;

    private $tenant;
    private $adminUser;

    protected function setUp(): void
    {
        parent::setUp();
        ['tenant' => $this->tenant, 'user' => $this->adminUser] = $this->createTenantWithAdmin();
    }

    public function test_index_lists_payments(): void
    {
        $response = $this->actingAs($this->adminUser)
            ->get(route('bo.sales.payments.index'));

        $response->assertStatus(200);
    }

    public function test_show_displays_payment(): void
    {
        $payment = Payment::factory()->create([
            'tenant_id' => $this->tenant->id,
            'customer_id' => Customer::factory()->create(['tenant_id' => $this->tenant->id])->id,
        ]);

        $response = $this->actingAs($this->adminUser)
            ->get(route('bo.sales.payments.show', $payment));

        $response->assertStatus(200);
    }

    public function test_create_shows_form(): void
    {
        $response = $this->actingAs($this->adminUser)
            ->get(route('bo.sales.payments.create'));

        $response->assertStatus(200);
    }

    public function test_destroy_deletes_payment(): void
    {
        $payment = Payment::factory()->create([
            'tenant_id' => $this->tenant->id,
            'customer_id' => Customer::factory()->create(['tenant_id' => $this->tenant->id])->id,
        ]);

        $response = $this->actingAs($this->adminUser)
            ->delete(route('bo.sales.payments.destroy', $payment));

        $response->assertRedirect(route('bo.sales.payments.index'));
    }
}
