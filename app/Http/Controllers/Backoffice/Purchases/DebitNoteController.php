<?php

namespace App\Http\Controllers\Backoffice\Purchases;

use App\Http\Controllers\Controller;
use App\Http\Requests\Purchases\Store\StoreDebitNoteRequest;
use App\Http\Requests\Purchases\Update\UpdateDebitNoteRequest;
use App\Jobs\SendDebitNoteEmailJob;
use App\Models\Catalog\TaxCategory;
use App\Models\Catalog\TaxGroup;
use App\Models\Purchases\DebitNote;
use App\Models\Purchases\Supplier;
use App\Models\Purchases\VendorBill;
use App\Services\Purchases\DebitNoteService;
use App\Models\Finance\BankAccount;
use App\Services\Sales\PdfService;
use App\Services\System\DocumentNumberService;
use App\Services\Tenancy\TenantContext;
use Illuminate\Http\Request;

class DebitNoteController extends Controller
{
    public function __construct(
        private readonly DebitNoteService $debitNoteService,
    ) {}

    public function index(Request $request)
    {
        $this->authorize('viewAny', DebitNote::class);

        $debitNotes = DebitNote::query()
            ->with(['supplier'])
            ->when($request->search, fn($q, $s) => $q->where(function ($q) use ($s) {
                $q->where('number', 'like', "%{$s}%")
                    ->orWhere('reference_number', 'like', "%{$s}%")
                    ->orWhereHas('supplier', fn($sq) => $sq->where('name', 'like', "%{$s}%"));
            }))
            ->when($request->status, fn($q, $s) => $q->where('status', $s))
            ->latest('debit_note_date')
            ->paginate($request->input('per_page', 15))
            ->withQueryString();

        return view('backoffice.purchases.debit-notes.index', compact('debitNotes'));
    }

    public function create()
    {
        $this->authorize('create', DebitNote::class);

        $suppliers = Supplier::orderBy('name')->get();
        $vendorBills = VendorBill::with('supplier')->orderBy('issue_date', 'desc')->limit(50)->get();

        $nextReference = app(DocumentNumberService::class)->preview('debit_note_ref');
        $bankAccounts = collect();
        $taxGroups = TaxGroup::with('rates')->orderBy('name')->get();
        $taxCategories = TaxCategory::where('is_active', true)->orderBy('name')->get();

        $invoiceSettings = TenantContext::get()->settings->invoice_settings ?? [];
        $defaultTerms = $invoiceSettings['invoice_terms'] ?? '';
        $defaultFooter = $invoiceSettings['invoice_footer'] ?? '';

        return view('backoffice.purchases.debit-notes.create', compact(
            'suppliers', 'vendorBills', 'nextReference', 'bankAccounts',
            'taxGroups', 'taxCategories', 'defaultTerms', 'defaultFooter'
        ));
    }

    public function store(StoreDebitNoteRequest $request)
    {
        $this->authorize('create', DebitNote::class);

        $validated = $request->validated();
        if (empty($validated['reference_number'])) {
            $validated['reference_number'] = app(DocumentNumberService::class)->next('debit_note_ref');
        }

        $debitNote = $this->debitNoteService->create($validated);

        \App\Services\Reports\ReportService::flushTenantCache();

        return redirect()->route('bo.purchases.debit-notes.show', $debitNote)
            ->with('success', __('Note de débit créée avec succès.'));
    }

    public function show(DebitNote $debitNote)
    {
        $this->authorize('view', $debitNote);

        $debitNote->load(['supplier', 'items', 'vendorBill', 'purchaseOrder', 'applications.vendorBill']);

        return view('backoffice.purchases.debit-notes.show', compact('debitNote'));
    }

    public function edit(DebitNote $debitNote)
    {
        $this->authorize('update', $debitNote);

        abort_if($debitNote->status === 'void', 403, 'Une note de débit annulée ne peut pas être modifiée.');

        $suppliers = Supplier::orderBy('name')->get();
        $vendorBills = VendorBill::with('supplier')->orderBy('issue_date', 'desc')->limit(50)->get();

        $nextReference = app(DocumentNumberService::class)->preview('debit_note_ref');
        $bankAccounts = collect();
        $taxGroups = TaxGroup::with('rates')->orderBy('name')->get();
        $taxCategories = TaxCategory::where('is_active', true)->orderBy('name')->get();

        $invoiceSettings = TenantContext::get()->settings->invoice_settings ?? [];
        $defaultTerms = $invoiceSettings['invoice_terms'] ?? '';
        $defaultFooter = $invoiceSettings['invoice_footer'] ?? '';

        return view('backoffice.purchases.debit-notes.edit', compact(
            'debitNote', 'suppliers', 'vendorBills', 'nextReference', 'bankAccounts',
            'taxGroups', 'taxCategories', 'defaultTerms', 'defaultFooter'
        ));
    }

    public function update(UpdateDebitNoteRequest $request, DebitNote $debitNote)
    {
        $this->authorize('update', $debitNote);

        abort_if($debitNote->status === 'void', 403, 'Une note de débit annulée ne peut pas être modifiée.');

        $this->debitNoteService->update($debitNote, $request->validated());

        \App\Services\Reports\ReportService::flushTenantCache();

        return redirect()->route('bo.purchases.debit-notes.show', $debitNote)
            ->with('success', __('Note de débit mise à jour avec succès.'));
    }

    public function void(DebitNote $debitNote)
    {
        $this->authorize('update', $debitNote);

        $this->debitNoteService->void($debitNote);

        \App\Services\Reports\ReportService::flushTenantCache();

        return redirect()->route('bo.purchases.debit-notes.show', $debitNote)
            ->with('success', __('Note de débit annulée avec succès.'));
    }

    public function destroy(DebitNote $debitNote)
    {
        $this->authorize('delete', $debitNote);

        $debitNote->items()->delete();
        $debitNote->delete();

        \App\Services\Reports\ReportService::flushTenantCache();

        return redirect()->route('bo.purchases.debit-notes.index')
            ->with('success', __('Note de débit supprimée avec succès.'));
    }

    public function download(DebitNote $debitNote, PdfService $pdfService)
    {
        abort_unless(auth()->user()->can('purchases.debit_notes.view'), 403);

        return $pdfService->debitNoteResponse($debitNote, 'download');
    }

    public function send(DebitNote $debitNote)
    {
        $this->authorize('update', $debitNote);

        abort_if($debitNote->status === 'void', 403, 'Une note de débit annulée ne peut pas être envoyée.');

        $debitNote->update(['sent_at' => now()]);

        dispatch(new SendDebitNoteEmailJob(
            debitNoteId: $debitNote->id,
            tenantId: TenantContext::id(),
        ));

        return redirect()->route('bo.purchases.debit-notes.show', $debitNote)
            ->with('success', __('Note de débit envoyée au fournisseur par email.'));
    }
}
