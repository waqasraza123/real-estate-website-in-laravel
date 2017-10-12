<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'user_id',
        'post_id',
        'text'
    ];


    public function User(){
        return $this->belongsTo('App\User');
    }


}
