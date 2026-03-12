<?php

namespace Tests\Feature\Finance;

use Database\Factories\ExpenseFactory;
use Database\Factories\FinanceCategoryFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\URL;
use Tests\TestCase;

class ExpenseControllerTest extends TestCase
{
    use RefreshDatabase;

    private $tenant;
    private $adminUser;

    protected function setUp(): void
    {
        parent::setUp();
        ['tenant' => $this->tenant, 'user' => $this->adminUser] = $this->createTenantWithAdmin();
        $domain = $this->tenant->domains()->where('is_primary', true)->value('domain');
        URL::forceRootUrl('http://' . $domain);
    }

    public function test_index_lists_expenses(): void
    {
        $response = $this->actingAs($this->adminUser)
            ->get(route('bo.finance.expenses.index'));

        $response->assertStatus(200);
    }

    public function test_create_shows_form(): void
    {
        $response = $this->actingAs($this->adminUser)
            ->get(route('bo.finance.expenses.create'));

        $response->assertStatus(200);
    }

    public function test_store_creates_expense(): void
    {
        $category = FinanceCategoryFactory::new()->create([
            'tenant_id' => $this->tenant->id,
            'type' => 'expense',
        ]);

        $response = $this->actingAs($this->adminUser)
            ->post(route('bo.finance.expenses.store'), [
                'expense_number' => 'EXP-000001',
                'amount' => 500.00,
                'expense_date' => now()->format('Y-m-d'),
                'category_id' => $category->id,
                'payment_mode' => 'cash',
                'payment_status' => 'paid',
            ]);

        $response->assertRedirect();
    }

    public function test_destroy_deletes_expense(): void
    {
        $category = FinanceCategoryFactory::new()->create([
            'tenant_id' => $this->tenant->id,
            'type' => 'expense',
        ]);

        $expense = ExpenseFactory::new()->create([
            'tenant_id' => $this->tenant->id,
            'category_id' => $category->id,
        ]);

        $response = $this->actingAs($this->adminUser)
            ->delete(route('bo.finance.expenses.destroy', $expense));

        $response->assertRedirect();
    }
}
