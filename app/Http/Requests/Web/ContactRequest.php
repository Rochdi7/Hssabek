<?php

namespace App\Http\Requests\Web;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'    => ['required', 'string', 'max:255'],
            'email'   => ['required', 'email', 'max:255'],
            'subject' => ['required', 'string', 'in:question,support,billing,partnership,other'],
            'message' => ['required', 'string', 'min:10', 'max:5000'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'    => 'Veuillez saisir votre nom.',
            'email.required'   => 'Veuillez saisir votre adresse email.',
            'email.email'      => 'Veuillez saisir une adresse email valide.',
            'subject.required' => 'Veuillez sélectionner un sujet.',
            'subject.in'       => 'Le sujet sélectionné est invalide.',
            'message.required' => 'Veuillez saisir votre message.',
            'message.min'      => 'Votre message doit contenir au moins :min caractères.',
            'message.max'      => 'Votre message ne peut pas dépasser :max caractères.',
        ];
    }
}
