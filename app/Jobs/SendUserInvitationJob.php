<?php

namespace App\Jobs;

use App\Models\System\UserInvitation;
use App\Notifications\UserInvitationNotification;
use App\Services\Tenancy\TenantContext;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Notification;

class SendUserInvitationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(
        public readonly UserInvitation $invitation,
        public readonly ?string $generatedPassword = null
    ) {}

    public function handle(): void
    {
        // Set tenant context for any model queries inside the notification
        TenantContext::set($this->invitation->tenant);

        try {
            Notification::route('mail', $this->invitation->email)
                ->notify(new UserInvitationNotification($this->invitation, $this->generatedPassword));

            $this->invitation->markMailSent();
        } catch (\Throwable $e) {
            // Record the failure but do NOT re-throw: with QUEUE_CONNECTION=sync this
            // runs inline during the web request, and re-throwing would 500 the page
            // instead of letting the controller redirect to the "failed" state.
            $this->invitation->markMailFailed($e->getMessage());

            \Illuminate\Support\Facades\Log::error('Échec envoi invitation utilisateur', [
                'invitation_id' => $this->invitation->id,
                'email' => $this->invitation->email,
                'error' => $e->getMessage(),
            ]);
        }
    }

    public function failed(\Throwable $exception): void
    {
        $this->invitation->markMailFailed($exception->getMessage());
    }
}
