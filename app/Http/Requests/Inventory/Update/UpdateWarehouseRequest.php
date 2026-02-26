<?php

namespace App\Http\Requests\Inventory\Update;

use Illuminate\Foundation\Http\FormRequest;

class UpdateWarehouseRequest extends FormRequest
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
        $warehouseId = $this->route('warehouse');
        return [
            'name' => "sometimes|required|string|max:255|unique:warehouses,name,{$warehouseId}",
            'code' => "sometimes|required|string|max:50|unique:warehouses,code,{$warehouseId}",
            'location' => 'nullable|string|max:255',
            'capacity' => 'nullable|numeric|min:0',
            'is_active' => 'boolean',
        ];
    }
}
