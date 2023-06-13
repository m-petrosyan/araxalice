<?php

namespace App\Interface;

interface PortfolioCategoryInterface
{
    public static function getAll();

    public static function getUserCategories();

    public static function getByCategory(int|null $category);
}
