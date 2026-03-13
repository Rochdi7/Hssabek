<?php

namespace App\Http\Requests\Account;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAvatarRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'avatar'        => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
            'cropped_image' => ['nullable', 'string'],
        ];
    }

    /**
     * Configure the validator instance.
     */
    public function withValidator($validator): void
    {
        $validator->after(function ($validator) {
            if (!$this->filled('cropped_image') && !$this->hasFile('avatar')) {
                $validator->errors()->add('avatar', 'Veuillez sélectionner une image à télécharger.');
            }
        });
    }

    public function messages(): array
    {
        return [
            'avatar.image' => __('Le fichier doit être une image.'),
            'avatar.mimes' => __('Seuls les formats JPG, PNG et WEBP sont acceptés.'),
            'avatar.max'   => __('L\'image ne doit pas dépasser 5 Mo.'),
        ];
    }
}
