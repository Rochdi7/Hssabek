<?php

namespace App\Console\Commands;

use App\Models\Pro\RecurringInvoice;
use App\Models\Sales\Invoice;
use App\Models\Sales\InvoiceItem;
use App\Models\Sales\InvoiceCharge;
use App\Services\System\DocumentNumberService;
use App\Traits\SetsTenantContext;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class GenerateRecurringInvoicesCommand extends Command
{
    protected $signature = 'invoice:generate-recurring';

    protected $description = 'Génère les factures à partir des modèles récurrents actifs';

    public function handle(DocumentNumberService $docService): int
    {
        $this->info('Recherche des factures récurrentes à générer...');

        $recurring = RecurringInvoice::where('status', 'active')
            ->where('next_run_at', '<=', now())
            ->with(['templateInvoice.items', 'templateInvoice.charges', 'customer'])
            ->get();

        if ($recurring->isEmpty()) {
            $this->info('Aucune facture récurrente à générer.');
            return self::SUCCESS;
        }

        $generated = 0;
        $errors = 0;

        foreach ($recurring as $rec) {
            try {
                if (!$rec->templateInvoice) {
                    Log::warning("RecurringInvoice {$rec->id}: template invoice manquante, ignorée.");
                    continue;
                }

                DB::transaction(function () use ($rec, $docService, &$generated) {
                    // Set tenant context for DocumentNumberService
                    app(\App\Services\Tenancy\TenantContext::class)->set(
                        $rec->tenant_id,
                        \App\Models\Tenancy\Tenant::find($rec->tenant_id)
                    );

                    $template = $rec->templateInvoice;

                    // Create new invoice from template
                    $invoice = Invoice::create([
                        'tenant_id'           => $rec->tenant_id,
                        'customer_id'         => $rec->customer_id,
                        'number'              => $docService->next('invoice'),
                        'status'              => 'draft',
                        'issue_date'          => now()->toDateString(),
                        'due_date'            => $template->due_date
                            ? now()->addDays(
                                $template->issue_date && $template->due_date
                                    ? $template->issue_date->diffInDays($template->due_date)
                                    : 30
                              )->toDateString()
                            : now()->addDays(30)->toDateString(),
                        'enable_tax'          => $template->enable_tax,
                        'bill_from_snapshot'  => $template->bill_from_snapshot,
                        'bill_to_snapshot'    => $template->bill_to_snapshot,
                        'subtotal'            => $template->subtotal,
                        'discount_total'      => $template->discount_total,
                        'tax_total'           => $template->tax_total,
                        'round_off'           => $template->round_off ?? 0,
                        'total'               => $template->total,
                        'amount_paid'         => 0,
                        'amount_due'          => $template->total,
                        'notes'               => $template->notes,
                        'terms'               => $template->terms,
                        'bank_details_snapshot' => $template->bank_details_snapshot,
                    ]);

                    // Copy items
                    foreach ($template->items as $item) {
                        InvoiceItem::create([
                            'tenant_id'   => $rec->tenant_id,
                            'invoice_id'  => $invoice->id,
                            'product_id'  => $item->product_id,
                            'label'       => $item->label,
                            'description' => $item->description,
                            'quantity'    => $item->quantity,
                            'unit_price'  => $item->unit_price,
                            'discount'    => $item->discount,
                            'tax_rate'    => $item->tax_rate,
                            'tax_amount'  => $item->tax_amount,
                            'line_total'  => $item->line_total,
                        ]);
                    }

                    // Copy charges
                    foreach ($template->charges as $charge) {
                        InvoiceCharge::create([
                            'tenant_id'   => $rec->tenant_id,
                            'invoice_id'  => $invoice->id,
                            'label'       => $charge->label,
                            'type'        => $charge->type,
                            'value'       => $charge->value,
                            'tax_rate'    => $charge->tax_rate,
                            'tax_amount'  => $charge->tax_amount,
                            'total'       => $charge->total,
                        ]);
                    }

                    // Update recurring invoice
                    $rec->last_generated_at = now();
                    $rec->total_generated = ($rec->total_generated ?? 0) + 1;
                    $rec->next_run_at = $this->calculateNextRun($rec);

                    // Check if end date reached
                    if ($rec->end_at && $rec->next_run_at->greaterThan($rec->end_at)) {
                        $rec->status = 'cancelled';
                    }

                    $rec->save();
                    $generated++;
                });
            } catch (\Throwable $e) {
                $errors++;
                Log::error("RecurringInvoice {$rec->id}: erreur lors de la génération", [
                    'error' => $e->getMessage(),
                ]);
                $this->error("Erreur pour la récurrence {$rec->id}: {$e->getMessage()}");
            }
        }

        $this->info("Terminé : {$generated} facture(s) générée(s), {$errors} erreur(s).");

        return $errors > 0 ? self::FAILURE : self::SUCCESS;
    }

    private function calculateNextRun(RecurringInvoice $rec): \Carbon\Carbon
    {
        $next = $rec->next_run_at->copy();

        return match ($rec->interval) {
            'week'  => $next->addWeeks($rec->every),
            'month' => $next->addMonths($rec->every),
            'year'  => $next->addYears($rec->every),
            default => $next->addMonths($rec->every),
        };
    }
}
