<?php

namespace App\Services;

use App\DTO\About\AboutPageDTO;
use App\Models\Posts\PostTypeModel;

class AboutPageService
{
    /*
    |--------------------------------------------------------------------------
    | SECTION IDS
    |--------------------------------------------------------------------------
    */

    private const STATS_ID = 33;
    private const STORY_ID = 34;
    private const FOUNDER_ID = 35;
    private const TEAM_ID = 35;
    private const WHY_ID = 37;
    private const TESTIMONIAL_ID = 38;
    private const CERTIFICATION_ID = 39;

    public function getPageData(): AboutPageDTO
    {
        $postTypes = PostTypeModel::with([
                'posts' => function ($query) {
                    $query->where('status', 1)
                        ->orderBy('id', 'asc');
                }
            ])
            ->where('status', 1)
            ->get()
            ->keyBy('id');
            // dd($postTypes);

        return new AboutPageDTO(

            hero: [],

            stats: $this->mapStats(
                $postTypes[self::STATS_ID] ?? null
            ),

            story: $this->mapStory(
                $postTypes[self::STORY_ID] ?? null
            ),

            founder: $this->mapFounder(
                $postTypes[self::FOUNDER_ID] ?? null
            ),

            team: $this->mapTeam(
                $postTypes[self::TEAM_ID] ?? null
            ),

            why: $this->mapWhy(
                $postTypes[self::WHY_ID] ?? null
            ),

            testimonials: $this->mapTestimonials(
                $postTypes[self::TESTIMONIAL_ID] ?? null
            ),

            certifications: $this->mapCertifications(
                $postTypes[self::CERTIFICATION_ID] ?? null
            ),

            cta: [],

            seo: [],
        );
    }

    /*
    |--------------------------------------------------------------------------
    | STATS
    |--------------------------------------------------------------------------
    */

    private function mapStats($postType): array
    {
        if (!$postType) {
            return [];
        }

        return $postType->posts->map(function ($post) {

            return [
                'value' => $post->sub_title ?? '',
                'label' => $post->post_title,
            ];

        })->values()->toArray();
    }

    /*
    |--------------------------------------------------------------------------
    | STORY
    |--------------------------------------------------------------------------
    */

    private function mapStory($postType): array
    {
        if (!$postType) {
            return [];
        }

        return [

            'caption' => $postType->associated_title,

            'title' => $postType->post_type,

            'description' => $postType->content,

            'guides' => [],

            'gallery' => [],
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | FOUNDER
    |--------------------------------------------------------------------------
    */

    private function mapFounder($postType): array
    {
        if (!$postType || $postType->posts->isEmpty()) {
            return [];
        }

        $post = $postType->posts->first();

        return [

            'slug' => $post->uri,

            'caption' => $postType->associated_title,

            'title' => $post->post_title,

            'sub_title' => $post->sub_title ?? '',

            'tag' => '',

            'thumbnail' => [
                'url' => $post->page_thumbnail,
                'alt' => $post->post_title,
            ],

            'badge' => [],

            'description' => [
                $post->post_content
            ],

            'achievements' => [],
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | TEAM
    |--------------------------------------------------------------------------
    */

    private function mapTeam($postType): array
    {
        if (!$postType) {
            return [];
        }

        return [

            'slug' => $postType->uri,

            'caption' => $postType->associated_title,

            'title' => $postType->post_type,

            'description' => $postType->content,

            'items' => $postType->posts->map(function ($post) {

                return [

                    'uuid' => $post->id,

                    'slug' => $post->uri,

                    'name' => $post->post_title,

                    'role' => $post->sub_title ?? '',

                    'experience_years' =>
                        $post->experience_years ?? 0,

                    'thumbnail' => [
                        'url' => $post->page_thumbnail,
                        'alt' => $post->post_title,
                    ],

                    'description' => $post->post_content,

                    'badges' => [],
                ];

            })->values()->toArray(),
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | WHY
    |--------------------------------------------------------------------------
    */

    private function mapWhy($postType): array
    {
        if (!$postType) {
            return [];
        }

        return [

            'caption' => $postType->caption,

            'title' => $postType->title,

            'description' => $postType->description,

            'items' => $postType->posts->map(function ($post) {

                return [

                    'label' => $post->meta['label'] ?? '',

                    'title' => $post->title,

                    'description' => $post->description,

                    'bullets' => $post->meta['bullets'] ?? [],
                ];

            })->values()->toArray(),
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | TESTIMONIALS
    |--------------------------------------------------------------------------
    */

    private function mapTestimonials($postType): array
    {
        if (!$postType) {
            return [];
        }

        return [

            'caption' => $postType->caption,

            'title' => $postType->title,

            'items' => $postType->posts->map(function ($post) {

                return [

                    'uuid' => $post->uuid,

                    'rating' => $post->meta['rating'] ?? 5,

                    'flag' => $post->meta['flag'] ?? '',

                    'quote' => $post->description,

                    'tag' => $post->meta['tag'] ?? '',

                    'name' => $post->title,

                    'achievement' =>
                        $post->meta['achievement'] ?? '',
                ];

            })->values()->toArray(),
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | CERTIFICATIONS
    |--------------------------------------------------------------------------
    */

    private function mapCertifications($postType): array
    {
        if (!$postType) {
            return [];
        }

        return $postType->posts->map(function ($post) {

            return [

                'uuid' => $post->uuid,

                'logo' => [
                    'url' => $post->thumbnail,
                    'alt' => $post->title,
                ],

                'title' => $post->title,
            ];

        })->values()->toArray();
    }
}
