<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserUpdateRequest;
use App\Http\Resources\User\UserResource;
use App\Services\UserService;
use Illuminate\Http\Response;


class UserController extends Controller
{
    protected UserService $userService;

    /**
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Display the specified resource.
     * @return UserResource
     */
    public function auth(): UserResource
    {
        return new UserResource(auth()->user());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserUpdateRequest $request
     * @return Response
     */
    public function update(UserUpdateRequest $request): Response
    {
        $this->userService->update($request->validated());

        return response()->noContent();
    }
}
