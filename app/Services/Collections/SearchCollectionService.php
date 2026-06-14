<?php

namespace App\Services\Collections;

use App\DTO\Pages\SearchItemDTO;
use App\Http\Resources\GlobalCollection;
use App\Http\Resources\SearchPageResource;
use App\Models\Posts\PostModel;
use App\Models\Travels\TripModel;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class SearchCollectionService
{
    public function handle(Request $request): GlobalCollection
    {
        $keyword = trim($request->query('keyword', ''));
        $perPage = (int) $request->query('per_page', 8);
        $page    = (int) $request->query('page', 1);

        $posts = $keyword
            ? PostModel::where('post_title', 'LIKE', "%{$keyword}%")
                ->where('status', '1')
                ->with('slugs')
                ->get()
            : collect();

        $trips = $keyword
            ? TripModel::where('trip_title', 'LIKE', "%{$keyword}%")
                ->where('status', '1')
                ->with('slugs')
                ->get()
            : collect();

        // SearchItemDTO is the single mapping source for both models
        $allItems = SearchItemDTO::collect($posts->all(), $trips->all());

        $total  = count($allItems);
        $sliced = array_slice($allItems, ($page - 1) * $perPage, $perPage);

        $paginator = new LengthAwarePaginator(
            items:       $sliced,
            total:       $total,
            perPage:     $perPage,
            currentPage: $page,
            options:     ['path' => '/search', 'query' => $request->query()],
        );

        // Resource wraps paginated items through SearchPageDTO
        // Only page 1 needs the full wrapper (hero/query/seo) for SSR
        // Page 2+ returns flat items so useInfiniteList flatMap works correctly
        if ($page === 1) {
            $resourceData = (new SearchPageResource(
                keyword: $keyword,
                items:   $paginator->items(),
            ))->toArray(request());
        } else {
            $resourceData = $paginator->items();
        }

        return new GlobalCollection(
            resourceData: $resourceData,
            paginator:    $paginator,
        );
    }
}