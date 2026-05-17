<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\DTO\Header\HeaderLinkDTO;

class HeaderResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'links' => collect($this['menus'])->map(function ($menu) {
                return (new HeaderLinkDTO(
                    $menu->post_type,
                    '/' . $menu->uri,
                    'internal'
                ))->toArray();
            }),

            'cta' => [
                'label' => 'Plan Expedition',
                'href' => '/plan-expedition',
                'type' => 'internal',
            ],
        ];
    }
}
