<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
  protected $table = 'courses';
  public function user()
  {
    return $this->hasMany('App\User', 'course');
  }
}
