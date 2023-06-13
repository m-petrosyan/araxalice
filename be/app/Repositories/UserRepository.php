<?php

namespace App\Repositories;

use App\Interface\UserRepositoryInterface;
use Illuminate\Contracts\Auth\Authenticatable;


class UserRepository implements UserRepositoryInterface
{
    /**
     * @return Authenticatable
     */
    public static function getLoggedInUser(): Authenticatable
    {
        return auth()->user();
    }
}
