<?php

namespace App\Http\Requests\Sales\Update;

use Illuminate\Foundation\Http\FormRequest;

class UpdateInvoiceRequest extends FormRequest
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
        $invoiceId = $this->route('invoice');
        return [
            'customer_id' => 'sometimes|required|exists:customers,id',
            'invoice_number' => "sometimes|required|string|unique:invoices,invoice_number,{$invoiceId}",
            'invoice_date' => 'sometimes|required|date',
            'due_date' => 'sometimes|required|date|after_or_equal:invoice_date',
            'total_amount' => 'sometimes|required|numeric|min:0',
            'status' => 'sometimes|required|in:draft,sent,paid,overdue,cancelled',
            'notes' => 'nullable|string',
        ];
    }
}
