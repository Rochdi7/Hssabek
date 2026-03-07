<?php

namespace Tests\Unit\Services;

use App\Models\CRM\Customer;
use App\Models\Sales\Invoice;
use App\Models\Sales\Payment;
use App\Models\Sales\PaymentAllocation;
use App\Services\Sales\InvoiceService;
use App\Services\Sales\PaymentService;
use App\Services\Tenancy\TenantContext;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PaymentServiceTest extends TestCase
{
    use RefreshDatabase;

    private PaymentService $service;
    private InvoiceService $invoiceService;
    private Customer $customer;

    protected function setUp(): void
    {
        parent::setUp();

        $tenant = $this->createTenant();
        TenantContext::set($tenant);

        $this->customer = Customer::create([
            'name' => 'Payment Client',
            'email' => 'pay@test.com',
            'type' => 'company',
            'status' => 'active',
        ]);

        $this->service = app(PaymentService::class);
        $this->invoiceService = app(InvoiceService::class);
    }

    private function createSentInvoice(float $amount): Invoice
    {
        $invoice = $this->invoiceService->create([
            'customer_id' => $this->customer->id,
            'issue_date' => now()->toDateString(),
            'items' => [['label' => 'Item', 'quantity' => 1, 'unit_price' => $amount, 'discount_type' => 'none', 'discount_value' => 0, 'tax_rate' => 0]],
        ]);

        $this->invoiceService->transition($invoice, 'sent');

        return $invoice->fresh();
    }

    public function test_create_payment_with_single_allocation(): void
    {
        $invoice = $this->createSentInvoice(500);

        $payment = $this->service->create([
            'customer_id' => $this->customer->id,
            'amount' => 500,
            'payment_date' => now()->toDateString(),
            'allocations' => [
                ['invoice_id' => $invoice->id, 'amount_applied' => 500],
            ],
        ]);

        $this->assertEquals(500.00, (float) $payment->amount);
        $this->assertCount(1, $payment->allocations);

        $invoice->refresh();
        $this->assertEquals('paid', $invoice->status);
        $this->assertEquals(0, (float) $invoice->amount_due);
    }

    public function test_create_payment_with_multiple_allocations(): void
    {
        $invoice1 = $this->createSentInvoice(300);
        $invoice2 = $this->createSentInvoice(200);

        $payment = $this->service->create([
            'customer_id' => $this->customer->id,
            'amount' => 500,
            'payment_date' => now()->toDateString(),
            'allocations' => [
                ['invoice_id' => $invoice1->id, 'amount_applied' => 300],
                ['invoice_id' => $invoice2->id, 'amount_applied' => 200],
            ],
        ]);

        $this->assertCount(2, $payment->allocations);

        $invoice1->refresh();
        $invoice2->refresh();
        $this->assertEquals('paid', $invoice1->status);
        $this->assertEquals('paid', $invoice2->status);
    }

    public function test_over_allocation_throws_exception(): void
    {
        $invoice = $this->createSentInvoice(100);

        $this->expectException(\DomainException::class);

        $this->service->create([
            'customer_id' => $this->customer->id,
            'amount' => 200,
            'payment_date' => now()->toDateString(),
            'allocations' => [
                ['invoice_id' => $invoice->id, 'amount_applied' => 200],
            ],
        ]);
    }

    public function test_payment_updates_invoice_amount_paid(): void
    {
        $invoice = $this->createSentInvoice(1000);

        $this->service->create([
            'customer_id' => $this->customer->id,
            'amount' => 400,
            'payment_date' => now()->toDateString(),
            'allocations' => [
                ['invoice_id' => $invoice->id, 'amount_applied' => 400],
            ],
        ]);

        $invoice->refresh();
        $this->assertEquals(400.00, (float) $invoice->amount_paid);
        $this->assertEquals(600.00, (float) $invoice->amount_due);
        $this->assertEquals('partial', $invoice->status);
    }

    public function test_delete_payment_reverses_allocations(): void
    {
        $invoice = $this->createSentInvoice(500);

        $payment = $this->service->create([
            'customer_id' => $this->customer->id,
            'amount' => 500,
            'payment_date' => now()->toDateString(),
            'allocations' => [
                ['invoice_id' => $invoice->id, 'amount_applied' => 500],
            ],
        ]);

        // Invoice should be paid
        $invoice->refresh();
        $this->assertEquals('paid', $invoice->status);

        // Delete payment
        $this->service->delete($payment);

        // Invoice should revert
        $invoice->refresh();
        $this->assertEquals(0, (float) $invoice->amount_paid);
        $this->assertEquals(500.00, (float) $invoice->amount_due);
    }
}
