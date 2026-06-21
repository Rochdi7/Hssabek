<?php

namespace App\Http\Requests\Account;

use App\Rules\SecureBase64Image;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
                // Leave the original value so the date rule can reject it.
            }
        }
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($this->user()->id)],
            'phone' => ['nullable', 'string', 'max:30'],
            'gender' => ['nullable', 'in:male,female'],
            'date_of_birth' => ['nullable', 'date', 'before:today'],
            'address' => ['nullable', 'string', 'max:500'],
            'country' => ['nullable', 'string', 'max:100'],
            'state' => ['nullable', 'string', 'max:100'],
            'city' => ['nullable', 'string', 'max:100'],
            'postal_code' => ['nullable', 'string', 'max:20'],
            'cropped_avatar' => ['nullable', new SecureBase64Image(maxKilobytes: 5120)],
            'cropped_avatar_deleted' => ['nullable', 'in:0,1'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => __('Le nom est obligatoire.'),
            'name.max' => __('Le nom ne doit pas depasser 255 caracteres.'),
            'email.required' => __('L\'adresse e-mail est obligatoire.'),
            'email.email' => __('L\'adresse e-mail n\'est pas valide.'),
            'email.unique' => __('Cette adresse e-mail est deja utilisee.'),
            'phone.max' => __('Le numero de telephone ne doit pas depasser 30 caracteres.'),
            'gender.in' => __('Le genre selectionne est invalide.'),
            'date_of_birth.date' => __('La date de naissance n\'est pas valide.'),
            'date_of_birth.before' => __('La date de naissance doit etre anterieure a aujourd\'hui.'),
            'address.max' => __('L\'adresse ne doit pas depasser 500 caracteres.'),
            'country.max' => __('Le pays ne doit pas depasser 100 caracteres.'),
            'state.max' => __('La region ne doit pas depasser 100 caracteres.'),
            'city.max' => __('La ville ne doit pas depasser 100 caracteres.'),
            'postal_code.max' => __('Le code postal ne doit pas depasser 20 caracteres.'),
        ];
    }
}
