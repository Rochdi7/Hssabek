<?php

namespace App\Http\Requests\Settings;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSignatureRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'signature_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,svg,webp', 'max:2048'],
            'is_default' => ['nullable', 'boolean'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => __('Le nom de la signature est obligatoire.'),
            'name.max' => __('Le nom ne doit pas dépasser 255 caractères.'),
            'signature_image.image' => __('Le fichier doit être une image.'),
            'signature_image.mimes' => __('L\'image doit être au format JPG, PNG, SVG ou WebP.'),
            'signature_image.max' => __('L\'image ne doit pas dépasser 2 Mo.'),
        ];
    }
}
