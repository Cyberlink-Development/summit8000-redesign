<?php

namespace App\Services\Trip;

use App\DTO\Trip\TripListDTO;
use App\Http\Resources\GlobalCollection;
use App\Http\Resources\TripListResource;
use App\Models\Travels\ActivityModel;
use App\Models\Travels\TripModel;
use Illuminate\Pagination\LengthAwarePaginator;
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
                perPage: $request->query('per_page', 8),
                page: $request->query('page', 1),
            )
            ->appends($request->query());

        // Flatten all trips across activities
        // $allTrips = $trips->flatMap(fn($a) => $a->trips)->values();

        // $tripList = $allTrips->paginate(
        //     perPage: (int) $request->query('per_page', 8),
        //     page: (int) $request->query('page', 1),
        // );

        // $paginator = $this->paginate($allTrips, $page, "/api/trips/{$parent}");

        // return new TripListDTO(
        //     template: 'trip-list',
        //     hero: $this->buildHero($parent),
        //     items: $this->formatItems($paginator->items()),
        //     seo: $this->buildSeo($parent),
        //     meta: $this->buildMeta($paginator),
        //     links: $this->buildLinks($paginator),
        // );

        return new GlobalCollection(
            resourceData: new TripListResource(
                tripType: $tripType,
                trips: $trips,
            ),
            paginator: $trips,
        );
    }

    public function category($slug, int $page = 1)
    {
        $activity = ActivityModel::where('uri', $slug)
            ->with(['trips' => function ($query) {
                $query->select(
                    'cl_trip_details.id',
                    'cl_trip_details.trip_title',
                    'cl_trip_details.sub_title',
                    'cl_trip_details.uri',
                    'cl_trip_details.thumbnail',
                    'cl_trip_details.thumbnail_alt',
                    'cl_trip_details.duration',
                    'cl_trip_details.max_altitude',
                    'cl_trip_details.group_size',
                    'cl_trip_details.trip_grade',
                    'cl_trip_details.price',
                    'cl_trip_details.discount',
                    'cl_trip_details.route',
                    'cl_trip_details.best_season',
                    'cl_trip_details.ordering'
                )
                ->where('cl_trip_details.status', '1')
                ->orderBy('cl_trip_details.ordering', 'asc');
            }])
            ->firstOrFail();

        $paginator = $this->paginate($activity->trips, $page, "/api/trip-category/{$slug}");

        return new TripListDTO(
            template: 'trip-list',
            hero: $this->buildHeroFromActivity($activity),
            items: $this->formatItems($paginator->items()),
            seo: [
                'meta_title'       => $activity->title . ' | Summit 8000',
                'meta_description' => $activity->meta_description,
                'og_title'         => $activity->title . ' — Summit 8000',
                'og_description'   => $activity->meta_description,
                'og_image'         => $activity->banner ?? $activity->thumbnail,
                'canonical_url'    => "https://summit8000.com/trip-category/{$slug}",
                'robots'           => 'index, follow',
            ],
            meta: $this->buildMeta($paginator),
            links: $this->buildLinks($paginator),
        );
    }

    // ----------------------------------------------------------------
    // Helpers
    // ----------------------------------------------------------------

    protected function paginate($items, int $page, string $basePath): LengthAwarePaginator
    {
        $collection = collect($items);
        $total      = $collection->count();
        $slice      = $collection->forPage($page, $this->perPage)->values();

        return new LengthAwarePaginator(
            $slice,
            $total,
            $this->perPage,
            $page,
            ['path' => $basePath]
        );
    }

    protected function formatItems(array $trips): array
    {
        return array_map(function ($trip) {
            $trip = (object) $trip;
            return [
                'slug'  => $trip->uri,
                'tag'   => $trip->max_altitude . ' · ' . $trip->best_season,
                'title' => $trip->trip_title,
                'price' => '$' . number_format((float) preg_replace('/[^0-9.]/', '', $trip->price)),
                'href'  => '/trip/' . $trip->uri,
                'attributes' => [
                    ['label' => 'duration', 'text' => $trip->duration . ' days'],
                    ['label' => 'group',    'text' => $trip->group_size . ' climbers max'],
                    ['label' => 'level',    'text' => $trip->trip_grade . ' level'],
                ],
                'thumbnail' => [
                    'url' => $trip->thumbnail ?? '/images/placeholder-thumbnail.webp',
                    'alt' => $trip->thumbnail_alt ?? $trip->trip_title,
                ],
                'cta' => [
                    'label' => 'Book',
                    'href'  => '/book/' . $trip->uri,
                    'type'  => 'internal',
                ],
            ];
        }, $trips);
    }

    protected function buildMeta(LengthAwarePaginator $p): array
    {
        return [
            'current_page' => $p->currentPage(),
            'per_page'     => $p->perPage(),
            'total'        => $p->total(),
            'last_page'    => $p->lastPage(),
            'from'         => $p->firstItem() ?? 0,
            'to'           => $p->lastItem() ?? 0,
            'has_more'     => $p->hasMorePages(),
        ];
    }

    protected function buildLinks(LengthAwarePaginator $p): array
    {
        $base = $p->path();
        return [
            'self'  => $base . '?page=' . $p->currentPage(),
            'next'  => $p->hasMorePages() ? $base . '?page=' . ($p->currentPage() + 1) : null,
            'prev'  => $p->currentPage() > 1 ? $base . '?page=' . ($p->currentPage() - 1) : null,
            'first' => $base . '?page=1',
            'last'  => $base . '?page=' . $p->lastPage(),
        ];
    }

    protected function buildHero(string $parent): array
    {
        // Static or fetched from a settings/page model if you have one
        return [
            'banner'      => ['url' => '/images/hero-trips.jpg', 'alt' => '8000m Expeditions — Summit 8000'],
            'caption'     => '8000m Expeditions',
            'title'       => 'Climb the World\'s Highest Peaks',
            'description' => 'Expert-guided expeditions to all fourteen 8000m summits. Small teams, seasoned Sherpa guides, and full logistical support from Kathmandu to the summit.',
            'breadcrumb'  => [
                'previous' => ['label' => 'Home', 'href' => '/', 'type' => 'internal'],
                'current'  => ['label' => '8000m Peaks'],
            ],
        ];
    }

    protected function buildHeroFromActivity($activity): array
    {
        return [
            'banner'      => ['url' => $activity->banner ?? '/images/hero-trips.jpg', 'alt' => $activity->banner_alt ?? $activity->title],
            'caption'     => $activity->sub_title ?? '',
            'title'       => $activity->title,
            'description' => $activity->excerpt ?? '',
            'breadcrumb'  => [
                'previous' => ['label' => 'Home', 'href' => '/', 'type' => 'internal'],
                'current'  => ['label' => $activity->title],
            ],
        ];
    }

    protected function buildSeo(string $parent): array
    {
        return [
            'meta_title'       => '8000m Expeditions | Himalayan Peak Climbing — Summit 8000',
            'meta_description' => 'Book expert-guided expeditions to Everest, K2, Annapurna and all 8000m peaks. Small teams, full logistics, seasoned Sherpa guides.',
            'og_title'         => '8000m Expeditions — Summit 8000',
            'og_description'   => 'Expert-guided climbs to the world\'s highest peaks. Everest, K2, Annapurna and beyond.',
            'og_image'         => '/images/trips-og.webp',
            'canonical_url'    => 'https://summit8000.com/trip',
            'robots'           => 'index, follow',
            'robots_txt_extras' => null,
            'schema' => [
                '@context'    => 'https://schema.org',
                '@type'       => 'ItemList',
                'name'        => '8000m Expeditions',
                'url'         => 'https://summit8000.com/trip',
                'description' => 'Expert-guided expeditions to all fourteen 8000m Himalayan peaks',
            ],
        ];
    }
}
