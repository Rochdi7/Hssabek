<?php

namespace App\Http\Controllers\Backoffice\Reports;

use App\Http\Controllers\Controller;
use App\Services\Reports\ReportService;
use Illuminate\Http\Request;


class PurchaseReportController extends Controller
{
    public function __construct(private ReportService $reportService)
    {
    }

    public function index(Request $request)
    {
        $from = $request->input('from', now()->startOfMonth()->toDateString());
        $to   = $request->input('to', now()->toDateString());

        $data = $this->reportService->purchaseSummary($from, $to);

        return view('backoffice.reports.purchases', array_merge($data, compact('from', 'to')));
    }

    public function export(Request $request)
    {
        $from = $request->input('from', now()->startOfMonth()->toDateString());
        $to   = $request->input('to', now()->toDateString());

        $data = $this->reportService->purchaseSummary($from, $to);

        $filename = "rapport-achats-{$from}-{$to}.csv";

        return response()->streamDownload(function () use ($data) {
            $fp = fopen('php://output', 'w');
            fwrite($fp, "\xEF\xBB\xBF"); // UTF-8 BOM

            fputcsv($fp, ['N° Facture', 'Fournisseur', 'Date', 'Échéance', 'Total', 'Payé', 'Restant', 'Statut'], ';');

            foreach ($data['vendorBills'] as $bill) {
                fputcsv($fp, [
                    $bill->number,
                    $bill->supplier?->name ?? '-',
                    $bill->issue_date?->format('d/m/Y'),
                    $bill->due_date?->format('d/m/Y'),
                    number_format($bill->total, 2, ',', ' '),
                    number_format($bill->amount_paid, 2, ',', ' '),
                    number_format($bill->amount_due, 2, ',', ' '),
                    $bill->status,
                ], ';');
            }

            fclose($fp);
        }, $filename, [
            'Content-Type' => 'text/csv; charset=UTF-8',
        ]);
    }
}
