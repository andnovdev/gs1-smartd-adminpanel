<?php

namespace App\Models\Posts;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'post_comments';
    protected $fillable = [
        'post_id',
        'user_id',
        'name',
        'email',
        'content',
    ];

    public function posts()
    {
        return $this->belongsTo('App\Models\Post');
    }

    public function users()
    {
        return $this->belongsTo('App\User');
    }
}
