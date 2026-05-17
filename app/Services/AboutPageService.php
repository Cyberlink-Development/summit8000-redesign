<?php

namespace App\Services;

use App\DTO\About\AboutPageDTO;
use App\Models\Posts\PostModel;
use App\Models\Posts\PostTypeModel;

class AboutPageService
{
    public function getPageData(): AboutPageDTO
    {
        /*
        |--------------------------------------------------------------------------
        | ABOUT POST TYPE
        |--------------------------------------------------------------------------
        */

        $about = PostTypeModel::with('posts')
            ->where('id', 1)
            ->first();

        if (!$about) {
            return new AboutPageDTO();
        }

        /*
        |--------------------------------------------------------------------------
        | FETCH ALL SECTIONS ONCE
        |--------------------------------------------------------------------------
        */

        $sections = PostModel::where('posttype', $about->id)
            ->get()
            ->keyBy('type');

        /*
        |--------------------------------------------------------------------------
        | DTO RESPONSE
        |--------------------------------------------------------------------------
        */

        return new AboutPageDTO(

            hero: [],

            stats: $this->mapStats(
                $sections['stats'] ?? null
            ),

            story: $this->mapStory(
                $sections['story'] ?? null
            ),

            founder: $this->mapFounder(
                $sections['founder'] ?? null
            ),

            team: $this->mapTeam(
                $sections['team'] ?? null
            ),

            why: $this->mapWhy(
                $sections['why'] ?? null
            ),

            testimonials: $this->mapTestimonials(
                $sections['testimonials'] ?? null
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
    | STATS
    |--------------------------------------------------------------------------
    */

    private function mapStats($post): array
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

            'slug' => $post->uri,

            'caption' => $post->caption ?? '',

            'title' => $post->post_title,

            'sub_title' => $post->sub_title ?? '',

            'tag' => $post->meta['tag'] ?? '',

            'thumbnail' => [
                'url' => $post->page_thumbnail,
                'alt' => $post->post_title,
            ],

            'badge' => $post->meta['badge'] ?? [],

            'description' => [
                $post->post_content
            ],

            'achievements' => $post->meta['achievements'] ?? [],
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | TEAM
    |--------------------------------------------------------------------------
    */

    private function mapTeam($post): array
    {
        if (!$post) {
            return [];
        }

        return [

            'slug' => $post->uri,

            'caption' => $post->caption ?? '',

            'title' => $post->post_title,

            'description' => $post->post_content,

            'items' => $post->meta['items'] ?? [],
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

            'caption' => $post->caption ?? '',

            'title' => $post->post_title ?? '',

            'description' => $post->post_content ?? '',

            'items' => $post->meta['items'] ?? [],
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | TESTIMONIALS
    |--------------------------------------------------------------------------
    */

    private function mapTestimonials($post): array
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
