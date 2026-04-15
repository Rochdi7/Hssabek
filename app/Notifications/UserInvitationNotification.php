<?php

namespace App\Notifications;

use App\Models\System\UserInvitation;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserInvitationNotification extends Notification
{
    use Queueable;

    public function __construct(
        public readonly UserInvitation $invitation,
        public readonly ?string $generatedPassword = null
    ) {}

    public function via(mixed $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(mixed $notifiable): MailMessage
    {
        $tenantName = $this->invitation->tenant->name ?? 'notre organisation';

        // If a generated password is provided, send credentials email
        if ($this->generatedPassword) {
            return (new MailMessage)
                ->subject("Vos identifiants de connexion — {$tenantName}")
                ->greeting('Bonjour,')
                ->line("Votre compte a été créé sur **{$tenantName}**.")
                ->line('Voici vos identifiants de connexion :')
                ->line("**E-mail :** {$this->invitation->email}")
                ->line("**Mot de passe :** {$this->generatedPassword}")
                ->action('Se connecter', url('/backoffice/login'))
                ->line('Nous vous recommandons de changer votre mot de passe après votre première connexion.')
                ->salutation('Cordialement');
        }

        // Otherwise, send the standard invitation link
        $url = route('bo.invitation.accept', $this->invitation->token);

        return (new MailMessage)
            ->subject("Invitation à rejoindre {$tenantName}")
            ->greeting('Bonjour,')
            ->line("Vous avez été invité(e) à rejoindre **{$tenantName}**.")
            ->line("Cliquez sur le bouton ci-dessous pour créer votre compte et accepter l'invitation.")
            ->action("Accepter l'invitation", $url)
            ->line('Ce lien expire dans 7 jours.')
            ->salutation('Cordialement');
    }
}
