<?php

namespace App\Services\Trip;

use App\DTO\Trip\TripListDTO;
use App\Http\Resources\GlobalCollection;
use App\Http\Resources\TripCategoryResource;
use App\Models\Travels\ActivityModel;
use App\Models\Travels\TripModel;
use Illuminate\Pagination\LengthAwarePaginator;
use app\Models\PageSlug;
use Illuminate\Http\Request;

class TripCategoryService
{
    protected int $perPage = 8;

    public function handle(PageSlug $pageRoute, Request $request)
    {
        $tripActivity = $pageRoute->sluggable;
        $tripActivity['path'] = $pageRoute->slug;

        $tripCategoryIds = $tripActivity->activityCategory()->pluck('cl_trip_activities.id');
        // dd($tripCategoryIds);

        $tripCategories = ActivityModel::whereIn('id', $tripCategoryIds)
            ->where('status', '1')
            ->orderBy('ordering', 'asc')
            ->paginate(
                perPage: $request->query('per_page', 8),
                page: $request->query('page', 1),
            )
            ->appends($request->query());

        // dd($tripCategories);

        return new GlobalCollection(
            resourceData: new TripCategoryResource(
                tripActivity: $tripActivity,
                tripCategories: $tripCategories,
            ),
            paginator: $tripCategories,
        );
    }

}
