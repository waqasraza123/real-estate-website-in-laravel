<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    protected $fillable = [
        'address',
        'unit',
        'listing_type',
        'beds_count',
        'baths_count',
        'square_feet',
        'rent',
        'deposit',
        'available_date',
        'lease_length',
        'description',
        'dogs',
        'cats',
        'no_pets',
        'no_smocking',
        'furnished',
        'wheelchair',
        'loundry_type',
        'parking_type',
        'parking_fee',
        'user_id'
    ];

    public function ListingsImages(){
        return $this->hasMany('App\ListingImage');
    }
}
