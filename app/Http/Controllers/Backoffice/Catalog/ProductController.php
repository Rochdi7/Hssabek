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

        $warehouseFilter = $request->input('warehouse_id');

        $query = Product::query()
            ->with(['category', 'unit', 'taxCategory']);

        // When filtering by warehouse, show that warehouse's stock; otherwise show total
        if ($warehouseFilter) {
            $query->withSum(['stocks' => fn($q) => $q->where('warehouse_id', $warehouseFilter)], 'quantity_on_hand');
            // Only show products that have stock in this warehouse
            $query->whereHas('stocks', fn($q) => $q->where('warehouse_id', $warehouseFilter));
        } else {
            $query->withSum('stocks', 'quantity_on_hand');
        }

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
            ->with('success', __("$label créé avec succès."));
    }

    public function show(Product $product)
    {
        $this->authorize('view', $product);

        // Load product with relationships
        $product->load(['category', 'unit', 'taxCategory', 'stocks.warehouse']);

        // Get invoices through invoice items
        $invoices = \App\Models\Sales\Invoice::whereHas('items', function ($q) use ($product) {
            $q->where('product_id', $product->id);
        })->with('customer')->latest('issue_date')->limit(20)->get();

        // Get quotes through quote items
        $quotes = \App\Models\Sales\Quote::whereHas('items', function ($q) use ($product) {
            $q->where('product_id', $product->id);
        })->with('customer')->latest('issue_date')->limit(20)->get();

        // Get delivery challans
        $deliveryChallans = \App\Models\Sales\DeliveryChallan::whereHas('items', function ($q) use ($product) {
            $q->where('product_id', $product->id);
        })->with('customer')->latest('challan_date')->limit(20)->get();

        // Get purchase orders
        $purchaseOrders = \App\Models\Purchases\PurchaseOrder::whereHas('items', function ($q) use ($product) {
            $q->where('product_id', $product->id);
        })->with('supplier')->latest('order_date')->limit(20)->get();

        // Get debit notes
        $debitNotes = \App\Models\Purchases\DebitNote::whereHas('items', function ($q) use ($product) {
            $q->where('product_id', $product->id);
        })->with('supplier')->latest('debit_note_date')->limit(20)->get();

        // Get goods receipts
        $goodsReceipts = \App\Models\Purchases\GoodsReceipt::whereHas('items', function ($q) use ($product) {
            $q->where('product_id', $product->id);
        })->with(['purchaseOrder.supplier', 'warehouse'])->latest('received_at')->limit(20)->get();

        // Get recent stock movements
        $stockMovements = StockMovement::with(['warehouse', 'createdBy'])
            ->where('product_id', $product->id)
            ->latest('moved_at')
            ->limit(20)
            ->get();

        return view('backoffice.catalog.products.show', compact(
            'product',
            'invoices',
            'quotes',
            'deliveryChallans',
            'purchaseOrders',
            'debitNotes',
            'goodsReceipts',
            'stockMovements'
        ));
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
            ->with('success', __("$label mis à jour avec succès."));
    }

    public function destroy(Product $product)
    {
        $this->authorize('delete', $product);

        $label = $product->item_type === 'service' ? 'Service' : 'Produit';

        $product->delete();

        return redirect()->route('bo.catalog.products.index')
            ->with('success', __("$label supprimé avec succès."));
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

        // Build per-warehouse running balances (current stock per warehouse)
        $warehouseBalances = \App\Models\Inventory\ProductStock::where('product_id', $product->id)
            ->pluck('quantity_on_hand', 'warehouse_id')
            ->mapWithKeys(fn($qty, $id) => [$id => (float) $qty])
            ->toArray();

        $currentStock = array_sum($warehouseBalances);
        $mapped = [];

        foreach ($movements as $m) {
            $isPositive = str_contains($m->movement_type, 'in') || $m->movement_type === 'unreserve';
            $wId = $m->warehouse_id;

            // Stock in this warehouse after this movement
            $warehouseStock = $warehouseBalances[$wId] ?? 0;

            $mapped[] = [
                'date'        => $m->moved_at->format('d M Y, h:i A'),
                'unit'        => $product->unit->abbreviation ?? $product->unit->name ?? '—',
                'adjustment'  => $isPositive
                    ? '+' . number_format($m->quantity, 2, ',', ' ')
                    : '-' . number_format($m->quantity, 2, ',', ' '),
                'is_positive' => $isPositive,
                'stock'       => number_format($warehouseStock, 2, ',', ' '),
                'reason'      => $m->note ?: ucfirst(str_replace('_', ' ', $m->movement_type)),
                'warehouse'   => $m->warehouse->name ?? '—',
            ];

            // Reverse the movement to get warehouse stock before this movement
            $warehouseBalances[$wId] = $isPositive
                ? $warehouseStock - $m->quantity
                : $warehouseStock + $m->quantity;
        }

        return response()->json([
            'product_name'  => $product->name,
            'product_code'  => $product->code ?? '',
            'current_stock' => number_format($currentStock, 2, ',', ' '),
            'movements'     => $mapped,
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
                ->with('success', __('Stock ajouté avec succès pour ":name".', ['name' => $product->name]));
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
                ->with('success', __('Stock retiré avec succès pour ":name".', ['name' => $product->name]));
        } catch (\DomainException $e) {
            return back()->withInput()->with('error', $e->getMessage());
        }
    }

    /**
     * Get stock per warehouse for a product (AJAX - JSON).
     */
    public function warehouseStock(Product $product)
    {
        $stocks = \App\Models\Inventory\ProductStock::where('product_id', $product->id)
            ->pluck('quantity_on_hand', 'warehouse_id')
            ->mapWithKeys(fn($qty, $id) => [$id => (float) $qty])
            ->toArray();

        return response()->json(['stocks' => $stocks]);
    }
}
