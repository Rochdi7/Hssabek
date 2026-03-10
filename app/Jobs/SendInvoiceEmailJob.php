<?php

namespace App\Jobs;

use App\Models\Sales\Invoice;
use App\Models\System\EmailLog;
use App\Models\Tenancy\Tenant;
use App\Notifications\InvoiceSentNotification;
use App\Services\Tenancy\TenantContext;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;

class SendInvoiceEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public int $tries = 3;
    public int $backoff = 60;

    public function __construct(
        public readonly string $invoiceId,
        public readonly string $tenantId,
    ) {}

    public function handle(): void
    {
        $tenant = Tenant::findOrFail($this->tenantId);
        TenantContext::set($tenant);

        $invoice  = Invoice::with(['customer', 'items.product', 'items.unit', 'items.taxGroup', 'charges'])->findOrFail($this->invoiceId);
        $customer = $invoice->customer;

        if (!$customer?->email) {
            EmailLog::create([
                'tenant_id'  => $this->tenantId,
                'to'         => 'N/A',
                'subject'    => 'Facture ' . $invoice->number,
                'type'       => 'invoice',
                'entity_id'  => $invoice->id,
                'status'     => 'failed',
                'error'      => 'Aucune adresse email pour ce client.',
                'created_at' => now(),
            ]);
            return;
        }

        try {
            $settings = $tenant->settings;
            $pdfContent = Pdf::loadView('pdf.templates.free.invoice.model-1', [
                'invoice'  => $invoice,
                'settings' => $settings,
                'tenant'   => $tenant,
                'currency' => $tenant->default_currency ?? 'MAD',
            ])->setPaper('a4', 'portrait')->output();

            $tempPath = sys_get_temp_dir() . '/facture-' . $invoice->number . '-' . uniqid() . '.pdf';
            file_put_contents($tempPath, $pdfContent);

            Notification::route('mail', $customer->email)
                ->notify(new InvoiceSentNotification($invoice, $tenant, $tempPath));

            @unlink($tempPath);

            EmailLog::create([
                'tenant_id'  => $this->tenantId,
                'to'         => $customer->email,
                'subject'    => 'Facture ' . $invoice->number,
                'type'       => 'invoice',
                'entity_id'  => $invoice->id,
                'status'     => 'sent',
                'sent_at'    => now(),
                'created_at' => now(),
            ]);
        } catch (\Throwable $e) {
            EmailLog::create([
                'tenant_id'  => $this->tenantId,
                'to'         => $customer->email,
                'subject'    => 'Facture ' . $invoice->number,
                'type'       => 'invoice',
                'entity_id'  => $invoice->id,
                'status'     => 'failed',
                'error'      => $e->getMessage(),
                'created_at' => now(),
            ]);
            throw $e;
        }
    }

    public function failed(\Throwable $e): void
    {
        Log::error("SendInvoiceEmailJob failed permanently for invoice {$this->invoiceId}: {$e->getMessage()}");
    }
}
