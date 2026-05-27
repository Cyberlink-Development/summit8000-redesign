<?php

namespace App\Services\Trip;

use App\Http\Resources\GlobalCollection;
use App\Http\Resources\TripListResource;
use App\Models\Travels\TripModel;
use app\Models\PageSlug;
use Illuminate\Http\Request;

class TripListService
{
    protected int $perPage = 8;

    public function handle(PageSlug $pageRoute, Request $request)
    {
        $tripType = $pageRoute->sluggable;
        $tripType['path'] = $pageRoute->slug;

        $tripIds = $tripType->trips()->pluck('cl_trip_details.id');

        $trips = TripModel::whereIn('id', $tripIds)
            ->where('status', '1')
            ->orderBy('ordering', 'asc')
            ->paginate(
                perPage: $request->query('per_page', 8),
                page: $request->query('page', 1),
            )
            ->appends($request->query());

        return new GlobalCollection(
            resourceData: new TripListResource(
                tripType: $tripType,
                trips: $trips,
            ),
            paginator: $trips,
        );
    }
}
