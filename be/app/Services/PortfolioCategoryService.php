<?php

namespace App\Services;

class PortfolioCategoryService
{
    /**
     * @param  array  $attributes
     * @return mixed
     */
    public function store(array $attributes): mixed
    {
        return auth()->user()->portfolioCategory()->create($attributes);
    }

    /**
     * @param  object  $category
     * @param  array  $attributes
     * @return void
     */
    public function update(object $category, array $attributes): void
    {
        $category->update($attributes);
    }

    public function destroy($category): void
    {
        $category->delete();
    }
}
