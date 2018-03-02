<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $fillable = ['name'];

//    protected $hidden = ['created_at'];


    public function news()
    {
        return $this->belongsToMany('App\Models\News', 'news_categories', 'category_id', 'news_id');
    }
}
