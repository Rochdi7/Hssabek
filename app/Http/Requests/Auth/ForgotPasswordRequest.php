<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class ForgotPasswordRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => ['required', 'string', 'email', 'max:190', 'exists:users,email'],
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => __('L\'adresse e-mail est obligatoire.'),
            'email.email' => __('L\'adresse e-mail n\'est pas valide.'),
            'email.exists' => __('Cette adresse e-mail n\'est pas enregistrée.'),
        ];
    }
}
