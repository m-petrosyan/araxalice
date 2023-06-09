<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserUpdateRequest;
use App\Http\Resources\User\UserResource;
use App\Repositories\UserRepository;
use App\Services\UserService;
use Illuminate\Http\Response;


class UserController extends Controller
{
    protected UserService $userService;
    protected UserRepository $userRepository;

    /**
     * @param  UserService  $userService
     * @param  UserRepository  $userRepository
     */
    public function __construct(UserService $userService, UserRepository $userRepository)
    {
        $this->userService = $userService;
        $this->userRepository = $userRepository;
    }

    /**
     * Display the specified resource.
     * @return UserResource
     */
    public function auth(): UserResource
    {
        return new UserResource($this->userRepository->getLoggedInUser());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UserUpdateRequest  $request
     * @return Response
     */
    public function update(UserUpdateRequest $request): Response
    {
        $this->userService->update($request->validated());

        return response()->noContent();
    }
}
