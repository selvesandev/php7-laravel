<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    public $fillable = [
        'name', 'email', 'password', 'privileges'
    ];
}
