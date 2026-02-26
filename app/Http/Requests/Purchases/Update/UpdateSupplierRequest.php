<?php

namespace App\Http\Requests\Purchases\Update;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSupplierRequest extends FormRequest
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
        $supplierId = $this->route('supplier');
        return [
            'name' => 'sometimes|required|string|max:255',
            'email' => "sometimes|required|email|unique:suppliers,email,{$supplierId}",
            'phone' => 'nullable|string|max:20',
            'tax_id' => "nullable|string|unique:suppliers,tax_id,{$supplierId}",
            'address' => 'nullable|string',
            'city' => 'nullable|string|max:100',
            'country' => 'nullable|string|max:100',
            'status' => 'sometimes|required|in:active,inactive,suspended',
        ];
    }
}
