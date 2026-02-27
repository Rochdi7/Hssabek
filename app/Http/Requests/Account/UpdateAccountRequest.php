<?php

namespace App\Http\Requests\Account;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Carbon\Carbon;

class UpdateAccountRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Convert DD-MM-YYYY from the datetimepicker to a standard Y-m-d before validation.
     */
    protected function prepareForValidation(): void
    {
        if ($this->filled('date_of_birth')) {
            try {
                $this->merge([
                    'date_of_birth' => Carbon::createFromFormat('d-m-Y', $this->date_of_birth)->format('Y-m-d'),
                ]);
            } catch (\Exception $e) {
                // leave as-is so 'date' rule catches the error
            }
        }
    }

    public function rules(): array
    {
        return [
            'name'                    => ['required', 'string', 'max:255'],
            'email'                   => ['required', 'email', 'max:255', Rule::unique('users')->ignore($this->user()->id)],
            'phone'                   => ['nullable', 'string', 'max:30'],
            'gender'                  => ['nullable', 'in:male,female'],
            'date_of_birth'           => ['nullable', 'date', 'before:today'],
            'address'                 => ['nullable', 'string', 'max:500'],
            'country'                 => ['nullable', 'string', 'max:100'],
            'state'                   => ['nullable', 'string', 'max:100'],
            'city'                    => ['nullable', 'string', 'max:100'],
            'postal_code'             => ['nullable', 'string', 'max:20'],
            'cropped_avatar'          => ['nullable', 'string'],
            'cropped_avatar_deleted'  => ['nullable', 'in:0,1'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'   => 'Le nom est obligatoire.',
            'name.max'        => 'Le nom ne doit pas dépasser 255 caractères.',
            'email.required'  => "L'adresse e-mail est obligatoire.",
            'email.email'     => "L'adresse e-mail n'est pas valide.",
            'email.unique'    => 'Cette adresse e-mail est déjà utilisée.',
            'phone.max'       => 'Le numéro de téléphone ne doit pas dépasser 30 caractères.',
            'gender.in'       => 'Le genre sélectionné est invalide.',
            'date_of_birth.date'   => 'La date de naissance n\'est pas valide.',
            'date_of_birth.before' => 'La date de naissance doit être antérieure à aujourd\'hui.',
            'address.max'     => "L'adresse ne doit pas dépasser 500 caractères.",
            'country.max'     => 'Le pays ne doit pas dépasser 100 caractères.',
            'state.max'       => 'La région ne doit pas dépasser 100 caractères.',
            'city.max'        => 'La ville ne doit pas dépasser 100 caractères.',
            'postal_code.max' => 'Le code postal ne doit pas dépasser 20 caractères.',
        ];
    }
}
