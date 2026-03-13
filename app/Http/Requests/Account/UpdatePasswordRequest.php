<?php

namespace App\Http\Requests\Account;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class UpdatePasswordRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'current_password' => ['required', 'current_password'],
            'password'         => ['required', 'confirmed', Password::min(8)->mixedCase()->numbers()],
        ];
    }

    public function messages(): array
    {
        return [
            'current_password.required'         => __('Le mot de passe actuel est obligatoire.'),
            'current_password.current_password'  => __('Le mot de passe actuel est incorrect.'),
            'password.required'                  => __('Le nouveau mot de passe est obligatoire.'),
            'password.confirmed'                 => __('La confirmation du mot de passe ne correspond pas.'),
        ];
    }
}
