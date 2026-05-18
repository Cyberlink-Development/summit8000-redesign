<?php

namespace App\Services\Trip;

use App\DTO\Trip\TripDetailDTO;
use App\Models\Travels\TripModel;
use Illuminate\Support\Collection;

class TripDetailService
{
    public function get($slug)
    {
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
        ])
        ->where('uri', $slug)
        ->where('status', '1')
        ->firstOrFail();

        $relatedTrips = $this->resolveRelatedTrips($trip);

        return new TripDetailDTO(
            hero:           $this->buildHero($trip),
            breadcrumb:     $this->buildBreadcrumb($trip),
            title:          $this->buildTitle($trip),
            nav_items:      $this->buildNavItems($trip),
            related_blogs:  $this->buildRelatedBlogs(),
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

    private function buildHero(TripModel $trip): array
    {
        return [
            'title'     => $trip->trip_title,
            'caption'   => $trip->caption,
            'sub_title' => $trip->sub_title,
            'items'     => $this->col($trip->banners)->map(fn($item) => [
                'thumbnail' => [
                    'url' => $item->thumbnail,
                    'alt' => $item->thumbnail_alt,
                ],
                'caption' => $item->caption,
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
            'meta_title'       => $trip->seo?->meta_title       ?? $trip->trip_title,
            'meta_description' => $trip->seo?->meta_description ?? null,
            'og_title'         => $trip->seo?->og_title         ?? null,
            'og_description'   => $trip->seo?->og_description   ?? null,
            'og_image'         => $trip->seo?->og_image         ?? null,
            'canonical_url'    => $trip->seo?->canonical_url    ?? null,
            'robots'           => $trip->seo?->robots           ?? 'index, follow',
            'schema'           => $trip->seo?->schema           ?? null,
            'sitemap'          => [
                'include'          => true,
                'priority'         => 0.9,
                'change_frequency' => 'monthly',
            ],
        ];
    }

    private function buildRelatedBlogs(): array
    {
        // Placeholder — wire up BlogModel queries when ready
        return [
            'title' => 'Related Blogs',
            'cta'   => [
                'href'  => '/blog',
                'label' => 'View all articles',
                'type'  => 'internal',
            ],
            'items' => [],
        ];
    }

    // ─────────────────────────────────────────────
    // nav_items (the big nested section)
    // ─────────────────────────────────────────────

    private function buildNavItems(TripModel $trip): array
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
            'comparison'         => $this->buildComparison($trip),
            'faq'                => $this->buildFaq($trip),
        ];
    }

    // ─────────────────────────────────────────────
    // nav_items Section Builders
    // ─────────────────────────────────────────────

    private function buildTripFacts(TripModel $trip): array
    {
        $destinations = $this->col($trip->destinations);
        $activities   = $this->col($trip->activities);

        return [
            'items' => [
                ['label' => 'Duration',        'value' => $trip->duration  ? $trip->duration . ' Days' : null],
                ['label' => 'Trip Grade',       'value' => $trip->trip_grade],
                ['label' => 'Country',          'value' => $trip->country],
                ['label' => 'Maximum Altitude', 'value' => $trip->max_altitude],
                ['label' => 'Group Size',       'value' => $trip->group_size],
                ['label' => 'Starts',           'value' => optional($destinations->first())->title],
                ['label' => 'Ends',             'value' => optional($destinations->last())->title],
                ['label' => 'Activities',       'value' => $activities->pluck('title')->implode(' / ') ?: null],
                ['label' => 'Best Time',        'value' => $trip->best_season],
            ],
        ];
    }

    private function buildHighlights(TripModel $trip): array
    {
        return [
            'title'       => 'Highlights',
            'items'       => $this->col($trip->highlights)->pluck('title')->toArray(),
            'description' => $trip->trip_excerpt,
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
        $gallery = $this->col($trip->gallery);

        return [
            'title' => 'Photo Gallery',
            'items' => $gallery->map(fn($item) => [
                'slug'      => 'gallery-' . $item->id,
                'thumbnail' => [
                    'url' => $item->thumbnail,
                    'alt' => $item->caption,
                ],
                'caption' => $item->caption,
            ])->values()->toArray(),
            'video' => $gallery->filter(fn($item) => !empty($item->video_url))->map(fn($item) => [
                'slug'      => 'gallery-video-' . $item->id,
                'thumbnail' => [
                    'url' => $item->thumbnail,
                    'alt' => $item->caption,
                ],
                'video_url' => $item->video_url,
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
        $destinations = $this->col($trip->destinations);

        return [
            'title'  => 'Day-by-Day Itinerary',
            'starts' => optional($destinations->first())->title,
            'ends'   => optional($destinations->last())->title,
            'items'  => $this->col($trip->itineraries)->map(fn($item) => [
                'slug'        => 'detail-day-' . $item->id,
                'day'         => $item->days,
                'title'       => $item->title,
                'description' => $item->content,
                'info'        => [
                    ['label' => 'Max Alt',   'value' => $item->max_altitude],
                    ['label' => 'Meals',     'value' => $item->meals],
                    ['label' => 'Stay',      'value' => $item->accommodation],
                    ['label' => 'Transport', 'value' => $item->transportation],
                ],
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
            'title'       => 'Route Map & Elevation',
            'description' => 'A visual guide to your journey.',
            'thumbnail'   => [
                'url' => $trip->route_map,
                'alt' => $trip->trip_title . ' Route Map',
            ],
            'altitude_chart' => [
                'title'     => $trip->trip_title . ' — Elevation Progression',
                'thumbnail' => [
                    'url' => $trip->elevation_chart,
                    'alt' => $trip->trip_title . ' Elevation Chart',
                ],
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
            'title'     => 'Dates & Availability',
            'sub_title' => 'Select Departure Dates',
            'months'    => $schedules->isNotEmpty()
                ? $schedules
                    ->groupBy(fn($item) => \Carbon\Carbon::parse($item->start_date)->format('M Y'))
                    ->map(fn($dates, $monthLabel) => [
                        'label' => $monthLabel,
                        'dates' => $dates->map(fn($item) => [
                            'slug'          => 'avail-date-' . $item->id,
                            'start_date'    => \Carbon\Carbon::parse($item->start_date)->format('d M, Y'),
                            'end_date'      => \Carbon\Carbon::parse($item->end_date)->format('d M, Y'),
                            'status'        => $item->status,
                            'current_price' => 'US$' . number_format((float) $item->price),
                            'old_price'     => 'US$' . number_format((float) $item->old_price),
                            'cta'           => [
                                'href'  => '/book',
                                'label' => 'Book',
                                'type'  => 'internal',
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

    private function buildComparison(TripModel $trip): array
    {
        return [
            'caption' => 'Trek Comparison',
            'title'   => 'How ' . $trip->trip_title . ' Compares',
            'items'   => $this->col($trip->comparisons)->map(fn($item) => [
                'label'         => $item->label,
                'duration'      => $item->duration,
                'max_altitude'  => $item->max_altitude,
                'difficulty'    => $item->difficulty,
                'price_from'    => '$' . number_format((float) $item->price_from),
                'iconic_factor' => $item->iconic_factor,
                'cta'           => [
                    'type'  => $item->cta_type,
                    'label' => $item->cta_label,
                    'href'  => $item->cta_href,
                ],
            ])->values()->toArray(),
        ];
    }

    private function buildFaq(TripModel $trip): array
    {
        return [
            'caption' => 'Common Questions',
            'title'   => 'Frequently Asked Questions',
            'items'   => $this->col($trip->faqs)->map(fn($faq) => [
                'slug'        => 'faq-' . $faq->id,
                'title'       => $faq->question,
                'description' => $faq->answer,
            ])->values()->toArray(),
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
