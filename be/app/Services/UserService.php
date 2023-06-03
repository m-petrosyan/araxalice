<?php

namespace App\Services;

class UserService
{
    /**
     * @param array $attributes
     * @return void
     */
    public function update(array $attributes): void
    {
        unset($attributes['password_current'], $attributes['password_re']);

        auth()->user()->update(array_filter($attributes));
    }
}
