<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Villager extends Model
{
    protected $table = 'villagers';
    protected $fillable = [
        'user_id',
        'identity_number',
        'mother_name',
        'relationship_status',
        'average_income',
        'token',
    ];

    public function users()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
