<?php

namespace App\Models\Users\Activities;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'user_activity_statuses';
    protected $fillable = [
        'user_id',
        'status',
        'last_active',
    ];
    protected $hidden = ['user_id'];
    protected $casts = [
        'last_active' => 'date',
    ];

    public $timestamps = false;

    public function users()
    {
        return $this->belongsTo('App\User');
    }
}
