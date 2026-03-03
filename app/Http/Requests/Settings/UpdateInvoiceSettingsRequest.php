<?php

namespace App\Http\Requests\Settings;

use Illuminate\Foundation\Http\FormRequest;

class UpdateInvoiceSettingsRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'cropped_invoice_image' => ['nullable', 'string'],
            'cropped_invoice_image_deleted' => ['nullable', 'in:0,1'],
            'invoice_prefix' => ['nullable', 'string', 'max:20'],
            'invoice_round_off' => ['nullable', 'integer', 'in:0,5,10'],
            'show_company_details' => ['nullable', 'boolean'],
            'invoice_terms' => ['nullable', 'string', 'max:5000'],
            'invoice_footer' => ['nullable', 'string', 'max:2000'],
            'payment_terms_days' => ['nullable', 'integer', 'min:0', 'max:365'],
        ];
    }

    public function messages(): array
    {
        return [
            'invoice_prefix.max' => 'Le préfixe ne doit pas dépasser 20 caractères.',
            'invoice_round_off.in' => "La valeur d'arrondi n'est pas valide.",
            'invoice_terms.max' => 'Les conditions ne doivent pas dépasser 5000 caractères.',
            'invoice_footer.max' => 'Le pied de page ne doit pas dépasser 2000 caractères.',
            'payment_terms_days.min' => 'Le délai de paiement doit être positif.',
            'payment_terms_days.max' => 'Le délai de paiement ne doit pas dépasser 365 jours.',
        ];
    }
}
