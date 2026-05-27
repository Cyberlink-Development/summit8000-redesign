<?php

namespace App\DTO\Pages;

use App\DTO\Common\SeoDTO;
use App\Models\Team\TeamModel;

class TeamDetailPageDTO
{
    public function __construct(
        public readonly ?string $template,
        public readonly ?string $slug,
        public readonly array   $hero,
        public readonly array   $stats,
        public readonly array   $about,
        public readonly array   $info,
        public readonly array   $achievements,
        public readonly array   $gallery,
        public readonly array   $social,
        public readonly array   $cta,
        public readonly ?SeoDTO $seo,
    ) {}

    public static function fromModel(TeamModel $member): self
    {
        return new self(
            template:     $member->template,
            slug:         slug_formatter($member->slugs()->first()->slug),
            hero:         self::buildHero($member),
            stats:        self::buildStats($member),
            about:        self::buildAbout($member),
            info:         self::buildInfo($member),
            achievements: self::buildAchievements($member),
            gallery:      self::buildGallery($member),
            social:       self::buildSocial($member),
            cta:          self::buildCta($member),
            seo:          SeoDTO::fromModel($member),
        );
    }

    public function toArray(): array
    {
        return [
            'template'     => $this->template,
            'slug'         => $this->slug,
            'hero'         => $this->hero,
            'stats'        => $this->stats,
            'about'        => $this->about,
            'info'         => $this->info,
            'achievements' => $this->achievements,
            'gallery'      => $this->gallery,
            'social'       => $this->social,
            'cta'          => $this->cta,
            'seo'          => $this->seo?->toArray(),
        ];
    }

    // ─────────────────────────────────────────────
    // Builders
    // ─────────────────────────────────────────────

    private static function buildHero(TeamModel $member): array
    {
        return [
            'banner' => [
                'url' => $member->thumbnail
                    ? asset('uploads/team/' . $member->thumbnail)
                    : asset('theme-assets/assets/trip/8000.jpg'),
                'alt' => $member->name . ' - ' . $member->position,
            ],
            'title'       => $member->name,
            'sub_title'   => $member->position,
            'caption'     => 'Summit 8000 Guide',
            'description' => $member->brief,
        ];
    }

    private static function buildStats(TeamModel $member): array
    {
        return [
            ['value' => $member->experience,     'label' => 'Years Experience'],
            ['value' => $member->everest_summits, 'label' => 'Everest Summits'],
        ];
    }

    private static function buildAbout(TeamModel $member): array
    {
        return [
            'caption'     => 'Biography',
            'title'       => 'A Life Lived Vertical',
            'excerpt'     => $member->brief,
            'description' => $member->content,
            'highlight'   => $member->highlight,
        ];
    }

    private static function buildInfo(TeamModel $member): array
    {
        return [
            'title' => 'Personal Information',
            'items' => [
                ['label' => 'Full Name',   'value' => $member->name],
                ['label' => 'Role',        'value' => $member->position],
                ['label' => 'Experience',  'value' => $member->experience],
                ['label' => 'Languages',   'value' => $member->languages],
                ['label' => 'Base',        'value' => $member->location],
                ['label' => 'Contact',     'value' => $member->email],
            ],
        ];
    }

    private static function buildAchievements(TeamModel $member): array
    {
        return [
            'caption' => 'Highlights',
            'title'   => 'Achievements & Milestones',
            'items'   => $member->achievements ?? [],
        ];
    }

    private static function buildGallery(TeamModel $member): array
    {
        return [
            'caption' => 'Gallery',
            'title'   => 'Moments on the Mountain',
            'items'   => $member->gallery ?? [],
        ];
    }

    private static function buildSocial(TeamModel $member): array
    {
        return [
            'caption' => 'Connect',
            'title'   => 'Find ' . $member->name . ' Online',
            'items'   => [
                [
                    'label' => 'instagram',
                    'value' => $member->instagram,
                    'href'  => $member->instagram_url,
                    'type'  => 'external',
                ],
                [
                    'label' => 'linkedin',
                    'value' => $member->linkedin_url,
                    'href'  => $member->linkedin,
                    'type'  => 'external',
                ],
                [
                    'label' => 'email',
                    'value' => $member->email,
                    'href'  => 'mailto:' . $member->email,
                    'type'  => 'external',
                ],
            ],
        ];
    }

    private static function buildCta(TeamModel $member): array
    {
        return [
            'caption'     => 'Plan Your Expedition',
            'title'       => 'Trek with ' . $member->name,
            'description' => 'Ready to experience the Himalayas with one of Nepal\'s most respected guides?',
            'primary'     => [
                'label' => 'Send an Inquiry',
                'href'  => '/contact',
                'type'  => 'internal',
            ],
        ];
    }
}