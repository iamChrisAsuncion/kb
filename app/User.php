<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    public function courses()
    {
      return $this->belongsTo('App\Course', 'id');
    }
    protected $fillable = [
        'id_number', 'first_name', 'last_name', 'phone', 'email', 'role_id', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
