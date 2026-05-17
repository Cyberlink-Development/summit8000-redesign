<?php

namespace App\DTO\Common;

class HeroDTO
{
    public function __construct(
        public readonly ?ImageDTO      $banner,
        public readonly ?BreadcrumbDTO $breadcrumb,
        public readonly ?string        $caption,
        public readonly ?string        $title,
        public readonly ?string        $description,
    ) {}

    public static function fromPost(
        $post,
        string  $currentLabel,
        ?string $previousLabel = 'Home',
        ?string $previousHref  = '/',
    ): self {
        return new self(
            banner: ImageDTO::make(
                $post->page_thumbnail ?? '',
                $post->post_title     ?? '',
            ),
            breadcrumb: BreadcrumbDTO::make(
                currentLabel:  $currentLabel,
                previousLabel: $previousLabel,
                previousHref:  $previousHref,
            ),
            caption:     $post->caption      ?? '',
            title:       $post->post_title   ?? '',
            description: $post->post_content ?? '',
        );
    }

    public function toArray(): array
    {
        return [
            'banner'      => $this->banner->toArray(),
            'breadcrumb'  => $this->breadcrumb->toArray(),
            'caption'     => $this->caption,
            'title'       => $this->title,
            'description' => $this->description,
        ];
    }
}