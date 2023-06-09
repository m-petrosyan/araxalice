<?php

namespace App\Repositories;

use App\Interface\AboutRepositoryInterface;
use App\Models\About;

class AboutRepository implements AboutRepositoryInterface
{
    /**
     * @return mixed
     */
    public function getAboutFirst(): mixed
    {
        return About::first();
    }

    /**
     * @return mixed
     */
    public function getUserAbout(): mixed
    {
        return auth()->user()->about();
    }
}
