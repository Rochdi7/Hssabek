<?php

namespace App\Http\Controllers\Backoffice\Reports;

use App\Http\Controllers\Controller;
use App\Services\Reports\ReportService;
use Illuminate\Http\Request;


class FinanceReportController extends Controller
{
    public function __construct(private ReportService $reportService)
    {
    }

    public function index(Request $request)
    {
        $from = $request->input('from', now()->startOfMonth()->toDateString());
        $to   = $request->input('to', now()->toDateString());

        $data = $this->reportService->financeSummary($from, $to);

        return view('backoffice.reports.finance', array_merge($data, compact('from', 'to')));
    }

    public function export(Request $request)
    {
        $from = $request->input('from', now()->startOfMonth()->toDateString());
        $to   = $request->input('to', now()->toDateString());

        $data = $this->reportService->financeSummary($from, $to);

        $filename = "rapport-finance-{$from}-{$to}.csv";

        return response()->streamDownload(function () use ($data) {
            $fp = fopen('php://output', 'w');
            fwrite($fp, "\xEF\xBB\xBF"); // UTF-8 BOM

            fputcsv($fp, ['N° Dépense', 'Catégorie', 'Fournisseur', 'Date', 'Montant', 'Statut'], ';');

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

            fclose($fp);
        }, $filename, [
            'Content-Type' => 'text/csv; charset=UTF-8',
        ]);
    }
}
