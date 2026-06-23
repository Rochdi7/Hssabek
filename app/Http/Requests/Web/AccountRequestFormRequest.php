<?php

namespace App\Http\Requests\Web;

use Illuminate\Foundation\Http\FormRequest;

class AccountRequestFormRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'company_name'    => ['required', 'string', 'max:255'],
            'company_email'   => [
                'required',
                'email:rfc',
                'max:255',
                // Prevent duplicate requests for the same company email, with a
                // status-aware message (pending / approved / rejected).
                function (string $_attribute, mixed $value, \Closure $fail) {
                    $status = self::existingRequestStatus($value);

                    if ($status === null) {
                        return;
                    }

                    match ($status) {
                        'approved' => $fail('Un compte existe déjà pour cette adresse email. Veuillez vous connecter ou nous contacter.'),
                        'pending'  => $fail('Une demande avec cet email est déjà en cours de traitement. Nous vous contacterons prochainement.'),
                        'rejected' => $fail('Une demande précédente avec cet email a été rejetée. Veuillez nous contacter sur WhatsApp pour résoudre votre problème.'),
                        default    => $fail('Une demande avec cet email a déjà été envoyée.'),
                    };
                },
            ],
            'company_phone'   => ['nullable', 'string', 'max:50'],
            'company_address' => ['nullable', 'string', 'max:500'],
            'company_city'    => ['nullable', 'string', 'max:255'],
            'company_country' => ['nullable', 'string', 'max:255'],
            'sector'          => ['nullable', 'string', 'in:commerce,services,industrie,construction,technologie,sante,education,transport,agriculture,immobilier,restauration,autre'],
            'employees_count' => ['nullable', 'string', 'in:1-5,6-20,21-50,51-200,200+'],
            'contact_name'    => ['required', 'string', 'max:255'],
            'contact_email'   => [
                'required',
                'email:rfc',
                'max:255',
                // Prevent using an email that already belongs to an active tenant user
                function (string $_attribute, mixed $value, \Closure $fail) {
                    $exists = \Illuminate\Support\Facades\DB::table('users')
                        ->where('email', $value)
                        ->whereNotNull('tenant_id')
                        ->exists();
                    if ($exists) {
                        $fail('Cette adresse email est déjà associée à un compte existant.');
                    }
                },
            ],
            'contact_phone'   => ['nullable', 'string', 'max:50'],
            'message'         => ['nullable', 'string', 'max:2000'],
        ];
    }

    public function messages(): array
    {
        return [
            'company_name.required'  => 'Veuillez saisir le nom de votre entreprise.',
            'company_email.required' => 'Veuillez saisir l\'adresse email de l\'entreprise.',
            'company_email.email'    => 'Veuillez saisir une adresse email valide.',
            'contact_name.required'  => 'Veuillez saisir votre nom complet.',
            'contact_email.required' => 'Veuillez saisir votre adresse email.',
            'contact_email.email'    => 'Veuillez saisir une adresse email valide.',
            'sector.in'              => 'Le secteur sélectionné est invalide.',
            'employees_count.in'     => 'Le nombre d\'employés sélectionné est invalide.',
            'message.max'            => 'Votre message ne peut pas dépasser :max caractères.',
        ];
    }

    /**
     * When the duplicate is due to a previously REJECTED request, flash a flag so
     * the view can render an actionable "contact us on WhatsApp" button.
     */
    public function withValidator($validator): void
    {
        $validator->after(function ($validator) {
            $email = $this->input('company_email');

            if (! $email) {
                return;
            }

            $existing = \App\Models\System\AccountRequest::where('company_email', $email)
                ->orderByRaw("FIELD(status, 'approved', 'pending', 'rejected')")
                ->first();

            if ($existing && $existing->status === 'rejected') {
                session()->flash('show_whatsapp_help', true);
            }
        });
    }
}
