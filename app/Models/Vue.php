<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vue extends Model
{
    protected $table = 'vue';

    protected $fillable = ['uname', 'email', 'password', 'gender', 'address', 'hobby', 'country'];

    protected $hidden = ['password'];

    public function getHobbyAttribute($value)
    {
        return unserialize($value);
    }
}
