<?php

namespace App\Http\Controllers\Backoffice\Settings;

use App\Exports\TenantDataExport;
use App\Exports\TenantDataSheet;
use App\Http\Controllers\Controller;
use App\Models\CRM\Customer;
use App\Models\Finance\BankAccount;
use App\Models\Finance\Expense;
use App\Models\Finance\Income;
use App\Models\Catalog\Product;
use App\Models\Purchases\PurchaseOrder;
use App\Models\Purchases\Supplier;
use App\Models\Purchases\VendorBill;
use App\Models\Sales\CreditNote;
use App\Models\Sales\Invoice;
use App\Models\Sales\Payment;
use App\Models\Sales\Quote;
use App\Models\System\ActivityLog;
use App\Services\Tenancy\TenantContext;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class DataExportController extends Controller
{
    /** Safe alphanumeric chars only in the downloaded filename */
    private function safeFilename(string $name): string
    {
        return preg_replace('/[^a-z0-9\-]/i', '-', Str::slug($name));
    }

    /**
     * Prevent CSV/Excel formula injection.
     * Cells starting with =, +, -, @ trigger formula execution in spreadsheet apps.
     */
    private function sanitizeCell(mixed $value): mixed
    {
        if (!is_string($value)) {
            return $value;
        }
        if (in_array($value[0] ?? '', ['=', '+', '-', '@', "\t", "\r"], true)) {
            return "'" . $value; // prefix with apostrophe — Excel treats it as literal text
        }
        return $value;
    }

    private function sanitizeRow(array $row): array
    {
        return array_map([$this, 'sanitizeCell'], $row);
    }

    /**
     * Mask a bank account number: show only last 4 digits.
     * e.g. "MA64011519000001205000534921" → "****4921"
     */
    private function maskAccountNumber(?string $number): string
    {
        if (!$number) {
            return '';
        }
        $clean = preg_replace('/\s/', '', $number);
        return '****' . substr($clean, -4);
    }

    /** Module metadata: label, headings, flatten callback */
    private function moduleConfig(): array
    {
        return [
            'customers' => [
                'label'    => 'Clients',
                'headings' => ['ID', 'Nom', 'Email', 'Téléphone', 'Type', 'Devise', 'Pays', 'Ville', 'Adresse', 'N° Fiscal', 'Créé le'],
                'extract'  => fn () => Customer::with('addresses', 'contacts')->get()->map(fn ($r) => $this->sanitizeRow($this->flattenCustomer($r)))->toArray(),
            ],
            'invoices' => [
                'label'    => 'Factures',
                'headings' => ['ID', 'N° Facture', 'Client', 'Date émission', 'Échéance', 'Statut', 'HT', 'TVA', 'TTC', 'Devise', 'Créé le'],
                'extract'  => fn () => Invoice::with('customer', 'items')->get()->map(fn ($r) => $this->sanitizeRow($this->flattenInvoice($r)))->toArray(),
            ],
            'quotes' => [
                'label'    => 'Devis',
                'headings' => ['ID', 'N° Devis', 'Client', 'Date émission', 'Expiration', 'Statut', 'Total', 'Devise', 'Créé le'],
                'extract'  => fn () => Quote::with('customer', 'items')->get()->map(fn ($r) => $this->sanitizeRow($this->flattenQuote($r)))->toArray(),
            ],
            'payments' => [
                'label'    => 'Paiements reçus',
                'headings' => ['ID', 'N° Paiement', 'Client', 'Montant', 'Date paiement', 'Méthode', 'Créé le'],
                'extract'  => fn () => Payment::with('customer')->get()->map(fn ($r) => $this->sanitizeRow($this->flattenPayment($r)))->toArray(),
            ],
            'credit_notes' => [
                'label'    => 'Avoirs',
                'headings' => ['ID', 'Numéro', 'Client', 'Date émission', 'Statut', 'Total', 'Créé le'],
                'extract'  => fn () => CreditNote::with('customer')->get()->map(fn ($r) => $this->sanitizeRow($this->flattenCreditNote($r)))->toArray(),
            ],
            'suppliers' => [
                'label'    => 'Fournisseurs',
                'headings' => ['ID', 'Nom', 'Email', 'Téléphone', 'N° Fiscal', 'Délai paiement (j)', 'Statut', 'Notes', 'Créé le'],
                'extract'  => fn () => Supplier::get()->map(fn ($r) => $this->sanitizeRow($this->flattenSupplier($r)))->toArray(),
            ],
            'purchase_orders' => [
                'label'    => 'Bons de commande',
                'headings' => ['ID', 'Numéro', 'Fournisseur', 'Date commande', 'Statut', 'Total', 'Créé le'],
                'extract'  => fn () => PurchaseOrder::with('supplier', 'items')->get()->map(fn ($r) => $this->sanitizeRow($this->flattenPurchaseOrder($r)))->toArray(),
            ],
            'vendor_bills' => [
                'label'    => 'Factures fournisseurs',
                'headings' => ['ID', 'Numéro', 'Fournisseur', 'Référence', 'Statut', 'Date émission', 'Échéance', 'HT', 'TVA', 'TTC', 'Payé', 'Restant', 'Créé le'],
                'extract'  => fn () => VendorBill::with('supplier')->get()->map(fn ($r) => $this->sanitizeRow($this->flattenVendorBill($r)))->toArray(),
            ],
            'products' => [
                'label'    => 'Produits & services',
                'headings' => ['ID', 'Nom', 'SKU', 'Catégorie', 'Unité', 'Prix vente', 'Coût', 'Stock', 'Créé le'],
                'extract'  => fn () => Product::with('category', 'unit')->get()->map(fn ($r) => $this->sanitizeRow($this->flattenProduct($r)))->toArray(),
            ],
            'expenses' => [
                'label'    => 'Dépenses',
                'headings' => ['ID', 'N° Dépense', 'Référence', 'Montant', 'Payé', 'Date', 'Mode paiement', 'Statut', 'Fournisseur', 'Catégorie', 'Description', 'Créé le'],
                'extract'  => fn () => Expense::with('category', 'supplier')->get()->map(fn ($r) => $this->sanitizeRow($this->flattenExpense($r)))->toArray(),
            ],
            'income' => [
                'label'    => 'Revenus',
                'headings' => ['ID', 'N° Revenu', 'Référence', 'Montant', 'Date', 'Mode paiement', 'Client', 'Catégorie', 'Description', 'Créé le'],
                'extract'  => fn () => Income::with('category', 'customer')->get()->map(fn ($r) => $this->sanitizeRow($this->flattenIncome($r)))->toArray(),
            ],
            'bank_accounts' => [
                'label'    => 'Comptes bancaires',
                // N° Compte is masked — real number is never exported
                'headings' => ['ID', 'Titulaire', 'N° Compte (masqué)', 'Banque', 'Agence', 'Type', 'Devise', 'Solde initial', 'Solde actuel', 'Actif', 'Créé le'],
                'extract'  => fn () => BankAccount::get()->map(fn ($r) => $this->sanitizeRow($this->flattenBankAccount($r)))->toArray(),
            ],
        ];
    }

    public function index()
    {
        $tenant = TenantContext::get();

        $stats = [
            'customers'       => Customer::count(),
            'invoices'        => Invoice::count(),
            'quotes'          => Quote::count(),
            'payments'        => Payment::count(),
            'credit_notes'    => CreditNote::count(),
            'suppliers'       => Supplier::count(),
            'purchase_orders' => PurchaseOrder::count(),
            'vendor_bills'    => VendorBill::count(),
            'products'        => Product::count(),
            'expenses'        => Expense::count(),
            'income'          => Income::count(),
            'bank_accounts'   => BankAccount::count(),
        ];

        return view('backoffice.settings.data-export', compact('tenant', 'stats'));
    }

    public function export(Request $request)
    {
        // Hard permission gate (belt + suspenders alongside route middleware)
        abort_unless(auth()->user()->can('settings.data_export.create'), 403);

        $request->validate([
            'modules'   => 'required|array|min:1|max:12',
            'modules.*' => 'required|string|in:customers,invoices,quotes,payments,credit_notes,suppliers,purchase_orders,vendor_bills,products,expenses,income,bank_accounts',
            'format'    => 'required|in:xlsx,json',
        ], [
            'modules.required' => 'Veuillez sélectionner au moins un module à exporter.',
            'modules.min'      => 'Veuillez sélectionner au moins un module à exporter.',
            'modules.max'      => 'Trop de modules sélectionnés.',
            'format.required'  => "Veuillez choisir un format d'export.",
            'format.in'        => 'Le format sélectionné est invalide.',
        ]);

        $format  = $request->input('format');
        $modules = $request->input('modules');
        $tenant  = TenantContext::get();
        $config  = $this->moduleConfig();

        // Log the export attempt for audit trail
        ActivityLog::create([
            'tenant_id'    => $tenant->id,
            'user_id'      => auth()->id(),
            'action'       => 'data_export',
            'subject_type' => 'export',
            'subject_id'   => null,
            'properties'   => ['format' => $format, 'modules' => $modules],
            'ip'           => $request->ip(),
            'user_agent'   => $request->userAgent(),
        ]);

        if ($format === 'json') {
            $data = [];
            foreach ($modules as $module) {
                if (isset($config[$module])) {
                    $data[$config[$module]['label']] = $config[$module]['extract']();
                }
            }
            return $this->exportJson($data, $tenant->name ?? 'export');
        }

        ini_set('memory_limit', '512M');
        set_time_limit(120);

        $sheets = [];
        foreach ($modules as $module) {
            if (!isset($config[$module])) {
                continue;
            }
            $rows = $config[$module]['extract']();
            if (empty($rows)) {
                continue;
            }
            $sheets[] = new TenantDataSheet(
                $config[$module]['label'],
                $config[$module]['headings'],
                $rows
            );
        }

        if (empty($sheets)) {
            return back()->with('error', __('Aucune donnée à exporter pour les modules sélectionnés.'));
        }

        $filename = 'export-' . $this->safeFilename($tenant->name ?? 'export') . '-' . now()->format('Y-m-d') . '.xlsx';

        return Excel::download(new TenantDataExport($sheets), $filename);
    }

    // ──────────────────────────────────────────────────────────────
    // Flatten helpers
    // ──────────────────────────────────────────────────────────────

    private function flattenCustomer($r): array
    {
        return [
            $r->id,
            $r->name,
            $r->email,
            $r->phone,
            $r->type,
            $r->currency,
            $r->country,
            $r->city,
            $r->address,
            $r->tax_number,
            $r->created_at?->format('d/m/Y'),
        ];
    }

    private function flattenInvoice($r): array
    {
        return [
            $r->id,
            $r->invoice_number,
            $r->customer?->name,
            $r->issue_date?->format('d/m/Y'),
            $r->due_date?->format('d/m/Y'),
            $r->status,
            (float) $r->subtotal,
            (float) $r->tax_total,
            (float) $r->total,
            $r->currency,
            $r->created_at?->format('d/m/Y'),
        ];
    }

    private function flattenQuote($r): array
    {
        return [
            $r->id,
            $r->quote_number,
            $r->customer?->name,
            $r->issue_date?->format('d/m/Y'),
            $r->expiry_date?->format('d/m/Y'),
            $r->status,
            (float) $r->total,
            $r->currency,
            $r->created_at?->format('d/m/Y'),
        ];
    }

    private function flattenPayment($r): array
    {
        return [
            $r->id,
            $r->payment_number,
            $r->customer?->name,
            (float) $r->amount,
            $r->payment_date?->format('d/m/Y'),
            $r->payment_method,
            $r->created_at?->format('d/m/Y'),
        ];
    }

    private function flattenCreditNote($r): array
    {
        return [
            $r->id,
            $r->number,
            $r->customer?->name,
            $r->issue_date?->format('d/m/Y'),
            $r->status,
            (float) $r->total,
            $r->created_at?->format('d/m/Y'),
        ];
    }

    private function flattenSupplier($r): array
    {
        return [
            $r->id,
            $r->name,
            $r->email,
            $r->phone,
            $r->tax_id,
            $r->payment_terms_days,
            $r->status,
            $r->notes,
            $r->created_at?->format('d/m/Y'),
        ];
    }

    private function flattenPurchaseOrder($r): array
    {
        return [
            $r->id,
            $r->number,
            $r->supplier?->name,
            $r->order_date?->format('d/m/Y'),
            $r->status,
            (float) $r->total,
            $r->created_at?->format('d/m/Y'),
        ];
    }

    private function flattenVendorBill($r): array
    {
        return [
            $r->id,
            $r->number,
            $r->supplier?->name,
            $r->reference_number,
            $r->status,
            $r->issue_date?->format('d/m/Y'),
            $r->due_date?->format('d/m/Y'),
            (float) $r->subtotal,
            (float) $r->tax_total,
            (float) $r->total,
            (float) $r->amount_paid,
            (float) $r->amount_due,
            $r->created_at?->format('d/m/Y'),
        ];
    }

    private function flattenProduct($r): array
    {
        return [
            $r->id,
            $r->name,
            $r->sku,
            $r->category?->name,
            $r->unit?->name,
            (float) $r->price,
            (float) $r->cost,
            $r->stock_quantity,
            $r->created_at?->format('d/m/Y'),
        ];
    }

    private function flattenExpense($r): array
    {
        return [
            $r->id,
            $r->expense_number,
            $r->reference_number,
            (float) $r->amount,
            (float) $r->paid_amount,
            $r->expense_date?->format('d/m/Y'),
            $r->payment_mode,
            $r->payment_status,
            $r->supplier?->name,
            $r->category?->name,
            $r->description,
            $r->created_at?->format('d/m/Y'),
        ];
    }

    private function flattenIncome($r): array
    {
        return [
            $r->id,
            $r->income_number,
            $r->reference_number,
            (float) $r->amount,
            $r->income_date?->format('d/m/Y'),
            $r->payment_mode,
            $r->customer?->name,
            $r->category?->name,
            $r->description,
            $r->created_at?->format('d/m/Y'),
        ];
    }

    private function flattenBankAccount($r): array
    {
        return [
            $r->id,
            $r->account_holder_name,
            $this->maskAccountNumber($r->account_number), // masked — never export full number
            $r->bank_name,
            $r->branch,
            $r->account_type,
            $r->currency,
            (float) $r->opening_balance,
            (float) $r->current_balance,
            $r->is_active ? 'Oui' : 'Non',
            $r->created_at?->format('d/m/Y'),
        ];
    }

    private function exportJson(array $data, string $tenantName): Response
    {
        $filename = 'export-' . $this->safeFilename($tenantName) . '-' . now()->format('Y-m-d') . '.json';

        return response(
            json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE),
            200,
            [
                'Content-Type'        => 'application/json',
                'Content-Disposition' => 'attachment; filename="' . $filename . '"',
                'X-Content-Type-Options' => 'nosniff',
            ]
        );
    }
}
