<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SavedSearch extends Model
{
    protected  $fillable = [
        'user_id',
        'address',
        'beds',
        'baths',
        'rent'
    ];
}
