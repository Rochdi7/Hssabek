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
            'company_email' => ['nullable', 'email', 'max:255'],
            'company_phone' => ['nullable', 'string', 'max:30'],
            'company_fax' => ['nullable', 'string', 'max:30'],
            'company_website' => ['nullable', 'url', 'max:255'],
            'tax_id' => ['nullable', 'string', 'max:50'],
            'registration_number' => ['nullable', 'string', 'max:50'],
            'address' => ['nullable', 'string', 'max:500'],
            'country' => ['nullable', 'string', 'max:100'],
            'state' => ['nullable', 'string', 'max:100'],
            'city' => ['nullable', 'string', 'max:100'],
            'postal_code' => ['nullable', 'string', 'max:20'],
            'cropped_logo' => ['nullable', 'string'],
            'cropped_logo_deleted' => ['nullable', 'string'],
        ];
    }

    public function messages(): array
    {
        return [
            'company_name.required' => "Le nom de l'entreprise est obligatoire.",
            'company_name.max' => "Le nom de l'entreprise ne doit pas dépasser 255 caractères.",
            'company_email.email' => "L'adresse e-mail n'est pas valide.",
            'company_phone.max' => 'Le téléphone ne doit pas dépasser 30 caractères.',
            'company_website.url' => "L'URL du site web n'est pas valide.",
        ];
    }
}
