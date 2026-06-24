<?php

namespace App\Listeners;

use App\Events\InvoiceCreated;
use App\Services\Tenancy\TenantContext;
use Illuminate\Support\Facades\Log;

class LogInvoiceCreatedActivity
{
    public function handle(InvoiceCreated $event): void
    {
        $invoice = $event->invoice;

        Log::info('Facture créée', [
            'invoice_id'     => $invoice->id,
            'invoice_number' => $invoice->number,
            'tenant_id'      => $invoice->tenant_id,
            'customer_id'    => $invoice->customer_id,
            'total'          => $invoice->total,
        ]);

        // Dispatch in-app notification if the setting is enabled.
        try {
            $tenant = TenantContext::get() ?? $invoice->tenant;
            if (!$tenant) {
                return;
            }

            $notifSettings = $tenant->settings?->notification_settings ?? [];
            $sectionEnabled = $notifSettings['invoices']['enabled'] ?? true;
            $inApp = $notifSettings['invoices']['new_invoice']['in_app'] ?? false;

            if (!$sectionEnabled || !$inApp) {
                return;
            }

            $owner = $tenant->users()
                ->whereHas('roles', fn($q) => $q->whereIn('name', ['owner', 'admin']))
                ->first();

            if ($owner) {
                $owner->notifyNow(new \App\Notifications\InvoiceCreatedNotification($invoice), ['database']);
            }
        } catch (\Throwable $e) {
            Log::warning('LogInvoiceCreatedActivity: notification error', ['error' => $e->getMessage()]);
        }
    }
}
