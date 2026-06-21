<?php

namespace Tests\Feature\Support;

use App\Models\Support\SupportTicket;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class SupportTicketSecurityTest extends TestCase
{
    use RefreshDatabase;

    private $tenant;
    private User $adminUser;
    private User $userA;
    private User $userB;

    protected function setUp(): void
    {
        parent::setUp();

        ['tenant' => $this->tenant, 'user' => $this->adminUser] = $this->createTenantWithAdmin();

        $this->userA = User::factory()->create([
            'tenant_id' => $this->tenant->id,
            'status' => 'active',
        ]);

        $this->userB = User::factory()->create([
            'tenant_id' => $this->tenant->id,
            'status' => 'active',
        ]);

        Storage::fake('local');
        Storage::fake('public');
    }

    public function test_support_ticket_attachments_are_stored_on_private_local_disk(): void
    {
        $response = $this->actingAs($this->userA)
            ->post(route('bo.support.tickets.store'), [
                'subject' => 'Attachment test',
                'description' => 'Attachment should stay private.',
                'category' => 'bug',
                'priority' => 'medium',
                'attachments' => [UploadedFile::fake()->image('proof.png', 80, 80)],
            ]);

        $response->assertRedirect(route('bo.support.tickets.index'));

        $ticket = SupportTicket::query()->where('subject', 'Attachment test')->firstOrFail();
        $media = $ticket->getFirstMedia('attachments');

        $this->assertNotNull($media);
        $this->assertSame('local', $media->disk);
        $this->assertSame('proof.png', $media->getCustomProperty('original_name'));
    }

    public function test_non_admin_user_cannot_view_another_users_ticket(): void
    {
        $this->actingAs($this->userA)
            ->post(route('bo.support.tickets.store'), [
                'subject' => 'Private ticket',
                'description' => 'Only the owner should see this ticket.',
                'category' => 'account',
                'priority' => 'low',
            ])
            ->assertRedirect(route('bo.support.tickets.index'));

        $ticket = SupportTicket::query()->where('subject', 'Private ticket')->firstOrFail();

        $this->actingAs($this->userB)
            ->get(route('bo.support.tickets.show', $ticket))
            ->assertForbidden();
    }

    public function test_ticket_owner_can_download_private_attachment_through_secure_route(): void
    {
        $this->actingAs($this->userA)
            ->post(route('bo.support.tickets.store'), [
                'subject' => 'Downloadable ticket',
                'description' => 'Attachment should download through the controller route.',
                'category' => 'billing',
                'priority' => 'high',
                'attachments' => [UploadedFile::fake()->image('invoice.png', 120, 120)],
            ])
            ->assertRedirect(route('bo.support.tickets.index'));

        $ticket = SupportTicket::query()->where('subject', 'Downloadable ticket')->firstOrFail();
        $media = $ticket->getFirstMedia('attachments');

        $response = $this->actingAs($this->userA)
            ->get(route('bo.support.tickets.attachments.show', [
                'ticket' => $ticket,
                'media' => $media,
                'download' => 1,
            ]));

        $response->assertOk();
        $this->assertStringContainsString('attachment;', (string) $response->headers->get('content-disposition'));
    }

    public function test_support_ticket_rejects_malicious_attachment_uploads(): void
    {
        $response = $this->actingAs($this->userA)
            ->from(route('bo.support.tickets.create'))
            ->post(route('bo.support.tickets.store'), [
                'subject' => 'Malicious upload',
                'description' => 'This should fail validation.',
                'category' => 'bug',
                'priority' => 'urgent',
                'attachments' => [UploadedFile::fake()->createWithContent('shell.php', '<?php echo 1;')],
            ]);

        $response->assertRedirect(route('bo.support.tickets.create'));
        $response->assertSessionHasErrors(['attachments.0']);
        $this->assertDatabaseMissing('support_tickets', ['subject' => 'Malicious upload']);
    }
}
