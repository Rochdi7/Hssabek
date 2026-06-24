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
            'general_enabled'   => ['nullable', 'boolean'],
            'general'           => ['nullable', 'array'],
            'general.*'         => ['nullable', 'array'],
            'general.*.*'       => ['nullable', 'boolean'],
            'sales_enabled'     => ['nullable', 'boolean'],
            'sales'             => ['nullable', 'array'],
            'sales.*'           => ['nullable', 'array'],
            'sales.*.*'         => ['nullable', 'boolean'],
            'invoices_enabled'  => ['nullable', 'boolean'],
            'invoices'          => ['nullable', 'array'],
            'invoices.*'        => ['nullable', 'array'],
            'invoices.*.*'      => ['nullable', 'boolean'],
            'users_enabled'     => ['nullable', 'boolean'],
            'users'             => ['nullable', 'array'],
            'users.*'           => ['nullable', 'array'],
            'users.*.*'         => ['nullable', 'boolean'],
            'reminder_settings'                        => ['nullable', 'array'],
            'reminder_settings.enabled'                => ['nullable', 'boolean'],
            'reminder_settings.before_due_days'        => ['nullable', 'integer', 'min:0', 'max:30'],
            'reminder_settings.on_due'                 => ['nullable', 'boolean'],
            'reminder_settings.after_due_days'         => ['nullable', 'integer', 'min:0', 'max:90'],
            'reminder_settings.notify_company'         => ['nullable', 'boolean'],
            'reminder_settings.notify_company_email'   => ['nullable', 'boolean'],
        ];
    }

    public function messages(): array
    {
        return [
            'reminder_settings.before_due_days.max' => __('Le rappel avant échéance ne peut pas dépasser 30 jours.'),
            'reminder_settings.after_due_days.max'  => __('Le rappel après échéance ne peut pas dépasser 90 jours.'),
        ];
    }

}
