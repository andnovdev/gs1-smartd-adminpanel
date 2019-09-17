<?php

namespace App\Models\Villages;

use Illuminate\Database\Eloquent\Model;

class Mission extends Model
{
    protected $table = 'village_missions';
    protected $fillable = [
        'content', 'desc',
    ];
}
