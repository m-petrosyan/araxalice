<?php

namespace App\Repositories;

use App\Interface\PortfolioRepostiroryInterface;

class PortfolioRepository implements PortfolioRepostiroryInterface
{
    /**
     * @param  object  $category
     * @return mixed
     */
    public static function getPortfolioByCategory(object $category): mixed
    {
        return $category->portfolio()->get();
    }

    /**
     * @return mixed
     */
}
