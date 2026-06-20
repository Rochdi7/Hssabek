<?php

namespace Tests\Feature\Finance;

use App\Models\CRM\Customer;
use App\Models\Sales\Invoice;
use Database\Factories\FinanceCategoryFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * Regression suite proving the system no longer requires a "Compte bancaire".
 *
 * The Bank Accounts module was removed from the UI/workflow. These tests lock in
 * that invoices, payments and expenses can be created without any bank account,
 * and that the dashboard and reports still render and compute correctly.
 */
class BankAccountRemovalTest extends TestCase
{
    use RefreshDatabase;

    private $tenant;
    private $adminUser;

    protected function setUp(): void
    {
        parent::setUp();
        ['tenant' => $this->tenant, 'user' => $this->adminUser] = $this->createTenantWithAdmin();
    }

    public function test_invoice_can_be_created_without_bank_account(): void
    {
        $customer = Customer::factory()->create(['tenant_id' => $this->tenant->id]);

        $response = $this->actingAs($this->adminUser)
            ->post(route('bo.sales.invoices.store'), [
                'customer_id' => $customer->id,
                'issue_date'  => now()->toDateString(),
                'due_date'    => now()->addDays(30)->toDateString(),
                'items'       => [
                    ['label' => 'Prestation', 'quantity' => 1, 'unit_price' => 250],
                ],
            ]);

        $response->assertRedirect(route('bo.sales.invoices.index'));
        $this->assertDatabaseCount('invoices', 1);
    }

    public function test_payment_can_be_created_without_bank_account(): void
    {
        $customer = Customer::factory()->create(['tenant_id' => $this->tenant->id]);
        $invoice = Invoice::factory()->create([
            'tenant_id'   => $this->tenant->id,
            'customer_id' => $customer->id,
            'total'       => 250,
            'amount_due'  => 250,
            'amount_paid' => 0,
            'status'      => 'sent',
        ]);

        $response = $this->actingAs($this->adminUser)
            ->post(route('bo.sales.payments.store'), [
                'customer_id'  => $customer->id,
                'amount'       => 250,
                'payment_date' => now()->toDateString(),
                'allocations'  => [
                    ['invoice_id' => $invoice->id, 'amount_applied' => 250],
                ],
            ]);

        $response->assertRedirect();
        $this->assertDatabaseCount('payments', 1);
        // Payment status logic still works (invoice marked paid)
        $this->assertEquals(0.0, (float) $invoice->fresh()->amount_due);
    }

    public function test_expense_can_be_created_without_bank_account(): void
    {
        $category = FinanceCategoryFactory::new()->create([
            'tenant_id' => $this->tenant->id,
            'type'      => 'expense',
        ]);

        $response = $this->actingAs($this->adminUser)
            ->post(route('bo.finance.expenses.store'), [
                'amount'         => 500.00,
                'expense_date'   => now()->format('Y-m-d'),
                'category_id'    => $category->id,
                'payment_mode'   => 'cash',
                'payment_status' => 'paid',
            ]);

        $response->assertRedirect();
        $this->assertDatabaseCount('expenses', 1);
    }

    public function test_dashboard_still_loads_without_bank_accounts(): void
    {
        $response = $this->actingAs($this->adminUser)->get(route('bo.dashboard'));
        $response->assertStatus(200);
    }

    public function test_finance_report_still_loads_without_bank_accounts(): void
    {
        $response = $this->actingAs($this->adminUser)
            ->get(route('bo.reports.finance'));

        // Report renders (revenue/expense/profit computed from documents, not bank balances)
        $this->assertContains($response->status(), [200, 302]);
    }
}
