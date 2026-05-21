<?php

namespace App\Http\Resources;

use App\DTO\Pages\BlogListPageDTO;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BlogListResource extends JsonResource
{
    public function __construct(
        public mixed $postType,
        public mixed $posts,
    ) {
        parent::__construct($postType);
    }

    public function toArray(Request $request): array
    {
        return BlogListPageDTO::fromModel(
            postType: $this->postType,
            posts: $this->posts,
        )->toArray();
    }
}