<?php

namespace App\Enums;

enum ListingTypeEnum: string
{
    case OPEN = 'open';
    case SELL = 'sell';
    case EXCLUSIVE = 'exclusive';
    case NET = 'net';
}