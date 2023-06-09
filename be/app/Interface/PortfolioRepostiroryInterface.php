<?php

namespace App\Interface;

interface PortfolioRepostiroryInterface
{
    public function getPortfolioByCategory(object $category);

    public function getPortfolioRandom();
}
