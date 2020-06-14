<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $guarded = [];

    public function Category()
    {
        return $this->hasOne('App\Category','id','category_id');
    }
    public function Author()
    {
        return $this->hasOne('App\User','id','author_id');
    }
}
