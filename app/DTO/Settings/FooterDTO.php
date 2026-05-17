<?php

namespace App\DTO\Settings;

use App\DTO\Common\LinkDTO;
use App\Enums\LinkType;
use Illuminate\Support\Collection;

class FooterDTO
{
    public function __construct(
        public readonly string $tagline,
        public readonly string $copyright,
        public readonly array  $linkGroups,
        public readonly array  $socialLinks,
        public readonly array  $partnerLinks,
    ) {}

    public static function fromData($settings, Collection $pages): self
    {
        $companyGroup = new FooterLinkGroupDTO(
            slug:  'company',
            label: 'Company',
            items: $pages->map(fn($page) =>
                LinkDTO::make($page->post_type, '/' . $page->uri, LinkType::Internal)->toArray()
            )->toArray(),
        );

        $contactItems = array_values(array_filter([
            $settings->address
                ? LinkDTO::make($settings->address, '', LinkType::None)->toArray()
                : null,
            $settings->phone
                ? LinkDTO::make($settings->phone, 'tel:' . $settings->phone, LinkType::External)->toArray()
                : null,
            $settings->email
                ? LinkDTO::make($settings->email, 'mailto:' . $settings->email, LinkType::External)->toArray()
                : null,
        ]));

        $contactGroup = new FooterLinkGroupDTO(
            slug:  'contact',
            label: 'Contact',
            items: $contactItems,
        );

        $expeditionsGroup = new FooterLinkGroupDTO(
            slug:  'expeditions',
            label: 'Expeditions',
            items: [],
        );

        $socialLinks = array_values(array_filter([
            $settings->facebook_link
                ? LinkDTO::make('facebook', $settings->facebook_link, LinkType::External)->toArray()
                : null,
            $settings->linkedin_link
                ? LinkDTO::make('linkedin', $settings->linkedin_link, LinkType::External)->toArray()
                : null,
            $settings->youtube_link
                ? LinkDTO::make('youtube', $settings->youtube_link, LinkType::External)->toArray()
                : null,
            $settings->instagram_link
                ? LinkDTO::make('instagram', $settings->instagram_link, LinkType::External)->toArray()
                : null,
        ]));

        return new self(
            tagline:      $settings->site_name,
            copyright:    $settings->copyright_text,
            linkGroups:   [$expeditionsGroup, $companyGroup, $contactGroup],
            socialLinks:  $socialLinks,
            partnerLinks: [],
        );
    }

    public function toArray(): array
    {
        return [
            'tagline'       => $this->tagline,
            'copyright'     => $this->copyright,
            'link_groups'   => $this->linkGroups,
            'partner_links' => $this->partnerLinks,
            'social_links'  => $this->socialLinks,
        ];
    }
}