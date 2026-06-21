<?php

namespace App\Http\Requests\Settings;

use App\Rules\SecureBase64Image;
use App\Rules\SecureUpload;
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
            'tax_id' => ['nullable', 'string', 'max:50'],
            'registration_number' => ['nullable', 'string', 'max:50'],
            'cnss' => ['nullable', 'string', 'max:50'],
            'patente' => ['nullable', 'string', 'max:50'],
            'capital_social' => ['nullable', 'numeric', 'min:0'],
            'tribunal' => ['nullable', 'string', 'max:255'],
            'assujetti_tva' => ['nullable', 'boolean'],
            'regime_tva' => ['nullable', 'string', 'in:encaissement,debit'],
            'numero_ae' => ['nullable', 'string', 'max:50'],
            'cin' => ['nullable', 'string', 'max:20'],
            'activite_principale' => ['nullable', 'string', 'max:255'],
            'address' => ['nullable', 'string', 'max:500'],
            'country' => ['nullable', 'string', 'max:100'],
            'state' => ['nullable', 'string', 'max:100'],
            'city' => ['nullable', 'string', 'max:100'],
            'postal_code' => ['nullable', 'string', 'max:20'],
            'cropped_logo' => ['nullable', new SecureBase64Image(maxKilobytes: 2048)],
            'cropped_logo_deleted' => ['nullable', 'in:0,1'],
            'logo' => $this->secureImageRules(),
            'dark_logo' => $this->secureImageRules(),
            'mini_logo' => $this->secureImageRules(),
            'dark_mini_logo' => $this->secureImageRules(),
            'favicon' => $this->secureImageRules(),
            'apple_icon' => $this->secureImageRules(),
            'delete_logo' => ['nullable', 'in:0,1'],
            'delete_dark_logo' => ['nullable', 'in:0,1'],
            'delete_mini_logo' => ['nullable', 'in:0,1'],
            'delete_dark_mini_logo' => ['nullable', 'in:0,1'],
            'delete_favicon' => ['nullable', 'in:0,1'],
            'delete_apple_icon' => ['nullable', 'in:0,1'],
        ];
    }

    public function messages(): array
    {
        return [
            'company_name.required' => __('Le nom de l\'entreprise est obligatoire.'),
            'company_name.max' => __('Le nom de l\'entreprise ne doit pas depasser 255 caracteres.'),
            'forme_juridique.required' => __('La forme juridique est obligatoire.'),
            'forme_juridique.in' => __('La forme juridique selectionnee est invalide.'),
            'company_email.email' => __('L\'adresse e-mail n\'est pas valide.'),
            'company_phone.max' => __('Le telephone ne doit pas depasser 30 caracteres.'),
            'company_website.url' => __('L\'URL du site web n\'est pas valide.'),
            'ice.max' => __('L\'ICE ne doit pas depasser 15 caracteres.'),
            'capital_social.numeric' => __('Le capital social doit etre un nombre.'),
            'capital_social.min' => __('Le capital social ne peut pas etre negatif.'),
        ];
    }

    private function secureImageRules(): array
    {
        return ['nullable', 'file', 'max:2048', new SecureUpload(['jpg', 'jpeg', 'png', 'webp'])];
    }
}
