<?php

namespace App\Http\Requests\Billing\Store;

use Illuminate\Foundation\Http\FormRequest;

class StoreSubscriptionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'customer_id' => 'required|exists:customers,id',
            'plan_id' => 'required|exists:plans,id',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after:start_date',
            'status' => 'required|in:active,cancelled,suspended',
        ];
    }

    public function messages(): array
    {
        return [
            'customer_id.required' => __('Le locataire est obligatoire.'),
            'customer_id.exists'   => __('Le locataire sélectionné est invalide.'),
            'plan_id.required'     => __('Le plan est obligatoire.'),
            'plan_id.exists'       => __('Le plan sélectionné est invalide.'),
            'start_date.required'  => __('La date de début est obligatoire.'),
            'end_date.after'       => __('La date de fin doit être postérieure à la date de début.'),
            'status.required'      => __('Le statut est obligatoire.'),
            'status.in'            => __('Le statut est invalide.'),
        ];
    }
}
