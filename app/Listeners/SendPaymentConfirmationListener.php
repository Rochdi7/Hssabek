<?php

namespace App\Listeners;

use App\Events\PaymentReceived;
use App\Mail\PaymentReceivedMail;
use App\Models\Finance\Currency;
use App\Models\System\EmailLog;
use App\Notifications\PaymentReceivedNotification;
use App\Services\Tenancy\TenantContext;
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

            $tenant = TenantContext::get() ?? \App\Models\Tenancy\Tenant::find($payment->tenant_id);
            $tenantName = $tenant?->name ?? config('app.name');
            $currencyCode = $tenant?->default_currency ?? 'MAD';
            $currency = Currency::where('code', $currencyCode)->value('symbol') ?? $currencyCode;

            // Check notification settings
            $notifSettings = $tenant?->settings?->notification_settings ?? [];
            $sectionEnabled = $notifSettings['sales']['enabled'] ?? true;
            $emailEnabled   = $notifSettings['sales']['transactions']['email'] ?? true;
            $inAppEnabled   = $notifSettings['sales']['transactions']['in_app'] ?? false;

            if (!$sectionEnabled) {
                return;
            }

            // Send email confirmation to customer
            if ($emailEnabled) {
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
            }

            // Send in-app notification to owner/admin
            if ($inAppEnabled && $tenant) {
                $owner = $tenant->users()
                    ->whereHas('roles', fn($q) => $q->whereIn('name', ['owner', 'admin']))
                    ->first();

                if ($owner) {
                    $owner->notifyNow(new PaymentReceivedNotification($payment), ['database']);
                }
            }
        } catch (\Throwable $e) {
            Log::error('Erreur envoi confirmation paiement', [
                'payment_id' => $payment->id,
                'error'      => $e->getMessage(),
            ]);
        }
    }
}
