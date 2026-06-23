<?php

namespace Tests\Feature\Sales;

use App\Models\CRM\Customer;
use App\Models\Sales\Invoice;
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

    public function test_can_pay_one_invoice_while_leaving_others_blank(): void
    {
        $customer = Customer::factory()->create(['tenant_id' => $this->tenant->id]);
        $invoiceA = Invoice::factory()->create([
            'tenant_id' => $this->tenant->id,
            'customer_id' => $customer->id,
            'status' => 'unpaid',
            'total' => 1000, 'amount_paid' => 0, 'amount_due' => 1000,
        ]);
        $invoiceB = Invoice::factory()->create([
            'tenant_id' => $this->tenant->id,
            'customer_id' => $customer->id,
            'status' => 'unpaid',
            'total' => 500, 'amount_paid' => 0, 'amount_due' => 500,
        ]);

        $response = $this->actingAs($this->adminUser)->post(route('bo.sales.payments.store'), [
            'customer_id' => $customer->id,
            'amount' => 350,
            'payment_date' => now()->toDateString(),
            'allocations' => [
                ['invoice_id' => $invoiceA->id, 'amount_applied' => ''],   // left blank
                ['invoice_id' => $invoiceB->id, 'amount_applied' => 350],
            ],
        ]);

        $response->assertRedirect(route('bo.sales.payments.index'));
        $response->assertSessionHasNoErrors();

        $this->assertEquals(1000.0, (float) $invoiceA->fresh()->amount_due);  // blank row → untouched
        $this->assertEquals(150.0, (float) $invoiceB->fresh()->amount_due);
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
