<?php

namespace App\Services\Team;

use App\Models\Posts\PostTypeModel;
use App\Models\Team\TeamModel;

class TeamService
{
    public function get()
    {
        $data = PostTypeModel::with('seo')
            ->where('id', 35)
            ->first();

        $leadership  = TeamModel::where('category', 1)
            ->orderBy('ordering', 'asc')
            ->get();

        $guides = TeamModel::where('category', 2)
            ->orderBy('ordering', 'asc')
            ->get();

        return [
            'data' => [

                'hero' => $this->hero($data),

                'leadership' => $this->leadership($leadership),

                'guides' => $this->guides($guides),

                'stats' => $this->stats(),

                'join_cta' => $this->joinCta(),

                'seo' => $this->seo($data),
            ],

            // 'meta' => $this->meta($members),
        ];
    }

    private function hero($page)
    {
        return [
            'banner' => [
                'url' => $page?->banner
                    ? asset('uploads/original/' . $page->banner)
                    : asset('theme-assets/assets/trip/8000.jpg'),

                'alt' => $page?->post_type,
            ],

            'caption' => $page?->caption,

            'title' => $page?->post_type,

            'description' => $page?->description,
        ];
    }
    private function leadership($members)
    {
        return [
            'caption' => 'Leadership',

            'title' => 'Meet Our Core Team',

            'description' => 'Our leadership team brings decades of combined Himalayan experience.',

            'items' => collect($members)
                ->map(fn($member) => $this->member($member))

                ->values(),
        ];
    }
    private function guides($members)
    {
        return [
            'caption' => 'Field Experts',

            'title' => 'Our Trekking Guides',

            'items' => collect($members)
                ->map(fn($member) => $this->member($member))
                ->values(),
        ];
    }
    private function member($member)
    {
        return [
            'slug' => $member->slug,

            'title' => $member->name,

            'sub_title' => $member->position,

            'caption' => $member->category == 1 ? 'Leadership' : 'Guide',

            'href' => '/team/' . $member->slug,

            'avatar' => strtoupper(substr($member->name, 0, 2)),

            'thumbnail' => [
                'url' => $member->thumbnail
                    ? asset('uploads/team/' . $member->thumbnail)
                    : asset('theme-assets/assets/trip/2.jpg'),

                'alt' => $member->name,
            ],

            'excerpt' => $member->content,

            'tags' => $member->tags ?? [],
        ];
    }

    private function stats()
{
    return [
        [
            'value' => '22+',
            'label' => 'Expert Guides',
        ],
        [
            'value' => '340+',
            'label' => 'Years Combined Experience',
        ],
    ];
}

private function joinCta()
{
    return [
        'caption' => 'Join Our Family',

        'title' => 'Passionate About Mountains?',

        'description' => 'We’re always looking for experienced guides.',

        'cta' => [
            'label' => 'Explore Careers',

            'href' => '/careers',

            'type' => 'internal',
        ],
    ];
}

private function seo($page)
{
    $seo = $page?->seo;

    return [
        'meta_title' => $seo?->meta_title,

        'meta_description' => $seo?->meta_description,

        'og_title' => $seo?->og_title,

        'og_description' => $seo?->og_description,

        'og_image' => $seo?->og_image
            ? asset('uploads/original/' . $seo->og_image)
            : asset('theme-assets/assets/trip/8000.jpg'),

        'canonical_url' => $seo?->canonical_url
            ?? url('/team'),

        'robots' => $seo?->robots
            ? str_replace(',', ', ', $seo->robots)
            : 'index, follow',

        'robots_txt_extras' => null,

        'schema' => $seo?->schema_data
            ?? [
                '@context' => 'https://schema.org',

                '@type' => 'AboutPage',

                'title' => 'Our Team — Summit 8000',

                'description' => 'Meet the expert team behind Summit 8000.',
            ],

        'sitemap' => [
            'include' => (bool) $seo?->in_sitemap,

            'priority' => (float) ($seo?->sitemap_priority ?? 0.5),

            'change_frequency' => $seo?->change_frequency
                ?? 'monthly',
        ],
    ];
}

    public function aboutItems()
    {
        $leadership = TeamModel::where('category', 1)
            ->orderBy('ordering', 'asc')
            ->get();

        return collect($leadership)
            ->map(fn($member) => $this->member($member))
            ->values();
    }
    public function aboutSection()
    {
        $data = PostTypeModel::where('id', 35)->first();

        return [

            'hero' => $this->hero($data),

            'items' => $this->aboutItems(),
        ];
    }
}
