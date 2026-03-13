<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\CRM\Customer;
use App\Models\Catalog\Product;
use App\Models\Purchases\DebitNote;
use App\Models\Purchases\PurchaseOrder;
use App\Models\Purchases\Supplier;
use App\Models\Purchases\VendorBill;
use App\Models\Sales\CreditNote;
use App\Models\Sales\DeliveryChallan;
use App\Models\Sales\Invoice;
use App\Models\Sales\Payment;
use App\Models\Sales\Quote;
use Illuminate\Http\Request;

class TrashController extends Controller
{
    /**
     * Map of type keys to model classes + display info.
     */
    private function trashableTypes(): array
    {
        return [
            'invoices' => [
                'model' => Invoice::class,
                'label' => 'Factures',
                'icon'  => 'isax isax-receipt-item',
                'name_column' => 'number',
                'with' => ['customer'],
                'detail' => fn($item) => $item->customer->name ?? '—',
                'show_route' => 'bo.sales.invoices.show',
            ],
            'quotes' => [
                'model' => Quote::class,
                'label' => 'Devis',
                'icon'  => 'isax isax-document-text',
                'name_column' => 'number',
                'with' => ['customer'],
                'detail' => fn($item) => $item->customer->name ?? '—',
                'show_route' => 'bo.sales.quotes.show',
            ],
            'payments' => [
                'model' => Payment::class,
                'label' => 'Paiements',
                'icon'  => 'isax isax-money-3',
                'name_column' => 'number',
                'with' => ['customer'],
                'detail' => fn($item) => $item->customer->name ?? '—',
                'show_route' => 'bo.sales.payments.show',
            ],
            'credit-notes' => [
                'model' => CreditNote::class,
                'label' => 'Avoirs',
                'icon'  => 'isax isax-receipt-minus',
                'name_column' => 'number',
                'with' => ['customer'],
                'detail' => fn($item) => $item->customer->name ?? '—',
                'show_route' => 'bo.sales.credit-notes.show',
            ],
            'delivery-challans' => [
                'model' => DeliveryChallan::class,
                'label' => 'Bons de livraison',
                'icon'  => 'isax isax-truck',
                'name_column' => 'number',
                'with' => ['customer'],
                'detail' => fn($item) => $item->customer->name ?? '—',
                'show_route' => 'bo.sales.delivery-challans.show',
            ],
            'purchase-orders' => [
                'model' => PurchaseOrder::class,
                'label' => 'Bons de commande',
                'icon'  => 'isax isax-bag-2',
                'name_column' => 'number',
                'with' => ['supplier'],
                'detail' => fn($item) => $item->supplier->name ?? '—',
                'show_route' => 'bo.purchases.purchase-orders.show',
            ],
            'vendor-bills' => [
                'model' => VendorBill::class,
                'label' => 'Factures fournisseur',
                'icon'  => 'isax isax-receipt-text',
                'name_column' => 'number',
                'with' => ['supplier'],
                'detail' => fn($item) => $item->supplier->name ?? '—',
                'show_route' => 'bo.purchases.vendor-bills.show',
            ],
            'debit-notes' => [
                'model' => DebitNote::class,
                'label' => 'Notes de débit',
                'icon'  => 'isax isax-receipt-add',
                'name_column' => 'number',
                'with' => ['supplier'],
                'detail' => fn($item) => $item->supplier->name ?? '—',
                'show_route' => 'bo.purchases.debit-notes.show',
            ],
            'customers' => [
                'model' => Customer::class,
                'label' => 'Clients',
                'icon'  => 'isax isax-profile-2user',
                'name_column' => 'name',
                'with' => [],
                'detail' => fn($item) => $item->email ?? '—',
                'show_route' => 'bo.crm.customers.show',
            ],
            'suppliers' => [
                'model' => Supplier::class,
                'label' => 'Fournisseurs',
                'icon'  => 'isax isax-people',
                'name_column' => 'name',
                'with' => [],
                'detail' => fn($item) => $item->email ?? '—',
                'show_route' => 'bo.purchases.suppliers.show',
            ],
            'products' => [
                'model' => Product::class,
                'label' => 'Produits',
                'icon'  => 'isax isax-box-1',
                'name_column' => 'name',
                'with' => [],
                'detail' => fn($item) => $item->sku ?? '—',
                'show_route' => 'bo.catalog.products.show',
            ],
        ];
    }

    public function index(Request $request)
    {
        $types = $this->trashableTypes();
        $selectedType = $request->input('type', 'invoices');

        if (!isset($types[$selectedType])) {
            $selectedType = 'invoices';
        }

        $config = $types[$selectedType];
        $modelClass = $config['model'];

        $query = $modelClass::onlyTrashed();

        if (!empty($config['with'])) {
            $query->with(array_map(fn($rel) => "{$rel}" , $config['with']));
        }

        if ($search = $request->input('search')) {
            $query->where($config['name_column'], 'like', "%{$search}%");
        }

        $items = $query->latest('deleted_at')->paginate(request()->input('per_page', 15))->withQueryString();

        // Count trashed items per type for badges
        $counts = [];
        foreach ($types as $key => $typeConfig) {
            $counts[$key] = $typeConfig['model']::onlyTrashed()->count();
        }

        $totalTrashed = array_sum($counts);

        return view('backoffice.trash.index', compact(
            'types',
            'selectedType',
            'config',
            'items',
            'counts',
            'totalTrashed'
        ));
    }

    public function restore(Request $request, string $type, string $id)
    {
        $types = $this->trashableTypes();

        abort_unless(isset($types[$type]), 404);

        $modelClass = $types[$type]['model'];
        $item = $modelClass::onlyTrashed()->findOrFail($id);

        $this->authorize('delete', $item);

        $item->restore();

        return redirect()->route('bo.trash.index', ['type' => $type])
            ->with('success', __('Élément restauré avec succès.'));
    }

    public function forceDelete(Request $request, string $type, string $id)
    {
        $types = $this->trashableTypes();

        abort_unless(isset($types[$type]), 404);

        $modelClass = $types[$type]['model'];
        $item = $modelClass::onlyTrashed()->findOrFail($id);

        $this->authorize('delete', $item);

        $item->forceDelete();

        return redirect()->route('bo.trash.index', ['type' => $type])
            ->with('success', __('Élément supprimé définitivement.'));
    }

    public function emptyType(Request $request, string $type)
    {
        $types = $this->trashableTypes();

        abort_unless(isset($types[$type]), 404);

        $modelClass = $types[$type]['model'];
        $modelClass::onlyTrashed()->forceDelete();

        return redirect()->route('bo.trash.index', ['type' => $type])
            ->with('success', __('Corbeille vidée pour cette catégorie.'));
    }
}
