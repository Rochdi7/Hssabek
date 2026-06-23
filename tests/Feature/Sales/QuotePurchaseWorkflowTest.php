<?php

namespace Tests\Feature\Sales;

use App\Models\CRM\Customer;
use App\Models\Inventory\Warehouse;
use App\Models\Purchases\PurchaseOrder;
use App\Models\Purchases\Supplier;
use App\Models\Sales\Invoice;
use App\Models\Sales\Quote;
use App\Services\Purchases\PurchaseOrderService;
use App\Services\Sales\QuoteService;
use App\Services\Tenancy\TenantContext;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class QuotePurchaseWorkflowTest extends TestCase
{
    use RefreshDatabase;

    private $tenant;
    private $adminUser;

    protected function setUp(): void
    {
        parent::setUp();
        ['tenant' => $this->tenant, 'user' => $this->adminUser] = $this->createTenantWithAdmin();
        TenantContext::set($this->tenant);

        Warehouse::factory()->create([
            'tenant_id' => $this->tenant->id,
            'is_default' => true,
            'is_active' => true,
        ]);
    }

    private function customer(): Customer
    {
        return Customer::factory()->create(['tenant_id' => $this->tenant->id]);
    }

    private function supplier(): Supplier
    {
        return Supplier::factory()->create(['tenant_id' => $this->tenant->id]);
    }

    // ── Quotes ──

    public function test_new_quote_defaults_to_active(): void
    {
        $quote = app(QuoteService::class)->create([
            'customer_id' => $this->customer()->id,
            'issue_date' => now()->toDateString(),
            'items' => [['label' => 'X', 'quantity' => 1, 'unit_price' => 100, 'discount_type' => 'none', 'discount_value' => 0, 'tax_rate' => 0]],
        ]);

        $this->assertEquals('active', $quote->status);
    }

    public function test_active_quote_can_be_converted_to_invoice(): void
    {
        $quote = app(QuoteService::class)->create([
            'customer_id' => $this->customer()->id,
            'issue_date' => now()->toDateString(),
            'items' => [['label' => 'X', 'quantity' => 1, 'unit_price' => 100, 'discount_type' => 'none', 'discount_value' => 0, 'tax_rate' => 0]],
        ]);

        $invoice = app(QuoteService::class)->convertToInvoice($quote->fresh());

        $this->assertInstanceOf(Invoice::class, $invoice);
        $this->assertEquals('unpaid', $invoice->status);
        $this->assertEquals('accepted', $quote->fresh()->status);
    }

    public function test_legacy_sent_quote_can_still_be_converted(): void
    {
        $quote = Quote::factory()->create([
            'tenant_id' => $this->tenant->id,
            'customer_id' => $this->customer()->id,
            'status' => 'sent',
            'total' => 100,
        ]);

        $invoice = app(QuoteService::class)->convertToInvoice($quote->fresh());

        $this->assertEquals('unpaid', $invoice->status);
    }

    public function test_quote_change_status_rejects_draft_and_sent(): void
    {
        $quote = Quote::factory()->create([
            'tenant_id' => $this->tenant->id,
            'customer_id' => $this->customer()->id,
            'status' => 'active',
        ]);

        foreach (['draft', 'sent'] as $forbidden) {
            $this->actingAs($this->adminUser)
                ->post(route('bo.sales.quotes.change-status', $quote), ['status' => $forbidden])
                ->assertStatus(422);
        }

        $this->actingAs($this->adminUser)
            ->post(route('bo.sales.quotes.change-status', $quote), ['status' => 'accepted'])
            ->assertRedirect();

        $this->assertEquals('accepted', $quote->fresh()->status);
    }

    // ── Purchase Orders ──

    public function test_new_purchase_order_defaults_to_active(): void
    {
        $po = app(PurchaseOrderService::class)->create([
            'supplier_id' => $this->supplier()->id,
            'order_date' => now()->toDateString(),
            'items' => [['label' => 'X', 'quantity' => 1, 'unit_cost' => 50, 'discount_type' => 'none', 'discount_value' => 0, 'tax_rate' => 0]],
        ]);

        $this->assertEquals('active', $po->status);
    }

    public function test_active_purchase_order_can_be_received(): void
    {
        $product = \App\Models\Catalog\Product::factory()->create(['tenant_id' => $this->tenant->id]);

        $po = app(PurchaseOrderService::class)->create([
            'supplier_id' => $this->supplier()->id,
            'order_date' => now()->toDateString(),
            'items' => [['label' => 'X', 'product_id' => $product->id, 'quantity' => 2, 'unit_cost' => 50, 'discount_type' => 'none', 'discount_value' => 0, 'tax_rate' => 0]],
        ]);

        $receipt = app(PurchaseOrderService::class)->receive($po->fresh()->load('items'));

        $this->assertEquals('received', $po->fresh()->status);
        $this->assertNotNull($receipt);
    }

    public function test_purchase_order_change_status_rejects_draft_and_sent(): void
    {
        $po = PurchaseOrder::factory()->create([
            'tenant_id' => $this->tenant->id,
            'supplier_id' => $this->supplier()->id,
            'status' => 'active',
        ]);

        foreach (['draft', 'sent'] as $forbidden) {
            $this->actingAs($this->adminUser)
                ->post(route('bo.purchases.purchase-orders.change-status', $po), ['status' => $forbidden])
                ->assertStatus(422);
        }

        $this->actingAs($this->adminUser)
            ->post(route('bo.purchases.purchase-orders.change-status', $po), ['status' => 'confirmed'])
            ->assertRedirect();

        $this->assertEquals('confirmed', $po->fresh()->status);
    }
}
