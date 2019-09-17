<?php

namespace App\Models\Letters;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    protected $table = 'letter_attachments';
    protected $fillable = [
        'letter_id',
        'identity_card',
        'family_card',
    ];
    public $timestamps = false;
}
