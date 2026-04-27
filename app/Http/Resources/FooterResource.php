<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\DTO\Footer\TripDTO;
use App\DTO\Footer\PostTypeDTO;
use App\DTO\Footer\ContactDTO;
use App\DTO\Common\SeoDTO;

class FooterResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'welcome_text' => $this['settings']->site_name,
            'copyright_text' => $this['settings']->copyright_text,

            'links' => [
                [
                    'expeditions' => collect($this['trips'])
                        ->map(fn($trip) => TripDTO::fromModel($trip)->toArray())
                ],
                [
                    'company' => collect($this['pages'])
                        ->map(fn($page) => PostTypeDTO::fromModel($page)->toArray())
                ],
                [
                    'contact' => [
                        (new ContactDTO($this['settings']->address, '', 'external'))->toArray(),
                        (new ContactDTO($this['settings']->phone, '', 'external'))->toArray(),
                        (new ContactDTO($this['settings']->email_primary, '', 'external'))->toArray(),
                    ]
                ]
            ],

            'sub_links' => [],

            'social_links' => $this->getSocialLinks(),

            'seo' => SeoDTO::fromModel($this['settings']),
        ];
    }

    private function getSocialLinks()
    {
        $settings = $this['settings'];

        return collect([
            ['label' => 'facebook', 'href' => $settings->facebook_link],
            ['label' => 'linkedin', 'href' => $settings->linkedin_link],
            ['label' => 'youtube', 'href' => $settings->youtube_link],
            ['label' => 'instagram', 'href' => $settings->instagram_link],
            ['label' => 'tiktok', 'href' => $settings->tiktok_link],
        ])
            ->filter(fn($item) => !empty($item['href']))
            ->values()
            ->map(fn($item) => [
                'label' => $item['label'],
                'href' => $item['href'],
                'link_type' => 'external',
            ]);
    }

}
