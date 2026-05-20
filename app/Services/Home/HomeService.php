<?php

namespace App\Services\Home;

use App\Models\Banners\BannerModel;
use App\Services\AboutPageService;

class HomeService
{

   public function __construct(
        protected AboutPageService $aboutPageService
    ) {}
    public function get(): array
    {
        return [
            'success' => true,

            'message' => 'Home page fetched successfully',

            'data' => [
                'data' => [

                    'hero' => $this->hero(),

                    'story' => $this->story(),

                    'categories' => $this->categories(),

                    'featured' => $this->featured(),

                    'testimonials' => $this->testimonials(),

                    'why' => $this->why(),

                    'packages' => $this->packages(),

                    'gallery' => $this->gallery(),

                    'blog' => $this->blog(),
                ],

                'meta' => [],
            ],
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
                'url' => asset($banner->picture),
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
        return [
            'caption' => 'Step Into Our Story',

            'title' => 'Born in the Shadow of Everest',

            'description' => 'Our Sherpa guides don\'t just know the mountains — they are the mountains. Third-generation climbers whose families have summited Everest more times than any other team on Earth. When you climb with Summit 8000, you climb with living legend.',

            'guides' => [
                'title' => '48 Sherpa Guides',

                'sub_title' => 'Combined 380+ Everest summits',

                'items' => [
                    [
                        'slug' => 'sher-guide-1',

                        'avatar' => 'AB',

                        'thumbnail' => [
                            'url' => asset('/images/placeholder-thumbnail.webp'),
                            'alt' => 'Sherpa Guide',
                        ],
                    ],

                    [
                        'slug' => 'sher-guide-2',

                        'avatar' => 'BC',

                        'thumbnail' => [
                            'url' => asset('/images/placeholder-thumbnail.webp'),
                            'alt' => 'Sherpa Guide',
                        ],
                    ],

                    [
                        'slug' => 'sher-guide-3',

                        'avatar' => 'CD',

                        'thumbnail' => [
                            'url' => asset('/images/placeholder-thumbnail.webp'),
                            'alt' => 'Sherpa Guide',
                        ],
                    ],

                    [
                        'slug' => 'sher-guide-4',

                        'avatar' => 'DE',

                        'thumbnail' => [
                            'url' => asset('/images/placeholder-thumbnail.webp'),
                            'alt' => 'Sherpa Guide',
                        ],
                    ],
                ],
            ],

            'gallery' => [
                [
                    'thumbnail' => [
                        'url' => asset('/images/placeholder-thumbnail.webp'),
                        'alt' => 'Khumbu Icefall',
                    ],

                    'caption' => 'Khumbu Icefall',
                ],

                [
                    'thumbnail' => [
                        'url' => asset('/images/placeholder-thumbnail.webp'),
                        'alt' => 'Annapurna Range',
                    ],

                    'caption' => 'Annapurna Range',
                ],

                [
                    'thumbnail' => [
                        'url' => asset('/images/placeholder-thumbnail.webp'),
                        'alt' => 'Base Camp Life',
                    ],

                    'caption' => 'Base Camp Life',
                ],
            ],
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Categories
    |--------------------------------------------------------------------------
    */

    private function categories(): array
    {
        return [
            'caption' => 'Expedition Categories',

            'title' => 'Choose Your Summit',

            'description' => 'From high-altitude 8000m challenges to scenic Himalayan treks — an adventure calibrated for every ambition.',

            'items' => [
                [
                    'uuid' => '550e8400-e29b-41d4-a716-446655440000',

                    'caption' => 'Death Zone Peaks',

                    'title' => '8000m Expeditions',

                    'href' => '/trip',

                    'elevation' => '8,000m+',

                    'description' => 'Everest, K2, Kangchenjunga, Lhotse & all 14 eight-thousanders.',

                    'count' => 14,

                    'thumbnail' => [
                        'url' => asset('/images/placeholder-thumbnail.webp'),
                        'alt' => '8000m Expeditions',
                    ],
                ],

                [
                    'uuid' => '550e8400-e29b-41d4-a716-446655440001',

                    'caption' => 'High Altitude',

                    'title' => '7000m Expeditions',

                    'href' => '/trip',

                    'elevation' => '7,000m+',

                    'description' => 'Mera Peak, Baruntse, Pumori and more technical ascents.',

                    'count' => 22,

                    'thumbnail' => [
                        'url' => asset('/images/placeholder-thumbnail.webp'),
                        'alt' => '7000m Expeditions',
                    ],
                ],
            ],
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Featured
    |--------------------------------------------------------------------------
    */

    private function featured(): array
    {
        return [
            'caption' => 'Featured Expeditions',

            'title' => '2025 Season Highlights',

            'cta' => [
                'label' => 'View All Expeditions',
                'href' => '/trip',
                'type' => 'internal',
            ],

            'items' => [
                [
                    'slug' => 'mountain-1',

                    'tag' => '8848m · Spring 2025',

                    'title' => 'Mount Everest South Col Route',

                    'price' => '$65,000',

                    'href' => '/trip/mount-everest-south-col',

                    'attributes' => [
                        [
                            'label' => '📅',
                            'text' => '55 days',
                        ],

                        [
                            'label' => '👥',
                            'text' => '8 climbers max',
                        ],

                        [
                            'label' => '⚠',
                            'text' => 'Advanced level',
                        ],
                    ],

                    'thumbnail' => [
                        'url' => asset('/images/placeholder-thumbnail.webp'),
                        'alt' => '8000m Expeditions',
                    ],

                    'cta' => [
                        'label' => 'Book',
                        'href' => '/book?mount-everest-south-col',
                        'type' => 'internal',
                    ],
                ],
            ],
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Testimonials
    |--------------------------------------------------------------------------
    */

    private function testimonials(): array
    {
        return [
            'caption' => 'Trusted by Climbers Worldwide',

            'title' => 'Words from the Summit',

            'description' => 'Our greatest achievement is not the records we hold — it\'s the stories our clients carry home from the highest places on Earth.',

            'items' => [
                [
                    'slug' => 'testimonial-1',

                    'rating' => 5,

                    'thumbnail' => [
                        'url' => asset('/images/placeholder-avatar.jpg'),
                        'alt' => 'james-whitfield',
                    ],

                    'comment' => 'Summit 8000 didn\'t just get me to the top of Everest — they brought me home safely.',

                    'name' => 'Marcus Kühn',

                    'avatar' => 'MK',

                    'tag' => 'Everest South Col · 2024',
                ],
            ],

            'certifications' => [
                [
                    'slug' => 'certi-1',

                    'thumbnail' => [
                        'url' => asset('/images/placeholder-logo.jpg'),
                        'alt' => 'certificate-1',
                    ],

                    'title' => 'Nepal Mountaineering Association Licensed',
                ],
            ],
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Why
    |--------------------------------------------------------------------------
    */

    private function why(): array
    {
        return [
            'caption' => 'Why Summit 8000',

            'title' => 'We Don\'t Just Guide. We Protect.',

            'thumbnail' => [
                'url' => asset('/images/placeholder-thumbnail.webp'),
                'alt' => 'why-summit',
            ],

            'items' => [
                [
                    'label' => '🧭',

                    'title' => 'Sherpa-Led Every Step',

                    'description' => 'Every expedition is led by certified Sherpa guides with 10+ Everest summits each.',
                ],
            ],

            'weather' => [
                'location' => 'CAMP IV',
                'temperature' => '-22°C',
                'wind_speed' => '45km/h',
                'condition' => 'Clear',
                'summit_window' => '18 May, 06:00–10:00',
            ],
        ];
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

            'items' => [
                [
                    'slug' => 'blog-1',

                    'category' => 'High Altitude Tips',

                    'title' => 'The Truth About Acclimatization',

                    'author' => 'By Ang Dorji Sherpa · 12 min read · March 2025',

                    'href' => '/blog/acclimatization-guide',

                    'published_at' => '2026-03-28',

                    'reading_time' => '6 min read',

                    'thumbnail' => [
                        'url' => asset('/images/placeholder-thumbnail.webp'),
                        'alt' => 'blog 1',
                    ],
                ],
            ],
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