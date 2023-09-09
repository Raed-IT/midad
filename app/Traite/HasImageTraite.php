<?php

namespace App\Traite;

use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;

trait HasImageTraite
{


    public function getImageAttribute()
    {
        if ($this->hasMedia('image')) {
            return $this->getFirstMediaUrl("image");
        }
        return asset('images/default.png');
    }

    public function getFilesAttribute()
    {
        $files = [];
        if ($this->hasMedia('files')) {
            foreach ($this->getMedia("files") as $file) {
                $files[] = $file->getFullUrl();
            }
        }
        return $files;
    }

    public function addMediaToModel($images, string $collection = "image")
    {
        if (is_array($images)) {
            //  images is array store all items
            if (!empty($images)) {
                foreach ($images as $img)
                    try {
                        $this->addMedia($img)->sanitizingFileName(function ($fileName) {
                            return strtolower(str_replace(['#', '/', '\\', ' '], '-', $fileName));
                        })->toMediaCollection($collection);
                    } catch (FileDoesNotExist|FileIsTooBig $e) {
                        info($e);
                    }
            }
        } else {
            // images is single file
            if ($images) {
                try {
                    $this->addMedia($images)->sanitizingFileName(function ($fileName) {
                        return strtolower(str_replace(['#', '/', '\\', ' '], '-', $fileName));
                    })->toMediaCollection($collection);
                } catch (FileDoesNotExist|FileIsTooBig $e) {
                }
            }
        }

    }

    public function getSliders()
    {
        $images = [];
        if ($this->hasMedia('slider')) {
            $list = $this->getMedia('slider');
            foreach ($list as $kye => $item) {
                $images[] = $item->getUrl();
            }
        }
        return $images;
    }
}
