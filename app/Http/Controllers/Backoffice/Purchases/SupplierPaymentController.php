<?php

namespace App\Http\Controllers\Backoffice\Purchases;

use App\Http\Controllers\Controller;
use App\Http\Requests\Purchases\Store\StoreSupplierPaymentRequest;
use App\Models\Finance\BankAccount;
use App\Models\Purchases\Supplier;
use App\Models\Purchases\SupplierPayment;
use App\Models\Purchases\VendorBill;
use App\Models\Sales\PaymentMethod;
use App\Services\Purchases\SupplierPaymentService;
use App\Services\Sales\PdfService;
use App\Services\System\DocumentNumberService;
use Illuminate\Http\Request;

class SupplierPaymentController extends Controller
{
    public function __construct(
        private readonly SupplierPaymentService $service,
    ) {}

    public function index(Request $request)
    {
        $this->authorize('viewAny', SupplierPayment::class);

        $payments = SupplierPayment::query()
            ->with(['supplier', 'allocations.vendorBill'])
            ->when($request->search, fn($q, $s) => $q->where(function ($q) use ($s) {
                $q->where('reference_number', 'like', "%{$s}%")
                    ->orWhereHas('supplier', fn($sq) => $sq->where('name', 'like', "%{$s}%"));
            }))
            ->when($request->status, fn($q, $s) => $q->where('status', $s))
            ->latest('payment_date')
            ->paginate($request->input('per_page', 15))
            ->withQueryString();

        return view('backoffice.purchases.supplier-payments.index', compact('payments'));
    }

    public function create()
    {
        $this->authorize('create', SupplierPayment::class);

        $suppliers = Supplier::orderBy('name')->get();
        $vendorBills = VendorBill::where('amount_due', '>', 0)
            ->whereNotIn('status', ['paid', 'void'])
            ->with('supplier')
            ->orderBy('issue_date')
            ->get();
        $bankAccounts = BankAccount::where('is_active', true)->orderBy('bank_name')->get();
        $paymentMethods = PaymentMethod::where('is_active', true)->orderBy('name')->get();

        $nextReference = app(DocumentNumberService::class)->preview('supplier_payment_ref');

        return view('backoffice.purchases.supplier-payments.create', compact('suppliers', 'vendorBills', 'bankAccounts', 'paymentMethods', 'nextReference'));
    }

    public function store(StoreSupplierPaymentRequest $request)
    {
        $this->authorize('create', SupplierPayment::class);

        $this->service->create($request->validated());

        return redirect()->route('bo.purchases.supplier-payments.index')
            ->with('success', 'Paiement fournisseur enregistré avec succès.');
    }

    public function destroy(SupplierPayment $supplierPayment)
    {
        $this->authorize('delete', $supplierPayment);

        $this->service->delete($supplierPayment);

        return redirect()->route('bo.purchases.supplier-payments.index')
            ->with('success', 'Paiement fournisseur supprimé avec succès.');
    }

    public function download(SupplierPayment $supplierPayment, PdfService $pdfService)
    {
        abort_unless(auth()->user()->can('purchases.supplier_payments.view'), 403);

        return $pdfService->supplierPaymentReceiptResponse($supplierPayment, 'download');
    }
}
