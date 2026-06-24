<?php

namespace App\Http\Controllers\Backoffice\Inventory;

use App\Http\Controllers\Controller;
use App\Models\Inventory\ProductStock;
use App\Models\Inventory\Warehouse;
use App\Models\Sales\DeliveryChallanItem;
use Illuminate\Http\Request;

class ProductStockController extends Controller
{
    public function index(Request $request)
    {
        $stocks = ProductStock::query()
            ->with(['product.unit', 'warehouse'])
            ->when($request->warehouse_id, fn($q, $w) => $q->where('warehouse_id', $w))
            ->when($request->low_stock, fn($q) =>
            $q->whereNotNull('reorder_point')
                ->whereColumn('quantity_on_hand', '<=', 'reorder_point'))
            ->when($request->search, fn($q, $s) => $q->whereHas('product', fn($pq) =>
            $pq->where('name', 'like', "%{$s}%")
                ->orWhere('code', 'like', "%{$s}%")))
            ->paginate(request()->input('per_page', 15))
            ->withQueryString();

        // Compute reserved quantities from active delivery challans (draft/issued).
        $reserved = DeliveryChallanItem::query()
            ->whereHas('deliveryChallan', fn($q) => $q->whereIn('status', ['draft', 'issued']))
            ->whereNotNull('product_id')
            ->selectRaw('product_id, SUM(quantity) as total_reserved')
            ->groupBy('product_id')
            ->pluck('total_reserved', 'product_id');

        foreach ($stocks as $stock) {
            $stock->quantity_reserved = (float) ($reserved[$stock->product_id] ?? 0);
        }

        $warehouses = Warehouse::orderBy('name')->get();

        return view('backoffice.inventory.stock.index', compact('stocks', 'warehouses'));
    }

    public function updateReorder(Request $request, ProductStock $productStock)
    {
        $validated = $request->validate([
            'reorder_point'    => ['nullable', 'numeric', 'min:0'],
            'reorder_quantity' => ['nullable', 'numeric', 'min:0'],
        ]);

        $productStock->update([
            'reorder_point'    => $validated['reorder_point'] ?: null,
            'reorder_quantity' => $validated['reorder_quantity'] ?: null,
        ]);

        return back()->with('success', __('Seuil de réapprovisionnement mis à jour.'));
    }
}
