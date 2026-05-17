<?php

namespace App\DTO\Common;

use App\Enums\LinkType;

class CtaDTO
{
    public function __construct(
        public readonly string  $caption,
        public readonly string  $title,
        public readonly string  $description,
        public readonly LinkDTO $primary,
        public readonly LinkDTO $secondary,
        public readonly array   $contacts,
    ) {}

    public static function fromPost($post): self
    {
        $contacts = collect($post->meta['contacts'] ?? [])
            ->map(fn($c) => [
                'label' => $c['label'] ?? '',
                'value' => $c['value'] ?? '',
                'href'  => $c['href']  ?? null,
                'type'  => $c['type']  ?? null,
            ])
            ->all();

        return new self(
            caption:     $post->caption      ?? '',
            title:       $post->post_title   ?? '',
            description: $post->post_content ?? '',
            primary: LinkDTO::make(
                $post->meta['primary']['label'] ?? '',
                $post->meta['primary']['href']  ?? '',
                LinkType::Internal,
            ),
            secondary: LinkDTO::make(
                $post->meta['secondary']['label'] ?? '',
                $post->meta['secondary']['href']  ?? '',
                LinkType::Internal,
            ),
            contacts: $contacts,
        );
    }

    public function toArray(): array
    {
        return [
            'caption'     => $this->caption,
            'title'       => $this->title,
            'description' => $this->description,
            'primary'     => $this->primary->toArray(),
            'secondary'   => $this->secondary->toArray(),
            'contacts'    => $this->contacts,
        ];
    }
}