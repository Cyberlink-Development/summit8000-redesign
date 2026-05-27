<?php

namespace App\DTO\Pages;

class TeamMemberDTO
{
    public function __construct(
        public readonly ?string $slug,
        public readonly ?string $title,
        public readonly ?string $sub_title,
        public readonly ?string $caption,
        public readonly ?string $href,
        public readonly ?string $avatar,
        public readonly ?array  $thumbnail,
        public readonly ?string $excerpt,
        public readonly array   $tags,
    ) {}

    public static function fromModel($member): self
    {
        return new self(
            slug:      slug_formatter($member->slugs()->first()->slug),
            title:     $member->name,
            sub_title: $member->position,
            caption:   $member->category == 1 ? 'Leadership' : 'Guide',
            href:      $member->slugs()->first()->slug,
            avatar:    strtoupper(substr($member->name, 0, 2)),
            thumbnail: [
                'url' => $member->thumbnail
                    ? asset('uploads/team/' . $member->thumbnail)
                    : asset('theme-assets/assets/trip/2.jpg'),
                'alt' => $member->name,
            ],
            excerpt: $member->content,
            tags:    $member->tags ?? [],
        );
    }

    public static function collect(array $items): array
    {
        return array_map(fn($item) => self::fromModel($item)->toArray(), $items);
    }

    public function toArray(): array
    {
        return [
            'slug'      => $this->slug,
            'title'     => $this->title,
            'sub_title' => $this->sub_title,
            'caption'   => $this->caption,
            'href'      => $this->href,
            'avatar'    => $this->avatar,
            'thumbnail' => $this->thumbnail,
            'excerpt'   => $this->excerpt,
            'tags'      => $this->tags,
        ];
    }
}