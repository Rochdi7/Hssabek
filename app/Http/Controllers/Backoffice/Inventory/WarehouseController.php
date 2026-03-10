<?php

namespace App\Http\Controllers\Backoffice\Inventory;

use App\Http\Controllers\Controller;
use App\Http\Requests\Inventory\Store\StoreWarehouseRequest;
use App\Http\Requests\Inventory\Update\UpdateWarehouseRequest;
use App\Models\Inventory\Warehouse;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    public function index(Request $request)
    {
        $this->authorize('viewAny', Warehouse::class);

        $warehouses = Warehouse::query()
            ->when($request->search, fn ($q, $s) => $q->where(function ($q) use ($s) {
                $q->where('name', 'like', "%{$s}%")
                  ->orWhere('code', 'like', "%{$s}%");
            }))
            ->when($request->status === 'active', fn ($q) => $q->where('is_active', true))
            ->when($request->status === 'inactive', fn ($q) => $q->where('is_active', false))
            ->orderBy('name')
            ->paginate(request()->input('per_page', 15))
            ->withQueryString();

        return view('backoffice.inventory.warehouses.index', compact('warehouses'));
    }

    public function create()
    {
        $this->authorize('create', Warehouse::class);

        return view('backoffice.inventory.warehouses.create');
    }

    public function store(StoreWarehouseRequest $request)
    {
        $this->authorize('create', Warehouse::class);

        $data = $request->validated();
        $data['is_default'] = $request->boolean('is_default');
        $data['is_active'] = $request->boolean('is_active', true);

        Warehouse::create($data);

        return redirect()->route('bo.inventory.warehouses.index')
            ->with('success', 'Entrepôt créé avec succès.');
    }

    public function show(Warehouse $warehouse)
    {
        $this->authorize('view', $warehouse);

        $warehouse->load(['productStocks.product', 'stockMovements' => function ($q) {
            $q->with('product')->latest('moved_at')->limit(20);
        }]);

        return view('backoffice.inventory.warehouses.show', compact('warehouse'));
    }

    public function edit(Warehouse $warehouse)
    {
        $this->authorize('update', $warehouse);

        return view('backoffice.inventory.warehouses.edit', compact('warehouse'));
    }

    public function update(UpdateWarehouseRequest $request, Warehouse $warehouse)
    {
        $this->authorize('update', $warehouse);

        $data = $request->validated();
        $data['is_default'] = $request->boolean('is_default');
        $data['is_active'] = $request->boolean('is_active', true);

        $warehouse->update($data);

        return redirect()->route('bo.inventory.warehouses.index')
            ->with('success', 'Entrepôt mis à jour avec succès.');
    }

    public function destroy(Warehouse $warehouse)
    {
        $this->authorize('delete', $warehouse);

        if ($warehouse->productStocks()->where('quantity_on_hand', '>', 0)->exists()) {
            return redirect()->route('bo.inventory.warehouses.index')
                ->with('error', 'Impossible de supprimer cet entrepôt : il contient encore du stock.');
        }

        $warehouse->delete();

        return redirect()->route('bo.inventory.warehouses.index')
            ->with('success', 'Entrepôt supprimé avec succès.');
    }
}
