<?php

namespace App\Http\Requests\Settings;

use App\Rules\SecureUpload;
use Illuminate\Foundation\Http\FormRequest;

class StoreSignatureRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'signature_image' => ['required', 'file', 'max:2048', new SecureUpload(['jpg', 'jpeg', 'png', 'webp'])],
            'is_default' => ['nullable', 'boolean'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => __('Le nom de la signature est obligatoire.'),
            'name.max' => __('Le nom ne doit pas depasser 255 caracteres.'),
            'signature_image.required' => __('L\'image de la signature est obligatoire.'),
            'signature_image.max' => __('L\'image ne doit pas depasser 2 Mo.'),
        ];
    }
}
