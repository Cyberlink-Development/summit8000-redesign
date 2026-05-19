<?php

namespace App\Services\Team;

use App\Models\Team\TeamModel;

class TeamDetailService
{
    public function get($slug)
    {
        $member = TeamModel::with('seo')
            ->where('uri', $slug)
            ->firstOrFail();

        return [
            'data' => [

                'slug' => $member->uri,

                'hero' => $this->hero($member),

                'stats' => $this->stats($member),

                'about' => $this->about($member),

                'info' => $this->info($member),

                'achievements' => $this->achievements($member),

                'gallery' => $this->gallery($member),

                'social' => $this->social($member),

                'cta' => $this->cta($member),

                'seo' => $this->seo($member),
            ],

            'meta' => (object) [],
        ];
    }

    private function hero($member)
{
    return [
        'banner' => [
            'url' => $member->thumbnail
                ? asset('uploads/team/' . $member->thumbnail)
                : asset('theme-assets/assets/trip/8000.jpg'),

            'alt' => $member->name . ' - ' . $member->position,
        ],

        'title' => $member->name,

        'sub_title' => $member->position,

        'caption' => 'Summit 8000 Guide',

        'description' => $member->brief,
    ];
}


private function stats($member)
{
    return [
        [
            'value' => $member->experience,
            'label' => 'Years Experience',
        ],
        [
            'value' => $member->everest_summits,
            'label' => 'Everest Summits',
        ],
    ];
}

private function about($member)
{
    return [
        'caption' => 'Biography',

        'title' => 'A Life Lived Vertical',

        'excerpt' => $member->brief,

        'description' => $member->content,

        'highlight' => $member->highlight,
    ];
}

private function info($member)
{
    return [
        'title' => 'Personal Information',

        'items' => [
            [
                'label' => 'Full Name',
                'value' => $member->name,
            ],
            [
                'label' => 'Role',
                'value' => $member->position,
            ],
            [
                'label' => 'Experience',
                'value' => $member->experience,
            ],
            [
                'label' => 'Languages',
                'value' => $member->languages,
            ],
            [
                'label' => 'Base',
                'value' => $member->location,
            ],
            [
                'label' => 'Contact',
                'value' => $member->email,
            ],
        ],
    ];
}

private function achievements($member)
{
    return [
        'caption' => 'Highlights',

        'title' => 'Achievements & Milestones',

        'items' => $member->achievements ?? [],
    ];
}

private function gallery($member)
{
    return [
        'caption' => 'Gallery',

        'title' => 'Moments on the Mountain',

        'items' => $member->gallery ?? [],
    ];
}

private function social($member)
{
    return [
        'caption' => 'Connect',

        'title' => 'Find ' . $member->name . ' Online',

        'items' => [

            [
                'label' => 'instagram',

                'value' => $member->instagram,

                'href' => $member->instagram_url,

                'type' => 'external',
            ],

            [
                'label' => 'linkedin',

                'value' => $member->linkedin_url,

                'href' => $member->linkedin,

                'type' => 'external',
            ],

            [
                'label' => 'email',

                'value' => $member->email,

                'href' => 'mailto:' . $member->email,

                'type' => 'external',
            ],
        ],
    ];
}

private function cta($member)
{
    return [
        'caption' => 'Plan Your Expedition',

        'title' => 'Trek with ' . $member->name,

        'description' => 'Ready to experience the Himalayas with one of Nepal’s most respected guides?',

        'primary' => [
            'label' => 'Send an Inquiry',

            'href' => '/contact',

            'type' => 'internal',
        ],
    ];
}

private function seo($member)
{
    $seo = $member->seo;

    return [
        'meta_title' => $seo?->meta_title,

        'meta_description' => $seo?->meta_description,

        'og_title' => $seo?->og_title,

        'og_description' => $seo?->og_description,

        'og_image' => $seo?->og_image
            ? asset('uploads/original/' . $seo->og_image)
            : asset('theme-assets/assets/trip/8000.jpg'),

        'canonical_url' => $seo?->canonical_url
            ?? url('/team/' . $member->slug),

        'robots' => $seo?->robots
            ? str_replace(',', ', ', $seo->robots)
            : 'index, follow',

        'robots_txt_extras' => null,

        'schema' => $seo?->schema_data ?? [],

        'sitemap' => [
            'include' => (bool) $seo?->in_sitemap,

            'priority' => (float) ($seo?->sitemap_priority ?? 0.5),

            'change_frequency' => $seo?->change_frequency
                ?? 'monthly',
        ],
    ];
}
}