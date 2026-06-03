<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\DTO\Footer\FooterLinkDTO;

class FooterResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'tagline' => $this->settings()->flight_brief
                ?? $this->settings()->site_name,

            'copyright' => $this->settings()->copyright_text,

            'link_groups' => [
                $this->expeditionGroup(),
                $this->companyGroup(),
                $this->contactGroup(),
            ],

            'partner_links' => $this->partnerLinks(),

            'social_links' => $this->socialLinks(),
        ];
    }

    protected function settings()
    {
        return $this['settings'];
    }

    protected function expeditionGroup()
    {
        return [
            'slug' => 'expeditions',
            'label' => 'Expeditions',

            'items' => collect($this['expeditions'] ?? [])
                ->map(function ($expedition) {

                    $slug = optional(
                        $expedition->slugs()->first()
                    )->slug;

                    if (!$slug) {
                        return null;
                    }

                    return $this->link(
                        $expedition->title ?? $expedition->name,
                        '/' . ltrim($slug, '/'),
                        'internal'
                    );
                })
                ->filter()
                ->values(),
        ];
    }

    protected function companyGroup()
    {
        return [
            'slug' => 'company',
            'label' => 'Company',
            'items' => $this->mapPages(
                $this['pages'] ?? []
            ),
        ];
    }

    protected function contactGroup()
    {
        $settings = $this->settings();

        return [
            'slug' => 'contact',
            'label' => 'Contact',

            'items' => array_values(array_filter([

                $settings->address ? $this->link($settings->address, '', '') : null,

                $settings->phone ? $this->link($settings->phone, '', '') : null,

                $settings->usa_phone ? $this->link($settings->usa_phone, '', '') : null,

                $settings->email_primary ? $this->link($settings->email_primary, '', '') : null,

                $settings->email_secondary ? $this->link($settings->email_secondary, '', '') : null,

                $settings->usa_email_primary ? $this->link($settings->usa_email_primary, '', '') : null,

                $settings->usa_address ? $this->link($settings->usa_address, '', '') : null,

            ])),
        ];
    }

    protected function partnerLinks()
    {
        return collect(array_filter([

            $this->settings()->TTA1
                ? [
                    'label' => 'TripAdvisor',
                    'href' => $this->settings()->TTA1,
                ]
                : null,

            $this->settings()->TTA2
                ? [
                    'label' => 'TripAdvisor 2',
                    'href' => $this->settings()->TTA2,
                ]
                : null,

            $this->settings()->Affiliated1
                ? [
                    'label' => 'Affiliated Partner 1',
                    'href' => $this->settings()->Affiliated1,
                ]
                : null,

            $this->settings()->Affiliated2
                ? [
                    'label' => 'Affiliated Partner 2',
                    'href' => $this->settings()->Affiliated2,
                ]
                : null,

        ]))
            ->map(function ($partner) {
                return $this->link(
                    $partner['label'],
                    $partner['href'],
                    'external'
                );
            })
            ->values();
    }

    protected function socialLinks()
    {
        $settings = $this->settings();

        return array_values(array_filter([

            $settings->facebook_link
                ? $this->link(
                    'facebook',
                    $settings->facebook_link,
                    'external'
                )
                : null,

            $settings->linkedin_link
                ? $this->link(
                    'linkedin',
                    $settings->linkedin_link,
                    'external'
                )
                : null,

            $settings->youtube_link
                ? $this->link(
                    'youtube',
                    $settings->youtube_link,
                    'external'
                )
                : null,

            $settings->instagram_link
                ? $this->link(
                    'instagram',
                    $settings->instagram_link,
                    'external'
                )
                : null,

            $settings->twitter_link
                ? $this->link(
                    'twitter',
                    $settings->twitter_link,
                    'external'
                )
                : null,

            $settings->tiktok_link
                ? $this->link(
                    'tiktok',
                    $settings->tiktok_link,
                    'external'
                )
                : null,

        ]));
    }

    protected function mapPages($pages)
    {
        return collect($pages)
            ->map(function ($page) {
                return $this->link(
                    $page->post_type,
                    '/' . ltrim($page->uri, '/'),
                    'internal'
                );
            })
            ->values();
    }

    protected function link($label, $href, $type)
    {
        return (new FooterLinkDTO(
            $label,
            $href,
            $type
        ))->toArray();
    }
}
