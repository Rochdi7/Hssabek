<?php

namespace App\Http\Controllers\Backoffice\Purchases;

use App\Http\Controllers\Controller;
use App\Http\Requests\Purchases\Store\StoreVendorBillRequest;
use App\Http\Requests\Purchases\Update\UpdateVendorBillRequest;
use App\Models\Purchases\PurchaseOrder;
use App\Models\Purchases\Supplier;
use App\Models\Purchases\VendorBill;
use App\Services\Sales\PdfService;
use App\Models\Finance\BankAccount;
use App\Services\System\DocumentNumberService;
use App\Services\Tenancy\TenantContext;
use Illuminate\Http\Request;

class VendorBillController extends Controller
{
    public function __construct(
        private DocumentNumberService $docNumberService,
    ) {}

    public function index(Request $request)
    {
        $this->authorize('viewAny', VendorBill::class);

        $query = VendorBill::query()
            ->with('supplier');

        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('number', 'like', "%{$search}%")
                    ->orWhere('reference_number', 'like', "%{$search}%")
                    ->orWhereHas('supplier', fn ($sq) => $sq->where('name', 'like', "%{$search}%"));
            });
        }

        if ($status = $request->input('status')) {
            $query->where('status', $status);
        }

        $vendorBills = $query->latest()->paginate($request->input('per_page', 15))->withQueryString();

        return view('backoffice.purchases.vendor-bills.index', compact('vendorBills'));
    }

    public function create(Request $request)
    {
        $this->authorize('create', VendorBill::class);

        $suppliers = Supplier::where('status', 'active')->orderBy('name')->get();
        $purchaseOrders = PurchaseOrder::where('status', 'received')
            ->doesntHave('vendorBills')
            ->orderBy('number')
            ->get();

        $selectedPO = null;
        if ($poId = $request->input('purchase_order_id')) {
            $selectedPO = PurchaseOrder::with('supplier', 'items')->find($poId);
        }

        $nextReference = $this->docNumberService->preview('vendor_bill_ref');

        $bankAccounts = BankAccount::where('is_active', true)->orderBy('bank_name')->get();
        $invoiceSettings = TenantContext::get()->settings->invoice_settings ?? [];
        $defaultTerms = $invoiceSettings['invoice_terms'] ?? '';
        $defaultFooter = $invoiceSettings['invoice_footer'] ?? '';

        return view('backoffice.purchases.vendor-bills.create', compact('suppliers', 'purchaseOrders', 'selectedPO', 'nextReference', 'bankAccounts', 'defaultTerms', 'defaultFooter'));
    }

    public function store(StoreVendorBillRequest $request)
    {
        $this->authorize('create', VendorBill::class);

        $validated = $request->validated();

        $bill = VendorBill::create(array_merge($validated, [
            'number'      => $this->docNumberService->next('vendor_bill'),
            'status'      => 'draft',
            'tax_total'   => $validated['tax_total'] ?? 0,
            'amount_paid' => 0,
            'amount_due'  => $validated['total'],
        ]));

        return redirect()->route('bo.purchases.vendor-bills.show', $bill)
            ->with('success', 'Facture fournisseur créée avec succès.');
    }

    public function show(VendorBill $vendorBill)
    {
        $this->authorize('view', $vendorBill);

        $vendorBill->load(['supplier', 'purchaseOrder', 'payments']);

        return view('backoffice.purchases.vendor-bills.show', compact('vendorBill'));
    }

    public function edit(VendorBill $vendorBill)
    {
        $this->authorize('update', $vendorBill);
        abort_unless($vendorBill->status === 'draft', 403, 'Seules les factures en brouillon peuvent être modifiées.');

        $suppliers = Supplier::where('status', 'active')->orderBy('name')->get();

        $nextReference = $this->docNumberService->preview('vendor_bill_ref');

        $bankAccounts = BankAccount::where('is_active', true)->orderBy('bank_name')->get();
        $invoiceSettings = TenantContext::get()->settings->invoice_settings ?? [];
        $defaultTerms = $invoiceSettings['invoice_terms'] ?? '';
        $defaultFooter = $invoiceSettings['invoice_footer'] ?? '';

        return view('backoffice.purchases.vendor-bills.edit', compact('vendorBill', 'suppliers', 'nextReference', 'bankAccounts', 'defaultTerms', 'defaultFooter'));
    }

    public function update(UpdateVendorBillRequest $request, VendorBill $vendorBill)
    {
        $this->authorize('update', $vendorBill);
        abort_unless($vendorBill->status === 'draft', 403, 'Seules les factures en brouillon peuvent être modifiées.');

        $validated = $request->validated();

        $vendorBill->update(array_merge($validated, [
            'tax_total'  => $validated['tax_total'] ?? 0,
            'amount_due' => $validated['total'] - $vendorBill->amount_paid,
        ]));

        return redirect()->route('bo.purchases.vendor-bills.show', $vendorBill)
            ->with('success', 'Facture fournisseur mise à jour avec succès.');
    }

    public function destroy(VendorBill $vendorBill)
    {
        $this->authorize('delete', $vendorBill);
        $vendorBill->delete();

        return redirect()->route('bo.purchases.vendor-bills.index')
            ->with('success', 'Facture fournisseur supprimée avec succès.');
    }

    public function download(VendorBill $vendorBill, PdfService $pdfService)
    {
        abort_unless(auth()->user()->can('purchases.vendor-bills.view'), 403);

        return $pdfService->vendorBillResponse($vendorBill, 'download');
    }
}
