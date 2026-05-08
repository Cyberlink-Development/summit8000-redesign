<?php

namespace App\DTO\About;

class AboutPageDTO
{
    public function __construct(
        public array $hero = [],
        public array $stats = [],
        public array $story = [],
        public array $founder = [],
        public array $team = [],
        public array $why = [],
        public array $testimonials = [],
        public array $certifications = [],
        public array $cta = [],
        public array $seo = [],
    ) {}

    public function toArray(): array
    {
        return [
            'hero' => $this->hero,
            'stats' => $this->stats,
            'story' => $this->story,
            'founder' => $this->founder,
            'team' => $this->team,
            'why' => $this->why,
            'testimonials' => $this->testimonials,
            'certifications' => $this->certifications,
            'cta' => $this->cta,
            'seo' => $this->seo,
        ];
    }
}
