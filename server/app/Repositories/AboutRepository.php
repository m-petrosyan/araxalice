<?php

namespace App\Repositories;

use App\Interface\AboutRepositoryInterface;
use App\Models\About;

class AboutRepository implements AboutRepositoryInterface
{
    /**
     * @return mixed
     */
    public static function getAboutFirst(): mixed
    {
        return About::first();
    }

    /**
     * @return mixed
     */
    public static function getUserAbout(): mixed
    {
        return auth()->user()->about();
    }
}
