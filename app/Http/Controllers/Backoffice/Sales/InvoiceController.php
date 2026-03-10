<?php

namespace App\Http\Controllers\Backoffice\Sales;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sales\Store\StoreInvoiceRequest;
use App\Http\Requests\Sales\Update\UpdateInvoiceRequest;
use App\Jobs\SendInvoiceEmailJob;
use App\Models\Catalog\Product;
use App\Models\Catalog\TaxGroup;
use App\Models\Catalog\Unit;
use App\Models\CRM\Customer;
use App\Models\Finance\BankAccount;
use App\Models\Sales\Invoice;
use App\Models\Sales\PaymentMethod;
use App\Models\Tenancy\Signature;
use App\Services\Sales\InvoiceService;
use App\Services\Sales\PdfService;
use App\Services\System\DocumentNumberService;
use App\Services\Tenancy\TenantContext;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function __construct(
        private InvoiceService $invoiceService,
    ) {}

    public function index(Request $request)
    {
        $this->authorize('viewAny', Invoice::class);

        $query = Invoice::with('customer');

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

        $invoices = $query->latest('issue_date')->paginate($request->input('per_page', 15))->withQueryString();

        return view('backoffice.sales.invoices.index', compact('invoices'));
    }

    public function create()
    {
        $this->authorize('create', Invoice::class);

        $tenant = TenantContext::get();
        $settings = $tenant->settings;
        $invoiceSettings = $settings->invoice_settings ?? [];

        $customers = Customer::orderBy('name')->get();
        $products = Product::orderBy('name')->get();
        $units = Unit::orderBy('name')->get();
        $taxGroups = TaxGroup::with('rates')->orderBy('name')->get();
        $paymentMethods = PaymentMethod::orderBy('name')->get();
        $bankAccounts = BankAccount::where('is_active', true)->orderBy('bank_name')->get();
        $signatures = Signature::where('status', true)->orderBy('name')->get();
        $defaultSignature = $signatures->firstWhere('is_default', true);

        $nextReference = app(DocumentNumberService::class)->preview('invoice_ref');

        return view('backoffice.sales.invoices.create', compact(
            'customers',
            'products',
            'units',
            'taxGroups',
            'paymentMethods',
            'bankAccounts',
            'signatures',
            'defaultSignature',
            'tenant',
            'invoiceSettings',
            'nextReference'
        ));
    }

    public function store(StoreInvoiceRequest $request)
    {
        $this->authorize('create', Invoice::class);

        $this->invoiceService->create($request->validated());

        \App\Services\Reports\ReportService::flushTenantCache();

        return redirect()->route('bo.sales.invoices.index')
            ->with('success', 'Facture créée avec succès.');
    }

    public function show(Invoice $invoice)
    {
        $this->authorize('view', $invoice);

        $invoice->load([
            'customer',
            'items.product',
            'items.unit',
            'items.taxGroup',
            'charges',
            'paymentAllocations.payment.paymentMethod',
            'creditNoteApplications.creditNote',
        ]);

        return view('backoffice.sales.invoices.show', compact('invoice'));
    }

    public function edit(Invoice $invoice)
    {
        $this->authorize('update', $invoice);

        abort_unless($invoice->status === 'draft', 403, 'Seules les factures en brouillon peuvent être modifiées.');

        $invoice->load(['items', 'charges']);

        $tenant = TenantContext::get();
        $settings = $tenant->settings;
        $invoiceSettings = $settings->invoice_settings ?? [];

        $customers = Customer::orderBy('name')->get();
        $products = Product::orderBy('name')->get();
        $units = Unit::orderBy('name')->get();
        $taxGroups = TaxGroup::with('rates')->orderBy('name')->get();
        $bankAccounts = BankAccount::where('is_active', true)->orderBy('bank_name')->get();
        $signatures = Signature::where('status', true)->orderBy('name')->get();
        $defaultSignature = $signatures->firstWhere('is_default', true);

        $nextReference = app(DocumentNumberService::class)->preview('invoice_ref');

        return view('backoffice.sales.invoices.edit', compact(
            'invoice',
            'customers',
            'products',
            'units',
            'taxGroups',
            'bankAccounts',
            'signatures',
            'defaultSignature',
            'tenant',
            'invoiceSettings',
            'nextReference'
        ));
    }

    public function update(UpdateInvoiceRequest $request, Invoice $invoice)
    {
        $this->authorize('update', $invoice);

        abort_unless($invoice->status === 'draft', 403, 'Seules les factures en brouillon peuvent être modifiées.');

        $this->invoiceService->update($invoice, $request->validated());

        \App\Services\Reports\ReportService::flushTenantCache();

        return redirect()->route('bo.sales.invoices.show', $invoice)
            ->with('success', 'Facture mise à jour avec succès.');
    }

    public function destroy(Invoice $invoice)
    {
        $this->authorize('delete', $invoice);

        $invoice->items()->delete();
        $invoice->charges()->delete();
        $invoice->delete();

        \App\Services\Reports\ReportService::flushTenantCache();

        return redirect()->route('bo.sales.invoices.index')
            ->with('success', 'Facture supprimée avec succès.');
    }

    public function download(Invoice $invoice, PdfService $pdfService)
    {
        $this->authorize('view', $invoice);

        return $pdfService->invoiceResponse($invoice, 'download');
    }

    public function stream(Invoice $invoice, PdfService $pdfService)
    {
        $this->authorize('view', $invoice);

        return $pdfService->invoiceResponse($invoice, 'inline');
    }

    public function send(Invoice $invoice)
    {
        $this->authorize('update', $invoice);

        $this->invoiceService->transition($invoice, 'sent');
        $invoice->update(['sent_at' => now()]);

        dispatch(new SendInvoiceEmailJob(
            invoiceId: $invoice->id,
            tenantId: TenantContext::id(),
        ));

        return redirect()->route('bo.sales.invoices.show', $invoice)
            ->with('success', 'Facture envoyée au client par email.');
    }

    public function void(Invoice $invoice)
    {
        $this->authorize('update', $invoice);

        $this->invoiceService->transition($invoice, 'void');

        \App\Services\Reports\ReportService::flushTenantCache();

        return redirect()->route('bo.sales.invoices.show', $invoice)
            ->with('success', 'Facture annulée avec succès.');
    }
}
