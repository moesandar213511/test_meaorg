<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = [
        'id',
        'name',
        'phone',
        'position',
        'address',
        'education',
        'detail',
        'photo',
        'fb_link',
        'tw_link',
        'in_link'
    ];
}
