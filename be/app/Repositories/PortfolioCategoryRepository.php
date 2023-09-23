<?php

namespace App\Repositories;

use App\Interface\PortfolioCategoryInterface;
use App\Models\PortfolioCategory;

class PortfolioCategoryRepository implements PortfolioCategoryInterface
{
    /**
     * @return mixed
     */
    public static function getAll(): mixed
    {
        return PortfolioCategory::orderBy('sorting', 'desc')->get();
    }

    /**
     * @return mixed
     */
    public static function getLastCategory(): mixed
    {
        return PortfolioCategory::select('sorting')->orderBy('sorting', 'desc')->first();
    }

    /**
     * @return mixed
     */
    public static function getUserCategories(): mixed
    {
        return auth()->user()->portfolioCategory();
    }

    /**
     * @param  int|null  $category
     * @return mixed
     */
    public static function getByCategory(int|null $category): mixed
    {
        return PortfolioCategory::when($category, function ($query) use ($category) {
            return $query->where('id', $category);
        })->get()->load('portfolio');
    }

    /**
     * @return mixed
     */
    public static function getRandomCategory(): mixed
    {
        return PortfolioCategory::inRandomOrder()->whereHas('portfolio')->with('portfolio');
    }
}
