<?php

namespace App\Http\Requests\Settings;

use Illuminate\Foundation\Http\FormRequest;

class UpdateNotificationSettingsRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'general_enabled' => ['nullable', 'boolean'],
            'general' => ['nullable', 'array'],
            'general.*' => ['nullable', 'array'],
            'general.*.*' => ['nullable', 'boolean'],
            'sales_enabled' => ['nullable', 'boolean'],
            'sales' => ['nullable', 'array'],
            'sales.*' => ['nullable', 'array'],
            'sales.*.*' => ['nullable', 'boolean'],
            'invoices_enabled' => ['nullable', 'boolean'],
            'invoices' => ['nullable', 'array'],
            'invoices.*' => ['nullable', 'array'],
            'invoices.*.*' => ['nullable', 'boolean'],
            'users_enabled' => ['nullable', 'boolean'],
            'users' => ['nullable', 'array'],
            'users.*' => ['nullable', 'array'],
            'users.*.*' => ['nullable', 'boolean'],
        ];
    }

    public function messages(): array
    {
        return [];
    }
}
