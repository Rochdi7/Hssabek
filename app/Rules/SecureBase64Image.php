<?php

namespace App\Rules;

use App\Support\Security\Base64Image;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use InvalidArgumentException;

class SecureBase64Image implements ValidationRule
{
    public function __construct(
        private array $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/webp'],
        private int $maxKilobytes = 2048,
    ) {
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if ($value === null || $value === '') {
            return;
        }

        if (! is_string($value)) {
            $fail(__('L\'image fournie est invalide.'));

            return;
        }

        try {
            Base64Image::inspect($value, $this->allowedMimeTypes, $this->maxKilobytes);
        } catch (InvalidArgumentException $exception) {
            $fail($exception->getMessage());
        }
    }
}
