<?php

namespace App\Http\Controllers\Backoffice\Pro;

use App\Http\Controllers\Controller;
use App\Http\Requests\Pro\Store\StoreInvoiceReminderRequest;
use App\Http\Requests\Pro\Update\UpdateInvoiceReminderRequest;
use App\Models\Pro\InvoiceReminder;
use App\Models\Sales\Invoice;
use Illuminate\Http\Request;

class InvoiceReminderController extends Controller
{
    public function index(Request $request)
    {
        $this->authorize('viewAny', InvoiceReminder::class);

        $reminders = InvoiceReminder::query()
            ->with(['invoice', 'invoice.customer'])
            ->when($request->search, fn($q, $s) => $q->whereHas('invoice', fn($iq) => $iq->where('number', 'like', "%{$s}%")))
            ->when($request->status, fn($q, $s) => $q->where('status', $s))
            ->when($request->type, fn($q, $t) => $q->where('type', $t))
            ->latest('scheduled_at')
            ->paginate(request()->input('per_page', 15))
            ->withQueryString();

        return view('backoffice.pro.invoice-reminders.index', compact('reminders'));
    }

    public function create()
    {
        $this->authorize('create', InvoiceReminder::class);

        $invoices = Invoice::whereIn('status', ['sent', 'partial', 'overdue'])
            ->with('customer')
            ->orderBy('due_date')
            ->get();

        return view('backoffice.pro.invoice-reminders.create', compact('invoices'));
    }

    public function store(StoreInvoiceReminderRequest $request)
    {
        $this->authorize('create', InvoiceReminder::class);

        $data = $request->validated();
        $data['status'] = 'pending';

        InvoiceReminder::create($data);

        return redirect()->route('bo.pro.invoice-reminders.index')
            ->with('success', __('Rappel de facture créé avec succès.'));
    }

    public function edit(InvoiceReminder $invoiceReminder)
    {
        $this->authorize('update', $invoiceReminder);

        $invoices = Invoice::with('customer')->orderBy('due_date')->get();

        return view('backoffice.pro.invoice-reminders.edit', compact('invoiceReminder', 'invoices'));
    }

    public function update(UpdateInvoiceReminderRequest $request, InvoiceReminder $invoiceReminder)
    {
        $this->authorize('update', $invoiceReminder);

        $invoiceReminder->update($request->validated());

        return redirect()->route('bo.pro.invoice-reminders.index')
            ->with('success', __('Rappel de facture mis à jour avec succès.'));
    }

    public function destroy(InvoiceReminder $invoiceReminder)
    {
        $this->authorize('delete', $invoiceReminder);

        $invoiceReminder->delete();

        return redirect()->route('bo.pro.invoice-reminders.index')
            ->with('success', __('Rappel de facture supprimé avec succès.'));
    }
}
