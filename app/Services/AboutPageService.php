<?php

namespace App\Services;

use App\DTO\About\AboutPageDTO;
use App\Models\Posts\PostModel;
use App\Models\Posts\PostTypeModel;
use App\Models\Settings\SettingModel;
use App\Services\Team\TeamService;
use App\Model\TripReview;

class AboutPageService
{
    public function __construct(
        protected TeamService $teamService
    ) {}
    public function getPageData(): AboutPageDTO
    {
        $about = PostTypeModel::with('posts','seo')
            ->where('id', '22')
            ->first();

        $settings = SettingModel::select(
            'text1_title', 'text1_sub_title', 'text2_title', 'text2_sub_title', 'text3_title', 'text3_sub_title','text4_title', 'text4_sub_title','text5_title', 'text5_sub_title','address','phone','usa_phone','email_primary'
        )->first();

        // dd($about,$review);

        if (!$about) {
            return new AboutPageDTO();
        }

        /*
        |--------------------------------------------------------------------------
        | FETCH ALL SECTIONS ONCE
        |--------------------------------------------------------------------------
        */

        $sections = PostModel::with('associated_posts','images')->where('post_type', $about->id)->where('status', 1)->get();

        /*
        |--------------------------------------------------------------------------
        | DTO RESPONSE
        |--------------------------------------------------------------------------
        */

        return new AboutPageDTO(

            hero: $this->mapHero($about),

            stats: $this->mapStats($settings),

            story: $this->mapStory(
                $sections->firstWhere('about_type', 'story')
            ),

            founder: $this->mapFounder(
                $sections->firstWhere('about_type', 'founder')
            ),

            team: $this->teamService->aboutSection(),

            why: $this->mapWhy(
                $sections->firstWhere('about_type', 'why')
            ),

            testimonials: $this->mapTestimonials(),

            certifications: $this->mapCertifications(
                $sections['certifications'] ?? null
            ),

            cta: $this->mapCta($settings),

            seo: $this->mapSeo($about),
        );
    }

    /*
    |--------------------------------------------------------------------------
    | HERO
    |--------------------------------------------------------------------------
    */

    private function mapHero($about): array
    {
        if (!$about) {
            return [];
        }

        return [

            'banner' => [
                'url' => $about->banner,
                'alt' => $about->post_type,
            ],

            'breadcrumb' => [

                'previous' => [
                    'label' => 'Home',
                    'href' => '/',
                    'type' => 'internal',
                ],

                'current' => [
                    'label' => $about->post_type,
                ],
            ],

            'caption' => $about->associated_title ?? '',

            'title' => $about->post_type ?? '',

            'description' => strip_tags($about->content ?? ''),
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | STATS
    |--------------------------------------------------------------------------
    */

    private function mapStats($settings): array
    {
        if (!$settings) {
            return [];
        }

        return [

            [
                'value' => $settings->text1_title ?? '',
                'label' => $settings->text1_sub_title ?? '',
            ],

            [
                'value' => $settings->text2_title ?? '',
                'label' => $settings->text2_sub_title ?? '',
            ],

            [
                'value' => $settings->text3_title ?? '',
                'label' => $settings->text3_sub_title ?? '',
            ],

            [
                'value' => $settings->text4_title ?? '',
                'label' => $settings->text4_sub_title ?? '',
            ],

            [
                'value' => $settings->text5_title ?? '',
                'label' => $settings->text5_sub_title ?? '',
            ],
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | STORY
    |--------------------------------------------------------------------------
    */

    private function mapStory($post): array
    {
        if (!$post) {
            return [];
        }

        return [

            'caption' => $post->post_title ?? '',

            'title' => $post->sub_title ?? '',

            'description' => $post->post_content ?? '',

            'guides' => [],

            'gallery' => collect($post->images ?? [])
                ->map(function ($image) {

                    return [

                        'thumbnail' => [
                            'url' => $image->file_name
                                ? asset('uploads/medium/' . $image->file_name)
                                : '',

                            'alt' => $image->title ?? '',
                        ],

                        'caption' => $image->title ?? '',
                    ];
                })
                ->values(),
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | FOUNDER
    |--------------------------------------------------------------------------
    */

    private function mapFounder($post): array
    {
        if (!$post) {
            return [];
        }

        return [

            'slug' => $post->uri ?? '',

            'caption' => 'Meet the Founder',

            'title' => $post->post_title ?? '',

            'sub_title' => $post->sub_title ?? '',

            'tag' => $post->about_type ?? '',

            'thumbnail' => [
                'url' => $post->page_thumbnail ?? '',
                'alt' => $post->post_title ?? '',
            ],

            'badge' => [],

            'description' => $post->post_excerpt ?? '',

            'achievements' => $post->post_content ?? '',
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | WHY
    |--------------------------------------------------------------------------
    */

    private function mapWhy($post): array
    {
        if (!$post) {
            return [];
        }

        return [

            'caption' => $post->post_title ?? '',

            'title' => $post->sub_title ?? '',

            'description' => $post->post_content ?? '',

            'items' => collect($post->associated_posts ?? [])
                ->map(function ($item) {

                    return [

                        'thumbnail' => [
                            'url' => $item->thumbnail
                                ? asset('uploads/associated/' . $item->thumbnail)
                                : '',

                            'alt' => $item->title ?? '',
                        ],

                        'title' => $item->title ?? '',

                        'description' => $item->brief ?? '',

                        'bullets' => $item->content ?? '',
                    ];
                })
                ->values(),
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | TESTIMONIALS
    |--------------------------------------------------------------------------
    */

    private function mapTestimonials(): array
    {
        $reviews = TripReview::latest()
            ->take(6)
            ->get();

        return [

            'caption' => 'Client Stories',

            'title' => 'Words from the Summit',

            'description' => 'Our greatest achievement is not the records we hold — it`s the stories our clients carry home from the highest places on Earth.',

            'items' => collect($reviews)
                ->map(function ($review, $index) {

                    return [

                        'slug' => 't' . ($index + 1),

                        'rating' => (float) ($review->rating ?? 5),

                        'thumbnail' => [
                            'url' => $review->image
                                ? asset('uploads/reviews/' . $review->image)
                                : '',

                            'alt' => $review->full_name ?? '',
                        ],

                        'comment' => $review->message ?? '',

                        'tag' => $review->trip_title ?? '',

                        'name' => $review->full_name ?? '',

                        'avatar' => strtoupper(substr($review->full_name ?? '', 0, 2)),

                        'achievement' => $review->title ?? '',
                    ];
                })
            ->values(),
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | CERTIFICATIONS
    |--------------------------------------------------------------------------
    */

    private function mapCertifications($post): array
    {
        if (!$post) {
            return [];
        }

        return [

            'caption' => $post->caption ?? '',

            'title' => $post->post_title ?? '',

            'items' => $post->meta['items'] ?? [],
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | CTA
    |--------------------------------------------------------------------------
    */

    private function mapCta($settings): array
    {
        return [
            'caption' => 'Your Expedition Begins Here',
            'title' => 'Ready to Stand at the Top of the World?',
            'description' => 'Whether you\'re planning an Everest Base Camp trek, a full Himalayan expedition, or a personalised mountain adventure, our team is ready to make it happen — safely, expertly, and unforgettably.',
            'primary' => [
                'label' => 'Plan My Expedition',
                'href' => '/contact',
                'type' => 'internal',
            ],
            'secondary' => [
                'label' => 'Speak to a Guide',
                'href' => $settings->usa_phone
                    ? 'https://wa.me/' . preg_replace('/[^0-9]/', '', $settings->whatsapp_phone)
                    : '/contact',

                'type' => 'external',
            ],
            'contacts' => [
                [
                    'label' => 'address',
                    'value' => $settings->address ?? '',
                    'href' => null,
                    'type' => null,
                ],
                [
                    'label' => 'phone',
                    'value' => $settings->phone ?? '',
                    'href' => $settings->phone
                        ? 'tel:' . preg_replace('/\s+/', '', explode(',', $settings->phone)[0])
                        : null,
                    'type' => 'external',
                ],
                [
                    'label' => 'email',
                    'value' => $settings->email_primary ?? '',
                    'href' => null,
                    'type' => 'external',
                ],
            ],
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | SEO
    |--------------------------------------------------------------------------
    */

    private function mapSeo($page): array
    {
        $seo = $page?->seo;

        return [

            'meta_title' => $seo?->meta_title ?? '',

            'meta_description' => $seo?->meta_description ?? '',

            'og_title' => $seo?->og_title ?? '',

            'og_description' => $seo?->og_description ?? '',

            'og_image' => $seo?->og_image
                ? asset('uploads/original/' . $seo->og_image)
                : '',

            'canonical_url' => $seo?->canonical_url
                ?? url('/about'),

            'robots' => $seo?->robots
                ? str_replace(',', ', ', $seo->robots)
                : 'index, follow',

            'schema' => $seo?->schema_data
                ?? [
                    '@context' => 'https://schema.org',

                    '@type' => 'AboutPage',

                    'name' => 'About Summit 8000',

                    'description' => 'About Summit 8000 expedition company',

                    'url' => url('/about'),
                ],
        ];
    }

    public function getStorySection(): array
{
    $about = PostTypeModel::where('id', 22)->first();

    if (!$about) {
        return [];
    }

    $story = PostModel::with('images')
        ->where('post_type', $about->id)
        ->where('about_type', 'story')
        ->where('status', 1)
        ->first();

    return $this->mapStory($story);
}

public function getWhySection(): array
{
    $about = PostTypeModel::where('id', 22)->first();

    if (!$about) {
        return [];
    }

    $why = PostModel::with('associated_posts')
        ->where('post_type', $about->id)
        ->where('about_type', 'why')
        ->where('status', 1)
        ->first();

    return $this->mapWhy($why);
}

}
