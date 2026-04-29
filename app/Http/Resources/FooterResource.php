<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\DTO\Footer\FooterLinkDTO;

class FooterResource extends JsonResource
{
    public function toArray($request)
    {
        $settings = $this['settings'];

        return [
            'tagline' => $settings->site_name,
            'copyright' => $settings->copyright_text,

            'link_groups' => [
                [
                    'group' => 'company',
                    'label' => 'Company',
                    'items' => collect($this['pages'])->map(function ($page) {
                        return (new FooterLinkDTO(
                            $page->post_type,
                            '/' . $page->uri,
                            'internal'
                        ))->toArray();
                    }),
                ],
            ],

            'social_links' => [
                (new FooterLinkDTO('facebook', $settings->facebook_link, 'external'))->toArray(),
                (new FooterLinkDTO('linkedin', $settings->linkedin_link, 'external'))->toArray(),
            ],
        ];
    }
}
