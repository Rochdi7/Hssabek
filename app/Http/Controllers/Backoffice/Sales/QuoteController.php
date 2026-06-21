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
use App\Models\Sales\Quote;
use App\Services\Sales\PdfService;
use App\Services\Sales\QuoteService;
use App\Services\System\DocumentNumberService;
use App\Services\Tenancy\TenantContext;
use App\Support\Sales\QuoteDocumentType;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    public function __construct(
        private readonly QuoteService $quoteService,
    ) {}

    public function index(Request $request)
    {
        $documentConfig = $this->documentConfig($request);

        $this->authorize('viewAny', Quote::class);

        $query = $this->quoteQuery($documentConfig['type'])->with('customer');

        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('number', 'like', "%{$search}%")
                    ->orWhereHas('customer', fn ($customerQuery) => $customerQuery->where('name', 'like', "%{$search}%"));
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

        $quotes = $query
            ->latest('issue_date')
            ->paginate($request->input('per_page', 15))
            ->withQueryString();

        $summary = [
            'total' => $this->quoteQuery($documentConfig['type'])->count(),
            'accepted' => $this->quoteQuery($documentConfig['type'])->where('status', 'accepted')->count(),
            'sent' => $this->quoteQuery($documentConfig['type'])->where('status', 'sent')->count(),
            'expired' => $this->quoteQuery($documentConfig['type'])->where('status', 'expired')->count(),
        ];

        return view('backoffice.sales.quotes.index', compact('quotes', 'documentConfig', 'summary'));
    }

    public function create(Request $request)
    {
        $documentConfig = $this->documentConfig($request);

        $this->authorize('create', Quote::class);

        return view('backoffice.sales.quotes.create', array_merge(
            $this->formViewData(),
            compact('documentConfig')
        ));
    }

    public function store(StoreQuoteRequest $request)
    {
        $documentConfig = $this->documentConfig($request);

        $this->authorize('create', Quote::class);

        $this->quoteService->create($request->validated(), $documentConfig['type']);

        \App\Services\Reports\ReportService::flushTenantCache();

        return redirect()->route($this->routeName($documentConfig, 'index'))
            ->with('success', $documentConfig['create_success']);
    }

    public function show(Request $request, Quote $quote)
    {
        $documentConfig = $this->documentConfig($request);
        $quote = $this->ensureDocumentType($quote, $documentConfig['type']);

        $this->authorize('view', $quote);

        $quote->load([
            'customer',
            'items.product',
            'items.unit',
            'items.taxGroup',
            'charges',
            'invoices',
        ]);

        return view('backoffice.sales.quotes.show', compact('quote', 'documentConfig'));
    }

    public function edit(Request $request, Quote $quote)
    {
        $documentConfig = $this->documentConfig($request);
        $quote = $this->ensureDocumentType($quote, $documentConfig['type']);

        $this->authorize('update', $quote);

        abort_unless($quote->status === 'draft', 403, 'Seuls les documents en brouillon peuvent être modifiés.');

        $quote->load(['items', 'charges']);

        return view('backoffice.sales.quotes.edit', array_merge(
            $this->formViewData(),
            compact('quote', 'documentConfig')
        ));
    }

    public function update(UpdateQuoteRequest $request, Quote $quote)
    {
        $documentConfig = $this->documentConfig($request);
        $quote = $this->ensureDocumentType($quote, $documentConfig['type']);

        $this->authorize('update', $quote);

        abort_unless($quote->status === 'draft', 403, 'Seuls les documents en brouillon peuvent être modifiés.');

        $this->quoteService->update($quote, $request->validated());

        \App\Services\Reports\ReportService::flushTenantCache();

        return redirect()->route($this->routeName($documentConfig, 'show'), $quote)
            ->with('success', $documentConfig['update_success']);
    }

    public function destroy(Request $request, Quote $quote)
    {
        $documentConfig = $this->documentConfig($request);
        $quote = $this->ensureDocumentType($quote, $documentConfig['type']);

        $this->authorize('delete', $quote);

        $quote->items()->delete();
        $quote->charges()->delete();
        $quote->delete();

        \App\Services\Reports\ReportService::flushTenantCache();

        return redirect()->route($this->routeName($documentConfig, 'index'))
            ->with('success', $documentConfig['delete_success']);
    }

    public function download(Request $request, Quote $quote, PdfService $pdfService)
    {
        $documentConfig = $this->documentConfig($request);
        $quote = $this->ensureDocumentType($quote, $documentConfig['type']);

        $this->authorize('view', $quote);

        return $pdfService->quoteResponse($quote, 'download');
    }

    public function stream(Request $request, Quote $quote, PdfService $pdfService)
    {
        $documentConfig = $this->documentConfig($request);
        $quote = $this->ensureDocumentType($quote, $documentConfig['type']);

        $this->authorize('view', $quote);

        return $pdfService->quoteResponse($quote, 'inline');
    }

    public function send(Request $request, Quote $quote)
    {
        $documentConfig = $this->documentConfig($request);
        $quote = $this->ensureDocumentType($quote, $documentConfig['type']);

        $this->authorize('update', $quote);

        $this->quoteService->transition($quote, 'sent');
        $quote->update(['sent_at' => now()]);

        dispatch(new SendQuoteEmailJob(
            quoteId: $quote->id,
            tenantId: TenantContext::id(),
        ));

        return redirect()->route($this->routeName($documentConfig, 'show'), $quote)
            ->with('success', $documentConfig['send_success']);
    }

    public function changeStatus(Request $request, Quote $quote)
    {
        $documentConfig = $this->documentConfig($request);
        $quote = $this->ensureDocumentType($quote, $documentConfig['type']);

        $this->authorize('update', $quote);

        $statuses = ['draft', 'sent', 'accepted', 'rejected', 'expired', 'cancelled'];
        $newStatus = $request->input('status');

        abort_unless(in_array($newStatus, $statuses, true), 422);

        $updates = ['status' => $newStatus];
        if ($newStatus === 'accepted' && !$quote->accepted_at) {
            $updates['accepted_at'] = now();
        }
        if ($newStatus === 'sent' && !$quote->sent_at) {
            $updates['sent_at'] = now();
        }

        $quote->update($updates);
        \App\Services\Reports\ReportService::flushTenantCache();

        return redirect()->route($this->routeName($documentConfig, 'show'), $quote)
            ->with('success', $documentConfig['status_success']);
    }

    public function convertToInvoice(Request $request, Quote $quote)
    {
        $documentConfig = $this->documentConfig($request);
        $quote = $this->ensureDocumentType($quote, $documentConfig['type']);

        $this->authorize('update', $quote);

        abort_unless(
            in_array($quote->status, ['sent', 'accepted'], true),
            403,
            'Seuls les documents envoyés ou acceptés peuvent être convertis en facture.'
        );

        $invoice = $this->quoteService->convertToInvoice($quote);

        \App\Services\Reports\ReportService::flushTenantCache();

        return redirect()->route('bo.sales.invoices.show', $invoice)
            ->with('success', $documentConfig['convert_success']);
    }

    private function formViewData(): array
    {
        $customers = Customer::orderBy('name')->get();
        $products = Product::orderBy('name')->get();
        $units = Unit::orderBy('name')->get();
        $taxGroups = TaxGroup::with('rates')->orderBy('name')->get();
        $taxCategories = TaxCategory::where('is_active', true)->orderBy('name')->get();
        $bankAccounts = collect();
        $nextReference = app(DocumentNumberService::class)->preview('quote_ref');

        $invoiceSettings = TenantContext::get()->settings->invoice_settings ?? [];
        $defaultTerms = $invoiceSettings['invoice_terms'] ?? '';
        $defaultFooter = $invoiceSettings['invoice_footer'] ?? '';

        return compact(
            'customers',
            'products',
            'units',
            'taxGroups',
            'taxCategories',
            'bankAccounts',
            'nextReference',
            'defaultTerms',
            'defaultFooter'
        );
    }

    private function documentConfig(Request $request): array
    {
        return QuoteDocumentType::resolve((string) $request->route('quote_document_type'));
    }

    private function ensureDocumentType(Quote $quote, string $documentType): Quote
    {
        abort_unless($quote->isDocumentType($documentType), 404);

        return $quote;
    }

    private function quoteQuery(string $documentType)
    {
        return Quote::query()->ofDocumentType($documentType);
    }

    private function routeName(array $documentConfig, string $suffix): string
    {
        return $documentConfig['route_base'] . '.' . $suffix;
    }
}
