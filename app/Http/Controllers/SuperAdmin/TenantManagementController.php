<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Billing\Subscription;
use App\Models\Tenancy\Tenant;
use App\Models\Tenancy\TenantDomain;
use App\Models\User;
use App\Services\Billing\PlanLimitService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class TenantManagementController extends Controller
{
    /**
     * List all tenants.
     */
    public function index(Request $request)
    {
        $tenants = Tenant::with(['domains', 'subscriptions.plan', 'subscriptions.invoices'])
            ->withCount('users')
            ->orderByDesc('created_at')
            ->paginate(20);

        $totalTenants = Tenant::count();
        $activeTenants = Tenant::where('status', 'active')->count();
        $inactiveTenants = Tenant::where('status', '!=', 'active')->count();
        $totalDomains = TenantDomain::count();

        return view('backoffice.tenants.index', compact(
            'tenants',
            'totalTenants',
            'activeTenants',
            'inactiveTenants',
            'totalDomains'
        ));
    }

    /**
     * Show form to create a new tenant.
     */
    public function create()
    {
        return view('backoffice.tenants.create');
    }

    /**
     * Store a new tenant with owner account.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:100|unique:tenants,slug|alpha_dash',
            'domain' => 'required|string|max:255|unique:tenant_domains,domain',
            'status' => 'required|in:active,suspended,cancelled',
            'timezone' => 'nullable|string|max:50',
            'default_currency' => 'nullable|string|size:3',
            'has_free_trial' => 'nullable|boolean',
            'trial_ends_at' => 'required_if:has_free_trial,1|nullable|date',
            'cropped_logo' => 'nullable|string',
            'owner_name' => 'required|string|max:255',
            'owner_email' => 'required|email|max:255|unique:users,email',
            'owner_password' => 'required|string|min:8|confirmed',
        ], [
            'trial_ends_at.required_if' => "La date de fin d'essai est obligatoire lorsque l'essai gratuit est activé.",
        ]);

        $tenant = DB::transaction(function () use ($validated, $request) {
            // Create the tenant
            $tenant = Tenant::create([
                'name' => $validated['name'],
                'slug' => $validated['slug'],
                'status' => $validated['status'],
                'timezone' => $validated['timezone'] ?? 'Africa/Casablanca',
                'default_currency' => $validated['default_currency'] ?? 'MAD',
                'has_free_trial' => $request->boolean('has_free_trial'),
                'trial_ends_at' => $validated['trial_ends_at'] ?? null,
            ]);

            // Upload cropped logo if provided
            if ($request->filled('cropped_logo')) {
                $this->saveCroppedLogo($tenant, $request->input('cropped_logo'));
            }

            // Create primary domain
            $tenant->domains()->create([
                'domain' => $validated['domain'],
                'is_primary' => true,
            ]);

            // Create owner account
            $owner = $tenant->users()->create([
                'name' => $validated['owner_name'],
                'email' => $validated['owner_email'],
                'password' => Hash::make($validated['owner_password']),
                'status' => 'active',
                'email_verified_at' => now(),
            ]);

            // Assign owner role if it exists
            if (class_exists(\Spatie\Permission\Models\Role::class)) {
                $role = \App\Models\Tenancy\Role::firstOrCreate(
                    ['name' => 'owner', 'guard_name' => 'web', 'tenant_id' => $tenant->id]
                );
                $owner->assignRole($role);
            }

            // Seed default finance categories for the new tenant
            $this->seedFinanceCategoriesForTenant($tenant);

            // Note: Free templates are accessible to all tenants by default (is_free=true)
            // No need to attach them - only purchased/premium templates need tenant_templates records

            return $tenant;
        });

        return redirect()->route('sa.tenants.index')
            ->with('success', __("Le tenant « {$tenant->name} » a été créé avec succès."));
    }

    /**
     * Show a single tenant (kept for API / direct access).
     */
    public function show(Tenant $tenant)
    {
        $tenant->load('domains', 'users', 'settings');

        return view('backoffice.tenants.show', compact('tenant'));
    }

    /**
     * Show form to edit a tenant (kept for fallback).
     */
    public function edit(Tenant $tenant)
    {
        return view('backoffice.tenants.edit', compact('tenant'));
    }

    /**
     * Update a tenant.
     */
    public function update(Request $request, Tenant $tenant)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:100|alpha_dash|unique:tenants,slug,' . $tenant->id,
            'status' => 'required|in:active,suspended,cancelled',
            'timezone' => 'nullable|string|max:50',
            'default_currency' => 'nullable|string|size:3',
            'has_free_trial' => 'nullable|boolean',
            'trial_ends_at' => 'required_if:has_free_trial,1|nullable|date',
            'cropped_logo' => 'nullable|string',
            'cropped_logo_deleted' => 'nullable|string',
        ], [
            'trial_ends_at.required_if' => "La date de fin d'essai est obligatoire lorsque l'essai gratuit est activé.",
        ]);

        $validated['has_free_trial'] = $request->boolean('has_free_trial');

        unset($validated['cropped_logo'], $validated['cropped_logo_deleted']);
        $tenant->update($validated);

        // Handle logo: upload new or delete existing
        if ($request->filled('cropped_logo')) {
            $this->saveCroppedLogo($tenant, $request->input('cropped_logo'));
        } elseif ($request->input('cropped_logo_deleted') === '1') {
            $tenant->clearMediaCollection('logo');
        }

        return redirect()->route('sa.tenants.index')
            ->with('success', __("Le tenant « {$tenant->name} » a été mis à jour avec succès."));
    }

    /**
     * Delete a tenant.
     */
    public function destroy(Tenant $tenant)
    {
        $name = $tenant->name;
        $tenant->delete();

        return redirect()->route('sa.tenants.index')
            ->with('success', __("Le tenant « {$name} » a été supprimé avec succès."));
    }

    /**
     * Suspend a tenant.
     */
    public function suspend(Tenant $tenant)
    {
        $tenant->update(['status' => 'suspended']);

        return redirect()->route('sa.tenants.index')
            ->with('success', __("Le tenant « {$tenant->name} » a été suspendu."));
    }

    /**
     * Activate a tenant.
     */
    public function activate(Tenant $tenant)
    {
        $tenant->update(['status' => 'active']);

        return redirect()->route('sa.tenants.index')
            ->with('success', __("Le tenant « {$tenant->name} » a été activé."));
    }

    /**
     * Show tenant usage and limits.
     */
    public function usage(Tenant $tenant, PlanLimitService $limitService)
    {
        $subscription = Subscription::withoutGlobalScopes()
            ->where('tenant_id', $tenant->id)
            ->whereIn('status', ['active', 'trialing'])
            ->with('plan')
            ->latest('starts_at')
            ->first();

        $usageData = $limitService->getAllUsageForTenant($tenant->id);

        return view('backoffice.tenants.usage', compact('tenant', 'subscription', 'usageData'));
    }

    /**
     * Update plan limits for a tenant's active subscription.
     */
    public function updateLimits(Request $request, Tenant $tenant)
    {
        $subscription = Subscription::withoutGlobalScopes()
            ->where('tenant_id', $tenant->id)
            ->whereIn('status', ['active', 'trialing'])
            ->with('plan')
            ->latest('starts_at')
            ->first();

        if (!$subscription || !$subscription->plan) {
            return redirect()->route('sa.tenants.usage', $tenant)
                ->with('error', __('Aucun abonnement actif trouvé pour ce tenant.'));
        }

        $validated = $request->validate([
            'max_users'              => 'nullable|integer|min:0',
            'max_customers'          => 'nullable|integer|min:0',
            'max_products'           => 'nullable|integer|min:0',
            'max_invoices_per_month' => 'nullable|integer|min:0',
            'max_quotes_per_month'   => 'nullable|integer|min:0',
            'max_exports_per_month'  => 'nullable|integer|min:0',
            'max_warehouses'         => 'nullable|integer|min:0',
            'max_bank_accounts'      => 'nullable|integer|min:0',
            'max_storage_mb'         => 'nullable|integer|min:0',
        ]);

        // Convert empty strings to null (= unlimited)
        foreach ($validated as $key => $value) {
            $validated[$key] = $value === null || $value === '' ? null : (int) $value;
        }

        $subscription->plan->update($validated);

        return redirect()->route('sa.tenants.usage', $tenant)
            ->with('success', __("Les limites du plan « {$subscription->plan->name} » ont été mises à jour."));
    }

    /**
     * Save a base64-cropped logo to the tenant's media collection.
     */
    private function saveCroppedLogo(Tenant $tenant, string $base64): void
    {
        $data = substr($base64, strpos($base64, ',') + 1);
        $decoded = base64_decode($data);

        preg_match('/^data:image\/(\w+);/', $base64, $matches);
        $ext = $matches[1] ?? 'png';
        if ($ext === 'jpeg') {
            $ext = 'jpg';
        }

        $fileName = 'logo-' . Str::random(8) . '.' . $ext;
        $tmpPath = sys_get_temp_dir() . '/' . $fileName;
        file_put_contents($tmpPath, $decoded);

        $tenant->clearMediaCollection('logo');
        $tenant->addMedia($tmpPath)
            ->usingFileName($fileName)
            ->toMediaCollection('logo');
    }

    /**
     * Seed default finance categories for a tenant.
     */
    private function seedFinanceCategoriesForTenant(Tenant $tenant): void
    {
        $categories = [
            // Income categories
            ['name' => 'Ventes - Paiements Clients', 'type' => 'income'],
            ['name' => 'Ventes - Produits', 'type' => 'income'],
            ['name' => 'Ventes - Services', 'type' => 'income'],
            ['name' => 'Revenus - Intérêts', 'type' => 'income'],
            ['name' => 'Revenus - Autres', 'type' => 'income'],
            // Expense categories
            ['name' => 'Achats - Paiements Fournisseurs', 'type' => 'expense'],
            ['name' => 'Achats - Matières premières', 'type' => 'expense'],
            ['name' => 'Achats - Marchandises', 'type' => 'expense'],
            ['name' => 'Frais - Loyer', 'type' => 'expense'],
            ['name' => 'Frais - Électricité', 'type' => 'expense'],
            ['name' => 'Frais - Internet & Téléphone', 'type' => 'expense'],
            ['name' => 'Frais - Salaires', 'type' => 'expense'],
            ['name' => 'Frais - Transport', 'type' => 'expense'],
            ['name' => 'Frais - Fournitures de bureau', 'type' => 'expense'],
            ['name' => 'Frais - Marketing & Publicité', 'type' => 'expense'],
            ['name' => 'Frais - Assurances', 'type' => 'expense'],
            ['name' => 'Frais - Bancaires', 'type' => 'expense'],
            ['name' => 'Frais - Autres', 'type' => 'expense'],
        ];

        foreach ($categories as $category) {
            \App\Models\Finance\FinanceCategory::firstOrCreate(
                [
                    'tenant_id' => $tenant->id,
                    'name' => $category['name'],
                    'type' => $category['type'],
                ],
                ['is_active' => true]
            );
        }
    }
}
