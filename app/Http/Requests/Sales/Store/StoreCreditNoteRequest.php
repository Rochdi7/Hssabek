<?php

namespace App\Http\Requests\Sales\Store;

use Illuminate\Foundation\Http\FormRequest;

class StoreCreditNoteRequest extends FormRequest
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
            'credit_note_number' => 'required|string|unique:credit_notes',
            'reference_invoice_id' => 'nullable|exists:invoices,id',
            'issue_date' => 'required|date',
            'total_amount' => 'required|numeric|min:0',
            'reason' => 'required|string',
            'status' => 'required|in:draft,issued,applied,cancelled',
        ];
    }
}
