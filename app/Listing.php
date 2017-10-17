<?php

namespace App;

use App\User;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{

    use Sluggable;

    public function sluggable()
    {
        return [
            'title' => [
                'source' => 'address'
            ]
        ];
    }

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
        'user_id',
        'lat',
        'lng',
        'listing_status',
        'featured',
        'approved',
        'broken_lease',
        'eviction',
        'misdemeanor',
        'falonies',
        'section_8',
        'hud',
        'income_r',
        'bankruptcy',
        'foreclosure',
        'credit',
        'move_in',
        'possession',
        'possession_w',
        'assault',
        'herassment',
        'theft_of',
        'dwi',
        'dui',
        'disorderly',
        'theft',
        'washer_dryer',
        'washer_dryer_hockups',
        'onsite_laundry',
        'fitness_center',
        'pool',
        'no_smocking'
    ];

    public function ListingsImages(){
        return $this->hasMany('App\ListingImage');
    }


    public static function GetUser($id){
        $user = User::where('id' , $id)->first();
        return $user;
    }

    public function User(){
        return $this->belongsTo('App\User');
    }

    public function Favorites(){
        return $this->hasMany('App\Favorit');
    }

    public function Reviews(){
        return $this->hasMany('App\Review');
    }
}
