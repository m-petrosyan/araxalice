<?php

namespace App\Services;

use App\Repositories\UserRepository;

class UserService
{
    protected UserRepository $userRepository;

    /**
     * @param  UserRepository  $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param  array  $attributes
     * @return void
     */
    public function update(array $attributes): void
    {
        unset($attributes['password_current'], $attributes['password_re']);

        $this->userRepository->getLoggedInUser()->update(array_filter($attributes));
    }
}
