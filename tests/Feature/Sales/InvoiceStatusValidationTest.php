<?php

namespace Tests\Feature\Sales;

use App\Models\CRM\Customer;
use App\Models\Sales\Invoice;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class InvoiceStatusValidationTest extends TestCase
{
    use RefreshDatabase;

    private $tenant;
    private $adminUser;

    protected function setUp(): void
    {
        parent::setUp();
        ['tenant' => $this->tenant, 'user' => $this->adminUser] = $this->createTenantWithAdmin();
    }

    private function makeInvoice(string $status, float $total = 100, float $due = 100): Invoice
    {
        return Invoice::factory()->create([
            'tenant_id' => $this->tenant->id,
            'customer_id' => Customer::factory()->create(['tenant_id' => $this->tenant->id])->id,
            'status' => $status,
            'total' => $total,
            'amount_paid' => $total - $due,
            'amount_due' => $due,
        ]);
    }

    #[DataProvider('forbiddenStatuses')]
    public function test_user_cannot_manually_set_payment_driven_status(string $forbidden): void
    {
        $invoice = $this->makeInvoice('unpaid');

        $response = $this->actingAs($this->adminUser)
            ->post(route('bo.sales.invoices.change-status', $invoice), ['status' => $forbidden]);

        $response->assertStatus(422);
        $this->assertEquals('unpaid', $invoice->fresh()->status); // unchanged
    }

    public static function forbiddenStatuses(): array
    {
        return [
            ['paid'],
            ['partial'],
            ['overdue'],
            ['unpaid'],
            ['draft'],
            ['sent'],
        ];
    }

    public function test_user_can_manually_void_invoice(): void
    {
        $invoice = $this->makeInvoice('unpaid');

        $response = $this->actingAs($this->adminUser)
            ->post(route('bo.sales.invoices.change-status', $invoice), ['status' => 'void']);

        $response->assertRedirect();
        $this->assertEquals('void', $invoice->fresh()->status);
    }

    public function test_legacy_sent_invoice_still_loads_edit_form(): void
    {
        // A pre-migration row with the legacy 'sent' status, no payments.
        $invoice = $this->makeInvoice('sent', 100, 100);

        $response = $this->actingAs($this->adminUser)
            ->get(route('bo.sales.invoices.edit', $invoice));

        $response->assertStatus(200);
    }
}
