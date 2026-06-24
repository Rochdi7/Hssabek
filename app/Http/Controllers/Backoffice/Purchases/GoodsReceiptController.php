<?php

namespace App\Http\Controllers\Backoffice\Purchases;

use App\Http\Controllers\Controller;
use App\Http\Requests\Purchases\Store\StoreGoodsReceiptRequest;
use App\Http\Requests\Purchases\Update\UpdateGoodsReceiptRequest;
use App\Models\Catalog\Product;
use App\Models\Inventory\Warehouse;
use App\Models\Purchases\GoodsReceipt;
use App\Models\Purchases\PurchaseOrder;
use App\Services\Purchases\GoodsReceiptService;
use App\Services\Sales\PdfService;
use App\Services\System\DocumentNumberService;
use Illuminate\Http\Request;

class GoodsReceiptController extends Controller
{
    public function __construct(
        private readonly GoodsReceiptService $goodsReceiptService,
    ) {}

    public function index(Request $request)
    {
        $this->authorize('viewAny', GoodsReceipt::class);

        $goodsReceipts = GoodsReceipt::query()
            ->with(['purchaseOrder', 'warehouse', 'creator'])
            ->when($request->search, fn($q, $s) => $q->where(function ($q) use ($s) {
                $q->where('number', 'like', "%{$s}%")
                    ->orWhere('reference_number', 'like', "%{$s}%");
            }))
            ->when($request->status, fn($q, $s) => $q->where('status', $s))
            ->latest('received_at')
            ->paginate($request->input('per_page', 15))
            ->withQueryString();

        return view('backoffice.purchases.goods-receipts.index', compact('goodsReceipts'));
    }

    public function create(Request $request)
    {
        $this->authorize('create', GoodsReceipt::class);

        $purchaseOrders = PurchaseOrder::receivable()->with('supplier')->orderBy('order_date', 'desc')->get();
        $warehouses = Warehouse::where('is_active', true)->orderBy('name')->get();
        $products = Product::where('item_type', 'product')->orderBy('name')->get();

        // Pre-selected PO (e.g. from the PO show page): expose its remaining lines.
        $selectedPurchaseOrder = null;
        if ($request->filled('purchase_order_id')) {
            $selectedPurchaseOrder = PurchaseOrder::with('items.product')->find($request->purchase_order_id);
        }

        $nextReference = app(DocumentNumberService::class)->preview('receipt_ref');

        return view('backoffice.purchases.goods-receipts.create', compact('purchaseOrders', 'warehouses', 'products', 'nextReference', 'selectedPurchaseOrder'));
    }

    /**
     * JSON: receivable lines of a purchase order (ordered / received / remaining)
     * for the receipt form to load when a PO is selected.
     */
    public function purchaseOrderLines(PurchaseOrder $purchaseOrder)
    {
        $this->authorize('create', GoodsReceipt::class);

        $purchaseOrder->load('items.product');

        // Only catalog-product lines are receivable: a receipt moves stock, and
        // label-only PO lines (product_id = null) have no product to stock.
        $lines = $purchaseOrder->items
            ->filter(fn ($item) => !is_null($item->product_id))
            ->map(function ($item) {
                $ordered = (float) $item->quantity;
                $received = (float) $item->received_quantity;
                $remaining = max($ordered - $received, 0);

                return [
                    'purchase_order_item_id' => $item->id,
                    'product_id'             => $item->product_id,
                    'product_name'           => $item->product->name ?? $item->label,
                    'unit_cost'              => (float) $item->unit_cost,
                    'tax_rate'               => (float) $item->tax_rate,
                    'tax_group_id'           => $item->tax_group_id,
                    'ordered'                => $ordered,
                    'received'               => $received,
                    'remaining'              => $remaining,
                ];
            })->values();

        return response()->json([
            'warehouse_id'      => $purchaseOrder->warehouse_id,
            'lines'             => $lines,
            'has_product_lines' => $lines->isNotEmpty(),
        ]);
    }

    public function store(StoreGoodsReceiptRequest $request)
    {
        $this->authorize('create', GoodsReceipt::class);

        $validated = $request->validated();
        if (empty($validated['reference_number'])) {
            $validated['reference_number'] = app(DocumentNumberService::class)->next('receipt_ref');
        }

        $receipt = $this->goodsReceiptService->create($validated);

        return redirect()->route('bo.purchases.goods-receipts.show', $receipt)
            ->with('success', __('Réception de marchandises enregistrée avec succès.'));
    }

    public function show(GoodsReceipt $goodsReceipt)
    {
        $this->authorize('view', $goodsReceipt);

        $goodsReceipt->load(['purchaseOrder', 'warehouse', 'items.product', 'creator']);

        return view('backoffice.purchases.goods-receipts.show', compact('goodsReceipt'));
    }

    public function edit(GoodsReceipt $goodsReceipt)
    {
        $this->authorize('update', $goodsReceipt);

        $purchaseOrders = PurchaseOrder::with('supplier')->orderBy('order_date', 'desc')->get();
        $warehouses = Warehouse::where('is_active', true)->orderBy('name')->get();
        $products = Product::where('item_type', 'product')->orderBy('name')->get();
        $goodsReceipt->load('items');

        $nextReference = app(DocumentNumberService::class)->preview('receipt_ref');

        return view('backoffice.purchases.goods-receipts.edit', compact('goodsReceipt', 'purchaseOrders', 'warehouses', 'products', 'nextReference'));
    }

    public function update(UpdateGoodsReceiptRequest $request, GoodsReceipt $goodsReceipt)
    {
        $this->authorize('update', $goodsReceipt);

        $this->goodsReceiptService->update($goodsReceipt, $request->validated());

        return redirect()->route('bo.purchases.goods-receipts.show', $goodsReceipt)
            ->with('success', __('Réception de marchandises mise à jour avec succès.'));
    }

    public function destroy(GoodsReceipt $goodsReceipt)
    {
        $this->authorize('delete', $goodsReceipt);

        $goodsReceipt->items()->delete();
        $goodsReceipt->delete();

        return redirect()->route('bo.purchases.goods-receipts.index')
            ->with('success', __('Réception de marchandises supprimée avec succès.'));
    }

    public function confirm(GoodsReceipt $goodsReceipt)
    {
        $this->authorize('update', $goodsReceipt);

        try {
            $this->goodsReceiptService->confirm($goodsReceipt);
        } catch (\LogicException $e) {
            return back()->with('error', $e->getMessage());
        }

        return redirect()->route('bo.purchases.goods-receipts.show', $goodsReceipt)
            ->with('success', __('Réception confirmée — le stock a été mis à jour.'));
    }

    public function download(GoodsReceipt $goodsReceipt, PdfService $pdfService)
    {
        abort_unless(auth()->user()->can('purchases.goods_receipts.view'), 403);

        return $pdfService->goodsReceiptResponse($goodsReceipt, 'download');
    }
}
