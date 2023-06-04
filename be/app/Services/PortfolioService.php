<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class PortfolioService
{
    protected int $width = 1920;
    protected int $height = 1920;
    protected string $dir = 'portfolio/';

    /**
     * @param  int  $categoryId
     * @param  array  $attribues
     * @return void
     */
    public function create(int $categoryId, array $attribues): void
    {
        $items = $attribues;

        foreach ($items['item'] as $item) {
            $title = $item['title'];
            $file = $item['file'];

            $originalImage = Image::make($file);
            $width = $originalImage->width();
            $height = $originalImage->height();

            if ($width > $this->width || $height > $this->height) {
                $originalImage = $this->resize($originalImage);
            }

            $filename = uniqid('image_').'.'.$file->getClientOriginalExtension();

            Storage::disk('public')->put($this->dir.$filename, $originalImage->encode());

            auth()->user()->portfolio()->create(
                ['title' => $title, 'file' => $filename, 'portfolio_category_id' => $categoryId]
            );
        }
    }

    /**
     * @param  object  $originalImage
     * @return \Intervention\Image\Image
     */
    public function resize(object $originalImage): \Intervention\Image\Image
    {
        return $originalImage->resize($this->width, $this->height, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });
    }

    /**
     * @param $portfolio
     * @param $attributes
     * @return void
     */
    public function update($portfolio, $attributes): void
    {
        $portfolio->update($attributes);
    }

    /**
     * @param $portfolio
     * @return void
     */
    public function destroy($portfolio): void
    {
        Storage::disk('public')->delete($portfolio->fileLocation);

        $portfolio->delete();
    }
}
