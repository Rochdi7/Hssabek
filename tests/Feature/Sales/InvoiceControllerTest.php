<?php

namespace Tests\Feature\Sales;

use App\Models\CRM\Customer;
use App\Models\Sales\Invoice;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\URL;
use Tests\TestCase;

class InvoiceControllerTest extends TestCase
{
    use RefreshDatabase;

    private $tenant;
    private $adminUser;

    protected function setUp(): void
    {
        parent::setUp();
        ['tenant' => $this->tenant, 'user' => $this->adminUser] = $this->createTenantWithAdmin();
        $domain = $this->tenant->domains()->where('is_primary', true)->value('domain');
        URL::forceRootUrl('http://' . $domain);
    }

    public function test_index_lists_invoices(): void
    {
        $response = $this->actingAs($this->adminUser)
            ->get(route('bo.sales.invoices.index'));

        $response->assertStatus(200);
    }

    public function test_create_shows_form(): void
    {
        $response = $this->actingAs($this->adminUser)
            ->get(route('bo.sales.invoices.create'));

        $response->assertStatus(200);
    }

    public function test_store_creates_invoice(): void
    {
        $customer = Customer::factory()->create([
            'tenant_id' => $this->tenant->id,
        ]);

        $response = $this->actingAs($this->adminUser)
            ->post(route('bo.sales.invoices.store'), [
                'customer_id' => $customer->id,
                'issue_date' => now()->toDateString(),
                'due_date' => now()->addDays(30)->toDateString(),
                'items' => [
                    [
                        'label' => 'Service de consultation',
                        'quantity' => 1,
                        'unit_price' => 100,
                    ],
                ],
            ]);

        $response->assertRedirect(route('bo.sales.invoices.index'));
        $this->assertDatabaseCount('invoices', 1);
    }

    public function test_show_displays_invoice(): void
    {
        $invoice = Invoice::factory()->create([
            'tenant_id' => $this->tenant->id,
            'customer_id' => Customer::factory()->create(['tenant_id' => $this->tenant->id])->id,
        ]);

        $response = $this->actingAs($this->adminUser)
            ->get(route('bo.sales.invoices.show', $invoice));

        $response->assertStatus(200);
    }

    public function test_edit_shows_form(): void
    {
        $invoice = Invoice::factory()->create([
            'tenant_id' => $this->tenant->id,
            'customer_id' => Customer::factory()->create(['tenant_id' => $this->tenant->id])->id,
            'status' => 'draft',
        ]);

        $response = $this->actingAs($this->adminUser)
            ->get(route('bo.sales.invoices.edit', $invoice));

        $response->assertStatus(200);
    }

    public function test_destroy_soft_deletes_invoice(): void
    {
        $invoice = Invoice::factory()->create([
            'tenant_id' => $this->tenant->id,
            'customer_id' => Customer::factory()->create(['tenant_id' => $this->tenant->id])->id,
        ]);

        $response = $this->actingAs($this->adminUser)
            ->delete(route('bo.sales.invoices.destroy', $invoice));

        $response->assertRedirect(route('bo.sales.invoices.index'));
        $this->assertSoftDeleted('invoices', ['id' => $invoice->id]);
    }
}
