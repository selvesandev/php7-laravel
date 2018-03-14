<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    public $fillable = [
        'name', 'email', 'password', 'privileges'
    ];

    protected $hidden = ['password', 'remember_token'];

    public function getNameAttribute($name)
    {
        return ucfirst($name);
    }

    public function setPasswordAttribute($name)
    {
//        $this->attributes['password'] = bcrypt($name);
    }


    public function news()
    {
        return $this->hasMany('App\Models\News', 'admin_id', 'id');
    }
}
