<?php

namespace App\Http\Requests\Pro\Update;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRecurringInvoiceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'customer_id' => ['sometimes', 'uuid', 'exists:customers,id'],
            'interval' => ['sometimes', 'in:weekly,monthly,quarterly,yearly'],
            'next_run_at' => ['sometimes', 'date'],
            'end_at' => ['sometimes', 'nullable', 'date', 'after_or_equal:next_run_at'],
            'is_active' => ['sometimes', 'boolean'],
            'payload' => ['sometimes', 'nullable', 'array'],
        ];
    }

    public function messages(): array
    {
        return [];
    }
}
