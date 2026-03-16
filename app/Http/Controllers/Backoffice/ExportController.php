<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\Catalog\Product;
use App\Models\Catalog\ProductCategory;
use App\Models\Catalog\Unit;
use App\Models\CRM\Customer;
use App\Models\Finance\BankAccount;
use App\Models\Finance\Expense;
use App\Models\Finance\FinanceCategory;
use App\Models\Finance\Income;
use App\Models\Finance\Loan;
use App\Models\Finance\MoneyTransfer;
use App\Models\Inventory\StockMovement;
use App\Models\Inventory\StockTransfer;
use App\Models\Inventory\Warehouse;
use App\Models\Pro\Branch;
use App\Models\Pro\InvoiceReminder;
use App\Models\Pro\RecurringInvoice;
use App\Models\Purchases\DebitNote;
use App\Models\Purchases\GoodsReceipt;
use App\Models\Purchases\PurchaseOrder;
use App\Models\Purchases\Supplier;
use App\Models\Purchases\SupplierPayment;
use App\Models\Purchases\VendorBill;
use App\Models\Sales\CreditNote;
use App\Models\Sales\DeliveryChallan;
use App\Models\Sales\Invoice;
use App\Models\Sales\Payment;
use App\Models\Sales\Quote;
use App\Models\Sales\Refund;
use App\Models\Billing\Plan;
use App\Models\Billing\Subscription;
use App\Models\Tenancy\Role;
use App\Models\Tenancy\Tenant;
use App\Models\User;
use App\Exports\GenericListExport;
use App\Services\System\ListExportService;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function __construct(
        private readonly ListExportService $exportService,
    ) {
    }

    /**
     * GET /backoffice/export/{type}?format=pdf|csv
     */
    public function export(Request $request, string $type)
    {
        $config = $this->getConfig($type);

        if (!$config) {
            abort(404);
        }

        // Check permission
        if (isset($config['permission']) && !auth()->user()->can($config['permission'])) {
            abort(403);
        }

        // Build query with same filters as index
        $query = $config['model']::query();

        if (isset($config['with'])) {
            $query->with($config['with']);
        }

        if (isset($config['withCount'])) {
            $query->withCount($config['withCount']);
        }

        // Apply search
        $search = $request->input('search');
        if ($search && isset($config['searchable'])) {
            $query->where(function ($q) use ($search, $config) {
                foreach ($config['searchable'] as $i => $field) {
                    if (str_contains($field, '.')) {
                        // Relationship search
                        $parts = explode('.', $field);
                        $relation = $parts[0];
                        $column = $parts[1];
                        $method = $i === 0 ? 'whereHas' : 'orWhereHas';
                        $q->$method($relation, fn($sub) => $sub->where($column, 'like', "%{$search}%"));
                    } else {
                        $method = $i === 0 ? 'where' : 'orWhere';
                        $q->$method($field, 'like', "%{$search}%");
                    }
                }
            });
        }

        // Apply filters
        if (isset($config['filters'])) {
            foreach ($config['filters'] as $param => $column) {
                if ($request->filled($param)) {
                    $query->where($column, $request->input($param));
                }
            }
        }

        // Order
        $query->latest();

        $format = $request->input('format', 'pdf');
        $filename = $config['filename'] ?? $type;

        if ($format === 'csv') {
            return $this->exportService->toCsv($query, $config['columns'], $filename);
        }

        if ($format === 'excel') {
            return Excel::download(
                new GenericListExport($query, $config['columns'], $config['title'], $filename),
                $filename . '.xlsx'
            );
        }

        return $this->exportService->toPdf($query, $config['columns'], $config['title'], $filename);
    }

    /**
     * Configuration map for all exportable CRUD types.
     */
    private function getConfig(string $type): ?array
    {
        $configs = [
            // ─── CRM ────────────────────────────────────────────
            'customers' => [
                'model'      => Customer::class,
                'permission' => 'crm.customers.view',
                'title'      => 'Liste des Clients',
                'filename'   => 'clients',
                'with'       => [],
                'searchable' => ['name', 'email', 'phone'],
                'filters'    => ['status' => 'status', 'type' => 'type'],
                'columns'    => [
                    'name'               => 'Nom',
                    'email'              => 'Email',
                    'phone'              => 'Téléphone',
                    'type'               => 'Type',
                    'status'             => 'Statut',
                    'payment_terms_days' => 'Délai paiement (j)',
                ],
            ],

            // ─── Catalog ─────────────────────────────────────────
            'products' => [
                'model'      => Product::class,
                'permission' => 'catalog.products.view',
                'title'      => 'Liste des Produits & Services',
                'filename'   => 'produits',
                'with'       => ['category', 'unit'],
                'searchable' => ['name', 'code', 'sku'],
                'filters'    => ['category_id' => 'category_id', 'status' => 'status', 'item_type' => 'item_type'],
                'columns'    => [
                    'code'           => 'Code',
                    'name'           => 'Nom',
                    'category.name'  => 'Catégorie',
                    'unit.short_name' => 'Unité',
                    'selling_price'  => 'Prix de vente',
                    'purchase_price' => 'Prix d\'achat',
                    'quantity'       => 'Stock',
                    'status'         => 'Statut',
                ],
            ],

            'categories' => [
                'model'      => ProductCategory::class,
                'permission' => 'catalog.categories.view',
                'title'      => 'Liste des Catégories',
                'filename'   => 'categories',
                'withCount'  => ['products'],
                'searchable' => ['name'],
                'columns'    => [
                    'name'           => 'Nom',
                    'description'    => 'Description',
                    'products_count' => 'Nb Produits',
                ],
            ],

            'units' => [
                'model'      => Unit::class,
                'permission' => 'catalog.units.view',
                'title'      => 'Liste des Unités',
                'filename'   => 'unites',
                'withCount'  => ['products'],
                'searchable' => ['name'],
                'columns'    => [
                    'name'           => 'Nom',
                    'short_name'     => 'Abréviation',
                    'products_count' => 'Nb Produits',
                ],
            ],

            // ─── Sales ───────────────────────────────────────────
            'invoices' => [
                'model'      => Invoice::class,
                'permission' => 'sales.invoices.view',
                'title'      => 'Liste des Factures',
                'filename'   => 'factures',
                'with'       => ['customer'],
                'searchable' => ['number', 'customer.name'],
                'filters'    => ['status' => 'status'],
                'columns'    => [
                    'number'        => 'N° Facture',
                    'customer.name' => 'Client',
                    'issue_date'    => 'Date',
                    'due_date'      => 'Échéance',
                    'total'         => 'Total',
                    'amount_paid'   => 'Payé',
                    'amount_due'    => 'Restant',
                    'status'        => 'Statut',
                ],
            ],

            'quotes' => [
                'model'      => Quote::class,
                'permission' => 'sales.quotes.view',
                'title'      => 'Liste des Devis',
                'filename'   => 'devis',
                'with'       => ['customer'],
                'searchable' => ['number', 'customer.name'],
                'filters'    => ['status' => 'status'],
                'columns'    => [
                    'number'        => 'N° Devis',
                    'customer.name' => 'Client',
                    'issue_date'    => 'Date',
                    'expiry_date'   => 'Validité',
                    'total'         => 'Total',
                    'status'        => 'Statut',
                ],
            ],

            'payments' => [
                'model'      => Payment::class,
                'permission' => 'sales.payments.view',
                'title'      => 'Liste des Paiements',
                'filename'   => 'paiements',
                'with'       => ['customer', 'paymentMethod'],
                'searchable' => ['reference_number', 'customer.name'],
                'filters'    => ['status' => 'status'],
                'columns'    => [
                    'reference_number'      => 'Référence',
                    'customer.name'         => 'Client',
                    'paymentMethod.name'    => 'Méthode',
                    'amount'                => 'Montant',
                    'payment_date'          => 'Date',
                    'status'                => 'Statut',
                ],
            ],

            'credit-notes' => [
                'model'      => CreditNote::class,
                'permission' => 'sales.credit_notes.view',
                'title'      => 'Liste des Avoirs',
                'filename'   => 'avoirs',
                'with'       => ['customer'],
                'searchable' => ['number', 'customer.name'],
                'filters'    => ['status' => 'status'],
                'columns'    => [
                    'number'        => 'N° Avoir',
                    'customer.name' => 'Client',
                    'issue_date'    => 'Date',
                    'total'         => 'Total',
                    'balance'       => 'Solde',
                    'status'        => 'Statut',
                ],
            ],

            'delivery-challans' => [
                'model'      => DeliveryChallan::class,
                'permission' => 'sales.delivery_challans.view',
                'title'      => 'Liste des Bons de Livraison',
                'filename'   => 'bons-livraison',
                'with'       => ['customer'],
                'searchable' => ['number', 'reference_number', 'customer.name'],
                'filters'    => ['status' => 'status'],
                'columns'    => [
                    'number'           => 'N° BL',
                    'customer.name'    => 'Client',
                    'reference_number' => 'Référence',
                    'delivery_date'    => 'Date livraison',
                    'status'           => 'Statut',
                ],
            ],

            'refunds' => [
                'model'      => Refund::class,
                'permission' => 'sales.refunds.view',
                'title'      => 'Liste des Remboursements',
                'filename'   => 'remboursements',
                'with'       => ['payment', 'payment.customer'],
                'searchable' => ['provider_refund_id'],
                'filters'    => ['status' => 'status'],
                'columns'    => [
                    'provider_refund_id'    => 'Réf. Remboursement',
                    'payment.customer.name' => 'Client',
                    'amount'                => 'Montant',
                    'refund_date'           => 'Date',
                    'status'                => 'Statut',
                ],
            ],

            // ─── Purchases ───────────────────────────────────────
            'suppliers' => [
                'model'      => Supplier::class,
                'permission' => 'purchases.suppliers.view',
                'title'      => 'Liste des Fournisseurs',
                'filename'   => 'fournisseurs',
                'searchable' => ['name', 'email', 'phone'],
                'filters'    => ['status' => 'status'],
                'columns'    => [
                    'name'   => 'Nom',
                    'email'  => 'Email',
                    'phone'  => 'Téléphone',
                    'status' => 'Statut',
                ],
            ],

            'purchase-orders' => [
                'model'      => PurchaseOrder::class,
                'permission' => 'purchases.purchase_orders.view',
                'title'      => 'Liste des Bons de Commande',
                'filename'   => 'bons-commande',
                'with'       => ['supplier'],
                'searchable' => ['number', 'reference_number', 'supplier.name'],
                'filters'    => ['status' => 'status'],
                'columns'    => [
                    'number'           => 'N° BC',
                    'supplier.name'    => 'Fournisseur',
                    'reference_number' => 'Référence',
                    'order_date'       => 'Date',
                    'total'            => 'Total',
                    'status'           => 'Statut',
                ],
            ],

            'vendor-bills' => [
                'model'      => VendorBill::class,
                'permission' => 'purchases.vendor_bills.view',
                'title'      => 'Liste des Factures Fournisseur',
                'filename'   => 'factures-fournisseur',
                'with'       => ['supplier'],
                'searchable' => ['number', 'reference_number', 'supplier.name'],
                'filters'    => ['status' => 'status'],
                'columns'    => [
                    'number'        => 'N° Facture',
                    'supplier.name' => 'Fournisseur',
                    'bill_date'     => 'Date',
                    'due_date'      => 'Échéance',
                    'total'         => 'Total',
                    'amount_paid'   => 'Payé',
                    'amount_due'    => 'Restant',
                    'status'        => 'Statut',
                ],
            ],

            'goods-receipts' => [
                'model'      => GoodsReceipt::class,
                'permission' => 'purchases.goods_receipts.view',
                'title'      => 'Liste des Bons de Réception',
                'filename'   => 'bons-reception',
                'with'       => ['purchaseOrder', 'warehouse'],
                'searchable' => ['number', 'reference_number'],
                'filters'    => ['status' => 'status'],
                'columns'    => [
                    'number'              => 'N° BR',
                    'purchaseOrder.number' => 'N° BC',
                    'warehouse.name'      => 'Entrepôt',
                    'receipt_date'        => 'Date réception',
                    'status'              => 'Statut',
                ],
            ],

            'debit-notes' => [
                'model'      => DebitNote::class,
                'permission' => 'purchases.debit_notes.view',
                'title'      => 'Liste des Notes de Débit',
                'filename'   => 'notes-debit',
                'with'       => ['supplier'],
                'searchable' => ['number', 'reference_number', 'supplier.name'],
                'filters'    => ['status' => 'status'],
                'columns'    => [
                    'number'        => 'N° Note',
                    'supplier.name' => 'Fournisseur',
                    'issue_date'    => 'Date',
                    'total'         => 'Total',
                    'status'        => 'Statut',
                ],
            ],

            'supplier-payments' => [
                'model'      => SupplierPayment::class,
                'permission' => 'purchases.supplier_payments.view',
                'title'      => 'Liste des Paiements Fournisseur',
                'filename'   => 'paiements-fournisseur',
                'with'       => ['supplier'],
                'searchable' => ['reference_number', 'supplier.name'],
                'filters'    => ['status' => 'status'],
                'columns'    => [
                    'reference_number' => 'Référence',
                    'supplier.name'    => 'Fournisseur',
                    'amount'           => 'Montant',
                    'payment_date'     => 'Date',
                    'status'           => 'Statut',
                ],
            ],

            // ─── Finance ─────────────────────────────────────────
            'bank-accounts' => [
                'model'      => BankAccount::class,
                'permission' => 'finance.bank_accounts.view',
                'title'      => 'Liste des Comptes Bancaires',
                'filename'   => 'comptes-bancaires',
                'searchable' => ['account_holder_name', 'account_number', 'bank_name'],
                'columns'    => [
                    'bank_name'           => 'Banque',
                    'account_holder_name' => 'Titulaire',
                    'account_number'      => 'N° Compte',
                    'type'                => 'Type',
                    'balance'             => 'Solde',
                    'is_active'           => 'Actif',
                ],
            ],

            'expenses' => [
                'model'      => Expense::class,
                'permission' => 'finance.expenses.view',
                'title'      => 'Liste des Dépenses',
                'filename'   => 'depenses',
                'with'       => ['category', 'supplier'],
                'searchable' => ['expense_number', 'reference_number', 'description'],
                'filters'    => ['category_id' => 'category_id', 'payment_status' => 'payment_status'],
                'columns'    => [
                    'expense_number' => 'N° Dépense',
                    'category.name'  => 'Catégorie',
                    'supplier.name'  => 'Fournisseur',
                    'expense_date'   => 'Date',
                    'amount'         => 'Montant',
                    'payment_status' => 'Statut',
                ],
            ],

            'incomes' => [
                'model'      => Income::class,
                'permission' => 'finance.incomes.view',
                'title'      => 'Liste des Revenus',
                'filename'   => 'revenus',
                'with'       => ['category', 'customer'],
                'searchable' => ['income_number', 'reference_number', 'description'],
                'filters'    => ['category_id' => 'category_id'],
                'columns'    => [
                    'income_number'  => 'N° Revenu',
                    'category.name'  => 'Catégorie',
                    'customer.name'  => 'Client',
                    'income_date'    => 'Date',
                    'amount'         => 'Montant',
                    'payment_status' => 'Statut',
                ],
            ],

            'loans' => [
                'model'      => Loan::class,
                'permission' => 'finance.loans.view',
                'title'      => 'Liste des Prêts',
                'filename'   => 'prets',
                'searchable' => ['lender_name', 'reference_number'],
                'filters'    => ['status' => 'status', 'lender_type' => 'lender_type'],
                'columns'    => [
                    'reference_number' => 'Référence',
                    'lender_name'      => 'Prêteur',
                    'lender_type'      => 'Type',
                    'amount'           => 'Montant',
                    'interest_rate'    => 'Taux (%)',
                    'start_date'       => 'Début',
                    'end_date'         => 'Fin',
                    'status'           => 'Statut',
                ],
            ],

            'money-transfers' => [
                'model'      => MoneyTransfer::class,
                'permission' => 'finance.money_transfers.view',
                'title'      => 'Liste des Virements',
                'filename'   => 'virements',
                'with'       => ['fromBankAccount', 'toBankAccount'],
                'searchable' => ['reference_number'],
                'filters'    => ['status' => 'status'],
                'columns'    => [
                    'reference_number'       => 'Référence',
                    'fromBankAccount.bank_name' => 'De (Banque)',
                    'toBankAccount.bank_name'   => 'Vers (Banque)',
                    'amount'                 => 'Montant',
                    'transfer_date'          => 'Date',
                    'status'                 => 'Statut',
                ],
            ],

            'finance-categories' => [
                'model'      => FinanceCategory::class,
                'permission' => 'finance.categories.view',
                'title'      => 'Liste des Catégories Financières',
                'filename'   => 'categories-financieres',
                'searchable' => ['name'],
                'filters'    => ['type' => 'type'],
                'columns'    => [
                    'name' => 'Nom',
                    'type' => 'Type',
                ],
            ],

            // ─── Inventory ───────────────────────────────────────
            'warehouses' => [
                'model'      => Warehouse::class,
                'permission' => 'inventory.warehouses.view',
                'title'      => 'Liste des Entrepôts',
                'filename'   => 'entrepots',
                'searchable' => ['name', 'code'],
                'columns'    => [
                    'name'      => 'Nom',
                    'code'      => 'Code',
                    'address'   => 'Adresse',
                    'is_active' => 'Actif',
                ],
            ],

            'stock-movements' => [
                'model'      => StockMovement::class,
                'permission' => 'inventory.stock.view',
                'title'      => 'Liste des Mouvements de Stock',
                'filename'   => 'mouvements-stock',
                'with'       => ['product', 'warehouse'],
                'searchable' => ['product.name', 'product.code'],
                'filters'    => ['warehouse_id' => 'warehouse_id', 'movement_type' => 'movement_type'],
                'columns'    => [
                    'product.name'   => 'Produit',
                    'warehouse.name' => 'Entrepôt',
                    'movement_type'  => 'Type',
                    'quantity'       => 'Quantité',
                    'created_at'     => 'Date',
                ],
            ],

            'stock-transfers' => [
                'model'      => StockTransfer::class,
                'permission' => 'inventory.transfers.view',
                'title'      => 'Liste des Transferts de Stock',
                'filename'   => 'transferts-stock',
                'with'       => ['fromWarehouse', 'toWarehouse'],
                'searchable' => ['number'],
                'filters'    => ['status' => 'status'],
                'columns'    => [
                    'number'             => 'N° Transfert',
                    'fromWarehouse.name' => 'De',
                    'toWarehouse.name'   => 'Vers',
                    'transfer_date'      => 'Date',
                    'status'             => 'Statut',
                ],
            ],

            // ─── Users ───────────────────────────────────────────
            'users' => [
                'model'      => User::class,
                'permission' => 'users.view',
                'title'      => 'Liste des Utilisateurs',
                'filename'   => 'utilisateurs',
                'with'       => ['roles'],
                'searchable' => ['name', 'email'],
                'columns'    => [
                    'name'  => 'Nom',
                    'email' => 'Email',
                ],
            ],

            // ─── Pro ─────────────────────────────────────────────
            'branches' => [
                'model'      => Branch::class,
                'permission' => 'pro.branches.view',
                'title'      => 'Liste des Succursales',
                'filename'   => 'succursales',
                'searchable' => ['name', 'code', 'email'],
                'columns'    => [
                    'name'    => 'Nom',
                    'code'    => 'Code',
                    'email'   => 'Email',
                    'phone'   => 'Téléphone',
                    'address' => 'Adresse',
                ],
            ],

            'recurring-invoices' => [
                'model'      => RecurringInvoice::class,
                'permission' => 'pro.recurring_invoices.view',
                'title'      => 'Liste des Factures Récurrentes',
                'filename'   => 'factures-recurrentes',
                'with'       => ['customer'],
                'searchable' => ['customer.name'],
                'filters'    => ['status' => 'status'],
                'columns'    => [
                    'customer.name'    => 'Client',
                    'frequency'        => 'Fréquence',
                    'next_invoice_date' => 'Prochaine facture',
                    'status'           => 'Statut',
                ],
            ],

            'invoice-reminders' => [
                'model'      => InvoiceReminder::class,
                'permission' => 'pro.invoice_reminders.view',
                'title'      => 'Liste des Relances',
                'filename'   => 'relances',
                'with'       => ['invoice', 'invoice.customer'],
                'searchable' => ['invoice.number'],
                'filters'    => ['status' => 'status', 'type' => 'type'],
                'columns'    => [
                    'invoice.number'        => 'N° Facture',
                    'invoice.customer.name' => 'Client',
                    'type'                  => 'Type',
                    'scheduled_at'          => 'Date prévue',
                    'sent_at'               => 'Date envoi',
                    'status'                => 'Statut',
                ],
            ],

            // ─── Billing (SuperAdmin) ──────────────────────────
            'subscriptions' => [
                'model'      => Subscription::class,
                'title'      => 'Liste des Abonnements',
                'filename'   => 'abonnements',
                'with'       => ['plan', 'tenant'],
                'searchable' => ['tenant.name', 'plan.name'],
                'filters'    => ['status' => 'status'],
                'columns'    => [
                    'tenant.name' => 'Tenant',
                    'plan.name'   => 'Plan',
                    'status'      => 'Statut',
                    'starts_at'   => 'Début',
                    'ends_at'     => 'Fin',
                ],
            ],

            'plans' => [
                'model'      => Plan::class,
                'title'      => 'Liste des Plans',
                'filename'   => 'plans',
                'searchable' => ['name', 'code'],
                'filters'    => ['is_active' => 'is_active'],
                'columns'    => [
                    'name'      => 'Nom',
                    'code'      => 'Code',
                    'interval'  => 'Intervalle',
                    'price'     => 'Prix',
                    'currency'  => 'Devise',
                    'is_active' => 'Actif',
                ],
            ],

            'tenants' => [
                'model'      => Tenant::class,
                'title'      => 'Liste des Tenants',
                'filename'   => 'tenants',
                'searchable' => ['name', 'slug'],
                'filters'    => ['status' => 'status'],
                'columns'    => [
                    'name'             => 'Nom',
                    'slug'             => 'Slug',
                    'status'           => 'Statut',
                    'default_currency' => 'Devise',
                    'created_at'       => 'Date création',
                ],
            ],

            'roles' => [
                'model'      => Role::class,
                'title'      => 'Liste des Rôles',
                'filename'   => 'roles',
                'searchable' => ['name'],
                'columns'    => [
                    'name'       => 'Nom',
                    'guard_name' => 'Guard',
                ],
            ],
        ];

        return $configs[$type] ?? null;
    }
}
