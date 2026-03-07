<?php

namespace Tests\Unit\Services;

use App\Models\CRM\Customer;
use App\Models\Sales\CreditNoteApplication;
use App\Models\Sales\Invoice;
use App\Models\Sales\PaymentAllocation;
use App\Services\Sales\InvoiceService;
use App\Services\Sales\TaxCalculationService;
use App\Services\System\DocumentNumberService;
use App\Services\Tenancy\TenantContext;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class InvoiceServiceTest extends TestCase
{
    use RefreshDatabase;

    private InvoiceService $service;
    private Customer $customer;

    protected function setUp(): void
    {
        parent::setUp();

        $tenant = $this->createTenant();
        TenantContext::set($tenant);

        $this->customer = Customer::create([
            'name' => 'Test Client',
            'email' => 'client@test.com',
            'type' => 'company',
            'status' => 'active',
        ]);

        $this->service = app(InvoiceService::class);
    }

    public function test_create_invoice_with_items_calculates_totals_correctly(): void
    {
        $invoice = $this->service->create([
            'customer_id' => $this->customer->id,
            'issue_date' => now()->toDateString(),
            'due_date' => now()->addDays(30)->toDateString(),
            'items' => [
                ['label' => 'Item A', 'quantity' => 2, 'unit_price' => 100, 'discount_type' => 'none', 'discount_value' => 0, 'tax_rate' => 20],
                ['label' => 'Item B', 'quantity' => 1, 'unit_price' => 300, 'discount_type' => 'none', 'discount_value' => 0, 'tax_rate' => 20],
            ],
        ]);

        $this->assertEquals(500.00, (float) $invoice->subtotal);
        $this->assertEquals(100.00, (float) $invoice->tax_total);
        $this->assertEquals(600.00, (float) $invoice->total);
        $this->assertEquals(600.00, (float) $invoice->amount_due);
        $this->assertEquals(0, (float) $invoice->amount_paid);
        $this->assertCount(2, $invoice->items);
    }

    public function test_create_invoice_generates_sequential_number(): void
    {
        $invoice1 = $this->service->create([
            'customer_id' => $this->customer->id,
            'issue_date' => now()->toDateString(),
            'items' => [['label' => 'X', 'quantity' => 1, 'unit_price' => 10, 'discount_type' => 'none', 'discount_value' => 0, 'tax_rate' => 0]],
        ]);

        $invoice2 = $this->service->create([
            'customer_id' => $this->customer->id,
            'issue_date' => now()->toDateString(),
            'items' => [['label' => 'Y', 'quantity' => 1, 'unit_price' => 20, 'discount_type' => 'none', 'discount_value' => 0, 'tax_rate' => 0]],
        ]);

        $this->assertNotEquals($invoice1->number, $invoice2->number);
        $this->assertNotEmpty($invoice1->number);
        $this->assertNotEmpty($invoice2->number);
    }

    public function test_update_draft_invoice_recalculates_totals(): void
    {
        $invoice = $this->service->create([
            'customer_id' => $this->customer->id,
            'issue_date' => now()->toDateString(),
            'items' => [['label' => 'Original', 'quantity' => 1, 'unit_price' => 100, 'discount_type' => 'none', 'discount_value' => 0, 'tax_rate' => 20]],
        ]);

        $updated = $this->service->update($invoice, [
            'items' => [['label' => 'Updated', 'quantity' => 3, 'unit_price' => 200, 'discount_type' => 'none', 'discount_value' => 0, 'tax_rate' => 20]],
        ]);

        $this->assertEquals(600.00, (float) $updated->subtotal);
        $this->assertEquals(120.00, (float) $updated->tax_total);
        $this->assertEquals(720.00, (float) $updated->total);
    }

    public function test_cannot_update_non_draft_invoice(): void
    {
        $invoice = $this->service->create([
            'customer_id' => $this->customer->id,
            'issue_date' => now()->toDateString(),
            'items' => [['label' => 'Item', 'quantity' => 1, 'unit_price' => 100, 'discount_type' => 'none', 'discount_value' => 0, 'tax_rate' => 20]],
        ]);

        $this->service->transition($invoice, 'sent');

        $this->expectException(\DomainException::class);

        $this->service->update($invoice, [
            'items' => [['label' => 'Changed', 'quantity' => 1, 'unit_price' => 999, 'discount_type' => 'none', 'discount_value' => 0, 'tax_rate' => 20]],
        ]);
    }

    public function test_transition_draft_to_sent(): void
    {
        $invoice = $this->service->create([
            'customer_id' => $this->customer->id,
            'issue_date' => now()->toDateString(),
            'items' => [['label' => 'X', 'quantity' => 1, 'unit_price' => 100, 'discount_type' => 'none', 'discount_value' => 0, 'tax_rate' => 0]],
        ]);

        $this->service->transition($invoice, 'sent');

        $invoice->refresh();
        $this->assertEquals('sent', $invoice->status);
        $this->assertNotNull($invoice->sent_at);
    }

    public function test_transition_sent_to_paid(): void
    {
        $invoice = $this->service->create([
            'customer_id' => $this->customer->id,
            'issue_date' => now()->toDateString(),
            'items' => [['label' => 'X', 'quantity' => 1, 'unit_price' => 100, 'discount_type' => 'none', 'discount_value' => 0, 'tax_rate' => 0]],
        ]);

        $this->service->transition($invoice, 'sent');
        $this->service->transition($invoice, 'paid');

        $invoice->refresh();
        $this->assertEquals('paid', $invoice->status);
        $this->assertNotNull($invoice->paid_at);
    }

    public function test_invalid_transition_throws_exception(): void
    {
        $invoice = $this->service->create([
            'customer_id' => $this->customer->id,
            'issue_date' => now()->toDateString(),
            'items' => [['label' => 'X', 'quantity' => 1, 'unit_price' => 100, 'discount_type' => 'none', 'discount_value' => 0, 'tax_rate' => 0]],
        ]);

        $this->expectException(\DomainException::class);

        // Cannot go directly from draft to paid
        $this->service->transition($invoice, 'paid');
    }

    public function test_update_payment_totals_marks_invoice_paid_when_fully_allocated(): void
    {
        $invoice = $this->service->create([
            'customer_id' => $this->customer->id,
            'issue_date' => now()->toDateString(),
            'items' => [['label' => 'Item', 'quantity' => 1, 'unit_price' => 100, 'discount_type' => 'none', 'discount_value' => 0, 'tax_rate' => 0]],
        ]);

        $this->service->transition($invoice, 'sent');

        // Simulate a full payment allocation
        PaymentAllocation::create([
            'payment_id' => \App\Models\Sales\Payment::create([
                'customer_id' => $this->customer->id,
                'amount' => 100,
                'status' => 'succeeded',
                'payment_date' => now(),
                'paid_at' => now(),
            ])->id,
            'invoice_id' => $invoice->id,
            'amount_applied' => 100,
        ]);

        $this->service->updatePaymentTotals($invoice);

        $invoice->refresh();
        $this->assertEquals('paid', $invoice->status);
        $this->assertEquals(100.00, (float) $invoice->amount_paid);
        $this->assertEquals(0, (float) $invoice->amount_due);
    }

    public function test_update_payment_totals_marks_invoice_partial_when_partially_allocated(): void
    {
        $invoice = $this->service->create([
            'customer_id' => $this->customer->id,
            'issue_date' => now()->toDateString(),
            'items' => [['label' => 'Item', 'quantity' => 1, 'unit_price' => 200, 'discount_type' => 'none', 'discount_value' => 0, 'tax_rate' => 0]],
        ]);

        $this->service->transition($invoice, 'sent');

        // Simulate a partial payment
        PaymentAllocation::create([
            'payment_id' => \App\Models\Sales\Payment::create([
                'customer_id' => $this->customer->id,
                'amount' => 50,
                'status' => 'succeeded',
                'payment_date' => now(),
                'paid_at' => now(),
            ])->id,
            'invoice_id' => $invoice->id,
            'amount_applied' => 50,
        ]);

        $this->service->updatePaymentTotals($invoice);

        $invoice->refresh();
        $this->assertEquals('partial', $invoice->status);
        $this->assertEquals(50.00, (float) $invoice->amount_paid);
        $this->assertEquals(150.00, (float) $invoice->amount_due);
    }
}
