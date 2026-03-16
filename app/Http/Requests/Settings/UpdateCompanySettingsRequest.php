<?php

namespace App\Http\Requests\Settings;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCompanySettingsRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'company_name' => ['required', 'string', 'max:255'],
            'forme_juridique' => ['required', 'string', 'in:sarl,sarl_au,sa,snc,scs,sca,auto_entrepreneur,ei,cooperative'],
            'company_email' => ['nullable', 'email', 'max:255'],
            'company_phone' => ['nullable', 'string', 'max:30'],
            'company_fax' => ['nullable', 'string', 'max:30'],
            'company_website' => ['nullable', 'url', 'max:255'],
            'ice' => ['nullable', 'string', 'max:15'],
            // SARL / SARL AU fields
            'tax_id' => ['nullable', 'string', 'max:50'],
            'registration_number' => ['nullable', 'string', 'max:50'],
            'cnss' => ['nullable', 'string', 'max:50'],
            'patente' => ['nullable', 'string', 'max:50'],
            'capital_social' => ['nullable', 'numeric', 'min:0'],
            'tribunal' => ['nullable', 'string', 'max:255'],
            'assujetti_tva' => ['nullable', 'boolean'],
            'regime_tva' => ['nullable', 'string', 'in:encaissement,debit'],
            // Auto-Entrepreneur fields
            'numero_ae' => ['nullable', 'string', 'max:50'],
            'cin' => ['nullable', 'string', 'max:20'],
            'activite_principale' => ['nullable', 'string', 'max:255'],
            // Address
            'address' => ['nullable', 'string', 'max:500'],
            'country' => ['nullable', 'string', 'max:100'],
            'state' => ['nullable', 'string', 'max:100'],
            'city' => ['nullable', 'string', 'max:100'],
            'postal_code' => ['nullable', 'string', 'max:20'],
            // Images
            'cropped_logo' => ['nullable', 'string'],
            'cropped_logo_deleted' => ['nullable', 'string'],
            'logo' => ['nullable', 'image', 'max:2048'],
            'dark_logo' => ['nullable', 'image', 'max:2048'],
            'mini_logo' => ['nullable', 'image', 'max:2048'],
            'dark_mini_logo' => ['nullable', 'image', 'max:2048'],
            'favicon' => ['nullable', 'image', 'max:2048'],
            'apple_icon' => ['nullable', 'image', 'max:2048'],
            'delete_logo' => ['nullable', 'string'],
            'delete_dark_logo' => ['nullable', 'string'],
            'delete_mini_logo' => ['nullable', 'string'],
            'delete_dark_mini_logo' => ['nullable', 'string'],
            'delete_favicon' => ['nullable', 'string'],
            'delete_apple_icon' => ['nullable', 'string'],
        ];
    }

    public function messages(): array
    {
        return [
            'company_name.required' => __("Le nom de l'entreprise est obligatoire."),
            'company_name.max' => __("Le nom de l'entreprise ne doit pas dépasser 255 caractères."),
            'forme_juridique.required' => __('La forme juridique est obligatoire.'),
            'forme_juridique.in' => __('La forme juridique sélectionnée est invalide.'),
            'company_email.email' => __("L'adresse e-mail n'est pas valide."),
            'company_phone.max' => __('Le téléphone ne doit pas dépasser 30 caractères.'),
            'company_website.url' => __("L'URL du site web n'est pas valide."),
            'ice.max' => __("L'ICE ne doit pas dépasser 15 caractères."),
            'capital_social.numeric' => __('Le capital social doit être un nombre.'),
            'capital_social.min' => __('Le capital social ne peut pas être négatif.'),
        ];
    }
}
