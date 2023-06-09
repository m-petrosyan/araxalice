<?php

namespace App\Repositories;

use App\Interface\PortfolioCategoryInterface;
use App\Models\PortfolioCategory;

class PortfolioCategoryRepository implements PortfolioCategoryInterface
{
    /**
     * @return mixed
     */
    public function getAll(): mixed
    {
        return PortfolioCategory::get();
    }

    /**
     * @return mixed
     */
    public function getUserCategories(): mixed
    {
        return auth()->user()->portfolioCategory();
    }

    /**
     * @param  int|null  $category
     * @return mixed
     */
    public function getByCategory(int|null $category): mixed
    {
        return PortfolioCategory::when($category, function ($query) use ($category) {
            return $query->where('id', $category);
        })->get()->load('portfolio');
    }
}
