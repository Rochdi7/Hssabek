<?php

namespace App\Support\MediaLibrary;

use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\Support\PathGenerator\PathGenerator;

/**
 * Store media files under a short UUID (first 8 chars).
 * Produces paths like: media/8937a394/filename.jpg
 */
class UuidPathGenerator implements PathGenerator
{
    public function getPath(Media $media): string
    {
        return $this->getBasePath($media) . '/';
    }

    public function getPathForConversions(Media $media): string
    {
        return $this->getBasePath($media) . '/conversions/';
    }

    public function getPathForResponsiveImages(Media $media): string
    {
        return $this->getBasePath($media) . '/responsive-images/';
    }

    protected function getBasePath(Media $media): string
    {
        $shortUuid = substr($media->uuid, 0, 8);
        $prefix = config('media-library.prefix', 'media');

        if ($prefix !== '') {
            return $prefix . '/' . $shortUuid;
        }

        return $shortUuid;
    }
}
