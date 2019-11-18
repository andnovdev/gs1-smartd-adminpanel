<?php

namespace App\Models\Letters;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $table = 'letter_types';

    protected $fillable = [
        'name',
    ];

    public $timestamps = false;
}
