<?php

namespace App\Services;

use App\Models\PortfolioCategory;
use App\Repositories\PortfolioCategoryRepository;
use App\Repositories\PortfolioRepository;
use Illuminate\Support\Facades\Storage;

class PortfolioCategoryService
{
    /**
     * @param  array  $attributes
     * @return mixed
     */
    public function store(array $attributes): mixed
    {
        return PortfolioCategoryRepository::getUserCategories()->create(
            $attributes + [
                'sorting' => PortfolioCategory::select('sorting')->orderBy('sorting', 'desc')->limit(
                        1
                    )->first()->sorting + 1,
            ]
        );
    }

    /**
     * @param  object  $category
     * @param  array  $attributes
     * @return void
     */
    public function update(object $category, array $attributes): void
    {
        $category->update($attributes);
    }

    /**
     * @param  array  $sorting
     * @return void
     */
    public function sort(array $sorting): void
    {
        $currentCategory = PortfolioCategory::where('sorting', $sorting['oldIndex'])->first();
        PortfolioCategory::where('sorting', $sorting['newIndex'])->update(['sorting' => $sorting['oldIndex']]);
        $currentCategory->update(['sorting' => $sorting['newIndex']]);
    }

    public function destroy($category): void
    {
        foreach (PortfolioRepository::getPortfolioByCategory($category) as $item) {
            Storage::disk('public')->delete($item->fileLocation);
        }

        $category->delete();
    }
}
