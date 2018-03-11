<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class CategoriesHelper extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'CategoryHelper';
    }
}