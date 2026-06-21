<?php

namespace App\Support\Security;

use Illuminate\Support\Str;
use InvalidArgumentException;
use Spatie\MediaLibrary\HasMedia;

class Base64Image
{
    private const MIME_EXTENSION_MAP = [
        'image/jpeg' => 'jpg',
        'image/png' => 'png',
        'image/webp' => 'webp',
        'image/gif' => 'gif',
    ];

    public static function inspect(
        string $value,
        array $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/webp'],
        int $maxKilobytes = 2048,
    ): array {
        if (! preg_match('/^data:(image\/[a-zA-Z0-9.+-]+);base64,(.+)$/s', $value, $matches)) {
            throw new InvalidArgumentException(__('Le format de l\'image est invalide.'));
        }

        $binary = base64_decode($matches[2], true);

        if ($binary === false || $binary === '') {
            throw new InvalidArgumentException(__('L\'image fournie est invalide.'));
        }

        if (strlen($binary) > ($maxKilobytes * 1024)) {
            throw new InvalidArgumentException(__('L\'image ne doit pas depasser :size Mo.', [
                'size' => number_format($maxKilobytes / 1024, 0),
            ]));
        }

        $imageInfo = @getimagesizefromstring($binary);

        if ($imageInfo === false || empty($imageInfo['mime'])) {
            throw new InvalidArgumentException(__('L\'image fournie est invalide.'));
        }

        $mimeType = strtolower($imageInfo['mime']);
        $bufferMimeType = new \finfo(FILEINFO_MIME_TYPE);
        $detectedMimeType = strtolower($bufferMimeType->buffer($binary) ?: '');

        if (! in_array($mimeType, $allowedMimeTypes, true)
            || ($detectedMimeType !== '' && ! in_array($detectedMimeType, $allowedMimeTypes, true))) {
            throw new InvalidArgumentException(__('Seules les images JPG, PNG et WEBP sont autorisees.'));
        }

        $extension = self::MIME_EXTENSION_MAP[$mimeType] ?? null;

        if ($extension === null) {
            throw new InvalidArgumentException(__('Le format de l\'image est invalide.'));
        }

        return [
            'binary' => $binary,
            'mime_type' => $mimeType,
            'extension' => $extension,
        ];
    }

    public static function attachToMediaCollection(
        HasMedia $model,
        string $collection,
        string $value,
        string $prefix = 'upload',
        array $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/webp'],
        int $maxKilobytes = 2048,
        bool $clearExisting = false,
    ): void {
        $temporaryFile = self::toTemporaryFile($value, $prefix, $allowedMimeTypes, $maxKilobytes);

        try {
            if ($clearExisting) {
                $model->clearMediaCollection($collection);
            }

            $model->addMedia($temporaryFile['path'])
                ->usingFileName($temporaryFile['file_name'])
                ->toMediaCollection($collection);
        } finally {
            if (is_file($temporaryFile['path'])) {
                @unlink($temporaryFile['path']);
            }
        }
    }

    private static function toTemporaryFile(
        string $value,
        string $prefix,
        array $allowedMimeTypes,
        int $maxKilobytes,
    ): array {
        $inspection = self::inspect($value, $allowedMimeTypes, $maxKilobytes);
        $safePrefix = trim(preg_replace('/[^A-Za-z0-9_-]+/', '-', Str::ascii($prefix)) ?: 'upload', '-');
        $fileName = strtolower($safePrefix) . '-' . Str::random(40) . '.' . $inspection['extension'];
        $basePath = tempnam(sys_get_temp_dir(), 'upl_');
        $temporaryPath = $basePath . '.' . $inspection['extension'];

        if (is_file($basePath)) {
            @unlink($basePath);
        }

        file_put_contents($temporaryPath, $inspection['binary'], LOCK_EX);

        return [
            'path' => $temporaryPath,
            'file_name' => $fileName,
        ];
    }
}
