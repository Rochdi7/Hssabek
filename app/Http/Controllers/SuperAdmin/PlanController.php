<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Billing\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    /**
     * Limit field names used in plans.
     */
    private const LIMIT_FIELDS = [
        'max_users',
        'max_customers',
        'max_products',
        'max_invoices_per_month',
        'max_quotes_per_month',
        'max_exports_per_month',
        'max_warehouses',
        'max_bank_accounts',
        'max_storage_mb',
    ];

    /**
     * List all plans.
     */
    public function index()
    {
        $plans = Plan::withCount('subscriptions')
            ->orderBy('price')
            ->get();

        $totalPlans = Plan::count();
        $activePlans = Plan::where('is_active', true)->count();
        $inactivePlans = Plan::where('is_active', false)->count();
        $totalSubscribers = \App\Models\Billing\Subscription::where('status', 'active')->count();

        return view('backoffice.plans.index', compact(
            'plans',
            'totalPlans',
            'activePlans',
            'inactivePlans',
            'totalSubscribers'
        ));
    }

    /**
     * Show the create plan form.
     */
    public function create()
    {
        return view('backoffice.plans.create');
    }

    /**
     * Store a new plan.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'code' => 'required|string|max:50|unique:plans,code',
            'interval' => 'required|in:month,year,lifetime',
            'price' => 'required|numeric|min:0',
            'currency' => 'nullable|string|size:3',
            'trial_days' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
            'is_popular' => 'nullable|boolean',
            'max_users' => 'nullable|integer|min:1',
            'max_customers' => 'nullable|integer|min:1',
            'max_products' => 'nullable|integer|min:1',
            'max_invoices_per_month' => 'nullable|integer|min:1',
            'max_quotes_per_month' => 'nullable|integer|min:1',
            'max_exports_per_month' => 'nullable|integer|min:1',
            'max_warehouses' => 'nullable|integer|min:1',
            'max_bank_accounts' => 'nullable|integer|min:1',
            'max_storage_mb' => 'nullable|integer|min:1',
        ], [
            'name.required' => 'Le nom du plan est obligatoire.',
            'name.max' => 'Le nom ne doit pas dépasser 255 caractères.',
            'description.max' => 'La description ne doit pas dépasser 1000 caractères.',
            'code.required' => 'Le code est obligatoire.',
            'code.unique' => 'Ce code est déjà utilisé par un autre plan.',
            'interval.required' => 'L\'intervalle est obligatoire.',
            'interval.in' => 'L\'intervalle doit être mensuel, annuel ou à vie.',
            'price.required' => 'Le prix est obligatoire.',
            'price.min' => 'Le prix ne peut pas être négatif.',
            'currency.size' => 'La devise doit contenir exactement 3 caractères.',
            'trial_days.min' => 'Les jours d\'essai ne peuvent pas être négatifs.',
        ]);

        $data = [
            'name' => $validated['name'],
            'description' => $validated['description'] ?? null,
            'code' => $validated['code'],
            'interval' => $validated['interval'],
            'price' => $validated['price'],
            'currency' => $validated['currency'] ?? 'MAD',
            'trial_days' => $validated['trial_days'] ?? 0,
            'is_active' => $request->boolean('is_active'),
            'is_popular' => $request->boolean('is_popular'),
        ];

        // Handle limit fields: if unlimited checkbox is checked, store null; otherwise store the value
        foreach (self::LIMIT_FIELDS as $field) {
            $unlimitedKey = $field . '_unlimited';
            if ($request->boolean($unlimitedKey)) {
                $data[$field] = null;
            } else {
                $data[$field] = $validated[$field] ?? null;
            }
        }

        Plan::create($data);

        return redirect()->route('sa.plans.index')
            ->with('success', __('Le plan a été créé avec succès.'));
    }

    /**
     * Show a single plan.
     */
    public function show(Plan $plan)
    {
        $plan->loadCount('subscriptions');

        return view('backoffice.plans.show', compact('plan'));
    }

    /**
     * Show the edit plan form.
     */
    public function edit(Plan $plan)
    {
        return view('backoffice.plans.edit', compact('plan'));
    }

    /**
     * Update a plan.
     */
    public function update(Request $request, Plan $plan)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'code' => 'required|string|max:50|unique:plans,code,' . $plan->id,
            'interval' => 'required|in:month,year,lifetime',
            'price' => 'required|numeric|min:0',
            'currency' => 'nullable|string|size:3',
            'trial_days' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
            'is_popular' => 'nullable|boolean',
            'max_users' => 'nullable|integer|min:1',
            'max_customers' => 'nullable|integer|min:1',
            'max_products' => 'nullable|integer|min:1',
            'max_invoices_per_month' => 'nullable|integer|min:1',
            'max_quotes_per_month' => 'nullable|integer|min:1',
            'max_exports_per_month' => 'nullable|integer|min:1',
            'max_warehouses' => 'nullable|integer|min:1',
            'max_bank_accounts' => 'nullable|integer|min:1',
            'max_storage_mb' => 'nullable|integer|min:1',
        ], [
            'name.required' => 'Le nom du plan est obligatoire.',
            'code.required' => 'Le code est obligatoire.',
            'code.unique' => 'Ce code est déjà utilisé par un autre plan.',
            'interval.required' => 'L\'intervalle est obligatoire.',
            'price.required' => 'Le prix est obligatoire.',
        ]);

        $data = [
            'name' => $validated['name'],
            'description' => $validated['description'] ?? null,
            'code' => $validated['code'],
            'interval' => $validated['interval'],
            'price' => $validated['price'],
            'currency' => $validated['currency'] ?? $plan->currency,
            'trial_days' => $validated['trial_days'] ?? 0,
            'is_active' => $request->boolean('is_active'),
            'is_popular' => $request->boolean('is_popular'),
        ];

        foreach (self::LIMIT_FIELDS as $field) {
            $unlimitedKey = $field . '_unlimited';
            if ($request->boolean($unlimitedKey)) {
                $data[$field] = null;
            } else {
                $data[$field] = $validated[$field] ?? null;
            }
        }

        $plan->update($data);

        return redirect()->route('sa.plans.index')
            ->with('success', __("Le plan « {$plan->name} » a été mis à jour avec succès."));
    }

    /**
     * Delete a plan.
     */
    public function destroy(Plan $plan)
    {
        if ($plan->subscriptions()->where('status', 'active')->exists()) {
            return redirect()->route('sa.plans.index')
                ->with('error', __("Impossible de supprimer le plan « {$plan->name} » car il possède des abonnements actifs."));
        }

        $name = $plan->name;
        $plan->delete();

        return redirect()->route('sa.plans.index')
            ->with('success', __("Le plan « {$name} » a été supprimé avec succès."));
    }
}
