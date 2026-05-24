<?php

namespace App\Services\Trip;

use app\Models\PageSlug;
use App\Models\Travels\TripModel;
use App\Http\Resources\GlobalCollection;
use App\Http\Resources\TripDetailResource;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class TripDetailService
{
    public function handle(PageSlug $pageRoute, Request $request): GlobalCollection
    {
        $tripSlug = $pageRoute->sluggable;
        $tripSlug['path'] = $pageRoute->slug;
        $trip = $tripSlug->load([
            'activities',
            'itineraries',
            'faqs',
            'costincludes',
            'costexcludes',
            'gears',
            'relatedtrips',
            'schedules',
            'seo',
            'relatedblogs',
            'slugs',
        ])
        ->where('status', '1')
        ->where('id', $tripSlug->id) 
        ->firstOrFail();

        $relatedTrips = $this->resolveRelatedTrips($trip);

        return new GlobalCollection(
            resourceData: new TripDetailResource(
                trip:         $trip,
                relatedTrips: $relatedTrips,
            ),
        );
    }

    private function resolveRelatedTrips(TripModel $trip): Collection
    {
        if ($trip->relatedtrips->isNotEmpty()) {
            // return TripModel::with('destinations')
            //     ->whereIn('id', $relatedTripsId)
            //     ->where('status', '1')
            //     ->take(3)
            //     ->get();
            return $trip->relatedtrips
            ->where('status', '1')
            ->take(3)
            ->values()
            ->load('destinations');

        }

        return TripModel::with('destinations')
            ->where('uri', '!=', $trip->uri)
            ->where('status', '1')
            ->orderBy('ordering', 'desc')
            ->take(3)
            ->get();
    }
}