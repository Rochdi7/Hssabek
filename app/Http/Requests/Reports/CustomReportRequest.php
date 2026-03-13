<?php

namespace App\Http\Requests\Reports;

use Illuminate\Foundation\Http\FormRequest;

class CustomReportRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title'    => ['required', 'string', 'max:255'],
            'content'  => ['required', 'string', 'max:500000'],
            'category' => ['nullable', 'string', 'max:100'],
            'status'   => ['required', 'in:draft,published'],
        ];
    }

    public function messages(): array
    {
        return [
            'title.required'   => __('Le titre est obligatoire.'),
            'title.max'        => __('Le titre ne doit pas dépasser 255 caractères.'),
            'content.required' => __('Le contenu du rapport est obligatoire.'),
            'content.max'      => __('Le contenu est trop volumineux.'),
            'category.max'     => __('La catégorie ne doit pas dépasser 100 caractères.'),
            'status.required'  => __('Le statut est obligatoire.'),
            'status.in'        => __('Le statut doit être « Brouillon » ou « Publié ».'),
        ];
    }
}
