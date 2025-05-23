<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyCharacteristic extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [
        'properyt_id', 'price', 'bedrooms', 'bathrooms','sqft','price_sqft', 'property_type', 'status'
    ];
}
