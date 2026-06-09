<?php

namespace App\Services\Home;

use App\Models\Banners\BannerModel;
use App\Models\Travels\ActivityModel;
use App\Models\Travels\TripModel;
use App\Services\About\AboutPageService;
use App\Services\Blog\BlogService;
use App\Models\Settings\SettingModel;
use App\Models\Posts\PostTypeModel;
use App\Models\Posts\PostModel;
use App\Model\TripReview;
use App\Models\Travels\TripGearModel;

class HomeService
{

    public function __construct(
        protected BlogService $blogService,
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
            ->latest('created_at')
            ->first();

        $settings = SettingModel::select(
            'text1_title',
            'text1_sub_title',
            'text2_title',
            'text2_sub_title',
            'text3_title',
            'text3_sub_title',
            'text4_title',
            'text4_sub_title',
        )->first();

        if (!$banner) {
            return [
                'banner' => null,

                'caption' => null,

                'title' => null,

                'description' => null,

                'cta' => [
                    'primary' => null,

                    'secondary' => null,
                ],

                'stats' => [],
            ];
        }

        return [
            'banner' => [
                'url' => asset('uploads/banners/' . $banner->picture),
                'alt' => $banner->picture_alt ?? $banner->title,
            ],

            'caption' => $banner->caption,

            'title' => $banner->title,

            'description' => $banner->description,

            'cta' => [
                'primary' => [
                    'label' => $banner->primary_cta ?? 'Explore Expeditions',
                    'href'  => $banner->primary_cta_link ?? '/expeditions',
                    'type'  => 'internal',
                ],

                'secondary' => [
                    'label' => $banner->secondary_cta ?? 'Our Story',
                    'href'  => $banner->secondary_cta_link ?? '/about',
                    'type'  => 'internal',
                ],
            ],

            'stats' => [
                [
                    'value' => $settings->text1_title ?? '1000+',
                    'label' => $settings->text1_sub_title ?? "Summits Achieved",
                ],

                [
                    'value' => $settings->text2_title ?? '26yr',
                    'label' => $settings->text2_sub_title ?? "Of Excellence",
                ],

                [
                    'value' => $settings->text3_title ?? '14',
                    'label' => $settings->text3_sub_title ?? "Eight-Thousanders",
                ],

                [
                    'value' => $settings->text4_title ?? '98%',
                    'label' => $settings->text4_sub_title ?? "Safety Record",
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
        $about = PostTypeModel::query()->where('template', 'about')->first();
        $post = PostModel::where('post_type', $about->id)->where('about_type', 'story')->first();

        return [
            'caption'     => $post->post_title  ?? '',
            'title'       => $post->sub_title    ?? '',
            'description' => $post->post_content ?? '',

            // guides is an object with title, sub_title, and items array
            'guides' => [
                'title'     => $post->guides_title     ?? '',
                'sub_title' => $post->guides_sub_title ?? '',
                'items'     => collect($post->guides ?? [])
                    ->map(fn($guide, $index) => [
                        'slug'      => $guide->uri ?? ('sher-guide-' . ($index + 1)),
                        'avatar'    => strtoupper(substr($guide->name ?? '', 0, 2)),
                        'thumbnail' => [
                            'url' => $guide->thumbnail ?? '',
                            'alt' => $guide->name      ?? 'Sherpa Guide',
                        ],
                    ])
                    ->values()
                    ->toArray(),
            ],

            'gallery' => collect($post->images ?? [])
                ->map(fn($image) => [
                    'thumbnail' => [
                        'url' => $image->file_name
                            ? asset('uploads/medium/' . $image->file_name)
                            : '',
                        'alt' => $image->title ?? '',
                    ],
                    'caption' => $image->title ?? '',
                ])
                ->values()
                ->toArray(),
        ];
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

                        'slug' => $item->slugs()->first()->slug,

                        'caption' => $item->sub_title ?? '',

                        'title' => $item->title ?? '',

                        'href' => $item->slugs()?->first()?->slug,

                        'elevation' => $item->elevation ?? '',

                        'description' => $item->content ?? '',

                        'count' => (int) ($item->total_trips ?? 0),

                        'thumbnail' => [
                            'url' => $item->thumbnail
                                ? asset('uploads/icon/' . $item->thumbnail)
                                : asset('theme-assets/assets/trip/8000.jpg'),

                            'alt' => $item->thumbnail_alt ?? ($item->title ?? null),
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
                'href' => ActivityModel::query()->first()?->slugs()?->first()?->slug,
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
                                'label' => 'duration',

                                'text' => $trip->duration
                                    ? $trip->duration . ' days'
                                    : '',
                            ],

                            [
                                'label' => 'group',

                                'text' => $trip->group_size
                                    ? $trip->group_size . ' climbers max'
                                    : '',
                            ],

                            [
                                'label' => 'level',

                                'text' => $trip->difficulty
                                    ?? '',
                            ],
                        ],

                        'thumbnail' => [
                            'url' => $trip->thumbnail
                                ? asset('uploads/thumbnails/' . $trip->thumbnail)
                                : asset('theme-assets/assets/trip/1.jpg'),

                            'alt' => $trip->trip_title ?? '',
                        ],

                        'cta' => [
                            'label' => 'Explore More',

                            'href' => $trip->slugs()?->first()?->slug,

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
        $reviews = TripReview::latest()->take(6)->get();

        return [
            'caption'     => 'Client Stories',
            'title'       => 'Words from the Summit',
            'description' => 'Our greatest achievement is not the records we hold — it\'s the stories our clients carry home from the highest places on Earth.',
            'items'       => $reviews->map(fn($review, $index) => [
                'slug'      => 't' . ($index + 1),
                'rating'    => (float) ($review->rating ?? 5),
                'thumbnail' => [
                    'url' => $review->image
                        ? asset('uploads/reviews/' . $review->image)
                        : '',
                    'alt' => $review->full_name ?? '',
                ],
                'comment'     => $review->message    ?? '',
                'tag'         => $review->trip_title ?? '',
                'name'        => $review->full_name  ?? '',
                'avatar'      => strtoupper(substr($review->full_name ?? '', 0, 2)),
                'achievement' => $review->title       ?? '',
            ])->values()->toArray(),
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Why
    |--------------------------------------------------------------------------
    */

    private function why(): array
    {
        $about = PostTypeModel::query()->where('template', 'about')->first();
        $post = PostModel::where('post_type', $about->id)->where('about_type', 'why')->first();
        return [
            'caption'     => $post->post_title  ?? '',
            'title'       => $post->sub_title    ?? '',
            'thumbnail' => [
                'url' => $post->page_thumbnail
                    ? asset('uploads/original/' . $post->page_thumbnail)
                    : '',
                'alt' => $post->post_title ?? '',
            ],
            'items'       => collect($post->associated_posts ?? [])
                ->map(function ($item) {

                    // bullets: stored as JSON array or newline-delimited string
                    $bullets = $item->content ?? [];

                    if (is_string($bullets)) {
                        $decoded = json_decode($bullets, true);
                        $bullets = is_array($decoded)
                            ? $decoded
                            : array_values(array_filter(explode("\n", strip_tags($bullets))));
                    }

                    $result = [
                        'thumbnail' => [
                            'url' => $item->thumbnail
                                ? asset('uploads/associated/' . $item->thumbnail)
                                : '',
                            'alt' => $item->title ?? '',
                        ],
                        'title'       => $item->title ?? '',
                        'description' => $item->brief  ?? '',
                    ];

                    // only include bullets key when there is data
                    if (! empty($bullets)) {
                        $result['bullets'] = $bullets;
                    }

                    return $result;
                })
                ->values()
                ->toArray(),
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
                        'href' => '/expedition',
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
        $photos = TripGearModel::where('thumbnail', '!=', 'NULL')->orderBy('ordering', 'desc')->take(7)->get();
        $gallery = PosttypeModel::where('id', 54)->first();
        return [
            'caption' => 'Expedition Gallery',

            'title' => 'Moments Above the Clouds',

            'cta' => [
                'label' => 'View More',
                'href' => $gallery->slugs->first()->slug,
                'type' => 'internal',
            ],

            'items' => collect($photos)
                ->map(function ($item) {

                    return [
                        'slug' => $item->thumbnail ? asset('/uploads/original/' . $item->thumbnail) : asset('theme-assets/assets/trip/8000.jpg'),

                        'thumbnail' => [
                            'url' => $item->thumbnail ? asset('/uploads/original/' . $item->thumbnail) : asset('theme-assets/assets/trip/8000.jpg'),
                            'alt' => $item->title ?? '',
                        ],
                    ];
                })
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Blog
    |--------------------------------------------------------------------------
    */

    private function blog(): array
    {
        $data = PostModel::query()
            ->where('post_type', 33)->take(3)->get();
        $blog = PosttypeModel::where('id', 33)->first();
        return [

            'caption' => 'Inspiration & Knowledge',

            'title' => 'From the Field',

            'cta' => [
                'label' => 'View All Blogs',
                'href' => $blog->slugs->first()->slug,
                'type' => 'internal',
            ],

            'items' => collect($data)
                ->map(function ($item) {

                    return [
                        'slug'          => slug_formatter($item->slugs()->first()->slug),
                        'category'      => $item->category?->category ?? '',
                        'title'         => $item->post_title,
                        "author" => "By {$item->author} {$item->reading_time}",
                        'href'          => $item->slugs()->first()->slug,
                        'published_at'  => \Carbon\Carbon::parse($item->created_at)->format('F Y'),
                        'reading_time'  => $item->reading_time,
                        'thumbnail' => [
                            'url' => $item->page_thumbnail
                                ? asset('uploads/original/' . $item->page_thumbnail)
                                : asset('theme-assets/assets/trip/8000.jpg'),
                            'alt' => $item->post_title ?? '',
                        ],
                        "cta" => [
                            "href" => $item->slugs()->first()->slug,
                            "label" => "Read More",
                            "type" => "internal"
                        ]
                    ];
                })
                ->values()
                ->toArray(),
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Helpers
    |--------------------------------------------------------------------------
    */
}
