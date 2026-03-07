<?php

namespace App\Http\Controllers\Backoffice\Inventory;

use App\Http\Controllers\Controller;
use App\Models\Inventory\ProductStock;
use App\Models\Inventory\Warehouse;
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
            ->paginate(25)
            ->withQueryString();

        $warehouses = Warehouse::orderBy('name')->get();

        return view('backoffice.inventory.stock.index', compact('stocks', 'warehouses'));
    }
}
