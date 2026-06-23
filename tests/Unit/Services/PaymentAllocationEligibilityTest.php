<?php

namespace Tests\Unit\Services;

use App\Models\CRM\Customer;
use App\Models\Purchases\Supplier;
use App\Models\Purchases\VendorBill;
use App\Models\Sales\Invoice;
use App\Services\Tenancy\TenantContext;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * Allocation eligibility is money-based, NOT delivery-based.
 * An invoice/bill is allocatable when amount_due > 0 and status is not
 * paid/void. "sent"/"posted" must never be required — documents may be
 * delivered outside the system (print, download, hand-off, external email).
 */
class PaymentAllocationEligibilityTest extends TestCase
{
    use RefreshDatabase;

    private Customer $customer;
    private Supplier $supplier;

    protected function setUp(): void
    {
        parent::setUp();

        $tenant = $this->createTenant();
        TenantContext::set($tenant);

        $this->customer = Customer::create([
            'name' => 'Alloc Client',
            'email' => 'alloc@test.com',
            'type' => 'company',
            'status' => 'active',
        ]);

        $this->supplier = Supplier::create([
            'name' => 'Alloc Supplier',
            'email' => 'alloc-supplier@test.com',
            'status' => 'active',
        ]);
    }

    private function makeInvoice(string $status, float $due, float $total = 500): Invoice
    {
        return Invoice::create([
            'customer_id' => $this->customer->id,
            'number' => 'INV-' . fake()->unique()->numerify('######'),
            'status' => $status,
            'issue_date' => now()->toDateString(),
            'due_date' => now()->addDays(30)->toDateString(),
            'enable_tax' => false,
            'subtotal' => $total,
            'discount_total' => 0,
            'tax_total' => 0,
            'total' => $total,
            'amount_paid' => $total - $due,
            'amount_due' => $due,
        ]);
    }

    private function allocatableIds(): array
    {
        return Invoice::where('customer_id', $this->customer->id)
            ->allocatable()
            ->pluck('id')
            ->all();
    }

    public function test_unpaid_invoice_appears(): void
    {
        $invoice = $this->makeInvoice('unpaid', 500);
        $this->assertContains($invoice->id, $this->allocatableIds());
    }

    public function test_legacy_draft_invoice_with_balance_appears(): void
    {
        $invoice = $this->makeInvoice('draft', 500);
        $this->assertContains($invoice->id, $this->allocatableIds());
    }

    public function test_legacy_sent_invoice_with_balance_appears(): void
    {
        $invoice = $this->makeInvoice('sent', 500);
        $this->assertContains($invoice->id, $this->allocatableIds());
    }

    public function test_partial_invoice_appears(): void
    {
        $invoice = $this->makeInvoice('partial', 200);
        $this->assertContains($invoice->id, $this->allocatableIds());
    }

    public function test_overdue_invoice_appears(): void
    {
        $invoice = $this->makeInvoice('overdue', 500);
        $this->assertContains($invoice->id, $this->allocatableIds());
    }

    public function test_paid_invoice_does_not_appear(): void
    {
        $invoice = $this->makeInvoice('paid', 0);
        $this->assertNotContains($invoice->id, $this->allocatableIds());
    }

    public function test_void_invoice_does_not_appear(): void
    {
        $invoice = $this->makeInvoice('void', 500);
        $this->assertNotContains($invoice->id, $this->allocatableIds());
    }

    public function test_invoice_with_zero_due_does_not_appear(): void
    {
        // Non-paid status but nothing left to pay — money rule excludes it.
        $invoice = $this->makeInvoice('partial', 0);
        $this->assertNotContains($invoice->id, $this->allocatableIds());
    }

    private function makeBill(string $status, float $due, float $total = 500): VendorBill
    {
        return VendorBill::create([
            'supplier_id' => $this->supplier->id,
            'number' => 'VB-' . fake()->unique()->numerify('######'),
            'status' => $status,
            'issue_date' => now()->toDateString(),
            'due_date' => now()->addDays(30)->toDateString(),
            'subtotal' => $total,
            'tax_total' => 0,
            'total' => $total,
            'amount_paid' => $total - $due,
            'amount_due' => $due,
        ]);
    }

    private function allocatableBillIds(): array
    {
        return VendorBill::where('supplier_id', $this->supplier->id)
            ->allocatable()
            ->pluck('id')
            ->all();
    }

    public function test_vendor_bill_eligibility_follows_money_rule(): void
    {
        $unpaid  = $this->makeBill('unpaid', 500);
        $legacyDraft = $this->makeBill('draft', 500);
        $legacyPosted = $this->makeBill('posted', 500);
        $partial = $this->makeBill('partial', 200);
        $overdue = $this->makeBill('overdue', 500);
        $paid    = $this->makeBill('paid', 0);
        $void    = $this->makeBill('void', 500);
        $zeroDue = $this->makeBill('partial', 0);

        $ids = $this->allocatableBillIds();

        $this->assertContains($unpaid->id, $ids);
        $this->assertContains($legacyDraft->id, $ids);
        $this->assertContains($legacyPosted->id, $ids);
        $this->assertContains($partial->id, $ids);
        $this->assertContains($overdue->id, $ids);
        $this->assertNotContains($paid->id, $ids);
        $this->assertNotContains($void->id, $ids);
        $this->assertNotContains($zeroDue->id, $ids);
    }

    public function test_payment_creation_still_prevents_overpayment(): void
    {
        $invoice = $this->makeInvoice('unpaid', 100);

        $this->expectException(\DomainException::class);

        app(\App\Services\Sales\PaymentService::class)->create([
            'customer_id' => $this->customer->id,
            'amount' => 200,
            'payment_date' => now()->toDateString(),
            'allocations' => [
                ['invoice_id' => $invoice->id, 'amount_applied' => 200],
            ],
        ]);
    }
}
