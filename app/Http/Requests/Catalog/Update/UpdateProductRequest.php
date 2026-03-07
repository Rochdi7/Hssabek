<?php

namespace App\Http\Requests\Catalog\Update;

use App\Http\Requests\BaseFormRequest;
use App\Services\Tenancy\TenantContext;
use Illuminate\Validation\Rule;

class UpdateProductRequest extends BaseFormRequest
{
    protected function baseRules(): array
    {
        return [
            'item_type'       => ['required', 'in:product,service'],
            'name'            => ['required', 'string', 'max:255'],
            'category_id'     => [
                'nullable',
                Rule::exists('product_categories', 'id')
                    ->where('tenant_id', TenantContext::id()),
            ],
            'unit_id'         => [
                'nullable',
                Rule::exists('units', 'id')
                    ->where('tenant_id', TenantContext::id()),
            ],
            'description'     => ['nullable', 'string', 'max:5000'],
            // Service-specific fields
            'billing_type'    => ['nullable', 'in:one_time,hourly,daily,weekly,monthly,yearly,per_project'],
            'hourly_rate'     => ['nullable', 'numeric', 'min:0'],
            'estimated_hours' => ['nullable', 'integer', 'min:0'],
            'sac_code'        => ['nullable', 'string', 'max:50'],
            'selling_price'   => ['required', 'numeric', 'min:0'],
            'purchase_price'  => ['nullable', 'numeric', 'min:0'],
            'track_inventory' => ['nullable', 'boolean'],
            'quantity'        => ['nullable', 'numeric', 'min:0'],
            'alert_quantity'  => ['nullable', 'numeric', 'min:0'],
            'barcode'         => ['nullable', 'string', 'max:100'],
            'discount_type'   => ['nullable', 'in:none,percentage,fixed'],
            'discount_value'  => ['nullable', 'numeric', 'min:0'],
            'tax_category_id' => [
                'nullable',
                Rule::exists('tax_categories', 'id')
                    ->where('tenant_id', TenantContext::id()),
            ],
            'is_active'       => ['nullable', 'boolean'],
            'product_image'   => ['nullable', 'image', 'mimes:jpeg,png,webp', 'max:2048'],
        ];
    }

    protected function updateRules(): array
    {
        $productId = $this->route('product')?->id ?? $this->route('product');

        return [
            'code'            => [
                'required',
                'string',
                'max:50',
                Rule::unique('products', 'code')
                    ->where('tenant_id', TenantContext::id())
                    ->ignore($productId),
            ],
            'sku'             => [
                'nullable',
                'string',
                'max:50',
                Rule::unique('products', 'sku')
                    ->where('tenant_id', TenantContext::id())
                    ->ignore($productId),
            ],
        ];
    }

    protected function baseMessages(): array
    {
        return [
            'item_type.required'      => "Le type d'article est obligatoire.",
            'item_type.in'            => "Le type doit être « Produit » ou « Service ».",
            'name.required'           => 'Le nom du produit est obligatoire.',
            'name.max'                => 'Le nom ne doit pas dépasser 255 caractères.',
            'code.required'           => 'Le code produit est obligatoire.',
            'code.unique'             => 'Ce code produit est déjà utilisé.',
            'sku.unique'              => 'Ce code SKU est déjà utilisé.',
            'category_id.exists'      => 'La catégorie sélectionnée est invalide.',
            'unit_id.exists'          => "L'unité sélectionnée est invalide.",
            'selling_price.required'  => 'Le prix de vente est obligatoire.',
            'selling_price.numeric'   => 'Le prix de vente doit être un nombre.',
            'selling_price.min'       => 'Le prix de vente ne peut pas être négatif.',
            'purchase_price.numeric'  => "Le prix d'achat doit être un nombre.",
            'purchase_price.min'      => "Le prix d'achat ne peut pas être négatif.",
            'quantity.numeric'        => 'La quantité doit être un nombre.',
            'quantity.min'            => 'La quantité ne peut pas être négative.',
            'alert_quantity.numeric'  => "La quantité d'alerte doit être un nombre.",
            'alert_quantity.min'      => "La quantité d'alerte ne peut pas être négative.",
            'barcode.max'             => 'Le code-barres ne doit pas dépasser 100 caractères.',
            'discount_type.in'        => 'Le type de remise est invalide.',
            'discount_value.numeric'  => 'La valeur de remise doit être un nombre.',
            'discount_value.min'      => 'La valeur de remise ne peut pas être négative.',
            'tax_category_id.exists'  => 'La catégorie de taxe sélectionnée est invalide.',
            'billing_type.in'         => 'Le type de facturation est invalide.',
            'hourly_rate.numeric'     => 'Le taux horaire doit être un nombre.',
            'hourly_rate.min'         => 'Le taux horaire ne peut pas être négatif.',
            'estimated_hours.integer' => 'Les heures estimées doivent être un entier.',
            'estimated_hours.min'     => 'Les heures estimées ne peuvent pas être négatives.',
            'sac_code.max'            => 'Le code SAC ne doit pas dépasser 50 caractères.',
            'product_image.image'     => 'Le fichier doit être une image.',
            'product_image.mimes'     => "L'image doit être au format JPEG, PNG ou WebP.",
            'product_image.max'       => "L'image ne doit pas dépasser 2 Mo.",
        ];
    }
}
