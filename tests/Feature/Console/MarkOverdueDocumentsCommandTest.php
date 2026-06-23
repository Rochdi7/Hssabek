<?php

namespace Tests\Feature\Console;

use App\Models\CRM\Customer;
use App\Models\Purchases\Supplier;
use App\Models\Purchases\VendorBill;
use App\Models\Sales\Invoice;
use App\Services\Tenancy\TenantContext;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MarkOverdueDocumentsCommandTest extends TestCase
{
    use RefreshDatabase;

    private \App\Models\Tenancy\Tenant $tenant;
    private Customer $customer;
    private Supplier $supplier;

    protected function setUp(): void
    {
        parent::setUp();

        $this->tenant = $this->createTenant();
        TenantContext::set($this->tenant);

        $this->customer = Customer::create([
            'name' => 'Client', 'email' => 'c@test.com', 'type' => 'company', 'status' => 'active',
        ]);
        $this->supplier = Supplier::create([
            'name' => 'Fournisseur', 'email' => 's@test.com', 'status' => 'active',
        ]);
    }

    private function invoice(string $status, string $dueDate, float $paid, float $due): Invoice
    {
        return Invoice::create([
            'customer_id' => $this->customer->id,
            'number' => 'INV-' . uniqid(),
            'status' => $status,
            'issue_date' => now()->subDays(60)->toDateString(),
            'due_date' => $dueDate,
            'subtotal' => $due + $paid,
            'total' => $due + $paid,
            'amount_paid' => $paid,
            'amount_due' => $due,
        ]);
    }

    private function bill(string $status, string $dueDate, float $paid, float $due): VendorBill
    {
        return VendorBill::create([
            'supplier_id' => $this->supplier->id,
            'number' => 'VB-' . uniqid(),
            'status' => $status,
            'issue_date' => now()->subDays(60)->toDateString(),
            'due_date' => $dueDate,
            'subtotal' => $due + $paid,
            'total' => $due + $paid,
            'amount_paid' => $paid,
            'amount_due' => $due,
        ]);
    }

    public function test_unpaid_past_due_invoice_becomes_overdue(): void
    {
        $inv = $this->invoice('unpaid', now()->subDay()->toDateString(), 0, 100);

        $this->artisan('documents:mark-overdue')->assertSuccessful();

        $this->assertEquals('overdue', $inv->fresh()->status);
    }

    public function test_legacy_sent_past_due_invoice_becomes_overdue(): void
    {
        $inv = $this->invoice('sent', now()->subDay()->toDateString(), 0, 100);

        $this->artisan('documents:mark-overdue')->assertSuccessful();

        $this->assertEquals('overdue', $inv->fresh()->status);
    }

    public function test_paid_partial_void_and_future_due_are_never_touched(): void
    {
        $paid    = $this->invoice('paid', now()->subDay()->toDateString(), 100, 0);
        $partial = $this->invoice('partial', now()->subDay()->toDateString(), 50, 50);
        $void    = $this->invoice('void', now()->subDay()->toDateString(), 0, 100);
        $future  = $this->invoice('unpaid', now()->addDays(5)->toDateString(), 0, 100);

        $this->artisan('documents:mark-overdue')->assertSuccessful();

        $this->assertEquals('paid', $paid->fresh()->status);
        $this->assertEquals('partial', $partial->fresh()->status);
        $this->assertEquals('void', $void->fresh()->status);
        $this->assertEquals('unpaid', $future->fresh()->status);
    }

    public function test_unpaid_past_due_vendor_bill_becomes_overdue(): void
    {
        $bill = $this->bill('unpaid', now()->subDay()->toDateString(), 0, 100);

        $this->artisan('documents:mark-overdue')->assertSuccessful();

        $this->assertEquals('overdue', $bill->fresh()->status);
    }

    public function test_command_is_idempotent(): void
    {
        $inv = $this->invoice('unpaid', now()->subDay()->toDateString(), 0, 100);

        $this->artisan('documents:mark-overdue')->assertSuccessful();
        $this->artisan('documents:mark-overdue')->assertSuccessful();
        $this->artisan('documents:mark-overdue')->assertSuccessful();

        $this->assertEquals('overdue', $inv->fresh()->status);
    }
}
