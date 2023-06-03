<?php

namespace App\Http\Resources\Portfolio;

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
        return [
            'category' => $this->name,
            'data' => new PortfolioCollection($this->portfolio)
        ];
    }
}
