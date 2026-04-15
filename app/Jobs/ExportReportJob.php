<?php

namespace App\Jobs;

use App\Models\Tenancy\Tenant;
use App\Services\Reports\ReportService;
use App\Services\Tenancy\TenantContext;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class ExportReportJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(
        public readonly string $tenantId,
        public readonly string $type,
        public readonly string $from,
        public readonly string $to,
        public readonly string $userId,
    ) {
    }

    public function handle(ReportService $reportService): void
    {
        $tenant = Tenant::findOrFail($this->tenantId);
        TenantContext::set($tenant);

        $data = match ($this->type) {
            'sales'     => $reportService->salesSummary($this->from, $this->to),
            'finance'   => $reportService->financeSummary($this->from, $this->to),
            'inventory' => $reportService->inventorySummary(),
            default     => throw new \InvalidArgumentException("Type de rapport inconnu : {$this->type}"),
        };

        $filename = "report-{$this->type}-{$this->from}-{$this->to}.csv";
        $dir = "exports/{$this->tenantId}";

        Storage::makeDirectory($dir);

        $path = Storage::path("{$dir}/{$filename}");
        $fp = fopen($path, 'w');

        // Write BOM for UTF-8 compatibility
        fwrite($fp, "\xEF\xBB\xBF");

        match ($this->type) {
            'sales'     => $this->exportSales($fp, $data),
            'finance'   => $this->exportFinance($fp, $data),
            'inventory' => $this->exportInventory($fp, $data),
        };

        fclose($fp);
    }

    private function exportSales($fp, array $data): void
    {
        fputcsv($fp, ['N° Facture', 'Client', 'Date', 'Total', 'Payé', 'Restant', 'Statut'], ';');

        if (isset($data['invoices'])) {
            foreach ($data['invoices'] as $invoice) {
                fputcsv($fp, [
                    $invoice->number,
                    $invoice->customer?->name ?? '-',
                    $invoice->issue_date?->format('d/m/Y'),
                    number_format($invoice->total, 2, ',', ' '),
                    number_format($invoice->amount_paid, 2, ',', ' '),
                    number_format($invoice->amount_due, 2, ',', ' '),
                    $invoice->status,
                ], ';');
            }
        }
    }

    private function exportFinance($fp, array $data): void
    {
        fputcsv($fp, ['N° Dépense', 'Catégorie', 'Fournisseur', 'Date', 'Montant', 'Statut'], ';');

        if (isset($data['expenses'])) {
            foreach ($data['expenses'] as $expense) {
                fputcsv($fp, [
                    $expense->expense_number,
                    $expense->category?->name ?? '-',
                    $expense->supplier?->name ?? '-',
                    $expense->expense_date?->format('d/m/Y'),
                    number_format($expense->amount, 2, ',', ' '),
                    $expense->payment_status,
                ], ';');
            }
        }
    }

    private function exportInventory($fp, array $data): void
    {
        fputcsv($fp, ['Code', 'Produit', 'Catégorie', 'Unité', 'Quantité', 'Prix de vente', 'Prix d\'achat'], ';');

        if (isset($data['products'])) {
            foreach ($data['products'] as $product) {
                fputcsv($fp, [
                    $product->code ?? $product->sku,
                    $product->name,
                    $product->category?->name ?? '-',
                    $product->unit?->short_name ?? '-',
                    number_format($product->quantity, 0, ',', ' '),
                    number_format($product->selling_price, 2, ',', ' '),
                    number_format($product->purchase_price, 2, ',', ' '),
                ], ';');
            }
        }
    }
}
