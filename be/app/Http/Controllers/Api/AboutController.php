<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\About\AboutCreateUpdateRequest;
use App\Http\Resources\About\AboutResource;
use App\Repositories\AboutRepository;
use App\Services\AboutService;
use Illuminate\Http\Response;

class AboutController extends Controller
{
    protected AboutService $aboutService;
    protected AboutRepository $aboutRepository;

    public function __construct(AboutService $aboutService, AboutRepository $aboutRepository)
    {
        $this->aboutService = $aboutService;
        $this->aboutRepository = $aboutRepository;
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
        return new AboutResource($this->aboutRepository->getAboutFirst());
    }
}
