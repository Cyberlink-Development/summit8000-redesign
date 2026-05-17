<?php

namespace App\Enums;

enum LinkType: string
{
    case Internal = 'internal';
    case External = 'external';
    case None     = '';
}