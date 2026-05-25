<?php

namespace App\Services\Home;

use App\Models\Banners\BannerModel;
use App\Models\Travels\ActivityModel;
use App\Models\Travels\TripModel;
use App\Services\AboutPageService;
use App\Services\Blog\BlogService;

class HomeService
{

   public function __construct(
        protected AboutPageService $aboutPageService,
        protected BlogService $blogService
    ) {}
  public function get(): array
{
    return [

            'hero' => $this->hero(),

            'story' => $this->story(),

            'categories' => $this->categories(),

            'featured' => $this->featured(),

            'testimonials' => $this->testimonials(),

            'why' => $this->why(),

            'packages' => $this->packages(),

            'gallery' => $this->gallery(),

            'blog' => $this->blog(),
    ];
}

    /*
    |--------------------------------------------------------------------------
    | Hero
    |--------------------------------------------------------------------------
    */

    private function hero(): ?array
    {
        $banner = BannerModel::query()
            ->where('status', 1)
            ->latest('id')
            ->first();

        if (!$banner) {
            return null;
        }

        return [
            'banner' => [
                'url' => asset('uploads/banners/'.$banner->picture),
                'alt' => $banner->picture_alt ?? $banner->title,
            ],

            'caption' => $banner->caption,

            'title' => $banner->title,

            'description' => $banner->description,

            'cta' => [
                'primary' => $this->cta(
                    $banner->link_label ?? 'Explore Expeditions',
                    $banner->link
                ),

                'secondary' => $this->cta(
                    $banner->link_secondary_label ?? 'Our Story',
                    $banner->link_secondary
                ),
            ],

            'stats' => [
                [
                    'value' => '847',
                    'label' => 'Summits Achieved',
                ],

                [
                    'value' => '26yr',
                    'label' => 'Of Excellence',
                ],

                [
                    'value' => '14',
                    'label' => 'Eight-Thousanders',
                ],

                [
                    'value' => '98%',
                    'label' => 'Safety Record',
                ],
            ],
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Story
    |--------------------------------------------------------------------------
    */

  private function story(): array
{
    // $aboutPage = $this->aboutPageService->getStorySection();
    $aboutPage = [];

    return $aboutPage->story ?? [];
}

    /*
    |--------------------------------------------------------------------------
    | Categories
    |--------------------------------------------------------------------------
    */

   private function categories(): array
{
    $expeditions = ActivityModel::query()
        ->where([
            'activity_parent' => 'expedition',
            'status' => 1,
        ])
        ->orderBy('ordering', 'asc')
        ->take(4)
        ->get();

    return [

        'caption' => 'Expedition Categories',

        'title' => 'Choose Your Summit',

        'description' => 'From high-altitude 8000m challenges to scenic Himalayan treks — an adventure calibrated for every ambition.',

        'items' => collect($expeditions)
            ->map(function ($item) {

                return [

                    'uuid' => $item->uuid ?? '',

                    'caption' => $item->sub_title ?? '',

                    'title' => $item->title ?? '',

                    'href' => $item->slugs()?->first()?->slug ,

                    'elevation' => $item->elevation ?? '',

                    'description' => $item->content ?? '',

                    'count' => (int) ($item->total_trips ?? 0),

                    'thumbnail' => [
                        'url' => $item->banner
                            ? asset('uploads/activity/' . $item->banner)
                            : '',

                        'alt' => $item->activity ?? '',
                    ],
                ];
            })
            ->values()
            ->toArray(),
    ];
}

    /*
    |--------------------------------------------------------------------------
    | Featured
    |--------------------------------------------------------------------------
    */

 private function featured(): array
{
    $bestSellerTrips = TripModel::query()
        ->where([
            'trip_of_the_month' => 1,
            'status' => 1,
        ])
        ->orderBy('ordering', 'asc')
        ->take(3)
        ->get();

    return [

        'caption' => 'Featured Expeditions',

        'title' => '2025 Season Highlights',

        'cta' => [
            'label' => 'View All Expeditions',
            'href' => '/trip',
            'type' => 'internal',
        ],

        'items' => collect($bestSellerTrips)
            ->map(function ($trip) {

                return [

                    'slug' => $trip->uri ?? '',

                    'tag' => trim(
                        ($trip->max_altitude ?? '') .
                        ($trip->best_season ? ' · ' . $trip->best_season : '')
                    ),

                    'title' => $trip->trip_title ?? '',

                    'price' => $trip->starting_price
                        ? '$' . number_format($trip->starting_price)
                        : 'On Request',

                    'href' => $trip->slugs()?->first()?->slug,

                    'attributes' => [

                        [
                            'label' => '📅',

                            'text' => $trip->duration
                                ? $trip->duration . ' days'
                                : '',
                        ],

                        [
                            'label' => '👥',

                            'text' => $trip->group_size
                                ? $trip->group_size . ' climbers max'
                                : '',
                        ],

                        [
                            'label' => '⚠',

                            'text' => $trip->difficulty
                                ?? '',
                        ],
                    ],

                    'thumbnail' => [
                        'url' => $trip->thumbnail
                            ? asset('uploads/thumbnails/'.$trip->thumbnail)
                            : asset('theme-assets/assets/trip/1.jpg'),

                        'alt' => $trip->trip_title ?? '',
                    ],

                    'cta' => [
                        'label' => 'Book',

                        'href' => '/book' . $trip->slugs()?->first()?->slug,

                        'type' => 'internal',
                    ],
                ];
            })
            ->values()
            ->toArray(),
    ];
}

    /*
    |--------------------------------------------------------------------------
    | Testimonials
    |--------------------------------------------------------------------------
    */

    private function testimonials(): array
    {
        // return $this->aboutPageService->getTestimonials();
        return [];
    }

    /*
    |--------------------------------------------------------------------------
    | Why
    |--------------------------------------------------------------------------
    */

    private function why(): array
{
    // return $this->aboutPageService->getWhySection();
    return [];
}

    /*
    |--------------------------------------------------------------------------
    | Packages
    |--------------------------------------------------------------------------
    */

    private function packages(): array
    {
        return [
            'caption' => 'Special Offers',

            'title' => 'Expedition Packages',

            'items' => [
                [
                    'slug' => 'base-camp',

                    'name' => 'Base Camp',

                    'tagline' => 'The complete experience without summit attempt',

                    'price' => '$8,500',

                    'price_label' => 'per person',

                    'cta' => [
                        'label' => 'Get Started',
                        'href' => '/packages/base-camp',
                        'type' => 'internal',
                    ],

                    'is_featured' => false,

                    'features' => [
                        'Everest Base Camp Trek (14 days)',
                        'Acclimatization rotations',
                        'All permits & TIMS card',
                    ],
                ],
            ],
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Gallery
    |--------------------------------------------------------------------------
    */

    private function gallery(): array
    {
        return [
            'caption' => 'Expedition Gallery',

            'title' => 'Moments Above the Clouds',

            'cta' => [
                'label' => 'View More',
                'href' => '/gallery',
                'type' => 'internal',
            ],

            'items' => [
                [
                    'slug' => 'gallery-1',

                    'thumbnail' => [
                        'url' => asset('/images/placeholder-thumbnail.webp'),
                        'alt' => 'Everest Summit',
                    ],
                ],

                [
                    'slug' => 'gallery-2',

                    'thumbnail' => [
                        'url' => asset('/images/placeholder-thumbnail.webp'),
                        'alt' => 'Lhotse Face',
                    ],
                ],
            ],
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Blog
    |--------------------------------------------------------------------------
    */

     private function blog(): array
    {
        return [

            'caption' => 'Inspiration & Knowledge',

            'title' => 'From the Field',

            'cta' => [
                'label' => 'View All Blogs',
                'href' => '/blog',
                'type' => 'internal',
            ],

            // 👇 pulling reusable items from BlogPageService
            'items' => $this->blogService->homeItems(),
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Helpers
    |--------------------------------------------------------------------------
    */

    private function cta(?string $label, ?string $href): ?array
    {
        if (!$label || !$href) {
            return null;
        }

        return [
            'label' => $label,

            'href' => $href,

            'type' => str_starts_with($href, 'http')
                ? 'external'
                : 'internal',
        ];
    }


}
