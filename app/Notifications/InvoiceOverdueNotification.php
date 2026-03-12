<?php

namespace App\Notifications;

use App\Models\Sales\Invoice;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class InvoiceOverdueNotification extends Notification
{
    use Queueable;

    public function __construct(
        public readonly Invoice $invoice,
        public readonly int $daysOverdue,
    ) {}

    public function via(mixed $notifiable): array
    {
        return ['database', 'mail'];
    }

    public function toMail(mixed $notifiable): MailMessage
    {
        $currency = $this->invoice->currency ?? 'MAD';

        return (new MailMessage)
            ->subject('Facture en retard — ' . $this->invoice->number)
            ->greeting('Bonjour,')
            ->line('La facture n° ' . $this->invoice->number . ' est en retard de ' . $this->daysOverdue . ' jour(s).')
            ->line('Montant dû : ' . number_format($this->invoice->amount_due, 2, ',', ' ') . ' ' . $currency)
            ->line('Date d\'échéance : ' . $this->invoice->due_date?->format('d/m/Y'))
            ->line('Merci de bien vouloir procéder au règlement dans les meilleurs délais.')
            ->salutation('Cordialement');
    }

    public function toArray(mixed $notifiable): array
    {
        return [
            'title' => 'Facture en retard',
            'message' => 'La facture ' . $this->invoice->number . ' est en retard de ' . $this->daysOverdue . ' jour(s).',
            'invoice_id' => $this->invoice->id,
            'invoice_number' => $this->invoice->number,
            'amount_due' => $this->invoice->amount_due,
            'days_overdue' => $this->daysOverdue,
        ];
    }
}
