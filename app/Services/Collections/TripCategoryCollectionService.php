<?php

namespace App\Services\Collections;

use App\Http\Resources\GlobalCollection;
use App\Models\PageSlug;
use App\Models\Travels\ActivityModel;
use App\DTO\Pages\TripCategoryItemDTO;
use Illuminate\Http\Request;

class TripCategoryCollectionService
{
    public function handle(PageSlug $pageRoute, Request $request)
    {
        $tripActivity = $pageRoute->sluggable;

        $tripCategoryIds = $tripActivity->activityCategory()->pluck('cl_trip_activities.id');

        $tripCategories = ActivityModel::whereIn('id', $tripCategoryIds)
            ->where('status', '1')
            ->orderBy('ordering', 'asc')
            ->paginate(
                perPage: (int) $request->query('per_page', 8),
                page:    (int) $request->query('page', 1),
            );

        return new GlobalCollection(
            resourceData: TripCategoryItemDTO::collect($tripCategories->items()),
            paginator: $tripCategories,
        );
    }
}