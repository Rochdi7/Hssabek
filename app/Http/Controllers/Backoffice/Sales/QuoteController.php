<?php

namespace App\Http\Controllers\Backoffice\Sales;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sales\Store\StoreQuoteRequest;
use App\Http\Requests\Sales\Update\UpdateQuoteRequest;
use App\Jobs\SendQuoteEmailJob;
use App\Models\Catalog\Product;
use App\Models\Catalog\TaxCategory;
use App\Models\Catalog\TaxGroup;
use App\Models\Catalog\Unit;
use App\Models\CRM\Customer;
use App\Models\Finance\BankAccount;
use App\Models\Sales\Quote;
use App\Services\Sales\PdfService;
use App\Services\Sales\QuoteService;
use App\Services\System\DocumentNumberService;
use App\Services\Tenancy\TenantContext;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    public function __construct(
        private QuoteService $quoteService,
    ) {}

    public function index(Request $request)
    {
        $this->authorize('viewAny', Quote::class);

        $query = Quote::with('customer');

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

        $quotes = $query->latest('issue_date')->paginate($request->input('per_page', 15))->withQueryString();

        return view('backoffice.sales.quotes.index', compact('quotes'));
    }

    public function create()
    {
        $this->authorize('create', Quote::class);

        $customers = Customer::orderBy('name')->get();
        $products = Product::orderBy('name')->get();
        $units = Unit::orderBy('name')->get();
        $taxGroups = TaxGroup::with('rates')->orderBy('name')->get();
        $taxCategories = TaxCategory::where('is_active', true)->orderBy('name')->get();
        $bankAccounts = BankAccount::where('is_active', true)->orderBy('bank_name')->get();

        $nextReference = app(DocumentNumberService::class)->preview('quote_ref');

        $invoiceSettings = TenantContext::get()->settings->invoice_settings ?? [];
        $defaultTerms = $invoiceSettings['invoice_terms'] ?? '';
        $defaultFooter = $invoiceSettings['invoice_footer'] ?? '';

        return view('backoffice.sales.quotes.create', compact(
            'customers',
            'products',
            'units',
            'taxGroups',
            'taxCategories',
            'bankAccounts',
            'nextReference',
            'defaultTerms',
            'defaultFooter'
        ));
    }

    public function store(StoreQuoteRequest $request)
    {
        $this->authorize('create', Quote::class);

        $this->quoteService->create($request->validated());

        \App\Services\Reports\ReportService::flushTenantCache();

        return redirect()->route('bo.sales.quotes.index')
            ->with('success', __('Devis créé avec succès.'));
    }

    public function show(Quote $quote)
    {
        $this->authorize('view', $quote);

        $quote->load([
            'customer',
            'items.product',
            'items.unit',
            'items.taxGroup',
            'charges',
            'invoices',
        ]);

        return view('backoffice.sales.quotes.show', compact('quote'));
    }

    public function edit(Quote $quote)
    {
        $this->authorize('update', $quote);

        abort_unless($quote->status === 'draft', 403, 'Seuls les devis en brouillon peuvent être modifiés.');

        $quote->load(['items', 'charges']);

        $customers = Customer::orderBy('name')->get();
        $products = Product::orderBy('name')->get();
        $units = Unit::orderBy('name')->get();
        $taxGroups = TaxGroup::with('rates')->orderBy('name')->get();
        $taxCategories = TaxCategory::where('is_active', true)->orderBy('name')->get();
        $bankAccounts = BankAccount::where('is_active', true)->orderBy('bank_name')->get();

        $nextReference = app(DocumentNumberService::class)->preview('quote_ref');

        $invoiceSettings = TenantContext::get()->settings->invoice_settings ?? [];
        $defaultTerms = $invoiceSettings['invoice_terms'] ?? '';
        $defaultFooter = $invoiceSettings['invoice_footer'] ?? '';

        return view('backoffice.sales.quotes.edit', compact(
            'quote',
            'customers',
            'products',
            'units',
            'taxGroups',
            'taxCategories',
            'bankAccounts',
            'nextReference',
            'defaultTerms',
            'defaultFooter'
        ));
    }

    public function update(UpdateQuoteRequest $request, Quote $quote)
    {
        $this->authorize('update', $quote);

        abort_unless($quote->status === 'draft', 403, 'Seuls les devis en brouillon peuvent être modifiés.');

        $this->quoteService->update($quote, $request->validated());

        \App\Services\Reports\ReportService::flushTenantCache();

        return redirect()->route('bo.sales.quotes.show', $quote)
            ->with('success', __('Devis mis à jour avec succès.'));
    }

    public function destroy(Quote $quote)
    {
        $this->authorize('delete', $quote);

        $quote->items()->delete();
        $quote->charges()->delete();
        $quote->delete();

        \App\Services\Reports\ReportService::flushTenantCache();

        return redirect()->route('bo.sales.quotes.index')
            ->with('success', __('Devis supprimé avec succès.'));
    }

    public function download(Quote $quote, PdfService $pdfService)
    {
        $this->authorize('view', $quote);

        return $pdfService->quoteResponse($quote, 'download');
    }

    public function stream(Quote $quote, PdfService $pdfService)
    {
        $this->authorize('view', $quote);

        return $pdfService->quoteResponse($quote, 'inline');
    }

    public function send(Quote $quote)
    {
        $this->authorize('update', $quote);

        $this->quoteService->transition($quote, 'sent');
        $quote->update(['sent_at' => now()]);

        dispatch(new SendQuoteEmailJob(
            quoteId: $quote->id,
            tenantId: TenantContext::id(),
        ));

        return redirect()->route('bo.sales.quotes.show', $quote)
            ->with('success', __('Devis envoyé au client par email.'));
    }

    public function convertToInvoice(Quote $quote)
    {
        $this->authorize('update', $quote);

        abort_unless(
            in_array($quote->status, ['sent', 'accepted']),
            403,
            'Seuls les devis envoyés ou acceptés peuvent être convertis en facture.'
        );

        $invoice = $this->quoteService->convertToInvoice($quote);

        \App\Services\Reports\ReportService::flushTenantCache();

        return redirect()->route('bo.sales.invoices.show', $invoice)
            ->with('success', __('Devis converti en facture avec succès.'));
    }
}
