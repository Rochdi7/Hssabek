<?php

namespace App\Http\Requests\Purchases\Update;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVendorBillRequest extends FormRequest
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
        $billId = $this->route('vendorBill');
        return [
            'supplier_id' => 'sometimes|required|exists:suppliers,id',
            'bill_number' => "sometimes|required|string|unique:vendor_bills,bill_number,{$billId}",
            'bill_date' => 'sometimes|required|date',
            'due_date' => 'sometimes|required|date|after_or_equal:bill_date',
            'total_amount' => 'sometimes|required|numeric|min:0',
            'status' => 'sometimes|required|in:draft,received,approved,paid,cancelled',
        ];
    }
}
