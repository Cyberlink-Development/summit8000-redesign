<?php

namespace App\Services\Collections;

use App\Http\Resources\GlobalCollection;
use App\Models\PageSlug;
use App\Models\Travels\TripModel;
use App\DTO\Pages\TripItemDTO;
use Illuminate\Http\Request;

class TripCollectionService
{
    public function handle(PageSlug $pageRoute, Request $request)
    {
        $tripType = $pageRoute->sluggable;

        $tripIds = $tripType->trips()->pluck('cl_trip_details.id');

        $trips = TripModel::whereIn('id', $tripIds)
            ->select(
                'id',
                'trip_title',
                'sub_title',
                'uri',
                'thumbnail',
                'thumbnail_alt',
                'duration',
                'max_altitude',
                'group_size',
                'trip_grade',
                'price',
                'discount',
                'route',
                'best_season',
                'ordering'
            )
            ->where('status', '1')
            ->orderBy('ordering', 'asc')
            ->paginate(
                perPage: (int) $request->query('per_page', 8),
                page:    (int) $request->query('page', 1),
            );

        return new GlobalCollection(
            resourceData: TripItemDTO::collect($trips->items()),
            paginator: $trips,
        );
    }
}