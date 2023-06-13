<?php

namespace App\Services;

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
        return PortfolioCategoryRepository::getUserCategories()->create($attributes);
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

    public function destroy($category): void
    {
        foreach (PortfolioRepository::getPortfolioByCategory($category) as $item) {
            Storage::disk('public')->delete($item->fileLocation);
        }

        $category->delete();
    }
}
