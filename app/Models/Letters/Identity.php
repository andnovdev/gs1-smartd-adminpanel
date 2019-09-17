<?php

namespace App\Models\Letters;

use Illuminate\Database\Eloquent\Model;

class Identity extends Model
{
    protected $table = 'letter_identities';

    protected $fillable = [
        'letter_id',
        'identity_number',
        'name',
        'gender',
        'birthplace',
        'birthday',
        'job',
        'relationship_status',
        'religion',
        'address',
    ];
}
