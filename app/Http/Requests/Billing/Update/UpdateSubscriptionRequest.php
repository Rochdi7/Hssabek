<?php

namespace App\Http\Requests\Billing\Update;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSubscriptionRequest extends FormRequest
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
            'plan_id' => 'sometimes|required|exists:plans,id',
            'start_date' => 'sometimes|required|date',
            'end_date' => 'nullable|date|after:start_date',
            'status' => 'sometimes|required|in:active,cancelled,suspended',
        ];
    }

    public function messages(): array
    {
        return [
            'plan_id.exists'  => __('Le plan sélectionné est invalide.'),
            'end_date.after'  => __('La date de fin doit être postérieure à la date de début.'),
            'status.in'       => __('Le statut est invalide.'),
        ];
    }
}
