<?php

namespace App\Http\Controllers\Backoffice\Reports;

use App\Http\Controllers\Controller;
use App\Services\Reports\ReportService;
use Illuminate\Http\Request;


class InventoryReportController extends Controller
{
    public function __construct(private ReportService $reportService)
    {
    }

    public function index(Request $request)
    {
        $data = $this->reportService->inventorySummary();

        return view('backoffice.reports.inventory', $data);
    }

    public function export(Request $request)
    {
        $data = $this->reportService->inventorySummary();

        $filename = "rapport-inventaire-" . now()->toDateString() . ".csv";

        return response()->streamDownload(function () use ($data) {
            $fp = fopen('php://output', 'w');
            fwrite($fp, "\xEF\xBB\xBF"); // UTF-8 BOM

            fputcsv($fp, ['Code', 'Produit', 'Catégorie', 'Unité', 'Quantité', 'Prix de vente', 'Prix d\'achat'], ';');

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

            fclose($fp);
        }, $filename, [
            'Content-Type' => 'text/csv; charset=UTF-8',
        ]);
    }
}
