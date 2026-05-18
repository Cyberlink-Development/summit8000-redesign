<?php

namespace App\DTO\About\Items;

use App\DTO\Common\ImageDTO;

class TeamMemberDTO
{
    public function __construct(
        public readonly string   $uuid,
        public readonly string   $slug,
        public readonly string   $title,
        public readonly string   $subTitle,
        public readonly int      $experienceYears,
        public readonly ImageDTO $thumbnail,
        public readonly string   $description,
        public readonly array    $badges,
    ) {}

    public static function fromArray(array $item): self
    {
        return new self(
            uuid:            $item['uuid']             ?? '',
            slug:            $item['slug']             ?? '',
            title:           $item['title']            ?? '',
            subTitle:        $item['sub_title']        ?? '',
            experienceYears: (int) ($item['experience_years'] ?? 0),
            thumbnail:       ImageDTO::make(
                $item['thumbnail']['url'] ?? '',
                $item['thumbnail']['alt'] ?? '',
            ),
            description: $item['description'] ?? '',
            badges:      $item['badges']      ?? [],
        );
    }

    public static function collect(array $items): array
    {
        return array_map(fn($item) => self::fromArray($item)->toArray(), $items);
    }

    public function toArray(): array
    {
        return [
            'uuid'             => $this->uuid,
            'slug'             => $this->slug,
            'title'            => $this->title,
            'sub_title'        => $this->subTitle,
            'experience_years' => $this->experienceYears,
            'thumbnail'        => $this->thumbnail->toArray(),
            'description'      => $this->description,
            'badges'           => $this->badges,
        ];
    }
}