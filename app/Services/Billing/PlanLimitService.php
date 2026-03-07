<?php

namespace App\Services\Billing;

use App\Models\Billing\Plan;
use App\Models\Billing\Subscription;
use App\Models\CRM\Customer;
use App\Models\Catalog\Product;
use App\Models\Finance\BankAccount;
use App\Models\Inventory\Warehouse;
use App\Models\Sales\Invoice;
use App\Models\Sales\Quote;
use App\Services\Tenancy\TenantContext;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;

class PlanLimitService
{
    /**
     * Map of resource keys to [model, limit_column, is_monthly].
     */
    private const RESOURCE_MAP = [
        'users'              => ['limit' => 'max_users',              'monthly' => false],
        'customers'          => ['limit' => 'max_customers',          'monthly' => false],
        'products'           => ['limit' => 'max_products',           'monthly' => false],
        'invoices_per_month' => ['limit' => 'max_invoices_per_month', 'monthly' => true],
        'quotes_per_month'   => ['limit' => 'max_quotes_per_month',   'monthly' => true],
        'exports_per_month'  => ['limit' => 'max_exports_per_month',  'monthly' => true],
        'warehouses'         => ['limit' => 'max_warehouses',         'monthly' => false],
        'bank_accounts'      => ['limit' => 'max_bank_accounts',      'monthly' => false],
    ];

    /**
     * Get the active plan for the current tenant.
     * Returns null if no active subscription.
     */
    public function getActivePlan(): ?Plan
    {
        $tenantId = TenantContext::id();
        if (!$tenantId) {
            return null;
        }

        return Cache::remember("plan:active:{$tenantId}", 300, function () use ($tenantId) {
            $subscription = Subscription::withoutGlobalScopes()
                ->where('tenant_id', $tenantId)
                ->whereIn('status', ['active', 'trialing'])
                ->with('plan')
                ->latest('starts_at')
                ->first();

            return $subscription?->plan;
        });
    }

    public static function flushPlanCache(?string $tenantId = null): void
    {
        $tenantId = $tenantId ?? TenantContext::id();
        if ($tenantId) {
            Cache::forget("plan:active:{$tenantId}");
        }
    }

    /**
     * Check if the tenant can create a new resource of the given type.
     *
     * @param string $resource One of: users, customers, products, invoices_per_month, quotes_per_month, exports_per_month, warehouses, bank_accounts
     * @return bool true if allowed (limit not reached or unlimited)
     */
    public function canCreate(string $resource): bool
    {
        $plan = $this->getActivePlan();

        // No active plan = block creation
        if (!$plan) {
            return false;
        }

        $config = self::RESOURCE_MAP[$resource] ?? null;
        if (!$config) {
            return true;
        }

        $limitColumn = $config['limit'];
        $limit = $plan->{$limitColumn};

        // null = unlimited
        if ($limit === null) {
            return true;
        }

        $currentCount = $this->countResource($resource, $config['monthly']);

        return $currentCount < $limit;
    }

    /**
     * Get the current limit value for a resource.
     * Returns null if unlimited.
     */
    public function getLimit(string $resource): ?int
    {
        $plan = $this->getActivePlan();
        if (!$plan) {
            return null;
        }

        $config = self::RESOURCE_MAP[$resource] ?? null;
        if (!$config) {
            return null;
        }

        return $plan->{$config['limit']};
    }

    /**
     * Get the current usage count for a resource.
     */
    public function getCurrentUsage(string $resource): int
    {
        $config = self::RESOURCE_MAP[$resource] ?? null;
        if (!$config) {
            return 0;
        }

        return $this->countResource($resource, $config['monthly']);
    }

    /**
     * Get remaining quota. Returns null if unlimited.
     */
    public function getRemaining(string $resource): ?int
    {
        $limit = $this->getLimit($resource);
        if ($limit === null) {
            return null;
        }

        $config = self::RESOURCE_MAP[$resource] ?? null;
        $usage = $this->countResource($resource, $config['monthly'] ?? false);

        return max(0, $limit - $usage);
    }

    /**
     * Count the current number of resources for the tenant.
     */
    private function countResource(string $resource, bool $monthly): int
    {
        return match ($resource) {
            'users' => $this->countUsers(),
            'customers' => Customer::count(),
            'products' => Product::count(),
            'invoices_per_month' => $this->countMonthly(Invoice::class),
            'quotes_per_month' => $this->countMonthly(Quote::class),
            'exports_per_month' => $this->countMonthlyExports(),
            'warehouses' => Warehouse::count(),
            'bank_accounts' => BankAccount::count(),
            default => 0,
        };
    }

    private function countUsers(): int
    {
        $tenantId = TenantContext::id();
        if (!$tenantId) {
            return 0;
        }

        return \App\Models\User::where('tenant_id', $tenantId)->count();
    }

    private function countMonthly(string $modelClass): int
    {
        return $modelClass::where('created_at', '>=', Carbon::now()->startOfMonth())->count();
    }

    private function countMonthlyExports(): int
    {
        $tenantId = TenantContext::id();
        if (!$tenantId) {
            return 0;
        }

        // Count export files created this month
        $exportPath = storage_path("app/exports/{$tenantId}");
        if (!is_dir($exportPath)) {
            return 0;
        }

        $count = 0;
        $startOfMonth = Carbon::now()->startOfMonth()->timestamp;
        foreach (glob("{$exportPath}/*.csv") as $file) {
            if (filemtime($file) >= $startOfMonth) {
                $count++;
            }
        }

        return $count;
    }

    /**
     * Get all usage data for display (usage, limit, percentage, label).
     */
    public function getAllUsage(): array
    {
        $plan = $this->getActivePlan();
        $resources = [];

        $labels = [
            'users'              => 'Utilisateurs',
            'customers'          => 'Clients',
            'products'           => 'Produits',
            'invoices_per_month' => 'Factures / mois',
            'quotes_per_month'   => 'Devis / mois',
            'exports_per_month'  => 'Exports / mois',
            'warehouses'         => 'Entrepôts',
            'bank_accounts'      => 'Comptes bancaires',
        ];

        $icons = [
            'users'              => 'isax-profile-2user',
            'customers'          => 'isax-people',
            'products'           => 'isax-box',
            'invoices_per_month' => 'isax-receipt-item',
            'quotes_per_month'   => 'isax-document-text',
            'exports_per_month'  => 'isax-document-download',
            'warehouses'         => 'isax-building',
            'bank_accounts'      => 'isax-bank',
        ];

        foreach (self::RESOURCE_MAP as $key => $config) {
            $usage = $this->countResource($key, $config['monthly']);
            $limit = $plan ? $plan->{$config['limit']} : null;
            $percent = ($limit !== null && $limit > 0) ? min(100, round(($usage / $limit) * 100)) : 0;

            $resources[$key] = [
                'label'   => $labels[$key] ?? $key,
                'icon'    => $icons[$key] ?? 'isax-chart',
                'usage'   => $usage,
                'limit'   => $limit,
                'percent' => $percent,
                'monthly' => $config['monthly'],
            ];
        }

        return $resources;
    }

    /**
     * Get all usage data for a specific tenant (SuperAdmin context).
     */
    public function getAllUsageForTenant(string $tenantId): array
    {
        $subscription = Subscription::withoutGlobalScopes()
            ->where('tenant_id', $tenantId)
            ->whereIn('status', ['active', 'trialing'])
            ->with('plan')
            ->latest('starts_at')
            ->first();

        $plan = $subscription?->plan;

        $labels = [
            'users'              => 'Utilisateurs',
            'customers'          => 'Clients',
            'products'           => 'Produits',
            'invoices_per_month' => 'Factures / mois',
            'quotes_per_month'   => 'Devis / mois',
            'exports_per_month'  => 'Exports / mois',
            'warehouses'         => 'Entrepôts',
            'bank_accounts'      => 'Comptes bancaires',
        ];

        $resources = [];

        foreach (self::RESOURCE_MAP as $key => $config) {
            $usage = $this->countResourceForTenant($key, $config['monthly'], $tenantId);
            $limit = $plan ? $plan->{$config['limit']} : null;
            $percent = ($limit !== null && $limit > 0) ? min(100, round(($usage / $limit) * 100)) : 0;

            $resources[$key] = [
                'label'   => $labels[$key] ?? $key,
                'usage'   => $usage,
                'limit'   => $limit,
                'percent' => $percent,
                'monthly' => $config['monthly'],
            ];
        }

        return $resources;
    }

    /**
     * Count resources for a specific tenant (bypassing TenantContext).
     */
    private function countResourceForTenant(string $resource, bool $monthly, string $tenantId): int
    {
        return match ($resource) {
            'users' => \App\Models\User::where('tenant_id', $tenantId)->count(),
            'customers' => Customer::withoutGlobalScopes()->where('tenant_id', $tenantId)->count(),
            'products' => Product::withoutGlobalScopes()->where('tenant_id', $tenantId)->count(),
            'invoices_per_month' => Invoice::withoutGlobalScopes()->where('tenant_id', $tenantId)
                ->where('created_at', '>=', Carbon::now()->startOfMonth())->count(),
            'quotes_per_month' => Quote::withoutGlobalScopes()->where('tenant_id', $tenantId)
                ->where('created_at', '>=', Carbon::now()->startOfMonth())->count(),
            'exports_per_month' => $this->countMonthlyExportsForTenant($tenantId),
            'warehouses' => Warehouse::withoutGlobalScopes()->where('tenant_id', $tenantId)->count(),
            'bank_accounts' => BankAccount::withoutGlobalScopes()->where('tenant_id', $tenantId)->count(),
            default => 0,
        };
    }

    private function countMonthlyExportsForTenant(string $tenantId): int
    {
        $exportPath = storage_path("app/exports/{$tenantId}");
        if (!is_dir($exportPath)) {
            return 0;
        }

        $count = 0;
        $startOfMonth = Carbon::now()->startOfMonth()->timestamp;
        foreach (glob("{$exportPath}/*.csv") as $file) {
            if (filemtime($file) >= $startOfMonth) {
                $count++;
            }
        }

        return $count;
    }

    /**
     * Get a human-readable error message when limit is reached.
     */
    public function getLimitMessage(string $resource): string
    {
        $plan = $this->getActivePlan();
        $planName = $plan?->name ?? 'votre plan';

        return match ($resource) {
            'users' => "Vous avez atteint la limite d'utilisateurs de {$planName}. Veuillez mettre à niveau votre plan pour ajouter plus d'utilisateurs.",
            'customers' => "Vous avez atteint la limite de clients de {$planName}. Veuillez mettre à niveau votre plan pour ajouter plus de clients.",
            'products' => "Vous avez atteint la limite de produits de {$planName}. Veuillez mettre à niveau votre plan pour ajouter plus de produits.",
            'invoices_per_month' => "Vous avez atteint la limite de factures mensuelles de {$planName}. Veuillez mettre à niveau votre plan.",
            'quotes_per_month' => "Vous avez atteint la limite de devis mensuels de {$planName}. Veuillez mettre à niveau votre plan.",
            'exports_per_month' => "Vous avez atteint la limite d'exports mensuels de {$planName}. Veuillez mettre à niveau votre plan.",
            'warehouses' => "Vous avez atteint la limite d'entrepôts de {$planName}. Veuillez mettre à niveau votre plan.",
            'bank_accounts' => "Vous avez atteint la limite de comptes bancaires de {$planName}. Veuillez mettre à niveau votre plan.",
            default => "Vous avez atteint la limite de votre plan. Veuillez mettre à niveau.",
        };
    }
}
