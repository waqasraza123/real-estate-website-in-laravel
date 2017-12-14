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
        'no_smocking',
        'state',
        'zip_code',
        'school_dc',
        'name',
        'city',
        'br_le_ye',
        'ev_ye',
        'ba_ye',
        'fo_ye',
        'wq-street_number',
        'wq-street_address'	,
        'title',

	'wq-intersection'	,


	'wq-administrative_area_level_1'	,


	'wq-administrative_area_level_2',


	'wq-administrative_area_level_3',


	'wq-administrative_area_level_4'	,


	'wq-administrative_area_level_5',


	'wq-route'		,


	'wq-neighbourhood'		,


	'wq-country'	,


	'wq-county'		,


	'wq-sublocality'	,


	'wq-neighborhood'
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

    public function ListingAttr(){
        return $this->hasMany(ListingAttribute::class, 'listing_id', 'id');
    }
}
