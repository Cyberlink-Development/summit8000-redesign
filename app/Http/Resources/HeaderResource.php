<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\DTO\Header\HeaderLinkDTO;

class HeaderResource extends JsonResource
{
    public function toArray($request)
    {
        $menuLinks = collect($this['menus'])->map(function ($menu) {
            return (new HeaderLinkDTO(
                $menu->post_type,
                '/' . $menu->uri,
                'internal'
            ))->toArray();
        });

        $extraLinks = collect([
            // (new HeaderLinkDTO(
            //     'Expedition',
            //     '/trips/expedition',
            //     'internal'
            // ))->toArray(),

            // (new HeaderLinkDTO(
            //     'Trekking',
            //     '/trips/trekking',
            //     'internal'
            // ))->toArray(),
        ]);

        return [
            'links' => $menuLinks->merge($extraLinks)->values(),

            'cta' => [
                'label' => 'Plan Expedition',
                'href'  => '/plan-expedition',
                'type'  => 'internal',
            ],
        ];
    }
    //     return [
    //         'links' => collect($this['menus'])->map(function ($menu) {
    //             return (new HeaderLinkDTO(
    //                 $menu->post_type,
    //                 '/' . $menu->uri,
    //                 'internal'
    //             ))->toArray();
    //         }),

    //         'cta' => [
    //             'label' => 'Plan Expedition',
    //             'href'  => '/plan-expedition',
    //             'type'  => 'internal',
    //         ],
    //     ];
    // }
}
