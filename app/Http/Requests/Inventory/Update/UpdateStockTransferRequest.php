<?php

namespace App\Http\Requests\Inventory\Update;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStockTransferRequest extends FormRequest
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
            'transfer_date' => 'sometimes|required|date',
            'reference' => 'nullable|string|max:100',
            'status' => 'sometimes|required|in:pending,in_transit,received,cancelled',
        ];
    }
}
