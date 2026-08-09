<?php

namespace App\MediaLibrary;

use Spatie\MediaLibrary\Support\PathGenerator\PathGenerator;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class DynamicPathGenerator implements PathGenerator
{
    public function getPath(Media $media): string
    {
        $folder = $this->getModuleName($media);
        return "{$folder}/{$media->model->id}/";
    }

    public function getPathForConversions(Media $media): string
    {
        $folder = $this->getModuleName($media);
        return "{$folder}/{$media->model->id}/conversions/";
    }

    public function getPathForResponsiveImages(Media $media): string
    {
        $folder = $this->getModuleName($media);
        return "{$folder}/{$media->model->id}/responsive-images/";
    }

    protected function getModuleName(Media $media): string
    {
        // Option 1: From model method (preferred for full control)
        if (method_exists($media->model, 'mediaFolder')) {
            return $media->model->mediaFolder();
        }

        // Option 2: Fallback to class name (e.g., App\Models\Blog → blog)
        return strtolower(class_basename($media->model));
    }
}
