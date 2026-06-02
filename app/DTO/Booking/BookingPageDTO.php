<?php

namespace App\DTO\Booking;

use App\DTO\Common\SeoDTO;
use App\Models\Travels\TripModel;

class BookingPageDTO
{
    public function __construct(
        public readonly array $hero,
        public readonly array $detail,
        public readonly array $steps,
        public readonly array $form_blocks,
        public readonly array $countries,
        public readonly array $payment_options,
        public readonly array $hbl_notice,
        public readonly array $settings,
        public readonly array $card_logos,
        public readonly array $trust_items,
        public readonly ?SeoDTO $seo,
    ) {}

    public static function fromModel(TripModel $trip): self
    {
        return new self(
            hero:            self::hero($trip),
            detail:          self::tripinfo($trip),
            steps:           self::steps(),
            form_blocks:     self::formBlocks(),
            countries:       self::countries(),
            payment_options: self::paymentOptions(),
            hbl_notice:      self::hblNotice(),
            settings:        self::settings(),
            card_logos:      self::cardLogos(),
            trust_items:     self::trustItems(),
            seo:             SeoDTO::fromModel($trip),
        );
    }

    public function toArray(): array
    {
        return [
            'hero'            => $this->hero,
            'detail'          => $this->detail,
            'steps'           => $this->steps,
            'form_blocks'     => $this->form_blocks,
            'countries'       => $this->countries,
            'payment_options' => $this->payment_options,
            'hbl_notice'      => $this->hbl_notice,
            ...$this->settings,
            'card_logos'      => $this->card_logos,
            'trust_items'     => $this->trust_items,
            'seo'             => $this->seo,
        ];
    }

    private static function hero($trip): array
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
    private static function tripInfo($trip): array
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

    private static function steps(): array
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

    private static function formBlocks(): array
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

    private static function countries(): array
    {
        return config('countries', []);
    }

    private static function paymentOptions(): array
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

    private static function hblNotice(): array
    {
        return [
            'logo_text' => 'HBL',

            'body' => 'You will be redirected to Himalayan Bank Limited (HBL) Card Processing for payment. Once the payment is complete, you will be automatically redirected back to our website. Please do not close this window until the process is finished.',
        ];
    }

    private static function settings(): array
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

    private static function cardLogos(): array
    {
        return [
            'VISA',
            'AMEX',
            'MC',
            'UnionPay',
        ];
    }

    private static function trustItems(): array
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
