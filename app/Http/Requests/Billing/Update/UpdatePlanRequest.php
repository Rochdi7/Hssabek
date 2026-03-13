<?php

namespace App\Http\Requests\Billing\Update;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePlanRequest extends FormRequest
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
            'name' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'sometimes|required|numeric|min:0',
            'billing_cycle' => 'sometimes|required|in:monthly,yearly,quarterly',
            'features' => 'nullable|array',
        ];
    }

    public function messages(): array
    {
        return [
            'name.max'               => __('Le nom ne doit pas dépasser 255 caractères.'),
            'price.numeric'          => __('Le prix doit être un nombre.'),
            'price.min'              => __('Le prix ne peut pas être négatif.'),
            'billing_cycle.in'       => __('Le cycle de facturation est invalide.'),
        ];
    }
}
