<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserNotification extends Model
{
    protected  $fillable = [
        'user_id',
        'saved_searches',
        'favorites',
        'delivery_option'
    ];
}
