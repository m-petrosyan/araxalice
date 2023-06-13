<?php

namespace App\Services;

use App\Repositories\AboutRepository;
use Illuminate\Support\Facades\Storage;

class AboutService extends ImageService
{
    protected string $dir = 'about/';

    public function storeOrUpdate(array $attributes): void
    {
        $text = $attributes['text'];
        $image = $attributes['image'] ?? isset($attributes['image']);

        $data = ['text' => $text,];

        if ($image) {
            $originalImage = $this->resize($image);

            $data['image'] = $this->saveFile($image, $this->dir, $originalImage);

            $oldImage = AboutRepository::getUserAbout()->first();

            if ($oldImage?->image) {
                Storage::disk('public')->delete($oldImage->fileLocation);
            }
        }

        AboutRepository::getUserAbout()->updateOrCreate(['id' => 1], $data);
    }
}
