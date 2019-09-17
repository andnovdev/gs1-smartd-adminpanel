<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employees';
    protected $fillable = [
        'identity_number',
        'position',
        'tenure_start',
        'tenure_finish',
    ];

    public function users()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
