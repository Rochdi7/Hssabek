<?php

namespace App\Mail;

use App\Models\Sales\Invoice;
use App\Models\Sales\Payment;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PaymentReceivedMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public readonly Payment $payment,
        public readonly string $tenantName,
        public readonly string $currency = 'MAD',
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Paiement reçu — ' . $this->tenantName,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.payment-received',
            with: [
                'payment'    => $this->payment,
                'tenantName' => $this->tenantName,
                'currency'   => $this->currency,
            ],
        );
    }
}
