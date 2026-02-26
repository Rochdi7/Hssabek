<?php

namespace App\Http\Requests\Sales\Store;

use Illuminate\Foundation\Http\FormRequest;

class StoreQuoteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'customer_id' => 'required|exists:customers,id',
            'quote_number' => 'required|string|unique:quotes',
            'quote_date' => 'required|date',
            'valid_until' => 'required|date|after:quote_date',
            'total_amount' => 'required|numeric|min:0',
            'status' => 'required|in:draft,sent,accepted,rejected,expired',
            'notes' => 'nullable|string',
        ];
    }
}
