<?php

namespace App\Notifications;

use App\Models\Sales\CreditNote;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class CreditNoteIssuedNotification extends Notification
{
    use Queueable;

    public function __construct(
        public readonly CreditNote $creditNote,
    ) {}

    public function via(mixed $notifiable): array
    {
        return ['database'];
    }

    public function toArray(mixed $notifiable): array
    {
        return [
            'title' => 'Avoir émis',
            'message' => 'L\'avoir n° ' . $this->creditNote->number . ' de ' . number_format($this->creditNote->total, 2, ',', ' ') . ' a été émis.',
            'credit_note_id' => $this->creditNote->id,
            'credit_note_number' => $this->creditNote->number,
            'amount' => $this->creditNote->total,
            'invoice_id' => $this->creditNote->invoice_id,
        ];
    }
}
