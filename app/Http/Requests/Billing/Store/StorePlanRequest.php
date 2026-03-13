<?php

namespace App\Http\Requests\Billing\Store;

use Illuminate\Foundation\Http\FormRequest;

class StorePlanRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'billing_cycle' => 'required|in:monthly,yearly,quarterly',
            'features' => 'nullable|array',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'          => __('Le nom du plan est obligatoire.'),
            'name.max'               => __('Le nom ne doit pas dépasser 255 caractères.'),
            'price.required'         => __('Le prix est obligatoire.'),
            'price.numeric'          => __('Le prix doit être un nombre.'),
            'price.min'              => __('Le prix ne peut pas être négatif.'),
            'billing_cycle.required' => __('Le cycle de facturation est obligatoire.'),
            'billing_cycle.in'       => __('Le cycle de facturation est invalide.'),
        ];
    }
}
