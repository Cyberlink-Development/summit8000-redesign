<?php

namespace App\Enums;

enum LinkType: string
{
    case Internal = 'internal';
    case External = 'external';
    case None     = '';

    public static function fromString(string $value): self
    {
        return match($value) {
            'internal' => self::Internal,
            'external' => self::External,
            default    => self::None,
        };
    }
}