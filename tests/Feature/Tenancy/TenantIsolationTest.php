<?php

namespace Tests\Feature\Tenancy;

use App\Models\Catalog\Product;
use App\Models\CRM\Customer;
use App\Models\Finance\BankAccount;
use App\Models\Finance\Expense;
use App\Models\Finance\Income;
use App\Models\Inventory\Warehouse;
use App\Models\Purchases\PurchaseOrder;
use App\Models\Purchases\Supplier;
use App\Models\Sales\Invoice;
use App\Models\Sales\Payment;
use App\Models\Sales\Quote;
use App\Services\Tenancy\TenantContext;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TenantIsolationTest extends TestCase
{
    use RefreshDatabase;

    private function assertTenantIsolation(string $modelClass, array $tenantBData): void
    {
        $tenantA = $this->createTenant();
        $tenantB = $this->createTenant();

        TenantContext::set($tenantB);
        $recordB = $modelClass::create($tenantBData);
        TenantContext::forget();

        TenantContext::set($tenantA);
        $this->assertNull($modelClass::find($recordB->id), class_basename($modelClass) . ': Tenant A must not see Tenant B data.');
        $this->assertCount(0, $modelClass::all(), class_basename($modelClass) . ': Tenant A query must return 0 results.');
    }

    public function test_tenant_isolation_for_customer(): void
    {
        $this->assertTenantIsolation(Customer::class, [
            'name' => 'Customer B', 'email' => 'b@test.com', 'type' => 'individual', 'status' => 'active',
        ]);
    }

    public function test_tenant_isolation_for_product(): void
    {
        $this->assertTenantIsolation(Product::class, [
            'item_type' => 'product', 'name' => 'Product B', 'code' => 'PRD-B001', 'slug' => 'product-b',
            'selling_price' => 100, 'purchase_price' => 50, 'is_active' => true,
        ]);
    }

    public function test_tenant_isolation_for_invoice(): void
    {
        $tenantA = $this->createTenant();
        $tenantB = $this->createTenant();

        TenantContext::set($tenantB);
        $customer = Customer::create(['name' => 'Cust B', 'email' => 'cb@test.com', 'type' => 'company', 'status' => 'active']);
        $invoice = Invoice::create([
            'customer_id' => $customer->id, 'number' => 'INV-001', 'status' => 'draft',
            'issue_date' => now(), 'due_date' => now()->addDays(30), 'enable_tax' => true,
            'subtotal' => 1000, 'tax_total' => 200, 'total' => 1200, 'amount_paid' => 0, 'amount_due' => 1200,
        ]);
        TenantContext::forget();

        TenantContext::set($tenantA);
        $this->assertNull(Invoice::find($invoice->id));
        $this->assertCount(0, Invoice::all());
    }

    public function test_tenant_isolation_for_quote(): void
    {
        $tenantA = $this->createTenant();
        $tenantB = $this->createTenant();

        TenantContext::set($tenantB);
        $customer = Customer::create(['name' => 'Cust B', 'email' => 'qb@test.com', 'type' => 'company', 'status' => 'active']);
        Quote::create([
            'customer_id' => $customer->id, 'number' => 'QUO-001', 'status' => 'draft',
            'issue_date' => now(), 'expiry_date' => now()->addDays(30), 'enable_tax' => true,
            'subtotal' => 500, 'tax_total' => 100, 'total' => 600,
        ]);
        TenantContext::forget();

        TenantContext::set($tenantA);
        $this->assertCount(0, Quote::all());
    }

    public function test_tenant_isolation_for_supplier(): void
    {
        $this->assertTenantIsolation(Supplier::class, [
            'name' => 'Supplier B', 'email' => 'sb@test.com', 'status' => 'active',
        ]);
    }

    public function test_tenant_isolation_for_purchase_order(): void
    {
        $tenantA = $this->createTenant();
        $tenantB = $this->createTenant();

        TenantContext::set($tenantB);
        $supplier = Supplier::create(['name' => 'Sup B', 'email' => 'spb@test.com', 'status' => 'active']);
        $warehouse = Warehouse::create(['name' => 'WH B', 'code' => 'WHB01', 'is_default' => true, 'is_active' => true]);
        PurchaseOrder::create([
            'supplier_id' => $supplier->id, 'warehouse_id' => $warehouse->id,
            'number' => 'PO-001', 'status' => 'draft',
            'order_date' => now(), 'subtotal' => 500, 'tax_total' => 100, 'total' => 600,
        ]);
        TenantContext::forget();

        TenantContext::set($tenantA);
        $this->assertCount(0, PurchaseOrder::all());
    }

    public function test_tenant_isolation_for_expense(): void
    {
        $this->assertTenantIsolation(Expense::class, [
            'expense_number' => 'EXP-001', 'amount' => 250, 'expense_date' => now(),
            'payment_mode' => 'cash', 'payment_status' => 'paid',
        ]);
    }

    public function test_tenant_isolation_for_income(): void
    {
        $this->assertTenantIsolation(Income::class, [
            'income_number' => 'INC-001', 'amount' => 500, 'income_date' => now(),
            'payment_mode' => 'bank_transfer',
        ]);
    }

    public function test_tenant_isolation_for_warehouse(): void
    {
        $this->assertTenantIsolation(Warehouse::class, [
            'name' => 'Warehouse B', 'code' => 'WH-B01', 'is_default' => false, 'is_active' => true,
        ]);
    }

    public function test_tenant_isolation_for_bank_account(): void
    {
        $this->assertTenantIsolation(BankAccount::class, [
            'account_holder_name' => 'Holder B', 'account_number' => '123456789',
            'bank_name' => 'Bank B', 'account_type' => 'current', 'currency' => 'MAD',
            'opening_balance' => 10000, 'current_balance' => 10000, 'is_active' => true,
        ]);
    }

    public function test_tenant_isolation_for_payment(): void
    {
        $tenantA = $this->createTenant();
        $tenantB = $this->createTenant();

        TenantContext::set($tenantB);
        $customer = Customer::create(['name' => 'Cust B', 'email' => 'pb@test.com', 'type' => 'company', 'status' => 'active']);
        Payment::create([
            'customer_id' => $customer->id, 'amount' => 1000, 'status' => 'succeeded',
            'payment_date' => now(), 'paid_at' => now(),
        ]);
        TenantContext::forget();

        TenantContext::set($tenantA);
        $this->assertCount(0, Payment::all());
    }
}
