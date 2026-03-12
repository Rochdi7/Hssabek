<?php

namespace App\Notifications;

use App\Models\Sales\Payment;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PaymentReceivedNotification extends Notification
{
    use Queueable;

    public function __construct(
        public readonly Payment $payment,
    ) {}

    public function via(mixed $notifiable): array
    {
        return ['database', 'mail'];
    }

    public function toMail(mixed $notifiable): MailMessage
    {
        $currency = $this->payment->currency ?? 'MAD';

        return (new MailMessage)
            ->subject('Paiement reçu — ' . number_format($this->payment->amount, 2, ',', ' ') . ' ' . $currency)
            ->greeting('Bonjour,')
            ->line('Un paiement de ' . number_format($this->payment->amount, 2, ',', ' ') . ' ' . $currency . ' a été reçu.')
            ->line('Référence : ' . ($this->payment->reference_number ?? '—'))
            ->line('Date : ' . $this->payment->payment_date?->format('d/m/Y'))
            ->line('Merci pour votre paiement.')
            ->salutation('Cordialement');
    }

    public function toArray(mixed $notifiable): array
    {
        return [
            'title' => 'Paiement reçu',
            'message' => 'Paiement de ' . number_format($this->payment->amount, 2, ',', ' ') . ' reçu.',
            'payment_id' => $this->payment->id,
            'amount' => $this->payment->amount,
            'date' => $this->payment->payment_date?->toDateString(),
        ];
    }
}
