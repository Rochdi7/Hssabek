<?php

namespace App\Http\Requests\Support;

use App\Http\Requests\TenantFormRequest;
use App\Rules\SecureUpload;

class StoreSupportTicketRequest extends TenantFormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'subject' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:5000'],
            'category' => ['required', 'in:bug,feature,billing,account,other'],
            'priority' => ['required', 'in:low,medium,high,urgent'],
            'attachments' => ['nullable', 'array', 'max:5'],
            'attachments.*' => [
                'file',
                'max:10240',
                new SecureUpload(['jpg', 'jpeg', 'png', 'gif', 'webp', 'pdf', 'doc', 'docx', 'zip']),
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'subject.required' => 'Le sujet est obligatoire.',
            'subject.max' => 'Le sujet ne peut pas depasser 255 caracteres.',
            'description.required' => 'La description est obligatoire.',
            'description.max' => 'La description ne peut pas depasser 5000 caracteres.',
            'category.required' => 'La categorie est obligatoire.',
            'category.in' => 'La categorie selectionnee est invalide.',
            'priority.required' => 'La priorite est obligatoire.',
            'priority.in' => 'La priorite selectionnee est invalide.',
            'attachments.max' => 'Vous ne pouvez pas joindre plus de 5 fichiers.',
            'attachments.*.max' => 'Chaque fichier ne doit pas depasser 10 Mo.',
        ];
    }
}
