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
            'text1_title', 'text1_sub_title', 'text2_title', 'text2_sub_title', 'text3_title', 'text3_sub_title','text4_title', 'text4_sub_title','text5_title', 'text5_sub_title'
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

        $sections = PostModel::with('associated_posts')->where('post_type', $about->id)->where('status', 1)->get();

        /*
        |--------------------------------------------------------------------------
        | DTO RESPONSE
        |--------------------------------------------------------------------------
        */

        return new AboutPageDTO(

            hero: $this->mapHero($about),

            stats: $this->mapStats($settings),

            story: $this->mapStory(
                $sections['story'] ?? null
            ),

            founder: $this->mapFounder(
                $sections->firstWhere('about_type', 'founder')
            ),

            team: $this->teamService->aboutSection(),

            why: $this->mapWhy(
                $sections->firstWhere('about_type', 'why')
            ),

            testimonials: $this->mapTestimonials(
                $sections->firstWhere('about_type', 'testimonials')
            ),

            certifications: $this->mapCertifications(
                $sections['certifications'] ?? null
            ),

            cta: [],

            seo: [],
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
            'caption' => $post->caption ?? '',
            'title' => $post->post_title ?? '',
            'description' => $post->post_content ?? '',
            'guides' => $post->meta['guides'] ?? [],
            'gallery' => $post->meta['gallery'] ?? [],
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

    private function mapTestimonials($post): array
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
}
