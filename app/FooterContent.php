<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FooterContent extends Model
{
    protected $fillable = [
        'text',
        'address',
        'email',
        'phone'
    ];
}
