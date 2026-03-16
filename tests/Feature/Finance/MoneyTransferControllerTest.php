<?php

namespace Tests\Feature\Finance;

use App\Models\Finance\BankAccount;
use App\Models\Tenancy\Tenant;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MoneyTransferControllerTest extends TestCase
{
    use RefreshDatabase;

    private Tenant $tenant;
    private User $adminUser;

    protected function setUp(): void
    {
        parent::setUp();

        ['tenant' => $this->tenant, 'user' => $this->adminUser] = $this->createTenantWithAdmin();
    }

    private function payload(BankAccount $from, BankAccount $to, float $amount): array
    {
        return [
            'from_bank_account_id' => $from->id,
            'to_bank_account_id' => $to->id,
            'amount' => $amount,
            'transfer_date' => now()->toDateString(),
            'reference_number' => 'TR-' . now()->timestamp,
            'notes' => 'Test transfer',
        ];
    }

    public function test_transfer_fails_when_source_balance_is_insufficient(): void
    {
        $from = BankAccount::factory()->create(['current_balance' => 100, 'opening_balance' => 100]);
        $to = BankAccount::factory()->create(['current_balance' => 50, 'opening_balance' => 50]);

        $response = $this->actingAs($this->adminUser)
            ->from(route('bo.finance.money-transfers.create'))
            ->post(route('bo.finance.money-transfers.store'), $this->payload($from, $to, 150));

        $response->assertRedirect(route('bo.finance.money-transfers.create'));
        $response->assertSessionHasErrors('amount');

        $from->refresh();
        $to->refresh();
        $this->assertSame(100.0, (float) $from->current_balance);
        $this->assertSame(50.0, (float) $to->current_balance);
        $this->assertDatabaseCount('money_transfers', 0);
    }

    public function test_transfer_succeeds_with_exact_available_balance(): void
    {
        $from = BankAccount::factory()->create(['current_balance' => 100, 'opening_balance' => 100]);
        $to = BankAccount::factory()->create(['current_balance' => 25, 'opening_balance' => 25]);

        $response = $this->actingAs($this->adminUser)
            ->post(route('bo.finance.money-transfers.store'), $this->payload($from, $to, 100));

        $response->assertRedirect();
        $response->assertSessionHas('success');

        $from->refresh();
        $to->refresh();
        $this->assertSame(0.0, (float) $from->current_balance);
        $this->assertSame(125.0, (float) $to->current_balance);
        $this->assertDatabaseCount('money_transfers', 1);
    }

    public function test_transfer_succeeds_for_normal_valid_amount(): void
    {
        $from = BankAccount::factory()->create(['current_balance' => 100, 'opening_balance' => 100]);
        $to = BankAccount::factory()->create(['current_balance' => 10, 'opening_balance' => 10]);

        $response = $this->actingAs($this->adminUser)
            ->post(route('bo.finance.money-transfers.store'), $this->payload($from, $to, 40));

        $response->assertRedirect();
        $response->assertSessionHas('success');

        $from->refresh();
        $to->refresh();
        $this->assertSame(60.0, (float) $from->current_balance);
        $this->assertSame(50.0, (float) $to->current_balance);
        $this->assertDatabaseCount('money_transfers', 1);
    }
}

