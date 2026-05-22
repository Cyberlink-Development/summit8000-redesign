<?php

namespace App\Services\Trip;

use App\DTO\Trip\TripDetailDTO;
use App\Models\Travels\TripModel;
use Illuminate\Support\Collection;
use App\Models\PageSlug;

class TripDetailService
{
    public function get($slug)
    {
        $slugData = PageSlug::where('slug', '/' . ltrim($slug, '/'))->firstOrFail();

        $trip = TripModel::with([
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
        ->where('id', $slugData->sluggable_id)
        ->where('status', '1')->firstOrFail();

        // dd($trip, $trip->seo->toArray());

        $relatedTrips = $this->resolveRelatedTrips($trip);

        return new TripDetailDTO(
            template:       'trip-detail',
            slug:           $this->buildSlug($trip),
            hero:           $this->buildHero($trip),
            breadcrumb:     $this->buildBreadcrumb($trip),
            title:          $this->buildTitle($trip),
            nav_items:      $this->buildNavItems($trip,$relatedTrips),
            related_blogs:  $this->buildRelatedBlogs($trip),
            booking_widget: $this->buildBookingWidget($trip),
            seo:            $this->buildSeo($trip),
        );
    }

    // ─────────────────────────────────────────────
    // Null-safe collection helper
    // Returns the relation as a Collection, or an
    // empty Collection if the relation is null/unloaded.
    // Use this everywhere instead of $trip->relation directly.
    // ─────────────────────────────────────────────

    private function col(mixed $relation): Collection
    {
        if ($relation instanceof Collection) {
            return $relation;
        }

        return collect();
    }

    // ─────────────────────────────────────────────
    // Related Trips Resolution
    // ─────────────────────────────────────────────

    private function resolveRelatedTrips(TripModel $trip): Collection
    {
        $relatedTripsId = $this->col($trip->relatedtrips)->pluck('related_trip_id');

        if ($relatedTripsId->isNotEmpty()) {
            return TripModel::with('destinations')
                ->whereIn('id', $relatedTripsId)
                ->where('status', '1')
                ->take(3)
                ->get();
        }

        return TripModel::with('destinations')
            ->where('uri', '!=', $trip->uri)
            ->where('status', '1')
            ->orderBy('ordering', 'desc')
            ->take(3)
            ->get();
    }

    // ─────────────────────────────────────────────
    // Top-level DTO Builders
    // ─────────────────────────────────────────────

    private function buildSlug(TripModel $trip): ?string
    {
        return $trip->slugs()->first()?->slug;
    }

    private function buildHero(TripModel $trip): array
    {
        return [
            'title'     => $trip->trip_title,
            'caption'   => $trip->caption,
            'sub_title' => $trip->sub_title,
            'items' => $this->col($trip->gears)->take(3)->map(fn($item) => [
                'thumbnail' => [
                    'url' => asset('uploads/original/' . $item->thumbnail),
                    'alt' => $item->title,
                ],

                'caption' => $item->title,

            ])->values()->toArray(),
        ];
    }

    private function buildBreadcrumb(TripModel $trip): array
    {
        $firstActivity = optional($this->col($trip->activities)->first());

        return [
            'previous' => [
                'label' => $firstActivity->title,
                'href'  => '/' . $firstActivity->uri,
                'type'  => 'internal',
            ],
            'current' => [
                'label' => $trip->trip_title,
            ],
        ];
    }

    private function buildTitle(TripModel $trip): array
    {
        return [
            'text'          => $trip->trip_title,
            'slug'          => $trip->uri,
            'save_badge'    => $trip->save_badge,
            'current_price' => 'US$' . number_format((float) $trip->price),
            'old_price'     => 'US$' . number_format((float) $trip->old_price),
        ];
    }

    private function buildSeo(TripModel $trip): array
    {
        return [

            'meta_title' => $trip->seo?->meta_title
                ?? $trip->trip_title,

            'meta_description' => $trip->seo?->meta_description
                ?? null,

            'og_title' => $trip->seo?->og_title
                ?? $trip->trip_title,

            'og_description' => $trip->seo?->og_description
                ?? null,

            'og_image' => $trip->seo?->og_image
                ? asset(
                    'uploads/original/' .
                    $trip->seo->og_image
                )
                : null,

            'canonical_url' => $trip->seo?->canonical_url
                ?? url('/' . $trip->uri),

            'robots' => $trip->seo?->robots
                ?? 'index,follow',

            'robots_txt_extras' => null,

            'schema' => $trip->seo?->schema_data ?? null,

            'sitemap' => [

                'include' => (bool) (
                    $trip->seo?->in_sitemap ?? true
                ),

                'priority' => (float) (
                    $trip->seo?->sitemap_priority ?? 0.9
                ),

                'change_frequency' => $trip->seo?->change_frequency
                    ?? 'monthly',
            ],
        ];
    }

    private function buildRelatedBlogs(TripModel $trip): array
    {
        return [

            'title' => 'Related Blogs',

            'cta' => [
                'href' => '/blog',

                'label' => 'View all articles',

                'type' => 'internal',
            ],

            'items' => $this->col($trip->relatedblogs)

                ->take(3)

                ->map(fn($item) => [

                    'thumbnail' => [
                        'url' => $item->page_thumbnail
                            ? asset(
                                'uploads/original/' .
                                $item->page_thumbnail
                            )
                            : null,

                        'alt' => $item->post_title,
                    ],

                    'published_at' => optional(
                        $item->post_date
                    )
                        ? \Carbon\Carbon::parse(
                            $item->post_date
                        )->format('Y-m-d')
                        : null,

                    'title' => $item->post_title,

                    'excerpt' => strip_tags(
                        $item->post_excerpt
                    ),

                    'cta' => [
                        'href' => '/' . $item->uri,

                        'label' => 'Read More',

                        'type' => 'internal',
                    ],

                ])

                ->values()

                ->toArray(),
        ];
    }

    // ─────────────────────────────────────────────
    // nav_items (the big nested section)
    // ─────────────────────────────────────────────

    private function buildNavItems(TripModel $trip, Collection $relatedTrips): array
    {
        return [
            'overview'           => $trip->trip_excerpt,
            'trip_facts'         => $this->buildTripFacts($trip),
            'highlights'         => $this->buildHighlights($trip),
            'guides'             => $this->buildGuides($trip),
            'gallery'            => $this->buildGallery($trip),
            'outline_itinerary'  => $this->buildOutlineItinerary($trip),
            'reels'              => $this->buildReels($trip),
            'detailed_itinerary' => $this->buildDetailedItinerary($trip),
            'assistance_banner'  => $this->buildAssistanceBanner(),
            'cost'               => $this->buildCost($trip),
            'route_map'          => $this->buildRouteMap($trip),
            'addons'             => $this->buildAddons($trip),
            'reviews'            => $this->buildReviews($trip),
            'availability'       => $this->buildAvailability($trip),
            'info_accordion'     => $this->buildInfoAccordion($trip),
            'comparison'         => $this->buildComparison($trip,$relatedTrips),
            'faq'                => $this->buildFaq($trip),
        ];
    }

    // ─────────────────────────────────────────────
    // nav_items Section Builders
    // ─────────────────────────────────────────────

    private function buildTripFacts(TripModel $trip): array
    {
        $destinations = trip_destination_title($trip->id);

        return [
            'items' => [
                ['label' => 'Duration',        'value' => $trip->duration  ? $trip->duration . ' Days' : null],
                ['label' => 'Trip Grade',       'value' => grade_message_trek($trip->trip_grade)],
                ['label' => 'Country',          'value' => $destinations],
                ['label' => 'Maximum Altitude', 'value' => $trip->max_altitude],
                ['label' => 'Group Size',       'value' => $trip->group_size],
                ['label' => 'Starts',           'value' => $trip->route],
                ['label' => 'Ends',             'value' => ''],
                ['label' => 'Activities',       'value' => $trip->walking_per_day ],
                ['label' => 'Best Time',        'value' => $trip->best_season],
            ],
        ];
    }

    private function buildHighlights(TripModel $trip): array
    {
        return [
            'title'       => 'Highlights',
            'items'       => [],
            'description' => $trip->trip_content,
            'extra'       => $this->col($trip->highlight_extras)->map(fn($item) => [
                'heading' => $item->heading,
                'body'    => $item->body,
            ])->values()->toArray(),
        ];
    }

    private function buildGuides(TripModel $trip): array
    {
        return [
            'caption'     => 'Your Team',
            'title'       => 'Meet Your Expert Guides',
            'description' => 'Every guide is certified, experienced, and passionate about sharing the magic of the Himalayas.',
            'items'       => $this->col($trip->guides)->map(fn($guide) => [
                'slug'        => $guide->uri,
                'title'       => $guide->name,
                'href'        => '/team/' . $guide->uri,
                'sub_title'   => $guide->sub_title,
                'description' => $guide->bio,
                'thumbnail'   => [
                    'url' => $guide->thumbnail,
                    'alt' => $guide->name,
                ],
                'stats' => $this->col($guide->stats)->map(fn($stat) => [
                    'value' => $stat->value,
                    'label' => $stat->label,
                ])->values()->toArray(),
            ])->values()->toArray(),
        ];
    }

    private function buildGallery(TripModel $trip): array
    {
        $gallery = $this->col($trip->gears);

        return [
            'title' => 'Photo Gallery',

            'items' => $gallery
                ->skip(3)
                ->map(fn($item) => [

                    'slug' => 'gallery-' . $item->id,

                    'thumbnail' => [
                        'url' => asset(
                            'uploads/original/' . $item->thumbnail
                        ),

                        'alt' => $item->title,
                    ],

                    'caption' => $item->title,

                ])->values()->toArray(),

            'video' => $gallery
                ->filter(fn($item) => !empty($item->video))
                ->take(1)
                ->map(fn($item) => [

                    'slug' => 'gallery-video-' . $item->id,

                    'thumbnail' => [
                        'url' => asset(
                            'uploads/original/' . $item->thumbnail
                        ),

                        'alt' => $item->title,
                    ],

                    'video_url' => $item->video,

                ])->values()->toArray(),
        ];
    }

    private function buildOutlineItinerary(TripModel $trip): array
    {
        return [
            'title' => 'Outline Itinerary',
            'items' => $this->col($trip->itineraries)->map(fn($item) => [
                'day'          => $item->days,
                'title'        => $item->title,
                'max_altitude' => $item->max_altitude,
            ])->values()->toArray(),
        ];
    }

    private function buildReels(TripModel $trip): array
    {
        return [
            'caption' => 'SummitNest Moments',
            'title'   => 'Travel Reels & Stories',
            'cta'     => [
                'label' => 'Discover More',
                'href'  => '/reels?' . $trip->uri,
                'type'  => 'internal',
            ],
            'items' => $this->col($trip->reels)->map(fn($reel) => [
                'title'     => $reel->title,
                'sub_title' => $reel->sub_title,
                'thumbnail' => [
                    'url' => $reel->thumbnail,
                    'alt' => $reel->title,
                ],
                'video' => [
                    'href' => $reel->video_url,
                    'type' => 'external',
                ],
            ])->values()->toArray(),
        ];
    }

    private function buildDetailedItinerary(TripModel $trip): array
    {
        $destination = trip_destination_title($trip->id);

        return [

            'title' => 'Day-by-Day Itinerary',

            'starts' => $destination,

            'ends' => $destination,

            'items' => $this->col($trip->itineraries)
                ->map(fn($item) => [

                    'slug' => 'detail-day-' . $item->id,

                    'day' => 'Day ' . str_pad($item->days, 2, '0', STR_PAD_LEFT),

                    'title' => $item->title,

                    'description' => strip_tags($item->content),

                    'info' => array_values(array_filter([

                        [
                            'label' => 'Max Alt',
                            'value' => $item->max_altitude,
                        ],

                        [
                            'label' => 'Meals',
                            'value' => $item->meals,
                        ],

                        [
                            'label' => 'Stay',
                            'value' => $item->max_altitude,
                        ],

                        [
                            'label' => 'Duration',
                            'value' => $item->duration,
                        ],

                        [
                            'label' => 'Transport',
                            'value' => $item->distance,
                        ],

                    ], fn($info) => !empty($info['value']))),

                ])->values()->toArray(),
        ];
    }

    private function buildAssistanceBanner(): array
    {
        return [
            'title'       => 'Need Assistance? Reach Out!',
            'description' => 'Have questions or need trip planning help? Contact us anytime — our travel experts are here to assist you!',
            'cta'         => [
                'label' => 'Customize Trip',
                'href'  => '/customize-trip',
                'type'  => 'internal',
            ],
        ];
    }

    private function buildCost(TripModel $trip): array
    {
        return [
            'caption'  => 'Transparency First',
            'title'    => 'Cost Includes & Excludes',
            'included' => $this->col($trip->costincludes)->pluck('title')->toArray(),
            'excluded' => $this->col($trip->costexcludes)->pluck('title')->toArray(),
        ];
    }

    private function buildRouteMap(TripModel $trip): array
    {
        return [

            'title' => 'Route Map & Elevation',

            'description' => 'A visual guide to your journey through the legendary Khumbu region.',

            'thumbnail' => [
                'url' => $trip->route_map
                    ? asset('uploads/original/' . $trip->route_map)
                    : null,

                'alt' => $trip->tripmap_alt
                    ?: $trip->trip_title . ' Route Map',
            ],

            'altitude_chart' => [

                'title' => '',

                'thumbnail' => [],
            ],
        ];
    }

    private function buildAddons(TripModel $trip): array
    {
        return [
            'title'       => 'Optional Add-Ons',
            'description' => 'Customise your adventure with these handpicked enhancements.',
            'items'       => $this->col($trip->addons)->map(fn($item) => [
                'thumbnail'   => [
                    'url' => $item->thumbnail,
                    'alt' => $item->title,
                ],
                'title'       => $item->title,
                'description' => $item->description,
                'price'       => $item->price,
            ])->values()->toArray(),
        ];
    }

    private function buildReviews(TripModel $trip): array
    {
        $reviews = $this->col($trip->reviews);
        $total   = $reviews->count();

        return [
            'caption'        => 'Verified Travellers',
            'title'          => 'Voices from Base Camp',
            'overall_rating' => $total > 0 ? round($reviews->avg('rating'), 1) : null,
            'total_reviews'  => $total,
            'breakdown'      => $total > 0
                ? $reviews->groupBy('rating')->map(fn($group, $stars) => [
                    'stars'   => (int) $stars,
                    'percent' => round(($group->count() / $total) * 100),
                ])->values()->toArray()
                : [],
            'platforms' => $this->col($trip->review_platforms)->map(fn($p) => [
                'name'  => $p->name,
                'score' => $p->score,
            ])->values()->toArray(),
            'items' => $reviews->map(fn($review) => [
                'slug'      => 'review-' . $review->id,
                'avatar'    => strtoupper(substr($review->name ?? '?', 0, 2)),
                'name'      => $review->name,
                'thumbnail' => [
                    'url' => $review->avatar ?? '/images/placeholder-avatar.jpg',
                    'alt' => $review->name,
                ],
                'meta'     => $review->meta,
                'rating'   => $review->rating,
                'platform' => $review->platform,
                'text'     => $review->body,
                'tags'     => $this->col($review->tags)->pluck('label')->toArray(),
            ])->values()->toArray(),
        ];
    }

    private function buildAvailability(TripModel $trip): array
    {
        $schedules = $this->col($trip->schedules);

        return [

            'title' => 'Dates & Availability',

            'sub_title' => 'Select Departure Dates',

            'months' => $schedules->isNotEmpty()

                ? $schedules

                    ->groupBy(fn($item) =>
                        \Carbon\Carbon::parse($item->start_date)
                            ->format('M Y')
                    )

                    ->map(fn($dates, $monthLabel) => [

                        'label' => $monthLabel,

                        'dates' => $dates->map(fn($item) => [

                            'slug' => 'avail-date-' . $item->id,

                            'start_date' => \Carbon\Carbon::parse(
                                $item->start_date
                            )->format('d M, Y'),

                            'end_date' => \Carbon\Carbon::parse(
                                $item->end_date
                            )->format('d M, Y'),

                            'status' => $item->availability
                                ?: 'Available',

                            'current_price' => $item->price
                                ? 'US$' . number_format((float) $item->price)
                                : null,

                            'old_price' => null,

                            'cta' => [
                                'href' => '/book',

                                'label' => 'Book',

                                'type' => 'internal',
                            ],

                        ])->values()->toArray(),

                    ])->values()->toArray()

                : [],
        ];
    }

    private function buildInfoAccordion(TripModel $trip): array
    {
        return [
            'caption' => 'Detailed Information',
            'title'   => 'Everything You Need to Know',
            'items'   => $this->col($trip->info_sections)->map(fn($section) => [
                'question' => $section->question,
                'answer'   => $this->col($section->answers)->map(fn($ans) => [
                    'title'       => $ans->title,
                    'description' => $ans->description,
                ])->values()->toArray(),
            ])->values()->toArray(),
        ];
    }

    private function buildComparison(
        TripModel $trip,
        Collection $relatedTrips
    ): array {

        $items = [];

        // Current Trip
        $items[] = [

            'label' => $trip->trip_title . ' ★ You Are Here',

            'duration' => $trip->duration
                ? $trip->duration . ' Days'
                : null,

            'max_altitude' => $trip->max_altitude,

            'difficulty' => grade_message_trek(
                $trip->trip_grade
            ),

            'price_from' => $trip->price
                ? '$' . number_format((float) $trip->price)
                : null,

            'iconic_factor' => '5/5',

            'cta' => [
                'type' => 'internal',

                'label' => '—',

                'href' => '#',
            ],
        ];

        // Related Trips
        foreach ($relatedTrips->take(2) as $item) {

            $items[] = [

                'label' => $item->trip_title,

                'duration' => $item->duration
                    ? $item->duration . ' Days'
                    : null,

                'max_altitude' => $item->max_altitude,

                'difficulty' => grade_message_trek(
                    $item->trip_grade
                ),

                'price_from' => $item->price
                    ? '$' . number_format((float) $item->price)
                    : null,

                'iconic_factor' => '5/5',

                'cta' => [
                    'type' => 'link',

                    'label' => 'View Details',

                    'href' => '/' . optional(
                        $item->slugs()->first()
                    )->slug,
                ],
            ];
        }

        return [

            'caption' => 'Trek Comparison',

            'title' => 'How ' . $trip->trip_title . ' Compares',

            'items' => $items,
        ];
    }

    private function buildFaq(TripModel $trip): array
    {
        return [

            'caption' => 'Common Questions',

            'title' => 'Frequently Asked Questions',

            'items' => $this->col($trip->faqs)

                ->map(fn($faq) => [

                    'slug' => 'faq-' . $faq->id,

                    'title' => $faq->title,

                    'description' => strip_tags($faq->content),

                ])

                ->values()

                ->toArray(),
        ];
    }

    private function buildBookingWidget(TripModel $trip): array
    {
        return [
            'caption'    => 'Best Price Guaranteed',
            'price'      => 'US$' . number_format((float) $trip->price),
            'per_person' => true,

            'promo_tags' => [
                [
                    'thumbnail' => ['url' => '/images/placeholder-icon.jpg', 'alt' => 'exceptional-deal'],
                    'label'     => 'Exceptional deal',
                ],
                [
                    'thumbnail' => ['url' => '/images/placeholder-icon.jpg', 'alt' => 'kids-discount'],
                    'label'     => 'Kids discount',
                ],
            ],

            'dates' => $this->col($trip->schedules)->map(fn($item) => [
                'slug'  => 'date-' . $item->id,
                'value' => $item->start_date,
            ])->values()->toArray(),

            'cta' => [
                'primary'   => ['label' => 'Book Now',    'href' => '/book', 'type' => 'internal'],
                'secondary' => ['label' => 'Inquiry Now', 'href' => '#',     'type' => 'internal'],
            ],

            'benefits' => [
                [
                    'highlight'   => 'Free cancellation',
                    'description' => 'up to 24 hours before the experience starts (local time)',
                ],
                [
                    'highlight'   => 'Reserve Now, Pay Later',
                    'description' => '— secure your spot while staying flexible',
                ],
            ],

            'tip' => 'Book ahead! On average, this trek is booked 21 days in advance.',
        ];
    }
}
