<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    public $fillable = [
        'title',
        'news_date',
        'summary',
        'image',
        'details',
        'meta_keywords',
        'status',
        'slug',
        'priority',
        'admin_id',
        'share_count',
        'views_count'
    ];


    public function categories()
    {
        return $this->belongsToMany(
            'App\Models\Category',
            'news_categories',
            'news_id',
            'category_id');
    }

    public function admin()
    {
        return $this->belongsTo('App\Models\Admin', 'admin_id', 'id');
    }
}
