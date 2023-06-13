<?php

namespace App\Interface;

interface  PortfolioRepostiroryInterface
{
    public static function getPortfolioByCategory(object $category);

    public static function getPortfolioRandom();
}
