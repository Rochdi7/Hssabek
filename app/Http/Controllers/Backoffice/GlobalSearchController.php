<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class GlobalSearchController extends Controller
{
    /**
     * Perform a global search across key entities.
     * Tenant scoping is handled automatically by the BelongsToTenant global scope.
     */
    public function __invoke(Request $request): JsonResponse
    {
        $query = trim($request->input('q', ''));

        if (mb_strlen($query) < 2) {
            return response()->json(['results' => []]);
        }

        $like = "%{$query}%";
        $limit = 5;
        $results = [];

        // ── Customers ──────────────────────────────────────
        $customers = \App\Models\CRM\Customer::query()
            ->where(function ($q) use ($like) {
                $q->where('name', 'LIKE', $like)
                    ->orWhere('email', 'LIKE', $like)
                    ->orWhere('phone', 'LIKE', $like)
                    ->orWhere('tax_id', 'LIKE', $like);
            })
            ->limit($limit)
            ->get();

        foreach ($customers as $c) {
            $results[] = [
                'category' => 'Clients',
                'icon' => 'isax isax-profile-2user',
                'color' => 'primary',
                'title' => $c->name,
                'subtitle' => $c->email ?: $c->phone ?: '',
                'url' => route('bo.crm.customers.show', $c->id),
            ];
        }

        // ── Invoices ───────────────────────────────────────
        $invoices = \App\Models\Sales\Invoice::query()
            ->where(function ($q) use ($like) {
                $q->where('number', 'LIKE', $like)
                    ->orWhere('reference_number', 'LIKE', $like)
                    ->orWhereHas('customer', function ($cq) use ($like) {
                        $cq->where('name', 'LIKE', $like);
                    });
            })
            ->with('customer:id,name')
            ->latest('issue_date')
            ->limit($limit)
            ->get();

        foreach ($invoices as $inv) {
            $results[] = [
                'category' => 'Factures',
                'icon' => 'isax isax-receipt-item',
                'color' => 'success',
                'title' => $inv->number,
                'subtitle' => ($inv->customer->name ?? '') . ' — ' . number_format($inv->total ?? 0, 2, ',', ' '),
                'url' => route('bo.sales.invoices.show', $inv->id),
            ];
        }

        // ── Quotes ─────────────────────────────────────────
        $quotes = \App\Models\Sales\Quote::query()
            ->where(function ($q) use ($like) {
                $q->where('number', 'LIKE', $like)
                    ->orWhere('reference_number', 'LIKE', $like)
                    ->orWhereHas('customer', function ($cq) use ($like) {
                        $cq->where('name', 'LIKE', $like);
                    });
            })
            ->with('customer:id,name')
            ->latest('issue_date')
            ->limit($limit)
            ->get();

        foreach ($quotes as $qt) {
            $results[] = [
                'category' => 'Devis',
                'icon' => 'isax isax-document-text',
                'color' => 'info',
                'title' => $qt->number,
                'subtitle' => $qt->customer->name ?? '',
                'url' => route('bo.sales.quotes.show', $qt->id),
            ];
        }

        // ── Products ───────────────────────────────────────
        $products = \App\Models\Catalog\Product::query()
            ->where(function ($q) use ($like) {
                $q->where('name', 'LIKE', $like)
                    ->orWhere('sku', 'LIKE', $like)
                    ->orWhere('code', 'LIKE', $like);
            })
            ->limit($limit)
            ->get();

        foreach ($products as $p) {
            $results[] = [
                'category' => 'Produits',
                'icon' => 'isax isax-box',
                'color' => 'warning',
                'title' => $p->name,
                'subtitle' => $p->sku ? "SKU: {$p->sku}" : ($p->code ? "Code: {$p->code}" : ''),
                'url' => route('bo.catalog.products.edit', $p->id),
            ];
        }

        // ── Suppliers ──────────────────────────────────────
        $suppliers = \App\Models\Purchases\Supplier::query()
            ->where(function ($q) use ($like) {
                $q->where('name', 'LIKE', $like)
                    ->orWhere('email', 'LIKE', $like)
                    ->orWhere('phone', 'LIKE', $like);
            })
            ->limit($limit)
            ->get();

        foreach ($suppliers as $s) {
            $results[] = [
                'category' => 'Fournisseurs',
                'icon' => 'isax isax-truck',
                'color' => 'danger',
                'title' => $s->name,
                'subtitle' => $s->email ?: $s->phone ?: '',
                'url' => route('bo.purchases.suppliers.show', $s->id),
            ];
        }

        // ── Payments ───────────────────────────────────────
        $payments = \App\Models\Sales\Payment::query()
            ->where(function ($q) use ($like) {
                $q->where('reference_number', 'LIKE', $like)
                    ->orWhereHas('customer', function ($cq) use ($like) {
                        $cq->where('name', 'LIKE', $like);
                    });
            })
            ->with('customer:id,name')
            ->latest('payment_date')
            ->limit($limit)
            ->get();

        foreach ($payments as $pay) {
            $results[] = [
                'category' => 'Paiements',
                'icon' => 'isax isax-money-recive',
                'color' => 'teal',
                'title' => $pay->reference_number ?: ('Paiement #' . substr($pay->id, 0, 8)),
                'subtitle' => ($pay->customer->name ?? '') . ' — ' . number_format($pay->amount ?? 0, 2, ',', ' '),
                'url' => route('bo.sales.payments.show', $pay->id),
            ];
        }

        // ── Expenses ───────────────────────────────────────
        $expenses = \App\Models\Finance\Expense::query()
            ->where(function ($q) use ($like) {
                $q->where('expense_number', 'LIKE', $like)
                    ->orWhere('reference_number', 'LIKE', $like)
                    ->orWhere('description', 'LIKE', $like);
            })
            ->with('category:id,name')
            ->latest('expense_date')
            ->limit($limit)
            ->get();

        foreach ($expenses as $exp) {
            $results[] = [
                'category' => 'Dépenses',
                'icon' => 'isax isax-wallet-minus',
                'color' => 'secondary',
                'title' => $exp->expense_number ?: ('Dépense #' . substr($exp->id, 0, 8)),
                'subtitle' => ($exp->category->name ?? '') . ' — ' . number_format($exp->amount ?? 0, 2, ',', ' '),
                'url' => route('bo.finance.expenses.index') . '?highlight=' . $exp->id,
            ];
        }

        return response()->json([
            'results' => $results,
            'total' => count($results),
        ]);
    }
}
