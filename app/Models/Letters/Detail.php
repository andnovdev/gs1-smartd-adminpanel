<?php

namespace App\Models\Letters;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    protected $table = 'letter_details';

    protected $fillable = [
        'user_id',
        'type_id',
        'purpose',
        'message',
        'remember_token',
    ];

    public function users()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function types()
    {
        return $this->belongsTo('App\Models\Letters\Type', 'type_id');
    }

    public function identities()
    {
        return $this->hasOne('App\Models\Letters\Identity', 'letter_id');
    }

    public function summaries()
    {
        return $this->hasOne('App\Models\Letters\Summary', 'letter_id');
    }

    public function attachments()
    {
        return $this->hasOne('App\Models\Letters\Attachment', 'letter_id');
    }
}
