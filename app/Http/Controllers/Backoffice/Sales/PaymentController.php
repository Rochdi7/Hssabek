<?php

namespace App\Http\Controllers\Backoffice\Sales;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sales\Store\StorePaymentRequest;
use App\Http\Requests\Sales\Update\UpdatePaymentRequest;
use App\Models\CRM\Customer;
use App\Models\Sales\Invoice;
use App\Models\Sales\Payment;
use App\Models\Sales\PaymentMethod;
use App\Services\Sales\PaymentService;
use App\Services\Sales\PdfService;
use App\Services\System\DocumentNumberService;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function __construct(
        private PaymentService $paymentService,
    ) {}

    public function index(Request $request)
    {
        $this->authorize('viewAny', Payment::class);

        $query = Payment::with(['customer', 'paymentMethod']);

        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('reference_number', 'like', "%{$search}%")
                    ->orWhereHas('customer', fn($c) => $c->where('name', 'like', "%{$search}%"));
            });
        }

        if ($status = $request->input('status')) {
            $query->where('status', $status);
        }

        if ($from = $request->input('from')) {
            $query->whereDate('payment_date', '>=', $from);
        }

        if ($to = $request->input('to')) {
            $query->whereDate('payment_date', '<=', $to);
        }

        $payments = $query->latest('payment_date')->paginate(15)->withQueryString();

        return view('backoffice.sales.payments.index', compact('payments'));
    }

    public function create()
    {
        $this->authorize('create', Payment::class);

        $customers = Customer::orderBy('name')->get();
        $invoices = Invoice::where('amount_due', '>', 0)
            ->whereIn('status', ['sent', 'partial', 'overdue'])
            ->with('customer')
            ->orderBy('issue_date')
            ->get();
        $paymentMethods = PaymentMethod::orderBy('name')->get();

        $nextReference = app(DocumentNumberService::class)->preview('payment_ref');

        return view('backoffice.sales.payments.create', compact(
            'customers',
            'invoices',
            'paymentMethods',
            'nextReference'
        ));
    }

    public function store(StorePaymentRequest $request)
    {
        $this->authorize('create', Payment::class);

        $this->paymentService->create($request->validated());

        \App\Services\Reports\ReportService::flushTenantCache();

        return redirect()->route('bo.sales.payments.index')
            ->with('success', 'Paiement enregistré avec succès.');
    }

    public function show(Payment $payment)
    {
        $this->authorize('view', $payment);

        $payment->load(['customer', 'paymentMethod', 'allocations.invoice']);

        return view('backoffice.sales.payments.show', compact('payment'));
    }

    public function edit(Payment $payment)
    {
        $this->authorize('update', $payment);

        $nextReference = app(DocumentNumberService::class)->preview('payment_ref');

        return view('backoffice.sales.payments.edit', compact('payment', 'nextReference'));
    }

    public function update(UpdatePaymentRequest $request, Payment $payment)
    {
        $this->authorize('update', $payment);

        $payment->update($request->validated());

        \App\Services\Reports\ReportService::flushTenantCache();

        return redirect()->route('bo.sales.payments.index')
            ->with('success', 'Paiement modifié avec succès.');
    }

    public function destroy(Payment $payment)
    {
        $this->authorize('delete', $payment);

        $this->paymentService->delete($payment);

        \App\Services\Reports\ReportService::flushTenantCache();

        return redirect()->route('bo.sales.payments.index')
            ->with('success', 'Paiement supprimé avec succès.');
    }

    public function download(Payment $payment, PdfService $pdfService)
    {
        abort_unless(auth()->user()->can('sales.invoices.view'), 403);

        return $pdfService->paymentReceiptResponse($payment, 'download');
    }
}
