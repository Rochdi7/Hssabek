<?php

namespace App\Notifications;

use App\Models\Billing\Subscription;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SubscriptionExpiringNotification extends Notification
{
    use Queueable;

    public function __construct(
        public readonly Subscription $subscription,
        public readonly int $daysRemaining,
    ) {}

    public function via(mixed $notifiable): array
    {
        return ['database', 'mail'];
    }

    public function toMail(mixed $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Votre abonnement expire bientôt')
            ->greeting('Bonjour,')
            ->line('Votre abonnement au plan « ' . ($this->subscription->plan->name ?? '—') . ' » expire dans ' . $this->daysRemaining . ' jour(s).')
            ->line('Date d\'expiration : ' . $this->subscription->ends_at?->format('d/m/Y'))
            ->line('Renouvelez votre abonnement pour continuer à profiter de toutes les fonctionnalités.')
            ->salutation('Cordialement');
    }

    public function toArray(mixed $notifiable): array
    {
        return [
            'title' => 'Abonnement expirant',
            'message' => 'Votre abonnement expire dans ' . $this->daysRemaining . ' jour(s).',
            'subscription_id' => $this->subscription->id,
            'plan_name' => $this->subscription->plan->name ?? '—',
            'ends_at' => $this->subscription->ends_at?->toDateString(),
            'days_remaining' => $this->daysRemaining,
        ];
    }
}
