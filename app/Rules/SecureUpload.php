<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Http\UploadedFile;
use ZipArchive;

class SecureUpload implements ValidationRule
{
    private const BLOCKED_EXTENSIONS = [
        'php', 'phtml', 'php3', 'php4', 'php5', 'php7', 'php8', 'phar',
        'sh', 'bash', 'zsh', 'bat', 'cmd', 'com', 'exe', 'msi', 'dll',
        'js', 'mjs', 'cjs', 'html', 'htm', 'shtml', 'cgi', 'pl', 'py',
    ];

    private const RASTER_IMAGE_MIME_TYPES = [
        'jpg' => ['image/jpeg'],
        'jpeg' => ['image/jpeg'],
        'png' => ['image/png'],
        'gif' => ['image/gif'],
        'webp' => ['image/webp'],
    ];

    private const PDF_MIME_TYPES = [
        'application/pdf',
        'application/x-pdf',
    ];

    private const DOC_MIME_TYPES = [
        'application/msword',
        'application/x-msword',
        'application/vnd.ms-office',
        'application/x-cfb',
        'application/CDFV2',
    ];

    private const DOCX_MIME_TYPES = [
        'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
        'application/zip',
        'application/x-zip',
        'application/x-zip-compressed',
        'application/octet-stream',
    ];

    private const ZIP_MIME_TYPES = [
        'application/zip',
        'application/x-zip',
        'application/x-zip-compressed',
        'multipart/x-zip',
        'application/octet-stream',
    ];

    public function __construct(
        private array $allowedExtensions,
        private ?string $customMessage = null,
    ) {
        $this->allowedExtensions = array_values(array_unique(array_map('strtolower', $allowedExtensions)));
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if ($value === null || $value === '') {
            return;
        }

        if (! $value instanceof UploadedFile || ! $value->isValid()) {
            $fail(__('Le fichier telecharge est invalide.'));

            return;
        }

        $originalName = $value->getClientOriginalName();
        $extension = strtolower($value->getClientOriginalExtension());

        if ($this->hasUnsafeFileName($originalName) || $this->containsBlockedExtension($originalName)) {
            $fail($this->message());

            return;
        }

        if ($extension === '' || ! in_array($extension, $this->allowedExtensions, true)) {
            $fail($this->message());

            return;
        }

        if (! $this->isAllowedFile($value, $extension)) {
            $fail($this->message());
        }
    }

    private function isAllowedFile(UploadedFile $file, string $extension): bool
    {
        return match ($extension) {
            'jpg', 'jpeg', 'png', 'gif', 'webp' => $this->isValidRasterImage($file, $extension),
            'pdf' => $this->isValidPdf($file),
            'doc' => $this->isValidLegacyWordDocument($file),
            'docx' => $this->isValidZipBasedDocument($file, true),
            'zip' => $this->isValidZipBasedDocument($file, false),
            default => false,
        };
    }

    private function isValidRasterImage(UploadedFile $file, string $extension): bool
    {
        $mimeType = $this->detectMimeType($file);

        if (! in_array($mimeType, self::RASTER_IMAGE_MIME_TYPES[$extension] ?? [], true)) {
            return false;
        }

        return @getimagesize($file->getRealPath()) !== false;
    }

    private function isValidPdf(UploadedFile $file): bool
    {
        $mimeType = $this->detectMimeType($file);
        $header = file_get_contents($file->getRealPath(), false, null, 0, 5);

        return in_array($mimeType, self::PDF_MIME_TYPES, true)
            && $header === '%PDF-';
    }

    private function isValidLegacyWordDocument(UploadedFile $file): bool
    {
        $mimeType = $this->detectMimeType($file);
        $header = file_get_contents($file->getRealPath(), false, null, 0, 8);

        return in_array($mimeType, self::DOC_MIME_TYPES, true)
            && $header === hex2bin('D0CF11E0A1B11AE1');
    }

    private function isValidZipBasedDocument(UploadedFile $file, bool $requireDocxStructure): bool
    {
        $mimeType = $this->detectMimeType($file);
        $allowedMimeTypes = $requireDocxStructure ? self::DOCX_MIME_TYPES : self::ZIP_MIME_TYPES;

        if (! in_array($mimeType, $allowedMimeTypes, true) || ! class_exists(ZipArchive::class)) {
            return false;
        }

        $zip = new ZipArchive();
        $status = $zip->open($file->getRealPath());

        if ($status !== true) {
            return false;
        }

        $requiredEntries = $requireDocxStructure
            ? ['[Content_Types].xml' => false, 'word/document.xml' => false]
            : [];

        for ($index = 0; $index < $zip->numFiles; $index++) {
            $entry = $zip->statIndex($index);
            $entryName = str_replace('\\', '/', $entry['name'] ?? '');

            if ($entryName === ''
                || str_starts_with($entryName, '/')
                || str_contains($entryName, '../')
                || $this->containsBlockedExtension(basename($entryName))) {
                $zip->close();

                return false;
            }

            if ($requireDocxStructure && array_key_exists($entryName, $requiredEntries)) {
                $requiredEntries[$entryName] = true;
            }
        }

        $zip->close();

        return ! in_array(false, $requiredEntries, true);
    }

    private function detectMimeType(UploadedFile $file): string
    {
        $mimeType = $file->getMimeType();

        return strtolower($mimeType ?: 'application/octet-stream');
    }

    private function hasUnsafeFileName(string $fileName): bool
    {
        return str_contains($fileName, '..')
            || str_contains($fileName, '/')
            || str_contains($fileName, '\\')
            || str_contains($fileName, "\0");
    }

    private function containsBlockedExtension(string $fileName): bool
    {
        $segments = array_filter(explode('.', strtolower($fileName)));

        foreach ($segments as $segment) {
            if (in_array($segment, self::BLOCKED_EXTENSIONS, true)) {
                return true;
            }
        }

        return false;
    }

    private function message(): string
    {
        return $this->customMessage
            ?: __('Le fichier telecharge n\'est pas autorise. Formats acceptes : :formats.', [
                'formats' => strtoupper(implode(', ', $this->allowedExtensions)),
            ]);
    }
}
