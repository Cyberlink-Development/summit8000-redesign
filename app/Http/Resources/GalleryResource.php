<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\DTO\Pages\GalleryPageDTO;

class GalleryResource extends JsonResource
{
    public function __construct(
        public mixed $page,
        public mixed $items,
    ) {
        parent::__construct($page);
    }

    public function toArray(Request $request): array
    {
        return GalleryPageDTO::fromModel(
            page: $this->page,
            items: $this->items
        )->toArray();
      
    }
}

