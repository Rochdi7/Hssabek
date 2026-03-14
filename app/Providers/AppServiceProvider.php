<?php

namespace App\Providers;

use App\Models\Purchases\SupplierPayment;
use App\Models\Sales\Payment;
use App\Observers\PaymentObserver;
use App\Observers\SupplierPaymentObserver;
use App\Services\System\DocumentNumberService;
use App\Services\Tenancy\TenantContext;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(DocumentNumberService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->configureRateLimiting();
        $this->registerEvents();
        $this->registerObservers();

        // Load additional JSON translation files from subdirectories
        $this->app['translator']->addJsonPath(lang_path('documentation'));
        $this->app['translator']->addJsonPath(lang_path('frontoffice'));

        // Resolve factories by model base name (flat factory directory)
        Factory::guessFactoryNamesUsing(function (string $modelName) {
            return 'Database\\Factories\\' . class_basename($modelName) . 'Factory';
        });

        // Super Admin bypass — tenant_id is null means platform-level super admin
        // Admin role bypass — admin users have full access within their tenant
        Gate::before(function ($user, $ability) {
            if ($user->tenant_id === null) {
                return true; // Super admin — full access
            }

            if ($user->hasRole('admin')) {
                return true; // Tenant admin — full access within tenant
            }

            return null; // Let policies/permissions decide
        });

        Gate::policy(\App\Models\User::class, \App\Policies\UserPolicy::class);
        Gate::policy(\App\Models\CRM\Customer::class, \App\Policies\CustomerPolicy::class);
        Gate::policy(\App\Models\Reports\CustomReport::class, \App\Policies\CustomReportPolicy::class);
        Gate::policy(\App\Models\Catalog\Product::class, \App\Policies\ProductPolicy::class);
        Gate::policy(\App\Models\Sales\Invoice::class, \App\Policies\InvoicePolicy::class);
        Gate::policy(\App\Models\Sales\Quote::class, \App\Policies\QuotePolicy::class);
        Gate::policy(\App\Models\Sales\Payment::class, \App\Policies\PaymentPolicy::class);
        Gate::policy(\App\Models\Sales\CreditNote::class, \App\Policies\CreditNotePolicy::class);
        Gate::policy(\App\Models\Purchases\Supplier::class, \App\Policies\SupplierPolicy::class);
        Gate::policy(\App\Models\Purchases\PurchaseOrder::class, \App\Policies\PurchaseOrderPolicy::class);
        Gate::policy(\App\Models\Purchases\VendorBill::class, \App\Policies\VendorBillPolicy::class);
        Gate::policy(\App\Models\Inventory\Warehouse::class, \App\Policies\WarehousePolicy::class);
        Gate::policy(\App\Models\Inventory\StockTransfer::class, \App\Policies\StockTransferPolicy::class);
        Gate::policy(\App\Models\Finance\BankAccount::class, \App\Policies\BankAccountPolicy::class);
        Gate::policy(\App\Models\Finance\Expense::class, \App\Policies\ExpensePolicy::class);
        Gate::policy(\App\Models\Finance\Income::class, \App\Policies\IncomePolicy::class);
        Gate::policy(\App\Models\Finance\FinanceCategory::class, \App\Policies\FinanceCategoryPolicy::class);
        Gate::policy(\App\Models\Catalog\ProductCategory::class, \App\Policies\ProductCategoryPolicy::class);
        Gate::policy(\App\Models\Catalog\TaxCategory::class, \App\Policies\TaxCategoryPolicy::class);
        Gate::policy(\App\Models\Catalog\TaxGroup::class, \App\Policies\TaxGroupPolicy::class);
        Gate::policy(\App\Models\Catalog\Unit::class, \App\Policies\UnitPolicy::class);
        Gate::policy(\App\Models\Inventory\StockMovement::class, \App\Policies\StockMovementPolicy::class);
        Gate::policy(\App\Models\Finance\Loan::class, \App\Policies\LoanPolicy::class);
        Gate::policy(\App\Models\Sales\DeliveryChallan::class, \App\Policies\DeliveryChallanPolicy::class);
        Gate::policy(\App\Models\Sales\Refund::class, \App\Policies\RefundPolicy::class);
        Gate::policy(\App\Models\Purchases\GoodsReceipt::class, \App\Policies\GoodsReceiptPolicy::class);
        Gate::policy(\App\Models\Purchases\DebitNote::class, \App\Policies\DebitNotePolicy::class);
        Gate::policy(\App\Models\Purchases\SupplierPayment::class, \App\Policies\SupplierPaymentPolicy::class);
        Gate::policy(\App\Models\Pro\RecurringInvoice::class, \App\Policies\RecurringInvoicePolicy::class);
        Gate::policy(\App\Models\Pro\InvoiceReminder::class, \App\Policies\InvoiceReminderPolicy::class);
        Gate::policy(\App\Models\Pro\Branch::class, \App\Policies\BranchPolicy::class);
        Gate::policy(\App\Models\Tenancy\TenantSetting::class, \App\Policies\SettingsPolicy::class);

        // Share appearance settings with the head partial for theme sync
        View::composer('backoffice.layout.partials.head', function ($view) {
            $appearance = [];
            if (TenantContext::check()) {
                $tenant = TenantContext::get();
                $appearance = $tenant->settings->modules_settings['appearance'] ?? [];
            }
            $view->with('appearanceSettings', $appearance);
        });
    }

    protected function registerEvents(): void
    {
        $flush = \App\Listeners\FlushReportCacheListener::class;

        // Flush report cache on financial events
        Event::listen(\App\Events\InvoiceCreated::class, $flush);
        Event::listen(\App\Events\InvoicePaid::class, $flush);
        Event::listen(\App\Events\PaymentReceived::class, $flush);
        Event::listen(\App\Events\ExpenseCreated::class, $flush);

        // Additional listeners
        Event::listen(\App\Events\InvoiceCreated::class, \App\Listeners\LogInvoiceCreatedActivity::class);
        Event::listen(\App\Events\PaymentReceived::class, \App\Listeners\SendPaymentConfirmationListener::class);
        Event::listen(\App\Events\SubscriptionExpired::class, \App\Listeners\HandleSubscriptionExpired::class);
    }

    protected function configureRateLimiting(): void
    {
        RateLimiter::for('login', function (Request $request) {
            $key = strtolower($request->input('email', '')) . '|' . $request->ip();
            return Limit::perMinute(5)->by($key);
        });

        RateLimiter::for('registration', function (Request $request) {
            return Limit::perMinute(3)->by($request->ip());
        });

        RateLimiter::for('password-reset', function (Request $request) {
            return Limit::perMinute(3)->by($request->ip());
        });

        RateLimiter::for('verification-resend', function (Request $request) {
            return Limit::perMinute(3)->by($request->user()?->id ?: $request->ip());
        });

        RateLimiter::for('report-export', function (Request $request) {
            return Limit::perMinute(5)->by($request->user()?->id ?: $request->ip());
        });

        RateLimiter::for('pdf-download', function (Request $request) {
            return Limit::perMinute(20)->by($request->user()?->id ?: $request->ip());
        });

        RateLimiter::for('user-invitation', function (Request $request) {
            return Limit::perMinute(10)->by(TenantContext::id() ?: $request->ip());
        });
    }

    /**
     * Register model observers for auto-syncing financial data.
     */
    protected function registerObservers(): void
    {
        Payment::observe(PaymentObserver::class);
        SupplierPayment::observe(SupplierPaymentObserver::class);
    }
}
