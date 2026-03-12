<?php

namespace App\Listeners;

use App\Events\PaymentReceived;
use App\Mail\PaymentReceivedMail;
use App\Models\System\EmailLog;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendPaymentConfirmationListener
{
    public function handle(PaymentReceived $event): void
    {
        $payment = $event->payment;

        try {
            $customer = $payment->customer;
            if (!$customer || !$customer->email) {
                return;
            }

            $tenant = $payment->tenant ?? \App\Models\Tenancy\Tenant::find($payment->tenant_id);
            $tenantName = $tenant?->name ?? config('app.name');
            $currency = $tenant?->default_currency ?? 'MAD';

            Mail::to($customer->email)->send(
                new PaymentReceivedMail($payment, $tenantName, $currency)
            );

            EmailLog::create([
                'tenant_id' => $payment->tenant_id,
                'to'        => $customer->email,
                'subject'   => "Paiement reçu — {$tenantName}",
                'type'      => 'payment_receipt',
                'entity_id' => $payment->id,
                'status'    => 'sent',
                'sent_at'   => now(),
            ]);
        } catch (\Throwable $e) {
            Log::error('Erreur envoi confirmation paiement', [
                'payment_id' => $payment->id,
                'error'      => $e->getMessage(),
            ]);
        }
    }
}
