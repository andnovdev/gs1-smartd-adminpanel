<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
        'api_token',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'api_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profiles()
    {
        return $this->hasOne('App\Models\Users\Profile', 'user_id');
    }

    public function activityStatuses()
    {
        return $this->hasOne('App\Models\Users\Activities\Status', 'user_id');
    }

    public function villagers()
    {
        return $this->hasOne('App\Models\Villager', 'user_id');
    }

    public function employees()
    {
        return $this->hasOne('App\Models\Employee', 'user_id');
    }
}
