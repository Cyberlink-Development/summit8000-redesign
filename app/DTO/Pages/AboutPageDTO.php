<?php

namespace App\DTO\Pages;

use App\Model\TripReview;
use Illuminate\Support\Collection;
use App\Models\Team\TeamModel;

class AboutPageDTO
{
    public function __construct(
        public readonly string $template,
        public readonly array  $hero,
        public readonly array  $stats,
        public readonly array  $story,
        public readonly array  $founder,
        public readonly array  $team,
        public readonly array  $why,
        public readonly array  $testimonials,
        public readonly array  $certifications,
        public readonly array  $cta,
    ) {}

    public static function fromModel(
        object     $aboutSlug,
        ?object    $settings,
        Collection $sections,
    ): self {
        return new self(
            template:       $aboutSlug->template,
            hero:           self::buildHero($aboutSlug),
            stats:          self::buildStats($settings),
            story:          self::buildStory(
                                $sections->firstWhere('about_type', 'story')
                            ),
            founder:        self::buildFounder(
                                $sections->firstWhere('about_type', 'founder')
                            ),
            team:           self::buildTeam(),
            why:            self::buildWhy(
                                $sections->firstWhere('about_type', 'why')
                            ),
            testimonials:   self::buildTestimonials(),
            certifications: self::buildCertifications(
                                $sections->firstWhere('about_type', 'certifications')
                            ),
            cta:            self::buildCta($settings),
        );
    }

    public function toArray(): array
    {
        return [
            'template'       => $this->template,
            'hero'           => $this->hero,
            'stats'          => $this->stats,
            'story'          => $this->story,
            'founder'        => $this->founder,
            'team'           => $this->team,
            'why'            => $this->why,
            'testimonials'   => $this->testimonials,
            'certifications' => $this->certifications,
            'cta'            => $this->cta,
        ];
    }

    // ─────────────────────────────────────────────────────────────────────────
    // Builders
    // ─────────────────────────────────────────────────────────────────────────
    private static function buildTeam(): array
    {
        return TeamMemberDTO::collect(
            TeamModel::where('category', 1)
                ->orderBy('ordering', 'asc')
                ->take(3)
                ->get()
                ->all()
        );
    }

    /*
    |--------------------------------------------------------------------------
    | HERO
    |--------------------------------------------------------------------------
    |
    | "hero": {
    |   "banner": { "url": "...", "alt": "..." },
    |   "breadcrumb": { "previous": {...}, "current": {...} },
    |   "caption": "...",
    |   "title": "...",
    |   "description": "..."
    | }
    |
    */
    private static function buildHero(object $about): array
    {
        return [
            'banner' => [
                'url' => asset('uploads/banners/' . $about->banner),
                'alt' => $about->post_type ?? '',
            ],
            'breadcrumb' => [
                'previous' => [
                    'label' => 'Home',
                    'href'  => '/',
                    'type'  => 'internal',
                ],
                'current' => [
                    'label' => $about->post_type ?? '',
                ],
            ],
            'caption'     => $about->associated_title ?? '',
            'title'       => $about->post_type        ?? '',
            'description' => $about->content ?? '',
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | STATS
    |--------------------------------------------------------------------------
    |
    | "stats": [
    |   { "value": "16", "label": "Age of First Everest Summit" },
    |   ...
    | ]
    |
    */
    private static function buildStats(?object $settings): array
    {
        if (! $settings) {
            return [];
        }

        return [
            ['value' => $settings->text1_title ?? '', 'label' => $settings->text1_sub_title ?? ''],
            ['value' => $settings->text2_title ?? '', 'label' => $settings->text2_sub_title ?? ''],
            ['value' => $settings->text3_title ?? '', 'label' => $settings->text3_sub_title ?? ''],
            ['value' => $settings->text4_title ?? '', 'label' => $settings->text4_sub_title ?? ''],
            ['value' => $settings->text5_title ?? '', 'label' => $settings->text5_sub_title ?? ''],
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | STORY
    |--------------------------------------------------------------------------
    |
    | "story": {
    |   "caption": "...",
    |   "title": "...",
    |   "description": "...",
    |   "guides": {
    |     "title": "48 Sherpa Guides",
    |     "sub_title": "Combined 380+ Everest summits",
    |     "items": [
    |       { "slug": "...", "avatar": "AB", "thumbnail": { "url": "...", "alt": "..." } },
    |       ...
    |     ]
    |   },
    |   "gallery": [
    |     { "thumbnail": { "url": "...", "alt": "..." }, "caption": "..." },
    |     ...
    |   ]
    | }
    |
    */
    private static function buildStory(?object $post): array
    {
        if (! $post) {
            return [];
        }

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
    | FOUNDER
    |--------------------------------------------------------------------------
    |
    | "founder": {
    |   "slug": "...",
    |   "caption": "Meet the Founder",
    |   "title": "...",
    |   "sub_title": "...",
    |   "tag": "...",
    |   "thumbnail": { "url": "...", "alt": "..." },
    |   "badge": {
    |     "icon": "🏔",
    |     "title": "...",
    |     "description": "..."
    |   },
    |   "description": "...",
    |   "achievements": [ "...", "..." ]   ← array of strings
    | }
    |
    */
    private static function buildFounder(?object $post): array
    {
        if (! $post) {
            return [];
        }

        // achievements: stored as JSON array or newline-delimited string
        $achievements = $post->post_content ?? [];

        if (is_string($achievements)) {
            $decoded = json_decode($achievements, true);
            $achievements = is_array($decoded)
                ? $decoded
                : array_values(array_filter(explode("\n", strip_tags($achievements))));
        }

        // badge: stored as JSON object on the post (icon, title, description)
        $badgeRaw = $post->badge ?? null;
        $badge    = [];

        if (is_string($badgeRaw)) {
            $badge = json_decode($badgeRaw, true) ?? [];
        } elseif (is_array($badgeRaw)) {
            $badge = $badgeRaw;
        }

        return [
            'slug'      => $post->uri        ?? '',
            'caption'   => 'Meet the Founder',
            'title'     => $post->post_title  ?? '',
            'sub_title' => $post->sub_title   ?? '',
            'tag'       => $post->about_type  ?? '',
            'thumbnail' => [
                'url' => $post->page_thumbnail ?? '',
                'alt' => $post->post_title     ?? '',
            ],
            'badge'        => $badge,           // object: { icon, title, description }
            'description'  => $post->post_excerpt ?? '',
            'achievements' => $achievements,    // array of strings
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | WHY
    |--------------------------------------------------------------------------
    |
    | "why": {
    |   "caption": "...",
    |   "title": "...",
    |   "description": "...",
    |   "items": [
    |     {
    |       "thumbnail": { "url": "...", "alt": "..." },
    |       "title": "...",
    |       "description": "...",
    |       "bullets": [ "...", "..." ]   ← array of strings (optional)
    |     },
    |     ...
    |   ]
    | }
    |
    */
    private static function buildWhy(?object $post): array
    {
        if (! $post) {
            return [];
        }

        return [
            'caption'     => $post->post_title  ?? '',
            'title'       => $post->sub_title    ?? '',
            'description' => $post->post_content ?? '',
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
    | TESTIMONIALS
    |--------------------------------------------------------------------------
    |
    | "testimonials": {
    |   "caption": "...",
    |   "title": "...",
    |   "description": "...",
    |   "items": [
    |     {
    |       "slug": "t1",
    |       "rating": 5,
    |       "thumbnail": { "url": "...", "alt": "..." },
    |       "comment": "...",
    |       "tag": "...",
    |       "name": "...",
    |       "avatar": "JW",
    |       "achievement": "..."
    |     },
    |     ...
    |   ]
    | }
    |
    */
    private static function buildTestimonials(): array
    {
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
    | CERTIFICATIONS
    |--------------------------------------------------------------------------
    |
    | "certifications": [                 ← flat array (no wrapper object)
    |   {
    |     "slug": "certi-1",
    |     "thumbnail": { "url": "...", "alt": "..." },
    |     "title": "..."
    |   },
    |   ...
    | ]
    |
    */
    private static function buildCertifications(?object $post): array
    {
        if (! $post) {
            return [];
        }

        $items = $post->meta['items'] ?? [];

        return collect($items)
            ->map(fn($item, $index) => [
                'slug'      => $item['slug']      ?? ('certi-' . ($index + 1)),
                'thumbnail' => [
                    'url' => $item['thumbnail']['url'] ?? '',
                    'alt' => $item['thumbnail']['alt'] ?? '',
                ],
                'title' => $item['title'] ?? '',
            ])
            ->values()
            ->toArray();
    }

    /*
    |--------------------------------------------------------------------------
    | CTA
    |--------------------------------------------------------------------------
    |
    | "cta": {
    |   "caption": "...",
    |   "title": "...",
    |   "description": "...",
    |   "primary":   { "label": "...", "href": "...", "type": "internal" },
    |   "secondary": { "label": "...", "href": "...", "type": "external" },
    |   "contacts": [
    |     { "label": "address", "value": "...", "href": null,  "type": null },
    |     { "label": "phone",   "value": "...", "href": "tel:...", "type": "external" },
    |     { "label": "email",   "value": "...", "href": null,  "type": "external" }
    |   ]
    | }
    |
    */
    private static function buildCta(?object $settings): array
    {
        return [
            'caption'     => 'Your Expedition Begins Here',
            'title'       => 'Ready to Stand at the Top of the World?',
            'description' => 'Whether you\'re planning an Everest Base Camp trek, a full Himalayan expedition, or a personalised mountain adventure, our team is ready to make it happen — safely, expertly, and unforgettably.',
            'primary' => [
                'label' => 'Plan My Expedition',
                'href'  => '/plan-expedition',
                'type'  => 'internal',
            ],
            'secondary' => [
                'label' => 'Speak to a Guide',
                'href'  => $settings?->whatsapp_phone
                    ? 'https://wa.me/' . preg_replace('/[^0-9]/', '', $settings->whatsapp_phone)
                    : '/contact',
                'type'  => $settings?->whatsapp_phone ? 'external' : 'internal',
            ],
            'contacts' => [
                [
                    'label' => 'address',
                    'value' => $settings?->address ?? '',
                    'href'  => null,
                    'type'  => null,
                ],
                [
                    'label' => 'phone',
                    'value' => $settings?->phone ?? '',
                    'href'  => $settings?->phone
                        ? 'tel:' . preg_replace('/\s+/', '', explode(',', $settings->phone)[0])
                        : null,
                    'type'  => 'external',
                ],
                [
                    'label' => 'email',
                    'value' => $settings?->email_primary ?? '',
                    'href'  => $settings?->email_primary
                        ? 'mailto:' . $settings->email_primary
                        : null,
                    'type'  => 'external',
                ],
            ],
        ];
    }
}
