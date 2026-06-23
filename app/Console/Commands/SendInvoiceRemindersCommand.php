<?php

namespace App\Console\Commands;

use App\Models\Pro\InvoiceReminder;
use App\Models\Sales\Invoice;
use App\Models\System\EmailLog;
use App\Models\Tenancy\Tenant;
use App\Notifications\InvoiceReminderNotification;
use App\Services\Tenancy\TenantContext;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;

class SendInvoiceRemindersCommand extends Command
{
    protected $signature = 'invoice:send-reminders';

    protected $description = 'Envoie les rappels de paiement programmés pour les factures impayées';

    public function handle(): int
    {
        $this->info('Recherche des rappels à envoyer...');

        // Process queued reminders (manually scheduled)
        $this->processQueuedReminders();

        // Process automatic reminders based on due dates
        $this->processAutomaticReminders();

        return self::SUCCESS;
    }

    /**
     * Process manually queued reminders
     */
    protected function processQueuedReminders(): void
    {
        $reminders = InvoiceReminder::where('status', 'queued')
            ->where('scheduled_at', '<=', now())
            ->with(['invoice.customer', 'tenant'])
            ->get();

        if ($reminders->isEmpty()) {
            $this->info('Aucun rappel manuel à envoyer.');
            return;
        }

        $sent = 0;
        $errors = 0;

        foreach ($reminders as $reminder) {
            try {
                $invoice = $reminder->invoice;

                // Skip if invoice is already settled (paid) or cancelled (void)
                if (!$invoice || in_array($invoice->normalizedStatus(), ['paid', 'void'])) {
                    $reminder->update(['status' => 'failed', 'error' => 'Facture déjà réglée ou annulée.', 'sent_at' => now()]);
                    continue;
                }

                $tenant = Tenant::find($invoice->tenant_id);
                if (!$tenant) {
                    $reminder->update(['status' => 'failed', 'error' => 'Tenant non trouvé.']);
                    $errors++;
                    continue;
                }

                TenantContext::set($tenant);

                $this->sendReminder($reminder, $invoice, $tenant);
                $sent++;
            } catch (\Throwable $e) {
                $errors++;
                $reminder->update([
                    'status' => 'failed',
                    'error'  => $e->getMessage(),
                ]);
                Log::error("InvoiceReminder {$reminder->id}: erreur d'envoi", [
                    'error' => $e->getMessage(),
                ]);
                $this->error("Erreur rappel {$reminder->id}: {$e->getMessage()}");
            }
        }

        $this->info("Rappels manuels : {$sent} envoyé(s), {$errors} erreur(s).");
    }

    /**
     * Process automatic reminders based on invoice settings
     */
    protected function processAutomaticReminders(): void
    {
        $this->info('Vérification des rappels automatiques...');

        $tenants = Tenant::whereHas('settings')->with('settings')->get();
        $totalSent = 0;

        foreach ($tenants as $tenant) {
            TenantContext::set($tenant);

            $reminderSettings = $tenant->settings->reminder_settings ?? null;

            if (!$reminderSettings || !($reminderSettings['enabled'] ?? false)) {
                continue;
            }

            $sentCount = $this->processAutoRemindersForTenant($tenant, $reminderSettings);
            $totalSent += $sentCount;
        }

        $this->info("Rappels automatiques : {$totalSent} envoyé(s).");
    }

    /**
     * Process automatic reminders for a specific tenant
     */
    protected function processAutoRemindersForTenant(Tenant $tenant, array $settings): int
    {
        $sentCount = 0;

        // Get unpaid invoices
        $invoices = Invoice::where('tenant_id', $tenant->id)
            ->whereIn('status', ['unpaid', 'sent', 'partial', 'overdue'])
            ->where('amount_due', '>', 0)
            ->whereNotNull('due_date')
            ->with('customer')
            ->get();

        foreach ($invoices as $invoice) {
            if (!$invoice->customer?->email) {
                continue;
            }

            $daysFromDue = now()->startOfDay()->diffInDays($invoice->due_date->startOfDay(), false);

            // Before due date reminders
            if (isset($settings['before_due_days']) && $settings['before_due_days'] > 0) {
                if ($daysFromDue == $settings['before_due_days']) {
                    if ($this->sendAutoReminder($invoice, $tenant, 'before_due', $settings)) {
                        $sentCount++;
                    }
                }
            }

            // On due date reminder
            if (isset($settings['on_due']) && $settings['on_due'] === true) {
                if ($daysFromDue == 0) {
                    if ($this->sendAutoReminder($invoice, $tenant, 'on_due', $settings)) {
                        $sentCount++;
                    }
                }
            }

            // After due date reminders
            if (isset($settings['after_due_days']) && $settings['after_due_days'] > 0) {
                if ($daysFromDue == -$settings['after_due_days']) {
                    if ($this->sendAutoReminder($invoice, $tenant, 'after_due', $settings)) {
                        $sentCount++;
                    }
                }
            }
        }

        return $sentCount;
    }

    /**
     * Send a manual reminder
     */
    protected function sendReminder(InvoiceReminder $reminder, Invoice $invoice, Tenant $tenant): void
    {
        $customer = $invoice->customer;

        if (!$customer?->email) {
            $reminder->update([
                'status' => 'failed',
                'error'  => 'Client sans adresse email.',
            ]);
            return;
        }

        // Generate PDF
        $pdfPath = null;
        $tenantSettings = $tenant->settings;
        try {
            $pdfContent = Pdf::loadView('pdf.templates.free.invoice.model-1', [
                'invoice'  => $invoice->load(['items.product', 'items.unit', 'items.taxGroup', 'charges']),
                'settings' => $tenantSettings,
                'tenant'   => $tenant,
                'currency' => $tenant->default_currency ?? 'MAD',
            ])->setPaper('a4', 'portrait')->output();

            $pdfPath = sys_get_temp_dir() . '/facture-' . $invoice->number . '-' . uniqid() . '.pdf';
            file_put_contents($pdfPath, $pdfContent);
        } catch (\Throwable $e) {
            Log::warning("Failed to generate PDF for reminder: {$e->getMessage()}");
        }

        // Send to customer via email
        if ($reminder->channel === 'email') {
            Notification::route('mail', $customer->email)
                ->notify(new InvoiceReminderNotification($invoice, $tenant, $reminder->type, $pdfPath));

            // Log the email
            EmailLog::create([
                'tenant_id'  => $invoice->tenant_id,
                'to'         => $customer->email,
                'subject'    => "Rappel — Facture {$invoice->number}",
                'type'       => 'reminder',
                'entity_id'  => $invoice->id,
                'status'     => 'sent',
                'sent_at'    => now(),
            ]);
        }

        // Also send to company/tenant owner based on settings
        $reminderSettings = $tenantSettings->reminder_settings ?? [];
        $this->notifyTenantOwner($invoice, $tenant, $reminder->type, $reminderSettings);

        // Clean up PDF
        if ($pdfPath && file_exists($pdfPath)) {
            @unlink($pdfPath);
        }

        $reminder->update([
            'status'  => 'sent',
            'sent_at' => now(),
        ]);
    }

    /**
     * Send an automatic reminder
     */
    protected function sendAutoReminder(Invoice $invoice, Tenant $tenant, string $type, array $settings): bool
    {
        // Check if we already sent a reminder today for this invoice and type
        $alreadySent = InvoiceReminder::where('invoice_id', $invoice->id)
            ->where('type', $type)
            ->whereDate('sent_at', today())
            ->exists();

        if ($alreadySent) {
            return false;
        }

        $customer = $invoice->customer;

        // Generate PDF
        $pdfPath = null;
        try {
            $tenantSettings = $tenant->settings;
            $pdfContent = Pdf::loadView('pdf.templates.free.invoice.model-1', [
                'invoice'  => $invoice->load(['items.product', 'items.unit', 'items.taxGroup', 'charges']),
                'settings' => $tenantSettings,
                'tenant'   => $tenant,
                'currency' => $tenant->default_currency ?? 'MAD',
            ])->setPaper('a4', 'portrait')->output();

            $pdfPath = sys_get_temp_dir() . '/facture-' . $invoice->number . '-' . uniqid() . '.pdf';
            file_put_contents($pdfPath, $pdfContent);
        } catch (\Throwable $e) {
            Log::warning("Failed to generate PDF for auto reminder: {$e->getMessage()}");
        }

        try {
            // Send to customer
            Notification::route('mail', $customer->email)
                ->notify(new InvoiceReminderNotification($invoice, $tenant, $type, $pdfPath));

            // Log the email
            EmailLog::create([
                'tenant_id'  => $invoice->tenant_id,
                'to'         => $customer->email,
                'subject'    => "Rappel — Facture {$invoice->number}",
                'type'       => 'reminder',
                'entity_id'  => $invoice->id,
                'status'     => 'sent',
                'sent_at'    => now(),
            ]);

            // Send notification to company based on settings
            $this->notifyTenantOwner($invoice, $tenant, $type, $settings);

            // Create reminder record for tracking
            InvoiceReminder::create([
                'tenant_id'    => $tenant->id,
                'invoice_id'   => $invoice->id,
                'type'         => $type,
                'channel'      => 'email',
                'status'       => 'sent',
                'scheduled_at' => now(),
                'sent_at'      => now(),
            ]);

            // Clean up PDF
            if ($pdfPath && file_exists($pdfPath)) {
                @unlink($pdfPath);
            }

            return true;
        } catch (\Throwable $e) {
            Log::error("Auto reminder failed for invoice {$invoice->id}: {$e->getMessage()}");

            if ($pdfPath && file_exists($pdfPath)) {
                @unlink($pdfPath);
            }

            return false;
        }
    }

    /**
     * Notify tenant owner about the reminder sent
     */
    protected function notifyTenantOwner(Invoice $invoice, Tenant $tenant, string $type, ?array $settings = null): void
    {
        try {
            // Check settings
            $notifyCompany = $settings['notify_company'] ?? true;
            $notifyCompanyEmail = $settings['notify_company_email'] ?? false;

            if (!$notifyCompany && !$notifyCompanyEmail) {
                return;
            }

            // Get tenant owner/admin
            $owner = $tenant->owner ?? $tenant->users()->whereHas('roles', function ($q) {
                $q->whereIn('name', ['owner', 'admin', 'super-admin']);
            })->first();

            if (!$owner) {
                return;
            }

            // Create notification with appropriate channels
            $notification = new InvoiceReminderNotification($invoice, $tenant, $type);

            if ($notifyCompanyEmail && $notifyCompany) {
                // Both email and system notification
                $owner->notify($notification);
            } elseif ($notifyCompany) {
                // Only system notification (database)
                $owner->notifyNow($notification, ['database']);
            } elseif ($notifyCompanyEmail) {
                // Only email notification
                $owner->notifyNow($notification, ['mail']);
            }
        } catch (\Throwable $e) {
            Log::warning("Failed to notify tenant owner: {$e->getMessage()}");
        }
    }
}
