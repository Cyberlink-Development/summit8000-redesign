<?php

namespace App\DTO\Booking;

use App\DTO\Common\SeoDTO;
use App\Models\Settings\SettingModel;
use Illuminate\Support\Collection;

class CustomizeTripDTO
{
    public function __construct(
        protected ?SettingModel $setting,
        protected Collection $trips
    ) {}

    public function toArray(): array
    {
        return [
            'data' => [
                'caption' => 'Plan Your Ascent',

                'heading' => 'Customize Your',

                'heading_em' => 'Expedition',

                'description' => 'Every summit is personal. Tell us your ambitions and our expert Sherpa team will craft a bespoke Himalayan journey tailored precisely to your experience, timeline, and goals.',

                'response_badge' => 'Responds within 24 hours',

                'trust_items' => $this->trustItems(),

                'form' => $this->form(),

                'success_state' => $this->successState(),

                'seo' => $this->setting ? SeoDTO::fromModel($this->setting) : null,
            ]
        ];
    }

    protected function trustItems(): array
    {
        return [
            [
                'icon' => 'mountain',
                'title' => 'Expert Route Planning',
                'description' => 'Personalized itineraries built by certified high-altitude guides with 25+ years on 8000m peaks.',
            ],
        ];
    }

    protected function form(): array
    {
        return [
            'header' => [
                'eyebrow' => 'Begin Your Journey',
                'title' => 'Customize',
                'title_em' => 'Your Trip',
            ],

            'group_sizes' => [
                [
                    'value' => 'solo',
                    'label' => 'Solo (1)',
                ],
                [
                    'value' => 'pair',
                    'label' => 'Pair (2)',
                ],
                [
                    'value' => 'small',
                    'label' => 'Small (3–5)',
                ],
                [
                    'value' => 'medium',
                    'label' => 'Medium (6–10)',
                ],
                [
                    'value' => 'large',
                    'label' => 'Large (11–20)',
                ],
                [
                    'value' => 'corporate',
                    'label' => 'Corporate (20+)',
                ],
            ],

            'countries' => config('countries', []),

            'trip_list' => $this->tripList(),

            'terms_href' => '/terms-and-conditions',

            'submit_label' => 'Submit Enquiry',
        ];
    }
    protected function tripList(): array
    {
        return $this->trips->map(function ($trip) {

            return [
                'title' => $trip->trip_title,
                'slug' => $trip->slugs?->first()?->slug,
                'altitude' => $trip->max_altitude,
                'season' => $trip->best_season,
            ];

        })->toArray();
    }

    protected function successState(): array
    {
        return [
            'title' => 'Enquiry',

            'title_em' => 'Received',

            'description' => 'Thank you for reaching out. Our expedition specialists will review your trip details and contact you within 24 hours with a personalized itinerary and quote.',
        ];
    }
}
