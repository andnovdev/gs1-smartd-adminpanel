<?php

namespace App\Models\Posts;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'post_categories';

    protected $fillable = [
        'parent_id', 'name',
    ];

    protected $with = ['subcategories'];

    public function subcategories()
    {
        return $this->hasMany('App\Models\Posts\Category', 'parent_id');
    }

    public function parents()
    {
        return $this->belongsTo('App\Models\Posts\Category', 'parent_id');
    }
}
