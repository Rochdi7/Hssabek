<?php

namespace App\Http\Controllers\Backoffice\Inventory;

use App\Http\Controllers\Controller;
use App\Http\Requests\Inventory\Store\StoreStockTransferRequest;
use App\Http\Requests\Inventory\Update\UpdateStockTransferRequest;
use App\Models\Catalog\Product;
use App\Models\Inventory\StockTransfer;
use App\Models\Inventory\StockTransferItem;
use App\Models\Inventory\Warehouse;
use App\Services\Inventory\StockService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StockTransferController extends Controller
{
    public function __construct(
        private readonly StockService $stockService,
    ) {}

    public function index(Request $request)
    {
        $this->authorize('viewAny', StockTransfer::class);

        $transfers = StockTransfer::query()
            ->with(['fromWarehouse', 'toWarehouse', 'createdBy'])
            ->when($request->status, fn ($q, $s) => $q->where('status', $s))
            ->when($request->search, fn ($q, $s) => $q->where('number', 'like', "%{$s}%"))
            ->latest()
            ->paginate(request()->input('per_page', 15))
            ->withQueryString();

        return view('backoffice.inventory.transfers.index', compact('transfers'));
    }

    public function create()
    {
        $this->authorize('create', StockTransfer::class);

        $warehouses = Warehouse::where('is_active', true)->orderBy('name')->get();
        $products = Product::where('is_active', true)->where('item_type', 'product')->orderBy('name')->get();

        // Build stock map: { warehouse_id: { product_id: qty_on_hand } }
        $stockMap = \App\Models\Inventory\ProductStock::select('warehouse_id', 'product_id', 'quantity_on_hand')
            ->get()
            ->groupBy('warehouse_id')
            ->map(fn ($items) => $items->pluck('quantity_on_hand', 'product_id'))
            ->toArray();

        return view('backoffice.inventory.transfers.create', compact('warehouses', 'products', 'stockMap'));
    }

    public function store(StoreStockTransferRequest $request)
    {
        $this->authorize('create', StockTransfer::class);

        $transfer = DB::transaction(function () use ($request) {
            $transfer = StockTransfer::create([
                'from_warehouse_id' => $request->from_warehouse_id,
                'to_warehouse_id'   => $request->to_warehouse_id,
                'number'            => 'TR-' . str_pad(StockTransfer::count() + 1, 5, '0', STR_PAD_LEFT),
                'status'            => 'draft',
                'notes'             => $request->notes,
                'created_by'        => auth()->id(),
            ]);

            foreach ($request->items as $item) {
                StockTransferItem::create([
                    'stock_transfer_id' => $transfer->id,
                    'product_id'        => $item['product_id'],
                    'quantity'          => $item['quantity'],
                ]);
            }

            return $transfer;
        });

        return redirect()->route('bo.inventory.transfers.show', $transfer)
            ->with('success', 'Transfert créé avec succès.');
    }

    public function show(StockTransfer $transfer)
    {
        $this->authorize('view', $transfer);

        $transfer->load(['fromWarehouse', 'toWarehouse', 'items.product', 'createdBy']);

        return view('backoffice.inventory.transfers.show', compact('transfer'));
    }

    public function edit(StockTransfer $transfer)
    {
        $this->authorize('update', $transfer);
        abort_unless($transfer->status === 'draft', 403, 'Seuls les transferts en brouillon peuvent être modifiés.');

        $transfer->load('items.product');
        $warehouses = Warehouse::where('is_active', true)->orderBy('name')->get();
        $products = Product::where('is_active', true)->where('item_type', 'product')->orderBy('name')->get();

        $stockMap = \App\Models\Inventory\ProductStock::select('warehouse_id', 'product_id', 'quantity_on_hand')
            ->get()
            ->groupBy('warehouse_id')
            ->map(fn ($items) => $items->pluck('quantity_on_hand', 'product_id'))
            ->toArray();

        return view('backoffice.inventory.transfers.edit', compact('transfer', 'warehouses', 'products', 'stockMap'));
    }

    public function update(UpdateStockTransferRequest $request, StockTransfer $transfer)
    {
        $this->authorize('update', $transfer);
        abort_unless($transfer->status === 'draft', 403, 'Seuls les transferts en brouillon peuvent être modifiés.');

        DB::transaction(function () use ($request, $transfer) {
            $transfer->update([
                'from_warehouse_id' => $request->from_warehouse_id,
                'to_warehouse_id'   => $request->to_warehouse_id,
                'notes'             => $request->notes,
            ]);

            $transfer->items()->delete();

            foreach ($request->items as $item) {
                StockTransferItem::create([
                    'stock_transfer_id' => $transfer->id,
                    'product_id'        => $item['product_id'],
                    'quantity'          => $item['quantity'],
                ]);
            }
        });

        return redirect()->route('bo.inventory.transfers.show', $transfer)
            ->with('success', 'Transfert mis à jour avec succès.');
    }

    public function execute(StockTransfer $transfer)
    {
        $this->authorize('update', $transfer);
        abort_unless($transfer->status === 'draft', 422, 'Ce transfert a déjà été exécuté ou annulé.');

        $transfer->load('items');

        try {
            $this->stockService->transfer($transfer);

            return redirect()->route('bo.inventory.transfers.show', $transfer)
                ->with('success', 'Transfert exécuté avec succès.');
        } catch (\DomainException $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function destroy(StockTransfer $transfer)
    {
        $this->authorize('delete', $transfer);
        $transfer->items()->delete();
        $transfer->delete();

        return redirect()->route('bo.inventory.transfers.index')
            ->with('success', 'Transfert supprimé avec succès.');
    }
}
