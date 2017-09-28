<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected$fillable = [
        'title',
        'user_id',
        'listing_id',
        'description'
    ];


    public function Listing(){
        return $this->belongsTo('App\Listing');
    }


}
