<?php

namespace App\Http\Requests\Account;

use App\Rules\SecureBase64Image;
use App\Rules\SecureUpload;
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
            'avatar' => ['nullable', 'file', 'max:5120', new SecureUpload(['jpg', 'jpeg', 'png', 'webp'])],
            'cropped_image' => ['nullable', new SecureBase64Image(maxKilobytes: 5120)],
        ];
    }

    /**
     * Configure the validator instance.
     */
    public function withValidator($validator): void
    {
        $validator->after(function ($validator) {
            if (! $this->filled('cropped_image') && ! $this->hasFile('avatar')) {
                $validator->errors()->add('avatar', __('Veuillez selectionner une image a telecharger.'));
            }
        });
    }

    public function messages(): array
    {
        return [
            'avatar.max' => __('L\'image ne doit pas depasser 5 Mo.'),
        ];
    }
}
