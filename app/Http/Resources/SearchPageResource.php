<?php

namespace App\Http\Resources;

use App\DTO\Pages\SearchPageDTO;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SearchPageResource extends JsonResource
{
    public function __construct(
        public readonly string $keyword,
        public readonly array  $items,
    ) {
        parent::__construct(null);
    }

    public function toArray(Request $request): array
    {
        return SearchPageDTO::fromData(
            keyword: $this->keyword,
            items:   $this->items,
        )->toArray();
    }
}