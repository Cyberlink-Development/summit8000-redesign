<?php

namespace App\Http\Resources;

use App\DTO\Pages\BlogDetailPageDTO;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Posts\PostModel;

class BlogDetailResource extends JsonResource
{
    public function __construct(
        public PostModel $blogs,
    ) {
        parent::__construct($blogs);
    }

    public function toArray(Request $request): array
    {
        return BlogDetailPageDTO::fromModel(
            blogs: $this->blogs,
        )->toArray();
    }
}
