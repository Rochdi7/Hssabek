<?php

namespace Tests\Feature\Sales;

use App\Models\CRM\Customer;
use App\Models\Sales\Quote;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class QuoteControllerTest extends TestCase
{
    use RefreshDatabase;

    private $tenant;
    private $adminUser;

    protected function setUp(): void
    {
        parent::setUp();
        ['tenant' => $this->tenant, 'user' => $this->adminUser] = $this->createTenantWithAdmin();
    }

    public function test_index_lists_quotes(): void
    {
        $response = $this->actingAs($this->adminUser)
            ->get(route('bo.sales.quotes.index'));

        $response->assertStatus(200);
    }

    public function test_create_shows_form(): void
    {
        $response = $this->actingAs($this->adminUser)
            ->get(route('bo.sales.quotes.create'));

        $response->assertStatus(200);
    }

    public function test_attachment_pages_load(): void
    {
        $indexResponse = $this->actingAs($this->adminUser)
            ->get(route('bo.sales.attachments.index'));

        $indexResponse->assertStatus(200);

        $createResponse = $this->actingAs($this->adminUser)
            ->get(route('bo.sales.attachments.create'));

        $createResponse->assertStatus(200);
    }

    public function test_store_creates_quote(): void
    {
        $customer = Customer::factory()->create([
            'tenant_id' => $this->tenant->id,
        ]);

        $response = $this->actingAs($this->adminUser)
            ->post(route('bo.sales.quotes.store'), [
                'customer_id' => $customer->id,
                'issue_date' => now()->toDateString(),
                'expiry_date' => now()->addDays(30)->toDateString(),
                'items' => [
                    [
                        'label' => 'Prestation de service',
                        'quantity' => 1,
                        'unit_price' => 100,
                    ],
                ],
            ]);

        $response->assertRedirect(route('bo.sales.quotes.index'));
        $this->assertDatabaseCount('quotes', 1);
    }

    public function test_show_displays_quote(): void
    {
        $quote = Quote::factory()->create([
            'tenant_id' => $this->tenant->id,
            'customer_id' => Customer::factory()->create(['tenant_id' => $this->tenant->id])->id,
        ]);

        $response = $this->actingAs($this->adminUser)
            ->get(route('bo.sales.quotes.show', $quote));

        $response->assertStatus(200);
    }

    public function test_destroy_soft_deletes_quote(): void
    {
        $quote = Quote::factory()->create([
            'tenant_id' => $this->tenant->id,
            'customer_id' => Customer::factory()->create(['tenant_id' => $this->tenant->id])->id,
        ]);

        $response = $this->actingAs($this->adminUser)
            ->delete(route('bo.sales.quotes.destroy', $quote));

        $response->assertRedirect(route('bo.sales.quotes.index'));
        $this->assertSoftDeleted('quotes', ['id' => $quote->id]);
    }

    public function test_store_creates_attachment_document(): void
    {
        $customer = Customer::factory()->create([
            'tenant_id' => $this->tenant->id,
        ]);

        $response = $this->actingAs($this->adminUser)
            ->post(route('bo.sales.attachments.store'), [
                'customer_id' => $customer->id,
                'issue_date' => now()->toDateString(),
                'expiry_date' => now()->addDays(30)->toDateString(),
                'items' => [
                    [
                        'label' => 'Attachement test',
                        'quantity' => 1,
                        'unit_price' => 250,
                    ],
                ],
            ]);

        $response->assertRedirect(route('bo.sales.attachments.index'));
        $this->assertDatabaseHas('quotes', [
            'customer_id' => $customer->id,
            'document_type' => 'attachment',
        ]);
    }

    public function test_quotes_index_excludes_attachment_documents(): void
    {
        $customer = Customer::factory()->create([
            'tenant_id' => $this->tenant->id,
        ]);

        Quote::factory()->create([
            'tenant_id' => $this->tenant->id,
            'customer_id' => $customer->id,
            'number' => 'QUO-VISIBLE-001',
            'document_type' => 'quote',
        ]);

        $attachment = Quote::factory()->create([
            'tenant_id' => $this->tenant->id,
            'customer_id' => $customer->id,
            'number' => 'ATT-HIDDEN-001',
            'document_type' => 'attachment',
        ]);

        $quoteIndexResponse = $this->actingAs($this->adminUser)
            ->get(route('bo.sales.quotes.index'));

        $quoteIndexResponse->assertSee('QUO-VISIBLE-001');
        $quoteIndexResponse->assertDontSee('ATT-HIDDEN-001');

        $attachmentIndexResponse = $this->actingAs($this->adminUser)
            ->get(route('bo.sales.attachments.show', $attachment));

        $attachmentIndexResponse->assertStatus(200);
        $attachmentIndexResponse->assertSee('ATT-HIDDEN-001');
    }
}
