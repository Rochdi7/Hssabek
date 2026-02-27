<?php

namespace App\Http\Requests\Pro\Store;

use Illuminate\Foundation\Http\FormRequest;

class StoreRecurringInvoiceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'customer_id' => ['required', 'uuid', 'exists:customers,id'],
            'interval' => ['required', 'in:weekly,monthly,quarterly,yearly'],
            'next_run_at' => ['required', 'date'],
            'end_at' => ['nullable', 'date', 'after_or_equal:next_run_at'],
            'is_active' => ['required', 'boolean'],
            'payload' => ['nullable', 'array'],
        ];
    }

    public function messages(): array
    {
        return [];
    }
}
