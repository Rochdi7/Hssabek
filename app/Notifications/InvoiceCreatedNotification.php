<?php

namespace App\Notifications;

use App\Models\Sales\Invoice;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class InvoiceCreatedNotification extends Notification
{
    use Queueable;

    public function __construct(
        public readonly Invoice $invoice,
    ) {}

    public function via(mixed $notifiable): array
    {
        return ['database'];
    }

    public function toArray(mixed $notifiable): array
    {
        return [
            'title'      => 'Nouvelle facture créée',
            'message'    => 'Facture n° ' . $this->invoice->number . ' créée pour ' . number_format($this->invoice->total, 2, ',', ' '),
            'invoice_id' => $this->invoice->id,
            'number'     => $this->invoice->number,
            'total'      => $this->invoice->total,
        ];
    }
}
