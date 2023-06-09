<?php

namespace App\Repositories;

use App\Interface\PortfolioRepostiroryInterface;
use App\Models\Portfolio;

class PortfolioRepository implements PortfolioRepostiroryInterface
{
    /**
     * @param  object  $category
     * @return mixed
     */
    public function getPortfolioByCategory(object $category): mixed
    {
        return $category->portfolio()->get();
    }

    /**
     * @return mixed
     */
    public function getPortfolioRandom(): mixed
    {
        return Portfolio::inRandomOrder();
    }
}
