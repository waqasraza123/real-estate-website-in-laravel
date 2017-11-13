<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListingAttribute extends Model
{
    protected  $fillable = [
        'listing_type',
        'beds_count',
        'baths_count',
        'square_feet',
        'rent',
        'deposit',
        'available_date',
        'lease_length',
        'listing_id'
    ];
}
