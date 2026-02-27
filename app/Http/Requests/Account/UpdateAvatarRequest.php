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
                $validator->errors()->add('avatar', 'Please select an image to upload.');
            }
        });
    }

    public function messages(): array
    {
        return [
            'avatar.image' => 'The file must be an image.',
            'avatar.mimes' => 'Only JPG, PNG and WEBP formats are accepted.',
            'avatar.max'   => 'The image must not exceed 5MB.',
        ];
    }
}
