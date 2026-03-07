<?php

namespace App\Http\Controllers\Backoffice\Inventory;

use App\Http\Controllers\Controller;
use App\Http\Requests\Inventory\Store\StoreStockMovementRequest;
use App\Models\Catalog\Product;
use App\Models\Inventory\StockMovement;
use App\Models\Inventory\Warehouse;
use App\Services\Inventory\StockService;
use Illuminate\Http\Request;

class StockMovementController extends Controller
{
    public function __construct(
        private readonly StockService $stockService,
    ) {}

    public function index(Request $request)
    {
        $this->authorize('viewAny', StockMovement::class);

        $movements = StockMovement::query()
            ->with(['product', 'warehouse', 'createdBy'])
            ->when($request->warehouse_id, fn ($q, $w) => $q->where('warehouse_id', $w))
            ->when($request->product_id, fn ($q, $p) => $q->where('product_id', $p))
            ->when($request->movement_type, fn ($q, $t) => $q->where('movement_type', $t))
            ->when($request->search, fn ($q, $s) => $q->whereHas('product', fn ($pq) =>
                $pq->where('name', 'like', "%{$s}%")
                   ->orWhere('code', 'like', "%{$s}%")))
            ->latest('moved_at')
            ->paginate(25)
            ->withQueryString();

        $warehouses = Warehouse::orderBy('name')->get();
        $products = Product::where('track_inventory', true)->orderBy('name')->get();

        return view('backoffice.inventory.movements.index', compact('movements', 'warehouses', 'products'));
    }

    public function create()
    {
        $this->authorize('create', StockMovement::class);

        $warehouses = Warehouse::where('is_active', true)->orderBy('name')->get();
        $products = Product::where('is_active', true)->orderBy('name')->get();

        return view('backoffice.inventory.movements.create', compact('warehouses', 'products'));
    }

    public function store(StoreStockMovementRequest $request)
    {
        $this->authorize('create', StockMovement::class);

        try {
            $this->stockService->adjust(
                productId:   $request->product_id,
                quantity:    abs((float) $request->quantity),
                movementType: $request->movement_type,
                note:        $request->note ?? '',
                warehouseId: $request->warehouse_id,
            );

            return redirect()->route('bo.inventory.movements.index')
                ->with('success', 'Mouvement de stock enregistré avec succès.');
        } catch (\DomainException $e) {
            return back()->withInput()->with('error', $e->getMessage());
        }
    }
}
