<?php

namespace App\Http\Requests\Settings;

use App\Rules\SecureBase64Image;
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
            'cropped_invoice_image' => ['nullable', new SecureBase64Image(maxKilobytes: 2048)],
            'cropped_invoice_image_deleted' => ['nullable', 'in:0,1'],
            'invoice_prefix' => ['nullable', 'string', 'max:20'],
            'show_company_details' => ['nullable', 'boolean'],
            'invoice_terms' => ['nullable', 'string', 'max:5000'],
            'invoice_footer' => ['nullable', 'string', 'max:2000'],
            'payment_terms_days' => ['nullable', 'integer', 'min:0', 'max:365'],
        ];
    }

    public function messages(): array
    {
        return [
            'invoice_prefix.max' => __('Le prefixe ne doit pas depasser 20 caracteres.'),
            'invoice_terms.max' => __('Les conditions ne doivent pas depasser 5000 caracteres.'),
            'invoice_footer.max' => __('Le pied de page ne doit pas depasser 2000 caracteres.'),
            'payment_terms_days.min' => __('Le delai de paiement doit etre positif.'),
            'payment_terms_days.max' => __('Le delai de paiement ne doit pas depasser 365 jours.'),
        ];
    }
}
