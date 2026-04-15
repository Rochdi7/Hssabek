<?php

namespace App\Http\Controllers\Backoffice\Reports;

use App\Http\Controllers\Controller;
use App\Services\Reports\ReportService;
use Illuminate\Http\Request;


class CustomerReportController extends Controller
{
    public function __construct(private ReportService $reportService)
    {
    }

    public function index(Request $request)
    {
        $from = $request->input('from', now()->startOfMonth()->toDateString());
        $to   = $request->input('to', now()->toDateString());

        $data = $this->reportService->customerSummary($from, $to);

        return view('backoffice.reports.customers', array_merge($data, compact('from', 'to')));
    }

    public function export(Request $request)
    {
        $from = $request->input('from', now()->startOfMonth()->toDateString());
        $to   = $request->input('to', now()->toDateString());

        $data = $this->reportService->customerSummary($from, $to);

        $filename = "rapport-clients-{$from}-{$to}.csv";

        return response()->streamDownload(function () use ($data) {
            $fp = fopen('php://output', 'w');
            fwrite($fp, "\xEF\xBB\xBF"); // UTF-8 BOM

            fputcsv($fp, ['Nom', 'Email', 'Téléphone', 'Type', 'Nb Factures', 'CA Total', 'Montant Dû'], ';');

            foreach ($data['customers'] as $customer) {
                fputcsv($fp, [
                    $customer->name,
                    $customer->email,
                    $customer->phone ?? '-',
                    $customer->type,
                    $customer->invoices_count,
                    number_format($customer->total_revenue ?? 0, 2, ',', ' '),
                    number_format($customer->total_due ?? 0, 2, ',', ' '),
                ], ';');
            }

            fclose($fp);
        }, $filename, [
            'Content-Type' => 'text/csv; charset=UTF-8',
        ]);
    }
}
