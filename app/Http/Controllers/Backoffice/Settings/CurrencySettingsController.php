<?php

namespace App\Http\Controllers\Backoffice\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\Settings\StoreCurrencyRequest;
use App\Http\Requests\Settings\StoreExchangeRateRequest;
use App\Http\Requests\Settings\UpdateExchangeRateRequest;
use App\Models\Finance\Currency;
use App\Models\Finance\ExchangeRate;
use App\Services\Tenancy\TenantContext;

class CurrencySettingsController extends Controller
{
    private const KNOWN_CURRENCIES = [
        'MAD' => ['name' => 'Dirham marocain', 'symbol' => 'د.م.'],
        'EUR' => ['name' => 'Euro', 'symbol' => '€'],
        'USD' => ['name' => 'Dollar américain', 'symbol' => '$'],
        'GBP' => ['name' => 'Livre sterling', 'symbol' => '£'],
        'CAD' => ['name' => 'Dollar canadien', 'symbol' => 'CA$'],
        'CHF' => ['name' => 'Franc suisse', 'symbol' => 'CHF'],
        'TND' => ['name' => 'Dinar tunisien', 'symbol' => 'د.ت'],
        'DZD' => ['name' => 'Dinar algérien', 'symbol' => 'د.ج'],
        'SAR' => ['name' => 'Riyal saoudien', 'symbol' => '﷼'],
        'AED' => ['name' => 'Dirham émirati', 'symbol' => 'د.إ'],
        'XOF' => ['name' => 'Franc CFA (BCEAO)', 'symbol' => 'CFA'],
        'XAF' => ['name' => 'Franc CFA (BEAC)', 'symbol' => 'FCFA'],
    ];

    public function index()
    {
        $tenant = TenantContext::get();
        $baseCurrency = $tenant->settings->localization_settings['currency'] ?? 'MAD';
        $defaultCurrency = $tenant->default_currency ?? $baseCurrency;

        // Ensure base currency exists
        $this->ensureCurrencyExists($baseCurrency);

        $exchangeRates = ExchangeRate::with('baseCurrencyRelation', 'quoteCurrencyRelation')
            ->latest('date')
            ->get();

        $currencies = Currency::orderBy('name')->get();

        return view('backoffice.settings.currencies', compact(
            'exchangeRates',
            'currencies',
            'baseCurrency',
            'defaultCurrency'
        ));
    }

    public function store(StoreCurrencyRequest $request)
    {
        $tenant = TenantContext::get();
        $baseCurrency = $tenant->settings->localization_settings['currency'] ?? 'MAD';

        // Ensure base currency exists before creating exchange rate
        $this->ensureCurrencyExists($baseCurrency);

        $code = strtoupper($request->code);

        // Create or update the currency in the global table
        Currency::updateOrCreate(
            ['code' => $code],
            [
                'name' => $request->name,
                'symbol' => $request->symbol,
                'precision' => 2,
            ]
        );

        // Create the exchange rate for this tenant
        ExchangeRate::create([
            'base_currency' => $baseCurrency,
            'quote_currency' => $code,
            'rate' => $request->rate,
            'date' => now()->toDateString(),
        ]);

        // Set as default if requested
        if ($request->boolean('is_default')) {
            $tenant->update(['default_currency' => $code]);
        }

        return redirect()->route('bo.settings.currencies.index')
            ->with('success', __('Devise ajoutée avec succès.'));
    }

    public function storeExchangeRate(StoreExchangeRateRequest $request)
    {
        $tenant = TenantContext::get();
        $baseCurrency = $tenant->settings->localization_settings['currency'] ?? 'MAD';

        // Ensure base currency exists
        $this->ensureCurrencyExists($baseCurrency);

        ExchangeRate::create([
            'base_currency' => $baseCurrency,
            'quote_currency' => $request->quote_currency,
            'rate' => $request->rate,
            'date' => $request->date ?? now()->toDateString(),
        ]);

        return redirect()->route('bo.settings.currencies.index')
            ->with('success', __('Taux de change ajouté avec succès.'));
    }

    public function update(UpdateExchangeRateRequest $request, ExchangeRate $exchangeRate)
    {
        $exchangeRate->update([
            'rate' => $request->rate,
            'date' => $request->date ?? now()->toDateString(),
        ]);

        return redirect()->route('bo.settings.currencies.index')
            ->with('success', __('Taux de change mis à jour avec succès.'));
    }

    public function destroy(ExchangeRate $exchangeRate)
    {
        $exchangeRate->delete();

        return redirect()->route('bo.settings.currencies.index')
            ->with('success', __('Devise supprimée avec succès.'));
    }

    public function setDefault(Currency $currency)
    {
        $tenant = TenantContext::get();
        $tenant->update(['default_currency' => $currency->code]);

        return redirect()->route('bo.settings.currencies.index')
            ->with('success', __('Devise par défaut mise à jour avec succès.'));
    }

    private function ensureCurrencyExists(string $code): void
    {
        Currency::firstOrCreate(
            ['code' => $code],
            [
                'name' => self::KNOWN_CURRENCIES[$code]['name'] ?? $code,
                'symbol' => self::KNOWN_CURRENCIES[$code]['symbol'] ?? $code,
                'precision' => 2,
            ]
        );
    }
}
