<?php

namespace App\Http\Controllers\Backoffice\Reports;

use App\Http\Controllers\Controller;
use App\Jobs\ExportReportJob;
use App\Services\Reports\ReportService;
use App\Services\Tenancy\TenantContext;
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

        dispatch(new ExportReportJob(
            tenantId: TenantContext::id(),
            type: 'customers',
            from: $from,
            to: $to,
            userId: auth()->id(),
        ));

        return redirect()->back()
            ->with('info', 'L\'export est en cours. Vous serez notifié lorsqu\'il sera prêt.');
    }
}
