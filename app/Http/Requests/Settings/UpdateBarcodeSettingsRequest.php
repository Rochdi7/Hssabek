<?php

namespace App\Http\Requests\Settings;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBarcodeSettingsRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'show_package_date' => ['nullable', 'boolean'],
            'mrp_label' => ['nullable', 'string', 'max:50'],
            'show_product_name' => ['nullable', 'boolean'],
            'product_name_font_size' => ['nullable', 'integer', 'min:8', 'max:48'],
            'mrp_font_size' => ['nullable', 'integer', 'min:8', 'max:48'],
            'barcode_size' => ['nullable', 'integer', 'min:1', 'max:100'],
        ];
    }

    public function messages(): array
    {
        return [
            'mrp_label.max' => __('Le libellé MRP ne doit pas dépasser 50 caractères.'),
            'product_name_font_size.integer' => __('La taille de la police doit être un nombre entier.'),
            'product_name_font_size.min' => __('La taille de la police doit être au minimum 8.'),
            'mrp_font_size.integer' => __('La taille de la police doit être un nombre entier.'),
            'barcode_size.integer' => __('La taille du code-barres doit être un nombre entier.'),
        ];
    }
}
