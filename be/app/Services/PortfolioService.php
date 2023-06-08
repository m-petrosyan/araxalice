<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

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
        $items = $attribues;

        foreach ($items['item'] as $item) {
            $title = $item['title'];
            $file = $item['file'];
           
            $originalImage = $this->resize($file);

            $filename = $this->saveFile($file, $this->dir, $originalImage);

            auth()->user()->portfolio()->create(
                ['title' => $title, 'file' => $filename, 'portfolio_category_id' => $categoryId]
            );
        }
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
