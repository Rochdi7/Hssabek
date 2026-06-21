<?php

namespace App\Http\Requests\Catalog\Store;

use App\Http\Requests\BaseFormRequest;
use App\Rules\SecureUpload;
use App\Services\Tenancy\TenantContext;
use Illuminate\Validation\Rule;

class StoreProductRequest extends BaseFormRequest
{
    protected function baseRules(): array
    {
        return [
            'item_type' => ['required', 'in:product,service'],
            'name' => ['required', 'string', 'max:255'],
            'category_id' => [
                'nullable',
                Rule::exists('product_categories', 'id')->where('tenant_id', TenantContext::id()),
            ],
            'unit_id' => [
                'nullable',
                Rule::exists('units', 'id')->where('tenant_id', TenantContext::id()),
            ],
            'description' => ['nullable', 'string', 'max:5000'],
            'billing_type' => ['nullable', 'in:one_time,hourly,daily,weekly,monthly,yearly,per_project'],
            'hourly_rate' => ['nullable', 'numeric', 'min:0'],
            'estimated_hours' => ['nullable', 'integer', 'min:0'],
            'sac_code' => ['nullable', 'string', 'max:50'],
            'selling_price' => ['required', 'numeric', 'min:0'],
            'purchase_price' => ['nullable', 'numeric', 'min:0'],
            'track_inventory' => ['nullable', 'boolean'],
            'quantity' => ['nullable', 'numeric', 'min:0'],
            'alert_quantity' => ['nullable', 'numeric', 'min:0'],
            'barcode' => ['nullable', 'string', 'max:100'],
            'discount_type' => ['nullable', 'in:none,percentage,fixed'],
            'discount_value' => ['nullable', 'numeric', 'min:0'],
            'tax_category_id' => [
                'nullable',
                Rule::exists('tax_categories', 'id')->where('tenant_id', TenantContext::id()),
            ],
            'is_active' => ['nullable', 'boolean'],
            'product_image' => ['nullable', 'file', 'max:2048', new SecureUpload(['jpg', 'jpeg', 'png', 'webp'])],
        ];
    }

    protected function storeRules(): array
    {
        return [
            'code' => [
                'required',
                'string',
                'max:50',
                Rule::unique('products', 'code')->where('tenant_id', TenantContext::id()),
            ],
            'sku' => [
                'nullable',
                'string',
                'max:50',
                Rule::unique('products', 'sku')->where('tenant_id', TenantContext::id()),
            ],
        ];
    }

    protected function baseMessages(): array
    {
        return [
            'item_type.required' => __('Le type d\'article est obligatoire.'),
            'item_type.in' => __('Le type doit etre "Produit" ou "Service".'),
            'name.required' => __('Le nom du produit est obligatoire.'),
            'name.max' => __('Le nom ne doit pas depasser 255 caracteres.'),
            'code.required' => __('Le code produit est obligatoire.'),
            'code.unique' => __('Ce code produit est deja utilise.'),
            'sku.unique' => __('Ce code SKU est deja utilise.'),
            'category_id.exists' => __('La categorie selectionnee est invalide.'),
            'unit_id.exists' => __('L\'unite selectionnee est invalide.'),
            'selling_price.required' => __('Le prix de vente est obligatoire.'),
            'selling_price.numeric' => __('Le prix de vente doit etre un nombre.'),
            'selling_price.min' => __('Le prix de vente ne peut pas etre negatif.'),
            'purchase_price.numeric' => __('Le prix d\'achat doit etre un nombre.'),
            'purchase_price.min' => __('Le prix d\'achat ne peut pas etre negatif.'),
            'quantity.numeric' => __('La quantite doit etre un nombre.'),
            'quantity.min' => __('La quantite ne peut pas etre negative.'),
            'alert_quantity.numeric' => __('La quantite d\'alerte doit etre un nombre.'),
            'alert_quantity.min' => __('La quantite d\'alerte ne peut pas etre negative.'),
            'barcode.max' => __('Le code-barres ne doit pas depasser 100 caracteres.'),
            'discount_type.in' => __('Le type de remise est invalide.'),
            'discount_value.numeric' => __('La valeur de remise doit etre un nombre.'),
            'discount_value.min' => __('La valeur de remise ne peut pas etre negative.'),
            'tax_category_id.exists' => __('La categorie de taxe selectionnee est invalide.'),
            'billing_type.in' => __('Le type de facturation est invalide.'),
            'hourly_rate.numeric' => __('Le taux horaire doit etre un nombre.'),
            'hourly_rate.min' => __('Le taux horaire ne peut pas etre negatif.'),
            'estimated_hours.integer' => __('Les heures estimees doivent etre un entier.'),
            'estimated_hours.min' => __('Les heures estimees ne peuvent pas etre negatives.'),
            'sac_code.max' => __('Le code SAC ne doit pas depasser 50 caracteres.'),
            'product_image.max' => __('L\'image ne doit pas depasser 2 Mo.'),
        ];
    }
}
