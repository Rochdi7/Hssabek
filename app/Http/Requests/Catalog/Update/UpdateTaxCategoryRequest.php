<?php

namespace App\Http\Requests\Catalog\Update;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTaxCategoryRequest extends FormRequest
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
        $categoryId = $this->route('taxCategory');
        return [
            'name' => "sometimes|required|string|max:255|unique:tax_categories,name,{$categoryId}",
            'description' => 'nullable|string',
        ];
    }
}
