<?php

namespace Tests\Feature\Sales;

use App\Models\CRM\Customer;
use App\Models\Purchases\Supplier;
use App\Models\Purchases\VendorBill;
use App\Models\Sales\Invoice;
use App\Models\Sales\Payment;
use App\Services\Tenancy\TenantContext;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AutoReferenceTest extends TestCase
{
    use RefreshDatabase;

    private $tenant;
    private $adminUser;

    protected function setUp(): void
    {
        parent::setUp();
        ['tenant' => $this->tenant, 'user' => $this->adminUser] = $this->createTenantWithAdmin();
        TenantContext::set($this->tenant);
    }

    public function test_client_payment_without_reference_gets_generated_automatically(): void
    {
        $customer = Customer::factory()->create(['tenant_id' => $this->tenant->id]);
        $invoice = Invoice::factory()->create([
            'tenant_id' => $this->tenant->id,
            'customer_id' => $customer->id,
            'status' => 'unpaid',
            'total' => 100,
            'amount_paid' => 0,
            'amount_due' => 100,
        ]);

        $this->actingAs($this->adminUser)
            ->post(route('bo.sales.payments.store'), [
                'customer_id' => $customer->id,
                'amount' => 100,
                'payment_date' => now()->toDateString(),
                // no reference_number submitted
                'allocations' => [
                    ['invoice_id' => $invoice->id, 'amount_applied' => 100],
                ],
            ])->assertRedirect();

        $payment = Payment::first();
        $this->assertNotNull($payment);
        $this->assertNotEmpty($payment->reference_number, 'Reference should be auto-generated.');
    }

    public function test_supplier_payment_without_reference_gets_generated_automatically(): void
    {
        $supplier = Supplier::factory()->create(['tenant_id' => $this->tenant->id]);
        $bill = VendorBill::factory()->create([
            'tenant_id' => $this->tenant->id,
            'supplier_id' => $supplier->id,
            'status' => 'unpaid',
            'total' => 200,
            'amount_paid' => 0,
            'amount_due' => 200,
        ]);

        $this->actingAs($this->adminUser)
            ->post(route('bo.purchases.supplier-payments.store'), [
                'supplier_id' => $supplier->id,
                'amount' => 200,
                'paid_at' => now()->toDateString(),
                // no reference_number
                'allocations' => [
                    ['vendor_bill_id' => $bill->id, 'amount_applied' => 200],
                ],
            ])->assertRedirect();

        $payment = \App\Models\Purchases\SupplierPayment::first();
        $this->assertNotNull($payment);
        $this->assertNotEmpty($payment->reference_number, 'Supplier payment reference should be auto-generated.');
    }

    public function test_invoice_without_reference_gets_generated_automatically(): void
    {
        $customer = Customer::factory()->create(['tenant_id' => $this->tenant->id]);

        $this->actingAs($this->adminUser)
            ->post(route('bo.sales.invoices.store'), [
                'customer_id' => $customer->id,
                'issue_date' => now()->toDateString(),
                'due_date' => now()->addDays(30)->toDateString(),
                // no reference_number
                'items' => [
                    ['label' => 'Service', 'quantity' => 1, 'unit_price' => 100],
                ],
            ])->assertRedirect();

        $invoice = Invoice::first();
        $this->assertNotNull($invoice);
        $this->assertNotEmpty($invoice->reference_number, 'Invoice reference should be auto-generated.');
    }

    public function test_manual_reference_is_preserved_when_provided(): void
    {
        $customer = Customer::factory()->create(['tenant_id' => $this->tenant->id]);

        $this->actingAs($this->adminUser)
            ->post(route('bo.sales.invoices.store'), [
                'customer_id' => $customer->id,
                'issue_date' => now()->toDateString(),
                'reference_number' => 'MY-MANUAL-REF-123',
                'items' => [
                    ['label' => 'Service', 'quantity' => 1, 'unit_price' => 100],
                ],
            ])->assertRedirect();

        $this->assertEquals('MY-MANUAL-REF-123', Invoice::first()->reference_number);
    }

    public function test_existing_manual_reference_displays_in_details(): void
    {
        $customer = Customer::factory()->create(['tenant_id' => $this->tenant->id]);
        $invoice = Invoice::factory()->create([
            'tenant_id' => $this->tenant->id,
            'customer_id' => $customer->id,
            'reference_number' => 'LEGACY-REF-999',
        ]);

        $this->actingAs($this->adminUser)
            ->get(route('bo.sales.invoices.show', $invoice))
            ->assertStatus(200)
            ->assertSee('LEGACY-REF-999');
    }

    public function test_no_validation_error_when_reference_omitted(): void
    {
        $customer = Customer::factory()->create(['tenant_id' => $this->tenant->id]);

        $this->actingAs($this->adminUser)
            ->post(route('bo.sales.invoices.store'), [
                'customer_id' => $customer->id,
                'issue_date' => now()->toDateString(),
                'items' => [
                    ['label' => 'Service', 'quantity' => 1, 'unit_price' => 100],
                ],
            ])->assertSessionHasNoErrors();
    }
}
