<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    public function books()
    {
      return $this->hasMany('App\Book');
    }
    public function posts()
    {
      return $this->hasMany('App\Post');
    }
}
