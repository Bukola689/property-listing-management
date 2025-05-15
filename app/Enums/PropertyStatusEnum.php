<?php


namespace App\Enums;

enum ListingTypeEnum : string {

    case SOLD = 'Sold';

    case SALE = 'On Sale';
    
    case HOLD = 'On Hold';
}