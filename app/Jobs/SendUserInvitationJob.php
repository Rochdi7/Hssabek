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
        public readonly UserInvitation $invitation
    ) {}

    public function handle(): void
    {
        // Set tenant context for any model queries inside the notification
        TenantContext::set($this->invitation->tenant);

        Notification::route('mail', $this->invitation->email)
            ->notify(new UserInvitationNotification($this->invitation));
    }
}
