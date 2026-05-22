<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class GlobalCollection extends JsonResource
{
    public function __construct(
        public mixed $resourceData,
        public LengthAwarePaginator $paginator,
    ) {
        parent::__construct($resourceData);
    }

    public function toArray(Request $request): array
    {
        $response = [
            'data' => $this->resourceData,

            'meta' => [
                'current_page' => $this->paginator->currentPage(),
                'per_page' => $this->paginator->perPage(),
                'total' => $this->paginator->total(),
                'last_page' => $this->paginator->lastPage(),
                'from' => $this->paginator->firstItem(),
                'to' => $this->paginator->lastItem(),
                'has_more' => $this->paginator->hasMorePages(),
            ],

            'links' => [
                'self' => $this->paginator->url(
                    $this->paginator->currentPage()
                ),

                'next' => $this->paginator->nextPageUrl(),

                'prev' => $this->paginator->previousPageUrl(),

                'first' => $this->paginator->url(1),

                'last' => $this->paginator->url(
                    $this->paginator->lastPage()
                ),
            ],
        ];

        return $response;
    }
}