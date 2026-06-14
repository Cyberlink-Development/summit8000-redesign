<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class GlobalCollection extends JsonResource
{
    public function __construct(
        public mixed $resourceData,
        public ?LengthAwarePaginator $paginator = null,
    ) {
        parent::__construct($resourceData);
    }

    public function toArray(Request $request): array
    {
        if ($this->paginator === null) {
            return [
                'data'  => $this->resourceData,
                'meta'  => [],
                'links' => [],
            ];
        }

        $path     = $request->query('path');
        $keyword  = $request->query('keyword');
        $perPage  = $this->paginator->perPage();
        $lastPage = $this->paginator->lastPage();
        $current  = $this->paginator->currentPage();

        $buildUrl = fn(int $page) => $path !== null
            ? "/collection?path={$path}&per_page={$perPage}&page={$page}"
            : "/search?keyword={$keyword}&per_page={$perPage}&page={$page}";

        return [
            'data' => $this->resourceData,

            'meta' => [
                'current_page' => $current,
                'per_page'     => $perPage,
                'total'        => $this->paginator->total(),
                'last_page'    => $lastPage,
                'from'         => $this->paginator->firstItem(),
                'to'           => $this->paginator->lastItem(),
                'has_more'     => $this->paginator->hasMorePages(),
            ],

            'links' => [
                'self'  => $buildUrl($current),
                'next'  => $current < $lastPage ? $buildUrl($current + 1) : null,
                'prev'  => $current > 1         ? $buildUrl($current - 1) : null,
                'first' => $buildUrl(1),
                'last'  => $buildUrl($lastPage),
            ],
        ];
    }
}