<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ImageService
{
    protected int $width = 1920;
    protected int $height = 1920;

    /**
     * @param $file
     * @return \Intervention\Image\Image
     */
    public function resize($file): \Intervention\Image\Image
    {
        $originalImage = Image::make($file);
        $width = $originalImage->width();
        $height = $originalImage->height();
        
        if ($width > $this->width || $height > $this->height) {
            $originalImage = $originalImage->resize($this->width, $this->height, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
        }

        return $originalImage;
    }

    /**
     * @param $file
     * @param $dir
     * @param $originalImage
     * @return string
     */
    public function saveFile($file, $dir, $originalImage): string
    {
        $filename = uniqid('image_').'.'.$file->getClientOriginalExtension();

        Storage::disk('public')->put($dir.$filename, $originalImage->encode());

        return $filename;
    }
}
