<?php

namespace App\Http\Resources;

use App\DTO\Pages\TeamListPageDTO;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TeamListResource extends JsonResource
{
    public function __construct(
        public mixed $page,
        public mixed $leadership,
        public mixed $guides,
    ) {
        parent::__construct($page);
    }

    public function toArray(Request $request): array
    {
        return TeamListPageDTO::fromModel(
            page: $this->page,
            leadership: $this->leadership,
            guides: $this->guides,
        )->toArray();
    }
}