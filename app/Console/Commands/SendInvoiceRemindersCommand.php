<?php

namespace App\Console\Commands;

use App\Models\Pro\InvoiceReminder;
use App\Models\System\EmailLog;
use App\Notifications\InvoiceSentNotification;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class SendInvoiceRemindersCommand extends Command
{
    protected $signature = 'invoice:send-reminders';

    protected $description = 'Envoie les rappels de paiement programmés pour les factures impayées';

    public function handle(): int
    {
        $this->info('Recherche des rappels à envoyer...');

        $reminders = InvoiceReminder::where('status', 'queued')
            ->where('scheduled_at', '<=', now())
            ->with(['invoice.customer', 'invoice.tenant'])
            ->get();

        if ($reminders->isEmpty()) {
            $this->info('Aucun rappel à envoyer.');
            return self::SUCCESS;
        }

        $sent = 0;
        $errors = 0;

        foreach ($reminders as $reminder) {
            try {
                $invoice = $reminder->invoice;

                // Skip if invoice is already paid or cancelled
                if (!$invoice || in_array($invoice->status, ['paid', 'cancelled', 'voided'])) {
                    $reminder->update(['status' => 'sent', 'sent_at' => now()]);
                    continue;
                }

                $customer = $invoice->customer;
                if (!$customer || !$customer->email) {
                    Log::warning("InvoiceReminder {$reminder->id}: client sans email, ignoré.");
                    $reminder->update([
                        'status' => 'failed',
                        'error'  => 'Client sans adresse email.',
                    ]);
                    $errors++;
                    continue;
                }

                // Send reminder via email channel
                if ($reminder->channel === 'email') {
                    $tenant = $invoice->tenant ?? \App\Models\Tenancy\Tenant::find($invoice->tenant_id);
                    $tenantName = $tenant?->name ?? config('app.name');

                    $customer->notify(new InvoiceSentNotification(
                        invoice: $invoice,
                        pdfPath: null,
                        tenantName: $tenantName
                    ));

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

                $reminder->update([
                    'status'  => 'sent',
                    'sent_at' => now(),
                ]);

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

        $this->info("Terminé : {$sent} rappel(s) envoyé(s), {$errors} erreur(s).");

        return $errors > 0 ? self::FAILURE : self::SUCCESS;
    }
}
