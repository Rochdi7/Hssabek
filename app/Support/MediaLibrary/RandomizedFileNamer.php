<?php

namespace App\Support\MediaLibrary;

use Illuminate\Support\Str;
use Spatie\MediaLibrary\Conversions\Conversion;
use Spatie\MediaLibrary\Support\FileNamer\FileNamer;

class RandomizedFileNamer extends FileNamer
{
    private array $generatedNames = [];

    public function originalFileName(string $fileName): string
    {
        return $this->baseName($fileName);
    }

    public function conversionFileName(string $fileName, Conversion $conversion): string
    {
        return $this->baseName($fileName) . '-' . $conversion->getName();
    }

    public function responsiveFileName(string $fileName): string
    {
        return $this->baseName($fileName) . '-responsive';
    }

    private function baseName(string $fileName): string
    {
        return $this->generatedNames[$fileName] ??= strtolower(Str::random(40));
    }
}
