<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Portfolio\PortfolioCreateRequest;
use App\Http\Requests\Portfolio\PortfolioGetRequest;
use App\Http\Requests\Portfolio\PortfolioUpdateRequest;
use App\Http\Resources\Portfolio\PortfolioCategoryGroupCollection;
use App\Http\Resources\Portfolio\PortfolioCetegoryGroupResource;
use App\Http\Resources\Portfolio\PortfolioCollection;
use App\Models\Portfolio;
use App\Models\PortfolioCategory;
use App\Services\PortfolioService;
use Illuminate\Http\Response;

class PortfolioController extends Controller
{
    protected PortfolioService $portfolioService;

    public function __construct(PortfolioService $portfolioService)
    {
        $this->portfolioService = $portfolioService;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  PortfolioGetRequest  $request
     * @return PortfolioCategoryGroupCollection
     */
    public function index(PortfolioGetRequest $request): PortfolioCategoryGroupCollection
    {
        return new PortfolioCategoryGroupCollection(
            PortfolioCategory::when($request->category, function ($query) use ($request) {
                return $query->where('id', $request->category);
            })->get()->load('portfolio')
        );
    }

    /**
     * @param  PortfolioGetRequest  $request
     * @return PortfolioCollection
     */
    public function randomImages(PortfolioGetRequest $request): PortfolioCollection
    {
        return new PortfolioCollection(Portfolio::inRandomOrder()->paginate($request->validated()['limit'] ?? 20));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  PortfolioCreateRequest  $request
     * @param  PortfolioCategory  $portfolioCategory
     * @return Response
     */
    public function store(PortfolioCreateRequest $request, PortfolioCategory $portfolioCategory): Response
    {
        $this->portfolioService->create($portfolioCategory->id, $request->validated());

        return response()->noContent();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  PortfolioUpdateRequest  $request
     * @param  Portfolio  $portfolio
     * @return Response
     */
    public function update(PortfolioUpdateRequest $request, Portfolio $portfolio): Response
    {
        $this->portfolioService->update($portfolio, $request->validated());

        return response()->noContent();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Portfolio  $portfolio
     * @return Response
     */
    public function destroy(Portfolio $portfolio): Response
    {
        $this->portfolioService->destroy($portfolio);

        return response()->noContent();
    }
}
