<?php

namespace App\Helpers;

use App\Models\Category;

class CategoriesHelper
{
    public function getCategory($id = null)
    {
        if ($id) {

        }

        return Category::where(['status' => 1])->get();
    }

}