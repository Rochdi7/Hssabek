<?php

namespace Tests\Feature\Finance;

use Database\Factories\BankAccountFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\URL;
use Tests\TestCase;

class BankAccountControllerTest extends TestCase
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
