<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Listing_propertie extends Model
{
    protected  $fillable = [
        'listing_id',
        'listing_type',
        'beds_count',
        'baths_count',
        'square_feet',
        'rent',
        'deposit',
        'available_date',
        'lease_length',
    ];
}
