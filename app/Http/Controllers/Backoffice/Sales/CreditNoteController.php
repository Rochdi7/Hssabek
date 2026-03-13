<?php

namespace App\Http\Controllers\Backoffice\Sales;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sales\Store\StoreCreditNoteRequest;
use App\Http\Requests\Sales\Update\UpdateCreditNoteRequest;
use App\Jobs\SendCreditNoteEmailJob;
use App\Models\Catalog\TaxCategory;
use App\Models\Catalog\TaxGroup;
use App\Models\CRM\Customer;
use App\Models\Finance\BankAccount;
use App\Models\Sales\CreditNote;
use App\Models\Sales\Invoice;
use App\Services\Sales\CreditNoteService;
use App\Services\Sales\PdfService;
use App\Services\System\DocumentNumberService;
use App\Services\Tenancy\TenantContext;
use Illuminate\Http\Request;

class CreditNoteController extends Controller
{
    public function __construct(
        private CreditNoteService $creditNoteService,
    ) {}

    public function index(Request $request)
    {
        $this->authorize('viewAny', CreditNote::class);

        $query = CreditNote::with('customer');

        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('number', 'like', "%{$search}%")
                    ->orWhereHas('customer', fn($c) => $c->where('name', 'like', "%{$search}%"));
            });
        }

        if ($status = $request->input('status')) {
            $query->where('status', $status);
        }

        if ($from = $request->input('from')) {
            $query->whereDate('issue_date', '>=', $from);
        }

        if ($to = $request->input('to')) {
            $query->whereDate('issue_date', '<=', $to);
        }

        $creditNotes = $query->latest('issue_date')->paginate($request->input('per_page', 15))->withQueryString();

        return view('backoffice.sales.credit-notes.index', compact('creditNotes'));
    }

    public function create()
    {
        $this->authorize('create', CreditNote::class);

        $customers = Customer::orderBy('name')->get();
        $invoices = Invoice::with('customer')
            ->whereIn('status', ['sent', 'partial', 'paid', 'overdue'])
            ->orderBy('issue_date', 'desc')
            ->get();

        $bankAccounts = BankAccount::where('is_active', true)->orderBy('bank_name')->get();
        $taxGroups = TaxGroup::with('rates')->orderBy('name')->get();
        $taxCategories = TaxCategory::where('is_active', true)->orderBy('name')->get();

        $nextReference = app(DocumentNumberService::class)->preview('credit_note_ref');

        $invoiceSettings = TenantContext::get()->settings->invoice_settings ?? [];
        $defaultTerms = $invoiceSettings['invoice_terms'] ?? '';
        $defaultFooter = $invoiceSettings['invoice_footer'] ?? '';

        return view('backoffice.sales.credit-notes.create', compact('customers', 'invoices', 'bankAccounts', 'taxGroups', 'taxCategories', 'nextReference', 'defaultTerms', 'defaultFooter'));
    }

    public function store(StoreCreditNoteRequest $request)
    {
        $this->authorize('create', CreditNote::class);

        $this->creditNoteService->create($request->validated());

        \App\Services\Reports\ReportService::flushTenantCache();

        return redirect()->route('bo.sales.credit-notes.index')
            ->with('success', __('Avoir créé avec succès.'));
    }

    public function show(CreditNote $creditNote)
    {
        $this->authorize('view', $creditNote);

        $creditNote->load([
            'customer',
            'invoice',
            'items',
            'applications.invoice',
        ]);

        return view('backoffice.sales.credit-notes.show', compact('creditNote'));
    }

    public function edit(CreditNote $creditNote)
    {
        $this->authorize('update', $creditNote);

        abort_unless($creditNote->status === 'draft', 403, 'Seuls les avoirs en brouillon peuvent être modifiés.');

        $creditNote->load(['items']);

        $customers = Customer::orderBy('name')->get();
        $invoices = Invoice::with('customer')
            ->whereIn('status', ['sent', 'partial', 'paid', 'overdue'])
            ->orderBy('issue_date', 'desc')
            ->get();

        $bankAccounts = BankAccount::where('is_active', true)->orderBy('bank_name')->get();
        $taxGroups = TaxGroup::with('rates')->orderBy('name')->get();
        $taxCategories = TaxCategory::where('is_active', true)->orderBy('name')->get();

        $nextReference = app(DocumentNumberService::class)->preview('credit_note_ref');

        $invoiceSettings = TenantContext::get()->settings->invoice_settings ?? [];
        $defaultTerms = $invoiceSettings['invoice_terms'] ?? '';
        $defaultFooter = $invoiceSettings['invoice_footer'] ?? '';

        return view('backoffice.sales.credit-notes.edit', compact('creditNote', 'customers', 'invoices', 'bankAccounts', 'taxGroups', 'taxCategories', 'nextReference', 'defaultTerms', 'defaultFooter'));
    }

    public function update(UpdateCreditNoteRequest $request, CreditNote $creditNote)
    {
        $this->authorize('update', $creditNote);

        abort_unless($creditNote->status === 'draft', 403, 'Seuls les avoirs en brouillon peuvent être modifiés.');

        $this->creditNoteService->update($creditNote, $request->validated());

        \App\Services\Reports\ReportService::flushTenantCache();

        return redirect()->route('bo.sales.credit-notes.show', $creditNote)
            ->with('success', __('Avoir mis à jour avec succès.'));
    }

    public function destroy(CreditNote $creditNote)
    {
        $this->authorize('delete', $creditNote);

        $creditNote->items()->delete();
        $creditNote->delete();

        \App\Services\Reports\ReportService::flushTenantCache();

        return redirect()->route('bo.sales.credit-notes.index')
            ->with('success', __('Avoir supprimé avec succès.'));
    }

    public function apply(Request $request, CreditNote $creditNote)
    {
        $this->authorize('update', $creditNote);

        abort_unless(
            in_array($creditNote->status, ['issued']),
            403,
            'Seuls les avoirs émis peuvent être appliqués.'
        );

        $validated = $request->validate([
            'allocations' => ['required', 'array', 'min:1'],
            'allocations.*.invoice_id' => ['required', 'uuid', 'exists:invoices,id'],
            'allocations.*.amount_applied' => ['required', 'numeric', 'min:0.01'],
        ], [
            'allocations.required' => 'Au moins une allocation est obligatoire.',
            'allocations.*.invoice_id.required' => 'La facture est obligatoire.',
            'allocations.*.amount_applied.required' => 'Le montant est obligatoire.',
        ]);

        $this->creditNoteService->apply($creditNote, $validated['allocations']);

        \App\Services\Reports\ReportService::flushTenantCache();

        return redirect()->route('bo.sales.credit-notes.show', $creditNote)
            ->with('success', __('Avoir appliqué avec succès.'));
    }

    public function download(CreditNote $creditNote, PdfService $pdfService)
    {
        abort_unless(auth()->user()->can('sales.credit_notes.view'), 403);

        return $pdfService->creditNoteResponse($creditNote, 'download');
    }

    public function send(CreditNote $creditNote)
    {
        $this->authorize('update', $creditNote);

        abort_unless(
            in_array($creditNote->status, ['issued']),
            403,
            'Seuls les avoirs émis peuvent être envoyés par email.'
        );

        $creditNote->update(['sent_at' => now()]);

        dispatch(new SendCreditNoteEmailJob(
            creditNoteId: $creditNote->id,
            tenantId: TenantContext::id(),
        ));

        return redirect()->route('bo.sales.credit-notes.show', $creditNote)
            ->with('success', __('Avoir envoyé au client par email.'));
    }
}
