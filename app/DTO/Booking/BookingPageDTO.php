<?php

namespace App\DTO\Booking;

use App\DTO\Common\SeoDTO;

class BookingPageDTO
{
    public function __construct(
        protected $trip
    ) {
    }

    public function toArray(): array
    {
        return [

            'hero' => $this->hero($this->trip),

            'detail' => $this->tripinfo($this->trip),

            'steps' => $this->steps(),

            'form_blocks' => $this->formBlocks(),

            'countries' => $this->countries(),

            'payment_options' => $this->paymentOptions(),

            'hbl_notice' => $this->hblNotice(),

            ...$this->settings(),

            'card_logos' => $this->cardLogos(),

            'trust_items' => $this->trustItems(),

            'seo' => SeoDTO::fromModel($this->trip),
        ];
    }

    protected function hero($trip): array
    {
        return [
            'breadcrumb' => [
                [
                    'label' => 'Home',
                    'href' => '/',
                ],
                [
                    'label' => $trip->trip_title,
                    'href' => $trip->slugs()?->first()?->slug,
                ],
                [
                    'label' => 'Book Now',
                ],
            ],

            'title' => 'Secure Your',

            'title_em' => 'Summit',
        ];
    }
    protected function tripInfo($trip): array
    {
        return [

            'title' => $trip->trip_title,

            'price' => $trip->price,

            'duration' => $trip->duration,

            'thumbnail' => [
                'url' => $trip->thumbnail
                    ? asset('uploads/original/' . $trip->thumbnail)
                    : asset('images/placeholder-thumbnail.webp'),

                'alt' => $trip->thumbnail_alt ?? $trip->trip_title,
            ],
        ];
    }

    protected function steps(): array
    {
        return [
            [
                'num' => '01',
                'label' => 'Trip Details',
                'active' => true,
            ],
            [
                'num' => '02',
                'label' => 'Your Information',
                'active' => true,
            ],
            [
                'num' => '03',
                'label' => 'Payment',
                'active' => true,
            ],
            [
                'num' => '04',
                'label' => 'Confirmation',
                'active' => false,
            ],
        ];
    }

    protected function formBlocks(): array
    {
        return [
            [
                'id' => 'date-travelers',
                'icon' => 'calendar',
                'title' => 'Date and Travelers',
                'step_label' => 'Step 01 / 03',
            ],
            [
                'id' => 'lead-traveler',
                'icon' => 'compass',
                'title' => 'Lead Traveler Details',
                'step_label' => 'Step 02 / 03',
            ],
            [
                'id' => 'payment',
                'icon' => 'lock',
                'title' => 'Payment Options',
                'step_label' => 'Step 03 / 03',
            ],
        ];
    }

    protected function countries(): array
    {
        return config('countries', []);
    }

    protected function paymentOptions(): array
    {
        return [
            [
                'id' => 'pay20',
                'icon' => 'shield',
                'label' => '20% Deposit',
                'note' => 'Pay deposit now, balance in Kathmandu',
                'default' => true,
            ],
            [
                'id' => 'payFull',
                'icon' => 'bolt',
                'label' => 'Full Payment',
                'note' => 'Pay total amount now',
                'default' => false,
            ],
        ];
    }

    protected function hblNotice(): array
    {
        return [
            'logo_text' => 'HBL',

            'body' => 'You will be redirected to Himalayan Bank Limited (HBL) Card Processing for payment. Once the payment is complete, you will be automatically redirected back to our website. Please do not close this window until the process is finished.',
        ];
    }

    protected function settings(): array
    {
        return [

            'terms_href' => '/terms-and-conditions',

            'cancellation_href' => '/terms-and-conditions',

            'proceed_label' => 'Proceed to Secure Payment',

            'trip_summary_title' => 'Your Trip Details',

            'deposit_percent' => 20,

            'deposit_note' => 'You pay the balance amount after arriving in Kathmandu before the trip starts.',

            'security_text' => '3D Secure & SSL encrypted payment. Your card details are safe.',
        ];
    }

    protected function cardLogos(): array
    {
        return [
            'VISA',
            'AMEX',
            'MC',
            'UnionPay',
        ];
    }

    protected function trustItems(): array
    {
        return [
            [
                'icon' => 'check',
                'text_strong' => 'Free cancellation',

                'text_rest' => 'up to 60 days before departure. No questions asked.',
            ],
            [
                'icon' => 'mountain',
                'text_strong' => '27+ years',

                'text_rest' => 'guiding elite Himalayan expeditions safely.',
            ],
            [
                'icon' => 'phone',
                'text_strong' => '24/7 support',

                'text_rest' => 'from our Kathmandu base throughout your journey.',
            ],
            [
                'icon' => 'shield',
                'text_strong' => 'Fully licensed',

                'text_rest' => 'by Nepal Tourism Board & Mountaineering Association.',
            ],
        ];
    }

}
