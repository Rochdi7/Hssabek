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
use App\Models\Finance\Currency;
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
            ->whereIn('status', ['unpaid', 'partial', 'paid', 'overdue'])
            ->orderBy('issue_date', 'desc')
            ->get();

        $bankAccounts = collect();
        $taxGroups = TaxGroup::with('rates')->orderBy('name')->get();
        $taxCategories = TaxCategory::where('is_active', true)->orderBy('name')->get();

        $nextReference = app(DocumentNumberService::class)->preview('credit_note_ref');

        $invoiceSettings = TenantContext::get()->settings->invoice_settings ?? [];
        $defaultTerms = $invoiceSettings['invoice_terms'] ?? '';
        $defaultFooter = $invoiceSettings['invoice_footer'] ?? '';

        return view('backoffice.sales.credit-notes.create', compact(
            'customers', 'invoices', 'bankAccounts', 'taxGroups', 'taxCategories',
            'nextReference', 'defaultTerms', 'defaultFooter'
        ));
    }

    public function store(StoreCreditNoteRequest $request)
    {
        $this->authorize('create', CreditNote::class);

        $validated = $request->validated();
        if (empty($validated['reference_number'])) {
            $validated['reference_number'] = app(DocumentNumberService::class)->next('credit_note_ref');
        }

        $creditNote = $this->creditNoteService->create($validated);

        \App\Services\Reports\ReportService::flushTenantCache();

        return redirect()->route('bo.sales.credit-notes.show', $creditNote)
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

        abort_if($creditNote->status === 'void', 403, 'Un avoir annulé ne peut pas être modifié.');

        $creditNote->load(['items', 'applications']);

        $customers = Customer::orderBy('name')->get();
        $invoices = Invoice::with('customer')
            ->whereIn('status', ['unpaid', 'partial', 'paid', 'overdue'])
            ->orderBy('issue_date', 'desc')
            ->get();

        $bankAccounts = collect();
        $taxGroups = TaxGroup::with('rates')->orderBy('name')->get();
        $taxCategories = TaxCategory::where('is_active', true)->orderBy('name')->get();

        $nextReference = app(DocumentNumberService::class)->preview('credit_note_ref');

        $invoiceSettings = TenantContext::get()->settings->invoice_settings ?? [];
        $defaultTerms = $invoiceSettings['invoice_terms'] ?? '';
        $defaultFooter = $invoiceSettings['invoice_footer'] ?? '';

        return view('backoffice.sales.credit-notes.edit', compact(
            'creditNote', 'customers', 'invoices', 'bankAccounts', 'taxGroups', 'taxCategories',
            'nextReference', 'defaultTerms', 'defaultFooter'
        ));
    }

    public function update(UpdateCreditNoteRequest $request, CreditNote $creditNote)
    {
        $this->authorize('update', $creditNote);

        abort_if($creditNote->status === 'void', 403, 'Un avoir annulé ne peut pas être modifié.');

        $this->creditNoteService->update($creditNote, $request->validated());

        \App\Services\Reports\ReportService::flushTenantCache();

        return redirect()->route('bo.sales.credit-notes.show', $creditNote)
            ->with('success', __('Avoir mis à jour avec succès.'));
    }

    public function void(CreditNote $creditNote)
    {
        $this->authorize('update', $creditNote);

        $this->creditNoteService->void($creditNote);

        \App\Services\Reports\ReportService::flushTenantCache();

        return redirect()->route('bo.sales.credit-notes.show', $creditNote)
            ->with('success', __('Avoir annulé avec succès.'));
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

    /**
     * Return invoice line items with already-credited quantities per item.
     * Used by the CN create/edit form to auto-populate lines.
     */
    public function invoiceItems(Invoice $invoice)
    {
        $this->authorize('viewAny', CreditNote::class);

        $invoice->load(['customer', 'items.product', 'items.taxGroup']);

        // Per invoice_item_id: sum of quantity credited by non-void credit notes
        $creditedQtyMap = \App\Models\Sales\CreditNoteItem::whereIn(
                'invoice_item_id', $invoice->items->pluck('id')
            )
            ->whereHas('creditNote', fn($q) => $q->where('status', '!=', 'void'))
            ->selectRaw('invoice_item_id, SUM(quantity) as credited_qty')
            ->groupBy('invoice_item_id')
            ->pluck('credited_qty', 'invoice_item_id');

        $lines = $invoice->items->map(function ($item) use ($creditedQtyMap) {
            $credited   = (float) ($creditedQtyMap[$item->id] ?? 0);
            $remaining  = max(0, (float) $item->quantity - $credited);

            return [
                'invoice_item_id'    => $item->id,
                'product_id'         => $item->product_id,
                'product_name'       => $item->product?->name,
                'is_tracked'         => $item->product?->track_inventory && $item->product?->item_type === 'product',
                'label'              => $item->label,
                'description'        => $item->description,
                'original_qty'       => (float) $item->quantity,
                'credited_qty'       => $credited,
                'remaining_qty'      => $remaining,
                'unit_price'         => (float) $item->unit_price,
                'tax_rate'           => (float) $item->tax_rate,
                'tax_group_name'     => $item->taxGroup?->name,
                'line_total'         => (float) $item->line_total,
            ];
        });

        return response()->json([
            'customer_id'   => $invoice->customer_id,
            'customer_name' => $invoice->customer?->name,
            'currency'      => $invoice->currency ?? TenantContext::get()?->default_currency ?? 'MAD',
            'items'         => $lines,
        ]);
    }

    public function invoiceSummary(Invoice $invoice)
    {
        $this->authorize('viewAny', CreditNote::class);

        $invoice->load(['customer']);

        $amountPaidByPayments = (float) $invoice->paymentAllocations()->sum('amount_applied');
        $amountCredited       = (float) $invoice->creditNoteApplications()->whereHas('creditNote', fn($q) => $q->where('status', '!=', 'void'))->sum('amount_applied');

        $currencyCode = $invoice->currency ?? TenantContext::get()?->default_currency ?? 'MAD';

        return response()->json([
            'invoice_number'       => $invoice->number,
            'customer_name'        => $invoice->customer?->name ?? '',
            'total'                => (float) $invoice->total,
            'amount_paid'          => $amountPaidByPayments,
            'amount_credited'      => $amountCredited,
            'amount_due'           => (float) $invoice->amount_due,
            'currency'             => $currencyCode,
        ]);
    }

    public function download(CreditNote $creditNote, PdfService $pdfService)
    {
        abort_unless(auth()->user()->can('sales.credit_notes.view'), 403);

        return $pdfService->creditNoteResponse($creditNote, 'download');
    }

    public function send(CreditNote $creditNote)
    {
        $this->authorize('update', $creditNote);

        abort_if($creditNote->status === 'void', 403, 'Un avoir annulé ne peut pas être envoyé.');

        $creditNote->update(['sent_at' => now()]);

        dispatch(new SendCreditNoteEmailJob(
            creditNoteId: $creditNote->id,
            tenantId: TenantContext::id(),
        ));

        return redirect()->route('bo.sales.credit-notes.show', $creditNote)
            ->with('success', __('Avoir envoyé au client par email.'));
    }
}
