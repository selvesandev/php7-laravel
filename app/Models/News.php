<?php

namespace App;

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
}
