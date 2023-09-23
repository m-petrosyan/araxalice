<?php

namespace App\Http\Resources\Category;

use App\Http\Resources\Portfolio\PortfolioCollection;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PortfolioCategoryGroupResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
//        dd($request->all()['limit']);

        return [
            'category' => $this->name,
            'description' => $this->description,
            'data' => new PortfolioCollection($this->portfolio),
        ];
    }
}
