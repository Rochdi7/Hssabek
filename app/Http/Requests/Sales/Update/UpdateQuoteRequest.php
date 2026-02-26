<?php

namespace App\Http\Requests\Sales\Update;

use Illuminate\Foundation\Http\FormRequest;

class UpdateQuoteRequest extends FormRequest
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
        $quoteId = $this->route('quote');
        return [
            'customer_id' => 'sometimes|required|exists:customers,id',
            'quote_number' => "sometimes|required|string|unique:quotes,quote_number,{$quoteId}",
            'quote_date' => 'sometimes|required|date',
            'valid_until' => 'sometimes|required|date|after:quote_date',
            'total_amount' => 'sometimes|required|numeric|min:0',
            'status' => 'sometimes|required|in:draft,sent,accepted,rejected,expired',
            'notes' => 'nullable|string',
        ];
    }
}
