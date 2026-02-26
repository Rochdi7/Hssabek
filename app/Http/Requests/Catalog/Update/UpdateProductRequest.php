<?php

namespace App\Http\Requests\Catalog\Update;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
        $productId = $this->route('product');
        return [
            'name' => 'sometimes|required|string|max:255',
            'sku' => "sometimes|required|string|unique:products,sku,{$productId}",
            'description' => 'nullable|string',
            'category_id' => 'sometimes|required|exists:product_categories,id',
            'unit_id' => 'sometimes|required|exists:units,id',
            'price' => 'sometimes|required|numeric|min:0',
            'cost' => 'nullable|numeric|min:0',
            'is_active' => 'boolean',
        ];
    }
}
