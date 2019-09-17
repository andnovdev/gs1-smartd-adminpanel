<?php

namespace App\Models\Villages;

use Illuminate\Database\Eloquent\Model;

class Vision extends Model
{
    protected $table = 'village_vissions';
    protected $fillable = [
        'content', 'desc',
    ];
}
