<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BannerResource extends JsonResource
{
    public function toArray(Request $request)
    {
        return array_filter([
            'title' => $this->title,
            'caption' => $this->caption,

            'image' => $this->picture ? [
                'path' => url($this->picture),
                'alt_text' => $this->picture_alt,
            ] : null,

            'video' => $this->video
                ? [
                    'type' => 'file',
                    'url' => url($this->video),
                ]
                : ($this->youtube_link
                    ? [
                        'type' => 'youtube',
                        'url' => $this->youtube_link,
                    ]
                    : null),

            'cta' => $this->link ? [
                'label' => $this->title,
                'href' => $this->link,
                'link_type' => str_starts_with($this->link, 'http') ? 'external' : 'internal',
            ] : null,

        ], fn ($v) => !is_null($v));
    }
}