<?php

namespace Tests\Feature\Sales;

use App\Models\CRM\Customer;
use App\Models\Sales\CreditNote;
use App\Models\Sales\Invoice;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\URL;
use Tests\TestCase;

class CreditNoteControllerTest extends TestCase
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

    public function test_index_lists_credit_notes(): void
    {
        $response = $this->actingAs($this->adminUser)
            ->get(route('bo.sales.credit-notes.index'));

        $response->assertStatus(200);
    }

    public function test_create_shows_form(): void
    {
        $response = $this->actingAs($this->adminUser)
            ->get(route('bo.sales.credit-notes.create'));

        $response->assertStatus(200);
    }

    public function test_show_displays_credit_note(): void
    {
        $customer = Customer::factory()->create(['tenant_id' => $this->tenant->id]);
        $invoice = Invoice::factory()->create([
            'tenant_id' => $this->tenant->id,
            'customer_id' => $customer->id,
        ]);

        $creditNote = CreditNote::factory()->create([
            'tenant_id' => $this->tenant->id,
            'customer_id' => $customer->id,
            'invoice_id' => $invoice->id,
        ]);

        $response = $this->actingAs($this->adminUser)
            ->get(route('bo.sales.credit-notes.show', $creditNote));

        $response->assertStatus(200);
    }

    public function test_destroy_soft_deletes_credit_note(): void
    {
        $customer = Customer::factory()->create(['tenant_id' => $this->tenant->id]);
        $invoice = Invoice::factory()->create([
            'tenant_id' => $this->tenant->id,
            'customer_id' => $customer->id,
        ]);

        $creditNote = CreditNote::factory()->create([
            'tenant_id' => $this->tenant->id,
            'customer_id' => $customer->id,
            'invoice_id' => $invoice->id,
        ]);

        $response = $this->actingAs($this->adminUser)
            ->delete(route('bo.sales.credit-notes.destroy', $creditNote));

        $response->assertRedirect(route('bo.sales.credit-notes.index'));
        $this->assertSoftDeleted('credit_notes', ['id' => $creditNote->id]);
    }
}
