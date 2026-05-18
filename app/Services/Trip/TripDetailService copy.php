<?php

namespace App\Services\Trip;

use App\DTO\Trip\TripDetailDTO;
use App\Models\Travels\TripModel;

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
            'seo',
        ])
        ->where('uri', $slug)
        ->where('status', '1')
        ->firstOrFail();

        // Related trips
        $relatedTripsId = $trip->relatedtrips()->pluck('related_trip_id');
        if ($relatedTripsId->isNotEmpty()) {

            $relatedTrips = TripModel::with('destinations')
                ->whereIn('id', $relatedTripsId)
                ->where('status', '1')
                ->take(3)
                ->get();

        } else {

            $relatedTrips = TripModel::with('destinations')
                ->where('uri', '!=', $trip->uri)
                ->where('status', '1')
                ->orderBy('ordering', 'desc')
                ->take(3)
                ->get();
        }

        return new TripDetailDTO(

            hero: [
                'id' => $trip->id,
                'title' => $trip->trip_title,
                'sub_title' => $trip->sub_title,
                'uri' => $trip->uri,

                'thumbnail' => $trip->thumbnail,
                'thumbnail_alt' => $trip->thumbnail_alt,

                'banner' => $trip->banner,
                'banner_alt' => $trip->banner_alt,
            ],

            breadcrumb: [
                [
                    'label' => 'Home',
                    'href' => '/',
                ],
                [
                    'label' => optional($trip->activities->first())->title,
                    'href' => '/' . optional($trip->activities->first())->uri,
                ],
                [
                    'label' => $trip->trip_title,
                    'href' => '/trip/' . $trip->uri,
                ],
            ],

            title: [
                'title' => $trip->trip_title,
                'sub_title' => $trip->sub_title,
            ],

            nav_items: [
                'overview' => true,
                'trip_facts' => true,
                'highlights' => true,
                'outline_itinerary' => true,
                'detailed_itinerary' => true,
                'cost' => true,
                'gallery' => true,
                'faqs' => true,
            ],

            overview: [
                'excerpt' => $trip->trip_excerpt,
                'content' => $trip->trip_content,
            ],

            trip_facts: [
                'items' => [

                    [
                        'label' => 'Duration',
                        'value' => $trip->duration . ' Days',
                    ],

                    [
                        'label' => 'Trip Grade',
                        'value' => $trip->trip_grade,
                    ],

                    [
                        'label' => 'Maximum Altitude',
                        'value' => $trip->max_altitude . 'm',
                    ],

                    [
                        'label' => 'Group Size',
                        'value' => $trip->group_size,
                    ],

                    [
                        'label' => 'Accommodation',
                        'value' => $trip->accommodation,
                    ],

                    [
                        'label' => 'Meals',
                        'value' => $trip->meals,
                    ],

                    [
                        'label' => 'Best Season',
                        'value' => $trip->best_season,
                    ],

                    [
                        'label' => 'Route',
                        'value' => $trip->route,
                    ],
                ]
            ],

            highlights: [
                'title' => 'Highlights',
                'content' => $trip->trip_highlight,
            ],

            outline_itinerary: [
                'title' => 'Outline Itinerary',

                'items' => $trip->itineraries->map(function ($item) {

                    return [
                        'day' => $item->days,
                        'title' => $item->title,
                        'max_altitude' => $item->max_altitude,
                    ];

                })->values()->toArray(),
            ],

            detailed_itinerary: [
                'title' => 'Day-by-Day Itinerary',

                'starts' => optional($trip->destinations->first())->title,

                'ends' => optional($trip->destinations->first())->title,

                'items' => $trip->itineraries->map(function ($item) {

                    return [

                        'slug' => 'detail-day-' . $item->id,

                        'day' => $item->days,

                        'title' => $item->title,

                        'description' => $item->content,

                        'info' => [

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
                                'value' => $item->accommodation,
                            ],

                            [
                                'label' => 'Transport',
                                'value' => $item->transportation,
                            ],

                        ],
                    ];

                })->values()->toArray(),
            ],
            cost_includes: [
                'title' => 'Cost Includes',

                'items' => $trip->costincludes->map(function ($item) {

                    return [
                        'title' => $item->title,
                    ];

                })->values()->toArray(),
            ],

            cost_excludes: [
                'title' => 'Cost Excludes',

                'items' => $trip->costexcludes->map(function ($item) {

                    return [
                        'title' => $item->title,
                    ];

                })->values()->toArray(),
            ],

            faqs: [
                'title' => 'Frequently Asked Questions',

                'items' => $trip->faqs->map(function ($faq) {

                    return [
                        'question' => $faq->question,
                        'answer' => $faq->answer,
                    ];

                })->values()->toArray(),
            ],

            gallery: [
                'title' => 'Photo Gallery',

                'items' => $trip->gears->map(function ($item) {

                    return [
                        'title' => $item->title,
                        'image' => $item->thumbnail,
                        'video' => $item->video,
                    ];

                })->values()->toArray(),
            ],

            reviews: [],

            related_trips: [
                'title' => 'Related Trips',

                'cta' => [
                    'href' => '/trips',
                    'label' => 'View all trips',
                    'type' => 'internal',
                ],

                'items' => $relatedTrips->map(function ($item) {

                    return [

                        'thumbnail' => [
                            'url' => $item->thumbnail,
                            'alt' => $item->thumbnail_alt,
                        ],

                        'title' => $item->trip_title,

                        'sub_title' => $item->sub_title,

                        'duration' => $item->duration,

                        'price' => $item->price,

                        'cta' => [
                            'href' => '/trip/' . $item->uri,
                            'label' => 'View Details',
                            'type' => 'internal',
                        ],
                    ];

                })->values()->toArray(),
            ],

            related_blogs: [],

            booking_widget: [

                'caption' => 'Best Price Guaranteed',

                'price' => '$' . number_format($trip->price),

                'per_person' => true,

                'promo_tags' => [

                    [
                        'thumbnail' => [
                            'url' => '/images/placeholder-icon.jpg',
                            'alt' => 'exceptional-deal',
                        ],

                        'label' => 'Exceptional deal',
                    ],

                    [
                        'thumbnail' => [
                            'url' => '/images/placeholder-icon.jpg',
                            'alt' => 'kids-discount',
                        ],

                        'label' => 'Kids discount',
                    ],
                ],

                'dates' => $trip->schedules->map(function ($item) {

                    return [

                        'slug' => 'date-' . $item->id,

                        'value' => $item->start_date,
                    ];

                })->values()->toArray(),

                'cta' => [

                    'primary' => [
                        'label' => 'Book Now',
                        'href' => '/book',
                        'type' => 'internal',
                    ],

                    'secondary' => [
                        'label' => 'Inquiry Now',
                        'href' => '#',
                        'type' => 'internal',
                    ],
                ],

                'benefits' => [

                    [
                        'highlight' => 'Free cancellation',

                        'description' => 'up to 24 hours before the experience starts (local time)',
                    ],

                    [
                        'highlight' => 'Reserve Now, Pay Later',

                        'description' => '— secure your spot while staying flexible',
                    ],
                ],

                'tip' => 'Book ahead! On average, this trek is booked 21 days in advance.',
            ],

            seo: [
                'meta_title' => $trip->trip_title,
                'meta_keyword' => $trip->meta_key,
                'meta_description' => $trip->meta_description,
            ],
        );
    }
}
