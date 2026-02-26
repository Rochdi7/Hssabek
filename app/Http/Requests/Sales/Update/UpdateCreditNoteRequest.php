<?php

namespace App\Http\Requests\Sales\Update;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCreditNoteRequest extends FormRequest
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
        $creditNoteId = $this->route('creditNote');
        return [
            'customer_id' => 'sometimes|required|exists:customers,id',
            'credit_note_number' => "sometimes|required|string|unique:credit_notes,credit_note_number,{$creditNoteId}",
            'reference_invoice_id' => 'nullable|exists:invoices,id',
            'issue_date' => 'sometimes|required|date',
            'total_amount' => 'sometimes|required|numeric|min:0',
            'reason' => 'sometimes|required|string',
            'status' => 'sometimes|required|in:draft,issued,applied,cancelled',
        ];
    }
}
