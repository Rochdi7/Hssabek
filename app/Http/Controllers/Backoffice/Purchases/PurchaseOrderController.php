<?php

namespace App\Http\Controllers\Backoffice\Purchases;

use App\Http\Controllers\Controller;
use App\Http\Requests\Purchases\Store\StorePurchaseOrderRequest;
use App\Http\Requests\Purchases\Update\UpdatePurchaseOrderRequest;
use App\Models\Catalog\Product;
use App\Models\Catalog\TaxGroup;
use App\Models\Finance\BankAccount;
use App\Models\Purchases\PurchaseOrder;
use App\Models\Purchases\Supplier;
use App\Services\Purchases\PurchaseOrderService;
use App\Services\Sales\PdfService;
use App\Services\System\DocumentNumberService;
use Illuminate\Http\Request;

class PurchaseOrderController extends Controller
{
    public function __construct(
        private readonly PurchaseOrderService $purchaseOrderService,
    ) {}

    public function index(Request $request)
    {
        $this->authorize('viewAny', PurchaseOrder::class);

        $query = PurchaseOrder::query()
            ->with('supplier');

        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('number', 'like', "%{$search}%")
                    ->orWhere('reference_number', 'like', "%{$search}%")
                    ->orWhereHas('supplier', fn($sq) => $sq->where('name', 'like', "%{$search}%"));
            });
        }

        if ($status = $request->input('status')) {
            $query->where('status', $status);
        }

        $purchaseOrders = $query->latest()->paginate(15)->withQueryString();

        return view('backoffice.purchases.purchase-orders.index', compact('purchaseOrders'));
    }

    public function create()
    {
        $this->authorize('create', PurchaseOrder::class);

        $suppliers = Supplier::where('status', 'active')->orderBy('name')->get();
        $products = Product::orderBy('name')->get();
        $taxGroups = TaxGroup::orderBy('name')->get();
        $bankAccounts = BankAccount::where('is_active', true)->orderBy('bank_name')->get();
        $nextNumber = app(DocumentNumberService::class)->preview('purchase_order');

        return view('backoffice.purchases.purchase-orders.create', compact('suppliers', 'products', 'taxGroups', 'bankAccounts', 'nextNumber'));
    }

    public function store(StorePurchaseOrderRequest $request)
    {
        $this->authorize('create', PurchaseOrder::class);

        $po = $this->purchaseOrderService->create($request->validated());

        return redirect()->route('bo.purchases.purchase-orders.show', $po)
            ->with('success', 'Bon de commande créé avec succès.');
    }

    public function show(PurchaseOrder $purchaseOrder)
    {
        $this->authorize('view', $purchaseOrder);

        $purchaseOrder->load(['supplier', 'items.product', 'goodsReceipts']);

        return view('backoffice.purchases.purchase-orders.show', compact('purchaseOrder'));
    }

    public function edit(PurchaseOrder $purchaseOrder)
    {
        $this->authorize('update', $purchaseOrder);

        abort_unless(in_array($purchaseOrder->status, ['draft']), 403, 'Seuls les bons de commande en brouillon peuvent être modifiés.');

        $purchaseOrder->load('items');
        $suppliers = Supplier::where('status', 'active')->orderBy('name')->get();
        $products = Product::orderBy('name')->get();
        $taxGroups = TaxGroup::orderBy('name')->get();
        $bankAccounts = BankAccount::where('is_active', true)->orderBy('bank_name')->get();

        return view('backoffice.purchases.purchase-orders.edit', compact('purchaseOrder', 'suppliers', 'products', 'taxGroups', 'bankAccounts'));
    }

    public function update(UpdatePurchaseOrderRequest $request, PurchaseOrder $purchaseOrder)
    {
        $this->authorize('update', $purchaseOrder);

        $this->purchaseOrderService->update($purchaseOrder, $request->validated());

        return redirect()->route('bo.purchases.purchase-orders.show', $purchaseOrder)
            ->with('success', 'Bon de commande mis à jour avec succès.');
    }

    public function destroy(PurchaseOrder $purchaseOrder)
    {
        $this->authorize('delete', $purchaseOrder);
        $purchaseOrder->items()->delete();
        $purchaseOrder->delete();

        return redirect()->route('bo.purchases.purchase-orders.index')
            ->with('success', 'Bon de commande supprimé avec succès.');
    }

    public function receive(Request $request, PurchaseOrder $purchaseOrder)
    {
        $this->authorize('update', $purchaseOrder);

        abort_unless(
            in_array($purchaseOrder->status, ['draft', 'sent', 'confirmed', 'partially_received']),
            422,
            'Ce bon de commande ne peut pas être réceptionné dans son état actuel.'
        );

        $purchaseOrder->load('items');

        $this->purchaseOrderService->receive($purchaseOrder);

        return redirect()->route('bo.purchases.purchase-orders.show', $purchaseOrder)
            ->with('success', 'Marchandises réceptionnées avec succès.');
    }

    public function download(PurchaseOrder $purchaseOrder, PdfService $pdfService)
    {
        $this->authorize('view', $purchaseOrder);

        return $pdfService->purchaseOrderResponse($purchaseOrder, 'download');
    }

    public function stream(PurchaseOrder $purchaseOrder, PdfService $pdfService)
    {
        $this->authorize('view', $purchaseOrder);

        return $pdfService->purchaseOrderResponse($purchaseOrder, 'inline');
    }

    public function cancel(PurchaseOrder $purchaseOrder)
    {
        $this->authorize('update', $purchaseOrder);

        $this->purchaseOrderService->transition($purchaseOrder, 'cancelled');

        return redirect()->route('bo.purchases.purchase-orders.show', $purchaseOrder)
            ->with('success', 'Bon de commande annulé.');
    }
}
