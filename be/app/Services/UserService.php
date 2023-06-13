<?php

namespace App\Services;

use App\Repositories\UserRepository;

class UserService
{
    /**
     * @param  array  $attributes
     * @return void
     */
    public function update(array $attributes): void
    {
        unset($attributes['password_current'], $attributes['password_re']);

        UserRepository::getLoggedInUser()->update(array_filter($attributes));
    }
}
