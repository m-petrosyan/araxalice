<?php

namespace App\Services;

class AboutService
{
    public function storeOrUpdate(array $attributes): void
    {
        auth()->user()->about()->updateOrCreate(['id' => 1], $attributes);
    }
}
