<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public readonly array $data,
    ) {}

    public function envelope(): Envelope
    {
        $subjects = [
            'question'    => 'Question générale',
            'support'     => 'Support technique',
            'billing'     => 'Facturation & Abonnement',
            'partnership' => 'Partenariat',
            'other'       => 'Autre',
        ];

        return new Envelope(
            subject: 'Nouveau message de contact — ' . ($subjects[$this->data['subject']] ?? $this->data['subject']),
            replyTo: [$this->data['email']],
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.contact-form',
            with: ['contactData' => $this->data],
        );
    }
}
