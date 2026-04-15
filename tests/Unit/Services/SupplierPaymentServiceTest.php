<?php

namespace Tests\Unit\Services;

use App\Models\Purchases\Supplier;
use App\Models\Purchases\VendorBill;
use App\Services\Purchases\SupplierPaymentService;
use App\Services\Tenancy\TenantContext;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SupplierPaymentServiceTest extends TestCase
{
    use RefreshDatabase;

    private SupplierPaymentService $service;
    private Supplier $supplier;

    protected function setUp(): void
    {
        parent::setUp();

        $tenant = $this->createTenant();
        TenantContext::set($tenant);

        $this->supplier = Supplier::create([
            'name' => 'Supplier A',
            'email' => 'supplier-a@test.com',
            'status' => 'active',
        ]);

        $this->service = app(SupplierPaymentService::class);
    }

    private function createVendorBill(Supplier $supplier, float $amount): VendorBill
    {
        return VendorBill::create([
            'supplier_id' => $supplier->id,
            'number' => 'VB-' . fake()->unique()->numerify('######'),
            'status' => 'posted',
            'issue_date' => now()->toDateString(),
            'due_date' => now()->addDays(30)->toDateString(),
            'subtotal' => $amount,
            'tax_total' => 0,

            'total' => $amount,
            'amount_paid' => 0,
            'amount_due' => $amount,
        ]);
    }

    public function test_over_allocation_total_throws_exception(): void
    {
        $bill1 = $this->createVendorBill($this->supplier, 300);
        $bill2 = $this->createVendorBill($this->supplier, 200);

        $this->expectException(\DomainException::class);

        $this->service->create([
            'supplier_id' => $this->supplier->id,
            'amount' => 400,
            'paid_at' => now()->toDateString(),
            'allocations' => [
                ['vendor_bill_id' => $bill1->id, 'amount_applied' => 250],
                ['vendor_bill_id' => $bill2->id, 'amount_applied' => 200],
            ],
        ]);
    }

    public function test_vendor_bill_must_belong_to_same_supplier(): void
    {
        $otherSupplier = Supplier::create([
            'name' => 'Supplier B',
            'email' => 'supplier-b@test.com',
            'status' => 'active',
        ]);

        $foreignBill = $this->createVendorBill($otherSupplier, 150);

        $this->expectException(\DomainException::class);

        $this->service->create([
            'supplier_id' => $this->supplier->id,
            'amount' => 150,
            'paid_at' => now()->toDateString(),
            'allocations' => [
                ['vendor_bill_id' => $foreignBill->id, 'amount_applied' => 150],
            ],
        ]);
    }

    public function test_valid_supplier_payment_allocation_succeeds(): void
    {
        $bill1 = $this->createVendorBill($this->supplier, 200);
        $bill2 = $this->createVendorBill($this->supplier, 100);

        $payment = $this->service->create([
            'supplier_id' => $this->supplier->id,
            'amount' => 300,
            'paid_at' => now()->toDateString(),
            'allocations' => [
                ['vendor_bill_id' => $bill1->id, 'amount_applied' => 200],
                ['vendor_bill_id' => $bill2->id, 'amount_applied' => 100],
            ],
        ]);

        $this->assertCount(2, $payment->allocations);

        $bill1->refresh();
        $bill2->refresh();
        $this->assertEquals(0.0, (float) $bill1->amount_due);
        $this->assertEquals(0.0, (float) $bill2->amount_due);
        $this->assertEquals('paid', $bill1->status);
        $this->assertEquals('paid', $bill2->status);
    }
}
