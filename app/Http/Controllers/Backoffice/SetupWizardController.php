<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\Catalog\TaxCategory;
use App\Models\Catalog\Unit;
use App\Models\Finance\BankAccount;
use App\Models\Inventory\Warehouse;
use App\Models\Sales\PaymentMethod;
use App\Models\Tenancy\Signature;
use App\Models\Tenancy\TenantSetting;
use App\Services\Tenancy\TenantContext;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SetupWizardController extends Controller
{
    public function store(Request $request)
    {
        $tenant = TenantContext::get();

        if ($tenant->setup_completed) {
            return redirect()->route('bo.dashboard')
                ->with('info', __('La configuration initiale a déjà été effectuée.'));
        }

        $request->validate([
            // Step 1 — Company info
            'company_name'        => 'required|string|max:255',
            'forme_juridique'     => 'required|string|in:sarl,sarl_au,sa,snc,scs,sca,auto_entrepreneur,ei,cooperative',
            'company_email'       => 'required|email|max:255',
            'company_phone'       => 'required|string|max:30',
            'ice'                 => 'nullable|string|max:15',
            'tax_id'              => 'nullable|string|max:50',
            'registration_number' => 'nullable|string|max:50',
            'cnss'                => 'nullable|string|max:50',
            'patente'             => 'nullable|string|max:50',
            'capital_social'      => 'nullable|numeric|min:0',
            'tribunal'            => 'nullable|string|max:255',
            'assujetti_tva'       => 'nullable|boolean',
            'regime_tva'          => 'nullable|string|in:encaissement,debit',
            // Auto-entrepreneur specific
            'numero_ae'           => 'nullable|string|max:50',
            'cin'                 => 'nullable|string|max:20',
            'activite_principale' => 'nullable|string|max:255',

            // Step 2 — Address
            'address'     => 'required|string|max:500',
            'country'     => 'required|string|max:100',
            'state'       => 'nullable|string|max:100',
            'city'        => 'required|string|max:100',
            'postal_code' => 'nullable|string|max:20',

            // Step 3 — Currency & locale
            'currency'    => 'required|string|size:3',
            'timezone'    => 'required|string|max:100',
            'date_format' => 'required|string|max:20',
            'language'    => 'required|string|in:fr,ar,en',

            // Step 4 — Tax rates (array of selected presets + custom)
            'tax_rates'            => 'nullable|array',
            'tax_rates.*.name'     => 'required|string|max:100',
            'tax_rates.*.rate'     => 'required|numeric|min:0|max:100',
            'tax_rates.*.default'  => 'nullable|boolean',

            // Step 5 — Units
            'units'              => 'nullable|array',
            'units.*.name'       => 'required|string|max:100',
            'units.*.short_name' => 'required|string|max:20',

            // Step 6 — Payment methods
            'payment_methods'        => 'nullable|array',
            'payment_methods.*.name' => 'required|string|max:100',

            // Logo (optional)
            'logo' => 'nullable|image|max:2048',

            // Step 7 — Bank account (required)
            'bank_name'            => 'required|string|max:255',
            'bank_account_holder'  => 'required|string|max:255',
            'bank_account_number'  => 'required|string|max:50',
            'bank_account_type'    => 'required|string|in:current,savings,business,other',
            'bank_branch'          => 'nullable|string|max:255',
            'bank_swift'           => 'nullable|string|max:20',
            'bank_opening_balance' => 'nullable|numeric|min:0',

            // Step 8 — Warehouse (required)
            'warehouse_name'    => 'required|string|max:255',
            'warehouse_code'    => 'required|string|max:50',
            'warehouse_address' => 'nullable|string|max:500',

            // Step 9 — Signature (optional)
            'signature_name'  => 'nullable|string|max:255',
            'signature_image' => 'nullable|image|max:2048',
        ]);

        // ── Save company settings ──
        $setting = $tenant->settings ?? TenantSetting::create(['tenant_id' => $tenant->id]);

        $setting->company_settings = array_merge($setting->company_settings ?? [], [
            'company_name'        => $request->input('company_name'),
            'company_email'       => $request->input('company_email'),
            'company_phone'       => $request->input('company_phone'),
            'ice'                 => $request->input('ice'),
            'tax_id'              => $request->input('tax_id'),
            'registration_number' => $request->input('registration_number'),
            'rc'                  => $request->input('registration_number'), // alias for PDF templates
            'cnss'                => $request->input('cnss'),
            'patente'             => $request->input('patente'),
            'capital_social'      => $request->input('capital_social'),
            'tribunal'            => $request->input('tribunal'),
            'assujetti_tva'       => $request->boolean('assujetti_tva'),
            'regime_tva'          => $request->input('regime_tva'),
            'numero_ae'           => $request->input('numero_ae'),
            'cin'                 => $request->input('cin'),
            'activite_principale' => $request->input('activite_principale'),
            'forme_juridique'     => $request->input('forme_juridique'),
            'address'             => $request->input('address'),
            'country'             => $request->input('country'),
            'state'               => $request->input('state'),
            'city'                => $request->input('city'),
            'postal_code'         => $request->input('postal_code'),
        ]);

        $setting->localization_settings = array_merge($setting->localization_settings ?? [], [
            'currency'    => $request->input('currency'),
            'timezone'    => $request->input('timezone'),
            'date_format' => $request->input('date_format'),
            'language'    => $request->input('language'),
        ]);

        $setting->save();

        // ── Update tenant currency, timezone & forme juridique ──
        $tenant->update([
            'default_currency' => $request->input('currency'),
            'timezone'         => $request->input('timezone'),
            'forme_juridique'  => $request->input('forme_juridique'),
        ]);

        // ── Logo upload ──
        if ($request->hasFile('logo')) {
            $tenant->clearMediaCollection('logo');
            $tenant->addMediaFromRequest('logo')->toMediaCollection('logo');
        }

        // ── Tax rates ──
        if ($request->filled('tax_rates')) {
            $hasDefault = false;
            foreach ($request->input('tax_rates') as $taxData) {
                $isDefault = !empty($taxData['default']) && !$hasDefault;
                if ($isDefault) {
                    $hasDefault = true;
                }

                TaxCategory::create([
                    'tenant_id'  => $tenant->id,
                    'name'       => $taxData['name'],
                    'rate'       => $taxData['rate'] / 100, // Store as decimal (20% → 0.2000)
                    'type'       => 'percentage',
                    'is_default' => $isDefault,
                    'is_active'  => true,
                ]);
            }
        }

        // ── Units of measure ──
        if ($request->filled('units')) {
            foreach ($request->input('units') as $unitData) {
                Unit::create([
                    'tenant_id'  => $tenant->id,
                    'name'       => $unitData['name'],
                    'short_name' => $unitData['short_name'],
                ]);
            }
        }

        // ── Payment methods ──
        if ($request->filled('payment_methods')) {
            foreach ($request->input('payment_methods') as $pmData) {
                PaymentMethod::create([
                    'tenant_id' => $tenant->id,
                    'name'      => $pmData['name'],
                    'provider'  => 'manual',
                    'is_active' => true,
                ]);
            }
        }

        // ── Signature ──
        if ($request->hasFile('signature_image') || $request->filled('signature_name')) {
            $signature = Signature::create([
                'tenant_id'  => $tenant->id,
                'name'       => $request->input('signature_name', 'Signature principale'),
                'is_default' => true,
                'status'     => 'active',
            ]);

            if ($request->hasFile('signature_image')) {
                $signature->addMediaFromRequest('signature_image')->toMediaCollection('signature');
            }
        }

        // ── Bank account (required) ──
        $openingBalance = (float) ($request->input('bank_opening_balance', 0));
        BankAccount::create([
            'tenant_id'          => $tenant->id,
            'bank_name'          => $request->input('bank_name'),
            'account_holder_name' => $request->input('bank_account_holder'),
            'account_number'     => $request->input('bank_account_number'),
            'account_type'       => $request->input('bank_account_type'),
            'branch'             => $request->input('bank_branch'),
            'ifsc_code'          => $request->input('bank_swift'),
            'currency'           => $request->input('currency', 'MAD'),
            'opening_balance'    => $openingBalance,
            'current_balance'    => $openingBalance,
            'is_active'          => true,
        ]);

        // ── Warehouse (from wizard step 8) ──
        if (!Warehouse::where('tenant_id', $tenant->id)->exists()) {
            Warehouse::create([
                'tenant_id'  => $tenant->id,
                'name'       => $request->input('warehouse_name', 'Entrepôt principal'),
                'code'       => $request->input('warehouse_code', 'EP-001'),
                'address'    => $request->input('warehouse_address'),
                'is_default' => true,
                'is_active'  => true,
            ]);
        }

        // ── Mark setup as completed ──
        $tenant->update(['setup_completed' => true]);

        return redirect()->route('bo.dashboard')
            ->with('success', __('Configuration initiale terminée avec succès ! Bienvenue sur votre espace de facturation.'));
    }
}
