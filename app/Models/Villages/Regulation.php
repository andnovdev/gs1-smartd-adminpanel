<?php

namespace App\Models\Villages;

use Illuminate\Database\Eloquent\Model;

class Regulation extends Model
{
    protected $table = 'village_regulations';

    protected $fillable = [
        'title',
        'desc',
    ];
}
