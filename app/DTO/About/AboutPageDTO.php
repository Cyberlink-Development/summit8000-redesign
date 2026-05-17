<?php

namespace App\DTO\About;

use App\DTO\About\Sections\CertificationsDTO;
use App\DTO\About\Sections\FounderDTO;
use App\DTO\About\Sections\StoryDTO;
use App\DTO\About\Sections\TeamSectionDTO;
use App\DTO\About\Sections\WhyDTO;
use App\DTO\Common\CtaDTO;
use App\DTO\Common\HeroDTO;
use App\DTO\Common\SeoDTO;
use App\DTO\Common\StatsDTO;
use App\DTO\Common\TestimonialsDTO;

class AboutPageDTO
{
    public function __construct(
        public readonly ?HeroDTO           $hero,
        public readonly ?StatsDTO          $stats,
        public readonly ?StoryDTO          $story,
        public readonly ?FounderDTO        $founder,
        public readonly ?TeamSectionDTO    $team,
        public readonly ?WhyDTO            $why,
        public readonly ?TestimonialsDTO   $testimonials,
        public readonly ?CertificationsDTO $certifications,
        public readonly ?CtaDTO            $cta,
        public readonly ?SeoDTO           $seo,
    ) {}

    public static function fromData(array $data): self
    {
        $sections = $data['sections'];
        $model    = $data['model'];

        return new self(
            hero: isset($sections['hero']) ? HeroDTO::fromPost($sections['hero'], 'About Us') : null,
            stats: isset($sections['stats']) ? StatsDTO::fromPost($sections['stats']) : null,
            story: isset($sections['story']) ? StoryDTO::fromPost($sections['story']) : null,
            founder: isset($sections['founder']) ? FounderDTO::fromPost($sections['founder']) : null,
            team: isset($sections['team']) ? TeamSectionDTO::fromPost($sections['team']) : null,
            why: isset($sections['why']) ? WhyDTO::fromPost($sections['why']) : null,
            testimonials: isset($sections['testimonials']) ? TestimonialsDTO::fromPost($sections['testimonials']) : null,
            certifications: isset($sections['certifications']) ? CertificationsDTO::fromPost($sections['certifications']) : null,
            cta: isset($sections['cta']) ? CtaDTO::fromPost($sections['cta']) : null,
            seo: SeoDTO::fromModel($model),
        );
    }

    public function toArray(): array
    {
        return [
            'hero'           => $this->hero?->toArray() ?? [],
            'stats'          => $this->stats?->toArray() ?? [],
            'story'          => $this->story?->toArray() ?? [],
            'founder'        => $this->founder?->toArray() ?? [],
            'team'           => $this->team?->toArray() ?? [],
            'why'            => $this->why?->toArray() ?? [],
            'testimonials'   => $this->testimonials?->toArray() ?? [],
            'certifications' => $this->certifications?->toArray() ?? [],
            'cta'            => $this->cta?->toArray() ?? [],
            'seo'            => $this->seo?->toArray() ?? [],
        ];
    }
}