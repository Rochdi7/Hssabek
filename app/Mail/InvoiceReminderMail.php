<?php

namespace App\Mail;

use App\Models\Sales\Invoice;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class InvoiceReminderMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public readonly Invoice $invoice,
        public readonly string $tenantName,
        public readonly string $currency = 'MAD',
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Rappel — Facture ' . $this->invoice->number . ' en attente de paiement',
        );
    }

    public function content(): Content
    {
        $daysOverdue = $this->invoice->due_date
            ? max(0, now()->diffInDays($this->invoice->due_date, false) * -1)
            : 0;

        return new Content(
            view: 'emails.invoice-reminder',
            with: [
                'invoice'      => $this->invoice,
                'tenantName'   => $this->tenantName,
                'currency'     => $this->currency,
                'daysOverdue'  => (int) $daysOverdue,
            ],
        );
    }
}
