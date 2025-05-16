<?php

namespace App\Enums;
use BenSampo\Enum\Enum;
use BenSampo\Enum\Contracts\LocalizedEnum;

enum ListingTypeEnum: string
{
    case OPEN = 'open';
    case SELL = 'sell';
    case EXCLUSIVE = 'exclusive';
    case NET = 'net';
}