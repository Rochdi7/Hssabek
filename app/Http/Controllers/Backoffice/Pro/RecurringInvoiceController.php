<?php

namespace App\Http\Controllers\Backoffice\Pro;

use App\Http\Controllers\Controller;
use App\Http\Requests\Pro\Store\StoreRecurringInvoiceRequest;
use App\Http\Requests\Pro\Update\UpdateRecurringInvoiceRequest;
use App\Models\CRM\Customer;
use App\Models\Pro\RecurringInvoice;
use App\Models\Sales\Invoice;
use Illuminate\Http\Request;

class RecurringInvoiceController extends Controller
{
    public function index(Request $request)
    {
        $this->authorize('viewAny', RecurringInvoice::class);

        $recurringInvoices = RecurringInvoice::query()
            ->with(['customer', 'templateInvoice'])
            ->when($request->search, fn($q, $s) => $q->whereHas('customer', fn($cq) => $cq->where('name', 'like', "%{$s}%")))
            ->when($request->status, fn($q, $s) => $q->where('status', $s))
            ->latest('next_run_at')
            ->paginate(request()->input('per_page', 15))
            ->withQueryString();

        return view('backoffice.pro.recurring-invoices.index', compact('recurringInvoices'));
    }

    public function create()
    {
        $this->authorize('create', RecurringInvoice::class);

        $customers = Customer::orderBy('name')->get();
        $invoices = Invoice::orderBy('issue_date', 'desc')->limit(50)->get();

        return view('backoffice.pro.recurring-invoices.create', compact('customers', 'invoices'));
    }

    public function store(StoreRecurringInvoiceRequest $request)
    {
        $this->authorize('create', RecurringInvoice::class);

        RecurringInvoice::create($request->validated());

        return redirect()->route('bo.pro.recurring-invoices.index')
            ->with('success', __('Facture récurrente créée avec succès.'));
    }

    public function show(RecurringInvoice $recurringInvoice)
    {
        $this->authorize('view', $recurringInvoice);

        $recurringInvoice->load(['customer', 'templateInvoice']);

        return view('backoffice.pro.recurring-invoices.show', compact('recurringInvoice'));
    }

    public function edit(RecurringInvoice $recurringInvoice)
    {
        $this->authorize('update', $recurringInvoice);

        $customers = Customer::orderBy('name')->get();
        $invoices = Invoice::orderBy('issue_date', 'desc')->limit(50)->get();

        return view('backoffice.pro.recurring-invoices.edit', compact('recurringInvoice', 'customers', 'invoices'));
    }

    public function update(UpdateRecurringInvoiceRequest $request, RecurringInvoice $recurringInvoice)
    {
        $this->authorize('update', $recurringInvoice);

        $recurringInvoice->update($request->validated());

        return redirect()->route('bo.pro.recurring-invoices.index')
            ->with('success', __('Facture récurrente mise à jour avec succès.'));
    }

    public function destroy(RecurringInvoice $recurringInvoice)
    {
        $this->authorize('delete', $recurringInvoice);

        $recurringInvoice->delete();

        return redirect()->route('bo.pro.recurring-invoices.index')
            ->with('success', __('Facture récurrente supprimée avec succès.'));
    }
}
