<?php

namespace App\Http\Requests\CRM\Update;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCustomerRequest extends FormRequest
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
        $customerId = $this->route('customer');
        return [
            'name' => 'sometimes|required|string|max:255',
            'email' => "sometimes|required|email|unique:customers,email,{$customerId}",
            'phone' => 'nullable|string|max:20',
            'tax_id' => "nullable|string|unique:customers,tax_id,{$customerId}",
            'type' => 'sometimes|required|in:individual,company',
            'status' => 'sometimes|required|in:active,inactive,suspended',
        ];
    }
}
