<?php

namespace App\Services;

class UserService
{
    /**
     * @param  array  $attributes
     * @return void
     */
    public function update(array $attributes): void
    {
        auth()->user()->update($attributes);
    }
}
