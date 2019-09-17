<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'user_profiles';
    protected $fillable = [
        'user_id',
        'birthday',
        'birthplace',
        'gender',
        'region',
        'address',
        'job',
        'company',
        'phone',
        'desc',
        'avatar',
    ];

    protected $hidden = ['user_id'];

    public $timestamps = false;

    public function users()
    {
        return $this->belongsTo('App/User', 'user_id', 'id');
    }
}
