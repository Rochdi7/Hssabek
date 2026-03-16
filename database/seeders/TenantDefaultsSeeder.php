<?php

namespace Database\Seeders;

use App\Models\Catalog\ProductCategory;
use App\Models\Catalog\TaxCategory;
use App\Models\Catalog\Unit;
use App\Models\Finance\Currency;
use App\Models\Inventory\Warehouse;
use App\Models\Sales\PaymentMethod;
use App\Models\System\DocumentNumberSequence;
use App\Models\Tenancy\Tenant;
use Illuminate\Database\Seeder;

/**
 * Seeds default production data for all tenants.
 * Provides a fast setup so new companies have units, payment methods,
 * tax rates, document sequences, product categories, a default warehouse,
 * and global currencies ready to go.
 *
 * Safe to re-run — uses firstOrCreate everywhere.
 */
class TenantDefaultsSeeder extends Seeder
{
    public function run(): void
    {
        // ── Global: Currencies (not tenant-scoped) ──────────────────
        $this->seedCurrencies();

        // ── Per-tenant defaults ─────────────────────────────────────
        $tenants = Tenant::all();

        foreach ($tenants as $tenant) {
            $this->seedUnits($tenant);
            $this->seedPaymentMethods($tenant);
            $this->seedTaxCategories($tenant);
            $this->seedDocumentSequences($tenant);
            $this->seedProductCategories($tenant);
            $this->seedDefaultWarehouse($tenant);
        }
    }

    // ────────────────────────────────────────────────────────────────
    // Global currencies
    // ────────────────────────────────────────────────────────────────
    private function seedCurrencies(): void
    {
        $currencies = [
            ['code' => 'MAD', 'name' => 'Dirham marocain',       'symbol' => 'د.م.',  'precision' => 2],
            ['code' => 'EUR', 'name' => 'Euro',                   'symbol' => '€',     'precision' => 2],
            ['code' => 'USD', 'name' => 'Dollar américain',       'symbol' => '$',     'precision' => 2],
            ['code' => 'GBP', 'name' => 'Livre sterling',         'symbol' => '£',     'precision' => 2],
            ['code' => 'CAD', 'name' => 'Dollar canadien',        'symbol' => 'CA$',   'precision' => 2],
            ['code' => 'CHF', 'name' => 'Franc suisse',           'symbol' => 'CHF',   'precision' => 2],
            ['code' => 'TND', 'name' => 'Dinar tunisien',         'symbol' => 'د.ت',   'precision' => 3],
            ['code' => 'DZD', 'name' => 'Dinar algérien',         'symbol' => 'د.ج',   'precision' => 2],
            ['code' => 'SAR', 'name' => 'Riyal saoudien',         'symbol' => '﷼',     'precision' => 2],
            ['code' => 'AED', 'name' => 'Dirham émirati',         'symbol' => 'د.إ',   'precision' => 2],
            ['code' => 'EGP', 'name' => 'Livre égyptienne',       'symbol' => 'E£',    'precision' => 2],
            ['code' => 'TRY', 'name' => 'Livre turque',           'symbol' => '₺',     'precision' => 2],
            ['code' => 'CNY', 'name' => 'Yuan chinois',           'symbol' => '¥',     'precision' => 2],
            ['code' => 'JPY', 'name' => 'Yen japonais',           'symbol' => '¥',     'precision' => 0],
            ['code' => 'INR', 'name' => 'Roupie indienne',        'symbol' => '₹',     'precision' => 2],
            ['code' => 'XOF', 'name' => 'Franc CFA (BCEAO)',      'symbol' => 'CFA',   'precision' => 0],
            ['code' => 'XAF', 'name' => 'Franc CFA (BEAC)',       'symbol' => 'FCFA',  'precision' => 0],
            ['code' => 'MRU', 'name' => 'Ouguiya mauritanien',    'symbol' => 'UM',    'precision' => 2],
            ['code' => 'LYD', 'name' => 'Dinar libyen',           'symbol' => 'ل.د',   'precision' => 3],
            ['code' => 'QAR', 'name' => 'Riyal qatari',           'symbol' => 'ر.ق',   'precision' => 2],
            ['code' => 'KWD', 'name' => 'Dinar koweïtien',        'symbol' => 'د.ك',   'precision' => 3],
            ['code' => 'BHD', 'name' => 'Dinar bahreïni',         'symbol' => '.د.ب',  'precision' => 3],
            ['code' => 'OMR', 'name' => 'Rial omanais',           'symbol' => 'ر.ع.',  'precision' => 3],
            ['code' => 'JOD', 'name' => 'Dinar jordanien',        'symbol' => 'د.ا',   'precision' => 3],
        ];

        foreach ($currencies as $currency) {
            Currency::firstOrCreate(
                ['code' => $currency['code']],
                [
                    'name'      => $currency['name'],
                    'symbol'    => $currency['symbol'],
                    'precision' => $currency['precision'],
                ]
            );
        }
    }

    // ────────────────────────────────────────────────────────────────
    // Units of measure
    // ────────────────────────────────────────────────────────────────
    private function seedUnits(Tenant $tenant): void
    {
        $units = [
            ['name' => 'Pièce',       'short_name' => 'pcs'],
            ['name' => 'Kilogramme',   'short_name' => 'kg'],
            ['name' => 'Gramme',       'short_name' => 'g'],
            ['name' => 'Litre',        'short_name' => 'L'],
            ['name' => 'Millilitre',   'short_name' => 'mL'],
            ['name' => 'Mètre',        'short_name' => 'm'],
            ['name' => 'Centimètre',   'short_name' => 'cm'],
            ['name' => 'Mètre carré',  'short_name' => 'm²'],
            ['name' => 'Heure',        'short_name' => 'h'],
            ['name' => 'Jour',         'short_name' => 'j'],
            ['name' => 'Boîte',        'short_name' => 'bte'],
            ['name' => 'Carton',       'short_name' => 'ctn'],
            ['name' => 'Paquet',       'short_name' => 'pqt'],
            ['name' => 'Lot',          'short_name' => 'lot'],
            ['name' => 'Forfait',      'short_name' => 'fft'],
        ];

        foreach ($units as $unit) {
            Unit::firstOrCreate(
                ['tenant_id' => $tenant->id, 'name' => $unit['name']],
                ['short_name' => $unit['short_name']]
            );
        }
    }

    // ────────────────────────────────────────────────────────────────
    // Payment methods
    // ────────────────────────────────────────────────────────────────
    private function seedPaymentMethods(Tenant $tenant): void
    {
        $methods = [
            ['name' => 'Espèces',             'provider' => 'manual'],
            ['name' => 'Virement bancaire',    'provider' => 'manual'],
            ['name' => 'Chèque',              'provider' => 'manual'],
            ['name' => 'Carte bancaire',       'provider' => 'manual'],
            ['name' => 'Effet de commerce',    'provider' => 'manual'],
            ['name' => 'Prélèvement',          'provider' => 'manual'],
        ];

        foreach ($methods as $method) {
            PaymentMethod::firstOrCreate(
                ['tenant_id' => $tenant->id, 'name' => $method['name']],
                ['provider' => $method['provider'], 'is_active' => true]
            );
        }
    }

    // ────────────────────────────────────────────────────────────────
    // Tax categories (Morocco standard rates)
    // ────────────────────────────────────────────────────────────────
    private function seedTaxCategories(Tenant $tenant): void
    {
        $taxes = [
            ['name' => 'TVA 20%',         'rate' => 20.0000, 'is_default' => true],
            ['name' => 'TVA 14%',         'rate' => 14.0000, 'is_default' => false],
            ['name' => 'TVA 10%',         'rate' => 10.0000, 'is_default' => false],
            ['name' => 'TVA 7%',          'rate' =>  7.0000, 'is_default' => false],
            ['name' => 'Exonéré (0%)',    'rate' =>  0.0000, 'is_default' => false],
        ];

        foreach ($taxes as $tax) {
            TaxCategory::firstOrCreate(
                ['tenant_id' => $tenant->id, 'name' => $tax['name']],
                [
                    'rate'       => $tax['rate'],
                    'type'       => 'percentage',
                    'is_default' => $tax['is_default'],
                    'is_active'  => true,
                ]
            );
        }
    }

    // ────────────────────────────────────────────────────────────────
    // Document number sequences
    // ────────────────────────────────────────────────────────────────
    private function seedDocumentSequences(Tenant $tenant): void
    {
        $sequences = [
            ['key' => 'invoice',          'prefix' => 'FAC'],
            ['key' => 'quote',            'prefix' => 'DEV'],
            ['key' => 'credit_note',      'prefix' => 'AV'],
            ['key' => 'debit_note',       'prefix' => 'ND'],
            ['key' => 'delivery_challan', 'prefix' => 'BL'],
            ['key' => 'purchase_order',   'prefix' => 'BC'],
            ['key' => 'vendor_bill',      'prefix' => 'FF'],
            ['key' => 'payment',          'prefix' => 'REC'],
            ['key' => 'goods_receipt',    'prefix' => 'BR'],
            ['key' => 'refund',           'prefix' => 'RMB'],
            ['key' => 'expense',          'prefix' => 'DEP'],
        ];

        foreach ($sequences as $seq) {
            DocumentNumberSequence::firstOrCreate(
                ['tenant_id' => $tenant->id, 'key' => $seq['key']],
                [
                    'prefix'       => $seq['prefix'],
                    'next_number'  => 1,
                    'reset_policy' => 'never',
                ]
            );
        }
    }

    // ────────────────────────────────────────────────────────────────
    // Product categories
    // ────────────────────────────────────────────────────────────────
    private function seedProductCategories(Tenant $tenant): void
    {
        $categories = [
            ['name' => 'Produits',         'slug' => 'produits'],
            ['name' => 'Services',         'slug' => 'services'],
            ['name' => 'Matières premières', 'slug' => 'matieres-premieres'],
            ['name' => 'Consommables',     'slug' => 'consommables'],
            ['name' => 'Pièces détachées', 'slug' => 'pieces-detachees'],
        ];

        foreach ($categories as $cat) {
            ProductCategory::firstOrCreate(
                ['tenant_id' => $tenant->id, 'slug' => $cat['slug']],
                ['name' => $cat['name'], 'is_active' => true]
            );
        }
    }

    // ────────────────────────────────────────────────────────────────
    // Default warehouse
    // ────────────────────────────────────────────────────────────────
    private function seedDefaultWarehouse(Tenant $tenant): void
    {
        Warehouse::firstOrCreate(
            ['tenant_id' => $tenant->id, 'is_default' => true],
            [
                'name'      => 'Entrepôt principal',
                'code'      => 'EP-001',
                'is_active' => true,
            ]
        );
    }
}
