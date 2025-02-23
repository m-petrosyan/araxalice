<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class PortfolioService extends ImageService
{

    protected string $dir = 'portfolio/';

    /**
     * @param  int  $categoryId
     * @param  array  $attribues
     * @return void
     */
    public function create(int $categoryId, array $attribues): void
    {
        foreach ($attribues['item'] as $item) {
            $file = $item['file'];
            $data = [];

            $originalImage = $this->resize($file);
            $filename = $this->saveFile($file, $this->dir, $originalImage);

            if (isset($item['rotation'])) {
                $this->rotateImage($filename, +$item['rotation']);
            }

            $data['file'] = $filename;
            $data['portfolio_category_id'] = $categoryId;
            $data['title'] = $item['title'] ?? null;

            auth()->user()->portfolio()->create($data);
        }
    }

    /**
     * @param $filename
     * @param $rotation
     * @return void
     */
    private function rotateImage($filename, $rotation): void
    {
        $imagePath = public_path('storage/'.$this->dir.$filename);
        $image = Image::make($imagePath);
        $image->rotate(-$rotation);
        $image->save($imagePath);
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
