<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorit extends Model
{
    protected $fillable = [
            'user_id',
            'listing_id'
        ];


    public function Listing(){
        return $this->belongsTo('App\Listing');
    }
}
