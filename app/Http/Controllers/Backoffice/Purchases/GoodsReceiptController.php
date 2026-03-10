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

        $receipts = GoodsReceipt::query()
            ->with(['purchaseOrder', 'warehouse', 'creator'])
            ->when($request->search, fn($q, $s) => $q->where(function ($q) use ($s) {
                $q->where('number', 'like', "%{$s}%")
                    ->orWhere('reference_number', 'like', "%{$s}%");
            }))
            ->when($request->status, fn($q, $s) => $q->where('status', $s))
            ->latest('received_at')
            ->paginate($request->input('per_page', 15))
            ->withQueryString();

        return view('backoffice.purchases.goods-receipts.index', compact('receipts'));
    }

    public function create()
    {
        $this->authorize('create', GoodsReceipt::class);

        $purchaseOrders = PurchaseOrder::where('status', 'confirmed')->with('supplier')->orderBy('order_date', 'desc')->get();
        $warehouses = Warehouse::where('is_active', true)->orderBy('name')->get();
        $products = Product::where('item_type', 'product')->orderBy('name')->get();

        $nextReference = app(DocumentNumberService::class)->preview('receipt_ref');

        return view('backoffice.purchases.goods-receipts.create', compact('purchaseOrders', 'warehouses', 'products', 'nextReference'));
    }

    public function store(StoreGoodsReceiptRequest $request)
    {
        $this->authorize('create', GoodsReceipt::class);

        $receipt = $this->goodsReceiptService->create($request->validated());

        return redirect()->route('bo.purchases.goods-receipts.show', $receipt)
            ->with('success', 'Réception de marchandises enregistrée avec succès.');
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
            ->with('success', 'Réception de marchandises mise à jour avec succès.');
    }

    public function destroy(GoodsReceipt $goodsReceipt)
    {
        $this->authorize('delete', $goodsReceipt);

        $goodsReceipt->items()->delete();
        $goodsReceipt->delete();

        return redirect()->route('bo.purchases.goods-receipts.index')
            ->with('success', 'Réception de marchandises supprimée avec succès.');
    }

    public function download(GoodsReceipt $goodsReceipt, PdfService $pdfService)
    {
        abort_unless(auth()->user()->can('purchases.goods_receipts.view'), 403);

        return $pdfService->goodsReceiptResponse($goodsReceipt, 'download');
    }
}
