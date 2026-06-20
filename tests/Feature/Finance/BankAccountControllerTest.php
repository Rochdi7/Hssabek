<?php

namespace Tests\Feature\Finance;

use Database\Factories\BankAccountFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BankAccountControllerTest extends TestCase
{
    use RefreshDatabase;

    private $tenant;
    private $adminUser;

    protected function setUp(): void
    {
        parent::setUp();
        // Bank Accounts module has been removed from the UI/workflow.
        // The model/table are retained only for historical-data safety.
        $this->markTestSkipped('Bank Accounts module removed — routes no longer registered.');
    }

    public function test_index_lists_bank_accounts(): void
    {
        $response = $this->actingAs($this->adminUser)
            ->get(route('bo.finance.bank-accounts.index'));

        $response->assertStatus(200);
    }

    public function test_create_shows_form(): void
    {
        $response = $this->actingAs($this->adminUser)
            ->get(route('bo.finance.bank-accounts.create'));

        $response->assertStatus(200);
    }

    public function test_store_creates_bank_account(): void
    {
        $response = $this->actingAs($this->adminUser)
            ->post(route('bo.finance.bank-accounts.store'), [
                'bank_name' => 'Attijariwafa Bank',
                'account_holder_name' => 'Test Holder',
                'account_number' => '123456789',
                'account_type' => 'current',
                'opening_balance' => 1000,
                'currency' => 'MAD',
            ]);

        $response->assertRedirect();
        $this->assertDatabaseHas('bank_accounts', [
            'bank_name' => 'Attijariwafa Bank',
            'account_number' => '123456789',
            'tenant_id' => $this->tenant->id,
        ]);
    }

    public function test_destroy_deletes_bank_account(): void
    {
        $bankAccount = BankAccountFactory::new()->create([
            'tenant_id' => $this->tenant->id,
        ]);

        $response = $this->actingAs($this->adminUser)
            ->delete(route('bo.finance.bank-accounts.destroy', $bankAccount));

        $response->assertRedirect();
    }
}
