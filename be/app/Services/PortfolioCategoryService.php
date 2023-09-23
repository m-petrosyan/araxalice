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
                'sorting' => PortfolioCategoryRepository::getLastCategory()->sorting + 1,
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
     * @param  object  $category
     * @param  array  $sorting
     * @return void
     */
    public function sort(object $category, array $sorting): void
    {
        PortfolioCategory::where('sorting', $sorting['sorting'])->update(['sorting' => $category->sorting]);

        $category->update($sorting);
    }

    public function destroy($category): void
    {
        foreach (PortfolioRepository::getPortfolioByCategory($category) as $item) {
            Storage::disk('public')->delete($item->fileLocation);
        }

        $category->delete();
    }
}
