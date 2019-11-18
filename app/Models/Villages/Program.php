<?php

namespace App\Models\Villages;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $table = 'village_programs';
    protected $fillable = [
        'title', 'desc', 'year_start', 'year_finish',
    ];
}
