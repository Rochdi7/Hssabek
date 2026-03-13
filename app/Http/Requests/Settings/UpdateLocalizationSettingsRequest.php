<?php

namespace App\Http\Requests\Settings;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLocalizationSettingsRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'locale' => ['nullable', 'string', 'in:fr,en,ar'],
            'timezone' => ['nullable', 'string', 'max:50'],
            'currency' => ['nullable', 'string', 'size:3'],
            'date_format' => ['nullable', 'string', 'max:20'],
            'time_format' => ['nullable', 'string', 'in:12,24'],
        ];
    }

    public function messages(): array
    {
        return [
            'locale.in' => __('La langue sélectionnée est invalide.'),
            'timezone.max' => __('Le fuseau horaire ne doit pas dépasser 50 caractères.'),
            'currency.size' => __('La devise doit contenir exactement 3 caractères.'),
            'date_format.max' => __('Le format de date est invalide.'),
            'time_format.in' => __("Le format d'heure doit être 12 ou 24."),
        ];
    }
}
