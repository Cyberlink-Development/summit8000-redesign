<?php

namespace App\DTO\Pages;

use App\DTO\Common\SeoDTO;
use App\DTO\Pages\TeamMemberDTO;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class TeamListPageDTO
{
    public function __construct(
        public readonly ?string $template,
        public readonly ?array  $hero,
        public readonly ?array  $leadership,
        public readonly ?array  $guides,
        public readonly ?array  $stats,
        public readonly ?array  $join_cta,
        public readonly ?SeoDTO $seo,
    ) {}

    public static function fromModel(
        $page,
        $leadership,
        LengthAwarePaginator $guides,
    ): self {
        return new self(
            template: 'team-list',

            hero: [
                'banner' => [
                    'url' => $page?->banner
                        ? asset('uploads/original/' . $page->banner)
                        : asset('theme-assets/assets/trip/8000.jpg'),
                    'alt' => $page?->post_type,
                ],
                'caption'     => $page?->caption,
                'title'       => $page?->post_type,
                'description' => $page?->description,
            ],

            leadership: [
                'caption'     => 'Leadership',
                'title'       => 'Meet Our Core Team',
                'description' => 'Our leadership team brings decades of combined Himalayan experience.',
                'items'       => TeamMemberDTO::collect($leadership->all()),
            ],

            guides: [
                'caption' => 'Field Experts',
                'title'   => 'Our Trekking Guides',
                'items'   => TeamMemberDTO::collect($guides->items()),
            ],

            stats: [
                ['value' => '22+',  'label' => 'Expert Guides'],
                ['value' => '340+', 'label' => 'Years Combined Experience'],
            ],

            join_cta: [
                'caption'     => 'Join Our Family',
                'title'       => 'Passionate About Mountains?',
                'description' => 'We\'re always looking for experienced guides.',
                'cta' => [
                    'label' => 'Explore Careers',
                    'href'  => '/careers',
                    'type'  => 'internal',
                ],
            ],

            seo: SeoDTO::fromModel($page),
        );
    }

    public function toArray(): array
    {
        return [
            'template'   => $this->template,
            'hero'       => $this->hero,
            'leadership' => $this->leadership,
            'guides'     => $this->guides,
            'stats'      => $this->stats,
            'join_cta'   => $this->join_cta,
            'seo'        => $this->seo?->toArray(),
        ];
    }
}