<?php

namespace App\Services;

use App\Repositories\PortfolioCategoryRepository;
use App\Repositories\PortfolioRepository;
use Illuminate\Support\Facades\Storage;

class PortfolioCategoryService
{
    protected PortfolioCategoryRepository $portfolioCategoryRepository;
    protected PortfolioRepository $portfolioRepository;

    public function __construct(
        PortfolioCategoryRepository $portfolioCategoryRepository,
        PortfolioRepository $portfolioRepository
    ) {
        $this->portfolioCategoryRepository = $portfolioCategoryRepository;
        $this->portfolioRepository = $portfolioRepository;
    }

    /**
     * @param  array  $attributes
     * @return mixed
     */
    public function store(array $attributes): mixed
    {
        return $this->portfolioCategoryRepository->getUserCategories()->create($attributes);
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
        foreach ($this->portfolioRepository->getPortfolioByCategory($category) as $item) {
            Storage::disk('public')->delete($item->fileLocation);
        }

        $category->delete();
    }
}
