<?php

namespace App\Http\Controllers\Backoffice\Reports;

use App\Http\Controllers\Controller;
use App\Services\Reports\ReportService;
use Illuminate\Http\Request;


class SalesReportController extends Controller
{
    public function __construct(private ReportService $reportService)
    {
    }

    public function index(Request $request)
    {
        $from = $request->input('from', now()->startOfMonth()->toDateString());
        $to   = $request->input('to', now()->toDateString());

        $data = $this->reportService->salesSummary($from, $to);

        return view('backoffice.reports.sales', array_merge($data, compact('from', 'to')));
    }

    public function export(Request $request)
    {
        $from = $request->input('from', now()->startOfMonth()->toDateString());
        $to   = $request->input('to', now()->toDateString());

        $data = $this->reportService->salesSummary($from, $to);

        $filename = "rapport-ventes-{$from}-{$to}.csv";

        return response()->streamDownload(function () use ($data) {
            $fp = fopen('php://output', 'w');
            fwrite($fp, "\xEF\xBB\xBF"); // UTF-8 BOM

            fputcsv($fp, ['N° Facture', 'Client', 'Date', 'Total', 'Payé', 'Restant', 'Statut'], ';');

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

            fclose($fp);
        }, $filename, [
            'Content-Type' => 'text/csv; charset=UTF-8',
        ]);
    }
}
