<?php

namespace App\Models\Letters;

use Illuminate\Database\Eloquent\Model;

class Summary extends Model
{
    protected $table = 'letter_summaries';
    protected $fillable = [
        'letter_id',
        'fulfillment',
    ];
}
