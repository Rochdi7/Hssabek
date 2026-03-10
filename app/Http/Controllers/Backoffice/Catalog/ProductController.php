<?php

namespace App\Http\Controllers\Backoffice\Catalog;

use App\Http\Controllers\Controller;
use App\Http\Requests\Catalog\Store\StoreProductRequest;
use App\Http\Requests\Catalog\Update\UpdateProductRequest;
use App\Models\Catalog\Product;
use App\Models\Catalog\ProductCategory;
use App\Models\Catalog\TaxCategory;
use App\Models\Catalog\Unit;
use App\Models\Inventory\StockMovement;
use App\Models\Inventory\Warehouse;
use App\Services\Inventory\StockService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function __construct(
        private readonly StockService $stockService,
    ) {}
    public function index(Request $request)
    {
        $this->authorize('viewAny', Product::class);

        $query = Product::query()
            ->with(['category', 'unit', 'taxCategory']);

        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('code', 'like', "%{$search}%")
                    ->orWhere('sku', 'like', "%{$search}%");
            });
        }

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->input('category_id'));
        }

        if ($request->filled('status')) {
            $query->where('is_active', $request->input('status') === 'active');
        }

        if ($request->filled('item_type') && in_array($request->input('item_type'), ['product', 'service'])) {
            $query->where('item_type', $request->input('item_type'));
        }

        $products = $query->latest()->paginate(request()->input('per_page', 15))->withQueryString();

        $categories = ProductCategory::where('is_active', true)
            ->orderBy('name')
            ->get();

        $warehouses = Warehouse::where('is_active', true)->orderBy('name')->get();

        return view('backoffice.catalog.products.index', compact('products', 'categories', 'warehouses'));
    }

    public function create()
    {
        $this->authorize('create', Product::class);

        $categories = ProductCategory::where('is_active', true)->orderBy('name')->get();
        $units = Unit::orderBy('name')->get();
        $taxCategories = TaxCategory::where('is_active', true)->orderBy('name')->get();

        return view('backoffice.catalog.products.create', compact(
            'categories',
            'units',
            'taxCategories'
        ));
    }

    public function store(StoreProductRequest $request)
    {
        $this->authorize('create', Product::class);

        $data = $request->validated();
        unset($data['product_image']);

        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['name']);
        }

        // Clear inventory fields for services
        if (($data['item_type'] ?? 'product') === 'service') {
            $data['track_inventory'] = false;
            $data['quantity'] = 0;
            $data['alert_quantity'] = null;
            $data['barcode'] = null;
        }

        $product = Product::create($data);

        if ($request->hasFile('product_image')) {
            $product->addMediaFromRequest('product_image')
                ->toMediaCollection('product_image');
        }

        $label = ($data['item_type'] ?? 'product') === 'service' ? 'Service' : 'Produit';

        return redirect()->route('bo.catalog.products.index')
            ->with('success', "$label créé avec succès.");
    }

    public function edit(Product $product)
    {
        $this->authorize('update', $product);

        $categories = ProductCategory::where('is_active', true)->orderBy('name')->get();
        $units = Unit::orderBy('name')->get();
        $taxCategories = TaxCategory::where('is_active', true)->orderBy('name')->get();

        return view('backoffice.catalog.products.edit', compact(
            'product',
            'categories',
            'units',
            'taxCategories'
        ));
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $this->authorize('update', $product);

        $data = $request->validated();
        unset($data['product_image']);

        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['name']);
        }

        // Clear inventory fields for services
        if (($data['item_type'] ?? $product->item_type) === 'service') {
            $data['track_inventory'] = false;
            $data['quantity'] = 0;
            $data['alert_quantity'] = null;
            $data['barcode'] = null;
        }

        $product->update($data);

        if ($request->hasFile('product_image')) {
            $product->addMediaFromRequest('product_image')
                ->toMediaCollection('product_image');
        }

        $label = $product->item_type === 'service' ? 'Service' : 'Produit';

        return redirect()->route('bo.catalog.products.index')
            ->with('success', "$label mis à jour avec succès.");
    }

    public function destroy(Product $product)
    {
        $this->authorize('delete', $product);

        $label = $product->item_type === 'service' ? 'Service' : 'Produit';

        $product->delete();

        return redirect()->route('bo.catalog.products.index')
            ->with('success', "$label supprimé avec succès.");
    }

    /**
     * Fetch movement history for a product (AJAX - JSON).
     */
    public function stockHistory(Product $product)
    {
        $movements = StockMovement::with(['warehouse', 'createdBy'])
            ->where('product_id', $product->id)
            ->latest('moved_at')
            ->limit(50)
            ->get();

        return response()->json([
            'product_name' => $product->name,
            'product_code' => $product->code ?? '',
            'movements'    => $movements->map(fn($m) => [
                'date'        => $m->moved_at->format('d M Y, h:i A'),
                'unit'        => $product->unit->abbreviation ?? $product->unit->name ?? '—',
                'adjustment'  => (str_contains($m->movement_type, 'in') || $m->movement_type === 'unreserve')
                    ? '+' . number_format($m->quantity, 2, ',', ' ')
                    : '-' . number_format($m->quantity, 2, ',', ' '),
                'is_positive' => str_contains($m->movement_type, 'in') || $m->movement_type === 'unreserve',
                'stock'       => number_format($product->quantity, 2, ',', ' '),
                'reason'      => $m->note ?: ucfirst(str_replace('_', ' ', $m->movement_type)),
                'warehouse'   => $m->warehouse->name ?? '—',
            ]),
        ]);
    }

    /**
     * Stock In — add quantity to a product.
     */
    public function stockIn(Request $request, Product $product)
    {
        $request->validate([
            'warehouse_id' => 'required|exists:warehouses,id',
            'quantity'     => 'required|numeric|min:0.001',
            'note'         => 'nullable|string|max:500',
        ]);

        try {
            $this->stockService->adjust(
                productId: $product->id,
                quantity: abs((float) $request->quantity),
                movementType: 'stock_in',
                note: $request->note ?? '',
                warehouseId: $request->warehouse_id,
            );

            return redirect()->route('bo.catalog.products.index')
                ->with('success', 'Stock ajouté avec succès pour "' . $product->name . '".');
        } catch (\DomainException $e) {
            return back()->withInput()->with('error', $e->getMessage());
        }
    }

    /**
     * Stock Out — remove quantity from a product.
     */
    public function stockOut(Request $request, Product $product)
    {
        $request->validate([
            'warehouse_id' => 'required|exists:warehouses,id',
            'quantity'     => 'required|numeric|min:0.001',
            'note'         => 'nullable|string|max:500',
        ]);

        try {
            $this->stockService->adjust(
                productId: $product->id,
                quantity: abs((float) $request->quantity),
                movementType: 'stock_out',
                note: $request->note ?? '',
                warehouseId: $request->warehouse_id,
            );

            return redirect()->route('bo.catalog.products.index')
                ->with('success', 'Stock retiré avec succès pour "' . $product->name . '".');
        } catch (\DomainException $e) {
            return back()->withInput()->with('error', $e->getMessage());
        }
    }
}
