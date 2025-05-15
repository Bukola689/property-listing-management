<?php


namespace App\Enums;

enum ListingTypeEnum : string {

    case SINGLE = 'Single Family Home';

    case TOWNHOUSE = 'TownHouse';
    
    case MULTIFAMILY = 'Multi-Family Home';

    case BIUNGALOW = 'Bungalow';
}