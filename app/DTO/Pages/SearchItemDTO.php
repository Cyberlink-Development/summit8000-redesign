<?php

namespace App\DTO\Pages;

class SearchItemDTO
{
    public function __construct(
        public readonly string $title,
        public readonly string $description,
        public readonly array  $thumbnail,
        public readonly array  $cta,
    ) {}

    public static function fromPost(object $post): self
    {
        $slug = $post->slugs()->first();
        return new self(
            title:       $post->post_title,
            description: $post->post_excerpt ?? '',
            thumbnail: [
                'url' => asset('uploads/original/' . $post->page_thumbnail),
                'alt' => $post->post_title,
            ],
            cta: [
                'label' => 'View Post',
                'href'  => $slug ? slug_formatter($slug->slug) : '#',
                'type'  => 'internal',
            ],
        );
    }

    public static function fromTrip(object $trip): self
    {
        $slug = $trip->slugs()->first();
        return new self(
            title:       $trip->trip_title,
            description: $trip->overview ?? '',
            thumbnail: [
                'url' => asset('uploads/original/' . $trip->thumbnail),
                'alt' => $trip->trip_title,
            ],
            cta: [
                'label' => 'View Trip',
                'href'  => $slug ? slug_formatter($slug->slug) : '#',
                'type'  => 'internal',
            ],
        );
    }

    public function toArray(): array
    {
        return [
            'title'       => $this->title,
            'description' => $this->description,
            'thumbnail'   => $this->thumbnail,
            'cta'         => $this->cta,
        ];
    }

    public static function collect(array $posts, array $trips): array
    {
        $postItems = array_map(fn($p) => self::fromPost($p)->toArray(), $posts);
        $tripItems = array_map(fn($t) => self::fromTrip($t)->toArray(), $trips);

        return array_merge($postItems, $tripItems);
    }
}