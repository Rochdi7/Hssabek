<?php

namespace App\Http\Requests\Sales\Update;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePaymentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'notes' => ['nullable', 'string', 'max:2000'],
        ];
    }

    public function messages(): array
    {
        return [
            'notes.string' => __('Les notes doivent être une chaîne de caractères.'),
            'notes.max' => __('Les notes ne doivent pas dépasser 2000 caractères.'),
        ];
    }
}
