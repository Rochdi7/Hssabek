<?php

namespace App\Console\Commands;

use App\Models\Purchases\VendorBill;
use App\Models\Sales\Invoice;
use App\Models\Tenancy\Tenant;
use App\Services\Tenancy\TenantContext;
use Illuminate\Console\Command;

class MarkOverdueDocumentsCommand extends Command
{
    protected $signature = 'documents:mark-overdue';

    protected $description = 'Marque comme « en retard » les factures et factures fournisseurs impayées dont la date d\'échéance est dépassée';

    public function handle(): int
    {
        $today = now()->startOfDay()->toDateString();
        $invoiceCount = 0;
        $billCount = 0;

        // Per-tenant so the BelongsToTenant global scope keeps queries isolated.
        $tenants = Tenant::all();

        foreach ($tenants as $tenant) {
            TenantContext::set($tenant);

            // Only flip rows that are genuinely unpaid and past due. Never touch
            // paid, void, or partial. Legacy 'draft'/'sent'/'posted' normalize to unpaid.
            $invoiceCount += Invoice::whereIn('status', ['unpaid', 'draft', 'sent'])
                ->whereNotNull('due_date')
                ->whereDate('due_date', '<', $today)
                ->where('amount_paid', '<=', 0)
                ->where('amount_due', '>', 0)
                ->update(['status' => Invoice::STATUS_OVERDUE]);

            $billCount += VendorBill::whereIn('status', ['unpaid', 'draft', 'posted'])
                ->whereNotNull('due_date')
                ->whereDate('due_date', '<', $today)
                ->where('amount_paid', '<=', 0)
                ->where('amount_due', '>', 0)
                ->update(['status' => VendorBill::STATUS_OVERDUE]);
        }

        TenantContext::forget();

        $this->info("Factures marquées en retard : {$invoiceCount}.");
        $this->info("Factures fournisseurs marquées en retard : {$billCount}.");

        return self::SUCCESS;
    }
}
