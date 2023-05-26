<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\About\AboutCreateUpdateRequest;
use App\Http\Resources\About\AboutResource;
use App\Models\About;
use App\Services\AboutService;
use Illuminate\Http\Response;

class AboutController extends Controller
{
    protected AboutService $aboutService;

    public function __construct(AboutService $aboutService)
    {
        $this->aboutService = $aboutService;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  AboutCreateUpdateRequest  $request
     * @return Response
     */
    public function storeOrUpdate(AboutCreateUpdateRequest $request): Response
    {
        $this->aboutService->storeOrUpdate($request->validated());

        return response()->noContent();
    }

    /**
     * Display the specified resource.
     *
     * @return AboutResource
     */
    public function show(): AboutResource
    {
        return new AboutResource(About::first());
    }
}
