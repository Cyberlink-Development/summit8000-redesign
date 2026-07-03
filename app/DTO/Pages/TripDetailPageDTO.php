<?php

namespace App\DTO\Pages;

use App\DTO\Common\SeoDTO;
use App\Models\Team\TeamModel;
use App\Models\Travels\TripModel;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class TripDetailPageDTO
{
    public function __construct(
        public readonly string  $template,
        public readonly ?string $slug,
        public readonly array   $hero,
        public readonly array   $breadcrumb,
        public readonly array   $title,
        public readonly array   $nav_items,
        public readonly array   $related_blogs,
        public readonly array   $booking_widget,
        public readonly ?SeoDTO $seo,
    ) {}

    public static function fromModel(TripModel $trip, Collection $relatedTrips): self
    {
        return new self(
            template:       $trip->template ?? null,
            slug:           $trip->slugs()->first()?->slug,
            hero:           self::buildHero($trip),
            breadcrumb:     self::buildBreadcrumb($trip),
            title:          self::buildTitle($trip),
            nav_items:      self::buildNavItems($trip, $relatedTrips),
            related_blogs:  self::buildRelatedBlogs($trip),
            booking_widget: self::buildBookingWidget($trip),
            seo:            SeoDTO::fromModel($trip),
        );
    }

    public function toArray(): array
    {
        return [
            'template'       => $this->template,
            'slug'           => $this->slug,
            'hero'           => $this->hero,
            'breadcrumb'     => $this->breadcrumb,
            'title'          => $this->title,
            'nav_items'      => $this->nav_items,
            'related_blogs'  => $this->related_blogs,
            'booking_widget' => $this->booking_widget,
            'seo'            => $this->seo?->toArray(),
        ];
    }

    // ─────────────────────────────────────────────
    // Helpers
    // ─────────────────────────────────────────────

    private static function col(mixed $relation): Collection
    {
        return $relation instanceof Collection ? $relation : collect();
    }

    // ─────────────────────────────────────────────
    // Builders
    // ─────────────────────────────────────────────

    private static function buildHero(TripModel $trip): array
    {
        return [
            'title'     => $trip->trip_title,
            'caption'   => $trip->caption,
            'sub_title' => $trip->sub_title,
            'items'     => self::col($trip->gears)->take(3)->map(fn($item) => [
                'thumbnail' => [
                    'url' => asset('uploads/original/' . $item->thumbnail),
                    'alt' => $item->title,
                ],
                'caption' => $item->title,
            ])->values()->toArray(),
        ];
    }

    private static function buildBreadcrumb(TripModel $trip): array
    {
        $firstActivity = optional(self::col($trip->activities)->first());

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

    private static function buildTitle(TripModel $trip): array
    {
        return [
            'text'          => $trip->trip_title,
            'slug'          => $trip->uri,
            'save_badge'    => $trip->save_badge,
            'current_price' => 'US$' . number_format((float) $trip->price),
            'old_price'     => 'US$' . number_format((float) $trip->old_price),
            'ratings' => [
                [
                    'value' => 1530,
                    'stars' => 5,
                    'label' => 'TripAdvisor',
                    'href'  => 'https://www.tripadvisor.com',
                    'type'  => 'external',
                    'slug'  => 'trip-advisor',
                ],
                [
                    'value' => 400,
                    'stars' => 3,
                    'label' => 'Google',
                    'href'  => 'https://www.google.com',
                    'type'  => 'external',
                    'slug'  => 'google',
                ],
                [
                    'value' => 106,
                    'stars' => 4,
                    'label' => 'TrustPilot',
                    'href'  => 'https://www.trustpilot.com',
                    'type'  => 'external',
                    'slug'  => 'trust-pilot',
                ],
            ],
        ];
    }

    private static function buildRelatedBlogs(TripModel $trip): array
    {
        return [
            'title' => 'Related Blogs',
            'cta'   => [
                'href'  => '/blog',
                'label' => 'View all articles',
                'type'  => 'internal',
            ],
            'items' => self::col($trip->relatedblogs)->take(3)->map(fn($item) => [
                'thumbnail' => [
                    'url' => $item->page_thumbnail
                        ? asset('uploads/original/' . $item->page_thumbnail)
                        : null,
                    'alt' => $item->post_title,
                ],
                'published_at' => $item->post_date
                    ? Carbon::parse($item->post_date)->format('Y-m-d')
                    : null,
                'title'   => $item->post_title,
                'excerpt' => strip_tags($item->post_excerpt),
                'cta'     => [
                    'href'  => '/' . $item->uri,
                    'label' => 'Read More',
                    'type'  => 'internal',
                ],
            ])->values()->toArray(),
        ];
    }

    private static function buildBookingWidget(TripModel $trip): array
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
            'dates' => self::col($trip->schedules)->map(fn($item) => [
                'slug'  => 'date-' . $item->id,
                'value' => $item->start_date,
            ])->values()->toArray(),
            'cta' => [
                'primary'   => ['label' => 'Book Now',    'href' => '/book' . optional($trip->slugs()->first())->slug, 'type' => 'internal'],
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

    // ─────────────────────────────────────────────
    // nav_items
    // ─────────────────────────────────────────────

    private static function buildNavItems(TripModel $trip, Collection $relatedTrips): array
    {
        return [
            'overview'           => $trip->trip_overview,
            'trip_facts'         => self::buildTripFacts($trip),
            'highlights'         => self::buildHighlights($trip),
            'guides'             => self::buildGuides($trip),
            'gallery'            => self::buildGallery($trip),
            'outline_itinerary'  => self::buildOutlineItinerary($trip),
            'reels'              => self::buildReels($trip),
            'detailed_itinerary' => self::buildDetailedItinerary($trip),
            'assistance_banner'  => self::buildAssistanceBanner(),
            'cost'               => self::buildCost($trip),
            'route_map'          => self::buildRouteMap($trip),
            'addons'             => self::buildAddons($trip),
            'reviews'            => self::buildReviews($trip),
            'availability'       => self::buildAvailability($trip),
            'info_accordion'     => self::buildInfoAccordion($trip),
            'comparison'         => self::buildComparison($trip, $relatedTrips),
            'faq'                => self::buildFaq($trip),
        ];
    }

    private static function buildTripFacts(TripModel $trip): array
    {
        $destinations = trip_destination_title($trip->id);

        return [
            'items' => [
                ['label' => 'Duration',        'value' => $trip->duration ? $trip->duration . ' Days' : null],
                ['label' => 'Trip Grade',       'value' => grade_message_trek($trip->trip_grade)],
                ['label' => 'Country',          'value' => $destinations],
                ['label' => 'Maximum Altitude', 'value' => $trip->max_altitude],
                ['label' => 'Group Size',       'value' => $trip->group_size],
                ['label' => 'Starts',           'value' => $trip->route],
                ['label' => 'Ends',             'value' => ''],
                ['label' => 'Activities',       'value' => $trip->walking_per_day],
                ['label' => 'Best Time',        'value' => $trip->best_season],
            ],
        ];
    }

    private static function buildHighlights(TripModel $trip): array
    {
        return [
            'title'       => 'Highlights',
            'items'       => [],
            'description' => $trip->trip_content,
            'extra'       => [
                [
                    'heading' => 'Gears List',
                    'body'    => $trip->trip_highlight,
                ]
            ],
        ];
    }

    private static function buildGuides(TripModel $trip): array
    {
        $guides = TeamModel::where('category', 3)
            ->where('status', 1)
            ->inRandomOrder()
            ->take(3)
            ->get();
            // dd($guides);

        return [
            'caption'     => 'Your Team',
            'title'       => 'Meet Your Expert Guides',
            'description' => 'Every guide is certified, experienced, and passionate about sharing the magic of the Himalayas.',
            'items'       => $guides->map(fn($guide) => [
                'slug'        => $guide->uri,
                'title'       => $guide->name,
                'href'        => $guide->uri,
                'sub_title'   => $guide->position,
                'description' => $guide->brief,
                'thumbnail' => [
                    'url' => asset('uploads/team/' . $guide->thumbnail),
                    'alt' => $guide->name,
                ],

                // Optional stats section
                'stats' => array_filter([
                    $guide->experience ? [
                        'value' => $guide->experience,
                        'label' => 'Experience'
                    ] : null,

                    $guide->languages ? [
                        'value' => $guide->languages,
                        'label' => 'Languages'
                    ] : null,

                    $guide->certifications ? [
                        'value' => $guide->certifications,
                        'label' => 'Certifications'
                    ] : null,
                ]),
            ])->values()->toArray(),
        ];
    }

    private static function buildGallery(TripModel $trip): array
    {
        $gallery = self::col($trip->gears);

        return [
            'title' => 'Photo Gallery',
            'items' => $gallery->skip(3)->map(fn($item) => [
                'slug'      => 'gallery-' . $item->id,
                'thumbnail' => [
                    'url' => asset('uploads/original/' . $item->thumbnail),
                    'alt' => $item->title,
                ],
                'caption' => $item->title,
            ])->values()->toArray(),
            'video' => $trip->trip_video ? [
                [
                    'slug' => 'gallery-video-' . $trip->id,

                    'thumbnail' => [
                        'url' => asset('uploads/thumbnails/' . $trip->thumbnail),
                        'alt' => $trip->thumbnail_alt ,
                    ],

                    'video_url' => 'https://www.youtube.com/embed/' . $trip->trip_video,
                ]
            ] : [],
        ];
    }

    private static function buildOutlineItinerary(TripModel $trip): array
    {
        return [
            'title' => 'Outline Itinerary',
            'items' => self::col($trip->itineraries)->map(fn($item) => [
                'day'          => $item->days,
                'title'        => $item->title,
                'max_altitude' => $item->max_altitude,
            ])->values()->toArray(),
        ];
    }

    private static function buildReels(TripModel $trip): array
    {
        return [
            'caption' => 'SummitNest Moments',
            'title'   => 'Travel Reels & Stories',
            'cta'     => [
                'label' => 'Discover More',
                'href'  => '/reels?' . $trip->uri,
                'type'  => 'internal',
            ],
            'items' => self::col($trip->reels)->map(fn($reel) => [
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

    private static function buildDetailedItinerary(TripModel $trip): array
    {
        $destination = trip_destination_title($trip->id);

        return [
            'title'  => 'Day-by-Day Itinerary',
            'starts' => $destination,
            'ends'   => $destination,
            'items'  => self::col($trip->itineraries)->map(fn($item) => [
                'slug'        => 'detail-day-' . $item->id,
                'day'         => 'Day ' . str_pad($item->days, 2, '0', STR_PAD_LEFT),
                'title'       => $item->title,
                'description' => strip_tags($item->content),
                'info'        => array_values(array_filter([
                    ['label' => 'Max Alt',   'value' => $item->max_altitude],
                    ['label' => 'Meals',     'value' => $item->meals],
                    ['label' => 'Stay',      'value' => $item->max_altitude],
                    ['label' => 'Duration',  'value' => $item->duration],
                    ['label' => 'Transport', 'value' => $item->distance],
                ], fn($info) => !empty($info['value']))),
            ])->values()->toArray(),
        ];
    }

    private static function buildAssistanceBanner(): array
    {
        return [
            'title'       => 'Need Assistance? Reach Out!',
            'description' => 'Have questions or need trip planning help? Contact us anytime — our travel experts are here to assist you!',
            'cta'         => [
                'label' => 'Customize Trip',
                'href'  => '/plan-expedition',
                'type'  => 'internal',
            ],
        ];
    }

    private static function buildCost(TripModel $trip): array
    {
        return [
            'caption'  => 'Transparency First',
            'title'    => 'Cost Includes & Excludes',
            'included' => self::col($trip->costincludes)->pluck('title')->toArray(),
            'excluded' => self::col($trip->costexcludes)->pluck('title')->toArray(),
        ];
    }

    private static function buildRouteMap(TripModel $trip): array
    {
        return [
            'title'       => 'Route Map & Elevation',
            'description' => 'A visual guide to your journey through the legendary Khumbu region.',
            'thumbnail'   => [
                'url' => $trip->trip_map
                    ? asset('uploads/original/' . $trip->trip_map)
                    : null,
                'alt' => $trip->tripmap_alt ?: $trip->trip_title . ' Route Map',
            ],
            'altitude_chart' => [
                'title'     => $trip->trip_title,
                'thumbnail' => [
                    'url' => $trip->trip_chart
                        ? asset('uploads/original/' . $trip->trip_chart)
                        : null,
                    'alt' => $trip->trip_title . ' Altitude Chart',
                ],
                'items'  => self::col($trip->itineraries)->map(fn($item) => [
                    'slug'        => 'detail-day-' . $item->id,
                    'days'         => $item->days,
                    'altitude'       => $item->max_altitude,
                ])->values()->toArray(),
            ],
        ];
    }

    private static function buildAddons(TripModel $trip): array
    {
        return [
            'title'       => 'Optional Add-Ons',

            'description' => 'Customise your adventure with these handpicked enhancements.',

            'items'       => self::col($trip->addons)->map(fn($item) => [

                'thumbnail' => [
                    'url' => $item->thumbnail
                        ? asset('uploads/thumbnails/' . $item->thumbnail)
                        : null,

                    'alt' => $item->thumbnail_alt ?: $item->title,
                ],

                'title'       => $item->title,

                'description' => $item->description,

                'price'       => $item->price,

            ])->values()->toArray(),
        ];
    }

    private static function buildReviews(TripModel $trip): array
    {
        $reviews = self::col($trip->reviews);
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
            'platforms' => self::col($trip->review_platforms)->map(fn($p) => [
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
                'tags'     => self::col($review->tags)->pluck('label')->toArray(),
            ])->values()->toArray(),
        ];
    }

    private static function buildAvailability(TripModel $trip): array
    {
        $schedules = self::col($trip->schedules);

        return [
            'title'     => 'Dates & Availability',
            'sub_title' => 'Select Departure Dates',
            'months'    => $schedules->isNotEmpty()
                ? $schedules->groupBy(fn($item) =>
                    Carbon::parse($item->start_date)->format('M Y')
                )->map(fn($dates, $monthLabel) => [
                    'label' => $monthLabel,
                    'dates' => $dates->map(fn($item) => [
                        'slug'          => 'avail-date-' . $item->id,
                        'start_date'    => Carbon::parse($item->start_date)->format('d M, Y'),
                        'end_date'      => Carbon::parse($item->end_date)->format('d M, Y'),
                        'status'        => $item->availability ?: 'Available',
                        'current_price' => $item->price ? 'US$' . number_format((float) $item->price) : null,
                        'old_price'     => null,
                        'cta'           => [
                            'href'  => '/book'. optional($trip->slugs()->first())->slug,
                            'label' => 'Book',
                            'type'  => 'internal',
                        ],
                    ])->values()->toArray(),
                ])->values()->toArray()
                : [],
        ];
    }

    private static function buildInfoAccordion(TripModel $trip): array
    {
        return [
            'caption' => 'Detailed Information',
            'title'   => 'Everything You Need to Know',
            'description' => $trip->trip_excerpt,
            'items'   => self::col($trip->info_sections)->map(fn($section) => [
                'question' => $section->question,
                'answer'   => self::col($section->answers)->map(fn($ans) => [
                    'title'       => $ans->title,
                    'description' => $ans->description,
                ])->values()->toArray(),
            ])->values()->toArray(),
        ];
    }

    private static function buildComparison(TripModel $trip, Collection $relatedTrips): array
    {
        $items = [[
            'label'         => '★' . $trip->trip_title ,
            'duration'      => $trip->duration ? $trip->duration . ' Days' : null,
            'max_altitude'  => $trip->max_altitude,
            'difficulty'    => grade_message_trek($trip->trip_grade),
            'price_from'    => $trip->price ? '$' . number_format((float) $trip->price) : null,
            'iconic_factor' => '5/5',
            'cta'           => ['type' => 'internal', 'label' => '—', 'href' => '#'],
        ]];

        foreach ($relatedTrips->take(2) as $item) {
            $items[] = [
                'label'         => $item->trip_title,
                'duration'      => $item->duration ? $item->duration . ' Days' : null,
                'max_altitude'  => $item->max_altitude,
                'difficulty'    => grade_message_trek($item->trip_grade),
                'price_from'    => $item->price ? '$' . number_format((float) $item->price) : null,
                'iconic_factor' => '5/5',
                'cta'           => [
                    'type'  => 'internal',
                    'label' => 'View Details',
                    'href'  => optional($item->slugs()->first())->slug,
                ],
            ];
        }

        return [
            'caption' => 'Trek Comparison',
            'title'   => 'How ' . $trip->trip_title . ' Compares',
            'items'   => $items,
        ];
    }

    private static function buildFaq(TripModel $trip): array
    {
        return [
            'caption' => 'Common Questions',
            'title'   => 'Frequently Asked Questions',
            'items'   => self::col($trip->faqs)->map(fn($faq) => [
                'slug'        => 'faq-' . $faq->id,
                'title'       => $faq->title,
                'description' => strip_tags($faq->content),
            ])->values()->toArray(),
        ];
    }
}
