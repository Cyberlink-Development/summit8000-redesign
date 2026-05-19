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
            'tagline'   => $settings->site_name,
            'copyright' => $settings->copyright_text,

            'link_groups' => [
                [
                    'slug'  => 'expeditions',
                    'label' => 'Expeditions',
                    'items' => collect($this['expedition_pages'] ?? [])->map(function ($page) {
                        return (new FooterLinkDTO(
                            $page->post_type,
                            '/' . $page->uri,
                            'internal'
                        ))->toArray();
                    }),
                ],
                [
                    'slug'  => 'company',
                    'label' => 'Company',
                    'items' => collect($this['pages'])->map(function ($page) {
                        return (new FooterLinkDTO(
                            $page->post_type,
                            '/' . $page->uri,
                            'internal'
                        ))->toArray();
                    }),
                ],
                [
                    'slug'  => 'contact',
                    'label' => 'Contact',
                    'items' => array_filter([
                        $settings->address
                            ? (new FooterLinkDTO($settings->address, '', ''))->toArray()
                            : null,
                        $settings->phone
                            ? (new FooterLinkDTO($settings->phone, 'tel:' . $settings->phone, 'external'))->toArray()
                            : null,
                        $settings->email
                            ? (new FooterLinkDTO($settings->email, 'mailto:' . $settings->email, 'external'))->toArray()
                            : null,
                    ]),
                ],
            ],

            'partner_links' => collect($this['partner_links'] ?? [])->map(function ($partner) {
                return (new FooterLinkDTO(
                    $partner['label'],
                    $partner['href'],
                    'external'
                ))->toArray();
            }),

            'social_links' => array_filter([
                $settings->facebook_link
                    ? (new FooterLinkDTO('facebook', $settings->facebook_link, 'external'))->toArray()
                    : null,
                $settings->linkedin_link
                    ? (new FooterLinkDTO('linkedin', $settings->linkedin_link, 'external'))->toArray()
                    : null,
                $settings->youtube_link
                    ? (new FooterLinkDTO('youtube', $settings->youtube_link, 'external'))->toArray()
                    : null,
                $settings->instagram_link
                    ? (new FooterLinkDTO('instagram', $settings->instagram_link, 'external'))->toArray()
                    : null,
            ]),
        ];
    }
}
