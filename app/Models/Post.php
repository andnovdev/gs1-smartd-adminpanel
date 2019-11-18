<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    protected $fillable = [
        'title',
        'subtitle',
        'category_id',
        'desc',
        'content',
        'status',
        'uri',
        'api_token',
    ];
    public function categories()
    {
        return $this->belongsTo('App\Models\Posts\Category');
    }
    public function comments()
    {
        return $this->hasMany('App\Models\Posts\Comment');
    }
}
