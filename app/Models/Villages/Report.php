<?php

namespace App\Models\Villages;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $table = 'village_reports';

    protected $fillable = [
        'user_id', 'name', 'email', 'address', 'phone', 'phone', 'attachment', 'remember_token',
    ];

    public function users()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
