<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = ['id','photo','name','content'];
    use Searchable;

    public function searchableAs()
    {
        return 'blogs_blog';
    }
}
