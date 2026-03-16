<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Mail\AccountApprovedMail;
use App\Models\Billing\Plan;
use App\Models\Billing\Subscription;
use App\Models\Finance\FinanceCategory;
use App\Models\System\AccountRequest;
use App\Models\Tenancy\Tenant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AccountRequestController extends Controller
{
    public function index(Request $request)
    {
        $query = AccountRequest::with('handler')->latest();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('company_name', 'like', "%{$search}%")
                  ->orWhere('contact_name', 'like', "%{$search}%")
                  ->orWhere('company_email', 'like', "%{$search}%")
                  ->orWhere('contact_email', 'like', "%{$search}%");
            });
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $requests = $query->paginate(20)->withQueryString();
        $pendingCount = AccountRequest::where('status', 'pending')->count();
        $plans = Plan::where('is_active', true)->orderBy('price')->get();

        return view('backoffice.superadmin.account-requests.index', compact('requests', 'pendingCount', 'plans'));
    }

    public function show(AccountRequest $accountRequest)
    {
        $plans = Plan::where('is_active', true)->orderBy('price')->get();

        return view('backoffice.superadmin.account-requests.show', compact('accountRequest', 'plans'));
    }

    public function approve(Request $request, AccountRequest $accountRequest)
    {
        $validated = $request->validate([
            'password'       => 'required|string|min:8',
            'plan_id'        => 'required|exists:plans,id',
            'admin_notes'    => 'nullable|string|max:2000',
        ], [
            'password.required' => 'Le mot de passe est obligatoire.',
            'password.min'      => 'Le mot de passe doit contenir au moins :min caractères.',
            'plan_id.required'  => 'Veuillez sélectionner un plan.',
            'plan_id.exists'    => 'Le plan sélectionné est invalide.',
        ]);

        $plainPassword = $validated['password'];
        $slug = Str::slug($accountRequest->company_name);

        // Ensure unique slug
        $baseSlug = $slug;
        $counter = 1;
        while (Tenant::where('slug', $slug)->exists()) {
            $slug = $baseSlug . '-' . $counter++;
        }

        $tenant = DB::transaction(function () use ($accountRequest, $validated, $plainPassword, $slug) {
            // 1. Create tenant
            $tenant = Tenant::create([
                'name'             => $accountRequest->company_name,
                'slug'             => $slug,
                'status'           => 'active',
                'timezone'         => 'Africa/Casablanca',
                'default_currency' => 'MAD',
            ]);

            // 2. Create owner user
            $owner = $tenant->users()->create([
                'name'              => $accountRequest->contact_name,
                'email'             => $accountRequest->contact_email,
                'password'          => $plainPassword,
                'status'            => 'active',
                'email_verified_at' => now(),
            ]);

            // 3. Assign admin role (full access to tenant)
            if (class_exists(\Spatie\Permission\Models\Role::class)) {
                $role = \App\Models\Tenancy\Role::firstOrCreate(
                    ['name' => 'admin', 'guard_name' => 'web', 'tenant_id' => $tenant->id]
                );
                $owner->assignRole($role);
            }

            // 4. Create subscription
            $plan = Plan::findOrFail($validated['plan_id']);
            Subscription::create([
                'tenant_id'  => $tenant->id,
                'plan_id'    => $plan->id,
                'status'     => 'active',
                'quantity'   => 1,
                'starts_at'  => now(),
                'ends_at'    => null,
            ]);

            // 5. Seed default finance categories
            $this->seedFinanceCategoriesForTenant($tenant);

            // 6. Update account request status
            $accountRequest->update([
                'status'      => 'approved',
                'handled_by'  => auth()->id(),
                'handled_at'  => now(),
                'admin_notes' => $validated['admin_notes'] ?? null,
            ]);

            return $tenant;
        });

        // Send credentials email
        try {
            $owner = $tenant->users()->first();
            Mail::to($accountRequest->contact_email)
                ->send(new AccountApprovedMail($owner, $tenant, $plainPassword));
        } catch (\Exception $e) {
            Log::warning('Account approved email failed to send', ['error' => $e->getMessage()]);
        }

        return redirect()->route('sa.account-requests.index')
            ->with('success', "Demande de « {$accountRequest->company_name} » approuvée. Le tenant et le compte utilisateur ont été créés. Un email avec les identifiants a été envoyé.");
    }

    public function reject(Request $request, AccountRequest $accountRequest)
    {
        $accountRequest->update([
            'status'      => 'rejected',
            'handled_by'  => auth()->id(),
            'handled_at'  => now(),
            'admin_notes' => $request->input('admin_notes'),
        ]);

        return redirect()->route('sa.account-requests.index')
            ->with('success', "Demande de « {$accountRequest->company_name} » rejetée.");
    }

    public function destroy(AccountRequest $accountRequest)
    {
        $accountRequest->delete();

        return redirect()->route('sa.account-requests.index')
            ->with('success', 'Demande supprimée.');
    }

    private function seedFinanceCategoriesForTenant(Tenant $tenant): void
    {
        $categories = [
            ['name' => 'Ventes - Paiements Clients', 'type' => 'income'],
            ['name' => 'Ventes - Produits', 'type' => 'income'],
            ['name' => 'Ventes - Services', 'type' => 'income'],
            ['name' => 'Revenus - Intérêts', 'type' => 'income'],
            ['name' => 'Revenus - Autres', 'type' => 'income'],
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
            $existing = FinanceCategory::withoutGlobalScopes()
                ->where('tenant_id', $tenant->id)
                ->where('name', $category['name'])
                ->where('type', $category['type'])
                ->first();

            if (! $existing) {
                $fc = new FinanceCategory();
                $fc->tenant_id = $tenant->id;
                $fc->name = $category['name'];
                $fc->type = $category['type'];
                $fc->is_active = true;
                $fc->save();
            }
        }
    }
}
