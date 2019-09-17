<?php

namespace App\Models\Financials;

use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    protected $table = 'financial_budgets';

    protected $fillable = [
        'name',
        'category_id',
        'goal_value',
        'frecuency',
        'purpose',
    ];

    public function categories()
    {
        return $this->belongsTo('App\Models\Financials\Category', 'category_id');
    }
}
