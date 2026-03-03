<?php

namespace App\Http\Requests\Settings;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaxGroupRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'rates' => ['required', 'array', 'min:1'],
            'rates.*.name' => ['required', 'string', 'max:255'],
            'rates.*.rate' => ['required', 'numeric', 'min:0', 'max:100'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Le nom du groupe de taxes est obligatoire.',
            'rates.required' => 'Au moins un taux est requis.',
            'rates.min' => 'Au moins un taux est requis.',
            'rates.*.name.required' => 'Le nom du taux est obligatoire.',
            'rates.*.rate.required' => 'Le taux est obligatoire.',
            'rates.*.rate.numeric' => 'Le taux doit être un nombre.',
        ];
    }
}
