<?php

namespace App\Http\Requests\CRM\Update;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCustomerAddressRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'type' => ['required', 'in:billing,shipping'],
            'line1' => ['required', 'string', 'max:255'],
            'line2' => ['nullable', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:100'],
            'region' => ['nullable', 'string', 'max:100'],
            'postal_code' => ['nullable', 'string', 'max:20'],
            'country' => ['required', 'string', 'max:100'],
        ];
    }

    public function messages(): array
    {
        return [
            'type.required' => __("Le type d'adresse est obligatoire."),
            'type.in' => __("Le type d'adresse doit être « Facturation » ou « Livraison »."),
            'line1.required' => __("L'adresse (ligne 1) est obligatoire."),
            'line1.max' => __("L'adresse (ligne 1) ne doit pas dépasser 255 caractères."),
            'line2.max' => __("L'adresse (ligne 2) ne doit pas dépasser 255 caractères."),
            'city.required' => __('La ville est obligatoire.'),
            'city.max' => __('La ville ne doit pas dépasser 100 caractères.'),
            'region.max' => __('La région ne doit pas dépasser 100 caractères.'),
            'postal_code.max' => __('Le code postal ne doit pas dépasser 20 caractères.'),
            'country.required' => __('Le pays est obligatoire.'),
            'country.max' => __('Le pays ne doit pas dépasser 100 caractères.'),
        ];
    }
}
