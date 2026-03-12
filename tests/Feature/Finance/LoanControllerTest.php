<?php

namespace Tests\Feature\Finance;

use Database\Factories\LoanFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\URL;
use Tests\TestCase;

class LoanControllerTest extends TestCase
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

    public function test_index_lists_loans(): void
    {
        $response = $this->actingAs($this->adminUser)
            ->get(route('bo.finance.loans.index'));

        $response->assertStatus(200);
    }

    public function test_create_shows_form(): void
    {
        $response = $this->actingAs($this->adminUser)
            ->get(route('bo.finance.loans.create'));

        $response->assertStatus(200);
    }

    public function test_show_displays_loan(): void
    {
        $loan = LoanFactory::new()->create([
            'tenant_id' => $this->tenant->id,
        ]);

        $response = $this->actingAs($this->adminUser)
            ->get(route('bo.finance.loans.show', $loan));

        $response->assertStatus(200);
    }

    public function test_destroy_deletes_loan(): void
    {
        $loan = LoanFactory::new()->create([
            'tenant_id' => $this->tenant->id,
        ]);

        $response = $this->actingAs($this->adminUser)
            ->delete(route('bo.finance.loans.destroy', $loan));

        $response->assertRedirect();
    }
}
